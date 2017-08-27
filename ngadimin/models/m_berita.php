<?php
require_once('lib/DBClass.php');

class Berita{

	private $db;

	public function Berita(){
		$this->db = new DBClass();
	}

	public function readAllBerita(){
		$query = "Select * from berita";
		return $this->db->getRows($query);	
	}

	public function readBeritaDesc(){
		$query = "select * from berita 
order by id_berita desc  limit $posisi,$batas";
		return $this->db->getRows($query);	
	}

	public function readBerita($id){
		$query = "Select * from berita where id_berita='".$id."'";
		return $this->db->getRows($query);		
	}

	public function createBerita($kategori, $judul_berita, $tgl_agenda, $tgl_akhir, $isi_berita){
		$query = "Insert into berita (kategori,judul_berita,tgl_agenda,tgl_akhir,isi_berita,tgl_input)
			values('$kategori','$judul_berita','$tgl_agenda','$tgl_akhir','$isi_berita','date('Y-m-d')')";
		$this->db->putRows($query);	
	}
	
	
	public function createBerita_gambar($kategori, $judul_berita, $tgl_agenda, $tgl_akhir, $isi_berita){
		$query = "Insert into berita (kategori,judul_berita,tgl_agenda,tgl_akhir,isi_berita,tgl_input,gambar)
			values('$kategori','$judul_berita','$tgl_agenda','$tgl_akhir','$isi_berita','date('Y-m-d')','$nama_file')";
		$this->db->putRows($query);	
	}
	
	
	public function updateBerita($id, $data){
		
		$kategori		= $_POST['kategori'];
		$judul_berita	= $_POST['judul_berita'];
		$tgl_agenda		= $_POST['tgl_agenda'];
		$tgl_akhir		= $_POST['tgl_akhir'];
		$isi_berita		= $_POST['isi_berita'];
		

		$query = "update berita set kategori='$kategori', judul_berita=$judul_berita, tgl_agenda=$tgl_agenda, tgl_akhir=$tgl_akhir, isi_berita=$isi_berita, tgl_input=date('Y-m-d')";
		$query.= " where id_berita='$id'";
		$this->db->putRows($query);		
	}
	
		public function updateBeritagambar($id, $data){
		
		$kategori		= $_POST['kategori'];
		$judul_berita	= $_POST['judul_berita'];
		$tgl_agenda		= $_POST['tgl_agenda'];
		$tgl_akhir		= $_POST['tgl_akhir'];
		$isi_berita		= $_POST['isi_berita'];
		$gambar		 	= $_POST['$nama_file'];

		$query = "update berita set kategori='$kategori', judul_berita=$judul_berita, tgl_agenda=$tgl_agenda, tgl_akhir=$tgl_akhir, isi_berita=$isi_berita, tgl_input=date('Y-m-d'), gambar=$gambar";
		$query.= " where id_berita='$id'";
		$this->db->putRows($query);		
	}

	public function deleteBerita($id){
		$sql = "Delete from berita Where id_berita='$id'";
		$this->db->putRows($sql);		
	}
	
}


?>