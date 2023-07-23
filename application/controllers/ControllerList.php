<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerList extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mhide');
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
			'kedatangan' => $kedatangan = $this->Mhide->joinJadwalhide(),
			'keberangkatan' => $keberangkatan = $this->Mhide->joinBerangkathide()
		];
		$this->load->view('v_daftarJadwal',$data);
	}
	
}
