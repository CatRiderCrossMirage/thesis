-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 11:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `statusD` tinyint(1) NOT NULL,
  `currentTimes` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailrider`
--

INSERT INTO `detailrider` (`orderNo`, `full_Name`, `license`, `roomRecive`, `delivery_Platform`, `statusD`, `currentTimes`) VALUES
(2, 'ขับช้าๆลงหน่อย', 'ตด 5556', 'ตึก 1 308', 'Grab', 1, '2022-04-19 08:17:30'),
(3, 'ขับช้าๆลงหน่อย', 'ตด 5556', 'ตึก 1 399', 'Grab', 1, '2022-04-19 08:17:30'),
(16, 'D the hunter', 'DDD777', 'D307', 'DMan', 1, '2022-04-19 08:17:30'),
(17, 'D the hunter', 'DDD777', 'D307', 'DMan', 1, '2022-04-19 08:17:30'),
(18, 'D the hunter', 'DDD777', 'D307', 'DMan', 1, '2022-04-19 08:17:30'),
(19, 'D the hunter', 'DDD777', 'D307', 'Food panda', 0, '2022-04-19 08:17:30'),
(20, 'จิรวัฒน์ สีแก้วช่วง', 'กย 1500', 'ตึก 1 ห้อง 307', '', 1, '2022-04-19 08:17:30'),
(21, 'จิรวัฒน์ สีแก้วช่วง', 'กย 1501', 'ตึก 1 ห้อง 308', 'Food panda', 0, '2022-04-19 08:17:30'),
(22, 'จิรวัฒน์ สีแก้วช่วง', 'EXP123456789', 'ตึก 1 ห้อง 308', 'Express', 0, '2022-04-19 08:17:30'),
(23, 'จิรวัฒน์ สีแก้วช่วง', 'กย 1510', 'ตึก 1 ห้อง 355', 'Grab Food', 0, '2022-04-19 08:17:30'),
(24, 'จิรวัฒน์ สีแก้วช่วง', 'ff15', 'ตึก 2 ห้อง 310', 'Line man', 0, '2022-04-19 08:17:30'),
(25, 'จิรวัฒน์ สีแก้วช่วง', 'กย 1515', 'ตึก 2 ห้อง 311', 'Line man', 0, '2022-04-19 08:18:07');

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
  MODIFY `orderNo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
