<?php
session_start();
include 'koneksi.php';

$nama = isset($_POST['nama']) ? ($_POST['nama']) : '';
$alamat = isset($_POST['alamat']) ? ($_POST['alamat']) : '';
$nomer = isset($_POST['nomer']) ? ($_POST['nomer']) : '';


if ($nama == ''|| $alamat == ''|| $nomer == '') {
    header("Location: login_pelanggan.php?error=invalid");
    exit;
}

$nama = mysqli_real_escape_string($koneksi, $nama);
$alamat = mysqli_real_escape_string($koneksi, $alamat);
$nomer = mysqli_real_escape_string($koneksi, $nomer);

$cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE notelephone='$nomer'");
if (mysqli_num_rows($cek) > 0) {
    mysqli_query($koneksi, "UPDATE pelanggan SET namapelanggan='$nama', alamat='$alamat' WHERE notelephone='$nomer'");
} else {
    mysqli_query($koneksi, "INSERT INTO pelanggan (namapelanggan, alamat, notelephone) VALUES ('$nama', '$alamat', '$nomer')");
}

$Pelanggan['nama_pelanggan'] = $nama;
$Pelanggan['status_pelanggan'] = 'login';

header("Location: data_barang.php");
exit;
?>

