<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    // Login, Register, Auth
    public function login()
    {
        return view('login');
    }
    public function registrasi()
    {
        return view('registrasi');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/main');
        }

        return redirect('/login')->withErrors($credentials)->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
