-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 05:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nip`, `password`, `level`) VALUES
('123123123', '123123123', 'pegawai'),
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tmptlahir` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `goldar` varchar(3) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT '../uploads/fotoprofil/noimage.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`nip`, `nama`, `email`, `tmptlahir`, `tanggal`, `gender`, `agama`, `goldar`, `alamat`, `jabatan`, `notelp`, `gaji`, `foto`) VALUES
('123123123', '123123123', '123123123@gmail.com', '123123123', '2312-12-31', 'laki', 'Kristen Pr', 'A', '123123123', '123123123', '123123123', 123123123, '../uploads/fotoprofil/123123123fotoprofil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datacuti`
--

CREATE TABLE `datacuti` (
  `nip` varchar(30) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `lamacuti` int(2) DEFAULT NULL,
  `alasancuti` text,
  `filecuti` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datacuti`
--

INSERT INTO `datacuti` (`nip`, `date1`, `date2`, `lamacuti`, `alasancuti`, `filecuti`, `status`) VALUES
('123123123', '2019-06-08', '2019-06-22', 15, 'ALASAN CUTI', '../uploads/izincuti/123123123izincuti.pdf', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `dataresign`
--

CREATE TABLE `dataresign` (
  `nip` varchar(30) NOT NULL,
  `alasanresign` text,
  `fileresign` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataresign`
--

INSERT INTO `dataresign` (`nip`, `alasanresign`, `fileresign`, `status`) VALUES
('123123123', 'ALASAN RESIGN', '../uploads/pengunduran/123123123pengunduran.pdf', 'diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `datacuti`
--
ALTER TABLE `datacuti`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dataresign`
--
ALTER TABLE `dataresign`
  ADD PRIMARY KEY (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `fk_nip` FOREIGN KEY (`nip`) REFERENCES `akun` (`nip`);

--
-- Constraints for table `datacuti`
--
ALTER TABLE `datacuti`
  ADD CONSTRAINT `datacuti_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `akun` (`nip`);

--
-- Constraints for table `dataresign`
--
ALTER TABLE `dataresign`
  ADD CONSTRAINT `dataresign_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `akun` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
