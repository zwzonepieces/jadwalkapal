<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{	
		$username = $this->session->username;
		if($username != null){
			redirect('dashboard');
		} else {
			$this->load->view('admin/v_login');
		}

	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$checkUsername = $this->Model->auth($username,$password);

		if ($checkUsername) {
            // Login berhasil, simpan informasi pengguna ke session
            $userdata = array(
                'id_admin' => $checkUsername->id_admin,
                'username' => $checkUsername->username,
				'password' => $checkUsername->password,
                'level' => $checkUsername->level
            );
            $this->session->set_userdata($userdata);

            // Redirect ke halaman yang sesuai dengan level akses
            if ($checkUsername->level == 'admin') {
                redirect('dashboard');
            } else {
                redirect('dash');
            }
        } else {
            $this->session->set_flashdata('pesanGagal','Kesalahan');
			redirect('login');
        }
    
	}

	public function not_found()
	{
		$this->load->view('v_404');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
