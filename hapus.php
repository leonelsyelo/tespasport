<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    mysqli_query($koneksi, "DELETE FROM produk WHERE idProduk='$id'");
}

header("location:data_barang.php");
exit;
?>

