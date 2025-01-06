<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/invoice', [DashboardController::class, 'invoice'])->name('invoice');
Route::get('/transaction', [DashboardController::class, 'transaction'])->name('transaction');


