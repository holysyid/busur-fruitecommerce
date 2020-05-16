<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fresh Vegs and Fruits</title>
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
      <td><img src ="img/busur.png" width="450 px;"><br></td>
    </tr>
    <tr>
      <th><input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required="required"></th>
    </tr>
    <tr>
      <th><input type="email" name="email" placeholder="E-mail" class="form-control" required="required"></th>
    </tr>
    <tr>
      <th><input type="password" name="password" placeholder="Password" class="form-control" required="required"></th>
    </tr>
    <tr>
      <th><input type="number" name="telepon" placeholder="Nomor Handphone" class="form-control" maxlength="12" required="required"></th>
    </tr>
    <tr>
      <th><textarea placeholder="Alamat Pengiriman" rows="10" name="alamat" class="form-control" required="required"></textarea> </th>
    </tr>
    <tr>
      <th><input type="text" name="pertanyaan" placeholder="Buat pertanyaan keamanan Anda" class="form-control" required="required"></th>
    </tr>
    <tr>
      <th><input type="text" name="jawaban" placeholder="Jawaban Pertanyaan" class="form-control" required="required"></th>
    </tr>
    
    <tr>
      <td align="center"><button class="btn btn-primary" name="save">Daftar</button></td>
    </tr>

  </table>
</form>
<?php
if (isset($_POST['save'])) {
  $email = $_POST["email"];

$ambil=$koneksi->query("SELECT * FROM pelanggan
  WHERE email_pelanggan='$email'");
$akunyangada = $ambil->num_rows;
    if ($akunyangada==1) {
//      $akun = $ambil->fetch_assoc();
echo "<script>alert('Email sudah terdaftar. Silahkan daftar ulang.');</script>";}

else {

  $koneksi->query("INSERT  INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan,pertanyaan,jawaban)
    VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]','$_POST[alamat]','$_POST[pertanyaan]','$_POST[jawaban]')");

 echo "<script>alert('Daftar Sukses');</script>";
echo"<meta http-equiv='refresh'content='1;url=index.php?halaman=pelanggan'>";

}



}
?>
</div>
<?php include "footer.php";?>
</body>
</html>