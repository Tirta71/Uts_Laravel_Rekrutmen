<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Lowongan</title>
    <!-- Include the Tailwind CSS CDN or your local CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex flex-col items-center justify-center ">

        <h1 class="text-2xl font-semibold mb-4">Update Data Lowongan</h1>

        <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-xl">

            <form action="{{ route('updateLowongan', ['id' => $prosesRekrutmen->ID_Lowongan]) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-4">
                    <label for="posisi" class="block text-gray-700 text-sm font-bold mb-2">Posisi:</label>
                    <input type="text" name="posisi" class="w-full px-3 py-2 border rounded-md" value="{{ $prosesRekrutmen->posisi }}" required>
                    @error('posisi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="deskripsi_pekerjaan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Pekerjaan:</label>
                    <textarea name="deskripsi_pekerjaan" class="w-full px-3 py-2 border rounded-md" required>{{ $prosesRekrutmen->deskripsi_pekerjaan }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="kualifikasi" class="block text-gray-700 text-sm font-bold mb-2">Kualifikasi:</label>
                    <input type="text" name="kualifikasi" class="w-full px-3 py-2 border rounded-md" value="{{ $prosesRekrutmen->kualifikasi }}" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_buka" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Buka:</label>
                    <input type="date" name="tanggal_buka" class="w-full px-3 py-2 border rounded-md" value="{{ $prosesRekrutmen->tanggal_buka }}" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_tutup" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Tutup:</label>
                    <input type="date" name="tanggal_tutup" class="w-full px-3 py-2 border rounded-md" value="{{ $prosesRekrutmen->tanggal_tutup }}" required>
                </div>
                <div style="">
                    <a href="/lowongan" class="mt-4 inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md transition duration-300 ease-in-out">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        Update Data
                    </button>
                </div>
                


            </form>

        </div>

    </div>

</body>

</html>
