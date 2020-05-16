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
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <style type="text/css">
      
    </style>
</head>
<body><div></div>
<?php include "navbar.php";?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background: url(img/cover1.jpg); background-size: 100%;">
      <div class="col-md-5 p-lg-5 mx-auto my-5" ">
       <img src="img/busur.png" width="400px;">
        <p class="lead font-weight-normal" style="color: white;">buah dan sayur atau Bu Sur adalah sebuah
website yang bergerak di bidang e-commerce, yang diciptakan oleh segelintir anak
bangsa yang melihat peluang bisnis dalam bidang pertanian yang memanfaatkan
suburnya tanah Indonesia.</p>
        <a class="btn btn-outline-secondary" href="shop.php">Shop Now</a>
      </div>
      <div class="product-device shadow-sm d-none d-md-block"></div>
      <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    
        <hr class="featurette-divider">
         <h2 align="center">Kenapa Harus Bu Sur?</h2>
<div class="p-5 p-md-5 m-md-5">
      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row" align="center">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/fresh.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Fresh From The Farm</h2>
            <p>Bu Sur menyediakan buah dan sayur dari pegunungan terbaik Sumatera Utara. Menjamin kemurnian dan kesegaran
produk melalui proses penyeleksian dan sterilisasi yang berstandar BPOM dan berlabel halal.</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/murah.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Affordable Price</h2>
            <p>Bu Sur menawarkan harga yang murah dan rasional namun tidak menurunkan kualitas sayur dan buah. Biaya produksi, packing dan sending yang lebih murah.</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/lifting.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Lifting Economic</h2>
            <p>Bekerjasama dengan petani buah dan sayur tradisional guna menimbulkan minat bertani, meningkatkan ekonomi petani, daerah, dan bangsa.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
</div>
        <hr class="featurette-divider">
         <h1 align="center">Shop Now</h1>
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3"><a href="buah.php">
      <div class="bg-light shadow-sm mx-auto" style="width: 50%; height: 500px; border-radius: 2px 2px 2px 2px; background: url(img/pir2.jpg); background-size: 117%">
        <div class="my-3 py-3" >
          <center><br><br><br><br><br><br><br><h1 class="display-5" style="color: white; size: 250%;">Buah</h1></center>
           
        </div></a>
      </div><a href="sayur.php">
      <div class="bg-dark shadow-sm mx-auto" style="width: 50%; height: 500px; border-radius: 2px 2px 2px 2px; background: url(img/brokoli1.jpg); background-size: 100%"">
        <div class="my-3 p-3">
          <center><br><br><br><br><br><br><br><h1 class="display-5" style="color: white; size: 250%">Sayur</h1></center>
        </div></a>
      </div>
    </div>
    
   
     <?php include "footer.php";?>
</body>
</html>