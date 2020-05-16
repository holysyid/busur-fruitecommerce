<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="namaproduk">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="Number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" rows="10" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<label>Kategori Produk</label>
		<select name="kategori" >
  <option value="buah">Buah</option>
  <option value="sayur">Sayur</option>
</select>
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$nama=$_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,kategori_produk)
		VALUES('$_POST[namaproduk]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[kategori]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo"<meta http-equiv='refresh'content='1;url=index.php?halaman=produk'>";
}
?>