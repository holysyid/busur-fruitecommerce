<?php
session_start();
//produk
$id_produk =$_GET['id'];

if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//masok ke keranjang
echo "<script>alert('Produk telah ditambahkan ke keranjang')</script>";
echo "<script>location='keranjang.php';</script>";
?>