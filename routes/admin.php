<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\GeneraleSettingsController;
use App\Http\Controllers\Backend\ImageProductGalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SellerProductsController;
use App\Http\Controllers\CouponsController;
// use App\Http\Controllers\ProductVariantController as ControllersProductVariantController;
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
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::get('product/getsubcategory', [ProductController::class, 'getSubCategory'])->name('product.getsubcategory');
Route::get('product/get-child-category', [ProductController::class, 'getChildCategory'])->name('product.get-child-category');
Route::resource('product', ProductController::class);
/** Product Image Gallery */
Route::resource('product-image-gallery', ImageProductGalleryController::class);
/** Product Variant */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

/**Product Variant Item Routes */
Route::get('product-variant-item/{variantItemID}/edit', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::get('product-variant-item/{productID}/{variantID}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productID}/{variantID}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item/store', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::put('product-variant-item/{variantItemID}/update', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemID}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
Route::put('product-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])->name('product-variant-item.change-status');


/** Seller Products Routes */
Route::get('seller-products', [SellerProductsController::class, 'index'])->name('seller-products.index');

/** Seller pending Products Routes */
Route::get('seller-pending-products', [SellerProductsController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('seller-pending-products/change-approve-status', [SellerProductsController::class, 'changeApproveStatus'])->name('change-approve-status');


/**flash sale routes */

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-sale-product', [FlashSaleController::class, 'AddSaleProduct'])->name('flash-sale.update.add-sale-product');
Route::delete('flash-sale/destroy/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');
Route::put('flash-sale/change-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale.change-status');
Route::put('flash-sale/show-home-status', [FlashSaleController::class, 'showHomeStatus'])->name('flash-sale.show-home-status');

/** Couons Routes */
Route::resource('coupons', CouponsController::class);
/** General Settings Routes */

Route::get('settings', [GeneraleSettingsController::class, 'index'])->name('settings.index');
Route::put('update-general-settings', [GeneraleSettingsController::class, 'UpdateGeneralSettings'])->name('update-general-settings');
