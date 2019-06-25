<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	// CRUD Admin

	function Admin()
	{
		$data['adm'] = $this->db->get('admin');

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_admin', $data);
		$this->load->view('admin/footer');
	}

	function createAdmin()
	{
		$post = $this->input->post();

		$password = $post['password'];
		$passhash = password_hash($password, PASSWORD_DEFAULT);

		$data = array(
			'nm_admin' => $post['nama'],
			'username' => $post['username'],
			'email' => $post['email'],
			'no_hp' => $post['no_hp'],
			'level' => $post['level'],
			'password' => $passhash
		);

		if ($this->db->insert('admin', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getAdmin()
	{

		$data = $this->db->get_where('admin', ['id_admin' => $this->input->post('id_admin')])->row();
		echo json_encode($data);
	}

	function updateAdmin()
	{
		$post = $this->input->post();

		$data = array(
			'nm_admin' => $post['nama'],
			'username' => $post['username'],
			'email' => $post['email'],
			'no_hp' => $post['no_hp'],
			'level' => $post['level']
		);

		if ($this->db->update('admin', $data, ['id_admin' => $post['id_admin']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteAdmin()
	{
		if ($this->db->delete('admin', ['id_admin' => $this->input->post('id_admin')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Ukuran

	function Size()
	{
		$this->db->select('*');
		$this->db->from('ukuran');
		$this->db->order_by('nm_ukuran', 'ASC');
		$data['uk'] = $this->db->get();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_ukuran', $data);
		$this->load->view('admin/footer');
	}

	function createUkuran()
	{
		$post = $this->input->post();

		$data = array(
			'nm_ukuran' => $post['nama']
		);

		if ($this->db->insert('ukuran', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getUkuran()
	{

		$data = $this->db->get_where('ukuran', ['id_ukuran' => $this->input->post('id_ukuran')])->row();
		echo json_encode($data);
	}

	function updateUkuran()
	{
		$post = $this->input->post();

		$data = array(
			'nm_ukuran' => $post['nama']
		);

		if ($this->db->update('ukuran', $data, ['id_ukuran' => $post['id_ukuran']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteUkuran()
	{
		if ($this->db->delete('ukuran', ['id_ukuran' => $this->input->post('id_ukuran')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Warna

	function Color()
	{
		$this->db->select('*');
		$this->db->from('warna');
		$this->db->order_by('nm_warna', 'ASC');
		$data['cl'] = $this->db->get();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_warna', $data);
		$this->load->view('admin/footer');
	}

	function createWarna()
	{
		$post = $this->input->post();

		$data = array(
			'nm_warna' => $post['nama']
		);

		if ($this->db->insert('warna', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getWarna()
	{

		$data = $this->db->get_where('warna', ['id_warna' => $this->input->post('id_warna')])->row();
		echo json_encode($data);
	}

	function updateWarna()
	{
		$post = $this->input->post();

		$data = array(
			'nm_warna' => $post['nama']
		);

		if ($this->db->update('warna', $data, ['id_warna' => $post['id_warna']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteWarna()
	{
		if ($this->db->delete('warna', ['id_warna' => $this->input->post('id_warna')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Voucher

	function Voucher()
	{
		$data['voucher'] = $this->db->get('voucher');

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_voucher', $data);
		$this->load->view('admin/footer');
	}

	function createVoucher()
	{
		$post = $this->input->post();

		$data = array(
			'kd_voucher' => $post['kd_voucher'],
			'potongan_harga' => $post['potongan']
		);

		if ($this->db->insert('voucher', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getVoucher()
	{

		$data = $this->db->get_where('voucher', ['id_voucher' => $this->input->post('id_voucher')])->row();
		echo json_encode($data);
	}

	function updateVoucher()
	{
		$post = $this->input->post();

		$data = array(
			'id_voucher' => $post['id_voucher'],
			'kd_voucher' => $post['kd_voucher'],
			'potongan_harga' => $post['potongan']
		);

		if ($this->db->update('voucher', $data, ['id_voucher' => $post['id_voucher']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteVoucher()
	{
		if ($this->db->delete('voucher', ['id_voucher' => $this->input->post('id_voucher')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Category

	function Category()
	{
		$data['category'] = $this->db->get('kategori_produk');

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_kategori', $data);
		$this->load->view('admin/footer');
	}

	function createCategory()
	{
		$post = $this->input->post();

		$data = array(
			'nm_kategori' => $post['nama']
		);

		if ($this->db->insert('kategori_produk', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getCategory()
	{

		$data = $this->db->get_where('kategori_produk', ['id_kategori' => $this->input->post('id_kategori')])->row();
		echo json_encode($data);
	}

	function updateCategory()
	{
		$post = $this->input->post();

		$data = array(
			'nm_kategori' => $post['nama']
		);

		if ($this->db->update('kategori_produk', $data, ['id_kategori' => $post['id_kategori']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteCategory()
	{
		if ($this->db->delete('kategori_produk', ['id_kategori' => $this->input->post('id_kategori')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Subcategory

	function Subcategory()
	{
		$this->db->select('*');
		$this->db->from('subkategori');
		$this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
		$data['subcategory'] = $this->db->get();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_subkategori', $data);
		$this->load->view('admin/footer');
	}

	function createSubcategory()
	{
		$post = $this->input->post();

		$data = array(
			'nm_subkategori' => $post['nama'],
			'id_kategori' => $post['id_kategori']
		);

		if ($this->db->insert('subkategori', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getSubcategory()
	{

		$data = $this->db->get_where('subkategori', ['id_subkategori' => $this->input->post('id_subkategori')])->row();
		echo json_encode($data);
	}

	function updateSubcategory()
	{
		$post = $this->input->post();

		$data = array(
			'nm_subkategori' => $post['nama'],
			'id_kategori' => $post['id_kategori']
		);

		if ($this->db->update('subkategori', $data, ['id_subkategori' => $post['id_subkategori']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteSubcategory()
	{
		if ($this->db->delete('subkategori', ['id_subkategori' => $this->input->post('id_subkategori')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// CRUD Product

	function Product()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$data['produk'] = $this->db->get();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_produk', $data);
		$this->load->view('admin/footer');
	}

	function createProduk()
	{
		$post = $this->input->post();
		$persen = intval($post['diskon']);
		$diskon = $persen / 100;
		$harga = $post['harga'];
		$promo = $harga * $diskon;
		$harga_promo = $harga - $promo;
		$tittle = str_replace(" ", "-", $post['nm_produk']);
		$slug = $tittle . ".html";

		$data = array(
			'id_subkategori' => $post['id_subkategori'],
			'brand' => $post['brand'],
			'nm_produk' => $post['nm_produk'],
			'deskripsi' => $post['deskripsi'],
			'diskon' => $post['diskon'],
			'harga' => $post['harga'],
			'modal' => $post['modal'],
			'harga_promo' => $harga_promo,
			'stok' => $post['stok'],
			'img' => $post['img'],
			'slug' => $slug
		);

		if ($this->db->insert('produk', $data)) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function getProduk()
	{

		$data = $this->db->get_where('produk', ['id_produk' => $this->input->post('id_produk')])->row();
		echo json_encode($data);
	}

	function updateProduk()
	{
		$post = $this->input->post();
		$persen = intval($post['diskon']);
		$diskon = $persen / 100;
		$harga = $post['harga'];
		$promo = $harga * $diskon;
		$harga_promo = $harga - $promo;

		$data = array(
			'id_subkategori' => $post['id_subkategori'],
			'brand' => $post['brand'],
			'nm_produk' => $post['nm_produk'],
			'deskripsi' => $post['deskripsi'],
			'diskon' => $post['diskon'],
			'harga' => $post['harga'],
			'modal' => $post['modal'],
			'harga_promo' => $harga_promo,
			'stok' => $post['stok'],
			'img' => $post['img'],
			'slsug' => $post['slug']
		);

		if ($this->db->update('produk', $data, ['id_produk' => $post['id_produk']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function deleteProduk()
	{
		if ($this->db->delete('produk', ['id_produk' => $this->input->post('id_produk')])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function uploadGambar()
	{
		$config['upload_path'] = './asset/images/foto-produk/';
		$config['allowed_types'] = 'jpg|png|jpeg';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("file")) {
			$error = array('error' => $this->upload->display_errors());
			echo 'error';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$image = '<img id="pathimage" class="img-thumbnail bg-dark" width="100%" height="auto" src="' . base_url() . 'asset/images/foto-produk/' . $data["upload_data"]["file_name"] . '" alt="">';
			echo $image;
		}
	}

	// Promo

	function Promo()
	{
		$this->db->select('*');
		$this->db->from('promothisweek');
		$this->db->join('produk', 'promothisweek.id_produk = produk.id_produk');
		$data['promo'] = $this->db->get()->result();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_promo', $data);
		$this->load->view('admin/footer');
	}

	function getPromo()
	{
		$data = $this->db->get_where('promothisweek', ['id_promothisweek' => $this->input->post('id_promothisweek')])->row();

		echo json_encode($data);
	}

	function updatePromo()
	{
		$post = $this->input->post();

		$data = array(
			'id_produk' => $post['id_produk'],
			'date_promo' => $post['date_promo'],
		);

		if ($this->db->update('promothisweek', $data, ['id_promothisweek' => $post['id_promothisweek']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	// Banner

	function Banner()
	{
		$data['banner'] = $this->db->get('carousel')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/master/v_banner', $data);
		$this->load->view('admin/footer');
	}

	function getBanner()
	{
		$data = $this->db->get('carousel')->row();
		echo json_encode($data);
	}

	function updateBanner()
	{
		$post = $this->input->post();

		$data = array(
			'title' => $post['title'],
			'img' => $post['img']
		);

		if ($this->db->update('carousel', $data, ['id_carousel' => $post['id_carousel']])) {
			echo "success";
		} else {
			echo "error";
		}
	}

	function uploadBanner()
	{
		$config['upload_path'] = './asset/images/foto-produk';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '1024';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("file")) {
			$error = array('error' => $this->upload->display_errors());
			echo 'error';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$image = '<img id="pathimage" class="img-thumbnail mb-2 bg-dark" width="100%" height="auto" src="' . base_url() . 'asset/images/foto-produk/' . $data["upload_data"]["file_name"] . '" alt="">';
			echo $image;
		}
	}

	function changePassword()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/master/v_ubahpassword');
		$this->load->view('admin/footer');
	}

	function changePass()
	{
		$pass =  $this->input->post('password');

		if ($this->db->update('admin', ['password' => $pass], ['id_admin' => $this->session->userdata('id_admin')])) {
			echo "success";
		} else {
			echo "error";
		}
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/hangar/admin/Master.php */
