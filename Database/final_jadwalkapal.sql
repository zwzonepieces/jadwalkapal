-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 03:47 AM
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
-- Database: `final_jadwalkapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) NOT NULL,
  `id_kapal` varchar(10) NOT NULL,
  `id_pelabuhan` varchar(10) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `tgl_datang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_kapal`, `id_pelabuhan`, `tgl_berangkat`, `tgl_datang`) VALUES
(2, 'KPL01', 'Plbn01', '2023-03-13 09:46:00', '2023-03-15 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` varchar(10) NOT NULL,
  `nm_kapal` varchar(100) NOT NULL,
  `jenis_kapal` varchar(100) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nm_kapal`, `jenis_kapal`, `no_registrasi`) VALUES
('KPL01', 'KM SABUK NUSANTARA 80', 'KAPAL PENUMPANG', 'PKX32001');

-- --------------------------------------------------------

--
-- Table structure for table `pelabuhan`
--

CREATE TABLE `pelabuhan` (
  `id_pelabuhan` varchar(10) NOT NULL,
  `pelabuhan_asal` varchar(100) NOT NULL,
  `pelabuhan_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelabuhan`
--

INSERT INTO `pelabuhan` (`id_pelabuhan`, `pelabuhan_asal`, `pelabuhan_tujuan`) VALUES
('Plbn01', 'PRIOK', 'PONTIANAK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nm_user`, `email`, `password`) VALUES
(1, 'admin', 'RizkiLutfiandi', 'riskimpw9988@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
