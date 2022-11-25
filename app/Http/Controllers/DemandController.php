<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DemandController extends Controller
{

    /**
     * List products.
     *
     */
    public function listAllDemands() {   
        $list = DB::collection('demands')->get();
        return response($list, 201); 
    }
  
}
