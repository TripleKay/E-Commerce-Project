<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_items_id',
        'order_id',
        'product_id',
        'product_variant_id',
        'color_id',
        'size_id',
        'unit_price',
        'quantity',
        'total_price',
    ];
}
