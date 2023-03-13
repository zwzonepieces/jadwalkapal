<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPelabuhan extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	public function tambahpelabuhan($data)
	{
		$checkinsert = false;
		try{
			$this->db->insert('pelabuhan',$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}
	
	public function getAllpelabuhan()
	{
		$result = $this->db->get('pelabuhan');
		return $result->result();
	}
	
	public function getpelabuhan($id)
	{
		$result = $this->db->where('id_pelabuhan',$id)->get('pelabuhan');
		return $result->row();
	}
	
	public function updatepelabuhan($id,$data)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_pelabuhan',$id);
			$this->db->update('pelabuhan',$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	public function deletepelabuhan($id)
	{
		$checkupdate = false;
		try{
			$this->db->where('id_pelabuhan',$id);
			$this->db->delete('pelabuhan');
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
