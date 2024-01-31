@extends('layouts.app')

@section('content')

<div class="w-full h-screen overflow-x-hidden border-t flex justify-center items-center flex-col">
  <p class="text-xl px-5 mt-6 flex items-center">
    <i class="fas fa-user mr-3"></i> Edit Pasien
  </p>
  <div class="w-full px-5 flex justify-around">

    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
      @if(Session::get('sukses'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">Sukses</span> Pasien Berhasil di update Tambahkan
      </div>
      @endif
      <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('updatePasienResepsionis', ['id' => $data->id]) }}">
          @method("POST")
          @csrf
          <div class="text-lg border-b-2 border-slate-500">Data Pasien</div>
          <div class="mt-2">
            <label class="mt-2 block text-sm text-gray-600" for="name">Nama</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="nama" type="text"
              required value="{{ $data->nama }}" placeholder="Enter Nama" aria-label="Name">
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">Usia</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="usia" name="usia" type="number"
              required="" placeholder="Enter Usia" value="{{ $data->usia }}" aria-label="Usia">
          </div>
          <div class="flex">
            <div class="mt-2">
              <label class="block text-sm text-gray-600" for="email">Tanggal Lahir</label>
              <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="tanggalLahir" name="tanggal_lahir"
                type="date" required value="{{ $data->tanggal_lahir }}" placeholder="Enter Tanggal Lahir" aria-label="Tanggal Lahir">
            </div>
            <div class="flex flex-col ml-2">
              <label class="block text-sm text-gray-600 mt-2" for="email">Jenis Kelamin</label>
              <div class="flex items-center justify-center h-full w-full">
                <input type="radio" value="pria" name="jenis_kelamin" @if($data->jenis_kelamin === 'pria') checked @endif id="jenis-kelamin">
                <label class="ml-2 block text-sm text-gray-600" for="email">Pria</label>
                <input class="ml-4" type="radio" value="wanita" name="jenis_kelamin" id="jenis-kelamin" @if($data->jenis_kelamin === 'wanita') checked @endif>
                <label class="ml-2 block text-sm text-gray-600" for="email">Wanita</label>
              </div>
            </div>
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="Pekerjaan">Pekerjaan</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="pekerjaan" name="pekerjaan"
              type="text" required value="{{ $data->pekerjaan }}" placeholder="Enter Pekerjaan" aria-label="Pekerjaan">
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">No Telepon</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="noTelp" name="no_telp" type="text"
              required value="{{ $data->no_telp }}" placeholder="Enter No Telepon" aria-label="No Telepon">
          </div>
          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="Alamat">Alamat</label>
            <textarea id="alamat" rows="4" name="alamat"
              class="block p-2.5 w-full text-sm text-gray-700 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Write your thoughts here...">{{ $data->alamat }}</textarea>
          </div>
          <div class="flex flex-1 flex-col w-full">
            <div class="mt-6 flex grow flex-row">
              <button class="w-full px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded"
                type="submit">Simpan</button>
              <i class="fas fa-floppy-disk ml-2 text-white"></i>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endsection