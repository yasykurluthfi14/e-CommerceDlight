-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 08:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(75) NOT NULL,
  `id_produk` int(75) NOT NULL,
  `nama_produk` varchar(75) NOT NULL,
  `stock_ukuran` int(100) NOT NULL,
  `ukuran_produk` varchar(75) NOT NULL,
  `bahan_produk` varchar(75) NOT NULL,
  `warna_produk` varchar(75) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `id_produk`, `nama_produk`, `stock_ukuran`, `ukuran_produk`, `bahan_produk`, `warna_produk`, `harga_produk`, `foto`) VALUES
(16, 1, 'Boombogie Hoodie', 10, 'S, M, XL', 'Cotton', 'Merah', 250000, '375088173_WhatsApp Image 2022-06-20 at 18.47.47 (1).jpeg'),
(17, 1, 'Boombogie Denim', 17, 'M, XL', 'Cotton', 'Hitam', 250000, '1046456206_WhatsApp Image 2022-06-20 at 18.47.47.jpeg'),
(18, 8, 'Nike T-Shirt', 7, 'S, M, XL', 'Cotton', 'Putih', 150000, '1602518660_WhatsApp Image 2022-06-20 at 18.47.01 (2).jpeg'),
(19, 8, 'Beast Mode', 7, 'S, M, XL', 'Cotton', 'Hijau Toska', 150000, '237445580_WhatsApp Image 2022-06-20 at 18.47.01 (1).jpeg'),
(20, 8, 'All is Well T-shirt', 6, 'S, M, XL', 'Cotton', 'Hitam ', 150000, '280195361_WhatsApp Image 2022-06-20 at 18.47.01.jpeg'),
(21, 9, 'Slim fit Denim', 7, '30-35', 'Denim', 'Cokelat', 300000, '1811027770_WhatsApp Image 2022-06-20 at 18.46.27 (5).jpeg'),
(22, 9, 'Slim fit Denim Abu-abu', 10, '30-35', 'Denim', 'Abu-abu', 300000, '464034609_WhatsApp Image 2022-06-20 at 18.46.27 (4).jpeg'),
(23, 9, 'Oxyman', -3, '30-35', 'Jeans', 'Biru', 300000, '1946494103_WhatsApp Image 2022-06-20 at 18.46.27 (3).jpeg'),
(24, 9, 'Jeans', 5, '30-35', 'Jeans', 'Biru', 300000, '1418210241_WhatsApp Image 2022-06-20 at 18.46.27 (2).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `role` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `no_hp` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `role`, `password`, `no_hp`, `alamat`) VALUES
(1, 'admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '07119367475', 'kantor'),
(2, 'Ahmad', 'luthfi', 'customer', '202cb962ac59075b964b07152d234b70', '081391496048', 'perum');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_produk` varchar(75) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `nama_customer` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `no_hp` varchar(75) NOT NULL,
  `tgl_checkout` date NOT NULL,
  `bukti_pembayaran` varchar(75) NOT NULL,
  `status_konfirmasi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_transaksi`, `id_barang`, `nama_produk`, `jumlah_produk`, `harga_produk`, `tgl_pemesanan`, `nama_customer`, `alamat`, `no_hp`, `tgl_checkout`, `bukti_pembayaran`, `status_konfirmasi`) VALUES
(7, 2, 23, 'Oxyman', 3, 900000, '2022-07-22', 'Ahmad', '            2353463', '325235', '2022-07-22', '915298838_Gambar Form Login.jpg', 'Done'),
(8, 2, 16, 'Boombogie Hoodie', 5, 1250000, '2022-07-22', 'Ahmad', '            325', '2352354', '2022-07-22', '915298838_Gambar Form Login.jpg', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(75) NOT NULL,
  `kategori_produk` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`) VALUES
(1, 'Hoddie', 'Jaket'),
(8, 'T-Shirt', 'Baju'),
(9, 'Celana', 'Celana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(75) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
