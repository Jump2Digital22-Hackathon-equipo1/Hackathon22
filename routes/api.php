<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DemandController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// POST /login : Login a user.
Route::post('/login', [UserController::class, 'login']);

//POST /users : Create a user.
Route::post('/users', [UserController::class, 'store']);



Route::get('/index/listallproducts/',[ProductController::class, 'listAllProducts']);

Route::get('/index/listalldemands/',[DemandController::class, 'listAllDemands']);




//PROTECTED ROUTES
Route::group(['middleware' => ['auth:api']], function() {

Route::get('/index/listallcenters/',[CenterController::class, 'listAllCenters'])
->middleware('role:admin');


}
);