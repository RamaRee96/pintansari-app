<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'rekam_medis_has_obats', 'rekam_medis_id', 'obat_id');
    }

}
