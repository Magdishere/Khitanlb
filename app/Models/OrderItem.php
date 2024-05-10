<?php

namespace App\Models;

use App\Models\admin\AttributeOption;
use App\Models\admin\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table="order_items";

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributeOptions()
    {
        return $this->belongsToMany(AttributeOption::class, 'attribute_option_order_item', 'order_item_id', 'attribute_option_id');
    }
}
