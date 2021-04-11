<?php

require_once("koneksi.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if($user["password"]){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: tambah.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link href="css_main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form action="" method="POST">
	<h4 align="center"><span>Welcome To</h4>
  <h1><span>Event</span>Booking</h1>
  <input placeholder="Username" type="text" name="username" />
  <input placeholder="Password" type="password" name="password" />
  <button class="btn" type="submit" name="login">Log in</button>
  <h6></h6>
</form>

<footer>
  <h5>Belum Punya Akun ya?  <a  href="register.php">Daftar Dulu Dong</a></h5>
</footer>
</body>
</html>
