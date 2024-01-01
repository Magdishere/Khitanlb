<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{

    use HasFactory;
    use Translatable;

    protected $table = 'categories';
    protected $guarded = [];


    public $translatedAttributes = ['name'];
}
