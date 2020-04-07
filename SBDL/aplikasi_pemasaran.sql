-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 02:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitip`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `kode_barang` varchar(13) NOT NULL,
  `kode_kategori` varchar(13) NOT NULL,
  `kode_jenis` varchar(35) NOT NULL,
  `model` enum('34','35','','') NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` enum('Masih Ada','Habis Terjual','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`kode_barang`, `kode_kategori`, `kode_jenis`, `model`, `stock`, `harga`, `waktu`, `status`) VALUES
('KB001', 'A', 'AT-19', '34', 6, 19000, '2020-06-19 00:00:00', 'Masih Ada'),
('KB002', 'B', 'AT-06', '35', 2, 6000, '2020-03-06 00:00:00', 'Habis Terjual');

-- --------------------------------------------------------

--
-- Table structure for table `data_jenis`
--

CREATE TABLE `data_jenis` (
  `kode_jenis` varchar(13) NOT NULL,
  `kode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jenis`
--

INSERT INTO `data_jenis` (`kode_jenis`, `kode`) VALUES
('AT-06', '06'),
('AT-19', '19');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `kode_kategori` varchar(13) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`kode_kategori`, `kategori`) VALUES
('AB', 'A'),
('BA', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(13) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_transaksi`
--

INSERT INTO `data_transaksi` (`id`, `kode_barang`, `jumlah`, `harga`, `waktu`) VALUES
(19, 'KB001', 2, 1900, '2020-03-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(13) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('1','p','l','') NOT NULL,
  `no_kontak` varchar(32) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `email` varchar(32) NOT NULL,
  `level` text NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`username`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_kontak`, `agama`, `email`, `level`, `password`) VALUES
('Abdullah ', 'duloh', 'Majalengka, 19 Juni 1999', '1999-06-19', 'l', '082320014757', 'Islam', 'a.taufik704@gmail.com', 'Admin', 'kepoatuh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `data_jenis`
--
ALTER TABLE `data_jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
