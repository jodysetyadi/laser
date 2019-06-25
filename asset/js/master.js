$(document).ready(function () {

	// CRUD ADMIN

	$("#create-admin").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-admin").removeAttr('hidden');
		$("#nama").focus();
	});

	$("#master-admin").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nama = $("#nama").val(),
			username = $("#username").val(),
			email = $("#email").val(),
			no_hp = $("#hp").val(),
			level = $("#level").val(),
			password = $("#password").val(),
			konfirmasi = $("#konfirmasi").val();

		if (password != konfirmasi) {
			alert("Konfirmasi password tidak cocok");
		} else {
			$.ajax({
				url: 'createAdmin',
				type: 'post',
				data: {
					nama: nama,
					username: username,
					email: email,
					no_hp: no_hp,
					level: level,
					password: password
				},
				success: function (data) {
					if (data == "success") {
						alert("Data berhasil di simpan");
						window.location.reload();
					} else {
						alert("Gagal menyimpan");
					}
				}
			});
		}
	});

	$(".data-table").on('click', '#edit-admin', function (event) {
		event.preventDefault();

		$("#create-admin").attr('disabled', 'disabled');
		var id_admin = $(this).attr('data-id');

		$.ajax({
			url: 'getAdmin',
			type: 'post',
			data: {
				id_admin: id_admin
			},
			success: function (data) {
				$("#master-admin").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_admin);
				$("#username").val(data.username);
				$("#email").val(data.email);
				$("#hp").val(data.no_hp);
				$("#password").attr('readonly', 'readonly');
				$("#konfirmasi").attr('readonly', 'readonly');
				$("#level").val(data.level);
				$("#btn-action").html('<button data-id=' + data.id_admin + ' id="updateAdmin" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateAdmin', function (e) {
		e.preventDefault();

		var id_admin = $("#updateAdmin").attr('data-id');
		nama = $("#nama").val(),
			username = $("#username").val(),
			email = $("#email").val(),
			no_hp = $("#hp").val(),
			level = $("#level").val();

		$.ajax({
			url: 'updateAdmin',
			type: 'post',
			data: {
				id_admin: id_admin,
				nama: nama,
				username: username,
				email: email,
				no_hp: no_hp,
				level: level
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-admin', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_admin = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteAdmin',
				type: 'post',
				data: {
					id_admin: id_admin
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

	// CRUD Ukuran

	$("#create-ukuran").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-ukuran").removeAttr('hidden');
		$("#nama").focus();
	});

	$("#master-ukuran").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nama = $("#nama").val();

		$.ajax({
			url: 'createUkuran',
			type: 'post',
			data: {
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-ukuran', function (event) {
		event.preventDefault();

		$("#create-ukuran").attr('disabled', 'disabled');
		var id_ukuran = $(this).attr('data-id');

		$.ajax({
			url: 'getUkuran',
			type: 'post',
			data: {
				id_ukuran: id_ukuran
			},
			success: function (data) {
				$("#master-ukuran").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_ukuran);
				$("#btn-action").html('<button data-id=' + data.id_ukuran + ' id="updateUkuran" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateUkuran', function (e) {
		e.preventDefault();

		var id_ukuran = $("#updateUkuran").attr('data-id'),
			nama = $("#nama").val();

		$.ajax({
			url: 'updateUkuran',
			type: 'post',
			data: {
				id_ukuran: id_ukuran,
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-ukuran', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_ukuran = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteUkuran',
				type: 'post',
				data: {
					id_ukuran: id_ukuran
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

	// CRUD Warna

	$("#create-warna").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-warna").removeAttr('hidden');
		$("#nama").focus();
	});

	$("#master-warna").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nama = $("#nama").val();

		$.ajax({
			url: 'createWarna',
			type: 'post',
			data: {
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-warna', function (event) {
		event.preventDefault();

		$("#create-warna").attr('disabled', 'disabled');
		var id_warna = $(this).attr('data-id');

		$.ajax({
			url: 'getWarna',
			type: 'post',
			data: {
				id_warna: id_warna
			},
			success: function (data) {
				$("#master-warna").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_warna);
				$("#btn-action").html('<button data-id=' + data.id_warna + ' id="updateWarna" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateWarna', function (e) {
		e.preventDefault();

		var id_warna = $("#updateWarna").attr('data-id'),
			nama = $("#nama").val();

		$.ajax({
			url: 'updateWarna',
			type: 'post',
			data: {
				id_warna: id_warna,
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-warna', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_warna = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteWarna',
				type: 'post',
				data: {
					id_warna: id_warna
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

	// CRUD Voucher

	$("#create-voucher").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-voucher").removeAttr('hidden');
		$("#kd_voucher").focus();
	});

	$("#master-voucher").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var kd_voucher = $("#kd_voucher").val(),
			potongan_harga = $("#potongan").val();

		$.ajax({
			url: 'createVoucher',
			type: 'post',
			data: {
				kd_voucher: kd_voucher,
				potongan_harga: potongan_harga
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-voucher', function (event) {
		event.preventDefault();

		$("#create-voucher").attr('disabled', 'disabled');
		var id_voucher = $(this).attr('data-id');

		$.ajax({
			url: 'getVoucher',
			type: 'post',
			data: {
				id_voucher: id_voucher
			},
			success: function (data) {
				$("#master-voucher").removeAttr('hidden');
				data = JSON.parse(data);
				$("#kd_voucher").val(data.kd_voucher);
				$("#potongan").val(data.potongan_harga);
				$("#btn-action").html('<button data-id=' + data.id_voucher + ' id="updateVoucher" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateVoucher', function (e) {
		e.preventDefault();

		var id_voucher = $("#updateVoucher").attr('data-id'),
			kd_voucher = $("#kd_voucher").val(),
			potongan_harga = $("#potongan").val();

		$.ajax({
			url: 'updateVoucher',
			type: 'post',
			data: {
				id_voucher: id_voucher,
				potongan_harga: potongan_harga,
				kd_voucher: kd_voucher
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-voucher', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_voucher = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteVoucher',
				type: 'post',
				data: {
					id_voucher: id_voucher
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

	// CRUD Category

	$("#create-category").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-category").removeAttr('hidden');
		$("#nama").focus();
	});

	$("#master-category").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nama = $("#nama").val();

		$.ajax({
			url: 'createCategory',
			type: 'post',
			data: {
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-category', function (event) {
		event.preventDefault();

		$("#create-category").attr('disabled', 'disabled');
		var id_kategori = $(this).attr('data-id');

		$.ajax({
			url: 'getCategory',
			type: 'post',
			data: {
				id_kategori: id_kategori
			},
			success: function (data) {
				$("#master-category").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_kategori);
				$("#btn-action").html('<button data-id=' + data.id_kategori + ' id="updateCategory" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateCategory', function (e) {
		e.preventDefault();

		var id_kategori = $("#updateCategory").attr('data-id'),
			nama = $("#nama").val();

		$.ajax({
			url: 'updateCategory',
			type: 'post',
			data: {
				id_kategori: id_kategori,
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-category', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_kategori = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteCategory',
				type: 'post',
				data: {
					id_kategori: id_kategori
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

	// CRUD Subcategory

	$("#create-subkategori").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$("#master-subkategori").removeAttr('hidden');
		$("#nama").focus();
	});

	$("#master-subkategori").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nama = $("#nama").val(),
			id_kategori = $("#id_kategori").val();

		$.ajax({
			url: 'createSubcategory',
			type: 'post',
			data: {
				nama: nama,
				id_kategori: id_kategori
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-subkategori', function (event) {
		event.preventDefault();

		$("#create-subkategori").attr('disabled', 'disabled');
		var id_subkategori = $(this).attr('data-id');

		$.ajax({
			url: 'getSubcategory',
			type: 'post',
			data: {
				id_subkategori: id_subkategori
			},
			success: function (data) {
				$("#master-subkategori").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_subkategori);
				$("#id_kategori").val(data.id_kategori);
				$("#btn-action").html('<button data-id=' + data.id_subkategori + ' id="updateSubcategory" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateSubkategori', function (e) {
		e.preventDefault();

		var id_subkategori = $("#updateSubkategori").attr('data-id'),
			nama = $("#nama").val();
		id_kategori = $("#id_kategori").val();

		$.ajax({
			url: 'updateSubcategory',
			type: 'post',
			data: {
				id_kategori: id_kategori,
				id_subkategori: id_subkategori,
				nama: nama
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-subkategori', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_subkategori = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteSubcategory',
				type: 'post',
				data: {
					id_subkategori: id_subkategori
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

	// CRUD PRODUK

	$("#create-produk").click(function (event) {
		/* Act on the event */
		event.preventDefault();

		$(".form-produk").removeAttr('hidden');
		$("#file").focus();
	});

	$("#form-produk").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var data = new FormData(this),
			file = $("#file").val();

		if (file === "") {
			alert("Harap Pilih File");
			$("file").focus();
		} else {

			$.ajax({
				url: 'uploadGambar',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache: false,
				success: function (data) {
					if (data === "error") {
						alert("Gagal mengupload");
					} else {
						$("#srcimage").html(data);
						alert("Upload berhasil");
					}
				}
			});

		}
	});

	$("#master-produk").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var nm_produk = $("#nama").val(),
			id_subkategori = $("#id_subkategori").val(),
			brand = $("#brand").val(),
			deskripsi = $("#deskripsi").val(),
			diskon = $("#diskon").val(),
			harga = $("#harga").val(),
			modal = $("#modal").val(),
			stok = $("#stok").val(),
			img = $("#pathimage").attr("src");

		$.ajax({
			url: 'createProduk',
			type: 'post',
			data: {
				nm_produk: nm_produk,
				id_subkategori: id_subkategori,
				brand: brand,
				nm_produk: nm_produk,
				deskripsi: deskripsi,
				diskon: diskon,
				harga: harga,
				modal: modal,
				stok: stok,
				img: img
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di simpan");
					window.location.reload();
				} else {
					alert("Gagal menyimpan");
				}
			}
		});
	});

	$(".data-table").on('click', '#edit-produk', function (event) {
		event.preventDefault();

		$("#create-produk").attr('disabled', 'disabled');
		var id_produk = $(this).attr('data-id');

		$.ajax({
			url: 'getProduk',
			type: 'post',
			data: {
				id_produk: id_produk
			},
			success: function (data) {
				$(".form-produk").removeAttr('hidden');
				data = JSON.parse(data);
				$("#nama").val(data.nm_produk);
				$("#nama").focus();
				$("#id_subkategori").val(data.id_subkategori);
				$("#brand").val(data.brand);
				$("#nm_produk").val(data.nm_produk);
				$("#deskripsi").val(data.deskripsi);
				$("#diskon").val(data.diskon);
				$("#harga").val(data.harga);
				$("#modal").val(data.modal);
				$("#stok").val(data.stok);
				$("#btn-action").html('<button data-id=' + data.id_admin + ' id="updateAdmin" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateProduk', function (e) {
		e.preventDefault();

		var id_produk = $("#updateProduk").attr('data-id'),
			nm_produk = $("#nama").val(),
			id_subkategori = $("#id_subkategori").val(),
			brand = $("#brand").val(),
			nm_produk = $("#nm_produk").val(),
			deskripsi = $("#deskripsi").val(),
			diskon = $("#diskon").val(),
			harga = $("#harga").val(),
			modal = $("#modal").val(),
			stok = $("#stok").val(),
			img = $("#pathimage").attr("src");

		$.ajax({
			url: 'updateAdmin',
			type: 'post',
			data: {
				id_produk: id_produk,
				nm_produk: nm_produk,
				id_subkategori: id_subkategori,
				brand: brand,
				nm_produk: nm_produk,
				deskripsi: deskripsi,
				diskon: diskon,
				harga: harga,
				modal: modal,
				stok: stok,
				img: img
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	$(".data-table").on('click', '#delete-produk', function (event) {
		/* Act on the event */
		event.preventDefault();

		var confirmation = confirm("Anda yakin akan menghapus?"),
			id_produk = $(this).attr('data-id');

		if (confirmation === true) {
			$.ajax({
				url: 'deleteProduk',
				type: 'post',
				data: {
					id_produk: id_produk
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

	// CRUD PROMO

	$(".data-table").on('click', '#edit-promo', function (event) {
		event.preventDefault();

		var id_promothisweek = $(this).attr('data-id');
		$("#master-promo").removeAttr('hidden');

		$.ajax({
			url: 'getPromo',
			type: 'post',
			data: {
				id_promothisweek: id_promothisweek
			},
			success: function (data) {
				data = JSON.parse(data);
				console.log(data);
				$("#promo-produk").val(data.id_produk);
				$("#promo-produk").focus();
				$("#promo-tgl").val(data.date_promo);
				$("#btn-action").html('<button data-id=' + data.id_promothisweek + ' id="updatePromo" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updatePromo', function (e) {
		e.preventDefault();

		var id_promothisweek = $("#updatePromo").attr('data-id'),
			id_produk = $("#promo-produk").val(),
			date_promo = $("#promo-tgl").val();

		// return console.log(id_produk);

		$.ajax({
			url: 'updatePromo',
			type: 'post',
			data: {
				id_promothisweek: id_promothisweek,
				id_produk: id_produk,
				date_promo: date_promo
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});

	// CRUD BANNER

	$("#uploadBanner").submit(function (event) {
		/* Act on the event */
		event.preventDefault();

		var data = new FormData(this),
			file = $("#file").val();

		if (file === "") {
			alert("Harap Pilih File");
			$("file").focus();
		} else {

			$.ajax({
				url: 'uploadBanner',
				type: 'post',
				data: data,
				contentType: false,
				processData: false,
				cache: false,
				success: function (data) {
					if (data === "error") {
						alert("Gagal mengupload");
					} else {
						setTimeout(() => {
							$(".img-banner").html(data);
						}, 200);
						alert("Upload berhasil");
					}
				}
			});

		}
	});

	// Get Banner

	$(".data-table").on('click', '#edit-banner', function (event) {
		event.preventDefault();

		var id_carousel = $(this).attr('data-id');

		$.ajax({
			url: 'getBanner',
			type: 'post',
			data: {
				id_carousel: id_carousel
			},
			success: function (data) {
				$(".edit").removeAttr('hidden');
				data = JSON.parse(data);
				$("#title").val(data.title);
				$("#img").val(data.img);
				$(".img-banner").html('<img id="pathimage" class="img-thumbnail mb-2 bg-dark" width="100%" height="auto" src="' + data.img + '" alt="">');
				$("#file").focus();
				$("#btn-action").html('<button data-id=' + data.id_carousel + ' id="updateBanner" type="button" class="form-control btn btn-primary">UPDATE</button>');
			}
		});
	});

	$("#btn-action").on('click', '#updateBanner', function (e) {
		e.preventDefault();

		var id_carousel = $("#updateBanner").attr('data-id'),
			img = $("#pathimage").attr('src'),
			title = $("#title").val();

		$.ajax({
			url: 'updateBanner',
			type: 'post',
			data: {
				id_carousel: id_carousel,
				title: title,
				img: img
			},
			success: function (data) {
				if (data == "success") {
					alert("Data berhasil di update");
					window.location.reload();
				} else {
					alert("Gagal mengupdate");
				}
			}
		});
	});


});