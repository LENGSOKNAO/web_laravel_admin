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

Route::get('/logo', [LogoController::class, 'index'])->name('logo.index');
Route::get('/logo/create', [LogoController::class, 'create'])->name('logo.create');
Route::post('/logo', [LogoController::class, 'store'])->name('logo.store');
Route::get('/logo/{logo}/edit', [LogoController::class, 'edit'])->name('logo.edit');
Route::put('/logo/{logo}', [LogoController::class, 'update'])->name('logo.update');
Route::delete('/logo/{logo}', [LogoController::class, 'destroy'])->name('logo.destroy');

// slider

Route::get('/slider', [SilderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SilderController::class, 'create'])->name('slider.create');
Route::post('/slider', [SilderController::class, 'store'])->name('slider.store');
Route::get('/slider/{id}/edit', [SilderController::class, 'edit'])->name('slider.edit');
Route::put('/slider/{id}', [SilderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{slider}', [SilderController::class, 'destroy'])->name('slider.destroy');


// banner

Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
Route::get('/banner/{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');  
Route::put('/banner/{banner}', [BannerController::class, 'update'])->name('banner.update');
Route::delete('/banner/{banner}', [BannerController::class, 'destroy'])->name('banner.destroy');

// product

Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
