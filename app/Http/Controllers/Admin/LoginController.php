<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin()
    {

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {

        if (Auth::attempt($request->validated())) {

            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
