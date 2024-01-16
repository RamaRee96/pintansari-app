<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
     'nama',
     'usia',
     'jenis_kelamin',
     'tanggal_lahir',
     'alamat',
     'no_telp',
     'pekerjaan',
    ];

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
