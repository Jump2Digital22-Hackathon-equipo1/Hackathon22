<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /**
     * List products.
     *
     */
    public function listAllProducts() {   
        $list = DB::collection('products')->get();
        return response($list, 201); 
    }
  
}
