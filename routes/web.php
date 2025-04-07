<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Public Route - Homepage
Route::get('/', function () {
    $pageTitle = 'Blogger - Home';
    return view('frontend.home.index', compact('pageTitle'));
});


// Guest-only Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegister']);
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('login', [AuthController::class, 'showLogin']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
    // Add any other protected routes here, like:
    // Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route::get('/add/blog', [BlogController::class, 'create']);
});
