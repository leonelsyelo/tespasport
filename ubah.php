<?php
include 'koneksi.php';

$idProduk   = isset($_POST['idProduk']) ? intval($_POST['idProduk']) : 0;
$namaproduk = isset($_POST['namaproduk']) ? mysqli_real_escape_string($koneksi, trim($_POST['namaproduk'])) : '';
$harga      = isset($_POST['harga']) ? mysqli_real_escape_string($koneksi, trim($_POST['harga'])) : '';
$stok       = isset($_POST['stok']) ? mysqli_real_escape_string($koneksi, trim($_POST['stok'])) : '';

if ($idProduk > 0 && $namaproduk != '' && $harga != '' && $stok != '') {
    mysqli_query($koneksi, "UPDATE produk SET namaproduk='$namaproduk', harga='$harga', stok='$stok' WHERE idProduk='$idProduk'");
}

header("location:data_barang.php");
exit;
?>

