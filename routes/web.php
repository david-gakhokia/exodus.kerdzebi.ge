<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\OrderController;


use App\Http\Controllers\Backend\AdminProductController;





// Frontend Routes


    Route::get('/', [HomeController::class, 'index']);
    Route::get('/menu', [HomeController::class, 'menu']);
    Route::get('/product/{id}', [HomeController::class, 'product']);



    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/table_id/{id}', [HomeController::class, 'QrId']);
    Route::get('/language/{lan}', [HomeController::class, 'language']);
    Route::get('/products/{id}', [ProductController::class, 'index']);



    Route::post('/order', [OrderController::class, 'create']);
    Route::post('/order/updateQuantity', [OrderController::class, 'updateQuantity']);
    Route::get('/orders', [OrderController::class, 'FrontOrder']);
    Route::get('/order/destroy/{id}', [OrderController::class, 'destroy']);
    Route::get('/order/clearCart', [OrderController::class, 'clearCart']);



// Admin Routes
Auth::routes();

Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {

    Route::resource('dashboard', DashboardController::class);

//როლები
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

//პარამეტრები

    Route::get('setting',[SettingController::class,'index']);
    Route::post('setting',[SettingController::class,'save_settings']);


//კატეგორიები
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('category/create', [CategoryController::class, 'store'])->name('store.category');
    Route::get('category/{id}', [CategoryController::class, 'show']);
    Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('category/update/{id}', [CategoryController::class, 'update']);
    Route::get('category/destroy/{id}', [CategoryController::class, 'destroy']);

//პროდუქტი
    Route::get('products', [AdminProductController::class, 'index'])->name('products');
    Route::get('product/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('product/create', [AdminProductController::class, 'store'])->name('store.product');
    Route::get('product/{id}', [AdminProductController::class, 'show']);
    Route::get('product/edit/{id}', [AdminProductController::class, 'edit']);
    Route::post('product/update/{id}', [AdminProductController::class, 'update']);
    Route::get('product/destroy/{id}', [AdminProductController::class, 'destroy']);
    //იმპორტ-ექსპორტი
    Route::get('products/inport', [AdminProductController::class, 'import']);
    Route::get('products/export', [AdminProductController::class, 'export']);
    // Route for export/download tabledata to .csv, .xls or .xlsx
    Route::get('exportProduct/{type}', [ProductController::class, 'exportExcel'])->name('exportProduct');
    // Route for import excel data to database.
    Route::post('importProduct', [ProductController::class, 'importExcel'])->name('importProduct');


//ადგილები
    Route::get('places', [PlaceController::class, 'index'])->name('places');
    Route::post('place/create', [PlaceController::class, 'store'])->name('store.place');
    Route::get('place/{id}', [PlaceController::class, 'show']);
    Route::get('place/edit/{id}', [PlaceController::class, 'edit']);
    Route::post('place/update/{id}', [PlaceController::class, 'update']);
    Route::get('place/destroy/{id}', [PlaceController::class, 'destroy']);

//მაგიდები
    Route::get('tables', [TableController::class, 'index'])->name('tables');
    Route::post('table/create', [TableController::class, 'store'])->name('store.table');
    Route::get('table/{id}', [TableController::class, 'show']);
    Route::get('table/edit/{id}', [TableController::class, 'edit']);
    Route::post('table/update/{id}', [TableController::class, 'update']);
    Route::get('table/destroy/{id}', [TableController::class, 'destroy']);
});

