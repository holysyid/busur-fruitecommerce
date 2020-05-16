<?php
session_start();

include 'koneksi.php';
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";

if (empty($_SESSION['keranjang']) OR !isset($_SESSION["keranjang"])) {
  echo"<script>alert('Anda tidak memiliki isi keranjang, silahkan berbelanja produk terbaik kami')</script>";
 echo"<script>location='shop.php'</script>";
   
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
  img{
    width: 150px;
  }
</style>
</head>
<body><div></div>
<?php include "navbar.php";?>
    
        <section class="konten">
            <div class="container">
               <h1 align="center">Keranjang Belanja</h1>
               	<hr>
               <table class="table table-bordered"><thead>
               	<tr>
               		<th>No</th>
               		<th>Produk</th>
               		<th>Harga</th>
               		<th>Jumlah</th>
               		<th>Subharga</th>
                  <th>Aksi</th>

               	</tr></thead>
               	<tbody>
               		<?php $nomor=1;?>
               		<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
               			<?php 
               			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
               			$pecah = $ambil->fetch_assoc();
               			$subharga = $pecah["harga_produk"]*$jumlah;
               			?>
               	<tr>
               		<td><?php echo $nomor ?></td>
               		<td><?php echo $pecah["nama_produk"]; ?></td>
               		<td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
               		<td><?php echo $jumlah; ?></td>
               		<td>Rp.<?php echo number_format($subharga);?></td>
                  <td><a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-danger btn-xs">Hapus</a></td>
               	</tr>
               	<?php $nomor++;?>
               <?php endforeach ?>
               	</tbody>
               </table>
               <a href="shop.php" class="btn btn-info">Lanjutkan Belanja</a>
               <a href="checkout.php" class="btn btn-danger">Checkout</a>
            </div>
        </section>
   
<?php include "footer.php";?>
</body>
</html>