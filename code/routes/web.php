<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/users/{user}/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit.user');
Route::get('/users/{user}/show', [App\Http\Controllers\UsersController::class, 'show'])->name('show.user');
Route::patch('/users/{user}/patch', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
Route::resource('users',App\Http\Controllers\UsersController::class);

