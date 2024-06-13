<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Product View
Route::get('/product',[ProductController::class, 'index']);

//View Product Details Page
Route::get('/view-product/{id}',[ProductController::class,'show']);

//Add Product
Route::get('add-product',[ProductController::class,'create']);
Route::post('add-product',[ProductController::class,'store']);

//Edit Product
Route::get('edit-product/{id}',[ProductController::class,'edit']);
Route::post('edit-product/{id}',[ProductController::class,'update']);

//Delete Product
Route::get('delete/{id}',[ProductController::class,'destroy']);