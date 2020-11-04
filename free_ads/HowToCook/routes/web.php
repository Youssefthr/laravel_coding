<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;

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


#register and sign in
Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

#Show the post form
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create']);

#Save img, description, caption etc into DB
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);

#Show profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

#Show the form profile
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

#Update the profile when profile is already created
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');