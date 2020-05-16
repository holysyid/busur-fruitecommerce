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
        <h3> Ubah Data Diri <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></h3>
<hr>
<table class="table table-bordered">
<?php 
$nama_pelanggan=$_SESSION['pelanggan']['nama_pelanggan']; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'"); ?>
    <?php while ($pecah=$ambil->fetch_assoc()){ ?>

<form action="" method="post">
	
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" class="form-control" readonly value="<?php echo $pecah['nama_pelanggan']; ?>" name="nama">
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<input type="text" class="form-control" readonly value="<?php echo $pecah['email_pelanggan']; ?>" name="email">
	</div>
	<div class="form-group">
		<label>telepon</label>
		<input type="number" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>" name="telepon">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control"  rows="10" name="alamat"><?php echo $pecah['alamat_pelanggan']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php  
if (isset($_POST['ubah'])) 
{
	$email=$_POST["email"];
	$telepon=$_POST["telepon"];
	$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE telepon_pelanggan='$telepon'");
	$akunyangada=$ambil->num_rows;
		if ($akunyangada==1){
			echo"<script>alert('Nomor Telepon sudah terdaftar');</script>";
		}
		else{
		$koneksi->query("UPDATE pelanggan SET telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]' WHERE email_pelanggan='$email'");
		}
	
	echo "<script>alert('data pelanggan telah diubah');</script>";
	echo "<script>location='data_diri.php';</script>";
}
?>
    <?php } ?>
</table> 

      </div>
    </section>
        
   
<?php include "footer.php";?>
</body>
</html>