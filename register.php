
<?php

require_once("koneksi.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password)
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) echo "<script type='text/javascript'>alert('Berhasil Registrasi Silahkan Login Ya');window.location.href='login.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

<link href="css_main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="" method="POST">
	<h4 align="center"><span>Register</h4>
  <h1><span>Event</span>Booking</h1>
  <input placeholder="Nama Lengkap" type="text" name="name" />
  <input placeholder="Username" type="text" name="username" />
  <input placeholder="Email" type="email" name="email" />
  <input placeholder="Password" type="password" name="password" />
  <button class="btn" name="register" type="submit">Register</button>
  <h6></h6>
</form>

<footer>
  <h5>Sudah Punya Akun ?  <a  href="login.php">Login !</a></h5>
</footer>
</body>
</html>
