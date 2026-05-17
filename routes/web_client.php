<?php

use \App\Http\Controllers\Client\FoodController;
use \App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')->where('locale', '[a-z]+');

Route::get('/', [HomeController::class, 'index'])->name('home.index');