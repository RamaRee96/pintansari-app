<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApotekerController extends Controller
{
    public function dataObat()
    {
        $data = Obat::orderBy('created_at', 'DESC')->paginate(5);
        return view('/apoteker/dataObat', compact('data'));
    }

    public function tambahObat()
    {
        return view('apoteker.tambah-obat');
    }

    public function createObat(Request $request)
    {
   
        $validateData  = $request->validate(
            [
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:1',
            'kandungan' => 'required|string',
            'status' => 'required|in:tersedia,tidak tersedia',
            'stock' => 'required|integer|min:0',
        ]
        );

        Obat::create($validateData);


        return redirect()->back()->with('sukses', true);
    }

    public function editObat($id)
    {
        $obat = Obat::where('id', $id)->first();

        return view('apoteker.edit-obat', compact('obat'));
    }

    public function deleteObat($id)
    {
        
        Obat::where('id', $id)->delete();

        return redirect()->back()->with('suksesDelete', true);
    }

    public function updateObat(Request $request, $id)
    {
   
        $validateData  = $request->validate(
            [
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:1',
            'kandungan' => 'required|string',
            'status' => 'required|in:tersedia,tidak tersedia',
            'stock' => 'required|integer|min:0',
        ]
        );

        Obat::where('id', $id)->update($validateData);


        return redirect()->back()->with('sukses', true);
    }

    public function pasienSudahDiperiksa()
    {
        $data = RekamMedis::where('status', 'sudah diperiksa')->orderBy('created_at', 'ASC')->whereDate('created_at', Carbon::now())->paginate(5);
        return view('apoteker.pasien-sudah-diperiksa', compact('data'));
    }

    public function editRekamMedis($id)
    {
        $data = RekamMedis::where('id', $id)->with('obats')->first();
        $totalHargaObat = 0;

        foreach ($data->obats as $obat) {
            $totalHargaObat += $obat->harga;
        }


        return view('apoteker.edit-rekam-medis', compact('data', 'totalHargaObat'));
    }

    public function updateRekamMedis(Request $request, $id)
    {
        RekamMedis::where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('sukses', true);

    }
}
