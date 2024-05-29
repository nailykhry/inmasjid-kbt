<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function authenticate(Request $request)
    {   

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $user = User::where('email', '=', $request->input('email'), 'and', 'password', '=', Hash::make($request->input('password')) )->get();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if($user && $user[0]->role == 'admin'){
                return redirect()->intended('/admin');
            }
            else{
                return redirect()->intended('/');
            }
        }
        
        return back()->with('loginError', 'Gagal Login');

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        session()->forget('current_session');

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
