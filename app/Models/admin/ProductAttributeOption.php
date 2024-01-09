<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeOption extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'attribute_option_id', 'is_default', 'price'];
    protected $primaryKey = ['product_id', 'attribute_option_id'];
}
