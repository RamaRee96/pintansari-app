<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    //Profim Page

    public function index()
    {
        if(Auth::user()->role === 'admin'){
        return view('auth.dashboard');
        }
        elseif (Auth::user()->role === 'resepsionis') {
            return view('receptionist.index');
        }
        elseif (Auth::user()->role === 'dokter') {
            return view('dokter.index');
        }
        elseif (Auth::user()->role === 'apoteker') {
            return view('apoteker.index');
        }
    }
    
    //Manage connection
   
    public function login(Request $request)
    {
        
        //memungkinkan kita untuk mengambil semua data dari sebuah permintaan

        

        $rules = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if (Auth::attempt($rules)){

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email not recognized',
            'password' => 'Password not recognized'
        ]);
    }

    public function login_page()
    {
        return view('welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
