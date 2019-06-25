-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 15 Mei 2019 pada 00.43
-- Versi Server: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franzshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `tgl_add` date NOT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `email`, `no_hp`, `password`, `level`, `tgl_add`, `foto`) VALUES
(1, 'Riza Alif', 'rizaalif', 'rizaalifwildani96@gmail.com', 'rizaalif', '$2y$10$EEwBFbdIJpRp6gFOaNi9s.UlRbRh2qbncnxPjORCS.21r0EwFpSE6', 1, '2018-11-29', 'http://localhost/franzshop/asset/foto-admin/20181120-223313Riza_Alif_Wildani085920616342.jpg'),
(2, 'TEST', 'test', 'test@gmail.com', '9787', '$2y$10$5fqiTidfCFz1h.5yIlnLPecukDtVvpnoKlCFma.KHZ7mF6D6K3kKe', 2, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `title` text,
  `img` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `title`, `img`, `status`) VALUES
(1, '<h6>Promo terbaik 2018</h6>\n						<h1>Beli Min 3 Item dan dapatkan DISKON 30% *</h1>', 'http://localhost/franzshop/asset/images/promo_25_nov_2018.jpg', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL,
  `laba` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `id_ukuran`, `id_warna`, `jumlah_beli`, `subtotal`, `laba`) VALUES
