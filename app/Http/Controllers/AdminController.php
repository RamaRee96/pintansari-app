<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // tambah resepsionis
    public function createResepsionis()
    {
        return view("admin.tambahResepsionis");
    }

    public function createDokter()
    {
        return view("admin.tambahDokter");
    }

    public function createApoteker()
    {
        return view("admin.tambahApoteker");
    }
}
