<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSBerangkat extends CI_Controller {

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
		$keberangkatan = $this->Model->joinBerangkat();
		$detail_berangkat = $this->Model->joinDB();
		$data = [
			'kapal' => $kapal,
			'keberangkatan' => $keberangkatan,
			'getAllpelabuhan'   => $getAllpelabuhan,
			'detail_berangkat' => $detail_berangkat,
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/sidebar');
		$this->load->view('staf/s_berangkat',$data);
		$this->load->view('template/v_footer');	 
	}

	public function edit($id_keberangkatan)
	{
		$kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		$keberangkatan = $this->Medit->joineditberangkat($id_keberangkatan);
		$detail_berangkat = $this->Medit->joineditdb($id_keberangkatan);
		$data = [
			'kapal' => $kapal,
			'keberangkatan' => $keberangkatan,
			'getAllpelabuhan'   => $getAllpelabuhan,
			'detail_berangkat' => $detail_berangkat,
		];	
		$this->load->view('template/v_header');
		$this->load->view('template/sidebar');
		$this->load->view('staf/s_edit_berangkat',$data);
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
			$result = $this->Model->simpan('keberangkatan',$data);

		$last_id=$this->db->insert_id();
		$detail = [
			'id_keberangkatan' => $last_id,
			'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
		];
			$result = $this->Model->simpan('detail_berangkat',$detail);		

		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('s_berangkat');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	   		redirect('s_berangkat');
		}

	}

	public function ubah1()
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
		

		$result = $this->Model->update('id_keberangkatan',$id,$data,'keberangkatan');
		$id = $this->input->post('id');
		$keterangan = $this->input->post('keterangan');
		$detail = [
			'id_keberangkatan' => $id,
			'tgl_berangkat' => $tgl_berangkat,
			'jam_berangkat' => $jam_berangkat,
			'tgl_datang' => $tgl_datang,
			'jam_datang' => $jam_datang,
			'keterangan' => $keterangan
		];
		$result = $this->Model->simpan('detail_berangkat',$detail);
		if ($result){
			$this->session->set_flashdata('pesan','Jadwal Berhasil Disimpan');
	   		redirect('s_berangkat');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Disimpan');
	    	redirect('s_berangkat');
		}
	}

	public function hapus($id_keberangkatan)
	{
		$result = $this->Model->hapus('id_keberangkatan',$id_keberangkatan,'keberangkatan');
		$result = $this->Model->hapus('id_keberangkatan',$id_keberangkatan,'detail_berangkat');
		if ($result){
		   	redirect('s_berangkat');
		}else{
			$this->session->set_flashdata('pesanGagal','Jadwal Tidak Berhasil Dihapus');
	   		redirect('s_berangkat');
		}
	}



}
