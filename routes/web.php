<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

//Product View
Route::get('/product',[ProductController::class, 'index'])->middleware('auth');

//View Product Details Page
Route::get('/view-product/{id}',[ProductController::class,'show'])->middleware('auth');

//Add Product
Route::get('add-product',[ProductController::class,'create'])->middleware('auth');
Route::post('add-product',[ProductController::class,'store'])->middleware('auth');

//Edit Product
Route::get('edit-product/{id}',[ProductController::class,'edit'])->middleware('auth');
Route::post('edit-product/{id}',[ProductController::class,'update'])->middleware('auth');

//Delete Product
Route::get('delete/{id}',[ProductController::class,'destroy']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
