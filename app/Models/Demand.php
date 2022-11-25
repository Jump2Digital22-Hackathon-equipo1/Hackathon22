<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Demand extends Eloquent
{
    use HasFactory;
    protected $fillable = [
    'center_id',
    'week_number',
    'meal_id',
    'checkout_price',
    'base_price',
    'emailer_for_promotion',
    'homepage_featured_url',
    'num_orders',
    ];
}
