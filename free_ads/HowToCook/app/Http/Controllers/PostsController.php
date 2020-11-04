<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); ##you need to authenticate if you want to access to other method
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('posts/index', compact('posts'));
    }

    public function create(){
        return view('posts/create');
    }

    public function store(){
        $validatedData = request()->validate([
            'caption' => 'required',
            'category'=> 'required',
            'description' => 'required',
            'price' => 'required',
            'location' => 'required',
            'image' => ['required', 'image'],
        ]);
        
        $imagePath = request('image')->store('uploads', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit (1200, 1000); #cut the image to have perfect square -use intervention/image
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $validatedData['caption'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'location' => $validatedData['location'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit(Post $post){
        #$this->authorize('update', $post->user_id);
        return view('posts/edit', compact('post'));
    }

    public function update(Post $post){

        #$this->authorize('update', $post->user_id);
        $validatedData = request()->validate([
            'caption' => 'required',
            'category' => '',
            'description' => '',
            'price' => 'required',
            'location' => 'required',
            'image' => '',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('post', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem
            $image = Image::make(public_path("storage/{$imagePath}"))->fit (1000, 1000); #cut the image to have perfect square -use intervention/image
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->post->update(array_merge(
            $validatedData, 
            $imageArray ?? [], ## if $imageArray exists then the merge takes $imagePath else it returns an empty array
        )); #auth means, user has to authenticate if he wants to access to update

        return redirect("profile/{$post->user_id}");
    }

}   