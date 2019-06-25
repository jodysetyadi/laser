<div class="container" style="margin-top: 160px">
	<div class="row">
		<div class="col-md-12">

			<!-- Breadcrumbs -->

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="text-dark" href="<?= base_url() ?>">Beranda</a></li>
					<li class="breadcrumb-item active" aria-current="page">Keranjang</li>
				</ol>
			</nav>

		</div>

		<div class="col-md-8 mb-2">
			<div class="card">
				<div class="card-header text-white" style="background-color: #2495ff">
					<div class="container">
						<div class="row text-center">
							<div class="col-md-6 text-left">
								<b>Barang</b>
							</div>
							<div class="col-md-4 text-center">
								<b>Harga</b>
							</div>
							<div class="col-md-2">
								<b>Kuantitas</b>
							</div>
						</div>
					</div>
				</div>
				<?php foreach ($cart->result() as $res) { ?>
					<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-md-2">
									<img src="<?= $res->img ?>" alt="" width="100%"><br>
								</div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-12">
											<h5><?= $res->brand ?></h5>
										</div>
										<div class="col-md-12">
											<h6><?= $res->nm_produk ?></h6>
											<hr>
										</div>
										<div class="col-6">
											<select data-id="<?= $res->id_produk ?>" class="form-control" name="warna" id="warna">
												<option value="<?= $res->id_warna ?>"><?= $res->nm_warna ?></option>
												<?php foreach ($color as $col) { ?>
													<option value="<?= $col->id_warna ?>"><?= $col->nm_warna ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-6">
											<select data-id="<?= $res->id_produk ?>" class="form-control" name="ukuran" id="ukuran">
												<option value="<?= $res->id_ukuran ?>"><?= $res->nm_ukuran ?></option>
												<?php foreach ($size as $sz) { ?>
													<option value="<?= $sz->id_ukuran ?>"><?= $sz->nm_ukuran ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-12">
											<hr>
											<a data-id="<?= $res->id_produk ?>" id="delete-item" href="" class="btn btn-danger fa fa-sm fa-trash"></a>
										</div>
									</div>
								</div>
								<?php if ($res->diskon == NULL) { ?>
									<div class="col-md-4 text-center">
										<h4><?= $this->rupiah->setidr($res->harga) ?></h4>
									</div>
								<?php } else { ?>
									<div class="col-md-4 text-center">
										<h4><?= $this->rupiah->setidr($res->harga_promo) ?></h4>
									</div>
								<?php } ?>
								<div class="col-md-2">
									<h4><input data-id="<?= $res->id_produk ?>" id="kuantitas" name="kuantitas" type="number" value="<?= $res->qty ?>" class="form-control text-center"></h4>
								</div>
							</div>
						</div>
					</div>
					<hr>
				<?php } ?>
			</div>
		</div>
		<?php foreach ($cart->result() as $res) { ?>
			<div class="col-md-4">
				<form action="<?= base_url('Member/buatpesanan') ?>" method="post">
					<div class="card">
						<div class="card-header text-white text-center" style="background-color: #2495ff">
							<b>BUAT PESANAN</b>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-12 card-title">
											<h5>Pengiriman</h5>
										</div>
										<div class="col-md-12 card-text">
											<input type="hidden" name="alamat" id="alamat" value="<?= $res->alamat_pelanggan ?>">
											<p><?= $res->alamat_pelanggan ?><br><?= $res->no_hp ?></p>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<hr>
									<?= $res->email ?>
								</div>
								<div class="col-md-12 card-title">
									<hr>
									<h5>Rangkuman pesanan</h5>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6 card-text">
											<p>Subtotal ( <?= $qty->quantity ?> )</p>
										</div>
										<div class="col-md-6 card-title">
											<?php if ($res->diskon == NULL) { ?>
												<p class="text-right text-dark"><?= $this->rupiah->setidr($subtotal->sub) ?></p>
											<?php } else { ?>
												<p class="text-right text-dark"><?= $this->rupiah->setidr($subtotal->sub) ?></p>
											<?php } ?>
										</div>
									</div>
									<hr>
								</div>
								<div class="col-md-7 mb-2">
									<input type="text" id="code-voucher" name="code-promo" class="form-control" placeholder="Kode Voucher">
								</div>
								<div class="col-md-4">
									<a href="" id="btn-codeVoucher" class="btn btn-primary text-white">GUNAKAN</a>
								</div>
								<div id="akumulasi" class="col-md-12">
									<hr>
									<div class="row">
										<div class="col-md-8 card-text">
											<p>Potongan Harga</p>
										</div>
										<div id="potongan" class="col-md-4 card-title">
											<p class="text-right text-dark" id="potonganHarga">0</p>
											<input type="hidden" id="pot" name="pot">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 card-text">
											<p>Total</p>
										</div>
										<div class="col-md-6 card-title">
											<p class="text-right text-dark" id="totalHarga"><?= $this->rupiah->setidr($subtotal->sub) ?></p>
											<input type="hidden" id="total" name="total" value="<?= $subtotal->sub ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="metode">Metode Pembayaran</label>
												<select required class="form-control" name="metode" id="metode">
													<option value="">Pilih Metode</option>
													<option value="Transfer">Transfer</option>
													<option value="Bayar Di Tempat">Bayar Di Tempat</option>
												</select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-success form-control text-white">BUAT PESANAN</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		<?php } ?>
	</div>
</div>