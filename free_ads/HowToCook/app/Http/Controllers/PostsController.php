<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(){
        return view('posts/create');
    }

    public function store(){
        $validatedData = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        auth()->user()->posts()->create($validatedData);

        dd(request()->all());
    }
} 