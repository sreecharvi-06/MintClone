<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\BillController;

Route::get('/', fn() => redirect('/login'));

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::post('/logout',[AuthController::class,'logout']);

    Route::resource('accounts', AccountController::class)->except('show');
    Route::resource('transactions', TransactionController::class)->except('show');
    Route::resource('budgets', BudgetController::class)->except('show');
    Route::resource('goals', GoalController::class)->except('show');
        Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
    Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');
    Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
});






