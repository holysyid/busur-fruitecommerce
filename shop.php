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
      
    </style>
</head>
<body><div></div>
<?php include "navbar.php";?>
    
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