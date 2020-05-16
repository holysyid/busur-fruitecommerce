<?php
session_start();
//koneksi ke database
include 'koneksi.php';


if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
  echo "<script>alert('Anda belum Login')</script>";
  echo "<script>location ='login.php'</script>";
}


$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem['id_pelanggan'];
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];
if ($id_pelanggan_login!==$id_pelanggan_beli) {
  echo "<script>location ='riwayat.php'</script>";
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
    <section class="content">
      <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>
          Silahkan kirim bukti pembayaran anda disini
        </p>
        <div class="alert alert-info">Total tagihan anda <strong>Rp.<?php echo number_format($detpem['total_pembelian']) ?>,-</strong></div>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Penyetor</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label>Bank</label>
            <input type="text" name="bank" class="form-control">
          </div>
          <div class="form-group" >
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min='1'>

         </div>
         <div class="form-group">
           <label>Foto Bukti</label>
           <input type="file" class="form-control" name="bukti">
           <p class="text-danger">foto harus berformat JPG maksimal 2MB</p>
         </div>
         <button class="btn btn-primary" name='kirim'>Kirim</button>
        </form>
      </div>


    <?php
    if (isset($_POST['kirim'])) {
      $namabukti = $_FILES['bukti']['name'];
      $lokasibukti = $_FILES['bukti']['tmp_name'];
      $namafiks = date('YmHis').$namabukti;
      move_uploaded_file($lokasibukti, 'bukti_pembayaran/$namafiks');

  $nama =$_POST['nama'];
  $bank =$_POST['bank'];
  $jumlah=$_POST['jumlah'];
  $tanggal = date('Y-m-d');

  $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUE('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks') ")  ;

     $koneksi->query("UPDATE pembelian SET status_pembelian='Pembayaran sudah Dikirim' WHERE id_pembelian='$idpem'");

     echo "<script>alert('Terimaksih sudah mengirimkan bukti Pembayaran')</script>";

     echo "<script>location='riwayat.php';</script>";
    }
    ?>
    </section>
        
   
<?php include "footer.php";?>
</body>
</html>