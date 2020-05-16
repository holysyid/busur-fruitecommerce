<?php
session_start();
//koneksi ke database
include 'koneksi.php';
 $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();


$idpelangganyangbeli = $detail['id_pelanggan'];
$idpelangganyanglogin = $_SESSION['pelanggan']['id_pelanggan'];
if ($idpelangganyangbeli!==$idpelangganyanglogin) {
	echo "<script>location='riwayat.php'</script>";
	exit();
}

if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Silahkan Login Terlebih dahulu');</script>";
	echo "<script>location='login.php';</script>";
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
<div class="center">

<section class="konten">
            <div class="container">
               <h1 align="center">Nota Pembelian</h1>
                <hr>



<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. Pembelian :<?php echo $detail['id_pembelian']; ?></strong><br>Tanggal  :<?php echo $detail['tanggal_pembelian']; ?><br>Total 	 :Rp.<?php echo number_format($detail['total_pembelian']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
		<p>
			<?php echo $detail['telepon_pelanggan']; ?><br>
			<?php echo $detail['email_pelanggan']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota']; ?></strong><br>Rp.<?php echo number_format($detail['tarif']); ?><br><?php echo $detail['alamat_pelanggan']; ?><br>


	</div>


</div><br>
<table class="table table-bordered">
	<thead><tr>
		<th>No</th>
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Berat (Gr.)</th>

		<th>Jumlah</th>
		<th>Subberat</th>

		<th>Subtotal</th>
	</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		$nomor=1;
		$ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian=' $_GET[id]' ");

		While($pecah=$ambil->fetch_assoc()){
		  ?>
	<td><?php echo $nomor;?></td>
	<td><?php echo $pecah['nama']; ?></td>
	<td>Rp.<?php echo number_format($pecah['harga']); ?></td>
	<td><?php echo $pecah['berat']; ?></td>

	<td><?php echo $pecah['jumlah']; ?></td>
	<td><?php echo $pecah['subberat']; ?></td>
	<td>
		Rp.<?php echo number_format($pecah['subharga']); ?>
	</td>
	
		</tr>

	<?php
	$nomor++;
	 } ?>
</tbody>
</table>
<div class="row">
		<div class="col-md-7">
			<div class="alert alert-info">
				<p>
					Silahkan Melakukan Pembayaran sebesar Rp.<?php echo number_format($detail['total_pembelian']);?>,- ke
					<br>
					<strong>
						BANK BNI SYARIAH 073-5957-215 A/N Sdr Rasyid Hafiz
					</strong>
				</p>
			</div>
		</div>
</div>
            </div>
        </section>
   
</div>
<?php include "footer.php";?>
</body>
</html>