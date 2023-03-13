<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MKapal extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function tambahKapal($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('kapal',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	
	public function getAllKapal()
	{
		$result = $this->db->get('kapal');
		return $result->result();
	}
	
	public function getKapal($id)
	{
		$result = $this->db->where('id_kapal',$id)->get('kapal');
		return $result->row();
	}
	
	
	public function updateKapal($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_kapal',$id);
			$this->db->update('kapal',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function deleteKapal($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_kapal',$id);
			$this->db->delete('kapal');
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}
	
	public function validasiHapus($kolom,$table,$id)
    {
     	$result = $this->db->query("SELECT $kolom FROM $table WHERE $kolom = '$id'");
     	return $result->row();
    }
	
}
