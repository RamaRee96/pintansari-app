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
    public function dataPasien(Request $request)
    {
        if($request->q) {
            $pasiens = Patient::orderBy('created_at', 'DESC')
                ->where('nama', 'LIKE', '%' . $request->q . '%')
                ->paginate(10);

        } else {
            $pasiens = Patient::orderBy('created_at', 'DESC')->paginate(10);

        }
        
        return view('/receptionist/dataPasien', compact('pasiens'));
    }
    public function editDataPasien($id)
    {
        $data = Patient::find($id);
        return view('/receptionist/editDataPasien', compact('data'));
    }

    public function rekamMedis(Request $request)
    {
        // dd($request->bulan);
        if($request->q) {
            // dd($request->bulan);
            $data = RekamMedis::whereDate('rekam_medis.created_at', Carbon::today())
                    ->whereHas('patient', function ($query) use ($request) {
                        $query->where('nama', 'LIKE', '%' . $request->q . '%');
                    })
                    ->whereYear('created_at', '=', substr($request->bulan, 0, 4))
                    ->whereMonth('created_at', '=', substr($request->bulan, 5, 2))
                    ->paginate(10);
        } else {
            $data = RekamMedis::whereDate('created_at', Carbon::today())->paginate(10);
        }
     
        return view('receptionist.rekam-medis', compact('data'));
    }

    public function createRekamMedis()
    {
        $data = Patient::all();
        return view('receptionist.create-rekam-medis', compact('data'));
    }

    public function storeRekamMedis(Request $request)
    {
        $validator = $request->validate([
            'patient_id' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'tensi' => 'required|regex:/^\d{2,3}\/\d{2,3}$/',
            'berat' => 'required|numeric',
            'keluhan' => 'required|string',
            'anamesis' => 'required|string',
        ]);


        RekamMedis::create($validator);

        return redirect()->back()->with('sukses', true);

    }

    public function showRekamMedis($id)
    {
        $data = RekamMedis::find($id);
        return view('receptionist.show-rekam-medis', compact('data'));
    }

    public function updateRekamMedis(Request $request, $id)
    {
        $validator = $request->validate([
            'tinggi' => 'required|numeric',
            'tensi' => 'required',
            'berat' => 'required|numeric',
            'keluhan' => 'required|string',
            'anamesis' => 'required|string',
        ]);

        $rekamMedis = RekamMedis::find($id);
        $validator['patient_id'] = $rekamMedis->patient->id;

        RekamMedis::where('id', $id)->update($validator);

        return redirect()->back()->with('sukses', true);

    }

    public function removeRekamMedis($id)
    {
        RekamMedis::where('id', $id)->delete();

        return redirect()->back()->with('sukses', true);
    }

    public function removePasien($id)
    {
        Patient::where('id', $id)->delete();

        return redirect()->back()->with('sukses', true);
    }

    public function updatePasien(Request $request, $id)
    {
        Patient::where('id', $id)->update([
            "nama" => $request->nama,
            "usia" => $request->usia,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "pekerjaan" => $request->pekerjaan,
            "no_telp" => $request->no_telp,
            "alamat" => $request->alamat
                ]);
        
        return redirect()->back()->with('sukses', true);

    }

}
