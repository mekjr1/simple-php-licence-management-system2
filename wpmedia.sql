-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 06:40 AM
-- Server version: 5.5.16-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`) VALUES
(1, 'Abdul Gafar Meque', 'gafar_meque@hotmail.com', '222222'),
(2, 'Abdul Gafar Meque', 'kdkkd@home.com', '222222');

-- --------------------------------------------------------

--
-- Table structure for table `licence`
--

CREATE TABLE `licence` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `website_allowance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licence`
--

INSERT INTO `licence` (`id`, `name`, `price`, `website_allowance`) VALUES
(4, 'Regular', 49, 1),
(5, 'Silver', 69, 3),
(6, 'Platinum', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(256) NOT NULL,
  `licence_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `customer_id`, `licence_id`, `created`) VALUES
(4, '', 4, '0000-00-00 00:00:00'),
(5, '', 6, '0000-00-00 00:00:00'),
(6, '', 5, '0000-00-00 00:00:00'),
(7, '', 4, '0000-00-00 00:00:00'),
(8, '', 4, '2019-02-11 08:23:38'),
(9, '', 6, '2019-02-11 08:23:38'),
(10, '', 5, '2019-02-11 08:23:38'),
(11, '', 4, '2019-02-11 08:39:08'),
(12, '', 6, '2019-02-11 08:39:08'),
(13, '', 5, '2019-02-11 08:39:08'),
(14, '', 4, '2019-02-11 08:39:11'),
(15, '', 6, '2019-02-11 08:39:11'),
(16, '', 5, '2019-02-11 08:39:11'),
(17, '', 4, '2019-02-11 08:39:13'),
(18, '', 6, '2019-02-11 08:39:13'),
(19, '', 5, '2019-02-11 08:39:13'),
(20, '', 4, '2019-02-11 08:39:15'),
(21, '', 6, '2019-02-11 08:39:15'),
(22, '', 5, '2019-02-11 08:39:15'),
(23, '', 4, '2019-02-11 08:40:55'),
(24, '', 6, '2019-02-11 08:40:55'),
(25, '', 5, '2019-02-11 08:40:55'),
(26, '', 4, '2019-02-11 08:40:59'),
(27, '', 6, '2019-02-11 08:40:59'),
(28, '', 5, '2019-02-11 08:40:59'),
(29, '', 4, '2019-02-11 08:41:01'),
(30, '', 6, '2019-02-11 08:41:01'),
(31, '', 5, '2019-02-11 08:41:01'),
(32, '', 4, '2019-02-11 08:50:16'),
(33, '', 6, '2019-02-11 08:50:16'),
(34, '', 5, '2019-02-11 08:50:16'),
(35, '', 4, '2019-02-11 08:50:20'),
(36, '', 6, '2019-02-11 08:50:20'),
(37, '', 5, '2019-02-11 08:50:20'),
(38, '1', 4, '2019-02-11 08:52:19'),
(39, '1', 6, '2019-02-11 08:52:19'),
(40, '1', 5, '2019-02-11 08:52:19'),
(41, '1', 4, '2019-02-11 08:52:43'),
(42, '1', 6, '2019-02-11 08:52:43'),
(43, '1', 5, '2019-02-11 08:52:43'),
(44, '1', 4, '2019-02-11 08:53:03'),
(45, '1', 6, '2019-02-11 08:53:03'),
(46, '1', 5, '2019-02-11 08:53:03'),
(47, '1', 4, '2019-02-11 08:53:11'),
(48, '1', 6, '2019-02-11 08:53:11'),
(49, '1', 5, '2019-02-11 08:53:11'),
(50, '1', 4, '2019-02-11 08:53:38'),
(51, '1', 6, '2019-02-11 08:53:38'),
(52, '1', 5, '2019-02-11 08:53:38'),
(53, '1', 4, '2019-02-11 08:55:44'),
(54, '1', 6, '2019-02-11 08:55:44'),
(55, '1', 5, '2019-02-11 08:55:44'),
(56, '1', 4, '2019-02-11 08:55:56'),
(57, '1', 6, '2019-02-11 08:55:56'),
(58, '1', 6, '2019-02-11 12:59:44'),
(59, '1', 4, '2019-02-11 12:59:44'),
(60, '1', 4, '2019-02-11 13:02:05'),
(61, '1', 5, '2019-02-11 13:02:05'),
(62, '1', 6, '2019-02-11 13:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `licence_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `url`, `customer_id`, `licence_id`) VALUES
(4, 'www.go.com', 1, 40),
(5, 'www.google.com', 1, 38),
(6, 'www.facebook.com', 1, 38),
(7, 'www.facebook.com', 1, 39),
(8, 'www.facebook.com', 1, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `licence`
--
ALTER TABLE `licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
