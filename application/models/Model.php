<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
	}

	//fungsi login
	public function auth($username,$password)
	{
   		$query = "SELECT * FROM user WHERE UPPER(username)=".$this->db->escape(strtoupper(stripslashes(strip_tags(htmlspecialchars($username,ENT_QUOTES)))))." AND password=".$this->db->escape(stripslashes(strip_tags(htmlspecialchars($password,ENT_QUOTES))));
   		$result = $this->db->query($query);
   		return $result->row();
	}

	//fungsi ambil semua data
	public function getAll($table)
	{
		$result = $this->db->get($table);
		return $result->result();
	}
	//fungsi melihat laporan berdasarkan tanggal pada laporan biasa
    public function view_by_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(keberangkatan.tgl_berangkat) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); 
		try{
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
		return $this->db->get('keberangkatan')->result();
	}
	//sampai sini juga sama
	public function view_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(kedatangan.tgl_berangkat) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		try{
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
		return $this->db->get('kedatangan')->result();
	}

	//filter data berdasarkan tgl dan nama pada laporan detail
    public function liat_berdasarkan_tanggal($tgl_awal, $tgl_akhir, $keyword){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(keberangkatan.tgl_berangkat) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); 
		$this->db->like('nm_kapal', $keyword);
		try{
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');			
			$this->db->join('detail_berangkat','keberangkatan.id_keberangkatan=detail_berangkat.id_keberangkatan');			
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
		return $this->db->get('keberangkatan')->result();
	}
	//ini juga sampai disini
	public function liat_tanggal($tgl_awal, $tgl_akhir, $keyword){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(kedatangan.tgl_berangkat) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		$this->db->like('nm_kapal',$keyword);
		try{
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');
			$this->db->join('detail_datang','kedatangan.id_kedatangan=detail_datang.id_kedatangan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
		return $this->db->get('kedatangan')->result();
	}
	//fungsi simpan
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
	//fungsi update
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
	//fungsi hapus
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
	//join jadwal kedatangan untuk view jadwal kedatangan
	public function joinJadwal()
	{
		try{
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');			
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	
	//join detail kedatangan
	public function joinDetail()
	{
		try{
			$this->db->select('*');
			$this->db->from('detail_datang');
			$this->db->join('kedatangan', 'kedatangan.id_kedatangan = detail_datang.id_kedatangan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	//join jadwal keberangkatan untuk view keberangkatan
	public function joinBerangkat()
	{
		try{
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	//join detail keberangkatan
	public function joinDB()
	{
		try{
			$this->db->select('*');
			$this->db->from('detail_berangkat');			
			$this->db->from('keberangkatan','detail_berangkat.id_keberangkatan=keberangkatan.id_keberangkatan');			
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	//fungsi kode
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
       	return "PLBN".$kd;
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
	// fungsi join berangkat untuk view lporan detail
	public function JBerangkat()
	{
		try{
			$this->db->select('*');
			$this->db->from('keberangkatan');
			$this->db->join('kapal', 'keberangkatan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = keberangkatan.id_pelabuhan');
			$this->db->join('detail_berangkat', 'keberangkatan.id_keberangkatan = detail_berangkat.id_keberangkatan');
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
	// fungsi join kedatangan untuk view laporan detail
	public function JJadwal()
	{
		try{
			$this->db->select('*');
			$this->db->from('kedatangan');
			$this->db->join('kapal', 'kedatangan.id_kapal = kapal.id_kapal');
			$this->db->join('pelabuhan', 'pelabuhan.id_pelabuhan = kedatangan.id_pelabuhan');
			$this->db->join('detail_datang', 'detail_datang.id_kedatangan = kedatangan.id_kedatangan');						
			$query = $this->db->get();
			return $query->result();
		}catch (Exception $ex) {
			$check = false;
		}
	}
}
