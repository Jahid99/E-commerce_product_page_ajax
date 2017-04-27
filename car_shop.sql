-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 10:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'Huawei - g5', 'images/m1.jpg', 700),
(2, 'iphone - 5s ', 'images/m2.jpg', 540),
(3, 'Blackberry - s4', 'images/m4.jpg', 554),
(4, 'Samsung - y4', 'images/m6.jpg', 231),
(5, 'Htc - eye', 'images/m7.jpg', 1306),
(6, 'Htc - desire', 'images/m7.jpg', 657),
(7, 'Huawei - u4', 'images/m1.jpg', 342),
(8, 'Huawei - s2', 'images/m1.jpg', 536),
(9, 'iphone', 'images/m2.jpg', 1032),
(10, 'Blackberry - r12', 'images/m4.jpg', 732),
(11, 'Samsung - note 3', 'images/m6.jpg', 1234),
(12, 'HTC - e34', 'images/m7.jpg', 945),
(13, 'Huawei - f21', 'images/m1.jpg', 684),
(14, 'iphone - 4s', 'images/m2.jpg', 954),
(15, 'Samsung - j2', 'images/m6.jpg', 742),
(16, 'Htc - k2', 'images/m7.jpg', 882);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
