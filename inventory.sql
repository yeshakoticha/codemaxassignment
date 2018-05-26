-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2018 at 12:24 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

DROP TABLE IF EXISTS `car_model`;
CREATE TABLE IF NOT EXISTS `car_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `manf` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `reg_num` varchar(255) DEFAULT NULL,
  `note` text,
  `images` text,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`id`, `name`, `manf`, `color`, `year`, `reg_num`, `note`, `images`, `is_sold`) VALUES
(1, 'Alto', 'Maruti', 'Black', '2010', 'ABCD12334', 'Test', 'assets/img/uploads/15273373971874962041.jpg,assets/img/uploads/15273373971750869625.jpeg,', 1),
(2, 'Nano', 'Tata', 'Purple', '2009', 'ABCD8787897', 'Test 2', 'assets/img/uploads/1527337429173909292.jpg,assets/img/uploads/1527337429461768286.jpeg,', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'Maruti'),
(2, 'Tata');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
