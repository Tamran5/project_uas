<?php

use App\Http\Controllers\OrderController;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;



Route::post('products/sync/{id}', [ProductController::class, 'sync'])->name('products.sync');
Route::post('category/sync/{id}', [ProductCategoryController::class, 'sync'])->name('category.sync');

//kode baru diubah menjadi seperti ini
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('products', [HomepageController::class, 'products']);
Route::get('detail', [HomepageController::class, 'detail']);
Route::get('categories', [HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);
Route::get('/products/filter', [HomepageController::class, 'filterByCategory']);
Route::get('/product/{name}', [HomepageController::class, 'show'])->name('detailproducts');
Route::get('/about', function () {
    return view('web.about');
});
Route::get('/contact', function () {
    return view('web.contact');
});
Route::get('/services', function () {
    return view('web.services');
});


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    // Route::get('products',[DashboardController::class,'products'])->name('products');

})->middleware(['auth', 'verified']);


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
