<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create()
    {
        $dokter = User::where('role', 'dokter')->get();

        return view("patients.create", compact('dokter'));
    }

    public function store(Request $request)
    {
        Patient::create([
            'nama' => $request->nama,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'pekerjaan' => $request->pekerjaan,
        ]);

        return redirect()->back()->with('sukses', true);
    }
}
