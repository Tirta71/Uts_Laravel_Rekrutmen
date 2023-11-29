<?php

namespace App\Http\Controllers;

use App\Models\StatusRekrutmen;
use App\Http\Requests\StoreStatusRekrutmenRequest;
use App\Http\Requests\UpdateStatusRekrutmenRequest;
use App\Models\Pelamar;
use App\Models\ProsesRekrutmen;
use Illuminate\Http\Request;

class StatusRekrutmenController extends Controller
{
   

    public function tampilDataStatus()
    {
        $statusRekrutmen = StatusRekrutmen::with(['pelamar', 'prosesRekrutmen'])->get();
        return view('admin.Table.statusRekrutmen', ['statusRekrutmen' => $statusRekrutmen]);
    }
    
    


    
    public function formTambahStatus()
    {
     
        $pelamars = Pelamar::all();
        $prosesRekrutmen = ProsesRekrutmen::all();

  
        return view('admin.Table.Insert.tambahStatus', ['pelamars' => $pelamars, 'prosesRekrutmen' => $prosesRekrutmen]);
    }

    public function tambahStatus(Request $request)
    {
        $request->validate([
            'ID_Pelamar' => 'required|exists:pelamars,ID_Pelamar',
            'ID_Lowongan' => 'required|exists:proses_rekrutmen,ID_Lowongan',
            'Tahap_Proses' => 'required|string',
            'Status_Proses' => 'required|string',
        ]);

        $pelamar = Pelamar::find($request->input('ID_Pelamar'));

        if (!$pelamar) {
            return redirect()->route('tampilDataStatus')->with('error', 'Pelamar tidak valid.');
        }

      
        if ($pelamar->hasStatusRekrutmens->isNotEmpty()) {
            return redirect()->route('tampilDataStatus')->with('error', 'Pelamar sudah memiliki status rekrutmen.');
        }

       
        $existingStatus = StatusRekrutmen::where('ID_Pelamar', $request->input('ID_Pelamar'))
            ->where('ID_Lowongan', $request->input('ID_Lowongan'))
            ->exists();

        if ($existingStatus) {
            return redirect()->route('tampilDataStatus')->with('error', 'Status Rekrutmen Sudah Ada!');
        }

        $statusRekrutmen = new StatusRekrutmen([
            'ID_Pelamar' => $request->input('ID_Pelamar'),
            'ID_Lowongan' => $request->input('ID_Lowongan'),
            'Tahap_Proses' => $request->input('Tahap_Proses'),
            'Status_Proses' => $request->input('Status_Proses'),
        ]);

       
        $statusRekrutmen->save();

     
        $addedPelamars = session('addedPelamars', []);
        $addedPelamars[] = $request->input('ID_Pelamar');
        session(['addedPelamars' => $addedPelamars]);

        return redirect()->route('tampilDataStatus')->with('success', 'Status Rekrutmen Berhasil Ditambahkan!');
    }


    public function deleteStatusRekrutmen($id) {
       
        $statusRekrutmen = StatusRekrutmen::find($id);
    
        if (!$statusRekrutmen) {
            return redirect()->route('tampilDataStatus')->with('error', 'Status Rekrutmen not found.');
        }
    
        $deletedPelamarID = $statusRekrutmen->ID_Pelamar;
    
   
        $statusRekrutmen->delete();
    
      
        $addedPelamars = array_diff(session('addedPelamars', []), [$deletedPelamarID]);
        session(['addedPelamars' => $addedPelamars]);
    
      
        return redirect()->route('tampilDataStatus')->with('success', 'Status Rekrutmen deleted successfully!');
    }
    

    

    
    
}
