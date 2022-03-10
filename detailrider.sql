-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 11:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailrider`
--

CREATE TABLE `detailrider` (
  `orderNo` int(50) NOT NULL,
  `full_Name` text NOT NULL,
  `license` text NOT NULL,
  `roomRecive` text NOT NULL,
  `delivery_Platform` text NOT NULL,
  `statusD` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailrider`
--

INSERT INTO `detailrider` (`orderNo`, `full_Name`, `license`, `roomRecive`, `delivery_Platform`, `statusD`) VALUES
(2, 'ขับช้าๆลงหน่อย', 'ตด 5556', 'ตึก 1 308', 'Grab', 1),
(3, 'ขับช้าๆลงหน่อย', 'ตด 5556', 'ตึก 1 399', 'Grab', 1),
(10, 'ขับช้าๆลงหน่อย', 'ตด 555778', 'ตึก 1 3988', 'Line man', 1),
(13, 'Jirawat Seekeawchuang', 'ตด 5555', 'ตึก 1 308', 'Line man', 1),
(15, 'Jirawat', 'ตด 5567', 'ตึก 1 308', 'Grab', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailrider`
--
ALTER TABLE `detailrider`
  ADD PRIMARY KEY (`orderNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailrider`
--
ALTER TABLE `detailrider`
  MODIFY `orderNo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
