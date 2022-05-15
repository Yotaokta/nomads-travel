<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/details/{slug}', [DetailController::class, 'home'])->name('details');

Route::prefix('checkout')->controller(CheckoutController::class)->middleware('auth')->group(function(){
    Route::get('/{id}', 'home')->name('checkout');
    Route::post('/{id}', 'process')->name('checkout.process');
    Route::post('/create/{detail_id}', 'create')->name('checkout.create');
    Route::get('/remove/{detail_id}', 'remove')->name('checkout.remove');
    Route::get('/confirm/{id}', 'success')->name('checkout.success');
});

Route::prefix('admauth')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});

Route::prefix('auth')->controller(AuthController::class)->group(function(){
    Route::get('/login', 'home')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'createAccount')->name('create-account');
    Route::post('/login', 'isValidUser')->name('login-validate');
    Route::post('/logout', 'logout')->name('logout');
});