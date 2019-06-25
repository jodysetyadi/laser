<?php echo $this->session->flashdata('msg'); ?>

<!-- Banner -->

<div class="main_slider" style="background-image:url(<?= $banner->img ?>)">
	<div class="container fill_height">
		<div class="row align-items-center fill_height">
			<div class="col">
				<div class="main_slider_content">
					<?= $banner->title ?>
					<div class="red_button shop_now_button">
						<a href="<?= base_url('Product') ?>">Beli sekarang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Categories -->

<div class="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(https://www.topkeren.com/wp-content/uploads/2018/02/Baju-Atasan-Wanita-Blouse-Kombinasi-Model-Terbaru-Warna-Merah-Maroon.jpg)">
					<div class="banner_category">
						<a href="<?= base_url('Product/Categories/Wanita') ?>">wanita</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(<?= base_url() ?>/asset/images/banner_2.jpg)">
					<div class="banner_category">
						<a href="<?= base_url('Product/Categories/Aksesoris') ?>">aksesoris</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="banner_item align-items-center" style="background-image:url(http://fashionoid.net/wp-content/uploads/2016/10/fashionoid.net_model-pakaian-pria.jpg)">
					<div class="banner_category">
						<a href="<?= base_url('Product/Categories/Pria') ?>">pria</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Produk Terbaru</h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col text-center">
				<div class="new_arrivals_sorting">
					<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">semua</li>
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">wanita</li>
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">aksesoris</li>
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">pria</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

					<?php foreach ($newArrivals as $newArr) : ?>

						<!-- Product -->

						<?php if ($newArr->nm_kategori == "Pria") { ?>

							<!-- Jika Ada Diskon -->

							<?php if ($newArr->diskon == NULL) { ?>

								<div class="product-item men">
									<div class="product product_filter">
										<div class="product_image">
											<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
												<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
											</a>
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga) ?></div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button">
										<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a>
									</div>
								</div>

							<?php } else { ?>

								<div class="product-item men">
									<div class="product discount product_filter">
										<div class="product_image">
											<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
												<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
											</a>
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
											<span><?= $newArr->diskon ?></span>
										</div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga_promo) ?>
												<span><?= $this->rupiah->setidr($newArr->harga) ?></span>
											</div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a></div>
								</div>

							<?php } ?>

						<?php } else if ($newArr->nm_kategori == "Wanita") { ?>

							<?php if ($newArr->diskon == NULL) { ?>

								<div class="product-item women">
									<div class="product product_filter">
										<div class="product_image">
											<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
												<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
											</a>
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga) ?></div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button">
										<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a>
									</div>
								</div>

							<?php } else { ?>

								<div class="product-item women">
									<div class="product discount product_filter">
										<div class="product_image">
											<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
												<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
											</a>
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
											<span><?= $newArr->diskon ?></span>
										</div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga_promo) ?>
												<span><?= $this->rupiah->setidr($newArr->harga) ?></span>
											</div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a></div>
								</div>

							<?php } ?>

						<?php } else { ?>

							<?php if ($newArr->diskon == NULL) { ?>

								<div class="product-item accessories">
									<div class="product product_filter">
										<div class="product_image">
											<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga) ?></div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button">
										<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a>
									</div>
								</div>

							<?php } else { ?>

								<div class="product-item accessories">
									<div class="product discount product_filter">
										<div class="product_image">
											<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
												<img height="220px" src="<?= $newArr->img ?>" alt="<?= $newArr->nm_produk ?>">
											</a>
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
											<span><?= $newArr->diskon ?></span>
										</div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">
													<?= $newArr->brand ?><br><?= $newArr->nm_produk ?>
												</a>
											</h6>
											<div class="product_price"><?= $this->rupiah->setidr($newArr->harga_promo) ?>
												<span><?= $this->rupiah->setidr($newArr->harga) ?></span>
											</div>
										</div>
									</div>
									<div id="btn-addToCart" class="red_button add_to_cart_button"><a href="<?= base_url('Product/Detailproduct/') ?><?= $newArr->slug ?>">Detail</a></div>
								</div>

							<?php } ?>

						<?php } ?>

					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Deal of the week -->

<div class="deal_ofthe_week">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="deal_ofthe_week_img">
					<img src="<?= $promo->img ?>" alt="<?= $promo->nm_produk ?>">
				</div>
			</div>
			<div class="col-lg-6 text-right deal_ofthe_week_col">
				<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
					<div class="section_title">
						<h2>Promo Terbaru</h2>
					</div>
					<ul class="timer">
						<?php
						$date = date('M d, Y', strtotime($promo->date_promo));
						?>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<input type="hidden" id="datepromothisweek" value="<?= $date ?>">
							<div id="day" class="timer_num"></div>
							<div class="timer_unit">Hari</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="hour" class="timer_num"></div>
							<div class="timer_unit">Jam</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="minute" class="timer_num"></div>
							<div class="timer_unit">Menit</div>
						</li>
						<li class="d-inline-flex flex-column justify-content-center align-items-center">
							<div id="second" class="timer_num"></div>
							<div class="timer_unit">Detik</div>
						</li>
					</ul>
					<div class="red_button deal_ofthe_week_button" style="background-color: #2495ff">
						<a href="<?= base_url('Product/Detailproduct/') ?><?= $promo->slug ?>">beli sekarang</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>Produk Terlaris</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product_slider_container">
					<div class="owl-carousel owl-theme product_slider">

						<!-- Slide 1 -->

						<?php foreach ($bestSeller as $best) { ?>

							<?php if ($best->diskon == NULL) { ?>

								<div class="owl-item product_slider_item">
									<div class="product-item women">
										<div class="product">
											<div class="product_image">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $best->slug ?>">
													<img height="220px" src="<?= $best->img ?>" alt="<?= $best->nm_produk ?>">
												</a>
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name">
													<a href="<?= base_url('Product/Detailproduct/') ?><?= $best->slug ?>">
														<?= $best->brand ?><br><?= $best->nm_produk ?>
													</a>
												</h6>
												<div class="product_price"><?= $this->rupiah->setidr($best->harga) ?></div>
											</div>
										</div>
									</div>
								</div>

							<?php } else { ?>

								<div class="owl-item product_slider_item">
									<div class="product-item">
										<div class="product discount">
											<div class="product_image">
												<a href="<?= base_url('Product/Detailproduct/') ?><?= $best->slug ?>">
													<img height="220px" src="<?= $best->img ?>" alt="<?= $best->nm_produk ?>">
												</a>
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span><?= $best->diskon ?></span></div>
											<div class="product_info">
												<h6 class="product_name">
													<a href="<?= base_url('Product/Detailproduct/') ?><?= $best->slug ?>">
														<?= $best->brand ?><br><?= $best->nm_produk ?>
													</a>
												</h6>
												<div class="product_price"><?= $this->rupiah->setidr($best->harga_promo) ?>
													<span><?= $this->rupiah->setidr($best->harga) ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
						<?php } ?>

					</div>

					<!-- Slider Navigation -->

					<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</div>
					<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Benefit -->

<div class="benefit">
	<div class="container">
		<div class="row benefit_row">
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>gratis ongkos kirim</h6>
						<p>Untuk wilayah JABOTABEK</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>bayar di tempat</h6>
						<p>konfirmasi melalui internet</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>45 Hari pengembalian</h6>
						<p>jangka waktu retur yang panjang</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 benefit_col">
				<div class="benefit_item d-flex flex-row align-items-center">
					<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<div class="benefit_content">
						<h6>buka setiap hari</h6>
						<p>08.00 - 21.00</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>