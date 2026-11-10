<?php
include 'koneksi.php';

$idPelanggan = $_POST[''];
$namapelanggan = $_POST['namapelanggan'];
$alamat = $_POST['alamat'];
$notelephone = $_POST['notelephone'];

mysqli_query($koneksi, "INSERT INTO pelanggan (idPelanggan, namapelanggan, alamat, notelephone) VALUES ('', '$namapelanggan', '$alamat', '$notelephone')");

header("location:data_absensi.php");
exit;
?>