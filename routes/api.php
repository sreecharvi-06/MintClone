<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('accounts',[AccountController::class,'index']);
    Route::post('accounts',[AccountController::class,'store']);

    Route::post('transactions',[TransactionController::class,'store']);
});
