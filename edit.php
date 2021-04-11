<!DOCTYPE html>
<html>
<head>
	<title>EDIT DATA SISWA</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link href="css_siswa.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2 align="center">EDIT DATA SISWA <DATA1></DATA1></h2>
<br/>
<br/>

<?php 
include 'koneksi1.php';
$id = $_GET['id'];
$data = mysqli_query ($con, "select * from 1_siswa where id='$id'");
while ($d = mysqli_fetch_array($data)){
	?>

	<form method="post" action="edit_aksi.php">
	<table >
	<tr>
	<td>Nama</td>
	<td>
	<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
<input type="text" name="nama" value="<?php echo $d['nama']; ?>">
</td>
</tr>
<tr>
	<td>NIS</td>
	<td><input type="number" name="nis" value="<?php echo $d['nis']; ?>">
</td>
</tr>
<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
</td>
</tr>
<tr>
	<td>Jurusan</td>
	<td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>">
</td>
</tr>
<tr>
<td>AKSI</td>
<td><input type="submit" value="SIMPAN"></td>
</tr>
<tr>
<td>ATAU</td>
<td><a href="index.php"><input type="button" value="KEMBALI KE HALAMAN UTAMA" align="center"></a></td>
</tr>
</table>
	</form>
	<?php 
}
?>
</body>
</html>