<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('auth:api')->group(function () {

    Route::get('me', [AuthController::class, 'me'])->name('me');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});


Route::apiResource('product', ProductController::class);
