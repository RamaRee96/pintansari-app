<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // halaman admin resepsionis
    public function resepsionis()
    {
        $data = User::where('role', 'resepsionis')->orderBy('created_at', 'DESC')->get();
        return view('/admin/resepsionis', compact('data'));
    }
    // halaman admin dokter
    public function dokter()
    {
        $data = User::where('role', 'dokter')->orderBy('created_at', 'DESC')->get();
        return view('/admin/dokter', compact('data'));
    }
    // halaman admin apoteker
    public function apoteker()
    {
        $data = User::where('role', 'apoteker')->orderBy('created_at', 'DESC')->get();
        return view('/admin/apoteker', compact('data'));
    }
}
