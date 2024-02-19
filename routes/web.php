<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuLevelController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['web', 'guest']], function()  {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
    
});

Route::post('/users', [UserController::class, 'store']);

Route::group(['middleware' => ['web', 'auth']], function()  {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout']);

    // users
    Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/dashboard/users/{user}', [UserController::class, 'update']);

    // menu-levels
    Route::resource('/dashboard/menu-levels', MenuLevelController::class);
    Route::get('/dashboard/menu-levels/{menuLevel}/delete', [MenuLevelController::class, 'delete']);

    // menus
    Route::resource('/dashboard/menus', MenuController::class);
    Route::get('/dashboard/menus/{menu}/delete', [MenuController::class, 'delete']);

    // menu-users
    Route::resource('/dashboard/menu-users', MenuUserController::class);
    Route::get('/dashboard/menu-users/{menuUser}/delete', [MenuUserController::class, 'delete']);

    // menus
    Route::get('/dashboard/menus', [MenuController::class, 'index']);
    Route::get('/dashboard/menus/create', [MenuController::class, 'create']);

});

Route::get('/', [UserController::class, 'login']);
