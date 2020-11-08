<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{



    public function index(User $user){ #$user is the id of the user
        $me = Auth::user();
        return view('profiles/index', compact('user'), compact('me')); #compact function mean 'user' => $use
    }

    public function edit(User $user){
        $me = Auth::user();
        if($user->id == $me->id || $me->is_admin == "yes") {
            return view('profiles/edit', compact('user'));
        }
    }

    public function update(User $user){
        $me = Auth::user();
        if($user->id == $me->id || $me->is_admin == "yes") {
            $validatedDataProfile = request()->validate([
                'title' => 'required',
                'description' => '',
                'url' => '',
                'image' => '',
            ]);
            
            $validatedDataUser = request()->validate([
                'login' => 'required',

                'email' => 'required',
                'phone' => 'required',
                'nickname' => 'required',
            ]);
    
            if (request('image')) {
                $imagePath = request('image')->store('profile', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem");
                $image = Image::make(public_path("storage/$imagePath"))->fit(1000, 1000); #cut the image to have perfect square -use intervention/image
                $image->save();
                $imageArray = ['image' => $imagePath];
            }
            
            #dd(strlen(request('password')));
            if (request('password') !== null && strlen(request('password'))>=8) {
                $validatedDataUser['password']= Hash::make(request('password'));
            }
            elseif (request('password') !== null){
                echo '<script>alert("Invalid password, 8 characters minimum. Please retry")</script>'; 
            }
            
            $user->profile->update(array_merge(
                $validatedDataProfile,
                $imageArray ?? [], ## if $imageArray exists then the merge takes $imagePath else it returns an empty array
            )); #auth means, user has to authenticate if he wants to access to update
    
            $user->update($validatedDataUser);
            return redirect("profile/{$user->id}");
        }
    }

    public function destroy(User $user){
        $me = Auth::user();
        if($user->id == $me->id || $me->is_admin == "yes") {
            $User = User::where('id', $user->id) ->get()->first();
            $Posts = Post::where('user_id', $user->id)->get()->first();
            if (isset($Posts)) {
                $Posts->delete();
            }
            $User->delete();
            return redirect("home/page0");
        }
        else {
            return redirect("/home/page0");
        }
            
    }
}
