$(document).ready(function() {
    $(".data-table").on('click','#delete-pelanggan',function(event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_pelanggan = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
					url: 'deletePelanggan',
					type: 'post',
					data: {
						id_pelanggan : id_pelanggan
					},
					success: function (data) {
						if (data === "success") {
							alert("Data berhasil di hapus");
							window.location.reload();
						} else {
							alert("Gagal menghapus data");
						}
					}
				});
		}
    });
    
    $(".data-table").on('click','#delete-ulasan',function(event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_ulasan = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
					url: 'deleteUlasan',
					type: 'post',
					data: {
						id_ulasan : id_ulasan
					},
					success: function (data) {
						if (data === "success") {
							alert("Data berhasil di hapus");
							window.location.reload();
						} else {
							alert("Gagal menghapus data");
						}
					}
				});
		}
    });
    
    $(".data-table").on('click','#delete-inbox',function(event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
					url: 'deleteInbox',
					type: 'post',
					data: {
						id : id
					},
					success: function (data) {
						if (data === "success") {
							alert("Data berhasil di hapus");
							window.location.reload();
						} else {
							alert("Gagal menghapus data");
						}
					}
				});
		}
    });
    
    $("#btn-previewBukti").click(function(e) {
        e.preventDefault();

        $("#buktiModal").modal('show');
    });

    $("#btn-confirm").click(function(e) {
        e.preventDefault();

        var no_pesanan = $(this).attr("data-no"),
            id_pelanggan = $(this).attr("data-id");

            $.ajax({
                url: '../konfirmasiPesanan',
                type: 'post',
                data: {
                    no_pesanan : no_pesanan,
                    id_pelanggan : id_pelanggan
                },
                success: function (data) {
                    if (data === "success") {
                        alert("Pesanan berhasil di konfirmasi");
                        window.location.reload();
                    } else {
                        alert("Gagal konfirmasi pesanan, server error");
                    }
                }
            });
    });

    $("#btn-cancel").click(function(e) {
        e.preventDefault();

        var no_pesanan = $(this).attr("data-no"),
            id_pelanggan = $(this).attr("data-id");

            $.ajax({
                url: '../batalKonfirmasi',
                type: 'post',
                data: {
                    no_pesanan : no_pesanan,
                    id_pelanggan : id_pelanggan
                },
                success: function (data) {
                    if (data === "success") {
                        alert("Pesanan berhasil di batalkan");
                        window.location.reload();
                    } else {
                        alert("Gagal konfirmasi pesanan, server error");
                    }
                }
            });
    });
});