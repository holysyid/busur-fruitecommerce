<?php
session_start();
//koneksi ke database
include 'koneksi.php';

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
               <h1 align="center">Checkout</h1>
                <hr>
                <form method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']?>" class='form-control '>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']?>"class='form-control'>
                          </div>
                      </div>
                      <div class="col-md-4">
                         <select class="form-control" name="id_ongkir" required="required">
                             <option required value="">Pilih ongkos Kirim</option>
                             <?php
                             $ambil = $koneksi->query("SELECT * FROM ongkir");
                             while($perongkir=$ambil->fetch_assoc()){
                               ?>
                             <option value="<?php echo $perongkir['id_ongkir'];?>"><?php echo $perongkir['nama_kota'];?> - 
                                 Rp.<?php echo number_format($perongkir['tarif']); ?>
                             </option>
                         <?php } ?>

                         </select>
                      </div>
                      
                  </div>
               <table class="table table-bordered"><thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                  
                </tr></thead>
                <tbody>
                    <?php $nomor=1;?>
                    <?php $totalbelanja =0; ?>
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
                  
                </tr>
                <?php $nomor++;?>
                <?php $totalbelanja+=$subharga; ?>
               <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp.<?php echo number_format($totalbelanja) ?></th>

                    </tr>
                </tfoot>
               </table>
             
<button class="btn btn-warning center" name="checkout">Checkout</button>
              </form>
<?php
if (isset($_POST['checkout'])) {
    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
    $id_ongkir = $_POST['id_ongkir'];
    $tanggal_pembelian =date("Y-m-d");

    $ambil =$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $arrayongkir = $ambil->fetch_assoc();
    $nama_kota =$arrayongkir['nama_kota'];
    $tarif = $arrayongkir['tarif'];
    $total_pembelian = $totalbelanja + $tarif;

    $koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif')");

    $id_pembelian_barusan = $koneksi->insert_id;

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

       $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
       $perproduk = $ambil->fetch_assoc();
        $nama=$perproduk['nama_produk'];
        $harga=$perproduk['harga_produk'];
        $berat=$perproduk['berat_produk'];
        $subberat = $perproduk['berat_produk']*$jumlah;
        $subharga = $perproduk['harga_produk']*$jumlah;
        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

        // skrip update stok
        $koneksi->query("UPDATE produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk'");
    }

        unset($_SESSION['keranjang']);

    echo "<script>alert('Pembelian Sukses');</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

}
 ?>
            </div>
        </section>
   
</div>
<?php include "footer.php";?>
</body>
</html>