<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    use HasFactory;
    protected $fillable = [
        'meal_id',
        'type_of_product',
        'type_of_cuisine',
    ];
    //protected $primaryKey = 'id';

}
