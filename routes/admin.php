<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\ImageProductGalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\ProductVariantController as ControllersProductVariantController;
use App\Http\Controllers\VendorAdminProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/* ADMIN ROUTES **/

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('update.password');


/** SLIDE ROUTES */

Route::resource('slider', SliderController::class);

/**  CATEGORY ROUTES */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);


/**  SUBCATEGORY ROUTES */
Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);


/**  ChildCatgory  ROUTES */
Route::get('get-subcategory', [ChildCategoryController::class, 'getSubCategory'])->name('get-subcategory');
Route::get('get-subcategory-edit', [ChildCategoryController::class, 'getSubCategoryEdit'])->name('get-subcategory-edit');
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::resource('child-category', ChildCategoryController::class);


/**  Brand ROUTES */
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/** Vendor Profile Route */
Route::resource('vendor-profile', VendorAdminProfileController::class);


/** Product Route */
Route::get('product/getsubcategory', [ProductController::class, 'getSubCategory'])->name('product.getsubcategory');
Route::get('product/get-child-category', [ProductController::class, 'getChildCategory'])->name('product.get-child-category');
Route::resource('product', ProductController::class);
/** Product Image Gallery */
Route::resource('product-image-gallery', ImageProductGalleryController::class);
/** Product Variant */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

/**Product Variant Item Routes */
Route::get('product-variant-item/{productID}/{variantID}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productID}/{variantID}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
