<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    // tambah resepsionis
    public function createResepsionis()
    {
        return view("admin.tambahResepsionis");
    }

    public function storeResepsionis(Request $request)
    {
        try {
            $validateData = $request->validate(
                [
                     'email' => 'required|email|unique:users,email',
                     'password' => 'required|string',
                     'name' => 'required|string',
                     'tanggal_lahir' => 'required|date|before:today',
                     'alamat' => 'required|string',
                 ]
            );
            $validateData['password'] = bcrypt($validateData['password']);
            $validateData['role'] = 'resepsionis';
            User::create($validateData);
            return redirect()->back()->with('sukses', true);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }

    public function createDokter()
    {
        return view("admin.tambahDokter");
    }

    public function storeDokter(Request $request)
    {
        try {
            $validateData = $request->validate(
                [
                     'email' => 'required|email|unique:users,email',
                     'password' => 'required|string',
                     'name' => 'required|string',
                     'tanggal_lahir' => 'required|date|before:today',
                     'alamat' => 'required|string',
                 ]
            );
            $validateData['password'] = bcrypt($validateData['password']);
            $validateData['role'] = 'dokter';
            User::create($validateData);
            return redirect()->back()->with('sukses', true);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }

    public function createApoteker()
    {
        return view("admin.tambahApoteker");
    }

    public function storeApoteker(Request $request)
    {
        try {
            $validateData = $request->validate(
                [
                     'email' => 'required|email|unique:users,email',
                     'password' => 'required|string',
                     'name' => 'required|string',
                     'tanggal_lahir' => 'required|date|before:today',
                     'alamat' => 'required|string',
                 ]
            );
            $validateData['password'] = bcrypt($validateData['password']);
            $validateData['role'] = 'apoteker';
            User::create($validateData);
            return redirect()->back()->with('sukses', true);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }
    }

    public function editPegawai($id)
    {
        $data = User::find($id);
        return view('admin.edit-pegawai', compact('data'));
    }

    public function updatePegawai(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string', // Boleh kosong, minimal 8 karakter jika diisi
            'role' => 'required|in:resepsionis,dokter,perawat,apoteker', // Hanya boleh salah satu dari opsi tersebut
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
        ]);

        if($request->password !== null) {
            $validateData['password'] = bcrypt($validateData['password']);
        } else {
            Arr::forget($validateData, 'password');
        }

        User::where('id', $id)->update($validateData);

        return redirect()->back()->with('sukses', true);


    }

    public function deletePegawai($id)
    {
        User::where('id', $id)->delete();
        
        return redirect()->back()->with('sukses', true);

    }
}
