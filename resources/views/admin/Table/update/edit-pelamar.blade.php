

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelamar</title>

    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Atau jika ingin menggunakan versi lokal (setelah mengunduh dari situs resmi Bootstrap) -->
    <!-- <link href="/path/to/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Jika Anda menginginkan ikon dari FontAwesome (digunakan dalam contoh sebelumnya) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Pelamar</h2>

        <form action="{{ route('updatePelamar', ['id' => $pelamar->ID_Pelamar]) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="Nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="Nama" value="{{ $pelamar->Nama }}" required>
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="Email" value="{{ $pelamar->Email }}" required>
            </div>

            <div class="mb-3">
                <label for="Posisi" class="form-label">Posisi:</label>
                <select class="form-select" name="Posisi_Yang_Dilamar" required>
                    <!-- Tambahkan opsi-opsi sesuai kebutuhan -->
                    <option value="Manager" {{ $pelamar->Posisi_Yang_Dilamar === 'Manager' ? 'selected' : '' }}>Manager</option>
                    <option value="Directur" {{ $pelamar->Posisi_Yang_Dilamar === 'Directur' ? 'selected' : '' }}>Directur</option>
                 
                </select>
            </div>
            


            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="Alamat" value="{{ $pelamar->Alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="Pengalaman_Kerja" class="form-label">Pengalaman Kerja</label>
                <input type="text" class="form-control" name="Pengalaman_Kerja" value="{{ $pelamar->Pengalaman_Kerja }}" required>
            </div>
            
            <div class="mb-3">
                <label for="Riwayat_Pendidikan" class="form-label">Riwayat Pendidikan</label>
                <input type="text" class="form-control" name="Riwayat_Pendidikan" value="{{ $pelamar->Riwayat_Pendidikan }}" required>
            </div>

          

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Tambahkan script JS Bootstrap (pada akhir file sebelum </body>) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
