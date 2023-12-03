<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboadContrller;
use App\Http\Controllers\ChanelController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('loginStore');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgot-password', [LoginController::class, 'forGotPassword'])->name('forGotPassword');
Route::post('forgot-password', [LoginController::class, 'sentPassword'])->name('sentPassword');
Route::name('admin.')->middleware('AdminLogin')->prefix('')->group(function () {
    Route::get('/', [DashboadContrller::class, 'index'])->name('dashboad');
    Route::get('channel', [ChanelController::class, 'index'])->name('channel-list');
    Route::get('table', [TableController::class, 'index'])->name('table-list');
    Route::prefix('/setting')->group(function () {
        Route::get('', [ConfigController::class, 'index'])->name('setting');
        Route::post('', [ConfigController::class, 'store'])->name('setting-store');
        Route::post('/{id}', [ConfigController::class, 'update'])->name('setting-update');
    });
    Route::prefix('user')->group(function () {
        Route::middleware('IsAdmin')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('user');
            Route::get('/create', [UserController::class, 'create'])->name('user-create');
            Route::post('/create', [UserController::class, 'store']);
        });
           Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
        Route::get('/update/{id}', [UserController::class, 'edit'])->name('user-update');
        Route::post('/update/{id}', [UserController::class, 'update']);
    });
});
