-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:9697
-- Generation Time: Aug 20, 2018 at 12:46 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bangga_etila`
--

-- --------------------------------------------------------

--
-- Table structure for table `par_mail`
--

CREATE TABLE IF NOT EXISTS `par_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `par_mail`
--

INSERT INTO `par_mail` (`id`, `key`, `value`) VALUES
(1, 'username', 'coba@gmail.com'),
(2, 'password', 'coba'),
(3, 'secure', 'tls'),
(4, 'port', '587'),
(5, 'batas_waktu', '31-08-2018'),
(6, 'cc', 'cc@gmail.com'),
(7, 'bcc', 'bcc@gmail.com'),
(13, 'status', 'active'),
(14, 'smtp', 'smtp.gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
