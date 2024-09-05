<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\fronted\RegisterController;
use App\Http\controllers\fronted\LoginController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('sign-up',[RegisterController::class,'index'])->name('sign-up');
Route::POST('/register',[RegisterController::class,'register'])->name('register');


Route::get('/',[LoginController::class,'index'])->name('sign-in');
Route::POST('/login', [LoginController::class, 'login'])->name('login');

// Route::get('dashboard',[RegisterController::class,'index'])->name('sign-up');
Route::get('/dashboard', function () {
    return view('/fronted/dashboard');
});
