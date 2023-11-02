<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/admin', function () {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.home.index');
    })->name('home');


    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/products', function () {
        return view('admin.products.index');
    })->name('product_list');

    /*
    |--------------------------------------------------------------------------
    | Product Categories Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/product-categories', function () {
        return view('admin.product-categories.index');
    })->name('product_category_list');

    Route::get('/admin/product-category/create', function () {
        return view('admin.product-categories.create');
    })->name('product_category_create');
});
