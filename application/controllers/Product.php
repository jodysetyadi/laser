<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->order_by('produk.id_produk', 'desc');
        $row = $this->db->get();
        $data['product'] = $row->result();

        $data['num_row'] = $row->num_rows();

        $data['categories'] = $this->db->get('kategori_produk')->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_product', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
        
    }

    function Categories( $kategori ) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', $kategori);
        $row = $this->db->get();
        $data['product'] = $row->result();
        $data['row'] = $kategori;

        $data['num_row'] = $row->num_rows();

        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', $kategori);
        $data['subcategorie'] = $this->db->get()->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_categories', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
        
    }

    function Wanita( $subkategori ) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Wanita");
        $this->db->where('subkategori.nm_subkategori', $subkategori);
        $row = $this->db->get();
        $data['product'] = $row->result();
        $data['kat'] = "Wanita";
        $data['subkat'] = $subkategori;
        $data['num_row'] = $row->num_rows();

        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Wanita");
        $data['subcategorie'] = $this->db->get()->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_subcategories', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
        
    }

    function Pria( $subkategori ) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Pria");
        $this->db->where('subkategori.nm_subkategori', $subkategori);
        $row = $this->db->get();
        $data['product'] = $row->result();
        $data['kat'] = "Pria";
        $data['subkat'] = $subkategori;
        $data['num_row'] = $row->num_rows();

        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Pria");
        $data['subcategorie'] = $this->db->get()->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_subcategories', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
        
    }

    function Aksesoris( $subkategori ) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Aksesoris");
        $this->db->where('subkategori.nm_subkategori', $subkategori);
        $row = $this->db->get();
        $data['product'] = $row->result();
        $data['kat'] = "Aksesoris";
        $data['subkat'] = $subkategori;
        $data['num_row'] = $row->num_rows();

        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('kategori_produk.nm_kategori', "Aksesoris");
        $data['subcategorie'] = $this->db->get()->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_subcategories', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
        
    }

    function Detailproduct( $slug ) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('produk.slug', $slug);
        $data['detail'] = $this->db->get()->row();
        
        $this->db->select('*');
        $this->db->from('ukuran');
        $this->db->order_by('nm_ukuran', 'ASC');
        $data['size'] = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('warna');
        $this->db->order_by('nm_warna', 'ASC');
        $data['color'] = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->join('produk', 'ulasan.id_produk = produk.id_produk');
        $this->db->where('produk.slug', $slug);
        $data['review'] = $this->db->get();

        $this->load->view('header');
        $this->load->view('single_style');
        $this->load->view('navbar');
        $this->load->view('web/v_detailproduct', $data);
        $this->load->view('footer');
        $this->load->view('single_js');
        
    }

    function Review() {

        if ($this->session->userdata('status') == "login") {
            $post = $this->input->post();

            if ($this->db->insert('ulasan', [
                'id_produk' => $post['id_product'],
                'nama' => $post['name'],
                'email' => $post['email'],
                'komentar' => $post['message'],
                'make_rating' => $post['make_rate'],
                'date_review' => date('Y-m-d')
            ]) ) {

                $this->session->set_flashdata('msg', "Terimkasih atas ulasan anda, selamat berbelanja kembali");
                
            } else {

                $this->session->set_flashdata('msg', "Terjadi kesalahan, Ulasan anda gagal dikirim");

            }
        } else {
            $this->session->set_flashdata('msg', "<script>alert('Anda Harus Login')</script>");
            redirect(base_url('Login'));
        }

    }

    // Promo

    function Promo() {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('subkategori', 'produk.id_subkategori = subkategori.id_subkategori');
        $this->db->join('kategori_produk', 'subkategori.id_kategori = kategori_produk.id_kategori');
        $this->db->where('produk.diskon !=', NULL);
        $this->db->order_by('produk.id_produk', 'desc');
        $row = $this->db->get();
        $data['product'] = $row->result();

        $data['num_row'] = $row->num_rows();

        $data['categories'] = $this->db->get('kategori_produk')->result();

        $this->load->view('header');
        $this->load->view('categories_style');
        $this->load->view('navbar');
        $this->load->view('web/v_promo', $data);
        $this->load->view('footer');
        $this->load->view('categories_js');
    }

}

/* End of file Product.php */
