-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 11:08 AM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `order_id` int(13) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(20) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `cus_id` varchar(100) NOT NULL,
  `order_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`order_id`, `order_date`, `order_time`, `order_status`, `cus_id`, `order_detail`) VALUES
(12, '2022-02-18', '04:23:19pm', 'ยืนยัน', 'test@testmail.com', 'ชุดกรวดน้ำทองเหลือง x 1<br>'),
(13, '2022-02-18', '06:25:38pm', 'ยกเลิก', 'test@testmail.com', 'ชุดกรวดน้ำ x 1<br>กระถางธูป x 1<br>');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_price` int(100) NOT NULL,
  `path_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_id`, `pro_name`, `pro_price`, `path_img`) VALUES
(1, '00001', 'กระถางธูป', 100, './src/image/รูปสินค้า/กระถางธูป.jpg'),
(2, '00002', 'ชุดกรวดน้ำ', 100, './src/image/รูปสินค้า/ชุดกรวดน้ำ.jpg'),
(3, '00003', 'ชุดกรวดน้ำทองเหลือง', 100, './src/image/รูปสินค้า/ชุดกรวดน้ำทองเหลือง.jpg'),
(4, '00004', 'โต๊ะหมู่บูชาหมู่9', 1000, './src/image/รูปสินค้า/โต๊ะหมู่บูชาหมู่9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `user_id` int(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_add` text NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`user_id`, `user_pass`, `user_name`, `user_tel`, `user_add`, `user_email`) VALUES
(1, '12345678', 'admin', '0123456789', '', 'admin@testmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tranfermoney`
--

CREATE TABLE `tranfermoney` (
  `order_id` int(13) NOT NULL,
  `transf_proof` varchar(255) NOT NULL,
  `transf_bank` varchar(20) NOT NULL,
  `transf_date` varchar(20) NOT NULL,
  `transf_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tranfermoney`
--

INSERT INTO `tranfermoney` (`order_id`, `transf_proof`, `transf_bank`, `transf_date`, `transf_time`) VALUES
(21, 'transf_proof/TH-01.png', 'ฟหก', '2022-02-03', '16:23'),
(22, 'transf_proof/Product-10-10.jpg', 'fgh', '2022-02-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_pass`, `user_name`, `user_tel`, `user_add`, `user_email`) VALUES
(1, '12345678', 'tester', '0123456789', 'test', 'test@testmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tranfermoney`
--
ALTER TABLE `tranfermoney`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `order_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `super_user`
--
ALTER TABLE `super_user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tranfermoney`
--
ALTER TABLE `tranfermoney`
  MODIFY `order_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
