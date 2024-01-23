<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // halaman admin resepsionis
    public function resepsionis(Request $request)
    {
        if($request->q) {
            $data = User::where('role', 'resepsionis')->where('name', 'LIKE', '%' . $request->q . '%')->get();
        } else {
            $data = User::where('role', 'resepsionis')->get();
        }
        
        return view('/admin/resepsionis', compact('data'));
    }
    // halaman admin dokter
    public function dokter(Request $request)
    {
        if($request->q) {
            $data = User::where('role', 'dokter')->where('name', 'LIKE', '%' . $request->q . '%')->get();
        } else {
            $data = User::where('role', 'dokter')->get();
        }

        return view('/admin/dokter', compact('data'));
    }
    // halaman admin apoteker
    public function apoteker(Request $request)
    {
        if($request->q) {
            $data = User::where('role', 'apoteker')->where('name', 'LIKE', '%' . $request->q . '%')->get();
        } else {
            $data = User::where('role', 'apoteker')->get();
        }

        return view('/admin/apoteker', compact('data'));
    }
}
