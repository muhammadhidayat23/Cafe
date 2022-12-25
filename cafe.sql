-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 09:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pesan` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `pesan`, `create_at`) VALUES
('61ddcde16592e7.80106443', 'Muhammad Hidayat', 'muhammadhidayat@gmail.com', 'asdasdasdasdasd', '2022-01-11 18:35:13'),
('61fe9c1d2dcf61.29192521', 'Jhoni', 'user@gmail.com', 'Hello Woooorld!!!', '2022-02-05 15:47:41'),
('62035cb104b056.72271646', 'Zil', 'muhammadhidayat2312@gmail.com', 'asdasda', '2022-02-09 06:18:25'),
('62035e0c35f4d7.66797007', 'Anonim', 'user@gmail.com', 'Good job!!!', '2022-02-09 06:24:12'),
('621491f213cc50.65430968', 'Hidayat', 'muhammadhidayat@gmail.com', 'hghgfgh', '2022-02-22 07:34:10'),
('62b51b2a29f4c5.83789470', 'Ronaldo', 'ronal@gmail.com', 'tk sedap', '2022-06-24 02:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `setup_contact`
--

CREATE TABLE `setup_contact` (
  `id_contact` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `deskripsi` varchar(132) NOT NULL,
  `hero_img_1` varchar(255) NOT NULL,
  `hero_img_2` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_contact`
--

