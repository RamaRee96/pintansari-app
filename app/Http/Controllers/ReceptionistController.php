<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReceptionistController extends Controller
{
    // halaman dashboard resepsionis
    public function index()
    {

        return view('/receptionist/index');
    }
    public function dataPasien()
    {
        $pasiens = Patient::orderBy('created_at', 'DESC')->get();
        return view('/receptionist/dataPasien', compact('pasiens'));
    }
    public function editDataPasien()
    {
        return view('/receptionist/editDataPasien');
    }

    public function rekamMedis()
    {
        $data = RekamMedis::whereDate('created_at', Carbon::today())->get();
        return view('receptionist.rekam-medis', compact('data'));
    }

    public function createRekamMedis()
    {
        return view('receptionist.create-rekam-medis');
    }

}
