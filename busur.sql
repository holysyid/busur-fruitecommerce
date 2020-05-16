-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2019 pada 08.47
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'holysyid', 'admin', 'Rasyid Hafiz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Medan', 5000),
(2, 'Tembung', 8000),
(3, 'Percut', 12000),
(4, 'Lubuk Pakam', 15000),
(5, 'Binjai', 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `pertanyaan`, `jawaban`) VALUES
(2, 'arah@gmail.com', '1234', 'ammar rafi', '081375262065', 'Anak Lubuk Pakam jaoh coy', '', ''),
(3, 'holysyid@gmail.com', '10022001rh', 'Rasyid Hafiz', '082167815980', 'Jl tanjung pura pasar 1', '', ''),
(5, 'mortazaq@gmail.com', 'topek123', 'Maulana Taufik', '081387322722', 'Stabat kota dia\r\n', '', ''),
(13, 'alvin@yahoo.com', '123', 'Alvin', '123', 'medan', '', ''),
(14, 'jimmy@yahoo.com', '123', 'Jimmy', '081234567890', 'medan', 'hewan yang pernah dipelihara', 'ikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 19, 'ammar raffi', 'BRI', 56, '2019-01-02', '201901142635'),
(3, 21, 'Jimmy', 'Mandiri', 45000, '2019-01-04', '201901014732apel1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `status_pembelian`, `resi_pengiriman`) VALUES
(18, 3, 1, '2019-01-02', 36000, 'Medan', 5000, 'pending', '0'),
(19, 2, 1, '2019-01-02', 56000, 'Medan', 5000, 'barang dikirim', 'BFU1332'),
(20, 2, 1, '2019-01-03', 90000, 'Medan', 5000, 'pending', '0'),
(21, 2, 1, '2019-01-03', 45000, 'Medan', 5000, 'Pembayaran sudah Dikirim', ''),
(22, 6, 0, '2019-01-03', 2574000, '', 0, 'pending', ''),
(23, 2, 1, '2019-01-04', 25000, 'Medan', 5000, 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(26, 18, 3, 1, 'Pir', 18000, 1000, 1000, 18000),
(27, 18, 19, 1, 'Tomat', 13000, 1000, 1000, 13000),
(28, 19, 15, 1, 'Jeruk', 16000, 1000, 1000, 16000),
(29, 19, 13, 1, 'Kangkung', 10000, 1000, 1000, 10000),
(30, 19, 5, 1, 'Semangka', 25000, 1000, 1000, 25000),
(31, 20, 2, 2, 'Apel', 20000, 1000, 2000, 40000),
(32, 20, 12, 3, 'Kol', 15000, 1000, 3000, 45000),
(33, 21, 2, 2, 'Apel', 20000, 1000, 2000, 40000),
(34, 22, 7, 99, 'Durian', 26000, 1000, 99000, 2574000),
(35, 23, 2, 1, 'Apel', 20000, 1000, 1000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori_produk` varchar(20) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`, `berat_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(2, 'Apel', 'buah', 1000, 20000, 'apel.jpg', '															Buah bulat yang berwarna merah ini memiliki kandungan seperti : vitamin A, B, C. Buah ini memiliki serat yang tinggi yang berguna untuk mencegah lapar yang dating lebih cepat dating, sehingga baik untuk kamu yang sedang dalam program diet lohhh.										', 147),
(3, 'Pir', 'buah', 1000, 18000, 'pir.jpg', 'Buah yang berasal dari daerah yang beriklim sedang ini terkandung berbagai nutrisi yang mendukung kesehatan tubuh, seperti serat, antioksidan, mineral dan vitamin. Oleh karena itu, konsumsi buah pir yang teratur akan membantu kamu mencegah terjadinya kanker usus besar.', 100),
(4, 'Melon', 'buah', 1000, 35000, 'melon.jpg', 'Selain memiliki rasa yg segar, buah melon juga mengandung segudang nutrisi penting yg dibutuhkan tubuh. Pada satu buah melon, terkandung 60 kalori dan 14 gram kandungan gula alami. Selain itu, manfaat buah melon juga dapat memberikan energi, serta kadar lemak yang renda.', 100),
(5, 'Semangka', 'buah', 1000, 25000, 'semangka.jpg', 'Buah dengan kategori berbiji banyak ini juga memiliki kandungan vitamin yang berlimpah. Beberapa manfaat buah semangka bagi kesehatan manusia diantaranya adalah mengendalikan tekanan darah, mencegah dehidrasi, mengatasi peradangan dan mengurangi nyeri pada otot.', 100),
(6, 'Pepaya', 'buah', 1000, 22000, 'pepaya3.jpg', 'Buah ini tidak hanya lezat tetapi memiliki banyak manfaat bagi kesehatan. Papaya bermanfaat mencetrahkan kulit, membuat tekstur kulit lebih lembut juga membantu rambut sehat dan kuat.', 100),
(7, 'Durian', 'buah', 1000, 26000, 'Durian.jpg', 'Buah durian diam-diam mengandung antioksidan yang cukup tinggi. Jika kita mengonsumsinya dalam jumlah yang cukup, maka manfaat yang ada pada buah durian akan dirasakan optimal oleh tubuh. ', 1),
(8, 'Rambutan', 'buah', 1000, 12000, 'RAMBUTAN.jpg', 'Ada banyak vitamin C dalam rambutan, termasuk kalium, zat besi, vitamin A, dan sedikit kalsium, magnesium, natrium seng, niasin, serat dan protein. Buah yang mengandung banyak air ini bisa sebagai anti kanker dan melindungi dari efek radikal bebas.\r\n\r\n', 100),
(12, 'Kol', 'sayur', 1000, 15000, 'kol1.jpeg', 'Kol mengandung vitamin C, vitamin K, vitamin B6, folat, karbohidrat, protein, mangan, serat, kalsium, kalium, magnesium, dan vitamin B1 (thiamin). Sayuran ini juga rendah kalori dan nyaris tidak mengandung lemak.', 97),
(13, 'Kangkung', 'sayur', 1000, 10000, 'kangkung.jpg', 'kangkung juga kaya akan berbagai mineral penting seperti kalium, kalsium, magnesium, zat besi, serta zat fosfor. Meskipun kaya akan berbagai nutrisi penting, kangkung adalah sayuranyang rendah kalori.', 100),
(14, 'Bayam', 'sayur', 1000, 12000, 'bayam.jpg', 'Vitamin yang banyak terdapat pada bayam yaitu vitamin A, vitamin C, vitamin B kompleks, vitamin K, dan vitamin E. Selain itu, sayuran hijau yang satu ini mengandung sedikit kalori dan lemak. Sayur ini dapat mengurangi radang dan meningkatkan kekebalan tubuh.', 100),
(15, 'Jeruk', 'buah', 1000, 16000, '490391_620.jpg', 'Jeruk adalah buah yang mengandung vitamin C, karbohidrat, antioksidan, dan lain-lain. Buah ini beguna untuk meningkatkan kekebalan tubuh yang dapat mencegah flu dan melindungi kulit dari radikal bebas yang dapat menyebabkan kerusakan kulit.', 100),
(16, 'Wortel', 'sayur', 1000, 17000, 'wortel.jpg', 'Wortel mengandung serat makanan yang bisa memperbaiki kondisi saluran pencernaan yang terganggu seperti diare atau konstipasi.  Sayuran ini mudah untuk dikonsumsi bayi dan orang dewasa, baik itu dimakan mentah ataupun diolah dan dikombinasikan dengan makanan lain.', 100),
(17, 'Sawi', 'sayur', 1000, 12000, 'sawi.jpg', 'Sawi kaya akan vitamin A, B, C, E, dan K. Sawi juga mengandung karbohidrat, protein, dan lemak baik yang berguna untuk kesehatan tubuh. Serat pangannya yang cukup tinggi diyakini dapat membantu proses pencernaan pada perut secara baik. Sawi juga bermanfaat untuk mencegah terjadinya penyakit gondok. ', 100),
(18, 'Selada', 'sayur', 1000, 19000, 'selada.jpg', 'Selada merupakan sumber yang memasok vitamin C dan K, kalsium, serat, folat, dan zat besi. Kaya garam mineral dengan unsur-unsur alkali sangat mendominasi. Hal ini yang membantu menjaga darah tetap bersih, pikiran dan tubuh dalam keadaan sehat dan menjaga kesehatan jantung.', 100),
(19, 'Tomat', 'sayur', 1000, 13000, 'tomat1.JPG', 'Meskipun secara teknisnya berbentuk buah, tomat pada umumnya digolongkan sebagai sayur-sayuran. Tomat mengandung kolin, potassium, serat dan vitamin C yang membantu meningkatkan fungsi jantung. Antioksidan yang terkandung oleh Tomat sering dikaitkan dengan penurunan risiko penyakit jantung dan kanker.', 100),
(20, 'Brokoli', 'sayur', 1000, 16000, 'brokoli.jpg', 'Sayuran hijau ini merupakan sayuran tanpa lemak yang rendah sodium, kalori dan tinggi akan serat, vitamin C, potasium, B6 dan Vitamin A. Brokoli merupakan sayuran pembangkit tenaga, manfaat untuk pencernaan, sistem kardiovaskular, sistem kekebalan tubuh, anti inflamasi dan pencegahan kanker.', 100);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
