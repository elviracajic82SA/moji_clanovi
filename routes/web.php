<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FeePlanController;
use App\Http\Controllers\PaymentController;

Route::get('/', fn() => redirect()->route('members.index'));

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('members', MemberController::class);
    Route::resource('fee-plans', FeePlanController::class)->parameters(['fee-plans' => 'fee_plan']);
    Route::resource('payments', PaymentController::class);
    Route::patch('/payments/{payment}/mark-paid', [PaymentController::class,'markPaid'])->name('payments.markPaid');
});
