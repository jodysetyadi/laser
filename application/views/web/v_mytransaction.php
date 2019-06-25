<div class="container" style="margin-top: 155px">
	<div class="row">
		<div class="col-md-12">

			<!-- Breadcrumbs -->

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="text-dark" href="<?= base_url() ?>">Beranda</a></li>
					<li class="breadcrumb-item active" aria-current="page">Transaksi Saya</li>
				</ol>
			</nav>

		</div>

		<div class="col-md-12">
			<?php foreach ($cart->result() as $res) { ?>
				<?php $tgl = date('d M Y', strtotime($res->tgl_pesanan)) ?>
				<div class="card mb-2">
					<div class="card-header">
						<?php if ($res->status == "Sudah Diterima") { ?>
							No.Pesanan : <?= $res->no_pesanan ?> - <?= $tgl ?> | Status : <b class="text-success"><?= $res->status ?></b> . . . <a href="<?= base_url('Member/Detailtransaction/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-info">Selengkapnya</a>
						<?php } else if ($res->status == "Menunggu Konfirmasi") { ?>
							No.Pesanan : <?= $res->no_pesanan ?> - <?= $tgl ?> | Status : <b class="text-warning"><?= $res->status ?></b> . . . <a href="<?= base_url('Member/Detailtransaction/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-info">Selengkapnya</a>
						<?php } else if ($res->status == "Sedang di kirim") { ?>
							No.Pesanan : <?= $res->no_pesanan ?> - <?= $tgl ?> | Status : <b class="text-info"><?= $res->status ?></b> . . . <a href="<?= base_url('Member/Detailtransaction/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-info">Selengkapnya</a>
						<?php } else if ($res->status == "Menunggu Pembayaran") { ?>
							No.Pesanan : <?= $res->no_pesanan ?> - <?= $tgl ?> | Status : <b class="text-primary"><?= $res->status ?></b> . . . <a href="<?= base_url('Member/Detailtransaction/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-info">Selengkapnya</a>
						<?php } else { ?>
							No.Pesanan : <?= $res->no_pesanan ?> - <?= $tgl ?> | Status : <b class="text-danger"><?= $res->status ?></b> . . . <a href="<?= base_url('Member/Detailtransaction/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-info">Selengkapnya</a>
						<?php } ?>
					</div>
					<?php if ($res->status == "Sedang di kirim") { ?>
						<a href="<?= base_url('Member/Konfirmasiditerima/') ?><?= $res->no_pesanan ?>" class="btn btn-sm btn-success">Konfirmasi Barang Diterima</a>
					<?php } ?>

					<?php foreach ($detail as $dt) { ?>
						<?php if ($dt->no_pesanan == $res->no_pesanan) { ?>
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col-md-2">
											<img src="<?= $dt->img ?>" alt="" width="100%"><br>
										</div>
										<div class="col-md-4">
											<div class="row">
												<div class="col-md-12">
													<h5><?= $dt->brand ?></h5>
												</div>
												<div class="col-md-12">
													<h6><?= $dt->nm_produk ?></h6>
													<hr>
												</div>
												<div class="col-md-12">
													<label for="">Warna : <?= $dt->nm_warna ?></label>
												</div>
												<div class="col-md-12">
													<label for="">Ukuran : <?= $dt->nm_ukuran ?></label>
												</div>

											</div>
										</div>
										<?php if ($dt->diskon == NULL) { ?>
											<div class="col-md-4 text-center">
												<?php $total = $dt->harga * $dt->jumlah_beli ?>
												<h4><?= $this->rupiah->setidr($total) ?></h4>
											</div>
										<?php } else { ?>
											<div class="col-md-4 text-center">
												<?php $total = $dt->harga_promo * $dt->jumlah_beli ?>
												<h4><?= $this->rupiah->setidr($total) ?></h4>
											</div>
										<?php } ?>
										<div class="col-md-2">
											<h4><input data-id="<?= $dt->id_produk ?>" id="kuantitas" name="kuantitas" readonly type="text" value="<?= $dt->jumlah_beli ?>" class="form-control text-center"></h4>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>