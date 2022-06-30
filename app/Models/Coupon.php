<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_id',
        'coupon_code',
        'coupon_discount',
        'start_date',
        'end_date',
        'created_at'
    ];
}