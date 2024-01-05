<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // halaman admin resepsionis
    public function resepsionis()
    {
        return view('/admin/resepsionis');
    }
    // halaman admin dokter
    public function dokter()
    {
        return view('/admin/dokter');
    }
    // halaman admin apoteker
    public function apoteker()
    {
        return view('/admin/apoteker');
    }
}
