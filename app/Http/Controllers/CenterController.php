<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CenterController extends Controller
{

    /**
     * List products.
     *
     */
    public function listAllCenters() {   
        $list = DB::collection('centers')->get();
        return response($list, 201); 
    }
  
}
