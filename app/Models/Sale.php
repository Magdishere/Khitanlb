<?php

namespace App\Models;

use App\Models\admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function specificSale($type)
    {
        // Assuming you have a 'type' column in the 'sales' table
        $modelClassName = 'Sales' . ucfirst(strtolower($type));

        // Assuming the specific sale table has a 'sale_id' foreign key
        return $this->hasOne("App\Models\{$modelClassName}", 'sale_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_product');
    }

}
