<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    {{ $title }}
  </title>
  <style>
    body {
      font-size: 11px;
    }
    table {
       border-collapse: collapse;
    }

    table.info-obat td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    table .title {
      font-weight: 500;
      padding-bottom: 5px;
    }

    table td {
      padding-bottom: 10px;
    }
  </style>
</head>
<body>
   <table style="width: 100%;">
        <tr>
            <td width="28%">
              <img src="{{ public_path('images/pintansari.png') }}" alt="" style="width: 65px; padding-top: 20px;">
            </td>
            <td style="text-align: center; padding-top: 25px;">
             <h2>
               KLINIK PRATAMA PINTAN SARI
             </h2>
                <p style="margin-top: -10px;">
                    Cabeyan, Bendosari, Sukoharjo
                </p>
                <p style="margin-top: -8px;">
                    Telp. 087834413134
                </p>
            </td>
            <td></td>
        </tr>
</table>
  <div style="width: 100%; height: 1px; background-color: #adbfc9; margin-top: 12px; margin-bottom: 20px;"></div>
  <h1 style="text-align: center; margin-bottom: 50px;">
    Informasi Rekam Medis
  </h1>
  <h3>
    Informasi Pasien
  </h3>
  <table style="width: 100%;">
    <tr>
      <td>
        <table style="width: 100%;">
          <tr>
            <td>
              Nama
            </td>
            <td>
              : {{ $data->patient->nama }}
            </td>
          </tr>
           <tr>
            <td>
              Alamat
            </td>
            <td>
              : {{ $data->patient->alamat }}
            </td>
          </tr>
          <tr>
            <td>
              Dokter
            </td>
            <td>
              : {{ $data->dokter->name }}
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table style="width: 100%;">
           <tr>
            <td>
              Tanggal Daftar
            </td>
            <td>
              : {{ \Carbon\Carbon::parse($data->patient->created_at)->translatedFormat('j F Y', 'id') }}
            </td>
          </tr>
           <tr>
            <td>
              Tanggal Periksa
            </td>
            <td>
              : {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('j F Y', 'id') }}
            </td>
          </tr>
          <tr>
            <td>
              Status Pembayaran
            </td>
            <td>
              : @if($data->status === 'selesai') LUNAS @else MENUNGGU PEMBAYARAN @endif
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <h3>
    Informasi Pemeriksaan Klinis
  </h3>
    <table style="width: 100%;">
    <tbody>
      <tr>
        <td class="title">
          Tinggi Badan (TB)
        </td>
        <td class="title">
         Berat Badan (BB)
        </td>
      </tr>
      <tr>
        <td style="width: 50%">
          {{ $data->tinggi }} cm
        </td>
        <td>
          {{ $data->berat }} kg
        </td>
      </tr>
      <tr>
        <td class="title">
         Tekanan Darah (TD)
        </td>
      </tr>
      <tr>
        <td>
          {{ $data->tensi }} hHg
        </td>
      </tr>
    </tbody>
  </table>
    <h3>
    Informasi Rekam Medis
  </h3>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td class="title">
          Diagnosa
        </td>
        <td class="title">
         Keluhan
        </td>
      </tr>
      <tr>
        <td style="padding-right: 20px;">
          {{ $data->diagnosa }}
        </td>
        <td>
          {{ $data->keluhan }}
        </td>
      </tr>
      <tr>
        <td class="title">
         Anamesis
        </td>
        <td class="title">
         Keterangan
        </td>
      </tr>
      <tr>
        <td style="padding-right: 20px;">
          {{ $data->anamesis }}
        </td>
        <td>
          {{ $data->keterangan }}
        </td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>