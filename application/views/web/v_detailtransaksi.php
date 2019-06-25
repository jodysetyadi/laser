<div class="container" style="margin-top: 160px">
	<div class="row justify-content-center">
		<div class="col-md-12">

			<!-- Breadcrumbs -->

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="text-dark" href="<?= base_url() ?>">Beranda</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
				</ol>
			</nav>

		</div>

		<div class="col-md-12">
			<?php if ($pesanan->status == "Menunggu Pembayaran" && $pesanan->metode_pembayaran == "Transfer") { ?>
				<div class="card bg-danger text-white mb-2">
					<div class="card-header">
						<div class="row text-center">
							<div class="col-md-12 text-left">
								<b>Silahkan Transfer ke salah satu nomor rekening kami : </b>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="col-md-6">
							<table class="table table-responsive">
								<tr>
									<td>Mandiri</td>
									<td>:</td>
									<td><b>1234544677 a/n Riza Alif Wildani</b></td>
								</tr>
								<tr>
									<td>BCA</td>
									<td>:</td>
									<td><b>7836427332 a/n Riza Alif Wildani</b></td>
								</tr>
								<tr>
									<td>BRI</td>
									<td>:</td>
									<td><b>33281342700038 a/n Riza Alif Wildani</b></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="card">
				<div class="card-header">
					<div class="row text-center">
						<div class="col-md-12 text-left">
							<b>Detail Transaksi</b>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-responsive">
									<tr>
										<td>No.Pesanan</td>
										<td>:</td>
										<td><b><?= $pesanan->no_pesanan ?></b></td>
									</tr>
									<tr>
										<td>Tanggal Pesan</td>
										<td>:</td>
										<?php $tgl = date('d M Y', strtotime($pesanan->tgl_pesanan)) ?>
										<td><b><?= $tgl ?></b></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td><b><?= $pesanan->nm_pelanggan ?></b></td>
									</tr>
									<tr>
										<td>Alamat Penerima</td>
										<td>:</td>
										<td><b><?= $pesanan->alamat_penerima ?></b></td>
									</tr>
									<tr>
										<td>Status Pesanan</td>
										<td>:</td>
										<td>
											<b class="text-success"><?= $pesanan->status ?></b>
											<input type="hidden" id="status" name="status" value="<?= $pesanan->status ?>">
										</td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table table-responsive">
									<tr>
										<td>Jumlah Item</td>
										<td>:</td>
										<td><b><?= $qty->qty ?></b></td>
									</tr>
									<tr>
										<td>Subtotal</td>
										<td>:</td>
										<td><b><?= $this->rupiah->setidr($subtotal) ?></b></td>
									</tr>
									<tr>
										<td>Kode Voucher</td>
										<td>:</td>
										<?php if ($pesanan->kd_voucher == NULL) { ?>
											<td><b>-</b></td>
										<?php } else { ?>
											<td><b><?= $pesanan->kd_voucher ?></b></td>
										<?php } ?>
									</tr>
									<tr>
										<td>Potongan Harga</td>
										<td>:</td>
										<?php if ($pesanan->kd_voucher == NULL) { ?>
											<td><b>-</b></td>
										<?php } else { ?>
											<td><b><?= $this->rupiah->setidr($potongan) ?></b></td>
										<?php } ?>
									</tr>
									<tr>
										<td>Total</td>
										<td>:</td>
										<td><b><?= $this->rupiah->setidr($total) ?></b></td>
									</tr>
									<tr>
										<td>Metode Pembayaran</td>
										<td>:</td>
										<td><b><?= $pesanan->metode_pembayaran ?></b></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<?php if ($pesanan->status == "Menunggu Pembayaran") { ?>
						<div id="uploadBuktiPembayaran" class="card-footer">
							<label for="">Upload Bukti Pembayaran</label>
							<form id="upload-bukti" method="POST">
								<div class="label">
									<input id="file" name="file" type="file" class="form-control">
								</div>
								<div class="buton mt-2">
									<button id="btn-uploadBukti" type="submit" class="btn btn-primary">Upload</button>
								</div>
							</form>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>