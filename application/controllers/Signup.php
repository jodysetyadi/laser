<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('home_style');
        $this->load->view('navbar');
        $this->load->view('web/v_signup');
        $this->load->view('footer');
        $this->load->view('home_js');
    }

    function savePelanggan() {
        $telefon = $this->input->post('telefon');
        $nama = $this->input->post('name');
        $email = $this->input->post('email');
        $tglLahir = $this->input->post('tglLahir');
        $password = $this->input->post('confirmsignup');
        $alamat = $this->input->post('alamat');
        $kodepos = $this->input->post('kodepos');
        
        $data = array(
            'nm_pelanggan' => $nama,
            'email' => $email,
            'tgl_lahir' => $tglLahir,
            'alamat_pelanggan' => $alamat,
            'kodepos' => $kodepos,
            'no_hp' => $telefon,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'tgl_daftar' => date("y-m-d")
        );

        $this->db->insert('pelanggan', $data);
        
        $this->session->set_flashdata('savepelanggan', 'Berhasil mendaftar');
        
        redirect(base_url('/Login'));
        
    }

}

/* End of file Signup.php */