(6, 7, 1, 1, 2, 7, 10703000, NULL),
(9, 9, 13, 1, 1, 2, 4096000, NULL),
(11, 11, 1, 1, 2, 1, 1529000, 129000),
(12, 12, 8, 2, 1, 2, 6798000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` text,
  `pesan` text,
  `tgl` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`id`, `nama`, `email`, `pesan`, `tgl`, `status`) VALUES
(1, 'Riza Alif Wildani', 'rizaalifwildani96@gmail.com', 'Test Inbox', '2018-11-29 01:37:02', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Pria'),
(2, 'Wanita'),
(3, 'Aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `id_produk`, `id_ukuran`, `id_warna`, `qty`, `subtotal`) VALUES
(1, 7, 12, 2, 3, 1, 3980000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_pelanggan` text,
  `kodepos` varchar(5) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` text,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `email`, `tgl_lahir`, `alamat_pelanggan`, `kodepos`, `no_hp`, `password`, `foto`, `tgl_daftar`) VALUES
(7, 'Riza Alif', 'rizaalifwildani96@gmail.com', '1996-12-19', 'JL. Harapan Mulya 11 - Kemayoran - Jakarta Pusat', '10640', '085920616342', '$2y$10$9jS33MtLBInim5LJw80S2OYkEeblVZKjAlxexaA733CH4qJ4JXK8y', 'http://localhost/franzshop/asset/foto-member/20181120-223313Riza_Alif_Wildani085920616342.jpg', '2018-11-19'),
(8, 'Faqih', 'rizaalifdmc@gmail.com', '1996-12-18', 'Jl. Example', '10680', '082322153795', '$2y$10$u9qPcxoei895wgpya7VlUuxULcMqeKp1GIwGBi63DDTK.aLUxx7ry', NULL, '2018-11-21'),
(9, 'fajar', 'fajarakm2006@gmail.com', '1996-12-19', 'bsi22iyg8', '10640', '082261385886', '$2y$10$DvBvRyqBlU2b6G83rMr8W.9zUVpB527ZjtmO.F85JpgmGdVfB9a06', NULL, '2018-12-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `no_pesanan` varchar(50) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tgl_pesanan` datetime DEFAULT NULL,
  `alamat_penerima` text,
  `kd_voucher` varchar(10) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_pembayaran` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `no_pesanan`, `id_pelanggan`, `tgl_pesanan`, `alamat_penerima`, `kd_voucher`, `total`, `metode_pembayaran`, `status`, `bukti_pembayaran`) VALUES
(7, '181128700004', 7, '2018-11-28 23:21:31', 'JL. Harapan Mulya 11 - Kemayoran - Jakarta Pusat', 'THISWEEK', 10703000, 'Transfer', 'Sudah Diterima', 'http://localhost/franzshop/asset/bukti-pembayaran/181128700004.jpeg'),
(9, '181201700005', 7, '2018-12-01 16:49:31', 'JL. Harapan Mulya 11 - Kemayoran - Jakarta Pusat', '', 4096000, 'Transfer', 'Menunggu Konfirmasi', 'http://localhost/franzshop/asset/bukti-pembayaran/181201700005.jpeg'),
(11, '181201900007', 9, '2018-12-01 20:03:50', 'bsi22iyg8', '', 1529000, 'Transfer', 'Sudah Diterima', 'http://localhost/franzshop/asset/bukti-pembayaran/181201900007.jpeg'),
(12, '181202700008', 7, '2018-12-02 05:51:13', 'JL. Harapan Mulya 11 - Kemayoran - Jakarta Pusat', '', 6798000, 'Bayar Di Tempat', 'Menunggu Pembayaran', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_pelanggan`
--

CREATE TABLE `pesan_pelanggan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `pesan` text,
  `tgl` datetime DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_pelanggan`
--

INSERT INTO `pesan_pelanggan` (`id`, `id_pelanggan`, `pesan`, `tgl`, `status`) VALUES
(1, 7, 'Hore . . . Pesananmu sedang di kirim, Harap ditunggu yah :) ', '2018-11-30 00:00:00', 'Sudah Diba'),
(2, 9, 'Hore . . . Pesananmu sedang di kirim, Harap ditunggu yah :) ', '2018-12-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_subkategori` int(11) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `nm_produk` varchar(50) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `diskon` varchar(10) DEFAULT NULL,
  `modal` bigint(20) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `harga_promo` bigint(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `img` text,
  `rating` varchar(6) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_subkategori`, `brand`, `nm_produk`, `deskripsi`, `diskon`, `modal`, `harga`, `harga_promo`, `stok`, `img`, `rating`, `slug`) VALUES
(1, 1, 'Superdry', 'Side Printed Joggers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est minus libero dolorem ad totam neque cupiditate id, ipsum, distinctio eligendi debitis modi ipsam veniam nobis officia officiis vero. Esse voluptas, voluptatum modi repellendus consequatur dolores quia aliquid ex nihil ipsum saepe doloremque! A, molestias, aliquid. Repellat et assumenda nam culpa aperiam similique animi voluptatibus blanditiis laudantium impedit harum reprehenderit earum nemo molestias inventore libero eligendi repudiandae totam eaque, laboriosam. A error quos adipisci ullam reiciendis harum dolorum eos tenetur esse suscipit commodi distinctio ad atque temporibus, aperiam excepturi aliquam ipsa quibusdam expedita nihil cumque facere officia, nam nulla quo. Accusantium!', NULL, 1400000, 1529000, NULL, 3, 'http://localhost/franzshop/asset/images/Pria/Celana/021-side-printed-joggers.png', '5', 'Side-Printed-Joggers.html'),
(2, 1, 'Armani Exchange', 'Ax All Over Pants', '', '10%', 1800000, 2369000, 2132100, 5, 'http://localhost/franzshop/asset/images/Pria/Celana/Ax-All-Over-Pants.png', '4', 'Ax-All-Over-Pants.html'),
(3, 1, 'Cardinal', 'Slim Fit Jeans', '', '20%', 250000, 469000, 375200, 2, 'http://localhost/franzshop/asset/images/Pria/Celana/Slim-Fit-Jeans.png', '5', 'Slim-Fit-Jeans.html'),
(4, 4, 'Diesel', 'Embelished Rip And Repair Jeans', '', NULL, 4800000, 5094000, NULL, 2, 'http://localhost/franzshop/asset/images/Wanita/Celana/Embelished-Rip-And-Repair-Jeans.png', '3', 'Embelished-Rip-And-Repair-Jeans.html'),
(5, 4, 'Armani Exchange', 'Ripped Knee Jeans', '', NULL, 2400000, 2679000, NULL, 2, 'http://localhost/franzshop/asset/images/Wanita/Celana/Ripped-Knee-Jeans.png', '4', 'Ripped-Knee-Jeans.html'),
(6, 4, 'Diesel', 'Slandy 0687S Skinny Jeans', '', NULL, 4800000, 5094000, NULL, 3, 'http://localhost/franzshop/asset/images/Wanita/Celana/Slandy-0687S-Skinny-Jeans.png', '3', 'Slandy-0687S-Skinny-Jeans.html'),
(7, 5, 'Diesel', 'De Desy ONATE Dress', '', NULL, 4100000, 4373000, NULL, 2, 'http://localhost/franzshop/asset/images/Wanita/Dress/De-Desy-ONATE-Dress.png', '5', 'De-Desy-ONATE-Dress.html'),
(8, 5, 'Armani Exchange', 'Textured Short Sleeve Mini Dress', '', NULL, 3100000, 3399000, NULL, 1, 'http://localhost/franzshop/asset/images/Wanita/Dress/Textured-Short-Sleeve-Mini-Dress.png', '3', 'Textured-Short-Sleeve-Mini-Dress.html'),
(9, 9, 'Tissot', 'Jam Tangan Wanita Tissot BALLADE', '', '5%', 13500000, 15050000, 14297500, 2, 'http://localhost/franzshop/asset/images/Accessories/Jam-Tangan-Wanita-Tissot-BALLADE.png', '5', 'Jam-Tangan-Wanita-Tissot-BALLADE.html'),
(10, 13, 'Ray-Ban', 'RB3543 Polarized Sunglasses', '', NULL, 2550000, 2790000, NULL, 2, 'http://localhost/franzshop/asset/images/Accessories/RB3543-Polarized-Sunglasses.png', '4', 'RB3543-Polarized-Sunglasses.html'),
(11, 12, 'Bonia', 'Maroon Monogram Tote', '', NULL, 5350000, 5500000, NULL, 3, 'http://localhost/franzshop/asset/images/Accessories/Maroon-Monogram-Tote.png', '4', 'Maroon-Monogram-Tote.html'),
(12, 12, 'Gobelini', 'Quartome Tote', '', NULL, 3600000, 3980000, NULL, 3, 'http://localhost/franzshop/asset/images/Accessories/Quartome-Tote.png', '5', 'Quartome-Tote.html'),
(13, 2, 'Diesel', 'T-Miles OJARS T-shirt Black', '', NULL, 1800000, 2048000, NULL, 4, 'http://localhost/franzshop/asset/images/Pria/Baju/T-Miles-OJARS-T-shirt-Black.png', '5', 'T-Miles-OJARS-T-shirt-Black.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promothisweek`
--

CREATE TABLE `promothisweek` (
  `id_promothisweek` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `date_promo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promothisweek`
--

INSERT INTO `promothisweek` (`id_promothisweek`, `id_produk`, `date_promo`) VALUES
(1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nm_subkategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `id_kategori`, `nm_subkategori`) VALUES
(1, 1, 'Celana'),
(2, 1, 'Baju'),
(3, 1, 'Sepatu'),
(4, 2, 'Celana'),
(5, 2, 'Dress'),
(6, 2, 'Sepatu'),
(7, 2, 'Hijab'),
(8, 2, 'Beauty'),
(9, 3, 'Jam'),
(10, 3, 'Topi'),
(11, 3, 'Kalung'),
(12, 3, 'Tas'),
(13, 3, 'Kacamata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `nm_ukuran` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `nm_ukuran`) VALUES
(1, 'XL'),
(2, 'L'),
(3, 'M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text,
  `make_rating` varchar(6) NOT NULL,
  `date_review` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_produk`, `nama`, `email`, `komentar`, `make_rating`, `date_review`) VALUES
(1, 1, 'Riza Alif', 'testing@gmail.com', 'Produk 100% Ori, Packing rapi, Cepat sampai, Mantap pokoknya . . . .', '5', '2018-11-25'),
(5, 1, 'Test', 'testing@testing.com', 'Testing Comment', '2', '2018-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `kd_voucher` varchar(10) DEFAULT NULL,
  `potongan_harga` bigint(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `kd_voucher`, `potongan_harga`, `tgl_mulai`, `tgl_berakhir`) VALUES
(1, 'THISWEEK', 50000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `nm_warna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id_warna`, `nm_warna`) VALUES
(1, 'Hitam'),
(2, 'Merah'),
(3, 'Biru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pesan_pelanggan`
--
ALTER TABLE `pesan_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promothisweek`
--
ALTER TABLE `promothisweek`
  ADD PRIMARY KEY (`id_promothisweek`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesan_pelanggan`
--
ALTER TABLE `pesan_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `promothisweek`
--
ALTER TABLE `promothisweek`
  MODIFY `id_promothisweek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
