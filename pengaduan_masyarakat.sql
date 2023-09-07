-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 10:07 AM
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
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` enum('LK','PR') NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `telp`, `alamat`, `jk`, `username`, `password`) VALUES
('102102121', 'Carmain', '081247589521', 'Jl.Dusun Dalam', 'LK', '', ''),
('23123123123', 'Prasetyo', '6645645434', 'Medan Sunggal', 'LK', 'prasetyo1', 'arimay'),
('34127895', 'Kevin', '095255667711', 'Jl. Tembung', 'LK', 'hope132', 'kalimba'),
('6415151616', 'Ibnu', '82832801332', 'Aceh', 'LK', 'gustiraluv534', '123'),
('8218031023', 'Prasetyo', '12312313', 'Aceh', 'PR', 'prasetyo171', '1231');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` varchar(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `nama`, `isi_laporan`, `foto`, `status`) VALUES
('P001', '2023-03-20', '23123123123', 'Prasetyo', 'Selamat Siang \r\nSaya ingin melaporkan kebocoran pipa gas bawah tanah', '61df2f6ae6d9d-petugas-damkar-berusaha-padamkan-kebakaran-pipa-gas-bawah-tanah_tvonenews_1265_711.jpg', 'selesai'),
('P002', '2023-03-20', '23123123123', 'Prasetyo', 'Selamat Pagi\r\nSaya ingin melaporkan adanya tawuran anda pelajar', '1423051947.jpg', 'proses'),
('P005', '2023-03-27', '34127895', 'Kevin', 'Selamat Pagi pak, saya ingin melaporkan adanya penampakan hewan liar ', 'd5nz1kq-437d139e-08ea-4c06-a73d-eed19594b0e2.jpg', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(80, 'Hauser', 'kurnass2000', '121322', '081301023323', 'petugas'),
(81, 'Prasetyo', 'prasetyo', 'arimay', '008231200123', 'admin'),
(82, 'Ahmad', 'inglish12', '8888', '978451', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` varchar(11) NOT NULL,
  `id_pengaduan` varchar(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `status`) VALUES
('TGP01', 'P001', '2023-03-20', 'Terima Kasih atas laporan anda\r\nKami akan segera mengerahkan pemadam kebakaran ke lokasi kejadian', 80, 'Proses'),
('TGP02', 'P001', '2023-03-20', 'Terima Kasih atas laporan anda\r\nKami akan segera mengerahkan pemadam kebakaran ke lokasi kejadian', 80, 'Selesai'),
('TGP03', 'P005', '2023-03-27', 'Baiklah, Kami akan mengerahkan petugas pengendali hewan ke lokasi kejadian', 80, 'Proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
