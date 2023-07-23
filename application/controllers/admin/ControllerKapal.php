<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerKapal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		}
	}

	//awal halaman kapal
	public function index()
	{	
		$getAllKapal = $this->Model->getAll('kapal');
		$getKode = $this->Model->getKodeKapal();
		$data= [
			'getAllKapal' => $getAllKapal,
			'getKode' => $getKode
		];
		$this->load->view('template/v_header');
		$this->load->view('template/v_sidebar');
		$this->load->view('admin/v_kapal', $data);
		$this->load->view('template/v_footer');	 
	}
	
	//tambah kapal
	public function simpan()
	{
		$id_kapal = $this->input->post('id_kapal');
		$nm_kapal = $this->input->post('nm_kapal');		
		$jenis_kapal = $this->input->post('jenis_kapal');
		$no_registrasi = $this->input->post('no_registrasi');
		
		$data = [
			'id_kapal' => $id_kapal,
			'nm_kapal' => $nm_kapal,			
			'jenis_kapal' => $jenis_kapal,
			'no_registrasi' =>$no_registrasi,
		];
		
		$result = $this->Model->simpan('kapal',$data);

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('kapal');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('kapal');
		}
	}
	
	//update kapal
	public function ubah()
	{
		$id_kapal = $this->input->post('id_kapal');
		$nm_kapal = $this->input->post('nm_kapal');		
		$jenis_kapal = $this->input->post('jenis_kapal');
		$no_registrasi = $this->input->post('no_registrasi');
		$data = [
			'nm_kapal' => $nm_kapal,			
			'jenis_kapal' => $jenis_kapal,
			'no_registrasi' => $no_registrasi,
		];
		
		$result = $this->Model->update('id_kapal',$id_kapal,$data,'kapal');

		if ($result){
			$this->session->set_flashdata('pesan','Data Berhasil Disimpan');
	   		redirect('kapal');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Disimpan');
    		redirect('kapal');
		}
	}
			
	public function hapus($id)
	{
		$result = $this->Model->hapus('id_kapal',$id,'kapal');
		if ($result){
		   	redirect('kapal');
		}else{
			$this->session->set_flashdata('pesanGagal','Data Tidak Berhasil Dihapus');
	   		redirect('kapal');
		}
	}
	
	
}
