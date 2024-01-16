@extends('layouts.app')
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full h-screen flex-grow p-6">
    @if(Session::get('sukses'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert">
      <span class="font-medium">Sukses.</span> Berhasil Menambahkan Data Obat
    </div>
    @endif
    <h1 class="text-3xl text-black pb-6">Tambah Obat</h1>

    <form method="POST" action="{{ route('createObat') }}">
      @csrf
      <div class="mb-6">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Obat</label>
        <input type="text" id="nama"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Nama Obat" name="nama" required>
      </div>
      <div class="mb-6">
        <label for="kandungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kandungan</label>
        <textarea id="kandungan" rows="4"
          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Tuliskan Kandungan Obat Disini..." name="kandungan" required></textarea>

      </div>
      <div class="mb-6">
        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Obat</label>
        <input type="number" id="harga"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Harga Obat" name="harga" required>
      </div>
      <div class="mb-6">
        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Obat</label>
        <input type="number" id="stock"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Stock Obat" name="stock" required>
      </div>
      <div class="mb-6">

        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
          Ketersediaan
          Obat</label>
        <select id="status" name="status"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="tersedia" selected>Tersedia</option>
          <option value="tidak tersedia">Tidak Tersedia</option>
        </select>


      </div>
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

  </main>

  <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Your Klinik Pintan Sari 2023
  </footer>
</div>

@endsection