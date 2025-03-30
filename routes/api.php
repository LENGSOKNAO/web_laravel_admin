<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProductController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
// logo
Route::get('/logo',[LogoController::class, 'logo']);
// slider
Route::get('/slider',[SilderController::class, 'slider']);
// banner
Route::get('/banner',[BannerController::class, 'banner']);
// product
Route::get('/product', [ProductController::class, 'showData']);
Route::get('/product/search', [ProductController::class, 'search']);
Route::get('/product/{id}', [ProductController::class, 'page']);