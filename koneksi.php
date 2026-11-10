<?php

$koneksi = mysqli_connect("localhost","root","","skilpasport");

if(mysqli_connect_error()){

echo"koneksi databases gagal : " . mysqli_connect_error();

}
?>