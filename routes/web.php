<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\fronted\RegisterController;
use App\Http\controllers\fronted\LoginController;
use App\Http\controllers\fronted\AddUserController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('sign-up',[RegisterController::class,'index'])->name('sign-up');
Route::POST('/register',[RegisterController::class,'register'])->name('register');


Route::get('/',[LoginController::class,'index'])->name('sign-in');
Route::POST('/login', [LoginController::class, 'login'])->name('login');

Route::get('add-user',[AddUserController::class,'index'])->name('add-user');
Route::post('/adding',[AddUserController::class,'AddUser'])->name('adding');

Route::get('list-user',[AddUserController::class,'showUser'])->name('list-user');


// Route::get('/add-user', function () {
//     return view('fronted/add-user');
// });
