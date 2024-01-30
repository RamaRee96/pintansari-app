@extends('layouts.app')
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full min-h-screen flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">Data Pasien</h1>

    <h2 class="text-2xl text-gray-500 pb-2">Data Rekam Medis</h2>
     <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pasien</label>
            <input type="text" value="{{ $pasien->nama }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required readOnly>
        </div>
        <div>
            <label for="usia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usia ( tahun )</label>
            <input type="text" value="{{ $pasien->usia }}" id="usia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required readOnly>
        </div>
        <div>
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
            <input type="text" value="{{ $pasien->tanggal_lahir }}" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required readOnly>
        </div>  
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor telephone</label>
            <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" value="{{ $pasien->no_telp }}" required readOnly>
        </div>
        <div>
            <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
            <input type="url" id="pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" value="{{ $pasien->pekerjaan }}" required readOnly>
        </div>
        <div>
            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
            <input type="url" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" value="{{ $pasien->jenis_kelamin }}" required readOnly>
        </div>
        <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
           <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." read>{{ $pasien->alamat }}</textarea>
        </div>
    </div>
    <div class="relative overflow shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              No.
            </th>
            <th scope="col" class="px-6 py-3">
              Riwayat Rekam Medis
            </th>
            <th scope="col" class="px-6 py-3">
              Tanggal Periksa
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekamMedis as $index => $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $index + 1 }}
            </th>
            <td class="px-6 py-4">
              {{ $item->diagnosa }}
            </td>
            <td class="px-6 py-4">
              {{ $item->created_at->format('d-m-Y') }}
            </td>
            <td class="flex items-center px-6 py-4 gap-3">
              <a href="/resepsionis/rekam-medis-pasien/{{ $item->id }}"
                class="font-medium dark:text-blue-500 py-2 px-3 bg-gray-500 rounded-md text-white">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </main>

  <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Your Klinik Pintan Sari 2023
  </footer>
</div>


@endsection