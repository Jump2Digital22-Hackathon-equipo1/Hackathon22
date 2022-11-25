<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Center extends Eloquent
{
    use HasFactory;
    protected $fillable = [
        'center_id',
        'city_code',
        'region_code',
        'center_type',
        'op_area',
    ];
    //protected $primaryKey = 'id';

}
