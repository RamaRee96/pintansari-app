@extends('layouts.app')
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full h-screen flex-grow p-6">
    @if(Session::get('sukses'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert">
      <span class="font-medium">Sukses.</span> Rekam Medis Berhasil Di Update
    </div>
    @endif
    <h1 class="text-3xl text-black pb-6">Rekam Medis Pasien A/N {{ $data->patient->nama }} </h1>

    <h2 class="text-2xl text-gray-500 pb-2">Data Rekam Medis</h2>


    <form method="POST" action="{{ route('updateRekamMedisApoteker', ['id' => $data->id]) }}">
      @csrf
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
            Pasien</label>
          <input type="text" id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="John" value="{{$data->patient->nama}}" readonly>
        </div>
        <div>
          <label for="tinggi_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
            Badan</label>
          <input type="text" id="tinggi_badan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Doe" value="{{ $data->tinggi }} cm" readonly>
        </div>
        <div>
          <label for="tensi_darah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Tensi Darah
          </label>
          <input type="text" id="tensi_darah"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Flowbite" value="{{ $data->tensi }} mmHg" readonly>
        </div>
        <div>
          <label for="berat_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
            Badan</label>
          <input type="text" id="berat_badan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Flowbite" value="{{ $data->berat }} kg" readonly>
        </div>
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Keluhan
          </label>
          <textarea id="keluhan" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here..." readonly>{{ $data->keluhan }}</textarea>
        </div>
        <div>
          <label for="anamesis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Anamesis
          </label>
          <textarea id="anamesis" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here...">{{ $data->anamesis }}</textarea>
        </div>
      </div>
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="diagnosa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Diagnosa
          </label>
          <textarea id="diagnosa" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan Diagnosa Pasien Disini" required readonly>{{ $data->diagnosa }}</textarea>
          <p class="ms-auto text-xs text-gray-500 dark:text-gray-400 mt-3">
            Isikan terkait diagnnosa pasien, isikan <strong>-</strong> jika tidak ada
            keterangan
          </p>
        </div>
        <div>
          <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Keterangan
          </label>
          <textarea id="keterangan" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tuliskan Keterangan Pasien Disini" readonly required>{{ $data->keterangan }}</textarea>
          <p class="ms-auto text-xs text-gray-500 dark:text-gray-400 mt-3">
            Isikan terkait keterangan pemeriksaan pasien dan daftar obat, isikan <strong>-</strong> jika tidak ada
            keterangan
          </p>
        </div>
      </div>
      <div class="mb-6">
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Obat</label>
        <div class="relative overflow-x-auto">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  No
                </th>
                <th scope="col" class="px-6 py-3">
                  Nama Obat
                </th>
                <th scope="col" class="px-6 py-3">
                  Kandungan
                </th>
                <th scope="col" class="px-6 py-3">
                  Harga
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data->obats as $index => $obat)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $index + 1 }}
                </th>
                <td class="px-6 py-4">
                  {{ $obat->nama }}
                </td>
                <td class="px-6 py-4">
                  {{ $obat->kandungan }}
                </td>
                <td class="px-6 py-4">
                  Rp. {{ number_format($obat->harga, 0,0) }}
                </td>
              </tr>
              @endforeach
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">Total</td>
                <td></td>
                <td></td>
                <td class="px-6 py-4">
                  Rp. {{ number_format($totalHargaObat, 0,0) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <div class="mb-6">
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Periksa (
          Sudah/Belum Periksa/Selesai )</label>
        <select id="status" readonly name="status"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @if($data->status)
          <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
          @endif
          <option value="selesai">Selesai</option>
        </select>
      </div>

      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


  </main>

  <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Klinik Pintan Sari 2023
  </footer>
</div>

@endsection