<?php
session_start();
//koneksi ke database
$koneksi= new mysqli("localhost","root","","busur"); 
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
<!--<nav class="nav navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded justify-content-end">
  <a class="navbar-brand" href="index.html"> <img src="img/busur.png" style="width: 150px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="buah.php">Buah</a>
          <a class="dropdown-item" href="sayur.php">Sayur</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stockist.php">Stocklist <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link col" href="about.php">About Us</a>
      </li>
      <li class="nav-item  navbar-right">
        <a class="nav-link" href="login.html">Login</a>
      </li>
      <li class="nav-item  navbar-right">
        <a class="nav-link" href="daftar.html">Register</a>
      </li>
    </ul>
  </div>
</nav>-->
<style type="text/css">
	.container{
		width: 600px;
		margin: auto;
	}
</style>
<body>
 <hr class="featurette-divider">
         <h1 align="center">Our Official Distributor</h1>
<div class="container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.108478535767!2d98.6596266!3d3.5624909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313020778f7f61%3A0xf6f49ab3d64d60ff!2sFakultas+Ilmu+Komputer+dan+Teknologi+Informasi+-+USU!5e0!3m2!1sid!2sid!4v1546359905333" width="600" height="450" frameborder="0" style="border:0 " allowfullscreen></iframe></div>
</body>

<?php include "footer.php";?>
 <!--<footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <img src="img/busurico.png" width="50px;">
          <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
        </div>
        <div class="col-6 col-md">
          <h5>Payment Method</h5>
          
        </div>
        <div class="col-6 col-md">
          <h5>Need Assistance?</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">FaQ</a></li>
            <li><a class="text-muted" href="#">Shipping</a></li>
            <li><a class="text-muted" href="#">Returns</a></li>
            <li><a class="text-muted" href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>The Company</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">About Us</a></li>
            <li><a class="text-muted" href="#">Stockists</a></li>
            <li><a class="text-muted" href="#">Careers</a></li>
            <li><a class="text-muted" href="#">Terms</a></li>
            <li><a class="text-muted" href="#">Privacy Policy</a></li>
            <li><a class="text-muted" href="#">Cookie Consent</a></li>

