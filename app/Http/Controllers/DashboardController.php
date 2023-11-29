<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\ProsesRekrutmen;
use App\Models\StatusRekrutmen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelamar = Pelamar::count();
        $totalProsesRekrutmen = ProsesRekrutmen::count();

        // Perhitungan minat posisi
        $minatManajerCount = Pelamar::where('Posisi_Yang_Dilamar', 'Manager')->count();
        $minatDirekturCount = Pelamar::where('Posisi_Yang_Dilamar', 'Direktur')->count();
        // Tambahkan perhitungan untuk posisi lainnya sesuai kebutuhan

        // Perhitungan pelamar yang lolos
        $lolosCount = StatusRekrutmen::where('Status_Proses', 'Lolos')->count();

        // Perhitungan pelamar yang tidak lolos
        $tidakLolosCount = StatusRekrutmen::where('Status_Proses', 'Tidak Lolos')->count();
        
        
        return view('admin.main', compact('totalPelamar', 'totalProsesRekrutmen', 'minatManajerCount', 'minatDirekturCount', 'lolosCount', 'tidakLolosCount'));
    }
}
