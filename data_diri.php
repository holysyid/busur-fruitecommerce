<?php
session_start();
//koneksi ke database
include 'koneksi.php';


if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
  echo "<script>alert('Anda belum Login')</script>";
  echo "<script>location ='login.php'</script>";
}
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
    <section class="content">
      <div class="container">
        <h3> Data Diri <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></h3>
        <h5>Berikut riwayat belanja kamu</h5>
<hr>
<table class="table table-bordered">
<?php $nomor=1;
$nama_pelanggan=$_SESSION['pelanggan']['nama_pelanggan']; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'"); ?>
    <?php while ($pecah=$ambil->fetch_assoc()){ ?>
    <tr><td><?php echo $pecah['nama_pelanggan']; ?></td></tr>
    <tr><td><?php echo $pecah['email_pelanggan']; ?></td></tr>
    <tr><td><?php echo $pecah['telepon_pelanggan']; ?></td></tr>
    <tr><td><?php echo $pecah['alamat_pelanggan']; ?></td></tr>
    <tr><td><a href="ubah_pelanggan.php"> <button>Update</button></a></td></tr>
    <?php } ?>
</table> 

      </div>
    </section>
        
   
<?php include "footer.php";?>
</body>
</html>