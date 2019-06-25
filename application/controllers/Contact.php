<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('contact_style');
        $this->load->view('navbar');
        $this->load->view('web/v_contact');
        $this->load->view('footer');
        $this->load->view('contact_js');
        
    }

    function sendmessage() {
    	$post = $this->input->post();

    	$data = array(
    		'nama' => $post['name'],
    		'email' => $post['email'],
    		'pesan' => $post['message'],
    		'tgl' => date('Y-m-d H:i:s'),
            'status' => "0"
    	);

    	if ($this->db->insert('inbox', $data)) {
    		$this->session->set_flashdata('msg', "<script>alert('Pesan anda berhasil dikirim, terimakasih.')</script>");
    		redirect(base_url('Contact'));
    	} else {
    		$this->session->set_flashdata('msg', "<script>alert('Pesan gagal dikirim.')</script>");
    		redirect(base_url('Contact'));
    	}
    }

}

/* End of file Contac.php */
