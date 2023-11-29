@extends('admin.Table.pelamar')

@section('table')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold">Tambah Status Rekrutmen</h2>
        </div>
       
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tambahStatus') }}" method="post" id="tambahStatusForm">
            @csrf

            <div class="mb-4">
                <label for="ID_Pelamar" class="block text-gray-700 text-sm font-bold mb-2">Pelamar</label>
                <select name="ID_Pelamar" id="ID_Pelamar" class="w-full border p-2 rounded" required>
                    @foreach($pelamars as $pelamar)
                        @if (!in_array($pelamar->ID_Pelamar, session('addedPelamars', [])))
                            <option value="{{ $pelamar->ID_Pelamar }}" data-posisi="{{ $pelamar->Posisi_Yang_Dilamar }}">{{ $pelamar->Nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
            
            
            
            <div class="mb-4">
                <label for="Posisi_Yang_Dilamar" class="block text-gray-700 text-sm font-bold mb-2">Posisi Yang Dilamar</label>
                <input type="text" id="Posisi_Yang_Dilamar" name="Posisi_Yang_Dilamar" class="w-full border p-2 rounded" readonly>
            </div>

            <div class="mb-4">
                <label for="ID_Lowongan" class="block text-gray-700 text-sm font-bold mb-2">Lowongan</label>
                <select name="ID_Lowongan" id="ID_Lowongan" class="w-full border p-2 rounded" required>
                    @foreach($prosesRekrutmen as $lowongan)
                        <option value="{{ $lowongan->ID_Lowongan }}">{{ $lowongan->posisi }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-4">
                <label for="Tahap_Proses" class="block text-gray-700 text-sm font-bold mb-2">Tahap Proses</label>
                <select name="Tahap_Proses" id="Tahap_Proses" class="w-full border p-2 rounded" required>
                    <option value="Seleksi CV">Seleksi CV</option>
                    <option value="Interview">Interview</option>
                </select>
            </div>
            

            <div class="mb-6">
                <label for="Status_Proses" class="block text-gray-700 text-sm font-bold mb-2">Status Proses</label>
                <select name="Status_Proses" id="Status_Proses" class="w-full border p-2 rounded" required>
                    <option value="lolos">Lolos</option>
                    <option value="tidak_lolos">Tidak Lolos</option>
                </select>
            </div>
            

            <button type="submit" style="background-color:#ff0080; border-radius: 10px " class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:shadow-outline-pink active:bg-pink-800">Tambah Status</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
    console.log('prosesRekrutmen:', {!! json_encode($prosesRekrutmen) !!});
    console.log('Dropdown Lowongan:', $('#ID_Lowongan').html());


    $('#ID_Pelamar').change(function () {
        var selectedOption = $(this).find(':selected');
        var posisiYangDilamar = selectedOption.data('posisi');
        $('#Posisi_Yang_Dilamar').val(posisiYangDilamar);
    });

    $('#tambahStatusForm').submit(function () {
        var posisiYangDilamar = $('#Posisi_Yang_Dilamar').val();
        var selectedPosisiElement = $('#ID_Lowongan').find(':selected');


        var selectedPosisi = selectedPosisiElement.text();

        console.log('posisiYangDilamar:', posisiYangDilamar);
        console.log('selectedPosisi:', selectedPosisi);

        if (posisiYangDilamar.trim() !== selectedPosisi.trim()) {
            alert('Posisi yang dilamar harus sesuai dengan posisi yang dipilih pada tabel lowongan.');
            return false; 
        }

        return true; 
    });
});

</script>




@endsection
