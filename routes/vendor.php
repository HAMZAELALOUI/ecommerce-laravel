<?php 
use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

/* VENDOR ROUTES **/
Route::get('dashboard' ,[VendorController::class,'dashboard'])->name('dashboard');

