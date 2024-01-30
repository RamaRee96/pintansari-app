@extends('layouts.app')
@section('content')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full h-screen flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">Daftar Pasien Yang Sudah Di Periksa</h1>

    <div class="relative shadow-md sm:rounded-lg">
      <div
        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-100 dark:bg-gray-900">
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Filter
        <svg class="w-2.5 h-2.5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 p-3">
          <form class="max-w-sm mx-auto form-filter">
            <div class="mb-5">
              <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Bulan</label>
              <input type="month" name="bulan" id="filterDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required value="{{ request('bulan') ?: now()->format('Y-m') }}">
            </div>         
          </form>

        </div>

        <label for="table-search" class="sr-only">Search</label>
        <form class="relative">
          <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center p-2 ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="text" id="filterSearch" name="q" value="{{ request('q') }}"
            class="block pl-7 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search for obat">
        </form>
      </div>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              No.
            </th>
            <th scope="col" class="px-6 py-3">
              Nama Pasien
            </th>
            <th scope="col" class="px-6 py-3">
              Diagnosa
            </th>
            <th scope="col" class="px-6 py-3">
              Keterangan
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $index => $item)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $index + 1 }}
            </th>
            <td class="px-6 py-4">
              {{ $item->patient->nama }}
            </td>
            <td class="px-6 py-4">
              {{ $item->diagnosa }}
            </td>
            <td class="px-6 py-4">
              {{ $item->keterangan }}
            </td>
            <td class="flex items-center px-6 py-4">
              <a href="/apoteker/edit-rekam-medis/{{ $item->id }}"
                class="font-medium px-3 py-2 bg-gray-500 text-white rounded-md">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="p-3">
        {{ $data->links() }}
      </div>
    </div>


  </main>

  <footer class="w-full bg-white text-gray-600 text-left p-4">
    Copyright © Your Klinik Pintan Sari 2023
  </footer>
</div>
 <script>
        $(document).ready(function() {
        
            // Handle search button click event
            $('#filterDate').on('change', function() {
                var urlParams = new URLSearchParams(window.location.search);

                // Get the search input value
                var searchQuery = $('#filterSearch').val();

                // Get the selected filter value
                var filterValue = $('#filterDate').val();

                // Update or add the 'q' parameter
                if (searchQuery !== null && searchQuery !== '') {
                    urlParams.set('q', encodeURIComponent(searchQuery));
                } else {
                    urlParams.delete('q');
                }

                // Update or add the 'bulan' parameter
                if (filterValue !== null && filterValue !== '') {
                    urlParams.set('bulan', encodeURIComponent(filterValue));
                } else {
                    urlParams.delete('bulan');
                }

                // Build the new URL with updated parameters
                var newUrl = '/apoteker/pasien-sudah-diperiksa?' + urlParams.toString();

                // Redirect to the new URL
                window.location.href = newUrl;
            });
        });
</script>
@endsection