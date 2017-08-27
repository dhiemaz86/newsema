<?php


require_once('lib/DBClass.php');

class keuangan{

	private $db;

	public function Keuangan(){
		$this->db = new DBClass();
	}

	public function readAllKeuangan(){
		$query = "Select * from Keuangan";
		return $this->db->getRows($query);	
	}

	public function readKeuangan(){
		$query = "Select * from keuangan k join orma o on k.id_orma=o.id_orma order by k.id_orma asc";
		return $this->db->getRows($query);		
	}

	public function createKeuangan($id_keuangan, $orma, $dana, $sisa){
		$query = "Insert into keuangan (id_keuangan, orma, dana, sisa)
			values('$id_keuangan', '$orma', '$dana', '$sisa')";
		$this->db->putRows($query);	
	}
	public function updateKeuangan($id, $data){
		$orma = $data['input_orma'];
		$dana = $data['input_dana'];
		$sisa = $data['input_sisa'];
		$query = "update keuangan set orma='$orma', dana='$dana', sisa='$sisa'";
		$query.= " where id_keuangan=$id";
		$this->db->putRows($query);		
	}

	public function deleteKeuangan($id){
		$sql = "Delete from keuangan Where id_keuangan=$id";
		$this->db->putRows($sql);		
	}

}


?>