<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPelabuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Model']);
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		}
	}

	//halaman awal pelabuhan
	public function index()
	{	
		$getAllpelabuhan = $this->Model->getAll('pelabuhan');
		$data = [
			'id_pelabuhan' => $this->Model->getKodePelabuhan(),
			'getAllpelabuhan' => $getAllpelabuhan,
			
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('v_pelabuhan',$data);
		$this->load->view('template/v_footer');	 
	}
	
	//tambah pelabuhan
	public function simpan()
	{
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$pelabuhan_asal = $this->input->post('pelabuhan_asal');
		$pelabuhan_tujuan = $this->input->post('pelabuhan_tujuan');
				
		$data = [
			'id_pelabuhan' => $id_pelabuhan,
			'pelabuhan_asal' => $pelabuhan_asal,
			'pelabuhan_tujuan' => $pelabuhan_tujuan,		
		];

		$result = $this->Model->simpan('pelabuhan',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('pelabuhan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('pelabuhan');
		}
	}
	
	//update pelabuhan
	public function ubah()
	{
		$id_pelabuhan = $this->input->post('id_pelabuhan');
		$pelabuhan_asal = $this->input->post('pelabuhan_asal');
		$pelabuhan_tujuan = $this->input->post('pelabuhan_tujuan');
		$data = [
			'pelabuhan_asal' => $pelabuhan_asal,
			'pelabuhan_tujuan' => $pelabuhan_tujuan,	
		];

		$result = $this->Model->update('id_pelabuhan',$id_pelabuhan,$data,'pelabuhan');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('pelabuhan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('pelabuhan');
		}
	}
	
	//menghapus pelabuhan
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_pelabuhan',$id,'pelabuhan');
		if ($result){
		   	redirect('pelabuhan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	   		redirect('pelabuhan');
		}
	}
}
