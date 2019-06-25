<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->db->query('set sql_mode = ""');
    }
    

    public function index()
    {
        $data['banner'] = $this->db->get('carousel')->row();

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->order_by('produk.id_produk', 'desc');
        $data['newArrivals'] = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('detail_pesanan', 'pesanan.id_pesanan = detail_pesanan.id_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk');
        $this->db->where('pesanan.status', 'Sudah Diterima');
        $this->db->group_by('detail_pesanan.id_produk');
        $data['bestSeller'] = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('promothisweek');
        $this->db->join('produk', 'promothisweek.id_produk = produk.id_produk');
        $data['promo'] = $this->db->get()->row();
        
        $this->load->view('header');
        $this->load->view('home_style');
        $this->load->view('navbar');
        $this->load->view('web/v_home', $data);
        $this->load->view('footer');
        $this->load->view('home_js');
        
    }

}

/* End of file Home.php */
