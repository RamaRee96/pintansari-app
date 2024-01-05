<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function getRekamMedis()
    {
        return view('dokter.rekam-medis');
    }

    public function dataResep()
    {
        return view('dokter.dataResep');
    }
}
