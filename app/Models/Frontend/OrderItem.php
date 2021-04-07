<?php

namespace App\Models\Frontend;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
