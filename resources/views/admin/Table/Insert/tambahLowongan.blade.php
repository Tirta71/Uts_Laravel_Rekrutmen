@extends('admin.Table.pelamar')

@section('table')

<div class="flex flex-col items-center justify-center">
    <h1 class="text-2xl font-semibold mb-4">Tambah Data Lowongan</h1>
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">

        <form action="{{ route('tambahLowongan') }}" method="post" id="tambahLowonganForm">
            @csrf

            <div class="mb-4">
                <label for="Posisi" class="block text-gray-700 text-sm font-bold mb-2">Posisi:</label>
                <input type="text" name="posisi" class="w-full px-3 py-2 border rounded-md" required>
                @error('posisi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="Deskripsi_Pekerjaan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Pekerjaan:</label>
                <textarea name="deskripsi_pekerjaan" class="w-full px-3 py-2 border rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label for="Kualifikasi" class="block text-gray-700 text-sm font-bold mb-2">Kualifikasi:</label>
                <input type="text" name="kualifikasi" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="Tanggal_Buka" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Buka:</label>
                <input type="date" name="tanggal_buka" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="Tanggal_Tutup" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Tutup:</label>
                <input type="date" name="tanggal_tutup" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <button type="submit" style="background-color:#ff0080; border-radius: 10px " class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:shadow-outline-pink active:bg-pink-800">
                Add Proses Rekrutmen
            </button>
            
        </form>

    </div>
</div>



@endsection
