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
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$level= $this->input->post('level');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
        $password = Md5($this->input->post('password'));
		$repassword = $this->input->post('repassword');
		
		if($password == null && $repassword == null){
			$data = [
				
			'nama' => $nama,
			'level' => $level,
			'email' => $email,
			'username' => $username,
			];	
		} else {
			$data = [
				
			'nama' => $nama,
			'level' => $level,
			'email' => $email,
			'username' => $username,
            'password' => $password,
			];
		}

		$result = $this->Model->update('id_user',$id,$data,'user');

		if ($result){
			echo json_encode($result);
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	   		redirect('user');
		}
	}

}