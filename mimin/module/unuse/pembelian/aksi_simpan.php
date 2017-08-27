<?php

	session_start();
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    if(trim(@$_POST['pilih_suplier']) !== ''){
    	
      	$query=mysqli_query($koneksi,"SELECT * FROM supplier WHERE id_supplier=".$_POST['id_supplier']);

      	$hasilQuery=mysqli_fetch_array($query);

    	//set supplier in session
    	$_SESSION['beli']['supplier'] = $hasilQuery;

    	echo "<script> window.location = '$admin_url'+'adminweb.php?module=tambah_beli';</script>";

    }

    if(trim(@$_POST['pilih_kembali']) !== ''){
    	
    	unset($_SESSION['beli']['supplier']);
    	echo "<script> window.location = '$admin_url'+'adminweb.php?module=tambah_beli';</script>";

    }

    if(trim(@$_POST['pilih_detail']) !== ''){   	
        

    	//insert CAST(a
        $q = "INSERT INTO beli (status_beli, tgl_beli, jam_beli, id_supplier) VALUES ('PENDING','".date('Y-m-d')."','".date('H:m:s')."',".$_SESSION['beli']['supplier']['id_supplier'].")";
        
        echo $q;
		$q=mysqli_query($koneksi,$q);
		
		//var_dump($q);

		$id_beli=mysqli_insert_id($koneksi);

    	//insert detail beli
    	$i=0;
    	foreach($_POST['pilih'] as $wew){

            $q = "INSERT INTO detail_beli(id_detail_beli, id_beli, id_kopi, jumlah, subtotal) VALUES('',".$id_beli.",".$_POST['id_kopi'][$wew].",".$_POST['jumlah'][$wew].",".$_POST['jumlah'][$wew]*$_POST['price'][$wew].")";

			$q=mysqli_query($koneksi,$q);

			//var_dump($q);

    		$i++;
    	}

    	unset($_SESSION['beli']['supplier']);
    	echo "<script> alert('Data Pembelian Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pembelian';</script>";

    }

    echo "<script> window.location = '$admin_url'+'adminweb.php?module=tambah_beli';</script>";
 ?>