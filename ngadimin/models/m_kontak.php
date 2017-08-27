<?php

require_once('lib/DBClass.php');

class kontak{

	private $db;

	public function kontak(){
		$this->db = new DBClass();
	}

	public function readAllkontak(){
		$query = "Select * from kontak";
		return $this->db->getRows($query);	
	}
	//
	public function readkontak($id){
		$query = "Select * from kontak where id_kontak='".$id."'";
		return $this->db->getRows($query);		
	}

	public function createkontak($id_kontak, $nama, $nim, $jabatan, $kontak){
		$query = "Insert into kontak (id_kontak, nama, nim, jabatan, kontak)
			values('$id_kontak', '$nama', '$nim', '$jabatan', '$kontak')";
		$this->db->putRows($query);	
	}
	public function updatekontak($id, $data){
		$nama = $data['input_nama'];
		$nim = $data['input_nim'];
		$jabatan = $data['input_jabatan'];
		$kontak = $data['input_kontak'];
		$query = "update kontak set nama='$nama', nim='$nim', jabatan='$jabatan', kontak='$kontak'";
		$query.= " where id_kontak='$id'";
		$this->db->putRows($query);		
	}

	public function deletekontak($id){
		$sql = "Delete from kontak Where kontak='$id'";
		$this->db->putRows($sql);		
	}

	
}