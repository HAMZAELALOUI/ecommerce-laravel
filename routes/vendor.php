<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopPeofileController;
use Illuminate\Support\Facades\Route;

/* VENDOR ROUTES **/

Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile/update', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('profile/update/password', [VendorProfileController::class, 'updatePassword'])->name('update.password');

/** Shop-vendor profile */
Route::resource('shop-profile', VendorShopPeofileController::class);

/**Vendor Product  */
Route::resource('products', VendorProductController::class);
