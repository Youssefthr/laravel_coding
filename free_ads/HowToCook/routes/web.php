<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserWelcomeMail;
#use Illuminate\Support\Facades\Input;
use App\Models\Post;
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

#Admin dashboard
Route::get('/admin/page{index}', [App\Http\Controllers\UserController::class, 'index']);

#Show home page with post 
Route::get('/home/page{page_index}', [App\Http\Controllers\HomeController::class, 'index'])->name('home.show');

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
Route::get('/post/{post}/{user}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('post.edit'); 

#Update the post
Route::patch('/post/{post}/{user}/patch', [App\Http\Controllers\PostsController::class, 'update'])->name('post.update');  

#Delete the post
Route::delete('/post/{post}/{user}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('post.destroy');



#Show profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

#Show the form profile
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

#Update the profile when profile is already created
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

#Delete the profile
Route::delete('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'destroy'])->name('profile.destroy');


#Search bar

#Route::get('/post/search', [App\Http\Controllers\PostSearchController::class, 'index']);

Route::get ('/search', function () {
    return view ( 'posts/search' );
} );

Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $post = Post::where('description','LIKE','%'.$q.'%')
    ->orWhere('caption','LIKE','%'.$q.'%')
    ->orWhere('price','LIKE','%'.$q.'%')
    ->orWhere('location','LIKE','%'.$q.'%')
    ->orWhere('category','LIKE','%'.$q.'%')
    ->get();
    if(count($post) > 0)
        return view('posts/search')->withDetails($post)->withQuery ( $q );
    else return view ('posts/notExists');
});

