<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    #public function __construct()
    #{
     #   $this->middleware('auth');
    #}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($page_index, Post $post){ #page number
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('posts/index', compact('posts'), compact('page_index'));
    }
}
