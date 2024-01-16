<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\RekamMedis;
use App\Models\RekamMedisHasObat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function getRekamMedis()
    {
        $data = RekamMedis::where('status', 'antri')->whereDate('created_at', Carbon::today())->paginate(5);
        return view('dokter.rekam-medis', compact('data'));
    }

    public function showRekamMedis($id)
    {

        $data = RekamMedis::find($id);
        $obats = Obat::where('status', 'tersedia')->get();
        return view('dokter.edit-rekam-medis', compact('data', 'obats'));
    }

    public function updateRekamMedis(Request $request, $id)
    {

        if($request->obat) {
            foreach($request->obat as $obatId) {
                $obat = Obat::find($obatId);
                $newStock = $obat->stock - 1;
                $obat->update(['stock' => $newStock]);

                RekamMedisHasObat::create([
                    'rekam_medis_id' => $id,
                    'obat_id' => $obatId
                ]);
            }
        }

        RekamMedis::where('id', $id)->update([
            'keterangan' => $request->keterangan,
            'diagnosa' => $request->diagnosa,
            'status' => $request->status
        ]);

        return redirect()->back()->with('sukses', true);
    }

    public function dataResep()
    {
        return view('dokter.dataResep');
    }
}
