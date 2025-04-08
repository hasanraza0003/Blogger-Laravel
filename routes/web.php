<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;


// Public Route - Homepage
Route::get('/', function () {
    $pageTitle = 'Blogger - Home';

    $data=Blog::all();

    return view('frontend.home.index', compact('data','pageTitle'));
});
Route::get('/about', function () {
    $pageTitle = 'Blogger - About';
    return view('frontend.about.aboutSec', compact('pageTitle'));
});


// Guest-only Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegister']);
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('login', [AuthController::class, 'showLogin']);
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


// Authenticated Routes
Route::middleware('auth.custom')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('user/profile',[UserController::class,'showProfile'])->name('profile');
    
    Route::get('create/blog',[BlogController::class,'showBlogCreateForm'])->name('blog.create');
    Route::post('create/blog',[BlogController::class,'store'])->name('blog.store');
    
    Route::get('show/blog/{id}',[BlogController::class,'showBlog'])->name('blog.show');

});
