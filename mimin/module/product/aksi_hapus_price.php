<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $pp_id = $_GET['pp_id'];

    $queryHapus = mysqli_query($koneksi,"DELETE FROM cera_product_price WHERE pp_id='$pp_id'");
    if ($queryHapus) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
