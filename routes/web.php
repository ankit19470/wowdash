<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\fronted\RegisterController;
use App\Http\controllers\fronted\LoginController;
use App\Http\controllers\fronted\AddUserController;
use App\Http\controller\fronted\LogoutController;
use App\Http\Controllers\fronted\PermissionController;
use App\Http\Controllers\fronted\RoleController;
use App\Http\Controllers\fronted\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleLogin;
use App\Http\Controllers\fronted\AddCategory;
use App\Http\Middleware\CheckMultipleRoles;
// use App\Http\Middleware\IsAdmin;
// use App\Http\Middleware\IsEmployee;





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


// Route::group(['middleware' => ['role:employe']], function() {
    // Route::group(['middleware' => [isEmployee::class]], function () {
Route::get('/user-role-show', [UserRoleLogin::class, 'showRoles'])->name('user-role-show');

Route::group(['middleware' => ['role:Admin']], function() {

// Route::group(['middleware' => [IsAdmin::class]], function () {
    Route::get('user-page', [AddCategory::class, 'showUsers'])->name('user-page');

});
// Route::group(['middleware' => [IsEmployee::class]], function () {
Route::group(['middleware' => ['role:user']], function() {

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
    // Route::post('', [RoleController::class, 'store'])->name('add-role');
    Route::post('/roles', [RoleController::class, 'store'])->name('add-role');
    Route::get('list-role', [RoleController::class, 'showRole'])->name('list-role');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // Route::get('update-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
    // Route::put('update-role/{id}', [RoleController::class, 'update'])->name('role.update');
    // web.php
    // Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    // Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

    // route::get('roles/{$role->id}/give-permissions',[RoleController::class,'addPermissionToRole']);


    Route::get('add-module', [ModuleController::class, 'index'])->name('modules.create'); // Route to display the form
    Route::post('add-module', [ModuleController::class, 'store'])->name('modules.store');

    // Route::get('/view-profile', [ProfileController::class, 'show'])->name('profile.show');
    // Route to view the user profile
    Route::get('view-profile', [ProfileController::class, 'profile'])->name('profile.view');

    // Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.updateProfile');

    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::get('/users', [AddUserController::class, 'filter'])->name('users.filter');

    Route::put('/role/{id}/permissions', [UserRoleLogin::class, 'assignPermissions']);

    Route::get('/role/{id}/modules', [UserRoleLogin::class, 'showModulesAndPermissions']);
});

// Route::get('/user-role-show', [UserRoleLogin::class, 'showRoles'])->name('user-role-show');
// Routes for Admin role
// Route::group(['middleware' => ['role:Admin', CheckMultipleRoles::class]], function () {
//     Route::group(['middleware' => ['isAdmin']], function () {
//     Route::get('user-page',[AddCategory::class,'showUsers'])->name('user-page');
// });

// Route::get('user-page',[AddCategory::class,'showUsers'])->name('user-page');
// Route::get('user-page', [AddCategory::class, 'showUsers'])
//     ->middleware([CheckMultipleRoles::class])
//     ->name('user-page');
// Route::group(['middleware' => ['role:Admin']], function () {
// Route::get('user-page',[AddCategory::class,'showUsers'])->name('user-page');

// });


// use App\Http\Controllers\fronted\AddCategory;

// Route::middleware(['web', 'checkRole:admin'])->group(function () {
//     Route::get('user-page', [AddCategory::class, 'showUsers'])->name('user-page');
// });





// Route::resource('user', UserController::class);
// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
// });

// Route::group([],function(){

// });
