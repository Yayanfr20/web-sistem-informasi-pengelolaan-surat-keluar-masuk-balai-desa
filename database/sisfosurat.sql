-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfosurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'kelet@gmail.com', '$2y$10$gUT/MQ/GT.342ne0r96Ww.3HvhThdhKU68F4eCFk4bFCw9gJwqBg6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `umur` varchar(100) NOT NULL,
  `warga_negara` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `judul_surat` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `ktp` int(200) NOT NULL,
  `kk` int(200) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id`, `nama`, `tanggal`, `umur`, `warga_negara`, `agama`, `jenis_kelamin`, `pekerjaan`, `alamat`, `desa`, `judul_surat`, `nomor_surat`, `ktp`, `kk`, `keterangan`) VALUES
(5, 'samsudin cabul', '2022-08-16', '99', 'indonesia', 'pria', 'pria', 'dukun', 'kp.blitar', 'blitar', 'dukun palsu', '01', 2147483647, 2147483647, 'samsudin dukun palsu'),
(6, 'joko', '2022-08-16', '17', 'WNI', 'islam', 'pria', 'buruh', 'cikupa', 'cikupa', 'skck', '02', 2147483647, 2147483647, 'surat pengajuan skck');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
