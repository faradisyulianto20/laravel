<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('buku', BukuController::class);

Route::get('buku', [BukuController::class, 'index'])->name('buku.index');

Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');

Route::post('buku', [BukuController::class, 'store'])->name('buku.store');

Route::get('buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');

Route::put('buku/{buku}', [BukuController::class, 'update'])->name('buku.update');

Route::delete('buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.dashboard');