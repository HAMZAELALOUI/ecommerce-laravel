<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;



/* ADMIN ROUTES **/
Route::get('dashboard' ,[AdminController::class,'dashboard'])->name('dashboard');
