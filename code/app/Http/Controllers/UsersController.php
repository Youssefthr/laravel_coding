<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::latest()->paginate(5);
               return view('users.index',compact('users'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                   'name' => 'required',
                   'email' => 'required',
                    'password' => 'required',
               ]);
         
               Users::create($request->all());
          
               return redirect()->route('users.index')
                               ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        return view('users/show', ['users' => Users::findOrFail($id)]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        return view('users.edit',compact('users'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        $validatedData=request()->validate([
            'name' => '',
            'email' => '',
         'password' => '', 
        ]);

        if(request('password')) {
            $validatedData['password']= Hash::make($validatedData['password']);
            }
        auth()->user()->update($validatedData);
         
               return redirect()->route('users.index')
                               ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        $users->delete();
          
                return redirect()->route('users.index')
                                ->with('success','User deleted successfully');
    }
}
