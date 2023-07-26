<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'value',
        'discount_type',
        'free_shipping',
        'status',
        'coupon_usage_limit',
        'user_usage_limit',
        'minimum_spend',
        'start_date',
        'end_date'
    ];
}
