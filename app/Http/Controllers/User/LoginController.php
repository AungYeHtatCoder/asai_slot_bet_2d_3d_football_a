<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        if(Auth::check()){
            return redirect()->back()->with('error', "Already Logged In.");
        }else{
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {   
        
        $request->validate([
            'phone' => 'required', // Input field named 'login' can hold either email or phone
            'password' => ['required', 'string', 'min:6'],
        ]);


        $credentials = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed
           
            return redirect('/')->with('success', 'Login Success!');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'min:11', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Create user based on provided credentials
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/home')->with('success', 'Logged In Successful.');
        } else {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }


    public function userRegister()
    {
        if(Auth::check()){
            return redirect()->back()->with('error', "Already Logged In.");
        }else{
            return view('auth.register');
        }
    }



}