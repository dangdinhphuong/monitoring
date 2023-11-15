<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboadContrller;
use App\Http\Controllers\ChanelController;
use App\Http\Controllers\Admin\ConfigController;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('loginStore');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::name('admin.')->middleware('AdminLogin')->prefix('')->group(function () {
    Route::get('/', [DashboadContrller::class, 'index'])->name('dashboad');
    Route::get('channel', [ChanelController::class, 'index'])->name('channel-list');
    Route::prefix('/setting')->group(function () {
        Route::get('', [ConfigController::class, 'index'])->name('setting');
        Route::post('', [ConfigController::class, 'store'])->name('setting-store');
        Route::post('/{id}', [ConfigController::class, 'update'])->name('setting-update');
    });
});
