<?php

// app/Models/ProsesRekrutmen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesRekrutmen extends Model
{
    use HasFactory;

    protected $table = 'proses_rekrutmen';
    protected $primaryKey = 'ID_Lowongan';

    protected $fillable = ['posisi', 'deskripsi_pekerjaan', 'kualifikasi', 'tanggal_buka', 'tanggal_tutup'];
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'ID_Pelamar');
    }
   
}

