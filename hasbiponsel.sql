-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 02:35 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasbiponsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nohp_customer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `nohp_customer`) VALUES
(8, 'Andi ', '08525151518'),
(9, 'Anto', '08525151519'),
(10, 'Pak Haji', '08292929');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nohp_customerr` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_order`, `id_user`, `nohp_customerr`, `id_customer`, `id_provider`, `id_tarif`, `harga_jual`, `tgl_order`) VALUES
(12, 3, '2020206666', 9, 6, 3, '3', '2020-01-06'),
(13, 2, '123456', 10, 4, 1, '1', '2020-01-13'),
(14, 1, '999999111', 8, 4, 1, '1', '2020-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id_provider` int(11) NOT NULL,
  `nama_provider` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `harga_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id_provider`, `nama_provider`, `id_supplier`, `id_tarif`, `harga_jual`) VALUES
(4, 'XL', 1, 2, '2'),
(5, 'axis', 1, 1, '3'),
(6, '3', 2, 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `nohp_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nohp_supplier`) VALUES
(1, 'Adam ', '123'),
(2, 'Haji', '4231224124');

-- --------------------------------------------------------

--
-- Table structure for table `tarifpulsa`
--

CREATE TABLE `tarifpulsa` (
  `id_tarif` int(11) NOT NULL,
  `pil_tarif` varchar(255) NOT NULL,
  `harga_modal` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarifpulsa`
--

INSERT INTO `tarifpulsa` (`id_tarif`, `pil_tarif`, `harga_modal`, `harga_jual`) VALUES
(1, '50000', '50000', '52000'),
(2, '20000', '20000', '22000'),
(3, '10000', '10000', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_level` tinyint(3) DEFAULT 0,
  `user_namalengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `user_name`, `user_password`, `user_level`, `user_namalengkap`) VALUES
(1, 'hasbi', 'admin', 1, 'Hasbi aja'),
(2, 'rizqi', 'admin', 2, 'Rizqi Aja'),
(3, 'badrimhd', 'admin', 1, 'Mhd Badri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `nama_customer` (`nama_customer`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_provider` (`id_provider`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id_provider`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `nama_supplier` (`nama_supplier`);

--
-- Indexes for table `tarifpulsa`
--
ALTER TABLE `tarifpulsa`
  ADD PRIMARY KEY (`id_tarif`),
  ADD UNIQUE KEY `pil_tarif` (`pil_tarif`),
  ADD UNIQUE KEY `harga_jual` (`harga_jual`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id_provider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarifpulsa`
--
ALTER TABLE `tarifpulsa`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderan`
--
ALTER TABLE `orderan`
  ADD CONSTRAINT `orderan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`),
  ADD CONSTRAINT `orderan_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `orderan_ibfk_3` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`),
  ADD CONSTRAINT `orderan_ibfk_4` FOREIGN KEY (`id_tarif`) REFERENCES `tarifpulsa` (`id_tarif`);

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `provider_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tarifpulsa` (`id_tarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
