-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 02:15 PM
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
(2, 2, 'albin', '8899554566'),
(3, 3, 'richa', '8899554566'),
(8, 8, 'sasi', '6985697856'),
(10, 10, 'babu', '8899554566'),
(11, 11, 'hlo', '6985697856'),
(12, 12, 'ben', '7559904709');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `loginid` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`loginid`, `email`, `password`, `status`) VALUES
(2, 'albin@gmail.com', 'Alan@12345', 1),
(3, 'richa@gmail.com', 'Richa@123', 1),
(8, 'sasi@gmail.com', '$2y$10$emMjKiCAn3cFt01f08yoOejTXT/D8ZgilkYCjtnQjU5vB1HBk7gaa', 1),
(10, 'babu@gmail.com', '$2y$10$nV75bar6TjWciOaGM6Qu3ucsC9QnGgOH62ns7FW.8576f9/04s5aC', 1),
(11, 'hloo@gmail.com', '$2y$10$wNNh.aqY/edM2o34.T/xyOw0Lz86KGTDaifZAAl2Ox4mDAXgw3HkW', 1),
(12, 'benn@gmail.com', '$2y$10$hFW4DqW9WT6xLhdumESzSOgTPrO8qh6rNF3ZhSrGA4rhealOO0nTW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`loginid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `regid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `loginid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
