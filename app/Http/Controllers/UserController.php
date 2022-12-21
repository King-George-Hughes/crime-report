<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'other_name' => 'nullable|min:3',
            'role' => 'nullable',
            'gender' => 'required',
            'dob' => 'required',
            'contact' => 'required',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed | min:6'
        ]);
        
        // Hashed Password
        $formFields['password'] = bcrypt($formFields['password']);
        
        $user = User::create($formFields);

        auth()->login($user);
        
        return redirect('/')->with('message', 'Account created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Login User Page
    public function login()
    {
        return view('users.login');
    }
    
    // Login a User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Login Successful');
        };

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Logged Out Successful!');
    }
}