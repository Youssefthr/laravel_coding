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

#Show home page with post 
Route::get('/home/page{page_index}', [App\Http\Controllers\HomeController::class, 'index']);

#Change route to logout, redirect to home page 0
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});




#Show the post form
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create']);

#Save img, description, caption etc into DB (ADD POST)
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store']);

#Show the form post
Route::get('/post/{post}/{user}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('post.edit'); ## OK

#Update the post
Route::patch('/post/{post}/{user}/patch', [App\Http\Controllers\PostsController::class, 'update'])->name('post.update');  ## ???





#Show profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

#Show the form profile
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

#Update the profile when profile is already created
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
