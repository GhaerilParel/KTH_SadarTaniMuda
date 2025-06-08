<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceDetailController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', [ProductController::class, 'index']);


Route::get('/contact', function () {
    return view('contact');
});

// Detail produk
Route::get('/service-details/{slug}', [ServiceDetailController::class, 'show']);
