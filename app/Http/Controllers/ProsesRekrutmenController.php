<?php

namespace App\Http\Controllers;

use App\Models\ProsesRekrutmen;
use Illuminate\Http\Request;

class ProsesRekrutmenController extends Controller
{
    public function index()
    {
        $prosesRekrutmen = ProsesRekrutmen::all();
        return view('Rekrut.prosesRekrut', ['prosesRekrutmen' => $prosesRekrutmen]);
    }

    public function tampilDataRekrut()
    {
        $prosesRekrutmen = ProsesRekrutmen::all();
        return view('admin.Table.lowongan', ['prosesRekrutmen' => $prosesRekrutmen]);
    }

    
    public function formTambahLowongan()
    {
        return view('admin.Table.Insert.tambahLowongan');
    }

    public function tambahLowongan(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|unique:proses_rekrutmen',
            'deskripsi_pekerjaan' => 'required|string',
            'kualifikasi' => 'required|string',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date',
        ]);
    
        try {
            ProsesRekrutmen::create($validatedData);
    
            return redirect('/lowongan')->with('success', 'Lowongan Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect('/lowongan')->with('error', 'Error Menambahkan Lowongan: ' . $e->getMessage());
        }
    }
    
    


public function formEditLowongan($id)
{
    $prosesRekrutmen = ProsesRekrutmen::find($id);
    return view('admin.Table.update.edit-lowongan', ['prosesRekrutmen' => $prosesRekrutmen]);
}


public function updateLowongan(Request $request, $id)
{
    
    $validatedData = $request->validate([
        'posisi' => 'required|string|unique:proses_rekrutmen',
        'deskripsi_pekerjaan' => 'required|string',
        'kualifikasi' => 'required|string',
        'tanggal_buka' => 'required|date',
        'tanggal_tutup' => 'required|date',
        
    ]);

   
    $prosesRekrutmen = ProsesRekrutmen::find($id);

  
    $prosesRekrutmen->update($validatedData);

   
    return redirect()->route('tampilDataRekrut')->with('success', 'Data updated successfully');
}

public function deleteLowongan($id)
    {
        try {
           
            $prosesRekrutmen = ProsesRekrutmen::findOrFail($id);

          
            $prosesRekrutmen->delete();

            return redirect()->route('tampilDataRekrut')->with('success', 'Data deleted successfully');
        } catch (\Exception $e) {
            
            return redirect()->route('tampilDataRekrut')->with('error', 'Error deleting data: ' . $e->getMessage());
        }
    }

}
