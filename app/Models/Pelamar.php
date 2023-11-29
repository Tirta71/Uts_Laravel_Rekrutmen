<?php

// app/Models/Pelamar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamars';
    protected $primaryKey = 'ID_Pelamar';
    protected $fillable = [
        'Nama',
        'Alamat',
        'Nomor_Telepon',
        'Email',
        'Posisi_Yang_Dilamar',
        'Pengalaman_Kerja',
        'Riwayat_Pendidikan',
        'Skill',
    ];
  
      
    public function hasStatusRekrutmens()
    {
        return $this->hasMany(StatusRekrutmen::class, 'ID_Pelamar');
    }



  
}
