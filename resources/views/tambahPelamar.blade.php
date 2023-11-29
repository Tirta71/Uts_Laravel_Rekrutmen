<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pelamar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')
    <div class="container mt-5">

        <h1 class="mb-4 mt-5">Masukan Data Anda</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form name="pelamarForm" method="post" action="{{ route('tambah-pelamar') }}" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <label for="Nama">Nama:</label>
                <input type="text" name="Nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Alamat">Alamat:</label>
                <input type="text" name="Alamat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Nomor_Telepon">Nomor Telepon:</label>
                <input type="text" name="Nomor_Telepon" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="Email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Posisi_Yang_Dilamar">Posisi Yang Dilamar:</label>
                <select name="Posisi_Yang_Dilamar" class="form-control" required>
                    <option value="" selected disabled>Pilih Posisi</option>
                    @foreach ($posisiOptions as $posisi)
                        <option value="{{ $posisi->posisi }}">{{ $posisi->posisi }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="Pengalaman_Kerja">Pengalaman Kerja:</label>
                <textarea name="Pengalaman_Kerja" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="Riwayat_Pendidikan">Riwayat Pendidikan:</label>
                <textarea name="Riwayat_Pendidikan" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="Skill">Skill:</label>
                <input type="text" name="Skill" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Tambah Pelamar</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function validateForm() {
            var elements = document.forms["pelamarForm"].elements;
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].type !== "submit" && elements[i].value.trim() === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap isi semua bidang formulir!',
                    });
                    return false;
                }
            }
            return true;
        }

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ada kesalahan dalam formulir. Periksa kembali isian Anda.',
            });
        @endif
    </script>
</body>
</html>
