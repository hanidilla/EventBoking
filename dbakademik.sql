-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 02:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_siswa`
--

CREATE TABLE `1_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_acara` varchar(100) NOT NULL,
  `jasa_kita` int(11) NOT NULL,
  `tgl_acara` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `durasi_acara` int(11) NOT NULL,
  `bayar_dp` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `jaminan` varchar(200) NOT NULL,
  `kode` bigint(20) NOT NULL,
  `lunas` int(11) NOT NULL,
  `bukti` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `id_lokasi`, `id_user`, `nama_acara`, `jasa_kita`, `tgl_acara`, `kuota`, `jam_mulai`, `jam_akhir`, `durasi_acara`, `bayar_dp`, `total_bayar`, `jaminan`, `kode`, `lunas`, `bukti`) VALUES
(3, 4, 1, 'Ulang Tahun Mega', 1, '2020-09-30', 12, '07:00', '14:00', 16, '1860000', '3720000', 'aa.jpg', 836079357, 1, 'abdulloh.jpg'),
(4, 1, 1, 'Apa aja', 1, '2020-08-09', 10, '08:00', '09:00', 2, '1150000', '2300000', 'Untitled.png', 182115192, 0, ''),
(5, 2, 6, 'Reuni Keluarga', 2, '2020-07-03', 35, '08:00', '12:00', 4, '1200000', '2400000', 'KTP.PNG', 641053508, 0, 'TRANSFERAN.PNG'),
(6, 3, 4, 'makan', 1, '0000-00-00', 12, '07:00', '12:00', 5, '1310000', '2620000', 's.png', 988377605, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `harga`, `foto`, `tipe`) VALUES
(1, 'hutan pinus', '2000000', 'pinus.jpg', 'outdoor'),
(2, 'Pantai Goa Cina', '1500000', 'goacina.jpg', 'outdoor'),
(3, 'Alun Alun Malang', '2500000', 'alun.jpg', 'outdoor'),
(4, 'Bukit Kuneer', '1000000', 'kuneer.jpg', 'outdoor'),
(5, 'Pantai Sendiki', '1000000', 'sendiki.jpg', 'outdoor'),
(6, 'Gedung Cakrawala UM', '700000', 'umserbaguna.jpg', 'indoor'),
(7, 'Cafe Nara Kopi', '750000', 'nara.jpg', 'indoor'),
(8, 'Gedung Graha Polinema', '2000000', 'umgraha.jpg', 'indoor'),
(9, 'UMM Dome', '2000000', 'umm.jpg', 'indoor'),
(10, 'Graha Medika UB ', '2000000', 'ub.jpg', 'indoor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg',
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `photo`, `role_id`) VALUES
(4, 'admin', 'admin', 'admin', 'admin', 'default.svg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1_siswa`
--
ALTER TABLE `1_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1_siswa`
--
ALTER TABLE `1_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
