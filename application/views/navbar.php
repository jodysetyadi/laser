<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left text-dark">Manjakan gaya anda dengan produk terbaik kami</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- My Account -->

								<li class="account" style="background-color: #2495ff">
									<a class="text-white" href="#">
										Akun Saya
										<i class="fa fa-angle-down mr-2"></i>
									</a>
									<ul class="account_selection">
										<?php if ($this->session->userdata('status') == "login") { ?>
											<li><a href="<?= base_url('Member/Logout') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>
											<li><a href="<?= base_url('Member/Mytransaction') ?>"> Transaksi</a></li>
										<?php } else { ?>
											<li><a href="<?= base_url('Login') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Masuk</a></li>
											<li><a href="<?= base_url('Signup') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Daftar</a></li>
										<?php } ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container text-left">
							<a class="fs_logo" href="<?= base_url() ?>">
								<span>
									<!-- <img width="30%" src="<?= base_url('asset/fulllogofs.png') ?>" alt=""> -->
									<h3 class="text-white pt-2"><b>LASER</b></h3>
								</span>
							</a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a class="text-white" href="<?= base_url() ?>">beranda</a></li>
								<li><a class="text-white" href="<?= base_url('Product/Promo') ?>">promo</a></li>
								<li><a class="text-white" href="<?= base_url('Contact') ?>">kontak kami</a></li>
							</ul>
							<ul class="navbar_user">
								<?php if ($this->session->userdata('status') == "login") { ?>
									<li>
										<div class="dropdown">
											<button type="button" style="background-color: #2495ff; border:0;" class="fa fa-lg fa-envelope text-white btn btn-light" id="dropdownMenuButton" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<?php $row = $this->db->get_where('pesan_pelanggan', ['id_pelanggan' => $this->session->userdata('id'), 'status' => NULL])->num_rows(); ?>
												<?= $row > 0 ? '<span class="checkout_items">' . $row . '</span>' : ''; ?>
											</button>
											<?php if ($row > 0) : ?>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<?php $inbox = $this->db->get_where('pesan_pelanggan', ['id_pelanggan' => $this->session->userdata('id'), 'status' => NULL])->result();
													foreach ($inbox as $inb) {
														?>
														<li class="dropdown-item text-white text-left" id="inbox-click">
															<?= $inb->pesan ?>
														</li>
													<?php } ?>
												</ul>
											<?php else : ?>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<li class="dropdown-item text-left" id="inbox-click">
														Tidak ada notifikasi
													</li>
												</ul>
											<?php endif ?>
										</div>
									</li>
								<?php } ?>
								<li>
									<a id="btn-search" href=""><i class="fa fa-search text-white" aria-hidden="true"></i></a>
								</li>
								<li>
									<?php
									$pelanggan = $this->db->get_where('pelanggan', ['id_pelanggan' => $this->session->userdata('id')])->row();
									if ($pelanggan) {
										$foto = $pelanggan->foto;
									} else {
										$foto = NULL;
									}
									?>
									<?php if (!is_null($foto)) { ?>
										<a href="<?= base_url('Member/Profile') ?>">
											<span><img width="25px" height="25px" class="rounded-circle" src="<?= $this->session->userdata('foto') ? $this->session->userdata('foto') : 'userlogo.png' ?>" alt=""></span>
										</a>
									<?php } else { ?>
										<a href="<?= base_url('Member/Profile') ?>">
											<span class="fa fa-user text-white"></span>
										</a>
									<?php } ?>
								</li>
								<li class="checkout">
									<a href="<?= base_url('Member/Cart') ?>">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">

											<?php
											$data = $this->db->get_where('keranjang', ['id_pelanggan' => $this->session->userdata('id')])->num_rows();

											if ($data == 0) {
												echo 0;
											} else {
												echo $data;
											}
											?>

										</span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						Profil Saya
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<?php if ($this->session->userdata('status') == "login") { ?>
							<li><a href="<?= base_url('Member/Logout') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>
						<?php } else { ?>
							<li><a href="<?= base_url('Login') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Masuk</a></li>
							<li><a href="<?= base_url('Signup') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Daftar</a></li>
						<?php } ?>
					</ul>
				</li>
				<li><a href="<?= base_url() ?>">BERANDA</a></li>
				<li><a href="<?= base_url('Product/Promo') ?>">PROMO</a></li>
				<li><a href="<?= base_url('Contact') ?>">KONTAK KAMI</a></li>
			</ul>
		</div>
	</div>


	<!-- Search Modal -->

	<div id="searchModal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Cari Produk Anda</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<input placeholder="Cari Nama produk, Harga, Kategori" type="text" class="form-control" id="keyword" name="keyword">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="btn-submitSearch" type="button" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Search Result -->

	<div id="searchResult" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Cari Produk Anda</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container">
						<div id="search-result" class="row">

						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button id="btn-submitSearch" type="button" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>