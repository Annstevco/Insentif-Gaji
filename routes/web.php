<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\InsentifController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;

// User Details

// Registration Routes
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

// Login Routes
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Protected Routes with 'auth' Middleware

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-page', [NavigationController::class, 'showAdminPage'])->name('admin-page');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/insentif', [InsentifController::class, 'showDivisions'])->name('divisions');

    Route::post('/insentif/create', [InsentifController::class, 'create'])->name('insentif.create');

    Route::put('/insentif/update/{id}', [InsentifController::class, 'update'])->name('insentif.update');

    Route::delete('/insentif/delete/{id}', [InsentifController::class, 'delete'])->name('insentif.delete');
});

Route::middleware(['auth'])->group(function () {
    // Logout Route
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Personal detail view for logged-in user
    Route::get('/my-presensi/detail/{month?}', [UserController::class, 'showMyDetail'])->name('my.detail');

    // Personal riwayat view for logged-in user
    Route::get('/my-presensi/riwayat', [UserController::class, 'showMyRiwayat'])->name('my.riwayat');

    //admin detail view
    Route::get('/user/presensi/{nip}/{month?}', [UserController::class, 'showDetail'])->name('user.detail');

    //admin riwayat view
    Route::get('/user/{nip}', [UserController::class, 'showRiwayat'])->name('user.riwayat');

    //user view
    Route::get('/user/presensi', [UserController::class, 'showPresensi'])->name('user.presensi');




    // ... (add more protected routes as needed)
});
