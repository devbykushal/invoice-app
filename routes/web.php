<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/invoice', [DashboardController::class, 'invoice'])->name('invoice');
Route::get('/invoice/transaction', [DashboardController::class, 'transaction'])->name('transaction');
Route::get('/invoice/transaction/{invoice_id}', [DashboardController::class, 'viewTransaction'])->name('transaction.single');
Route::get('lang/{locale}', [LanguageController::class, 'switchLanguage'])
    ->name('lang');
