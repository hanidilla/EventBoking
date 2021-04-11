<?php
//koneksi database
include 'koneksi1.php';

//menangkap data id yang dikiirim dari url 
$kode = $_GET['kode'];

//Menghapus data dari database 
mysqli_query($con, "delete from acara where kode='$kode'");
echo "<script type='text/javascript'>alert('Data Berhasil Dihapus');window.location.href='home.php';</script>";
?>