<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\AdressController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleMoreController;
use App\Http\Controllers\Frontend\FrontendProductDetailsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

/** flash Sale*/
Route::get('flash-sale', [FlashSaleMoreController::class, 'index'])->name('flash-sale');

/** Product Details*/
Route::get('product-details/{slug}', [FrontendProductDetailsController::class, 'showProductDeyails'])->name('product-details');





Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

/** Cart  Routes */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'cartDeatails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQTY'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');
Route::get('cart/remove-item/{rowId}', [CartController::class, 'RemoveItem'])->name('cart.remove-item');
Route::get('count-cart', [CartController::class, 'getCountCart'])->name('count-cart');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
  Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
  Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
  Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
  Route::put('update/password', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');
  Route::resource('address', AdressController::class);
});

require __DIR__ . '/auth.php';
