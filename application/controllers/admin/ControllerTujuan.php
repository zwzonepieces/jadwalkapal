<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerTujuan extends CI_Controller {

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
		$getAlltujuankapal = $this->Model->getAll('t_tujuan');
		$data = [
			'getAlltujuankapal' => $getAlltujuankapal,
			
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('admin/v_tujuan',$data);
		$this->load->view('template/v_footer');	 
	}
	
	//tambah pelabuhan
	public function simpan()
	{
		
		$kode = $this->input->post('kode');
		$tujuan = $this->input->post('tujuan');
		$kota = $this->input->post('kota');
				
		$data = [
			
			'kode' => $kode,
			'tujuan' => $tujuan,
			'kota' => $kota,		
		];

		$result = $this->Model->simpan('t_tujuan',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('tujuan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('tujuan');
		}
	}
	
	//update pelabuhan
	public function ubah()
	{
		$id_tujuan = $this->input->post('id_tujuan');
		$kode = $this->input->post('kode');
		$tujuan = $this->input->post('tujuan');
		$kota = $this->input->post('kota');
		$data = [
			'kode' => $kode,
			'tujuan' => $tujuan,
			'kota' => $kota,	
		];

		$result = $this->Model->update('id_tujuan',$id_tujuan,$data,'t_tujuan');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Diubah');
	   		redirect('tujuan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('tujuan');
		}
	}
	
	//menghapus pelabuhan
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_tujuan',$id,'t_tujuan');
		if ($result){
		   	redirect('tujuan');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	   		redirect('tujuan');
		}
	}
}
