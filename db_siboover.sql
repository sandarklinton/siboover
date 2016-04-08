-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2016 at 03:22 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siboover`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(6) NOT NULL,
  `username_customer` varchar(10) NOT NULL,
  `username_driver` varchar(10) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `keperluan` text NOT NULL,
  `tujuan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `pesan_warning` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `username_customer`, `username_driver`, `tanggal_waktu`, `keperluan`, `tujuan`, `status`, `pesan_warning`) VALUES
(1, 'ilham', 'iwan', '2016-04-10 08:00:00', 'Meeting', 'Jakarta Selatan', 'On going', NULL),
(2, 'zultan', 'iwan', '2016-04-10 10:00:00', 'Meeting', 'Jakarta Pusat', 'On going', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `role`, `jabatan`) VALUES
('admin', 'admin', 'admin'),
('ilatifah', 'customer', 'Finance'),
('ilham', 'customer', 'HR'),
('sandar', 'customer', 'Finance'),
('zultan', 'customer', 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `username` varchar(10) NOT NULL,
  `nomorpolisi` varchar(9) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`username`, `nomorpolisi`, `foto`) VALUES
('iwan', 'B1234AU', '/abc/def');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(6) NOT NULL,
  `id_maintenance` int(6) NOT NULL,
  `tanggal_waktu` date NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_maintenance`, `tanggal_waktu`, `foto`) VALUES
(1, 1, '2016-04-18', '/mmm/nn/'),
(2, 2, '2016-04-19', '/klkl/nmnm');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `username` varchar(10) NOT NULL,
  `jadwal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`username`, `jadwal`) VALUES
('iwan', '2016-04-10 08:00:00'),
('iwan', '2016-04-10 09:00:00'),
('iwan', '2016-04-10 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `nomorpolisi` varchar(9) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `jarak` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`nomorpolisi`, `nama`, `kapasitas`, `jarak`, `status`) VALUES
('B123AU', 'Avanza', 5, 10000, 1),
('B5678AA', 'Innova', 5, 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `Id` int(6) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomorpolisi` varchar(9) NOT NULL,
  `username_customer` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`Id`, `tanggal_waktu`, `nomorpolisi`, `username_customer`, `jenis`) VALUES
(1, '2016-04-15 11:00:00', 'B123AU', 'ilatifah', 'Rutin'),
(2, '2016-04-16 16:00:00', 'B5678AA', 'sandar', 'Accidental');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idbooking` int(6) NOT NULL,
  `id_comment` int(6) NOT NULL,
  `comment` text,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(16) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NoHP` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Email`, `Nama`, `NoHP`) VALUES
('admin', 'admin', 'admin@gmail.com', 'Budi', '081234567890'),
('ilatifah', 'ilatifah', 'abcd@gmail.com', 'Ilatifah Nur', '0899999999'),
('ilham', 'ilham', 'abc@abc.com', 'Ilham', '087777777777'),
('iwan', 'iwan', 'jkl@jkl.com', 'Iwan ', '081111111111'),
('sandar', 'sandar', 'def@def.com', 'Sandar', '08666666666'),
('zultan', 'zultan', 'ghi@ghi.com', 'Zultan', '08555555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`username`,`jadwal`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`nomorpolisi`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idbooking`,`id_comment`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
