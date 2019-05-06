-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:9697
-- Generation Time: Aug 14, 2018 at 11:14 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bmkg`
--

-- --------------------------------------------------------

--
-- Table structure for table `par_audit_type`
--

CREATE TABLE IF NOT EXISTS `par_audit_type` (
  `audit_type_id` varchar(50) NOT NULL,
  `audit_type_name` varchar(100) NOT NULL,
  `audit_type_code` varchar(10) NOT NULL,
  `audit_type_desc` varchar(255) NOT NULL,
  `audit_type_opsi` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=pemeriksaan, 2=non pemeriksaan, 3=other',
  `audit_type_kredit` double DEFAULT NULL,
  `audit_type_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`audit_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_audit_type`
--

INSERT INTO `par_audit_type` (`audit_type_id`, `audit_type_name`, `audit_type_code`, `audit_type_desc`, `audit_type_opsi`, `audit_type_kredit`, `audit_type_del_st`) VALUES
('0525307297f9bed8984a8054918087dcf03c4bcf', 'Audit Kinerja', '', 'KIN', 1, 0.01, 1),
('4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'Audit Dengan Tujuan Tertentu', '', 'KHS', 1, 0.01, 1),
('04090de5ed0699ed0293ef73d3bb61d73388e072', 'Audit Dana Dekonsentrasi/TP', '', 'Audit Dana Dekonsentrasi/TP', 0, NULL, 0),
('d5aaabf0d82997143dc645655cbc911b4b5de4f4', 'Audit Keuangan', '', 'Audit atas laporan keuangan', 1, 0.01, 1),
('98cd0ca731da106235cc474a7608ad5750d8e1e8', 'Audit PBJ', '', 'PBJ', 1, 0.01, 1),
('9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'Audit Operasional', '', '', 1, 0.01, 1),
('efe9165cb8857eb7822a18c0aae62c36887e3615', 'Reviu LK', '', '', 2, 0.02, 1),
('7a08823fc15fb164dc0b3cb03664fe3fb1becfc0', 'Monitoring TL', '', '', 2, 0.02, 1),
('6f0349821c12229d4a7a74f1a86292c73fe105a5', 'Sosialisasi', '', '', 3, 0.03, 1),
('69b2d4fcc8b0fa804740c2c1f6d99db2fa5357ae', 'DIKLAT', '', '', 3, 0.03, 1),
('95c4470bc64a292858d57bb1fc312fb370af5064', 'Bimbingan Teknis', '', '', 3, 0.03, 1),
('c3353be8a9aa27f09f5ff7222d89ad895a855a2e', 'Pendampingan BPK', '', '', 2, 0.02, 1),
('ae80454b6152c548f85dfd3b7310871f97a14796', 'Rekonsiliasi', '', '', 2, 0.02, 1),
('0ca25b7817f691e853c19e447981dae6412e4cba', 'BMN', '', '', 3, 0.03, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
