<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopPeofileController;
use App\Http\Controllers\VendorProductVarinatController;
use Illuminate\Support\Facades\Route;

/* VENDOR ROUTES **/

Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile/update', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('profile/update/password', [VendorProfileController::class, 'updatePassword'])->name('update.password');

/** Shop-vendor profile */
Route::resource('shop-profile', VendorShopPeofileController::class);

/**Vendor Product  */
Route::get('products/getsubcategory', [VendorProductController::class, 'getSubCategory'])->name('products.getsubcategory');
Route::get('products/getChildCategory', [VendorProductController::class, 'getChildCategory'])->name('products.getChild-category');
Route::resource('products', VendorProductController::class);


/** Product Image Gallery */
Route::resource('product-image-gallery', VendorProductImageGalleryController::class);

/** Product Variant */
Route::put('product-variant/change-status', [VendorProductVarinatController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', VendorProductVarinatController::class);

// /**Product Variant Item Routes */
// Route::get('product-variant-item/{variantItemID}/edit', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
// Route::get('product-variant-item/{productID}/{variantID}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
// Route::get('product-variant-item/create/{productID}/{variantID}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
// Route::post('product-variant-item/store', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
// Route::put('product-variant-item/{variantItemID}/update', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
// Route::delete('product-variant-item/{variantItemID}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
// Route::put('product-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])->name('product-variant-item.change-status');