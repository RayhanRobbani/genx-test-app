<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'delivery_days_local',
        'delivery_days_outside',
        'status'
    ];
}
