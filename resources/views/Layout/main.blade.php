<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grayscalce - Recruitmen Employee</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap 5)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body id="page-top">
    @include('partials.navbar')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Grayscale</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Jadilah Bagian Salah Satu dari kami</h2>
                    <a class="btn btn-primary" href="/proses-rekrutmen">Get Started</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section>
        <div class="container mt-5 mb-5">
            <h1>Cek Status Rekrutmen</h1>
            <input type="text" id="live-search" class="form-control" placeholder="Cari Nama Pelamar">
            <ul id="live-search-results" class="list-group mt-3"></ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Pelamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalContent">Informasi pelamar akan ditampilkan di sini.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section text-center" id="about" >
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Tempat Dimana Bakat Berkembang dan Inovasi Menjadi Kunci Kesuksesan</h2>
                    <p class="text-white-50">
                        Kami Mencari Para Visioner dan Pekerja Keras untuk Membangun Masa Depan Bersama
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#live-search').on('input', function () {
                var query = $(this).val();
    
                $.ajax({
                    url: "{{ route('live-search') }}",
                    method: 'GET',
                    data: { query: query },
                    success: function (data) {
                        $('#live-search-results').empty();
    
                        if (data && data.length > 0) {
                            $.each(data, function (key, value) {
                                var tahapProses = value.Tahap_Proses ?? 'Belum di Proses';
                                var statusProses = value.Status_Proses ?? 'Belum di Proses';
    
                                var listItem = $('<li class="list-group-item cursor-pointer">' + value.Nama + ' - ' + tahapProses + ' - ' + statusProses + ' - ' + value.Posisi_Yang_Dilamar + '</li>');
    
                                listItem.click(function () {
                               
                                    var modalContentHtml = 'Nama: ' + value.Nama + '<br>Tahap Proses: ' + tahapProses + '<br>Status Proses: ' + statusProses + '<br>Posisi Yang Dilamar: ' + value.Posisi_Yang_Dilamar;
    
                            
                                    $('#modalContent').html(modalContentHtml);
                                    $('#detailModal').modal('show');
                                });
    
                                $('#live-search-results').append(listItem);
                            });
                        } else {
                            $('#live-search-results').append('<li class="list-group-item">Belum di Proses</li>');
                        }
                    }
                });
            });
        });
    </script>
    
</body>
</html>
