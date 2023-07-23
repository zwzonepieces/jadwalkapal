<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerSlaporan extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model');
		$username = $this->session->username;

		if($username == null){
			redirect('login');
		} 
	}

	public function index(){
        $tgl_awal = $this->input->get('tgl_awal'); 
        $tgl_akhir = $this->input->get('tgl_akhir'); 
        if(empty($tgl_awal) or empty($tgl_akhir)){ 
            $keberangkatan = $this->Model->joinBerangkat();  
			$kedatangan = $this->Model->joinJadwal();
            $url_cetak = 'cetak'; 
            $label = 'Semua Data Transaksi'; 
        }else{ // Jika terisi
			$kapal = $this->Model->getAll('kapal');
			$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
			$keberangkatan = $this->Model->view_by_date($tgl_awal, $tgl_akhir);
			$kedatangan = $this->Model->view_date($tgl_awal, $tgl_akhir);
			$data = [
				'kapal' => $kapal,
				'keberangkatan' => $keberangkatan,
				'kedatangan' => $kedatangan,
				'getAllpelabuhan'   => $getAllpelabuhan,
			];
             
            $url_cetak = 'cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir; 
            $tgl_awal = date('d-F-Y', strtotime($tgl_awal)); 
            $tgl_akhir = date('d-F-Y', strtotime($tgl_akhir)); 
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir; 
        }
		$data['keberangkatan']=$keberangkatan;
		$data['kedatangan']=$kedatangan;
        $data['url_cetak'] = base_url('s_laporan/'.$url_cetak);
        $data['label'] = $label;
		$this->load->view('template/v_header');
		$this->load->view('template/sidebar');
		$this->load->view('staf/s_laporan',$data);
		$this->load->view('template/v_footer');
    }

    public function cetak(){
		$tgl_awal = $this->input->get('tgl_awal'); 
        $tgl_akhir = $this->input->get('tgl_akhir'); 

        if(empty($tgl_awal) or empty($tgl_akhir)){ 
            $keberangkatan = $this->Model->joinBerangkat(); 
			$kedatangan = $this->Model->joinJadwal(); 
            $label = 'Rekap Data Kapal';
        }else{ // Jika terisi
            $keberangkatan = $this->Model->view_by_date($tgl_awal, $tgl_akhir);  
			$kedatangan = $this->Model->view_date($tgl_awal, $tgl_akhir); 
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); 
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); 
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		
		$data = [
			'kapal' => $kapal,
			'keberangkatan' => $keberangkatan,
			'kedatangan' => $kedatangan,
			'getAllpelabuhan'   => $getAllpelabuhan,
		];	

        $data['label'] = $label;
        $data['keberangkatan'] = $keberangkatan;
		$data['kedatangan'] = $kedatangan;
		ob_start();
		$this->load->view('staf/s_print', $data);
		$html = ob_get_contents();
        ob_end_clean();

		require './assets/html2pdf/autoload.php'; 

		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en' );
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'I');
	}
    
	// fungsi tampilan laporan detail
	public function index2(){
        $tgl_awal = $this->input->get('tgl_awal'); 
        $tgl_akhir = $this->input->get('tgl_akhir');
		$keyword = $this->input->get('keyword'); 
        if(empty($tgl_awal) or empty($tgl_akhir)){ 
            $keberangkatan = $this->Model->JBerangkat();
			$kedatangan = $this->Model->JJadwal();
            $url_cetak = 'cetak'; 
            $label = 'Semua Data Transaksi'; 
        }else{ // Jika terisi
			$kapal = $this->Model->getAll('kapal');
			$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
			$keberangkatan = $this->Model->liat_berdasarkan_tanggal($tgl_awal, $tgl_akhir, $keyword);
			$kedatangan = $this->Model->liat_tanggal($tgl_awal, $tgl_akhir, $keyword);
			$data = [
				'kapal' => $kapal,
				'keberangkatan' => $keberangkatan,
				'kedatangan' => $kedatangan,
				'getAllpelabuhan'   => $getAllpelabuhan,
			];
             
            $url_cetak = 'cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir; 
            $tgl_awal = date('d-F-Y', strtotime($tgl_awal)); 
            $tgl_akhir = date('d-F-Y', strtotime($tgl_akhir)); 
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir; 
        }
		$data['keberangkatan']=$keberangkatan;
		$data['kedatangan']=$kedatangan;
        $data['url_cetak'] = base_url('s_laporandetail/'.$url_cetak);
        $data['label'] = $label;
		$this->load->view('template/v_header');
		$this->load->view('template/sidebar');
		$this->load->view('staf/s_laporan_detail',$data);
		$this->load->view('template/v_footer');
    }

    public function cetak2(){
		$tgl_awal = $this->input->get('tgl_awal'); 
        $tgl_akhir = $this->input->get('tgl_akhir'); 

        if(empty($tgl_awal) or empty($tgl_akhir)){ 
            $keberangkatan = $this->Model->JBerangkat(); 
			$kedatangan = $this->Model->JJadwal(); 
            $label = 'Rekap Data Kapal';
        }else{ // Jika terisi
            $keberangkatan = $this->Model->liat_berdasarkan_tanggal($tgl_awal, $tgl_akhir);  
			$kedatangan = $this->Model->liat_tanggal($tgl_awal, $tgl_akhir); 
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); 
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); 
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $kapal = $this->Model->getAll('kapal');
		$getAllpelabuhan   = $this->Model->getAll('pelabuhan');
		
		$data = [
			'kapal' => $kapal,
			'keberangkatan' => $keberangkatan,
			'kedatangan' => $kedatangan,
			'getAllpelabuhan'   => $getAllpelabuhan,
		];	

        $data['label'] = $label;
        $data['keberangkatan'] = $keberangkatan;
		$data['kedatangan'] = $kedatangan;
		ob_start();
		$this->load->view('staf/lde', $data);
		$html = ob_get_contents();
        ob_end_clean();

		require './assets/html2pdf/autoload.php'; 

		$pdf = new Spipu\Html2Pdf\Html2Pdf('L','A4','en' );
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'I');
	}
}