<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\AuthController;

Route::get('/', function () {
    $pageTitle='Blogger - Home';
    return view('frontend.home.index',compact('pageTitle'));
});


Route::get('register',[AuthController::class,'showRegister']);
Route::post('register',[AuthController::class,'register'])->name('register');

Route::get('login',[AuthController::class,'showLogin']);
Route::post('login',[AuthController::class,'login'])->name('login');

Route::get('logout',[AuthController::class,'logout'])->name('logout');


// Route::get('add/todo',[TodoController::class,'index']);
// Route::post('add/todo',[TodoController::class,'create']);
// Route::get('todo-list',[TodoController::class,'show']);
// Route::get('edit/todo/{id}', [TodoController::class,'edit'])->name('edit');
// Route::put('update/todo/{id}', [TodoController::class,'update'])->name('update');
// Route::delete('delete/todo/{id}', [TodoController::class,'delete'])->name('delete');