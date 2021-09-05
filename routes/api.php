<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ApiCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category
Route::get('/category', [ApiCategoryController::class, 'getCategory']);
Route::get('/subcategory', [ApiCategoryController::class, 'getSubCategory']);
Route::get('/childcategory', [ApiCategoryController::class, 'getChildCategory']);


//address
Route::get('/country', [AddressController::class, 'getCountry']);
Route::get('/state', [AddressController::class, 'getState']);
Route::get('/city', [AddressController::class, 'getCity']);
