<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerDatang extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model');
		$this->load->model('Medit');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		} 
	}

	public function index()
	{	
		$kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		$kedatangan = $this->Model->joinJadwal();
		$detail_datang = $this->Model->joinDetail();
		$data = [
			'kapal' => $kapal,
			'kedatangan' => $kedatangan,
			'getAllpelabuhan'   => $getAllpelabuhan,
			'detail_datang' => $detail_datang,
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('admin/v_kedatangan',$data);
		$this->load->view('template/v_footer');	 
	}

	public function edit($id_kedatangan)
	{
		$kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		$kedatangan = $this->Medit->joineditjadwal($id_kedatangan);
		$detail_datang = $this->Medit->joineditdetail($id_kedatangan);
		$data = [
			'kapal' => $kapal,
			'kedatangan' => $kedatangan,
			'getAllpelabuhan'   => $getAllpelabuhan,
			'detail_datang' => $detail_datang,
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('admin/v_edit_kedatangan',$data);
		$this->load->view('template/v_footer');	
	}

	public function simpan()
	{
		$id_kapal = $this->input->post('id_kapal');
		$tgl_berangkat = $this->input->post('tgl_berangkat');
		$jam_berangkat = $this->input->post('jam_berangkat');
		$tgl_datang = $this->input->post('tgl_datang');
		$jam_datang = $this->input->post('jam_datang');
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$nm_pelabuhan2 = $this->input->post('nm_pelabuhan2');
		
		$data= [				
				'id_kapal' => $id_kapal, 		
				'id_pelabuhan' => $id_pelabuhan,	
				'nm_pelabuhan2' => $nm_pelabuhan2,
				'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
				];		
			$result = $this->Model->simpan('kedatangan',$data);

		$last_id=$this->db->insert_id();
		
		$detail = [
			'id_kedatangan' => $last_id,
			'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
		];
			$result = $this->Model->simpan('detail_datang',$detail);		

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
		$jam_berangkat = $this->input->post('jam_berangkat');
		$tgl_datang = $this->input->post('tgl_datang');
		$jam_datang = $this->input->post('jam_datang');
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$nm_pelabuhan2 = $this->input->post('nm_pelabuhan2');
		$data = [
			'id_kapal' => $id_kapal,
			'id_pelabuhan' => $id_pelabuhan,
			'nm_pelabuhan2' => $nm_pelabuhan2,
			'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
			];
		

		$result = $this->Model->update('id_kedatangan',$id,$data,'kedatangan');
		$id = $this->input->post('id');
		$keterangan = $this->input->post('keterangan');
		$detail = [
			'id_kedatangan' => $id,
			'keterangan' => $keterangan,
			'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
			
		];
		$result = $this->Model->simpan('detail_datang',$detail);
		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	    	redirect('jadwal');
		}
	}

	public function hapus($id_kedatangan)
	{
		$result = $this->Model->hapus('id_kedatangan',$id_kedatangan,'kedatangan');
		$result = $this->Model->hapus('id_kedatangan',$id_kedatangan,'detail_datang');
		if ($result){
		   	redirect('jadwal');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Dihapus');
	   		redirect('jadwal');
		}
	}



}
