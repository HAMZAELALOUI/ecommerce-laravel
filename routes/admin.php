<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

/* ADMIN ROUTES **/
Route::get('dashboard' ,[AdminController::class,'dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('update.password');


/** SLIDE ROUTES */

Route::resource('slider' ,SliderController::class);