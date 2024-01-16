<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            $validateData['role'] = 'resepsionis';
            User::create($validateData);
            return redirect()->back()->with('sukses', true);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        }

    }
}
