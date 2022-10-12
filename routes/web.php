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

Route::group(['prefix'=>'auth'], function (){
    Route::get('register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');
    Route::get('login',[\App\Http\Controllers\AuthController::class,'auth'])->name('auth');
    Route::post('user/create',[\App\Http\Controllers\AuthController::class,'create'])->name('user.create');
    Route::post('signin',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
    Route::get('logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');
});

Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::get('/create',[\App\Http\Controllers\ProductController::class,'create'])->name('create');
Route::post('/store',[\App\Http\Controllers\ProductController::class,'store'])->name('store');
Route::get('/{product}',[\App\Http\Controllers\ProductController::class,'product'])->name('product');
Route::post('/{product}/edit/save',[\App\Http\Controllers\ProductController::class,'editSave'])->name('edit.save');
Route::get('/{product}/delete',[\App\Http\Controllers\ProductController::class,'delete'])->name('delete');
Route::get('/buy',[\App\Http\Controllers\ProductController::class,'buy'])->name('buy');
Route::get('/{product}/edit',[\App\Http\Controllers\ProductController::class,'edit'])->name('edit');
