<?php
require_once('lib/DBClass.php');

class administrasi{

	private $db;

	public function Administrasi(){
		$this->db = new DBClass();
	}

	public function readAllAdministrasi(){
		$query = "Select * from keadministrasian";
		return $this->db->getRows($query);	
	}

	public function readAdministrasi($id){
		$query = "Select * from keadministrasian where id_keadministrasian='".$id."'";
		return $this->db->getRows($query);		
	}

	public function createAdministrasi($id_keadministrasian, $judul, $upload, $deskripsi){
		$query = "Insert into keadministrasian (id_keadministrasian, judul, upload, deskripsi,tgl_input)
			values('$id_keadministrasian', '$judul', '$judul', '$deskripsi', 'date('Y-m-d')')";
		$this->db->putRows($query);	
	}
	public function updateAdministrasi($id, $data){
		$judul = $data['input_judul'];
		$upload=$data['input_upload'];
		$deskripsi=$data['input_deskripsi'];
		

		$query = "update keadministrasian set judul='$judul', upload=$upload, deskripsi=$deskripsi, tgl_input=date('Y-m-d')";
		$query.= " where id_keadministrasian='$id'";
		$this->db->putRows($query);		
	}

	public function deleteAdministrasi($id){
		$sql = "Delete from keadministrasian Where id_keadministrasian='$id'";
		$this->db->putRows($sql);		
	}
	
}


?>