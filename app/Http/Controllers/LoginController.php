<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard');

        } else if(Auth::guard('students')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard');

        } else {

            return redirect('/')->with('loginFailed', 'Username atau password salah');

        }
    }

    public function logout(Request $request)
    {
        if(Auth::guard('admins')->check()) {

            Auth::guard('admins')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
    
            return redirect('/');

        } else if(Auth::guard('students')->check()) {

            Auth::guard('students')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
    
            return redirect('/');

        }
    }
}
