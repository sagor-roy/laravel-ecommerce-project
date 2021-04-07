<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Brand;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'quantity',
        'price',
        'first_iamge',
        'second_image',
        'third_image',
        'fourth_image',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
