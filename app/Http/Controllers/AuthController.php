<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Patient;
use App\Models\RekamMedis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    //Profim Page

    public function index()
    {
        if(Auth::user()->role === 'admin') {
            $totalResepsionis = User::where('role', 'resepsionis')->count();
            $totalDokter = User::where('role', 'dokter')->count();
            $totalApoteker = User::where('role', 'apoteker')->count();
            return view('auth.dashboard', compact('totalResepsionis', 'totalDokter', 'totalApoteker'));
        } elseif (Auth::user()->role === 'resepsionis') {
            $totalPasien = Patient::count();
            $totalPasienInMonth = Patient::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
            $totalPasienToday = Patient::whereDate('created_at', Carbon::today())->count();

            return view('receptionist.index', compact('totalPasien', 'totalPasienInMonth', 'totalPasienToday'));
        } elseif (Auth::user()->role === 'dokter') {
            $totalAntrian = RekamMedis::where('status', 'antri')->count();
            return view('dokter.index', compact('totalAntrian'));
        } elseif (Auth::user()->role === 'apoteker') {
            $totalObat = Obat::count();
            return view('apoteker.index', compact('totalObat'));
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

        if (Auth::attempt($rules)) {

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
