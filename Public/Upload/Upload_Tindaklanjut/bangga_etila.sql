-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:9697
-- Generation Time: Aug 20, 2018 at 03:01 PM
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
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assign_id` varchar(50) NOT NULL,
  `assign_id_plan` varchar(50) NOT NULL,
  `assign_tipe_id` varchar(50) NOT NULL,
  `assign_no_lha` varchar(50) NOT NULL,
  `assign_date_lha` int(11) NOT NULL,
  `assign_tahun` int(4) NOT NULL,
  `assign_start_date` int(11) NOT NULL,
  `assign_end_date` int(11) NOT NULL,
  `assign_pendanaan` longblob NOT NULL,
  `assign_dasar` longblob NOT NULL,
  `assign_keterangan` longblob,
  `assign_pendahuluan` longblob NOT NULL,
  `assign_tujuan` longblob NOT NULL,
  `assign_instruksi` longblob NOT NULL,
  `assign_kegiatan` text NOT NULL,
  `assign_periode` varchar(100) NOT NULL,
  `assign_hari` int(3) NOT NULL,
  `assign_hari_persiapan` int(3) NOT NULL DEFAULT '0',
  `assign_hari_pelaksanaan` int(3) NOT NULL DEFAULT '0',
  `assign_hari_pelaporan` int(3) NOT NULL DEFAULT '0',
  `assign_biaya` int(15) NOT NULL,
  `assign_file` varchar(100) DEFAULT NULL,
  `assign_persiapan_awal` int(11) NOT NULL DEFAULT '0',
  `assign_persiapan_akhir` int(11) NOT NULL DEFAULT '0',
  `assign_pelaksanaan_awal` int(11) NOT NULL DEFAULT '0',
  `assign_pelaksanaan_akhir` int(11) NOT NULL DEFAULT '0',
  `assign_pelaporan_awal` int(11) NOT NULL DEFAULT '0',
  `assign_pelaporan_akhir` int(11) NOT NULL DEFAULT '0',
  `assign_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=ajukan, 2=setujui, 3=selesai, 4=tolak',
  `assign_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assign_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assign_id`, `assign_id_plan`, `assign_tipe_id`, `assign_no_lha`, `assign_date_lha`, `assign_tahun`, `assign_start_date`, `assign_end_date`, `assign_pendanaan`, `assign_dasar`, `assign_keterangan`, `assign_pendahuluan`, `assign_tujuan`, `assign_instruksi`, `assign_kegiatan`, `assign_periode`, `assign_hari`, `assign_hari_persiapan`, `assign_hari_pelaksanaan`, `assign_hari_pelaporan`, `assign_biaya`, `assign_file`, `assign_persiapan_awal`, `assign_persiapan_akhir`, `assign_pelaksanaan_awal`, `assign_pelaksanaan_akhir`, `assign_pelaporan_awal`, `assign_pelaporan_akhir`, `assign_status`, `assign_created_date`) VALUES
('015d816f70352e3b473482c3c6dd08afdde8fe97', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '0525307297f9bed8984a8054918087dcf03c4bcf', 'LHA001', 1522965600, 2019, 1522965600, 1523743200, '', '', '', '', '', '', 'Audit Kinerja', '10', 10, 3, 4, 3, 100000000, '', 1522965600, 1523138400, 1523224800, 1523484000, 1523570400, 1523743200, 2, '2018-04-06 04:51:13'),
('c2784e3df1f20144b6d5ffa2bc123549d93228f4', '1b25c3d46e7a4faef3cec013a876ccb2209a743b', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', '', 0, 2018, 1523829600, 1524607200, 0x3c703e6578616d706c653c2f703e, 0x3c703e6578616d706c653c2f703e, 0x3c703e6578616d706c653c2f703e, 0x3c703e6578616d706c653c2f703e, 0x3c703e4175646974206f7065726173696f6e616c3c2f703e, 0x3c703e6578616d706c653c2f703e, 'Audit Operasional', '10', 10, 3, 4, 3, 100000000, '', 1523829600, 1524002400, 1524088800, 1524348000, 1524434400, 1524607200, 2, '2018-04-16 13:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_auditee`
--

CREATE TABLE IF NOT EXISTS `assignment_auditee` (
  `assign_auditee_id_assign` varchar(50) NOT NULL,
  `assign_auditee_id_auditee` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_auditee`
--

INSERT INTO `assignment_auditee` (`assign_auditee_id_assign`, `assign_auditee_id_auditee`) VALUES
('015d816f70352e3b473482c3c6dd08afdde8fe97', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a'),
('015d816f70352e3b473482c3c6dd08afdde8fe97', ''),
('c2784e3df1f20144b6d5ffa2bc123549d93228f4', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a'),
('c2784e3df1f20144b6d5ffa2bc123549d93228f4', '');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_auditor`
--

CREATE TABLE IF NOT EXISTS `assignment_auditor` (
  `assign_auditor_id` varchar(50) NOT NULL,
  `assign_auditor_id_assign` varchar(50) NOT NULL,
  `assign_auditor_id_auditee` varchar(50) NOT NULL,
  `assign_auditor_id_auditor` varchar(50) NOT NULL,
  `assign_auditor_cost` varchar(15) NOT NULL,
  `assign_auditor_workday` int(3) NOT NULL DEFAULT '0',
  `assign_auditor_day` int(3) NOT NULL DEFAULT '0',
  `assign_auditor_prepday` int(5) NOT NULL DEFAULT '0',
  `assign_auditor_execday` int(5) NOT NULL DEFAULT '0',
  `assign_auditor_reportday` int(5) NOT NULL DEFAULT '0',
  `assign_auditor_id_posisi` varchar(50) NOT NULL,
  `assign_auditor_start_date` int(11) NOT NULL,
  `assign_auditor_end_date` int(11) NOT NULL,
  PRIMARY KEY (`assign_auditor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_auditor`
--

INSERT INTO `assignment_auditor` (`assign_auditor_id`, `assign_auditor_id_assign`, `assign_auditor_id_auditee`, `assign_auditor_id_auditor`, `assign_auditor_cost`, `assign_auditor_workday`, `assign_auditor_day`, `assign_auditor_prepday`, `assign_auditor_execday`, `assign_auditor_reportday`, `assign_auditor_id_posisi`, `assign_auditor_start_date`, `assign_auditor_end_date`) VALUES
('f7caf40b9994f460635895c8e71bd66338c780d5', '015d816f70352e3b473482c3c6dd08afdde8fe97', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '-8420000', 10, 10, 3, 4, 3, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 1522965600, 1523743200),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '-8420000', 10, 10, 0, 0, 0, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 1523829600, 1524607200),
('cba947c35f163a93324f1319c51c481b0f13c0bd', '015d816f70352e3b473482c3c6dd08afdde8fe97', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '63e53c4375c33a9b4d39e3f1f86b3ea777a5f22b', '76540000', 10, 10, 3, 4, 3, '6a70c2a39af30df978a360e556e1102a2a0bdc02', 1522965600, 1523743200);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_auditor_detil`
--

CREATE TABLE IF NOT EXISTS `assignment_auditor_detil` (
  `anggota_assign_detil_id` varchar(50) NOT NULL,
  `anggota_assign_detil_kode_sbu` varchar(10) NOT NULL,
  `anggota_assign_detil_jml_hari` varchar(5) NOT NULL,
  `anggota_assign_detil_nilai` int(16) NOT NULL,
  `anggota_assign_detil_total` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_auditor_detil`
--

INSERT INTO `assignment_auditor_detil` (`anggota_assign_detil_id`, `anggota_assign_detil_kode_sbu`, `anggota_assign_detil_jml_hari`, `anggota_assign_detil_nilai`, `anggota_assign_detil_total`) VALUES
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Repre', '9', 250000, 2250000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Taxi', '0', 170000, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Transport ', '0', 0, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Hotel', '8', 8720000, 69760000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Haria', '9', 160000, 1440000),
('149b8cbea285cb79f7659a709482211845ffe815', 'us_was', '9', 100000, 900000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Haria', '9', 210000, 1890000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Haria', '9', 0, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Pesawat Ek', '1', 150000, 150000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Pesawat Bi', '1', 150000, 150000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Haria', '0', 0, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Haria', '0', 210000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'us_was', '0', 100000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Haria', '0', 160000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Hotel', '-1', 8720000, -8720000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Transport ', '0', 0, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Taxi', '0', 170000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Repre', '0', 250000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Pesawat Ek', '1', 150000, 150000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Pesawat Bi', '1', 150000, 150000),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Uang Repre', '0', 250000, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Taxi', '0', 170000, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Transport ', '0', 0, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Hotel', '-1', 8720000, -8720000),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Uang Haria', '0', 160000, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'us_was', '0', 100000, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Uang Haria', '0', 210000, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Uang Haria', '0', 0, 0),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Pesawat Ek', '1', 150000, 150000),
('7c1ff6d6d3f35693a4549ddb3e58595626966894', 'Pesawat Bi', '1', 150000, 150000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Uang Repre', '9', 250000, 2250000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Taxi', '0', 170000, 0),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Transport ', '0', 0, 0),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Hotel', '8', 8720000, 69760000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Uang Haria', '9', 160000, 1440000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'us_was', '9', 100000, 900000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Uang Haria', '9', 210000, 1890000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Uang Haria', '9', 0, 0),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Pesawat Ek', '1', 150000, 150000),
('cba947c35f163a93324f1319c51c481b0f13c0bd', 'Pesawat Bi', '1', 150000, 150000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Repre', '0', 250000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Taxi', '0', 170000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Transport ', '0', 0, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Hotel', '-1', 8720000, -8720000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Haria', '0', 160000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'us_was', '0', 100000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Haria', '0', 210000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Haria', '0', 0, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Pesawat Ek', '1', 150000, 150000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Pesawat Bi', '1', 150000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_comment`
--

CREATE TABLE IF NOT EXISTS `assignment_comment` (
  `assign_comment_id` varchar(50) NOT NULL,
  `assign_comment_assign_id` varchar(50) NOT NULL,
  `assign_comment_desc` varchar(255) NOT NULL,
  `assign_comment_user_id` varchar(50) NOT NULL,
  `assign_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`assign_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_comment`
--

INSERT INTO `assignment_comment` (`assign_comment_id`, `assign_comment_assign_id`, `assign_comment_desc`, `assign_comment_user_id`, `assign_comment_date`) VALUES
('df0fbcb49c70df2ccf2e4776d0aa6c6f69f20aa9', '015d816f70352e3b473482c3c6dd08afdde8fe97', 'acc pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990900),
('a251d42133d7036a0303b659afc50c4e919aa5f2', '015d816f70352e3b473482c3c6dd08afdde8fe97', 'ok', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991029),
('ca29910d8b98251b33b71c3f4a0a90b80ecffe22', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', 'acc', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886207);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_lha`
--

CREATE TABLE IF NOT EXISTS `assignment_lha` (
  `lha_id` varchar(50) NOT NULL,
  `lha_id_assign` varchar(50) NOT NULL,
  `lha_no` varchar(50) NOT NULL,
  `lha_date` int(11) NOT NULL,
  `lha_ringkasan` longblob NOT NULL,
  `lha_dasar_audit` longblob NOT NULL,
  `lha_tujuan_audit` longblob NOT NULL,
  `lha_metodologi` longblob NOT NULL,
  `lha_strategi_laporan` longblob NOT NULL,
  `lha_data_auditan` longblob NOT NULL,
  `lha_ruanglingkup` longblob NOT NULL,
  `lha_batasan` longblob NOT NULL,
  `lha_kegiatan` longblob NOT NULL,
  `lha_hasil` longblob NOT NULL,
  `lha_penutup` longblob NOT NULL,
  `lha_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=ajukan, 2=approve_dalnis, 3=approve_daltu, 4=approve_inspektur, 5=tolak_dalnis, 6=tolak_daltu, 7=tolak_inspektur',
  PRIMARY KEY (`lha_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_lha`
--

INSERT INTO `assignment_lha` (`lha_id`, `lha_id_assign`, `lha_no`, `lha_date`, `lha_ringkasan`, `lha_dasar_audit`, `lha_tujuan_audit`, `lha_metodologi`, `lha_strategi_laporan`, `lha_data_auditan`, `lha_ruanglingkup`, `lha_batasan`, `lha_kegiatan`, `lha_hasil`, `lha_penutup`, `lha_status`) VALUES
('09d02b7a28b236e88fb90170c8fa189ab7c721f3', '42c0d385b473092b588cee3c859f3f4592f4eafc', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
('fc143213e2a5fd3e2c2ac1620d8e7c57ad4fde6a', '015d816f70352e3b473482c3c6dd08afdde8fe97', 'LHA001', 1522965600, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, '', 0x3c703e4578616d706c653c2f703e, 0x3c703e4578616d706c653c2f703e, 4),
('6e5389262e6c17f26804bc7f483437ea944cf509', '3b2a25ebc708b6686e70c26b5de2b3a1ed190259', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
('8c41835e68dd65c6e0ffbe05459f037687df47d5', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_lha_attachment`
--

CREATE TABLE IF NOT EXISTS `assignment_lha_attachment` (
  `lha_attach_id` varchar(50) NOT NULL,
  `lha_attach_id_assign` varchar(50) NOT NULL,
  `lha_attach_name` varchar(100) NOT NULL,
  PRIMARY KEY (`lha_attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_lha_attachment`
--

INSERT INTO `assignment_lha_attachment` (`lha_attach_id`, `lha_attach_id_assign`, `lha_attach_name`) VALUES
('5ef261bec7ebfc5c1fbaafc876711b49fb958b4e', '015d816f70352e3b473482c3c6dd08afdde8fe97', 'e-tila-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_lha_comment`
--

CREATE TABLE IF NOT EXISTS `assignment_lha_comment` (
  `lha_comment_id` varchar(50) NOT NULL,
  `lha_comment_lha_id` varchar(50) NOT NULL,
  `lha_comment_desc` varchar(255) NOT NULL,
  `lha_comment_user_id` varchar(50) NOT NULL,
  `lha_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`lha_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_surat_comment`
--

CREATE TABLE IF NOT EXISTS `assignment_surat_comment` (
  `surat_comment_id` varchar(50) NOT NULL,
  `surat_comment_surat_id` varchar(50) NOT NULL,
  `surat_comment_desc` varchar(255) NOT NULL,
  `surat_comment_user_id` varchar(50) NOT NULL,
  `surat_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`surat_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_surat_comment`
--

INSERT INTO `assignment_surat_comment` (`surat_comment_id`, `surat_comment_surat_id`, `surat_comment_desc`, `surat_comment_user_id`, `surat_comment_date`) VALUES
('b11011b6d4fc706eac204e3d2f1e8cb783f5137d', '979779828918eda697013fd747ab857a20164459', 'acc pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991533),
('8af975303239512e580438174fd8aa050e3f5c6b', '979779828918eda697013fd747ab857a20164459', 'oke', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991543),
('e04310c8cc29058b7ea8053031b9b5b7a7cde75e', '9ee220615e6f10dac90dc862753ffdaa7edd6e69', 'acc', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886270);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_surat_tugas`
--

CREATE TABLE IF NOT EXISTS `assignment_surat_tugas` (
  `assign_surat_id` varchar(50) NOT NULL,
  `assign_surat_id_assign` varchar(50) NOT NULL,
  `assign_surat_no` varchar(50) NOT NULL,
  `assign_surat_tgl` int(11) NOT NULL,
  `assign_surat_jabatanTTD` varchar(50) NOT NULL,
  `assign_surat_tembusan` varchar(100) NOT NULL,
  `assign_surat_id_auditorTTD` varchar(50) NOT NULL,
  `assign_surat_id_userPropose` varchar(50) NOT NULL,
  `assign_surat_tgl_userPropose` int(11) NOT NULL,
  `assign_surat_id_userApprove` varchar(50) NOT NULL,
  `assign_surat_tgl_userApprove` int(11) NOT NULL,
  `assign_surat_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=ajukan, 2=setuju, 3=dikembalikan',
  PRIMARY KEY (`assign_surat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_surat_tugas`
--

INSERT INTO `assignment_surat_tugas` (`assign_surat_id`, `assign_surat_id_assign`, `assign_surat_no`, `assign_surat_tgl`, `assign_surat_jabatanTTD`, `assign_surat_tembusan`, `assign_surat_id_auditorTTD`, `assign_surat_id_userPropose`, `assign_surat_tgl_userPropose`, `assign_surat_id_userApprove`, `assign_surat_tgl_userApprove`, `assign_surat_status`) VALUES
('979779828918eda697013fd747ab857a20164459', '015d816f70352e3b473482c3c6dd08afdde8fe97', 'S001', 1522965600, 'PROGRAMMER', 'GUGUS WIDIANDITO', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991543, '', 0, 2),
('9ee220615e6f10dac90dc862753ffdaa7edd6e69', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '756987865', 1523829600, 'Auditoe', 'example', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886276, '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_upload_awal`
--

CREATE TABLE IF NOT EXISTS `assignment_upload_awal` (
  `upload_awal_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_awal_id_assign` varchar(50) NOT NULL,
  `upload_awal_nama_file` varchar(255) NOT NULL,
  PRIMARY KEY (`upload_awal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auditee`
--

CREATE TABLE IF NOT EXISTS `auditee` (
  `auditee_id` varchar(50) NOT NULL,
  `auditee_kode` varchar(10) NOT NULL,
  `auditee_name` varchar(100) NOT NULL,
  `auditee_parrent_id` varchar(50) NOT NULL DEFAULT '0',
  `auditee_inspektorat_id` varchar(50) NOT NULL,
  `auditee_propinsi_id` varchar(50) NOT NULL,
  `auditee_kabupaten_id` varchar(50) NOT NULL,
  `auditee_alamat` varchar(500) NOT NULL,
  `auditee_telp` varchar(15) NOT NULL,
  `auditee_ext` varchar(10) NOT NULL,
  `auditee_fax` varchar(15) NOT NULL,
  `auditee_email` varchar(100) DEFAULT NULL,
  `auditee_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`auditee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditee`
--

INSERT INTO `auditee` (`auditee_id`, `auditee_kode`, `auditee_name`, `auditee_parrent_id`, `auditee_inspektorat_id`, `auditee_propinsi_id`, `auditee_kabupaten_id`, `auditee_alamat`, `auditee_telp`, `auditee_ext`, `auditee_fax`, `auditee_email`, `auditee_del_st`) VALUES
('89a9a89e9ab60b3a2b4effd30baa16ce08e502b3', '001', 'Tes Auditee', '0', '', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4e99d9b15a57cb77bfe5701803b57dd3ca46885e', '', '', '', '', NULL, 0),
('56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '2000', 'SEKRETARIAT UTAMA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('5c730b7e75cf5af124b8cdae7adfbda7af9d8d7e', '2100', 'BIRO PERENCANAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('3b6f134d4fbccfcb90d76fd8db41c6f9af89f6f2', '2110', 'BAGIAN RENCANA DAN TARIF', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f130d8ec22ea3af82efe4f5d274c05b439532e07', '2120', 'BAGIAN PROGRAM DAN PENYUSUNAN ANGGARAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d5ba18c164549dd0a47fc4f53cfe5cf97a0afb48', '2130', 'BAGIAN PEMANTAUAN DAN EVALUASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', '2200', 'BIRO HUKUM DAN ORGANISASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('2b37a62a00270ee5c56cb5e6aed7fc6ee659f4ce', '2210', 'BAGIAN PERATURAN PERUNDANG-UNDANGAN DAN PERTIMBANGAN HUKUM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9cb59b06e8139a79d90a8969db0e912fcafa8c11', '2220', 'BAGIAN KERJASAMA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('c79b2c38e4a71d465ba3004ebb14966daedf14cb', '2230', 'BAGIAN ORGANISASI DAN TATALAKSANA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9ab2d5426492ad03b3796bd1e9222eadc66fc1f2', '2240', 'BAGIAN HUBUNGAN MASYARAKAT', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d418fd152bfdeed4eefcee87cda50bd6c086ef91', '2300', 'BIRO UMUM DAN SUMBER DAYA MANUSIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('ff7bf3262bec2b88379e03fbd9f16bccd61d514c', '2310', 'BAGIAN SUMBER DAYA MANUSIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('c08ac92e7adeae8163a6d9e57452fdf46f35737f', '2320', 'BAGIAN KEUANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f90af7566497423d2bae16253465d4c14e419989', '2330', 'BAGIAN PERLENGKAPAN DAN BARANG MILIK NEGARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('8d1642defa775904130fc349ab9f50947cf89deb', '2340', 'BAGIAN TATA USAHA DAN PROTOKOL', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('db85aeac4b42dfb1824f64dc6cf30ce6be0ab8ff', '2111', 'SUBBAGIAN RENCANA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('8d3aaf79b2f93d69ab1e03e660f2b44354b76daa', '2112', 'SUBBAGIAN TARIF', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('87439eae10a330f44fed10e4a2c31d3de11c6f8c', '2113', 'SUBBAGIAN PINJAMAN/HIBAH LUAR NEGERI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b934060ad3da7246fec29f5003bdf0362703c3d8', '2121', 'SUBBAGIAN PROGRAM DAN PENYUSUNAN ANGGARAN I', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d089b5098ad1c540cf237d8ef32995942b066695', '2122', 'SUBBAGIAN PROGRAM DAN PENYUSUNAN ANGGARAN II', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('010b29786694ae4a48163f0618e27d9ff8859ab8', '2123', 'SUBBAGIAN PROGRAM DAN PENYUSUNAN ANGGARAN III', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9cabb164a9375642e01bc72ea1af037d2d07e4b8', '2131', 'SUBBAGIAN PEMANTAUAN DAN EVALUASI I', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('15d8543e3d92aa065268b5563da082b68440d3f6', '2132', 'SUBBAGIAN PEMANTAUAN DAN EVALUASI II', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '', '', '', '', '', NULL, 1),
('09758f8f60e88e8c8ef4e520a14cc21a9d1898cb', '2133', 'SUBBAGIAN PEMANTAUAN DAN EVALUASI III', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('464ece92eed468c8a005e2cf369d4f8ca2c43319', '2211', 'SUBBAGIAN PERATURAN PERUNDANG-UNDANGAN I', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('5e6cafd32538b7c1f26fad3e708f30d532936812', '2212', 'SUBBAGIAN PERATURAN PERUNDANG-UNDANGAN II', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('6840d9fb287b8a2057fb491aa0f9d60e30fee443', '2213', 'SUBBAGIAN PERTIMBANGAN DAN INFORMASI HUKUM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('c8efc7d02eab7e07fb44c3a0066b4742ce4212b4', '2221', 'SUBBAGIAN KERJASAMA LUAR NEGERI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('aedf70b79ad7d86a54d89fcf316384fa0dd4c7fc', '2222', 'SUBBAGIAN KERJASAMA DALAM NEGERI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('fd9d6b1cd1cf65abcea342ed35896b6810a5cec5', '2231', 'SUBBAGIAN ORGANISASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('01f3768eb3c6abed4d81603af8e965e3ad6194e1', '2232', 'SUBBAGIAN TATA LAKSANA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('469c0f04fb712c7ea6f2891a7ef4dcd2595b1344', '2241', 'SUBBAGIAN PUBLIKASI DAN DOKUMENTASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('7d8180dceb928fa7fdc11afc04ff580550e4a689', '2242', 'SUBBAGIAN HUBUNGAN PERS DAN MEDIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('2dec62a03a142f306b7147f08fe1abe767f49d3d', '2311', 'SUBBAGIAN PERENCANAAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('ba3b7c17e5a8b3c2393e2f8ac9bf7f0225a19de5', '2312', 'SUBBAGIAN MANAJEMEN DAN EVALUASI KINERJA DAN KESEJAHTERAAN SUMBER DAYA MANUSIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9a8824da4b69d7a99e9059f360480ff05fc8d1c0', '2313', 'SUBBAGIAN MUTASI DAN PENGELOLAAN JABATAN FUNGSIONAL SUMBER DAYA MANUSIA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('77d559784d63d854b73498766a621f2b0fb4fcc2', '2321', 'SUBBAGIAN PERBENDAHARAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('182a5585d136754655c37564447a4e49573f05c7', '2322', 'SUBBAGIAN GAJI DAN PENERIMAAN NEGARA BUKAN PAJAK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('95b2f20172246fe3084f9ee001ad12bd93f1f52d', '2323', 'SUBBAGIAN AKUNTANSI DAN PELAPORAN KEUANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('5eae60d489dc5b67a2664c47ebbb7f2df950fcc6', '2331', 'SUBBAGIAN PENGADAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('404eb5ce20f64ebe85d7d565645ba26d4caa513e', '2332', 'SUBBAGIAN PENGELOLAAN BARANG MILIK NEGARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('723c7d892c059b2305eb204c8a3525bf77b54ad9', '2333', 'SUBBAGIAN PEMELIHARAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('bcb0c9f1dd2a3dc11fbaf0e56ee928501881a92e', '2341', 'SUBBAGIAN PERSURATAN DAN ARSIP', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('dca3212727138bdae16d061cdc5efa95843ace3c', '2342', 'SUBBAGIAN RUMAH TANGGA DAN PROTOKOL', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('58f2f1ecb818b17d8267b29b5ddc0725f7f8e896', '2343', 'UNIT TATA USAHA PIMPINAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('6784c13c54ea627bf5e793a3989fb76298d0b908', '3000', 'DEPUTI SIDANG METEOROLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('64b39728f1120949c38b235988d7d80dc23e844e', '3100', 'PUSAT METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d9171a58ed24f2b9660ca5f70b8e97f2b9e38ddb', '3110', 'BIDANG MANAJEMEN OBSERVASI METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d6f9165152b97ac15fd3cbbfb7e49d0ce741a34b', '3120', 'BIDANG MANAJEMEN OPERASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f5668483efcf394b3f050cf57bbc6c976764c53e', '3130', 'BIDANG INFORMASI METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('cb0d8da839e2340fad7326d021b20468f9a1ac05', '3200', 'PUSAT METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('06d3e3bfa7cb594a7a53e01885a888aab9d9ec57', '3210', 'BIDANG MANAJEMEN METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('35ce1d6350b4f0ab9b7ea95ca134a1f5653954f6', '3220', 'BIDANG INFORMASI METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('405c8393c0b05909fd170cee62b67e9ae19298a9', '3300', 'PUSAT METEOROLOGI PUBLIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('0c2556def48fd2712282dc72226ada111cf718cf', '3320', 'BIDANG LAYANAN INFORMASI CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('fd6a50c9bdb65025a3724ce8a034bdef74d15e5b', '3330', 'BIDANG PREDIKSI DAN PERINGATAN DINI CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('ef7e35a083eefd2663ddf9ee17217e2c411aec26', '3340', 'BIDANG PENGELOLAAN CITRA INDERAJA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b220e633660fc71ef3118ee1e95d49dfad99923b', '3111', 'SUBBIDANG MANAJEMEN OBSERVASI METEOROLOGI PERMUKAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('1e3ecbd4925f41b0548b3df1a6d561169e461e54', '3112', 'SUBBIDANG MANAJEMEN OBSERVASI UDARA ATAS', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('be2c44cdc110f4228633bc085ba91e0f2e8e3d96', '3121', 'SUBBIDANG MANAJEMEN OPERASI METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a6bd5ad20836bb354face0fdb0fc353ab6ca3911', '3122', 'SUBBIDANG MANAJEMEN OPERASI METEOROLOGI PUBLIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('e58c033456cae9382fb23bb4eceee30ba0823b03', '3131', 'SUBBIDANG LAYANAN INFORMASI METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('e84cde1b90019080396ac4155ed4cff38dcaf3d8', '3132', 'SUBBIDANG DISEMINASI INFORMASI METEOROLOGI PENERBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('381e9ba16ab92ac874216b1b346466da7864cfdb', '3211', 'SUBBIDANG MANAJEMEN OBSERVASI METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('fed00a05083d90973602eea205841ae5845c0ae6', '3212', 'SUBBIDANG MANAJEMEN OPERASI METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('030ca3aae185de53a13877eb608ebdd3b1f824d1', '3221', 'SUBBIDANG ANALISIS DAN PREDIKSI METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('aeeefa12f188043e6987e0dbc7a23b66c4de9f47', '3222', 'SUBBIDANG LAYANAN INFORMASI METEOROLOGI MARITIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('7b679e9ab7a562156be54472fcac29ed8ba0ebbd', '3311', 'SUBBIDANG PRODUKSI INFORMASI CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f11905cdfd0e7d45af520a197aa63577f13cd7fa', '3312', 'SUBBIDANG DISEMINASI INFORMASI CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f46fd5ae4e48226906c7719204022d2bf39f430c', '3321', 'SUBBIDANG PREDIKSI CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('c19e3f42689ad662ae54a1d2017101969a8fe6c2', '3322', 'SUBBIDANG PERINGATAN CUACA DINI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('3c085078197cebfd7ebf520965b671ba5dafce39', '3331', 'SUBBIDANG PENGELOLAAN CITRA RADAR CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('409992c2463bd0dc67975a71fab1d05a17360b61', '3332', 'SUBBIDANG PENGELOLAAN CITRA SATELIT CUACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('16e0d7f343ee4e093addb40411fab99f946c080d', '4000', 'DEPUTI BIDANG KLIMATOLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('daac8ce8e9843cd20856065be39c60528903eba7', '4100', 'PUSAT INFORMASI PERUBAHAN IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('301c10175fbec82fb1cf9d76ac98e7e915e13608', '4110', 'BIDANG ANALISIS PERUBAHAN IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('4680932c407cba677a893fadbf1f7ac0bd473533', '4120', 'BIDANG ANALISIS VARIABILITAS IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b78d548474c8bc8d1bc7cdcff2afee8f93e6eec8', '4130', 'BIDANG MANAJEMEN OPERASI IKLIM DAN KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('8df5e752834ce5ab8c9027f8417349f68e8b9912', '4200', 'PUSAT LAYANAN INFORMASI IKLIM TERAPAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('399cf15c836ab5d6edc55586d60ff8f2a3f5df58', '4210', 'BIDANG INFORMASI IKLIM TERAPAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('0d40688ff212bdc7ea11a1d2c8ff54c05cdc258a', '4220', 'BIDANG INFORMASI KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('570d8a4cf5e8f4b16bbf2539855c2e9bab1c4d18', '4230', 'BIDANG DISEMINASI INFORMASI IKLIM DAN KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('784a0cf8c5f4b4a2c44b2b8e4980046361715e4c', '4111', 'SUBBIDANG ANALISIS DAN PROYEKSI PERUBAHAN IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('03a411151d444d74bc2821e19548bc8f7ff053d2', '4112', 'SUBBIDANG ANALISIS KOMPOSISI KIMIA ATMOSFER', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('20251402fa68d4cf1f92a76251ac1ad3bacd191a', '4121', 'SUBBIDANG ANALISIS DAN INFORMASI IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9704f50ef1caa34186608d7d31b5e131d2cb6e51', '4122', 'SUBBIDANG PERINGATAN DINI IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('2b958dca98e7e332df535368b35f950ecebc80c3', '4131', 'SUBBIDANG MANAJEMEN OPERASI IKLIM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f1f9fbfdbbf0bc521adb18c5b64f77646cd8976e', '4132', 'SUBBIDANG MANAJEMEN OPERASI KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('58d543bef203e4029efdbf44e6822706ddbae609', '4211', 'SUBBIDANG INFORMASI IKLIM LINGKUNGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('179ebe2e40ff38d879e97db804405917df85d62a', '4212', 'SUBBIDANG INFORMASI IKLIM INFRASTRUKTUR', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f0b3b920b90a8c9899e7f9abbfe9715fb6f8214e', '4221', 'SUBBIDANG INFORMASI GAS RUMAH KACA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('eb4c5b84e259720a0bb901484d2452c74c7f2404', '4222', 'SUBBIDANG INFORMASI PENCEMARAN UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('934ef4ae63a8b0290a4d88b718cfa66348dc6a1f', '4231', 'SUBBIDANG PRODUKSI INFORMASI IKLIM DAN KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('207482be6a4898caeb0e5d7f4daf1a94c8f2a231', '4232', 'SUBBIDANG SISTEM INFORMASI IKLIM DAN KUALITAS UDARA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('3eebc46db418e897bb81454e6d5c69eb16e76ccc', '5000', 'DEPUTI BIDANG GEOFISIKA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('58dad9abfc30a39357cc322192b459a3c4adfd55', '5100', 'PUSAT GEMPA BUMI DAN TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('7b7e7193a65f9fb91b9b209f4c49004d117530ed', '5110', 'BIDANG INFORMASI GEMPA BUMI DAN PERINGATAN DINI TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b735c8e8894a792ca50c2889b7b0fe34837afe51', '5120', 'BIDANG MITIGASI GEMPA BUMI DAN TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('4b634553a41ec3134de446b76a59c6d39fdac9fb', '5130', 'BIDANG MANAJEMEN  OPERASI GEMPA BUMI DAN TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f991fdf71c3473088aa46af8b069c18cd2b9eb92', '5200', 'BIDANG SEISMOLOGI TEKNIK, GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b010aba7ddf91edac3bebe86ac977d07cc8c594a', '5210', 'BIDANG SEISMOLOGI TEKNIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('bb463e5639737eee95b643cfb057d97d23851a3a', '5220', 'BIDANG GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9573e202b1e1bd8375c47302e64bf9f8ebb29680', '5230', 'BIDANG MANAJEMEN OPERASI SEISMOLOGI TEKNIK, GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('891bfbb19f13f97009e6e3bbb3d2162ba17d19e3', '5111', 'SUBBIDANG INFORMASI GEMPA BUMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('36d1d5711acaf83c43b6b11d878a68bcd03792ee', '5112', 'SUBBIDANG PERINGATAN DINI TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('5e169887b6485c341debe8cddf8c157446237d1d', '5121', 'SUBBIDANG MITIGASI GEMPA BUMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('50946653e36dd5243e95b9933d093ef5e0542b8f', '5122', 'SUBBIDANG MITIGASI TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('99f772851f1f226d0f51f604e2b314602da8a03f', '5131', 'SUBBIDANG MANAJEMEN OPERASI GEMPA BUMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('964d508d675455b8e73864e964559629d294e529', '5132', 'SUBBIDANG MANAJEMEN OPERASI TSUNAMI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('e7151799284e5f428458d99c57f91650c397180b', '5211', 'SUBBIDANG ANALISIS SEISMOLOGI TEKNIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('234eefd0a463fe610b87cd5d4e93295c9ad3d4f4', '5212', 'SUBBIDANG LAYANAN INFORMASI SEISMOLOGI TEKNIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('f651edee6b347b8c6c43b7e6f9b79346a243b65a', '5221', 'SUBBIDANG ANALISIS GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('7726b02bf93915fb6b37cf2ea9aadfabe90f9436', '5222', 'SUBBIDANG LAYANAN INFORMASI GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a6c93b0605af11b4b219eb0d138e57832b668e8a', '5231', 'SUBBIDANG MANAJEMEN OPERASI SEISMOLOGI TEKNIK', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('e0c69ccdbf50fb6856a61c9b167cef37776c1aad', '5232', 'SUBBIDANG MANAJEMEN OPERASI GEOFISIKA POTENSIAL DAN TANDA WAKTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('ca00c6b7157eac23277c411db1bb6a51ee93c49a', '6000', 'DEPUTI BIDANG INSTRUMENTASI, KALIBRASI, REKAYASA, DAN JARINGAN KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('09797cae499e0b0a3e25e1afc5aec94ca4a67253', '6100', 'PUSAT INSTRUMENTASI, KALIBRASI, DAN REKAYASA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b91b2fe429c568ab3387b899ff0ea4909936a08a', '6110', 'BIDANG INSTRUMENTASI, KALIBRASI, DAN REKAYASA, PERALATAN METEOROLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('971ab85e1b243bbbd97f6c89914c0f0544735688', '6120', 'BIDANG INSTRUMENTASI, KALIBRASI, DAN REKAYASA PERALATAN KLIMATOLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a86d544038ea986947b40fc3aac761a9e0ec94de', '6130', 'BIDANG INSTRUMENTASI, KALIBRASI, DAN REKAYASA PERALATAN GEOFISIKA', '09797cae499e0b0a3e25e1afc5aec94ca4a67253', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('9cc573f4467ea3d3012022afd6e40b78cb523c24', '6200', 'PUSAT DATABASE', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('7bd19500b190ff02fb053cbc77cbfc75fc325497', '6210', 'BIDANG MANAJEMEN DATABASE', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('355cb27ae4edc858c0e623da2642cfac0229b4cc', '6220', 'BIDANG PENGEMBANGAN DATABASE', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('91f43779eb78a87715174ed39ffa091e996cdb2f', '6230', 'BIDANG PEMELIHARAAN DATABASE', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('caf5949295ed9d0a4185275f32b13e7c5bc2965e', '6300', 'PUSAT JARINGAN KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('8da2b9f6ed5e7bafc1b0f1d259ed38bf0f836194', '6310', 'BIDANG OPERASIONAL JARINGAN KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a9ede7084eff8ca6bc0291c478aaa9a942ed289f', '6320', 'BIDANG PENGEMBANGAN JARINGAN KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a9dd1038fd24ab7b31478e26fe22a0d107c9d76a', '6330', 'BIDANG MANAJEMEN JARINGAN KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b14d17c6476e13d8158fadcb9ff83302561d3dc6', '6111', 'SUBBIDANG INSTRUMENTASI DAN REKAYASA PERALATAN METEOROLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('10a1d231299e6d4c4d38aafd044e1570ae009f44', '6112', 'SUBBIDANG KALIBRASI PERALATAN METEOROLOGI', '0', '', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b7933bd6cc9c952fbe36a3a9ed0b8750585ceaee', '6121', 'SUBBIDANG INSTRUMENTASI DAN REKAYASA PERALATAN KLIMATOLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('13c6e913e37a25e8a891fa02e8e803a1df4b15cc', '6122', 'SUBBIDANG KALIBRASI PERALATAN KLIMATOLOGI', '0', '', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a76df8ffc8485d4ca3c40086b48b081cb98608a4', '6131', 'SUBBIDANG INSTRUMENTASI DAN REKAYASA PERALATAN GEOFISIKA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('99b4b851f0f1f0ff286a3aa1909abc145c7b4fb7', '6132', 'SUBBIDANG KALIBRASI PERALATAN GEOFISIKA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('fb1dad6d4bc9509ff2a9c0948339194972dc4c6c', '6211', 'SUBBIDANG MANAJEMEN DATABASE MKG', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('872e28b0b4ff7ccc060af1eb3b68c82736348846', '6212', 'SUBBIDANG MANAJEMEN DATABASE UMUM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('3a8b45970457a8eed6603d020e6881f651b903e5', '6221', 'SUBBIDANG PENGEMBANGAN DATABASE MKG', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('937b94b0555e5906da28033dc0c8bb3da8bca2be', '6222', 'SUBBIDANG PENGEMBANGAN DATABASE UMUM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('6cb2e510a544bd5150629c04496ddf0afa373ae6', '6231', 'SUBBIDANG PEMELIHARAAN DATABASE MKG', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('55e0b2abe2b62c8e2d5d492174f39a480845780a', '6232', 'SUBBIDANG PEMELIHARAAN DATABASE UMUM', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a9f63ae95970813bc3af067373dd19f05b5ef500', '6311', 'SUBBIDANG OPERASIONAL TEKNOLOGI KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('1121d1e9ba02db4a9b8e004b8d48d96213e7c4f3', '6312', 'SUBBIDANG OPERASIONAL TEKNOLOGI INFORMASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('681b578e75e1809db119f91f9d4f0d66033b7321', '6321', 'SUBBIDANG PENGEMBANGAN TEKNOLOGI KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('ffcb86eae643c160f52005694d3ff7b9eb1cb18b', '6322', 'SUBBIDANG PENGEMBANGAN TEKNOLOGI INFORMASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a13942beb6d08721d5d6ddebd6e5200cde47e932', '6331', 'SUBBIDANG MANAJEMEN TEKNOLOGI KOMUNIKASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('b5b8afbe19921cfc280012d171fc5674469e8d83', '6332', 'SUBBIDANG MANAJEMEN TEKNOLOGI INFORMASI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('64f8c68205795e44b0312934d283e55ef33e869e', '7000', 'INSPEKTORAT', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('a6cf86eee1eb98387deb177526c077fc2b0aa98e', '7100', 'PUSAT PENELITIAN DAN PENGEMBANGAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('6d91ac0a361cb102873d39ad3c7a21a6fa1634af', '7110', 'SUBBAGIAN TATA USAHA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('53510035965323c6dd6907ee8bc15649655776be', '7120', 'BAGIAN PENELITIAN DAN PENGEMBANGAN METEOROLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('c6208dac7e29146636fcd9325ef7a1795b3ae4f6', '7130', 'BIDANG PENELITIAN DAN PENGEMBANGAN KLIMATOLOGI', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('747ad09de5a49306683d7b73798dc5ccc9ac0b48', '7140', 'BIDANG PENELITIAN DAN PENGEMBANGAN GEOFISIKA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('303eb55cb225c1187aa0eeafc18444bd76a1e0c9', '7200', 'PUSAT PENDIDIKAN DAN PELATIHAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('20db4de976e5c935d52c453c7280de91e5723547', '7220', 'BIDANG PERENCANAAN, PENGEMBANGAN, DAN PENJAMINAN MUTU', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('d28b2198fb0fb47f0aaa6242628ccf06d5339d17', '7210', 'BAGIAN TATA USAHA', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('bd4dc2d2e2171875b97428045c9120d69bd00dbe', '7230', 'BAGIAN PENYELENGGARAAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', '', '', '', '', NULL, 1),
('5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'I/00', 'BALAI BESAR METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA WILAYAH I', '64f8c68205795e44b0312934d283e55ef33e869e', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', 'Jl. Ngumban Surbakti No. 15 Selayang II Medan', '061-8222877', '', '061-8222877', 'bbmkg1@bmkg.go.id', 1),
('be097c32eebc0fe4f185e109f60241e02236eb02', 'II/00', 'BALAI BESAR METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA WILAYAH II', '64f8c68205795e44b0312934d283e55ef33e869e', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'a5a1f057a486d998adcf7229c1e3af0c88383d51', 'Jl. KP Bulak Raya Cempaka Putih - Ciputat', '021-7402739', '', '021-7402739', 'bbmkg2@bmkg.go.id', 1),
('5c8ba13288540c714750ff9e130aad4453866332', 'III/00', 'BALAI BESAR METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA WILAYAH III', '64f8c68205795e44b0312934d283e55ef33e869e', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '228bec8dd9fec439a87f3069dcc0c31f3a259660', 'Jl. Raya Tuban, Badung, Bali', '0361-751122', '', '0361-751122', 'bbmkg3@bmkg.go.id', 1),
('b1c2ee683178b5a469d1afbc31d723e64f538d19', 'IV/00', 'BALAI BESAR METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA WILAYAH IV', '64f8c68205795e44b0312934d283e55ef33e869e', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'fc8041b5359101d7741e6549e2fdf6e93c731cca', 'Jl. Racing Centre No 4 Panaikang KP 1351 Makassar', '0411-456493', '', '0411-456493', 'bbmkg4@bmkg.go.id', 1),
('c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'V/00', 'BALAI BESAR METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA WILAYAH V', '64f8c68205795e44b0312934d283e55ef33e869e', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'Jl. Raya Abepura Entrop KP 1572 Jayapura 99224', '0967-535418', '', '0967-535418', 'bbmkg5@bmkg.go.id', 1),
('03b3980371bfbe3ef823da11f3162998de3cf0e6', 'I/01', 'STASIUN METEOROLOGI KUALANAMU', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'a5a0aa863b2534f46fa2013a204eaf06ba7aeaba', '', '', '', '', 'stamet.kualanamu@bmkg.go.id', 1),
('ddf44b08349ee894d3fed01c21b796e5dde53b2b', 'I/24', 'STASIUN METEOROLOGI HANG NADIM', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Jl. Hang Nadim, Bandara Hang Nadim, Batam', '0778-761507', '', '0788-761401', 'stamet.hangnadim@bmkg.go.id', 1),
('38e0a9aaaf0ccc48bbc5383b92573cd66a8e7cc0', 'I/14', 'STASIUN METEOROLOGI SULTAN ISKANDAR MUDA', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '7ab23ed9061e5235537a87e813f427f5bc641a37', 'Bandara Sultan Iskandar Muda Blangbintang, Banda Aceh', '0651-24217', '', '0651-31774', 'stamet.blangbintang@bmkg.go.id', 1),
('4c1b5e2442df7685848ec6a92b99199752c0ff69', 'I/21', 'STASIUN METEOROLOGI SULTAN SYARIF KASIM II', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Bandar Udara Sultan Syarif Kasim II Pekanbaru', '0761-674791', '', '0761-674714', 'stamet.pekanbaru@bmkg.go.id', 1),
('5989bda524469846bb95c2ae6aad5fb4df5fb519', 'I/11', 'STASIUN METEOROLOGI MINANGKABAU', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '56d0a347fcfeeeaa9849cb42e99856c7177e41c0', 'JL.Mr.H.St.Moh Rasjid, Ketaping, Padang Pariaman,', '0751-819105', '', '0751-819105', 'stamet.tabing@bmkg.go.id', 1),
('9eb765ec2d6d5d7c2d42349e275d331245eedcb9', 'I/04', 'STASIUN METEOROLOGI MARITIM BELAWAN', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', 'l. Raya Pelabuhan III Gabion Ringkai Belawan - Medan', '061-6940340', '', '061-694851', 'stamar.belawan@bmkg.go.id', 1),
('302978251ef72cd5ebc8467b2beb73615b1b5e09', 'I/16', 'STASIUN METEOROLOGI MALIKUSSALEH', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '0c03e4b8ee8c2b450d043c082778510a8c6893cc', 'Jalan Meteorologi, Bandara Malikussaleh, Aceh Utara', '0645-7000710', '', '', 'stamet.lhokseumawe@bmkg.go.id', 1),
('8efb1389718ce5eb49a689fbd9681a8080eba6eb', 'I/18', 'STASIUN METEOROLOGI TJUT NYAK DIEN MEULABOH', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '', 'Bandara Cut Nyak Dhien Maulaboh Jl. Desa Kubang Gajah Kec. Kuala, Kab. Nagan Raya', '', '', '', 'stamet.meulaboh@bmkg.go.id', 1),
('5846292803f8f043265f65f112038349040d8302', 'I/15', 'STASIUN METEOROLOGI CUT BAU MAIMUN SALEH', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'a90381c2ac2fbaabefb2abf18d2cd5e1c141d971', 'Bandara Udara Maimun Saleh Kota Sabang', '0652-21525', '', '0652-3324317', '', 1),
('e4197f075ccf90bcf635d546881dd12f7cbc007c', 'I/22', 'STASIUN METEOROLOGI JAPURA', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '6f0c83b8eb8a17d30e93ee56013f03ab0b6b1e5b', 'Jl. Lintas Timur Bandara Japura Rengat, Kotak Pos No. 4,', '0769-7443110', '', '', 'stamet.rengat@bmkg.go.id', 1),
('7bb966d907124fd47adb65a6805f9a5a766659fd', 'I/26', 'STASIUN METEOROLOGI TAREMPA', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Jl. Hang Tuah No 45 Tarempa Kabupaten Kepulauan Anambas Kep. Riau', '0722-31402', '', '0772-31296', 'stamet.tarempa@bmkg.go.id', 1),
('3cc5a1b742dd053283179e468201df72f0f19064', 'I/27', 'STASIUN METEOROLOGI DABOSINGKEP', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Jl. Garuda Bandara Dabo, Dabo Singkep', '0776-21247', '', '0776-21246', 'stamet.dabosingkep@bmkg.go.id', 1),
('ecc6c0b9c46b93ed2608f44c7d85195004e7ced9', 'I/28', 'STASIUN METEOROLOGI RANAI', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Jl. Adi Sucipto No. 147, Lanud Ranai, Natuna, Riau', '0773-31016', '', '', 'stamet.ranai@bmkg.go.id', 1),
('c40f80349aecb991f2c5839a2e2b546a587879bd', 'I/25', 'STASIUN METEOROLOGI KIJANG', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Bandara Raja Haji Fisabilillah, Jl. Adi Sucipto Km 12,5 Bandara Kijang, Tanjung Pinang, Kepulauan Riau', '0771-41091', '', '', 'stamet.tanjungpinang@bmkg.go.id', 1),
('113dab4e46b9404645733dfdacfab62ed728ca12', 'I/06', 'STASIUN METEOROLOGI BINAKA', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '41f91146873f89e7cac416fe3b5a433436c8cc05', 'Bandara Binaka Gunung Sitoli Nias No. 101, Gunung Sitoli', '', '', '', 'stamet.binaka@gmail.com', 1),
('02721b708424ef85c296bb5ee1a8de5714cae1ac', 'I/05', 'STASIUN METEOROLOGI F.L TOBING', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '41f91146873f89e7cac416fe3b5a433436c8cc05', 'Bandara Pinang Sori, Sibolga, Tapanuli Tengah', '0631-391004', '', '', 'stamet.sibolga@bmkg.go.id', 1),
('73ef0a80f4be34a58c52e26308ff10cb6856aeee', '9117', 'STASIUN METEOROLOGI MARITIM TELUK BAYUR', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '6739a66ce91850bae5f1baf4a6ad7ae1f6075f26', '', '', '', '', NULL, 0),
('773e7959d5497aca4f9737051fd29f60e2ed7af1', 'I/08', 'STASIUN METEOROLOGI AEK GODANG', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '', 'Jl. Aek Godang Sibuhuan Km, 1,5 Aek Godang', '', '', '', 'stamet.aekgodang@bmkg.go.id', 1),
('ad910b6b39b0e56d3ad9d7c7d60763a172795b93', 'I/29', 'STASIUN METEOROLOGI RAJA HAJI ABDULLAH TANJUNG BALAI KARIMUN', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '', 'Raja Haji Abdullah Airport - Jl. Mayjen Sutoyo Km.12, Tanjung Balai, Karimun', '0777-324320', '', '', 'stamet.tbk@bmkg.go.id', 1),
('0385538efd8abc045dce709b5944c539e2a10138', 'I/02', 'STASIUN KLIMATOLOGI DELI SERDANG', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'a5a0aa863b2534f46fa2013a204eaf06ba7aeaba', 'Jl. Meteorologi Raya No. 17 Sampali Medan', '061-6628002', '', '061-6614631', 'staklim.sampali@bmkg.go.id', 1),
('2aab9fd4fe2416310d7b3b4dc7a48ca160b8b4b6', 'I/12', 'STASIUN KLIMATOLOGI PADANG PARIAMAN', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '56d0a347fcfeeeaa9849cb42e99856c7177e41c0', 'Stasiun Klimatologi Kelas II Sicincin Padang Pariaman', '0751-36491', '', '', 'staklim.sicincin@bmkg.go.id', 1);
INSERT INTO `auditee` (`auditee_id`, `auditee_kode`, `auditee_name`, `auditee_parrent_id`, `auditee_inspektorat_id`, `auditee_propinsi_id`, `auditee_kabupaten_id`, `auditee_alamat`, `auditee_telp`, `auditee_ext`, `auditee_fax`, `auditee_email`, `auditee_del_st`) VALUES
('fa1e019dd5d7eb6f54091d2e98d3432194753cfa', 'I/20', 'STASIUN KLIMATOLOGI ACEH BESAR', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '63add612f7390a2666b9732fcda23cadb1b3f1b6', 'Jl. Banda Aceh Medan Km 27,5 Indrapuri, Aceh Besar', '', '', '', 'staklim.indrapuri@bmkg.go.id', 0),
('85d2e28432e91593acb499b27c3c8f6075be5776', 'I/03', 'STASIUN GEOFISIKA TUNTUNGAN', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', 'Jl. Geofisika No. 1 Tuntungan I - Pancur Batu, Deli Serdang, Sumatera Utara', '061-6626975', '', '061-6626975', 'stageof.tuntungan@bmkg.go.id', 1),
('60f75babfe238a5092cb4beba1e276192004fb77', 'I/23', 'STASIUN KLIMATOLOGI TAMBANG', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '0ac1e8bce0528ff9a142906313e31e22bc6cd816', '', '', '', '', '', 1),
('80758fc5bfc2916b72f1244e576b3a8451fb3f9e', 'I/10', 'STASIUN GEOFISIKA SILAING BAWAH', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '6739a66ce91850bae5f1baf4a6ad7ae1f6075f26', 'Jl. Sultan Syahrir Silaing Bawah, Padang Panjang, Sumatera Barat', '0752-82236', '', '0752-82236', 'stageof.padangpanjang@bmkg.go.id', 1),
('1d3236d3cb72319cf095915abf83093d74c86b23', '9126', 'STASIUN GEOFISIKA MATAIE', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '0', '', '', '', '', NULL, 0),
('f88bc80292f1d4b420a58056ef305a893482ea84', 'I/19', 'STASIUN GEOFISIKA TAPAK TUAN', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '', '', '', '', '', '', 1),
('d7596c34bcc3d6545c35579cadb04995483affb5', 'I/07', 'STASIUN GEOFISIKA GUNUNG SITOLI', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '', 'Jl. Yos Sudarso140 B, Kel. Sambo, Gunung Sitoli, Sumatera Utara', '082368409989', '', '', 'stageof.gunungsitoli@bmkg.go.id', 1),
('327f17fdf8ef381f343a7081f5b2369353aca7ea', 'II/01', 'STASIUN METEOROLOGI SOEKARNO HATTA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '828f85f9b2301a70d3298e044fc1e35349733622', 'Stasiun Meteorologi Bandara Soekarno-Hatta Cengkareng Gedung 611 (tower)', '021-5506145', '', '021-5506145', 'stamet.cengkareng@bmkg.go.id', 1),
('77b161b149594a1ffc927bddec3d788b7d90deb5', 'II/03', 'STASIUN METEOROLOGI SERANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '68b0618a981c3ebd3fabcdac99c0d2341611d9de', 'Jl. Raya Taktakan No 27 Serang', '0254-200185', '', '0254-224325', 'stamet.serang@bmkg.go.id', 1),
('6f323e930618a35fa113d35c3ab5aa674c0d74b8', 'II/07', 'STASIUN METEOROLOGI MARITIM TANJUNG PRIOK', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4e99d9b15a57cb77bfe5701803b57dd3ca46885e', 'Jl. Padang Marang 4 Pelabuhan Tanjung Priok Jakarta Utara', '021-43901650', '', '021-4351366', 'stamar.tanjungpriok@bmkg.go.id', 1),
('7c045f084d4948cf08442a07e11c7f70f604cddb', 'II/23', 'STASIUN METEOROLOGI RADIN INTEN II', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '7c68e582ef9cc3f1c4572c5d6acbcc5f8b150e79', 'Jl. Raya Branti, Bandara Radin Inten II Lampung', '0721-91093', '', '0721-91642', 'stamet.lampung@bmkg.go.id', 1),
('2ad99129b7ab75bbbce119f4ab03f9284bbc184a', 'II/36', 'STASIUN METEOROLOGI SUPADIO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '1aabb3512a79bc3c047c4fb032126884bd1f88d1', 'Bandara Supadio Jl. Adi Sucipto Km 17, Pontianak, Kalimantan Barat 78381', '0561-721560', '', '0561-721560', 'stamet.supadio@bmkg.go.id', 1),
('b1b90f3ad5105610aa8838632d5236e27d222c66', 'II/33', 'STASIUN METEOROLOGI DEPATI AMIR', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '4fb2ead5ebcf2b51db8348c0628969ee6e825901', 'Bandara Dipati Amir, Bangka, Pangkalpinang', '0717-436894', '', '0717-432060', 'stamet.pangkalpinang@bmkg.go.id', 1),
('b043aef5e6cc7dc4149833f7bf4484ad7a8690c4', 'II/30', 'STASIUN METEOROLOGI SULTAN THAHA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '675eed8a709d4098541fb8f73805004c84725d49', '79671e078b4c0473cb3f218342dd22ae08e06b28', 'Jl. Soekarno-Hatta Palmerah - Jambi', '0741-572161', '', '0741-573245', 'stamet.sultanthaha@bmkg.go.id', 1),
('a9a55b1bc433a1b4128230f7d3b36504f35e3c8a', '9208', 'STASIUN METEOROLOGI SULTAN MAHMUD BADARUDDIN II', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '76d291d5d0d9498f26b37cea62e6cccd8ab2b7ca', 'Jl. SM Badaruddin II Km 10,5 Palembang', '0711-430274', '', '0711-430274', '', 1),
('036ad763c2d64f4c607d28c7b6f561d719278d36', 'II/15', 'STASIUN METEOROLOGI MARITIM TANJUNG MAS', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '42c6242dd929b77419907065fe0e7c127948bacd', 'Jl. Deli No.3 Pelabuhan Tanjung Emas- Semarang', '024-3559194', '', '024-3549050', 'stamar.semarang@bmkg.go.id', 1),
('c42ba2b2873b4ee0dca9aa85e3de7dde439dac2a', 'II/14', 'STASIUN METEOROLOGI AHMAD YANI', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '42c6242dd929b77419907065fe0e7c127948bacd', 'Jl. PUADA Yani, Bandara A Yani Semarang', '024-7626064', '', '024-7613817', '', 1),
('4fef04e919ba8767b20e0850c3a689e2ebc5d834', 'II/28', 'STASIUN METEOROLOGI FATMAWATI SOEKARNO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', '4f7673cbcd56748146807f844b656af9644d40bf', 'Jl. Raya Bandara Fatmawati Soekarno, Bengkulu', '0736-51064', '', '0736-51614', 'stamet.fatmawati@bmkg.go.id', 1),
('cefb8672afd220bade80f51f1605945519c1119d', 'II/06', 'STASIUN METEOROLOGI BUDIARTO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '828f85f9b2301a70d3298e044fc1e35349733622', 'Kampus STPI Bandara Budiarto Curug, Tangerang', '021-5983894', '', '021-5986924', 'stamet.curug@bmkg.go.id', 1),
('260e0b2ec8b1540ea28e974cfb0143caf6afc184', 'II/34', 'STASIUN METEOROLOGI H. ASAN HANANJOEDIN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '47c9fcbddcc4de7acf7085ef81a4579c62232baf', 'Jl. Bandara H. AS. Hanadjoeddin Buluhtumbang Tanjungpandan - Belitung', '0719-24310', '', '0719-24310', '', 1),
('daa6c4cc61c5732bcaf78477e439c9640ca84785', 'II/31', 'STASIUN METEOROLOGI DEPATI PARBO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '675eed8a709d4098541fb8f73805004c84725d49', '547a3a6ad51a53ed644507c819791eeefb00b498', 'Bandara Depati Parbo Kerinci', '', '', '', 'stamet.kerinci@bmkg.go.id', 1),
('81a3caa51b63c4ebafede707bda0a8600796d816', 'II/16', 'STASIUN METEOROLOGI TEGAL', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '1b660f43cb2cdfafab5443eb46d709848dcf3f1f', 'Jl. Kol. Sugiono No 100 Tegal', '0283-356206', '', '0283-341773', '', 1),
('7d418c03851195ab4fb76ec821ce8ec7daceaa4b', 'II/17', 'STASIUN METEOROLOGI CILACAP', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '5aba4fb223dae55105d598b2836d680da75246a4', 'Jl. Gatot Subroto No. 20 Cilacap', '0282-34103', '', '0282-34103', 'stamet.cilacap@bmkg.go.id', 1),
('91b663c6153f1b6b8dcf2961c011ec5fffb3a47a', 'II/08', 'STASIUN METEOROLOGI KEMAYORAN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '202ecf2aae824cba4b710850e783d708ba62b795', 'Jl. Angkasa I No. 2, Kemayoran, Jakarta Pusat', '021-6545808', '', '', 'stageof.kemayoran@bmkg.go.id', 1),
('1cf0103ee1fbc482f0acde1e11844b54f3ce50e9', 'II/38', 'STASIUN METEOROLOGI PALOH', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', 'a117a252776ab0f76fa56030f9daae43461e9149', 'Jl. Lingkar PLN Liku, Kec. Paloh Kab. Sambas', '0562-4395086', '', '', '', 1),
('1be41bde3de5cc7518e7b99467cd8399b4a19432', 'II/39', 'STASIUN METEOROLOGI RAHADI OESMAN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', 'fffc00bc924f84fc043aa10c373bdc6211ad8697', 'Jl. Patimura No. 13 Ketapang', '0534-32706', '', '0534-32706', 'stamet.ketapang@bmkg.go.id', 1),
('b820963bdfe66dd03368dc41cf626ddee18e4d61', 'II/40', 'STASIUN METEOROLOGI SUSILO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '', 'Jl. Pramuka No. 1 Sintang - Kalimantan Barat', '0565-23013', '', '', 'stamet.sintang@bmkg.go.id', 1),
('fcc73e34149e5557657060f44320c7ae9a3e29c0', 'II/41', 'STASIUN METEOROLOGI NANGAPINOH', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '', 'Bandara Nangapinoh, Kab. Melawi Kalimantan Barat', '0568-21330', '', '0568-21330', '', 1),
('2cfa5c683e3d3ddbc85b3ccafa7aa714563987a3', '9222', 'STASIUN METEOROLOGI PANGSUMA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '925a311b964d3f99e5567ac71c2ecd4622a11010', 'Bandar Udara Pangsuma Jl. Adi Sucipto Kedamin Putussibau, Kalimantan Barat', '0567-21567', '', '0567-21567', 'stamet.putussibau@bmkg.go.id', 1),
('c4dd603b81de7d491e65b89c610fd6013548a371', 'II/11', 'STASIUN METEOROLOGI JATIWANGI', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '0b486467ca176631589de72c19779fe674f13388', '311d4c6d5b3651a15bc6aa6f9b88555eba5ab5f4', 'Jl. Letda Arzain Jatiwangi Kab. Majalengka', '0233-881013', '', '0233-883949', 'stamet.jatiwangi@bmkg.go.id', 1),
('da9779cc2096d525aae6232e49fa6fcca660aca0', 'II/12', 'STASIUN METEOROLOGI CITEKO', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '0b486467ca176631589de72c19779fe674f13388', '5f682328b4887d57cdfe40d7b1358150a6102b74', 'Stasiun Meteorologi Citeko - Cisarua Bogor', '0251-8255011', '', '0251-8255011', 'stamet.citeko@bmkg.go.id', 1),
('4088f9c931057757ff6dd58dc6035e1dd220499b', '9225', 'STASIUN METEOROLOGI MARITIM PONTIANAK', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '1aabb3512a79bc3c047c4fb032126884bd1f88d1', 'Jl. Pelabuhan Laut Pontianak', '0561-769906', '', '0561-769906', 'stamar.pontianak@bmkg.go.id', 1),
('4c4e9de80284867cef02262ef487366ecfb326e9', 'II/26', 'STASIUN METEOROLOGI MARITIM LAMPUNG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '7c68e582ef9cc3f1c4572c5d6acbcc5f8b150e79', 'Jl. Yos Sudarso No. 64 Way Lunik, Panjang Bandar Lampung', '0721-342219', '', '', 'stamar.lampung@bmkg.go.id', 1),
('af8107710e23c5b05647dd79ca6f4cd0660afe1d', 'II/10', 'STASIUN KLIMATOLOGI BOGOR', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '0b486467ca176631589de72c19779fe674f13388', '5f682328b4887d57cdfe40d7b1358150a6102b74', 'Jl. Alternatif IPB - SituGede Bogor Barat', '0251-8628468', '', '0251-623018', 'staklim.bogor@bmkg.go.id', 1),
('c4a763b2395b0a77689428b4dd18c1cafdda485f', 'II/13', 'STASIUN KLIMATOLOGI SEMARANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '42c6242dd929b77419907065fe0e7c127948bacd', 'Jl. Siliwangi 291 Kalibanteng Kulon, Semarang, Jateng, 50145', '024-7609016', '', '024-7609016', 'staklim.semarang@bmkg.go.id', 1),
('d1993eb87d22b665d53bfd31f024c104f9d873eb', 'II/21', 'STASIUN KLIMATOLOGI PALEMBANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '76d291d5d0d9498f26b37cea62e6cccd8ab2b7ca', 'Jl. Residen H. Amalludin Kenten Sako - Palembang', '0711-811652', '', '0711-811652', 'staklim.kenten@bmkg.go.id', 1),
('85a6abf9ebee44b5f4ed109140441e22d99ed000', 'II/27', 'STASIUN KLIMATOLOGI BENGKULU', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', '4f7673cbcd56748146807f844b656af9644d40bf', 'Jl. Ir. Rustandi Sugianto P. Baai Bengkulu', '0736-51251', '', '0736-51426', 'staklim.pulaubaai@bmkg.go.id', 1),
('d008312b8dbb8579e8ca7eaf9f4e9d43becfd095', 'II/37', 'STASIUN KLIMATOLOGI MEMPAWAH', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '499db371dac2489052cf151f8e861ac9d9172df7', '', 'Jl. Raya Sei Nipah Km.20,5 Jungkat - Pontianak', '0561-7075083', '', '0561-740316', 'staklim.siantan@bmkg.go.id', 1),
('fecc74a6987af689b4f24a871a9e29d6991fca4c', 'II/04', 'STASIUN KLIMATOLOGI TANGERANG SELATAN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'a5a1f057a486d998adcf7229c1e3af0c88383d51', 'Jl. Raya Kodam Bintaro No 82 Jakarta Selatan', '021-7353018', '', '021-7355262', 'staklim.pondokbetung@bmkg.go.id', 1),
('fa42d6c1197594171ba796f192ed0722fd03dcc8', 'II/32', 'STASIUN KLIMATOLOGI MUARO JAMBI', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '675eed8a709d4098541fb8f73805004c84725d49', 'd6462aa470bcb6f02851209a9714d2dd9d6ca239', 'Jl. Raya Jambi-Muara Bulian Km 18 Jaluko', '(0741) 583500', '', '(0741) 583555', 'staklim.seiduren@bmkg.go.id', 1),
('745dff21d66cc71caa24983df8549d3f051c2d10', '9234', 'STASIUN KLIMATOLOGI PESAWARAN', '0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '0efd5a20efd958468a9c47127b811e8747e22e93', '', '', '', '', NULL, 0),
('d9f3da3de5fe0eef1dce7d8e5c56f7fc2e4138bf', 'II/35', 'STASIUN KLIMATOLOGI KOBA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'a25db1256f76937a9a76953511d249e14d49b01e', 'Kabupaten Bangka Tengah, Bangka Belitung', '', '', '', 'staklim.koba@bmkg.go.id', 1),
('ad71b22dc49c6da9ac27adb999059442ce390b7a', 'II/20', 'STASIUN KLIMATOLOGI MLATI', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'dc5fb86daf2eca6f8054441b38a433fb555254f4', 'Kabupaten Sleman', '', '', '', '', 1),
('a5b4facab082c6881316e7fcf590ad7983a255b2', 'II/02', 'STASIUN GEOFISIKA TANGERANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '828f85f9b2301a70d3298e044fc1e35349733622', 'Jl. Meteorologi No 5, Kel. Tanah Tinggi, Tangerang', '021--55771822', '', '021-55771822', 'stageof.tangerang@bmkg.go.id', 1),
('187316f11616500877832e232426a9750b0f207f', 'II/09', 'STASIUN GEOFISIKA BANDUNG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '0b486467ca176631589de72c19779fe674f13388', '16eb985d0c4af447fd097ebe70e0f56098b196fb', 'Jl. Cemara No. 66, Bandung', '022-2031881', '', '022-2036212', 'stageof.bandung@bmkg.go.id', 1),
('db919a9c218b0a48d3820e1f0b4d00fef616b7e5', 'II/19', 'STASIUN GEOFISIKA YOGYAKARTA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'dc5fb86daf2eca6f8054441b38a433fb555254f4', 'Jl. Wates Km 8, Citengan, Balecatur, Gamping, Sleman', '0274-6498380', '', '0274-6498382', 'stageof.yogya@bmkg.go.id', 1),
('9290eab42588a780f808a50fb4fcfe01dfae2a9c', 'II/18', 'STASIUN GEOFISIKA BANJARNEGARA', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '', 'Jl. Raya Banjarmangu KM 12, Desa Kalilunjar, Banjarmangu, Banjarnegara, Jawa Tengah', '0815-6987321', '', '0815-592001', 'stageof.banjarnegara@bmkg.go.id', 1),
('5b3f5307893d276198f00179e5165aa02e52bc89', 'II/29', 'STASIUN GEOFISIKA KEPAHIYANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', '4f7673cbcd56748146807f844b656af9644d40bf', 'Jl. Pembangunan No.156 Pasar Ujung Kepahiang, Bengkulu', '0732-391267', '', '0732-391600', 'stageof.kepahiang@bmkg.go.id', 1),
('ff6b9049814c6fb1e452bf464f6c9c7498498d18', 'II/24', 'STASIUN GEOFISIKA KOTA BUMI', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '', 'Jl. Raden Intan No. 219, Kotabumi, Lampung', '0724-22870', '', '', 'stageof.kotabumi@bmkg.go.id', 1),
('60946bb13d898f52dbd5f63df1a667dbfe2ce6b1', 'III/04', 'STASIUN METEOROLOGI JUANDA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4fed488e6f61de9c9d6d540f263e675ca89d9a44', 'Bandar Udara Juanda Surabaya', '031-8668989', '', '031-8675342', 'stamet.juanda@bmkg.go.id', 1),
('6eafabf98671968b6d35911130b1585335fc8367', 'III/22', 'STASIUN METEOROLOGI SULTAN AJI MUHAMMAD SULAIMAN SEPINGGAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '2de26d1ada47df2ac0d199042f1f736f5b74c857', 'Jl. Marsma R. Iswahyudi No. 3 Balikpapan', '0542-762360', '', '0542-764054', 'stamet.sepinggan@bmkg.go.id', 1),
('2bfb56d903cdde31495ea39cf7e3086cecf7d4b9', 'III/14', 'STASIUN METEOROLOGI TJILIK RIWUT', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '175f37cdb244988462e7946a62f190f8bcd3c048', '', 'Jl. A Donis A5 Bandara Tjilik Riwut Palangkaraya', '0536-3222871', '', '0536-3223588', 'stamet.tjilikriwut@bmkg.go.id', 1),
('77c1a9e57cd8c61127138841bf06d1f2bf9f6607', 'III/36', 'STASIUN METEOROLOGI ELTARI', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '574f1b692a66de71c198b693f04612ebb98983ae', 'Bandara Eltari Kupang Jl. Rajawali - Penturi Kupang', '0380-881613', '', '0380-882097', 'stamet.eltari@bmkg.go.id', 1),
('dd454917c76e5afb518f15054a5568838c49107a', 'III/20', 'STASIUN METEOROLOGI SYAMSUDIN NOOR', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '329ca1d8b316f42fa977cfc7aee782917001fc59', 'Bandara Syamsudin Noor Banjarmasin', '0511-470518', '', '', 'stamet.banjarmasin@bmkg.go.id', 1),
('d3bb805d7b488285b70fa3988a46c788455b09a7', 'III/05', 'STASIUN METEOROLOGI MARITIM PERAK II', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '', 'Jl. Kalimas Baru 97B Perak Surabaya', '031-3287123', '', '031-3291439', 'stamar.perak2@bmkg.go.id', 1),
('5a83d9a32ed7fb95e54ccbc8ffb4e597fdf5c214', 'III/31', 'STASIUN METEOROLOGI BANDARA INTERNASIONAL LOMBOK', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '244d62c59fb427bff7e769ac05df7db3f558b835', 'Jl. Mandalika, Penunjak, Praya Lombok Tengah, Nusa Tenggara Barat', '0342-762360', '', '0342-762360', 'stamet.selaparang@bmkg.go.id', 1),
('a5592ac5656981b7fcfe5918956c6f1f685b022e', 'III/15', 'STASIUN METEOROLOGI ISKANDAR', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '175f37cdb244988462e7946a62f190f8bcd3c048', 'e247e96758cf1d643393b5e376fb4b535bc416e7', 'Jl. Iskandar, Bandar Udara Pangkalan Bun, Kota Waringin Barat', '0532-21329', '', '0532-21329', 'stamet.pangkalanbun@bmkg.go.id', 1),
('cfa602a3b7343d39665fdbb7e447659f36bc4d5f', 'III/16', 'STASIUN METEOROLOGI BERINGIN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '175f37cdb244988462e7946a62f190f8bcd3c048', '', 'Jl. Pandreh, No. 187, Muara Teweh, Barito Utara', '0519-21495', '', '0519-22270', '', 1),
('003fc795718d4a8ede7c23493f7432022138bacc', 'III/23', 'STASIUN METEOROLOGI TEMINDUNG', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '02900bbb71566c7a53d5bfbe9835465e5f15b986', 'Jl. Pipit No 150 Bandara Temindung Samarinda', '0541-741160', '', '0541-201060', 'stamet.samarinda@bmkg.go.id', 1),
('e32e00c63302ab47cc1c74bee7b8c9651b38ec98', 'III/26', 'STASIUN METEOROLOGI JUWATA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '5ecfef4589a11799683bb20435868c23620b01e8', '', 'Jl. Mulawarman, Bandar Udara Juata, Tarakan', '0550-21629', '', '0550-51606', 'stamet.tarakan@bmkg.go.id', 1),
('e7e832de2a0fd5215e3cd7609e85269e912d3576', 'III/25', 'STASIUN METEOROLOGI KALIMARAU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '91a26a01c082dfb9478de5eee755c0c267a5d41f', 'Bandara Kalimarau, Jl. Kalimarau, Teluk Bayur, Berau', '0554-8811119', '', '0554-2027470', 'stamet.kalimarau@bmkg.go.id', 1),
('f5228966f46a48b7e744780d1d1564c07bd79927', 'III/27', 'STASIUN METEOROLOGI TANJUNG HARAPAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '5ecfef4589a11799683bb20435868c23620b01e8', '', 'Jl. Ulin No. 3 Tanjung Selor, Bulungan', '0552-21306', '', '0552-21945', 'stamet.tanjungselor@bmkg.go.id', 1),
('28c590a346b0de6a154517e628f3399728cc4d65', 'III/28', 'STASIUN METEOROLOGI YUVAI SEMARING', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '5ecfef4589a11799683bb20435868c23620b01e8', '', 'Jl. Bandara Yuvai Semaring Long Bawan Kerayan Nunukan', '0551-21643', '', '', 'stamet.longbawan@bmkg.go.id', 1),
('ca8d94aa120302f4d2950d7f39dd2b5e7ec061f3', 'III/21', 'STASIUN METEOROLOGI GUSTI SYAMSIR ALAM', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '268ba60feb5ee3700c1c8eed4645ebb93a3f21d0', 'Jl. Raya Stagen KM 10 Kotabaru, Kalimantan Selatan', '0518-21701', '', '0518-21701', 'stamet.kotabaru@bmkg.go.id', 1),
('69dfc10b443e887c04666cfdb66f852c21b048c3', 'III/32', 'STASIUN METEOROLOGI SULTAN MUHAMMAD KAHARUDDIN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '83053e9b75b804cd6013d93ec5dee7e8bd2f1da3', 'Jl. Garuda No. 43 Sumbawa Besar, Nusa Tenggara Barat, 84312', '0371-21859', '', '0371-21859', 'stamet.sumbawabesar@bmkg.go.id', 1),
('dfa40db1773f501d63be2729b45429ea76d89dd1', 'III/33', 'STASIUN METEOROLOGI SULTAN MUHAMMAD SALAHUDDIN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'b3758f3ddc87381d3b254a70fb38351852bf3e52', 'Stasiun Meteorologi M. Salahudin Bima NTB 84173', '', '', '', 'stamet.bima@bmkg.go.id', 1),
('357506b606933d2072910719429843c4417a744d', 'III/38', 'STASIUN METEOROLOGI FRANSISKUS XAVERIUS SEDA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '6d2b356d61ca3fcd929354c3efb64f3e2c6aa271', 'Jl. Angkasa, Wai Oti, Maumere Flores, NTT', '0382-21349', '', '0382-22967', 'stamet.maumere@bmkg.go.id', 1),
('29e01c1a0c3e8a917c3b1aefc1ccd3ffef2d86a8', 'III/39', 'STASIUN METEOROLOGI UMBU MEHANG KUNDA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '', 'Bandara Umbu M Kunda, Jl. Adi Sucipto, No. 3, Waingapu, Nusa Tenggara Timur', '0387-61227', '', '0387-61228', 'stamet.waingapu@bmkg.go.id', 1),
('8b0a111ec0c94553fffc080c31e2ca9c7ac7a0af', 'III/40', 'STASIUN METEOROLOGI DAVID CONSTANTIJN SAUDALE', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '', 'Bandar Udara Lekunik Baa Rote', '', '', '', 'stamet.baarote@bmkg.go.id', 1),
('2b7df90295e4a43f20db1c1a680127c3e1d62798', '9322', 'STASIUN METEOROLOGI GEWAYANTANA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '121dafc847f62af9bba85a5843e35b9689667eb2', 'Jl. Soekarno-Hatta No 76 Larantuka Flores', '', '', '', '', 1),
('aac05dbeb21049e675a0e9765ebd14b7c50a24fb', '9323', 'STASIUN METEOROLOGI FRANS SALES LEGA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'bea0c22885daa21aa5b9d99a88d050f3df08b0e4', 'Bandara Satar Tacik, Ruteng, Jl. Satar Tacik, Ruteng', '0385-21264', '', '0385-21802', 'stamet.ruteng@bmkg.go.id', 1),
('5950eacf95d9f767e27ff43c78d9e0e18f34373e', 'III/43', 'STASIUN METEOROLOGI MALI', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '', 'Jl. Soekarno Hatta, Bandar Udara Mali, Alor', '0386-222280', '', '', 'stamet.mali@bmkg.go.id', 1),
('68b7ddc764695769ec7cda83e92d9c6a5a593dc9', '9325', 'STASIUN METEOROLOGI TARDAMU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '', 'Jl. Terdamu No. 12 Seba Sabu', '0380-861042', '', '0380-861042', '', 1),
('721e3a53d617f335206d8f0d78b811367263aade', 'III/09', 'STASIUN METEOROLOGI KALIANGET', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '3d7c394ae564df7adca3c184b27dc1493c7c2f27', 'Jl. Raya Kalianget No. 8, Sumenep Barat Madura', '0328-662743', '', '', 'stamet.kalianget@bmkg.go.id', 1),
('147f79358db9cfe780deb7ec64de7b23cb689248', 'III/10', 'STASIUN METEOROLOGI SANGKAPURA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '1ad86e9840a27ae0aca5d8d6ec30a8bfbe4eb3a5', 'Jl. Umar Masud Sangkapura - Bawean', '0325-421004', '', '0352-421572', 'stamet.bawean@bmkg.go.id', 1),
('282b9af885f2723b107fc929688569bce919985d', 'III/08', 'STASIUN METEOROLOGI TUBAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'fbaf2aabdad611593dc2b30b8cf09f771b7d3141', '', '', '', '', 'stamet.tuban@bmkg.go.id', 1),
('700c02db2fb31a7578ae90c11c8e399ad738ae1e', 'III/11', 'STASIUN METEOROLOGI BANYUWANGI', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '282027c71f277db5f9f7c2df862b6ba670b61b72', 'Jl. Jaksa Agung Suprapto No. 152.', '0333-421888', '', '0333-410088', 'stamet.banyuwangi@bmkg.go.id', 1),
('a371372a45c9eb979682d909dfa49531edeec7f7', 'III/29', 'STASIUN METEOROLOGI NUNUKAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '5ecfef4589a11799683bb20435868c23620b01e8', '', 'Jl. Arief Rahman Hakim No.15 Bandar Udara Nunukan, Kab. Nunukan', '0556-2025415', '', '0556-2026792', 'stamet.nunukan@bmkg.go.id', 1),
('325faeb327f42ba8d27ed02461782ee3968ea39d', 'III/47', 'STASIUN METEOROLOGI KOMODO', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '0a347fec9300cf0f64e8c7335364efa46491b34e', 'Bandar Udara Komodo Labuhan Bajo', '0385-41914', '', '', '', 1),
('c01ce6ce3704c36a41c3bc12fc4fb2c0f4d9bbfa', 'III/17', 'STASIUN METEOROLOGI H. ASAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '175f37cdb244988462e7946a62f190f8bcd3c048', 'e247e96758cf1d643393b5e376fb4b535bc416e7', 'Jl. Samekto Baamang Hulu, Kota Waringin, Sampit', '0531-34363', '', '0531-30659', 'stamet.sampit@bmkg.go.id', 1),
('566ffaa1b6e91480763d9db56090ad81a19970d8', 'III/18', 'STASIUN METEOROLOGI SANGGU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '175f37cdb244988462e7946a62f190f8bcd3c048', 'c375d33eef61954d3fe252532aeb8cfbbf5ef099', 'Jl. Merdeka, Bandar Udara Sanggau, Buntok', '0525-2703419', '', '', 'stamet.buntok@bmkg.go.id', 1),
('03069113bfbc59d04eeebbcd13f40631c8cdc71d', 'III/19', 'STASIUN KLIMATOLOGI BANJARBARU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '', 'Jl. Trikora, Banjarbaru - Kalimantan Selatan', '0511-4787229', '', '0511-4787159', 'staklim.banjarbaru@bmkg.go.id', 1),
('10daf828826717a865d866e633d1df42cd0bb151', 'III/30', 'STASIUN KLIMATOLOGI LOMBOK BARAT', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '244d62c59fb427bff7e769ac05df7db3f558b835', 'Jl. TGH Ibrahim Khalidy, Desa Montong Are, Kec. Kediri, Kab. Lombok Barat', '0370-674134', '', '0370-674135', 'staklim.kediri@bmkg.go.id', 1),
('ba01a6c9332a08dea79731c07b0376ee6f2b90f9', 'III/06', 'STASIUN KLIMATOLOGI MALANG', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '893612e13f146d5dec1769659625ac2b97b265dc', 'Jl. Zentana 33, Karang Ploso, Malang', '0341-461388', '', '0341-464827', 'staklim.karangploso@bmkg.go.id', 1),
('8535e268736de6ed39cc3c6b81636a99692d1f5b', 'III/03', 'STASIUN KLIMATOLOGI JEMBRANA', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'b0e70a8c4fcc25fe391827127a7f39932672a861', 'Jl. Lely, No.9 Baler Bale Agung, Negara', '0365-4546085', '', '0365-4546209', '', 1),
('fd3262f30324054f3f8db5473c0f5ae630eaaaa9', 'III/37', 'STASIUN KLIMATOLOGI KUPANG', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'eccdaffc677d841c2ad263ac20d6fa5857415396', 'Jl. Timor Raya KM. 10,7 Lasiana, KP.63, Kupang', '0380-881681', '', '0380-881680', 'staklim.lasiana@bmkg.go.id', 1),
('539d74c81ea7696615c9e7e21a3d2554e7021350', 'III/35', 'STASIUN GEOFISIKA KAMPUNG BARU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'eccdaffc677d841c2ad263ac20d6fa5857415396', 'Jl. Cak Doko No. 70, Kupang', '0380-821608', '', '0380-826205', 'stageof.kupang@bmkg.go.id', 1),
('7f70888051031cf6849ff28c4bf2d5caec25c512', 'III/07', 'STASIUN GEOFISIKA TRETES', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '35075dee0755cc4d184b2a961730144c6ca7a8a1', 'Jl. Sedap Malam Mlaten Pandaan, Pasuruan', '0343-635590', '', '0343-636685', 'stageof.tretes@bmkg.go.id', 1),
('0721c70d49cbe0b1bff490aa340f74410cb406e7', 'III/02', 'STASIUN GEOFISIKA SANGLAH', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '228bec8dd9fec439a87f3069dcc0c31f3a259660', 'Jl. Pulau Tarakan No.1, Sanglah, Denpasar, Bali.', '0361-226157', '', '0361-226157', 'stageof.sanglah@bmkg.go.id', 1),
('5b3b3422a2c95d937b8e5ebeec4a6abffecfb0a5', 'III/12', 'STASIUN GEOFISIKA SAWAHAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4a1e06d83cc32deed10864d78f75800f35753816', 'Jl. Pasanggrahan Sawahan No. 10, Nganjuk', '0358-326434', '', '0358-330769', 'stageof.nganjuk@bmkg.go.id', 1),
('3f6d2b28bdc85825e2bbed13f192bb84ec87d16b', 'III/13', 'STASIUN GEOFISIKA KARANG KATES', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '893612e13f146d5dec1769659625ac2b97b265dc', 'Jl. Raya Bendungan Lahor, No. 40, Karangkates, Kp.3, Sumber Pucung, Malang', '0341-385667', '', '0341-386261', 'stageof.karangkates@bmkg.go.id', 1),
('1c8a5553ffb7aa214cca9e10cbe5ecebff1755d7', 'III/24', 'STASIUN GEOFISIKA BALIKPAPAN', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '2de26d1ada47df2ac0d199042f1f736f5b74c857', 'Jl. Marsma R. Iswahyudi 359 Balikpapan, Kalimantan Timur 76115', '0542-764053', '', '0542-764053', 'stageof.balikpapan@bmkg.go.id', 1),
('a229b3036f666628b3c6d6c6686f5bdc5a229d4f', 'III/34', 'STASIUN GEOFISIKA MATARAM', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '84237065ec6a2e5064e5331db90603d72a210d12', '', '', '', '', 'stageof.mataram@bmkg.go.id', 1),
('451db43c8cb86ebb05ea5efa540ea045632f913a', 'III/45', 'STASIUN GEOFISIKA WAINGAPU', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'd88cfce9e7ec4281eaab61c3448105b228cd093d', 'Jl. Adi Sucipto, V8, Sumbawa Timur, Waingapu', '0387-61226', '', '0387-61225', 'stageof.waingapu@bmkg.go.id', 1),
('9cf50648b21dca17b0b45b3b02e1b72cf3280f9c', 'III/46', 'STASIUN GEOFISIKA ALOR', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '', '', '', '', '', '', 1),
('d4dfda783bc925e1e153e049670d3e962517fcc1', 'IV/01', 'STASIUN METEOROLOGI HASANUDDIN', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'fc8041b5359101d7741e6549e2fdf6e93c731cca', 'Bandara Hasanuddin Mandai â€“ Makassar', '0411-553019', '', '', 'stamet.hasanuddin@bmkg.go.id', 1),
('dff1a5cefb8eed1ddd317f739b931a53882238d5', 'IV/19', 'STASIUN METEOROLOGI DJALALUDDIN', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'cbfa6bd4173f0efb045a5bf1c0601e96d4b1d03c', 'Komp. Bandara Jalaluddin Gorontalo', '0435-890393', '', '', 'stamet.jalaludin@bmkg.go.id', 1),
('3d4bf47b237624aa94bca592871b1956d8e9352e', 'IV/27', 'STASIUN METEOROLOGI SULTAN BAABULLAH', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '', 'Bandara Babullah Ternate, Jl. Batu Agus KP. 28, Ternate, Maluku Utara, 97728', '0921-3127902', '', '0921-3127902', 'stamet.babullah@bmkg.go.id', 1),
('ee3259666f61524b4c74f3e47a093c52abc178ee', 'IV/33', 'STASIUN METEOROLOGI PATTIMURA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '51fcadcaa188f6ace43611645efd71c950ab5c29', 'Komplek Bandara Patimura Ambon Jl. Dr. Leimena Ambon', '0911-311751', '', '0911-311751', '', 1),
('ee01c49ff75d276436fa73eecd566174c2854d7f', 'IV/23', 'STASIUN METEOROLOGI SAM RATULANGI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '66a0d4d6889efb40228e10140dbfc1d1b0ef2f3e', 'Jl. A.A Maramis, Bandara Sam Ratulangi Manado', '0431-811663', '', '0431-811888', 'stamet.samratulangi@bmkg.go.id', 1),
('1369966dfcfc861da6ddf95b486e5eb3d87f27b2', 'IV/24', 'STASIUN METEOROLOGI MARITIM BITUNG', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '69b71095a4f1fadc5941cc695b6b93f77e1f3b4d', 'Jl. Candi No. 56 Kaduodan Bitung', '0438-21710', '', '', 'stamar.bitung@bmkg.go.id', 1),
('8024e5fcd0b3857c3c67bf6491ef6ebb903c9513', 'IV/15', 'STASIUN METEOROLOGI MUTIARA SIS-AL JUFRI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'b9ce2db479cf9805275549ed1397bb36da9a5f69', 'Komplek Bandara Mutiara Palu Jl. Abdurahman Saleh Biroboli', '0451-482172', '', '0451-482802', 'stamet.mutiarapalu@bmkg.go.id', 1),
('dbd83803e77be43ebdc55135105831f32b82a3bb', 'IV/03', 'STASIUN METEOROLOGI MARITIM PAOTERE', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'fc8041b5359101d7741e6549e2fdf6e93c731cca', 'Jl. Sabutung I No. 30 Paotere - Makassar', '(0411) 3619242', '', '(0411) 3628235', 'stamar.paotere@bmkg.go.id', 1),
('e9b60dfff32afbac974621370a67fc86c1bbd5cd', 'IV/07', 'STASIUN METEOROLOGI MAJENE', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'a06e899d14482893ff05fda1d8d2efcf37a23fab', 'Jl. Lettu M. Yamin No.13', '0422-21296', '', '', 'stamet.majene@bmkg.go.id', 1),
('40d25636a9a8071766f1af844b4e3e59616c013d', 'IV/08', 'STASIUN METEOROLOGI MARITIM KENDARI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4ecef38c03d777dcc306b703df8319cd8ef26329', 'Jl. Jendral Sudirman No. 158 Kendari', '0401-328528', '', '0401-328528', '', 1),
('0c53797a341f4775d2d934f58ee141a11483a14b', 'IV/34', 'STASIUN METEOROLOGI DUMATUBUN', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '1ab3ae3aae2d662adabf03699648e1bc50a947c4', 'Jl. Bandara Udara Dumatubun Tual', '0916-24025', '', '0916-21075', 'stamet.tual@bmkg.go.id', 1),
('7feab6ba1ae66d6204483310c2068b999a9f4e9d', 'IV/35', 'STASIUN METEOROLOGI AMAHAI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'baa49f9f67a1209bfbb8b82bfd38c0ee1cf347df', 'Bandara Perintis Amahai', '0914-21398', '', '', 'stamet.amahai@bmkg.go.id', 1),
('141bff35c5f4ef35ed2969f6ccb13960739a220f', 'IV/36', 'STASIUN METEOROLOGI GESER', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '', 'Jl. Pendidikan Geser, Kelurahan Geser, Kecamatan Seram Timur', '', '', '', 'stamet.geser@bmkg.go.id', 1),
('287b5a961b0d83da4444476ce09620f28b368ac3', 'IV/29', 'STASIUN METEOROLOGI OESMAN SADIK', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'a2e62a45a351c6f19c57774a0fa2797d88f2dff0', 'Komp. BMG Bandara Oesman Sadik Labuha Bacan Halmahera Selatan', '0927-21255', '', '0927-21255', 'stamet.labuha@bmkg.go.id', 1),
('47d0523f24aaf03b8c9640488ea78d5b57d5efc2', 'IV/37', 'STASIUN METEOROLOGI BANDANEIRA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'baa49f9f67a1209bfbb8b82bfd38c0ee1cf347df', 'Komp. Bandara Bandaneira Kec. Banda Kab. Maluku Tengah', '0910-21002', '', '', 'stamet.bandaneira@bmkg.go.id', 1),
('c523b1d94a01b15f6f71209f761ddd011e708e0c', 'IV/38', 'STASIUN METEOROLOGI NAMLEA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'baa49f9f67a1209bfbb8b82bfd38c0ee1cf347df', 'Jl. Raya Lala Namlea, Buru Utara Timur, Maluku Tengah', '', '', '', '', 1),
('5b4febdd1b79d3ff1af38591fefdf8453c7a3baa', 'IV/39', 'STASIUN METEOROLOGI MATHILDA BATLAYERI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'e0e2a38350a30940d826d314a3615ea045bb0c16', 'Komplek Meteorologi Jl. Harapan - Saumlaki, Maluku Tenggara Barat', '0918-21009', '', '0918-22038', 'stamet.saumlaki@bmkg.go.id', 1),
('5595b21cfffb1aa1e1d606f279cdcf82df2d3f36', 'IV/28', 'STASIUN METEOROLOGI GAMAR MALAMO', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '', 'Stasiun Meteorologi Galela Gamarmalamo Maluku Utara', '', '', '', 'stamet.galela@bmkg.go.id', 1),
('ed9e3eb864b99869d476f691ed7eff014fc80df0', 'IV/30', 'STASIUN METEOROLOGI EMALAMO', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '5f806ad90ec6f387331a6acc165552d31e60438d', 'Jl. Meteor Fogi, Sanana, Maluku Utara', '0929-2221474', '', '0929-2221474', 'stamet.sanana@bmkg.go.id', 1),
('e01b790d3bf9c22685622aa0794273b8ff448085', '9420', 'STASIUN METEOROLOGI KASIGUNCU', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '6d0806fd96d8675880e61a220602ac911b6f6884', 'Jl. Bandar Udara, No. 202, Kel. Kasiguncu, Kec. Poso Pesisir, Kab. Poso, Kab. Poso', '0452-22835', '', '0452-22835', 'stamet.poso@bmkg.go.id', 1),
('8c1e0d6b745d650a85a11c0231872ff02bbbc9e6', 'IV/17', 'STASIUN METEOROLOGI SYUKURAN AMINUDIN AMIR', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'd1fa44804b6f76dd3b1ee46e77f5294070c39f5d', '', '', '', '', 'stamet.luwuk@bmkg.go.id', 1),
('ec96efea0a2cc19249ac1df62402786ab6808441', 'IV/18', 'STASIUN METEOROLOGI SULTAN BANTILAN', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '6d36a35ab8d54a8b35a8ac13f9355b84e4dd45fd', 'Bandar Utara Lalos, Toli-Toli, Sulawesi Tengah,94561', '0453-23053', '', '0453-23053', 'stamet.tolitoli@bmkg.go.id', 1),
('5bdb085877a841eb97dc6f5ea71d815e14f7f73c', 'IV/09', 'STASIUN METEOROLOGI BETO AMBARI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '5774f0434a471b6de14fac7b20c1ac7df5b22943', 'Komplek Bandara Beto Ambari Bau-bau', '0402-2823606', '', '0402-2823676', '', 1),
('411bb6e80b71aef3e7546dd26208f237d84c193a', '9424', 'STASIUN METEOROLOGI SANGIA NI BANDERA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '5774f0434a471b6de14fac7b20c1ac7df5b22943', 'Jl. Protolo;/ No. 1. Pomala Kolaka', '0405-2310807', '', '0405-2310807', 'stamet.pomalaa@bmkg.go.id', 1),
('de4229e6528ea8b9525898667bc3317321611290', 'IV/05', 'STASIUN METEOROLOGI ANDI JEMMA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '2518b02710dd68dc9f20fc70c0e5aa5f4933fe68', 'Jl. Dirgantara Masamba, Bandara Andi Jemma, Masamba, Luwu Utara', '0473-21392', '', '0473-22076', 'stamet.masamba@bmkg.go.id', 1),
('0a0b6d0f55886c324653bec184777a2c0c552e24', 'IV/26', 'STASIUN METEOROLOGI NAHA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '67bd6c8944ea4cd516e47c08aa8409cf1b5f2319', 'Bandara Naha Tahuna Sangihe Talaud, Kel. Naha, Kec. Tambukan Udara', '0432-23568', '', '', '', 1),
('a8aecdaa33a96abd85da00435ac4074ceed7c8a6', 'IV06', 'STASIUN METEOROLOGI PONGTIKU', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '', 'Bandara Pongtiku, Tanah Toraja', '0432-22254', '', '0432-22254', '', 1),
('02d9e41fcb20121e5d0d998fc9f074a787437552', '9428', 'STASIUN KLIMATOLOGI MAROS', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'd0cd06b582876e3dc67555c11e072839148c06e2', 'Jl. DR. Ratulangi, No.75, Panakukang, KP. No. 05, Sulawesi Selatan', '0411-372366', '', '0411372367', 'staklim.maros@bmkg.go.id', 1),
('6bcc2cd67709856202066caae51dff2c0d1004c2', 'IV/25', 'STASIUN KLIMATOLOGI MINAHASA UTARA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '116477f533f0f77aeb7d5250ac5a660d70f81572', '', '', '', '', '', 1),
('9ed7d7c6cd1a536fcf9f64261422d2347ac3dd39', 'IV/40', 'STASIUN KLIMATOLOGI SERAM BAGIAN BARAT', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'bbbf3defbcd5216b033bf6c858ecbb02160c1282', 'Jl. Hunitetu, Desa Kairatu, Kecamatan Kairatu, Kabupaten Seram Bagian Barat', '', '', '', 'staklim.kairatu@bmkg.go.id', 1),
('4ff86577ed671d8e0a4760482b093d8ba1f49d3e', '9431', 'STASIUN KLIMATOLOGI RANOMEETO', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '705581731d6a8dcf57f94b97eedf2cbe5bb2f96b', 'Kabupaten Konawe Selatan', '', '', '', '', 1),
('10ff625c16ef0df0c49f56ec9afc548a12c2b218', '9432', 'STASIUN GEOFISIKA KARANG PANJANG', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '51fcadcaa188f6ace43611645efd71c950ab5c29', 'Jl. Ade Irma Suryani Nasution, No.8, Amantelu, Ambon, Maluku', '0911-354931', '', '0911-354191', 'stageof.karangpanjang@bmkg.go.id', 1),
('b159fc8a7e014d2206db2f867f4e2b6bc7868e1f', 'IV/22', 'STASIUN GEOFISIKA WINANGUN', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '66a0d4d6889efb40228e10140dbfc1d1b0ef2f3e', 'Jl. Harapan Winangun, KP.1042, Manado', '0431-823342', '', '0431-825667', 'stageof.winangun@bmkg.go.id', 1),
('7b3bee71e072360663d473c245cecae73dc59a42', 'IV/13', 'STASIUN GEOFISIKA PALU', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '0', 'Jl. Sumur Yugo, No. 4, Balarua, Palu Barat, 94226', '0451-460197', '', '0451-460197', 'stageof.palu@bmkg.go.id', 1),
('eb7fc63b544abf81342f5373360f24e58906666d', 'IV/04', 'STASIUN GEOFISIKA GOWA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '0', 'Jl. Malino penggantungan sungguminasa-Gowa P.O.Box 35 sungguminasa-Gowa 92101 Sulawesi Selatan', '0411-861083', '', '0411-861083', 'stageof.gowa@bmkg.go.id', 1),
('5f3e488c258ece5b7bf456b39ae60344e10b12d8', 'IV/20', 'STASIUN GEOFISIKA GORONTALO', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'cbfa6bd4173f0efb045a5bf1c0601e96d4b1d03c', '', '', '', '', 'stageof.gorontalo@bmkg.go.id', 1),
('c3b0af6f267ada02f9f0d36f81e0459fe3f169e4', 'IV/41', 'STASIUN GEOFISIKA SAUMLAKI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'e0e2a38350a30940d826d314a3615ea045bb0c16', 'Jl. Harapan Saimlaki Maluku Tenggara', '0918-21124', '', '0918-21144', 'stageof.saumlaki@bmkg.go.id', 1),
('9f7298ab3c0d2404ef0cea253e0b68c0db303d5c', 'IV/31', 'STASIUN GEOFISIKA TERNATE', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '', 'Jl. Bali Bunga, Kel. Tabona, Ternate Selatan, Maluku Utara, 997717', '0921-3123144', '', '0921-3123144', 'stageof.ternate@bmkg.go.id', 1),
('a024e101e5088b1011b3ffdad510da35664e0fd1', 'IV/11', 'STASIUN GEOFISIKA KENDARI', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4ecef38c03d777dcc306b703df8319cd8ef26329', '', '', '', '', 'stageof.kendari@bmkg.go.id', 1),
('d796b29e72bc1c4d9c02b4ad7773c4d079c0ee1a', 'V/01', 'STASIUN METEOROLOGI FRANS KAISIEPO', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'fca822ea88ce14f8a2456244cc1f35447c7539e5', 'Jl. Moh. Yamin S.H, Biak', '0981-21284', '', '0981-22824', 'stamet.biak@bmkg.go.id', 1),
('0e32993bfc81a12f243413964ec41d93b069def3', 'V/02', 'STASIUN METEOROLOGI SENTANI', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'Jl. Yabaso, Komplek Bandar Udara Sentani, Jayapura', '0967-591027', '', '0967-591027', 'stamet.sentani@bmkg.go.id', 1),
('f405c0737dd04ea241acddf5af7b1d6a24ecc9fc', '9503', 'STASIUN METEOROLOGI SEIGUN', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4a083e19ba8c23791a6b4544c617a41c3db2cd86', 'Bandara Jefman, KP. 217, Sorong Papua', '0951-98452', '', '0951-98451', '', 1),
('a99aabfd9fc8ab263f68c51d4870ec9a4235612f', 'V/04', 'STASIUN METEOROLOGI MOPAH', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '0bc555628bee2f79ef756c3f319c7e7b10d13010', 'Jl. PGT Mopah, Bandara Mopah Rimbajaya, Kelurahan Rimba Jaya, Kab. Merauke', '0971-321774', '', '0971-322895', 'stamet.merauke@bmkg.go.id', 1);
INSERT INTO `auditee` (`auditee_id`, `auditee_kode`, `auditee_name`, `auditee_parrent_id`, `auditee_inspektorat_id`, `auditee_propinsi_id`, `auditee_kabupaten_id`, `auditee_alamat`, `auditee_telp`, `auditee_ext`, `auditee_fax`, `auditee_email`, `auditee_del_st`) VALUES
('37822daee7465a67dca7c71793cda4b5a30285a6', 'V/06', 'STASIUN METEOROLOGI MOZEZ KILANGIN', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '36f383ee1dd094a430f2b856a793438c7c3962a7', 'Jl. Raya Freeport, Bandara Timika', '0901-321868', '', '0901-424004', 'stamet.timika@bmkg.go.id', 1),
('1398bc7df55a78295696144199bfaf4fc9ac9e4d', 'V/07', 'STASIUN METEOROLOGI TANAH MERAH', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', 'Bandara Tanah Merah, Merauke, Papua, 99663', '0975-31155', '', '0975-31155', '', 1),
('11dd242f0143dcafee2ac6260056794627de2242', 'V/08', 'STASIUN METEOROLOGI WAMENA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', 'Jl. Gatot Subroto, No. 24, Wamena, Papua, 99501, PO.BOX 193', '0969-31123', '', '0969-31123', 'stamet.wamena@bmkg.go.id', 1),
('8279afec895e9f3848578b532f307aaf79a72ff0', 'V/09', 'STASIUN METEOROLOGI MOANAMANI', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', '', '', '', '', '', 1),
('f79250f28e2d15e87959b9a02bfe90ecffbc804e', '9510', 'STASIUN METEOROLOGI MARARENA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'Bandara Mararena Sarmi, Jayapura', '0966-31146', '', '', '', 1),
('837eecc74ca33253e8f50c2869f07b5d8b2f531a', '9511', 'STASIUN METEOROLOGI ENAROTALI', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', 'Bandara Enarotoli Paniai Papua, Jl. Titina Yogi, Enarotoli, Paniai Papua', '0984-24115', '', '0984-24115', 'stamet.enarotali@bmkg.go.id', 1),
('1c0a029275e4625a9581ad6eb311d9307d43a00b', 'V/05', 'STASIUN METEOROLOGI DOK II JAYAPURA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', 'Jl. Bhayangkara II, Jayapura Utara', '0967-536189', '', '0967-536189', 'stamet.jayapura@bmkg.go.id', 1),
('8ae133c58c6243cb26ac6ecf9f533a13c0ed0449', '9513', 'STASIUN METEOROLOGI RENDANI', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'b83d059734e7478d94c1336dc5013eb863c52052', 'andara Rendani Manokwari, Jl. Trikora Rendani, Manokwari', '0986-212435', '', '', 'stamet.manokwari@bmkg.go.id', 1),
('4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', '9514', 'STASIUN METEOROLOGI UTAROM', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'e547bcf4cae0ebe72a0deaa3cd524d9932972e0e', 'Bandara Utarom Kaimana, Fak-Fak', '0957-21410', '', '0957-21410', 'stamet.kaimana@bmkg.go.id', 1),
('a1d1165f8aa51513abd88a73c388fceed0fe2af0', '9515', 'STASIUN METEOROLOGI TOREA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', '', 'Bandara Torea, KP. 8 Fak-Fak, Papua', '0951-98651', '', '0951-98651', 'stamet.fakfak@bmkg.go.id', 1),
('f8880215d308eae9527cc17e9ad77a1841821cbb', '9516', 'STASIUN KLIMATOLOGI JAYAPURA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'Jl. Yaring Tabri No.69, Genyem, Papua', '0967-91843', '', '', 'staklim.genyem@bmkg.go.id', 1),
('8bec99d5edf1564d0fcfcf4bcfce87071bca8f1d', '9517', 'STASIUN KLIMATOLOGI MANOKWARI SELATAN', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'b83d059734e7478d94c1336dc5013eb863c52052', 'Jl. Sujarno Condronegro, SH. Ransiki, Kabupaten Papua Barat', '0980-31167', '', '', '', 1),
('c73846cc21628fd16d315eeabb79bcec2fc73306', '9518', 'STASIUN KLIMATOLOGI TANAH MIRING', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '0bc555628bee2f79ef756c3f319c7e7b10d13010', '', '', '', '', 'staklim.merauke@bmkg.go.id', 1),
('9d38d25ef6be06fba28cbcc56d23e0f51a88e416', 'V/03', 'STASIUN  GEOFISIKA ANGKASAPURA', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'Jl. Drs. Krisna Suryana, No. 26, Angkasa Putra, Jayapura,Papua 99113', '0967-533533', '', '0967-533533', 'stageof.angkasa@bmkg.go.id', 1),
('7d5cb002e32c0d277f92e5837f5445bc9aebf9c2', '9250', 'STASIUN GEOFISIKA NABIRE', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '', '', '', '', '', '', 1),
('f9bcf4847756c6e1dd0180639aede021e706dc07', 'I/30', 'STASIUN KLIMATOLOGI SAMPALI', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', '', '', '', '', '', 0),
('ba07af6cbedcc2e7bca30adb9de3794c2a856fe5', 'I/09', 'STASIUN  PEMANTAU ATMOSFER GLOBAL (GAW) BUKIT KOTO TABANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '5e60383bfa654e4b8180c866de25e646542f429a', 'Jl. Raya Bukittinggi-Medan Km.17, Palupuh, Kab. Agam, Sumatera Barat 26100', '0752-7446449', '', '0752-7446449', 'stagaw.kototabang@bmkg.go.id', 1),
('5c0ebf3a2446fce0c7628f6a1e0b5fe4404899f2', 'I/13', 'STASIUN METEOROLOGI MARITIM TELUK BAYUR', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '6739a66ce91850bae5f1baf4a6ad7ae1f6075f26', 'Jl. Cilacap No. 31A Teluk Bayur, Padang', '0751-62331', '', '0751-62331', '', 1),
('ac7d62515da637370848baebd2949dd282bfe776', 'I/17', 'STASIUN GEOFISIKA KLAS III MATAIE', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '7ab23ed9061e5235537a87e813f427f5bc641a37', 'Jl. Mata Ie, Pos Perumnas Banda Aceh', '0651-42840', '', '', 'stageof.mataie@bmkg.go.id', 1),
('30cf740372c79c1079a0cfa2d9d6fae05baec77a', 'II/05', 'STMKG TANGERANG SELATAN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'a5a1f057a486d998adcf7229c1e3af0c88383d51', 'Jl. Perhubungan I No. 5, Pondok Betung, Pondok Aren', '(021) 73691621', '', '', '', 1),
('82cdb20ae8ddca30525030b994e2de5276a82ad3', 'II/22', 'STASIUN METEOROLOGI KLAS II SMB II PALEMBANG', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '76d291d5d0d9498f26b37cea62e6cccd8ab2b7ca', '', '', '', '', '', 0),
('d470592e6ff31af9c6c70c3d78c3304a09bf9043', 'II/25', 'STASIUN KLIMATOLOGI KLAS IV PESAWARAN', 'be097c32eebc0fe4f185e109f60241e02236eb02', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '0efd5a20efd958468a9c47127b811e8747e22e93', 'Jl. Raya Masgar Km.35 Tegineneng Pesawaran', '(0725) 7851570', '', '(0725) 7851571', 'staklim.masgar@bmkg.go.id', 1),
('9ebfecf70c00c10955ea547555efa49cb52bffe7', 'I/31', 'STASIUN KLIMATOLOGI ACEH BESAR', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '63add612f7390a2666b9732fcda23cadb1b3f1b6', 'Jl. Banda Aceh Medan Km 27,5 Indrapuri, Aceh Besar', '', '', '', 'staklim.indrapuri@bmkg.go.id', 1),
('a7a2bf7d5d4af2384c028df06ccee25660ea680f', 'III/01', 'STASIUN METEOROLOGI NGURAH RAI', '5c8ba13288540c714750ff9e130aad4453866332', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '228bec8dd9fec439a87f3069dcc0c31f3a259660', 'Gedung GOI Lantai 2 Bandara Ngurah Rai Denpasar', '0361-9351124', '', '0361-9351124', 'stamet.ngurahrai@bmkg.go.id', 1),
('373967d28eb3fdd78107c70bad12045aab13a0ce', '002', 'kepala stamet kualanamu', '03b3980371bfbe3ef823da11f3162998de3cf0e6', '22d73ea85e0e84ddeecf422ddbcfc18d2c699b94', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', '', '', '', '', '', 0),
('3d801bebbe1769e7a02c7a99a73207a3bf003656', '148', 'STASIUN KLIMATOLOGI TILONGKABILA', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', '22d73ea85e0e84ddeecf422ddbcfc18d2c699b94', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'cbfa6bd4173f0efb045a5bf1c0601e96d4b1d03c', 'Kabupaten Bone Bolango', '', '', '', '', 1),
('3ff0eda1b91bece8d05d62be08dda19e00305ab2', '166', 'STASIUN METEOROLOGI SUDJARWO TJONDRO NEGORO', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', '22d73ea85e0e84ddeecf422ddbcfc18d2c699b94', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'cb23b87f8d873c66dc6c381fee089903ba23f9df', 'Jl. Jendral Sudirman, Serui, Yapen, Waropen', '', '', '', '', 1),
('9f02db688746674d2f9177d555b5adcb4c11f712', '177', 'STASIUN GEOFISIKA SORONG', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4a083e19ba8c23791a6b4544c617a41c3db2cd86', 'Jl. Danau Siwiki, No.1, Kampung Baru, KP 167, Sorong', '0951-321785', '', '', 'stageof.sorong@bmkg.go.id', 1),
('38e6fc35cf2fed73745c1166199a364633c873d5', 'jkjkj', 'Nur Chalik Azhar', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 'f7d66dce0a6697a089ec835f1a724d20bba955cd', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '6f0c83b8eb8a17d30e93ee56013f03ab0b6b1e5b', 'Ciledug', '08787878787', '7878787878', '78787878787', 'c@gmail.com', 1),
('2162ac6564477ebd680ace5542664638c2de2450', '1', '2', '3', '4', '', '', '', '', '', '', '', 0),
('bbe56a02b326d559871a132ea983f9556f97779b', '1995', 'Ridho', 'Pamulang', '081280094191', '', '', '', '', '', '', '', 1),
('6977412b56671db48d8457dd07ad92f2dc7429f7', '10', '10', '10', '10', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auditee_pic`
--

CREATE TABLE IF NOT EXISTS `auditee_pic` (
  `pic_id` varchar(50) NOT NULL,
  `pic_nip` varchar(25) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_jabatan_id` varchar(50) NOT NULL,
  `pic_mobile` varchar(15) NOT NULL,
  `pic_telp` varchar(15) NOT NULL,
  `pic_email` varchar(50) NOT NULL,
  `pic_auditee_id` varchar(50) NOT NULL,
  `pic_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditee_pic`
--

INSERT INTO `auditee_pic` (`pic_id`, `pic_nip`, `pic_name`, `pic_jabatan_id`, `pic_mobile`, `pic_telp`, `pic_email`, `pic_auditee_id`, `pic_del_st`) VALUES
('f7523d7b5331810d94704a011cbc97eca7d08ba5', '001', 'kepala stamet kualanamu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'b8a1b3d8f1fbec5c370043c88162b3d1bd221f57', 1),
('b4b8d81d2e487ec5742fc7cda669e94c042bc565', '196201221981031001', 'kepala stamet kualanamu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '03b3980371bfbe3ef823da11f3162998de3cf0e6', 0),
('b8a1b3d8f1fbec5c370043c88162b3d1bd221f57', '002', 'Kepala Stamet Hang Nadim', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0778-761507', 'stamet.hangnadim@bmkg.go.id', 'ddf44b08349ee894d3fed01c21b796e5dde53b2b', 1),
('fb256cbe8f606ae5afb197f4e9d377be07032544', '003', 'Kepala Stamet Sultan Iskandar Muda', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0651-24217', 'stamet.blangbintang@bmkg.go.id', '38e0a9aaaf0ccc48bbc5383b92573cd66a8e7cc0', 1),
('5974fec216c8f442e5c021003525521a81185987', '004', 'Kepala Stamet Sultan Syarif Kasim II', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0761-674791', 'stamet.pekanbaru@bmkg.go.id', '4c1b5e2442df7685848ec6a92b99199752c0ff69', 1),
('941cf83a6b2f34bf48c3845b668dc13f164c0da2', '005', 'Kepala Stamet Minangkabau', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0751-819105', 'stamet.tabing@bmkg.go.id', '5989bda524469846bb95c2ae6aad5fb4df5fb519', 1),
('21ba2750247b108eb5ffce1e3ce4db5326900c22', '006', 'Kepala Stamar Belawan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '061-6940340', 'stamar.belawan@bmkg.go.id', '9eb765ec2d6d5d7c2d42349e275d331245eedcb9', 1),
('51114a20318856089515dad9cc5dfbb639527909', '007', 'Kepala Stamet Malikussaleh', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0645-7000710', 'stamet.lhokseumawe@bmkg.go.id', '302978251ef72cd5ebc8467b2beb73615b1b5e09', 1),
('db2536b15249f68af0dc27c191ed4d9a89a77647', '008', 'Kepala Stamet Tjut Nyak Dien Meulaboh', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.meulaboh@bmkg.go.id', '8efb1389718ce5eb49a689fbd9681a8080eba6eb', 1),
('27c344a0957346c37e94e4f1bad39de1e931a513', '009', 'Kepala Stamet Cut Bau Maimun Saleh', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0652-21525', 'winny@gmail.com', '5846292803f8f043265f65f112038349040d8302', 1),
('1b34ed3591ee4d55917de09f776efe9e259e2ca4', '010', 'Kepala Stamet Japura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0769-7443110', 'stamet.rengat@bmkg.go.id', 'e4197f075ccf90bcf635d546881dd12f7cbc007c', 1),
('c90368ca89bc3be59ef06f941dc168dccc0d6dc3', '011', 'Kepala Stamet Tarempa', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0722-31402', 'stamet.tarempa@bmkg.go.id', '7bb966d907124fd47adb65a6805f9a5a766659fd', 1),
('631b2442c7f8897fbc177bc5c533f4982047b423', '012', 'Kepala Stamet Dabo Singkep', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0776-21247', 'stamet.dabosingkep@bmkg.go.id', '3cc5a1b742dd053283179e468201df72f0f19064', 1),
('1ea8413318021dec780aa79f2974a6f1c9dbc6f0', '013', 'Kepala Stamet Ranai', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0773-31016', 'stamet.ranai@bmkg.go.id', 'ecc6c0b9c46b93ed2608f44c7d85195004e7ced9', 1),
('552c684acb3c713087c038915a90fd750b55d06d', '014', 'Kepala Stamet Kijang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0771-41091', 'stamet.tanjungpinang@bmkg.go.id', 'c40f80349aecb991f2c5839a2e2b546a587879bd', 1),
('f728972502907128ccab4600dd7cbc24cba78bad', '015', 'Kepala Stamet Binaka', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.binaka@gmail.com', '113dab4e46b9404645733dfdacfab62ed728ca12', 1),
('d6be678a3c6bfd5f67cd8abb09c63ceb64fd8550', '016', 'Kepala Stamet F.L Tobing', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0631-391004', 'stamet.sibolga@bmkg.go.id', '02721b708424ef85c296bb5ee1a8de5714cae1ac', 1),
('471aa5cbb1577ab5520513f55df5a5821c20db6d', '017', 'Kepala Stamar Teluk Bayur', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0751-62331', 'winny@gmail.com', '5c0ebf3a2446fce0c7628f6a1e0b5fe4404899f2', 1),
('561749cc0c0d55f1b44ba62661d9ed662390c5fb', '018', 'Kepala Stamet Aek Godang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.aekgodang@bmkg.go.id', '773e7959d5497aca4f9737051fd29f60e2ed7af1', 1),
('3735ca405bf87fe50b2ceae94fcd91604f62edfa', '019', 'Kepala Stamet Raja Haji Abdullah Tanjung Balai Karimun', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0777-324320', 'stamet.tbk@bmkg.go.id', 'ad910b6b39b0e56d3ad9d7c7d60763a172795b93', 1),
('a148a1e02f89b5b0538b673206d7f19ec3105008', '020', 'Kepala Staklim Deli Serdang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '061-6628002', 'staklim.sampali@bmkg.go.id', '0385538efd8abc045dce709b5944c539e2a10138', 1),
('eacb82963c28d651c10aabfec6dafb8fd1cb1fbc', '021', 'Kepala Staklim Padang Pariaman', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0751-36491', 'staklim.sicincin@bmkg.go.id', '2aab9fd4fe2416310d7b3b4dc7a48ca160b8b4b6', 1),
('8388c89378d699b450c1b12343bbee115bd7cd2a', '022', 'Kepala Staklim Aceh Besar', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'staklim.indrapuri@bmkg.go.id', 'fa1e019dd5d7eb6f54091d2e98d3432194753cfa', 1),
('bceae8f1260fd0b3dc27f598e8abbcbfa735dffa', '024', 'Kepala Stageof Tuntungan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '061-6626975', 'stageof.tuntungan@bmkg.go.id', '85d2e28432e91593acb499b27c3c8f6075be5776', 1),
('135ec7ff473fe3a8ff86184553e68bd066606732', '025', 'Kepala Stageof Silaing Bawah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0752-82236', 'stageof.padangpanjang@bmkg.go.id', '80758fc5bfc2916b72f1244e576b3a8451fb3f9e', 1),
('070a3853bd20a718843e5630dd67dc0ea6f71ff0', '026', 'Kepala Stageof Mataie', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0651-42840', 'stageof.mataie@bmkg.go.id', 'ac7d62515da637370848baebd2949dd282bfe776', 1),
('5364624db75db021ccad13dfd73ba4419e594d1a', '027', 'Kepala Stageof Tapak Tuan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'f88bc80292f1d4b420a58056ef305a893482ea84', 1),
('d75be53f968b894d9cc0cc175e66e91a282277dc', '023', 'Kepala Staklim Tambang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '60f75babfe238a5092cb4beba1e276192004fb77', 1),
('8a88c4e3771174521fa8a0c39f88c35ff55dfcbb', '028', 'Kepala Stageof Gunung Sitoli', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '082368409989', '', 'stageof.gunungsitoli@bmkg.go.id', 'd7596c34bcc3d6545c35579cadb04995483affb5', 1),
('a67c3738a54261b410dab420d26eb1e3c3bd798f', '029', 'Kepala Stamet Soekarno Hatta', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021-5506145', 'stamet.cengkareng@bmkg.go.id', '327f17fdf8ef381f343a7081f5b2369353aca7ea', 1),
('b2b0b6f8ebd6cabdb4a1d9b526a99421588ab97a', '030', 'Kepala Stamet Serang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0254-200185', 'stamet.serang@bmkg.go.id', '77b161b149594a1ffc927bddec3d788b7d90deb5', 1),
('d9c0f0301ca54b14ee40270906d43eb723bc87de', '031', 'Kepala Stamar Tanjung Priok', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021-43901650', 'stamar.tanjungpriok@bmkg.go.id', '6f323e930618a35fa113d35c3ab5aa674c0d74b8', 1),
('0afbe9f108a5590c7c8b2efdc41539aabbb4e3fa', '032', 'Kepala Stamet Radin Inten II', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0721-91093', 'stamet.lampung@bmkg.go.id', '7c045f084d4948cf08442a07e11c7f70f604cddb', 1),
('aa532b25d89a58ed7918f6307af6a4ad6e6bb99c', '033', 'Kepala Stamet Supadio', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0561-721560', 'stamet.supadio@bmkg.go.id', '2ad99129b7ab75bbbce119f4ab03f9284bbc184a', 1),
('d6f78a3e3ba8d7561b7c937bf51c7079761b3908', '034', 'Kepala Stamet Depati Amir', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0717-436894', 'stamet.pangkalpinang@bmkg.go.id', 'b1b90f3ad5105610aa8838632d5236e27d222c66', 1),
('4e776dfd1b2ed7105e35088a03da4043d8500008', '035', 'Kepala Stamet Sultan Thaha', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0741-572161', 'stamet.sultanthaha@bmkg.go.id', 'b043aef5e6cc7dc4149833f7bf4484ad7a8690c4', 1),
('0fd72007857176a3f7a7d7b72499c136aa0c9460', '036', 'Kepala Stamet Sultan Mahmud Badaruddin II', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0711-430274', 'winny@gmail.com', 'a9a55b1bc433a1b4128230f7d3b36504f35e3c8a', 1),
('77b62f9d85854a19afa045a252d31aaa0dbf26f0', '037', 'Kepala Stamar Tanjung Mas', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '024-3559194', 'stamar.semarang@bmkg.go.id', '036ad763c2d64f4c607d28c7b6f561d719278d36', 1),
('4ffba2658b14c368fa4eb61750dba72bff00f6b1', '038', 'Kepala Stamet Ahmad Yani', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '024-7626064', 'winny@gmail.com', 'c42ba2b2873b4ee0dca9aa85e3de7dde439dac2a', 1),
('b63867604c312c3482975e4228aa72a03e234bfc', '039', 'Kepala Stamet Fatmawati Soekarno', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0736-51064', 'stamet.fatmawati@bmkg.go.id', '4fef04e919ba8767b20e0850c3a689e2ebc5d834', 1),
('63cf6254f5fef1824bedacb29ac0a1c7e84f94c6', '040', 'Kepala Stamet Budiarto', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021-5983894', 'stamet.curug@bmkg.go.id', 'cefb8672afd220bade80f51f1605945519c1119d', 1),
('358ffa61510e90231f72f12cf814a1c6e7be7a6c', '041', 'Kepala Stamet H. Asan Hananjoedin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0719-24310', 'winny@gmail.com', '260e0b2ec8b1540ea28e974cfb0143caf6afc184', 1),
('58cfb8c8fec3fda851de3b7ea08edd6f24c4c09b', '042', 'Kepala Stamet Depati Parbo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0748-7004800', 'stamet.kerinci@bmkg.go.id', 'daa6c4cc61c5732bcaf78477e439c9640ca84785', 1),
('5ae9e60980e532179957f343db0edcbb2ea9f4db', '043', 'Kepala Stamet Tegal', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0283-356206', 'winny@gmail.com', '81a3caa51b63c4ebafede707bda0a8600796d816', 1),
('4181b91c4f20561878c68b300e0eb72bc9f32f38', '044', 'Kepala Stamet Cilacap', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0282-34103', 'stamet.cilacap@bmkg.go.id', '7d418c03851195ab4fb76ec821ce8ec7daceaa4b', 1),
('24d2d53d0050c9d3616b6ab54c178c404c4f9964', '045', 'Kepala Stamet Kemayoran', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021-6545808', 'stageof.kemayoran@bmkg.go.id', '91b663c6153f1b6b8dcf2961c011ec5fffb3a47a', 1),
('1c0a3904bd54bb06624d68cb1944ad7cb467778f', '046', 'Kepala Stamet Paloh', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '562-4395086', 'winny@gmail.com', '1cf0103ee1fbc482f0acde1e11844b54f3ce50e9', 1),
('352ab583d9bb50133d15e69ae2cae0c8d86a21dc', '047', 'Kepala Stamet Rahadi Oesman', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0534-32706', 'stamet.ketapang@bmkg.go.id', '1be41bde3de5cc7518e7b99467cd8399b4a19432', 1),
('5ca100be591f7a8a27427e73a1d97e4bccd11ff0', '048', 'Kepala Stamet Susilo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0565-23013', 'stamet.sintang@bmkg.go.id', 'b820963bdfe66dd03368dc41cf626ddee18e4d61', 1),
('20c2a488c4287dcfa605508822501a9ba609cf0a', '049', 'Kepala Stamet Nangapinoh', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0568-21330', 'winny@gmail.com', 'fcc73e34149e5557657060f44320c7ae9a3e29c0', 1),
('1a813b86c615908495de539a1d16d8d82abacd27', '050', 'Kepala Stamet Pangsuma', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0567-21567', 'stamet.putussibau@bmkg.go.id', '2cfa5c683e3d3ddbc85b3ccafa7aa714563987a3', 1),
('893dde363dc978ff1c534de3d18b0037f5ada9e6', '051', 'Kepala Stamet Jatiwangi', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0233-881013', 'stamet.jatiwangi@bmkg.go.id', 'c4dd603b81de7d491e65b89c610fd6013548a371', 1),
('b516de1fe91bd094f504371972494b0638180466', '052', 'Kepala Stamet Citeko', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0251-8255011', 'stamet.citeko@bmkg.go.id', 'da9779cc2096d525aae6232e49fa6fcca660aca0', 1),
('6fedc66fdcd267c80364c2ff2e0f9f1f8edf2d0b', '053', 'Kepala Stamar Pontianak', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0561-769906', 'stamar.pontianak@bmkg.go.id', '4088f9c931057757ff6dd58dc6035e1dd220499b', 1),
('0bfe400a94cc0887f21ad67eace2815c23119036', '054', 'Kepala Stamar Lampung', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0721-342219', 'stamar.lampung@bmkg.go.id', '4c4e9de80284867cef02262ef487366ecfb326e9', 1),
('2e37ffe2c01b48e873718a45deed54a5aad8ceac', '055', 'Kepala Staklim Bogor', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0251-8628468', 'staklim.bogor@bmkg.go.id', 'af8107710e23c5b05647dd79ca6f4cd0660afe1d', 1),
('b6c757a074e98ad231d2c88b59c6bd0ba73fa1b9', '056', 'kepala Staklim Semarang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '024-7609016', 'staklim.semarang@bmkg.go.id', 'c4a763b2395b0a77689428b4dd18c1cafdda485f', 1),
('052a48525293ea12e236df87d6d93690ad68a905', '057', 'Kepala Staklim Palembang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0711-811642', 'staklim.kenten@bmkg.go.id', 'd1993eb87d22b665d53bfd31f024c104f9d873eb', 1),
('6891969db6b0d5cc24bc829a69318c756730c066', '058', 'Kepala Staklim Bengkulu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0736-51251', 'staklim.pulaubaai@bmkg.go.id', '85a6abf9ebee44b5f4ed109140441e22d99ed000', 1),
('5a414b7c8058c3b4ccca606447c67fe09e7dd4a3', '059', 'Kepala Staklim Mempawah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0561-7075083', 'staklim.siantan@bmkg.go.id', 'd008312b8dbb8579e8ca7eaf9f4e9d43becfd095', 1),
('faf1e675b3644aeb05435909079361a6b7f3ae39', '060', 'Kepala Staklim Tangerang Selatan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021-7353018', 'staklim.pondokbetung@bmkg.go.id', 'fecc74a6987af689b4f24a871a9e29d6991fca4c', 1),
('d673031f65849a3e7b4b0525e20726a336a117b7', '061', 'Kepala Staklim Muaro Jambi', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '(0741) 583500', 'staklim.seiduren@bmkg.go.id', 'fa42d6c1197594171ba796f192ed0722fd03dcc8', 1),
('3aa4cdcb2b81f2cc2e094ea03de7c57b396bc4b2', '062', 'Kepala Staklim Pesawaran', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '(0725) 7851570', 'staklim.masgar@bmkg.go.id', 'd470592e6ff31af9c6c70c3d78c3304a09bf9043', 1),
('618483acdcdbe38f04fc3e08fe0d9c5aafd41a4f', '063', 'Kepala Staklim Koba', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'staklim.koba@bmkg.go.id', 'd9f3da3de5fe0eef1dce7d8e5c56f7fc2e4138bf', 1),
('fa81843b7aa775311b42e86ab9a2ace97b291b98', '064', 'Kepala Staklim Mlati', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'ad71b22dc49c6da9ac27adb999059442ce390b7a', 1),
('d503465e8c8fb737a63399715ca3f54c846cc5a8', '065', 'Kepala Stageof Tangerang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '021--55771822', 'stageof.tangerang@bmkg.go.id', 'a5b4facab082c6881316e7fcf590ad7983a255b2', 1),
('5ff607ab1ef8783a0bc9b822eeadf7bc0333d060', '066', 'Kepala Stageof Bandung', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '022-2031881', 'stageof.bandung@bmkg.go.id', '187316f11616500877832e232426a9750b0f207f', 1),
('0b62a48439f33dc48d2c0fbf641afc05265b7b4a', '067', 'Kepala Stageof Yogyakarta', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0274-6498380', 'stageof.yogya@bmkg.go.id', 'db919a9c218b0a48d3820e1f0b4d00fef616b7e5', 1),
('c158b67a2c260666f06e2e4724ea32e26977fdd0', '068', 'Kepala Stageof Banjarnegara', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0815-6987321', 'stageof.banjarnegara@bmkg.go.id', '9290eab42588a780f808a50fb4fcfe01dfae2a9c', 1),
('b0dae173fffb2ab7ecef0eae0e48a37becd10ace', '069', 'Kepala Stageof Kepahiyang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0732-391267', 'stageof.kepahiang@bmkg.go.id', '5b3f5307893d276198f00179e5165aa02e52bc89', 1),
('04a7a407fb70c774029aa0526e269c15c2fbd4c0', '070', 'Kepala Stageof Kota Bumi', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0724-22870', 'stageof.kotabumi@bmkg.go.id', 'ff6b9049814c6fb1e452bf464f6c9c7498498d18', 1),
('966af961051146a0ebba5ede3dcfb77330d601e1', '071', 'Kepala Stamet Juanda', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '031-8668989', 'stamet.juanda@bmkg.go.id', '60946bb13d898f52dbd5f63df1a667dbfe2ce6b1', 1),
('dc71a7255faf722e731c3fa0e05be67eacfebb20', '072', 'Kepala Stamet Ngurah Rai', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0361-9351124', 'stamet.ngurahrai@bmkg.go.id', 'a7a2bf7d5d4af2384c028df06ccee25660ea680f', 1),
('c9c6a33702013b203e5c33eb468ac0e4f4bd1358', '073', 'Kepala Stamet Sultan Aji Muhammad Sulaiman Sepinggan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0542-762360', 'stamet.sepinggan@bmkg.go.id', '6eafabf98671968b6d35911130b1585335fc8367', 1),
('56b28742f54b8500f720e040833aa5963750d6e4', '074', 'Kepala Stamet Tjilik Riwut', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0536-3222871', 'stamet.tjilikriwut@bmkg.go.id', '2bfb56d903cdde31495ea39cf7e3086cecf7d4b9', 1),
('43670857b884ee720a088ba133f9a8ca57b3d5c6', '075', 'Kepala Stamet Eltari', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0380-881613', 'stamet.eltari@bmkg.go.id', '77c1a9e57cd8c61127138841bf06d1f2bf9f6607', 1),
('a186f4526a54bd866677684e77e307653949d245', '076', 'Kepala Stamet Syamsudin Noor', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0511-470518', 'stamet.banjarmasin@bmkg.go.id', 'dd454917c76e5afb518f15054a5568838c49107a', 1),
('80ee7ac38a816b2c7fb0f08a51b3b95f608a6ec7', '077', 'Kepala Stamet Maritim Perak II', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '031-3287123', 'stamar.perak2@bmkg.go.id', 'd3bb805d7b488285b70fa3988a46c788455b09a7', 1),
('0382770d9147d1d8486903f548072f5aa0fa942a', '078', 'Kepala Stamet Bandara Internasional Lombok', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0370-6157022', 'stamet.selaparang@bmkg.go.id', '5a83d9a32ed7fb95e54ccbc8ffb4e597fdf5c214', 1),
('3fd8fc1b274f4f9eba89ccab0a835eee55029cde', '079', 'Kepala Stamet Iskandar', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0532-21329', 'stamet.pangkalanbun@bmkg.go.id', 'a5592ac5656981b7fcfe5918956c6f1f685b022e', 1),
('2d66a58e03a311e57990472ea536c2a778a9d9ef', '080', 'Kepala Stamet Beringin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0519-21495', 'winny@gmail.com', 'cfa602a3b7343d39665fdbb7e447659f36bc4d5f', 1),
('988dbcd858e2231868d80dde22399c0a07405c95', '081', 'Kepala Stamet Temindung', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0541-741160', 'stamet.samarinda@bmkg.go.id', '003fc795718d4a8ede7c23493f7432022138bacc', 1),
('76b2dc7ab7c5f371226eafd392e4672ed0def0ad', '082', 'Kepala stamet Juwata', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0550-21629', 'stamet.tarakan@bmkg.go.id', 'e32e00c63302ab47cc1c74bee7b8c9651b38ec98', 1),
('a088b3f23a38e48fe9abf7799d5e791cb6a901b0', '083', 'Kepala stamet Kalimarau', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0554-8811119', 'stamet.kalimarau@bmkg.go.id', 'e7e832de2a0fd5215e3cd7609e85269e912d3576', 1),
('f48c391671a04a85d31f5e9acae8bd77671213e2', '084', 'Kepala Stamet Tanjung Harapan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0552-21306', 'stamet.tanjungselor@bmkg.go.id', 'f5228966f46a48b7e744780d1d1564c07bd79927', 1),
('7757b20d02a3cd4eab235cd583171cee5ddde580', '085', 'Kepala Stamet Yuvai Semaring', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', 'Fax 0551-21643', 'stamet.longbawan@bmkg.go.id', '28c590a346b0de6a154517e628f3399728cc4d65', 1),
('1f0ad423b3a08c37b25c4e1fee3c03ce8511eb5d', '086', 'Kepala Stamet Gusti Syamsir Alam', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0518-21701', 'stamet.kotabaru@bmkg.go.id', 'ca8d94aa120302f4d2950d7f39dd2b5e7ec061f3', 1),
('a9d849a2a2438b21df0a5f7e8fcddabe2244d293', '087', 'Kepala Stamet Sultan Muhammad Kaharuddin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0371-21859 / 03', 'stamet.sumbawabesar@bmkg.go.id', '69dfc10b443e887c04666cfdb66f852c21b048c3', 1),
('56cc3b9254516c2e17939034cd5a4827d58cd41b', '088', 'Kepala Stamet Sultan Muhammad Salahuddin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.bima@bmkg.go.id', 'dfa40db1773f501d63be2729b45429ea76d89dd1', 1),
('75ac9d823198bde75a27097ca7744ff1f9f28787', '089', 'Kepala Stamet Fransiskus Xaverius Seda', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0382-21349', 'stamet.maumere@bmkg.go.id', '357506b606933d2072910719429843c4417a744d', 1),
('80e631b9ec0fbe74275df417d4a4fc05b109df02', '090', 'Kepala Stamet Umbu Mehang Kunda', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0387-61227', 'stamet.waingapu@bmkg.go.id', '29e01c1a0c3e8a917c3b1aefc1ccd3ffef2d86a8', 1),
('5e63d032443bb80ffaf63c90d2f6234d0be6dd24', '091', 'Kepala Stamet David Constantijn Saudale', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.baarote@bmkg.go.id', '8b0a111ec0c94553fffc080c31e2ca9c7ac7a0af', 1),
('cad162cb0a936ac1ebf0c60da7199cd8559faa12', '092', 'Kepala Stamet Gewayantana', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '2b7df90295e4a43f20db1c1a680127c3e1d62798', 1),
('96d3629419808f6755555ffe1166377c2aebd6c3', '093', 'Kepala Stamet Frans Sales Lega', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0385-21264', 'stamet.ruteng@bmkg.go.id', 'aac05dbeb21049e675a0e9765ebd14b7c50a24fb', 1),
('8c20304c729181c2031d686dd126f75ebdba29db', '094', 'Kepala Stamet Mali', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0386-222280', 'stamet.mali@bmkg.go.id', '5950eacf95d9f767e27ff43c78d9e0e18f34373e', 1),
('3ecf05704bdaa736d77169651da8c4ebe37a5bba', '095', 'Kepala Stamet Tardamu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0380-861042', 'winny@gmail.com', '68b7ddc764695769ec7cda83e92d9c6a5a593dc9', 1),
('53b163d70f2c6bd432d78a52901a919f3372d139', '096', 'Kepala Stamet Kalianget', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0328-662743', 'stamet.kalianget@bmkg.go.id', '721e3a53d617f335206d8f0d78b811367263aade', 1),
('4721931f65ab67c639d7d802d25b31b953f99766', '097', 'Kepala Stamet Sangkapura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0325-421004', 'stamet.bawean@bmkg.go.id', '147f79358db9cfe780deb7ec64de7b23cb689248', 1),
('09acad880f03b864f9b5e2f2467ac5f71b0e9408', '098', 'Kepala Stamet Tuban', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.tuban@bmkg.go.id', '282b9af885f2723b107fc929688569bce919985d', 1),
('7efa7d68cb20e516fa926f8ec0faaabdddc19d91', '099', 'Kepala Stamet Banyuwangi', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0333-421888', 'stamet.banyuwangi@bmkg.go.id', '700c02db2fb31a7578ae90c11c8e399ad738ae1e', 1),
('b0001b5e7dd1b1b96f5c5c36bad563d34d2095b5', '100', 'Kepala Stamet Nunukan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0556-2025415', 'stamet.nunukan@bmkg.go.id', 'a371372a45c9eb979682d909dfa49531edeec7f7', 1),
('8263a5427d169bc7e902a3fd063c4d278006364c', '101', 'Kepala Stamet Komodo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0385-41914', 'winny@gmail.com', '325faeb327f42ba8d27ed02461782ee3968ea39d', 1),
('2c60a4518503962e760e57f24ff24a8e0d190ca3', '102', 'Kepala Stamet H. Asan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0531-34363', 'stamet.sampit@bmkg.go.id', 'c01ce6ce3704c36a41c3bc12fc4fb2c0f4d9bbfa', 1),
('997b94d38c8e37811823513ad00e31960f97b68a', '103', 'Kepala Stamet Sanggu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0525-2703419', 'stamet.buntok@bmkg.go.id', '566ffaa1b6e91480763d9db56090ad81a19970d8', 1),
('9d2fda6e6292fca88640e4834ce60ec8b1468cdd', '104', 'Kepala Staklim Banjarbaru', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0511-4787229', 'staklim.banjarbaru@bmkg.go.id', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', 1),
('c8d3b741533eb60b6c612e1bdfca53e2bd1612d2', '105', 'Kepala Staklim Lombok Barat', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0370-674134', 'staklim.kediri@bmkg.go.id', '10daf828826717a865d866e633d1df42cd0bb151', 1),
('d1a60d15a94f800c460d2c60714f3f19e5d6992e', '106', 'Kepala Staklim Malang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0341-461388', 'staklim.karangploso@bmkg.go.id', 'ba01a6c9332a08dea79731c07b0376ee6f2b90f9', 1),
('45a03b0dd2d1a5e870d7e0b9e90e3f91ed5b9e1a', '107', 'Kepala Staklim Jembrana', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0365-4546085', 'winny@gmail.com', '8535e268736de6ed39cc3c6b81636a99692d1f5b', 1),
('9742fb9606249bed40933d76be31fd6cfd53a7b7', '108', 'Kepala Staklim Kupang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0380-881681', 'staklim.lasiana@bmkg.go.id', 'fd3262f30324054f3f8db5473c0f5ae630eaaaa9', 1),
('c0fbfdbc7f0e7d9391bdf618ba41af2269be45c2', '109', 'Kepala Stageof Kampung Baru', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0380-821608', 'stageof.kupang@bmkg.go.id', '539d74c81ea7696615c9e7e21a3d2554e7021350', 1),
('07983121633959c70746e8a8e109b21daff01b0c', '110', 'Kepala Stageof Tretes', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0343-635590', 'stageof.tretes@bmkg.go.id', '7f70888051031cf6849ff28c4bf2d5caec25c512', 1),
('fdd06a6d71c15a679ac8580ef448729aa6ae8096', '111', 'Kepala Stageof Sanglah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0361-226157', 'stageof.sanglah@bmkg.go.id', '0721c70d49cbe0b1bff490aa340f74410cb406e7', 1),
('60b903d14972223bc9bcde149182b9f823c06a1c', '112', 'Kepala Stageof Sawahan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0358-326434', 'stageof.nganjuk@bmkg.go.id', '5b3b3422a2c95d937b8e5ebeec4a6abffecfb0a5', 1),
('75d6d6355977aa3a11232c948c081f7dae6286be', '113', 'Kepala Stageof Karang Kates', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0341-385667', 'stageof.karangkates@bmkg.go.id', '3f6d2b28bdc85825e2bbed13f192bb84ec87d16b', 1),
('0d800baaaa3a77b69119638845d6ff877a9f6cdb', '114', 'Kepala Stageof Balikpapan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0542-764053', 'stageof.balikpapan@bmkg.go.id', '1c8a5553ffb7aa214cca9e10cbe5ecebff1755d7', 1),
('c28337fca100efed8e8d78bd10e8fce1265b405b', '115', 'Kepala Stageof Mataram', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stageof.mataram@bmkg.go.id', 'a229b3036f666628b3c6d6c6686f5bdc5a229d4f', 1),
('a022057fade8c047122374f52b49e5036f8be721', '116', 'Kepala stageof Waingapu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0387-61226', 'stageof.waingapu@bmkg.go.id', '451db43c8cb86ebb05ea5efa540ea045632f913a', 1),
('d878b278bbc7a741c0cc008ecd1dd741f39a9dce', '117', 'Kepala Stageof Alor', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '9cf50648b21dca17b0b45b3b02e1b72cf3280f9c', 1),
('3997ff698028e4a32f35f09e6ce13722207b26c6', '118', 'Kepala Stamet Hasanuddin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0411-553019', 'stamet.hasanuddin@bmkg.go.id', 'd4dfda783bc925e1e153e049670d3e962517fcc1', 1),
('29fc02ec220aa3c4d6168ab9e766bef1b5986de9', '119', 'Kepala Stamet Djalaluddin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0435-890393', 'stamet.jalaludin@bmkg.go.id', 'dff1a5cefb8eed1ddd317f739b931a53882238d5', 1),
('fdf7aac00585ea9094b6f785cf091878d0583e8b', '120', 'Kepala Stamet Sultan Baabullah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0921-3127902', 'stamet.babullah@bmkg.go.id', '3d4bf47b237624aa94bca592871b1956d8e9352e', 1),
('648b0e219d14f1ba5ffeece238080c45dc56ea8d', '121', 'Kepala Stamet Pattimura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'ee3259666f61524b4c74f3e47a093c52abc178ee', 1),
('041a3bae3ed618fa9125438d498c6edeb2413a61', '122', 'Kepala Stamet Sam Ratulangi', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0431-811663', 'stamet.samratulangi@bmkg.go.id', 'ee01c49ff75d276436fa73eecd566174c2854d7f', 1),
('8bf160e6c7740ead63441cfada0c729995fb6f7c', '123', 'Kepala Stamar Bitung', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0438-21710', 'stamar.bitung@bmkg.go.id', '1369966dfcfc861da6ddf95b486e5eb3d87f27b2', 1),
('4ce82957e51342a440301f41683194eef3e4f86e', '124', 'Kepala Stamet Mutiara Sis-Al Jufri', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0451-482172', 'stamet.mutiarapalu@bmkg.go.id', '8024e5fcd0b3857c3c67bf6491ef6ebb903c9513', 1),
('cbc007097e50dcae34eb78021e636ff336edb8c7', '125', 'Kepala Stamar Paotere', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '(0411) 3619242', 'stamar.paotere@bmkg.go.id', 'dbd83803e77be43ebdc55135105831f32b82a3bb', 1),
('09d5b746031bd2d609ebcd5f8601e5420a635a37', '126', 'Kepala Stamet Majene', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0422-21296', 'stamet.majene@bmkg.go.id', 'e9b60dfff32afbac974621370a67fc86c1bbd5cd', 1),
('e57d3eeb75685080b5fc53ed4d33040cc857d076', '127', 'Kepala Stamar Kendari', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0401-328528', 'winny@gmail.com', '40d25636a9a8071766f1af844b4e3e59616c013d', 1),
('ca70babf98bd99a4fe73a56f29bec3029cf9ff68', '128', 'Kepala Stamet Dumatubun', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0916-24025', 'stamet.tual@bmkg.go.id', '0c53797a341f4775d2d934f58ee141a11483a14b', 1),
('138199d69ed9a9ed96dbbd2914749c2faa89ce93', '129', 'Kepala stamet Amahai', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0914-21398', 'stamet.amahai@bmkg.go.id', '7feab6ba1ae66d6204483310c2068b999a9f4e9d', 1),
('42aef0a5fa8afaa268121c86bbfcc57874ddf54e', '130', 'Kepala Stamet Geser', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.geser@bmkg.go.id', '141bff35c5f4ef35ed2969f6ccb13960739a220f', 1),
('c8eff485c2159f202767714114f17b6ce2a33cac', '131', 'Kepala Stamet Oesman Sadik', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0927-21255', 'stamet.labuha@bmkg.go.id', '287b5a961b0d83da4444476ce09620f28b368ac3', 1),
('eb2640cb55df2554673a0dc90a316fe9d3c5974d', '132', 'Kepala Stamet Bandaneira', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0910-21002', 'stamet.bandaneira@bmkg.go.id', '47d0523f24aaf03b8c9640488ea78d5b57d5efc2', 1),
('8181519808737e5582730c3784e04ede8c9ce55b', '133', 'Kepala Stamet Namlea', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'c523b1d94a01b15f6f71209f761ddd011e708e0c', 1),
('571e63240c98dae4eb6455ec48eb2143530f06cc', '134', 'Kepala Stamet Mathilda Batlayeri', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0918-21009', 'stamet.saumlaki@bmkg.go.id', '5b4febdd1b79d3ff1af38591fefdf8453c7a3baa', 1),
('dff25bbbdf4d2b86f070997cb7fc966a3aa4336f', '135', 'Kepala Stamet Gamar Malamo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.galela@bmkg.go.id', '5595b21cfffb1aa1e1d606f279cdcf82df2d3f36', 1),
('a78fc84b71be246f893712de97cc6b46b56056db', '136', 'Kepala Stamet Emalamo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0929-2221474', 'stamet.sanana@bmkg.go.id', 'ed9e3eb864b99869d476f691ed7eff014fc80df0', 1),
('6c3b60f73f25afbd0bd0abdefdba659b8d233218', '137', 'Kepala Stamet Kasiguncu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0452-22835', 'stamet.poso@bmkg.go.id', 'e01b790d3bf9c22685622aa0794273b8ff448085', 1),
('fcff61ae262c4735ea2a4b61cb757451a331cd2a', '138', 'Kepala Stamet Syukuran Aminudin Amir', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stamet.luwuk@bmkg.go.id', '8c1e0d6b745d650a85a11c0231872ff02bbbc9e6', 1),
('ed998654b54ca19cba7ff188e42c65007b510202', '139', 'Kepala Stamet Sultan Bantilan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0453-23053', 'stamet.tolitoli@bmkg.go.id', 'ec96efea0a2cc19249ac1df62402786ab6808441', 1),
('be76dee95da26ccf1aa0d6f1f2cc718ac4c37f23', '140', 'Kepala Stamet Beto Ambari', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '5bdb085877a841eb97dc6f5ea71d815e14f7f73c', 1),
('8079d8d42925623814382c5ea3256274c2da0755', '141', 'Kepala Stamet Sangia Ni Bandera', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0405-2310807', 'stamet.pomalaa@bmkg.go.id', '411bb6e80b71aef3e7546dd26208f237d84c193a', 1),
('43c1548c7160ebfef10ca0a52e51e1b9aab11d26', '142', 'Kepala Stamet Andi Jemma', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0473-21392', 'stamet.masamba@bmkg.go.id', 'de4229e6528ea8b9525898667bc3317321611290', 1),
('bf61c63311b90704e14ccd0832001a9b4ede9cd2', '143', 'Kepala Stamet Naha', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0432-23568', 'winny@gmail.com', '0a0b6d0f55886c324653bec184777a2c0c552e24', 1),
('1d4d502aa3f5203dc893bea175450d20bcb40528', '144', 'Kepala stamet Pongtiku', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0432-22254', 'winny@gmail.com', 'a8aecdaa33a96abd85da00435ac4074ceed7c8a6', 1),
('792cacf6d235bc0e55233e611168b1e62266a4a0', '145', 'Kepala Staklim Maros', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0411-372366', 'staklim.maros@bmkg.go.id', '02d9e41fcb20121e5d0d998fc9f074a787437552', 1),
('85e8fb2d86c195cba1b1763bafe78942c6754a42', '146', 'Kepala Staklim Minahasa Utara', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '6bcc2cd67709856202066caae51dff2c0d1004c2', 1),
('0eecaae1a3b3638f0dd3bc3cf930cefb70838612', '147', 'Kepala staklim Seram Bagian Barat', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'staklim.kairatu@bmkg.go.id', '9ed7d7c6cd1a536fcf9f64261422d2347ac3dd39', 1),
('bedcbe5f7f3f8859f3af4a4b2be52103ef8437bc', '148', 'Kepala Stasiun Klimatologi Tilongkabila', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '3d801bebbe1769e7a02c7a99a73207a3bf003656', 1),
('5ea9146d0bb02561d74c0a4c0b3aeadae1f1d57a', '149', 'Kepala Stasiun Klimatologi Ranomeeto', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '4ff86577ed671d8e0a4760482b093d8ba1f49d3e', 1),
('588cb4b6db6cad27da918a87a7c5e68d538f4630', '150', 'Kepala Stasiun Geofisika Karang Panjang', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0911-354931', 'stageof.karangpanjang@bmkg.go.id', '10ff625c16ef0df0c49f56ec9afc548a12c2b218', 1),
('954c4f0f2a117266ec7c25193791f326832736b7', '151', 'Kepala Stasiun Geofisika Winangun', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0431-823342', 'stageof.winangun@bmkg.go.id', 'b159fc8a7e014d2206db2f867f4e2b6bc7868e1f', 1),
('ee2eb79a869f39b1cb358ff355a6cd96c523e6f8', '152', 'Kepala Stasiun Geofisika Palu', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0451-460197', 'stageof.palu@bmkg.go.id', '7b3bee71e072360663d473c245cecae73dc59a42', 1),
('a1d0ea85c2468d0a62baffc3145b54db1d5f89cf', '153', 'Kepala Stasiun Geofisika Gowa', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'eb7fc63b544abf81342f5373360f24e58906666d', 1),
('e2761a311ab5a99f3bc4282dcd3d6a73126468a2', '154', 'Kepala Stasiun Geofisika Gorontalo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stageof.gorontalo@bmkg.go.id', '5f3e488c258ece5b7bf456b39ae60344e10b12d8', 1),
('9a6c3a86bf18c99f9ea9ee67d3f3d5e476289e13', '155', 'Kepala Stasiun Geofisika Saumlaki', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0918-21124', 'stageof.saumlaki@bmkg.go.id', 'c3b0af6f267ada02f9f0d36f81e0459fe3f169e4', 1),
('38e2d5d67395deffc95636bda043d3fa4f1f3460', '156', 'Kepala Stasiun Geofisika Ternate', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0921-3123144', 'stageof.ternate@bmkg.go.id', '9f7298ab3c0d2404ef0cea253e0b68c0db303d5c', 1),
('ada196c5021a454f68a1dd6414da4e16d4bed6b1', '157', 'Kepala Stasiun Geofisika Kendari', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'stageof.kendari@bmkg.go.id', 'a024e101e5088b1011b3ffdad510da35664e0fd1', 1),
('c6eee459b3e3aa6e1331bfdeae4ea687f948d4be', '158', 'Kepala Stasiun Meteorologi Frans Kaisiepo', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0981-21742', 'stamet.biak@bmkg.go.id', 'd796b29e72bc1c4d9c02b4ad7773c4d079c0ee1a', 1),
('67b561bcb80ad7b8d2b45b2a906fdd9cf1b11058', '159', 'Kepala Stasiun Meteorologi Sentani', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0967-591027', 'stamet.sentani@bmkg.go.id', '0e32993bfc81a12f243413964ec41d93b069def3', 1),
('ad5ec92728b7aa7e9a02bb5a47c20ae9e37cd10b', '160', 'Kepala Stasiun Meteorologi Seigun', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'f405c0737dd04ea241acddf5af7b1d6a24ecc9fc', 1),
('0afbbd2923c1e6fb4249b09b859a37221b391519', '161', 'Kepala Stasiun Meteorologi Mopah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0971-321774', 'stamet.merauke@bmkg.go.id', 'a99aabfd9fc8ab263f68c51d4870ec9a4235612f', 1),
('de1efba83f9dc95744bc7f86a508f6a46233f7cb', '162', 'Kepala Stasiun Meteorologi Mozez Kilangin', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0901-321868', 'stamet.timika@bmkg.go.id', '37822daee7465a67dca7c71793cda4b5a30285a6', 1),
('58a367c876e7827032f315792d219dfd1f956c05', '163', 'Kepala Stasiun Meteorologi Tanah Merah', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0975-31155', 'winny@gmail.com', '1398bc7df55a78295696144199bfaf4fc9ac9e4d', 1),
('51a5d46df2562a631b8048e109b9d76c3a4c95c1', '164', 'Kepala Stasiun Meteorologi Wamena', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0969-31123', 'stamet.wamena@bmkg.go.id', '11dd242f0143dcafee2ac6260056794627de2242', 1),
('9610b1e943f526b53be42936c514ccb8da175b02', '165', 'Kepala Stasiun Meteorologi Moanamani', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '8279afec895e9f3848578b532f307aaf79a72ff0', 1),
('ec8e59b9525e190b8d277dc55b0f01e5c1debe2c', '166', 'Kepala Stasiun Meteorologi Sudjarwo Tjondro Negoro', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '3ff0eda1b91bece8d05d62be08dda19e00305ab2', 1),
('7172d4a89ae7bd37a2ce29f4888595f4254f4fb9', '167', 'Kepala Stasiun Meteorologi Mararena', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', 'f79250f28e2d15e87959b9a02bfe90ecffbc804e', 1),
('c487cf71adc777dd5ec5d0452680bb5177b1687c', '168', 'Kepala Stasiun Meteorologi Enarotali', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0984-24115', 'stamet.enarotali@bmkg.go.id', '837eecc74ca33253e8f50c2869f07b5d8b2f531a', 1),
('2893b22dfab3f56a03f4e1997d5d515b541ff615', '169', 'Kepala Stasiun Meteorologi Dok II Jayapura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0967-536189', 'stamet.jayapura@bmkg.go.id', '1c0a029275e4625a9581ad6eb311d9307d43a00b', 1),
('ea6e2eeecdc18a38099f420798d94940f61fb65d', '170', 'Kepala Stasiun Meteorologi Rendani', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0968-212435', 'stamet.manokwari@bmkg.go.id', '8ae133c58c6243cb26ac6ecf9f533a13c0ed0449', 1),
('2f5cd26aee8e490701af1482d7cb555e7e729477', '171', 'Kepala Stasiun Meteorologi Utarom', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0957-21410', 'stamet.kaimana@bmkg.go.id', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', 1),
('839db46681ec103dab6379c6a68ed0f3f6037190', '172', 'Kepala Stasiun Meteorologi Torea', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0951-98651', 'stamet.fakfak@bmkg.go.id', 'a1d1165f8aa51513abd88a73c388fceed0fe2af0', 1),
('609b864d275e72460e3b327c82def4271fb0427d', '173', 'Kepala Stasiun Klimatologi Jayapura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0967-91843', 'staklim.genyem@bmkg.go.id', 'f8880215d308eae9527cc17e9ad77a1841821cbb', 1),
('359b2a059e95dc873c761735bf4ee33fb96375f0', '174', 'Kepala Stasiun Klimatologi Manokwari Selatan', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '8bec99d5edf1564d0fcfcf4bcfce87071bca8f1d', 1),
('70a201c78b23370b096664d63c6d8c970ded2250', '175', 'Kepala Stasiun Klimatologi Tanah Miring', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'staklim.merauke@bmkg.go.id', 'c73846cc21628fd16d315eeabb79bcec2fc73306', 1),
('932f2ca58e8d828ccd6c979b6ec0c8ec213371b4', '176', 'Kepala Stasiun Geofisika Angkasapura', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0967-533533', 'stageof.angkasa@bmkg.go.id', '9d38d25ef6be06fba28cbcc56d23e0f51a88e416', 1),
('0a9580d8066b363a62eb92d2c866267e5f3218bc', '177', 'Kepala Stasiun Geofisika Sorong', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '0951-321785', 'stageof.sorong@bmkg.go.id', '9f02db688746674d2f9177d555b5adcb4c11f712', 1),
('39f1c12a968a2e683109a538648cab064733be79', '178', 'Kepala Stasiun Geofisika Nabire', '0679748e3ffeb00f810c3b4a20907bbbfe6797d0', '', '', 'winny@gmail.com', '7d5cb002e32c0d277f92e5837f5445bc9aebf9c2', 1),
('7a717e442d045203506fe04435251639c114b623', '179', 'Kepala BBMKG Wilayah I Medan', '33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', '', '', 'winny@gmail.com', '5c27ea3ba7e6e586f8ad933636d72b38a0352926', 1),
('91738656e3a8e18c273bbc3fa81ac5bb34d724ce', '180', 'Kepala BBMKG Wilayah II Tangerang Selatan', '33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', '', '', 'winny@gmail.com', 'be097c32eebc0fe4f185e109f60241e02236eb02', 1),
('088d7782ccac4fe794eca77d813f731dda745e79', '181', 'Kepala BBMKG Wilayah III Denpasar', '33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', '', '', 'winny@gmail.com', '5c8ba13288540c714750ff9e130aad4453866332', 1),
('fcacf3c3b00b2a730e6c09186812fbb51773a415', '182', 'Kepala BBMKG Wilayah IV Makassar', '33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', '', '', 'winny@gmail.com', 'b1c2ee683178b5a469d1afbc31d723e64f538d19', 1),
('eceaf4eb5f48d20b07bd573c53a4e74800c6adda', '183', 'Kepala BBMKG Wilayah V Jayapura', '33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', '', '', 'winny@gmail.com', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 1),
('fb0570db08b9c25a62cabe497ae632437c7c1c24', '196303151985031001', 'STMKG', '2fb98b3bd76ce53d08d153458515263972dfd638', '', '', 'stmkg@gmail.com', '30cf740372c79c1079a0cfa2d9d6fae05baec77a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

CREATE TABLE IF NOT EXISTS `auditor` (
  `auditor_id` varchar(50) NOT NULL,
  `auditor_nip` varchar(25) NOT NULL,
  `auditor_name` varchar(100) NOT NULL,
  `auditor_alamat` varchar(255) NOT NULL,
  `auditor_agama` varchar(20) NOT NULL,
  `auditor_jenis_kelamin` varchar(20) NOT NULL,
  `auditor_id_pangkat` varchar(50) NOT NULL,
  `auditor_tmt` date NOT NULL,
  `auditor_id_jabatan` varchar(50) NOT NULL,
  `auditor_golongan` varchar(2) NOT NULL,
  `auditor_tempat_lahir` varchar(20) NOT NULL,
  `auditor_tgl_lahir` date NOT NULL,
  `auditor_mobile` varchar(15) NOT NULL,
  `auditor_telp` varchar(15) NOT NULL,
  `auditor_email` varchar(50) NOT NULL,
  `auditor_foto` varchar(255) NOT NULL,
  `auditor_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`auditor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`auditor_id`, `auditor_nip`, `auditor_name`, `auditor_alamat`, `auditor_agama`, `auditor_jenis_kelamin`, `auditor_id_pangkat`, `auditor_tmt`, `auditor_id_jabatan`, `auditor_golongan`, `auditor_tempat_lahir`, `auditor_tgl_lahir`, `auditor_mobile`, `auditor_telp`, `auditor_email`, `auditor_foto`, `auditor_del_st`) VALUES
('4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '13115051', 'GUGUS WIDIANDITO', 'Tegal', 'Islam', 'Laki Laki', '8411f15577c104b0634a0235105e199d4cae53f3', '2018-04-06', 'b9610baa4575c677951c04e0050ac0e9a5676594', 'A', 'Tegal', '1996-11-18', '083837151148', '', 'gugusiwidiandito@gmail.com', '', 1),
('63e53c4375c33a9b4d39e3f1f86b3ea777a5f22b', '13115052', 'CHALIK', '', 'Islam', 'Laki Laki', '8411f15577c104b0634a0235105e199d4cae53f3', '0000-00-00', 'ca4d3c424bd05544c7a145bd2af6cef0a08e92e4', 'A', 'Salatiga', '0000-00-00', '', '', 'reneirlita_mail@yahoo.co.id', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditor_pelatihan`
--

CREATE TABLE IF NOT EXISTS `auditor_pelatihan` (
  `pelatihan_id` varchar(50) NOT NULL,
  `pelatihan_auditor_id` varchar(50) NOT NULL,
  `pelatihan_kompetensi_id` varchar(50) NOT NULL,
  `pelatihan_nama` varchar(100) NOT NULL,
  `pelatihan_durasi` varchar(5) NOT NULL,
  `pelatihan_tanggal_awal` int(11) NOT NULL,
  `pelatihan_tanggal_akhir` int(11) NOT NULL,
  `pelatihan_penyelenggara` varchar(100) NOT NULL,
  `pelatihan_sertifikat` varchar(100) NOT NULL,
  PRIMARY KEY (`pelatihan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auditor_pendidikan`
--

CREATE TABLE IF NOT EXISTS `auditor_pendidikan` (
  `pendidikan_id` varchar(50) NOT NULL,
  `pendidikan_auditor_id` varchar(50) NOT NULL,
  `pendidikan_tingkat` varchar(20) NOT NULL,
  `pendidikan_instuisi` varchar(100) NOT NULL,
  `pendidikan_kota` varchar(50) NOT NULL,
  `pendidikan_negara` varchar(50) NOT NULL,
  `pendidikan_tahun` int(11) NOT NULL,
  `pendidikan_jurusan` varchar(50) NOT NULL,
  `pendidikan_nilai` varchar(5) NOT NULL,
  PRIMARY KEY (`pendidikan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan`
--

CREATE TABLE IF NOT EXISTS `audit_plan` (
  `audit_plan_id` varchar(50) NOT NULL,
  `audit_plan_code` varchar(20) NOT NULL,
  `audit_plan_tipe_id` varchar(50) NOT NULL,
  `audit_plan_sub_tipe` varchar(50) NOT NULL,
  `audit_plan_tahun` int(4) NOT NULL,
  `audit_plan_start_date` int(11) NOT NULL,
  `audit_plan_end_date` int(11) NOT NULL,
  `audit_plan_kegiatan` text NOT NULL,
  `audit_plan_periode` varchar(100) NOT NULL,
  `audit_plan_hari` int(3) NOT NULL,
  `audit_plan_biaya` int(15) NOT NULL,
  `audit_plan_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=propose, 2=approve, 3=tolakpengajuan',
  `audit_plan_userID_propose` varchar(50) NOT NULL,
  `audit_plan_userID_approve` varchar(50) NOT NULL,
  `audit_plan_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_plan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_plan`
--

INSERT INTO `audit_plan` (`audit_plan_id`, `audit_plan_code`, `audit_plan_tipe_id`, `audit_plan_sub_tipe`, `audit_plan_tahun`, `audit_plan_start_date`, `audit_plan_end_date`, `audit_plan_kegiatan`, `audit_plan_periode`, `audit_plan_hari`, `audit_plan_biaya`, `audit_plan_status`, `audit_plan_userID_propose`, `audit_plan_userID_approve`, `audit_plan_created_date`) VALUES
('2585787e3dffa62ad0423cfc3e7f920530a6109e', '2019_642379', '0525307297f9bed8984a8054918087dcf03c4bcf', 'Trip 1', 2019, 1522965600, 1523743200, 'Audit Kinerja', '10', 10, 100000000, 2, '9b44ac8966798da6f357fc1689342e187013cd51', '9b44ac8966798da6f357fc1689342e187013cd51', '2018-04-05 21:39:30'),
('c4ab3607250cef7a474f84036eb960f7036cf7f5', '2018_498952', '0525307297f9bed8984a8054918087dcf03c4bcf', 'Trip 1', 2018, 1523397600, 1523397600, 'Audit', '10', 1, 0, 0, '', '', '2018-04-11 00:08:27'),
('1b25c3d46e7a4faef3cec013a876ccb2209a743b', '2018_258274', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'Trip 1', 2018, 1523829600, 1524607200, 'Audit Operasional', '10', 10, 100000000, 2, '9b44ac8966798da6f357fc1689342e187013cd51', '9b44ac8966798da6f357fc1689342e187013cd51', '2018-04-16 13:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_auditee`
--

CREATE TABLE IF NOT EXISTS `audit_plan_auditee` (
  `audit_plan_auditee_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_plan_auditee_id_plan` varchar(50) NOT NULL,
  `audit_plan_auditee_id_auditee` varchar(50) NOT NULL,
  `audit_plan_auditee_hari` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`audit_plan_auditee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `audit_plan_auditee`
--

INSERT INTO `audit_plan_auditee` (`audit_plan_auditee_id`, `audit_plan_auditee_id_plan`, `audit_plan_auditee_id_auditee`, `audit_plan_auditee_hari`) VALUES
(1, '430bc2de3d80c79a06f0aa41c148115ad3d2cd60', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 10),
(2, '5f452adbfd38f82344e280e7d7472d8b4ccd0604', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 10),
(3, '2585787e3dffa62ad0423cfc3e7f920530a6109e', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 10),
(4, 'c4ab3607250cef7a474f84036eb960f7036cf7f5', '5c730b7e75cf5af124b8cdae7adfbda7af9d8d7e', 10),
(5, '1b25c3d46e7a4faef3cec013a876ccb2209a743b', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 10);

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_auditor`
--

CREATE TABLE IF NOT EXISTS `audit_plan_auditor` (
  `plan_auditor_id` varchar(50) NOT NULL,
  `plan_auditor_id_plan` varchar(50) NOT NULL,
  `plan_auditor_id_auditee` varchar(50) NOT NULL,
  `plan_auditor_id_auditor` varchar(50) NOT NULL,
  `plan_auditor_cost` varchar(15) NOT NULL,
  `plan_auditor_workday` int(3) NOT NULL DEFAULT '0',
  `plan_auditor_day` int(3) NOT NULL DEFAULT '0',
  `plan_auditor_id_posisi` varchar(50) NOT NULL,
  `plan_auditor_start_date` int(11) NOT NULL,
  `plan_auditor_end_date` int(11) NOT NULL,
  PRIMARY KEY (`plan_auditor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_plan_auditor`
--

INSERT INTO `audit_plan_auditor` (`plan_auditor_id`, `plan_auditor_id_plan`, `plan_auditor_id_auditee`, `plan_auditor_id_auditor`, `plan_auditor_cost`, `plan_auditor_workday`, `plan_auditor_day`, `plan_auditor_id_posisi`, `plan_auditor_start_date`, `plan_auditor_end_date`) VALUES
('149b8cbea285cb79f7659a709482211845ffe815', '430bc2de3d80c79a06f0aa41c148115ad3d2cd60', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '76540000', 10, 10, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 1522965600, 1523743200),
('f7caf40b9994f460635895c8e71bd66338c780d5', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '-8420000', 10, 10, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 1522965600, 1523743200),
('82a3bb99c4b564500fa83dd703669b041723c7f1', '1b25c3d46e7a4faef3cec013a876ccb2209a743b', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '-8420000', 10, 10, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 1523829600, 1524607200);

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_auditor_detil`
--

CREATE TABLE IF NOT EXISTS `audit_plan_auditor_detil` (
  `anggota_plan_detil_id` varchar(50) NOT NULL,
  `anggota_plan_detil_nama_sbu` varchar(100) NOT NULL,
  `anggota_plan_detil_jml_hari` varchar(5) NOT NULL,
  `anggota_plan_detil_nilai` int(16) NOT NULL,
  `anggota_plan_detil_total` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_plan_auditor_detil`
--

INSERT INTO `audit_plan_auditor_detil` (`anggota_plan_detil_id`, `anggota_plan_detil_nama_sbu`, `anggota_plan_detil_jml_hari`, `anggota_plan_detil_nilai`, `anggota_plan_detil_total`) VALUES
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Representasi', '9', 250000, 2250000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Taxi', '0', 170000, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Transport Bandara', '0', 0, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Hotel', '8', 8720000, 69760000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Harian', '9', 160000, 1440000),
('149b8cbea285cb79f7659a709482211845ffe815', 'us_was', '9', 100000, 900000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Harian', '9', 210000, 1890000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Uang Harian', '9', 0, 0),
('149b8cbea285cb79f7659a709482211845ffe815', 'Pesawat Ekonomi', '1', 150000, 150000),
('149b8cbea285cb79f7659a709482211845ffe815', 'Pesawat Bisnis', '1', 150000, 150000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Representasi', '0', 250000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Taxi', '0', 170000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Transport Bandara', '0', 0, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Hotel', '-1', 8720000, -8720000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Harian', '0', 160000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'us_was', '0', 100000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Harian', '0', 210000, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Uang Harian', '0', 0, 0),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Pesawat Ekonomi', '1', 150000, 150000),
('f7caf40b9994f460635895c8e71bd66338c780d5', 'Pesawat Bisnis', '1', 150000, 150000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Representasi', '0', 250000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Taxi', '0', 170000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Transport Bandara', '0', 0, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Hotel', '-1', 8720000, -8720000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Harian', '0', 160000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'us_was', '0', 100000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Harian', '0', 210000, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Uang Harian', '0', 0, 0),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Pesawat Ekonomi', '1', 150000, 150000),
('82a3bb99c4b564500fa83dd703669b041723c7f1', 'Pesawat Bisnis', '1', 150000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan_comment`
--

CREATE TABLE IF NOT EXISTS `audit_plan_comment` (
  `plan_comment_id` varchar(50) NOT NULL,
  `plan_comment_plan_id` varchar(50) NOT NULL,
  `plan_comment_user_id` varchar(50) NOT NULL,
  `plan_comment_desc` varchar(255) NOT NULL,
  `plan_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`plan_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_plan_comment`
--

INSERT INTO `audit_plan_comment` (`plan_comment_id`, `plan_comment_plan_id`, `plan_comment_user_id`, `plan_comment_desc`, `plan_comment_date`) VALUES
('c3997a3c2e2aa9bf813fc067bba7a34106de2b15', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '9b44ac8966798da6f357fc1689342e187013cd51', 'acc pak', 1522989952),
('77e529b5baa3289eef142ba703e742af12f95691', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '9b44ac8966798da6f357fc1689342e187013cd51', 'acc pak', 1522989970),
('4db9a92fee71012ce7ea98fb06aa15767565d0b0', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '9b44ac8966798da6f357fc1689342e187013cd51', 'acc', 1522990095),
('b7415bd3757a2c31495055bd93a54efebb79d3f4', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '9b44ac8966798da6f357fc1689342e187013cd51', 'acc', 1522990248),
('73d812c157d47153221a26cb87f54f746919b473', '2585787e3dffa62ad0423cfc3e7f920530a6109e', '9b44ac8966798da6f357fc1689342e187013cd51', 'ok', 1522990273),
('1d23703ddbc88d653007a4c798bfddfe963b883b', '1b25c3d46e7a4faef3cec013a876ccb2209a743b', '9b44ac8966798da6f357fc1689342e187013cd51', 'acc', 1523886059),
('3f690858ec316e36cb6142d1c89052f94396618c', '1b25c3d46e7a4faef3cec013a876ccb2209a743b', '9b44ac8966798da6f357fc1689342e187013cd51', 'ok', 1523886072);

-- --------------------------------------------------------

--
-- Table structure for table `backup_restore`
--

CREATE TABLE IF NOT EXISTS `backup_restore` (
  `backup_restore_id` varchar(50) NOT NULL,
  `backup_restore_id_user` varchar(50) NOT NULL,
  `backup_date` int(11) NOT NULL,
  `restore_date` int(11) DEFAULT NULL,
  `backup_restore_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=restore',
  PRIMARY KEY (`backup_restore_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_restore`
--

INSERT INTO `backup_restore` (`backup_restore_id`, `backup_restore_id_user`, `backup_date`, `restore_date`, `backup_restore_st`) VALUES
('6b80c27945717398e2bb26f645b7f76c25baac66', '23d87af87ec2fc29f5a4de3fed576e2ec9c4ffb7', 1498017063, NULL, 0),
('9bb4adfd7b62e9dcdc18007160411aa35328d3be', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255483, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coba_pelanggan`
--

CREATE TABLE IF NOT EXISTS `coba_pelanggan` (
  `kode_pelanggan` char(6) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` int(14) DEFAULT NULL,
  `jabatan` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finding_internal`
--

CREATE TABLE IF NOT EXISTS `finding_internal` (
  `finding_id` varchar(50) NOT NULL,
  `finding_assign_id` varchar(50) NOT NULL,
  `finding_auditee_id` varchar(50) NOT NULL,
  `finding_kka_id` varchar(50) NOT NULL,
  `finding_no` varchar(20) NOT NULL,
  `finding_type_id` varchar(50) NOT NULL,
  `finding_sub_id` varchar(50) NOT NULL,
  `finding_jenis_id` varchar(50) NOT NULL,
  `finding_penyebab_id` varchar(50) NOT NULL,
  `finding_judul` varchar(500) NOT NULL,
  `finding_date` int(11) NOT NULL,
  `finding_kondisi` longblob NOT NULL,
  `finding_kriteria` longblob NOT NULL,
  `finding_sebab` longblob NOT NULL,
  `finding_akibat` longblob NOT NULL,
  `finding_nilai` varchar(50) NOT NULL,
  `finding_tanggapan_auditee` longblob NOT NULL,
  `finding_tanggapan_auditor` longblob NOT NULL,
  `finding_attachment` varchar(255) NOT NULL,
  `finding_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=ajukan, 2=approve_katim, 3=approvedanis, 4=approvedaltum, 5=tolakkatim, 6=tolakdalnis, 7=tolakdaltum, 8=finis',
  PRIMARY KEY (`finding_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finding_internal`
--

INSERT INTO `finding_internal` (`finding_id`, `finding_assign_id`, `finding_auditee_id`, `finding_kka_id`, `finding_no`, `finding_type_id`, `finding_sub_id`, `finding_jenis_id`, `finding_penyebab_id`, `finding_judul`, `finding_date`, `finding_kondisi`, `finding_kriteria`, `finding_sebab`, `finding_akibat`, `finding_nilai`, `finding_tanggapan_auditee`, `finding_tanggapan_auditor`, `finding_attachment`, `finding_status`) VALUES
('9a052885886e493d678d957da3578bd9fc03a3d1', '015d816f70352e3b473482c3c6dd08afdde8fe97', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 'e34210a75565febd1cf36a192b83cea3b4830476', '01', '764275e74b69abcec96c2ac76140f7da774249f7', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '31b8aebd0211b5870fe51e6df8b5694719d3a9a4', 'a3e829db763976063f2f84d10b6a95686359d2cc', '10', 1522965600, 0x3c703e4578616d706c65204b6f6e646973693c2f703e, 0x3c703e4578616d706c65204b726974657269613c2f703e, 0x3c703e4578616d706c652053656261623c2f703e, 0x3c703e4578616d706c6520416b696261743c2f703e, '10', 0x3c703e4578616d706c652054616e67676170616e20417564697465653c2f703e, 0x3c703e4578616d706c652054616e67676170616e2041756469746f723c2f703e, '', 8),
('d0aea2a26a01d5b43c0095a8ade439ed2df211d7', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', '9cd383617904597f3976ecc6c1fabde3a54324b2', 'd90170', '764275e74b69abcec96c2ac76140f7da774249f7', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '31b8aebd0211b5870fe51e6df8b5694719d3a9a4', 'a3e829db763976063f2f84d10b6a95686359d2cc', 'korupsi', 1523829600, 0x3c703e7361647364733c2f703e, 0x3c703e61736461736473613c2f703e, '', '', '10', '', '', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `finding_internal_comment`
--

CREATE TABLE IF NOT EXISTS `finding_internal_comment` (
  `find_comment_id` varchar(50) NOT NULL,
  `find_comment_find_id` varchar(50) NOT NULL,
  `find_comment_desc` varchar(255) NOT NULL,
  `find_comment_user_id` varchar(50) NOT NULL,
  `find_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`find_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finding_internal_comment`
--

INSERT INTO `finding_internal_comment` (`find_comment_id`, `find_comment_find_id`, `find_comment_desc`, `find_comment_user_id`, `find_comment_date`) VALUES
('d8cfb1a5974eb4a7be99c64d6b9878dc795ed541', '9a052885886e493d678d957da3578bd9fc03a3d1', 'cek pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995865),
('6221dd57d2b6facff6aacc8cf451d439214de422', '9a052885886e493d678d957da3578bd9fc03a3d1', 'cek pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995885),
('92a907c3781cadfd412e58687eb47685c9612f4e', '9a052885886e493d678d957da3578bd9fc03a3d1', 'cek pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995941),
('c833b7ccc5a17d65895be20a4e900d11d84decb5', '9a052885886e493d678d957da3578bd9fc03a3d1', 'masih ada yang salah', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995959),
('47d3df285d0929a884cadae46654e7949c3dac6a', '9a052885886e493d678d957da3578bd9fc03a3d1', 'cek lagi pak katim', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996093),
('363a514b7c6c3d39756186ca88c72658c30815f9', '9a052885886e493d678d957da3578bd9fc03a3d1', 'sudah pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996105),
('9a8285e08d9eac5cdbe0ea2101a75b10000ed325', '9a052885886e493d678d957da3578bd9fc03a3d1', 'acc pak daltu', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996124),
('beb5dce25cffdbd0cc118d1e77cce5819583be6d', '9a052885886e493d678d957da3578bd9fc03a3d1', 'bntar pak dalnis', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996140),
('41bdfadeac579ce81d8517d27c652fc238f6a573', '9a052885886e493d678d957da3578bd9fc03a3d1', 'udah pak ssaya capek', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996158),
('832eff3ded6ada58f1cd7358b53df7a708233c46', '9a052885886e493d678d957da3578bd9fc03a3d1', 'okeee', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996175);

-- --------------------------------------------------------

--
-- Table structure for table `kertas_kerja`
--

CREATE TABLE IF NOT EXISTS `kertas_kerja` (
  `kertas_kerja_id` varchar(50) NOT NULL,
  `kertas_kerja_id_program` varchar(50) NOT NULL,
  `kertas_kerja_no` varchar(20) NOT NULL,
  `kertas_kerja_desc` longblob NOT NULL,
  `kertas_kerja_hasil` longblob NOT NULL,
  `kertas_kerja_kesimpulan` longblob NOT NULL,
  `kertas_kerja_attach` varchar(100) NOT NULL,
  `kertas_kerja_date` int(11) NOT NULL,
  `kertas_kerja_created_by` varchar(50) DEFAULT NULL,
  `kerja_kerja_created_date` int(11) DEFAULT NULL,
  `kertas_kerja_approve_by` varchar(50) DEFAULT NULL,
  `kertas_kerja_approve_date` int(11) DEFAULT NULL,
  `kertas_kerja_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=ajukan, 2=approve_katim, 3=tolakkatim',
  PRIMARY KEY (`kertas_kerja_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kertas_kerja`
--

INSERT INTO `kertas_kerja` (`kertas_kerja_id`, `kertas_kerja_id_program`, `kertas_kerja_no`, `kertas_kerja_desc`, `kertas_kerja_hasil`, `kertas_kerja_kesimpulan`, `kertas_kerja_attach`, `kertas_kerja_date`, `kertas_kerja_created_by`, `kerja_kerja_created_date`, `kertas_kerja_approve_by`, `kertas_kerja_approve_date`, `kertas_kerja_status`) VALUES
('e34210a75565febd1cf36a192b83cea3b4830476', '2896d52840daeafcdab68563d53cae33448f68f7', '01', 0x3c703e4578616d706c653c2f703e, '', 0x3c703e4578616d706c653c2f703e, 'Pindah ke table kka_attach', 1522965600, NULL, NULL, NULL, NULL, 2),
('9cd383617904597f3976ecc6c1fabde3a54324b2', '97f47f6ff12805fe45a8a7a63080508f15dae419', '9876968', 0x3c703e6578616d706c653c2f703e, '', 0x3c703e6578616d706c653c2f703e, 'Pindah ke table kka_attach', 1523829600, NULL, NULL, NULL, NULL, 2),
('9288352d6c864045f0263ccf17fc8fcfd44f3fcc', '97f47f6ff12805fe45a8a7a63080508f15dae419', 'KKA/010/OPS/9208/PKA', 0x3c703e617364616461733c2f703e, '', 0x3c703e73616461736473613c2f703e, 'Pindah ke table kka_attach', 1527458400, NULL, NULL, NULL, NULL, 2),
('13003d363ff8109b1e08d9efe431e7dbdd6e4a85', '97f47f6ff12805fe45a8a7a63080508f15dae419', 'KKA/010/OPS/9208/PKA', '', '', '', 'Pindah ke table kka_attach', 1524952800, NULL, NULL, NULL, NULL, 2),
('9734762dcd953a9d23e3d5c8c327131efd672023', '97f47f6ff12805fe45a8a7a63080508f15dae419', 'KKA/010/OPS/9208/PKA', '', '', '', 'Pindah ke table kka_attach', 1527544800, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kertas_kerja_attachment`
--

CREATE TABLE IF NOT EXISTS `kertas_kerja_attachment` (
  `kka_attach_id` varchar(50) NOT NULL,
  `kka_attach_kka_id` varchar(50) NOT NULL,
  `kka_attach_filename` varchar(255) NOT NULL,
  PRIMARY KEY (`kka_attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kertas_kerja_attachment`
--

INSERT INTO `kertas_kerja_attachment` (`kka_attach_id`, `kka_attach_kka_id`, `kka_attach_filename`) VALUES
('a9b2aa9fa1914f9bc013d134e7aaaab34a48f303', 'e34210a75565febd1cf36a192b83cea3b4830476', 'e-tila-logo.png'),
('bce2da29d270e8c217767163d0c645086378955b', '13003d363ff8109b1e08d9efe431e7dbdd6e4a85', 'dashboard_assign_plan_filter.php'),
('20f5f1ae95e83edbc76db1ce77df167e2c5bf7ae', '13003d363ff8109b1e08d9efe431e7dbdd6e4a85', 'hasil_audit.php'),
('b3956f27581db5edfaa75d9ce5ff5b378d098398', '9734762dcd953a9d23e3d5c8c327131efd672023', 'dashboard_audit.php'),
('f8a0d96bd20bddd7b239d5c79ccf59af34d799e5', '9734762dcd953a9d23e3d5c8c327131efd672023', 'dashboard_audit.php'),
('b93b01e30254d424fa2bd1125d8d8298cea45e64', '9734762dcd953a9d23e3d5c8c327131efd672023', 'dashboard_assign_plan_filter.php'),
('d1569618f05d623b1e3abaaf2e7c819042b7b648', '9734762dcd953a9d23e3d5c8c327131efd672023', 'tindaklanjut_view.php');

-- --------------------------------------------------------

--
-- Table structure for table `kertas_kerja_comment`
--

CREATE TABLE IF NOT EXISTS `kertas_kerja_comment` (
  `kertas_kerja_comment_id` varchar(50) NOT NULL,
  `kertas_kerja_comment_kka_id` varchar(50) NOT NULL,
  `kertas_kerja_comment_desc` varchar(255) NOT NULL,
  `kertas_kerja_comment_user_id` varchar(50) NOT NULL,
  `kertas_kerja_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`kertas_kerja_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kertas_kerja_comment`
--

INSERT INTO `kertas_kerja_comment` (`kertas_kerja_comment_id`, `kertas_kerja_comment_kka_id`, `kertas_kerja_comment_desc`, `kertas_kerja_comment_user_id`, `kertas_kerja_comment_date`) VALUES
('91f43e83964ba38ca70fd6f140551f7b25c72d8a', 'e34210a75565febd1cf36a192b83cea3b4830476', 'text', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995526),
('737ddc0f88ded3aaca22d26d8f9c29d733e79f91', 'e34210a75565febd1cf36a192b83cea3b4830476', 'cek lagi pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995563),
('0d90ffcba303c5bca64dce93007dd5cabd27d856', 'e34210a75565febd1cf36a192b83cea3b4830476', 'oke fix', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995604),
('29d25538d063bd787a570a8718749d43abc04dae', 'e34210a75565febd1cf36a192b83cea3b4830476', 'oke', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995620),
('9d61955f377597176e4e97c4875ba3c4e465aac2', '9288352d6c864045f0263ccf17fc8fcfd44f3fcc', 'sadasdsadas', '9b44ac8966798da6f357fc1689342e187013cd51', 1527487373),
('d7ec2de2991d90319202350a1fc89dfd7d39bf41', '9288352d6c864045f0263ccf17fc8fcfd44f3fcc', 'asdsadkasdgasdasdasdsadlaskdhkasna', '9b44ac8966798da6f357fc1689342e187013cd51', 1527494360),
('2c5009fdf3b8c251d92c2c9f470e028886ef1040', '13003d363ff8109b1e08d9efe431e7dbdd6e4a85', 'acc pak', '9b44ac8966798da6f357fc1689342e187013cd51', 1527562876),
('c591b51b500c9ae6d185a0de2d57e635badf5274', '13003d363ff8109b1e08d9efe431e7dbdd6e4a85', 'oke', '9b44ac8966798da6f357fc1689342e187013cd51', 1527562886);

-- --------------------------------------------------------

--
-- Table structure for table `login_expired`
--

CREATE TABLE IF NOT EXISTS `login_expired` (
  `login_exp_id` varchar(50) NOT NULL,
  `login_exp_id_user` varchar(50) NOT NULL,
  `login_exp_last_acces` int(11) NOT NULL DEFAULT '0',
  `login_exp_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`login_exp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_expired`
--

INSERT INTO `login_expired` (`login_exp_id`, `login_exp_id_user`, `login_exp_last_acces`, `login_exp_ip`) VALUES
('53854948cdce6481bb0e0e70926e6bb145d588fc', '9b44ac8966798da6f357fc1689342e187013cd51', 1534766515, 'GUGUS-PC'),
('d5c4135f66a3f7ec54143c4d241758d5e41169e9', '9b44ac8966798da6f357fc1689342e187013cd51', 1534757534, 'GUGUS-PC');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
  `log_activity_id` varchar(50) NOT NULL,
  `log_activity_id_user` varchar(50) NOT NULL,
  `log_activity_date` int(11) NOT NULL DEFAULT '0',
  `log_activity_action` text NOT NULL,
  `log_activity_ip` varchar(10) NOT NULL,
  `log_status` varchar(50) NOT NULL,
  PRIMARY KEY (`log_activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`log_activity_id`, `log_activity_id_user`, `log_activity_date`, `log_activity_action`, `log_activity_ip`, `log_status`) VALUES
('e72b15c2f27037f5758b3c7a1d5c1025dccafd2a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522939547, 'User Login', '::1', 'Sukses'),
('8a47cde518f68bbf193fcbbfa7f5c9537a02606e', '9b44ac8966798da6f357fc1689342e187013cd51', 1522939713, 'User Login', '::1', 'Sukses'),
('193962028ac0e60e824b15e58e59ad02e4da55b3', '9b44ac8966798da6f357fc1689342e187013cd51', 1522939848, 'Menghapus Username Dengan id 3c7d52115accc93808ea7c0de0efe86d3e445d84', '::1', 'Sukses'),
('69a16d5f091a45eec522ce9a3a47d48d51f65fc8', '9b44ac8966798da6f357fc1689342e187013cd51', 1522958897, 'User Login', '::1', 'Sukses'),
('13f775f2b4fcb060cc5869f0225d525a02381edc', '9b44ac8966798da6f357fc1689342e187013cd51', 1522961942, 'Menambah Plan ID 430bc2de3d80c79a06f0aa41c148115ad3d2cd60', '::1', 'Sukses'),
('fde25231bfb8328add3bb26bdecad3cdaadef50c', '9b44ac8966798da6f357fc1689342e187013cd51', 1522962366, 'Menambah 13115051 - GUGUS WIDIANDITO.Sebagai Auditor', '::1', 'Sukses'),
('db66b8198c640371963169b74b6c29d744b384dd', '9b44ac8966798da6f357fc1689342e187013cd51', 1522962765, 'Menambah anggota dengan id 149b8cbea285cb79f7659a709482211845ffe815 pada planning id 430bc2de3d80c79a06f0aa41c148115ad3d2cd60', '::1', 'Sukses'),
('cbcae402ba68574f0d096a843336b5ba9ca292f3', '9b44ac8966798da6f357fc1689342e187013cd51', 1522962786, 'Mengubah Data User ID 9b44ac8966798da6f357fc1689342e187013cd51', '::1', 'Sukses'),
('c5e0a43ca519c87343e12bb2690d6ad44fc21236', '9b44ac8966798da6f357fc1689342e187013cd51', 1522962796, 'User Logout', '::1', 'Sukses'),
('3403986e251207ac02bba34bc361c9f97dde20d4', '3c7d52115accc93808ea7c0de0efe86d3e445d84', 1522962965, 'User Login', '::1', 'Sukses'),
('c4debdc85380d1c45b5d220fc70546b0aa7c5bc5', '3c7d52115accc93808ea7c0de0efe86d3e445d84', 1522962979, 'Mengubah Data User ID 9b44ac8966798da6f357fc1689342e187013cd51', '::1', 'Sukses'),
('f121aca8fe00a440a3c369adb831814002805f06', '3c7d52115accc93808ea7c0de0efe86d3e445d84', 1522963045, 'User Logout', '::1', 'Sukses'),
('93ebc42a99c45a3b2185f379de546b70891e90b9', '9b44ac8966798da6f357fc1689342e187013cd51', 1522963049, 'User Login', '::1', 'Sukses'),
('34a4a328746fc416527501e6d4dd2da243689c3f', '9b44ac8966798da6f357fc1689342e187013cd51', 1522963839, 'Menghapus Penugasan Audit dengan ID 42c0d385b473092b588cee3c859f3f4592f4eafc', '::1', 'Sukses'),
('95c299b7feb87e90f233e115272d49939526a9bd', '9b44ac8966798da6f357fc1689342e187013cd51', 1522963931, 'Menambah Plan ID 5f452adbfd38f82344e280e7d7472d8b4ccd0604', '::1', 'Sukses'),
('905445c93434aff0562e17158c7ea2622025997f', '9b44ac8966798da6f357fc1689342e187013cd51', 1522964315, 'Menghapus Perencanaan Audit dengan ID 5f452adbfd38f82344e280e7d7472d8b4ccd0604', '::1', 'Sukses'),
('5a6fb4df575d7325eef9f9b62c3e08a36006ea37', '9b44ac8966798da6f357fc1689342e187013cd51', 1522964370, 'Menambah Plan ID 2585787e3dffa62ad0423cfc3e7f920530a6109e', '::1', 'Sukses'),
('91655ea2d5f1f920bf8393ed7544520a331e3c3a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522964488, 'Mengubah Perencanaan Audit dengan ID 2585787e3dffa62ad0423cfc3e7f920530a6109e', '::1', 'Sukses'),
('5730d7749b0f8c71822224615f58aeb78d3867d7', '9b44ac8966798da6f357fc1689342e187013cd51', 1522964583, 'Mengubah Perencanaan Audit dengan ID 2585787e3dffa62ad0423cfc3e7f920530a6109e', '::1', 'Sukses'),
('7dc7f4e3f0f46767dc8196516504f0c90cd66454', '9b44ac8966798da6f357fc1689342e187013cd51', 1522989813, 'Menambah anggota dengan id f7caf40b9994f460635895c8e71bd66338c780d5 pada planning id 2585787e3dffa62ad0423cfc3e7f920530a6109e', '::1', 'Sukses'),
('d15ec15480188d1fdee1f64d8cce1023feeda0ef', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990569, 'Mengubah Status Penugasan Audit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97 menjadi 1', '::1', 'Sukses'),
('f7337bb7d9117fc88619e286949ab1028d8486f0', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990579, 'Mengubah Status Penugasan Audit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97 menjadi 2', '::1', 'Sukses'),
('adc4740eb843c124d362788b58fccd3d873d3010', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990875, 'Mengubah Penugasan Audit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('c69f3456d4c9eaa5848265d4cf2ed8af62d81b91', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990900, 'Mengubah Status Penugasan Audit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97 menjadi 1', '::1', 'Sukses'),
('081b0687f784bcd138c3e146440ec7f894912b48', '9b44ac8966798da6f357fc1689342e187013cd51', 1522990900, 'Mengomentari Penugasan dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('d914025e0f662699620956f28fa0870a5b1506fc', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991029, 'Mengubah Status Penugasan Audit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97 menjadi 2', '::1', 'Sukses'),
('68c8ff601cd3c7ae661a49faedefe63e45d2baf3', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991029, 'Mengomentari Penugasan dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('dc40cf1e9ff8f51b5db17a1cfa2efe6005a21120', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991511, 'Mengubah Anggota id f7caf40b9994f460635895c8e71bd66338c780d5', '::1', 'Sukses'),
('77eb163413b0e1c5ba26a907ebd913a12666a3cc', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991533, 'Mengubah Status Surat Tugas dengan ID 979779828918eda697013fd747ab857a20164459 menjadi 1', '::1', 'Sukses'),
('2e425bec26d435d593e21aab2486e6743444b90b', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991533, 'Mengomentari Surat Tugas dengan ID 979779828918eda697013fd747ab857a20164459', '::1', 'Sukses'),
('dcea5bca22d7bd3cf364c0699f3e298753743fe2', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991543, 'Mengubah Status Surat Tugas dengan ID 979779828918eda697013fd747ab857a20164459 menjadi 2', '::1', 'Sukses'),
('5c8d08a4825c6d5f5384cb13ec122cc18b38a75a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522991543, 'Mengomentari Surat Tugas dengan ID 979779828918eda697013fd747ab857a20164459', '::1', 'Sukses'),
('b20f9e12210d2437d0c6b88e1757aaf12d4988d8', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993131, 'Menambah Program Audit ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('284556662606cefbc3395371c6a32d013d18ce15', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993260, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('efda2eb3e48df913ce681effd6c829c4343cf9e6', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993346, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('c463227912b644ff4a60659625d7dade7f08a879', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993744, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('c510d533675d0a85e1aafd8513842c076ba61cd2', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993789, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('782e843a03656200f8ad6fcea3ce3208e1223ef1', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993805, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('05f782c54f7a4598ac0888794bf84a494e1a2360', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993841, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('06460873c432d260e537973e979569b73c665f74', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994374, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('e9a445b4a5d761ca4ba872b22fc58ccaf5b0b8ee', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994439, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('687df9cdb51603e866c31ffeb2cbcb196d080f0d', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994463, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('31e53abf5cf839bcd5a9bb9a9ab98f02e25b6634', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994526, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('3a7cc3227927f0305c45290184cb1dec3f64aa02', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994547, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('d964e1e80961003e76acae50ad725f68c3508eda', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994582, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('e49cfeee642307b2d09feae5bcaa369761e0464c', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994617, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('f7cbbb39cfcd588910863806de2c6ca30b19b2bc', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994631, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('3b081050e940b15214bb933da603978d0c2327bd', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994706, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('602effb31a5900763592a1fa45064f5caa6de636', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994713, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('29e6d3b3e914a98455d3ed50c64766b7da27540a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994728, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('72f7d8362039b3259246a494bb7cdf3e51c44355', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994736, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('4f1afa6bba1e18a4f3db60ecb6e8cee0bb4acd8a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994803, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('8e0b191c2df6365fff8b38e3adf9dd7b1b795e7c', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994824, 'Mengubah Status Program Audit dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('6fb3bd23eb9ea3f9a47d44a74d9e60853e1c5bae', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995147, 'Menambah Kertas Kerja Dengan ID 2896d52840daeafcdab68563d53cae33448f68f7', '::1', 'Sukses'),
('841a6bbd72357b7968ad7c9e3ffc5c873222e064', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995526, 'Mengomentari Kertas Kerja dengan ID e34210a75565febd1cf36a192b83cea3b4830476', '::1', 'Sukses'),
('c7c19ca0ecd2e343fd484bfeb3a66866e8d2fba3', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995563, 'Mengomentari Kertas Kerja dengan ID e34210a75565febd1cf36a192b83cea3b4830476', '::1', 'Sukses'),
('5e322408f9d4b09dfdb675791fde4da8c4d73cad', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995604, 'Mengomentari Kertas Kerja dengan ID e34210a75565febd1cf36a192b83cea3b4830476', '::1', 'Sukses'),
('a81a7abbe592d99c678a1cc73cc409d17729e0a8', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995620, 'Mengomentari Kertas Kerja dengan ID e34210a75565febd1cf36a192b83cea3b4830476', '::1', 'Sukses'),
('d611f62dc0d8d28b4bb3e3b467ba8f5a4745b9d1', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995723, 'Menambah Temuan No 01', '::1', 'Sukses'),
('41aff78115cd871b9afc36e8a3742b89bcdccd5d', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995865, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('81084b375651e64a55b3e49afac164ee7c116ee6', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995885, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('0cbf46d2559b11b733905391f8f67caa7dc743fa', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995941, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('d10f8c72361afd6cd74c70dafc6bac476d1e620a', '9b44ac8966798da6f357fc1689342e187013cd51', 1522995959, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('937e5bb20a62271bc827d7f1649a160f4d0b4cf8', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996001, 'Menambah Rekomendasi dengan ID 33ce0c15300ad786a7cdf03daddd1d60ba4c2e15', '::1', 'Sukses'),
('79c2be9f84d7ef0650aff0fb8341154c89cffbdc', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996019, 'Mengubah Rekomendasi ID d86c0a8a04a91f178e1c346cbb5bfc510397b515', '::1', 'Sukses'),
('06a128e77b5af546077720f65c0457625e3a4c41', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996093, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('636e149fd4079574a246cdfa2baf2d643c6b3108', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996105, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('c595c4732ef505091fc18629931dbc5ef3276160', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996124, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('bd7fd532957773ce5409b9b72689bb33614dd1ed', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996140, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('5f8e9cefb7773e2f2d9dc66284c8a06c95e43123', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996158, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('5eae200e6e1a62f80ff5d695cd1df4b68775b6eb', '9b44ac8966798da6f357fc1689342e187013cd51', 1522996175, 'Mengomentari Temuan dengan ID 9a052885886e493d678d957da3578bd9fc03a3d1', '::1', 'Sukses'),
('a187ae5779e9b6d09adde5f1f6d1ccf3f9a1e4b9', '9b44ac8966798da6f357fc1689342e187013cd51', 1522997912, 'Menambah Menu Tindak Lanjut Audit', '::1', 'Sukses'),
('989cf9f51ea93da4e5566a075ff39fc22c194ca4', '9b44ac8966798da6f357fc1689342e187013cd51', 1522997919, 'Mengubah Menu dengan ID 122', '::1', 'Sukses'),
('aeb84ae5fd91c3e8ef9b8738972cac4f1f63c85b', '9b44ac8966798da6f357fc1689342e187013cd51', 1522997939, 'Mengubah Menu dengan ID 29', '::1', 'Sukses'),
('13294e28fea09d94a69f33dda8e352b140a26ade', '9b44ac8966798da6f357fc1689342e187013cd51', 1522997975, 'Menambah Menu Tambah', '::1', 'Sukses'),
('a65836e332891d4e82a8978ab54ac310f1115e67', '9b44ac8966798da6f357fc1689342e187013cd51', 1522997990, 'Mengubah Menu dengan ID 123', '::1', 'Sukses'),
('360080c4df052b3b01d91a44d86345244bb4e68d', '9b44ac8966798da6f357fc1689342e187013cd51', 1523000063, 'Menghapus Parameter Menu ID 122', '::1', 'Sukses'),
('f061df9a1d20bb0b6ec83991c9780ecbeb7bf23d', '9b44ac8966798da6f357fc1689342e187013cd51', 1523000181, 'Menambah Tindak Lanjut dengan ID 12b850bff7ca035ec4b8fe56a79b30c41104e1d3', '::1', 'Sukses'),
('dd6b5f56637cad5683b8aef7bc76b4ddea7b23a0', '9b44ac8966798da6f357fc1689342e187013cd51', 1523000213, 'Mengubah Menu dengan ID 29', '::1', 'Sukses'),
('97f48d8f9e29da8927ed772760b1d12bbad6ef47', '9b44ac8966798da6f357fc1689342e187013cd51', 1523002654, 'Menupdate Status Tindak Lanjut ID 86908321a0f5023a1249f30da9cbaee26e0d0af2 menjadi 1', '::1', 'Sukses'),
('1915a8d624c1fb417e1636c75d6ff617436b4870', '9b44ac8966798da6f357fc1689342e187013cd51', 1523002657, 'Mengomentari Tindak Lanjut dengan ID 86908321a0f5023a1249f30da9cbaee26e0d0af2', '::1', 'Sukses'),
('3f276fad8ef40e0f59a2fd3d562de5207a4c09d2', '9b44ac8966798da6f357fc1689342e187013cd51', 1523002669, 'Menupdate Status Tindak Lanjut ID 86908321a0f5023a1249f30da9cbaee26e0d0af2 menjadi 2', '::1', 'Sukses'),
('165b330ae9828934562b30cb16e70c48f87b2212', '9b44ac8966798da6f357fc1689342e187013cd51', 1523002772, 'Mengubah Status Rekomendasi ID d86c0a8a04a91f178e1c346cbb5bfc510397b515', '::1', 'Sukses'),
('1145eb755423f6b329a22b3ffb97e41de11062de', '9b44ac8966798da6f357fc1689342e187013cd51', 1523006909, 'User Login', '::1', 'Sukses'),
('b211e09f328ac07d4fde0aa086c7d8852da9e206', '9b44ac8966798da6f357fc1689342e187013cd51', 1523010961, 'Mengubah LHA Penugasan AUdit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('2bf240729ec6e6bc6f2713b9ac44137f429ed7dd', '9b44ac8966798da6f357fc1689342e187013cd51', 1523010968, 'Mengubah LHA Penugasan AUdit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('ebf98d9711682ed36393c5c0c4a85d8eab7a728b', '9b44ac8966798da6f357fc1689342e187013cd51', 1523011305, 'Mengubah LHA Penugasan AUdit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('35efb18c9c81b4e7a5e20d01224716623f6e9c1c', '9b44ac8966798da6f357fc1689342e187013cd51', 1523011315, 'Mengubah LHA Penugasan AUdit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('98ce5af44427b81a034307e50ac639abdf707c5f', '9b44ac8966798da6f357fc1689342e187013cd51', 1523011505, 'Mengubah LHA Penugasan AUdit dengan ID 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('c2165114a83df79a1e9a0fbc53b9bfa1c97e5ee1', '9b44ac8966798da6f357fc1689342e187013cd51', 1523011505, 'Mengubah Status Penugasan Audit dengan ID  menjadi 3', '::1', 'Sukses'),
('3d35c3ed7a742f25490416c5b5c731b17f0e3d0a', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046083, 'User Login', '::1', 'Sukses'),
('25251c45025c004b903749f54f5c4156d3bc1f23', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046202, 'Menambah Program Audit ID afc0930adcfc4c86dafc68a07c83b0213c995a5a', '::1', 'Sukses'),
('bcb4d96f99163d94ea13f00dc1804ed44a6f39c3', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046209, 'Mengubah Status Program Audit dengan ID afc0930adcfc4c86dafc68a07c83b0213c995a5a', '::1', 'Sukses'),
('b4285d9d5b76173eead37ff1ff813e1098ef8a10', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046217, 'Mengubah Status Program Audit dengan ID afc0930adcfc4c86dafc68a07c83b0213c995a5a', '::1', 'Sukses'),
('f3c7980389aa0f60e94481516d149a163e6c0378', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046643, 'User Logout', '::1', 'Sukses'),
('a2892fdeb612970142eb393cdf2771e56efbc6da', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255304, 'User Login', '::1', 'Sukses'),
('70b21718c229e6abb033f51025b82e05c5efcff8', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255321, 'Menghapus Program Audit dengan ID afc0930adcfc4c86dafc68a07c83b0213c995a5a', '::1', 'Sukses'),
('cb93734cef6a3389fb6cb563ba76785053ff08da', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255396, 'Menghapus Auditee ID 6977412b56671db48d8457dd07ad92f2dc7429f7', '::1', 'Sukses'),
('20908fc30134e46ab177f226024000db84f048a2', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255399, 'Menghapus Auditee ID 2162ac6564477ebd680ace5542664638c2de2450', '::1', 'Sukses'),
('2c336acde1e867b532407202d53de0415ebf918a', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255483, 'Backup Database', '::1', 'Sukses'),
('f8933f143cd5db72e6b0b09c84d4704bab635ae7', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255799, 'Menambah Menu Dashboard Audit', '::1', 'Sukses'),
('bf45188b8fcbc1e2d80b52b5d3673e4c5c210160', '9b44ac8966798da6f357fc1689342e187013cd51', 1523255822, 'Mengubah Data Group ID a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '::1', 'Sukses'),
('a681f266760559c58cb3ff6de992b53ddb5d4b7c', '9b44ac8966798da6f357fc1689342e187013cd51', 1523256044, 'Mengubah Menu dengan ID 124', '::1', 'Sukses'),
('e7660903d2957d349f118995c3d80bc8aa7ba1ac', '9b44ac8966798da6f357fc1689342e187013cd51', 1523260137, 'User Logout', '::1', 'Sukses'),
('79e65bc60f6512a43afec6669628c20c11924e5e', '9b44ac8966798da6f357fc1689342e187013cd51', 1523260226, 'User Login', '::1', 'Sukses'),
('d1bd346d6a3d5042244345895e739d47111a8a6b', '9b44ac8966798da6f357fc1689342e187013cd51', 1523260275, 'User Logout', '::1', 'Sukses'),
('e43fdc8c1a1436d8d88cba10a623c514146feb44', '9b44ac8966798da6f357fc1689342e187013cd51', 1523260771, 'User Login', '::1', 'Sukses'),
('f346529a06dab24a58a60bf67e4e3b1a2346a0ed', '9b44ac8966798da6f357fc1689342e187013cd51', 1523260862, 'User Login', '::1', 'Sukses'),
('96da67bfe66b9249963ae1f0abc71f76b9b00658', '9b44ac8966798da6f357fc1689342e187013cd51', 1523264484, 'User Logout', '::1', 'Sukses'),
('2db7424d016bdf778a86e3f0308aa07fa15c86cb', '9b44ac8966798da6f357fc1689342e187013cd51', 1523342414, 'User Login', '::1', 'Sukses'),
('629c076de6f156a4ac72e6e64cf3c08a921cf277', '9b44ac8966798da6f357fc1689342e187013cd51', 1523342500, 'User Logout', '::1', 'Sukses'),
('4cf259efbe6a4ac7641a52d4a99b8d353a7ac3ee', '9b44ac8966798da6f357fc1689342e187013cd51', 1523343061, 'User Login', '::1', 'Sukses'),
('df6ea004207b9b47b7a52f633ed77fb5e455b568', '9b44ac8966798da6f357fc1689342e187013cd51', 1523344711, 'Menambah Penugasan ID 3b2a25ebc708b6686e70c26b5de2b3a1ed190259', '::1', 'Sukses'),
('f9202ef69c25766d55f12abfb13cff29fbd8d8a3', '9b44ac8966798da6f357fc1689342e187013cd51', 1523344729, 'Menambah anggota dengan id 7c1ff6d6d3f35693a4549ddb3e58595626966894 pada penugasan id 3b2a25ebc708b6686e70c26b5de2b3a1ed190259', '::1', 'Sukses'),
('f486b2af2cc6b142acbdc6121c3f39aa64ce1f76', '9b44ac8966798da6f357fc1689342e187013cd51', 1523344897, 'Menambah 13115052 - Reni Erlita.Sebagai Auditor', '::1', 'Sukses'),
('a85f6dd828a14c6e8f1872b9d7306763d24a32cb', '9b44ac8966798da6f357fc1689342e187013cd51', 1523345014, 'Mengubah Data Auditor dengan ID 63e53c4375c33a9b4d39e3f1f86b3ea777a5f22b', '::1', 'Sukses'),
('9dc22a2a51e7578b89e718467224728e3d39c852', '9b44ac8966798da6f357fc1689342e187013cd51', 1523345146, 'Mengubah Data Auditor dengan ID 63e53c4375c33a9b4d39e3f1f86b3ea777a5f22b', '::1', 'Sukses'),
('a017cf8d40ff61d4740d36b9b542a20fd827cbbe', '9b44ac8966798da6f357fc1689342e187013cd51', 1523345173, 'Menambah anggota dengan id cba947c35f163a93324f1319c51c481b0f13c0bd pada penugasan id 015d816f70352e3b473482c3c6dd08afdde8fe97', '::1', 'Sukses'),
('c18397c6b5ae4ac96e471f3b60cc6da2fcac9494', '9b44ac8966798da6f357fc1689342e187013cd51', 1523345979, 'Menghapus anggota id 7c1ff6d6d3f35693a4549ddb3e58595626966894', '::1', 'Sukses'),
('0b70f26991b8641ee34bad863485a8d09bab6986', '9b44ac8966798da6f357fc1689342e187013cd51', 1523396363, 'User Login', '::1', 'Sukses'),
('f6cf9010a1b77b3d4026c4d53088ae22d107e8d4', '9b44ac8966798da6f357fc1689342e187013cd51', 1523396490, 'Menghapus Penugasan Audit dengan ID 3b2a25ebc708b6686e70c26b5de2b3a1ed190259', '::1', 'Sukses'),
('29bc15b09d971ad6f9331290321ca47556745da4', '9b44ac8966798da6f357fc1689342e187013cd51', 1523405307, 'Menambah Plan ID c4ab3607250cef7a474f84036eb960f7036cf7f5', '::1', 'Sukses'),
('f1124ed821fc3462b70cbecbc6d3d05f7d31b6da', '9b44ac8966798da6f357fc1689342e187013cd51', 1523885924, 'User Login', '::1', 'Sukses'),
('ba410248d1e68659928c3fbfee0af63b74d5dba7', '9b44ac8966798da6f357fc1689342e187013cd51', 1523885982, 'Menambah Plan ID 1b25c3d46e7a4faef3cec013a876ccb2209a743b', '::1', 'Sukses'),
('d06c705c908709431b42ee5df79c24d1eb2dab5f', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886031, 'Menambah anggota dengan id 82a3bb99c4b564500fa83dd703669b041723c7f1 pada planning id 1b25c3d46e7a4faef3cec013a876ccb2209a743b', '::1', 'Sukses'),
('23fcc37f389f69ddd4dae2dcd143f5b9a9bc9c1e', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886167, 'Mengubah Penugasan Audit dengan ID c2784e3df1f20144b6d5ffa2bc123549d93228f4', '::1', 'Sukses'),
('78306a732d59f905c7702c6f5f20ec07c81d2391', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886207, 'Mengubah Status Penugasan Audit dengan ID c2784e3df1f20144b6d5ffa2bc123549d93228f4 menjadi 1', '::1', 'Sukses'),
('2e25cb80193b563693c7084cb7b0987eec396fbd', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886207, 'Mengomentari Penugasan dengan ID c2784e3df1f20144b6d5ffa2bc123549d93228f4', '::1', 'Sukses'),
('5ff401e750cf921b10870936d6bb5b833278cc65', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886215, 'Mengubah Status Penugasan Audit dengan ID c2784e3df1f20144b6d5ffa2bc123549d93228f4 menjadi 2', '::1', 'Sukses'),
('87710a09d8f6852e1f31437134285452f4338144', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886270, 'Mengubah Status Surat Tugas dengan ID 9ee220615e6f10dac90dc862753ffdaa7edd6e69 menjadi 1', '::1', 'Sukses'),
('5709422f0000f7f118ad0c35ce552e1f305ef5d1', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886270, 'Mengomentari Surat Tugas dengan ID 9ee220615e6f10dac90dc862753ffdaa7edd6e69', '::1', 'Sukses'),
('6946c80f2b4ee18a6de314825fc6c0276de4d926', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886276, 'Mengubah Status Surat Tugas dengan ID 9ee220615e6f10dac90dc862753ffdaa7edd6e69 menjadi 2', '::1', 'Sukses'),
('59c98437784e2f0d4dda159565169abc4d8ded20', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886305, 'Menambah Program Audit ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('d8e3e1343ba2848e9f368ad74566b3f29ee4669e', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886305, 'Menambah Program Audit ID 95b985be256bda898add120fc98b7ed9c9a5bbb5', '::1', 'Sukses'),
('10196370236f4effcebcdf5972b3292f887c4aae', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886315, 'Mengubah Status Program Audit dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('8471420972952cb61d9ae4089579a999ed0a91df', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886319, 'Mengubah Status Program Audit dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('1921e2177ac97d50af1e93e9da97b71aa7ba9811', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886343, 'Menambah Kertas Kerja Dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('00fd2827d7796f00ad9aeca67fb50a107387562c', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886396, 'Menambah Temuan No d90170', '::1', 'Sukses'),
('0628c8e743508631ad7734697eac143bfe91b625', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886468, 'Menambah Rekomendasi dengan ID 60527294741cfa8aa811752698cdda3608530934', '::1', 'Sukses'),
('a871df3771fe597e66478cf6fce1b4c0b5eef94a', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886623, 'Menambah Tindak Lanjut dengan ID 1db1e5ac84d8d26e9fd66d42328c63b429b593e7', '::1', 'Sukses'),
('149f74b33b6060e88d21f3bb06ec8842f09092e7', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886627, 'Menupdate Status Tindak Lanjut ID 9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7 menjadi 1', '::1', 'Sukses'),
('f5fc093a5ed9c273906b8e1dc0634c27e9795f3c', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886641, 'Mengomentari Tindak Lanjut dengan ID 9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7', '::1', 'Sukses'),
('95690d2049a02240bc2d43f59e3c203053efa261', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886647, 'Menupdate Status Tindak Lanjut ID 9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7 menjadi 2', '::1', 'Sukses'),
('0028ece391c03953158357a6319c6681a4396053', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886659, 'Mengomentari Tindak Lanjut dengan ID 9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7', '::1', 'Sukses'),
('bad5e0b93f9efe4544e768b97ad7cf033ecff008', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886672, 'Mengubah Status Rekomendasi ID 99d9f1ef609c26fb20db2b54556f40e9f197fd7a', '::1', 'Sukses'),
('f439e2f664b2117d2510d617534e621f568d6fa4', '9b44ac8966798da6f357fc1689342e187013cd51', 1524020653, 'User Login', '::1', 'Sukses'),
('62c1b4e4b9ea644a763599059a8a58dbde75b8ab', '9b44ac8966798da6f357fc1689342e187013cd51', 1524542453, 'User Login', '::1', 'Sukses'),
('800eb3742b3562284b0e28004454fc20416f3117', '9b44ac8966798da6f357fc1689342e187013cd51', 1527479764, 'User Login', '::1', 'Sukses'),
('7cdeac8254ea62c7c7fc4d23aa4198da9e30cbae', '9b44ac8966798da6f357fc1689342e187013cd51', 1527479811, 'Mengubah Program Audit dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('ba463962d25bac9e453d0fbf60369f162ff1364b', '9b44ac8966798da6f357fc1689342e187013cd51', 1527481414, 'User Login', '::1', 'Sukses'),
('f3288272baa0431623b077a228eb2c6f8bd5e706', '9b44ac8966798da6f357fc1689342e187013cd51', 1527481527, 'User Login', '::1', 'Sukses'),
('b64579a7a59060d3b466865915122a48ab05c229', '9b44ac8966798da6f357fc1689342e187013cd51', 1527481655, 'User Login', '::1', 'Sukses'),
('f13f98ad0fc06e158679053fce9e6691fa67f204', '9b44ac8966798da6f357fc1689342e187013cd51', 1527487364, 'Menambah Kertas Kerja Dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('2d133da3713bdbab27ce1b7c9b92ce7d92600924', '9b44ac8966798da6f357fc1689342e187013cd51', 1527487373, 'Mengomentari Kertas Kerja dengan ID 9288352d6c864045f0263ccf17fc8fcfd44f3fcc', '::1', 'Sukses'),
('5ad521042da9f6568fef808a7f4c2b2a79e5c0a2', '9b44ac8966798da6f357fc1689342e187013cd51', 1527494334, 'Mengubah Status Program Audit dengan ID 95b985be256bda898add120fc98b7ed9c9a5bbb5', '::1', 'Sukses'),
('b6030eaa273a44249c961a425a418720745d6f2f', '9b44ac8966798da6f357fc1689342e187013cd51', 1527494360, 'Mengomentari Kertas Kerja dengan ID 9288352d6c864045f0263ccf17fc8fcfd44f3fcc', '::1', 'Sukses'),
('bec036e3fab7d4449558745d2aaec8df5680a9ca', '9b44ac8966798da6f357fc1689342e187013cd51', 1527562840, 'Menambah Kertas Kerja Dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('da290e450089f1a3b02bdb4e3e65c9fa9c2fc386', '9b44ac8966798da6f357fc1689342e187013cd51', 1527562876, 'Mengomentari Kertas Kerja dengan ID 13003d363ff8109b1e08d9efe431e7dbdd6e4a85', '::1', 'Sukses'),
('f9cb45657f77cff1fac1a80790bba6b9ae9c0be3', '9b44ac8966798da6f357fc1689342e187013cd51', 1527562886, 'Mengomentari Kertas Kerja dengan ID 13003d363ff8109b1e08d9efe431e7dbdd6e4a85', '::1', 'Sukses'),
('691557714c810b0d20c28d61702d132f78fde9aa', '9b44ac8966798da6f357fc1689342e187013cd51', 1527563091, 'Menambah Kertas Kerja Dengan ID 97f47f6ff12805fe45a8a7a63080508f15dae419', '::1', 'Sukses'),
('7e940eb25e4462d652eb91f175aad44e0b0ba523', '9b44ac8966798da6f357fc1689342e187013cd51', 1527563141, 'Mengubah Kertas Kerja dengan ID 9734762dcd953a9d23e3d5c8c327131efd672023', '::1', 'Sukses'),
('6d162d0179906c484acd7791f5f8e2e2f24c896d', '9b44ac8966798da6f357fc1689342e187013cd51', 1527563153, 'Mengubah Kertas Kerja dengan ID 9734762dcd953a9d23e3d5c8c327131efd672023', '::1', 'Sukses'),
('9fcce6a6645acedca903c8ad75425624d57ecabe', '9b44ac8966798da6f357fc1689342e187013cd51', 1527735609, 'User Login', '::1', 'Sukses'),
('56728d697e27cf0ed5d64a85cf1003fa68e5492a', '9b44ac8966798da6f357fc1689342e187013cd51', 1527737024, 'User Login', '::1', 'Sukses'),
('3828aaf7ad44732c7032eeea436400adc77a60ad', '9b44ac8966798da6f357fc1689342e187013cd51', 1527737221, 'Mengubah Menu dengan ID 124', '::1', 'Sukses'),
('081430ae6d7e72aa576d368750b6e3e31d46f8cf', '9b44ac8966798da6f357fc1689342e187013cd51', 1527737300, 'Mengubah Menu dengan ID 124', '::1', 'Sukses'),
('eec0ba800c3d799547221394869d50cdcc754cd2', '9b44ac8966798da6f357fc1689342e187013cd51', 1529986933, 'User Login', '::1', 'Sukses'),
('63728fccf7dc002dbd3f185d15cebbb6ef7d9323', '9b44ac8966798da6f357fc1689342e187013cd51', 1529986949, 'Mengubah Data Group ID a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '::1', 'Sukses'),
('b29bf3c5ee56fa0b748673ffd82eff2cfc2c3984', '9b44ac8966798da6f357fc1689342e187013cd51', 1530000147, 'Menghapus Referensi Audit ID 45ca1318df76d62c8ab2b800ac0b03226c832f6c', '::1', 'Sukses'),
('4080a562f105234c7b03a57de361accc6d970623', '9b44ac8966798da6f357fc1689342e187013cd51', 1530243677, 'User Login', '::1', 'Sukses'),
('c0038ca0ba1b8b6b5359f6498f8733d396a29219', '9b44ac8966798da6f357fc1689342e187013cd51', 1530243698, 'Menghapus Username Dengan id 3c7d52115accc93808ea7c0de0efe86d3e445d84', '::1', 'Sukses'),
('ab47a232c89dc4915c6840e4e8592eebd9e76c35', '9b44ac8966798da6f357fc1689342e187013cd51', 1534757534, 'User Login', '::1', 'Sukses'),
('cb128afd722e9d4ed9cd4677934a70d0779eecea', '9b44ac8966798da6f357fc1689342e187013cd51', 1534758043, 'Menambah Menu Parameter Email', '::1', 'Sukses'),
('bb97f99a6c696ffddc2cd9f7851d046a16e9d1bf', '9b44ac8966798da6f357fc1689342e187013cd51', 1534758063, 'Mengubah Data Group ID a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '::1', 'Sukses'),
('a8dba410e5b689f7c8e98d8c582aa02e097f1c6b', '9b44ac8966798da6f357fc1689342e187013cd51', 1534766515, 'User Login', '::1', 'Sukses');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notif_id` varchar(50) NOT NULL,
  `notif_data_id` varchar(50) NOT NULL,
  `notif_from_user_id` varchar(50) NOT NULL,
  `notif_to_user_id` varchar(50) NOT NULL,
  `notif_desc` varchar(255) NOT NULL,
  `notif_method` varchar(50) NOT NULL,
  `notif_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notif_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `notif_data_id`, `notif_from_user_id`, `notif_to_user_id`, `notif_desc`, `notif_method`, `notif_date`) VALUES
('b431d6b5fc58aa37c61c1a779af46fd7ee0d0b2d', '95b985be256bda898add120fc98b7ed9c9a5bbb5', '9b44ac8966798da6f357fc1689342e187013cd51', '9b44ac8966798da6f357fc1689342e187013cd51', '(Program Audit)... asdksajdassad', 'program_audit', '2018-05-28 07:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `par_aspek`
--

CREATE TABLE IF NOT EXISTS `par_aspek` (
  `aspek_id` varchar(50) NOT NULL,
  `aspek_name` varchar(100) NOT NULL,
  `aspek_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=del 1=aktif',
  PRIMARY KEY (`aspek_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_aspek`
--

INSERT INTO `par_aspek` (`aspek_id`, `aspek_name`, `aspek_del_st`) VALUES
('c37ccd97c72da477e51f3b71809016a5f13a5765', 'Kesekretariatan', 0),
('3c7f1096de7da99484a42852da60792858994c60', 'Perikanan Tangkap', 0),
('6031fc656ebe93a64d401dc66eace039c475389e', 'Perikanan Budidaya', 0),
('8f82a264012563a6e9b4105025bb5869d35a34a5', 'Pengolahan dan Pemasaran Hasil Perikanan', 0),
('460d0b13f7a9cb51e5391985bd42f8ea4afbef2c', 'Kelautan, Pesisir, dan Pulau-Pulau Kecil', 0),
('cd1d3d9ba16a8fd8eadb351dcfe6ef8dcea417d0', 'Pengawasan Sumber Daya Kelautan dan Perikanan', 0),
('462599baf768cd3bb1bc6ebad7a36d338206c884', 'Penelitian dan Pengembangan Kelautan dan Perikanan', 0),
('688d723bd69b2d06980b519ca49badc09f16ee4d', 'Pengembangan Sumber Daya Manusia Kelautan dan Perikanan', 0),
('3da92cabe8a8473f55e638fa7dc43ea1753f40e8', 'Karantina Ikan, Pengendalian Mutu, dan Keamanan Hasil Perikanan', 0),
('277f1441ce02dbf662e6feb6c669b603a4de35d0', 'ASPEK KEUANGAN', 1),
('4db91f046b49f91c14736ad0e82d31c931ce475c', 'ASPEK SARANA DAN PRASARANA', 1),
('5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'ASPEK SUMBER DAYA MANUSIA', 1),
('8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'ASPEK TUGAS POKOK DAN FUNGSI', 1),
('6d46ae583029560f8debf0fce2036586e97cea7a', 'ASPEK SISTEM PENGENDALIAN INTERN', 1),
('e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'ASPEK SURVEY PENDAHULUAN', 1),
('d620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'ASPEK AUDIT RINCI/LANJUTAN', 1),
('cd4a7c581d450985ff742da4320c12f3bccf3068', 'ASPEK KEWAJARAN HARGA PENGADAAN BARANG/ JASA', 1),
('60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'ASPEK KETEPATAN KUANTITAS PENGADAAN BARANG/ JASA', 1),
('2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'ASPEK PERENCANAAN PENGADAAN BARANG/ JASA', 1),
('8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'ASPEK KETAATAN PELAKSANAAN  PROSEDUR PENGADAAN BARANG/ JASA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_audit_akses`
--

CREATE TABLE IF NOT EXISTS `par_audit_akses` (
  `akses_id` varchar(5) NOT NULL,
  `akses_menu` varchar(50) NOT NULL,
  `akses_name` varchar(50) NOT NULL,
  `akses_sort` int(11) NOT NULL,
  PRIMARY KEY (`akses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_audit_akses`
--

INSERT INTO `par_audit_akses` (`akses_id`, `akses_menu`, `akses_name`, `akses_sort`) VALUES
('1', 'Kertas Kerja', 'Reviu Pengendali Teknis', 2),
('2', 'Kertas Kerja', 'Reviu Pengendali Mutu', 3),
('3', 'Kertas Kerja', 'Reviu Ketua Tim', 1);

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
  `audit_type_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`audit_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_audit_type`
--

INSERT INTO `par_audit_type` (`audit_type_id`, `audit_type_name`, `audit_type_code`, `audit_type_desc`, `audit_type_opsi`, `audit_type_del_st`) VALUES
('0525307297f9bed8984a8054918087dcf03c4bcf', 'Audit Kinerja', '', 'KIN', 1, 1),
('4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'Audit Dengan Tujuan Tertentu', '', 'KHS', 1, 1),
('04090de5ed0699ed0293ef73d3bb61d73388e072', 'Audit Dana Dekonsentrasi/TP', '', 'Audit Dana Dekonsentrasi/TP', 0, 0),
('d5aaabf0d82997143dc645655cbc911b4b5de4f4', 'Audit Keuangan', '', 'Audit atas laporan keuangan', 1, 1),
('98cd0ca731da106235cc474a7608ad5750d8e1e8', 'Audit PBJ', '', 'PBJ', 1, 1),
('9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'Audit Operasional', '', '', 1, 1),
('efe9165cb8857eb7822a18c0aae62c36887e3615', 'Reviu LK', '', '', 2, 1),
('7a08823fc15fb164dc0b3cb03664fe3fb1becfc0', 'Monitoring TL', '', '', 2, 1),
('6f0349821c12229d4a7a74f1a86292c73fe105a5', 'Sosialisasi', '', '', 3, 1),
('69b2d4fcc8b0fa804740c2c1f6d99db2fa5357ae', 'DIKLAT', '', '', 3, 1),
('95c4470bc64a292858d57bb1fc312fb370af5064', 'Bimbingan Teknis', '', '', 3, 1),
('c3353be8a9aa27f09f5ff7222d89ad895a855a2e', 'Pendampingan BPK', '', '', 2, 1),
('ae80454b6152c548f85dfd3b7310871f97a14796', 'Rekonsiliasi', '', '', 2, 1),
('0ca25b7817f691e853c19e447981dae6412e4cba', 'BMN', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_esselon`
--

CREATE TABLE IF NOT EXISTS `par_esselon` (
  `esselon_id` varchar(50) NOT NULL,
  `esselon_name` varchar(100) NOT NULL,
  `esselon_del_st` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`esselon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_esselon`
--

INSERT INTO `par_esselon` (`esselon_id`, `esselon_name`, `esselon_del_st`) VALUES
('93a401be9c1cb44114e0432f9c31d6a2a662a4fb', 'Sekretariat Jenderal', 1),
('a8963b8aa3608dcb206926988c3b9ca91d495e0f', 'Direktorat Jenderal Perikanan Tangkap', 1),
('1c56ae798a24600a89c638869b8b9d08f1decc3f', 'Direktorat Jenderal Perikanan Budidaya', 1),
('81f350a05bf5797a609f2e9bca287db694a9ab49', 'Direktorat Jenderal PRL', 1),
('08029bd17bc2cf8a514c3f363be14d491c65362b', 'Direktorat Jenderal PDSPKP', 1),
('c837ebf11517f831fd0f0d7fc8a17567ac72c870', 'Direktorat Jenderal PSDKP', 1),
('751a275a83fdaffebc9fd9fb48bc56f9e7c18b20', 'Balitbang Kelautan dan Perikanan', 1),
('7f7476dc4fd08ba36ea4ba72f00388690aade41d', 'BPSDM Kelautan dan Perikanan', 1),
('d66937adea70f1831c86981aaa6445af65b6081e', 'Badan Karantina Ikan dan Pengendalian Mutu dan Keamanan Hasil Perikanan', 1),
('3a25c613197b2199ec9b2ead9ac4946379fc5b5d', 'Inspektorat Jenderal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_finding_jenis`
--

CREATE TABLE IF NOT EXISTS `par_finding_jenis` (
  `jenis_temuan_id` varchar(50) NOT NULL,
  `jenis_temuan_id_sub_type` varchar(50) NOT NULL,
  `jenis_temuan_code` varchar(10) NOT NULL,
  `jenis_temuan_name` varchar(100) NOT NULL,
  `jenis_temuan_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jenis_temuan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_finding_jenis`
--

INSERT INTO `par_finding_jenis` (`jenis_temuan_id`, `jenis_temuan_id_sub_type`, `jenis_temuan_code`, `jenis_temuan_name`, `jenis_temuan_del_st`) VALUES
('31b8aebd0211b5870fe51e6df8b5694719d3a9a4', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '01', 'Belanja dan/atau pengadaan barang/jasa fiktif', 1),
('11582751dcdcb06ec24e8f76ddbc911d93813eaa', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '02', 'Rekanan pengadaan barang/jasa tidak menyelesaikan pekerjaan', 1),
('29452ebdf92be9fe582e620fa0dd4898349e3448', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '03', 'Kekurangan volume pekerjaan dan/atau barang', 1),
('ab4479b9627e5e983c20306c0f61c2367255fac1', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '04', 'Kelebihan pembayaran selain kekurangan volume pekerjaan dan/atau barang', 1),
('3d2ac3ad074db3e4292954ce1778d635defdd614', '34e821421283c122b2a7105914b5ee6971b7dcfb', '01', 'Kelebihan pembayaran dalam pengadaan barang/jasa tetapi pembayaran pekerjaan belum dilakukan sebagia', 1),
('76b4c3f0470e53a774c3522c66f44fbd398c2ae2', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '02', 'Penggunaan langsung penerimaan negara/daerah', 1),
('d2a780022cae0fa88ab83f165728e078ab802cc8', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '07', 'Kelebihan pembayaran subsidi oleh pemerintah', 1),
('5475064d43ff9b7a21941a06ba2cdc339aa6fd9f', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '02', 'Pekerjaan dilaksanakan mendahului kontrak atau penetapan anggaran', 1),
('f2ab012e3dbd11b716349354496b345cd6eaa3ec', '6800e36ea2ac83657c02127de8ca71908072d7cf', '01', 'Pencatatan tidak/belum dilakukan atau tidak akurat', 1),
('f1eb355bc9d23e830eb60680f7b64d34a49edf9c', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '01', 'Perencanaan kegiatan tidak memadai', 1),
('6fe55674b39518c8194114401b00b5f27cab080e', '02cc05566a58319721f5a112b924ae83f863b6bd', '01', 'Pengadaan barang/jasa melebihi kebutuhan', 1),
('ed78242071f82d310d08c29f6192bfc0aad455d5', '704863370a5444d29b9cb88e6bfbabc74572b074', '02', 'Penggunaan kualitas input untuk satu satuan output lebih tinggi dari seharusnya', 1),
('2a889cc1e20fffa4336572bcca6a53f92ceb9ca3', '1c4fa91c754e6a03ab4c67012c9eea27308768e6', '02', 'Pemanfaatan barang/jasa dilakukan tidak sesuai dengan rencana yang ditetapkan', 0),
('73b8db1cd9df51f8e2cdce50d7f3267f31703afe', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '05', 'Pemahalan harga (Mark up)', 1),
('0a2cb84e8a5f22772c1131be229cbc7f5a7bdfed', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '01', 'Penggunaan anggaran tidak tepat sasaran/tidak sesuai peruntukan', 1),
('ed4b80cccf5fdd9a85c76d721e411a6df04eecd3', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '02', 'Pemanfaatan barang/jasa dilakukan tidak sesuai dengan rencana yang ditetapkan', 1),
('4b2457a3562b63daffb49d392093fb1a1c048d22', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '03', 'Barang yang dibeli belum/tidak dapat dimanfaatkan', 1),
('c18faeed24925a9688ad944e53d3e2d309d70d6b', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '04', 'Pemanfaatan barang/jasa tidak berdampak terhadap pencapaian tujuan organisasi', 1),
('de57bf3bf319571ef941a0d93fb85fa6589c7f83', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '05', 'Pelaksanaan kegiatan terlambat/terhambat sehingga mempengaruhi pencapaian tujuan organisasi', 1),
('212aa601d9c0e131af999c2f3044dcbd0cca8343', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '06', 'Pelayanan kepada masyarakat tidak optimal', 1),
('25fe1669483da21479076557c396005780ba3c0a', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '07', 'Fungsi atau tugas instansi yang diperiksa tidak diselenggarakan dengan baik termasuk target penerima', 1),
('6b5b5ad9359423317d38f2d80f70c11e14a55713', '68e993038e99e777e1ed37c06a1b0bb41fba54a7', '08', 'Penggunaan biaya promosi/pemasaran tidak efektif', 1),
('85c37504622e8e0d8aa355d4368334b4a95769a0', '704863370a5444d29b9cb88e6bfbabc74572b074', '01', 'Penggunaan kuantitas input untuk satu satuan output lebih besar/tinggi dari yang seharusnya', 1),
('a9b8af36ccdf89dca3936c70da497ace86bb2807', '02cc05566a58319721f5a112b924ae83f863b6bd', '03', 'Pemborosan keuangan negara/daerah/perusahaan atau kemahalan harga', 1),
('ea3a2eac9a96ab4433c3c8caa83cd6942aa2d4af', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '06', 'Penggunaan uang/barang untuk kepentingan pribadi', 1),
('c18b93fe90810bd8a9159acb0322d2c2c3ae11e5', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '07', 'Pembayaran honorarium dan/atau biaya perjalanan dinas ganda dan/atau melebihi standar yang ditetapka', 1),
('6ef68cad252d506917aa565c9dd8373cb74515ae', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '08', 'Spesifikasi barang/jasa yang diterima tidak sesuai dengan kontrak', 1),
('8dd3fccfe626c0b1503028ea206f66683ef7ff8f', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '09', 'Belanja tidak sesuai atau melebihi ketentuan', 1),
('a6ecb75272e020e5bd6b7b34a7261515a3de1f8f', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '10', 'Pengembalian pinjaman/piutang atau dana bergulir macet', 1),
('2994dabe845cba5fe336c9374a90c58e19876185', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '11', 'Kelebihan penetapan dan pembayaran restitusi pajak atau penetapan kompensasi kerugian', 1),
('fb8a9752f732af13282da8c91b6a4d4712d25f13', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '12', 'Penjualan/pertukaran/penghapusan aset negara/daerah tidak sesuai ketentuan dan merugikan negara/daer', 1),
('946a354b5b686ce031e25e35adb6fdfc190ee0e1', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '13', 'Pengenaan ganti kerugian negara belum/tidak dilaksanakan sesuai ketentuan', 1),
('e1d8807d480e376889941d381600c2b1d97ece08', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '14', 'Entitas belum/tidak melaksanakan tuntutan perbendaharaan (TP) sesuai ketentuan', 1),
('8ec0ae4facaf31e5d295261a71e602325b42a0cb', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '15', 'Penghapusan hak tagih tidak sesuai ketentuan', 1),
('a4fbd022dff357f68f47a9429a2fa77d4f8d1af8', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '16', 'Pelanggaran ketentuan pemberian diskon penjualan', 1),
('a7b1dba88726b66f844f46675588a75869755f4a', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '17', 'Penentuan HPP (harga pokok pembelian) terlalu rendah sehingga penentuan harga jual lebih rendah dari', 1),
('0ad96053dd1daa21196e057b6cfd6a74eb7b08c9', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '18', 'Jaminan pelaksanaan dalam pelaksanaan pekerjaan, pemanfaatan barang dan pemberian fasilitas tidak da', 1),
('ee56d6feb913c59ecda4300c80884d020c20920e', 'e950a0afcb65d466058c5ee19e5adb0646c9769f', '19', 'Penyetoran penerimaan negara/daerah dengan bukti fiktif', 1),
('e118b54c6f9717ef389df5798c100ee1265af7ba', '34e821421283c122b2a7105914b5ee6971b7dcfb', '02', 'Rekanan belum melaksanakan kewajiban pemeliharaan barang hasil pengadaan yang telah rusak selama mas', 1),
('73d0888bb770358b9d059d260eca75c1843240e2', '34e821421283c122b2a7105914b5ee6971b7dcfb', '03', 'Aset dikuasai pihak lain', 1),
('37d477b77aae6348f3e2ef6d2e13f35c571d1b80', '34e821421283c122b2a7105914b5ee6971b7dcfb', '04', 'Pembelian aset yang berstatus sengketa', 1),
('f9435e6373ed298bda99770e4982b992c73fec00', '34e821421283c122b2a7105914b5ee6971b7dcfb', '05', 'Aset tidak diketahui keberadaannya', 1),
('d627b664e3516a7d2c52a7a3475e19e91c376f54', '34e821421283c122b2a7105914b5ee6971b7dcfb', '06', 'Pemberian jaminan pelaksanaan dalam pelaksanaan pekerjaan, pemanfaatan barang dan pemberian fasilita', 1),
('84316d2ada8a045d4a1a6e47ca27eda77aa9a9b6', '34e821421283c122b2a7105914b5ee6971b7dcfb', '07', 'Pihak ketiga belum melaksanakan kewajiban untuk menyerahkan aset kepada negara/daerah', 1),
('e17719d3c6c614b147a18f97ff8236876fff898a', '34e821421283c122b2a7105914b5ee6971b7dcfb', '08', 'Piutang/pinjaman atau dana bergulir yang berpotensi tidak tertagih', 1),
('85c44208e8250a4c1eef82a495edc9b1208b8ba7', '34e821421283c122b2a7105914b5ee6971b7dcfb', '09', 'Penghapusan piutang tidak sesuai ketentuan', 1),
('8941fdcb63e45fcf048205d856981518445270ea', '34e821421283c122b2a7105914b5ee6971b7dcfb', '10', 'Pencairan anggaran pada akhir tahun anggaran untuk pekerjaan yang belum selesai', 1),
('13a5bcfacbf24e6eefa8dfc9fa29d6d60385b7e9', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '01', 'Penerimaan negara/daerah atau denda keterlambatan pekerjaan belum/tidak ditetapkan dipungut/diterima', 1),
('cbe55605fcf9f6a84090b63006f68c7b241dec9d', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '03', 'Dana Perimbangan yang telah ditetapkan belum masuk ke kas daerah', 1),
('d5568a767daca0b1b6928aaf176db01450e791a4', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '04', 'Penerimaan negara/daerah diterima atau digunakan oleh instansi yang tidak berhak', 1),
('ca9188b0b9d1e1610612f05d1bfbb085dded79d3', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '05', 'Pengenaan tarif pajak/PNBP lebih rendah dari ketentuan', 1),
('dd7f3b955090e126fabcb430be16abe976417795', '10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '06', 'Koreksi perhitungan bagi hasil dengan KKKS', 1),
('3461d93920cf8c9b754f1f20ce008d5f0c4d3784', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '01', 'Pertanggungjawaban tidak akuntabel (bukti tidak lengkap/tidak valid)', 1),
('5fbd4a1429604ffa284c2f6acfe68aab865a7fa7', '3afc446539c280ff0b767a634ec6847cc881e6e6', '02', 'Indikasi tindak pidana perbankan', 1),
('56cecd144ec3c563dc210b418c14f105e3313b3e', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '03', 'Proses pengadaan barang/jasa tidak sesuai ketentuan (tidak menimbulkan kerugian negara)', 1),
('d71202dc7ed3b699954ad12eff44e3838cafc445', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '04', 'Pemecahan kontrak untuk menghindari pelelangan', 1),
('dc617e5493d460e58e71daa24a16a06387b5b462', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '05', 'Pelaksanaan lelang secara performa', 1),
('f8f6be35f79cc813c246161a7a2f55edf5ace4f3', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '06', 'Penyimpangan terhadap peraturan perundang-undangan bidang pengelolaan perlengkapan atau barang milik', 1),
('1bb0cebf8e1d84928922c9fec503c0d3f6bfda48', '6800e36ea2ac83657c02127de8ca71908072d7cf', '02', 'Proses penyusunan laporan tidak sesuai ketentuan', 1),
('ce744c41af85643cff27b54183efa0a4b3488f2b', '6800e36ea2ac83657c02127de8ca71908072d7cf', '03', 'Entitas terlambat menyampaikan laporan', 1),
('011526b425390a5defb22991f0d31ccf58215b7e', '6800e36ea2ac83657c02127de8ca71908072d7cf', '04', 'Sistem informasi akuntansi dan pelaporan tidak memadai', 1),
('90d7e6c93dab92f08f7f54d1c48acf9c428c3593', '6800e36ea2ac83657c02127de8ca71908072d7cf', '05', 'Sistem informasi akuntansi dan pelaporan belum didukung SDM yang memadai', 1),
('d67fe88e64229fc2f35ee1bf8c30df59c46f58c7', '6800e36ea2ac83657c02127de8ca71908072d7cf', '06', 'Indikasi tindak pidana pasar modal', 0),
('c9ebe084d279d27301a4878bce15bc7fb3d241ca', '6800e36ea2ac83657c02127de8ca71908072d7cf', '07', 'Indikasi tindak pidana khusus lainnya', 0),
('420b796d9695e4be082e940e14b56f32b14202ab', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '02', 'Mekanisme pemungutan, penyetoran dan pelaporan serta penggunaan Penerimaan negara/daerah/perusahaan ', 1),
('4ec2029f7689ee56f606cb70d15f968235574bb0', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '03', 'Penyimpangan terhadap peraturan perundang-undangan bidang teknis tertentu atau ketentuan intern orga', 1),
('0ac2c93b71cefae9d89318b23526d15f82e38a4e', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '04', 'Pelaksanaan belanja di luar mekanisme APBN/APBD', 1),
('03b5e943ed9612312b373ea52bf74734b74e72e9', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '05', 'Penetapan/pelaksanaan kebijakan tidak tepat atau belum dilakukan berakibat hilangnya potensi penerim', 1),
('15559b013a2d05379deba6634ddfa781994c7177', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '06', 'Penetapan/pelaksanaan kebijakan tidak tepat atau belum dilakukan berakibat peningkatan biaya /belanj', 1),
('8e7ae4289c1b32fc5338a2dbd40de9154bcec9ca', '231b6954045f49c0738fdc9e4c09ed7935ad5d2a', '07', 'Kelemahan pengelolaan fisik aset', 1),
('35af93e822b412f7d2bbdab67d72419eb02e4cc3', '5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', '01', 'Entitas tidak memiliki SOP yang formal untuk suatu prosedur atau keseluruhan prosedur', 1),
('e055c08780027e8f27e8a2c27d7c7b4f566ba541', '5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', '02', 'SOP yang ada pada entitas tidak berjalan secara optimal atau tidak ditaati', 1),
('a18bfc8ce7360516abab3ecb2a7c7b738b6bf448', '5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', '03', 'Entitas tidak memiliki satuan pengawas intern', 1),
('1a8c4f634d8a0f415780a3e4c2a6b5f097db5483', '5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', '04', 'Satuan pengawas intern yang ada tidak memadai atau tidak berjalan optimal', 1),
('0f09d594c42c226de60159eecd61031514fff812', '5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', '05', 'Tidak ada pemisahan tugas dan fungsi yang memadai', 1),
('8d552dbc08d0aa6125959df44043e7c30afe5065', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '07', 'Penyimpangan terhadap peraturan perundang-undangan bidang tertentu lainnya seperti kehutanan, pertam', 1),
('484e670b3e6f0780ddfb638f860e740e9876d881', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '08', 'Koreksi perhitungan subsidi/kewajiban pelayanan umum', 1),
('31dcf2c735e42bfd1825554bbc6827f0d170544c', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '09', 'Pembentukan cadangan piutang, perhitungan penyusutan atau amortisasi tidak sesuai ketentuan', 1),
('1e14fd37e626faa14b22a7ba2c3c8971ef4578fd', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '10', 'Penyetoran penerimaan negara/daerah atau kas di bendaharawan ke kas negara/daerah melebihi batas wak', 1),
('5a6cbf5e4a2fd4de321027983dd8d9b48567f11b', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '11', 'Pertanggungjawaban/penyetoran uang persediaan melebihi batas waktu yang ditentukan', 1),
('43ae2f3453dce94d5cd9067a88b8677e65109a0e', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '12', 'Sisa kas di bendahara pengeluaran akhir tahun anggaran belum/tidak disetor ke kas negara/daerah', 1),
('4dcfc41af0743364e52fc40a55cdd1f7d42d647a', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '13', 'Pengeluaran investasi pemerintah tidak didukung bukti yang sah', 1),
('1d63a2f08600e0f55aef765df318aedfd9ecbcb0', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '14', 'Kepemilikan aset tidak/belum didukung bukti yang sah', 1),
('7af42f47a7b5a258ada3bce1c1cdcb7d4b5d4ff8', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '15', 'Pengalihan anggaran antar MAK tidak sah', 1),
('f619519f30a3412b692558eb8860b7f19366ca7b', '5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '16', 'Pelampauan pagu anggaran', 1),
('fadb96cdbe7af92f898f323d54abe0fef1f4e507', '3afc446539c280ff0b767a634ec6847cc881e6e6', '01', 'Indikasi tindak pidana korupsi', 1),
('a00aed0e6841acda57ca0f60d0b26d114b482bac', '3afc446539c280ff0b767a634ec6847cc881e6e6', '03', 'Indikasi tindak pidana perpajakan', 1),
('db65051ad04adab88f088da8ba0fbad5a1f150e5', '3afc446539c280ff0b767a634ec6847cc881e6e6', '04', 'Indikasi tindak pidana kepabeanan', 1),
('91f061471e7a8415bd4aad5b1dcdc9259d1545d6', '3afc446539c280ff0b767a634ec6847cc881e6e6', '05', 'Indikasi tindak pidana kehutanan', 1),
('f9c6ba8a21e46c75310339e808833ea29092a71b', '3afc446539c280ff0b767a634ec6847cc881e6e6', '06', 'Indikasi tindak pidana pasar modal', 1),
('35c4b5c501f2f825de9f580607b2a76ef253a3e6', '3afc446539c280ff0b767a634ec6847cc881e6e6', '07', 'Indikasi tindak pidana khusus lainnya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_finding_sub_type`
--

CREATE TABLE IF NOT EXISTS `par_finding_sub_type` (
  `sub_type_id` varchar(50) NOT NULL,
  `sub_type_id_type` varchar(50) NOT NULL,
  `sub_type_code` varchar(10) NOT NULL,
  `sub_type_name` varchar(100) NOT NULL,
  `sub_type_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sub_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_finding_sub_type`
--

INSERT INTO `par_finding_sub_type` (`sub_type_id`, `sub_type_id_type`, `sub_type_code`, `sub_type_name`, `sub_type_del_st`) VALUES
('e950a0afcb65d466058c5ee19e5adb0646c9769f', '764275e74b69abcec96c2ac76140f7da774249f7', '01', 'Kerugian negara/daerah atau kerugian negara/daerah yang terjadi pada perusahaan milik negara/daerah', 1),
('5c6ae8397e1953e1a2f524bfb8ed95f1d18fb9e2', '764275e74b69abcec96c2ac76140f7da774249f7', '04', 'Administrasi', 1),
('34e821421283c122b2a7105914b5ee6971b7dcfb', '764275e74b69abcec96c2ac76140f7da774249f7', '02', 'Potensi kerugian negara/daerah atau kerugian negara/daerah yang terjadi pada perusahaan milik negara', 1),
('10f3ef2b5e13c9e2662166c432ebc5de8195c1a6', '764275e74b69abcec96c2ac76140f7da774249f7', '03', 'Kekurangan penerimaan negara/daerah atau perusahaan milik negara/daerah', 1),
('3afc446539c280ff0b767a634ec6847cc881e6e6', '764275e74b69abcec96c2ac76140f7da774249f7', '05', 'Indikasi tindak pidana', 1),
('6800e36ea2ac83657c02127de8ca71908072d7cf', 'dc06264262364cb2318c3282ed7590b1aa45b779', '01', 'Kelemahan sistem pengendalian akuntansi dan pelaporan', 1),
('231b6954045f49c0738fdc9e4c09ed7935ad5d2a', 'dc06264262364cb2318c3282ed7590b1aa45b779', '02', 'Kelemahan sistem pengendalian pelaksanaan anggaran pendapatan dan belanja', 1),
('5fc2e1b11a90ff3880f999070d7b7b43bcac0e68', 'dc06264262364cb2318c3282ed7590b1aa45b779', '03', 'Kelemahan struktur pengendalian intern', 1),
('02cc05566a58319721f5a112b924ae83f863b6bd', 'f307316cfcfebc20fefa473768679afbf39a1de6', '01', 'Ketidakhematan/pemborosan/ketidakekonomisan', 1),
('704863370a5444d29b9cb88e6bfbabc74572b074', 'f307316cfcfebc20fefa473768679afbf39a1de6', '02', 'Ketidakefisienan', 1),
('1c4fa91c754e6a03ab4c67012c9eea27308768e6', 'f307316cfcfebc20fefa473768679afbf39a1de6', '03', 'Ketidakefektifan', 0),
('7f37bdf63c975f80440a7016b87c5f03a2ff182a', 'dc06264262364cb2318c3282ed7590b1aa45b779', '2.01.00', 'Kelemahan sistem pengendalian akuntansi dan pelaporan', 0),
('e666e724f78eb1044639a0c4c6c1c5e69a9bdf35', 'dc06264262364cb2318c3282ed7590b1aa45b779', '2.02.00', 'Kelemahan sistem pengendalian pelaksanaan anggaran pendapatan dan belanja', 0),
('6d3b61d0e2573b317500ae3e35bc8d0e13504775', 'dc06264262364cb2318c3282ed7590b1aa45b779', '2.03.00', 'Kelemahan struktur pengendalian intern', 0),
('437930e8325599b5a5fd0557fc008e0cf477c0db', 'f307316cfcfebc20fefa473768679afbf39a1de6', '3.01.00', 'Ketidakhematan/pemborosan/ketidakekonomisan', 0),
('bf26d1d16ed88aa43268f3719220f5af2e6d46c2', 'f307316cfcfebc20fefa473768679afbf39a1de6', '3.02.00', 'Ketidakefisienan', 0),
('68e993038e99e777e1ed37c06a1b0bb41fba54a7', 'f307316cfcfebc20fefa473768679afbf39a1de6', '3.03.00', 'Ketidakefektifan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_finding_type`
--

CREATE TABLE IF NOT EXISTS `par_finding_type` (
  `finding_type_id` varchar(50) NOT NULL,
  `finding_type_code` varchar(10) NOT NULL,
  `finding_type_name` varchar(255) NOT NULL,
  `finding_type_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hapus 1=aktif',
  PRIMARY KEY (`finding_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_finding_type`
--

INSERT INTO `par_finding_type` (`finding_type_id`, `finding_type_code`, `finding_type_name`, `finding_type_del_st`) VALUES
('764275e74b69abcec96c2ac76140f7da774249f7', '1', 'Temuan Ketidakpatuhan Terhadap Peraturan', 1),
('dc06264262364cb2318c3282ed7590b1aa45b779', '2', 'Temuan Kelemahan Sistem Pengendalian Internal', 1),
('f307316cfcfebc20fefa473768679afbf39a1de6', '3', 'Temuan 3E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_gambar`
--

CREATE TABLE IF NOT EXISTS `par_gambar` (
  `gambar_id` varchar(50) NOT NULL,
  `gambar_name` varchar(255) NOT NULL,
  `gambar_sort` int(11) DEFAULT '0',
  PRIMARY KEY (`gambar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_gambar`
--

INSERT INTO `par_gambar` (`gambar_id`, `gambar_name`, `gambar_sort`) VALUES
('25403922f21dbc132c80e3a1c539f53244f13ad9', 'slide_1.jpg', 1),
('464c7291307dc88615918a92509bb668e94e03ec', 'slide_3.jpg', 3),
('c0d7eb2e9ff0dafff87c2a1a0e5faca7c4e40583', 'slide_2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `par_group`
--

CREATE TABLE IF NOT EXISTS `par_group` (
  `group_id` varchar(50) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=del 1=aktif',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_group`
--

INSERT INTO `par_group` (`group_id`, `group_name`, `group_del_st`) VALUES
('a38c99db8e8777d33b3b358d59a47ae1a0c69d66', 'Vendor', 1),
('5d3b02abc8c1e0d4d4f7ee3c0c59f09f4ea93f01', 'Risk Owner', 0),
('c220d2e970d8aad6283c45613cce8ed8000df21e', 'Risk Officer', 0),
('0d1db90fabf192910f354e351dc27fd7f37fb041', 'Eksternal', 0),
('ff6c97274745bf929be5d651849c64d7ca1b405d', 'Staf Perencanaan', 0),
('7090cfd596225052fed383a3332fcc8dc72ba918', 'Bagian Program dan Evaluasi', 0),
('98ab4eb2262a169acc9716882a6cac9d0a07e6f3', 'Anggota Tim', 1),
('c64ab15f3c09ce0faf0e07ac527be323ce985814', 'Pengendali Mutu', 1),
('24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', 'Pengendali Teknis', 1),
('3c4b7c1ac41e48962a837470d96af3ca244113ba', 'Ketua Tim', 1),
('c70d9b7dbcf26781bab4d7a3198e5a6ab59ca3fb', 'Bagian Keuangan dan Umum', 0),
('b646f7e15fc0ca85b3a3fe54c19017a0e933ef82', 'urip', 0),
('4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', 'Inspektur', 1),
('4e7cdfdb2fb5f5b7f731eec2b2729dd912a6dbfa', 'Bagian Kepegawaian', 0),
('036b0642d7c660cd501fb07e1e33ec0bdd157534', 'Subbag Tata Usaha', 0),
('dd05ae3db0b445fd8fe9d9341a8ad3a4f41b1d43', 'Bagian SIP', 0),
('ec6e2d83c28a096bd4b75df1e1d463bcdf6dbe8e', 'Kabag Bagian Program', 0),
('12d8d424f7b5b2cdc7e5f1fec41ca54e365eca66', 'Sekretaris Inspektorat Jenderal', 0),
('25a0bc88a8aca130913d7b35facf9e3505bf12af', 'Auditee/Satker', 1),
('ff3001440765012943005a753dc98f0a5f719fac', 'Dalnis', 0),
('89040349e3c536d0c658ffa35faef5d50f99f004', 'Daltu', 0),
('1b188e0bb4d2c1d18203fdaedd54e75e411203e0', 'Kepala Badan', 1),
('46e8d25b481a17e5fe2ac046b4c734fd27d3491b', 'Admin Aplikasi', 1),
('54761cd47bcf8aa444992be09a15151d2e070260', 'Sub Bagian Tata Usaha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_holiday`
--

CREATE TABLE IF NOT EXISTS `par_holiday` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday_date` int(11) NOT NULL,
  `holiday_desc` varchar(100) NOT NULL,
  `holiday_st` tinyint(1) NOT NULL COMMENT '1=weekdays',
  PRIMARY KEY (`holiday_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `par_holiday`
--

INSERT INTO `par_holiday` (`holiday_id`, `holiday_date`, `holiday_desc`, `holiday_st`) VALUES
(1, 1483768800, '', 2),
(2, 1483855200, '', 2),
(3, 1484373600, '', 2),
(4, 1484460000, '', 2),
(5, 1484978400, '', 2),
(6, 1485064800, '', 2),
(7, 1485583200, '', 2),
(8, 1485669600, '', 2),
(9, 1486188000, '', 2),
(10, 1486274400, '', 2),
(11, 1486792800, '', 2),
(12, 1486879200, '', 2),
(13, 1487397600, '', 2),
(14, 1487484000, '', 2),
(15, 1488002400, '', 2),
(16, 1488088800, '', 2),
(17, 1488607200, '', 2),
(18, 1488693600, '', 2),
(19, 1489212000, '', 2),
(20, 1489298400, '', 2),
(21, 1489813200, '', 2),
(22, 1489899600, '', 2),
(23, 1490418000, '', 2),
(24, 1490504400, '', 2),
(25, 1491022800, '', 2),
(26, 1491109200, '', 2),
(27, 1491627600, '', 2),
(28, 1491714000, '', 2),
(29, 1492232400, '', 2),
(30, 1492318800, '', 2),
(31, 1492837200, '', 2),
(32, 1492923600, '', 2),
(33, 1493442000, '', 2),
(34, 1493528400, '', 2),
(35, 1494046800, '', 2),
(36, 1494133200, '', 2),
(37, 1494651600, '', 2),
(38, 1494738000, '', 2),
(39, 1495256400, '', 2),
(40, 1495342800, '', 2),
(41, 1495861200, '', 2),
(42, 1495947600, '', 2),
(43, 1496466000, '', 2),
(44, 1496552400, '', 2),
(45, 1497070800, '', 2),
(46, 1497157200, '', 2),
(47, 1497675600, '', 2),
(48, 1497762000, '', 2),
(49, 1498280400, '', 2),
(50, 1498366800, '', 2),
(51, 1498885200, '', 2),
(52, 1498971600, '', 2),
(53, 1499490000, '', 2),
(54, 1499576400, '', 2),
(55, 1500094800, '', 2),
(56, 1500181200, '', 2),
(57, 1500699600, '', 2),
(58, 1500786000, '', 2),
(59, 1501304400, '', 2),
(60, 1501390800, '', 2),
(61, 1501909200, '', 2),
(62, 1501995600, '', 2),
(63, 1502514000, '', 2),
(64, 1502600400, '', 2),
(65, 1503118800, '', 2),
(66, 1503205200, '', 2),
(67, 1503723600, '', 2),
(68, 1503810000, '', 2),
(69, 1504328400, '', 2),
(70, 1504414800, '', 2),
(71, 1504933200, '', 2),
(72, 1505019600, '', 2),
(73, 1505538000, '', 2),
(74, 1505624400, '', 2),
(75, 1506142800, '', 2),
(76, 1506229200, '', 2),
(77, 1506747600, '', 2),
(78, 1506834000, '', 2),
(79, 1507352400, '', 2),
(80, 1507438800, '', 2),
(81, 1507957200, '', 2),
(82, 1508043600, '', 2),
(83, 1508562000, '', 2),
(84, 1508648400, '', 2),
(85, 1509166800, '', 2),
(86, 1509253200, '', 2),
(87, 1509771600, '', 2),
(88, 1509858000, '', 2),
(89, 1510380000, '', 2),
(90, 1510466400, '', 2),
(91, 1510984800, '', 2),
(92, 1511071200, '', 2),
(93, 1511589600, '', 2),
(94, 1511676000, '', 2),
(95, 1512194400, '', 2),
(96, 1512280800, '', 2),
(97, 1512799200, '', 2),
(98, 1512885600, '', 2),
(99, 1513404000, '', 2),
(100, 1513490400, '', 2),
(101, 1514008800, '', 2),
(102, 1514095200, '', 2),
(103, 1514613600, '', 2),
(104, 1514700000, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `par_inspektorat`
--

CREATE TABLE IF NOT EXISTS `par_inspektorat` (
  `inspektorat_id` varchar(50) NOT NULL,
  `inspektorat_name` varchar(100) NOT NULL,
  `inspektorat_del_st` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`inspektorat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_inspektorat`
--

INSERT INTO `par_inspektorat` (`inspektorat_id`, `inspektorat_name`, `inspektorat_del_st`) VALUES
('f7d66dce0a6697a089ec835f1a724d20bba955cd', 'Inspektorat V', 1),
('71901349bb3fac3edc6887c3d5c3676ca5f954ad', 'Inspektorat IV', 1),
('3b0761f74ec705e9b72ea6053e3930a3c8294ef4', 'Inspektorat III', 1),
('2b2d9dad563c8b6a800cfc47579c6fa0928ef8b9', 'Inspektorat II', 1),
('3d76fa9f0bb3d72f33d775fbd4529f44031c824e', 'Inspektorat I', 1),
('22d73ea85e0e84ddeecf422ddbcfc18d2c699b94', 'Inspektur Jenderal', 1),
('b1f4e8296cb0dc37aa322c3b0e2802417b7e155b', 'Sekretariat Inspektorat Jenderal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_jabatan_pic`
--

CREATE TABLE IF NOT EXISTS `par_jabatan_pic` (
  `jabatan_pic_id` varchar(50) NOT NULL,
  `jabatan_pic_name` varchar(100) NOT NULL,
  `jabatan_pic_sort` tinyint(2) NOT NULL DEFAULT '0',
  `jabatan_pic_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`jabatan_pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_jabatan_pic`
--

INSERT INTO `par_jabatan_pic` (`jabatan_pic_id`, `jabatan_pic_name`, `jabatan_pic_sort`, `jabatan_pic_del_st`) VALUES
('9421e13da30429a45223757136ba2d93e3c73322', 'Direktur Jenderal', 1, 1),
('86d89c27651df2f6b160093241509f735758da18', 'Sekretaris Jenderal', 1, 1),
('2fb98b3bd76ce53d08d153458515263972dfd638', 'Ketua', 3, 1),
('41ba4351c57dd73ab7e2eae9e4ba2a693c176788', 'Kepala Biro', 4, 1),
('19053177aec2e17387ff7fb76ba70d77cfbdb64a', 'Kepala Bagian', 5, 1),
('cace1a6ca808ed8ee1f6339cb9ebd5e2af3b4a63', 'Kepala Bidang', 6, 1),
('4f090fb7de6f0a696548c3c9296ffcadd2bac2f6', 'Kepala Badan', 1, 1),
('4b7de7c9c587d2c0200d5363b58ea4ea13d972b1', 'Kepala Sekretariat', 2, 1),
('3beda7c76816017b24089b487db64677055a5e7c', 'Kepala Pusat', 2, 1),
('36b9d137b5622b1975da56ebf850a5bd12962320', 'Sekretris Ditjen', 2, 1),
('33eb43af4c4b83b51ea7d0be3b8451c020f68cf5', 'Kepala Balai', 2, 1),
('30122bd46427250f4e01724098f84b080fff40a0', 'Kepala Sub Direktorat', 3, 1),
('0679748e3ffeb00f810c3b4a20907bbbfe6797d0', 'Kepala Satker', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_jenis_jabatan`
--

CREATE TABLE IF NOT EXISTS `par_jenis_jabatan` (
  `jenis_jabatan_id` varchar(50) NOT NULL,
  `jenis_jabatan` varchar(10) NOT NULL,
  `jenis_jabatan_sub` varchar(50) NOT NULL,
  `jenis_jabatan_sort` int(11) NOT NULL,
  `jenis_jabatan_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`jenis_jabatan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_jenis_jabatan`
--

INSERT INTO `par_jenis_jabatan` (`jenis_jabatan_id`, `jenis_jabatan`, `jenis_jabatan_sub`, `jenis_jabatan_sort`, `jenis_jabatan_del_st`) VALUES
('c3421e504177579e8f6bf9de290da00dab1b4a35', 'Struktural', 'Kepala Bagian', 2, 1),
('ca4d3c424bd05544c7a145bd2af6cef0a08e92e4', 'Struktural', 'Inspektur', 1, 1),
('23ddda7bef0263d7f67c7b1296c11168e72d7555', 'Struktural', 'Inspektur Jenderal', 1, 0),
('ac0f7970492000d14b9d4ae01ef588083663e6d7', 'Fungsional', 'Auditor Utama', 4, 1),
('b9610baa4575c677951c04e0050ac0e9a5676594', 'Fungsional', 'Auditor Muda', 6, 1),
('1fd86fc0cde73981d66fa6642020f8ed8be256b4', 'Fungsional', 'Auditor Pertama', 7, 1),
('f391ea222c911367026231dc975c10d4f09f9bce', 'Fungsional', 'Auditor Penyelia', 5, 1),
('d0f4aa0437d8e3360b2faa99abe83c18f8d72c19', 'Struktural', 'Sekretaris Inspektorat Jenderal', 2, 0),
('142eda73208917765e2bd4c8357e86fbeb00390d', 'Struktural', 'Kepala Subbagian', 3, 1),
('b4dc6bbf8c6786337c430a9dba3557ab75fd5cca', 'Struktural', 'Staf', 10, 1),
('77e5755edba4cbf18d9040f222310a853f4388d8', 'Fungsional', 'Auditor Madya', 5, 1),
('425226edf283c7bac5cbefe0bbfe092e17840de6', 'Fungsional', 'Auditor Pelaksana Lanjutan', 6, 1),
('2f19c5284f462170036bddacd2d8b7ef5831b214', 'Fungsional', 'Auditor Pelaksana', 7, 1),
('fa8abbcc16ba9aef09fc10070a2329adbc422fb2', 'Fungsional', 'Calon Auditor', 8, 1),
('b812bd86c1fc322e746064da828c71981fe8fbae', 'Struktural', 'Kepala Satker', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `par_kabupaten`
--

CREATE TABLE IF NOT EXISTS `par_kabupaten` (
  `kabupaten_id` varchar(50) NOT NULL,
  `kabupaten_id_prov` varchar(50) NOT NULL,
  `kabupaten_name` varchar(100) NOT NULL,
  `kabupaten_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kabupaten_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_kabupaten`
--

INSERT INTO `par_kabupaten` (`kabupaten_id`, `kabupaten_id_prov`, `kabupaten_name`, `kabupaten_del_st`) VALUES
('768979fec4eaac076f47ea1ae4724be5d56d7cd3', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Tamiang', 1),
('5026b574bab8e5fe5220c64d0aa87ca200dcedd8', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Tenggara', 1),
('e44c192393e327ec1ea3afd1066dd5e095314556', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Bireun', 1),
('0c03e4b8ee8c2b450d043c082778510a8c6893cc', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Utara', 1),
('e4512ac29103f5fbefcc5501d5fb24eae6d5fbe8', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Timur', 1),
('d04f57c46bc68e45c519eff63af2cd3653cda55d', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Barat Daya', 1),
('a90381c2ac2fbaabefb2abf18d2cd5e1c141d971', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Sabang', 1),
('589d260cc09c2b39ca48c3c6912db22f1f6a48aa', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Langkat', 1),
('41f91146873f89e7cac416fe3b5a433436c8cc05', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Tapanuli Tengah', 1),
('a5a0aa863b2534f46fa2013a204eaf06ba7aeaba', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Serdang Bedagai', 1),
('580e0503051ec3020fc9c59d6a43438e355fe873', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Batubara', 1),
('19533b6fd43c9f3608509dc8cdb55664a017e250', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Nias Selatan', 1),
('25a77ce38e092d184194e2c5f3aaea9f11b9d28f', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Simalungun', 1),
('6c9d42f7de3e866b04701f165695dbacbf13d50d', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Asahan', 1),
('9ee043d5560d8b7c3b33983b1391c5fac85ec90b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Belawan', 1),
('d4c1b67db0228db18eaff35e908f7cc8614b2e1a', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Binjai', 1),
('15d5603665019f85d8931d0920b67a97a082b70c', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Pesisir Selatan', 1),
('a6faa55e85ae26c1c5158cca1ec80462d47dbc3c', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Pasaman Barat', 1),
('56d0a347fcfeeeaa9849cb42e99856c7177e41c0', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Padang Pariaman', 1),
('4506c687c76397855d11f2f5d50245424f7d088c', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Pariaman', 1),
('a5bc65ce1d11b3af66fdbb747dcfd24f7b4c80d9', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Kepulauan Mentawai', 1),
('5e60383bfa654e4b8180c866de25e646542f429a', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Agam', 1),
('6f0c83b8eb8a17d30e93ee56013f03ab0b6b1e5b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Indragiri Hilir', 1),
('4305cfef7d326a49c637a75f6980666acaf48b24', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Kepulauan Meranti', 1),
('0ac1e8bce0528ff9a142906313e31e22bc6cd816', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Kampar', 1),
('21555d7818405c23c5dd734cc1a7cc0324522ef4', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Rokan Hilir', 1),
('3a262f05653e7cffb46e0c18703325e439b4a32a', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Bengkalis', 1),
('640b9dd3aee2d6841b7829fddb86cc2f71c1736a', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Palalawan', 1),
('a29adab2726828c4462d3b842f0a892297425346', 'bc02f4d326c699e711b05bf45925b3652464457a', 'Bintan', 1),
('61567dc4a581d0486ac456cc8e6f722bf7c7c8e6', 'bc02f4d326c699e711b05bf45925b3652464457a', 'Natuna', 1),
('923b61e7df9d117198943e9fa118bb0c8d98d88f', 'bc02f4d326c699e711b05bf45925b3652464457a', 'Lingga', 1),
('c9f88f954d0b71c54b39ed653a6732fde7294c4c', '675eed8a709d4098541fb8f73805004c84725d49', 'Tanjung Jabung Barat', 1),
('d6462aa470bcb6f02851209a9714d2dd9d6ca239', '675eed8a709d4098541fb8f73805004c84725d49', 'Muaro Jambi', 1),
('547a3a6ad51a53ed644507c819791eeefb00b498', '675eed8a709d4098541fb8f73805004c84725d49', 'Kerinci', 1),
('c0d8cd1b0ca720818ad38d5c5ba37081a162f9a6', '675eed8a709d4098541fb8f73805004c84725d49', 'Batanghari', 1),
('db3d4a5851fced2da00bfd5a267c98f26c3aadc9', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Oki', 1),
('d3a17b32dc04e0a70988b691e671e6f196872444', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Musi Banyuasin', 1),
('2ecbcbe65df4843e40f940d6ce9cb9e1ae6f299d', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Musi Rawas', 1),
('47c9fcbddcc4de7acf7085ef81a4579c62232baf', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Belitung', 1),
('a25db1256f76937a9a76953511d249e14d49b01e', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Bangka Tengah', 1),
('1b660f43cb2cdfafab5443eb46d709848dcf3f1f', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Tegal', 1),
('e2211d6c80c547c6e9b4be5436b482c3d57b802a', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Bangka', 1),
('064986209666082863356b4157e7240ae1d3e5a0', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Bangka Selatan', 1),
('4652955a23a5c6bc35f9de8f718954ca819455bb', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', 'Bengkulu Utara', 1),
('a130fcbe33896e76b0babe35838ec1f3d48adf8f', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', 'Kaur', 1),
('0bdda4e5a72b4cc776e34a6257c3e059bda46099', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Lampung Timur', 1),
('b0739520d183403ae4a89c7096db467c1c1cc672', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Tanggamus', 1),
('1a1155a7a26268e512d71083c19a8237509fa5af', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Lampung Barat', 1),
('0efd5a20efd958468a9c47127b811e8747e22e93', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Pesawaran', 1),
('b4b9c55c020de15616e4124618bd25e36e6a1db4', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Mesuji', 1),
('823f7394401156eabe5a61b89bc43b277b14c517', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Tulang Bawang', 1),
('a7b3cdd04a547414565b01d44d344fb17a977d33', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Lampung Selatan', 1),
('44fb8b7e5c106db00b06f13d641bba6ea9533d0b', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Barru', 1),
('1b884a8a633a4fe30cb0099c9c97b85c77253997', '0b486467ca176631589de72c19779fe674f13388', 'Sumedang', 1),
('dc4a1cabacd1059935ccea96e78391d60c8a369e', '0b486467ca176631589de72c19779fe674f13388', 'Karawang', 1),
('5f682328b4887d57cdfe40d7b1358150a6102b74', '0b486467ca176631589de72c19779fe674f13388', 'Bogor', 1),
('2af07e4ab064d0bdf27d8a246eed72ae3b935e80', '0b486467ca176631589de72c19779fe674f13388', 'Subang', 1),
('68778d6ad9e35d1cf62582b71e23f70462da5171', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Tanjung Balai', 1),
('6739a66ce91850bae5f1baf4a6ad7ae1f6075f26', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Padang', 1),
('4e99d9b15a57cb77bfe5701803b57dd3ca46885e', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'Jakarta Utara', 1),
('b788c1d6c3d5f74210de83832a4fdad532511d8b', '0b486467ca176631589de72c19779fe674f13388', 'Tasikmalaya', 1),
('5c8a0922bfd86b6f39f1173a5cc4bcfd573c863c', '0b486467ca176631589de72c19779fe674f13388', 'Ciamis (banjar)', 1),
('68b0618a981c3ebd3fabcdac99c0d2341611d9de', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Serang', 1),
('f83937d12a066e2151e46cd6a41a8179dad50153', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Pandeglang', 1),
('9f34285f17286bf6eeb802eb5b2e54ec4461f306', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Lebak', 1),
('eb310cbe50c6b2676eb9a37a1f73aeadb9f17d93', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Medan', 1),
('3dd14a28cc112182374c612cec798325cc564da6', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Jepara', 1),
('8cb57f27219c358ae8ddf522f9d01f833f295b6f', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Banyumas', 1),
('5aba4fb223dae55105d598b2836d680da75246a4', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Cilacap', 1),
('51195dd4c9e2181d48465d5c03b3e10401bd1c74', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Purbalingga', 1),
('78609a372cd11c380d4c2f4080c886eb6b84710b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Boyolali', 1),
('47e4c0d137e46f5e8c628b308ac4d05e5cdc461b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Wonogiri', 1),
('96c03650ad7eb4fb781254643598338f9d51c203', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Kebumen', 1),
('229f1c578dda332c5ef5f9a52b650bc088ccb800', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Kendal', 1),
('39b0cb354b587ce8a62726f034170cbdf9647eb5', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Pemalang', 1),
('631888f1e648aac40d515e63b8852ce1e278ca3a', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'Bantul', 1),
('dc5fb86daf2eca6f8054441b38a433fb555254f4', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'Sleman', 1),
('0e78f7408f00fadf6d7eb68f40395e6575458d03', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'Gunung Kidul', 1),
('84ad70a33e5d2717ff9fb6124ad3a2f3d4400915', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'Kulon Progo', 1),
('282027c71f277db5f9f7c2df862b6ba670b61b72', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Banyuwangi', 1),
('35075dee0755cc4d184b2a961730144c6ca7a8a1', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Pasuruan', 1),
('bcf8a5bb57255a67d187ed5ee19c8dde9aa077d5', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Blitar', 1),
('a3c5da5c342eeb1d5573b7ed7271ee38bf448a82', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Pacitan', 1),
('1ad86e9840a27ae0aca5d8d6ec30a8bfbe4eb3a5', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Gresik', 1),
('4fed488e6f61de9c9d6d540f263e675ca89d9a44', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Sidoarjo', 1),
('3d7c394ae564df7adca3c184b27dc1493c7c2f27', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Sumenep', 1),
('582be6220adeba3ca391a2faeadcb429ffaf0c09', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Bondowoso', 1),
('893612e13f146d5dec1769659625ac2b97b265dc', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Malang', 1),
('9757835a4208235c42e449cd57e5135eaecd6fdd', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Tulung Agung', 1),
('b215bce498ead7f8932154f4c65f63996db492f1', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Trenggalek', 1),
('11403fc113f15f64da93f91271928b8a0b2fca0b', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Madiun', 1),
('63447ff62118ebe4b797314ae4fbc04547fc755f', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Ngawi', 1),
('c5ea57743277a627116d2949cdf62c71b60872ec', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Bojonegoro', 1),
('7021711f66941d82bff24dd90d1a8f7401020c74', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Lamongan', 1),
('998319805b608680b906818813c9068cebd9d6dc', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Mojokerto', 1),
('1aeda9001a0b0efe57cc990d08c21532dcce59ab', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Sampang', 1),
('c92f9d8ee3694bebb4052541a3054c421e86d510', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Pamekasan', 1),
('ab70b3c9b108b88b6dc07f5aa516ec9eef66d414', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Sibolga', 1),
('0ffb715918d33c31c5b241fe8724785c188b877f', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Bangkalan', 1),
('442ad5c7bb776fc39e39ba953e23e6dbdcba37ad', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Probolinggo', 1),
('fbaf2aabdad611593dc2b30b8cf09f771b7d3141', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Tuban', 1),
('aba9568fcbffc2b28ffcbac78670789e9ecdf9c2', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Situbondo', 1),
('4a1e06d83cc32deed10864d78f75800f35753816', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Nganjuk', 1),
('d5c903e1c582950da75a54e491e5d6b1aa1786b6', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Jember', 1),
('108ef481f534515b736ec6dd9ee92ba8434bfda0', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Jombang', 1),
('f375333acf1442988c1dcd377255099c57316d34', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Lumajang', 1),
('a49f6724a0455fd3996acd5df46b560b40af5a08', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Buleleng', 1),
('b0e70a8c4fcc25fe391827127a7f39932672a861', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Jembrana', 1),
('568ba72e9dbde5f0755adef8a29e8f656b9a77b0', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Klungkung', 1),
('85e468a61fea4705936c350de6550e9f34178c49', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Bangli', 1),
('7d3199b703d7e072099cc7b4c62f98a53ff2f8ba', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Tabanan', 1),
('d8187cf2daab4d818731a906250dc4c87cc5e409', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Karangasem', 1),
('e54e01d2382ed35b08d30a10ff586ed8ade364de', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Badung', 1),
('244d62c59fb427bff7e769ac05df7db3f558b835', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Lombok Barat', 1),
('83053e9b75b804cd6013d93ec5dee7e8bd2f1da3', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Sumbawa', 1),
('91ce4d9eff8135242934cdb14605905c087e405e', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Sumbawa Barat', 1),
('efc2dae8eb1324b9097ff48d99c59cf7d30a220c', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Lombok Tengah', 1),
('a7d96c73586877978f51ab6232da13fe81d38edf', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Timor Tengah Selatan', 1),
('6d2b356d61ca3fcd929354c3efb64f3e2c6aa271', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Sikka', 1),
('121dafc847f62af9bba85a5843e35b9689667eb2', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Flores Timur', 1),
('d88cfce9e7ec4281eaab61c3448105b228cd093d', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Sumba Timur', 1),
('eccdaffc677d841c2ad263ac20d6fa5857415396', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Kupang', 1),
('a12f1d1cade35884f5f9acdde460a24979230080', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Timor Tengah Utara', 1),
('e78265b76155776593f5da65d1b23e35ee32b76e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Ende', 1),
('bea0c22885daa21aa5b9d99a88d050f3df08b0e4', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Manggarai', 1),
('0a347fec9300cf0f64e8c7335364efa46491b34e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Manggarai Barat', 1),
('60d4877001944ce35f4f8a499e18b308977c069a', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Lembata', 1),
('1fa9f5ad90a970de7e8bfbb8892c6ec6d6ac92da', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Nagekeo', 1),
('fffc00bc924f84fc043aa10c373bdc6211ad8697', '499db371dac2489052cf151f8e861ac9d9172df7', 'Ketapang', 1),
('084015cbf85fddd865122c3410d07c2f8d512f67', '499db371dac2489052cf151f8e861ac9d9172df7', 'Kubu Raya', 1),
('1aabb3512a79bc3c047c4fb032126884bd1f88d1', '499db371dac2489052cf151f8e861ac9d9172df7', 'Pontianak', 1),
('925a311b964d3f99e5567ac71c2ecd4622a11010', '499db371dac2489052cf151f8e861ac9d9172df7', 'Kapuas Hulu', 1),
('9ebeda420c01ee2723901176f8b7720be5845873', '499db371dac2489052cf151f8e861ac9d9172df7', 'Bengkayang', 1),
('a117a252776ab0f76fa56030f9daae43461e9149', '499db371dac2489052cf151f8e861ac9d9172df7', 'Sambas', 1),
('0886d683c7ede941d7c08ded605156365d76ef45', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Penajem Paser Utara', 1),
('77259f6aad26fb14ed23301b88b0d3d6a612b242', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Tarakan', 1),
('91a26a01c082dfb9478de5eee755c0c267a5d41f', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Berau', 1),
('ac2a0073361c70ca54dd21b9f527b384c33e5b87', '175f37cdb244988462e7946a62f190f8bcd3c048', 'Kapuas', 1),
('e247e96758cf1d643393b5e376fb4b535bc416e7', '175f37cdb244988462e7946a62f190f8bcd3c048', 'Kotawaringin Barat', 1),
('2746756a841c81568f035d96cc2c99bfdc0f7231', '175f37cdb244988462e7946a62f190f8bcd3c048', 'Seruyan', 1),
('c375d33eef61954d3fe252532aeb8cfbbf5ef099', '175f37cdb244988462e7946a62f190f8bcd3c048', 'Barito Selatan', 1),
('07dd7eaed659f6c955d2aa626f2e26925db1af98', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Barito Kuala', 1),
('202fd3d93ec62446c550a541b7017d717f0b4d8f', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Tabalong', 1),
('7d37ae4035ec9334d20f4f86db2b8fc76ae87706', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Tanah Bumbu', 1),
('5cd47b88d75e2c604aa1c8e06370912d79edb15a', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Tanah Laut', 1),
('268ba60feb5ee3700c1c8eed4645ebb93a3f21d0', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Kota Baru', 1),
('0ecf402779abda28028ef38b77f775c17e86836e', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Bolaang Mongondow', 1),
('116477f533f0f77aeb7d5250ac5a660d70f81572', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Minahasa Utara', 1),
('afce5fa5d3c3541a08441a70c3fafe82114c66d7', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Minahasa Tenggara', 1),
('c0b6862237e916685f93f487b1dfbd35d83bcb72', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Bolaang Mongondow Utara', 1),
('67bd6c8944ea4cd516e47c08aa8409cf1b5f2319', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Sangihe', 1),
('85213768f6ec268cd7ec040432a738b223871748', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Kepulauan Talaud', 1),
('04f5bd897d13e6bd86e4dab89d2dddea4ec7cee7', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Minahasa Selatan', 1),
('7db168c8201374b921f8cf01833b386a560a5d51', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Kep. Siau Tagulandang Biaro', 1),
('a5369ad22f0b81671b923378b74c0eb97dc64a9f', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Minahasa', 1),
('08d96c680ffc80e08941b7a9df9b81d5174ddc3e', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'Pohuwato', 1),
('1da800c3b0b3c009ad95bc9018c70ed010196748', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'Gorontalo Utara', 1),
('cbfa6bd4173f0efb045a5bf1c0601e96d4b1d03c', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'Gorontalo', 1),
('42c6242dd929b77419907065fe0e7c127948bacd', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Semarang', 1),
('ef5b1fc2ae69edbfc4f9af88a40c34c28bb0a908', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'Boalemo', 1),
('d3cfd63e134e7a413374554601b4d6c3d2b3e799', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Donggala', 1),
('6d36a35ab8d54a8b35a8ac13f9355b84e4dd45fd', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Toli-toli', 1),
('6d0806fd96d8675880e61a220602ac911b6f6884', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Poso', 1),
('d1fa44804b6f76dd3b1ee46e77f5294070c39f5d', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Banggai', 1),
('8d6311342c16ed2fb6f15c16e52c47760d3a11cc', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Morowali', 1),
('cab6a904f1e370ff114f1853989466d6c66e6a7c', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Tojo Una-una', 1),
('198880a9cd8de959d985e4c26c741185d29f1739', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Parigi Moutong', 1),
('94a645d22634fb701c9c4ef39ec20aef7aa093be', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Pekalongan', 1),
('67e468b03685c3a69630d690eff46df3556044d7', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Buton Utara', 1),
('1da08491d10efc45b95c444385b20163a12d22cb', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Konawe', 1),
('db54e94f030a0bedc56fb29e96320811f819b946', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Buton', 1),
('705581731d6a8dcf57f94b97eedf2cbe5bb2f96b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Konawe Selatan', 1),
('e96fd90b016bf7b3a297b832c0d8cc3f51735401', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Muna', 1),
('c8b6c0fe317207ae044a67ed1212593c79414461', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Wakatobi', 1),
('5774f0434a471b6de14fac7b20c1ac7df5b22943', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Kolaka', 1),
('d0cd06b582876e3dc67555c11e072839148c06e2', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Maros', 1),
('109ea550ec2840ed6d597ec1273886a00c5772f3', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Luwu', 1),
('cd6ffa80148284c4fda6af8e4fd0f8a744a2b385', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Sinjai', 1),
('255acb04ea7198ddd1d0db6e873422284ed50d9e', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Jeneponto', 1),
('f0260726be07d7efcb40392bfec96ba228334dce', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Lubuk Linggau', 1),
('c9884f9aa3dfbabbaeaabc8e64b7324426227dc6', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Pangkajene Kepulauan', 1),
('f16418f11cca55744ff812de39bf1bec67649860', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Enrekang', 1),
('66f3e0bede64afb010abc0178d3885dd1499ca31', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Takalar', 1),
('9c075d4c15763620c1eb4f43fa54d5499e6d2f58', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Sidrap', 1),
('b0ca629f5c94866a059357b61a258d9aaa06f4a6', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Pinrang', 1),
('2518b02710dd68dc9f20fc70c0e5aa5f4933fe68', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Luwu Utara', 1),
('976f3c24e4ee8a5af7649b670c7edcd29c601cab', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Bulukumba', 1),
('696ddf5e7e0a5c9559244b5a899a1e6be66a8da3', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Luwu Timur', 1),
('55b350aa23b4d423bca420b978cb24f938131ee7', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Bone', 1),
('4bd41c533c9ec9599964aeb2efd03df357b14c1f', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Gowa', 1),
('44dfa04f59ce7b45c9562e1e9fe0a1dfd47eaf0c', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'Mamuju', 1),
('293c10035025716c04f7cf49f2b4382bb9f2b6d5', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'Polewali Mandar', 1),
('a06e899d14482893ff05fda1d8d2efcf37a23fab', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'Majene', 1),
('0b4ac0f6b58dd7dc3a876a296edb080334981ab0', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'Mamuju Utara', 1),
('facb1ca8d3637b3474f36f9d2e291df8d24dc467', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Agung Lampung', 1),
('bbbf3defbcd5216b033bf6c858ecbb02160c1282', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Seram Bagian Barat', 1),
('baa49f9f67a1209bfbb8b82bfd38c0ee1cf347df', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Maluku Tengah', 1),
('e0e2a38350a30940d826d314a3615ea045bb0c16', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Maluku Tenggara', 1),
('e74a5b3709c9cc11f2fdc6f287f0251ba91bcb8f', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Kepulauan Aru', 1),
('76d291d5d0d9498f26b37cea62e6cccd8ab2b7ca', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Palembang', 1),
('6ef65939ee4227ceb9deacc46e4ede7c505d51a6', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Maluku Barat Daya', 1),
('a2e62a45a351c6f19c57774a0fa2797d88f2dff0', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'Halmahera Selatan', 1),
('5f806ad90ec6f387331a6acc165552d31e60438d', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'Kepulauan Sula', 1),
('5bcf85d53123e51694d9d41337cd711494e133bf', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'Halmahera Barat', 1),
('7f668a7e586ddb3dfc7f3c1c1a910e64e2678eef', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'Halmahera Timur', 1),
('2f7213969ebc204549de951476383cc00bb42acd', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'Pulau Morotai', 1),
('94c2d31cd68b5114e213dde4637dbcf014358e30', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Teluk Wondama', 1),
('fca822ea88ce14f8a2456244cc1f35447c7539e5', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Biak Numfor', 1),
('0bc555628bee2f79ef756c3f319c7e7b10d13010', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Merauke', 1),
('3e189576afe30da8c39f0ea3e6fb3f5627c8ab74', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Jayapura', 1),
('36f383ee1dd094a430f2b856a793438c7c3962a7', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Mimika', 1),
('d767319e6c7ed3bdb7d7a4beb34d0456e6010e10', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Mappi', 1),
('10b546b7fa9c17ef18a6616e94a1f50a9113b579', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'Raja Ampat', 1),
('b83d059734e7478d94c1336dc5013eb863c52052', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'Manokwari', 1),
('4a083e19ba8c23791a6b4544c617a41c3db2cd86', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'Sorong', 1),
('7c68e582ef9cc3f1c4572c5d6acbcc5f8b150e79', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Bandar Lampung', 1),
('1e4c48250dfcb2f3fdfee859126a21370aa6726a', '0b486467ca176631589de72c19779fe674f13388', 'Cianjur', 1),
('6ef7e133549ab39140abe6fc0e7cac29ccafe0c4', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Kediri', 1),
('5414f487020b08b2a970edfdf540d5a13ccfb244', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Bantaeng', 1),
('4f7673cbcd56748146807f844b656af9644d40bf', 'd8c82bf22dd5b689e806f6e381dd3ad459e7485c', 'Bengkulu', 1),
('c886bc7f80479e83d983da27e59f6b277098bbb5', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Selayar', 1),
('d8e0c5335e2c61b328e263770b7cfc7d712a3f00', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Gianyar', 1),
('16eb985d0c4af447fd097ebe70e0f56098b196fb', '0b486467ca176631589de72c19779fe674f13388', 'Bandung', 1),
('4fb2ead5ebcf2b51db8348c0628969ee6e825901', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Pangkal Pinang', 1),
('f7d40803e8ea0e8dfdefb2b409d580404c10bad7', '0b486467ca176631589de72c19779fe674f13388', 'Purwakarta', 1),
('954384a0673088eaf6ef21153e46f88727ac0d15', '0b486467ca176631589de72c19779fe674f13388', 'Garut', 1),
('e929431491b74a14008b89735021f8f4e29d385a', 'bc02f4d326c699e711b05bf45925b3652464457a', 'Batam', 1),
('79671e078b4c0473cb3f218342dd22ae08e06b28', '675eed8a709d4098541fb8f73805004c84725d49', 'Jambi', 1),
('c5afdee5964616e452d524adfb0fdff2fc629874', '0b486467ca176631589de72c19779fe674f13388', 'Ciamis', 1),
('5952e219566c02168b02114a2f01062c041dd48c', '0b486467ca176631589de72c19779fe674f13388', 'Indramayu', 1),
('311d4c6d5b3651a15bc6aa6f9b88555eba5ab5f4', '0b486467ca176631589de72c19779fe674f13388', 'Majalengka', 1),
('7ab23ed9061e5235537a87e813f427f5bc641a37', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Banda Aceh', 1),
('5f2c10f257725b7a469048e6ca9d1b6deb6b73a1', '0b486467ca176631589de72c19779fe674f13388', 'Kuningan', 1),
('6ebdd928efda30b5ab2f703193d5cb0f3162e84f', '0b486467ca176631589de72c19779fe674f13388', 'Banjar', 1),
('907f9fc0da313dd9323556f78c93f2eb3ba3b776', '0b486467ca176631589de72c19779fe674f13388', 'Bekasi', 1),
('63add612f7390a2666b9732fcda23cadb1b3f1b6', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Aceh Besar', 1),
('edbabf7a709a4ed80c6678f6714782904641be11', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Nias Utara', 1),
('cb23b87f8d873c66dc6c381fee089903ba23f9df', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Yapen Waropen', 1),
('9163eb393abe7906aad765a2b10d4760962a5eff', '0b486467ca176631589de72c19779fe674f13388', 'Pangandaran', 1),
('828f85f9b2301a70d3298e044fc1e35349733622', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Tangerang', 1),
('e547bcf4cae0ebe72a0deaa3cd524d9932972e0e', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'Kaimana', 1),
('471b402f7507e855591392d1e36c3697671d0981', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Surakarta', 1),
('228bec8dd9fec439a87f3069dcc0c31f3a259660', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Denpasar', 1),
('b3758f3ddc87381d3b254a70fb38351852bf3e52', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Bima', 1),
('84237065ec6a2e5064e5331db90603d72a210d12', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Mataram', 1),
('c9b7aeae468486108636b1e63426c5a88244858e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Ternate', 1),
('574f1b692a66de71c198b693f04612ebb98983ae', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Kupang', 1),
('fddc14a89a1a24b78b1b87376eaebddaf6341b7f', '499db371dac2489052cf151f8e861ac9d9172df7', 'Singkawang', 1),
('02900bbb71566c7a53d5bfbe9835465e5f15b986', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Samarinda', 1),
('2de26d1ada47df2ac0d199042f1f736f5b74c857', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Balikpapan', 1),
('ada36cd2c7ca99abccfd60da9826960a3fc622f8', '175f37cdb244988462e7946a62f190f8bcd3c048', 'Waringin Barat', 1),
('4fda59d2e523ef898a354f4671c3ce6b19a5987b', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Baru', 1),
('69b71095a4f1fadc5941cc695b6b93f77e1f3b4d', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Bitung', 1),
('66a0d4d6889efb40228e10140dbfc1d1b0ef2f3e', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Manado', 1),
('36e9f3c6dbd0dbef1f25fd93ef902d74a42c82c7', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Tomohon', 1),
('b9ce2db479cf9805275549ed1397bb36da9a5f69', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Palu', 1),
('4ecef38c03d777dcc306b703df8319cd8ef26329', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Kendari', 1),
('abcc425b4dce4c5c6c3a42e57df67a332e7275bf', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'Bau-bau', 1),
('fc8041b5359101d7741e6549e2fdf6e93c731cca', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Makassar', 1),
('c15cd01cade7d40c0e95ef37d938a12fccbac87f', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Palopo', 1),
('db7552a82c0668fce1bc121d9a4c0b9cc554d450', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Pare-pare', 1),
('51fcadcaa188f6ace43611645efd71c950ab5c29', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Ambon', 1),
('1ab3ae3aae2d662adabf03699648e1bc50a947c4', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Tual', 1),
('b654ef707650780e7097b42f0e6c1311d2354d19', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Batu', 1),
('de44d1ae25b9258d646a2b9b6b0e558ef9608f6b', '0b486467ca176631589de72c19779fe674f13388', 'Cirebon', 1),
('39411df8b28577d2dd744a88137f9866a52f6fd5', '0b486467ca176631589de72c19779fe674f13388', 'Cimahi', 1),
('a5a1f057a486d998adcf7229c1e3af0c88383d51', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Tangerang Selatan', 1),
('97e98f3a38c4c2943abb479196de0a0164612659', '0b486467ca176631589de72c19779fe674f13388', 'Sukabumi', 1),
('537904160c839faf80dfc07950f509dbd1f5c7c3', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Pematang Siantar', 1),
('edb6dda1c461650d55f84c8260445bd069c85a24', '0b486467ca176631589de72c19779fe674f13388', 'Depok', 1),
('329ca1d8b316f42fa977cfc7aee782917001fc59', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Banjarmasin', 1),
('202ecf2aae824cba4b710850e783d708ba62b795', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'Jakarta Pusat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_kategori_ref`
--

CREATE TABLE IF NOT EXISTS `par_kategori_ref` (
  `kategori_ref_id` varchar(50) NOT NULL,
  `kategori_ref_name` varchar(100) NOT NULL,
  `kategori_ref_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kategori_ref_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_kategori_ref`
--

INSERT INTO `par_kategori_ref` (`kategori_ref_id`, `kategori_ref_name`, `kategori_ref_del_st`) VALUES
('fc506ea499fbc0c48b82e584bdab8f560b103e39', 'Pedoman Kementerian', 0),
('44a30809871b51ca636e55d757d309c6070b8183', 'Pedoman Audit', 1),
('c0c1cf2120d8017e100cc9283bb116e3a294aa7e', 'Pedoman Perudang-undangan', 0),
('2ee418634624573b9c9606b4b158e459e5ec8a0e', 'Prosedur Audit', 1),
('7125197d541916478b4ba7ff30a0517772af6cf2', 'Undang-Undang', 1),
('ed638e2ffcdfe03a75fda6c4f016fa249f10eb74', 'Peraturan Pemerintah', 1),
('3af6e7035b0ae166bfb6407955a7449ff63e4f06', 'Peraturan Menteri', 1),
('7156d40a9a6c3728bf7e9119b370a97c3df7db08', 'Peraturan Presiden', 1),
('4172949868ccda2cd0aac2f914f20885871b6a0a', 'Referensi Manajemen Risiko', 1),
('1b21dcf2eb58e25a1533b9b54774040163bb6f2e', 'Referensi Audit Internal', 1),
('90b77ebdf7a744deec5e0a34b328686c95e3d0c7', 'Referensi Tata Kelola Kepemerintahan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_kode_penyebab`
--

CREATE TABLE IF NOT EXISTS `par_kode_penyebab` (
  `kode_penyebab_id` varchar(50) NOT NULL,
  `kode_penyebab_name` varchar(30) NOT NULL,
  `kode_penyebab_desc` varchar(255) NOT NULL,
  `kode_penyebab_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_penyebab_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_kode_penyebab`
--

INSERT INTO `par_kode_penyebab` (`kode_penyebab_id`, `kode_penyebab_name`, `kode_penyebab_desc`, `kode_penyebab_del_st`) VALUES
('38b6aee675415c0f01db1bf931af3fd3b4c978df', '123456789', 'lemahnya pengendalian intern', 0),
('a3e829db763976063f2f84d10b6a95686359d2cc', '01', 'Temuan PBJ', 1),
('eb1d12f6fe6e66fcdd5a3ffc16c3a5a2de6af316', '02', 'Temuan Kinerja', 1),
('ffb74806249397f2c0a9628bc0a059974a63314c', '03', 'Operasional', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_kode_rekomendasi`
--

CREATE TABLE IF NOT EXISTS `par_kode_rekomendasi` (
  `kode_rek_id` varchar(50) NOT NULL,
  `kode_rek_code` varchar(10) NOT NULL,
  `kode_rek_desc` varchar(100) NOT NULL,
  `kode_rek_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_rek_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_kode_rekomendasi`
--

INSERT INTO `par_kode_rekomendasi` (`kode_rek_id`, `kode_rek_code`, `kode_rek_desc`, `kode_rek_del_st`) VALUES
('0f732e34b94178c1571f434146ae8012ad802840', '01', 'Penyetoran ke kas negara/daerah, kas BUMN/D, dan masyararakat', 1),
('48f8cbf9c187957d85984c58ad9dc6fba905141b', '05', 'Pelaksanaan sanksi administrasi kepegawaian', 1),
('13da66974c02bdb717370493fa99e1a0ecb80d37', '03', 'Perbaikan fisik barang/jasa dalam proses pembangunan atau penggantian barang/jasa oleh rekanan', 1),
('42020cef597d838ed29c6966788779facf006653', '04', 'Penghapusan barang milik negara/daerah', 1),
('f85674aa63c3d814d6d5f15eef6a823844f4b776', '02', 'Pengembalian barang kepada negara, daerah, BUMN/D, dan masyarakat', 1),
('6ae99131339271f604e9c2bdefcfcf11f41c8b96', '06', 'Perbaikan Laporan dan Penertiban Administrasi/Kelengkapan Administrasi', 1),
('649458938697e9023096569f5ebe8c569ae23608', '07', 'Perbaikan Sistem dan Prosedur Akuntansi dan Pelaporan', 1),
('d1bca669dbbd088662e35d56883b267bac3518a0', '08', 'Peningkatan Kualitas dan Kuantitas Sumberdaya Manusia Pendukung Sistem Pengendalian', 1),
('d759ed18d8404efd096fbd4452dbb36606655388', '09', 'Perubahan atau Perbaikan Prosedur, Peraturan dan Kebijakan', 1),
('d1171a5f85d8bbd2cc1f5a1601388c9efdf10d31', '10', 'Perubahan atau Perbaikan Struktur Organisasi', 1),
('95b73b39296982e2134aaa0fa7481d9329732d8f', '11', 'Koordinasi Antar Instansi termasuk juga Penyerahan Penanganan Kasus Kepada Instansi yang Berwenang', 1),
('25835b83d39699cf923f34b972ebf99e625ef6f6', '12', 'Pelaksanaan Penelitian oleh Tim Khusus atau Audit Lanjutan oleh Unit Pengawas Intern', 1),
('9d95b5750ba51f4c4263347729611d28ed038384', '13', 'Pelaksanaan Sosialisasi', 1),
('bf4d37a6e176e96a25a8fbf3dfeb75d9054ad657', '14', 'Lain-lain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_kompetensi`
--

CREATE TABLE IF NOT EXISTS `par_kompetensi` (
  `kompetensi_id` varchar(50) NOT NULL,
  `kompetensi_name` varchar(100) NOT NULL,
  `kompetensi_desc` varchar(100) NOT NULL,
  `kompetensi_del_st` tinyint(4) NOT NULL COMMENT '0=del 1=aktif',
  PRIMARY KEY (`kompetensi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_kompetensi`
--

INSERT INTO `par_kompetensi` (`kompetensi_id`, `kompetensi_name`, `kompetensi_desc`, `kompetensi_del_st`) VALUES
('f3ad38fd0cbd91cff7e62b908115f54b2d63fcf1', 'Penjenjangan', 'Auditor Pelaksana, Auditor Pelaksana Lanjutan, Auditor Penyelia, Auditor Pertama, Auditor Muda, Audi', 1),
('41640807ef9f277221c36c7fa2207b6708bd297d', 'Sertifikasi', 'CIA, CFE, CISA, QIA, CGAP etc', 1),
('f2a7c0f8efa051fb0d8ebc21fd162598df171ee1', 'Bimbingan Teknis', 'Bimbingan Teknis Tentang Pengawasan', 1),
('95715709a119311ce0c1d66622801c8c9e1b8919', 'Pembentukan', 'Auditor Ahli; Auditor Terampil', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `par_menu`
--

CREATE TABLE IF NOT EXISTS `par_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_method` varchar(50) NOT NULL,
  `menu_file` varchar(100) NOT NULL,
  `menu_parrent` int(11) NOT NULL,
  `menu_sort` int(11) NOT NULL,
  `menu_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hide, 1=show',
  `menu_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `par_menu`
--

INSERT INTO `par_menu` (`menu_id`, `menu_name`, `menu_link`, `menu_method`, `menu_file`, `menu_parrent`, `menu_sort`, `menu_show`, `menu_del_st`) VALUES
(1, 'Manajemen Risiko', '#', '', '', 0, 1, 1, 1),
(2, 'Manajemen Audit', '#', '-', '-', 0, 2, 1, 1),
(3, 'Manajemen Pegawai', '#', '-', '-', 0, 3, 1, 1),
(4, 'Manajemen Auditee', '#', '-', '-', 0, 4, 1, 1),
(5, 'Pustaka Audit', '#', '', '', 0, 5, 1, 1),
(6, 'Parameter Aplikasi', '#', '', '', 0, 6, 1, 1),
(7, 'Manajemen Pengguna', '#', '-', '-', 0, 8, 1, 1),
(8, 'Parameter Pegawai', 'main_page.php?method=par_auditor_main', '#', '-', 6, 3, 1, 1),
(9, 'Group', 'main_page.php?method=par_group', 'par_group', 'UserManagement/group_main.php', 7, 1, 1, 1),
(11, 'Daftar Pengguna', 'main_page.php?method=usermgmt', 'usermgmt', 'UserManagement/user_main.php', 7, 2, 1, 1),
(30, 'Identifikasi Risiko', '#', 'risk_identifikasi', '-', 23, 6, 0, 1),
(14, 'Daftar Auditee', 'main_page.php?method=auditeemgmt', 'auditeemgmt', 'AuditeeManagement/auditee_main.php', 4, 1, 1, 1),
(15, 'Tambah Auditee', 'main_page.php?method=auditeemgmt&data_action=getadd', 'getadd', 'AuditeeManagement/auditee_main.php', 4, 2, 1, 1),
(16, 'Parameter Auditee', 'main_page.php?method=par_auditee_main', 'par_auditee_main', 'ParameterManagement/list_parAuditee.php', 6, 4, 1, 1),
(17, 'Tambah Pegawai', 'main_page.php?method=auditormgmt&data_action=getadd', 'getadd', '-', 3, 2, 1, 1),
(18, 'Daftar Pegawai', 'main_page.php?method=auditormgmt', 'auditormgmt', 'AuditorManagement/auditor_main.php', 3, 1, 1, 1),
(19, 'Perencanaan Audit', 'main_page.php?method=auditplan', 'auditplan', '-', 2, 2, 1, 1),
(20, 'Parameter Audit', 'main_page.php?method=par_audit_main', '-', '-', 6, 2, 1, 1),
(21, 'Pelaksanaan Audit', 'main_page.php?method=auditassign', 'auditassign', '-', 2, 3, 1, 1),
(22, 'Pustaka Program Audit', 'main_page.php?method=ref_program', 'ref_program', 'PustakaManagement/ref_program_main.php', 5, 1, 1, 1),
(23, 'Siklus Manajemen Risiko', 'main_page.php?method=risk_penetapantujuan', 'risk_penetapantujuan', 'RiskManagement/penetapan_main.php', 1, 1, 1, 1),
(24, 'Parameter Risiko', 'main_page.php?method=par_risk_main', '-', '-', 6, 1, 1, 0),
(25, 'Pelaporan Risiko', 'main_page.php?method=risk_fil_report', 'risk_report', 'RiskManagement/laporan_filter_risiko.php', 1, 3, 1, 1),
(26, 'Profil Risiko', 'main_page.php?method=risk_result', 'risk_result', '-', 2, 1, 1, 1),
(28, 'Pelaporan Audit', 'main_page.php?method=reportaudit', 'reportaudit', 'AuditManagement/listReportAudit_main.php', 2, 4, 1, 1),
(29, 'Tindak Lanjut Audit', 'main_page.php?method=followupassign', 'tindaklanjut', '-', 2, 5, 1, 1),
(31, 'Analisis Risiko', '#', 'view_analisa', '-', 23, 7, 0, 1),
(32, 'Evaluasi Risiko', '#', 'view_evaluasi', '-', 23, 8, 0, 1),
(33, 'Penanganan Risiko', '#', 'view_penanganan', '-', 23, 9, 0, 1),
(34, 'Monitoring Risiko', '#', 'view_monitoring', '-', 23, 10, 0, 0),
(35, 'Tambah', '#', 'getadd', '-', 23, 1, 0, 1),
(36, 'Ubah', '#', 'getedit', '-', 23, 2, 0, 1),
(37, 'Hapus', '#', 'getdelete', '-', 23, 3, 0, 1),
(38, 'Set Perencanaan', '#', 'view_plan', '-', 26, 1, 0, 1),
(39, 'Anggota Tim', '#', 'anggota_plan', '-', 19, 4, 0, 1),
(43, 'Tambah', '#', 'getadd', '-', 19, 1, 0, 1),
(41, 'Pengajuan', '#', 'getajukan', '-', 19, 5, 0, 1),
(42, 'Persetujuan', '#', 'getapprove', '-', 19, 6, 0, 1),
(44, 'Ubah', '#', 'getedit', '-', 19, 2, 0, 1),
(45, 'Hapus', '#', 'getdelete', '-', 19, 3, 0, 1),
(46, 'Tambah', '#', 'getadd', '-', 21, 1, 0, 1),
(47, 'Ubah', '#', 'getedit', '-', 21, 2, 0, 1),
(48, 'Hapus', '#', 'getdelete', '-', 21, 3, 0, 1),
(49, 'Anggota Tim', '#', 'anggota_assign', '-', 21, 6, 0, 1),
(50, 'Audit Program', '#', 'programaudit', '-', 21, 8, 0, 1),
(51, 'Tambah', '#', 'getadd', '-', 50, 1, 0, 1),
(52, 'Ubah', '#', 'getedit', '-', 50, 2, 0, 1),
(53, 'Hapus', '#', 'getdelete', '-', 50, 3, 0, 1),
(54, 'Kertas Kerja', '#', 'kertas_kerja', '-', 50, 4, 0, 1),
(55, 'Tambah', '#', 'getadd', '-', 54, 1, 0, 1),
(56, 'Ubah', '#', 'getedit', '-', 54, 2, 0, 1),
(57, 'Hapus', '#', 'getdelete', '-', 54, 3, 0, 1),
(58, 'Temuan', '#', 'finding_kka', '-', 54, 4, 0, 1),
(59, 'Tambah', '#', 'getadd', '-', 58, 1, 0, 1),
(60, 'Ubah', '#', 'getedit', '-', 58, 2, 0, 1),
(61, 'Hapus', '#', 'getdelete', '-', 58, 3, 0, 1),
(62, 'Rekomendasi', '#', 'rekomendasi', '-', 58, 4, 0, 1),
(63, 'Tambah', '#', 'getadd', '-', 62, 1, 0, 1),
(64, 'Ubah', '#', 'getedit', '-', 62, 2, 0, 1),
(65, 'Hapus', '#', 'getdelete', '-', 62, 3, 0, 1),
(66, 'Tindak Lanjut', '#', '', '', 62, 4, 0, 0),
(67, 'Tambah', '#', '', '', 66, 1, 0, 0),
(68, 'Ubah', '#', '', '', 66, 2, 0, 0),
(69, 'Hapus', '#', '', '', 66, 3, 0, 0),
(71, 'Tambah', '#', 'getadd', '-', 39, 1, 0, 1),
(72, 'Ubah', '#', 'getedit', '-', 39, 2, 0, 1),
(73, 'Hapus', '#', 'getdelete', '-', 39, 3, 0, 1),
(74, 'Tambah', '#', 'getadd', '-', 49, 1, 0, 1),
(75, 'Ubah', '#', 'getedit', '-', 49, 2, 0, 1),
(76, 'Hapus', '#', 'getdelete', '-', 49, 3, 0, 1),
(77, 'Tambah', '#', 'getadd', '-', 29, 1, 0, 1),
(78, 'Ubah', '#', 'getedit', '-', 29, 2, 0, 1),
(79, 'Hapus', '#', 'getdelete', '-', 29, 3, 0, 1),
(80, 'Tambah', '#', 'getadd', '-', 18, 1, 0, 1),
(81, 'Ubah', '#', 'getedit', '-', 18, 1, 0, 1),
(82, 'Hapus', '#', 'getdelete', '-', 18, 3, 0, 1),
(83, 'Tambah', '#', 'getadd', '-', 14, 1, 0, 1),
(84, 'Ubah', '#', 'getedit', '-', 14, 2, 0, 1),
(85, 'Hapus', '#', 'getdelete', '-', 14, 3, 0, 1),
(86, 'Tambah', '#', 'getadd', '-', 22, 1, 0, 1),
(87, 'Ubah', '#', 'getedit', '-', 22, 2, 0, 1),
(88, 'Hapus', '#', 'getdelete', '-', 22, 3, 0, 1),
(89, 'Tambah', '#', 'getadd', '124', 30, 1, 0, 1),
(90, 'Ubah', '#', 'getedit', '-', 30, 2, 0, 1),
(91, 'Hapus', '#', 'getdelete', '-', 30, 3, 0, 1),
(92, 'Pengajuan', '#', 'getajukan', '-', 23, 4, 0, 1),
(93, 'Persetujuan', '#', 'getapprove', '-', 23, 5, 0, 1),
(94, 'Back Up Restore Data', 'main_page.php?method=backuprestore', 'backuprestore', 'UserManagement/backuprestore_main.php', 7, 3, 1, 1),
(95, 'Log Aktifitas', 'main_page.php?method=log_aktifitas', 'log_aktifitas', 'UserManagement/log_main.php', 7, 4, 1, 1),
(96, 'Pustaka Referensi Audit', 'main_page.php?method=ref_audit', 'ref_audit', 'PustakaManagement/ref_audit_main.php', 5, 2, 1, 1),
(97, 'Monitoring dan Reviu Risiko', 'main_page.php?method=risk_reviu', 'view_monitoring', 'RiskManagement/reviu_main.php', 1, 2, 1, 1),
(98, 'Tambah', '#', 'getadd', '-', 97, 1, 0, 1),
(99, 'Ubah', '#', 'getedit', '-', 97, 2, 0, 1),
(100, 'Tambah', '#', 'getadd', '-', 96, 1, 0, 1),
(101, 'Ubah', '#', 'getedit', '-', 96, 2, 0, 1),
(102, 'Hapus', '#', 'getdelete', '-', 96, 3, 0, 1),
(103, 'Pengajuan', '#', 'getajukan_tl', '-', 29, 4, 0, 1),
(104, 'Persetujuan', '#', 'getapprove_tl', '-', 29, 5, 0, 1),
(105, 'Pengajuan', '#', 'getajukan_penugasan', '-', 21, 4, 0, 1),
(106, 'Persetujuan', '#', 'getapprove_penugasan', '-', 21, 5, 0, 1),
(109, 'SBM Rinci', 'main_page.php?method=par_sbu_rinci', 'par_sbu_rinci', 'BudgetManagement/sbu_rinci_main.php', 107, 2, 1, 1),
(110, 'Tambah', 'main_page.php?method=par_sbu', 'getadd', 'BudgetManagement/sbu_main.php', 108, 1, 0, 1),
(111, 'Ubah', 'main_page.php?method=par_sbu', 'getedit', 'BudgetManagement/sbu_main.php', 108, 2, 0, 1),
(112, 'Hapus', 'main_page.php?method=par_sbu', 'getdelete', 'BudgetManagement/sbu_main.php', 108, 3, 0, 1),
(113, 'Tambah', 'main_page.php?method=par_sbu_rinci', 'getadd', 'BudgetManagement/sbu_rinci_main.php', 109, 1, 0, 1),
(114, 'Ubah', 'main_page.php?method=par_sbu_rinci', 'getedit', 'BudgetManagement/sbu_rinci_main.php', 109, 2, 0, 1),
(115, 'Hapus', 'main_page.php?method=par_sbu_rinci', 'getdelete', 'BudgetManagement/sbu_rinci_main.php', 109, 3, 0, 1),
(107, 'Manajemen Anggaran', '#', '-', '-', 0, 7, 1, 1),
(108, 'SBM', 'main_page.php?method=par_sbu', 'par_sbu', 'BudgetManagement/sbu_main.php', 107, 1, 1, 1),
(121, 'Persetujuan', 'main_page.php?method=surattugas', 'getapprove', 'AuditManagement/surat_tugas_main.php', 116, 5, 0, 1),
(120, 'Pengajuan', 'main_page.php?method=surattugas', 'getajukan', 'AuditManagement/surat_tugas_main.php', 116, 4, 0, 1),
(119, 'Hapus', 'main_page.php?method=surattugas', 'getdelete', 'AuditManagement/surat_tugas_main.php', 116, 3, 0, 1),
(118, 'Ubah', 'main_page.php?method=surattugas', 'getedit', 'AuditManagement/surat_tugas_main.php', 116, 2, 0, 1),
(117, 'Tambah', 'main_page.php?method=surattugas', 'getadd', 'AuditManagement/surat_tugas_main.php', 116, 1, 0, 1),
(116, 'Surat Tugas', 'main_page.php?method=surattugas', 'surattugas', 'AuditManagement/surat_tugas_main.php', 21, 7, 0, 1),
(122, 'Tindak Lanjut Audit', 'main_page.php?method=tindaklanjut', 'tindaklanjut', '-', 2, 6, 0, 0),
(123, 'Tambah', '#', 'getadd', '-', 122, 1, 1, 1),
(124, 'Dashboard Audit', 'main_page.php?method=dashboardaudit', 'dashboardaudit', 'AuditManagement/dashboard_audit.php', 2, 7, 1, 1),
(125, 'Parameter Email', 'main_page.php?method=par_email', 'par_email', 'ParameterManagement/mail_main.php', 6, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_pangkat_auditor`
--

CREATE TABLE IF NOT EXISTS `par_pangkat_auditor` (
  `pangkat_id` varchar(50) NOT NULL,
  `pangkat_name` varchar(10) NOT NULL,
  `pangkat_desc` varchar(50) NOT NULL,
  `pangkat_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=hide, 1=show',
  PRIMARY KEY (`pangkat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_pangkat_auditor`
--

INSERT INTO `par_pangkat_auditor` (`pangkat_id`, `pangkat_name`, `pangkat_desc`, `pangkat_del_st`) VALUES
('91315041c0bfa3e0ac1a79afbc268f7d90eaec25', 'III/a', 'Penata Muda', 1),
('3a41229b90364ece381302f990389a9c141b3800', 'III/b', 'Penata Muda Tingkat I', 1),
('3afc1f39990d28ecc67bd99c6e251970e334cc7e', 'III/c', 'Penata', 1),
('71b2743ce715c1418dd7307f4b5f6d98d2c8662a', 'III/d', 'Penata Tingkat I', 1),
('dfbdb51d2273a3c42d038dbe03884d657f68f501', 'IV/a', 'Pembina', 1),
('2c7d2f13f69aae77926eef2ec436c1bfdf61b7b7', 'IV/b', 'Pembina Tingkat I', 1),
('b82deb90cb8921db2dc09443ee4c00b44cb0b3c9', 'II/c', 'Pengatur Muda', 1),
('dad7254bdaf3af188270d73c9cbda9849d79b988', 'IV/e', 'Pembina Utama', 1),
('85c2a8fa3630cd3b5bc3322202572ca3a2526589', 'II/d', 'Pengatur Tingkat 1', 1),
('919748dcf6deebf6f8b06a8da290e7688495f4f8', 'IV/c', 'Pembina Utama Muda', 1),
('326c8092e1a5d8851d126adb8e5f611515cda883', 'IV/d', 'Pembina Utama Madya', 1),
('2fa6054ce5103b6dbf4bfd8fbf1c7cb8c324f283', 'II/b', 'Pengatur Muda Tingkat I', 1),
('8411f15577c104b0634a0235105e199d4cae53f3', 'II/a', 'Pengatur Muda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_posisi_penugasan`
--

CREATE TABLE IF NOT EXISTS `par_posisi_penugasan` (
  `posisi_id` varchar(50) NOT NULL,
  `posisi_name` varchar(30) NOT NULL,
  `posisi_code` varchar(5) NOT NULL,
  `posisi_sort` varchar(255) NOT NULL,
  `posisi_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`posisi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_posisi_penugasan`
--

INSERT INTO `par_posisi_penugasan` (`posisi_id`, `posisi_name`, `posisi_code`, `posisi_sort`, `posisi_del_st`) VALUES
('9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd', 'Pengendali Teknis', 'PT', '2', 1),
('1fe7f8b8d0d94d54685cbf6c2483308aebe96229', 'Pengendali Mutu', 'PM', '3', 1),
('8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', 'Ketua Tim', 'KT', '4', 1),
('6a70c2a39af30df978a360e556e1102a2a0bdc02', 'Anggota Tim', 'AT', '5', 1),
('1fe7f8b8d0d94d54685cbf6c2483308aebe96009', 'Penanggung Jawab', 'PJ', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_posisi_role`
--

CREATE TABLE IF NOT EXISTS `par_posisi_role` (
  `audit_akses_posisi_id` varchar(50) NOT NULL,
  `audit_akses_action` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_posisi_role`
--

INSERT INTO `par_posisi_role` (`audit_akses_posisi_id`, `audit_akses_action`) VALUES
('9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd', '1'),
('1fe7f8b8d0d94d54685cbf6c2483308aebe96229', '2'),
('8918ca5378a1475cd0fa5491b8dcf3d70c0caba7', '3'),
('f16b0682bf3574838d396805fd8c4afe3a005430', '3'),
('f16b0682bf3574838d396805fd8c4afe3a005430', '1');

-- --------------------------------------------------------

--
-- Table structure for table `par_propinsi`
--

CREATE TABLE IF NOT EXISTS `par_propinsi` (
  `propinsi_id` varchar(50) NOT NULL,
  `propinsi_name` varchar(100) NOT NULL,
  `propinsi_del_st` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`propinsi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_propinsi`
--

INSERT INTO `par_propinsi` (`propinsi_id`, `propinsi_name`, `propinsi_del_st`) VALUES
('1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'Riau', 1),
('11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'Sumatera Utara', 1),
('4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'Nanggroe Aceh Darussalam', 1),
('675eed8a709d4098541fb8f73805004c84725d49', 'Jambi', 1),
('fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'Sumatera Barat', 1),
('bc02f4d326c699e711b05bf45925b3652464457a', 'Kepulauan Riau', 1),
('c25868ef9cc8b9d93e7043e07e354b2946f554df', 'Sumatera Selatan', 1),
('3a9fd0542122e96ed7de690697ce088ac6311f1b', 'Bangka Belitung', 1),
('d8c82bf22dd5b689e806f6e381dd3ad459e7485c', 'Bengkulu', 1),
('8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'Lampung', 1),
('99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'DKI Jakarta', 1),
('0b486467ca176631589de72c19779fe674f13388', 'Jawa Barat', 1),
('a1a02d8be166d22d766bc596c4a08979dc906c7a', 'Banten', 1),
('8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'Jawa Tengah', 1),
('a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'Yogyakarta', 1),
('aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'Jawa Timur', 1),
('f183f90fb5f85df77a6150d74fef99c75b0608a1', 'Bali', 1),
('93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'Nusa Tenggara Barat', 1),
('3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'Nusa Tenggara Timur', 1),
('499db371dac2489052cf151f8e861ac9d9172df7', 'Kalimantan Barat', 1),
('c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'Kalimantan Timur', 1),
('175f37cdb244988462e7946a62f190f8bcd3c048', 'Kalimantan Tengah', 1),
('260e10323ded2fca85ec8d93337b236b0f29e2f0', 'Kalimantan Selatan', 1),
('6e34f7aeaf90d916efdf09be2db9184a077d466d', 'Sulawesi Utara', 1),
('59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'Gorontalo', 1),
('330bc0efcbfc115f11d36d01b05ede6f42236da0', 'Sulawesi Tengah', 1),
('df2e581894d521cc3f6ed134ccc4d057550337c9', 'Sulawesi Tenggara', 1),
('708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'Sulawesi Selatan', 1),
('9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'Sulawesi Barat', 1),
('ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'Maluku', 1),
('a3959bc615df01ca44c0374239d089f46c8e06d5', 'Maluku Utara', 1),
('eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'Papua', 1),
('cac6bb408da778b1dd986cf581e1405801395cdc', 'Papua Barat', 1),
('5ecfef4589a11799683bb20435868c23620b01e8', 'Kalimantan Utara', 1),
('40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'Kalimantan Tenggara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_kategori`
--

CREATE TABLE IF NOT EXISTS `par_risk_kategori` (
  `risk_kategori_id` varchar(50) NOT NULL,
  `risk_kategori` varchar(100) NOT NULL,
  `risk_kategori_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=del 1=aktif',
  PRIMARY KEY (`risk_kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_kategori`
--

INSERT INTO `par_risk_kategori` (`risk_kategori_id`, `risk_kategori`, `risk_kategori_del_st`) VALUES
('302d8fd00a2a86db44e01257269a47a25c94f52d', 'Risiko Reputasi', 0),
('1428283071c4ebf2011c6f2a561ee1689d78e605', 'Risiko Operasional', 0),
('454b438cdbaf48c9122627c2d8312a2ba6c648c7', 'Risiko Kepatuhan', 0),
('1a8fe52a6682d30bc6964bb7167ff2aec83f0227', 'Risiko Hukum', 0),
('8e64e875b4b79e345f66541310518e350f3cb124', 'Risiko Kecurangan', 0),
('60c5a7a350127b6ca0e23bd51aab45cab21f9af1', 'Risiko Keuangan', 0),
('0c310e2975b93e336d06ffd0f5f2ab09fc92d65e', 'Risiko Strategis', 0),
('2ece7ba19c14e920eecf7c942e5584655b75cdf2', 'Sangat Rendah', 0),
('1261d319fbef14da47b45a6a67ec23b9170af9fd', 'Rendah', 0),
('ec9211a486f303943cd7b88af4752c8259722b49', 'Sedang', 0),
('0a27659904f302cd623da3ff57773b5c0890fc86', 'Tinggi', 0),
('1db2e2fa07d1a031511433ba2cb53f0569e5c9b2', 'Sangat Tinggi', 0),
('752b9fa1fcb57d1c76a68e38acb4f55ea94aab01', 'Organisasi', 1),
('bbb4f7cbc2b58e5f6a7392dfd76932e93ec284c3', 'Kebijakan/Tata Kelola', 1),
('5d686b9376e7068f317ea5bbdfdc59635aef5634', 'Peraturan Perundang-undangan', 1),
('55023f763fd5cd2995aa130189179d4796b9f0a3', 'Sumber Daya Manusia', 1),
('3ff7bc7d69bab039a826b2bdcf68dd0b5071dbba', 'Akuntabilitas', 1),
('b0b376d19f2dd63f13dbbab94f0de10f07b3feb6', 'Pengawasan', 1),
('516f80d3a9e2110a46730e29b2667b839db2e0b9', 'Pelayanan Publik', 1),
('3f29211e9128ead9352587f620cf77784e59ac21', 'Harga Satuan', 1),
('a1343d085aa214e98298b1ccbbfd62daa3d66f9f', 'Akun Mata Anggaran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_matrix_residu`
--

CREATE TABLE IF NOT EXISTS `par_risk_matrix_residu` (
  `matrix_residu_id` varchar(50) NOT NULL,
  `matrix_residu_ri_id` varchar(50) NOT NULL,
  `matrix_residu_pi_id` varchar(50) NOT NULL,
  `matrix_residu_value` varchar(50) NOT NULL,
  PRIMARY KEY (`matrix_residu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_matrix_residu`
--

INSERT INTO `par_risk_matrix_residu` (`matrix_residu_id`, `matrix_residu_ri_id`, `matrix_residu_pi_id`, `matrix_residu_value`) VALUES
('a5693e62570efdd7723691c1c60d225c82f939bd', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c', '55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('a3bcebd28d735900f95129760fe0acaa6e7523bc', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c', '3637c5bebb616131ce0ec2daec12074e17a57675', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('e066ca7a7f775738579cc254bc0fabcd13a40dbe', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c', 'fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('3c250ca58354fad3cfdaa02e8e75575c677fa7dc', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c', '094b2317df42ca10c5cb9bee11ae3d32e4595775', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('e69be84f3c5bc58fc77e9b9b96a7383da3cfa983', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c', 'cafc09184e3a07e59dd71b2f28e5a6f371bb2935', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('2aa26c7f7eb2f4f99a99c2b083a651cf07b09ce5', '294a72871fc127c6d730a3aefaaf0d54254cab54', '55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('ed737e3201eb766d524b978a91d393bcffa388fe', '294a72871fc127c6d730a3aefaaf0d54254cab54', '3637c5bebb616131ce0ec2daec12074e17a57675', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('9d28f99c822db6f13f6184b4613796c07d7b78c8', '294a72871fc127c6d730a3aefaaf0d54254cab54', 'fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('87f6db631624252375888329827620f63fd0617b', '294a72871fc127c6d730a3aefaaf0d54254cab54', '094b2317df42ca10c5cb9bee11ae3d32e4595775', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('c7cebd617e5aecfd6bb84d6dfbaa80aff6fa6d8a', '294a72871fc127c6d730a3aefaaf0d54254cab54', 'cafc09184e3a07e59dd71b2f28e5a6f371bb2935', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('a06b79a1906ba52569eb3fbf86184a9c16eef7b2', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', '55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', 'ca572b48cc5584a5541443b3a33806b2d84e6c2c'),
('3cf7167d0f85e48e7455125d33c7a9cb32e8ec8a', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', '3637c5bebb616131ce0ec2daec12074e17a57675', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('9dd0b228cfb2de130110d93d9c8214474736d2f2', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', 'fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294'),
('efbb2c942d70135b2cdbbc29a2f1e073b7b29e84', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', '094b2317df42ca10c5cb9bee11ae3d32e4595775', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294'),
('2b4405c4e7f311cc9a3eb46b139ddb726f209ead', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', 'cafc09184e3a07e59dd71b2f28e5a6f371bb2935', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294'),
('87fa9d828a6db87db55acf95efc5747e6c41cc5b', 'd4b2ff452635037706f0e07cdd6f173e34be86b0', '55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('a08b9ed913f8027de00a97f95765c8499aebced3', 'd4b2ff452635037706f0e07cdd6f173e34be86b0', '3637c5bebb616131ce0ec2daec12074e17a57675', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294'),
('8bc8a42df2e65b576fe9d7ba261b5be20a980964', 'd4b2ff452635037706f0e07cdd6f173e34be86b0', 'fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', 'd4b2ff452635037706f0e07cdd6f173e34be86b0'),
('b78cf8f48a37bf48e84846128b140bc5d610b87b', 'd4b2ff452635037706f0e07cdd6f173e34be86b0', '094b2317df42ca10c5cb9bee11ae3d32e4595775', 'd4b2ff452635037706f0e07cdd6f173e34be86b0'),
('32342a111787b9f8ecc049cbc0134ed71968b01a', 'd4b2ff452635037706f0e07cdd6f173e34be86b0', 'cafc09184e3a07e59dd71b2f28e5a6f371bb2935', 'd4b2ff452635037706f0e07cdd6f173e34be86b0'),
('cd1d4d7e9808eab5ce6ff5869f3aa03d602aa191', '731a4f376eed6c4a30ccde31928fb018155a6b3d', '55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', '294a72871fc127c6d730a3aefaaf0d54254cab54'),
('665fa990c4fb3a9187fee1a2998651bf8d8a6b42', '731a4f376eed6c4a30ccde31928fb018155a6b3d', '3637c5bebb616131ce0ec2daec12074e17a57675', '0c6e6b0b4769f5419079b172db2ef6b5a9fcd294'),
('ac6fef830a2561350a4035e5d5ceadab9ba7828c', '731a4f376eed6c4a30ccde31928fb018155a6b3d', 'fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', 'd4b2ff452635037706f0e07cdd6f173e34be86b0'),
('0f1281b140f2b7ee3ee3cb1e2822b7adda877683', '731a4f376eed6c4a30ccde31928fb018155a6b3d', '094b2317df42ca10c5cb9bee11ae3d32e4595775', '731a4f376eed6c4a30ccde31928fb018155a6b3d'),
('3f0eb12b3f1d84fce92ecdf3943d6846ba34b9b5', '731a4f376eed6c4a30ccde31928fb018155a6b3d', 'cafc09184e3a07e59dd71b2f28e5a6f371bb2935', '731a4f376eed6c4a30ccde31928fb018155a6b3d');

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_penanganan`
--

CREATE TABLE IF NOT EXISTS `par_risk_penanganan` (
  `risk_penanganan_id` varchar(50) NOT NULL,
  `risk_penanganan_jenis` varchar(50) NOT NULL,
  `risk_penanganan_desc` varchar(255) NOT NULL,
  `risk_penanganan_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`risk_penanganan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_penanganan`
--

INSERT INTO `par_risk_penanganan` (`risk_penanganan_id`, `risk_penanganan_jenis`, `risk_penanganan_desc`, `risk_penanganan_status`) VALUES
('7e861dc0d7a58204659eb765ddd3c8dfcf19eb40', 'Transfer', 'Memindahkan sejumlah risiko dari organisasi ke entitas lain', 0),
('a407ff621bae384b57e896eb23f71ec59f01fb1a', 'Kendalikan', 'Mengendalikan risiko', 1),
('b6935efd01543b229b95b745e51bad0647551715', 'Retensi', 'Menerima dan menyerap suatu risiko', 0);

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_pi`
--

CREATE TABLE IF NOT EXISTS `par_risk_pi` (
  `pi_id` varchar(50) NOT NULL,
  `pi_name` varchar(50) NOT NULL,
  `pi_value` int(3) NOT NULL,
  `pi_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`pi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_pi`
--

INSERT INTO `par_risk_pi` (`pi_id`, `pi_name`, `pi_value`, `pi_desc`) VALUES
('fa388797df07fb5f2b4d1ec8d6d6301c7d69d301', 'Sedang', 3, 'Rancangan dan implementasi pengendalian internal cukup efektif'),
('3637c5bebb616131ce0ec2daec12074e17a57675', 'Kuat', 4, 'Rancangan dan implementasi pengendalian internal efektif'),
('094b2317df42ca10c5cb9bee11ae3d32e4595775', 'Lemah', 2, 'Rancangan dan implementasi pengendalian internal tidak efektif'),
('55c34ac8042fd28f5a2afcc2ca6e3ebf426c64c9', 'Sangat Kuat', 5, 'Rancangan dan implementasi pengendalian internal sangat efektif'),
('cafc09184e3a07e59dd71b2f28e5a6f371bb2935', 'Sangat Lemah', 1, 'Rancangan dan implementasi pengendalian internal sangat tidak efektif');

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_ri`
--

CREATE TABLE IF NOT EXISTS `par_risk_ri` (
  `ri_id` varchar(50) NOT NULL,
  `ri_name` varchar(50) NOT NULL,
  `ri_atas` float NOT NULL,
  `ri_bawah` float NOT NULL,
  `ri_value` int(3) NOT NULL,
  `ri_warna` varchar(10) NOT NULL,
  PRIMARY KEY (`ri_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_ri`
--

INSERT INTO `par_risk_ri` (`ri_id`, `ri_name`, `ri_atas`, `ri_bawah`, `ri_value`, `ri_warna`) VALUES
('ca572b48cc5584a5541443b3a33806b2d84e6c2c', 'Sangat Rendah', 2.99, 1, 1, '1CFF3A'),
('294a72871fc127c6d730a3aefaaf0d54254cab54', 'Rendah', 4.99, 3, 2, '0D0DFF'),
('0c6e6b0b4769f5419079b172db2ef6b5a9fcd294', 'Sedang', 9.99, 5, 3, 'F7FF12'),
('d4b2ff452635037706f0e07cdd6f173e34be86b0', 'Tinggi', 14.99, 10, 4, 'FF760D'),
('731a4f376eed6c4a30ccde31928fb018155a6b3d', 'Sangat Tinggi', 25, 15, 5, 'FF1B0A');

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_rr`
--

CREATE TABLE IF NOT EXISTS `par_risk_rr` (
  `rr_id` varchar(50) NOT NULL,
  `rr_name` varchar(50) NOT NULL,
  `rr_atas` float NOT NULL,
  `rr_bawah` float NOT NULL,
  `rr_value` int(3) NOT NULL,
  `rr_warna` varchar(10) NOT NULL,
  PRIMARY KEY (`rr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_rr`
--

INSERT INTO `par_risk_rr` (`rr_id`, `rr_name`, `rr_atas`, `rr_bawah`, `rr_value`, `rr_warna`) VALUES
('728eee16cdf7f9bd5a11a3916ff8975f71f1a93c', 'Sangat Rendah', 1, 0, 1, '1CFF3A'),
('7fbc015ee9a07f9ad3b172010db60d9a3b1cb903', 'Rendah', 2, 1, 2, '0D0DFF'),
('c6934ba34b50a73bd918c58d8f6afaf1fc5a9cf2', 'Sedang', 3, 2, 3, 'F7FF12'),
('9573a66d86be4f054b591ac1e05e4d1e911991b9', 'Tinggi', 4, 3, 4, 'FF760D'),
('d31c5d2f0ce8c8f7d9a70f79490f16042a711d24', 'Sangat Tinggi', 5, 4, 5, 'FF1B0A');

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_selera`
--

CREATE TABLE IF NOT EXISTS `par_risk_selera` (
  `risk_selera_id` varchar(50) NOT NULL,
  `risk_selera` varchar(50) NOT NULL,
  `risk_selera_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=del 1=aktif',
  PRIMARY KEY (`risk_selera_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_selera`
--

INSERT INTO `par_risk_selera` (`risk_selera_id`, `risk_selera`, `risk_selera_del_st`) VALUES
('8b8cb86119c8c32284df5ab0b236a161cdec5503', 'Sangat Rendah', 1),
('cc05fa8f918ec35f85d8c057d4126eded084e510', 'Rendah', 1),
('cf5ac932e274424a01280030fe7e5e18752b45a6', 'Sedang', 1),
('dc4bc4d1bd56195dba37c18dcb8f1127c39b6032', 'Tinggi', 1),
('f15ab4e4242ce1af192b339442930395074cf68c', 'Sangat Tinggi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_td`
--

CREATE TABLE IF NOT EXISTS `par_risk_td` (
  `td_id` varchar(50) NOT NULL,
  `td_name` varchar(50) NOT NULL,
  `td_value` int(3) NOT NULL,
  `td_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_td`
--

INSERT INTO `par_risk_td` (`td_id`, `td_name`, `td_value`, `td_desc`) VALUES
('fbddd2006aa20b0ee3e04b3a8799d058498bf7db', 'Sangat Tinggi', 5, 'Sebagian besar tujuan intansi/kegiatan gagal dilaksanakan; Terganggunya pelayanan lebih dari 1 minggu; Mengancam program dan organisasi serta stakeholders; Kerugian sangat besar bagi organisasi dari segi keuangan maupun non keuangan.'),
('b71541cf1cb940f48f4a45f9c122983d94cc2f2e', 'Tinggi', 4, 'Sebagian tujuan intansi/kegiatan gagal dilaksanakan; Terganggunya pelayanan lebih dari 2 hari tetapi kurang dari 1 minggu; Mengancam fungsi program yang efektif dan organisasi; Kerugian besar bagi organisasi dari segi keuangan maupun non keuangan.'),
('1aba3d85c7dd32290134f92406311b3b9cd146ac', 'Sedang', 3, 'Mengganggu pencapaian tujuan intansi/kegiatan secara signifikan; Mengganggu kegiatan pelayanan secara signifikan; Mengganggu administrasi program; Kerugian keuangan cukup besar'),
('6d85854ceaf21f02c70b3291468fa5eba133ce58', 'Rendah', 2, 'Mengganggu pencapaian tujuan intansi/kegiatan meskipun tidak signifikan; Cukup menggangu jalannya pelayanan; Mengancam efisiensi dan efektivitas beberapa aspek program; Kerugian kurang material dan sedikit mempengaruhi stakeholders'),
('889bd5a5ad3f81629d2b1ac982bd42b696a81176', 'Sangat Rendah', 1, 'Tidak berdampak pada pencapaian tujuan intansi/kegiatan secara umum; Agak mengganggu pelayanan; Dampaknya dapat ditangani pada tahap kegiatan rutin; Kerugian kurang material dan tidak mempengaruhi stakeholders');

-- --------------------------------------------------------

--
-- Table structure for table `par_risk_tk`
--

CREATE TABLE IF NOT EXISTS `par_risk_tk` (
  `tk_id` varchar(50) NOT NULL,
  `tk_name` varchar(50) NOT NULL,
  `tk_value` int(3) NOT NULL,
  `tk_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`tk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_risk_tk`
--

INSERT INTO `par_risk_tk` (`tk_id`, `tk_name`, `tk_value`, `tk_desc`) VALUES
('6a14ee046bc1c48ffd58fc491d7d4cb6b1f8286b', 'Hampir Pasti Terjadi', 5, 'Peristiwa selalu terjadi hampir pada setiap kondisi; Persentase > 90%'),
('9226e23a3427750453e8f254e0757a246b8b59dd', 'Sering Terjadi', 4, 'Peristiwa sangat mungkin terjadi pada sebagian kondisi; Persentase > 50-90%'),
('515248412be39eba4cd4efdd29db9dbf1e530c50', 'Kemungkinan Terjadi', 3, 'Peristiwa kadang-kadang bisa terjadi; Persentase > 30-50%'),
('1c1ac421ff4bea47a0703ea661527701a44a280f', 'Hampir Tidak Terjadi', 1, 'Peristiwa hanya akan timbul pada kondisi yang luar biasa; Persentase 0-10%'),
('121aca36b8e9ef874c96814e9c409e8c8e1a92d6', 'Jarang Terjadi', 2, 'Peristiwa diharapkan tidak terjadi; Persentase > 10-30%');

-- --------------------------------------------------------

--
-- Table structure for table `par_sbu`
--

CREATE TABLE IF NOT EXISTS `par_sbu` (
  `sbu_id` varchar(50) NOT NULL,
  `sbu_kode` varchar(10) NOT NULL,
  `sbu_name` varchar(100) NOT NULL,
  `sbu_sort` int(3) NOT NULL,
  `sbu_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=kosong, 1=sesuai tanggal 2=sesuai tanngal - 1, 3=1',
  `sbu_del_st` tinyint(1) NOT NULL COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`sbu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_sbu`
--

INSERT INTO `par_sbu` (`sbu_id`, `sbu_kode`, `sbu_name`, `sbu_sort`, `sbu_status`, `sbu_del_st`) VALUES
('7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'uh_c', 'Uang Harian', 10, 1, 1),
('476ad41e4a4594d3be69db9c4b06a94096887ddd', 'uh_b', 'Uang Harian', 9, 1, 1),
('e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'htl_a', 'Hotel', 3, 2, 1),
('ebf228d8a650167838ab269a8c55dd64c41528c8', 'uh_a', 'Uang Harian', 8, 1, 1),
('58473fc553632a96d6a97544578c2e4061614615', 'htl_e', 'Hotel', 7, 2, 1),
('4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'htl_d', 'Hotel', 6, 2, 1),
('be36de438ed04d253d192a7abae9ef7cf0c4738b', 'pswt_bis', 'Pesawat Bisnis', 2, 3, 1),
('4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', 'pswt_eko', 'Pesawat Ekonomi', 1, 3, 1),
('6ce322773d75e0d26197deafc9e6dbde34f83dea', 'htl_b', 'Hotel', 4, 2, 1),
('b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'htl_c', 'Hotel', 5, 2, 1),
('da5ceab13e436f7766534a536032fca6e1db957c', 'taxi', 'Taxi', 16, 0, 1),
('4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', 'trans_bdr', 'Transport Bandara', 17, 0, 1),
('3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'rep_a', 'Uang Representasi', 18, 1, 1),
('4abd6b5e5c0834565115dba565d1a0b8b96da553', 'uh_d', 'Uang Harian', 11, 1, 1),
('0a728653630619fce4b65553fb6ec31afce577a1', 'uh_e', 'Uang Harian', 12, 1, 1),
('22900bd4275c4132998f08ddb2a085964ddaed38', 'uh_diklat', 'Uang Harian', 13, 1, 1),
('d763948fb1b2529c209a3404bf0f5ca05a67cf0c', 'uh_8jam', 'Uang Harian', 14, 1, 1),
('35800a846ff500f3bbafe348fe19eb20726bfc92', 'us_was', 'us_was', 15, 1, 1),
('fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'rep_b', 'Uang Representasi', 19, 1, 1),
('1b1596d427c76aada53c972f6e87c9e3d573828e', 'rep_c', 'Uang Representasi', 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_sbu_rinci`
--

CREATE TABLE IF NOT EXISTS `par_sbu_rinci` (
  `sbu_rinci_id` varchar(50) NOT NULL,
  `sbu_rinci_prov_id` varchar(50) NOT NULL,
  `sbu_rinci_sbu_id` varchar(50) NOT NULL,
  `sbu_rinci_gol` varchar(2) NOT NULL,
  `sbu_rinci_amount` int(11) NOT NULL,
  `sbu_rinci_del_st` tinyint(1) NOT NULL COMMENT '0=hapus, 1=aktif',
  PRIMARY KEY (`sbu_rinci_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_sbu_rinci`
--

INSERT INTO `par_sbu_rinci` (`sbu_rinci_id`, `sbu_rinci_prov_id`, `sbu_rinci_sbu_id`, `sbu_rinci_gol`, `sbu_rinci_amount`, `sbu_rinci_del_st`) VALUES
('8a98b3a0013268cd6a36f531be2ca932ad353343', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 3412000, 1),
('49f393bcbfa9e63cfa2f2353e5c48eeefcae2d37', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2139000, 1),
('589b756cc1900d1439a7968c863ba9ebc6777866', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 410000, 1),
('5b7f92aa48d09ace04b7974080e5ebb98d214ae8', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 410000, 1),
('aaa7eb8b620ed3abeec2b614cb0946b5324f0568', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 410000, 1),
('765eb2007d049f6cec58dd4ad568cc9266f78f65', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 410000, 1),
('708b28c847712d5d47fe8956db358d52afb3d98c', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 410000, 1),
('b747494680d75777da8bee88db94f1a0bdcfc036', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 160000, 1),
('99e51a7a365ac802e1f6087a7219aec3553e5cb1', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('a3b27209e408fed5919eddddd1256865120fce44', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 120000, 1),
('443a4039bd71e1cce62aa48d651bc41e6b10e3ae', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3335000, 1),
('1ae4274676e0051fa36b3b1e7abf13d2773f7016', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1350000, 1),
('86597561e10fd24e0147e63558239f34e96a2e51', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 850000, 1),
('43b77fb04d08d5df827769e70bfa5dbce4d66ed1', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('c81f0bacdba56c6e2349711f040a33968e33f880', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '58473fc553632a96d6a97544578c2e4061614615', 'E', 300000, 1),
('8037bca0303ec3a9be173c03da1759ba73a4be44', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('80de0c963f721077b9f85621c90f4f413a5b916e', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 90000, 1),
('c6eb4940f207094dd420121cad60639c2c09aa18', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('2cf2917ffdf56aa125e2e44e46035c2db841d09d', '3a9fd0542122e96ed7de690697ce088ac6311f1b', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('4c579e8929a9b0314e8442ccc3a3d86de33e7fb7', '3a9fd0542122e96ed7de690697ce088ac6311f1b', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('6e16b2a42c8d26d52bc29d632173090834dea63a', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1430000, 1),
('3c5312baed0344b3b654c906a848d0f86b0fb935', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3810000, 1),
('95b2fb7db38facac1454720b486fbe4c51c41f6a', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('edb5432b8e9af5bd92149a77520e07d1883f3a90', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('0237377a8910a47783bde8e9948d8b42d4c5c5b3', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('2a00a4b38402b2ed733fb27f40d0405f9d722d86', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('cb34ac51b4d13d7a4c51b0e38218c93948079ea9', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('896e96557f129204f0362242111eaa77c622a91e', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('02993fd64759f5272c4893f68c19a09f2a41e58c', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('74063b0ed01035b6b4c0812c38a1f98a286c6ca9', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('8b500bb80461e4fcae808008466a41d9160abb4d', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 500000, 1),
('dd2d19d9e7a9dedc53766b21e776186d70ac7dd1', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 500000, 1),
('d785fb74489ac215faf3662f552377caab790bbc', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 800000, 1),
('e122d506f62be36782c419aa2066440c5c738e8f', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 640000, 1),
('d852f58bd368b82c76dc2f74351dee616d5ea78a', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '58473fc553632a96d6a97544578c2e4061614615', 'E', 400000, 1),
('60c4e349f526ecf407c320ded28096537572e8c1', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 0, 1),
('0493fdaaad98442ecaae3db1396c207674e8f63b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 306000, 1),
('ec655756278d53a09e7f612c97eb261b4a6d21bf', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('f1f344e7468cfcf4c88cdc3635070788dffbe063', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('5d2faa4d9173584713e4e2be18f7c67ae342e78b', 'a1a02d8be166d22d766bc596c4a08979dc906c7a', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('0ef0ca6577bcda8856e93c8e3c7fada4c4e0dd84', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', 'A', 5305000, 1),
('57b519572008825604af1c814115b82a6240cecb', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 150000, 1),
('97f2c65734cb9281b4d38345e52c0a6647857f81', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('59983a59087852107d0b0cfcc45b1803c8151f22', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '58473fc553632a96d6a97544578c2e4061614615', 'E', 660000, 1),
('c5cc6f7cefb7b9f32c72656206bd07cbc3cc522f', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 910000, 1),
('c4e15ad093112408c38a2dc653d98dc99a5f0c39', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 990000, 1),
('4b62fc29826f98087d2643a1b1ae9162d89c5bfc', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1810000, 1),
('0f8dff04cbc67b99bfd7db61e42231c8ff367afa', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4890000, 1),
('86cd0c4c0d4c1d33161c4edb25e30732d4f6bd70', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 140000, 1),
('3b9061f2c81993fdc4e09c9571ff0cb1565b2d58', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('2c9a90fe3c98d7d4b56056e042a8d33ac2a5fa6b', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 190000, 1),
('e750e99226bef82b67a86154691f665138a92ab5', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 480000, 1),
('77684230aba91e6bc476918ac006f41cb27049f1', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 480000, 1),
('fa6c23e0e5f20c657fe8a1155266475181b4cc53', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 480000, 1),
('9abd0542549aef4d21d6df1e046c797e62afb222', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 480000, 1),
('5d478c4a7112cbc64a62a97fc21f5f9dea1150b9', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 480000, 1),
('fd0b33dd2c3e5c26368e52ad1fa5a9379924cd57', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', 'A', 3262000, 1),
('21e5cf48ad471a8d76c613ad44ef29cff33e1589', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('e2144aadf5e291549671dcdaeaddb4bc1cddd0a0', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('13025678bcf6696eff463c29788033f6027a3f27', 'f183f90fb5f85df77a6150d74fef99c75b0608a1', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('08a6bbe3aeccc5bb46efd2f025104769790b484d', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 4107000, 1),
('977bc83aca9830fd16c350eeff15ad7bbb9765cf', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2268000, 1),
('28143b0a2cc2b4a39a28bb6e72aadb069489f7c8', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 420000, 1),
('fa40a2a2179383e02ea940e4a3cdb113c1d82e23', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 420000, 1),
('341bc74acf0a436db9f460639062b8ccaef1c6fd', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 420000, 1),
('6d8ad7b47d581ac0d7a74bc5b75cfaeb9011bb96', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 420000, 1),
('481b07e525acd2254de2bdd78a84174aab7be2a4', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 420000, 1),
('f533853943de6a34b0e44414a3b242b153eac750', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('e85753d8ae544fa4814667b686f06cfe40f480e1', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('8152331bbbe82d6adcb494b87f045c6aee264d6d', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('d6d4fffb2be274eb0679bf5c9a1bc3fc00d86796', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4700000, 1),
('f02fde3b3af4410a39a2e768f86dd32e9c623aef', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1350000, 1),
('3db52b9c7b708add280e8d01ed22c79c7f08c76c', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 810000, 1),
('91c554200363cc2a1c9e75a6e7704f1fd0555b3f', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 630000, 1),
('ad7b2a3aa9411f3554b1fff784d40399e6ba0a64', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '58473fc553632a96d6a97544578c2e4061614615', 'E', 460000, 1),
('f13de06db341b4b512f3fa96879cf699addfba8d', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('6092e75883de7da915339019be8df114711e4d30', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 94000, 1),
('db07e333751a533c66cfaa2b478c1183074f61a1', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('958cfebba698813837bf7d1f9c6e655b2db8e04b', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('5d59366e2dcabe5ebcf4255af5858736cff56470', 'a3f1a121069a6b60f84cbf2e8924b3cba3efddce', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('229cebe87970b613096fa94f06b8c81f5abf9a33', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 150000, 1),
('37669ad8df612bd9cfa32494f01d9ba0046ac949', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 150000, 1),
('fcaf721a4769a3971fbf08633b1d0cc009881480', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 0, 1),
('df50efe2a12660c02eb3aa0e9662811f1ef047e8', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 0, 1),
('651519f97eaffc8dbb9ee24ccb4436dc057369a5', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 0, 1),
('6922766241b57415fb0ad8e3a3b22f71c6e88b4e', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 0, 1),
('75fde9d7a6aee039d25864025f72766b8441e0e2', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 0, 1),
('b30207acebe9dc8d5e42bb96aef8c507096c8a3b', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 210000, 1),
('0b17b23221e2e8ef82fc9afa35bbe762cc03fdc2', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 100000, 1),
('2dd4edc459bb1c111b736ed7e8d272b3e87cfe14', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 160000, 1),
('0ffa2ba07d9cfff3976d2d1af99da6a1d3d2c561', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 8720000, 1),
('f2fdc655ba0a63de89d32622fc921628f2ee374d', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1490000, 1),
('5cf1b733b2b795f45085b33d3064585f60af1b39', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 870000, 1),
('9f0e603d1d7e55adc71dbf8c9fd8b15ff4a7b596', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 610000, 1),
('ff3b23a922675edfeacf03f9a8eaa301bceec1f6', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '58473fc553632a96d6a97544578c2e4061614615', 'E', 400000, 1),
('400083788084922449ad75d4d049a3447b5244b1', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 0, 1),
('e0dbfbcca5ff67bd791b4af9519e24f3f8d78922', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 170000, 1),
('6c7526950db1a8fa2671f01193bfbae4f5575376', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('0fdf618b8f83f241ef0dd8666c021b61d29be021', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('df7078187b867ef75584f58b4c7ced8d4f6d177a', '99c28a4fe33ae2eb8efb09a2eeb1d91fdd3f654d', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('43e939f4dc68c28393fb1c457349cc3ab31bafb6', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7231000, 1),
('da9f1861eb23d013a8efbae5f664ab713a3c965b', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 4824000, 1),
('db5896967aa737cfc54b892ef42da24f0d816191', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('d1ee8fefa4abf63988455d48a287116fe6f8c2a8', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('38510b5c9401b3a0b824dd5b27a25d8babf2529e', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('9c0820ef39a00f03e45e75243931fa41ecf93921', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('3b4e0333dc3d67f38a6d09c9254e04fb8afb10ba', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('612eac20f70cabb02bb0881f7f40acef68b79938', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('dd811fb1dbf7a568f3ce2b06cdab1b1408e81258', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('fcc4e426e53d1789411a9048126d6db5ee47cfbd', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('1068ba32c9d757f87bb14c0cc8ab9eb880422d05', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 1320000, 1),
('22e8f48d567741f39309055bc3685f667466c2e7', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1150000, 1),
('6e4409edc387137d47c348114b787cda41019f66', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 550000, 1),
('bd6577e1896e8f38fde6c75b42b48b6635e98029', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('3bb7fb5928ada1eb2e0884ad709f7c6ef45ff7ed', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '58473fc553632a96d6a97544578c2e4061614615', 'E', 260000, 1),
('351f4e4f393773fde0cac8e6320e462263bc8e63', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('621ef721dab8fa3d024b288d7eec19339ec5e234', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 200000, 1),
('673a6391ab43945f8313f11207cd63958bc66210', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('aa3b27b71436f996cce4f7b87c61615b56266ebd', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('ba262419a83a705e6e873ab31ed4da3d46aea1ac', '59862ce41d1636f2cfee5ee8756129b2c9af7a70', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('5ffecf9ce8442d41b353d5c5a96ac334cf39f627', '0b486467ca176631589de72c19779fe674f13388', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 580000, 1),
('127ebaa035d6ce7ec94cd71ac5afedfbb307ad5e', '0b486467ca176631589de72c19779fe674f13388', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 580000, 1),
('7b0e5ed446bf86156d04f238cf39172f74fadfd3', '0b486467ca176631589de72c19779fe674f13388', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('1f9ed64fa827b5b394ce5a26d9f51bafdb0daf36', '0b486467ca176631589de72c19779fe674f13388', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('22ad18817883fa38738aa575befc8e15a367573b', '0b486467ca176631589de72c19779fe674f13388', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('19eb12f62671d3ac2a9a903d30a2ac4d95b34980', '0b486467ca176631589de72c19779fe674f13388', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('d09391a409940f8337f77c12a3c2bba4d1e3754d', '0b486467ca176631589de72c19779fe674f13388', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('72b6005770a88fc69753950f5cf5f9a7db449a8d', '0b486467ca176631589de72c19779fe674f13388', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('8039e7d41745d4cc123942d916046fa26f19ac54', '0b486467ca176631589de72c19779fe674f13388', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('772c7dc9290b63071e5765c2d3d3835c6c3b0c70', '0b486467ca176631589de72c19779fe674f13388', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('41585bc498c9816df27f4c62d803c4a42e6feb4f', '0b486467ca176631589de72c19779fe674f13388', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3700000, 1),
('3739f97ada94b074367dd115bcc5af7c2e097990', '0b486467ca176631589de72c19779fe674f13388', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1760000, 1),
('839e9ffa2abc417a99e7ae3179dd2af402f62085', '0b486467ca176631589de72c19779fe674f13388', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 800000, 1),
('f62b26ada68f9db5db827f8326c85d8fc8385fe1', '0b486467ca176631589de72c19779fe674f13388', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 560000, 1),
('c4ede6d35de55b5af1c4c2326e47569cd6057e98', '0b486467ca176631589de72c19779fe674f13388', '58473fc553632a96d6a97544578c2e4061614615', 'E', 460000, 1),
('61d9278ee904cceb5fc75a8a5131ad9443616288', '0b486467ca176631589de72c19779fe674f13388', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 0, 1),
('2989c6252711a7fb428d6d0c7ecea50538ba44cb', '0b486467ca176631589de72c19779fe674f13388', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 140000, 1),
('dd265375d4fb9735d95a86db0e0ab9caecc51145', '0b486467ca176631589de72c19779fe674f13388', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('5198f7ab545c6fd68c63c0c92581112650572627', '0b486467ca176631589de72c19779fe674f13388', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('23f7a4566dd7df8636335b2f725d626043fb9078', '0b486467ca176631589de72c19779fe674f13388', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('1119f07af920f52ff790109c80a88dc3982c8c82', '675eed8a709d4098541fb8f73805004c84725d49', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 4065000, 1),
('b3f0c2afb0108699cf11c4e50d61405224b60d2e', '675eed8a709d4098541fb8f73805004c84725d49', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2460000, 1),
('1677ac6b0ed56b6dfd5f60ca1f27ea59d975999d', '675eed8a709d4098541fb8f73805004c84725d49', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('b9b7eab76379e5c9575a4034fdf6b0fbc3a9e2c7', '675eed8a709d4098541fb8f73805004c84725d49', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('0b8231ec08f7cc0684c85861b74bcdda03b7d208', '675eed8a709d4098541fb8f73805004c84725d49', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('fc07d936a7336446cbe5408963c653f23c9d79df', '675eed8a709d4098541fb8f73805004c84725d49', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('856b33868f39e0831f2bb7aa9472f9b10f29a180', '675eed8a709d4098541fb8f73805004c84725d49', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('0582a8e97292125d6f0a2e77ab3542fa1f91f3ce', '675eed8a709d4098541fb8f73805004c84725d49', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('16c0044ec7f0e4121ed86816ec69ce68e65274c0', '675eed8a709d4098541fb8f73805004c84725d49', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('e1b1b9632d59b250a097c1d10535f5e678b9f64b', '675eed8a709d4098541fb8f73805004c84725d49', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('8f17cba1d3cee20856d4c9da6eed02f5a33461f1', '675eed8a709d4098541fb8f73805004c84725d49', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4000000, 1),
('b014886001f8ec5ddaf0ab91ef54c9ecd08a9a4d', '675eed8a709d4098541fb8f73805004c84725d49', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1200000, 1),
('9a0cb31be84c5f04a4b5a3dad64f7859738f191a', '675eed8a709d4098541fb8f73805004c84725d49', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 740000, 1),
('edd7027cfdf939c9f57ff017caaf3a90a6aa86d2', '675eed8a709d4098541fb8f73805004c84725d49', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('c842b3065e3f137f5672c100431abc02d2612291', '675eed8a709d4098541fb8f73805004c84725d49', '58473fc553632a96d6a97544578c2e4061614615', 'E', 290000, 1),
('fcc46bac74ba888c3d03d50fd03a0e60d79fa882', '675eed8a709d4098541fb8f73805004c84725d49', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('fc4a5790a338fa3f1b2f7f11669f464d46dbca31', '675eed8a709d4098541fb8f73805004c84725d49', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 120000, 1),
('8910e31a69a29e365a3626a6e9bb784d115636f4', '675eed8a709d4098541fb8f73805004c84725d49', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('616f6b3ae5285d33a09c6d6d43d952f8196d9c95', '675eed8a709d4098541fb8f73805004c84725d49', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('80fcc4bae4f738ee6d6e781dc0f8f55a7cdfdf8f', '675eed8a709d4098541fb8f73805004c84725d49', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 130002, 1),
('c5060e8f8376d26536e35cee7df70432aa880bd9', '675eed8a709d4098541fb8f73805004c84725d49', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('d46560d3696fd9eab122a210d1c8abc6cc05637b', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 3861000, 1),
('a605040dd3ff00cdeaae7c7cbed53d4b9caf0ee5', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2182000, 1),
('e9e9d158d7bf6e1a07a7bb266d8014f3e9914ef4', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('6cf13b404fd2cea03eb14cc08fd332014e8b1e8f', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('cc8e1a7e8513c2565c69ab1930b39f766a279848', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('35d985e63e7be9a5d092822ca8cf25649eb75d91', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('e0f7442ea931de49d413f770ff5409e1420e26a7', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('027b402502564bd3527b9af9fe9b6aebae54f9e7', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('0bc9db4460d9bcfab0a01ff9ea0016af6e7cf1b0', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('76e3ecc28c5639f75059b02a0f8d2ff33a1b70c7', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('f1b0096e22452e9f94736685fac6547f8ca60906', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4150000, 1),
('93c6587a5d34f88fc86084d323eca3d51dc09140', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1480000, 1),
('aeed14d49cff3dde70b8893cd543f67c40ab037e', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 850000, 1),
('7b45e671373c638ba0cc3286298a9353f989205e', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 450000, 1),
('070b7dcfb039f244cf2ed129188729ff4e8162ea', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '58473fc553632a96d6a97544578c2e4061614615', 'E', 360000, 1),
('fcbb2509668bf455c01dc2ba119310fd2a0cd4bd', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('4b6ba3b64a5aabb6438ac62b49f4873080f28620', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 75000, 1),
('1ab007f03543147545fa9f3a43c0b6af389aedb6', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('4128807f534ad53987f50b3b00ba900b809fecbe', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('d40057829d3f5471c88b86b025071710bf01007d', '8f446869f734b6f2ff6d65761a18ba945a10cbd6', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('07fbd8213340588998252ff4a321a60c7965becc', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 5466000, 1),
('b803528b467afa3af801955fc0a80df8a3687744', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2674000, 1),
('c85c9b13b1a489d327a211628f8f06c56bc442f3', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 410000, 1),
('b25cbe908829ea68851f96948935484cb7cee7a0', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 410000, 1),
('ea05150a6108b419d4e0fc22fb90393b45a4faab', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 410000, 1),
('452b8b56b618bb1deec49f36a756ac1031a4cfa7', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 410000, 1),
('031d6b187bab1e8795de76bdffa23f302916550f', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 410000, 1),
('70dc02d21321f77e074380617c5702e4b2823898', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 160000, 1),
('9ca7f8dd5ddb714486e1b5fb313857394a16d8d7', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('28a07e3081e00f4623fa2ba89136a5f635872eef', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 120000, 1),
('fd5d6b3b339d9d62bbbb2749a1fa7a38383af111', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4400000, 1),
('b053892a6a3d49931c275d30a14f5555f73e1887', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1370000, 1),
('c1b6c32212d94820e635859dcf3853283bd01260', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 850000, 1),
('ba6ebe5da486881d975b9faf2879fdad14491e23', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 450000, 1),
('5843634b01270a18b73d0c1a15f69160cddcd8d8', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '58473fc553632a96d6a97544578c2e4061614615', 'E', 330000, 1),
('a556aff2183e4d97cc6f41917b0619793df079d8', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('6d9dc437da573ad20c0004df144e8ece5ef7b813', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 148000, 1),
('a6ac89a3a5f502aaa4c6550e9e63b3020e88bfa6', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('54284925c8947d71e831a0c7998ba36a710a9f0c', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('cdb182587dd0e96775bf9c37e4c4ba19608c5ce0', 'aaeb8fcb443f06605035fbc68fa7c1598f53c6aa', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('2cc1298f7c816fae307359c55470b2370620ed6b', '499db371dac2489052cf151f8e861ac9d9172df7', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 4353000, 1),
('02d81a5856f1bc2820f86107610c21a3627a5899', '499db371dac2489052cf151f8e861ac9d9172df7', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2781000, 1),
('d8b426c2bb36fa4e2aed9eb58eab787692625bfe', '499db371dac2489052cf151f8e861ac9d9172df7', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('efd0a98842f2364f35c688d85ec705ca77cc4fa4', '499db371dac2489052cf151f8e861ac9d9172df7', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('6b30492ee2cb9c453a41922373012aa49d22505a', '499db371dac2489052cf151f8e861ac9d9172df7', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('5b81258bb32006b204726c43e8d9172f9ae98b1d', '499db371dac2489052cf151f8e861ac9d9172df7', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('b985cd637e89538086f9c9258d896779975766bd', '499db371dac2489052cf151f8e861ac9d9172df7', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('fd215ffc11eb643463e7ad1acb6d3960f60ef0e5', '499db371dac2489052cf151f8e861ac9d9172df7', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('a1df7c5ae685b52e32c1b8b2fd787f3d12212ac2', '499db371dac2489052cf151f8e861ac9d9172df7', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('c4a0349074b9b72fda09b82bade3d41a17705616', '499db371dac2489052cf151f8e861ac9d9172df7', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('bdda1c0c573528f641ed12d96d6bf8b538f55845', '499db371dac2489052cf151f8e861ac9d9172df7', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 2400000, 1),
('33105987b39fb0b0bef8f82b6d84e27576de9f1f', '499db371dac2489052cf151f8e861ac9d9172df7', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1230000, 1),
('1502266267813a3b08b452add18445ca7d31a777', '499db371dac2489052cf151f8e861ac9d9172df7', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 900000, 1),
('47115c39f7e39e6184349b80951092535fa0a9cd', '499db371dac2489052cf151f8e861ac9d9172df7', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 430000, 1),
('f52c075ee31f2ebb528393fad0f0e4660fcbc917', '499db371dac2489052cf151f8e861ac9d9172df7', '58473fc553632a96d6a97544578c2e4061614615', 'E', 350000, 1),
('1d2c93a69ae3cb2f0fcb03b9f5e79a565152c731', '499db371dac2489052cf151f8e861ac9d9172df7', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('dd115fd0bba41a7fa2476a2b1c65260d82a2322a', '499db371dac2489052cf151f8e861ac9d9172df7', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 107000, 1),
('c018ab0653f5859cf6abe4168b36a7728d839ddb', '499db371dac2489052cf151f8e861ac9d9172df7', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('a5b3927bb575ec5d55d964ba757fde13b178f567', '499db371dac2489052cf151f8e861ac9d9172df7', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('424a71a95f4a16d9a94f68dadc78003bc3ff6fd0', '499db371dac2489052cf151f8e861ac9d9172df7', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('c538ba3db3b3b4af136424dede4c4d3fe230f46c', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 5252000, 1),
('47a21c8e3d2dbe7acd6e3d182baf05a03493891d', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2995000, 1),
('d34c968ca1f0491cb8710faaa38ce94c3a2f47a0', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('c3a65e54112014f4cf78948dc76fca67477bc8dc', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('136a52e046cbbf01a098f67c09e43c3fc6c9b55d', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('674b333f85665e40c84005b18d2b0e4848dcc31f', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('66fc4e8ac2b27df234fb5b5fb62b9f2e962e1b52', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('3cd8d5f440885185fa45366d5dab7694761c3046', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('bd04f910f827f9f01a0a8f66c7c09934533d05fd', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('6006354f48cd4fdad68fedb1559249b5527fc370', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('4a12ede885129be7a8600201d09dd3f3a7ef5139', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4250000, 1),
('6e7f59b71638a6bbde24b058514c057b2417fe16', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1680000, 1),
('c9b75a2b011ea35e44cfb071c1d43a06689da02e', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 820000, 1),
('80651eb738951a6c61e240f031aa2de3cc79f159', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 540000, 1),
('a29330319d10fe488a6f90dc439e39e7a6b96dc2', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '58473fc553632a96d6a97544578c2e4061614615', 'E', 390000, 1),
('1536ead630af2e53ef3d0e639c67434fecb41830', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('cd3beeb091c2be9aa240010968c7d929ceb94891', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 100000, 1),
('a26edda1bf18cb84382ba3b6481ca7066c0fbfcb', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('3f1ea18b8771f1ab54d261bca75e65b8d878b853', '260e10323ded2fca85ec8d93337b236b0f29e2f0', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('b7c50ff9fbededf9ae9d153a8d92f0c02cad8971', '260e10323ded2fca85ec8d93337b236b0f29e2f0', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('ccbb702a0017785ab9aee7564d76f247486c71f5', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('1ef9675e3861abcbd7c24cb598d9dafdcd37cf4c', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1750000, 1),
('e5a9378402ffd0d328a7ebae8bdf011eb2790b91', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('55f00b8bf58c684bfe73c0b8b67737a4f6ea1338', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4000000, 1),
('4130de186b077e0a8bf0bdeaaa84db395803dace', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 75000, 1),
('61edabf3105af3216716dfe25079aee7accc2a7f', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 0, 1),
('59dca3d38a9a5b25ef92807bed27282be93a3adc', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3797000, 1),
('9652e139e3a9f640d16ab883eec2caa8707c3298', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('6c76d3d0b9769b82d111c0575ab84c075d1be25a', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 620000, 1),
('78ae471c90a97e4d7a45c5d3e54d4285b8d474f1', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('a74e3b55317fc2c498b188d5d707dc2e14de058d', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('f86215ffd078427dc1d881fce34d22b264f4bfcb', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('8d8fa186f309b921f63787cdb7be562413faf53d', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '58473fc553632a96d6a97544578c2e4061614615', 'E', 350000, 1),
('e179391321f9b80eee54ea034d3ed0b7fb83b541', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('ffc4729d2e1a5bbbda7c2df5953734be6e6a1df4', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('c06249331aaf6e5d47f4544a1587718d16fb1eb8', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('a7e17e4e345bd134e9e3f85a0904703e0f04cd45', '40bf7c41fa82117b980797d4ef41105f05bfbc0e', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('2225afc73767a028926af80a585f80a2a4cf932a', '175f37cdb244988462e7946a62f190f8bcd3c048', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 4984000, 1),
('daa9a21992b77bdfeecf1ea4e6b1b66da257c4f2', '175f37cdb244988462e7946a62f190f8bcd3c048', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2984000, 1),
('8b6217b20583b7de765392cc1e8794ccdc351ae1', '175f37cdb244988462e7946a62f190f8bcd3c048', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 360000, 1),
('14b492b49814bbe83e6f9b909efa49ea18ba4730', '175f37cdb244988462e7946a62f190f8bcd3c048', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 360000, 1),
('cb74a6fe81f456655151251763f46c63f3353a6e', '175f37cdb244988462e7946a62f190f8bcd3c048', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 360000, 1),
('bc406d17cd2012c21f4ffb28c0cd0efbbf7af50f', '175f37cdb244988462e7946a62f190f8bcd3c048', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 360000, 1),
('51517d783033aed13d0726fd08ed9b3e6c7fb9ef', '175f37cdb244988462e7946a62f190f8bcd3c048', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 360000, 1),
('1eed764e48860e5d497c53d35d55995387331cb3', '175f37cdb244988462e7946a62f190f8bcd3c048', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 140000, 1),
('3e1d4f497adeed0d3e410b9ae9ba30d8acb5509a', '175f37cdb244988462e7946a62f190f8bcd3c048', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('17f31ec9052581c46f3918c9ef54034167231b86', '175f37cdb244988462e7946a62f190f8bcd3c048', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('4d30be92bca79e0d1ecc818b9a6b580c8a157cde', '175f37cdb244988462e7946a62f190f8bcd3c048', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3000000, 1),
('53f5c1f866fb61c5bfe676b8e97dacd810cb65ef', '175f37cdb244988462e7946a62f190f8bcd3c048', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1560000, 1),
('4e446e4b677bc394649be749dd1063577025e6eb', '175f37cdb244988462e7946a62f190f8bcd3c048', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 750000, 1),
('39bca7dd3e26d5a5981de67f5949e678204ee52d', '175f37cdb244988462e7946a62f190f8bcd3c048', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 560000, 1),
('2011de8a8b4e1d0511d7b6e807bc9f2ebfb26b01', '175f37cdb244988462e7946a62f190f8bcd3c048', '58473fc553632a96d6a97544578c2e4061614615', 'E', 350000, 1),
('5d37e615ccb566156fa54b84bdfa6ee31cf582ec', '175f37cdb244988462e7946a62f190f8bcd3c048', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('97592ef7b1257fba78adf08e3234d2efb7b4d320', '175f37cdb244988462e7946a62f190f8bcd3c048', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 90000, 1),
('05b34316cb64d735b17d16782270ed23889e3158', '175f37cdb244988462e7946a62f190f8bcd3c048', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('bd9b1c9875632f2801d1dd3c8916a88cc8c362da', '175f37cdb244988462e7946a62f190f8bcd3c048', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('8f682ce3cf46c1a031e73fbaa6708cd5d598f9c8', '175f37cdb244988462e7946a62f190f8bcd3c048', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('37bb51413e78ef420bb7abfde7c32f7bba80f47b', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7412000, 1),
('54afd15900982d42f2df3bca372c2245bede7509', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3797000, 1),
('3746d0f47f0e9f564c89eaaef9cd491a006dee74', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('e1caf9300d2723c82fe8409cfb76408e70482f99', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('a671a0cdba58d8f950ffd6c0b69606e3a8aa60ea', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('9c77e36bfc59cb4397ef6ea6ab383b084ddb0197', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('34f44bf3091ac5b5d337a98373759f414d85d23e', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('82b70be614dd1c16e4a406bb1942d6f78df97336', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('1a178d41ec8a1b66100b7c2a20028518ee99d047', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('e3a2817bd193f159f25a493c4c60473c6fd2ca17', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('be7cf825c2ded07de5b28913e10648a6459e48b2', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4000000, 1),
('5c04b2d5e43fcefe3aad84f3bc8b7d8da8fedafa', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1750000, 1),
('0cba9aeba492cf6a59303319da3bb59099815aee', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 950000, 1),
('bc43a77ad17098348cfa0865cf49f57491be25a5', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 550000, 1),
('8457d4914755aa3936507ffee665e68ff9dbb202', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '58473fc553632a96d6a97544578c2e4061614615', 'E', 450000, 1),
('2b22c2c1274a4f355ee6cee1ac9d44e944c590a9', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('900b0807feefd036684e40f310982b537da6f0f3', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 80000, 1),
('a2e7a37f31e393aa616de797cb3a7781212ccbe3', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('b28648386b6f6b26c1ab82b05f3ca90e62f02802', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('83ea1fcd51e9ce11d0be73f6d3a11d30eb8ae33f', 'c7aad831ec287e77fb3ec028ea29602a12d68fa4', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('ca91693884067b9289eaf7c91476c74d4e0a350a', '5ecfef4589a11799683bb20435868c23620b01e8', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7412000, 1),
('82b54b209e53b4148069cea7b4771c8314edadc4', '5ecfef4589a11799683bb20435868c23620b01e8', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3797000, 1),
('5c8e4ed65c21f3fc708744e6996362792868076b', '5ecfef4589a11799683bb20435868c23620b01e8', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('f4d06bbc181c1dab9407c0afbc04e592bf7be733', '5ecfef4589a11799683bb20435868c23620b01e8', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('143ef1ea96591d28dc31f9756c98d8db3342be85', '5ecfef4589a11799683bb20435868c23620b01e8', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('28b97a84b6fce7f4bcd93eca129854b7cdc4c536', '5ecfef4589a11799683bb20435868c23620b01e8', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('4c58540d6b477ed6cac8651787410a142cbef02a', '5ecfef4589a11799683bb20435868c23620b01e8', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('cdd768d78cce97909143bbdc91c030eb33085f7b', '5ecfef4589a11799683bb20435868c23620b01e8', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('b277a702a1c59c5cc5e860f2b0149c95b3b77ddf', '5ecfef4589a11799683bb20435868c23620b01e8', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('eead5fb67bf05b2cf3167640d1e833bd9857cd33', '5ecfef4589a11799683bb20435868c23620b01e8', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('41691975ca4f6db9c3596248d431a4038a6dfbd0', '5ecfef4589a11799683bb20435868c23620b01e8', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4000000, 1),
('4b7120e4fda443fead183cbe1a5e4d1cde78c569', '5ecfef4589a11799683bb20435868c23620b01e8', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1750000, 1),
('4952b8233b87d7e46937e215657c9f740d094865', '5ecfef4589a11799683bb20435868c23620b01e8', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 620000, 1),
('6c459c05e91e1dbff9eb1a96bfe279405a3d447e', '5ecfef4589a11799683bb20435868c23620b01e8', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('290f18226b5c4ebf8b3e4c642d94ac6ee038ce10', '5ecfef4589a11799683bb20435868c23620b01e8', '58473fc553632a96d6a97544578c2e4061614615', 'E', 350000, 1),
('14b4c034595198601427bc491b96bb4124cb189e', '5ecfef4589a11799683bb20435868c23620b01e8', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('ea6748df0eebf6a8ebb985f40b551360ebbbdb8b', '5ecfef4589a11799683bb20435868c23620b01e8', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 110000, 1),
('07f030c5bc8b907dd971ebd581e95e49f16e389e', '5ecfef4589a11799683bb20435868c23620b01e8', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('5d6a2167d92d23f711a220703c211964e1f719cd', '5ecfef4589a11799683bb20435868c23620b01e8', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('6e13bad696e348b58502b17399711765e305d9c4', '5ecfef4589a11799683bb20435868c23620b01e8', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('98fcb2cb87834457c779f0c90288c149377a5b20', 'bc02f4d326c699e711b05bf45925b3652464457a', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 4867000, 1),
('b903bcdeb4e484b024914531aba7abbb6bbd3480', 'bc02f4d326c699e711b05bf45925b3652464457a', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2888000, 1),
('42ca42ddd5c146d618a34f424525a7693a81a4ea', 'bc02f4d326c699e711b05bf45925b3652464457a', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('2f0d304c35219cf690524de2a327c2e227bba5f2', 'bc02f4d326c699e711b05bf45925b3652464457a', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('85087f90a47d40bb17bf0b82623be11d798d90b9', 'bc02f4d326c699e711b05bf45925b3652464457a', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('2414b7bbafc081a95367349603447b52080310dc', 'bc02f4d326c699e711b05bf45925b3652464457a', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('0b764961ce5787e7f79e71337540c87df3e48f8b', 'bc02f4d326c699e711b05bf45925b3652464457a', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('4051468cc0138bcd5aba86bae3af3aaa8ba89ce9', 'bc02f4d326c699e711b05bf45925b3652464457a', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('989c312cefeeb18deafb0b1d8d880f4d6a26f2dd', 'bc02f4d326c699e711b05bf45925b3652464457a', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('9b3ba5b8300cb0a6025a7516ceec0826d072a564', 'bc02f4d326c699e711b05bf45925b3652464457a', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('c3ef1306526e4a4a0efbb115571e6aa3fe6ac111', 'bc02f4d326c699e711b05bf45925b3652464457a', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4275000, 1),
('0a336cec8074a3732564f9b8d74d0a0fbc65af5d', 'bc02f4d326c699e711b05bf45925b3652464457a', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1300000, 1),
('ab284ae943ac71a55cbda0b8452920c9f40d4e76', 'bc02f4d326c699e711b05bf45925b3652464457a', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 650000, 1),
('101f0bb12939be782c222055936584e260a677d5', 'bc02f4d326c699e711b05bf45925b3652464457a', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 510000, 1),
('5789fbcdc35a552d36a4634401ca4f840e3f5428', 'bc02f4d326c699e711b05bf45925b3652464457a', '58473fc553632a96d6a97544578c2e4061614615', 'E', 280000, 1),
('2c0d3498de795f5bf93831ae46a90ed143187ea7', 'bc02f4d326c699e711b05bf45925b3652464457a', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('93383b2cc6acdf0905d1e62b51ff132f6f94200c', 'bc02f4d326c699e711b05bf45925b3652464457a', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 120000, 1),
('3c7bc892126397bc57963640c1217f77e781a596', 'bc02f4d326c699e711b05bf45925b3652464457a', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('4d8bda8339761c6fb1724429c6350912395ca824', 'bc02f4d326c699e711b05bf45925b3652464457a', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('a74d429549468eb1a5af85ade8136c5c0a64ffc0', 'bc02f4d326c699e711b05bf45925b3652464457a', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1);
INSERT INTO `par_sbu_rinci` (`sbu_rinci_id`, `sbu_rinci_prov_id`, `sbu_rinci_sbu_id`, `sbu_rinci_gol`, `sbu_rinci_amount`, `sbu_rinci_del_st`) VALUES
('fec26877b1c7602404028dece2a9b92c5600fb4f', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 2407000, 1),
('e83279759e66d00c2282302facb9a572fbd8c266', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 1583000, 1),
('5b755901141ab49b72cee5f486ef493679dbd6bf', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('c7e5436cbb87ac61114b9e5753ded444b8ef19a1', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('dc87bb5d9497a097cdd6143eb6e72d9d073c5c5f', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('9306a8f0b46c5fa515c0f1aebabd238a5c94a49f', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('2e51ec27550937b7d04f76246298980fc6db4019', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('0dc8fbe15631de5a7e517fad0124521a78a1b9d0', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('c1f1d869c640fbc9c5d1abe95b96a18ff5f278ca', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('d2f2bc09476b9ddd869ac9a07f5835539114eb90', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('a667b2da9c846b08e369c0c951cb77c80948b688', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3960000, 1),
('244a3ad48d810e3194c0b15a6ca838f22f4d63db', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1300000, 1),
('1f6fdc64ff1af3e251f7def175d4c10b65823642', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 790000, 1),
('987cacc211a2232340d724a48ee6c31267495cac', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('eb4d8a354672ee91c910d0534fe7c931019654ed', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '58473fc553632a96d6a97544578c2e4061614615', 'E', 360000, 1),
('1dce1623b4f027dea66aed0c5478fff01441ed29', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('2996403d3bac1de54314246394a6e5e78d980590', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 145000, 1),
('afab06900b1cd2b457f219a08d1613ffb28d3bf5', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('82bcd0a18282fee5204394b799baec5c7cbbffbc', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('0fb7b755816fdf4d77d8647d3ebed6f74c8f7fad', '8f5fa3636c7a0a7ae049b0c1d9fcc4439f0e0b54', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('4885c2a0d1ddcc808bf5028a683cfa8e6205a122', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 13285000, 1),
('d35859844900a7d6b6813a033c79272434e3a04a', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 7081000, 1),
('02ba9c34daa606faffe3a082699b04b63b6e30d8', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('933b0ab91597c916a0d47722d4b27a4d7bc72af9', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('7e82c9194868a31f7563b6cd83ef74df02d15d90', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('12a81381d35e7055598e90a835d5485bd099ae00', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('d8ff3ee3797ef1a5c48b6a10391e87ab4f5ebf57', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('d35dacfd9a2221420c642afbfd74558231086d8d', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('6c10ce3dbdd640cb6dde0af42aea45b839639fad', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('435bd066daf3d31fc1900b356394c83074e08e16', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('ca6bf14a0a1440dacf4802fb6e8d9ab1896a543f', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3000000, 1),
('21286dc00540c8efecf2247ff78ec44592943a5a', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1030000, 1),
('d1ebc6489891eef65aa7a47baaf9c5a2472599fb', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 740000, 1),
('f92cc9e533e75a13ddad60ebcb80319e54028b2a', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 580000, 1),
('d012eee6a8cb323c1391ae02daf174423bb5eb29', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '58473fc553632a96d6a97544578c2e4061614615', 'E', 410000, 1),
('dcbfd3625edf82351b1bee78afc15fbf249e731a', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('ead5f2a3d05ad8dc2ba7abf4d4d1b8ec20ddf27a', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 210000, 1),
('b8d0fc41aa1e689bb2e63340a97426f48314ecb2', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('4567708a73756f8858258b7eb326dda0b5941070', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('d05389f0f9c349c2563822f984d5f8b98895026c', 'ba7fcdeb2444bf4850947ba34bb8b8520ac0868a', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('91e2e41aa64cba72d5bbeef79625bb16dec7f127', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 10001000, 1),
('49bc847792aa008a15a56a0c65a9fc1d06b72638', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 6664000, 1),
('a37d6580e6df57357019deacb34f754b705cfcd1', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('3bbe2c5623bd59584376eed9c952229f717e3014', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('5bcb24321b59b4fcc85cf1355062a7dd447e2254', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('1c34faecfd285123bfb7ff1129caede661d625d8', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('bc7b002b5f29b44f47df73b13efb11d90dbfcabd', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('f48f6f67649696b27e0aff4b687b7f572f953c42', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('028fedb4745b569067259a953cf2cec58a3e7937', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('4dd3be8c94b9fb532fec95e7cc1cdbcee6c41675', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('c60bf38c41f658713a250677d8e80338ee919029', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3110000, 1),
('c3f9cf6d1494ff8b3904db08eaa16f01eda335f2', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1520000, 1),
('631dd0fd3ecddd94187cf86a8a8301bcfb5f75b3', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 600000, 1),
('b3bd48571d092465c1ff8f41e2cde94dcf779602', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 480000, 1),
('afcaf3d0d65360728e7d9b3c39beb72a427d600e', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '58473fc553632a96d6a97544578c2e4061614615', 'E', 380000, 1),
('3d50c73ce31bd2a4381f97b9c5a6fe82f22b3fe9', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('b8789a0295a605d65fefac8ae4f5772782a85050', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 174000, 1),
('6ae9be5a779f3a3aa5fcdb17308d0c5f2e864b04', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('23e7505d60dc8837ffcc7adf430e24daa7531ed0', 'a3959bc615df01ca44c0374239d089f46c8e06d5', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('8274be6ab28ab5478bdf625c5eda6689779aab7a', 'a3959bc615df01ca44c0374239d089f46c8e06d5', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('fdb2b94eab744212079da9e2def21ec167b078b4', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7519000, 1),
('c6f8a6642da12d0698bd07e80551da68ebd0effd', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 4492000, 1),
('aa33bc05be06bb35c81eacf6ea490c572d4f1a1a', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 360000, 1),
('b160854d7e2adb55a0cc34521cfd302ef595e136', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 360000, 1),
('a67294948bea66f3d7057b26646e1f6d2659cee8', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 360000, 1),
('c649250bdd076295f94844cd6cc2190001299975', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 360000, 1),
('3639941ed533e9a0a78fcc2dc569298e70c9429d', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 360000, 1),
('fa3415e5d5c9e2834707b23b8d283bf53fa7cec6', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 140000, 1),
('7e347e0ef4b00a7ca2d5b80bd79abf458d4b845b', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('c386ec84aa172cfffcb2e73d7653a8b20bfd4d6a', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('5e902edb0bd41620b557d90c3505b51271c1b890', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4420000, 1),
('9e15b3665b066cda5ca1959a9da9bb9f3653b9a3', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1300000, 1),
('dd79346ad025d95373d4494bfcc9e1ee44a78071', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 850000, 1),
('ca44d5a31ad3a528a60bd29f58b5989a01bba3b7', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 450000, 1),
('ce26211c3054cf5b5134b98e072ef94cf9c310a1', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '58473fc553632a96d6a97544578c2e4061614615', 'E', 400000, 1),
('275efe5afbefc62280db0515ff0a3fa29020ffba', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('aed392c71ea0b3195a78353ede994182248c8ada', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 120000, 1),
('a58c4a9ac8abbcdbf44733ada8d7113bb6dceecd', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('6225371b1282db7d4424228349df2a424e6cc6ae', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('b2f90419de94ec42d1ff429c8ce2b240b3fda6b2', '4fde941e7d1c5995200493f1bdbc7723cdf1e67a', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('16f72dab372efc6f4a669c4e63387f1d2c5a238c', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 5316000, 1),
('68663282b824a1ff4e8c1876c72f24c3ab6a38f7', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3230000, 1),
('443b7e900f89bc6ce5e994be06aedb3ad077dd00', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 440000, 1),
('4b6f19c740afbc038efa2ae7ea166357d2833714', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 440000, 1),
('4618103ece327a5933738adfd407205f1928b6d6', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 440000, 1),
('14d311a5698b3d5b2049eea2ec3f033ff9d105f4', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 440000, 1),
('a12a8f22c540f5c78057e1ddfe5a0fca9376b5d4', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 440000, 1),
('a999e63dfbdb068750323e21d63a6d2fb68cf7ee', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 180000, 1),
('6b51a5aa61dff065c0a6669588a76242b02d8be6', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('4ae54016998f38fea560c314675adb0fa86c4291', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('d76789a82bd75ef38f240b16988a7252770306c5', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3500000, 1),
('d630bc1a8390465e77037fd82484f3e76c925d5a', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1760000, 1),
('f52d14dbe1d637ac03faef8e36310d1a8085ebb7', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 800000, 1),
('eb7dd807769eda42e3fe6415907b13d23b10aed1', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 580000, 1),
('7187d566da9038d3949ab98d0b0f4cf42f738ae3', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '58473fc553632a96d6a97544578c2e4061614615', 'E', 360000, 1),
('0031b222058b44f44de6c1e8d05b9f3df81914d8', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('5870df5c7a9db9d7cc94a9fde0590126e79af9dd', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 213000, 1),
('8fd6f8dc9436614c8afd6bc822dabe011677fd7f', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('51a0c45b78ed7ce6dc0cdb60060ad7731d3102e1', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('29ae2ca4fad3fe32badd211e653c852f5e187890', '93da267ef9bc93a8c840ecc4cc0f253901d0ee8f', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('ee8abe112a1130616fa1ca526c72c5b312340d9e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 9413000, 1),
('6f8431de65f9880340193baf8bf335c126ae9cd8', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 5081000, 1),
('6f50ca1e3ab38129eed312b497f1e4fadc322100', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('f57372cd3ec8b6acaf093e47f7fd90c09d2a5420', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('5645c83eb69b2d86f03d98efe6e860d3a680c288', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('de761676ac9792b155cf82e1a81fc7956e6f2f2e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('5eaafbbe582b600246545f25f498f86ad84629e9', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('a6d728a6d216f6c5b71bcc66a7d34fae1aa9b49d', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('f1e333c59d911ff1f63200c270da61f1f42afbe2', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('fe5dacf9ca681de3490e16fe7ffa02f37f040188', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('237623ac6ecbb5bc30fb77a6cef7434e463c4e65', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3000000, 1),
('41654a056f773dc136fdce104ec168f342d03f75', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1050000, 1),
('27bdb2023b06f30336b0e4d71469121323dab40c', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 750000, 1),
('67be6cd1cf3466c7dca78753b1f522885c8a4d82', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 550000, 1),
('5b7efb32cfb1e5c103b63aa35c21a9a5737f00b4', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '58473fc553632a96d6a97544578c2e4061614615', 'E', 300000, 1),
('18d8cb01505c8ae8c1e52fbb4510faa560028cde', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('a8bc521a4cf2585aa013fb7c065e14537bff0028', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 80000, 1),
('3a13dacff00fa10cfd41bde680ac226e178a022e', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('41d2c99d1e4fd3eaeebde89fc6a9ea81d7dec237', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('e74909a68984d3ea2e239ec059c8ed42b06b795b', '3a1d27e07bf54c0c65f366de3be44e869a751bbd', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('cf32ab2fa1d0a37d1e745c86d7f252973cdf21c6', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 16226000, 1),
('722f30e0fbab0596af1b73c6370907f5ceee241b', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 10824000, 1),
('56d8abf4c5378ca1319bab79843dc98cad5a8d1a', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 480000, 1),
('7e8f78fa0547184f4da1fb8795b2d73a515898ce', 'cac6bb408da778b1dd986cf581e1405801395cdc', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 480000, 1),
('aa3a91d5b0908ac7cf8a53c5f4ce52542c17175d', 'cac6bb408da778b1dd986cf581e1405801395cdc', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 480000, 1),
('7d4786aaa7d894eb975fbfc4c546bc266988c784', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 480000, 1),
('7954ef15ca92d08cbc63f5c87b03b909dddfe485', 'cac6bb408da778b1dd986cf581e1405801395cdc', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 480000, 1),
('23eb982bd8dd514bd70680900e902e0a591c209a', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 190000, 1),
('a39c5ce7269bed4e2e6da46531d7cfa13b34b5bf', 'cac6bb408da778b1dd986cf581e1405801395cdc', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('228dde71f571328e307c54e6f5f1cb1b97d5f187', 'cac6bb408da778b1dd986cf581e1405801395cdc', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 170000, 1),
('244a808ffd7f4c3c9066150394686e16f3ec71a6', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 2750000, 1),
('fdc53bfbc0b36584b7d786bb85cc506ae5598537', 'cac6bb408da778b1dd986cf581e1405801395cdc', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1490000, 1),
('2f7ca213068677cbd8fe9b59f3c00df6a58d71be', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 760000, 1),
('8f24bf02707996a90d48f6b54ae587fd2a1c74c9', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 500000, 1),
('3f006d2eb650120133865fbb370711274311bc69', 'cac6bb408da778b1dd986cf581e1405801395cdc', '58473fc553632a96d6a97544578c2e4061614615', 'E', 370000, 1),
('788ab4e4a4efba5cab12351368f8db36074329d5', 'cac6bb408da778b1dd986cf581e1405801395cdc', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('848d5477cc72f25dcc682e8c73040c2f4615dc65', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 145000, 1),
('d3f90d91540da1412d8e147606afd667d0c2de3f', 'cac6bb408da778b1dd986cf581e1405801395cdc', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('d1279aea8a2a348c60917f8b3b64f027ea8bbfbd', 'cac6bb408da778b1dd986cf581e1405801395cdc', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('154a6cfe4818ffe8a32a6272528f445a9f9b7508', 'cac6bb408da778b1dd986cf581e1405801395cdc', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('67cb6ea7de67c663b438092ee91d970b790be305', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 14568000, 1),
('d7f7b4a7c0223f8d1f5f6dc89c0127dc3dfc57d1', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 8193000, 1),
('af4c2e8a3f4a6038723b8d50be95c55b3c96483c', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 580000, 1),
('8e7ed59591e7860e36ec72760391630319c52b0e', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 580000, 1),
('5ec79e334ff68b874144f24062d057f7374e3dca', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 580000, 1),
('cc5855c0f7a4bbf8011babceaf5b64eabe1ea9e4', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 580000, 1),
('ddb268cf61f356f02d545378fcbddcfc40be9cec', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 580000, 1),
('6046e0d0501b9082b7a5a621da70f34cb2f8e385', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 230000, 1),
('b7a5845d4ba41ca7b2a1c6141e7134c541e862b7', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('1419a86a806ffe58936746699d08156115f74aa2', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 170000, 1),
('eb75efdac6ac116fdcd1ac127645c1d7dd383e15', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 2850000, 1),
('906222beceefde1e5015d2ffe70422d13bb8d168', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1670000, 1),
('c444c220338b6638d44090dd21f4c3c728775ac9', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 760000, 1),
('c8238dbf3518bd98a017578ce7e5a4d88d4b1477', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 500000, 1),
('a6321937f5256e6fcc334aa3c0b91f2f75706680', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '58473fc553632a96d6a97544578c2e4061614615', 'E', 370000, 1),
('9b21278a16a17c9c81555b3208d319b99f0197b6', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('894d2d914fb4d7253fb9c7d0560bf2c4103558a6', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 355000, 1),
('4a84141c3971b758235d40eacc8f2f5984245e21', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('b2a3066f651dcf82ffe2e49beb0711b21437dcc2', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('487c56f073f879dc15e25c39b4632ad0dd073c53', 'eb2b2b2ba18dfad8157b206fb4e1f03d6a985017', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('5ce770ccf6020a21caf1f86a13a2f22e23dbd0ff', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 5583000, 1),
('1fba41e97cbf0c8b0129f085fc3a839744e411b9', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3016000, 1),
('3630f94b100b5dd7f642ef9f6a49f04c6229b2b7', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('77ded29e3abb61f5aa7a309907f4461ff8c86b4d', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('783519ce82d7144811554971727d5941d822a091', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('d73878b21e15afb843d99c9f5371987892021709', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('a2543c35a65a6c751dae347aa0683d9b4d54bc85', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('30fcc58d2181dd1f21b73768d709c9ec20dbea5b', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('3e9d8ac4a588d3cd7d8ad65a0cfebd006f47bfe7', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('894ef53f7ac9ef044a84b84ad5130a25659c19ac', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('dc7720c8a07dea16c2ad105d5bccce700ff3a4e2', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3820000, 1),
('d0b1456fa3db4b3aaa00925c87ccbd140592a9e7', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1200000, 1),
('9b4d32022dca42c39bce13489d63abe9ec79be4c', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 868000, 1),
('2e960633f0f1e3dcd0cc2bf35310b53f87e194dd', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 450000, 1),
('d7e6add84c43b0ee6d04c3e40147bffa496dfc7f', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '58473fc553632a96d6a97544578c2e4061614615', 'E', 380000, 1),
('4ca13260efcf5631cd1ae312ffe1549cffa77842', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('dcddd1150efe89bfa233dc316979c44f2681439f', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 75000, 1),
('43a5179d07937c05fbcdad9d287a90e0536674cf', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('85af05798605abe17ecf936e1ca7aaba51fc5265', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('ba10899b14af84b8b9311b719113ffc475fc148c', '1da7130fd358dbdbe719cf99f9af0b44b84a5e5c', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('4b5c72c97002ba1f5bea3826b8f996ca521ac421', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7295000, 1),
('1ef744c59285a9fdaf8228f9ba10bd665a546c94', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 4867000, 1),
('5da3c353075e9b07ae66a7137f4ad0887b97a259', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 410000, 1),
('018504a26cb8c6f7f484128a5b3a2e11a81fcea6', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 410000, 1),
('9993779a53ccc9c313f73e111871de812b83f4d7', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 410000, 1),
('7342637d907279841280e99074f8211099fd131e', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 410000, 1),
('66fc811a5bc415ebf3cc4cf6494a83811a42ba50', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 410000, 1),
('8d9558e8120cb8e36a7e474bdf25d82fb55afba2', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 160000, 1),
('f4ef6678f9f8329be30c6226737f15e52165000f', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('aa86d7c1ebd24de82b284ac1de62ff828f4e7019', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 120000, 1),
('c33846b2ba86440ad4f26688703b95fb7c2430db', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 1260000, 1),
('5945b1aad7ef23a8b33b54d777927dee0be3cfa5', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1030000, 1),
('5165919538ad1e02afc702495dd65a19eaaff0cb', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 860000, 1),
('c31e84ff1581598d714cd9d7e524aa94fcaa5922', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 400000, 1),
('312630c5611176fbff455785183d99b6b5cfd98e', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '58473fc553632a96d6a97544578c2e4061614615', 'E', 360000, 1),
('c6a967f2dbf238eb41fc81b78724b6472ea69311', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('893f139463c49400ff385039a86e65370899cfe2', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 217000, 1),
('bc818a152a2850a97a1f0b97c16761199b7974a5', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('b978ba9a746daf7ced5f6e66ff04462a56a67a95', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('a29c8d9f779824ea3da806f4c5b2a806d3ae16c9', '9dce0fd18b08c20bf09f4ea40efc03d9a0053f1a', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('2aaa56f68417720046daf3bb4dfd1c363f237f13', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7444000, 1),
('d1e66cceb7106f22c38ee650695318bae649dd0f', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3829000, 1),
('0b71ae43dfe5d75f662dd9d061e93af612721de6', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 430000, 1),
('ec836c086fa325da0218bb29a2ab2aa1dac68541', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 430000, 1),
('11b4b21bd3d276a337743880465d3dd76528c150', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 430000, 1),
('d55ef6071fb838f7ecc2658aef827b4f64c162cd', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 430000, 1),
('a794ca64a62dc9b642d526f39e0857cde3db7b4a', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 430000, 1),
('a3b4856354fb06af677da26d594238b4052a6644', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 170000, 1),
('2716da1927c564554eb7e614d539e1f962142a00', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('d64926175f6b01317a37ffb82cb3f8cbeeb09291', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 130000, 1),
('8b082f9324ae1459c19ef094669bf1c062d1daaf', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4820000, 1),
('4d19603e285d5570c0fa38df7e12146c412f7de8', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1550000, 1),
('5c10ab17fd0b52a6c5fbdfd48a3359b28ab530b7', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 810000, 1),
('2681766afdb9c49c6b63287bcb7c605427e1a0a9', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 580000, 1),
('08c23302b22261eb0136bf43c711e8b8698aff7c', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '58473fc553632a96d6a97544578c2e4061614615', 'E', 390000, 1),
('cd651975787d5bf9c42a5b072f355ca65ba74e93', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('b17c1f0816fe9bb9e443646a72ab815d912dd758', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 145000, 1),
('00724ef0ed3b40c9ebc570e3327fcd33932c207d', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('9d15cd53333fc631e5c1d36651adf12cbb4b559a', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('babdd915afa01e962052b0d0c984bc83ec07fb1e', '708a274ce52bc33ed7801d71b0d1f4e5307e7f1e', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('70433ff4635af47df666d7df4676ddd2d8b677ca', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 9348000, 1),
('7e8a5befdb1d952b736be57298a24e1a195de76a', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 5113000, 1),
('d64ca9cbe453f07951d65126368a3a60c082b5d8', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('a41802c2001f3267aa9373f32a9618599fbb3602', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('f5b230cd76bc9c69b8f1e6462f9a53e1a44c15d4', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('7a39ea41b251d75fb2d793cc56f0a820455875b0', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('cb9b5978a7761788fcffc43749d1f20a0820ef85', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('97c859d19f1da3e06f3f0565be85b246590b5d1c', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('1d07c248270f1a414032ee858aa6ed7ee5e2c229', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('915af1da4ea9d06a7aa82ee7900895909da866e9', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('4c89404fde37fa2911d76dfd7233b30936d212c0', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 2030000, 1),
('94e84125bf062eecd8ee292e4f057217a57b3e58', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1300000, 1),
('b8a26e0b44e0c9256eab5c4558d791952bf83264', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 900000, 1),
('dca56bcd2ed32a6bab29ae76ecd62821c9b262bb', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 520000, 1),
('b8d09427cce2a4739ce6f247a4924b607749cf3b', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '58473fc553632a96d6a97544578c2e4061614615', 'E', 390000, 1),
('d025ca35a70e390be4391f266bda034ca32eb0b0', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('87451f4bd81d8ebaaade3735f87e0088cb26b34c', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 75000, 1),
('a0e345464d78bdbb60a519b771a4aaa86a8cdf2d', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('2df76fb2633c99da848fd8d7be5bfc056cea11cb', '330bc0efcbfc115f11d36d01b05ede6f42236da0', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('45a87df71f98d59fff78a9971f677d310b21c8dd', '330bc0efcbfc115f11d36d01b05ede6f42236da0', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('63a28cd24102803d282df4ef247b772f6eec141a', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7658000, 1),
('11dfbf614b5a68954763c882168f24ffc98de70f', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 4182000, 1),
('0147c8402870bbf8097403611ec4f659d31bd5eb', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('9c1608c1cc7de266327ce55a4fef75d0ef99230b', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('7a779d17fce3e5fa99f30f858ecfd2ca3d1d98c4', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('acf9c9a1daef1544f7b8f611463651212fb1f6a2', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('8a74a75657d5b8fb22c04b1d1f29568c691435b1', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('850718455dfae2a806b0a9ee0a67784901c0dd1a', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('823d678ca7b8551ae7ca0904b3e4e35160cbe989', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('f2848195f29a564788668fe8fd5550dca71c2bd7', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('9aadb84e557eafdfd4ecb9fd82d8d6490811e15c', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 1850000, 1),
('ec367f0971b868b4390767d625047101f7e3b237', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1100000, 1),
('ac71b3bfc3ed4238d5f11df5cafbaa924f503ead', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 600000, 1),
('8bc067ab32584bb35fd74bc8f630f5c4005ef0f5', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 450000, 1),
('0b06b642ee98c043d8694e04a01b0a123b7613d7', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '58473fc553632a96d6a97544578c2e4061614615', 'E', 420000, 1),
('732609487c5f6f4b6f9fa45f24826e8ee56aea25', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('ce15e3fa4827f62a3d3b2211160acc5b86839b9d', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 131000, 1),
('669007d45973059303cbc4ecb6df9e7bf754c059', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('497e307069170f974b0e7c85181185e09e8e72d6', 'df2e581894d521cc3f6ed134ccc4d057550337c9', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('eec75322cbdac170433a215af3d8b790841a530a', 'df2e581894d521cc3f6ed134ccc4d057550337c9', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('5a139fd3cb090c7d799be9cab8c3c1c35de5d0e5', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 10824000, 1),
('def42f729c22c0f10c743aa186cdfef697744f80', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 5102000, 1),
('508c1d3bce21058a6e3b4a11724a72262e787704', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('65bcf0ae7653d93ceec6de37198fb1189ae593f3', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('cfb3a3f9e0975651b5dd91b2077fe1f1b33c52e7', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('36211a299dfd3bfc4ae14c4ac8b90e13dbba6a13', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('d64eb68eb45014b24de60ee48cb83f1314555e63', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('ebde15c5daa09188d369a8385b9f20560fbb87b1', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('7936513b827bf829c83b292ce66736d33fcd1e84', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('e9f3673d43ed1638a4898283313830a8134db823', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('bd6ecc4ba09d03c7a40f3a074c50889c3b6623df', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 3200000, 1),
('8f3280c73ca629c8ba3bfba3d1af618da279aeaf', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1560000, 1),
('5481c577280cf0f87cf6c0831ec3fc4c72d198d5', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 690000, 1),
('14d901227d50f1a70f2919020739ca7ec01acd7e', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 550000, 1),
('47cc40768d7011e085a53c5a6e2883dc8f684c70', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '58473fc553632a96d6a97544578c2e4061614615', 'E', 370000, 1),
('3328b0ed12ff2c7b4dbd25e3603e2aad76988d8c', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('23f67d044eb916e659d09636f9b8f093291a61f6', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 110000, 1),
('08f1e2b6fffd8320d00c0feec44714e0f49a32c8', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('21f7afebbd8c75da7263f9e9dc36e289984bec0f', '6e34f7aeaf90d916efdf09be2db9184a077d466d', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('3743b63d85a8588ba614fd2eaaa0cc63c82f593e', '6e34f7aeaf90d916efdf09be2db9184a077d466d', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('9cb7dc771a3e3898a21d5bc589df8313309e51b5', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 5530000, 1),
('b609675a6aaa3b50ef3b35db8566f7d57600e284', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2952000, 1),
('0716ae550c36ecfdeb4f8d83f2b3b9d19cf449fd', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('d093b8a63dc66560171421e7534015046e502fd3', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('591ccc69a5f00a9a4af497cf0c6f3725fc2920a4', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('0c1a96cb2b956031804caa506a35497ff78e6960', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('3884ed12899f8835732c9ea9df81ff7ec0fb54e7', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('b374065771ef1b4331e7da942edf722e9f3281b6', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('9aff90e59f47833a577d18812eceed4d22199a23', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('1e740ef1faa650dc0d27f515b76403f3156fe9ee', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('8627d4bfd68fd008092edc8efca4a737cc88e316', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4240000, 1),
('c629b66e1c43fa1866481c3e44bf22e006615e15', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1160000, 1),
('6ddb4c5a040c82eff01eb4da0fc136eda03086fe', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 890000, 1),
('a2cae1ccb93b6e8702eaa592d413822896cc7a62', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 520000, 1),
('4d57b3da9a69ed958bffc051fd62164b0aa1fcc2', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '58473fc553632a96d6a97544578c2e4061614615', 'E', 310000, 1),
('b47cf37f8c8c4bf83711311bcf118eaa9b92ba2b', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('ab673c7271a28e703b9b459c60cfe9ab4fbbf024', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 217000, 1),
('e55069683b5fd993457b004d1bc0d2f8b1a891f9', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('2f314f193dd18cb85bc129a9e78a3e7577e994c4', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('1503f1dea2a327a8de1f1cbf39efc640872fc14d', 'fb3f0d79e8b5bd2fcb9d82d7b79b81847b21341f', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('28ed060b761eb24d62e9e65f209d1c6d8789fcd8', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 3861000, 1),
('350930a612208eca8f84c07e98aefdffe82a52c0', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 2268000, 1),
('3b142099c57a4dbe53080928a8fee75382c5a87f', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 380000, 1),
('7cfe0e9fde9ed52f47ff2bd727982305a8c4611f', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 380000, 1),
('4a0a4f166d96130f73e8c8a65564a7f6c41af28a', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 380000, 1),
('7785f596aa5e5cf55ce8eba19cc6d8f56169fc6b', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 380000, 1),
('218311e3466600b3c71b23639d3b2871c8639d79', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 380000, 1),
('b96e63e4645f771ffe05536f33d2833fc6fa4725', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('03984f265a3d257ed1a771bebfec8375a356f8ff', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('2cfd70a06dee2627a191865e474c98333320eeba', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('b7bbc83757efc187e7aa49bf54a1911f5bc0cf86', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4680000, 1),
('a3a2e84bf8230e31ebea142ed3e9dfb95fc23994', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1250000, 1),
('2913b5eba4c813e797163d1961e52718667c4be7', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 630000, 1),
('257b22a5e1458247b03a9d55438fdce1055f6e0d', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 560000, 1),
('d76d54b3fca9c5befeac800baebe1370c8174796', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '58473fc553632a96d6a97544578c2e4061614615', 'E', 340000, 1),
('51f4ba171d349421b856b1f26d6356b14546cbcd', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('957a674b4b5db36edb3d33cec62e391ac2a67f98', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 125000, 1),
('7582091ce2aeb20decd20d2d14cc718553f0bcef', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 130000, 1),
('1783aac3a64e616b5acdfae095ec6c522f224693', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('c5dad49b111a1893ee44edd39f30130b2e0aa98b', 'c25868ef9cc8b9d93e7043e07e354b2946f554df', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1),
('c690686bdd30688e6eeeb266117eb9f39970dce2', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'be36de438ed04d253d192a7abae9ef7cf0c4738b', '', 7252000, 1),
('be1f44922a69216c29dea37266588f09b6826e50', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '4d84ac8a38fd5e8cb2617c89c4de23475b9173c5', '', 3808000, 1),
('99c3238f694f82945fdabcb61463bf9f7f87a6c4', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'ebf228d8a650167838ab269a8c55dd64c41528c8', 'A', 370000, 1),
('ecfa24a3450ff401f93de87bf8ffaa3c88408c1d', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '476ad41e4a4594d3be69db9c4b06a94096887ddd', 'B', 370000, 1),
('9a87a8ab2105463a73b439d99ed0cb3a59008e75', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '7d6b672b9b7d323a88dec61826ac28826f00d7ff', 'C', 370000, 1),
('5fed1e5b9702234a4603f64bfc0252cc283efd6d', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '4abd6b5e5c0834565115dba565d1a0b8b96da553', 'D', 370000, 1),
('2e297d44e5d447b91516e97bc12c768b98cca9cc', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '0a728653630619fce4b65553fb6ec31afce577a1', 'E', 370000, 1),
('bc76e02c9d5b0da021721dcb3ffa2518cd578159', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'd763948fb1b2529c209a3404bf0f5ca05a67cf0c', '', 150000, 1),
('3b6dd6c6fac0e90c03a0a2f87d5e8045dd53a4be', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '35800a846ff500f3bbafe348fe19eb20726bfc92', '', 0, 1),
('01a047d18b668ce1ad261591a0c740d543323331', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '22900bd4275c4132998f08ddb2a085964ddaed38', '', 110000, 1),
('d5f23d39c78d64b6a82cbcf969e9a47d593b8c3b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'e163e044f3f4ce8fbf39e8e363424b013089a2b4', 'A', 4960000, 1),
('f3fa44b8371cdc1eded951fce21df8f562ac8c9b', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '6ce322773d75e0d26197deafc9e6dbde34f83dea', 'B', 1214000, 1),
('3c69ba026c49ee8b3e842b00e45df68045b02c46', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'b3b7d4c8291c2decf5616f3a64dec20d34cdd68f', 'C', 703000, 1),
('f0aac8cedd1d3510b68877e8d1f0d894ab1f3f29', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '4c2dae5ca007b65671d75198c66942ca4ed26a9d', 'D', 510000, 1),
('12b9869f43a32dfc292c9b680085d46380f19273', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '58473fc553632a96d6a97544578c2e4061614615', 'E', 310000, 1),
('8dbea11c5f6a74d74af06ef17f42f941aaacd161', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '4d7115c27736fb04e9ed9a3bd2d5c9b1067c1c43', '', 340000, 1),
('728a570aef5cc6a456401f92a70bea63fdaeb3b7', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'da5ceab13e436f7766534a536032fca6e1db957c', '', 232000, 1);
INSERT INTO `par_sbu_rinci` (`sbu_rinci_id`, `sbu_rinci_prov_id`, `sbu_rinci_sbu_id`, `sbu_rinci_gol`, `sbu_rinci_amount`, `sbu_rinci_del_st`) VALUES
('2187262029f1cd8950239cceef67d0a44380da66', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', 'fcfc7b460a4d4cc3e67141cb4f314d7bbfecfb07', 'B', 200000, 1),
('4af3a77f32b937ad8828b9fc32b9279a832e8292', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '3b234f8bbff671844bfca273ad05bd95e1f2d2d8', 'A', 250000, 1),
('2f9f13578684db9bca8f4f00a747a2b4ddad73a1', '11bc8ef9a02ab3813d9b695bab55ffe2a746e080', '1b1596d427c76aada53c972f6e87c9e3d573828e', 'C', 150000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_status_tl`
--

CREATE TABLE IF NOT EXISTS `par_status_tl` (
  `status_tl_id` varchar(50) NOT NULL,
  `status_tl_name` varchar(50) NOT NULL,
  `status_tl_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`status_tl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_status_tl`
--

INSERT INTO `par_status_tl` (`status_tl_id`, `status_tl_name`, `status_tl_del_st`) VALUES
('42cea4fea50038ba22fcb8d00764c90b9bf8a2c0', 'Selesai TL', 1),
('1451760f495995d4195af60bcd7ae117630ecd71', 'Tidak Dapat Ditindaklanjuti', 0),
('31623703c9a29ae59d3f06aeb11fd82515403b2b', 'Dalam Proses TL', 1),
('1674c2c98df4c2ae5984c91e0db68769c5370282', 'Belum TL', 1),
('ddbfa5b4e34d302e1d12e28c0983d6b6fefe72d1', 'Tidak Dapat Ditindaklanjuti Dengan Alasan Sah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `par_sub_audit_type`
--

CREATE TABLE IF NOT EXISTS `par_sub_audit_type` (
  `sub_audit_type_id` varchar(50) NOT NULL,
  `sub_audit_type_id_type` varchar(50) NOT NULL,
  `sub_audit_type_name` varchar(100) NOT NULL,
  `sub_audit_type_desc` varchar(255) DEFAULT NULL,
  `sub_audit_type_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=delete, 1=aktif',
  PRIMARY KEY (`sub_audit_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `par_sub_audit_type`
--

INSERT INTO `par_sub_audit_type` (`sub_audit_type_id`, `sub_audit_type_id_type`, `sub_audit_type_name`, `sub_audit_type_desc`, `sub_audit_type_del_st`) VALUES
('9b176e891bb95b7bd911f518675359a7b00a9f71', '0525307297f9bed8984a8054918087dcf03c4bcf', 'dkjfkjdkj', 'jkjkjdkfj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_audit`
--

CREATE TABLE IF NOT EXISTS `program_audit` (
  `program_id` varchar(50) NOT NULL,
  `program_id_assign` varchar(50) NOT NULL,
  `program_id_auditee` varchar(50) NOT NULL,
  `program_id_ref` varchar(50) NOT NULL,
  `program_id_auditor` varchar(50) NOT NULL,
  `program_start` int(11) NOT NULL,
  `program_end` int(11) NOT NULL,
  `program_jam` float NOT NULL,
  `program_day` varchar(5) NOT NULL,
  `program_lampiran` varchar(255) DEFAULT NULL,
  `program_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=ajukan katim, 2=approve dalnis, 3=reject_dalnis',
  `program_create_by` varchar(50) NOT NULL,
  `program_create_date` int(11) NOT NULL,
  `program_approve_by` varchar(50) NOT NULL,
  `program_approve_date` int(11) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_audit`
--

INSERT INTO `program_audit` (`program_id`, `program_id_assign`, `program_id_auditee`, `program_id_ref`, `program_id_auditor`, `program_start`, `program_end`, `program_jam`, `program_day`, `program_lampiran`, `program_status`, `program_create_by`, `program_create_date`, `program_approve_by`, `program_approve_date`) VALUES
('c72fc7e636ae05fd2f7155090378ca7a427c335f', 'a51852730078d23e3b48bf5972885364a11b17b8', '89a9a89e9ab60b3a2b4effd30baa16ce08e502b3', 'cb20d038bcf91d41ab8164ece8920a340e1afb8e', '9ca611db222a22298db1aa06a02564eebc25c3f1', 0, 0, 1.5, '', NULL, 0, '', 0, '', 0),
('ab0e7aa6f7a329b3848ad9e234a95b133728a99f', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', '142d19e55edfc7d6f12fb4e5893582bc8b1c1c48', 'f892539385e88cf3bf1a0a332d5e3bc75b1c7488', 0, 0, 4, '', NULL, 0, '', 0, '', 0),
('ac7e46a332f19a5b301f5fe1769cfb82a5f754cc', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', '2274713232a1ef625c8733e64c0bbc154826d5dd', 'f892539385e88cf3bf1a0a332d5e3bc75b1c7488', 0, 0, 4, '', NULL, 0, '', 0, '', 0),
('dc4e23db077948a7061ed96b146da5852ca1c81f', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', 'fd12f5b03a995475ad758363e1c0abd9b6b0f30a', 'f892539385e88cf3bf1a0a332d5e3bc75b1c7488', 0, 0, 4, '', NULL, 0, '', 0, '', 0),
('56a24b6cdcd82116d9ac39c387a5174f47df7c4b', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', 'e7ebbf13ec5cd2bb7b4eb74beed161b3760ef731', 'f892539385e88cf3bf1a0a332d5e3bc75b1c7488', 0, 0, 8, '', NULL, 0, '', 0, '', 0),
('143a447b7f6eda81db2d9bf606aebeada071ea93', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', 'cb20d038bcf91d41ab8164ece8920a340e1afb8e', '9ca611db222a22298db1aa06a02564eebc25c3f1', 0, 0, 8, '', NULL, 0, '', 0, '', 0),
('bb899eb02e705a1d2210e74091151e60e86c31c3', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', 'a07dffb7f397c31080a945aad570d0a34607dfdc', '9ca611db222a22298db1aa06a02564eebc25c3f1', 0, 0, 8, '', NULL, 0, '', 0, '', 0),
('e89443c7cb18a9543250d8b190e490a3b3625efa', 'a51852730078d23e3b48bf5972885364a11b17b8', 'cd4a39ce251cbd6cac31f86a890cdc44fb0613c2', 'c0477d4c4c27faba27a157df65e4c6868511c96d', '9ca611db222a22298db1aa06a02564eebc25c3f1', 0, 0, 8, '', NULL, 0, '', 0, '', 0),
('102efd77efc3a11ee7d4310923ec99ab10e0f420', 'd68d8186434feaa90c5b209087911d698c2b8170', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', '6a07b84fdf890def594e18f3efb39e18dcf954f5', '8279529aeed9547632d755851d5cd97a581d5b4c', 0, 0, 8, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1500278729, '58e5385e24299ad94436d5402dfcaf761228ba49', 1500278959),
('bd6f1948f13bd4ce39acb03cac40d2602770f1f0', 'd68d8186434feaa90c5b209087911d698c2b8170', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'ad1da4b82408bc0185b3717b68a84347b799b394', '8279529aeed9547632d755851d5cd97a581d5b4c', 0, 0, 8, '', '', 0, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1500278729, '', 0),
('a687909571149a8955efd2e3573f9bfd5503e4ef', 'd68d8186434feaa90c5b209087911d698c2b8170', 'c6d259cb746b9cafae5a4ef5ef6312328dabb0e0', 'd02cf622ee99c030cf2c6d3c1334da1abc7a4f87', '8279529aeed9547632d755851d5cd97a581d5b4c', 0, 0, 8, '', '', 0, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1500278729, '', 0),
('838d6f88b5de2ade9bff87df9208e00203716d46', 'd60860ab89c7749f74d5f58476ec5ea56a3283b2', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', '99adb82e3552bb8d4b824989dcb4867a32887e45', '2f19716b6fd9ce889e791e33d6ac184f1d09e736', 0, 0, 4.5, '', '', 2, '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 1500699093, 'acee4af556f81513a6f2fee4ac1adeb6b6beb317', 1500699390),
('6b9d7cd621295255529eca1ff254802e94df8f48', 'd60860ab89c7749f74d5f58476ec5ea56a3283b2', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', 'd76d42a4d9a072e5ef7f7f4a88505ea6a1f46c4b', '256ff902de9fb52a14ecbccf73b9be30695abbee', 0, 0, 6.5, '', '', 2, '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 1500699507, 'acee4af556f81513a6f2fee4ac1adeb6b6beb317', 1500699529),
('e9b34655ece8b3143c0fce923dd803ac35dc6ff4', 'd60860ab89c7749f74d5f58476ec5ea56a3283b2', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', 'ac35b29128646c006958e2ec8a2db4504906ff3d', '2f19716b6fd9ce889e791e33d6ac184f1d09e736', 0, 0, 6, '', '', 2, '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 1500699673, 'acee4af556f81513a6f2fee4ac1adeb6b6beb317', 1500699692),
('0b9a5286be7eb70d1be63f24d4fee275e5ac5e62', 'd60860ab89c7749f74d5f58476ec5ea56a3283b2', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', 'e5f00a396cef35488463f371b289a6506c3d265c', '256ff902de9fb52a14ecbccf73b9be30695abbee', 0, 0, 1, '', '', 2, '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 1501643108, 'acee4af556f81513a6f2fee4ac1adeb6b6beb317', 1501643658),
('fd6c08c56a71959fafa198e70162f6b165a02795', 'd60860ab89c7749f74d5f58476ec5ea56a3283b2', '4753013c0f7e57e6640dcc5af9c9ed0fcd54675c', '8b01613ac18c52ee0bd02b18fe51a8d69c1f8437', '256ff902de9fb52a14ecbccf73b9be30695abbee', 0, 0, 1, '', '', 0, '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 1501643108, '', 0),
('0c66b9d1dd3693c2dd82da279b47aacfdec740ab', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'ad1da4b82408bc0185b3717b68a84347b799b394', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453398, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503454134),
('55d8b1d061506f6ec365f52ca85127ef2781b8b8', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'e7fd65a46b38ece2e6522bc4d8eee4b317d9df75', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453398, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503454145),
('3ece5a6c7b12b47e80e199f45140d897bbca4702', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '058201d08759e38c02de809f3957091c3ba8c265', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453398, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503454154),
('0d3171f1c2b9882f1b1f9614e634aa09ff32176c', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '7c10f38908048783e128382920e6ef8a3063aff0', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453398, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503454163),
('cd1510ff0e0dc749ef5c83157c435ac63eefed5a', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '10187de9b7aadede852c57b71ee89858ffe82dbf', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453963, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503623739),
('c4c80c38510161f61173acd77e18b10d314956f2', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'dffd871143c92f919fd84649b2503de15fe51d5f', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453963, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503623757),
('9970556dbddaa00bfa75ced7ccfad1e665ae9fa8', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '636a403e52e27dc2df6cc87fe43e22195fff61ac', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453963, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503623919),
('7dc3b7468273e1d5b88f231084a2e9744d12c17a', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '6b84f3384536c68b44be40e05d68778075b440ae', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453963, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503623944),
('10baaaa80c0c1f876cab1d7580d0c3b112514956', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '38b09e66964f1c7379d45322e398b91529b21b32', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503453963, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503623962),
('4ed85d97801f33391abd8015eb14570fa829dc55', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '6a75dddf76980809a88d3859024d20aa9ccca691', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503632087, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503632224),
('237486e33373032ebf5e776ee66cbb2f5e9ba733', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'e87231afb5331233689102015396ee51d90633b2', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503632087, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503632235),
('36a05344ea2821563bfa865b441ca2f5373537b8', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'bd74d1cfd89d6db69c6c221fc0f2cb5ee43a3c4f', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503632087, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503632241),
('bba7b87838a6a7f4e906ba6f7df6eb724a648c50', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '279cc6f919cc049c27b696579f26b45cb689fa45', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503646457, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503646689),
('248690a0b05c618df46154608933249f43fcb796', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '742e181edf8420ee005ac83ebf3821786311caba', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503646457, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503646696),
('2b0c8b9b3c2ac9016b46d9021d3ee89a4b2dc4c8', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'c69be875fcc43892303207ad17b82079c6f35d34', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503646457, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503646704),
('32a9ff5437edd6882f8b28d96ebbff0a7b81e315', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'b56a88b93c12a44acdcdad122b444f273a7d2640', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503890662, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503891049),
('cbbba85f6d9442779f25c9008c08dbf97ddf93d8', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', '99adb82e3552bb8d4b824989dcb4867a32887e45', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503892176, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503892257),
('9ca557523455473e5caafdeba9a7677554e81c64', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', 'dd454917c76e5afb518f15054a5568838c49107a', 'ad6a192ba904cca5716b64139da5185f0afd748e', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503892176, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503892263),
('ad6b62137dc7091e533c348b6dcd1fdfdd4fb1c1', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', '7284218a341b1b188d52f4565cc31148d99feef7', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503979020, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503979115),
('2738198bf6475bf38cf1bd6144c123a79601b4c6', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', '954d3aa28f0b26c2b2f349857ba7599964a05c49', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 1, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503979020, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503979124),
('616c643d55b29305838ee2bf1dd5f7ba48473b4e', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', 'ac35b29128646c006958e2ec8a2db4504906ff3d', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503980746, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503980950),
('bd582496e9dfd2a6a0fd440f16d137b16f09922a', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', 'befda496e49b8587bcbfb69484f438bb72135ba5', '72e94e1c581523ad9a729c3e04ba45311a9d48ec', 0, 0, 3, '', '', 2, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503980746, 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 1503980957),
('98b37e328303bf6d3c1ca8f600bffd4bcb0f85a7', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', '99adb82e3552bb8d4b824989dcb4867a32887e45', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 1, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503990005, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1503990016),
('4e532fb02fe817a35a1d7876d9ef959897b513a9', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', '10e250595e3f6c15ddeeb0fafa9a4a6fa01c5d00', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 0, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1504066741, '', 0),
('0e90be0e18789e448b52a3306e2e12e8bd2947b2', '1b5437ab5b04a7cfe04e26128bf32d21e93d1b1f', '03069113bfbc59d04eeebbcd13f40631c8cdc71d', '1debe9d2c40ccbcf923f27312bb990623f4461e9', 'dd059a1e2dca8475452a3b71c8c1978d26b9592c', 0, 0, 3, '', '', 0, '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 1504066741, '', 0),
('2896d52840daeafcdab68563d53cae33448f68f7', '015d816f70352e3b473482c3c6dd08afdde8fe97', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 'e7fd65a46b38ece2e6522bc4d8eee4b317d9df75', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', 0, 0, 10, '', '', 2, '9b44ac8966798da6f357fc1689342e187013cd51', 1522993131, '9b44ac8966798da6f357fc1689342e187013cd51', 1522994824),
('97f47f6ff12805fe45a8a7a63080508f15dae419', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 'ad1da4b82408bc0185b3717b68a84347b799b394', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', 0, 0, 5, '', '', 2, '9b44ac8966798da6f357fc1689342e187013cd51', 1523886305, '9b44ac8966798da6f357fc1689342e187013cd51', 1523886319),
('95b985be256bda898add120fc98b7ed9c9a5bbb5', 'c2784e3df1f20144b6d5ffa2bc123549d93228f4', '56d04e0f55b7d9a074ee4ac3b81353f59b8ac72a', 'e7fd65a46b38ece2e6522bc4d8eee4b317d9df75', '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', 0, 0, 5, '', '', 1, '9b44ac8966798da6f357fc1689342e187013cd51', 1523886305, '9b44ac8966798da6f357fc1689342e187013cd51', 1527494333);

-- --------------------------------------------------------

--
-- Table structure for table `program_audit_comment`
--

CREATE TABLE IF NOT EXISTS `program_audit_comment` (
  `program_comment_id` varchar(50) NOT NULL,
  `program_comment_program_id` varchar(50) NOT NULL,
  `program_comment_desc` varchar(255) NOT NULL,
  `program_comment_user_id` varchar(50) NOT NULL,
  `program_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`program_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_audit_comment`
--

INSERT INTO `program_audit_comment` (`program_comment_id`, `program_comment_program_id`, `program_comment_desc`, `program_comment_user_id`, `program_comment_date`) VALUES
('737381154c27258a72bc0ce278855bc7e105930b', '102efd77efc3a11ee7d4310923ec99ab10e0f420', 'oke', '7bb4c5c91c49d2caccadd8a0ea7e64233fbcf89b', 0),
('1c09d3d546071564a766569634de224ac6978cdf', '102efd77efc3a11ee7d4310923ec99ab10e0f420', 'oke', '58e5385e24299ad94436d5402dfcaf761228ba49', 0),
('1d088ac173f9674c69aed539a71a93232f62f78c', '0b9a5286be7eb70d1be63f24d4fee275e5ac5e62', 'ok', '780cbcefa876e8865a8b7a5c7b2b698a18c85e5b', 0),
('4cd2b3eadfefbd02c3291fce908c9b28ba2e27e6', '0b9a5286be7eb70d1be63f24d4fee275e5ac5e62', 'oke', 'acee4af556f81513a6f2fee4ac1adeb6b6beb317', 0),
('c79ee2d56867d8a16b3d4abcbcb86202b5b9254d', '9970556dbddaa00bfa75ced7ccfad1e665ae9fa8', 'Dapatkan SK KUPT dan SK Pengelola Anggaran', 'a0b3093e2bbfb17735f2894a306bc057a49496d5', 0),
('a7a17d0b5f07f747e3fb78b9c9590d78a1c25a40', '2896d52840daeafcdab68563d53cae33448f68f7', 'acc pak', '9b44ac8966798da6f357fc1689342e187013cd51', 0),
('2c252d987474f8187ab1ad0aac655bb34f89dc8f', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek lagi', '9b44ac8966798da6f357fc1689342e187013cd51', 0),
('408f783cf817387b4b0579c95039bdb691e77d02', '2896d52840daeafcdab68563d53cae33448f68f7', 'acc pak', '9b44ac8966798da6f357fc1689342e187013cd51', 0),
('4c83201e7ba29b30de6d13907097a00bcd3681ec', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek lagi', '9b44ac8966798da6f357fc1689342e187013cd51', 0),
('5e12dfab789772c31a5ac34ac6bac934547e859f', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error', '9b44ac8966798da6f357fc1689342e187013cd51', 0),
('b418cbe4b3e083ec4151cc78dc02343d1a5c9d95', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error lagi', '9b44ac8966798da6f357fc1689342e187013cd51', 1522993841),
('d8e08e2a0aaf2a473b98bae85bf28f3248d5875f', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994374),
('3b9d1ea354f84d91b43d0899bda3f760d7047678', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error lagi', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994439),
('38148775f50fd0d79fba7e80a9c0c32936148366', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error lagii', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994463),
('87229ce14f044f8e25384d90c01e2ea99b7fbd51', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error lagi', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994526),
('2594fac8851ce550d0592541a5d32d54a529d47b', '2896d52840daeafcdab68563d53cae33448f68f7', 'cek error lagiiiiii', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994547),
('5b08cbac25d435dd57274d10bf16489151b6b40d', '2896d52840daeafcdab68563d53cae33448f68f7', 'cekkk', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994582),
('03f9dacd04507cd786c9da2fb148e514a099a18d', '2896d52840daeafcdab68563d53cae33448f68f7', 'cekkkkk', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994617),
('a14bcd9c7991e84e5affa85f788f2fa6fba6512b', '2896d52840daeafcdab68563d53cae33448f68f7', 'cekk', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994631),
('f1b58fa3818efd236d814713ba5f9881ab8b3118', '2896d52840daeafcdab68563d53cae33448f68f7', 'asdasda', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994706),
('955c891db84bd0a144aa62420e10e18d69f1c162', '2896d52840daeafcdab68563d53cae33448f68f7', 'asdadsa', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994713),
('56531be2ddb61e7e6bd2d8f0476d3e320bb4f7d1', '2896d52840daeafcdab68563d53cae33448f68f7', 'cekeekekk', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994728),
('45903d1b6a15201a245fdc808266e408da61758f', '2896d52840daeafcdab68563d53cae33448f68f7', 'jdjdjjd', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994736),
('25eaf693073b58ed54223c2f6fb8430ed003d7d6', '2896d52840daeafcdab68563d53cae33448f68f7', 'acc pak yg terakhir', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994803),
('c8451e0c958a636a28b97d483d22c9192c26c125', '2896d52840daeafcdab68563d53cae33448f68f7', 'okee', '9b44ac8966798da6f357fc1689342e187013cd51', 1522994824),
('5652866e16038b2b0d8733fc935536a4197f59ac', 'afc0930adcfc4c86dafc68a07c83b0213c995a5a', 'katim', '9b44ac8966798da6f357fc1689342e187013cd51', 1523046216),
('a87a5a6e9f941de3576548d74264803b12e1b123', '95b985be256bda898add120fc98b7ed9c9a5bbb5', 'asdksajdassad', '9b44ac8966798da6f357fc1689342e187013cd51', 1527494333);

-- --------------------------------------------------------

--
-- Table structure for table `ref_audit`
--

CREATE TABLE IF NOT EXISTS `ref_audit` (
  `ref_audit_id` varchar(50) NOT NULL,
  `ref_audit_id_kategori` varchar(50) NOT NULL,
  `ref_audit_nama` varchar(100) NOT NULL,
  `ref_audit_desc` varchar(255) NOT NULL,
  `ref_audit_link` text,
  `ref_audit_attach` varchar(100) NOT NULL,
  `ref_audit_del_st` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ref_audit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_audit`
--

INSERT INTO `ref_audit` (`ref_audit_id`, `ref_audit_id_kategori`, `ref_audit_nama`, `ref_audit_desc`, `ref_audit_link`, `ref_audit_attach`, `ref_audit_del_st`) VALUES
('fc506ea499fbc0c48b82e584bdab8f560b103e39', 'fc506ea499fbc0c48b82e584bdab8f560b103e39', 'qwerty', 'Memindahkan sejumlah risiko dari organisasi ke entsdasda', NULL, '', 0),
('c0a22838f9b6bd16e4b05494220fa32123f26383', 'c0c1cf2120d8017e100cc9283bb116e3a294aa7e', 'Tambah', 'Hari Raya Idul Adha d asd', NULL, '', 0),
('0fff295efd34ddf23946432e1ce00c9fcdac7a88', '44a30809871b51ca636e55d757d309c6070b8183', 'Pedoman Pengawasan Intern', 'Pedoman Pengawasan Intern Lingkup KKP', NULL, '', 0),
('f7f70541028393d52b4e3271e005246a2670e9ab', '7125197d541916478b4ba7ff30a0517772af6cf2', 'referensi prosedur pengawasan', 'Memindahkan sejumlah risiko dari organisasi ke entsdasda', NULL, 'P_20160226_094547.jpg', 0),
('15d660386bb6c6f217af2d6fb7445fd0c2ec3bf3', 'ed638e2ffcdfe03a75fda6c4f016fa249f10eb74', 'PP 60 Tahun 2008', 'SIstem Pengendalian Intern Pemerintah (SPIP)', NULL, 'PP60Tahun2008_SPIP.pdf', 1),
('d4e5a0e9d28128b5d3769ec228b86f842e66c1a2', 'ed638e2ffcdfe03a75fda6c4f016fa249f10eb74', 'PERMEN 21 Tahun 2011', 'Pedoman Manajemen Risiko', NULL, 'per-21-men-2011.pdf', 1),
('0903ea6c5f058aad630d8f7895a8d82f31e209fc', '3af6e7035b0ae166bfb6407955a7449ff63e4f06', 'PERMEN 23 Tahun 2015', 'Organisasi dan Tata Kerja', NULL, 'Organisasi dan Tata Laksana KKP.pdf', 1),
('a45604f47012d42de7ecdfbcaa8fffb367c5b40a', 'ed638e2ffcdfe03a75fda6c4f016fa249f10eb74', 'Permen KP Nomor 48 Tahun 2015', 'Pedoman Umum PSKPT dan Kawasan Perbatasan', NULL, 'R. Permen ttg P2K2PT 27 12 2015 (rapat bersama) + fr (tm_271215).doc', 1),
('954fe996b9380dfdb647bbd869ba9780bc2311d4', '2ee418634624573b9c9606b4b158e459e5ec8a0e', 'Program Kerja Evaluasi/Audit', 'Program kegiatan dalam bentuk evaluasi', NULL, 'TAO PK2PT (15 Feb 2016) .doc', 1),
('608c399f661c9b256a40a8197de135416cffaed8', '1b21dcf2eb58e25a1533b9b54774040163bb6f2e', 'DATA SATKER STAMET SEMARANG', 'TAHUN 2014-2016', '', 'RAB_IPR_2018 tgl 06062017.xls', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_program_audit`
--

CREATE TABLE IF NOT EXISTS `ref_program_audit` (
  `ref_program_id` varchar(50) NOT NULL,
  `ref_program_id_type` varchar(50) NOT NULL,
  `ref_program_code` varchar(25) NOT NULL,
  `ref_program_aspek_id` varchar(50) NOT NULL,
  `ref_program_title` varchar(255) NOT NULL,
  `ref_program_procedure` longblob NOT NULL,
  `ref_program_del_st` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=del, 1=active, 2=inactive',
  PRIMARY KEY (`ref_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_program_audit`
--

INSERT INTO `ref_program_audit` (`ref_program_id`, `ref_program_id_type`, `ref_program_code`, `ref_program_aspek_id`, `ref_program_title`, `ref_program_procedure`, `ref_program_del_st`) VALUES
('fe817c7f315682e58ac9941f7e709e09cfd86480', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'PA.01.01', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Sistem Teknologi Informasi', 0x3c6f6c3e0d0a093c6c693e506168616d6920737472756b747572206f7267616e69736173692070656c616b73616e612066756e67736920706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e506168616d69206b6562696a616b616e2064616e2070726f736564757220706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e506168616d6920616c75722070726f73657320706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e4576616c75617369206b6563756b7570616e2073756274616e7369206b6562696a616b616e2064616e2070726f736564757220706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e44617061746b616e20646f6b756d656e746173692070656e79656c656e6767617261616e2066756e67736920706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e556a69206b657061747568616e20706572656e63616e61616e205449207465726861646170206b6574656e7475616e2079616e67206265726c616b753b3c2f6c693e0d0a093c6c693e4964656e746966696b6173692064616e20616e616c697369732070656e79696d70616e67616e2f6b656c616c6169616e2f696e64696b617369206b65637572616e67616e2064616c616d20706572656e63616e61616e2054493c2f6c693e0d0a3c2f6f6c3e, 0),
('cfb99952ad415ceef069a5a758d7759f3427be19', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'PA.01.02', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Sistem Teknologi Informasi', 0x3c6f6c3e0d0a093c6c693e506168616d6920737472756b747572206f7267616e69736173692070656c616b73616e612066756e67736920706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e506168616d69206b6562696a616b616e2064616e2070726f73656475722070656e67656d62616e67616e2f70656e67616461616e2054493b3c2f6c693e0d0a093c6c693e506168616d6920616c75722070726f7365732070656e67656d62616e67616e2f70656e67616461616e2054493b3c2f6c693e0d0a093c6c693e4576616c75617369206b6563756b7570616e2073756274616e7369206b6562696a616b616e2064616e2070726f73656475722070656e67656d62616e67616e2f70656e67616461616e2054493b3c2f6c693e0d0a093c6c693e44617061746b616e20646f6b756d656e746173692070656e79656c656e6767617261616e2066756e6773692070656e67656d62616e67616e2f70656e67616461616e2054493b3c2f6c693e0d0a093c6c693e556a69206b657061747568616e2070656e67656d62616e67616e2f70656e67616461616e205449207465726861646170206b6574656e7475616e2079616e67206265726c616b753b3c2f6c693e0d0a093c6c693e4964656e746966696b6173692064616e20616e616c697369732070656e79696d70616e67616e2f6b656c616c6169616e2f696e64696b617369206b65637572616e67616e2064616c616d2070656e67656d62616e67616e2f70656e67616461616e2054493c2f6c693e0d0a3c2f6f6c3e, 0),
('717a2be16deab6c0c29a7da224a94a7224a1e157', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'PA.01.03', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Sistem Teknologi Informasi', 0x3c6f6c3e0d0a093c6c693e506168616d6920737472756b747572206f7267616e69736173692070656c616b73616e612066756e67736920706572656e63616e61616e2054493b3c2f6c693e0d0a093c6c693e506168616d69206b6562696a616b616e2064616e2070726f73656475722070656e676f706572617369616e2054493b3c2f6c693e0d0a093c6c693e506168616d6920616c75722070726f7365732070656e676f706572617369616e2054493b3c2f6c693e0d0a093c6c693e4576616c75617369206b6563756b7570616e2073756274616e7369206b6562696a616b616e2064616e2070726f73656475722070656e676f706572617369616e2054493b3c2f6c693e0d0a093c6c693e44617061746b616e20646f6b756d656e746173692070656e79656c656e6767617261616e2066756e6773692070656e676f706572617369616e2054493b3c2f6c693e0d0a093c6c693e556a69206b657061747568616e2070656e676f706572617369616e205449207465726861646170206b6574656e7475616e2079616e67206265726c616b753b3c2f6c693e0d0a093c6c693e4964656e746966696b6173692064616e20616e616c697369732070656e79696d70616e67616e2f6b656c616c6169616e2f696e64696b617369206b65637572616e67616e2064616c616d2070656e676f706572617369616e2054493c2f6c693e0d0a3c2f6f6c3e, 0),
('c3e8c7432632fd3d34d591f1ca284055e34c0c71', '0525307297f9bed8984a8054918087dcf03c4bcf', '01', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Sekretariat', 0x3c703e50656c616a61726920737472756b73747572206f7267616e6973617369c2a03c2f703e, 0),
('2537a73118a5b3dcee923af926f02d52c1de7b1f', '0525307297f9bed8984a8054918087dcf03c4bcf', '02', '3c7f1096de7da99484a42852da60792858994c60', 'peningktan kesejahteraan nelayan', 0x3c703e312e2044617061746b616e2064617461206b656c6f6d706f6b206e656c6179616e2079616e6720616b616e206469626572696b616e2062616e7475616e3c2f703e0d0a0d0a3c703e322e2063656b206964656e7469746173206e656c6179616e3c2f703e0d0a0d0a3c703e332e2042616e64696e676b616e206964656e74697473206e656c6179616e2064656e67616e2064617461206b656c6f6d706f6b2079616e6720616b616e206469626572692062616e7475616e3c2f703e, 0),
('c867194b3a60785549fc50899c4e621f0adb8f4a', '0525307297f9bed8984a8054918087dcf03c4bcf', '03', '6031fc656ebe93a64d401dc66eace039c475389e', 'IT', '', 0),
('aa214bc9b69cd26e60b8030fa501ae21fae77938', '0525307297f9bed8984a8054918087dcf03c4bcf', '04', '8f82a264012563a6e9b4105025bb5869d35a34a5', 'IT', '', 0),
('2132929fe9b84e32b677460729c66ff2a56afb77', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', '05', '8f82a264012563a6e9b4105025bb5869d35a34a5', 'Pengolahan Hasil', 0x3c703e4141413c2f703e, 0),
('cb20d038bcf91d41ab8164ece8920a340e1afb8e', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.01', 'cd1d3d9ba16a8fd8eadb351dcfe6ef8dcea417d0', 'Penyelesaian Tindak Pidana Kelautan dan Perikanan (TPKP) yang disidik tidak sesuai dengan ketentuan yang berlaku', 0x3c6f6c3e0d0a093c6c693e4d696e746120646f6b756d656e2079616e6720646962756174206f6c65682050656e676177617320506572696b616e616e20706164612070656d6572696b7361616e2070656e646168756c75616e2e203c656d3e43656b3c2f656d3e206b656c656e676b6170616e20646f6b756d656e2d646f6b756d656e2028666f726d20303120732e642e20666f726d203135292064616e2062657269746120616361726120736572616820746572696d6120646172692050656e676177617320506572696b616e616e206b657061646120506574756761732050656e6572696d61616e2064616e2050656e656c697469616e20284a756b6e69733a2068616c616d616e20392d3130293c2f6c693e0d0a093c6c693e3c656d3e556a693c2f656d3e206b6562656e6172616e206b657465706174616e2077616b74752070656e7965726168616e20646f6b756d656e2070656d6572696b7361616e2070656e646168756c75616e20646172692050504e532070656e6572696d61616e2064616e2070656e656c697469616e206b6570616461204b6570616c61205361746b65722f50656e796964696b20286d616b73696d616c20312078203234206a616d293c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e3c7374726f6e673e4a756b6e693c2f7374726f6e673e73203a26726471756f3b3c656d3e486173696c2070656e6572696d61616e2064616e2070656e656c697469616e207365736567657261206d756e676b696e2064696c61706f726b616e206b65706164612061746173616e2050504e5320506572696b616e616e2064616c616d2077616b7475203178203234204a616d26726471756f3b203c2f656d3e3c2f703e0d0a0d0a3c703e3c656d3e332e2041706162696c61206461726920686173696c2070656e6572696d61616e2064616e2070656e656c697469616e20646974656d756b616e206164616e79612062756b74692d62756b74692079616e67206d656d656e75686920756e73757220545050206d616b6120686173696c2070656e6572696d61616e2064696c616e6a75746b616e206b652074616861702070656e796964696b616e2e3c2f656d3e3c2f703e0d0a0d0a3c703e3c656d3e342e2041706162696c61206461726920686173696c2070656e6572696d61616e2064616e2070656e656c697469616e20746964616b20646974656d756b616e20616c61742062756b74692079616e672063756b757020756e74756b206d656d656e75686920756e73757220545050206d616b61207065726b61726120646170617420646968656e74696b616e20756e74756b20746964616b20646974696e64616b6c616e6a757469206b652074616861702070656e796964696b616e2064616e2064696275617420616c6173616e2d616c6173616e2068756b756d206170616b616820746572646170617420746964616b2063756b75702062756b74692079616e672064697475616e676b616e2064616c616d204265726974612041636172612050656e64617061742e3c2f656d3e3c2f703e0d0a0d0a3c703e3c656d3e352e205665726966696b61736920646f6b756d656e3c2f656d3e2070656e796964696b616e207061646120736574696170207461686170616e2028312e537572617420506572696e7461682054756761732c20322e537572617420506572696e7461682050656e796964696b616e2c20332e53757261742050656d6265726974616875616e2044696d756c61696e79612050656e796964696b616e2c20342e50656d616e6767696c616e2c20352e50656e616e676b6170616e2c20362e50656e6168616e616e2c20372e50656e6767656c65646168616e2c20382e50656e79697461616e2c20392e50656d6572696b7361616e2c2064616e2031302e3c656d3e696e20416273656e7469613c2f656d3e202861706162696c6120616461292073657274612050656e79656c65736169616e2064616e2050656e7965726168616e204265726b6173205065726b6172612c2050656e6768656e7469616e2050656e796964696b616e202861706162696c6120616461292e2054616e79616b616e2073656261622064616e20616b69626174206a696b6120746964616b206c656e676b61702c3c2f703e0d0a0d0a3c703e3c656d3e362e2054656c6974693c2f656d3e2073757261742070656e6168616e616e206170616b6168207375646168207365737561692064656e67616e206b6574656e7475616e2e20284a756b6e69733a206c616d616e79612077616b74752070656e6168616e616e2064656d69206b6570656e74696e67616e2070656e796964696b206d616b73696d616c20323020686172692064616e20646170617420646970657270616e6a616e6720313020686172692064656e67616e2064696c656e676b617069204265726974612041636172612074657273656e64697269292e3c2f703e0d0a0d0a3c703e372e20556e74756b2050656d6265726b6173616e2c2074656c697469206b65736573756169616e2077616b74752070656e79616d706169616e20686173696c2070656e796964696b616e206265726b6173207065726b617261206b652050656e756e74757420556d756d20283c656d3e70616c696e67206c616d6120333020686172692073656a616b2070656d6265726974616875616e2064696d756c61696e79612070656e796964696b616e3c2f656d3e292064616e20646f6b756d656e2079616e672064696d696e7461206f6c65682050656e756e74757420556d756d2028505529206170616b61682073756461682064696c656e676b61706920646f6b756d656e6e7961207365737561692064656e67616e2077616b74752079616e6720646974656e74756b616e20287465726d6173756b2053757261742050656e67616e7461722064616e204265726974612041636172612050656e7965726168616e2074657273616e676b612064616e20626172616e672062756b746920646172692050656e796964696b206b6570616461205055293c2f703e0d0a0d0a3c703e284a756b6e69733a203c656d3e41706162696c61206265726b6173207065726b6172612074616861702070657274616d612074656c616820646973657261686b616e2064696e796174616b616e2062656c756d206c656e676b61702028502d313829206f6c65682050552064616e20646973657274616920706574756e6a756b2028502d3139292c2050656e796964696b2064616c616d2077616b74752031302028736570756c756820292068617269206861727573206d656c656e676b617069206265726b6173207065726b6172612064656e67616e206d656d656e7568692073656c7572756820706574756e6a756b2050313920646172692050553c2f656d3e26726471756f3b2e3c2f703e0d0a0d0a3c703e382e2054657268616461702050656e6768656e7469616e2050656e796964696b616e2c2041706162696c6120746964616b2074657264617061742063756b757020616c61742062756b74692061746175207065726973746977612074657273656275742062756b616e206d65727570616b616e2074696e64616b20706964616e6120706572696b616e616e2c20266e6273703b3c656d3e54656c697469203c2f656d3e266e6273703b6e6f74756c656e736920686173696c2067656c6172207065726b6172612c20287465726d6173756b2074616e64612074616e67616e2f706172616620706573657274612067656c6172207065726b617261292064616e2073656c616e6a75746e796120616e616c69736120686173696c206b6573696d70756c616e2064617269206e6f74756c65736920686173696c2067656c6172207065726b6172612e3c2f703e0d0a0d0a3c703e3c656d3e392e2043656b2064616e20756a693c2f656d3e20446f6b756d656e2070657274616e6767756e67206a61776162616e206b6575616e67616e20617461732070656e79656c65736169616e2054504b502079616e67206469736964696b206170616b61682074656c616820646964756b756e672062756b74692070657274616e67756e676a61776162616e2079616e67207361682e3c2f703e0d0a0d0a3c703e31302e204c616b756b616e206469736b7573692064656e67616e2050656e676177617320506572696b616e616e2c20505053504d2c2064616e2f617461752050504e5320506572696b616e616e2061706162696c61207465726a6164692070657262656461616e2073656c616e6a75746e796120616e616c6973612070656e79656261622070657262656461616e2074657273656275743c656d3e2e3c2f656d3e3c2f703e0d0a0d0a3c703e31312e20427561742053696d70756c616e20686173696c2061756469742064616e2072756d75736b616e2074656d75616e266e6273703b3c2f703e, 0),
('5873e83b1ca02490a07c608d9664a0f172f76ff2', '0525307297f9bed8984a8054918087dcf03c4bcf', '07', '462599baf768cd3bb1bc6ebad7a36d338206c884', 'IT', '', 0),
('7b03954f39b3b105f6f7b970ebd4a92486f7fbfe', '0525307297f9bed8984a8054918087dcf03c4bcf', '08', '688d723bd69b2d06980b519ca49badc09f16ee4d', 'IT', '', 0),
('8089b2719ec87cd9e8f29aef56c2e9673aa052b5', '0525307297f9bed8984a8054918087dcf03c4bcf', '09', '3da92cabe8a8473f55e638fa7dc43ea1753f40e8', 'IT', '', 0),
('c926472c96051eeff9bc79905aafd7b33e9ade6a', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.02', 'cd1d3d9ba16a8fd8eadb351dcfe6ef8dcea417d0', 'Penyelesaian Penanganan barang bukti dan awak kapal Tidak Sesuai Ketentuan', 0x3c6f6c3e0d0a093c6c693e4d696e74612064616e2043656b206b656c656e676b6170616e20646f6b756d656e2070616461205065747567617320426172616e672042756b74693a266e6273703b20666f726d2042412d3320732e642e204c2e5450503220283c656d3e4a756b6e697320426172616e672042756b7469203a204c616d706972616e204949204a756b6e697320426172616e672042756b74693c2f656d3e292e204a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f6c693e0d0a093c6c693e546572686164617020626172616e672062756b7469207061646120504520352064616e20504520362c2063656b206170616b61682074656c61682064696c656e676b61706920537572617420506572696e7461682050656e79697461616e2064616e206174617520696a696e2064617269206b657475612070656e676164696c616e206e656765726920736574656d7061742e20266e6273703b4a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e284a756b6e6973203a20266c6471756f3b3c656d3e44616c616d204b65616461616e206d656e646573616b2064616e206d656d65726c756b616e2074696e64616b616e207365676572612c2070656e79697461616e20626172616e672062756b7469206174617520646f6b756d656e2f73757261742064617061742064696c616b756b616e2074616e706120696a696e2064617269206b657475612070656e676164696c616e206e65676572692074617461706920746572626174617320706164612062656e64612d62656e646120626572676572616b2064616e2073656c616e6a75746e7961206d656c61706f726b616e206b6570616461204b657475612050656e676164696c616e204e6565726920736574656d70617420756e74756b206d656d7065726f6c65682070656e65746170616e3c2f656d3e26726471756f3b293c2f703e0d0a0d0a3c703e332e20546572686164617020626172616e672062756b74692079616e672064696c656c616e672c2063656b206170616b61682074656c61682061646120696a696e20646172692070656e676164696c616e206e656765726920736574656d7061742064616e20706572736574756a75616e20646172692074657273616e676b612e204a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f703e0d0a0d0a3c703e342e20546572686164617020626172616e672062756b74692079616e67206469736974612c2063656b206170616b61682074656c61682064696c656e676b6170692074616e646120746572696d612062756b74692070656e79697461616e2c204a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f703e0d0a0d0a3c703e352e204c616b756b616e2050656e676563656b616e2c206170616b61682050504e5320506572696b616e616e206d656c616b756b616e2070657261776174616e2064616e2070656e6a616761616e2f70656e67616d616e616e20626172616e672073697461616e2079616e67206d656c6970757469206a656e697320626172616e676e79612c206b75616c697461732064616e206a756d6c61682062616e64696e676b616e2064656e67616e20686173696c206c61706f72616e2070656d616e746175616e2070657261776174616e2064616e2070656e67616d616e616e20626172616e672062756b74692c204a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f703e0d0a0d0a3c703e362e204c616b756b616e2050656e676563656b616e2c206170616b616820426172616e672062756b74692064696c656e676b6170692064656e67616e206b6172747520626172616e672062756b74692064616e206c6162656c2079616e6720646969736920736563617261206c656e676b61702e204a696b6120746964616b2074616e79616b616e2073656261622064616e20616b696261746e79613c2f703e0d0a0d0a3c703e372e204c616b756b616e266e6273703b3c656d3e7472617369723c2f656d3e266e6273703b62756b74692d62756b74692070657274616e6767756e676a61776162616e2070657261776174616e2064616e2070656e67616d616e616e20626172616e672062756b7469206b656d756469616e2062616e64696e676b616e2064656e67616e206c61706f72616e2070656d616e746175616e2070657261776174616e2064616e2070656e67616d616e616e20626172616e672062756b74692e3c2f703e0d0a0d0a3c703e382e2041706162696c612074657264617061742070657262656461616e2c206469736b7573696b616e2064656e67616e205065747567617320626172616e672062756b74692c2064616e20617461752050504e5320506572696b616e616e206b656d756469616e206c616b756b616e20616e616c69736120756e74756b206d656e636172692073656261623c2f703e0d0a0d0a3c703e392e20427561742073696d70756c616e20686173696c2061756469742064616e2072756d75736b616e2074656d75616e3c2f703e0d0a0d0a3c703e31302e20427561742052696e676b6173616e2074656d75616e2064616e2072656e63616e6120616b73693c2f703e, 0),
('a07dffb7f397c31080a945aad570d0a34607dfdc', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.03', 'cd1d3d9ba16a8fd8eadb351dcfe6ef8dcea417d0', 'Pengelolaan hasil sitaan barang bukti tidak tertib', 0x3c6f6c3e0d0a093c6c693e4d696e7461206d617472696b732064617461207065726b617261205450502d34332079616e67207375646168206d656d70756e7961692068756b756d2079616e672074657461703c2f6c693e0d0a093c6c693e43656b20537572617420506572736574756a75616e20646172692070656e676164696c616e206e656765726920617461732070656c656c616e67616e20626172616e672062756b74692064617269204b504b4e4c2e3c2f6c693e0d0a093c6c693e43656b2064616e207665726966696b6173692042756b7469207365746f7220504e425020686173696c2070656c656c616e67616e20626172616e672062756b74693c2f6c693e0d0a093c6c693e43656b20686173696c2070656e676164696c616e20746572686164617020706964616e612064656e64612c206170616b61682073756461682064696c616b756b616e2070656e7965746f72616e20504e42502e3c2f6c693e0d0a093c6c693e43656b20686173696c206c656c616e672073697461616e2c206170616b616820686173696c206c656c616e672073697461616e2074656c61682064697365746f726b616e207365626167616920504e42503f3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2042656e6461686172612050656e6572696d61616e2064616e2f61746175204b6570616c61205361746b65722041706162696c61207465726a6164692070657262656461616e2c2074616e79616b616e20736562616220616b696261746e79612c206b656d756469616e206c616b756b616e20616e616c6973612e266e6273703b3c2f6c693e0d0a093c6c693e427561742053696d70756c616e20686173696c2061756469742064616e2072756d75736b616e2074656d75616e3c2f6c693e0d0a3c2f6f6c3e, 0),
('2274713232a1ef625c8733e64c0bbc154826d5dd', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.04', 'cd1d3d9ba16a8fd8eadb351dcfe6ef8dcea417d0', 'Register dan Pelaporan  Penanganan Pelanggaran dan Penanganan Barang Bukti  Tidak Tertib', 0x3c6f6c3e0d0a093c6c693e43656b205265676973746572205065726b617261206170616b61682074656c616820646969736920736562616761696d616e61206d657374696e796120796169747520686173696c2d686173696c207065726b617261205450502064616e2f617461752070656e67616475616e206d6173796172616b61742c2074656d75616e20646172692070656e676177617320706572696b616e616e2c2074656d75616e206461726920706174726f6c692062657273616d61206174617520696e7374616e7369206c61696e207465726d7561742070616461207265676973746572207065726b6172612064616e20646974616e646174616e67616e692e204a696b612062656c756d2074616e79616b616e2073656261622064616e20616b696261746e79613c2f6c693e0d0a093c6c693e4d696e74612064616e2043656b206170616b6168206c61706f72616e2062756c616e616e2064616e2074726977756c616e2074656c6168206469627561742073656361726120727574696e3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e204b6570616c61205361746b6572206a696b61207465726461706174206b65746964616b736573756169616e2c206b656d756469616e206c616b756b616e20616e616c6973612e266e6273703b3c2f6c693e0d0a093c6c693e427561742053696d70756c616e20266e6273703b686173696c2061756469742064616e2072756d75736b616e2074656d75616e3c2f6c693e0d0a3c2f6f6c3e, 0),
('fd12f5b03a995475ad758363e1c0abd9b6b0f30a', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.01', '3c7f1096de7da99484a42852da60792858994c60', 'Target Kinerja Tidak Tercapai', 0x3c6f6c3e0d0a093c6c693e44617061746b616e204c61706f72616e204b696e65726a612062657365727461206d616e75616c20494b552064616e20446174612044756b756e6720494b553b3c2f6c693e0d0a093c6c693e42616e64696e676b616e206461746120616e74617261206361706169616e206b696e65726a612064656e67616e207065726a616e6a69616e206b696e65726a612c206a696b612074657264617061742070657262656461616e206b6f6e6669726d6173692064656e67616e2054696d2050656e797573756e204c4b6a3b3c2f6c693e0d0a093c6c693e506572696b7361206361706169616e206b696e65726a61206170616b61682074656c6168206469737573756e20736573756169206d616e75616c20494b552079616e6720646974657461706b616e3b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('3b82acc8e80f5450598051f21b031b65089c4b3e', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.02', '3c7f1096de7da99484a42852da60792858994c60', 'Pelaksanaan Pengadaan Barang/Jasa TA 2015 tidak Efisien, tidak Ekonomis dan tidak sesuai dengan ketentuan', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20646f6b756d656e2064616e206461667461722070656e67616461616e20626172616e672064616e206a61736120286d656c616c75692070656e7965646961206a6173612064616e20736563617261207377616b656c6f6c61293b3c2f6c693e0d0a093c6c693e4c616b756b616e20756a6920706574696b2074657268616461702070656e67616461616e2079616e67207374726174656769733b3c2f6c693e0d0a093c6c693e4c616b756b616e2063656b20666973696b20686173696c2070656e67616461616e202862616e64696e676b616e20686173696c2070656e67616461616e2064656e67616e20646f6b756d656e206b6f6e7472616b293b3c2f6c693e0d0a093c6c693e506572696b7361206170616b616820686173696c2070656e67616461616e2074656c6168207365737561692064656e67616e20544f522064616e20446f6b756d656e2050656e67616461616e2c2073657274612070656e67616461616e2074656c61682064696c616b756b616e20736563617261206566697369656e2c206566656b7469662c2064616e20656b6f6e6f6d69733b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('c950ad83407d0e7f3ac548838cabbe6abddc095e', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.03', '3c7f1096de7da99484a42852da60792858994c60', 'Penetapan target PNBP belum disusun secara realistis', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20646f6b756d656e207465726b6169742074617267657420504e42502079616e6720737564616820646974657461706b616e2c266e6273703b206c616b756b616e2070656d6572696b7361616e2c206170616b61682064616c616d2070656e797573756e616e20746172676574202872656e63616e612920504e42502074656c61682064696b6f6f7264696e6173696b616e2064656e67616e2053656b7265746172696174204469746a656e20506572696b616e616e2054616e676b617020736572746120446972656b746f7261742050656c61627568616e20506572696b616e616e3b3c2f6c693e0d0a093c6c693e4c616b756b616e20616e616c6973612074617267657420504e42502074656c6168206469737573756e20736563617261207265616c69737469732064656e67616e206d656e6767756e616b616e3a206129266e6273703b666f726d756c6120766f6c756d65207820746172696620706572206a656e697320504e42502c2064616e206229266e6273703b7265616c697361736920504e42502073656c616d61203320746168756e20746572616b6869722e3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('1843c33fb6b91f3e788fca1bc360cbfc150c80d5', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ4.KINERJA.UPT.06', '8f82a264012563a6e9b4105025bb5869d35a34a5', 'Target PNBP tidak tercapai', 0x3c6f6c3e0d0a093c6c693e44617061746b616e2042756b752050656e6572696d61616e20504e42503b3c2f6c693e0d0a093c6c693e42616e64696e676b616e2070656e6572696d61616e20504e42502064656e67616e207461726765742079616e672074656c616820646974657461706b616e3b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b612070656e6572696d61616e20504e425020746964616b206d656e6361706169207461726765743b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('c0477d4c4c27faba27a157df65e4c6868511c96d', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.05', '3c7f1096de7da99484a42852da60792858994c60', 'Terdapat keterlambatan dalam penyetoran PNBP', 0x3c6f6c3e0d0a093c6c693e44617061746b616e2042756b752050656e6572696d61616e20504e42503b3c2f6c693e0d0a093c6c693e506572696b7361206170616b61682074657264617061742070656e6572696d61616e20504e42502079616e672064697365746f726b616e206b65204b6173204e6567617261206d656c6562696869206b6574656e7475616e3b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('142d19e55edfc7d6f12fb4e5893582bc8b1c1c48', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.06', '3c7f1096de7da99484a42852da60792858994c60', 'Pungutan PNBP tidak sesuai dengan PP 75 Tahun 2015', 0x3c6f6c3e0d0a093c6c693e44617061746b616e2064617461206a656e69732070756e677574616e20504e42502079616e67206265726c616b75206469207361746b65723b3c2f6c693e0d0a093c6c693e42616e64696e676b616e2064656e67616e2070656e6572696d61616e6e79612c206170616b61682074657264617061742070756e677574616e20504e42502079616e6720646970756e677574206d656c6562696869206b6574656e7475616e3b3c2f6c693e0d0a093c6c693e506572696b7361206170616b61682074657264617061742070656e6767756e61206a6173612070656c61627568616e2079616e6720746964616b2064696b656e616b616e2070756e677574616e20504e42503b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('829a9458b8e902951cb8ae311e8f0da11f6d3cb5', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.07', '3c7f1096de7da99484a42852da60792858994c60', 'Standar Pelayanan dan Maklumat Pelayanan belum dibuat/publikasikan', 0x3c6f6c3e0d0a093c6c693e44617061746b616e205374616e6461722050656c6179616e616e20285350293b3c2f6c693e0d0a093c6c693e506572696b7361206170616b61682070656e797573756e616e6e79612074656c6168206d656e67616375205065726d656e2050414e5242204e6f6d6f722031352f323031342c206a696b612074656c61682073657375616920706572696b73612070656c616b73616e61616e6e79612064696c6170616e67616e3b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('43b26b60773e310015ab22f2085da0149a357e1e', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.08', '3c7f1096de7da99484a42852da60792858994c60', 'Pelabuhan Perikanan belum melakukan Survei Kepuasan Masyarakat', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20686173696c20537572766569204b6570756173616e204d6173796172616b61742028534b4d292c20706572696b7361206170616b616820686173696c2074656c61682064697075626c696b6173696b616e2064616e2074656c616820646974696e64616b6c616e6a7574693b3c2f6c693e0d0a093c6c693e506572696b7361206170616b61682070656c616b73616e61616e207375727665692074656c6168206d656e67616375205065726d656e2050414e5242204e6f6d6f722031362f323031363b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('fa823520e5f4534b2da5e7309ec79b6281ec9e1d', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.09', '3c7f1096de7da99484a42852da60792858994c60', 'Penerbitan Surat Persetujuan Berlayar (SPB) belum sesuai dengan ketentuan', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20534f502050656e6572626974616e205350423b3c2f6c693e0d0a093c6c693e4c616b756b616e20756a6920706574696b20746572686164617020646f6b756d656e205350422079616e672074656c61682064697465726269746b616e2c206170616b61682070656c616b73616e61616e6e79612074656c6168207365737561692064656e67616e20534f502064616e205065726d656e204b50204e6f6d6f72203320746168756e20323031332074656e74616e67204b657379616862616e646172616e2064692050656c61627568616e20506572696b616e616e3b3c2f6c693e0d0a093c6c693e506572696b736120646f6b756d656e2070656e64756b756e6720535042207465726b616974207379617261742074656b6e69732064616e2061646d696e69737472617369206170616b61682074656c6168207365737561692064656e67616e206b6574656e7475616e3b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('c5a00fc6cebca18537aec37f33645c8e7772ea83', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ2.KINERJA.UPT.10', '3c7f1096de7da99484a42852da60792858994c60', 'Terdapat Dokumen Pertanggungjawaban Keuangan yang Tidak Sesuai Ketentuan', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20646f6b756d656e2070657274616e6767756e676a61776162616e206b6575616e61676e2054412e323031352064616e20323031363b3c2f6c693e0d0a093c6c693e506572696b736120646f6b756d656e2070657274616e6767756e676a61776162616e206b6575616e67616e2064616e206c61706f72616e6e79612074656c616820736573756169206b6574656e7475616e20285342552c2053424b2064616e206b6574656e7475616e206c61696e6e7961207465726b616974206b6575616e67616e293b3c2f6c693e0d0a093c6c693e4469736b7573696b616e2064656e67616e2070656e616e6767756e676a61776162206a696b6120646974656d756b616e207065726d6173616c6168616e3b3c2f6c693e0d0a093c6c693e42756174206b6573696d70756c616e2e3c2f6c693e0d0a3c2f6f6c3e, 0),
('e1077ef1da5107fcbf1753003e387f73daf962d1', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'ITJ.5/BPSDMKP.1/2016', '688d723bd69b2d06980b519ca49badc09f16ee4d', 'SUPMN Bone', 0x3c703e266e6273703b3c2f703e0d0a0d0a3c703e3c7374726f6e673e412e2050656e67756d70756c616e20446174612064616e20426168616e3c2f7374726f6e673e2c206265727570613a3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e5375726174207065726d6f686f6e616e207065726365726169616e2064617269205364722e204a756d61726469206b6570616461204b6570616c61205355504d204e656765726920426f6e653b3c2f6c693e0d0a093c6c693e426572697461206163617261206d6564696173692064616c616d207573616861206d656e64616d61696b616e2061746175206d656e6365676168207465726a6164696e7961207065726365726169616e20616e74617261205364722e204a756d617264692064656e67616e2069737472696e79612028536472692e204d61737469616e61292079616e672064696c616b756b616e206f6c65682070696d70696e616e205355504d204e656765726920426f6e653b3c2f6c693e0d0a093c6c693e537572617420706572736574756a75616e20617461752070656e6f6c616b616e207065726365726169616e20612e6e2e205364722e204a756d617264692079616e672064696b656c7561726b616e206f6c6568204b6570616c61205355504d204e656765726920426f6e653b3c2f6c693e0d0a093c6c693e4265726974612061636172612061746175207375726174206b65746572616e67616e2064617269204b6570616c612044657361207465726b616974207573616861206d656e64616d61696b616e2061746175206d656e6365676168207465726a6164696e7961207065726365726169616e20616e74617261205364722e204a756d617264692064656e67616e2069737472696e79612028536472692e204d61737469616e61293b3c2f6c693e0d0a093c6c693e5375726174207065726e79617461616e2064617269205364722e204a756d61726469207465726b61697420616b616e2062657274616e6767756e676a6177616220616b69626174207465726a6164696e7961207065726365726169616e2072756d61682074616e6767616e79612061706162696c6120646974656d756b616e2070656c616e67676172616e2079616e67207465726a6164693b3c2f6c693e0d0a093c6c693e5075747573616e2050656e676164696c61204167616d61207465726b616974207065726365726169616e20616e7461726120536472206a756d617264692064656e67616e20536472692e204d61737469616e613b3c2f6c693e0d0a093c6c693e646c6c2e3c2f6c693e0d0a093c6c693e3c7374726f6e673e4b6f6e6669726d617369206174617520776177616e636172612064656e67616e20706968616b207465726b6169742c203c2f7374726f6e673e736570657274693a3c2f6c693e0d0a093c6c693e4b6570616c61205355504d204e656765726920426f6e653b3c2f6c693e0d0a093c6c693e4b6570616c61205375626261672054617461205573616861205355504d204e656765726920426f6e653b3c2f6c693e0d0a093c6c693e536472692e204d61737469616e6120286d616e74616e206973747269207361682064617269205364722e204a756d61726469293b3c2f6c693e0d0a093c6c693e536472692e20416e6469204861726d696c61202879616e672064696475676120706173616e67616e2064617269205364722e204a756d61726469293b3c2f6c693e0d0a093c6c693e506968616b2050656e676164696c616e204167616d6120426f6e65202f20576174616d706f6e65202862696c612064697065726c756b616e293b3c2f6c693e0d0a093c6c693e4f72616e6720747561206461726920536472692e204d61737469616e613b3c2f6c693e0d0a093c6c693e4f72616e6720747561206461726920736472692e20416e6469204861726d696c613b3c2f6c693e0d0a093c6c693e4b6570616c6120446573612f4b656c75726168616e204d61747469726f205761666965202874656d706174206b656469616d616e205364722e204a756d617264692064616e20536472692e204d61737469616e61293b3c2f6c693e0d0a093c6c693e54656d616e2061746175206b6572616261742064617269205364722e204a756d617264693c2f6c693e0d0a3c2f6f6c3e, 0),
('e7ebbf13ec5cd2bb7b4eb74beed161b3760ef731', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ1.PRL', '460d0b13f7a9cb51e5391985bd42f8ea4afbef2c', 'Pengadaan Barang dan Jasa', 0x3c703e312e2044617061746b616e204b6f6e7472616b3c2f703e0d0a0d0a3c703e322e2050656c616a61726920566f6c756d652079616e6720616461206469206b6f6e7472616b3c2f703e0d0a0d0a3c703e332e204c616b756b616e2050656e676563656b616e20746572686164617020766f6c656d65206469206c6170616e67616e3c2f703e0d0a0d0a3c703e342e2042616e64696e676b616e206170616b61682061646120646576696173693c2f703e0d0a0d0a3c703e352e20416e616c69736973266e6273703b4465766961736920736562616761692074656d75616e2064616e20636172692070656e79656261622064616e20616b696261746e79613c2f703e0d0a0d0a3c703e362e204c616b756b616e204b6c61726966696b6173692074657268616461702070706b2064616e206b65736570616b6174616e207465726861646170206164616e796120646576696173693c2f703e, 0),
('42365358678acb7415fd43fed5f52faadc63dd9b', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'ITJ.5/ATT/SETJEN/DJPT/DJP', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Dinas Kelautan dan Perikanan Provinsi Papua Barat, Dinas Kelautan dan Perikanan Kab. Sorong, Dinas Kelautan dan Perikanan Kab. Raja Ampat', 0x3c703e417564697420616b616e2064696c616b73616e616b616e2064656e67616e2074656b6e696b3a3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e4b6f6e6669726d617369206174617520776177616e636172612064656e67616e20706968616b207465726b6169742c2079616974753a0d0a093c756c3e0d0a09093c6c693e4b756173612050656e6767756e6120416e67676172616e2064616e2050656e616e6767756e67204a61776162204f7065726173696f6e616c204b6567696174616e2079616e67206d656e6a616469205361736172616e20544154443b3c2f6c693e0d0a09093c6c693e506968616b2079616e672062657274616e6767756e676a61776162206d656e696e64616b6c616e6a7574692072656b6f6d656e6461736920686173696c2061756469743b3c2f6c693e0d0a09093c6c693e506968616b206c61696e2079616e67206b6f6d706574656e2e3c2f6c693e0d0a093c2f756c3e0d0a093c2f6c693e0d0a093c6c693e43656b206174617520756a6920666973696b207465726b616974206b65626572616461616e20706968616b2079616e672062657274616e6767756e676a61776162206d656e696e64616b6c616e6a7574692072656b6f6d656e6461736920686173696c2061756469742e3c2f6c693e0d0a093c6c693e50656e67756d70756c616e2062756b74692c20646f6b756d656e2c20646174612c2064616e20696e666f726d6173692079616e67207465726b6169742064656e67616e20706968616b2079616e672062657274616e6767756e676a61776162206d656e696e64616b6c616e6a7574692072656b6f6d656e6461736920686173696c2061756469743b3c2f6c693e0d0a093c6c693e416e616c697369732074657268616461702062756b74692d62756b74692079616e6720646964617061746b616e207465726d6173756b2062756b74692064756b756e67207065726d6f686f6e616e207573756c616e20544154442079616e67206469616a756b616e20706968616b205361746b65722e3c2f6c693e0d0a093c6c693e67772067616e74692079653c2f6c693e0d0a3c2f6f6c3e, 0),
('487dccf102af69592146352fe976540aaa300e60', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', '06.01.01', '3c7f1096de7da99484a42852da60792858994c60', 'Pelabuhan Perikanan Jakarta', 0x3c703e4c616e676b6168204175646974203a3c2f703e0d0a0d0a3c703e312e2064617061746b616e207475706f6b736920756e6974206b65726a612079616e672064692064756761206d656c616b756b616e2070656e79616c616867756e61616e20776577656e616e672e3c2f703e0d0a0d0a3c703e322e206c616b756b616e20776177616e636172612064656e67616e20626168776168616e20746572647567612c20627561742064656e67616e2042412050656d6572696b7361616e2e3c2f703e0d0a0d0a3c703e332e204c616b756b616e20776177616e636172612064656e67616e2061746173616e20746572647567612c20627561742064656e67616e2042412050656d6572696b7361616e3c2f703e0d0a0d0a3c703e342e204c616b756b616e20776177616e636172612064656e67616e20746572647567612c20627561742073696d70756c6b616e20627561742042412050656d6572696b7361616e3c2f703e, 0),
('32d01ecc96acf2f30d169d3f90dfaafd9365a644', '0525307297f9bed8984a8054918087dcf03c4bcf', 'ITJ.1.PSKPT BIAK NUMFOR', '460d0b13f7a9cb51e5391985bd42f8ea4afbef2c', 'PSKPT', 0x3c6f6c3e0d0a093c6c693e44617061746b616e20646f6b756d656e20706572656e63616e61616e20504b5350542032303136206469204469746a656e2050524c2c20616e74617261206c61696e3a2070726f66696c2c207065646f6d616e20756d756d2c203c656d3e627573696e65737320706c616e2c206d617374657220706c616e2c20616374696f6e20706c616e3c2f656d3e2c20534b2054696d2050534b50542e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c756c3e0d0a093c6c693e4b616a69206170616b616820646f6b756d656e20706572656e63616e61616e207465727365627574207375646168207365737561692f72656c6576616e2064656e67616e20646f6b756d656e20706572656e63616e61616e206c61696e6e79613f3c2f6c693e0d0a093c6c693e4a696b6120746964616b207365737561692c2074616e79616b616e206b652070656e616e6767756e67206a61776162206b6567696174616e2e20266e6273703b3c2f6c693e0d0a093c6c693e416e616c697369732064616e207475616e676b616e2064616c616d204b4b413c2f6c693e0d0a3c2f756c3e0d0a0d0a3c6f6c3e0d0a093c6c693e4c616b756b616e20756a69206c6170616e6720756e74756b206d6579616b696e6920626168776120706572656e63616e61616e2050534b505420546168756e20323031362064617061742064696c616b73616e616b616e206469204b61622e204269616b204e756d666f722c205361726d692c204d6f726f7461692c2064616e204d616c756b75204261726174204461796120284d6f612f4b6973617229207465726d6173756b206d656e696c6169206b6573696170616e206461657261682064616c616d206d656e64756b756e672050534b50543c2f6c693e0d0a093c6c693e4c616b756b616e206b6f6e6669726d6173692f6b6f6f7264696e6173692064656e67616e2044696e6173204b502c2050657274616d696e612c2064616e20504c4e207465726b61692064656e67616e2070656d62616e67756e616e204465726d6167612050656e6461726174616e20496b616e2c205350444e2c20436f6c642053746f726167652c2050616272696b2045732c2050656e67616461616e204b6170616c2064616e20616c61742074616e676b61702c20536172616e6120507261736172616e61204c696e676b756e67616e20283c656d3e547261636b696e67204d616e67726f76653c2f656d3e292c20536172616e6120416972204265727369683c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c756c3e0d0a093c6c693e44617061746b616e20656b73697374696e67204465726d6167612050656e6461726174616e20496b616e2c205350444e2c20436f6c642053746f726167652c2050616272696b2045732c2050656e67616461616e204b6170616c2064616e20616c61742074616e676b61702c20536172616e6120507261736172616e61204c696e676b756e67616e2028547261636b696e67204d616e67726f7665292c20536172616e6120416972204265727369683c2f6c693e0d0a093c6c693e4a696b61206164612c206170616b616820736172616e6120707261736172616e61207465727365627574206f7065726173696f6e616c3f204a696b6120746964616b206469736b7573696b616e2064656e67616e20706968616b207465726b61697420756e74756b206d656e676574616875692070656e79656261626e79612e3c2f6c693e0d0a093c6c693e4a696b612062656c756d2c206170616b61682050656d646120737564616820736961702064656e67616e20646f6b756d656e2070656e64756b756e6720756e74756b2070656d62616e67756e616e20736172616e6120707261736172616e612074657273656275742c20736570657274692070656d6265626173616e206c6168616e2c2064756b756e67616e20504c4e2c2050657274616d696e612e3c2f6c693e0d0a093c6c693e416e616c697369732064616e207475616e676b616e2064616c616d204b4b453c2f6c693e0d0a3c2f756c3e0d0a0d0a3c6f6c3e0d0a093c6c693e0d0a093c703e4469736b7573692061746175206c616b756b616e2070657274656d75616e2064656e67616e2050656d6461207365706572746920426170706564612c2053657464612c2050657274616d696e612c20504c4e2c2044696e6173204b6f7065726173692064616e20554b4d20756e74756b206d656e696c6169206b6573696170616e206461657261682064616c616d206d656e64756b756e672050534b50542c20736570657274692052656e63616e612054617461205275616e6720646920426170706564612c206b6170617369746173206c69737472696b20646920504c4e2c2053746f6b2042424d2064692050657274616d696e612c2064756b756e67616e20616e67676172616e2064692053656b7265746172696174204461657261682c2064756b756e67616e2044696e6173204b6f7065726173692064616e20554b4d2064616c616d2070656d62656e74756b616e206b6f706572617369204b55422f506f6b64616b616e2f506f6b6c61687361723c2f703e0d0a093c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c756c3e0d0a093c6c693e0d0a093c703e4a696b6120646f6b756d656e2d646f6b756d656e2070656e64756b756e672062656c756d206164612c206469736b7573696b616e206c65626968206c616e6a757420756e74756b206d656e676574616875692070656e79656261626e79613c2f703e0d0a093c2f6c693e0d0a093c6c693e0d0a093c703e54616e79616b616e2c206170616b61682050656d64612074656c6168206d656d706572736961706b616e204150424420756e74756b206d656e64756b756e672050534b5054206469206461657261686e79613c2f703e0d0a093c2f6c693e0d0a093c6c693e0d0a093c703e4a696b612062656c756d2c206b616a692070656e79656261626e79613c2f703e0d0a093c2f6c693e0d0a093c6c693e0d0a093c703e416e616c6973697320686173696c206469736b75736920617461752070657274656d75616e2064656e67616e266e6273703b3c7370616e207374796c653d226c696e652d6865696768743a312e36656d223e534b5044207465726b6169742064616e207475616e676b616e2064616c616d204b4b452e3c2f7370616e3e3c2f703e0d0a093c2f6c693e0d0a3c2f756c3e0d0a0d0a3c6f6c3e0d0a093c6c693e0d0a093c703e3c7370616e207374796c653d226c696e652d6865696768743a312e36656d223ee2808b3c2f7370616e3e42756174206b6573696d70756c616e20686173696c206576616c756173692064616e207475616e676b616e2064616c616d2072656e63616e6120616b73693c2f703e0d0a093c2f6c693e0d0a3c2f6f6c3e, 0),
('5dd82fda451ab9961258d2c45b59e240520dcc3f', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'itj 1. BKIPM. TAO 1', '3da92cabe8a8473f55e638fa7dc43ea1753f40e8', 'Kesiapan BKIPM atas pelimpahan kewenangan', '', 0),
('d0d2f3c34a55db195c08f881ff9773bc8ff948b5', '4e66b7491b324b8ebd2a7262ad2847dbf31eb39b', 'itj 1. BKIPM. TAO 2', '3da92cabe8a8473f55e638fa7dc43ea1753f40e8', 'Kesiapan BKIPM atas pelimpahan kewenangan', '', 0),
('8ecf34f686ae299223013de2818c156865c3e1ee', '0525307297f9bed8984a8054918087dcf03c4bcf', 'Program kerja audit Menta', 'c37ccd97c72da477e51f3b71809016a5f13a5765', 'Perikanan Budidaya, Tangkap, PRL, BPSDM, PSDKP, PDSPKP Mentawai', 0x3c703e3c7374726f6e673e54414f2f54454f2050454e4741574153414e3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e3c7374726f6e673e50454e47454d42414e47414e204b41574153414e204b454c415554414e2044414e20504552494b414e414e20544552504144552028504b325054293c2f7374726f6e673e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e52657669752070657273696170616e2064616e206576616c756173692070656c616b73616e61616e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e54756a75616e203a3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e4d656e676964656e746966696b617369206b6567696174616e20706572656e63616e61616e2c2070656c616b73616e61616e2064616e206576616c75617369207065726365706174616e2070656d62616e67756e616e206b61776173616e206b656c617574616e2064616e20706572696b616e616e20746572696e746567726173692064692070756c61752d70756c6175206b6563696c20546168756e20323031352d323031362064692031352070756c61752e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c6f6c3e0d0a093c6c693e54454f20312e204576616c7561736920486173696c2050656c616b73616e61616e204b6567696174616e20544120323031352062656c756d2064696c616b73616e616b616e3b3c2f6c693e0d0a093c6c693e54454f20322e20506572656e63616e61616e204b6567696174616e20544120323031362042656c756d204d656d616461692e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c6f6c3e0d0a093c6c693e4d656e696c61692070656d616e66616174616e2070656d62616e67756e616e206b61776173616e206b656c617574616e2064616e20706572696b616e616e20746572696e746567726173692064692070756c61752d70756c6175206b6563696c20546168756e20323031352d323031362064692031352070756c61753c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c6f6c3e0d0a093c6c693e54454f20312e2050656d62616e67756e616e204b61776173616e20504b325054205441203230313520546964616b205365737561692064656e67616e20506572656e63616e61616e3b3c2f6c693e0d0a093c6c693e54454f20322e2050656c616b73616e61616e204b6567696174616e20504b325054205441203230313520546964616b205365737561692064656e67616e204b6f6e7472616b3b3c2f6c693e0d0a093c6c693e54454f20332e20486173696c2050656c616b73616e61616e204b6567696174616e20504b32505420544120323031352042656c756d2044696d616e666161746b616e2e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e50656e64616d70696e67616e2050656c616b73616e61616e204b6567696174616e20544120323031363c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e54756a75616e203a3c2f703e0d0a0d0a3c703e4d6579616b696e692070656c616b73616e61616e206b6567696174616e20544120323031362074656c6168207365737561692064656e67616e20706572656e63616e61616e2c207465726d6173756b206b6567696174616e2070656e67616461616e20626172616e672064616e206a6173612079616e672062657273756d62657220646172692064616e612070757361742064616e2054503c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54454f20312e2050656c616b73616e61616e206b6567696174616e2062656c756d207365737561692072656e63616e613b3c2f6c693e0d0a093c6c693e54454f20322e2050656c616b73616e61616e2050424a2062656c756d20736573756169206b6574656e7475616e2e3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e4d6f6e6576204b6567696174616e2044414b2074657268616461702050726f6772616d20504b3250543c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e54756a75616e203a3c2f703e0d0a0d0a3c703e4d656d616e7461752070656c616b73616e61616e206b6567696174616e20504b3250542079616e672062657273756d62657220646172692044414b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54454f20312e204b6567696174616e2044414b2062656c756d206d656d626572696b616e206b6f6e747269627573692079616e67206d656d616461692074657268616461703c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20504b3250542028506572656e63616e61616e2050656c616b73616e61616e2044414b2062656c756d2064696b6f6f7264696e6173696b616e2064656e67616e3c2f703e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b54696d20504b325054293b3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54454f20322e205065726b656d62616e67616e2070656c616b73616e61616e206b6567696174616e20504b3250542079616e672062657273756d62657220646172693c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20266e6273703b44414b2062656c756d2064696c61706f726b616e206b6570616461204d656e74657269204b502073656c616b75206b6f6f7264696e61746f722074656b6e69733c2f703e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20285065726d656e204b50204e6f2035312f5045524d454e2d4b502f323031342074656e74616e6720706574756e6a756b2074656b6e69732070656e6767756e61616e3c2f703e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2044414b20626964616e67204b656c617574616e2064616e20506572696b616e616e20546168756e2032303135293c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e41756469742050656c616b73616e61616e2050726f6772616d20504b3250543c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e54756a75616e203a3c2f703e0d0a0d0a3c703e4d656d7065726f6c6568206b6579616b696e616e2079616e67206d656d616461692062616877612070656e67656d62616e67616e206b61776173616e206b656c617574616e2064616e20706572696b616e616e2064692070756c61752d70756c6175206b6563696c207465726c7561722074656c61682064696c616b73616e616b616e20736563617261206566656b7469662c206566697369656e2064616e20656b6f6e6f6d69733c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54414f20312e2050656c616b73616e61616e206b6567696174616e2062656c756d206566656b7469662028686173696c2070656c616b73616e61616e206b6567696174616e2074656c61683c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b2064696d616e666161746b616e207365737561692064656e67616e2072656e63616e612f74756a75616e293c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54414f20322e2050656c616b73616e61616e206b6567696174616e2062656c756d206566697369656e2028686173696c2070656c616b73616e61616e206b6567696174616e20746964616b3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b206d656d626572696b616e206e696c61692074616d626168293c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e54414f20332e2050656c616b73616e61616e206b6567696174616e2062656c756d20656b6f6e6f6d69732028686173696c2070656c616b73616e61616e206b6567696174616e20746964616b3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c703e266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b266e6273703b20736573756169206b6f6e7472616b293c2f703e, 0);
INSERT INTO `ref_program_audit` (`ref_program_id`, `ref_program_id_type`, `ref_program_code`, `ref_program_aspek_id`, `ref_program_title`, `ref_program_procedure`, `ref_program_del_st`) VALUES
('d15a26d62e73e45b9ec115b47508e87dffa84072', '0525307297f9bed8984a8054918087dcf03c4bcf', 'PKA P3D', '688d723bd69b2d06980b519ca49badc09f16ee4d', 'penyuluhan', 0x3c6f6c3e0d0a093c6c693e50617374696b616e20536f7369616c6973617369205555204e6f6d6f7220323320546168756e20323031342064616e20536f7369616c69736173692050656e67616c6968616e205033442074656c6168206469746572696d612063756b7570206a656c61732f746964616b206f6c65682050656d6461202842616b6f726c75682f424b50502f44696e6173204b502050726f762064616e20426170656c7568204b61622e2f6b6f7461292064616e2050656e79756c756820506572696b616e616e20504e53266e6273703b2064656e67616e206d656e6767756e616b616e206b756573696f6e6572207465726c616d7069723b3c2f6c693e0d0a093c6c693e50617374696b616e2053757261742045646172616e204b656d656e6461677269206e6f203132302f3235332f534a2074616e6767616c203135204a616e7561726920323031352c2074656c6168206469746572696d61206f6c65682050656d646120736574656d7061743b3c2f6c693e0d0a093c6c693e4170616b6168205065646f6d616e2f4a756b6c616b2f4a756b6e697320496e76656e746172697361736920506572736f6e696c205033442074656c6168206469746572696d61206f6c6568206461657261682e204a696b612062656c756d206469746572696d612c206b616a69207570617961207065726365706174616e2070656e67616c6968616e206f6c65682050656d646120736574656d7061742e3c2f6c693e0d0a093c6c693e50656c616a6172692064617461206a756d6c61682050656e79756c756820506572696b616e616e20504e532064692074696e676b61742050726f76696e73692064616e206b61622f6b6f74612c2073656c616e6a75746e79612064617061746b616e204461667461722050656e79756c756820504e532079616e67207375646168206d656c616b756b616e2070656e646166746172616e20503344206261696b20736563617261204f6e6c696e65206b65207777772e7075736c75682e6b6b702e676f2e6964206d617570756e20736563617261206c616e6773756e672e3c2f6c693e0d0a093c6c693e4b616a69206c65626968206c616e6a75742061706162696c612062656c756d2073656c757275682050656e79756c756820504e53206d656c616b756b616e2070656e646166746172616e206d656c616c7569206b6f6e6669726d617369206b652050656e79756c75682079616e672062657273616e676b7574616e2064616e2061746175206b652041746173616e204c616e6773756e672050656e79756c75682062657273616e676b7574616e20756e74756b206d656e64617061746b616e206b656e64616c612f7065726d6173616c6168616e2064616e2075706179612070656e79656c65736169616e6e79612e3c2f6c693e0d0a093c6c693e50656c616a617269206461746120736172616e612f707261736172616e612050656e79756c756820506572696b616e616e20504e53266e6273703b207465726b616974206a656e69732c206a756d6c61682064616e206b6f6e643c2f6c693e0d0a093c6c693e69736920626172616e6720286261696b2c20727573616b2c2068696c616e672c2070696e6a616d2070616b61692920736572746120646f6b756d656e266e6273703b2050656e79756c7568616e207465726b6169742064692050656d646120736574656d706174202867756e616b616e206c616d706972616e2033207365626167616920616c617420756a69292e3c2f6c693e0d0a093c6c693e496e76656e74617269736972206b656e64616c612f7065726d6173616c6168616e2079616e672064696861646170692064616c616d2070726f7365732070656e67616c6968616e20736172616e612f707261736172616e612050656e79756c756820506572696b616e616e2064616e2075706179612070656e79656c65736169616e206f6c65682050656d646120736574656d7061743b3c2f6c693e0d0a093c6c693e427561746b616e2073696d70756c616e2064616e2052656e63616e6120416b7369206576616c75617369207365727461207475616e676b616e2064616c616d204b4b452e3c2f6c693e0d0a3c2f6f6c3e, 0),
('7f944c264f75889756e3d43ab566406cc016e842', '0525307297f9bed8984a8054918087dcf03c4bcf', 'KPA.01', '6031fc656ebe93a64d401dc66eace039c475389e', 'Kawasan Budidaya', 0x3c6f6c3e0d0a093c6c693e44617061746b616e3c2f6c693e0d0a093c6c693e52657669753c2f6c693e0d0a093c6c693e556a693c2f6c693e0d0a093c6c693e4f62736572766173693c2f6c693e0d0a3c2f6f6c3e, 0),
('d917bd94618760e3579409da1c51d313719be59d', '0525307297f9bed8984a8054918087dcf03c4bcf', 'KPA.02', '6031fc656ebe93a64d401dc66eace039c475389e', 'Kawasan Budidaya', '', 0),
('4456037e8e3d892c43deda4d06ae237555d3a28a', '0525307297f9bed8984a8054918087dcf03c4bcf', 'PK2PT It 4', '8f82a264012563a6e9b4105025bb5869d35a34a5', 'ICS Persiapan', '', 0),
('c04cd0ffd00bd26686d30c047aed335219e3df79', '0525307297f9bed8984a8054918087dcf03c4bcf', '123qwe', '3c7f1096de7da99484a42852da60792858994c60', 'Dinas Kelautan dan Perikanan Provinsi Papua Barat, Dinas Kelautan dan Perikanan Kab. Sorong, Dinas Kelautan dan Perikanan Kab. Raja Ampat', 0x3c703e3132337177656164737a78633c2f703e, 0),
('ad1da4b82408bc0185b3717b68a84347b799b394', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO101', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Administrasi Keuangan', 0x3c6f6c3e0d0a093c6c693e4c616b73616e616b616e206f706e616d65206b6173206261696b20727574696e206d617570756e20504e42502064616e20627561746b616e204265726974612041636172612073657274612052656769737465726e79613c2f6c693e0d0a3c2f6f6c3e, 1),
('e7fd65a46b38ece2e6522bc4d8eee4b317d9df75', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'A0102', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Administrasi Keuangan', 0x3c703e322e2054656c6974692062756b752d62756b752079616e672064692070657267756e616b616e206f6c65682042656e6461686172612e3c2f703e, 1),
('058201d08759e38c02de809f3957091c3ba8c265', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO103', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Administrasi Keuangan', 0x3c703e332e20486974756e672073656d75612075616e672074756e61692064616e2073757261742d73757261742062657268617267612079616e67206164612064692064616c616d206272616e6b61732c206170616b6168206164612075616e672074756e61692064616e2073757261742062657268617267612079616e6720746964616b20646973696d70616e20646964616c616d206272616e6b61732e3c2f703e, 1),
('7c10f38908048783e128382920e6ef8a3063aff0', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO104', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Administrasi Keuangan', 0x3c703e342e204c616b756b616e2070656e67756a69616e207465726861646170206b6562656e6172616e2062756b74692d62756b74692079616e67206164612e2054656c697469206170616b61682073656d75612070656e6572696d61616e2064616e2070656e67656c756172616e20646964756b756e672064656e67616e2062756b74692d62756b74692079616e6720737961682064616e20646963617461742064616c616d20424b552064616e2062756b752070656d62616e7475207365737561692070656d626562616e616e6e79612e3c2f703e, 1),
('1debe9d2c40ccbcf923f27312bb990623f4461e9', 'd5aaabf0d82997143dc645655cbc911b4b5de4f4', 'AO120', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Perjalanan Dinas', 0x3c703e332e2054656c6974692070726f73656475722070656d726f736573616e20535050442064616e204b6575616e67616e6e79612e3c2f703e, 1),
('b5525b1ed556d250c64fc2fab2d27cd3d5a5db22', 'd5aaabf0d82997143dc645655cbc911b4b5de4f4', 'AO121', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Perjalanan Dinas', 0x3c703e342e2054656c69746920646f6b756d656e207065726a616c616e616e2064696e61732074696170207065676177616920706572696f64652079616e6720646961756469742e3c2f703e, 1),
('97a38e360c6df6f7284d998f153f507d223aeda7', 'd5aaabf0d82997143dc645655cbc911b4b5de4f4', 'AO124', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Pertanggung Jawaban', 0x3c703e332e2054656c6974692070657274616e6767756e676a61776162616e2070656e67656c6f6c61616e206b6575616e67616e2064616e2061646d696e697374726173692079616e672064696c616b73616e616b616e206f6c6568204b50412e3c2f703e, 1),
('d831c1b09730447d11f108a4e8387dc2845cba3a', 'd5aaabf0d82997143dc645655cbc911b4b5de4f4', 'AO125', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Pertanggung Jawaban', 0x3c703e342e2054656c69746920686f6e6f722070656e67656c6f6c6120616e67676172616e2e3c2f703e, 1),
('e5f00a396cef35488463f371b289a6506c3d265c', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO118', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Perjalanan Dinas', 0x3c703e312e2054656c69746920646166746172206e616d6120706567617761692079616e67206d656c616b756b616e207065726a616c616e616e2064696e61732064656e67616e207265616c69736173696e79612e3c2f703e, 1),
('b9def4e29d847f04d6221c90bc294dbae848b154', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO119', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Perjalanan Dinas', 0x3c703e322e2054656c697469207461726966207265736d69207472616e73706f727420616e746172206b6f74612064616e206c756d7073756d6e79612e3c2f703e, 1),
('aff52852a70273f85b8a6ef2fb96891ed9aa8ff6', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO122', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Pertanggung Jawaban', 0x3c703e312e2054656c6974692070657274616e6767756e67206a61776162616e2061646d696e69737472617369206b6575616e67616e2079616e6720646962756174206f6c65682042656e646168617261206170616b61682074656c6168207365737561692064656e67616e206b6574656e7475616e2079616e67206265726c616b752e3c2f703e, 1),
('8911974679fbab43bef6ad6ebdad9262e19e91da', 'd5aaabf0d82997143dc645655cbc911b4b5de4f4', 'AO123', '277f1441ce02dbf662e6feb6c669b603a4de35d0', 'Pertanggung Jawaban', 0x3c703e322e2054656c6974692073697374656d206c61706f72616e206b6575616e67616e2064616e20646f6b756d656e2070656e67656c6f6c61616e206b6575616e67616e206170616b61682074656c6168207365737561692064656e67616e206b6574656e7475616e2079616e67206265726c616b752e3c2f703e, 1),
('279cc6f919cc049c27b696579f26b45cb689fa45', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO126', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Tanah, Gedung dan Taman Alat', 0x3c703e312e2054656c69746920646f6b756d656e206b6570656d696c696b616e2026616d703b20666973696b2074616e61683c2f703e, 1),
('742e181edf8420ee005ac83ebf3821786311caba', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO127', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Tanah, Gedung dan Taman Alat', 0x3c703e322e2054656c697469207374616e646172642064616e2068616d626174616e2074657268616461702074616d616e20616c61742f20676564756e672074656d70617420616c61742e3c2f703e, 1),
('8b01613ac18c52ee0bd02b18fe51a8d69c1f8437', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO128', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Komunikasi', 0x3c703e312e2054656c697469206b6f6d756e696b617369206175646974616e2064656e67616e20706968616b207465726b6169742e3c2f703e, 1),
('5a058836919ccce8d78d599cdf95811666f23a51', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO129', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Komunikasi', 0x3c703e322e2054656c697469206a656e69732d6a656e6973206b6f6d756e696b6173692064656e67616e20706968616b206c61696e2064616c616d2070656e79616d706169616e20646174612e3c2f703e, 1),
('560ec571168d5cfc432c05803d85de0771d83ede', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO130', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e312e2054656c69746920646f6b756d656e206461667461722053494d414b2d424d4e2079616e672064696d696c696b69204175646974692c206170616b616820736573756169206b6574656e7475616e2e3c2f703e, 1),
('eb61802face4ee5df2735d7919242b871dfe112c', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO131', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e322e2054656c6974692070656e6174617573616861616e20706572616c6174616e206f7065726173696f6e616c2064616e206170616b61682074656c616820646962756b756b616e20736573756169206b6574656e7475616e3c2f703e, 1),
('2e9ed19debae30bf985b66da8aab42e90e034b93', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO132', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e332e2042616e64696e676b616e20706572616c6174616e2079616e6720646962756b756b616e2064656e67616e6b656e79617461616e206469206c6170616e67616e2e3c2f703e, 1),
('62bc8bf40d8f767e6c4579d343c74ed949496e1c', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO133', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e342e2054656c6974692072656e63616e612070656e67616461616e20626172616e672f20706572616c6174616e2f2070656d656c6968617261616e2c206170616b6168207375646168207365737561692064656e67616e20616c6f6b6173692064616e612064616c616d205250552c2052696e6369616e2050656e6767756e61616e2064616e6120756e74756b206b657065726c75616e207269696c2073656c616d6120312062756c616e207365727461207375726174207065726e79617461616e2050656e6767756e61616e2044616e612e3c2f703e, 1),
('6f9fe9a231084a247ed07c34c4c3391a65a7ad04', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO137', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Perencanaan', 0x3c703e312e2054656c697469206a756d6c61682064616e206b6f6d706574656e736920706567617761692c206170616b61682074656c6168207365737561692064656e67616e20626562616e206b65726a612e3c2f703e, 1),
('265258c7020acd7fd26fe0c65682e05b968ba641', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO138', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Perencanaan', 0x3c703e322e2054656c6974692070656e656d706174616e20706567617761692c206170616b61682074656c6168207365737561692072656e63616e612064656e67616e206b6f6d706574656e73696e79612e3c2f703e, 1),
('f21a0d2330bd3640dfbc3ffc79c560023e3a4246', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO139', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Perencanaan', 0x3c703e332e2054656c6974692c206170616b616820706572656e63616e61616e2064616e266e6273703b2070656e67656d62616e67616e206b61726965722079616e67206d656e6761637520706164612070657261747572616e206a656e6a616e67206b6172697220504e532079616e67206265726c616b752074656c6168206469206275617420736563617261207472616e73706172616e3c2f703e, 1),
('63642bf948a2d038ef75530bf5e4b6d76d512a62', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO141', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Pengadaan dan Penempatan', 0x3c703e312e2054656c6974692070656e67616461616e207065676177616920626172752074656c6168207365737561692064656e67616e2070657261747572616e2079616e67206265726c616b752064616e20746572646170617420756e737572204b4b4e2e3c2f703e, 1),
('c16d98515b074b33d12679187bedb80352d036d6', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO142', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Pengadaan dan Penempatan', 0x3c703e322e2054656c6974692070656e6572696d61616e207065676177616920626172752074656c6168207365737561692064656e67616e20666f726d6173692079616e672064692074657461706b616e2e3c2f703e, 1),
('d02cf622ee99c030cf2c6d3c1334da1abc7a4f87', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO144', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Penilaian dan Penegakkan Disiplin', 0x3c703e312e2054656c6974692074696e676b6174206b6564697369706c696e616e20706567617761692064616e206170616b61682070656c616e67676172616e2064697369706c696e2079616e672064696c616b756b616e2074656c6168206469626572692073616e6b736920736573756169206b6574656e7475616e2079616e67206265726c616b752e3c2f703e, 1),
('10d96cff44ba7d1324641b8b9ff541fb6c544065', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO145', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Penilaian dan Penegakkan Disiplin', 0x3c703e322e2054656c697469206170616b61682064617361722070656e797573756e616e204450332074656c6168207365737561692064656e67616e206b6574656e7475616e2e3c2f703e, 1),
('6a75dddf76980809a88d3859024d20aa9ccca691', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO146', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e312e2054656c697469206170616b6168207465726a616469204261636b204c6f67204b656e61696b616e2070616e676b61742e3c2f703e, 1),
('e87231afb5331233689102015396ee51d90633b2', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO147', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e322e2054656c69746920666f726d617369206a61626174616e20737472756b747572616c3c2f703e, 1),
('bd74d1cfd89d6db69c6c221fc0f2cb5ee43a3c4f', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO148', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e332e2054656c697469206170616b616820746572646170617420706567617761692079616e672070616e676b61746e7961206c656269682074696e67676920646172692061746173616e6e79612e3c2f703e, 1),
('cbc58a363109e93cf951958096411375c5b5f3cb', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO152', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Kesejahteraan, Pemberhentian dan Pensiun', 0x3c703e312e2054656c69746920706567617761692079616e672062656c756d206d656e64617061742070656e676861726761616e20646172692070656d6572696e74616820736573756169206b6574656e7475616e2e3c2f703e, 1),
('b7f3cea02dc373f7ff15428f0ad37dd795f5fef6', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO153', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Kesejahteraan, Pemberhentian dan Pensiun', 0x3c703e322e2054656c6974692070656d62657268656e7469616e20506567617761692c206170616b61682074656c61682064696c616b73616e616b616e20736573756169206b6574656e7475616e2079616e67206265726c616b3c2f703e, 1),
('9688c1f7f3b059ccdae654c27bad4ab90189f228', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO155', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Penatausahaan Kepegawaian', 0x3c703e312e2054656c6974692070656e797573756e616e2064616e2070656e676972696d616e20646166746172204e6f6d696e6174696620506567617761692026616d703b2044554b2e3c2f703e, 1),
('95271a2d04d30151cdad1a7f4c48b9511f24b9ca', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO156', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Penatausaahan Kepegawaian', 0x3c703e322e2054656c6974692070656e67656c6f6c61616e2064617461206b6570656761776169616e20284b617269732c204b617273752c204b61727065672c20646c6c2e292e3c2f703e, 1),
('7d98203937109e97febe79eebc4325d0eab4dfaa', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO157', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e312e2054656c6974692075726169616e2064616e2070656d62616769616e20747567617320706567617761692c3c2f703e, 1),
('e1c04f69ca24d3c170b45fd446d7cc4b92269b49', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO158', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e322e2054656c697469206170616b6168207465726461706174206b6567696174616e2074616d626168616e2064616c616d20737472756b747572206f7267616e69736173692c3c2f703e, 1),
('313f6e90a407843576949f6a52332509cbc1ad08', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO159', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e332e2054656c697469206170616b616820747567617320706f6b6f6b2073756461682064696a616261726b616e206d656e7572757420626964616e676e79612c3c2f703e, 1),
('e4e0245d8a79e6e3fe0ea71c26d57791221cd44f', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO160', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e342e2054656c697469206170616b6168204175646974616e2074656c6168206d656e79656c656e67676172616b616e2070656e67616d6174616e2c2070656e67756d70756c616e2064616e2070656e7965626172616e2c2070656e676f6c6168616e20646174612c20616e616c6973612064616e207072616b697261616e2063756163612c2070656c6179616e616e204a617361204d6574656f726f6c6f67692f204b6c696d61746f6c6f67692064616e204b75616c697461732075646172612f2047656f666973696b612e3c2f703e, 1),
('c69be875fcc43892303207ad17b82079c6f35d34', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO165', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Pahami SPI yang ada dengan cara:', 0x3c703e312e2050656e696e6a6175616e206c6170616e67616e3c656d3e20283c7374726f6e673e6f6e207369746520746f75723c2f7374726f6e673e292c3c2f656d3e206d656c6968617420646172692064656b61742073656361726120736570696e7461732073756d62657220646179612079672064696d696c696b69206175646974692e3c2f703e, 1),
('b56a88b93c12a44acdcdad122b444f273a7d2640', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO166', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Pahami SPI yang ada dengan cara:', 0x3c703e322e2050656c616a61726920446f6b756d656e2079616e67206164612c20756e74756b206d656e646574656b73692070657275626168616e322073697374656d2070656e67656e64616c69616e2079672074656c61682064696c616b756b616e2064616e20746964616b20746572646574656b73692064616c616d207065726d616e656e742066696c652e3c2f703e, 1),
('186aa374c5c9c2babd8ad7adb4d8633e260dad89', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO167', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Pahami SPI yang ada dengan cara:', 0x3c703e332e4d656e756c69732075726169616e206b6567696174616e206175646974693c7374726f6e673e3c656d3e2c203c2f656d3e3c2f7374726f6e673e6d6973616c6e79612074656e74616e673a20266e6273703b266e6273703b3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e54756a75616e206b6567696174616e206f7065726173696f6e616c206175646974692c3c2f6c693e0d0a093c6c693e4261746173616e32206c696e676b756e67616e2c3c2f6c693e0d0a093c6c693e46756e677369322064617269206b6f6d706f6e656e322064616c616d206f7267616e69736173692c3c2f6c693e0d0a093c6c693e73756d6265726461796120286a756d6c61682064616e206b6c61736966696b6173692074656e616761206b65726a612c2061727573206b61732c2074616e61682c20676564756e672064616e20706572616c6174616e2c2073697374656d20696e666f726d617369207362292c3c2f6c693e0d0a093c6c693e417370656b206d616e616a656d656e2e3c2f6c693e0d0a3c2f756c3e, 1),
('7efbd2bac1a10487907bb92ab61907443bd6c01f', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO168', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan prosedur analisis terhadap kondisi SPI auditan melalui', 0x3c703e312e20426167616e20617275732028666c6f77206368617274292c206d656e79616a696b616e206b6567696174616e206f7065726173696f6e616c2073756174752073697374656d2070656e67656e64616c69616e2064616c616d2062656e74756b20677261666973206d656e6767756e616b616e2073696d626f6c2d73696d626f6c3c7374726f6e673e2e3c2f7374726f6e673e3c2f703e, 1),
('6d762e692a60995700871ed358628277beca9d3d', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO169', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan prosedur analisis terhadap kondisi SPI auditan melalui', 0x3c703e322e204e61726173692e3c2f703e, 1),
('ac0cb4dc307039faa12ed0cd821514f113a8c6d9', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO170', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan prosedur analisis terhadap kondisi SPI auditan melalui', 0x3c703e332e20496e7465726e616c20636f6e74726f6c207175657374696f6e616972652028494351292079616e6720646974656c6974692064616e206469737573756e206f6c65682061756469746f7220756e74756b2064696a61776162206f6c65682070656a61626174206175646974692f64696a617761622073656e64697269206f6c65682061756469746f722062657264617361726b616e20686173696c206f62736572766173692c20616e616c697369732064616e2070656e67756a69616e20646f6b756d656e20746572686164617020756e7375722d756e7375723a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e4c696e676b756e67616e2050656e67656e64616c69616e3c2f6c693e0d0a093c6c693e50656e696c6169616e20526973696b6f3c2f6c693e0d0a093c6c693e4b6567696174616e2050656e67656e64616c69616e3c2f6c693e0d0a093c6c693e496e666f726d6173692064616e204b6f6d756e696b6173693c2f6c693e0d0a093c6c693e50656d616e746175616e3c2f6c693e0d0a3c2f756c3e, 1),
('0338356e7c15f2dc3b913edb69113aa590aabade', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO171', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Bandingkan antara kondisi pengendalian dengan pengendalian kunci dan teliti apakah terjadi kesenjangan,', 0x3c703e312e204c696e676b756e67616e2050656e67656e64616c69616e3c2f703e, 1),
('1464050f83fceb8e4a7257b9db57be19a3dad1f1', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO172', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Bandingkan antara kondisi pengendalian dengan pengendalian kunci dan teliti apakah terjadi kesenjangan,', 0x3c703e322e2050656e696c6169616e20526973696b6f2e3c2f703e, 1),
('0e078f925eab33b54b6c382d712344f2f8263879', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO176', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan pengujian terbatas atas pelaksanaan SPI dan identifikasikan akibat potensial yg mungkin timbul dari kelemahan SPI tsb serta unsur pengendalian yang diperlukan untuk menutupi kelemahan tsb.', 0x3c703e312e2050656e67656e64616c69616e2050726576656e746976652e3c2f703e, 1),
('04d738247b9397a52f15e089da72546516d22960', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO177', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan pengujian terbatas atas pelaksanaan SPI dan identifikasikan akibat potensial yg mungkin timbul dari kelemahan SPI tsb serta unsur pengendalian yang diperlukan untuk menutupi kelemahan tsb.', 0x3c703e322e2050656e67656e64616c69616e266e6273703b44657465637469662e3c2f703e, 1),
('636a403e52e27dc2df6cc87fe43e22195fff61ac', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO181', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) Informasi mengenai gambaran umum Auditi, seperti:', 0x3c703e312e20566973692c204d6973692064616e205374726174656769204175646974692e3c2f703e, 1),
('10187de9b7aadede852c57b71ee89858ffe82dbf', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO182', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e322e2050657261747572616e20706572756e64616e672d756e64616e67616e2079616e67206d656e6a616469206461736172206f7267616e6973617369204175646974692e3c2f703e, 1),
('dffd871143c92f919fd84649b2503de15fe51d5f', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO183', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e332e204b6562696a616b616e2d6b6562696a616b616e2064616e207065646f6d616e2070657261747572616e20696e7465726e616c2e3c2f703e, 1),
('6b84f3384536c68b44be40e05d68778075b440ae', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO190', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Pahami dan telaah Tugas Pokok dan Fungsi (Tupoksi) Auditi', 0x3c703e312e2044617061746b616e2067616d626172616e207365636172612075747568206b6567696174616e207574616d61204175646974692e3c2f703e, 1),
('38b09e66964f1c7379d45322e398b91529b21b32', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO191', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Pahami dan telaah Tugas Pokok dan Fungsi (Tupoksi) Auditi', 0x3c703e322e2042756174205065746120283c656d3e726f6164206d61703c2f656d3e292061746173206b6567696174616e207574616d612074657273656275742e3c2f703e, 1),
('0a43982d248c51d494724beb0d6da0aebbc657f4', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO192', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e312e204964656e746966696b61736920646f6b756d656e206b6f6e7472616b2070656b65726a61616e20797979792e3c2f703e, 1),
('1387313402ace7773b17e04e557b8d7cdb1a0c65', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO193', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e322e204c616b756b616e20616e616c697369732061746173207374616e646172206d75747520686173696c206b65726a6120286f757470757429206461726920746961702d746961702070656b65726a61616e207574616d61206461726920746961702062616769616e2f66756e6773692c3c2f703e, 1),
('6bbb73a0e9c11bd7c51de47c8315532ae3d81f3d', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO194', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e332e204c616b756b616e2070656d62616e64696e67616e20616e74617261206f75747075742079616e67206469686173696c6b616e2064656e67616e207374616e646172206d7574752c3c2f703e, 1),
('6a07b84fdf890def594e18f3efb39e18dcf954f5', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP198', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e312e2044617061746b616e204850532079616e67206469627561742050504b2e2028485053206461706174206469627561742073656e64697269206f6c65682050504b2c20617461752062657264617361726b616e2045452079616e67206469737573756e206f6c6568206b6f6e73756c74616e20706572656e63616e612c20736574656c6168206469207265766975206b656d62616c69206f6c656820506f6b6a6120554c502f2050656a616261742050656e67616461616e292e3c2f703e, 1),
('4a0c9898984807544428ef2d48467f3b35174d1a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP199', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e322e2054656c6974692070656e65746170616e20766f6c756d652079616e6720646967756e616b616e2064616c616d20706572686974756e67616e204850532c207465727574616d61206b6f6566697369656e2d6b6f6566697369656e20757061682c20626168616e2064616e20706572616c6174616e206170616b61682074656c61682077616a617220617461752074656c616862657264617361726b616e2062756b74692079616e6720646170617420646970657274616e6767756e676a617761626b616e2e3c2f703e, 1),
('80b896e7ed5e9d572508a2e1458c47722f1ca1ff', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP200', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e332e2054656c697469206170616b61682070656e65746170616e2068617267612064616c616d20706572686974756e67616e204850532074656c616820646964617361726b616e207061646120686172676120736574656d706174206d656e6a656c616e672064696164616b616e70726f7365732070656e67616461616e2028485053206469737573756e2070616c696e67206c616d6120323820286475612070756c75682064656c6170616e292068617269206b65726a6120736562656c756d20626174617320616b6869722070656d6173756b616e2070656e61776172616e292c20696e666f726d6173692062696179612073617475616e2079616e672064697075626c696b6173696b616e20736563617261207265736d692028425053292f2061736f7369617369207465726b6169742064616e2064617461206c61696e2079616e6720646170617420646970657274616e6767756e676a617761626b616e2c206461667461722062696179612f7461726966626172616e672f6a6173612079616e672064696b656c7561726b616e206f6c6568206167656e2074756e6767616c2f70616272696b616e2c206269617961206b6f6e7472616b20736562656c756d6e79612879616e6720736564616e67206265726a616c616e292064616e20646166746172206269617961207374616e6461722079616e672064696b656c7561726b616e206f6c656820696e7374616e73692079616e672062657277656e616e672e266e6273703b3c2f703e, 1),
('d1b7ca3c51d8d1d92ef9b9bca51c16daae2feec3', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP201', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e342e266e6273703b59616b696e6b616e206b656162736168616e207265666572656e73692d207265666572656e73692070656e797573756e616e204850532079616e67206469626572696b616e206175646974616e2e202842697361207465726a616469206261687761207265666572656e736920617461752064616674617220686172676120737570706c6965722079616e6720646967756e616b616e206175646974616e206d656e797573756e2048505320746964616b2062656e61722f50616c7375292e3c2f703e, 1),
('f26ff5347bf3545f7f4a0854ae452387a9d5ed2b', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP202', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e352e2059616b696e6b616e20626168776120737065736966696b61736920626172616e672f706572616c6174616e2064656e67616e206861726761207265666572656e73692079616e6720646967756e616b616e206f6c6568206175646974616e2064616c616d2070656e797573756e616e204850532074656c6168207365737561692064656e67616e20737065736966696b6173692079616e6720616b616e20646974617761726b616e2e3c2f703e, 1),
('ac62d18553a6377e0f9e6353af6cbcfc08544409', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP203', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e362e2059616b696e6b616e206261687761204850532079616e6720646974657461706b616e2073756461682064696a6164696b616e20616375616e2064616c616d206d656e656e74756b616e204a616d696e616e2050656c616b73616e61616e2e4361746174616e3a2041706162696c612068617267612070656e61776172616e20646172692070656e796564696120626172616e672f6a6173612079616e6720616b616e20646974657461706b616e206d656e6a6164692070656d656e616e672062657261646120646920626177616820383025204850532c206d616b61206a616d696e616e2070656c616b73616e61616e206861727573206469686974756e67206d696e696d616c2073656265736172203525206461726920746f74616c204850532e3c2f703e, 1),
('fba80c2baa34bf137305ee131e831817ff539a43', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP204', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e372e2054656c6974692052414220485053206170616b61682074656c6168206469737573756e2062657264617361726b616e20504f2e3c2f703e, 1),
('e5c9f28e04f8070436209150e683a7b899d07718', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP206', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultansi', 0x3c703e392e20556a6920646174612079616e67206469757261696b616e2064616c616d20637572726963756c756d20766974616520284356292074656e616761206b6f6e73756c74616e2c20612e6c2e2064656e67616e206d656d696e74612073616c696e616e20696a617a61682c2064616e206d656e656c6974692070656e67616c616d616e207375627374616e7369616c6e79612079616e6720646964756b756e672064656e67616e207265666572656e736920646172692070656e6767756e61206a61736120736562656c756d6e79612e3c2f703e, 1),
('c1a1fa91e8de658a9e17c769edfbffbabd35907a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP207', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31302e20556a692062696c6c696e6720726174652079616e6720646974657461706b616e2064616c616d206b6f6e7472616b2064656e67616e206b6574656e7475616e2079616e67206265726c616b75202861706162696c6120616461292e3c2f703e, 1),
('f5b9e91f8642bb03dc0dbc4def7d0817a9b01f72', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP208', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31312e2042616e64696e676b616e20626961796120706572736f6e696c2064616c616d206b6f6e7472616b2064656e67616e20626961796120706572736f6e696c2079616e67206469617475722064616c616d20544f522e3c2f703e, 1),
('0c14882076ff46c37e9d608efd950afa174d3f5e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP209', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31322e2059616b696e6b616e206261687761206269617961206e6f6e20706572736f6e696c2079616e67206469626562616e6b616e2074656c61682073657375616920286469706572626f6c65686b616e292064616c616d206b6574656e7475616e206b6f6e7472616b2e20556a69206170616b61682064616c616d206269617961206e6f6e20706572736f6e696c2074657264617061742062696179612070656d62656c69616e2f70656e67616461616e20626172616e672e204a696b61206164612c2074656c697469206170616b61682074656c61682064696c616b73616e616b616e20736563617261206566697369656e2064616e20656b6f6e6f6d69732c207365737561692064656e67616e206b6574656e7475616e2064616c616d204b657070726573204e6f2e20383020746168756e20323030332c20284d6973616c6e7961206d656c616c75692070657262616e64696e67616e206861726761206469616e746172612062656265726170612070656e61776172292e3c2f703e, 1),
('9dfa9c84ea78996f74652b0d482d70047c248e88', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP210', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31332e20506572696b7361206e616d612d6e616d6120706572736f6e696c2079616e6720646974657461706b616e2064616c616d206b6f6e7472616b2c2062616e64696e676b616e2064656e67616e20646166746172206861646972206b6f6e73756c74616e2e20556a69206170616b616820646166746172206861646972207465727365627574206461706174206469616e64616c6b616e202872656c6961626c65292e2041706162696c61206164612070656e6767616e7469616e2c2074656c697469206170616b616820706572736f6e696c2070656e6767616e74696e7961206d696e696d616c207365746172612064656e67616e20706572736f6e696c2079616e6720646963616e74756d6b616e2e3c2f703e, 1),
('e8ea895348ee1a0edb3bb352feb3c8ead9813069', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP211', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31342e20506572696b7361206b6f6e7472616b206c61696e2079616e6720646974616e646174616e67616e69206f6c6568206b6f6e73756c74616e2064656e67616e2070726f79656b206c61696e2064656e67616e2077616b74752079616e672062657273616d61616e2064616e2074656c697469206170616b616820706572736f6e696c2d706572736f6e696c2079616e672074657264617061742064616c616d206b6f6e7472616b20746964616b2074657264617061742064616c616d206b6f6e7472616b206c61696e2074657273656275742e3c2f703e, 1),
('975cb348c5de2a6a47a3d2953108a870613a2e0c', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP212', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31352e20506572696b73612062756b7469207265616c69736173692070656d6261796172616e206b6570616461206b6f6e73756c74616e2c2064616e2074656c697469206170616b61682070656d6261796172616e2074657273656275742074656c6168207365737561692064656e67616e2070726573746173692079616e672064696c616b73616e616b616e2c207465726d6173756b2070726f6772657373207265706f72742e3c2f703e, 1),
('0a00e2c2cc54331b946a8b5ec906070745dc06a7', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP213', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31362e2054656c697469206b6562656e6172616e20646166746172206b656861646972616e206b6f6e73756c74616e2064692074656d7061742070656b65726a61616e2c2064616e206d656d62616e64696e676b616e2064656e67616e206461667461722068616469722072617061742d7261706174206b6f6e73756c74616e73692064616e2064616c616d206b6567696174616e206c61696e2079616e67206265726b616974616e2064656e67616e206b6f6e7472616b2079616e67206469706572696b73612e3c2f703e, 1),
('0449f836a5ca21de9e85437394cb25661b0751d5', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP214', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e31372e20506572696b7361206170616b61682074657264617061742070656e6767616e7469616e2074656e616761206b6f6e73756c74616e2073656c616d61206d6173612070656c616b73616e61616e206b6f6e7472616b206b6f6e73756c74616e206261696b2079616e67206469616a756b616e206f6c65682070656e7965646961206a617361206d617570756e2070656e6767756e61206a6173612e2042696c61206164612c20706572696b7361206170616b61682070656e6767616e7469616e266e6273703b266e6273703b746572736562757420746964616b206d656e67616b696261746b616e206b75616c6966696b6173692074656e616761206b6f6e73756c74616e206c656269682072656e6461682064617269706164612079616e6720646967616e74692c207365727461206164616e79612070656e616d626168616e2062696179612e3c2f703e, 1),
('356d6faeb676ac8558f7397ee461b8f965abacbc', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP215', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31382e2042616e64696e676b616e206a616e676b612077616b7475206b6f6e7472616b206a617361206b6f6e73756c74616e73692064656e67616e206a616e676b612077616b7475206b6f6e7472616b206a617361206b6f6e737472756b73692079616e6720646961776173692e204b6169746b616e207365746961702070726f6772657373206b656d616a75616e2062756c616e616e2070656b65726a61616e206b6f6e737472756b73692079616e6720646961776173692064656e67616e206a756d6c61682070656d6261796172616e2062756c616e616e206b6570616461206b6f6e73756c74616e2070656e67617761732e2028506164612062756c616e2d62756c616e2074657274656e74752070726f67726573732070656b65726a61616e206b6f6e737472756b7369206e6f6c2070657273656e2c206e616d756e2070656d6261796172616e2061746173206d616e206d6f6e7468206b6f6e73756c74616e2074657461702070656e7568292e3c2f703e, 1),
('10e250595e3f6c15ddeeb0fafa9a4a6fa01c5d00', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP217', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32302e204576616c75617369206170616b616820686172676120746964616b206d656c6577617469207061677520616e67676172616e2e3c2f703e, 1),
('e9e72394590210d937f5bf886c9762022f0c409f', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP218', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32312e204576616c75617369206b6577616a6172616e206861726761206b6f6e7472616b2061706162696c612048505320746964616b20646970616b6169207365626167616920616375616e2028746964616b2077616a6172292e3c2f703e, 1),
('34192722d4f7e09ba561c9febae87339b3f1bced', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP219', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32332e2041706162696c612074657264617061742070657262656461616e206d65746f64652070656c616b73616e61616e2070656b65726a61616e20616e746172612079616e6720646974657461706b616e2064616c616d20646f6b756d656e206c656c616e672f6b6f6e7472616b2064656e67616e207265616c69736173692070656c616b73616e61616e2064696c6170616e67616e2c2074656c697469206170616b61682070657275626168616e207465727365627574206d65727570616b616e2072656b617961736120616e746172612050504b2064616e2050656e796564696120426172616e672f204a61736120756e74756b206d656e696e6767696b616e2068617267612073617475616e20485053206174617520746964616b2e2028436f6e746f683a2064616c616d20646f6b756d656e206c656c616e6720646973656275742070656b65726a61616e206861727573206d656e6767756e616b616e20616c617420626572617420736568696e6767612068617267612073617475616e204850532064616e2070656e61776172616e2074696e676769206e616d756e2064616c616d2070656c616b73616e61616e2063756b75702064656e67616e2074656e616761206d616e757369612064656e67616e2062696179612079616e67206c65626968206d75726168206174617520736562616c696b6e79612e3c2f703e, 1),
('ef4bea5e6c26a87c1ef9988a46848d2ba7cbfb1a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP220', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32342e20506572696b7361207265616c69736173692070656d616b6169616e20626168616e2c20757061682064616e20706572616c6174616e2062657264617361726b616e20646f6b756d656e2079616e67206469627561742073656c616d612070656c616b73616e61616e2070656b65726a6161616e206261696b206f6c65682070656e79656469612c2050504b206d617570756e206b6f6e73756c74616e20736570657274692062756b752068617269616e2c206c61706f72616e2068617269616e2c206261636b2075702064617461206473622e20486173696c6e79612062616e64696e676b616e2064656e67616e20766f6c756d652079616e6720646970657267756e616b616e20756e74756b206d656e67686974756e67206861726761206b6f6e7472616b202862696c6c206f66207175616e74697479292e3c2f703e, 1),
('0ea544cd71f22d8baabe07ffaa395c434880bced', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP221', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32352e2054656c69746920706572686974756e67616e20616e616c6973612068617267612073617475616e206170616b6168207465726461706174206b6f6d706f6e656e20626168616e2079616e672064696a6164696b616e20646173617220756e74756b206d656e67686974756e672068617267612073617475616e2064696d616e6120626168616e20746572736562757420746964616b2061646120617461752073756c697420646964617061746b616e2064696461657261682070656c616b73616e61616e2064656e67616e2074756a75616e206d656e61696b6b616e2068617267612073617475616e2c206e616d756e2064616c616d2070656c616b73616e61616e6e796120616b616e20646967616e74692064656e67616e20626168616e2079616e672068617267616e7961206c65626968206d757261682064616e20626961736120646967756e616b616e206d6173796172616b61742028746572736564696120646920746f6b6f2f2064616572616820736574656d706174292e3c2f703e, 1),
('aaa530d4df45840321eac0d5300a48958dc0a225', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP222', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32362e2054656c697469206170616b61682064616c6d2070656c616b73616e61616e20746572646170617420706572616c6174616e2079616e6720646973656469616b616e206f6c65682050504b202874616e706120646970756e677574206269617961292c20746574617069206269617961206174617320706572616c6174616e207465727365627574206469626562616e6b616e206a7567612064616c616d20706572686974756e67616e2068617267612073617475616e206b6f6e7472616b2e3c2f703e, 1),
('23b9219c1ab3e3a1483d0cd77cd2716e2f8d1c11', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP223', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32372e204c616b756b616e206b6f6e6669726d617369206b657061646120737570706c6965722070656e796564696120626172616e672f206a61736120756e74756b206d656e676964656e746966696b617369206b656d756e676b696e616e207465726a6164696e7961204b4b4e2064616c616d206d656e657461706b616e206861726761206b6f6e7472616b2064616e206d656d617374696b616e2068617267612070656e67616461616e20626172616e672f6a61736120746964616b2064696d61726b2075702e2041706162696c61207465726a61646920696e64696b6173692070656e79696d70616e67616e2079616e6720646973656261626b616e206164616e7961206d61726b207570206861726761204b4b4e2c206167617220646970657264616c616d2064656e67616e206d656e67756d70756c6b616e2062756b74692d62756b74692079616e672063756b75702e3c2f703e, 1),
('2f265c5f595e40ee43732074c30b4522e5955253', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP224', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32382e2041746173206164616e79612070656b65726a61616e2074616d626168206b7572616e672c2070617374696b616e2062616877612074656c6168206469627561746b616e20616464656e64756d2074616d626168206b7572616e672c2064616e2074656c697469206b6577616a6172616e20766f6c756d652064616e2068617267616e79612073657274612070617374696b616e206261687761206e696c61692f68617267612070656b65726a61616e2074616d626168206b7572616e672c20746964616b206d656c6562696869203130252064617269206e696c6169206b6f6e7472616b2e3c2f703e, 1),
('3b4867c44710dd653fef1475c2481e2e731bffda', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP225', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e32392e2041706162696c612070656b65726a61616e2064697065727379617261746b616e2064616c616d206b6f6e7472616b20756e74756b20646961737572616e73696b616e206f6c65682070656e796564696120422f4a2c2074656c697469206170616b61682074656c616820646961737572616e73696b616e2064616e2064617061746b616e20636f707920706f6c69732064616e2062756b74692070656d6261796172616e207072656d696e79612e3c2f703e, 1),
('06b5ee6e7cc69f756b453217fd4a0190afb1847a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP226', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Kewajaran Harga', 0x3c703e33302e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('a025acc1f1dd36b24939a36b67a56b13a61bcd28', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP227', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Pajak dan PNBP', 0x3c703e33312e266e6273703b4964656e746966696b617369206a656e69732070616a616b2f504e425020266e6273703b61746173206b6f6e7472616b2070656e67616461616e20422f4a2e205065726c752064696365726d6174692062616877612064616c616d20626562657261706120646f6b756d656e206b6f6e7472616b20746964616b20646973656275742073656361726120737065736966696b2070616a616b2d70616a616b2079616e6720686172757320646970756e6775742070656d62657269206b65726a612e3c2f703e, 1),
('987d25de7079378dbc33fb685ebf161f86bb85ce', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP228', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Pajak dan PNBP', 0x3c703e33322e20506572696b736120646f6b756d656e2070656d6261796172616e206b6f6e7472616b2064616e20646f6b756d656e2070656e7965746f72616e2070616a616b2f504e425020756e74756b206d656d617374696b616e2073656d7561207472616e73616b73692079616e6720736568617275736e7961206469626562616e6b616e2070616a616b2f504e425020737564616820646970756e6775742064616e2064697365746f726b616e206b65204b6173204e65676172612c207465726d6173756b2062696179612070656e79656c656e6767617261616e2064616e2070656d62756174616e20646f6b756d656e2079616e6720646970756e677574207061646120736161742070656e67616d62696c616e20646f6b756d656e2e2042696c61207065726c75206c616b756b616e206b6f6e6669726d617369206b652042616e6b2070657273657073692e3c2f703e, 1),
('3088c070eb89ad695e2468150c7a259993d72e28', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP229', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Pajak dan PNBP', 0x3c703e33332e20506572696b7361206b65736573756169616e2070656e67656e61616e20746172696620617461732070616a616b2f504e42502e3c2f703e, 1),
('22dc0b5f4cb888098687baebffb43be9bf60622d', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP230', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Pajak dan PNBP', 0x3c703e33342e266e6273703b4c616b756b616e2070726f7365647572206c61696e6e796120756e74756b206d656d617374696b616e20746964616b2074657264617061742070616a616b2f504e42502079616e672062656c756d20646970756e6775742064616e20617461752064697365746f72206b65204b6173204e65676172612e204a696b612061646120266e6273703b74657461706b616e206e696c61696e79612e3c2f703e, 1),
('ea1dd3b245775f402a9428c9246bb481bae10dac', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP231', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Pajak dan PNBP', 0x3c703e33352e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('02cccb821b4aef56aa1b64f503c4148e2642607b', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP232', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e312e2044617061746b616e2064616e2074656c6974692042412070656e79656c65736169616e2070656e67616461616e20426172616e672f204a6173612064616e2062616e64696e676b616e2064656e67616e206b6f6e7472616b2e3c2f703e, 1),
('b4b32935da0c165c7f177be25d96feab1369483f', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP233', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e322e204c616b756b616e2070656e67756a69616e2f20706572686974756e67616e20666973696b20756e74756b206d656d617374696b616e206261687761206a756d6c616820626172616e672079616e67206469746572696d612f20766f6c756d65206b6f6e737472756b73692074656c616820736573756169206b6f6e7472616b2e2050656e67756a69616e20666973696b2f20706572686974756e67616e2064697475616e676b616e2064616c616d204265726974612041636172612050656d6572696b7361616e20466973696b2079616e6720646974616e646174616e67616e69206f6c65682041756469746f722064616e2050504b2e3c2f703e, 1),
('4bce3b352f82e9cf13e02e526ceb5619910ebd4b', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP234', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e332e2054657461706b616e2061646120746964616b6e7961206b656b7572616e67616e206b75616e74697461732f766f6c756d6520626172616e672f206a6173612e204a696b61207465726a616469206b656b7572616e67616e2c2074656e74756b616e206a756d6c61686e7961207465726d6173756b206e696c6169207275706961682062657264617361726b616e2068617267612073617475616e2064616c616d206b6f6e7472616b2064696b616c696b616e20766f6c756d652070656b65726a61616e2079616e67206b7572616e672e20446973616d70696e672069747520686974756e67206a7567612064656e6461206b657465726c616d626174616e20736562657361722073617475266e6273703b266e6273703b7065726d696c20706572686172692e3c2f703e, 1),
('e31a1bae21f53cdbbad505cc0d6a45045b10629e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP235', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e342e2054656c697469206170616b61682074657264617061742062616769616e2070656b65726a61616e207574616d612079616e67206469616c69686b616e202864697375626b6f6e7472616b6b616e29206b657061646120706968616b206c61696e2e2050656b65726a61616e2079616e672064617061742064697375626b6f6e7472616b6b616e206164616c61682062756b616e2070656b65726a61616e207574616d612064616e2064697574616d616b616e206b65706164612070656e796564696120626172616e672f206a617361206b6563696c2c206e616d756e2074616e6767756e67206a61776162207465746170206b65706164612070656e796564696120626172616e672f206a617361207574616d612e3c2f703e, 1);
INSERT INTO `ref_program_audit` (`ref_program_id`, `ref_program_id_type`, `ref_program_code`, `ref_program_aspek_id`, `ref_program_title`, `ref_program_procedure`, `ref_program_del_st`) VALUES
('0f978ac6fa23d592f851467e3e0589733d81c6c5', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP236', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e352e2041706162696c612074657264617061742070656b65726a61616e2074616d6261682f6b7572616e672c2074656c6974692073656261622d7365626162206164616e79612070656b65726a61616e2074616d6261682f6b7572616e672074657273656275742c2064616e2079616b696e6b616e2062616877612070656b65726a61616e2074616d6261682f6b7572616e672074657273656275742074656c616820646964617361726b616e2070616461206b6f6e646973692079616e6720646170617420646970657274616e6767756e676a617761626b616e2f2077616a61722c20616e74617261206c61696e3a2074656c6168207365737561692064656e67616e20706572737961726174616e2064616c616d206b6f6e7472616b2c2074656c61682064692064756b756e672064656e67616e20616464656e64756d6e79612064616e206c616b756b616e2070656d6572696b7361616e20666973696b6e79612e3c2f703e, 1),
('1f2b6f8805557f27e1527346f5e51e889dca9739', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP237', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e362e204c616b756b616e204b6f6e6669726d61736920286b657061646120737570706c69657220646172692070656e79656469612c2070656d616b6169206174617520706968616b206c61696e2920756e74756b206d6579616b696e69206261687761206b75616e74697461732074656c6168207365737561692064656e67616e206b6f6e7472616b2064616e20646f6b756d656e2070656e64756b756e676e79612e3c2f703e, 1),
('817a808441ee8942d4d0ac524708688712910139', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP238', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e372e204c616b756b616e2070726f7365647572206c61696e6e796120756e74756b206d656d617374696b616e2070656e67616461616e20422f4a2074656c616820736573756169206b6f6e7472616b2e3c2f703e, 1),
('3128ee35744099f3bc17f8d4ac868e7f03ac37e2', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP239', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e382e2054656c6974692073616174202874616e6767616c2d74616e6767616c292064616e206a756d6c6168207461686170616e2070656d6261796172616e2c206b656d756469616e2062616e64696e676b616e2064656e67616e2073616174202874616e6767616c2d74616e6767616c2920617461752074696e676b61742070726f67726573732070656e67616461616e20626172616e672f6a6173612c20756e74756b206d6579616b696e6b616e2062616877612070656d6261796172616e20287465726d6173756b207465726d696e292074656c616820646964617361726b616e207061646120736161742064616e2074696e676b6174206b656d616a75616e20666973696b2070656b65726a61616e202870726f6772657373207265706f7274292c207365727461207461746120636172612070656d6261796172616e2079616e672074657263616e74756d2064616c616d206b6f6e7472616b2e3c2f703e, 1),
('53dcf45a842bffb7046301475cea5d570fa2fb52', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP240', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e392e2054656c697469206170616b61682074657264617061742070656d626c6f6b6972616e2064616e6120756e74756b206d656e6768696e646172692068616e6775736e796120616e67676172616e2064656e67616e2063617261206d656d62756174204241206b656d616a75616e2070656b65726a61616e2079616e6720746964616b2062656e61722842696173616e79612064696c616b756b616e206d656e6a656c616e6720616b68697220746168756e20616e67676172616e292e3c2f703e, 1),
('8f56d4896c3047e29025676b7ac96c24f8cc92b3', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP241', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e31302e2044617061746b616e207472616e73616b73692070656d6261796172616e2064616e206c616b756b616e2070656e67756a69616e2062616877612070656d6261796172616e2074657273656275742062656e61722064616e206469746572696d61206f6c65682072656b616e616e207465726b6169742c2073657274612062616e64696e676b616e20616e7461726120696e766f6963652064616e20646f6b756d656e2070656e6572696d61616e20756e74756b206d656e646574656b7369206164616e7961207461676968616e2070616c73752e3c2f703e, 1),
('f5b92719993b4c3563c32447852a2d12ffb0bd34', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP242', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e31312e2041706162696c6120626172616e67206265726173616c2064617269206c756172206e65676572692028696d706f72292c2064617061746b616e20504942206174617320626172616e672074657273656275742c206261696b20646172692070656e796564696120626172616e672f206a617361206d617570756e20706968616b206c61696e2073657065727469204b5042432e3c2f703e, 1),
('99adb82e3552bb8d4b824989dcb4867a32887e45', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP244', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pedoman Pengadaan Barang/ Jasa pada Satuan Kerja', 0x3c703e312e2054656c6974692064616e2074656c616168207065646f6d616e2050656e67616461616e20426172616e672f204a6173612079616e672064696265726c616b756b616e20706164612053617475616e204b65726a612074656c6168207365737561692050657270726573206e6f6d6f72203420746168756e20323031362074656e74616e672070657275626168616e206b65656d7061742050656e67616461616e20426172616e672f204a6173612e3c2f703e, 1),
('ad6a192ba904cca5716b64139da5185f0afd748e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP245', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pedoman Pengadaan Barang/ Jasa pada Satuan Kerja', 0x3c703e322e2054656c6974692064616e2074656c616168205065646f6d616e2050656e67616461616e20426172616e672f204a6173612079616e672064696265726c616b756b616e20706164612053617475616e204b65726a61206170616b61683b2054656c6168206d656e657261706b616e207072696e736970206566697369656e73692c206566656b746976697461732c2074657262756b612064616e206265727361696e672c207472616e73706172616e2c206164696c2f20746964616b206469736b72696d696e617469662064616e20616b756e746162656c2e2054656c6168206d656e677574616d616b616e206b6562696a616b616e20756d756d2070656d6572696e7461682064616c616d2050656e67616461616e20426172616e672f204a6173613a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e50656e6767756e61616e2050726f64756b73692064616c616d206e65676572692c2064656e67616e207361736172616e207065726c756173206b6573656d706174616e206c6170616e67616e206b65726a612c3c2f6c693e0d0a093c6c693e50656e6767756e61616e20706572616e207365727461207573616861206d696b726f2064616e207573616861206b6563696c207365727461206b6f706572617369206b6563696c2c3c2f6c693e0d0a093c6c693e4d656e796564657268616e616b616e206b6574656e7475616e2064616e2074617461206361726120756e74756b206d656d70657263657061742070726f736573206b657075747573616e2050656e67616461616e20426172616e672f204a6173613c2f6c693e0d0a093c6c693e4d656e696e676b61746b616e2070726f666573696f6e616c69736d652c206b656d616e64697269616e2c2064616e2074616e6767756e67206a6177616220646172692050412f4b50412c2050504b2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2c2050616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e3c2f6c693e0d0a093c6c693e4d656e756d6275686b656d62616e676b616e20706572616e207365727461207573616861206e6173696f6e616c3c2f6c693e0d0a093c6c693e44616e206b656861727573616e206d656c616b756b616e2070656e67756d756d616e207365636172612074657262756b612c2072656e63616e612070656e67616461616e207061646120736574696170206177616c2070656c616b73616e61616e20616e67676172616e206b6570616461206d6173796172616b6174206c756173206d656c616c75692053495255502c206b656375616c692079616e6720626572736966617420726168617369612e3c2f6c693e0d0a3c2f756c3e, 1),
('92e0afe88b5919954bc9d4305cc8ec13104f7bff', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP246', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pedoman Pengadaan Barang/ Jasa pada Satuan Kerja', 0x3c703e332e204a696b612053617475616e204b65726a6120746964616b206d656d70756e796169207065646f6d616e2070656e67616461616e20626172616e67204a6173612c2041756469746f72206d656c616b73616e616b616e2070726f736564757220617564697420646964617361726b616e2070616461206b6574656e7475616e20706572756e64616e672d756e64616e67616e2079616e67206265726c616b752e3c2f703e, 1),
('9242f39c71f6544da69ba19493b61c6240d3117a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP247', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pedoman Pengadaan Barang/ Jasa pada Satuan Kerja', 0x3c703e342e20427561742053696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('d76d42a4d9a072e5ef7f7f4a88505ea6a1f46c4b', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP248', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e352e2054656c6974692061646120746964616b6e7961207065726d696e7461616e20626172616e672f206a61736120646172692070656d616b6169202875736572292e3c2f703e, 1),
('ede3200069cf748f106f562cf93ad700b6f8ee1f', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP249', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e362e2042616e64696e676b616e207573756c616e2070656e67616461616e20626172616e672f206a6173612064656e67616e2072656e63616e61206b65726a6120746168756e616e2e3c2f703e, 1),
('baf13fa7b0593ea8941b3c317bba6869e2c491db', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP250', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e372e2044617061746b616e207374756469206b656c6179616b616e2028666561736962696c69747920737475647929206174617520686173696c207375727665692064616e2064657369676e206174617520646f6b756d656e2073656a656e69732079616e67206265726b616974616e2064656e67616e2070656e67616461616e20626172616e672f206a6173612079616e672064696c616b73616e616b616e2e3c2f703e, 1),
('73a37d47ebfcaa0c575b6b7e2b48f394a5c438f0', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP251', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e382e2054656c697469205374756469206b656c6179616b616e20746572736562757420756e74756b206d656e676574616875692074756a75616e2070656e67616461616e6e79612c206b75616e74697461732c206b75616c697461732c2073657274612077616b74752028736161742920646962757475686b616e2e3c2f703e, 1),
('4369bd677ae1fc4b84c7120103df62fe32bc5ef3', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP252', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e392e2054656c69746920446f6b756d656e2070656e67616461616e20626172616e672f206a6173612079616e672064696c616b73616e616b616e20756e74756b206d656e67657461687569206b75616e74697461732c206b75616c697461732c2073657274612077616b74752070656e79656c65736169616e6e79612e3c2f703e, 1),
('02defafd2f291fb0556d15f5109cef342fd43a5d', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP253', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e31302e2042616e64696e676b616e20496e666f726d6173692079616e672064697065726f6c65682064617269207374756469206b656c6179616b616e20746572656275742064656e67616e20696e666f726d6173692079616e672064697065726f6c6568206461726920646f6b756d656e2070656e67616461616e20626172616e672f206a6173612c20756e74756b206d656e67657461687569206170616b61683a2070656e67616461616e20626172616e672f206a6173612074656c61682062657264617361726b616e206b656275747568616e206b75616e74697461732c206b75616c697461732c2073657274612077616b74752070656e79656c65736169616e6e79612074656c6168207365737561692064656e67616e2079616e67206469627574756b616e2e3c2f703e, 1),
('ac35b29128646c006958e2ec8a2db4504906ff3d', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP255', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pembiayaan dan Jadwal Pelaksanaan Pengadaan Barang/ Jasa', 0x3c703e31322e2054656c6974692f2074656c61616864616e2079616b696e6b616e20626168776120756e7375722062696179612064616e206e696c61692070656e67616461616e20626172616e672f206a6173612074656c6168207465726d6173756b2064616c616d20444950412c206d696e696d616c207465726469726920646172693a3c2f703e0d0a0d0a3c6f6c3e0d0a093c6c693e42696179612041646d696e6973747261736920756e74756b206d656e64756b756e672070656c616b73616e61616e2070656e67616461616e20626172616e672f206a61736120616e74617261206c61696e3a3c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c756c3e0d0a093c6c693e486f6e6f72617269756d2050412f4b50412c2050504b2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2c2050616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e2c207465726d6173756b2074696d2074656b6e69732c2074696d2070656e64756b756e672064616e20737461662070726f79656b3c2f6c693e0d0a093c6c693e42696179612050656e6767616e6461616e20646f6b756d656e2070656e67616461616e20626172616e672f206a6173613c2f6c693e0d0a093c6c693e41646d696e69737472617369206c61696e6e79612079616e672064697065726c756b616e20756e74756b206d656e64756b756e672070656c616b73616e61616e2070656e67616461616e20626172616e672f206a617361266e6273703b3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c6f6c3e0d0a093c6c693e42696179612f206e696c6169206265736172616e2070656e67616461616e20626172616e672f206a617361206974752073656e646972693c2f6c693e0d0a3c2f6f6c3e, 1),
('3f69ac843c614a022e510c7a6238550190c5fabd', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP266', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e372e2054656c697469206d656b616e69736d65206b65726a612070616e697469612e3c2f703e, 1),
('6f4f18f02cf5462c5c6ad928895d00c6d38aa038', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP267', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e382e20427561742053696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('9d44ad4864e8cd0bb9ce134259fe32007b4910c7', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP279', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e32302e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('2f2e3b7546d9790f789ffbc8e2a2638b2e1484a1', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP260', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e312e2054656c6974692064616e2074656c6161682c2073657274612070617374696b616e20626168776120706572736f6e696c2079616e67207465726c696261742064616c616d20737472756b747572206f7267616e69736173692050656a616261742050656d62756174204b6f6d69746d656e2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2064616e2050616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e20746964616b207465726c69626174206b6570656e74696e67616e3a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e50656a616261742050656d62756174204b6f6d69746d656e20746964616b20626f6c6568206d6572616e676b6170207365626167616920506f6b6a6120554c502f2050656a616261742050656e67616461616e2064616e2050656e67656c6f6c61204b6575616e67616e2e3c2f6c693e0d0a093c6c693e50656761776169206461726920496e7370656b746f7261742079616e67206d656e6a6164692070616e6974696120756e74756b20696e7374616e73696e79612c3c2f6c693e0d0a093c6c693e506f6b6a6120554c502f50656a616261742050656e67616461616e20746964616b20626f6c6568206d656d70756e79616920687562756e67616e206b656c75617267612028736564617261682064616e2073656d656e6461292064656e67616e2070656a616261742079616e67206d656e657461706b616e20506f6b6a6120554c502f50656a616261742050656e67616461616e2e3c2f6c693e0d0a093c6c693e50616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e20746964616b206d656e6a6162617420736562616761692050656e67656c6f6c61204b6575616e67616e2e3c2f6c693e0d0a3c2f756c3e, 1),
('41d99cea98b9f2540b6d11a5c26760229f37801b', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP261', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e322e2059616b696e6b616e2062616877612050656d62756174204b6f6d69746d656e2064616e20506f6b6a6120554c502f2070656e67616461616e20424152414e472f204a41534174656c6168206d656d696c696b6920536572746966696b6174204b6561686c69616e2050656e67616461616e20426172616e672f204a6173612e3c2f703e, 1),
('67e31939c850a46e6ece35681b0e0099f6a3348a', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP262', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e332e2044617061746b616e2070616b746120696e74656772697461732064616e2079616b696e6b616e2062616877612050656a616261742050656d62756174204b6f6d69746d656e2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2064616e2050656e79656469612050656e67616461616e20426172616e67204a6173612074656c6168206d656e616e646174616e67616e692070616b746120696e74656772697461732074657273656275742e3c2f703e, 1),
('2f904337783ec4a890bd4260dac9e34030cd3bc4', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP263', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e342e2050617374696b616e2062616877612050656a616261742050656d62756174204b6f6d69746d656e2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2064616e2050616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e2074656c6168206d656d6174756869206574696b612070656e67616461616e20736562616761696d616e61206469617475722064616c616d206b6574656e7475616e20706572756e64616e67616e2079616e67206265726c616b752c20616c3a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e64696c616b756b616e20736563617261207465727469622064616e2062657274616e6767756e676a617761622c2070726f666573696f6e616c2064616e206d616e646972692061746173206461736172206b656a756a7572616e2c3c2f6c693e0d0a093c6c693e746964616b2073616c696e67206d656d70656e676172756869207365727461206d656e63656761682f206d656e6768696e646172692070657274656e74616e67616e206b6570656e74696e67616e207061726120706968616b2079616e67207465726b6169742c3c2f6c693e0d0a093c6c693e68696e646172692068616c2d68616c2079616e6720626572696e64696b617369204b4b4e2e3c2f6c693e0d0a3c2f756c3e, 1),
('f21ccc00573852381f0f2b5ce316a21973576726', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP264', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e352e2054656c697469206170616b6168206b657075747573616e2d6b657075747573616e2079616e67206469616d62696c206f6c65682050656a616261742050656d62756174204b6f6d69746d656e2c20506f6b6a6120554c502f2050656a616261742050656e67616461616e2064616e2050616e697469612f2050656a616261742050656e6572696d6120486173696c2050656b65726a61616e2074656c616820626562617320646172692070656e67617275682070656a616261742070656d62756174206b6f6d69746d656e20617461752070696d70696e616e2f70656a616261742079616e67206c656269682074696e6767692e3c2f703e, 1),
('6e12c28046a06f445476ae6c5bcd50c6e8136372', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP265', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pejabat Pembuat Komitmen, Pokja ULP/ Pejabat pengadaan dan Panitia/ Pejabat Penerima Hasil Pekerjaan', 0x3c703e362e2054656c697469206170616b6168206b657075747573616e2d6b657075747573616e2079616e67206469616d62696c206f6c65682050656a616261742070656d62756174206b6f6d69746d656e2074656c616820626562617320646172692070656e67617275682070696d70696e616e2f70656a616261742079616e67206c656269682074696e6767692e3c2f703e, 1),
('1d59712e324b74540dcdb547ad9194a41d289261', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP268', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e392e2059616b696e6b616e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612074656c6168206d656e6767756e616b616e2053697374656d2050656e67616461616e2053656361726120456c656b74726f6e696b202850656c656c616e67616e20556d756d2c2050656c656c616e67616e2054657262617461732c2050656d696c6968616e204c616e6773756e672c20617461752050656e756e6a756b616e204c616e6773756e67292e204c616b756b616e2063656b206b652057656273697465206c7073652e626d6b672e676f2e69642f3c2f703e, 1),
('ab0fe587992141ee42aa179f6ecf718033303ca1', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP269', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31302e2059616b696e6b616e206261687761206d65746f64652070656d696c6968616e2070656e796564696120426172616e672f4a6173612079616e6720646970696c696820286170616b616820697475206d656c616c75692070656c656c616e67616e20756d756d2c2070656c656c616e67616e2074657262617461732c2070656d696c6968616e206c616e6773756e672c20617461752070656e756e6a756b616e206c616e6773756e67292074656c61682074657061742e3c2f703e, 1),
('4502ea982a24da80b255cdaa589d43b80c32ad46', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP270', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31312e2044617061746b616e206b656c656e676b6170616e266e6273703b266e6273703b646f6b756d656e2070656e67616461616e20424152414e472f204a4153412079616e67207465726469726920646172693a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e446f6b756d656e207072616b75616c6966696b6173692f7061736361206b75616c6966696b6173692c3c2f6c693e0d0a093c6c693e446f6b756d656e2070656d696c6968616e2070656e796564696120424152414e472f204a415341202870656c656c616e67616e292c266e6273703b266e6273703b64616e3c2f6c693e0d0a093c6c693e446f6b756d656e206c61696e2079616e6720626572687562756e67616e2064656e67616e2070726f73656475722070656d696c6968616e2070656e796564696120424152414e472f204a4153412c20616e74617261206c61696e3a3c2f6c693e0d0a093c6c693e446f6b756d656e2050656e67756d756d616e2052656e63616e6120556d756d2050656e67616461616e206f6c65682050412f204b50412e2043656b20646920776562736974652068747470733a2f2f73697275702e6c6b70702e676f2e69643c2f6c693e0d0a093c6c693e446f6b756d656e207072616b75616c6966696b6173692073656c757275682063616c6f6e2070656e796564696120426172616e672f4a6173612c2064616e20756e64616e67616e206261676920706573657274612079616e67206c6f6c6f73207072616b75616c6966696b6173692e204c616b756b616e2063656b206b652057656273697465206c7073652e626d6b672e676f2e69642f3c2f6c693e0d0a093c6c693e4265726974612041636172612070656d6173756b616e20646f6b756d656e2c2041616e77696a7a696e672c2070656d62756b61616e20646f6b756d656e2070656e61776172616e2c266e6273703b266e6273703b64616e20626572697461206163617261206c61696e207465726b6169742064656e67616e2070656d696c6968616e2063616c6f6e2070656e796564696120424152414e472f204a4153412e204c616b756b616e2063656b206b652057656273697465206c7073652e626d6b672e676f2e69642f3c2f6c693e0d0a093c6c693e4c61706f72616e20686173696c206576616c756173692070616e697469612070656e67616461616e20426172616e672f4a61736120706164612074696e676b6174203a206576616c75617369207072616b75616c6966696b6173692c206576616c756173692070656e61776172616e20646172692063616c6f6e2070656e796564696120424152414e472f204a4153412e204c616b756b616e2063656b206b652057656273697465206c7073652e626d6b672e676f2e69642f266e6273703b3c2f6c693e0d0a3c2f756c3e, 1),
('842404ff245f9e8a46eb0b0040272b5e9b289936', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP271', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31322e2054656c6974692070656e67756d756d616e2070656e67616461616e20426172616e672f4a617361206d656c616c75692057656273697465206c7073652e626d6b672e676f2e69642f206170616b61682074656c6168207365737561692064656e67616e2074656c6168207365737561692064656e67616e206b6574656e7475616e2064616e20696e666f726d617469662028616e74617261206c61696e206e616d612064616e20616c616d61742070726f79656b2c206a656e69732064616e206e696c61692070656b65726a61616e2c206c6f6b6173692070656b65726a61616e2c206b75616c6966696b6173692063616c6f6e2072656b616e616e2079616e672064697065726c756b616e2c20647362292e3c2f703e, 1),
('75970ce6423d27f9eb8b2a513a70e9b237098036', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP272', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31332e2054656c6974692064616e2070617374696b616e20626168776120646f6b756d656e207072616b75616c6966696b6173692074656c6168206c656e676b6170207365737561692064656e67616e206b6574656e7475616e2c2073656b7572616e672d6b7572616e676e7961206265726973693a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e4c696e676b75702070656b65726a61616e2c20706572737961726174616e20706573657274612c2077616b74752026616d703b2074656d7061742070656e67616d62696c616e2f70656d6173756b616e20646f6b756d656e207072616b75616c6966696b6173692c2073657274612070656e616e6767756e67206a61776162207072616b75616c6966696b6173692e3c2f6c693e0d0a093c6c693e506572737961726174616e20706573657274612c206d696e696d616c20616e74617261206c61696e3a3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c6f6c3e0d0a093c6c693e4b687573757320756e74756b2070656e67616461616e2050656b65726a61616e204b6f6e737472756b73692064616e204a617361204c61696e6e7961206861727573206d656d706572686974756e676b616e2053697361204b656d617075616e2050616b65742028534b5029203d204b656d616d7075616e2050616b657420284b502920266e646173683b2050616b65742079616e6720736564616e672064696b65726a616b616e202850293c2f6c693e0d0a3c2f6f6c3e0d0a0d0a3c756c3e0d0a093c6c693e556e74756b207573616861206b6563696c2c206e696c6169206b656d616d7075616e2070616b657420284b502920646974656e74756b616e20736562616e79616b203520286c696d61292070616b65742070656b65726a61616e2064616e3c2f6c693e0d0a093c6c693e556e74756b207573616861206e6f6e206b6563696c206e696c6169206b656d616d7075616e2070616b657420284b502920646974656e74756b616e20736562616e79616b20362028656e616d292070616b6574206174617520312c32204e20286a756d6c61682070616b65742070656b65726a61616e2074657262616e79616b2079616e6720646170617420646974616e67616e692073656c616d61206b7572756e2077616b7475203520286c696d612920746168756e20746572616b6869722e2050656b65726a61616e204b6f6e737472756b7369204b44203d2033204e50742064616e20756e74756b266e6273703b266e6273703b4a617361204c61696e6e7961204b44203d2035204e507420284e507420756e74756b20313020746168756e20746572616b686972293c2f6c693e0d0a093c6c693e546964616b2064616c616d2070656e6761776173616e2070656e676164696c616e2c20746964616b207061696c69742c206b6567696174616e20746964616b20736564616e6720646968656e74696b616e2c20646972656b736920746964616b20736564616e672064616c616d206d656e6a616c616e692073616e6b736920706964616e612c3c2f6c693e0d0a093c6c693e536562616761692077616a69622070616a616b207375646168206d656d656e756869206b6577616a6962616e2070657270616a616b616e20746168756e20746572616b68697220286c616d7069726b616e20666f746f636f70792053505420746168756e20746572616b6869722c2064616e205353502050506820706173616c203239292e3c2f6c693e0d0a093c6c693e44616c616d206b7572756e2077616b747520656d70617420746168756e20746572616b686972207065726e6168206d656d7065726f6c65682070656b65726a61616e206d656e79656469616b616e20426172616e672f4a617361206469206c696e676b756e67616e2070656d6572696e7461682f737761737461207465726d6173756b2070656e67616c616d616e20737562206b6f6e7472616b2c206b656375616c692070656e796564696120426172616e672f4a6173612079616e6720626172752062657264697269206b7572616e672064617269207469676120746168756e2e3c2f6c693e0d0a093c6c693e546964616b206d6173756b2064616c616d2064616674617220686974616d2e3c2f6c693e0d0a093c6c693e5461746120636172612070656e696c6169616e2c206d656c69707574693a20617370656b2061646d696e697374726173692c207065726d6f64616c616e2c2074656e616761206b65726a612c20706572616c6174616e2c2070656e67616c616d616e2064656e67616e206d656e6767756e616b616e2073697374656d20677567757220617461752073697374656d206e696c6169202873636f72696e672073797374656d292e3c2f6c693e0d0a3c2f756c3e, 1),
('9c0ed8f46346ff062379a084a6ce0e810e89c9b6', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP273', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31342e2059616b696e6b616e2062616877612070726f736573207072616b75616c6966696b6173692070656e796564696120426172616e672f4a6173612074656c6168207365737561692064656e67616e206b6574656e7475616e2079616e672074657263616e74756d2064616c616d20646f6b756d656e2070656e67616461616e20426172616e672f4a6173612c2064616e2070617374696b616e2070656c616b73616e61616e6e79612074656c61682064696c616b73616e616b616e20736563617261206164696c2c2074657262756b612c207472616e73706172616e2064616e20616b756e746162656c2c20616e74617261206c61696e2064656e67616e20636172613a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e54656c697469206b656c656e676b6170616e20646f6b756d656e207072616b75616c6966696b6173692070657365727461207465726d6173756b20706572616c6174616e2079616e672068617275732074657273656469612c206170616b61682074656c6168207365737561692064656e67616e20706572737961726174616e2079616e672074657264617061742064616c616d20646f6b756d656e207072616b75616c6966696b6173692c2064616e2074656c6168206469627561746b616e206265726974612061636172616e79612e3c2f6c693e0d0a093c6c693e506572696b7361206170616b6168206461667461722070657365727461207072616b75616c6966696b6173692064616e20686173696c2070656e696c6169616e206b75616c6966696b6173692074656c6168206469736574756a7569206f6c65682070656a616261742079616e672062657277656e616e672e3c2f6c693e0d0a093c6c693e50617374696b616e20626168776120686173696c207072616b75616c6966696b6173692074656c6168206469696e666f726d6173696b616e206b65706164612073656c75727568207065736572746120286d656c616c75692077656273697465206c7073652e626d6b672e676f2e69642f293c2f6c693e0d0a093c6c693e4964656e746966696b6173692070656e79696d70616e67616e2064616c616d2070726f736573207072616b75616c6966696b61736920756e74756b206d656e67657461687569206b656d756e676b696e616e207465726a6164696e79612028696e64696b61736929206b65637572616e67616e2e3c2f6c693e0d0a3c2f756c3e, 1),
('7b8fc5b481a4798a64f11c5ac1c861ec36218fcc', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP274', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31352e59616b696e6b616e206b657465706174616e206d65746f6465206576616c756173692079616e6720646967756e616b616e20756e74756b2070656e67616461616e20426172616e672f4a6173612079616e672064696c616b73616e616b616e2e3c2f703e0d0a0d0a3c703e2850656e67616461616e20426172616e672f4a6173612073656c61696e204a617361206b6f6e73756c74616e736920756d756d6e7961206d656e6767756e616b616e206d65746f64652070656e696c6169616e2073697374656d2067756775722064616e2073697374656d206e696c61692c20736564616e676b616e2050656e67616461616e204a617361204b6f6e73756c74616e7369266e6273703b266e6273703b6461706174206d656e6767756e616b616e206d65746f64652070656e696c6169616e206b75616c697461732c206b75616c697461732064616e2062696179612c207061677520616e67676172616e2c20626961796120746572656e646168292e3c2f703e, 1),
('08683d7dd1b574a6c7dc4d3e889f99d5719020ef', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP275', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31362e2054656c6974692064616e2070617374696b616e20626168776120646f6b756d656e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612074656c6168206c656e676b61702c2073656b7572616e672d6b7572616e676e7961206d656d7561743a266e6273703b3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e556e64616e67616e206b65706164612070656e796564696120426172616e672f4a6173612079616e67206c6f6c6f73207072616b75616c6966696b6173692e20556e64616e67616e206d696e696d616c206d656d7561743a2074656d7061742c2074616e6767616c2c20686172692c2077616b747520756e74756b206d656d7065726f6c656820646f6b756d656e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612c2041616e77696a7a696e672c2070656e79616d706169616e20646f6b756d656e2070656e61776172616e2c206a616475616c2070656c616b73616e61616e2070656e67616461616e20426172616e672f4a6173612073616d7061692070656e65746170616e2070656e796564696120426172616e672f4a6173612e3c2f6c693e0d0a093c6c693e496e737472756b7369206b657061646120706573657274612070656e67616461616e20426172616e672f4a61736120286d696e696d616c206d656d7561743a20756d756d2c2069736920646f6b756d656e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612c20737961726174206261686173612c20636172612070656e79616d706169616e2026616d703b2070656e616e6461616e2073616d70756c2070656e61776172616e2064616e20626174617320616b6869722070656e79616d706169616e2070656e61776172616e2c2070726f73656475722070656d62756b61616e2070656e61776172616e2c2064616e2070656e696c6169616e206b75616c6966696b6173692064616e206b726974657269612070656e65746170616e2070656d656e616e6720292e3c2f6c693e0d0a093c6c693e5379617261742d73796172617420756d756d206b6f6e7472616b2e3c2f6c693e0d0a093c6c693e5379617261742d737961726174206b6875737573206b6f6e7472616b2e3c2f6c693e0d0a093c6c693e446166746172206b75616e74697461732026616d703b2068617267612c207465726d6173756b206b6f6d706f6e656e2070726f64756b73692064616c616d206e65676572692e3c2f6c693e0d0a093c6c693e537065736966696b6173692074656b6e69732026616d703b2067616d6261722028746964616b206d656e67617261682070616461206d6572656b2074657274656e7475292e3c2f6c693e0d0a093c6c693e42656e74756b3a2073757261742070656e61776172616e2c206b6f6e7472616b2c207375726174206a616d696e616e2070656e61776172616e2c207375726174206a616d696e616e2070656c616b73616e61616e2c2064616e207375726174206a616d696e616e2075616e67206d756b612e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e4b68757375733a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e556e74756b206b6f6e7472616b2079616e67206a616e676b612077616b74752070656c616b73616e61616e6e7961206c65626968206461726920313220286475612062656c6173292062756c616e2c20646170617420646963616e74756d6b616e206b6574656e7475616e2070656e796573756169616e206861726761202870726963652061646a7573746d656e74292c2064676e2070656e6a656c6173616e2072756d75732079616e6720646967756e616b616e2e3c2f6c693e0d0a093c6c693e556e74756b2070656e67616461616e2064656e67616e2070617363616b75616c6966696b6173692c20646f6b756d656e2070617363616b75616c6966696b6173692064696d6173756b6b616e2064616c616d20646f6b756d656e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612e3c2f6c693e0d0a3c2f756c3e, 1),
('8b60c86a13636b37237187435f667f336c020d10', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP276', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31372e2054656c697469206170616b6168207379617261742d7379617261742061646d696e697374726173692079616e6720646974657461706b616e20746964616b206d656d6261746173692063616c6f6e206b6f6e7472616b746f7220756e74756b20696b7574206265727061727469736970617369206d656e67696b757469206c656c616e672c206b68757375736e796120756e74756b2063616c6f6e20706573657274612064617269206e6567617261206173696e672e3c2f703e, 1),
('04ee118e613210190db65eaf5f68f983b768c0c0', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP277', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31382e2054656c697469206170616b616820737065736966696b61736920626172616e6720746964616b206d656e756e6a756b206b65706164612073616c61682073617475206d65726b2074657274656e74752064616e2064696275617420736564656d696b69616e207275706120736568696e6767612075726169616e20737065736966696b617369206461706174206d656e6a616d696e20616b616e2064697065726f6c656820626172616e6720736573756169206b75616c697461732079616e67206469696e67696e6b616e206d6973616c6e79613b206a616d696e616e207075726e61206a75616c2c206b656d616d7075616e206d656c616b756b616e2070656d656c6968617261616e20287365626172616e206c6f6b617369292c20766f6c756d652070656e6a75616c616e2064616e206c61696e2d6c61696e2e3c2f703e, 1),
('14831a293cff76763ef633fed590f80a167e87f7', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP278', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Prosedur Pelaksanaan Pemilihan Penyedia Barang/ Jasa', 0x3c703e31392e2059616b696e6b616e2062616877612070726f7365732070656d696c6968616e2070656e796564696120426172616e672f4a6173612074656c6168207365737561692064656e67616e206b6574656e7475616e2079616e672074657263616e74756d2064616c616d20646f6b756d656e2070656e67616461616e20426172616e672f4a6173612c2064616e2070617374696b616e2070656c616b73616e61616e6e79612074656c61682064696c616b73616e616b616e20736563617261206164696c2c2074657262756b612c207472616e73706172616e2064616e20616b756e746162656c2c20616e74617261206c61696e2064656e67616e20636172613a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e44617061746b616e206461667461722063616c6f6e2070657365727461206c656c616e672079616e67206d656e67616d62696c2028646f776e6c6f61642920646f6b756d656e206c656c616e672064616e2074656c6974692074616e6767616c2d74616e6767616c2070656e67616d62696c616e20646f6b756d656e20756e74756b206d6579616b696e692062616877612070656e67616d62696c616e20646f6b756d656e2064696c616b756b616e207061646120706572696f64652079616e672074656c616820646974656e74756b616e2e3c2f6c693e0d0a093c6c693e4c616b756b616e206b6f6e6669726d617369206b65706164612062656265726170612063616c6f6e2070657365727461206c656c616e672079616e672074656c6168206d656e67616d62696c2028646f776e6c6f61642920646f6b756d656e206c656c616e672074657461706920626174616c206d656e67696b757469206c656c616e672028746964616b206d656e6775706c6f616420646f6b756d656e2070656e61776172616e29266e6273703b266e6273703b64616e2064617061746b616e20616c6173616e6e796120756e74756b206d6579616b696e692062616877612070616e697469612070656e67616461616e2074656c6168206265726c616b75206164696c2064616e207472616e73706172616e3c2f6c693e0d0a093c6c693e42616e64696e676b616e20646f6b756d656e2079616e6720646973657261686b616e2028646975706c6f616429206f6c65682072656b616e616e2079616e67206d656e616e672064616e2079616e67206b616c61683c2f6c693e0d0a093c6c693e506572696b7361206265726974612061636172612c206461667461722068616469722061616e77696a7a696e672064616e206a6172616b2077616b747520616e746172612070656e67756d756d616e2064656e67616e2061616e77696a7a696e672c2073657274612079616b696e6b616e2062616877612070656c616b73616e61616e6e79612074656c6168206469696b757469206f6c65682063756b757020706573657274612e3c2f6c693e0d0a093c6c693e43656b2064616e2054656c69746920686173696c2061616e77696a7a696e6720736563617261206f6e6c696e652064656e67616e206d656d696e74612072656b617020686173696c2070657263616b6170616e206b657061646120506f6b6a6120554c502e3c2f6c693e0d0a093c6c693e43656b206170616b6168206164612063616c6f6e2070657365727461206c656c616e672079616e6720646967756775726b616e206b6172656e6120746964616b206d656e67696b7574692061616e77696a7a696e67206f6e6c696e652e3c2f6c693e0d0a093c6c693e59616b696e6b616e2062616877612050616e697469612050656e67616461616e2074656c6168206d656e79616d7061696b616e2070657275626168616e20646f6b756d656e2070656e67616461616e202875706c6f61642920746572736562757420706164612061706c696b61736920535053453c2f6c693e0d0a093c6c693e43656b206170616b61682061646120646f6b756d656e20646172692050656e796564696120746964616b20646170617420646962756b61206f6c656820506f6b6a6120554c502c204a696b61206164612074656c697469206170612070656e79656261626e79612e3c2f6c693e0d0a093c6c693e44617061746b616e2073656d756120646f6b756d656e2070656e61776172616e2064616e20706572696b7361206170616b61682073656d75612070656e617761722079616e67206c756c7573207072616b75616c6966696b6173692074656c6168206d656e79657274616b616e206a616d696e616e2070656e61776172616e2028636f7079292079616e67206d61736968206265726c616b75207061646120736161742064696c616b73616e616b616e2070726f7365732070656e67616461616e2e20284e6f6d696e616c206a616d696e616e2070656e61776172616e207365626573617220312520732e642e2033252064617269206e696c616920485053292e3c2f6c693e0d0a093c6c693e506572696b7361206c61706f72616e2064616e20646f6b756d656e206c61696e6e7961206174617320686173696c2070656e696c6169616e2070656e61776172616e20706573657274612064616e206c616b756b616e2070656e67756a69616e206170616b616820686173696c2070656e696c6169616e2070656e61776172616e2074656c61682064696c616b756b616e207365737561692064656e67616e2063617261206576616c756173692079616e6720646974657461706b616e20736562656c756d6e79612c206261696b20746572686164617020617370656b2061646d696e697374726173692c2074656b6e6973206d617570756e2068617267612e3c2f6c693e0d0a093c6c693e4c616b756b616e2070656e67756a69616e2061746173206d65746f64652070656e696c6169616e2070656e61776172616e2079616e672064696c616b756b616e206f6c656820506f6b6a6120554c502c206170616b61682074656c6168207365737561692064656e67616e206d65746f64652070656e696c6169616e2079616e672074656c616820646974657461706b616e2064616c616d20646f6b756d656e206c656c616e672e3c2f6c693e0d0a093c6c693e4c616b756b616e20616e616c697369732068617267612070656e61776172616e206469616e7461726120706172612070657365727461206170616b61682061646120696e64696b6173692068617267612079616e67206469617475722e2028496e64696b6173696e796120616e74617261206c61696e2062657275706120666f726d61742064616e2062656e74756b2068757275662079616e672073616d612c20696e74657276616c2070657262656461616e2079616e672068616d7069722073616d612c206164616e79612070657262656461616e2068617267612079616e672073616e67617420656b737472656d2070616461206265626572617061206974656d2c206164616e79612070656e61776172616e2079616e672073616e6761742072656e6461682f746964616b2077616a6172292e3c2f6c693e0d0a093c6c693e4576616c75617369206170616b61682070656d656e616e67206c656c616e67206d656d70756e79616920687562756e67616e20697374696d6577612064656e67616e2041746173616e204c616e6773756e672f2050656e6767756e612f42656e64616861726177616e2f50616e697469612050656e67616461616e2e204a696b6120746572646170617420696e64696b617369206164616e796120687562756e67616e20697374696d6577612c2074656c7573757269206c65626968206c616e6a7574206164616e7961206b656d756e676b696e616e206861726761206d656e6a61646920746964616b20656b6f6e6f6d69732e2e3c2f6c693e0d0a093c6c693e59616b696e6b616e2070656d656e616e67206c656c616e67206d65727570616b616e2063616c6f6e20706573657274612079616e67206d656d696c696b692073636f72652074657274696e6767692e2053636f726520646974656e74756b616e207365737561692064656e67616e206d65746f64652070656e696c6169616e202874656b6e69732f6b75616c69746173206174617520676162756e67616e20616e746172612074656b6e69732f6b75616c697461732064616e206861726761292e3c2f6c693e0d0a093c6c693e59616b696e6b616e2062616877612075727574616e2063616c6f6e2070656d656e616e67206c656c616e672074656c6168207365737561692064656e67616e20686173696c206576616c7561736920617461752073636f72696e6720646f6b756d656e2070656e61776172616e2028686173696c20626572697461206163617261206576616c756173692070726f706f73616c2074656b6e69732c206576616c756173692070726f706f73616c2062696179612064616e206576616c756173692070726f706f73616c20676162756e67616e293c2f6c693e0d0a093c6c693e59616b696e6b616e20616461206174617520746964616b6e796120737961726174206e65676f7369617369206861726761206b65706164612063616c6f6e2070656d656e616e672028756e74756b2050656e756e6a756b616e204c616e6773756e672c2050656e67616461616e204c616e6773756e67293c2f6c693e0d0a093c6c693e59616b696e6b616e206e65676f73696173692068617267612074656c61682064696c616b756b616e207365636172612062656e61722064616e206469627561746b616e206265726974612061636172612064616e206e6f74756c656e207365636172612074657274756c69732064616e20646974616e646174616e67616e69206f6c65682070616e697469612064616e2063616c6f6e2070656d656e616e672c20736562656c756d2064696c616b756b616e2070656e616e646174616e67616e206b6f6e7472616b3c2f6c693e0d0a093c6c693e506572696b7361206170616b616820686173696c2070656e65746170616e2070656d656e616e672074656c6168206469756d756d6b616e2064616e20646973616d7061696b616e206b65706164612073656c757275682070657365727461206c656c616e672e3c2f6c693e0d0a093c6c693e54656c6974692061646120746964616b6e7961206b656265726174616e2f73616e67676168616e20617461732070656e65746170616e2070656d656e616e672c2064616e2061706162696c6120616461206170616b61682074656c616820646974696e64616b6c616e6a7574692e3c2f6c693e0d0a093c6c693e44617061746b616e20696e666f726d61736920646172692070616e697469612070656e67616461616e206d656e67656e6169206164612f746964616b206164612073616e67676168616e2c2061746175206c616b756b616e206b6f6e6669726d617369206b65706164612062656265726170612063616c6f6e20706573657274612079616e67206d656d696c696b6920706f74656e7369207065727361696e67616e20746574617069206b616c61682064616c616d2073636f72696e6720756e74756b206d656e676574616875692061646120746964616b6e79612073616e67676168616e3c2f6c693e0d0a093c6c693e54656c697469206170616b61682073616e67676168616e206469746572696d61207061646120736161742079616e672074657061742064616e20646974696e64616b6c616e6a757469206f6c65682070616e697469612070656e67616461616e20736573756169206b6574656e7475616e3c2f6c693e0d0a093c6c693e41706162696c612074657264617061742073616e67676168616e2c2070656c616a6172692064616e2074656c616168206973692073616e67676168616e2064616e206c616b756b616e2070656e67756a69616e206174617320696e666f726d6173692079616e672074657263616e74756d2064616c616d2073757261742073616e67676168616e20756e74756b206d656c616b756b616e2070656e64616c616d616e2061756469742e3c2f6c693e0d0a093c6c693e506572696b73612074616e6767616c2070656e65746170616e2070656d656e616e672c2064616e2074616e6767616c2070656e616e646174616e67616e616e206b6f6e7472616b2c206170616b61682074656c6168206d656c6562696869206d6173612073616e6767616820736573756169206b6574656e7475616e2079616e67206265726c616b752e3c2f6c693e0d0a093c6c693e42696c61207065726c752c206c616b756b616e206b6f6e6669726d617369206b657061646120706573657274612079616e67206b616c61682061746173206b65696b75747365727461616e6e79612e2028556e74756b206d6579616b696e6b616e2062616877612070656e696c6169616e2064616e2070656e65746170616e2070656d656e616e672074656c61682062656e61722064696c616b756b616e207365737561692064656e67616e206b6574656e7475616e2064616e20746964616b2061646120696e64696b617369204b4b4e292e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e4361746174616e3a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e50656e616e646174616e67616e616e206b6f6e7472616b2070616c696e67206c616d62617420656d7061742062656c61732068617269206b65726a612073656a616b2064697465726269746b616e6e79612053757261742050656e65746170616e2050656e796564696120426172616e672f4a6173612028535050424a292e3c2f6c693e0d0a093c6c693e506572696b73612062616877612070656e796564696120426172616e672f4a6173612074656c6168206d656e79657261686b616e207375726174206a616d696e616e2070656c616b73616e61616e207365626573617220352520286c696d612070657273656e292064617269206e696c6169206b6f6e7472616b2064616e206a696b61206e696c61692070656e61776172616e207465726b6f72656b7369206469626177616820383025206461726920746f74616c204850532c2042657361726e7961204a616d696e616e2070656c616b73616e61616e2035252064617269206e696c616920746f74616c204850532e3c2f6c693e0d0a3c2f756c3e, 1),
('52d2b9dff25cf283057cad116ebedcf01aada340', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP280', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Kontrak Pengadaan Barang/ Jasa', 0x3c703e32312e2050656c616a617269206b6f6e7472616b2070656e67616461616e20426172616e672f4a6173612079616e672062657273616e676b7574616e2064616e2062616e64696e676b616e2064656e67616e2073796172617420756d756d2064616e20737961726174206b6875737573206b6f6e7472616b2079616e6720646973616d7061696b616e20736562656c756d6e79612064616c616d20646f6b756d656e2070656d696c6968616e2070656e796564696120426172616e672f4a6173612c2073657274612079616b696e6b616e206b65736573756169616e6e79612e497369204b6f6e7472616b20286d696e696d616c293a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e5061726120706968616b20286e616d612c206a61626174616e2c20616c616d6174293c2f6c693e0d0a093c6c693e506f6b6f6b2070656b65726a61616e2079616e672064697065726a616e6a696b616e3c2f6c693e0d0a093c6c693e48616b2064616e206b6577616a6962616e207061726120706968616b3c2f6c693e0d0a093c6c693e4e696c61692061746175206861726761206b6f6e7472616b2c207365727461207379617261742070656d6261796172616e3c2f6c693e0d0a093c6c693e506572737961726174616e2026616d703b20737065736966696b6173692074656b6e6973207967206a656c61732064616e20746572696e63693c2f6c693e0d0a093c6c693e54656d7061742026616d703b206a616e676b612077616b74752070656e79656c65736169616e2f2070656e7965726168616e2064676e206a616475616c2077616b74752064616e207379617261742070656e7965726168616e6e79612e3c2f6c693e0d0a093c6c693e4a616d696e616e2074656b6e69732f686173696c2070656b65726a61616e2079672064696c616b73616e616b616e202f6b6574656e7475616e206b656c61696b616e3c2f6c693e0d0a093c6c693e4b6574656e7475616e206d656e67656e616920636964657261206a616e6a692064616e2073616e6b73693c2f6c693e0d0a093c6c693e4b6574656e7475616e2070656d75747573616e206b6f6e7472616b20736563617261207365706968616b3c2f6c693e0d0a093c6c693e4b6574656e7475616e206b65616461616e206d656d616b73613c2f6c693e0d0a093c6c693e4b6574656e7475616e206b6577616a6962616e207061726120706968616b2064616c616d2068616c207465726a616469206b65676167616c616e2070656c616b73616e61616e2070656b65726a61616e3c2f6c693e0d0a093c6c693e4b6574656e7475616e207065726c696e64756e67616e2074656e616761206b65726a613c2f6c693e0d0a093c6c693e4b6574656e7475616e2062656e74756b2026616d703b2074616e6767756e67206a617761622067616e676775616e206c696e676b756e67616e3c2f6c693e0d0a093c6c693e4b6574656e7475616e206d656e67656e61692070656e79656c65736169616e2070657273656c69736968616e2e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e4b6f6e7472616b2070656e67616461616e20422f4a20646170617420626174616c2c206b6172656e613a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e62696c6120697369206b6f6e7472616b206d656c616e67676172206b6574656e7475616e20706572756e64616e67616e2079616e67206265726c616b752028626174616c2064656d692068756b756d292e3c2f6c693e0d0a093c6c693e62696c61207061726120706968616b2074657262756b7469206d656c616b756b616e204b4b4e2c206b65637572616e67616e2064616e2070656d616c7375616e2064616c616d2070726f7365732070656e67616461616e206d617570756e2070656c616b7361616e206b6f6e7472616b20286469626174616c6b616e292e3c2f6c693e0d0a3c2f756c3e, 1),
('43c88ea969965609763421170d8cd072a6cd4db6', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP282', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Kontrak Pengadaan Barang/ Jasa', 0x3c703e32332e2042696c61206164612070656b65726a61616e207375706572766973692061746173206b6f6e7472616b2c2079616b696e6b616e2062616877612070656c616b73616e61616e207375706572766973692074656c61682064696c616b73616e616b616e20736573756169206b6f6e7472616b2e204a696b6120746964616b2c20706572696b7361206170616b6168207375646168207465726461706174207375706572766973692079616e672063756b757020617461732070656c616b73616e61616e206b6f6e7472616b2074657273656275742e3c2f703e, 1),
('27307cfa5b56fa1f327701e82c0528168304fdee', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP283', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Kontrak Pengadaan Barang/ Jasa', 0x3c703e32342e2042696c6120616461206b6c617573756c2070656d62657269616e2075616e67206d756b612c2070617374696b616e2062616877612075616e67206d756b612079616e67206469626572696b616e206b65706164612070656e796564696120422f4a2074656c6168207365737561692064656e67616e206b6574656e7475616e2c207365626167616920626572696b75743a5573616861206b6563696c206d616b73696d616c2033302520266e6273703b6e696c6169206b6f6e7472616b2c5573616861204e6f6e206b6563696c2c206d616b73696d616c20323025206e696c6169206b6f6e7472616b2e3c2f703e, 1),
('d68912acb59215bdd2228f96a05ea1954b908ce1', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP284', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Kontrak Pengadaan Barang/ Jasa', 0x3c703e32352e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('01005e38770f00b2bb0c643c900f4c229e99f9be', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP293', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e33342e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1);
INSERT INTO `ref_program_audit` (`ref_program_id`, `ref_program_id_type`, `ref_program_code`, `ref_program_aspek_id`, `ref_program_title`, `ref_program_procedure`, `ref_program_del_st`) VALUES
('737057183d4501e1608cc03aada2e860206c10f0', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP285', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultansi', 0x3c703e32362e2054656c697469206170616b6168206a6173612079616e6720646962757475686b616e206f6c65682070656e6767756e61206a617361206b6f6e73756c74616e73692068617275732064696c616b73616e616b616e206f6c656820706968616b206b65746967612028746964616b2064617061742064696c616b73616e616b616e2073656e64697269206f6c65682070656e6767756e61206a617361292e3c2f703e, 1),
('bb59c782ff37f32528b6e565bffcf4173331a6b4', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP286', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e32372e2059616b696e6b616e2062616877612070656e67616461616e206a617361206b6f6e73756c74616e73692074656c61682064696c656e676b6170692064656e67616e204b6572616e676b6120416375616e204b65726a6120284b414b292e3c2f703e, 1),
('e4ee3aa87e72ca07f840bcf5ea9d4f86c0c4f2e4', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP287', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e32382e2054656c697469206170616b61682064616c616d204b414b2064616e204265726974612041636172612070656d62657269616e2070656e6a656c6173616e2c206b72697465726961206576616c756173692070656e61776172616e2074656c616820646973616d7061696b616e206b657061646120706573657274612e3c2f703e, 1),
('29dd1ea6ebda98de33e33dcc834fba71a6c963ae', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP288', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e32392e2044617061746b616e20686173696c206576616c756173692070616e6974696120617461732070726f7365732073656c656b7369206a617361206b6f6e73756c74616e73692064616e20756a6920686173696c2070656e696c6169616e207465727365627574206170616b61682074656c6168207365737561692064656e67616e206b72697465726961206576616c756173692079616e672074656c616820646974657461706b616e2064616c616d20646f6b756d656e2073656c656b73692e20556e7375722d756e73757220706f6b6f6b2079616e672064696e696c6169206164616c61682070656e67616c616d616e2c2070656e64656b6174616e2064616e206d65746f646f6c6f67692064616e206b75616c6966696b6173692074656e6167612061686c692e3c2f703e, 1),
('d82088197525f6e996fc908ac8b7ba00350efe82', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP289', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e33302e2059616b696e6b616e20626168776120696e666f726d6173692079616e6720746572746572612064616c616d20637572726963756c756d207669746165266e6273703b266e6273703b64616e206b6561736c69616e20696a617361682070656e646964696b616e20666f726d616c2074656e6167612061686c692c2074656c6168207365737561692064656e67616e206b75616c6966696b6173692079616e6720646974657461706b616e2e3c2f703e, 1),
('dd7d978d847d07e41eb849cf4f5d087a292b7d02', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP290', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e33312e20506572696b73612070726f73657320736562656c756d2070656e65746170616e2070656d656e616e672c206170616b616820616461206e65676f73696173692064616e206b6c61726966696b6173692c206c616b756b616e2070656e67756a69616e2074657268616461702070726f736573207465727365627574202862616e64696e676b616e2064656e67616e206265726974612061636172616e7961292064616e2070617374696b616e2074656c6168207365737561692064656e67616e206b6574656e7475616e2064616e20746964616b2061646120696e64696b617369204b4b4e2e2028556e74756b2070656b65726a61616e204a617361204b6f6e73756c74616e736920746964616b2064697065726c756b616e206a616d696e616e2070656c616b73616e61616e292e3c2f703e, 1),
('90e6c519af636868e362c9f63a053fd4dd1d81d1', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP291', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e33332e2054656c697469206269617961206c616e6773756e67206e6f6e20706572736f6e696c20756e74756b2070656b65726a61616e206b6f6e73756c74616e736920746964616b206d656c656269686920343025206461726920746f74616c20626961796120287465726b656375616c692070656b65726a61616e2070656d657461616e2075646172612c20737572766579206c6170616e67616e2c2070656e67756b7572616e2064616e2070656e79656c6964696b616e2074616e6168292e3c2f703e, 1),
('c394f0928da0677e617b574c207bf80082b21b83', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP292', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa Konsultasi', 0x3c703e33332e204c616b756b616e2070656e656c616168616e20686173696c206b65726a612074696d2074656b6e69732079616e67206d656e676576616c75617369206c61706f72616e20686173696c206b6567696174616e2064656e67616e206461746120686173696c2070656c616b73616e61616e206b6567696174616e206b6f6e73756c74616e73692e3c2f703e, 1),
('f576b3c70c40d9cfd39adea4b5db1922d4156015', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP294', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e33352e204964656e746966696b617369206170616b61682070656b65726a61616e2070656e67616461616e20626172616e672f6a6173612074656c6168206d656d656e756869206b6574656e7475616e20756e74756b2064696c616b73616e616b616e20736563617261207377616b656c6f6c6120286164612038206b726974657269612073657375616920706173616c203339206179617420283329204b657070726573204e6f2e2038302f32303033292e3c2f703e, 1),
('c480f5f7935c0f178187ed45b811a43d8422e27f', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP295', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e33362e204170616b61682070656c616b73616e61616e207377616b656c6f6c612064656e67616e206d656e6767756e616b616e2074656e6167612061686c692064617269206c75617220746964616b206d656c65626968692035302520646172692074656e6167612073656e646972692e3c2f703e, 1),
('887da7efb8faac33f6eabcc860a10ad371b5c83d', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP296', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e33372e204964656e746966696b617369206170616b61682070656c616b73616e61616e207377616b656c6f6c612064696c616b73616e616b616e206f6c65682070656e6767756e6120426172616e672f204a6173612c20696e7374616e73692070656d6572696e746168206c61696e2061746175206b656c6f6d706f6b206d6173796172616b61742f4c534d2070656e6572696d612068696261682e3c2f703e, 1),
('b25c038989f529316dab4b789859856a9595130e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP297', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e33382e20556e74756b2070656c616b73616e61616e207377616b656c6f6c612079616e67206f6c65682070656e6767756e6120426172616e672f204a617361206170616b61682074656c6168206d656d656e756869206b6574656e7475616e2070616461204c616d706972616e2031204261622049494920627574697220422e3120556e74756b2070656c616b73616e61616e207377616b656c6f6c612079616e67206f6c656820496e7374616e73692050656d6572696e746168206c61696e206e6f6e2073776164616e61206170616b61682074656c6168206d656d656e756869206b6574656e7475616e2070616461204c616d706972616e2031204261622049494920627574697220422e322e3c2f703e, 1),
('2c3803e6677020ea9dc3701ac58c2c98bb7ebe24', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP298', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e33392e20556e74756b2070656c616b73616e61616e207377616b656c6f6c612079616e67206f6c6568204c534d2050656e6572696d61204869626168206170616b61682074656c6168206d656d656e756869206b6574656e7475616e2070616461204c616d706972616e2031204261622049494920627574697220422e332e3c2f703e, 1),
('3828247ec34d7ce2f795c0c04199b7399ad0a30d', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP299', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e34302e204170616b61682070656c616b73616e61616e207377616b656c6f6c612074656c61682064696c61706f726b616e20286c61706f72616e206b656d616a75616e2c207265616c697361736920666973696b2064616e206b6575616e67616e29206f6c65682070656c616b73616e61206c6170616e67616e2f70656c616b73616e61207377616b656c6f6c61206b65706164612070656e6767756e6120426172616e672f204a617361207365746961702062756c616e2e3c2f703e, 1),
('457177fd712a56252e5b7e30d15afe5a74fe953e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP300', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e34312e204170616b6168206c61706f72616e206b656d616a75616e2c207265616c697361736920666973696b2064616e206b6575616e67616e2074656c61682064696c61706f726b616e207365746961702062756c616e206f6c65682070656e6767756e6120426172616e672f204a617361206b6570616461204d656e746572692f4b6570616c61204c504e442f47756265726e75722f4275706174692f2057616c696b6f74612f2050656a616261742079616e6720646973616d616b616e2e3c2f703e, 1),
('d1df1687a6daf616e05c40f37fef738cb46e3c4e', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO134', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e352e2054656c697469204b616c69627261736920706572616c6174616e206f7065726173696f6e616c2e3c2f703e, 1),
('e3edfbf4f84195c54b16ea79dc2fe9db74622715', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO135', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e362e2054656c697469206170616b6168207365746961702070656e6572696d61616e20626172616e672f2070656b65726a61616e2079616e672073756461682073656c657361692c2073656c616c7520646962756174206b616e204265726974612041636172612050656e6572696d61616e20426172616e672f2050656e79656c65736169616e2050656b65726a61616e2064616e2064696c616b206b616e20756a6920706574696b2e3c2f703e, 1),
('279bafdc28404129f3e40ecc49e4e41e90fee8e0', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO136', '4db91f046b49f91c14736ad0e82d31c931ce475c', 'Peralatan Operasional & Non Operasional', 0x3c703e372e2054656c69746920736172616e612064616e20707261736172616e61206265726c65626968206174617520746964616b20646170617420646967756e616b616e206c61676920646970696e6461682074616e67616e6b616e206174617520646968617075736b616e20736573756169206b6574656e7475616e2079616e67206265726c616b753c2f703e, 1),
('e9b557080949f98048629646e04e45350e677021', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO140', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Perencanaan', 0x3c703e342e2054656c6974692064616e204576616c7561617369206b656275747568616e206a61626174616e2066756e6773696f6e616c2e3c2f703e, 1),
('ea86a900cb5eb1e25cd3f15efb6103ecceb1e3d1', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO149', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e332e2054656c697469206d7574617369206a61626174616e2f74656e6167612066756e6773696f6e616c2074656c616820736573756169206b6574656e7475616e2079616e67206265726c616b753c2f703e, 1),
('9974049ca6eb33c5d368149089a19700509f4b1a', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO150', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e342e2054656c697469206170616b6168206b656e61696b616e2070616e676b61742070656a616261742066756e6773696f6e616c2074656c6168207365737561692064656e67616e206b6574656e7475616e2e2e3c2f703e, 1),
('5bfa19f4833399ce9018db850b903a069182c887', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO151', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Mutasi dan Kenaikan Pangkat', 0x3c703e352e2054656c697469206170616b61682074696d2070656e696c616920616e676b61206b72656469742074656c6168206d656c616b73616e616b616e2074756761736e79613c2f703e, 1),
('323ffff93f1fc6f5b420e5780f847f92d4bbeb07', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO154', '5af063d9b993c0c43b38e34c80fe60e94189c3ff', 'Kesejahteraan, Pemberhentian dan Pensiun', 0x3c703e332e2054656c6974692070656e7369756e2050656761776169202f204a616e6461206174617520447564612074656c6168206469626572696b616e2074657061742077616b747520736573756169206b6574656e7475616e2079616e67206265726c616b752e3c2f703e, 1),
('1e6d17d53ed33ac3d4346960b464322e21bd73e5', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO161', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e352e2054656c697469206170616b6168204175646974692074656c6168206d656e797573756e2072656e63616e612064616e2070726f6772616d206b65726a61207365727461206c61706f72616e20746168756e616e2e3c2f703e, 1),
('d9e10d54d941295fa4f4c5e5ca64f90979b4bcb0', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO162', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e362e2054656c697469206170616b6168206b656c6f6d706f6b206a61626174616e2066756e6773696f6e616c2064616e2066756e6773696f6e616c20756d756d20285455292074656c6168206d656c616b73616e616b616e207475676173207365737561692064656e67616e205455504f4b53492d6e79612e3c2f703e, 1),
('135a7fd5022ac91c579eb74ca684415984220f16', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO163', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e372e2054656c697469206170616b616820616461206b65726a6173616d612064656e67616e20696e7374616e7369206c75617220286d6973616c203a20534d504b2c205374617369756e2050656e67756170616e2c205374617369756e2048756a616e20646c6c2e2920646964616c616d2077696c61796168206b65726a61207465726d6173756b2070656e67756d70756c616e20646174616e7961266e6273703b3c2f703e, 1),
('de205f200ce2b8220b4fde29f2101cacb65cea90', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO164', '8134168f4fda3dafeb174cb7230aca8ce77c2f8b', 'Struktur Organisasi', 0x3c703e382e2054656c697469206170616b616820616461206b6567696174616e2070656e67656e64616c69616e202f2070656e6761776173616e206d656c656b61742064616e2062616761696d616e6120636172612070656c616b73616e61616e6e79612e3c2f703e, 1),
('f3f0fe3aa7642472464e60d539badacfe4318d68', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO173', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Bandingkan antara kondisi pengendalian dengan pengendalian kunci dan teliti apakah terjadi kesenjangan,', 0x3c703e332e204b6567696174616e2050656e67656e64616c69616e2e3c2f703e, 1),
('a1898e83ddfc62fe4f0d63165593e9a67ee58d9b', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO174', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Bandingkan antara kondisi pengendalian dengan pengendalian kunci dan teliti apakah terjadi kesenjangan,', 0x3c703e342e20496e666f726d6173692064616e204b6f6d756e696b6173692e3c2f703e, 1),
('399463e739e6db7c687edce2b39b68c4ddabbc74', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO175', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Bandingkan antara kondisi pengendalian dengan pengendalian kunci dan teliti apakah terjadi kesenjangan,', 0x3c703e352e2050656d616e746175616e2e3c2f703e, 1),
('f0529dfb9073ce3431eb00f4851a4e2ef239922e', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO178', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan pengujian terbatas atas pelaksanaan SPI dan identifikasikan akibat potensial yg mungkin timbul dari kelemahan SPI tsb serta unsur pengendalian yang diperlukan untuk menutupi kelemahan tsb.', 0x3c703e332e2050656e67656e64616c69616e266e6273703b4b6f72656b7469762e3c2f703e, 1),
('cc98c6106fac10d225e809bfacdda1c74253c306', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO179', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan pengujian terbatas atas pelaksanaan SPI dan identifikasikan akibat potensial yg mungkin timbul dari kelemahan SPI tsb serta unsur pengendalian yang diperlukan untuk menutupi kelemahan tsb.', 0x3c703e342e266e6273703b50656e67656e64616c69616e206c616e6773756e672e3c2f703e, 1),
('d87dd2d429add7da16b644e38a4a9eb2b161867c', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO180', '6d46ae583029560f8debf0fce2036586e97cea7a', 'Lakukan pengujian terbatas atas pelaksanaan SPI dan identifikasikan akibat potensial yg mungkin timbul dari kelemahan SPI tsb serta unsur pengendalian yang diperlukan untuk menutupi kelemahan tsb.', 0x3c703e352e266e6273703b50656e67656e64616c69616e206b6f6e7672656e7361746976652e3c2f703e, 1),
('b77ae8444fa6310fc274cafa0e3276ea0d3ed9ee', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO184', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e342e204c696e676b756e67616e20696e7465726e616c2c20656b737465726e616c2c2070656d616e676b75206b6570656e74696e67616e2064616e20706968616b207465726b616974206c61696e6e79612e3c2f703e, 1),
('8c5887758ba1e388db0370e46d01eefb5c9e8236', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO185', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e352e20547567617320506f6b6f6b2064616e2046756e677369204175646974692e3c2f703e, 1),
('7284218a341b1b188d52f4565cc31148d99feef7', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO186', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e362e20537472756b747572204f7267616e69736173692064616e20706572736f6e696c2079616e67207465726c6962617420646964616c616d6e79612064616e203c656d3e4a6f62204465736372697074696f6e3c2f656d3e2e3c2f703e, 1),
('954d3aa28f0b26c2b2f349857ba7599964a05c49', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO187', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e372e20416e67676172616e2c207265616c69736173692064616e2f2061746175206c61706f72616e206b696e65726a61206c61696e6e79612e3c2f703e, 1),
('6c040d283eeb50e9559055194491994a914f9af9', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO188', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e382e205065646f6d616e2064616e20706574756e6a756b2070656c616b73616e61616e2074656e74616e672053697374656d20496e666f726d617369204d616e616a656d656e2e3c2f703e, 1),
('8c8332b9f791eb1270b17c35974bfbfdab600477', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO189', 'e7ee08c5cb7ef028130b0a7d0a0209ba4da86628', 'Dapatkan (kumpulkan) informasi mengenai gambaran umum Audit, seperti:', 0x3c703e392e20486173696c20417564697420506572696f646520536562656c756d6e7961206261696b206461726920696e7465726e616c206d617570756e20656b737465726e616c2e3c2f703e, 1),
('f0a2b1b5ec70b16d0409585ee8bb2711620acf6b', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO195', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e342e204c616b756b616e206b6f6e6669726d617369206b65706164612070656a616261742079616e672062657277656e616e67207465726861646170206164616e79612070657262656461616e206b75616c697461732c3c2f703e, 1),
('12f47e1a86742e6113c63adb3615e169b83c0e95', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO196', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e352e20447374202e2e2e2e2e2e2e2820736573756169206b6562757468616e292c3c2f703e, 1),
('27dfc278fed40bbd2a3519ed5c318bc14aa52fbb', '9a5725d64d7c8ff7822e7f87d41c42a06a0cf9fb', 'AO197', 'd620b3fd0164fa5eb03125e497e9aca5f5da3f7a', 'Langkah Kerja Audit', 0x3c703e362e20427561746c61682073696d70756c616e2e3c2f703e, 1),
('d143d239ad9d4ad3bd0371a437bb08bf0209be49', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP205', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Pengadaan Barang', 0x3c703e382e20427561742053696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('1b477c6f2bc787f0919cf83e38097fba716442ad', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP216', 'cd4a7c581d450985ff742da4320c12f3bccf3068', 'Penetapan Harga Perhitungan Sendiri Jasa Konsultasi', 0x3c703e31392e20427561742053696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('7ea8fcb51c3f13f506333bfbe7a7558d8ad7c102', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP243', '60db6ee43d3d93ea44b62a93ddfa0515badda1ed', 'Langkah Kerja', 0x3c703e31322e20427561742053696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('929a68f94638f49c037838b95831018035fd83d8', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP254', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Kebutuhan Pengadaan Barang/ Jasa', 0x3c703e31312e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('befda496e49b8587bcbfb69484f438bb72135ba5', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP256', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pembiayaan dan Jadwal Pelaksanaan Pengadaan Barang/ Jasa', 0x3c703e31332e20506572696b73612044495041206d6173696e672d6d6173696e672073617475616e206b65726a612061746173206b6f6e7472616b2079616e6720646961756469742c2063617461742074616e6767616c206469746572696d616e7961204449504120736572746120756a69206b65736573756169616e2064656e67616e206a616477616c2070656c616b73616e61616e2070656e67616461616e20626172616e672f206a6173612c7465726d6173756b2070656e67617275686e7961206b65706164612073616174206d756c61696e79612070726f7365732070656e67616461616e2e3c2f703e, 1),
('bdb63e6ef0aa22d2f92e32cb462fd6924f52629e', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP257', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pembiayaan dan Jadwal Pelaksanaan Pengadaan Barang/ Jasa', 0x3c703e31342e2054656c61616820616c6f6b6173692077616b7475202870726f7365732070656c656c616e67616e2979616e672064696275617420506f6b6a6120554c502064616e2079616b696e6b616e20626168776120616c6f6b6173692074657273656275742074656c6168207365737561692064656e67616e206b6574656e7475616e2e3c2f703e, 1),
('55e50ea4ff410ce81ab9b3721996e1e976d04e25', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP258', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pembiayaan dan Jadwal Pelaksanaan Pengadaan Barang/ Jasa', 0x3c703e31352e2054656c6974692064616e2054656c61616820416e67676172616e2042656c616e6a612054616d626168616e2028414254292064616e2063617461742074616e6767616c206469746572696d6120736572746120706572737961726174616e6e796120756e74756b206d656e67657461687569206a616477616c2070656c616b73616e61616e2064616e2070656e67617275686e796120706164612070656e79656c65736169616e2070656b65726a61616e2064656e67616e2074656e6767616e672077616b7475207465727365646961206170616b61682070656e6767756e61616e20414254207465727365627574206d61736968207265616c6973746973206174617520746964616b3f3c2f703e, 1),
('c64cb402a4b6e5b2902ce5b6523919a9182234c2', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP259', '2bb0db84a9b8fe6868308a4a186ef79b82ec1ceb', 'Pembiayaan dan Jadwal Pelaksanaan Pengadaan Barang/ Jasa', 0x3c703e31362e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1),
('b10a4e6e33dadeb4a351f3c9bf0df57745ac0cd2', '98cd0ca731da106235cc474a7608ad5750d8e1e8', 'AP301', '8ebf1eace7c59cc969fbd0734c195aeeeaf9a7b0', 'Pelaksanaan Pengadaan Jasa secara Swakelola', 0x3c703e34322e20427561742073696d70756c616e20686173696c2061756469742e3c2f703e, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_internal`
--

CREATE TABLE IF NOT EXISTS `rekomendasi_internal` (
  `rekomendasi_id` varchar(50) NOT NULL,
  `rekomendasi_finding_id` varchar(50) NOT NULL,
  `rekomendasi_id_code` varchar(50) NOT NULL,
  `rekomendasi_desc` longblob NOT NULL,
  `rekomendasi_pic` varchar(50) NOT NULL,
  `rekomendasi_dateline` int(11) NOT NULL,
  `rekomendasi_date` int(11) NOT NULL,
  `rekomendasi_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Selesai',
  PRIMARY KEY (`rekomendasi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekomendasi_internal`
--

INSERT INTO `rekomendasi_internal` (`rekomendasi_id`, `rekomendasi_finding_id`, `rekomendasi_id_code`, `rekomendasi_desc`, `rekomendasi_pic`, `rekomendasi_dateline`, `rekomendasi_date`, `rekomendasi_status`) VALUES
('5ea9c5fdbd11194a10026c12e1820c1bbaf42ae3', 'cc0d40e7f31c36bab3c117f4260819c35a426482', '95b73b39296982e2134aaa0fa7481d9329732d8f', 0x3c703e41676172204b6570616c61205374617369756e204d6574656f726f6c6f6769204b6c617320492053656967756e20536f726f6e6720266e6273703b6d656d6572696e7461686b616e2050504b2064616e2073656c7572756820706968616b2079616e67207465726c696261742064616c616d2070726f7365732070656e67616461616e20626172616e672f2061746175206a61736120546168756e20416e67676172616e203230313720756e74756b206d656d7065726365706174206c616a752070656c616b73616e61616e266e6273703b2070656e67616461616e20626172616e672f2061746175206a6173612067756e61206d656e6768696e6461726920726973696b6f206b656d756e676b696e616e207465726a6164696e79612070726f7365732070656e67616461616e2079616e67207465726c616d6261742e3c2f703e, 'Kepala Stasiun Meteorologi Klas I Seigun Sorong', 1497373200, 1500915600, 0),
('964b39988d012e39a84c37e4d538d030c6968baf', '0bd6ebb71c556563b36ecbad3786c55c11914c09', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61205374617369756e204d6574656f726f6c6f6769204b6c617320492053656967756e20536f726f6e67207365636172612074657274756c6973206d656d6572696e7461686b616e2050504b2064616e2050656a616261742050656e67616461616e20756e74756b206c65626968206365726d61742064616e2074656c6974692064616c616d206d656c616b756b616e2074696170207461686170616e2070726f7365732070656e67616461616e20626172616e672f206a617361207365737561692064656e67616e20736573756169206b6574656e7475616e2064616c616d2050657270726573204e6f2e353420546168756e20323031302064616e2070657275626168616e6e796120736572746120506574756e6a756b2054656b6e69732070656c616b73616e61616e6e79612e3c2f703e, 'Kepala Stasiun Meteorologi Klas I Seigun Sorong', 1489078800, 1500915600, 0),
('ec46c823cb28845ce6924236838b467cfd8ed08f', 'dc65de4c52f6752d2f1ff6dd1ee590775c631efb', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61266e6273703b5374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f72266e6273703b6d656d6275617420266e6273703b5375726174204b657075747573616e20556e69742050656c6179616e616e204a617361204d6574656f726f6c6f67692c204b6c696d61746f6c6f67692c2064616e2047656f666973696b6120746572626172752064616e206d656d6572696e7461686b616e20556e69742050656c6179616e616e204a617361204d4b4720756e74756b206d656d6275617420266e6273703b6e6f74612072696e6369616e20706572686974756e67616e2062696179612064616e206469736572746169207065726b697261616e2077616b74752070656e79656c65736169616e207065726d696e7461616e20646174612e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503421200, 0),
('b131459a8ec4d389a61e3f2f9ef22a1d8b4af543', 'dec55894db67ec33b8d7f5b7cd4bb6fe5b9fc048', 'bf4d37a6e176e96a25a8fbf3dfeb75d9054ad657', 0x3c703e41676172204b6570616c61266e6273703b5374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f72266e6273703b6d656e677573756c6b616e2070656e6767616e7469616e2043757020436f756e74657220416e6f6d65746572206d656c616c7569205374617369756e204b6c696d61746f6c6f6769204b656c617320492042616e6a6172626172752073656c616b75204b6f6f7264696e61746f722050726f70696e736920266e6273703b4b616c696d616e74616e2053656c6174616e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503594000, 0),
('69371da9d6a66e307bcc3df024d6309b55944da3', 'e0f014782ca9c493cb7e80005694f850d359ab8b', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61204269726f20556d756d2064616e2053444d20736567657261206d656e65726269746b616e2073757261742070656d6265626173616e2073656d656e746172612064616c616d204a61626174616e2046756e6773696f6e616c20504d47206b657061646120706172612070656a6162617420737472756b747572616c204573656c6f6e204949492064616e204956206469205374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f722042616e6a61726d6173696e2e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503594000, 0),
('080e1e3defd7f5b8856c2e9eac82cc2192afb232', 'a59acd4ced696eb1abcdd1f03584037d6c9eab14', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61205374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f72206d656c616c7569204b6570616c61205375622042616769616e2054617461205573616861206d656e67696e737472756b73696b616e20756e74756b206d656c616b756b616e2070656d62617275616e20446166746172204469737472696275736920426172616e67202844444229206265727570612044616674617220426172616e67205275616e67616e2028444252292064616e2f617461752044616674617220426172616e67204c61696e6e7961207365727461206d656e67616c6f6b6173696b616e206b6570616461207065676177616920626172752079616e6720756e74756b206d656e656d706174692072756d61682064696e61732079616e67206b6f736f6e672e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503594000, 0),
('136d98178307297dceaaf759c6faa68276528980', '18d903cce11b96d995e12817794b6f8e2c210033', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61205374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f72206d656e67696e737472756b73696b616e266e6273703b50656a616261742050656e67616461616e20266e6273703b64616e2050504b206d656d7065646f6d616e692050657270726573204e6f2e3420266e6273703b546168756e20323031352074656e74616e672070657275626168616e206b65656d70617420617461732050657261747572616e20507265736964656e204e6f6d6f7220353420746168756e2032303130266e6273703b64616e266e6273703b50657261747572616e206c61696e6e7961207465726b6169742070656e67616461616e20426172616e672f4a6173612050656d6572696e7461682e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503853200, 0),
('eb0920dd2b0d8b53a3a05560f68671af2b1e20ab', '742713c4c437dfe7686deaebb4955d6f3cce2abf', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61205374617369756e204d6574656f726f6c6f6769204b656c6173204949205379616d737564696e204e6f6f722064616e2064616e2050504b206d656e746161746920266e6273703b6b6574656e7475616e2064616c616d2050657261747572616e20507265736964656e2052657075626c696b20496e646f6e65736961204e6f6d6f7220373020546168756e20323031322074656e74616e672050657275626168616e204b6564756120417461732050657261747572616e20507265736964656e204e6f6d6f72266e6273703b353420746168756e20323031302074656e74616e672050656e67616461616e20426172616e672f204a6173612050656d6572696e746168266e6273703b64616e2070657275626168616e6e79612e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503853200, 0),
('618242084cce7d9c7c58af400789a7a2790902c5', '31c978a01917c7f893e5c8890510839ba6e9996d', 'd759ed18d8404efd096fbd4452dbb36606655388', 0x3c703e41676172204b6570616c61266e6273703b5374617369756e204b6c696d61746f6c6f6769204b656c617320492042616e6a617262617275206d656e67696e737472756b73696b616e2050504b206167617220736567657261206d657265616c69736173696b616e2070656b65726a61616e207265686162696c697461736920676564756e67206b616e746f722c2070656d6173616e67616e20706176696e6720626c6f636b2c2064616e2072656861622070616761722074616d616e20616c6174207061646120616b6869722062756c616e204167757374757320323031372e3c2f703e, 'Samsuhadi, SE', 1511974800, 1503939600, 0),
('d86c0a8a04a91f178e1c346cbb5bfc510397b515', '9a052885886e493d678d957da3578bd9fc03a3d1', '0f732e34b94178c1571f434146ae8012ad802840', 0x3c703e4578616d706c652052656b6f6d656e646173693c2f703e, 'Gugus', 1524088800, 1522965600, 1),
('99d9f1ef609c26fb20db2b54556f40e9f197fd7a', 'd0aea2a26a01d5b43c0095a8ade439ed2df211d7', 'd1bca669dbbd088662e35d56883b267bac3518a0', 0x3c703e7361647361646173643c2f703e, 'gugus', 1524693600, 1523829600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `risk_identifikasi`
--

CREATE TABLE IF NOT EXISTS `risk_identifikasi` (
  `identifikasi_id` varchar(50) NOT NULL,
  `identifikasi_penetapan_id` varchar(50) NOT NULL,
  `identifikasi_kategori_id` varchar(50) NOT NULL,
  `identifikasi_selera` varchar(50) NOT NULL,
  `identifikasi_no_risiko` varchar(10) NOT NULL,
  `identifikasi_nama_risiko` varchar(255) NOT NULL,
  `identifikasi_penyebab` varchar(255) NOT NULL,
  `analisa_kemungkinan` int(3) NOT NULL,
  `analisa_kemungkinan_name` varchar(50) NOT NULL,
  `analisa_dampak` int(3) NOT NULL,
  `analisa_dampak_name` varchar(50) NOT NULL,
  `analisa_ri` varchar(3) NOT NULL,
  `analisa_ri_name` varchar(50) NOT NULL,
  `analisa_bobot_risk` varchar(3) NOT NULL,
  `analisa_nilai_ri` float(5,2) NOT NULL,
  `analisa_bobot_kat_risk` varchar(3) NOT NULL,
  `evaluasi_komponen` varchar(255) NOT NULL,
  `evaluasi_efektifitas` int(3) NOT NULL,
  `evaluasi_efektifitas_name` varchar(50) NOT NULL,
  `evaluasi_risiko_residu` int(3) NOT NULL,
  `evaluasi_risiko_residu_name` varchar(50) NOT NULL,
  `penanganan_risiko_id` varchar(50) NOT NULL,
  `penanganan_plan` varchar(255) NOT NULL,
  `penanganan_date` int(11) NOT NULL,
  `penanganan_pic_id` varchar(50) NOT NULL,
  `monitoring_action` varchar(255) NOT NULL,
  `monitoring_date` int(11) NOT NULL,
  `monitoring_plan_action` varchar(255) NOT NULL,
  `monitoring_tenggat_waktu` int(11) NOT NULL,
  PRIMARY KEY (`identifikasi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_identifikasi`
--

INSERT INTO `risk_identifikasi` (`identifikasi_id`, `identifikasi_penetapan_id`, `identifikasi_kategori_id`, `identifikasi_selera`, `identifikasi_no_risiko`, `identifikasi_nama_risiko`, `identifikasi_penyebab`, `analisa_kemungkinan`, `analisa_kemungkinan_name`, `analisa_dampak`, `analisa_dampak_name`, `analisa_ri`, `analisa_ri_name`, `analisa_bobot_risk`, `analisa_nilai_ri`, `analisa_bobot_kat_risk`, `evaluasi_komponen`, `evaluasi_efektifitas`, `evaluasi_efektifitas_name`, `evaluasi_risiko_residu`, `evaluasi_risiko_residu_name`, `penanganan_risiko_id`, `penanganan_plan`, `penanganan_date`, `penanganan_pic_id`, `monitoring_action`, `monitoring_date`, `monitoring_plan_action`, `monitoring_tenggat_waktu`) VALUES
('f7e700ec476fb957dfa335ba36a6ecc0dff369fb', 'fb53016ea39e68db6354740d686381b311c5dc08', '752b9fa1fcb57d1c76a68e38acb4f55ea94aab01', 'Sangat Rendah', '2240001', 'jkjkjkjk', 'kjkjkjk', 1, 'Hampir Tidak Terjadi', 1, 'Sangat Rendah', '1', 'Sangat Rendah', '100', 1.00, '100', 'Contoh', 5, 'Sangat Kuat', 1, 'Sangat Rendah', 'a407ff621bae384b57e896eb23f71ec59f01fb1a', 'Contoh 2', 1508860800, '', 'Ini hanya contoh', 1507046400, 'Sangat fatal', 1508774400);

-- --------------------------------------------------------

--
-- Table structure for table `risk_identifikasi_attach`
--

CREATE TABLE IF NOT EXISTS `risk_identifikasi_attach` (
  `iden_attach_id_iden` varchar(50) NOT NULL,
  `iden_attach_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_identifikasi_attach`
--

INSERT INTO `risk_identifikasi_attach` (`iden_attach_id_iden`, `iden_attach_name`) VALUES
('f7e700ec476fb957dfa335ba36a6ecc0dff369fb', ''),
('f7e700ec476fb957dfa335ba36a6ecc0dff369fb', 'logo_jiwasraya.png');

-- --------------------------------------------------------

--
-- Table structure for table `risk_penetapan`
--

CREATE TABLE IF NOT EXISTS `risk_penetapan` (
  `penetapan_id` varchar(50) NOT NULL,
  `penetapan_auditee_id` varchar(50) NOT NULL,
  `penetapan_tahun` int(4) NOT NULL,
  `penetapan_nama` varchar(100) NOT NULL,
  `penetapan_tujuan` varchar(255) NOT NULL,
  `penetapan_profil_risk` varchar(50) NOT NULL,
  `penetapan_profil_risk_residu` varchar(50) NOT NULL,
  `penetapan_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=propose, 2=approve, 3=tolak',
  `penetapan_set_pkat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=default, 1=pkat',
  PRIMARY KEY (`penetapan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_penetapan`
--

INSERT INTO `risk_penetapan` (`penetapan_id`, `penetapan_auditee_id`, `penetapan_tahun`, `penetapan_nama`, `penetapan_tujuan`, `penetapan_profil_risk`, `penetapan_profil_risk_residu`, `penetapan_status`, `penetapan_set_pkat`) VALUES
('fb53016ea39e68db6354740d686381b311c5dc08', '9ab2d5426492ad03b3796bd1e9222eadc66fc1f2', 2017, 'Test MR', 'Tujuan MR', 'Sangat Rendah', 'Sangat Rendah', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `risk_penetapan_comment`
--

CREATE TABLE IF NOT EXISTS `risk_penetapan_comment` (
  `penetapan_comment_id` varchar(50) NOT NULL,
  `penetapan_comment_penetapan_id` varchar(50) NOT NULL,
  `penetapan_comment_user_id` varchar(50) NOT NULL,
  `penetapan_comment_desc` varchar(255) NOT NULL,
  `penetapan_comment_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk_penetapan_comment`
--

INSERT INTO `risk_penetapan_comment` (`penetapan_comment_id`, `penetapan_comment_penetapan_id`, `penetapan_comment_user_id`, `penetapan_comment_desc`, `penetapan_comment_date`) VALUES
('f201cc7fed4b624f70954122776d215587318c09', 'fb53016ea39e68db6354740d686381b311c5dc08', '9b44ac8966798da6f357fc1689342e187013cd51', 'mnjkjkjkjkjk', 1508492616),
('ca2375c40cfa43f649b6ce47824a9d783a02ffdd', 'fb53016ea39e68db6354740d686381b311c5dc08', '9b44ac8966798da6f357fc1689342e187013cd51', 'jkjkjkljljkljklj;mkkl hup9py', 1508492641);

-- --------------------------------------------------------

--
-- Table structure for table `role_group_data`
--

CREATE TABLE IF NOT EXISTS `role_group_data` (
  `role_data_id_group` varchar(50) NOT NULL,
  `role_data_menu` varchar(255) NOT NULL,
  `role_data_method` varchar(255) NOT NULL,
  `role_data_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=All, 2=base On ID'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_group_data`
--

INSERT INTO `role_group_data` (`role_data_id_group`, `role_data_menu`, `role_data_method`, `role_data_status`) VALUES
('46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1),
('46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '3', 'auditormgmt', 1),
('46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '4', 'auditeemgmt', 1),
('54761cd47bcf8aa444992be09a15151d2e070260', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('54761cd47bcf8aa444992be09a15151d2e070260', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1),
('54761cd47bcf8aa444992be09a15151d2e070260', '3', 'auditormgmt', 1),
('54761cd47bcf8aa444992be09a15151d2e070260', '4', 'auditeemgmt', 1),
('1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1),
('1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '3', 'auditormgmt', 1),
('1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '4', 'auditeemgmt', 1),
('25a0bc88a8aca130913d7b35facf9e3505bf12af', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('25a0bc88a8aca130913d7b35facf9e3505bf12af', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 2),
('25a0bc88a8aca130913d7b35facf9e3505bf12af', '3', 'auditormgmt', 1),
('25a0bc88a8aca130913d7b35facf9e3505bf12af', '4', 'auditeemgmt', 1),
('4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '3', 'auditormgmt', 1),
('4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1),
('4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('3c4b7c1ac41e48962a837470d96af3ca244113ba', '3', 'auditormgmt', 1),
('3c4b7c1ac41e48962a837470d96af3ca244113ba', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 2),
('3c4b7c1ac41e48962a837470d96af3ca244113ba', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '3', 'auditormgmt', 1),
('24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 2),
('24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('c64ab15f3c09ce0faf0e07ac527be323ce985814', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('c64ab15f3c09ce0faf0e07ac527be323ce985814', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1),
('c64ab15f3c09ce0faf0e07ac527be323ce985814', '3', 'auditormgmt', 1),
('c64ab15f3c09ce0faf0e07ac527be323ce985814', '4', 'auditeemgmt', 1),
('98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 2),
('98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '3', 'auditormgmt', 1),
('98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '4', 'auditeemgmt', 1),
('a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '1', 'risk_penetapantujuan;risk_reviu;risk_fil_report', 1),
('a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '4', 'auditeemgmt', 1),
('3c4b7c1ac41e48962a837470d96af3ca244113ba', '4', 'auditeemgmt', 1),
('4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '4', 'auditeemgmt', 1),
('24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '4', 'auditeemgmt', 1),
('a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '3', 'auditormgmt', 1),
('a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '2', 'risk_result;auditplan;auditassign;followupassign;reportaudit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_group_menu`
--

CREATE TABLE IF NOT EXISTS `role_group_menu` (
  `role_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_menu_group_id` varchar(50) NOT NULL,
  `role_menu_menu_id` varchar(50) NOT NULL,
  PRIMARY KEY (`role_menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1026 ;

--
-- Dumping data for table `role_group_menu`
--

INSERT INTO `role_group_menu` (`role_menu_id`, `role_menu_group_id`, `role_menu_menu_id`) VALUES
(1, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '2'),
(2, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '3'),
(3, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '4'),
(4, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '5'),
(5, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '6'),
(6, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '7'),
(7, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '8'),
(8, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '9'),
(9, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '11'),
(10, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '14'),
(11, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '15'),
(12, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '16'),
(13, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '17'),
(14, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '18'),
(15, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '19'),
(16, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '20'),
(17, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '21'),
(18, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '22'),
(19, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '26'),
(20, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '28'),
(21, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '29'),
(22, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '38'),
(23, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '39'),
(24, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '43'),
(25, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '41'),
(26, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '42'),
(27, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '44'),
(28, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '45'),
(29, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '46'),
(30, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '47'),
(31, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '48'),
(32, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '49'),
(33, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '50'),
(34, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '51'),
(35, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '52'),
(36, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '53'),
(37, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '54'),
(38, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '55'),
(39, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '56'),
(40, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '57'),
(41, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '58'),
(42, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '59'),
(43, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '60'),
(44, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '61'),
(45, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '62'),
(46, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '63'),
(47, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '64'),
(48, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '65'),
(49, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '71'),
(50, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '72'),
(51, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '73'),
(52, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '74'),
(53, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '75'),
(54, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '76'),
(55, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '77'),
(56, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '78'),
(57, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '79'),
(58, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '80'),
(59, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '81'),
(60, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '82'),
(61, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '83'),
(62, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '84'),
(63, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '85'),
(64, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '86'),
(65, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '87'),
(66, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '88'),
(67, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '94'),
(68, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '95'),
(69, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '96'),
(70, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '100'),
(71, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '101'),
(72, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '102'),
(73, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '103'),
(74, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '104'),
(75, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '105'),
(76, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '106'),
(77, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '109'),
(78, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '110'),
(79, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '111'),
(80, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '112'),
(81, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '113'),
(82, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '114'),
(83, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '115'),
(84, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '107'),
(85, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '108'),
(86, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '121'),
(87, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '120'),
(88, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '119'),
(89, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '118'),
(90, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '117'),
(91, '46e8d25b481a17e5fe2ac046b4c734fd27d3491b', '116'),
(92, '54761cd47bcf8aa444992be09a15151d2e070260', '2'),
(93, '54761cd47bcf8aa444992be09a15151d2e070260', '3'),
(94, '54761cd47bcf8aa444992be09a15151d2e070260', '4'),
(95, '54761cd47bcf8aa444992be09a15151d2e070260', '5'),
(96, '54761cd47bcf8aa444992be09a15151d2e070260', '14'),
(97, '54761cd47bcf8aa444992be09a15151d2e070260', '15'),
(98, '54761cd47bcf8aa444992be09a15151d2e070260', '17'),
(99, '54761cd47bcf8aa444992be09a15151d2e070260', '18'),
(100, '54761cd47bcf8aa444992be09a15151d2e070260', '19'),
(101, '54761cd47bcf8aa444992be09a15151d2e070260', '21'),
(102, '54761cd47bcf8aa444992be09a15151d2e070260', '22'),
(103, '54761cd47bcf8aa444992be09a15151d2e070260', '28'),
(104, '54761cd47bcf8aa444992be09a15151d2e070260', '39'),
(105, '54761cd47bcf8aa444992be09a15151d2e070260', '43'),
(106, '54761cd47bcf8aa444992be09a15151d2e070260', '44'),
(107, '54761cd47bcf8aa444992be09a15151d2e070260', '45'),
(108, '54761cd47bcf8aa444992be09a15151d2e070260', '46'),
(109, '54761cd47bcf8aa444992be09a15151d2e070260', '47'),
(110, '54761cd47bcf8aa444992be09a15151d2e070260', '48'),
(111, '54761cd47bcf8aa444992be09a15151d2e070260', '49'),
(112, '54761cd47bcf8aa444992be09a15151d2e070260', '71'),
(113, '54761cd47bcf8aa444992be09a15151d2e070260', '72'),
(114, '54761cd47bcf8aa444992be09a15151d2e070260', '73'),
(115, '54761cd47bcf8aa444992be09a15151d2e070260', '74'),
(116, '54761cd47bcf8aa444992be09a15151d2e070260', '75'),
(117, '54761cd47bcf8aa444992be09a15151d2e070260', '76'),
(118, '54761cd47bcf8aa444992be09a15151d2e070260', '80'),
(119, '54761cd47bcf8aa444992be09a15151d2e070260', '81'),
(120, '54761cd47bcf8aa444992be09a15151d2e070260', '82'),
(121, '54761cd47bcf8aa444992be09a15151d2e070260', '83'),
(122, '54761cd47bcf8aa444992be09a15151d2e070260', '84'),
(123, '54761cd47bcf8aa444992be09a15151d2e070260', '85'),
(124, '54761cd47bcf8aa444992be09a15151d2e070260', '86'),
(125, '54761cd47bcf8aa444992be09a15151d2e070260', '87'),
(126, '54761cd47bcf8aa444992be09a15151d2e070260', '88'),
(127, '54761cd47bcf8aa444992be09a15151d2e070260', '96'),
(128, '54761cd47bcf8aa444992be09a15151d2e070260', '100'),
(129, '54761cd47bcf8aa444992be09a15151d2e070260', '101'),
(130, '54761cd47bcf8aa444992be09a15151d2e070260', '102'),
(131, '54761cd47bcf8aa444992be09a15151d2e070260', '119'),
(132, '54761cd47bcf8aa444992be09a15151d2e070260', '118'),
(133, '54761cd47bcf8aa444992be09a15151d2e070260', '117'),
(134, '54761cd47bcf8aa444992be09a15151d2e070260', '116'),
(135, '1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '2'),
(136, '1b188e0bb4d2c1d18203fdaedd54e75e411203e0', '28'),
(137, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '2'),
(138, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '29'),
(139, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '77'),
(140, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '78'),
(141, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '79'),
(142, '25a0bc88a8aca130913d7b35facf9e3505bf12af', '103'),
(435, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '62'),
(434, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '58'),
(433, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '54'),
(432, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '50'),
(431, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '42'),
(430, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '29'),
(429, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '28'),
(428, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '22'),
(427, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '21'),
(426, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '19'),
(425, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '18'),
(424, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '14'),
(423, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '5'),
(422, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '4'),
(421, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '3'),
(420, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '2'),
(416, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '104'),
(415, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '101'),
(414, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '100'),
(413, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '96'),
(412, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '87'),
(411, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '86'),
(410, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '83'),
(409, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '65'),
(408, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '64'),
(407, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '63'),
(406, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '62'),
(405, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '61'),
(404, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '60'),
(403, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '59'),
(402, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '58'),
(401, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '57'),
(400, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '56'),
(399, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '55'),
(398, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '54'),
(397, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '53'),
(396, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '52'),
(395, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '51'),
(394, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '50'),
(393, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '49'),
(392, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '41'),
(391, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '29'),
(390, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '28'),
(389, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '22'),
(388, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '21'),
(387, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '19'),
(386, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '18'),
(385, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '17'),
(384, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '15'),
(383, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '14'),
(382, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '5'),
(381, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '4'),
(380, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '3'),
(379, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '2'),
(468, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '106'),
(467, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '104'),
(466, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '96'),
(465, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '65'),
(464, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '64'),
(463, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '63'),
(462, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '62'),
(461, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '61'),
(460, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '60'),
(459, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '59'),
(458, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '58'),
(457, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '57'),
(456, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '56'),
(455, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '55'),
(454, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '54'),
(453, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '53'),
(452, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '52'),
(451, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '51'),
(450, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '50'),
(449, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '42'),
(448, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '29'),
(447, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '28'),
(446, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '22'),
(445, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '21'),
(444, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '19'),
(443, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '18'),
(442, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '14'),
(441, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '5'),
(440, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '4'),
(439, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '3'),
(438, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '2'),
(232, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '2'),
(233, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '3'),
(234, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '4'),
(235, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '5'),
(236, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '14'),
(237, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '18'),
(238, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '19'),
(239, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '21'),
(240, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '22'),
(241, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '28'),
(242, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '29'),
(243, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '42'),
(244, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '50'),
(245, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '54'),
(246, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '58'),
(247, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '62'),
(248, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '86'),
(249, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '96'),
(250, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '104'),
(251, 'c64ab15f3c09ce0faf0e07ac527be323ce985814', '106'),
(252, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '2'),
(253, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '3'),
(254, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '4'),
(255, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '5'),
(256, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '14'),
(257, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '18'),
(258, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '19'),
(259, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '21'),
(260, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '22'),
(261, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '28'),
(262, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '29'),
(263, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '50'),
(264, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '51'),
(265, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '52'),
(266, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '53'),
(267, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '54'),
(268, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '55'),
(269, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '56'),
(270, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '57'),
(271, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '58'),
(272, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '59'),
(273, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '60'),
(274, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '61'),
(275, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '62'),
(276, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '63'),
(277, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '64'),
(278, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '65'),
(279, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '77'),
(280, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '78'),
(281, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '79'),
(282, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '86'),
(283, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '87'),
(284, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '96'),
(285, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '100'),
(286, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '101'),
(287, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '103'),
(288, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '104'),
(289, '98ab4eb2262a169acc9716882a6cac9d0a07e6f3', '116'),
(1024, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '124'),
(1023, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '116'),
(1020, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '119'),
(1021, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '118'),
(1022, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '117'),
(1017, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '106'),
(1018, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '121'),
(1019, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '120'),
(1014, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '103'),
(1015, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '104'),
(1016, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '105'),
(1011, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '100'),
(1012, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '101'),
(1013, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '102'),
(1008, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '97'),
(1009, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '98'),
(1010, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '99'),
(1007, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '96'),
(1006, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '95'),
(1005, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '94'),
(1004, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '93'),
(1003, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '92'),
(1002, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '91'),
(1001, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '90'),
(1000, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '89'),
(999, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '88'),
(998, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '87'),
(997, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '86'),
(996, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '85'),
(995, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '84'),
(994, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '83'),
(993, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '82'),
(992, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '81'),
(991, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '80'),
(990, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '79'),
(989, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '78'),
(988, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '77'),
(987, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '76'),
(986, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '75'),
(985, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '74'),
(984, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '73'),
(983, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '72'),
(982, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '71'),
(981, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '65'),
(980, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '64'),
(979, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '63'),
(978, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '62'),
(977, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '61'),
(976, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '60'),
(975, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '59'),
(974, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '58'),
(973, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '57'),
(972, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '56'),
(971, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '55'),
(970, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '54'),
(969, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '53'),
(968, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '52'),
(967, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '51'),
(966, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '50'),
(965, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '49'),
(964, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '48'),
(963, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '47'),
(962, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '46'),
(961, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '45'),
(960, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '44'),
(959, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '42'),
(958, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '41'),
(957, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '43'),
(956, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '39'),
(955, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '37'),
(954, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '36'),
(953, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '35'),
(952, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '33'),
(951, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '32'),
(950, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '31'),
(949, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '29'),
(948, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '28'),
(417, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '105'),
(418, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '120'),
(419, '3c4b7c1ac41e48962a837470d96af3ca244113ba', '116'),
(436, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '96'),
(437, '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0', '106'),
(469, '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d', '116'),
(947, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '25'),
(946, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '23'),
(945, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '22'),
(944, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '21'),
(943, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '20'),
(942, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '19'),
(941, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '18'),
(940, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '17'),
(939, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '16'),
(938, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '15'),
(937, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '14'),
(936, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '30'),
(935, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '11'),
(934, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '9'),
(933, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '8'),
(932, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '7'),
(931, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '6'),
(930, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '5'),
(929, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '4'),
(928, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '3'),
(927, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '2'),
(926, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '1'),
(1025, 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', '125');

-- --------------------------------------------------------

--
-- Table structure for table `tindaklanjut_internal`
--

CREATE TABLE IF NOT EXISTS `tindaklanjut_internal` (
  `tl_id` varchar(50) NOT NULL,
  `tl_rek_id` varchar(50) NOT NULL,
  `tl_desc` longblob NOT NULL,
  `tl_date` int(11) NOT NULL,
  `tl_update_date` int(11) NOT NULL,
  `tl_attachment` varchar(100) NOT NULL,
  `tl_status` tinyint(1) NOT NULL COMMENT '0=default, 1=ajukan, 2=setujui, 3=tolak',
  PRIMARY KEY (`tl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindaklanjut_internal`
--

INSERT INTO `tindaklanjut_internal` (`tl_id`, `tl_rek_id`, `tl_desc`, `tl_date`, `tl_update_date`, `tl_attachment`, `tl_status`) VALUES
('86908321a0f5023a1249f30da9cbaee26e0d0af2', 'd86c0a8a04a91f178e1c346cbb5bfc510397b515', 0x3c703e4578616d706c652074696e64616b206c616e6a75743c2f703e, 1522965600, 0, '', 2),
('9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7', '99d9f1ef609c26fb20db2b54556f40e9f197fd7a', 0x3c703e746168616e3c2f703e, 1523829600, 0, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tindaklanjut_internal_comment`
--

CREATE TABLE IF NOT EXISTS `tindaklanjut_internal_comment` (
  `tl_comment_id` varchar(50) NOT NULL,
  `tl_comment_tl_id` varchar(50) NOT NULL,
  `tl_comment_desc` varchar(255) NOT NULL,
  `tl_comment_user_id` varchar(50) NOT NULL,
  `tl_comment_date` int(11) NOT NULL,
  PRIMARY KEY (`tl_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindaklanjut_internal_comment`
--

INSERT INTO `tindaklanjut_internal_comment` (`tl_comment_id`, `tl_comment_tl_id`, `tl_comment_desc`, `tl_comment_user_id`, `tl_comment_date`) VALUES
('464c7e4ddc9c8907a1992b1d71d24d9f8b0b5c57', '86908321a0f5023a1249f30da9cbaee26e0d0af2', 'test', '9b44ac8966798da6f357fc1689342e187013cd51', 1523002657),
('202f574f54db25d5f6e121fecba9ae5d81acfa3d', '9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7', 'sadsdsads', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886641),
('32f35e6b1835610b669eaa27afcca38ce2d434fa', '9d0d3e29c4f3b758cbe4c751c6a76a66c9d15ef7', 'sadasd', '9b44ac8966798da6f357fc1689342e187013cd51', 1523886659);

-- --------------------------------------------------------

--
-- Table structure for table `tindak_lanjut_attachment`
--

CREATE TABLE IF NOT EXISTS `tindak_lanjut_attachment` (
  `tl_attach_id` varchar(50) DEFAULT NULL,
  `tl_attach_tl_id` varchar(50) DEFAULT NULL,
  `tl_attach_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_apps`
--

CREATE TABLE IF NOT EXISTS `user_apps` (
  `user_id` varchar(50) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_id_group` varchar(50) NOT NULL,
  `user_login_as` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=internal, 2=eksternal',
  `user_id_internal` varchar(50) NOT NULL DEFAULT '0',
  `user_id_ekternal` varchar(50) NOT NULL DEFAULT '0',
  `user_status` int(1) NOT NULL DEFAULT '0' COMMENT '0=del, 1=active, 2=inactive',
  `user_create_by` varchar(50) NOT NULL,
  `user_create_date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `fk_user_id_group` (`user_id_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_apps`
--

INSERT INTO `user_apps` (`user_id`, `user_username`, `user_password`, `user_id_group`, `user_login_as`, `user_id_internal`, `user_id_ekternal`, `user_status`, `user_create_by`, `user_create_date`) VALUES
('9b44ac8966798da6f357fc1689342e187013cd51', 'gugus', '0fda8ae0b682261b56c35cbd2ab751a3', 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', 1, '4312c39a78eb37d514c2ceccc3b18ce3c4f70ec1', '0', 1, '23d87af87ec2fc29f5a4de3fed576e2ec9c4ffb7', 1498022270),
('3c7d52115accc93808ea7c0de0efe86d3e445d84', 'angga02', '7f10aa4552fd4764955f545f04d46b28', 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66', 2, '0', '', 0, '23d87af87ec2fc29f5a4de3fed576e2ec9c4ffb7', 1498022293);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
