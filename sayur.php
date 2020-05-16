<?php
session_start();
//koneksi ke database
include 'koneksi.php';
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
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background: url(img/brokoli1.jpg); background-size: 100%;">
      <div class="col-md-5 p-lg-5 mx-auto my-5" ">
       
        <h1 style="color: white;">SAYUR</h1>
        
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    
        <hr class="featurette-divider">
        <section class="konten">
            <div class="container">
               <h3 align="center">Our Fresh Vegs</h3>
               <div class="row">
<?php $ambil = $koneksi->query("SELECT * FROM produk WHERE kategori_produk='sayur'");
while ($perproduk= $ambil->fetch_assoc()) {
?>
                
                  <div class="col-md-3">
                    <div class="thumbnail">
                      <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>">
                      <div class="caption">
                        <h3><?php echo $perproduk['nama_produk'];?></h3>
                        <h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-warning">Beli</a><a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-light">Detail</a>
                      </div>
                    </div>
                  </div>
              
            <?php } ?>
            </div>
            </div>
        </section>
   
<?php include "footer.php";?>
</body>
</html>