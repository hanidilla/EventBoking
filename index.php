<!DOCTYPE html>
<html lang="en">
<head>
  <title>WELCOME |  Event Booking</title>
  <meta charset="utf-8">
  <meta name="author" content="pixelhint.com">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;

}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

  <section class="billboard">
    <header>
      <div class="wrapper">
        <a href="#"><img src="img/logo.png" class="h_logo" alt="" title=""></a>
        <nav>

        </nav>
      </div>
    </header>

    <section class="caption">
      <p class="cap_title">Selamat Datang Di EVENT BOOKING</p>
      <p class="cap_desc">Yuk Booking Tempat Buat Eventmu Sekarang , <a href="register.php">Check It</a></p>
    </section>
  </section>
  <section class="services wrapper">

  </section><!-- services End -->
<section class="client_testimonials">
   <div class="row">
  <?php
include "koneksi1.php";

$data = mysqli_query ($con,"select * from lokasi order by id asc");
while ($d = mysqli_fetch_array ($data)){
  ?>
  <div class="column">
    <div class="card">
      <!--  <input type="radio" name="id_lokasi" value="<?php echo $d['id'];
  ?>"> -->
  <!--  <input type="hidden" name="id_user" value=" <?php echo  $_SESSION["user"]["id"] ?>">
  <label for="male">pilih</label><br> -->
   <img src="image/tempat/<?php echo $d['foto'];
  ?>" width="128px" height="128px"/>
      <h3><?php echo $d['nama_lokasi'];
  ?></h3>
      <p><?php echo $d['tipe'];
  ?></p>
      <p>Rp. <?php echo $d['harga'];
  ?></p>
    </div>
  </div>
   <input type="hidden" name="harga_lokasi" value=" <?php echo $d['harga'];
  ?>">
<?php
}
?>
</div>
  </section><!-- call_to_action End -->

  <section class="client_testimonials">
   <div class="row">
  <?php
include "koneksi1.php";

$data = mysqli_query ($con,"select * from lokasi order by id asc");
while ($d = mysqli_fetch_array ($data)){
  ?>
  <div class="column">
    <div class="card">
      <!--  <input type="radio" name="id_lokasi" value="<?php echo $d['id'];
  ?>"> -->
   <!-- <input type="hidden" name="id_user" value=" <?php echo  $_SESSION["user"]["id"] ?>">
  <label for="male">pilih</label><br> -->
   <img src="image/tempat/<?php echo $d['foto'];
  ?>" width="128px" height="128px"/>
      <h3><?php echo $d['nama_lokasi'];
  ?></h3>
      <p><?php echo $d['tipe'];
  ?></p>
      <p>Rp. <?php echo $d['harga'];
  ?></p>
    </div>
  </div>
   <input type="hidden" name="harga_lokasi" value=" <?php echo $d['harga'];
  ?>">
<?php
}
?>
</div>
  </section><!-- testimonials End -->

 <!--  <section class="newsletter">
    <div class="wrapper">
      <p>subscribe to our newsletter.</p>
      <form method="" action="" class="sub_form">
        <input type="text" id="" class="email_field" placeholder="name">
        <input type="text" id="" class="name_field" placeholder="email">
        <input type="submit" id="" class="submit_nl" value="Subscribe">
      </form>
    </div>
  </section> --><!-- newsletter End -->

  <footer>

    <hr class="footer_sp"/>
    <p class="rights">© 2020 EventBooking.com - All Rights Reserved - Booking Tempat Untuk Eventmu <a href="http://eventbooking.com">EventBooking.com</a>.</p>
  </footer><!-- footer End -->

</body>
