<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerUser extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		} 
	}

	public function index()
	{
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_user');
		$this->load->view('template/v_footer');	 
	}

	public function ubah()
	{
		$username = $this->input->post('username');
		$nm_user = $this->input->post('nm_user');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$id = $this->input->post('id');

		if($password == null && $repassword == null){
			$data = [
				'username' => $username,
				'nm_user' => $nm_user,
				'email' => $email,
			];	
		} else {
			$data = [
				'username' => $username,
				'nm_user' => $nm_user,
				'email' => $email,
				'password' => md5($password)
			];
		}

		$result = $this->Model->update('id',$id,$data,'user');

		if ($result){
			echo json_encode($result);
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	   		redirect('user');
		}
	}

}