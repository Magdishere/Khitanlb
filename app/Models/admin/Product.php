<?php

namespace App\Models\admin;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;

class Product extends Model implements \Astrotomic\Translatable\Contracts\Translatable
{

    use HasFactory;
    use \Astrotomic\Translatable\Translatable;
    protected $table = 'products';
    public $translatedAttributes = ['name', 'short_description', 'description'];
    protected $fillable = ['slug','regular_price', 'SKU', 'stock_status', 'featured', 'quantity', 'image','category_id'];
    public function category(){

        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_product')->where('is_active', 1);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function categorySales()
    {
        return $this->hasManyThrough(CategorySale::class, Category::class);
    }
    public function getActiveSales()
    {
        return $this->sales()->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('is_active', true)
            ->get();
    }

    public function scopeSortBy($query, $sorting)
    {
        switch ($sorting) {
            case 'date':
                $query->orderBy('created_at', 'DESC');
                break;
            case 'price':
                $query->orderBy('price', 'ASC');
                break;
            case 'price-desc':
                $query->orderBy('price', 'DESC');
                break;
            case 'alphabet':
                $query->orderBy('name', 'ASC');
                break;
            case 'alphabet-desc':
                $query->orderBy('name', 'DESC');
                break;
            default:
                $query->orderBy('created_at', 'ASC');
                break;
        }

        return $query;
    }

    public function attributeOptions()
    {
        return $this->belongsToMany(AttributeOption::class, 'product_attribute_options')
            ->withPivot('is_default', 'price')
            ->withTimestamps();
    }

    public function getDefaultOptionsColor($product_id)
    {
        $defaultOptions = [];

        foreach ($this->attributeOptions as $options) {
            $attributeName = optional($options->attribute->translations()->where('locale', 'en')->first())->name;

            if ($attributeName === 'color') {
                $defaultOption = $options->pivot->where('is_default', 1)->where('product_id', $product_id)->first();
                $defaultOptions[strtolower($attributeName)] = optional($options->translations->where('attribute_option_id', optional($defaultOption)->attribute_option_id)->first())->value;
            }
        }

        return $defaultOptions;
    }
    public function getDefaultOptionsSize($product_id)
    {
        $defaultOptions = [];

        foreach ($this->attributeOptions as $options) {
            if ($options['attribute_id'] == 9 && $options->pivot->is_default == 1) {
                $attributeName = optional($options->attribute->translations()->where('locale', 'en')->first())->name;

                if ($attributeName === 'size') {
                    $defaultOptions[strtolower($attributeName)] = optional($options->translations->where('locale', 'en')->first())->value;
                }
            }
        }
        return $defaultOptions;
    }

    public function getDefaultSizePrice($product_id)
    {
        $defaultSizePrice = 0;

        foreach ($this->attributeOptions as $options) {
            if ($options['attribute_id'] == 9 && $options->pivot->is_default == 1) {
                $attributeName = optional($options->attribute->translations()->where('locale', 'en')->first())->name;

                if ($attributeName === 'size') {
                    $defaultSizePrice = $options->pivot->price;
                }
            }
        }

        return $defaultSizePrice;
    }



}
