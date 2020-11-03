<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        auth()->user()->profile->update($validatedData); #auth means, user has to authenticate if he wants to access to update

        return redirect("profile/{$user->id}");
    }
}
