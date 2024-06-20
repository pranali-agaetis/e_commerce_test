<?php

use App\Http\Controllers\category\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\http\Controllers\PostController;

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

//Route::get('/product/{id}', ProductController::class,'show')->name('product.show');

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



// returns the home page with all posts
Route::get('/', [PostController::class,'index'])->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', [PostController::class,  'create'])->name('posts.create');
// adds a post to the database
Route::post('/posts', [PostController::class,'store'])->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// updates a post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//Call Category
Route::get("/category",[CategoryController::class,'index'])->name('category.index');

Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');

// adds a post to the database
Route::post('/category', [CategoryController::class,'store'])->name('category.store');

// returns the form for editing a post
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

// updates a post
Route::post('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
// deletes a post
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');