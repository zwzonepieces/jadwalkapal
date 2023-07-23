<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDash extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		} 
	}

	//halaman dashboard
	public function index()
	{	
		$nama = $this->session->nama;
		$data = [
			'nama' => $nama
		];
		$this->load->view('template/v_header');
		$this->load->view('template/sidebar');
		$this->load->view('v_dash',$data);
		$this->load->view('template/v_footer');	 
	}
}