<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'name',
        'short_description',
        'long_description',
        'original_price',
        'selling_price',
        'discount_price',
        'special_offer',
        'featured',
        'publish_status',
    ];
}