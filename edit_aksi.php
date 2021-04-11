<?php 
//koneksi database
include 'koneksi1.php';
//menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
//update data ke database
mysqli_query($con,"update 1_siswa set nama='$nama', nis='$nis',alamat='$alamat',
	jurusan='$jurusan'where id='$id'");
echo "<script type='text/javascript'>alert('Data Berhasil Diedit');window.location.href='index.php';</script>";
?>