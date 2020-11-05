<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

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
        $validatedDataProfile = request()->validate([
            'title' => 'required',
            'description' => '',
            'url' => '',
            'image' => '',
        ]);
        
        $validatedDataUser = request()->validate([
            'login' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nickname' => 'required',
        ]);


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem
            $image = Image::make(public_path("storage/{$imagePath}"))->fit (1000, 1000); #cut the image to have perfect square -use intervention/image
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        $validatedDataUser['password']= Hash::make($validatedDataUser['password']);
       

        auth()->user()->profile->update(array_merge(
            $validatedDataProfile, 
            $imageArray ?? [], ## if $imageArray exists then the merge takes $imagePath else it returns an empty array
        )); #auth means, user has to authenticate if he wants to access to update

        auth()->user()->update($validatedDataUser); 

        return redirect("profile/{$user->id}");
    }

    public function destroy(User $user){
        $this->authorize('update', $user->profile);
        $User = User::where('id', $user->id)->get()->first();
        $User->delete();
        return redirect("home/page0");
    }
}
