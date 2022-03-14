-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 07:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` decimal(50,2) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(200) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kode_barang`, `jenis_barang`, `nama`, `harga`, `stock`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'KB001', 'KT001', 'Testing', '500000.00', '141', '', '2021-09-30', '', '0000-00-00'),
(2, 'KB002', 'KT001', 'Panci', '1000.00', '72843', 'admin', '2021-09-30', 'admin', '2021-09-30'),
(4, 'KB003', 'KB002', 'Wajan', '150000.00', '1', 'admin', '2021-10-15', 'admin', '2021-10-15'),
(5, 'ST001', 'ST', 'MOUNTING MODUL', '20000.00', '904', 'admin', '2021-11-18', '', '0000-00-00'),
(6, '232', 'ST', 'Testing22', '1234.00', '0', 'admin', '2022-01-29', '', '0000-00-00'),
(8, '36985', 'tes23', '2222', '1235.00', '0', 'admin', '2022-01-29', '', '0000-00-00'),
(9, 'aaaa', 'tes2', 'randi', '222.00', '0', 'admin', '2022-01-29', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(200) NOT NULL,
  `jenis_barang` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(200) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_barang`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('1', 'tes2312', 'admin', '2022-01-29', 'admin', '2022-01-29'),
('2wss', 'tes2', 'admin', '2022-01-29', '', '0000-00-00'),
('ssd', 'tes23', 'admin', '2022-01-29', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kode_kat` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(200) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kode_kat`, `nama`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'KT001', 'Tester', 'admin', '2021-09-09', '', '0000-00-00'),
(2, 'KB002', 'Besi', 'admin', '2021-09-30', '', '0000-00-00'),
(3, 'ST', 'STAINLESS', 'admin', '2021-11-18', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` varchar(256) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `qty` int(10) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(200) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `barang_id`, `tipe`, `keterangan`, `qty`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(37, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(38, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(39, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(40, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(41, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(42, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(43, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(44, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(45, 5, 'masuk', 'By Panji', 100, 'admin', '2021-11-18', '', '0000-00-00'),
(46, 5, 'masuk', 'Masuk', 1, 'admin', '2021-11-18', '', '0000-00-00'),
(47, 5, 'masuk', 'Masuk', 1, 'admin', '2021-11-18', '', '0000-00-00'),
(48, 5, 'masuk', 'Masuk', 1, 'admin', '2021-11-18', '', '0000-00-00'),
(49, 5, 'masuk', 'Masuk', 1, 'admin', '2021-11-18', '', '0000-00-00'),
(50, 0, 'masuk', 'sdad', 2131, 'admin', '2021-11-18', '', '0000-00-00'),
(51, 2, 'masuk', 'sdad', 2131, 'admin', '2021-11-18', '', '0000-00-00'),
(52, 2, 'masuk', 'sdad', 2131, 'admin', '2021-11-18', '', '0000-00-00'),
(53, 2, 'masuk', 'sdad', 2131, 'admin', '2021-11-18', '', '0000-00-00'),
(54, 2, 'masuk', 'sdad', 2131, 'admin', '2021-11-18', '', '0000-00-00'),
(55, 2, 'masuk', 'sad', 21313, 'admin', '2021-11-18', '', '0000-00-00'),
(56, 2, 'masuk', 'sad', 21313, 'admin', '2021-11-18', '', '0000-00-00'),
(57, 2, 'masuk', 'sad', 21313, 'admin', '2021-11-18', '', '0000-00-00'),
(58, 1, 'masuk', 'bagus', 50, 'admin', '2022-01-29', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(200) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `telp`, `alamat`, `role`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '-', '-', 'admin', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('direktur', 'ef55c764d670377f3b24cf6d065252f06ee031c5', 'Direktur', '088808551211', 'Bandung', 'kepala gudang', 'admin', '2021-11-09 02:03:27', 'admin', '2022-01-29 15:22:51'),
('staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'staff', '082465487', 'Bandung', 'staff', 'admin', '2022-01-29 15:19:30', 'admin', '2022-01-29 15:22:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
