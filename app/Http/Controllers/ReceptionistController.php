<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    // halaman dashboard resepsionis
    public function index()
    {
        return view('/receptionist/index');
    }
    public function dataPasien()
    {
        return view('/receptionist/dataPasien');
    }

}
