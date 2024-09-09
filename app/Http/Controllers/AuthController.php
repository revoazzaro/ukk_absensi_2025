<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $crendential = Auth::attempt($request->only('email', 'password'));
        if ($crendential) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'email or password is wrong']);
    }

    public function logout() 
    {
        auth::logout();
        return redirect()->route('login');
    }
}
