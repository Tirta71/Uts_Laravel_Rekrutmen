<?php

// app/Http/Controllers/PelamarController.php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Models\ProsesRekrutmen;
use App\Models\statusRekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

// app/Http/Controllers/PelamarController.php



class PelamarController extends Controller
{
    public function liveSearch(Request $request)
    {
        if ($request->has('query')) {
            $query = $request->input('query');
    
            $results = DB::table('pelamars')
                ->leftJoin('status_rekrutmen', 'pelamars.ID_Pelamar', '=', 'status_rekrutmen.ID_Pelamar')
                ->select('pelamars.Nama', 'status_rekrutmen.Tahap_Proses', 'status_rekrutmen.Status_Proses', 'pelamars.Posisi_Yang_Dilamar')
                ->where('pelamars.Nama', 'like', '%' . $query . '%')
                ->get();
    
            return response()->json($results);
        }
    
        return response()->json([]);
    }
    

    public function tampilDataPelamar()
    {
        $pelamar = Pelamar::leftJoin('status_rekrutmen', 'pelamars.ID_Pelamar', '=', 'status_rekrutmen.ID_Pelamar')
            ->select('pelamars.*', 'status_rekrutmen.Tahap_Proses', 'status_rekrutmen.Status_Proses')
            ->get();

        return view('admin.Table.tablePelamar', [
            'title' => 'Data Pelamar',
            'pelamar' => $pelamar,
        ]);
    }

    public function edit($id)
    {
        $pelamar = Pelamar::findOrFail($id);

        return view('admin.Table.update.edit-pelamar', compact('pelamar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Email' => 'required|email',
            
        ]);

        $pelamar = Pelamar::findOrFail($id);
        $pelamar->update($request->all());

        return redirect()->route('tampilDataPelamar')->with('success', 'Data pelamar berhasil diperbarui');
    }

    public function hapus($id)
    {
   
        statusRekrutmen::where('ID_Pelamar', $id)->delete();
    
      
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->delete();
    
        return redirect()->route('tampilDataPelamar')->with('success', 'Data pelamar berhasil dihapus');
    }
    




    public function tampilFormTambah()
    {
        
        $posisiOptions = ProsesRekrutmen::select('posisi')->distinct()->get();

        return view('tambahPelamar', [
            'title' => 'Tambah Pegawai',
            'posisiOptions' => $posisiOptions,
        ]);
    }

   public function prosesFormTambah(Request $request)
    {
        $idToIgnore = $request->id ?? null; 

        $validatedData = $request->validate([
            'Nama' => ['required', 'string', Rule::unique('pelamars')->ignore($idToIgnore)],
            'Alamat' => 'required|string',
            'Nomor_Telepon' => 'required|string',
            'Email' => ['required', 'email', Rule::unique('pelamars')->ignore($idToIgnore)],
            'Posisi_Yang_Dilamar' => 'required|string',
            'Pengalaman_Kerja' => 'nullable|string',
            'Riwayat_Pendidikan' => 'nullable|string',
            'Skill' => 'nullable|string',
        ], [
            'Nama.unique' => 'Nama sudah terdaftar.',
            'Email.unique' => 'Email sudah terdaftar.',
        ]);

    
        $existingEmail = Pelamar::where('Email', $validatedData['Email'])
            ->where('ID_Pelamar', '!=', $idToIgnore)
            ->first();

        if ($existingEmail) {
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', 'Email sudah terdaftar. Silakan gunakan email lain.');
        }

    
        Pelamar::create($validatedData);

        return redirect('/')
            ->with('success', 'Pelamar berhasil ditambahkan!');
    }

}

