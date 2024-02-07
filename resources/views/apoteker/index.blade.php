@extends('layouts.app')
@section('content')

<div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6 p-6">
  <div class="bg-white p-6 rounded-md">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            Antrian Pasien Selesai Di Periksa Hari Ini
          </h3>
          <h1>
            {{ $totalAntrian }}
          </h1>
        </div>
        <span class="icon widget-icon text-blue-500"><i class="fas fa-stethoscope fa-5x"></i></span>
      </div>
    </div>
  </div>
  <div class="bg-white p-6 rounded-md">
    <div class="card-content">
      <div class="flex items-center justify-between">
        <div class="widget-label">
          <h3>
            Total Obat
          </h3>
          <h1>
            {{ $totalObat }}
          </h1>
        </div>
        <span class=" text-green-500">
          <i class="fas fa-notes-medical fa-5x"></i>
        </span>
      </div>
    </div>
  </div>
</div>

@endsection