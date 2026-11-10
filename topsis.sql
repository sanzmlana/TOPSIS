-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2026 at 01:32 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `kode` varchar(10) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`kode`, `nama_alternatif`) VALUES
('A1', 'Sutrisno'),
('A2', 'M.Ahyar'),
('A3', 'Lamidi'),
('A4', 'Sabar'),
('A5', 'Iskandar');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`) VALUES
(1, 'Prestasi Kerja'),
(2, 'Sikap dan Etika'),
(3, 'Motivasi'),
(4, 'Inisiatif'),
(5, 'Loyalitas'),
(6, 'Tanggung Jawab'),
(7, 'Disiplin'),
(8, 'Kejujuran'),
(9, 'Kepemimpinan'),
(10, 'Menjaga Aset Perusahaan'),
(11, 'Prestasi Kerja'),
(12, 'Sikap dan Etika'),
(13, 'Motivasi'),
(14, 'Inisiatif'),
(15, 'Loyalitas'),
(16, 'Tanggung Jawab'),
(17, 'Disiplin'),
(18, 'Kejujuran'),
(19, 'Kepemimpinan'),
(20, 'Menjaga Aset Perusahaan'),
(21, 'Prestasi Kerja'),
(22, 'Sikap dan Etika'),
(23, 'Motivasi'),
(24, 'Inisiatif'),
(25, 'Loyalitas'),
(26, 'Tanggung Jawab'),
(27, 'Disiplin'),
(28, 'Kejujuran'),
(29, 'Kepemimpinan'),
(30, 'Menjaga Aset Perusahaan'),
(31, 'Prestasi Kerja'),
(32, 'Sikap dan Etika'),
(33, 'Motivasi'),
(34, 'Inisiatif'),
(35, 'Loyalitas'),
(36, 'Tanggung Jawab'),
(37, 'Disiplin'),
(38, 'Kejujuran'),
(39, 'Kepemimpinan'),
(40, 'Menjaga Aset Perusahaan'),
(41, 'Prestasi Kerja'),
(42, 'Sikap dan Etika'),
(43, 'Motivasi'),
(44, 'Inisiatif'),
(45, 'Loyalitas'),
(46, 'Tanggung Jawab'),
(47, 'Disiplin'),
(48, 'Kejujuran'),
(49, 'Kepemimpinan'),
(50, 'Menjaga Aset Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `matrik_keputusan`
--

CREATE TABLE `matrik_keputusan` (
  `id` int NOT NULL,
  `kode_alternatif` varchar(10) NOT NULL,
  `k1` double DEFAULT NULL,
  `k2` double DEFAULT NULL,
  `k3` double DEFAULT NULL,
  `k4` double DEFAULT NULL,
  `k5` double DEFAULT NULL,
  `k6` double DEFAULT NULL,
  `k7` double DEFAULT NULL,
  `k8` double DEFAULT NULL,
  `k9` double DEFAULT NULL,
  `k10` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matrik_keputusan`
--

INSERT INTO `matrik_keputusan` (`id`, `kode_alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) VALUES
(1, 'A1', 4, 4, 3, 2, 3, 4, 3, 5, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrik_keputusan`
--
ALTER TABLE `matrik_keputusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_alternatif` (`kode_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `matrik_keputusan`
--
ALTER TABLE `matrik_keputusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matrik_keputusan`
--
ALTER TABLE `matrik_keputusan`
  ADD CONSTRAINT `matrik_keputusan_ibfk_1` FOREIGN KEY (`kode_alternatif`) REFERENCES `alternatif` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
