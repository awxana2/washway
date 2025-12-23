-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_pesanan` varchar(50) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama`, `kode_pesanan`, `tanggal_pesan`, `bukti_pembayaran`, `created_at`) VALUES
(7, 'ica@gmail.com', '38', '2025-06-15', 'Screenshot 2023-12-25 015223.png', '2025-06-14 18:16:07'),
(10, 'nana@gmail.com', '39', '2025-06-16', 'Screenshot 2023-12-25 015223.png', '2025-06-14 18:34:25'),
(11, 'aurel@gmail.com', '40', '2025-06-17', 'Screenshot 2023-12-25 015223.png', '2025-06-16 17:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `tanggal_kirim` date DEFAULT curdate(),
  `status_pengiriman` enum('Diproses','Dikirim','Selesai') DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `pesanan_id`, `nama_kurir`, `tanggal_kirim`, `status_pengiriman`) VALUES
(20, 39, 'JNE', '2025-06-15', 'Diproses'),
(21, 39, 'kurir1@gmail.com', '2025-06-15', ''),
(22, 38, 'kurir2@gmail.com', '2025-06-15', 'Diproses'),
(23, 37, 'kurir3@gmail.com', '2025-06-17', 'Diproses'),
(24, 40, 'kurir1@gmail.com', '2025-06-17', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `layanan` varchar(50) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `alamat_jemput` text DEFAULT NULL,
  `berat` float DEFAULT NULL,
  `kurir` varchar(20) NOT NULL,
  `status` enum('Diproses','Dikirim','Selesai') DEFAULT 'Diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `layanan`, `tanggal_pesan`, `alamat_jemput`, `berat`, `kurir`, `status`) VALUES
(37, 'eca@gmail.com', 'Cuci Kering', '2025-06-15', 'jl.perumnas', 3, '', 'Diproses'),
(38, 'ica@gmail.com', 'Setrika', '2025-06-15', 'jl.by pass', 6, '', 'Diproses'),
(39, 'nana@gmail.com', 'Setrika', '2025-06-16', 'jl.mawar', 5, '', 'Dikirim'),
(40, 'aurel@gmail.com', 'Setrika', '2025-06-17', 'jl.kledokan', 5, '', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'Pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(4, 'admin@gmail.com', 'admin1', 'admin'),
(5, 'kurir1@gmail.com', 'kurir1', 'kurir'),
(11, 'akbar@gmail.com', 'akbar123', 'Pelanggan'),
(12, 'nana@gmail.com', 'nana123', 'Pelanggan'),
(13, 'eca@gmail.com', 'eca1', 'Pelanggan'),
(14, 'ica@gmail.com', 'ica1', 'Pelanggan'),
(15, 'kurir2@gmail.com', 'kurir2', 'kurir'),
(16, 'kurir3@gmail.com', 'kurir3', 'kurir'),
(17, 'aurel@gmail.com', 'aurel1', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
