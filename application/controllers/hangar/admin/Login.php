<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/v_login');
	}

	public function check() {
		$post = $this->input->post();
		$admin = $this->db->get_where('admin', [
			'username' => $post['username']
		])->row();

		// $check_pass = password_verify($post['password'], $admin->password);
		if( $post['password'] == $admin->password ) {
			$this->session->set_userdata('loged_in', true);
			$this->session->set_userdata('id_admin', $admin->id_admin);
			$this->session->set_userdata('nm_admin', $admin->nm_admin);
			$this->session->set_userdata('level', $admin->level);
			$this->session->set_userdata('foto_admin', $admin->foto);

			redirect(base_url('hangar/admin/dashboard'));
		} else {
			$this->session->flashdata('msg', "<script>alert('Username atau password salah')</script>");
			redirect(base_url('hangar/admin/Login'));
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('hangar/admin/Login'));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/hangar/admin/Login.php */