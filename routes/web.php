<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\SuperUserMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard – tampilkan data customer
Route::get('/dashboard', [CustomerController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Grup middleware untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customer
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::post('/customer/{id}/nonaktifkan', [CustomerController::class, 'nonaktifkan'])->name('customer.nonaktifkan');
    Route::post('/customer/{id}/deactivate', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
    Route::get('/customer/export', [CustomerController::class, 'export'])->name('customer.export');
    Route::get('/customer/hapus-nonaktif', [CustomerController::class, 'hapusOtomatisNonaktif'])->name('customer.hapus-nonaktif');
});

// Route khusus hanya untuk Super User
Route::middleware(['auth', SuperUserMiddleware::class])->group(function () {
    Route::get('/manage-users', [UserController::class, 'index'])->name('manage-users');
    Route::get('/create-user', fn () => view('create_user'))->name('create-user');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
});

// Auth scaffolding
require __DIR__.'/auth.php';
