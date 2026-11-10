<?php
include 'koneksi.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];

$password_aman = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($koneksi, "INSERT INTO admin (username, nama, password) VALUES ('$username', '$nama', '$password_aman')");

header("location:skilpasport.php");
exit;
?>