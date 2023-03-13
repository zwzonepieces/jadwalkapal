<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerList extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;
		if($username != null){
			redirect('pelabuhan');
		} 
	}

	public function index()
	{	
		$this->load->view('v_index');
	}

	public function daftarjadwal()
	{	
		$data = [
			'jadwal' => $jadwal = $this->Model->joinJadwal()
		];
		$this->load->view('v_daftarJadwal',$data);
	}

}
