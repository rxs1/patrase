-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 07:47 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patrase`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_category`
--

CREATE TABLE `mst_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_category`
--

INSERT INTO `mst_category` (`id`, `name`, `icon`) VALUES
(21, 'Barang Antik', 'antique-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `mst_location`
--

CREATE TABLE `mst_location` (
  `id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_pasar`
--

CREATE TABLE `mst_pasar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `time_open` time NOT NULL,
  `time_close` time NOT NULL,
  `active_day` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pasar`
--

INSERT INTO `mst_pasar` (`id`, `name`, `id_category`, `id_region`, `id_location`, `keterangan`, `time_open`, `time_close`, `active_day`, `address`, `create_date`, `update_date`) VALUES
(1, 'Pasar Minggu', 21, 15, 0, '', '00:00:00', '14:00:00', 1, '0', '2016-12-05 05:52:02', '0000-00-00 00:00:00'),
(5, 'Pasar Hari', 21, 15, 0, '', '04:00:00', '13:00:00', 0, '0', '2016-12-05 10:20:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_pasar_img`
--

CREATE TABLE `mst_pasar_img` (
  `id` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pasar_img`
--

INSERT INTO `mst_pasar_img` (`id`, `id_pasar`, `img`) VALUES
(1, 1, 'pasar_baru_2.jpg'),
(8, 1, 'img-12-41-41.jpg'),
(9, 1, 'img-12-41-46.jpg'),
(10, 1, 'img-12-44-37.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_region`
--

CREATE TABLE `mst_region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_region`
--

INSERT INTO `mst_region` (`id`, `name`) VALUES
(15, 'Jakarta Pusat'),
(16, 'Jakarta Selatan'),
(17, 'Jakarta Timur'),
(18, 'Jakarta Barat'),
(19, 'Jakarta Utara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_category`
--
ALTER TABLE `mst_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `mst_location`
--
ALTER TABLE `mst_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_pasar`
--
ALTER TABLE `mst_pasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_pasar_img`
--
ALTER TABLE `mst_pasar_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_region`
--
ALTER TABLE `mst_region`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_category`
--
ALTER TABLE `mst_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mst_pasar`
--
ALTER TABLE `mst_pasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_pasar_img`
--
ALTER TABLE `mst_pasar_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_region`
--
ALTER TABLE `mst_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
