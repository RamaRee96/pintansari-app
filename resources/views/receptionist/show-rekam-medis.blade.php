@extends('layouts.app')
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full h-screen flex-grow p-6">
    @if(Session::get('sukses'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert">
      <span class="font-medium">Sukses</span> Berhasil Update Rekam Medis
    </div>
    @endif
    <h1 class="text-3xl text-black pb-6">Edit Rekam Medis</h1>

    <h2 class="text-2xl text-gray-500 pb-2">Formulir Rekam Medis</h2>


    <form method="POST" action="{{ route('updateRekamMedisResepsionis', ['id' => $data->id]) }}">
      @csrf
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="pasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pasien</label>
          <input type="text" id="nama_pasien"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Nama Pasien" readonly value="{{ $data->patient->nama }}">
        </div>
        <div>
          <label for="tinggi_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
            Badan</label>
          <input type="text" id="tinggi_badan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tinggi Badan" name="tinggi" value="{{ $data->tinggi }}">
        </div>
        <div>
          <label for="tensi_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Tensi Darah
          </label>
          <input type="text" id="tensi_darah"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tensi Darah"  name="tensi" value="{{ $data->tensi }}">
        </div>
        <div>
          <label for="berat_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
            Badan</label>
          <input type="text" id="berat_badan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Berat Badan" name="berat" value="{{ $data->berat }}">
        </div>
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Keluhan
          </label>
          <textarea id="keluhan" rows="4" name="keluhan"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan Keluhan Pasien Disini..." >{{ $data->keluhan }}</textarea>
        </div>
        <div>
          <label for="anamesis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Anamesis
          </label>
          <textarea id="anamesis" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan Anamesis Disini..."name="anamesis" >{{ $data->anamesis }}</textarea>
        </div>
      </div>
      @if($data->status === 'sudah diperiksa' || $data->status === 'selesai')
      <h1>tsteing</h1>
      @endif
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


  </main>

  <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Klinik Pintan Sari 2023
  </footer>
</div>
@endsection