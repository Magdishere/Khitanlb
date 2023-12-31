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
        return $this->belongsToMany(Sale::class, 'sale_product');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function categorySales()
    {
        return $this->hasManyThrough(CategorySale::class, Category::class);
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
}
