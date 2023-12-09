<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChanelController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\VnPayController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware(['noauth'])->group(function () {
    Route::get('channel', [ChanelController::class, 'index']);
    Route::post('channel', [ChanelController::class, 'store']);
   Route::put('channel', [ChanelController::class, 'edit']);
   Route::delete('channel/{id}', [ChanelController::class, 'delete']);
   Route::prefix('/setting')->group(function () {
    Route::get('', [ConfigController::class, 'index'])->name('setting');
    Route::post('', [ConfigController::class, 'store'])->name('setting-store');
    Route::post('/{id}', [ConfigController::class, 'update'])->name('setting-update');
    Route::delete('/{id}', [ConfigController::class, 'delete']);
});
});

Route::get('vn-pay', [VnPayController::class, 'create']);