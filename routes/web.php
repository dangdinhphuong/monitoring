<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboadContrller;



Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('loginStore');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::name('admin.')->middleware('AdminLogin')->prefix('')->group(function () {
    Route::get('/', [DashboadContrller::class, 'index'])->name('dashboad');
    Route::get('/{any}', [DashboadContrller::class, 'index'])->name('dashboad');
});
