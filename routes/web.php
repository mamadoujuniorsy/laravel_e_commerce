<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return ("Welcome");
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('product', \App\http\Controllers\Admin\productController::class)->except(['show']);
    Route::resource('category', \App\http\Controllers\Admin\categoryController::class)->except(['show']);
    Route::resource('user', \App\http\Controllers\Admin\userController::class)->except(['show']);
});