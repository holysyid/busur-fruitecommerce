<h2>Ubah Pelanggan</h2>
<?php
$ambil =$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


?><form action="" method="post">
	
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>" name="email">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" value="<?php echo $pecah['password_pelanggan']; ?>" name="password">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>" name="nama">
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
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',telepon_pelanggan='$_POST[telepon]',alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]'");
	
	echo "<script>alert('data pelanggan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>