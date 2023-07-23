-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 08:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_berangkat`
--

CREATE TABLE `detail_berangkat` (
  `id_keberangkatan` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_datang` date NOT NULL,
  `jam_datang` time NOT NULL,
  `tgl_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_berangkat`
--

INSERT INTO `detail_berangkat` (`id_keberangkatan`, `keterangan`, `tgl_berangkat`, `jam_berangkat`, `tgl_datang`, `jam_datang`, `tgl_edit`) VALUES
(12, '', '2023-07-14', '08:09:00', '2023-07-14', '08:09:00', '2023-07-14 01:09:54'),
(13, '', '2023-07-17', '23:32:00', '2023-07-17', '23:32:00', '2023-07-17 16:32:15'),
(14, '', '2023-07-22', '09:00:00', '2023-07-23', '13:50:00', '2023-07-21 02:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `detail_datang`
--

CREATE TABLE `detail_datang` (
  `id_kedatangan` int(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_datang` date NOT NULL,
  `jam_datang` time NOT NULL,
  `tgl_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_datang`
--

INSERT INTO `detail_datang` (`id_kedatangan`, `keterangan`, `tgl_berangkat`, `jam_berangkat`, `tgl_datang`, `jam_datang`, `tgl_edit`) VALUES
(165, '', '2023-07-14', '08:09:00', '2023-07-14', '08:09:00', '2023-07-14 01:09:32'),
(167, '', '2023-07-21', '09:45:00', '2023-07-22', '10:00:00', '2023-07-21 02:46:01'),
(165, 'Air Surut', '2023-07-14', '11:10:00', '2023-07-14', '09:10:00', '2023-07-21 02:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` varchar(10) NOT NULL,
  `nm_kapal` varchar(100) NOT NULL,
  `jenis_kapal` varchar(100) NOT NULL,
  `no_registrasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nm_kapal`, `jenis_kapal`, `no_registrasi`) VALUES
('KPL01', 'LAWIT', 'KAPAL PENUMPANG', 'PKX12646'),
('KPL02', 'SABUK NUSANTARA 80', 'KAPAL PENUMPANG', 'PKX12623'),
('KPL03', 'KMP BAHTERA NUSANTARA 03', 'KAPAL PENUMPANG', 'XPER2833'),
('KPL04', 'BUKIT RAYA', 'KAPAL PENUMPANG', 'XPER229'),
('KPL05', 'FAJAR BAHARI III', 'KAPAL PENUMPANG', 'PKX3276'),
('KPL06', 'FAJAR BAHARI IV', 'KAPAL PENUMPANG', 'PKX5375'),
('KPL07', 'FAJAR BAHARI V', 'KAPAL PENUMPANG', 'PKX87564'),
('KPL08', 'DHARMA RUCITRA', 'KAPAL PENUMPANG', 'PKX45587'),
('KPL09', 'DHARMA KARTIKA VII', 'KAPAL PENUMPANG', 'XPER356'),
('KPL10', 'MULYA SENTOSA', 'KAPAL PENUMPANG', 'XPER986');

-- --------------------------------------------------------

--
-- Table structure for table `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_keberangkatan` int(10) NOT NULL,
  `id_kapal` varchar(10) NOT NULL,
  `id_pelabuhan` varchar(10) NOT NULL,
  `nm_pelabuhan2` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_datang` date NOT NULL,
  `jam_datang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_keberangkatan`, `id_kapal`, `id_pelabuhan`, `nm_pelabuhan2`, `tgl_berangkat`, `jam_berangkat`, `tgl_datang`, `jam_datang`) VALUES
(12, 'KPL03', 'PLBN03', 'SUNDA KELAPA', '2023-07-14', '08:09:00', '2023-07-14', '08:09:00'),
(13, 'KPL01', 'PLBN01', 'TANJUNG PRIOK', '2023-07-17', '23:32:00', '2023-07-17', '23:32:00'),
(14, 'KPL04', 'PLBN03', 'TANJUNG PRIOK', '2023-07-22', '09:00:00', '2023-07-23', '13:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `kedatangan`
--

CREATE TABLE `kedatangan` (
  `id_kedatangan` int(10) NOT NULL,
  `id_kapal` varchar(10) NOT NULL,
  `id_pelabuhan` varchar(10) NOT NULL,
  `nm_pelabuhan2` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_datang` date NOT NULL,
  `jam_datang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kedatangan`
--

INSERT INTO `kedatangan` (`id_kedatangan`, `id_kapal`, `id_pelabuhan`, `nm_pelabuhan2`, `tgl_berangkat`, `jam_berangkat`, `tgl_datang`, `jam_datang`) VALUES
(165, 'KPL02', 'PLBN01', 'DWIKORA', '2023-07-14', '11:10:00', '2023-07-14', '09:10:00'),
(167, 'KPL04', 'PLBN02', 'DWIKORA', '2023-07-21', '09:45:00', '2023-07-22', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelabuhan`
--

CREATE TABLE `pelabuhan` (
  `id_pelabuhan` varchar(10) NOT NULL,
  `nm_pelabuhan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelabuhan`
--

INSERT INTO `pelabuhan` (`id_pelabuhan`, `nm_pelabuhan`, `kota`, `kode`) VALUES
('PLBN01', 'TANJUNG PRIOK', 'JAKARTA UTARA', 'JKT'),
('PLBN02', 'SUNDA KELAPA', 'JAKARTA UTARA', 'JKT'),
('PLBN03', 'DWIKORA', 'PONTIANAK', 'PNK'),
('PLBN04', 'YOSEP ISKANDAR', 'ACEH', 'ACH'),
('PLBN05', 'DUMAI', 'RIAU', 'RU'),
('PLBN06', 'PELABUHAN JAMBI', 'JAMBI', 'JBI'),
('PLBN07', 'PELABUHAN MERAK', 'BANTEN', 'BTN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','staf') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`) VALUES
(1, 'Rizki Lutfiandi', 'kamilastoreidn@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'hehe1', 'tiwi@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'staf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_datang`
--
ALTER TABLE `detail_datang`
  ADD KEY `id_kedatangan` (`id_kedatangan`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_keberangkatan`);

--
-- Indexes for table `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD PRIMARY KEY (`id_kedatangan`),
  ADD KEY `id_kedatangan` (`id_kedatangan`);

--
-- Indexes for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_keberangkatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kedatangan`
--
ALTER TABLE `kedatangan`
  MODIFY `id_kedatangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
