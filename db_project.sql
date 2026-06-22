-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 09:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_detail`, `id_order`, `id_produk`, `qty`, `harga`, `subtotal`) VALUES
(5, 3, 13, 1, '899000.00', '899000.00'),
(6, 3, 17, 2, '460000.00', '920000.00'),
(7, 4, 17, 1, '460000.00', '460000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_produk`
--

CREATE TABLE `tbl_kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_produk`
--

INSERT INTO `tbl_kategori_produk` (`id_kategori`, `kode_kategori`, `nama_kategori`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KTG001', 'Laptop', 'Berbagai Jenis Laptop Modern', 'Aktif', '2026-06-17 22:13:25', '2026-06-18 11:35:56'),
(2, 'KTG002', 'Smartphone', 'Kategori Smartphone', 'Aktif', '2026-06-17 22:13:25', '2026-06-17 22:13:25'),
(3, 'KTG003', 'Televisi', 'Kategori TV', 'Aktif', '2026-06-17 22:13:25', '2026-06-17 22:13:25'),
(4, 'KTG004', 'Kamera', 'Kategori Kamera Digital', 'Aktif', '2026-06-17 22:13:25', '2026-06-17 22:13:25'),
(5, 'KTG005', 'Audio', 'Speaker dan Headset', 'Aktif', '2026-06-17 22:13:25', '2026-06-17 22:13:25'),
(6, 'KTG006', 'Aksesoris', 'Mouse, Keyboard, dll', 'Aktif', '2026-06-17 22:13:25', '2026-06-17 22:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(30) DEFAULT NULL,
  `tanggal_order` date DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `total_order` decimal(15,2) DEFAULT NULL,
  `status` enum('pending','dikirim','selesai','dibatalkan') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kode_order`, `tanggal_order`, `id_pelanggan`, `id_sales`, `total_order`, `status`) VALUES
(3, 'ODR-8ED098', '2026-06-21', 2, 1, '1819000.00', 'dikirim'),
(4, 'ODR-6F487A', '2026-06-22', 33, 1, '460000.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jenis_pelanggan` enum('Reguler','Member','VIP') DEFAULT 'Reguler',
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_telp`, `email`, `jenis_pelanggan`, `alamat`) VALUES
(2, 'PG001', 'Kirana Malika Syafir', 'P', '081212806842', 'kiranamalika12@gmail', 'Reguler', 'Perumahan Royal Rajeg'),
(3, 'PG002', 'Mahesa Ibrahim', 'L', '089627912778', 'mhsaibrahim16@gmail.com', 'Member', 'Sumur Pacing'),
(19, 'PG003', 'Andi Wijaya', 'L', '081234567803', 'andi.wijaya@gmail.com', 'Reguler', 'Bekasi'),
(20, 'PG004', 'Rina Marlina', 'P', '081234567804', 'rina.marlina@gmail.com', 'Member', 'Depok'),
(21, 'PG005', 'Dedi Kurniawan', 'L', '081234567805', 'dedi.kurniawan@gmail.com', 'VIP', 'Bogor'),
(22, 'PG006', 'Nabila Putri', 'P', '081234567806', 'nabila.putri@gmail.com', 'Reguler', 'Jakarta Barat'),
(23, 'PG007', 'Ahmad Fauzi', 'L', '081234567807', 'ahmad.fauzi@gmail.com', 'Member', 'Tangerang Selatan'),
(24, 'PG008', 'Maya Sari', 'P', '081234567808', 'maya.sari@gmail.com', 'VIP', 'Jakarta Timur'),
(25, 'PG009', 'Rizky Pratama', 'L', '081234567809', 'rizky.pratama@gmail.com', 'Reguler', 'Bekasi'),
(26, 'PG010', 'Dewi Lestari', 'P', '081234567810', 'dewi.lestari@gmail.com', 'Member', 'Depok'),
(27, 'PG011', 'Fajar Nugroho', 'L', '081234567811', 'fajar.nugroho@gmail.com', 'Reguler', 'Bogor'),
(28, 'PG012', 'Intan Permata', 'P', '081234567812', 'intan.permata@gmail.com', 'VIP', 'Jakarta Utara'),
(29, 'PG013', 'Yoga Saputra', 'L', '081234567813', 'yoga.saputra@gmail.com', 'Member', 'Tangerang'),
(30, 'PG014', 'Citra Anggraini', 'P', '081234567814', 'citra.anggraini@gmail.com', 'Reguler', 'Bekasi'),
(31, 'PG015', 'Hendra Gunawan', 'L', '081234567815', 'hendra.gunawan@gmail.com', 'VIP', 'Jakarta Pusat'),
(32, 'PG016', 'Arumi Hasanah', 'P', '081315352350', 'titanianajwaa23@gmail.com', 'Member', 'Pondok Sukatani Permai'),
(33, 'PG017', 'Ammar Zain', 'L', '012345678910', 'ammarzain05@gmail.com', 'VIP', 'Royal Rajeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` varchar(20) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `total_bayar` decimal(15,2) NOT NULL,
  `status_pembayaran` enum('Belum Bayar','Menunggu Verifikasi','Lunas') DEFAULT 'Belum Bayar',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `kode_pembayaran`, `id_order`, `tanggal_pembayaran`, `metode_pembayaran`, `total_bayar`, `status_pembayaran`, `created_at`) VALUES
(1, 'BYR001', 4, '2026-06-23', 'Transfer Bank', '460000.00', 'Lunas', '2026-06-22 18:32:41'),
(2, 'BYR002', 3, '2026-07-14', 'Cash', '1819000.00', 'Lunas', '2026-06-22 18:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kode_produk` varchar(20) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `harga`, `stok`, `gambar`) VALUES
(10, 1, 'PK001', 'Axioo Hype 7', '8920000.00', 10, 'produk_1781844869.jpg'),
(11, 2, 'PK002', 'Samsung S16 Ultra', '15699000.00', 6, 'produk_1781844915.jpg'),
(12, 3, 'PK003', 'SmartTv Coocaa', '12349000.00', 7, 'produk_1781844958.jpg'),
(13, 4, 'PK004', 'Digital Camera', '899000.00', 15, 'produk_1781844995.jpg'),
(14, 5, 'PK005', 'AirPods Max 24', '1299000.00', 9, 'produk_1781845036.jpg'),
(15, 5, 'PK006', 'AirPods Bluetooth 4', '599500.00', 25, 'produk_1781845084.jpeg'),
(16, 6, 'PK007', 'Pinky Keyboard', '315000.00', 18, 'produk_1781845116.jpg'),
(17, 5, 'PK008', 'Speaker Bluetooth Karaoke', '460000.00', 5, 'produk_1781845159.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id_sales` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_sales` varchar(20) DEFAULT NULL,
  `nama_sales` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `penjualan` decimal(15,2) DEFAULT '0.00',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id_sales`, `id_user`, `kode_sales`, `nama_sales`, `no_telp`, `email`, `alamat`, `penjualan`, `status`) VALUES
(1, 3, 'S51051', 'Mahesa Ibrahim', '089627912778', 'Imahez1603@gmail.com', 'Sumur Pacing', '0.00', 'aktif'),
(2, 6, 'S28845', 'Yuniar Ayu Indriyanti', '081288072224', 'ayu@gmail.com', 'Pondok Sukatani Permai', '0.00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','sales','manager') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `foto_profil` varchar(255) DEFAULT 'default.png',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nama_user`, `username`, `password`, `role`, `email`, `no_telp`, `alamat`, `foto_profil`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Titania Najwa', 'Inong', '$2y$10$WKECsZJUYYXNyTaqYh.lRuPRe4s3y0HkJXeGgKr9raopF0gHOjFrK', 'admin', 'titanianajwaa053@gmail.com', '081315352350', 'Pondok Sukatani Permai', 'profile_1_1780252262.jpeg', 'aktif', '2026-06-22 21:32:32', '2026-05-31 15:51:34', '2026-06-23 02:32:32'),
(3, 'Mahesa Ibrahim', 'Mahes', '$2y$10$bAxfHEovgtV1mQpFvu/dPOCx1UgvmDzg.uItfjBzOZnb/fJYmjHWy', 'sales', 'Imahez1603@gmail.com', '089627912778', 'Sumur Pacing', 'default.png', 'aktif', '2026-06-22 19:44:53', '2026-05-31 16:25:59', '2026-06-23 00:44:53'),
(4, 'Naura Nur Azizah', 'Naura', '$2y$10$oU3bllZXhnsh8DOAW0n71.mL/gghi3/H9jQ35oHiey4sS3I7VH3QG', 'admin', 'enay0704@gmail.com', '081288072224', 'Pondok Sukatani Permai', 'default.png', 'aktif', NULL, '2026-05-31 16:33:09', '2026-05-31 16:33:09'),
(6, 'Yuniar Ayu Indriyanti', 'Ayu', '$2y$10$VQNN61Pg1SPPMLtxJwU6N.L7Jfvn1qWAbjjWvvp.W7Hgy8cqFr9y2', 'sales', 'ayu@gmail.com', '081288072224', 'Pondok Sukatani Permai', 'default.png', 'aktif', '2026-06-21 08:36:25', '2026-06-21 08:36:12', '2026-06-21 13:36:25'),
(7, 'Alexa', 'Alexa', '$2y$10$swa6hvTdXnyScO8uTPfmE.F908xO8nTgu4EYwUNqQh3UVaPPMhAfK', 'manager', 'alexa23@gmail.com', '081212806842', 'Kukun', 'default.png', 'aktif', '2026-06-22 21:22:16', '2026-06-22 21:16:59', '2026-06-23 02:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `kode_order` (`kode_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_sales` (`id_sales`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD UNIQUE KEY `kode_sales` (`kode_sales`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kategori_produk`
--
ALTER TABLE `tbl_kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`),
  ADD CONSTRAINT `tbl_detail_order_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`id_sales`) REFERENCES `tbl_sales` (`id_sales`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori_produk` (`id_kategori`);

--
-- Constraints for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD CONSTRAINT `tbl_sales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
