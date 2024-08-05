<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/** Routes related to HomeController */

Route::get('/', [HomeController::class, 'index'])->name('index');




/** Routes related to Registration */

// Route to display the registration form
Route::get('/register', [UserController::class, 'registration'])->name('registration');

// Route to handle registration form submission
Route::post('/register', [UserController::class, 'register']);





/** Routes related to Login */

// Route to handle login form
Route::get('/login', [UserController::class, 'loginform'])->name('loginform');

// Route to handle login form submission
Route::post('/login', [UserController::class, 'login']);


// Route to handle logout
Route::post('/logout', [UserController::class,'logout']);






