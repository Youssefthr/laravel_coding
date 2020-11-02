<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user) #$user is the id of the user
    {
        $user = User::findOrFail($user); ##proper response if the profile doesn't exist
        return view('profiles/index', [
            'user' => $user,
        ]);
    }
}
