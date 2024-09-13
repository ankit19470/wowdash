<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\fronted\RegisterController;
use App\Http\controllers\fronted\LoginController;
use App\Http\controllers\fronted\AddUserController;
use App\Http\controller\fronted\LogoutController;
use App\Http\Controllers\fronted\PermissionController;
use App\Http\Controllers\fronted\RoleController;





// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('sign-up',[RegisterController::class,'index'])->name('sign-up');
Route::POST('/register',[RegisterController::class,'register'])->name('register');


// Route::get('/',[LoginController::class,'index'])->name('sign-in');
Route::POST('/login', [LoginController::class, 'login'])->name('login');

Route::get('/', [LoginController::class, 'index'])->name('sign-in');
Route::get('/logout',function(){
  if(session()->has('email'))
  {
    session()->pull('email');
  }
return redirect('/');

});
// Route::post("/user",[LoginCover::class,'check'])->name('user');



Route::get('add-user',[AddUserController::class,'index'])->name('add-user');
Route::post('/adding',[AddUserController::class,'AddUser'])->name('adding');

Route::get('list-user',[AddUserController::class,'showUser'])->name('list-user');
// Route::delete('/user/{id}', [AddUserController::class, 'destroy'])->name('user.destroy');
Route::delete('/users/{id}', [AddUserController::class, 'destroy'])->name('users.destroy');
// Route::get("/update-user/{id}", [AddUserController::class, 'updateData']);
Route::get('/update-user/{id}', [AddUserController::class, 'edit'])->name('user.edit');
Route::put('/update-user/{id}', [AddUserController::class, 'update'])->name('users.update');
// Route::get('/add-permission',[PermissionController::class,'index'])->name('add-permission');
Route::get('add-permission', [PermissionController::class, 'index'])->name('permissions.index');

Route::post('store-permission', [PermissionController::class, 'store'])->name('permissions.store');

Route::get('list-permission', [PermissionController::class, 'ListPermission'])->name('list-permission');
Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

Route::get('update-permission/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('update-permission/{id}', [PermissionController::class, 'update'])->name('permissions.update');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('add-role',[RoleController::class,'index'])->name('add-role');

