<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'state_division_id',
        'city_id',
        'township_id',
        'name',
        'email',
        'phone',
        'note',
        'payment_method',
        'sub_total',
        'coupon_discount',
        'grand_total',
        'invoice_number',
        'order_date',
        'order_month',
        'order_year',
        'confirmed_date',
        'processing_date',
        'picked_date',
        'shipped_date',
        'delivered_date',
        'cancel_date',
        'return_date',
        'return_reason',
        'status'
    ];
}
