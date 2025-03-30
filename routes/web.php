<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;

require __DIR__.'/auth.php';

Route::get('/', function (){
    return view('login');
});

 
Route::resource('logo', LogoController::class);
Route::resource('slider', SilderController::class);
Route::resource('banner', BannerController::class);
Route::resource('products', ProductController::class);
 