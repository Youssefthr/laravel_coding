<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user){ #$user is the id of the user
        return view('profiles/index', compact('user')); #compact function mean 'user' => $use
    }

    public function edit(User $user){

        $this->authorize('update', $user->profile);
        return view('profiles/edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);
        $validatedData = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem
            $image = Image::make(public_path("storage/{$imagePath}"))->fit (1000, 1000); #cut the image to have perfect square -use intervention/image
            $image->save();
        }

        auth()->user()->profile->update(array_merge
            ($validatedData, 
            ['image' => $imagePath],
        )); #auth means, user has to authenticate if he wants to access to update

        return redirect("profile/{$user->id}");
    }
}
