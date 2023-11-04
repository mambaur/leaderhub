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

    Route::get('/admin/product-categories', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'index'])->name('product_category_list');

    Route::get('/admin/product-category/create', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'create'])->name('product_category_create');

    Route::post('/admin/product-category/create', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'store'])->name('product_category_store');

    Route::get('/admin/product-category/{id}', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'edit'])->name('product_category_edit');

    Route::put('/admin/product-category/{id}', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'update'])->name('product_category_update');

    Route::delete('/admin/product-category/delete/{id}', [App\Http\Controllers\Admin\Products\ProductCategoryController::class, 'destroy'])->name('product_category_delete');

    /*
    |--------------------------------------------------------------------------
    | Users Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/user-managements', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'index'])->name('user_management_list');

    Route::get('/admin/user-management/create', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'create'])->name('user_management_create');

    Route::post('/admin/user-management/create', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'store'])->name('user_management_store');

    Route::get('/admin/user-management/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'edit'])->name('user_management_edit');

    Route::put('/admin/user-management/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'update'])->name('user_management_update');

    Route::put('/admin/user-management/change-password/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'changePassword'])->name('user_management_change_password');

    Route::delete('/admin/user-management/delete/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'destroy'])->name('user_management_delete');
});
