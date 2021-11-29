<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bptik";

$koneksi = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
