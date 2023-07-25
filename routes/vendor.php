<?php 
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use Illuminate\Support\Facades\Route;

/* VENDOR ROUTES **/
Route::get('dashboard' ,[VendorController::class,'dashboard'])->name('dashboard');
Route::get('profile' ,[VendorProfileController::class,'index'])->name('profile');
Route::put('profile/update' ,[VendorProfileController::class,'updateProfile'])->name('profile.update');
Route::put('profile/update/password' ,[VendorProfileController::class,'updatePassword'])->name('update.password');

