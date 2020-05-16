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
        <h3> Hai <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></h3>
        <h5>Berikut riwayat belanja kamu</h5>
<hr>
<table class="table table-bordered">
  <thead>
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Total</th>
    <th>Opsi</th>


  </tr></thead>
<?php
$nomor = 1;
$id_pelanggan = $_SESSION ['pelanggan']['id_pelanggan'];

$ambil =$koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
while ($pecah =$ambil->fetch_assoc()) {?>
  <tbody>
  <tr>
    <td><?php echo $nomor ?></td>
    <td><?php echo $pecah['tanggal_pembelian']; ?></td>
    <td>
      <?php echo $pecah['status_pembelian']; ?>
      <br>
      <?php if (!empty($pecah['resi_pengiriman'])) {; ?>
      Resi: <?php echo $pecah['resi_pengiriman']; ?>
      <?php }; ?>
    </td>
    <td>Rp.<?php echo number_format($pecah['total_pembelian']); ?></td>
    <td>
      <a class="btn btn-info" href="nota.php?id=<?php echo $pecah['id_pembelian']?>" >Nota</a>
      <a class="btn btn-success" href="pembayaran.php?id=<?php echo $pecah['id_pembelian'] ?>">Pembayaran</a>
      
    </td>

  </tr><?php 
  $nomor++;
} ?></tbody>
</table>

      </div>
    </section>
        
   
<?php include "footer.php";?>
</body>
</html>