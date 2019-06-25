$(document).ready(function() {

    // Signup

    $("#passwordsignup").keyup(function(event) {
        /* Act on the event */

        if ($(this).val() == "") {
            $("#confirmsignup").attr('readonly', 'readonly');
        } else {
            $("#confirmsignup").removeAttr('readonly');
        }
    }); 

    if ($("#confirmsignup").val() == "") {
        $("#confirmsignup").attr('readonly', 'readonly');
    }

    $("#confirmsignup").change(function(event) {
        /* Act on the event */
        if ($(this).val() != "") {
            if ($(this).val() != $("#passwordsignup")) {
                alert("Password Tidak Cocok");
                $(this).focus();
            }
        }
    });

    // add to cart

    $("#btn-addToCart").click(function(e) {
        e.preventDefault();

        var id_produk = $(this).attr('data-id'),
            id_ukuran = $("#ukuran").val(),
            id_warna = $("#warna").val(),
            harga = $("#hargaProduk").val(),
            qty = $("#quantity_value").text();

        if (id_ukuran == "") {
            alert("Harap Pilih Ukuran");
        } else {
            if (id_warna == "") {
                alert("Harap Pilih Warna");
            }
        }
        
        if ((id_ukuran != "") && (id_warna != "")) {
            $.ajax({
                url : '../../Member/addToCart',
                type : 'post',
                data : {
                    id_produk : id_produk,
                    id_ukuran : id_ukuran,
                    id_warna : id_warna,
                    qty : qty,
                    harga : harga
                },
                success : function(data) {
                    $("#addToCartModal").modal('show');
                }
            });
        }
        
    });

    // Logout Modal

    $("#btn-logout").click(function(e) {
        e.preventDefault();

        $("#logoutModal").modal('show');
    });

    // Profile Member

    $("#btn-changeName").click(function(event) {
        /* Act on the event */
        event.preventDefault();

        $("#name").removeAttr('readonly');
        $("#name").focus();
    });

    $("#name").change(function(event) {
        /* Act on the event */
        if ($(this).val() == "") {
            $("#name").removeAttr('readonly');
            $("#name").focus();
            alert('Harap Masukkan Nama Lengkap Anda');
        } else {
            $("#name").attr('readonly','readonly');
        }
    });

    $("#name").focusout(function(event) {
        /* Act on the event */
        $("#name").attr('readonly', 'readonly');
    });

    $("#btn-changePassword").click(function(event) {
        /* Act on the event */

        event.preventDefault();

        $("div[name='password-change']").removeAttr('hidden');
        $("#passwordDefault").focus();
        $("#btn-update").attr('disabled', 'disabled');
        $(this).attr('disabled', 'disabled');
        $("#btn-cancelChangePassword").removeAttr('hidden');
    });

    $("#btn-cancelChangePassword").click(function(event) {
        /* Act on the event */

        event.preventDefault();

        $("div[name='password-change']").attr('hidden','hidden');
        $("#btn-update").removeAttr('disabled');
        $("#btn-changePassword").removeAttr('disabled');
        $("#passwordDefault").val("");
        $("#passwordNew").val("");
        $("#passwordConfirm").val("");
        $(this).attr('hidden', 'hidden');
    });

    // Change Foto

    $("#img-member").on('click', '#btn-changeFoto', function(event) {
        /* Act on the event */
        event.preventDefault();

        $("#modalChangeFoto").modal("show");
    });

    $("#show-btnimage").on('click', '#btn-changeUploadFoto', function(event) {
        /* Act on the event */
        event.preventDefault();

        $("#modalChangeFoto").modal("show");
    });

    $("#show-btnimage").on('click', '#btn-cancelUpload', function(event) {
        /* Act on the event */
        event.preventDefault();

        var path = $("#pathimage").attr("src");

        $.ajax({
                url: './cancelUpload',
                type: 'post',
                data: {
                    path : path
                },
                success: function (data) {
                    if (data == "success") {
                        $("#img-member").html('<button id="btn-changeFoto" class="btn btn-warning text-dark mt-5 form-control"><i class="fa fa-lg fa-upload"></i> Upload Foto</button>');
                        $("#btn-cancelUpload").remove();
                    } else {
                        alert("Gagal Membatalkan Upload");
                    }
                }
            });
    });

    $("#frm-upload").submit(function(event) {
        /* Act on the event */
        event.preventDefault();

        var foto = new FormData(this),
            file = $("#file").val();

        if (file != "") {
            $.ajax({
                    url: 'uploadFoto',
                    type: 'post',
                    data: foto,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (data) {

                        if (data == "error") {
                            alert('Gagal Mengupload! pastikan ukuran file tidak melebihi batas ketentuan.');
                            $("#file").val("");
                        } else {
                            $("#loader_pesan").fadeOut();
                            $('#modalChangeFoto').modal('hide');
                            $("#img-member").html(data);
                            $("#show-btnimage").html('<button id="btn-cancelUpload" class="btn btn-sm btn-danger text-white form-control"><i class="fa fa-trash"></i> Batal Upload</button>');
                            $("#file").val("");
                            $("#foto").val($("#pathimage").attr("src"));
                        }
                    }
                });
        } else {
            alert("Harap Pilih File");
            $("#file").focus();
        }
        
    });

    // Change Password

    $("#passwordDefault").change(function(event) {
        /* Act on the event */

        if ($(this).val() != "") {
            var password = $(this).val();

            $.ajax({
                    url: './getPassword',
                    type: 'post',
                    data: {
                        password : password
                    },
                    success: function (data) {
                        if (data != "success") {
                            alert("Password Salah");
                            $("#passwordDefault").focus();
                        } else {
                            $("#passwordNew").removeAttr('readonly');
                        }
                    }
                });
        }
    });

    $("#passwordNew").change(function(event) {
        /* Act on the event */

        if ($(this).val() != "") {
            $("#passwordConfirm").removeAttr('readonly');
        }
    });

    $("#passwordConfirm").keyup(function(event) {
        /* Act on the event */

        if ($(this).val() != "") {
            var passwordNew = $("#passwordNew").val();

            if ($(this).val() != passwordNew) {
                alert("Password Tidak Cocok");
                $("#passwordConfirm").focus();
            } else {
                $("#btn-update").removeAttr('disabled');
            }
        }
    });

    $("#btn-update").click(function(e) {
        e.preventDefault();

        var no_hp = $("#telepon").val(),
            email = $("#email").val(),
            nama = $("#name").val(),
            kodepos = $("#kodepos").val(),
            alamat_pelanggan = $("#address").val(),
            password = $("#passwordConfirm").val(),
            foto = $("#foto").val();

        if (no_hp == "") {
            alert("No telepon tidak boleh kosong");
            $("#telepon").focus();
        } else if (email == "") {
            alert("Email tidak boleh kosong");
            $("#email").focus();
        } else if (nama == "") {
            alert("Nama tidak boleh kosong");
            $("#nama").focus();
        } else if (alamat_pelanggan == "") {
            alert("Alamat tidak boleh kosong");
            $("#address").focus();
        } else {
            $.ajax({
                    url: './updateProfile',
                    type: 'post',
                    data: {
                        no_hp : no_hp,
                        email : email,
                        nama : nama,
                        kodepos : kodepos,
                        alamat_pelanggan : alamat_pelanggan,
                        password : password,
                        foto : foto
                    },
                    success: function (data) {
                        if (data == "success") {
                            alert("Profile berhasil diperbarui");
                            $("#btn-cancelChangePassword").attr('hidden','hidden');
                            $("#btn-changePassword").removeAttr('hidden');
                            $("#show-btnimage").html('<button id="btn-changeUploadFoto" class="btn btn-sm btn-outline-light form-control"><i class="fa fa-lg fa-upload"></i> Ubah Foto</button>');
                            $("div[name='password-change']").attr('hidden','hidden');
                            $("#passwordDefault").val("");
                            $("#passwordNew").val("");
                            $("#passwordConfirm").val("");
                        } else {
                            alert("Profile Gagal diperbarui");
                        }
                    }
                });
        }
    });

    $("#btn-codeVoucher").click(function(event) {
        /* Act on the event */
        event.preventDefault();

        var kode_voucher = $("#code-voucher").val(),
            total = $("#total").val();

        $.ajax({
                url: '../Member/getCodeVoucher',
                type: 'post',
                data: {
                    kode_voucher : kode_voucher,
                    total : total
                },
                success: function (data) {
                    if (data === "error") {
                        alert("Kode Voucher Tidak Valid");
                        $("#pot").val(0);
                        $("#potonganHarga").text(0);
                    } else {
                        $("#akumulasi").html(data);
                    }
                }
            });
    });

    // Change Color In Cart

    $("#warna").change(function(event) {
        /* Act on the event */
        var warna = $(this).val(),
            id_produk = $(this).attr("data-id");

        $.ajax({
                url: '../Member/updateColorCart',
                type: 'post',
                data: {
                    warna : warna,
                    id_produk : id_produk
                },
                success: function (data) {
                }
            });
    });

    $("#ukuran").change(function(event) {
        /* Act on the event */
        var ukuran = $(this).val(),
            id_produk = $(this).attr("data-id");

        $.ajax({
                url: '../Member/updateSizeCart',
                type: 'post',
                data: {
                    ukuran : ukuran,
                    id_produk : id_produk
                },
                success: function (data) {
                }
            });
    });

    $("#kuantitas").change(function(event) {
        /* Act on the event */

        var qty = $(this).val(),
            id_produk = $(this).attr('data-id');

            $.ajax({
                    url: '../Member/updateQtyCart',
                    type: 'post',
                    data: {
                        qty : qty,
                        id_produk : id_produk
                    },
                    success: function (data) {
                        
                    }
                });
    });

    $("#delete-item").click(function(event) {
        /* Act on the event */

        var id_produk = $(this).attr('data-id'),
            current = $(this);

            $.ajax({
                    url: '../Member/deleteItemCart',
                    type: 'post',
                    data: {
                        id_produk : id_produk
                    },
                    success: function (data) {
                        current.parent().parent().parent().parent().parent().remove();
                    }
                });
    });

    // Upload Bukti Pembayaran

    $("#upload-bukti").submit(function(e) {
        /* Act on the event */
        e.preventDefault();

        $.ajax({
                url: '../UploadBukti',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function (data) {
                    if (data === "success") {
                        alert("Bukti pembayaran berhasil di upload. Mohon tunggu untuk proses konfirmasi.");
                    } else {
                        alert("Gagal upload, periksa kembali file anda");
                    }
                }
            });
    });

    if (($("#status").val() === "Menunggu Konfirmasi") || ($("#status").val() === "Sedang Dikirim")) {
        $("#btn-uploadBukti").attr('disabled', 'disabled');
        $("#file").attr('disabled', 'disabled');
    }

    $("#inbox-click").click(function(event) {
        /* Act on the event */
        const Url = "http://localhost/franzshop/Member/Mytransaction",
              inbox = "http://localhost/franzshop/Member/updateInbox";
        var status = "Sudah Dibaca";

        $.ajax({
                url: inbox,
                type: 'post',
                data: {
                    status : status
                },
                success: function (data) {
                    window.location.assign(Url);     
                }
            });
    });

});