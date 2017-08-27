<?php
require_once('lib/DBClass.php');

class kirim_lpj{

	private $db;

	public function Kirim_lpj(){
		$this->db = new DBClass();
	}

	public function readAllKirim_lpj(){
		$query = "Select * from kirim_lpj";
		return $this->db->getRows($query);	
	}

	public function readKirim_lpj($id){
		$query = "Select * from kirim_lpj where id_lpj='".$id."'";
		return $this->db->getRows($query);		
	}

	public function baca(){
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		 $quweri = "select * from kirim_lpj kp join  status s on
			kp.status = s.id_status join orma o on kp.id_orma = o.id_orma where kp.id_orma='".$id."'";
 		 //$orma = mysql_fetch_array(mysql_query($quweri));	

 		 return $this->db->getRows($quweri);		
	}

		public function createKirim_lpj($judul,$no_surat, $lpj, $deskripsi){
		 $tgl = date('Y-m-d');
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		$query = "Insert into kirim_lpj (id_orma, no_surat, judul, lpj, deskripsi, tgl_input)
			values('$id', '$no_surat', '$judul', '$lpj', '$deskripsi', '$tgl')";
		$this->db->putRows($query);	
	}

	public function updateKirim_lpj($id, $data){
		$orma = $data['input_orma'];
		$no_surat = $data['input_no_surat'];
		$judul = $data['input_judul'];
		$lpj=$data['input_lpj'];
		$deskripsi=$data['input_deskripsi'];
		

		$query = "update kirim_lpj set orma='$orma', no_surat='$no_surat', judul='$judul', lpj=$lpj, deskripsi=$deskripsi, tgl_input=date('Y-m-d')";
		$query.= " where id_lpj='$id'";
		$this->db->putRows($query);		
	}

	public function deleteKirim_lpj($id){
		$sql = "Delete from kirim_lpj Where id_lpj='$id'";
		$this->db->putRows($sql);		
	}
	
}


?>