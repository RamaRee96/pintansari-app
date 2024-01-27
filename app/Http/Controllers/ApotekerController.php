<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApotekerController extends Controller
{
    public function dataObat(Request $request)
    {
        if($request->q) {
            $data = Obat::orderBy('created_at', 'DESC')->where('nama', 'LIKE', '%' . $request->q . '%')->paginate(10);
        } else {
            $data = Obat::orderBy('created_at', 'DESC')->paginate(10);

        }

       
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

    public function pasienSudahDiperiksa(Request $request)
    {
        if($request->q) {
            $data = RekamMedis::where('status', 'sudah diperiksa')->orderBy('created_at', 'ASC')->whereHas('patient', function ($query) use ($request) {
                $query->where('nama', 'LIKE', '%' . $request->q . '%');
            })
            ->whereYear('created_at', '=', $request->bulan ?substr($request->bulan, 0, 4) : Carbon::now()->year)
            ->whereMonth('created_at', '=', $request->bulan ? substr($request->bulan, 5, 2) : Carbon::now()->month)->paginate(10);
        } else {
            $data = RekamMedis::where('status', 'sudah diperiksa')->orderBy('created_at', 'ASC')->whereDate('created_at', Carbon::now())->paginate(5);
        }

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

    public function generateNota($id)
    {

        $rekamMedis = RekamMedis::where('id', $id)->with('obats')->first();
        $totalHargaObat = 0;
        $biayaPelayanan = 70000;

        
        foreach ($rekamMedis->obats as $obat) {
            $totalHargaObat += $obat->harga;
        }

        $totalPembayaran =  $biayaPelayanan + $totalHargaObat;

        $logo = asset('/images/pintansari.png');

        Carbon::setLocale('id');

        $currentDate = Carbon::now()->translatedFormat('j F Y');
  
        $data = [
            'title' => 'Nota-' . $rekamMedis->patient->nama,
            'date' => $currentDate,
            'data' => $rekamMedis,
            'totalHargaObat' => $totalHargaObat,
            'biayaPelayanan' => $biayaPelayanan,
            'totalPembayaran' => $totalPembayaran,
            'logo' => $logo
        ];
          
        $pdf = PDF::setOptions([
            'isHTML5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        $pdf = Pdf::loadView('apoteker.template-nota', $data);
     
        $pdfName = 'Nota-' . $rekamMedis->patient->nama . '.pdf';
        
        return $pdf->stream($pdfName);

    }

    public function generateRekamMedis($id)
    {

        $rekamMedis = RekamMedis::where('id', $id)->with('obats')->first();
        $totalHargaObat = 0;
        $biayaPelayanan = 70000;

        
        foreach ($rekamMedis->obats as $obat) {
            $totalHargaObat += $obat->harga;
        }

        $totalPembayaran =  $biayaPelayanan + $totalHargaObat;

        $logo = asset('/images/pintansari.png');

        Carbon::setLocale('id');

        $currentDate = Carbon::now()->translatedFormat('j F Y');
  
        $data = [
            'title' => 'Rekam Medis-' . $rekamMedis->patient->nama,
            'date' => $currentDate,
            'data' => $rekamMedis,
            'totalHargaObat' => $totalHargaObat,
            'biayaPelayanan' => $biayaPelayanan,
            'totalPembayaran' => $totalPembayaran,
            'logo' => $logo
        ];
          
        $pdf = PDF::setOptions([
            'isHTML5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        $pdf = Pdf::loadView('apoteker.template-pdf-rekam-medis', $data);

        $pdfName = 'rekam-medis-' . $rekamMedis->patient->nama . '.pdf';
     
        return $pdf->stream($pdfName);
    }

}
