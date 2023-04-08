<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerJadwal extends CI_Controller {

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
		$kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		$jadwal = $this->Model->joinJadwal();
		$data = [
			'kapal' => $kapal,
			'jadwal' => $jadwal,
			'getAllpelabuhan'   => $getAllpelabuhan,
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_jadwal',$data);
		$this->load->view('template/v_footer');	 
	}

	public function simpan()
	{
		$id_kapal = $this->input->post('id_kapal');
		$tgl_berangkat = $this->input->post('tgl_berangkat');
		$tgl_datang = $this->input->post('tgl_datang');
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$keterangan = $this->input->post('keterangan');
		
		$data = [				
				'id_kapal' => $id_kapal, 		
				'id_pelabuhan' => $id_pelabuhan,	
				'tgl_berangkat' => $tgl_berangkat,
				'tgl_datang' => $tgl_datang,
				'keterangan' => $keterangan,
				];
			
			$result = $this->Model->simpan('jadwal',$data);		
		

		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	   		redirect('jadwal');
		}

	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$id_kapal = $this->input->post('id_kapal');
		$tgl_berangkat = $this->input->post('tgl_berangkat');
		$tgl_datang = $this->input->post('tgl_datang');
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$keterangan = $this->input->post('keterangan');
		$data = [
			'id_kapal' => $id_kapal,
			'id_pelabuhan' => $id_pelabuhan,
			'tgl_berangkat' => $tgl_berangkat,
			'tgl_datang' => $tgl_datang,
			'keterangan' => $keterangan,
			];
		

		$result = $this->Model->update('id',$id,$data,'jadwal');

		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	    	redirect('jadwal');
		}
	}

	public function hapus($id)
	{
		$result = $this->Model->hapus('id',$id,'jadwal');
		if ($result){
		   	redirect('jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Dihapus');
	   		redirect('jadwal');
		}
	}



}
