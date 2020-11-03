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
        return view('profiles/edit', compact('user'));
    }
}
