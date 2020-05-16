<?php
session_start();
//koneksi ke database
include 'koneksi.php';
if (isset($_SESSION["pelanggan"])) {
 header("Location: shop.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style type="text/css">
      
    </style>
</head>
<body><div></div>
<?php include "navbar.php";?>
<div class="center">
<form action =""  method="POST" >
  <table align="center">
    <tr>
      <td><img src ="img/busurico.png" width="450 px;"></td>
    </tr>
    <tr>
      <th><br><input type="text" name="email" placeholder="Email" class="form-control"></th>
    </tr>
    <tr>
      <th><br><input type="password" name="password" placeholder="Password" class="form-control"></th>
    </tr>
    <tr>
      <td align="center"><br>Belum punya akun ? Daftar <a href="daftar.php">disini</a><br><button class="btn btn-info" name="simpan">Login</button><a href=""></td>
    </tr>
    <tr>
      <td align="center"></a><button class="btn btn-danger">Lupa Password?</button></a></td>
    </tr>
<?php
if (isset($_POST["simpan"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

$ambil=$koneksi->query("SELECT * FROM pelanggan
  WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
$akunyangada = $ambil->num_rows;
    if ($akunyangada==1) {
      $akun = $ambil->fetch_assoc();
      $_SESSION["pelanggan"] = $akun;
      echo "<script>alert('Sukses Login');</script>";

        if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
         echo "<script>location='checkout.php'</script>";
        }
      else{
        echo "<script>location='shop.php'</script>";
      }
    }
    else{
      echo "<script>alert('anda gagal login,mohon periksa akun anda');</script>";
      echo "<script>location='login.php'</script>";
    }


}


?>

  </table>
</form>

</div>
<?php include "footer.php";?>
</body>
</html>