<?php require_once("auth.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME | EVENT BOOKING</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<body >
<font face="tohama" color="cyan"><h1 align="center">DATA BOOKINGAN ANDA SELAMAT DATANG <?php echo  $_SESSION["user"]["name"] ?> <a href="logout.php">Logout</a></font></p></h1>
<a href="tambah.php"><p align="center"><img src="input.png" align="center"></a></p>
<!-- <a href="tambah.php">+ TAMBAH MAHASISWA</a> -->

<table class="tbl-qa" align="center">
<thead>
	<tr>
	<th class="table_header" wnimmhsth="20%" align="center">NO</th>
	<th class="table_header" wnimmhsth="20%" align="center">Nama Acara</th>
	<th class="table_header" wnimmhsth="20%" align="center">Tipe Acara</th>
	<th class="table_header" wnimmhsth="20%" align="center">Jasa Penata</th>
	<th class="table_header" wnimmhsth="20%" align="center">Tanggal Acara</th>
	<th class="table_header" wnimmhsth="20%" align="center">Kuota</th>
	<th class="table_header" wnimmhsth="20%" align="center">Jam Mulai</th>
	<th class="table_header" wnimmhsth="20%" align="center">Jam Berakhir</th>
	<th class="table_header" wnimmhsth="20%" align="center">Dp</th>
	<th class="table_header" wnimmhsth="20%" align="center">Total Bayar</th>
	<th class="table_header" wnimmhsth="20%" align="center">Status</th>
	<th class="table_header" wnimmhsth="20%" align="center">Bukti TF</th>
	<th class="table_header" wnimmhsth="20%" colspan="2" align="center">Aksi</th>
	</tr>
</thead>

<?php
include "koneksi1.php";
$no = 1;
$user=$_SESSION["user"]["id"];
$role=$_SESSION["user"]["role_id"];
if($role==0){
$data = mysqli_query ($con,"select acara.*,lokasi.* from acara join lokasi on acara.id_lokasi=lokasi.id where id_user=$user");
}else{
	$data = mysqli_query ($con,"select acara.*,lokasi.* from acara join lokasi on acara.id_lokasi=lokasi.id");
}
while ($d = mysqli_fetch_array ($data)){
	?>
	<tr class="table-row">
	<td class="table-row"><?php echo $no++; ?></td>
	<td class="table-row"><?php echo $d['nama_acara'];
	?></td>
	<td class="table-row"><?php echo $d['tipe'];
	?></td>
	<?php 
	$siap = $d['jasa_kita'];
	if($siap == 1) {
		$oke = 'Event Booking Service';
	}else{
		$oke = 'Eksternal Service';
	}
		?>
	<td class="table-row"><?php echo $oke ?>
	</td>

	<td class="table-row"><?php echo $d['tgl_acara'];
	?></td>
	<td class="table-row"><?php echo $d['kuota'];
	?></td>
	<td class="table-row"><?php echo $d['jam_mulai'];
	?></td>
	<td class="table-row"><?php echo $d['jam_akhir'];
	?></td>
	<?php $rp='Rp.';
		  $belakang=',00';
		  ?>
	<td class="table-row"><?php echo $rp.$d['bayar_dp'].$belakang;
	?></td>
	<td class="table-row"><?php echo $rp.$d['total_bayar'].$belakang;
	?></td>

	<?php 
	$hoke = $d['lunas'];
	if($hoke == 1) {
		$yas = 'Lunas / Sidah Verifikasi';
	}else{
		$yas = 'Belum Lunas / Belum Verifikasi';
	}
		?> 

	<td class="table-row"><?php echo $yas;
	?></td>
	<td class="table-row"><a target="_blank" href="file/<?php echo $d['bukti'];
	?>"><img height="32px" width="32px" src="file/<?php echo $d['bukti'];
	?>"></a></td>

	<?php 
	$pal = $_SESSION["user"]["role_id"];
	if($pal == 1) {
		$key = 'setuju.php';
	}else{
		$key = 'invoice.php';
	}
		?> 
	<td class="table-row">
	<a href="<?php echo $key;
	?>?kode=<?php echo $d['kode'];
	?>"><img src="oyi.png"></a></td>

	<td class="table-row">
	<a href="hapus.php?id=<?php echo $d['id']; ?>" 
	onClick="return confrim ('Apakah Anda yakin Ingin Menghapus Data?')"/><img src="delet.png">
	</a></td>
	</tr>

	<?php  
}
?>
<p align="center"><font size="3" face="Bodoni MT" color="black"></p></font>
</table>
</body>
</html>