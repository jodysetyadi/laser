<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetpassword extends CI_Controller {

	public function index()
	{
		$this->load->library('email');
		
		$this->email->from('rizaalifdmc@gmail.com', 'Franzshop');
		$this->email->to($this->input->post('email'));
		
		$this->email->subject('Forget Password');
		$this->email->message('Admin Akan menghubungi anda untuk pembuatan password ulang');
		
		$this->email->send();
		
		echo $this->email->print_debugger();			
	}

}

/* End of file Forgetpassword.php */
/* Location: ./application/controllers/Forgetpassword.php */