<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRekrutmen extends Model
{
    use HasFactory;

    protected $table = 'status_rekrutmen';
    protected $primaryKey = 'ID_Proses';

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'ID_Pelamar');
    }


    public function prosesRekrutmen()
    {
        return $this->belongsTo(ProsesRekrutmen::class, 'ID_Lowongan', 'ID_Lowongan');
    }

    protected $fillable = [
        'ID_Pelamar',
        'ID_Lowongan',
        'Tahap_Proses',
        'Status_Proses',
    ];
}
