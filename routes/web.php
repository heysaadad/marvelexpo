<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;



Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/terms-and-conditions', [MainController::class, 't_c'])->name('terms-and-conditions');
Route::get('/buy', [MainController::class, 'buy'])->name('buyGet');
Route::post('/buy', [MainController::class, 'buy'])->name('buyPost');
Route::get('/pay', [MainController::class, 'pay'])->name('payGet');
Route::post('/pay', [MainController::class, 'pay'])->name('payPost');
Route::get('/success', [MainController::class, 'success'])->name('success');

// Route::get('/admin', [MainController::class, 'adminIndex']);
// Route::post('/search', [MainController::class, 'searchInvoice']);


Route::get('/dashboard', [MainController::class, 'adminIndex'])->middleware(['auth'])->name('dashboard');
Route::post('/search', [MainController::class, 'searchInvoice'])->middleware(['auth'])->name('search');
Route::post('/logout', [MainController::class, 'logout'])->middleware(['auth'])->name('logouts');
Route::post('/verifypayment', [MainController::class, 'verifypayment'])->middleware(['auth'])->name('verifypayment');
Route::post('/cancelorder', [MainController::class, 'cancelorder'])->middleware(['auth'])->name('cancelorder');
Route::get('/sendsms', [MainController::class, 'getSms'])->middleware(['auth'])->name('getSms');
Route::post('/sendsms', [MainController::class, 'postSms'])->middleware(['auth'])->name('postSms');

require __DIR__.'/auth.php';
