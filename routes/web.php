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
    | Images Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::post('/upload-image', [App\Http\Controllers\Admin\Images\ImageController::class, 'uploadImage']);

    Route::get('/get-images/{id}', [App\Http\Controllers\Admin\Images\ImageController::class, 'getImages']);

    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/products', [App\Http\Controllers\Admin\Products\ProductController::class, 'index'])->name('product_list');

    Route::get('/admin/product/create', [App\Http\Controllers\Admin\Products\ProductController::class, 'create'])->name('product_create');

    Route::post('/admin/product/create', [App\Http\Controllers\Admin\Products\ProductController::class, 'store'])->name('product_store');

    Route::get('/admin/product/{id}', [App\Http\Controllers\Admin\Products\ProductController::class, 'edit'])->name('product_edit');

    Route::put('/admin/product/{id}', [App\Http\Controllers\Admin\Products\ProductController::class, 'update'])->name('product_update');

    Route::post('/admin/product/get-data-product', [App\Http\Controllers\Admin\Products\ProductController::class, 'getDataProduct'])
        ->name('product_data');

    Route::delete('/admin/product/delete/{id}', [App\Http\Controllers\Admin\Products\ProductController::class, 'destroy'])->name('product_delete');

    /*
    |--------------------------------------------------------------------------
    | Posts Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/posts', [App\Http\Controllers\Admin\Posts\PostController::class, 'index'])->name('post_list');

    Route::get('/admin/post/create', [App\Http\Controllers\Admin\Posts\PostController::class, 'create'])->name('post_create');

    Route::post('/admin/post/create', [App\Http\Controllers\Admin\Posts\PostController::class, 'store'])->name('post_store');

    Route::get('/admin/post/{id}', [App\Http\Controllers\Admin\Posts\PostController::class, 'edit'])->name('post_edit');

    Route::put('/admin/post/{id}', [App\Http\Controllers\Admin\Posts\PostController::class, 'update'])->name('post_update');

    Route::delete('/admin/post/delete/{id}', [App\Http\Controllers\Admin\Posts\PostController::class, 'destroy'])->name('post_delete');

    /*
    |--------------------------------------------------------------------------
    | Guarantees Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/guarantees', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'index'])->name('guarantee_list');

    Route::get('/admin/guarantee/create', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'create'])->name('guarantee_create');

    Route::post('/admin/guarantee/create', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'store'])->name('guarantee_store');

    Route::get('/admin/guarantee/{id}', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'edit'])->name('guarantee_edit');

    Route::put('/admin/guarantee/{id}', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'update'])->name('guarantee_update');

    Route::delete('/admin/guarantee/delete/{id}', [App\Http\Controllers\Admin\Guarantees\GuaranteeController::class, 'destroy'])->name('guarantee_delete');

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
    | Download Centers Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/download-centers', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'index'])->name('download_center_list');

    Route::get('/admin/download-center/create', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'create'])->name('download_center_create');

    Route::post('/admin/download-center/create', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'store'])->name('download_center_store');

    Route::get('/admin/download-center/{id}', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'edit'])->name('download_center_edit');

    Route::put('/admin/download-center/{id}', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'update'])->name('download_center_update');

    Route::delete('/admin/download-center/delete/{id}', [App\Http\Controllers\Admin\DownloadCenter\DownloadCenterController::class, 'destroy'])->name('download_center_delete');

    /*
    |--------------------------------------------------------------------------
    | About Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/company', [App\Http\Controllers\Admin\About\AboutController::class, 'company'])->name('company');

    Route::post('/admin/company', [App\Http\Controllers\Admin\About\AboutController::class, 'updateCompany'])->name('company_store');

    Route::get('/admin/location', [App\Http\Controllers\Admin\About\AboutController::class, 'location'])->name('location');

    Route::post('/admin/location', [App\Http\Controllers\Admin\About\AboutController::class, 'updateLocation'])->name('location_store');

    /*
    |--------------------------------------------------------------------------
    | Certificates Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/certificates', [App\Http\Controllers\Admin\About\CertificateController::class, 'index'])->name('certificate_list');

    Route::get('/admin/certificate/create', [App\Http\Controllers\Admin\About\CertificateController::class, 'create'])->name('certificate_create');

    Route::post('/admin/certificate/create', [App\Http\Controllers\Admin\About\CertificateController::class, 'store'])->name('certificate_store');

    Route::get('/admin/certificate/{id}', [App\Http\Controllers\Admin\About\CertificateController::class, 'edit'])->name('certificate_edit');

    Route::put('/admin/certificate/{id}', [App\Http\Controllers\Admin\About\CertificateController::class, 'update'])->name('certificate_update');

    Route::delete('/admin/certificate/delete/{id}', [App\Http\Controllers\Admin\About\CertificateController::class, 'destroy'])->name('certificate_delete');

    /*
    |--------------------------------------------------------------------------
    | Services Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/services', [App\Http\Controllers\Admin\About\ServiceController::class, 'index'])->name('service_list');

    Route::get('/admin/service/create', [App\Http\Controllers\Admin\About\ServiceController::class, 'create'])->name('service_create');

    Route::post('/admin/service/create', [App\Http\Controllers\Admin\About\ServiceController::class, 'store'])->name('service_store');

    Route::get('/admin/service/{id}', [App\Http\Controllers\Admin\About\ServiceController::class, 'edit'])->name('service_edit');

    Route::put('/admin/service/{id}', [App\Http\Controllers\Admin\About\ServiceController::class, 'update'])->name('service_update');

    Route::delete('/admin/service/delete/{id}', [App\Http\Controllers\Admin\About\ServiceController::class, 'destroy'])->name('service_delete');

    /*
    |--------------------------------------------------------------------------
    | Users Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::middleware('role:superadmin')->group(function () {
        Route::get('/admin/user-managements', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'index'])->name('user_management_list');

        Route::get('/admin/user-management/create', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'create'])->name('user_management_create');

        Route::post('/admin/user-management/create', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'store'])->name('user_management_store');

        Route::get('/admin/user-management/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'edit'])->name('user_management_edit');

        Route::put('/admin/user-management/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'update'])->name('user_management_update');

        Route::put('/admin/user-management/change-password/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'changePassword'])->name('user_management_change_password');

        Route::delete('/admin/user-management/delete/{id}', [App\Http\Controllers\Admin\Account\UserManagementController::class, 'destroy'])->name('user_management_delete');
    });

    Route::get('/admin/profile', [App\Http\Controllers\Admin\Account\ProfileController::class, 'index'])->name('profile_update');
    Route::put('/admin/profile', [App\Http\Controllers\Admin\Account\ProfileController::class, 'update'])->name('profile_update');
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/profile', [App\Http\Controllers\Admin\Account\ProfileController::class, 'index'])->name('profile_update');
//     Route::put('/admin/profile', [App\Http\Controllers\Admin\Account\ProfileController::class, 'update'])->name('profile_update');
// });
