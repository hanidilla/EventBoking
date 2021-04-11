<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbakademik";

$con = mysqli_connect($host,$user,$pass); mysqli_select_db($con, $db);
// Cek koneksi
if (mysqli_connect_error()){
echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
