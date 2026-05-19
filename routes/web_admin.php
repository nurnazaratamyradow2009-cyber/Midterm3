<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::post('phone/store', [PhoneController::class, 'store'])->name('phone.store');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

Route::middleware('guest')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
        Route::get('/login', [AuthController::class, 'show'])->name('login');
    });

Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')->where('locale', '[a-z]+');

// Protect all admin routes behind the auth middleware
Route::prefix('admin/')->as('admin.')->middleware(['auth'])->group(function () {


    // Dashboard
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');

    // Phone
    Route::get('phones', [PhoneController::class, 'phones'])->name('phone');
    Route::get('phone/show/{id}', [PhoneController::class, 'phoneShow'])->name('phone.show');
    Route::delete('phone/{id}', [PhoneController::class, 'destroy'])->name('phone.destroy');
    Route::get('phone/edit/{id}', [PhoneController::class, 'edit'])->name('phone.edit');
    Route::put('phone/{id}', [PhoneController::class, 'update'])->name('phone.update');
    Route::get('phone/create', [PhoneController::class, 'create'])->name('phone.create');

    // Brand
    Route::get('brands', [BrandController::class, 'brands'])->name('brand');

    // Category
    Route::get('categories', [CategoryController::class, 'categories'])->name('category');
});