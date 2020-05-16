<?php
session_start();
//koneksi ke database
include 'koneksi.php';


$id_produk = $_GET['id'];

$ambil =$koneksi->query("SELECT * FROM produk WHERE id_produk=$id_produk");
$detail = $ambil->fetch_assoc();
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
      <div class="row">
        <div  class="col-md-6">
          <img class="img-responsive"  src="foto_produk/<?php echo $detail['foto_produk'];?>" >
        </div>

        <div class="col-md-6 card shadow-lg p-3 mb-5 bg-white" style="padding: 30px; border-radius: 30px;">
          <h1 style="color: orange;"><?php echo $detail['nama_produk'];?></h1>
          <h4 style="color: grey;">Rp.<?php echo number_format($detail['harga_produk']);?>/Kg</h4><br>

          <h5>Stok : <?php echo $detail['stok_produk'];?> Kg</h5>

          <form method="post">
            <div class="form-group">
              <div class="input-group">
                <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
                <div class="input-group-btn">
                  <button class="btn btn-warning" name="beli" >Beli</button>
                </div>
              </div>
            </div>
          </form>
          <?php 
          if (isset($_POST['beli'])) {
            $jumlah = $_POST['jumlah'];

            $_SESSION['keranjang'][$id_produk] = $jumlah;

            echo "<script>alert('Produk Berhasil Masuk ke keranjang')</script>";
            echo "<script>location='keranjang.php'</script>";
          }
          ?>
          <p>
            <?php echo $detail['deskripsi_produk'];?>
          </p>
        </div>
      </div>
    </div>
</section>
   
<?php include "footer.php";?>
</body>
</html>