<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhide extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}
    public function joinJadwalhide()
	{
		try{
			$today = date('Y-m-d');
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');
			
			$this->db->where('tgl_datang >=', $today);
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}

    public function joinBerangkathide()
	{
		try{
            $today = date('Y-m-d');
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');
			
            $this->db->where('tgl_datang >=', $today);
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
}