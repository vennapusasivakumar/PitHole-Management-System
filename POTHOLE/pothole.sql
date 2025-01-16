-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 06:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pothole`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `contact`, `email`, `status`) VALUES
(4, '9440655643', 'vsr', 1),
(5, '9440655643', 'vsr@gmail.com', 0),
(6, '9440655643', 'vsr@gmail.com', 0),
(7, '9440655643', 'vsr', 0),
(8, '8179216710', 'vennapusasivakumar2@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `img_id` varchar(150) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `contact`, `img_id`, `latitude`, `longitude`, `date`, `status`) VALUES
(18, '9440655643', 'capture_images/65b52e8c45ab9.png', '14.030289', '80.0266007', '2024-01-27 16:29:44', 0),
(19, '9440655643', '', '14.1753309', '79.8632725', '2024-02-26 04:05:39', 0),
(20, '9440655643', 'capture_images/65dc0e800290d.png', '14.1753309', '79.8632725', '2024-02-26 04:07:28', 0),
(21, '9440655643', 'capture_images/65dc0eaab5806.png', '14.1753309', '79.8632725', '2024-02-26 04:08:10', 0),
(22, '9440655643', 'capture_images/65dc10ea4521a.png', '14.1753309', '79.8632725', '2024-02-26 04:17:46', 0),
(23, '8179216710', '', '14.0304346', '80.026762', '2024-02-27 14:13:54', 0),
(24, '8179216710', 'capture_images/65ddee223cced.png', '14.0304346', '80.026762', '2024-02-27 14:14:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
