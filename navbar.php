
<nav class="nav navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded justify-content-end">
  <a class="navbar-brand" href="index.php"> <img src="img/busur.png" style="width: 150px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="shop.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="buah.php">Buah</a>
          <a class="dropdown-item" href="sayur.php">Sayur</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="location.php">Stockist <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link col" href="http://dirmahasiswa.usu.ac.id/">About Us</a>
      </li>

<?php if (isset($_SESSION["pelanggan"])) :?>
		<li class="nav-item  navbar-right">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>	
      <li class="nav-item  navbar-right">
        <a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
      </li> 
<?php else: ?>
      <li class="nav-item  navbar-right">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item  navbar-right">
        <a class="nav-link" href="daftar.php">Register</a>
      </li>
<?php endif?>
<li class="nav-item  navbar-right">
        <a class="nav-link" href="keranjang.php">Keranjang</a>
      </li>
      <?php if (isset($_SESSION["pelanggan"])) :?>
      <a href="data_diri.php"><li class="nav-item  navbar-right nav-link"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></li></a>
      <?php endif?>

    </ul>
  </div>
</nav> 