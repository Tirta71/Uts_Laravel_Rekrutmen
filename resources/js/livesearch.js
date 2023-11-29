$(document).ready(function () {
    $("#live-search").on("input", function () {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('live-search') }}",
            method: "GET",
            data: { query: query },
            success: function (data) {
                $("#live-search-results").empty();

                if (data && data.length > 0) {
                    $.each(data, function (key, value) {
                        var tahapProses =
                            value.Tahap_Proses ?? "Belum di Proses";
                        var statusProses =
                            value.Status_Proses ?? "Belum di Proses";

                        var listItem = $(
                            '<li class="list-group-item cursor-pointer">' +
                                value.Nama +
                                " - " +
                                tahapProses +
                                " - " +
                                statusProses +
                                " - " +
                                value.Posisi_Yang_Dilamar +
                                "</li>"
                        );

                        listItem.click(function () {
                            // Isi konten modal dengan informasi yang sesuai
                            var modalContentHtml =
                                "Nama: " +
                                value.Nama +
                                "<br>Tahap Proses: " +
                                tahapProses +
                                "<br>Status Proses: " +
                                statusProses +
                                "<br>Posisi Yang Dilamar: " +
                                value.Posisi_Yang_Dilamar;

                            // Tampilkan modal
                            $("#modalContent").html(modalContentHtml);
                            $("#detailModal").modal("show");
                        });

                        $("#live-search-results").append(listItem);
                    });
                } else {
                    $("#live-search-results").append(
                        '<li class="list-group-item">Belum di Proses</li>'
                    );
                }
            },
        });
    });
});
