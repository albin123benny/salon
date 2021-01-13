-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2021 at 06:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `regid` int(7) NOT NULL,
  `loginid` int(7) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`regid`, `loginid`, `name`, `mobile`) VALUES
(13, 13, 'Alan S Mathew', '7559904709'),
(14, 14, 'admin alan', ''),
(15, 16, 'Alan S Mathew', '7559904709'),
(16, 17, 'Sam', '9447153728');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barber_info`
--

CREATE TABLE `tbl_barber_info` (
  `info_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT 50,
  `avg_time` int(10) NOT NULL DEFAULT 10,
  `images` varchar(200) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barber_info`
--

INSERT INTO `tbl_barber_info` (`info_id`, `login_id`, `style_id`, `price`, `avg_time`, `images`, `status`) VALUES
(4, 17, 11, 50, 25, 'one.png', 1),
(5, 17, 12, 90, 15, 'one.png', 1),
(6, 17, 13, 90, 25, 'one.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `loginid` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'customer',
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`loginid`, `email`, `password`, `type`, `status`) VALUES
(13, 'alansmathew@icloud.com', '$2y$10$RITya/.zmJ6Y8.nFJxPZPeGv9hb09XpK0RMh1V5uGOcjFbt04BI0K', 'customer', 1),
(14, 'admin@gmail.com', '$2y$10$RITya/.zmJ6Y8.nFJxPZPeGv9hb09XpK0RMh1V5uGOcjFbt04BI0K', 'admin', 0),
(16, 'albin@gmail.com', '$2y$10$RzHkAnLxxI5.bZziy0eXheT4m3JRTKYH1b5XI/j/iym5cE/LSEvO.', 'admin', 1),
(17, 'barber@gmail.com', '$2y$10$A/Q67GkCR8lnfOwEAaZgPOYwbQdcastRWsKBpuIjsnKwK89ubx7hW', 'barber', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ser_id` int(11) NOT NULL,
  `ser_name` varchar(20) NOT NULL,
  `ser_desc` varchar(400) NOT NULL,
  `ser_img` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`ser_id`, `ser_name`, `ser_desc`, `ser_img`) VALUES
(1, 'Hair Styling', 'This is test under description of barber foundation this is test under description of barber foundation', 'pic-1.jpg'),
(2, 'Beard Trim', 'This is test under description of barber foundation this is test under description of barber foundation', 'pic-2.jpg'),
(3, 'Hair cut', 'This is test under description of barber foundation this is test under description of barber foundation', 'pic-3.jpg'),
(4, 'Dry shampoo', 'This is test under description of barber foundation this is test under description of barber foundation', 'pic-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_styles`
--

CREATE TABLE `tbl_service_styles` (
  `style_id` int(11) NOT NULL,
  `ser_id` int(11) NOT NULL,
  `style_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_styles`
--

INSERT INTO `tbl_service_styles` (`style_id`, `ser_id`, `style_name`) VALUES
(11, 1, 'navy'),
(12, 1, 'mashrrom'),
(13, 2, 'berd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `tbl_barber_info`
--
ALTER TABLE `tbl_barber_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_service_styles`
--
ALTER TABLE `tbl_service_styles`
  ADD PRIMARY KEY (`style_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `regid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_barber_info`
--
ALTER TABLE `tbl_barber_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `loginid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_service_styles`
--
ALTER TABLE `tbl_service_styles`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
