<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medit extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}
	//fungsi edit kedatangan
    public function joineditjadwal($id_kedatangan)
	{
		try{
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');
            $this->db->join('detail_datang', 'detail_datang.id_kedatangan = kedatangan.id_kedatangan','left');
            $this->db->group_by('detail_datang.id_kedatangan');    	
            $this->db->where('kedatangan.id_kedatangan', $id_kedatangan);         		
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
    public function joineditdetail($id_kedatangan)
	{
		try{
			$this->db->select('*');
			$this->db->from('detail_datang');
            $this->db->where('id_kedatangan', $id_kedatangan); 
            $this->db->order_by('tgl_edit', 'desc');
                   
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	//fungsi edit keberangkatan
	public function joineditberangkat($id_keberangkatan)
	{
		try{
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');
            $this->db->join('detail_berangkat', 'detail_berangkat.id_keberangkatan = keberangkatan.id_keberangkatan','left');
            $this->db->group_by('detail_berangkat.id_keberangkatan');    	
            $this->db->where('keberangkatan.id_keberangkatan', $id_keberangkatan);         		
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}

	public function joineditdb($id_keberangkatan)
	{
		try{
			$this->db->select('*');
			$this->db->from('detail_berangkat');
            $this->db->where('id_keberangkatan', $id_keberangkatan); 
            $this->db->order_by('tgl_edit', 'desc');
                   
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
}