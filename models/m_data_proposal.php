<?php
require_once('lib/DBClass.php');

class data_proposal{

	private $db;

	public function Data_proposal(){
		$this->db = new DBClass();
	}

	public function readAllData_proposal(){
		$query = "Select * from data_proposal";
		return $this->db->getRows($query);	
	}

	public function readData_proposal($id){
		$query = "Select * from data_proposal where id_data_proposal='".$id."'";
		return $this->db->getRows($query);		
	}

	public function baca(){
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		 $quweri = "select * from data_proposal dp join orma o on dp.id_orma = o.id_orma where dp.id_orma='".$id."'";
 		 //$orma = mysql_fetch_array(mysql_query($quweri));	

 		 return $this->db->getRows($quweri);		
	}


//	public function createData_proposal($id_data_proposal, $orma, $no_surat, $judul, $proposal, $deskripsi){
//		$query = "Insert into data_proposal (id_data_proposal, orma, no_surat, judul, proposal, deskripsi,tgl_input)
//			values('$id_data_proposal', '$orma', '$no_surat', '$judul', '$proposal', '$deskripsi', 'date('Y-m-d')')";
//		$this->db->putRows($query);	
//	}

		public function createData_proposal($judul,$no_surat, $proposal, $deskripsi){
		 $tgl = date('Y-m-d');
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		$query = "Insert into data_proposal (id_data_proposal, orma, no_surat, judul, proposal, deskripsi, tgl_input)
			values('', '$id', '$no_surat', '$judul', '$proposal', '$deskripsi', '$tgl')";
		$this->db->putRows($query);	
	}


	public function updateData_proposal($id, $data){
		$orma = $data['input_orma'];
		$no_surat = $data['input_no_surat'];
		$judul = $data['input_judul'];
		$proposal=$data['input_proposal'];
		$deskripsi=$data['input_deskripsi'];
		

		$query = "update data_proposal set orma='$orma', no_surat='$no_surat', judul='$judul', proposal=$proposal, deskripsi=$deskripsi, tgl_input=date('Y-m-d')";
		$query.= " where id_data_proposal='$id'";
		$this->db->putRows($query);		
	}

	public function deleteData_proposal($id){
		$sql = "Delete from data_proposal Where id_data_proposal='$id'";
		$this->db->putRows($sql);		
	}
	
}


?>