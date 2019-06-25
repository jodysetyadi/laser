<div class="container contact_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li class="active"><a href="<?= base_url('Contact') ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Kontak Kami</a></li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Map Container -->

	<div class="row">
		<div class="col">
			<div id="google_map">
				<div class="map_container">
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Us -->

	<div class="row">

		<div class="col-lg-6 contact_col">
			<div class="contact_contents">
				<h1>Hubungi Kami</h1>
				<p>Ada banyak cara untuk menghubungi kami. Anda dapat menghubungi kami langsung atau kirim email, pilih yang paling sesuai untuk anda. </p>
				<div>
					<p>085920616342</p>
					<p>rizaalifdmc@gmail.com</p>
				</div>
				<div>
					<p>Buka Jam : 08.00 - 21.00 Setiap hari</p>
				</div>
			</div>

			<!-- Follow Us -->

			<div class="follow_us_contents">
				<h1>Ikuti Kami</h1>
				<ul class="social d-flex flex-row">
					<li><a href="https://id-id.facebook.com/rizaalifwildani" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://twitter.com/RizaAlif_W" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://www.google.com/search?safe=strict&ei=taHbXOv-OYjcvgSmyYDoDQ&q=riza+alif+wildani&oq=riza+alif+wildani&gs_l=psy-ab.3..35i39.10426.13843..14372...0.0..0.94.1359.17......0....1..gws-wiz.......0i67j0j0i131j0i131i67j0i203j0i10i203j0i22i30j0i22i30i19.vJaS1AgDBBw" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="https://www.instagram.com/rizaalifwildani/" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
			</div>

		</div>

		<div class="col-lg-6 get_in_touch_col">
			<div class="get_in_touch_contents">
				<h1>Ada Keluhan . . . ?</h1>
				<p>Kirim pesan anda sekarang juga.</p>
				<form action="<?= base_url('Contact/sendmessage') ?>" method="POST">
					<div>
						<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Nama" required="required" data-error="Name is required.">
						<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
						<textarea id="input_message" class="input_ph input_message" name="message" placeholder="Pesan" rows="3" required data-error="Please, write us a message."></textarea>
					</div>
					<div>
						<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Kirim Pesan</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<?php echo $this->session->flashdata('msg'); ?>