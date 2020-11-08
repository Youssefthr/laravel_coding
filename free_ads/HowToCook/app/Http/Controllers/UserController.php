<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($page_index, User $users){ 
        $me = Auth::user();
        if ($me->is_admin == "yes"){
            $users = User::all();
            return view('profiles/admin', compact('users'), compact('page_index')); 
        }
        else {
            return redirect("home/page0");
        }
    }
}
