<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerStaf extends CI_Controller {

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
		$getAlluser = $this->Model->getAll('user');
		$data = [
			'getAlluser' => $getAlluser,
			
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('admin/v_staf',$data);
		$this->load->view('template/v_footer');	 
	}
    public function simpan()
	{
		
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
        $password = Md5($this->input->post('password'));			
		$data = [
			'nama' => $nama,
			'level' => $level,
			'email' => $email,
			'username' => $username,
            'password' => $password,		
		];

		$result = $this->Model->simpan('user',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('staf');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('staf');
		}
	}
    public function ubah()
	{
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$level= $this->input->post('level');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
        $password = Md5($this->input->post('password'));			
		$data = [
            'id_user' => $id_user,
			'nama' => $nama,
			'level' => $level,
			'email' => $email,
			'username' => $username,
            'password' => $password,
        ];

		$result = $this->Model->update('id_user',$id_user,$data,'user');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('staf');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('staf');
		}
	}
	
	//menghapus pelabuhan
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_user',$id,'user');
		if ($result){
		   	redirect('staf');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	   		redirect('staf');
		}
	}
}