INSERT INTO `setup_contact` (`id_contact`, `title`, `deskripsi`, `hero_img_1`, `hero_img_2`, `status`, `created_at`) VALUES
('620357530efce4.48477067', 'Contact Person Seduhan Rindu', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.\"\"', 'story4.jpeg', 'image-story4.png', 'true', '2022-02-09 12:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `setup_home`
--

CREATE TABLE `setup_home` (
  `id` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `sub_title` varchar(124) NOT NULL,
  `hero_img` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_home`
--

INSERT INTO `setup_home` (`id`, `title`, `sub_title`, `hero_img`, `status`) VALUES
('61fe60f0c10ea7.89843001', 'It’s Always Time For Good Coffee', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.', 'images-header.png', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `setup_menu`
--

CREATE TABLE `setup_menu` (
  `id` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `sub_title` varchar(124) NOT NULL,
  `hero_img` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_menu`
--

INSERT INTO `setup_menu` (`id`, `title`, `sub_title`, `hero_img`, `status`) VALUES
('61f75f7a7cb204.65367381', 'Best Drinks Seduhan Rindu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.', 'images-header1.png', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `setup_merchandise`
--

CREATE TABLE `setup_merchandise` (
  `id` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `deskripsi` varchar(124) NOT NULL,
  `hero_img` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_merchandise`
--

INSERT INTO `setup_merchandise` (`id`, `title`, `deskripsi`, `hero_img`, `status`) VALUES
('61fe5cf5a2e940.07019443', 'Best Merchandise Seduhan Rindu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.', 'images-header.png', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `setup_story`
--

CREATE TABLE `setup_story` (
  `id` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `sub_title` varchar(124) NOT NULL,
  `hero_img` varchar(255) NOT NULL,
  `title_2` varchar(20) NOT NULL,
  `deskripsi_2` varchar(180) NOT NULL,
  `hero_img_2` varchar(255) NOT NULL,
  `title_3` varchar(20) NOT NULL,
  `deskripsi_3` varchar(180) NOT NULL,
  `hero_img_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup_story`
--

INSERT INTO `setup_story` (`id`, `title`, `sub_title`, `hero_img`, `title_2`, `deskripsi_2`, `hero_img_2`, `title_3`, `deskripsi_3`, `hero_img_3`) VALUES
('61f6adb7635903.62283643', 'Story About Seduhan Rindu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.', 'story.jpeg', 'OUR BEGINNING', '\"SINCE 2019 Kopi Yang Nikmat Akan Selalu Di Rindukan Penikmatnya Buka Setiap Hari : 09.30 - 23.00 WIB. Jl. Hangtuah ( Di Depan Rumah Hijau, Ruko 1 Pintu 2 Lantai )\"', 'image-story.png', 'OUR BACKGROUNDS', '\"SINCE 2019 Kopi Yang Nikmat Akan Selalu Di Rindukan Penikmatnya Buka Setiap Hari : 09.30 - 23.00 WIB. Jl. Hangtuah ( Di Depan Rumah Hijau, Ruko 1 Pintu 2 Lantai )\"', 'image-story1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(16) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
('61f7c23271c451.9', 'Basic', '2022-01-31 18:04:18'),
('61f7c25cb19725.5', 'Special', '2022-01-31 18:05:00'),
('61f7c265c337b2.1', 'Signature', '2022-01-31 18:05:09'),
('61f7c6a8c35e71.8', 'NonCoffee', '2022-01-31 18:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id_location` varchar(32) NOT NULL,
  `title_1` varchar(32) NOT NULL,
  `deskripsi_1` varchar(124) NOT NULL,
  `hero_img_1` varchar(255) NOT NULL,
  `deskripsi_2` varchar(140) NOT NULL,
  `hero_img_2` varchar(255) NOT NULL,
  `link_alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id_location`, `title_1`, `deskripsi_1`, `hero_img_1`, `deskripsi_2`, `hero_img_2`, `link_alamat`) VALUES
('61fbe05fc0ecf0.08037454', 'Locations Seduhan Rindu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Congue massa tellus viverra tempor vitae, mi integer tincidunt.i', 'story1.jpeg', '', 'image-story2.png', 'http://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merchandise`
--

CREATE TABLE `tbl_merchandise` (
  `id_merchandise` varchar(32) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merchandise`
--

INSERT INTO `tbl_merchandise` (`id_merchandise`, `nama_barang`, `foto`, `created_at`) VALUES
('620330b5d64312.71727526', 'Dompet', 'merchandise-1.png', '2022-02-09 10:10:45'),
('620330c6d281c8.74857546', 'Kantong Ajaib', 'merchandise-21.png', '2022-02-09 10:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_minuman`
--

CREATE TABLE `tbl_minuman` (
  `id_minuman` varchar(32) NOT NULL,
  `nama_minuman` varchar(32) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kategori` varchar(16) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_minuman`
--

INSERT INTO `tbl_minuman` (`id_minuman`, `nama_minuman`, `deskripsi`, `foto`, `id_kategori`, `created_at`) VALUES
('61dae1c87d0a01.62402960', 'Stroberry Soda Signature', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'stroberry_soda_sigrature.png', '61f7c265c337b2.1', '2022-01-09 20:23:20'),
('61dae1eed30857.49325126', 'Orange Blue Ocean', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'Orange_blue_ocean.png', '61f7c6a8c35e71.8', '2022-01-09 20:23:58'),
('61dae25156e384.55086136', 'Red Valved', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'Red_valved.png', '61f7c25cb19725.5', '2022-01-09 20:25:37'),
('61dae2657ef1d6.07051862', 'Matcha Latte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'matcha_latte.png', '61f7c25cb19725.5', '2022-01-09 20:25:57'),
('61dae2b413aa71.59756760', 'Green Tea', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'green_tea.png', '61f7c25cb19725.5', '2022-01-09 20:27:16'),
('61dae2d89e0d79.12228045', 'Coffie Latte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'coffie_latte.jpeg', '61f7c23271c451.9', '2022-01-09 20:27:52'),
('61dae2ebe97ff3.59450193', 'Asian Dolce Latte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'asian_dolce_latte.png', '61f7c25cb19725.5', '2022-01-09 20:28:11'),
('61dae6b93654c3.55730497', 'Rum Latte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet consequat lectus. Suspend', 'Rum_latte_auto_x2.jpg', '61f7c25cb19725.5', '2022-01-09 20:44:25'),
('62051c9ca2b415.77988719', 'Peach Squash', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classi', 'Peach_squash.jpeg', '61f7c6a8c35e71.8', '2022-02-10 21:09:32'),
('62051cde7ae0c6.86919199', 'Coffie Pandan', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classi', 'Coffie_Pandan_auto_x2.jpg', '61f7c25cb19725.5', '2022-02-10 21:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id_promo` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `deskripsi` varchar(72) NOT NULL,
  `masa_promo` varchar(40) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_promo`
--

INSERT INTO `tbl_promo` (`id_promo`, `title`, `deskripsi`, `masa_promo`, `foto`, `status`, `created_at`) VALUES
('6201203982f490.38559074', 'BUY 5 CUP, GET FREE 1 CUP', 'Dapatkan 1 Cup Varian Apa Saja Dengan Membeli 4 Cup Secara Bersamaan', 'Promo Berlaku 1 - 12 Februari 2022', 'image-ads2.png', 'true', '2022-02-07 20:35:53'),
('6201242b743f23.46487726', 'BUY 4 CUP, GET FREE 1 CUP', 'Dapatkan 1 Cup Varian Apa Saja Dengan Membeli 4 Cup Secara Bersamaan', 'Promo Berlaku 1 - 30 Januari 2022', 'image-ads3.png', 'true', '2022-02-07 20:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quote`
--

CREATE TABLE `tbl_quote` (
  `id_quote` varchar(32) NOT NULL,
  `quote` varchar(80) NOT NULL,
  `quote_img` varchar(255) NOT NULL,
  `status` enum('true','false') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quote`
--

INSERT INTO `tbl_quote` (`id_quote`, `quote`, `quote_img`, `status`, `created_at`) VALUES
('62013d3f998a32.50162675', '“Life Is Like A Cup Of Coffee Where Bitter And Sweet Meet In Warmth”', 'image-story.png', 'true', '2022-02-07 22:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `password_updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`, `password_updated_at`) VALUES
('6118b2a943acc2.78631959', 'Administrator', 'admin@gmial.com', 'admin', '$2y$10$ygrV6T8/IE3pvxiFIrfDeOHp77oMbTqONdizJATqWwwzIJlS6OD/G', '6118b2a943acc278631959.png', '2021-08-14 23:22:33', '2022-06-25 21:22:47', '2022-01-11 14:59:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_contact`
--
ALTER TABLE `setup_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `setup_home`
--
ALTER TABLE `setup_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_menu`
--
ALTER TABLE `setup_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_merchandise`
--
ALTER TABLE `setup_merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_story`
--
ALTER TABLE `setup_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `tbl_merchandise`
--
ALTER TABLE `tbl_merchandise`
  ADD PRIMARY KEY (`id_merchandise`);

--
-- Indexes for table `tbl_minuman`
--
ALTER TABLE `tbl_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `tbl_quote`
--
ALTER TABLE `tbl_quote`
  ADD PRIMARY KEY (`id_quote`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
