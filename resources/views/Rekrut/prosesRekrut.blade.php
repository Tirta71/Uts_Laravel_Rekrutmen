<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rekrutmen</title>
    <!-- Tambahkan link CSS Bootstrap dan Tailwind -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    @include('partials.navbar')

    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold text-blue-500 text-center mb-8">Lowongan Tersedia</h1>

        @if(count($prosesRekrutmen) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($prosesRekrutmen as $rekrutmen)
            <div class="max-w-sm rounded overflow-hidden shadow-md">
                <div class="bg-blue-500 text-white py-2 px-4">
                    <h5 class="mb-0">{{ $rekrutmen->posisi }}</h5>
                </div>
                <div class="p-4">
                    <p class="mb-4"><strong>Kualifikasi:</strong> {{ $rekrutmen->kualifikasi }}</p>
                    <p class="mb-4"><strong>Tanggal Buka:</strong> {{ $rekrutmen->tanggal_buka }}</p>
                    <p class="mb-4"><strong>Tanggal Tutup:</strong> {{ $rekrutmen->tanggal_tutup }}</p>
                    <p class="mb-4">{{ $rekrutmen->deskripsi_pekerjaan }}</p>
                    <a href="{{ route('tambah-pelamar', ['id' => $rekrutmen->id]) }}"
                        class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-700 transition duration-300 ease-in-out">Lamar Posisi</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500">Tidak ada data rekrutmen.</p>
        @endif
    </div>

    <!-- Tambahkan script JS Bootstrap dan dependencies jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
