<?php
require_once('lib/DBClass.php');

class kirim_proposal{

	private $db;

	public function kirim_proposal(){
		$this->db = new DBClass();
	}

	public function readAllKirim_proposal(){
		$query = "Select * from kirim_proposal";
		return $this->db->getRows($query);	
	}

	public function readKirim_proposal($id){
		$query = "Select * from kirim_proposal where id_proposal='".$id."'";
		return $this->db->getRows($query);		
	}

	public function baca(){
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		 $quweri = "select * from kirim_proposal kp join  status s on
			kp.status = s.id_status join orma o on kp.id_orma = o.id_orma where kp.id_orma='".$id."'";
 		 //$orma = mysql_fetch_array(mysql_query($quweri));	

 		 return $this->db->getRows($quweri);		
	}

	public function createKirim_proposal($judul,$no_surat, $proposal, $deskripsi){
		 $tgl = date('Y-m-d');
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";
   	 
		$query = "Insert into kirim_proposal (id_proposal, id_orma, no_surat, judul, proposal, deskripsi, tgl_input)
			values('', '$id', '$no_surat', '$judul', '$proposal', '$deskripsi', '$tgl')";
		$this->db->putRows($query);	
	}



	public function updateKirim_proposal($id, $judul, $no_surat, $proposal, $deskripsi){
		 $tgl = date('Y-m-d');
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $ormas = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $ids   =  "".$ormas['id_orma']." ";
   	 
 		$query="UPDATE kirim_proposal SET id_proposal='$id', id_orma='$ids', no_surat='$no_surat', judul='$judul', proposal='$proposal', deskripsi='$deskripsi', tgl_input='$tgl' WHERE id=$id"; 
	
		$this->db->putRows($query);		
	}

public function updater_proposal($id, $data){
	 $tgl = date('Y-m-d');
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $ormas = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $ids   =  "".$ormas['id_orma']." ";

		$judul = $data['input_judul'];
		$nomor = $data['input_nomor'];
		$proposal = $data['input_proposal'];
		$deskripsi = $data['input_deskripsi'];

		$query="UPDATE kirim_proposal SET id_proposal='$id', id_orma='$ids', no_surat='$nomor', judul='$judul', proposal='$proposal', deskripsi='$deskripsi', tgl_input='$tgl' WHERE id_proposal=$id"; 
		//$query = "update kirim_proposal set judul='$judul', nomor='$nomor', proposal='$proposal, deskripsi='$deskripsi'";
		//$query.= " where id_proposal='$id'";
		$this->db->putRows($query);		
	}
	public function deleteKirim_proposal($id){
		$sql = "Delete from kirim_proposal Where id_proposal='$id'";
		$this->db->putRows($sql);		
	}
	
}


?>