<h2>Tambah Pelanggan</h2>
<form action="" method="post">
	
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" rows="10" name="alamat"></textarea>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
	$koneksi->query("INSERT  INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
		VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]','$_POST[alamat]')");

	echo "
<div class='alert alert-info'>Data Tersimpan</div>";
echo"<meta http-equiv='refresh'content='1;url=index.php?halaman=pelanggan'>";
}
?>