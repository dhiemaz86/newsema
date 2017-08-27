
<?php


require_once('lib/DBClass.php');

class profil{

	private $db;

	public function Profil(){
		$this->db = new DBClass();
	}

	public function readAllProfil(){
		$query = "Select * from profil";
		return $this->db->getRows($query);	
	}


	public function readProfil($id){
		$query = "Select * from profil where id_profil=".$id;
		return $this->db->getRows($query);		
	}

		public function baca(){
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		 $quweri = "select * from profil where orma='".$id."'";
 		 //$orma = mysql_fetch_array(mysql_query($quweri));	

 		 return $this->db->getRows($quweri);		
	}


	public function updateProfil($data){
		 $user = $_SESSION['usernameku'];
		 $sqlUser = "select * from orma where user='$user'";
 		 $orma = mysql_fetch_array(mysql_query($sqlUser));
   	 	 $id   =  "".$orma['id_orma']." ";

		$nama_orma = $data['nama_orma'];
		$ketua = $data['ketua'];
		$kesekretariatan = $data['kesekretariatan'];
		$kontak = $data['kontak'];
		$deskripsi = $data['deskripsi'];
		$logo = $data['logo'];	

		$query = "update profil set nama_orma='$nama_orma', ketua='$ketua', kesekretariatan='$kesekretariatan', kontak='$kontak', deskripsi='$deskripsi' ,logo='$logo'";
		$query.= " where id_profil='".$id."'";;
		$this->db->putRows($query);		
	}

	

}


?>