<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//untuk login
	public function auth($username,$password)
	{
   		$query = "SELECT * FROM user WHERE UPPER(username)=".$this->db->escape(strtoupper(stripslashes(strip_tags(htmlspecialchars($username,ENT_QUOTES)))))." AND password=".$this->db->escape(stripslashes(strip_tags(htmlspecialchars($password,ENT_QUOTES))));
   		$result = $this->db->query($query);
   		return $result->row();
	}

	//ambil semua data
	public function getAll($table)
	{
		$result = $this->db->get($table);
		return $result->result();
	}

	//simpan
	public function simpan($table,$data)
	{
		$checkinsert = false;
		try{
			$this->db->insert($table,$data);
			$checkinsert = true;
		}catch (Exception $ex) {
			$checkinsert = false;
		}
		return $checkinsert;
	}

	//update
	public function update($pk,$id,$data,$table)
	{
		$checkupdate = false;
		try{
			$this->db->where($pk,$id);
			$this->db->update($table,$data);
			$checkupdate = true;
		}catch (Exception $ex) {
			$checkupdate = false;
		}
		return $checkupdate;
	}

	//hapus
	public function hapus($pk,$id,$table)
	{
		$checkdelete = false;
		try{
			$this->db->where($pk,$id);
			$this->db->delete($table);
			$checkdelete = true;
		}catch (Exception $ex) {
			$checkhapus = false;
		}
		return $checkdelete;
	}

	//join
	public function joinJadwal()
	{
		try{
			$this->db->select('*');
			$this->db->from('jadwal');
			$this->db->join('kapal', 'jadwal.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = jadwal.id_pelabuhan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	//kode
	public function kode()
    {
       	$q  = $this->db->query("select MAX(RIGHT(id,1)) as kd_max from jadwal");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%01s",$tmp);
        	}
    	} else {
         $kd = "1";
    	}
       	return $kd;
    }

	//kode pelabuhan
	public function getKodePelabuhan()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_pelabuhan,2)) as kd_max from pelabuhan");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%02s",$tmp);
        	}
    	} else {
         $kd = "01";
    	}
       	return "Plbn".$kd;
    }
    //kode kapal
	public function getKodeKapal()
    {
       	$q  = $this->db->query("SELECT MAX(RIGHT(id_kapal,2)) as kd_max from kapal");
       	$kd = "";
    	if($q->num_rows() > 0) {
        	foreach ($q->result() as $k) {
          		$tmp = ((int)$k->kd_max)+1;
           		$kd = sprintf("%02s",$tmp);
        	}
    	} else {
         $kd = "01";
    	}
       	return "KPL".$kd;
    }

}
