<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('header');
        $this->load->view('home_style');
        $this->load->view('navbar');
        $this->load->view('web/v_login');
        $this->load->view('footer');
        $this->load->view('home_js');
    }

    function cekLogin()
    {

        // Post

        $post = $this->input->post();

        // DB get

        $loginTelepon = $this->db->get_where('pelanggan', [
            'no_hp' => $post['email']
        ]);

        $loginEmail = $this->db->get_where('pelanggan', [
            'email' => $post['email']
        ]);

        // Get row

        $rowTelepon = $loginTelepon->row();
        $rowEmail = $loginEmail->row();

        // Get number of rows

        $num_rowTelepon = $loginTelepon->num_rows();
        $num_rowEmail = $loginEmail->num_rows();

        // Get Password Hash

        $hashTelfon = $rowTelepon->password;
        $hashEmail = $rowEmail->password;

        // Verify Password Hash

        $cekPassword_telfon = password_verify($post['password'], $hashTelfon);
        $cekPassword_email = password_verify($post['password'], $hashEmail);

        // Login

        if ($num_rowTelepon == 1) {

            if ($cekPassword_telfon) {
                $array = array(
                    'id' => $rowTelepon->id_pelanggan,
                    'name' => $rowTelepon->nm_pelanggan,
                    'foto' => $rowTelepon->foto,
                    'tglLahir' => $rowTelepon->tgl_lahir,
                    'alamat' => $rowTelepon->alamat_pelanggan,
                    'kodepos' => $rowTelepon->kodepos,
                    'hp' => $rowTelepon->no_hp,
                    'email' => $rowTelepon->email,
                    'password' => $rowTelepon->password,
                    'status' => "login"
                );

                $this->session->set_userdata($array);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('msg', '<script>alert("Email atau password tidak terdaftar")</script>');
                redirect(base_url('/Login'));
            }
        }

        if ($num_rowEmail == 1) {

            if ($cekPassword_email) {
                $array = array(
                    'id' => $rowEmail->id_pelanggan,
                    'name' => $rowEmail->nm_pelanggan,
                    'foto' => $rowEmail->foto,
                    'tglLahir' => $rowEmail->tgl_lahir,
                    'alamat' => $rowEmail->alamat_pelanggan,
                    'kodepos' => $rowEmail->kodepos,
                    'hp' => $rowEmail->no_hp,
                    'email' => $rowEmail->email,
                    'password' => $rowEmail->password,
                    'status' => "login"
                );

                $this->session->set_userdata($array);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('msg', '<script>alert("Email atau password tidak terdaftar")</script>');
                redirect(base_url('/Login'));
            }
        }

        // Set Flashdata

        if ($num_rowEmail != 1) {
            if ($num_rowTelepon != 1) {
                $this->session->set_flashdata('msg', '<script>alert("Email atau password tidak terdaftar")</script>');
                redirect(base_url('/Login'));
            }
        }

        if ($num_rowTelepon != 1) {
            if ($num_rowEmail != 1) {
                $this->session->set_flashdata('msg', '<script>alert("Email atau password tidak terdaftar")</script>');
                redirect(base_url('/Login'));
            }
        }
    }

    function forgetPassword()
    {
        $this->load->view('header');
        $this->load->view('home_style');
        $this->load->view('navbar');
        $this->load->view('web/v_forgetpassword');
        $this->load->view('footer');
        $this->load->view('home_js');
    }
}

/* End of file Login.php */
