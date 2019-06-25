<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			$this->session->set_flashdata('msg', "<script>alert('Anda Harus Login')</script>");
			redirect(base_url('Login'));
		}
		$this->db->query('set sql_mode = ""');
	}

	function Logout()
	{

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('tglLahir');
		$this->session->unset_userdata('alamat');
		$this->session->unset_userdata('kodepos');
		$this->session->unset_userdata('hp');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('status');

		redirect(base_url('/Login'));
	}

	function Profile()
	{
		$data['profile'] = $this->db->get_where('pelanggan', ['id_pelanggan' => $this->session->userdata('id')])->result();
		$this->load->view('header');
		$this->load->view('home_style');
		$this->load->view('navbar');
		$this->load->view('web/v_profile', $data);
		$this->load->view('footer');
		$this->load->view('home_js');
	}

	// Upload Foto

	function uploadFoto()
	{
		$config['upload_path'] = './asset/foto-member/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '1024';
		$config['file_name']  = date('Ymd-His') . $this->session->userdata('name') . $this->session->userdata('hp');

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("file")) {
			$error = array('error' => $this->upload->display_errors());
			echo 'error';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$image = '<img id="pathimage" class="img-thumbnail bg-dark" width="100%" height="auto" src="' . base_url() . 'asset/foto-member/' . $data["upload_data"]["file_name"] . '" alt="">';
			echo $image;
		}
	}

	function cancelUpload()
	{
		$path = $this->input->post('path');
		$potong = str_replace("http://localhost/franzshop/", "", $path);
		if (unlink(FCPATH . $potong)) {
			echo "success";
		}
	}

	// Get Password

	function getPassword()
	{
		$user = $this->db->get_where('pelanggan', ['id_pelanggan' => $this->session->userdata('id')])->row();

		$hash = $user->password;
		$password = $this->input->post('password');
		$verify = password_verify($password, $hash);
		if ($verify) {
			echo "success";
		}
	}

	// Update Profile

	function updateProfile()
	{
		$post = $this->input->post();

		if ($post['password'] == "") {
			$data = array(
				'nm_pelanggan' => $post['nama'],
				'email' => $post['email'],
				'foto' => $post['foto'],
				'alamat_pelanggan' => $post['alamat_pelanggan'],
				'kodepos' => $post['kodepos']
			);

			if (!$this->db->update('pelanggan', $data, ['id_pelanggan' => $this->session->userdata('id')])) {
				echo "error";
			} else {
				echo "success";
				$array = array(
					'name' => $post['nama'],
					'foto' => $post['foto']
				);

				$this->session->set_userdata($array);
			}
		} else {
			$data = array(
				'nm_pelanggan' => $post['nama'],
				'email' => $post['email'],
				'foto' => $post['foto'],
				'alamat_pelanggan' => $post['alamat_pelanggan'],
				'kodepos' => $post['kodepos'],
				'password' => password_hash($post['password'], PASSWORD_DEFAULT)
			);

			if (!$this->db->update('pelanggan', $data, ['id_pelanggan' => $this->session->userdata('id')])) {
				echo "error";
			} else {
				echo "success";
			}
		}
	}

	function Cart()
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$this->db->join('produk', 'keranjang.id_produk = produk.id_produk');
		$this->db->join('pelanggan', 'keranjang.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->join('ukuran', 'keranjang.id_ukuran = ukuran.id_ukuran');
		$this->db->join('warna', 'keranjang.id_warna = warna.id_warna');
		$this->db->where('keranjang.id_pelanggan', $this->session->userdata('id'));
		$data['cart'] = $this->db->get();

		$this->db->select('SUM(qty) as quantity');
		$this->db->from('keranjang');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		$data['qty'] = $this->db->get()->row();

		$data['size'] = $this->db->get("ukuran")->result();

		$data['color'] = $this->db->get("warna")->result();

		$this->db->select('SUM(subtotal) as sub');
		$this->db->from('keranjang');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		$data['subtotal'] = $this->db->get()->row();

		$row = $this->db->get_where('keranjang', ['id_pelanggan' => $this->session->userdata('id')])->num_rows();

		if ($row == 0) {
			$this->session->set_flashdata('msg', '<script>alert("keranjang Anda Masih Kosong, Silahkan berbelanja")</script>');
			redirect(base_url());
		} else {

			$this->load->view('header');
			$this->load->view('home_style');
			$this->load->view('navbar');
			$this->load->view('web/v_cart', $data);
			$this->load->view('footer');
			$this->load->view('home_js');
		}
	}

	function addToCart()
	{
		$data = $this->input->post();
		$data['id_pelanggan'] = $this->session->userdata('id');

		$produk = $this->db->get_where('keranjang', [
			'id_pelanggan' => $this->session->userdata('id'),
			'id_produk' => $data['id_produk'],
			'id_warna' => $data['id_warna'],
			'id_ukuran' => $data['id_ukuran']
		])->row();

		$num_row = $this->db->get_where('keranjang', [
			'id_pelanggan' => $this->session->userdata('id'),
			'id_produk' => $data['id_produk'],
			'id_warna' => $data['id_warna'],
			'id_ukuran' => $data['id_ukuran']
		])->num_rows();

		if ($num_row != 0) {

			$id_produk = $produk->id_produk;
			$harga = $data['harga'];
			$warna = $produk->id_warna;
			$ukuran = $produk->id_ukuran;
		} else {
			$id_produk = 0;
			$harga = $data['harga'];
			$warna = "";
			$ukuran = "";
		}

		if (($data['id_produk'] == $id_produk) && ($data['id_ukuran'] == $ukuran) && ($data['id_warna'] == $warna)) {

			$qtyOld = $produk->qty;
			$qtyNew = $data['qty'];
			$qty = $qtyOld + $qtyNew;
			$subtotal = $harga * $qty;

			$this->db->update('keranjang', ['qty' => $qty, 'subtotal' => $subtotal], [
				'id_pelanggan' => $this->session->userdata('id'),
				'id_produk' => $id_produk,
				'id_warna' => $warna,
				'id_ukuran' => $ukuran
			]);

			print_r("error");
		} else {

			$qty = $data['qty'];
			$subtotal = $qty * $harga;

			$datakeranjang = array(
				'id_pelanggan' => $this->session->userdata('id'),
				'id_produk' => $data['id_produk'],
				'id_ukuran' => $data['id_ukuran'],
				'id_warna' => $data['id_warna'],
				'qty' => $data['qty'],
				'subtotal' => $subtotal
			);

			$this->db->insert('keranjang', $datakeranjang);

			print_r("success");
		}
	}

	// Code Voucher

	function getCodeVoucher()
	{
		$code = $this->input->post('kode_voucher');

		$voucher = $this->db->get('voucher')->row();
		$kd_voucher = $voucher->kd_voucher;

		$totalharga = $this->input->post('total');
		$potongan = $voucher->potongan_harga;
		$total = $totalharga - $potongan;

		if ($kd_voucher == $code) {

			echo '
				<hr>
	  			<div class="row">
	  				<div class="col-md-8 card-text">
	  					<p>Potongan Harga</p>
	  				</div>
	  				<div id="potongan" class="col-md-4 card-title">
	  					<p class="text-right text-dark" id="potonganHarga">' . $this->rupiah->setidr($potongan) . '</p>
	  					<input type="hidden" id="pot" value="' . $potongan . '">
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-md-6 card-text">
	  					<p>Total</p>
	  				</div>
	  				<div class="col-md-6 card-title">
	  					<p class="text-right text-dark" id="totalHarga">' . $this->rupiah->setidr($total) . '</p>
	  					<input type="hidden" id="total" value="' . $total . '">
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-md-12">
		  				<div class="form-group">
		  					<label for="metode">Metode Pembayaran</label>
		  					<select class="form-control" name="metode" id="metode">
		  						<option value="">Pilih Metode</option>
		  						<option value="Transfer">Transfer</option>
		  						<option value="Bayar Di Tempat">Bayar Di Tempat</option>
		  					</select>
		  				</div>
	  				</div>
	  			</div>
	  			<button type="submit" class="btn btn-success form-control text-white">BUAT PESANAN</button>
	    	';
		} else {
			echo "error";
		}
	}

	function autoNumber()
	{
		$id_pelanggan = $this->session->userdata('id');

		$this->db->select('RIGHT(pesanan.no_pesanan,5) as no');
		$this->db->order_by('id_pesanan', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('pesanan');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$number = intval($data->no) + 1;
		} else {
			$number = 1;
		}
		$numbermax = str_pad($number, 5, "0", STR_PAD_LEFT);
		$runningNumber = date('ymd') . $id_pelanggan . $numbermax;
		return $runningNumber;
	}

	function buatpesanan()
	{
		$id_pelanggan = $this->session->userdata('id');
		$post = $this->input->post();
		$cart = $this->db->get_where('keranjang', ['id_pelanggan' => $id_pelanggan])->result();
		$no_pesanan = $this->autoNumber();

		$this->db->select('SUM(subtotal) as total');
		$this->db->from('keranjang');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$totalbayar = $this->db->get()->row();

		$pesanan = array(
			'no_pesanan' => $no_pesanan,
			'id_pelanggan' => $id_pelanggan,
			'tgl_pesanan' => date('Y-m-d H:i:s'),
			'alamat_penerima' => $post['alamat'],
			'kd_voucher' => $post['code-promo'],
			'metode_pembayaran' => $post['metode'],
			'status' => 'Menunggu Pembayaran',
			'total' => $totalbayar->total
		);

		$this->db->insert('pesanan', $pesanan);

		$data = $this->db->get_where('pesanan', ['no_pesanan' => $no_pesanan])->row();
		$id_pesanan = $data->id_pesanan;

		foreach ($cart as $key) {

			$detail = array(

				'id_pesanan' => $id_pesanan,
				'id_produk' => $key->id_produk,
				'id_ukuran' => $key->id_ukuran,
				'id_warna' => $key->id_warna,
				'jumlah_beli' => $key->qty,
				'subtotal' => $key->subtotal

			);

			$this->db->insert('detail_pesanan', $detail);
			$res = $this->db->get_where('detail_pesanan', ['id_pesanan' => $id_pesanan])->result();

			foreach ($res as $key) {

				$id_produk = $key->id_produk;
				$get = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
				$stok = $get->stok;
				$newstok = intval($stok) - 1;
				$this->db->update('produk', ['stok' => $newstok], ['id_produk' => $id_produk]);
			}
		}

		if ($this->db->delete('keranjang', ['id_pelanggan' => $id_pelanggan])) {
			redirect(base_url('Member/Detailtransaction/' . $no_pesanan . ''));
		} else {
			redirect(base_url('Member/Cart'));
		}
	}

	// Riwayat Transaksi

	function Detailtransaction($no_pesanan)
	{

		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('pelanggan', 'pesanan.id_pelanggan = pelanggan.id_pelanggan');
		$this->db->where('pesanan.no_pesanan', $no_pesanan);
		$this->db->where('pesanan.id_pelanggan', $this->session->userdata('id'));
		$data['pesanan'] = $this->db->get()->row();

		$this->db->select('SUM(jumlah_beli) as qty');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
		$this->db->where('pesanan.no_pesanan', $no_pesanan);
		$data['qty'] = $this->db->get()->row();

		$this->db->select('SUM(subtotal) as subtotal');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
		$this->db->where('pesanan.no_pesanan', $no_pesanan);
		$sub = $this->db->get()->row();
		$subtotal = $sub->subtotal;

		$this->db->select('*');
		$this->db->from('voucher');
		$this->db->join('pesanan', 'voucher.kd_voucher = pesanan.kd_voucher');
		$this->db->where('pesanan.no_pesanan', $no_pesanan);
		$this->db->limit(1);
		$voucher = $this->db->get();
		$row = $voucher->num_rows();
		$result = $voucher->row();

		if ($row == NULL) {
			$potongan = 0;
			$total = $subtotal - $potongan;
			$data['subtotal'] = $subtotal;
			$data['potongan'] = $potongan;
			$data['total'] = $total;
		} else {
			$potongan = $result->potongan_harga;
			$total = $subtotal - $potongan;
			$data['subtotal'] = $subtotal;
			$data['potongan'] = $potongan;
			$data['total'] = $total;
		}

		$this->load->view('header');
		$this->load->view('home_style');
		$this->load->view('navbar');
		$this->load->view('web/v_detailtransaksi', $data);
		$this->load->view('footer');
		$this->load->view('home_js');
	}

	// Update Color Cart

	function updateColorCart()
	{
		$post = $this->input->post();

		$produk = $this->db->get_where('keranjang', [
			'id_pelanggan' => $this->session->userdata('id'),
			'id_produk' => $post['id_produk'],
			'id_warna' => $post['warna']
		])->num_rows();

		if ($produk != 0) {

			$this->db->update('keranjang', ['id_warna' => $post['warna']], [
				'id_produk' => $post['id_produk'],
				'id_pelanggan' => $this->session->userdata('id')
			]);
		}
	}

	// Update Size Cart

	function updateSizeCart()
	{
		$post = $this->input->post();

		$produk = $this->db->get_where('keranjang', [
			'id_pelanggan' => $this->session->userdata('id'),
			'id_produk' => $post['id_produk'],
			'id_ukuran' => $post['ukuran']
		])->num_rows();

		if ($produk != 0) {

			$this->db->update('keranjang', ['id_ukuran' => $post['ukuran']], [
				'id_produk' => $post['id_produk'],
				'id_pelanggan' => $this->session->userdata('id')
			]);
		}
	}

	// Update Qty Cart

	function updateQtyCart()
	{
		$post = $this->input->post();

		$produk = $this->db->get_where('keranjang', [
			'id_pelanggan' => $this->session->userdata('id'),
			'id_produk' => $post['id_produk'],
			'qty' => $post['qty']
		])->num_rows();

		if ($produk != 0) {

			$this->db->update('keranjang', ['qty' => $post['qty']], [
				'id_produk' => $post['id_produk'],
				'id_pelanggan' => $this->session->userdata('id')
			]);
		}
	}

	// Delete Item Cart

	function deleteItemCart()
	{
		$this->db->delete('keranjang', ['id_produk' => $this->input->post('id_produk'), 'id_pelanggan' => $this->session->userdata('id')]);
	}

	// Upload Bukti

	function uploadBukti()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		$this->db->order_by('id_pesanan', 'desc');
		$this->db->limit(1);
		$pesanan = $this->db->get()->row();
		$no_pesanan = $pesanan->no_pesanan;

		$config['upload_path'] = './asset/bukti-pembayaran/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['file_name']  = $no_pesanan;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("file")) {
			$error = array('error' => $this->upload->display_errors());
			echo 'error';
		} else {
			$data = array('upload_data' => $this->upload->data());

			$src = base_url('asset/bukti-pembayaran/') . $data["upload_data"]["file_name"];

			if ($this->db->update('pesanan', ['bukti_pembayaran' => $src, 'status' => "Menunggu Konfirmasi"], ['no_pesanan' => $no_pesanan])) {
				echo "success";
			} else {
				echo "error";
			}
		}
	}

	// Transaksi Saya

	function Mytransaction()
	{
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('pesanan.id_pelanggan', $this->session->userdata('id'));
		$this->db->order_by('id_pesanan', 'DESC');
		$data['cart'] = $this->db->get();

		$this->db->select('*');
		$this->db->from('detail_pesanan');
		$this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan');
		$this->db->join('warna', 'detail_pesanan.id_warna = warna.id_warna');
		$this->db->join('ukuran', 'detail_pesanan.id_ukuran = ukuran.id_ukuran');
		$this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
		$this->db->where('pesanan.id_pelanggan', $this->session->userdata('id'));
		$data['detail'] = $this->db->get()->result();

		$this->db->select('*');
		$this->db->from('ukuran');
		$this->db->join('detail_pesanan', 'ukuran.id_ukuran = detail_pesanan.id_ukuran');
		$data['size'] = $this->db->get()->row();

		$this->db->select('*');
		$this->db->from('warna');
		$this->db->join('detail_pesanan', 'warna.id_warna = detail_pesanan.id_warna');
		$rowcolor = $this->db->get()->row();
		$data['color'] = $rowcolor->nm_warna;

		$this->db->select('SUM(qty) as quantity');
		$this->db->from('keranjang');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		$data['qty'] = $this->db->get()->row();

		$data['size'] = $this->db->get("ukuran")->result();

		$data['color'] = $this->db->get("warna")->result();

		$this->db->select('SUM(subtotal) as sub');
		$this->db->from('keranjang');
		$this->db->where('id_pelanggan', $this->session->userdata('id'));
		$data['subtotal'] = $this->db->get()->row();

		$this->load->view('header');
		$this->load->view('home_style');
		$this->load->view('navbar');
		$this->load->view('web/v_mytransaction', $data);
		$this->load->view('footer');
		$this->load->view('home_js');
	}

	function Konfirmasiditerima($no_pesanan)
	{
		$this->db->update('pesanan', ['status' => "Sudah Diterima"], ['no_pesanan' => $no_pesanan]);
		redirect(base_url('Member/Mytransaction'));
	}

	function updateInbox()
	{
		$this->db->update('pesan_pelanggan', ['status' => $this->input->post('status')], ['id_pelanggan' => $this->session->userdata('id')]);
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
