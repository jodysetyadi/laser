<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLibrary
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        if ($this->ci->uri->segment(1) == "hangar") {
        	if ($this->ci->uri->segment(2) == "admin") {
	        	if ($this->ci->uri->segment(3) != "Login") {
	        		$this->checkSession();
	        	}
	        }
        }
	}

	function checkSession() {
		if (! $this->ci->session->userdata('loged_in')) {
			redirect(base_url('hangar/admin/Login'));
		}
	}

	

}

/* End of file LoginLibrary.php */
/* Location: ./application/libraries/LoginLibrary.php */
