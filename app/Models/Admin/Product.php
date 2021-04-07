<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'product_title',
        'slug',
        'sort_desc',
        'long_desc',
        'price',
        'first_image',
        'second_image',
        'third_image',
        'fourth_image',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

     public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

}
