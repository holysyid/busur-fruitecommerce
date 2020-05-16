<h2>Detail Pembelian</h2>
<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

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
