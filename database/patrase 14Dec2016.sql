-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 01:08 PM
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
(21, 'Barang Antik', 'icon-18-36-04.png'),
(22, 'Kebutuhan sehari-hari', 'icon-00-30-26.png'),
(23, 'Grosir Tekstil dan Garmen', 'icon-18-39-00.png');

-- --------------------------------------------------------

--
-- Table structure for table `mst_location`
--

CREATE TABLE `mst_location` (
  `id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_location`
--

INSERT INTO `mst_location` (`id`, `lat`, `lng`) VALUES
(1, -6.17693, 106.843),
(7, -6.1634, 106.834),
(8, -6.20065, 106.841),
(9, -6.189, 106.812),
(10, -6.17692, 106.843),
(11, -6.19222, 106.849),
(12, -6.14417, 106.842),
(13, -6.13782, 106.782),
(14, -6.15134, 106.814);

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
(7, 'Pasar Baru', 22, 15, 0, 'Pusat perbelanjaan ini didirikan pada tahun 1820, dan merupakan pusat perbelanjaan tertua di Jakarta. Ujung selatan Jalan Pasar Baru berbatasan dengan Jalan Antara dan Jalan Pasar Baru Selatan, serta Jalan Pos yang berdekatan dengan Gedung Kesenian Jakarta. Ujung utara Jalan Pasar Baru berbatasan dengan Jalan Kyai Haji Samanhudi, dekat Metro Pasar Baru dan Jalan Gereja Ayam. Di sisi kiri dan kanan Jalan Pasar Baru terdapat toko pakaian, toko tekstil dan tailor, toko alat olahraga dan sepatu, toko kacamata, dan toko perhiasan emas.', '09:00:00', '18:00:00', 0, 'Jalan Pasar Baru, Kelurahan Pasar Baru, Kecamatan Sawah Besar, Jakarta Pusat', '2016-12-14 10:26:07', '0000-00-00 00:00:00'),
(8, 'Pasar Surabaya', 21, 15, 0, 'Pasar Loak terkenal di Jakarta, sangat cocok untuk orang orang yang ingin mencari barang antik. Di pasar ini, Anda dapat menemukan berbagai macam barang kuno nan antik. Ada lampu kristal, patung-patung ukiran dari kayu, telepon kuno, keris, aksesoris, benda-benda galangan kapal, beragam peralatan makan antik dan masih banyak lagi. Salah satu yang terkenal adalah koleksi piringan hitam tempo dulu.', '07:00:00', '18:00:00', 0, 'Jalan Surabaya No. 46, Menteng, RT.15/RW.5, Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310, Indonesia', '2016-12-14 10:26:59', '0000-00-00 00:00:00'),
(9, 'Pasar Tanah Abang', 23, 15, 0, 'Pasar Tanah Abang atau Pasar Sabtu dibangun oleh Yustinus Vinck pada 30 Agustus 1735. Yustinus Vinck mendirikan Pasar Tanah Abang Pasar atas izin dari Gubernur Jenderal Abraham Patramini. Izin yang diberikan saat itu untuk Pasar Tanah Abang adalah untuk berjualan tekstil serta barang kelontong dan hanya buka setiap hari Sabtu. Oleh karena itu, pasar ini disebut Pasar Sabtu.\r\n\r\nPasar Tanah Abang semakin berkembang setelah dibangunnya Stasiun Tanah Abang. Di tempat tersebut mulai dibangun tempat-tempat seperti Masjid Al Makmur dan Klenteng Hok Tek Tjen Sien yang keduanya seusia dengan Pasar Tanah Abang. Pada tahun 1973, Pasar Tanah Abang diremajakan, diganti dengan 4 bangunan berlantai empat, dan sudah mengalami dua kali kebakaran, pertama tanggal 30 Desember 1978, Blok A di lantai tiga dan kedua menimpa Blok B tanggal 13 Agustus 1979. Pada tahun 1975 tercatat kiosnya ada 4.351 buah dengan 3.016 pedagang.', '08:00:00', '18:00:00', 0, 'Jl. Kb. Jati, Kp. Bali, Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10240, Indonesia', '2016-12-14 10:28:12', '0000-00-00 00:00:00'),
(10, 'Pasar Senen', 22, 15, 0, 'Pasar Senen adalah landmark yang terkenal di Ibukota, bahkan di seluruh Indonesia. Ketenarannya didulang sejak zaman Belanda dan mencapai puncaknya pada era tahun 1970-1990-an. Saking bekennya pasar ini, namanya diabadikan sebagai nama wilayah dan beberapa fasilitas penting didirikan di sekitarnya seperti Stasiun Senen, Terminal Senen, GOR Planet Senen, bahkan mal Atrium Senen.\r\n\r\nSejarah mencatat pasar ini tak lepas dari pengaruh tuan tanah bernama Justinus Vinck yang merintis pasar ini pada tahun 1735. Hebatnya, pasar ini menjadi pasar pertama yang menerapkan sistem jual beli dengan menggunakan alat tukar uang.', '07:00:00', '18:00:00', 0, 'Jalan Senen Raya, RW.03, Senen, RW.3, Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410, Indonesia', '2016-12-14 10:29:04', '0000-00-00 00:00:00'),
(11, 'Pasar Paseban', 22, 15, 0, 'Sejak puluhan tahun yang lalu Pasar Paseban sudah melayani berbagai kebutuhan masyarakat akan busana,  perhiasan emas, berbagai aksesoris, serta kebutuhan belanja bahan makanan sehari-hari.\r\n\r\nPasar yang nampak mungil dari luar serta terkesan padat dikarenakan kawasan parkir yang padat ini ternyata memanjang kebelakang tembus ke Jalan Kramat Lontar sampai ke bantaran kali. Yang menarik dari Pasar Paseban adalah,  disini adalah pusat belanja busana yang ekonomis sekaligus ada pula kios-kios penjahit yang melayani berbagai jahitan pakaian pria-wanita, kebaya, obras, dan neci.', '08:00:00', '18:00:00', 0, 'Jl. Kramat Raya, RT.15/RW.1, Paseban, Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10440, Indonesia', '2016-12-14 10:30:03', '0000-00-00 00:00:00'),
(12, 'Pasar Rajawali', 22, 15, 0, '', '05:00:00', '09:00:00', 0, 'Jl. Rajawali Selatan XII, RT.8/RW.6, Gn. Sahari Utara, Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10720, Indonesia', '2016-12-14 10:31:30', '0000-00-00 00:00:00'),
(13, 'Pasar Teluk Gong', 22, 19, 0, '', '00:00:00', '23:45:00', 0, 'Jalan Raya Teluk Gong V No. 30, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta, Indonesia', '2016-12-14 10:42:00', '0000-00-00 00:00:00'),
(14, 'Pasar Gang Kancil', 22, 18, 0, '', '08:00:00', '18:00:00', 0, 'Jl. Keamanan I, RT.13/RW.3, Keagungan, Jakarta Barat, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11130, Indonesia', '2016-12-14 11:28:21', '0000-00-00 00:00:00');

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
(10, 7, 'img-17-52-23.jpg'),
(11, 7, 'img-17-52-30.jpg'),
(12, 7, 'img-17-52-34.jpg'),
(13, 7, 'img-17-52-38.jpg'),
(14, 7, 'img-17-52-43.jpg'),
(15, 8, 'img-17-53-05.jpg'),
(16, 8, 'img-17-56-11.jpg'),
(17, 8, 'img-17-56-16.jpg'),
(18, 8, 'img-17-56-21.jpg'),
(19, 8, 'img-17-56-25.jpg'),
(20, 8, 'img-17-56-30.jpg'),
(22, 9, 'img-17-57-09.jpg'),
(24, 9, 'img-17-57-29.jpg'),
(25, 9, 'img-17-57-33.jpg'),
(26, 9, 'img-17-57-39.jpg'),
(27, 10, 'img-17-59-07.jpg'),
(28, 10, 'img-17-59-11.jpg'),
(29, 10, 'img-17-59-16.jpg'),
(30, 10, 'img-17-59-27.jpg'),
(31, 10, 'img-17-59-32.jpg'),
(32, 10, 'img-17-59-36.jpg'),
(33, 11, 'img-18-00-21.jpg'),
(34, 11, 'img-18-00-26.jpg'),
(35, 11, 'img-18-00-30.jpg'),
(36, 11, 'img-18-00-34.jpg'),
(37, 11, 'img-18-00-39.jpg'),
(38, 11, 'img-18-00-44.jpg'),
(39, 13, 'img-18-01-30.jpg'),
(40, 13, 'img-18-01-35.jpg'),
(41, 13, 'img-18-01-40.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mst_pasar`
--
ALTER TABLE `mst_pasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mst_pasar_img`
--
ALTER TABLE `mst_pasar_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `mst_region`
--
ALTER TABLE `mst_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
