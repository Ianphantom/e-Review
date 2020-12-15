-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2020 at 07:16 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ereview`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `id_assignment` int(11) NOT NULL AUTO_INCREMENT,
  `id_task` int(11) NOT NULL,
  `id_reviewer` int(11) NOT NULL,
  `tgl_deadline` varchar(215) NOT NULL,
  `halaman` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `sts_assignment` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_assignment`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id_assignment`, `id_task`, `id_reviewer`, `tgl_deadline`, `halaman`, `status`, `data_created`, `data_updated`, `sts_assignment`) VALUES
(1, 1, 1, '2020-05-16', 100, 7, '2020-05-18 11:46:53', '2020-05-18 11:46:53', 1),
(2, 2, 1, '2020-05-16', 100, 0, '2020-05-18 12:34:16', '2020-05-18 12:34:16', 1),
(3, 3, 2, '2020-05-16', 54, 0, '2020-05-19 01:26:01', '2020-05-19 01:26:01', 1),
(4, 3, 1, '2020-05-16', 54, 4, '2020-05-19 01:26:35', '2020-05-19 01:26:35', 1),
(5, 4, 1, '2020-05-16', 54, 7, '2020-05-19 01:45:02', '2020-05-19 01:45:02', 1),
(6, 4, 2, '2020-05-16', 54, 0, '2020-05-19 01:45:29', '2020-05-19 01:45:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id_editor` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` tinyint(4) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  `sts_editor` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_editor`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id_editor`, `id_user`, `data_created`, `data_updated`, `sts_editor`) VALUES
(1, 2, '2020-05-17 05:21:01', '2020-05-17 05:21:01', 1),
(2, 4, '2020-05-18 11:40:48', '2020-05-18 11:40:48', 1),
(3, 6, '2020-05-19 01:24:33', '2020-05-19 01:24:33', 1),
(4, 7, '2020-05-19 01:43:23', '2020-05-19 01:43:23', 1),
(5, 8, '2020-05-19 03:05:55', '2020-05-19 03:05:55', 1),
(6, 9, '2020-05-19 03:18:00', '2020-05-19 03:18:00', 1),
(7, 10, '2020-05-19 03:43:33', '2020-05-19 03:43:33', 1),
(8, 11, '2020-06-01 07:42:16', '2020-06-01 07:42:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

DROP TABLE IF EXISTS `grup`;
CREATE TABLE IF NOT EXISTS `grup` (
  `id_grup` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(126) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  `sts_grup` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id_grup`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`, `data_created`, `data_updated`, `sts_grup`) VALUES
(1, 'editor', '2020-04-10 15:00:57', NULL, 1),
(2, 'reviewer', '2020-04-10 15:00:57', NULL, 1),
(3, 'makelar', '2020-04-10 15:01:12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `makelar`
--

DROP TABLE IF EXISTS `makelar`;
CREATE TABLE IF NOT EXISTS `makelar` (
  `id_makelar` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sts_makelar` tinyint(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_makelar`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `makelar`
--

INSERT INTO `makelar` (`id_makelar`, `id_user`, `data_created`, `data_updated`, `sts_makelar`) VALUES
(1, 4, '2020-05-16 11:23:33', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `id_grup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  `sts_member` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `id_grup`, `id_user`, `data_created`, `data_updated`, `sts_member`) VALUES
(1, 3, 1, '2020-05-16 11:43:13', NULL, 1),
(2, 1, 2, '2020-05-17 05:21:01', '2020-05-17 05:21:01', 1),
(3, 2, 3, '2020-05-17 06:04:59', '2020-05-17 06:04:59', 1),
(4, 1, 4, '2020-05-18 11:40:48', '2020-05-18 11:40:48', 1),
(5, 2, 5, '2020-05-18 12:14:22', '2020-05-18 12:14:22', 1),
(6, 1, 6, '2020-05-19 01:24:33', '2020-05-19 01:24:33', 1),
(7, 1, 7, '2020-05-19 01:43:23', '2020-05-19 01:43:23', 1),
(8, 1, 8, '2020-05-19 03:05:55', '2020-05-19 03:05:55', 1),
(9, 2, 9, '2020-05-19 03:38:47', '2020-05-19 03:18:00', 1),
(10, 2, 9, '2020-05-19 03:18:00', '2020-05-19 03:18:00', 1),
(11, 1, 10, '2020-05-19 05:36:17', '2020-05-19 03:43:33', 1),
(12, 2, 10, '2020-05-19 03:43:33', '2020-05-19 03:43:33', 1),
(13, 1, 11, '2020-06-01 07:42:16', '2020-06-01 07:42:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL,
  `id_task` int(11) NOT NULL,
  `kurs` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `sts_payment` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_payment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_reviewer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kurs` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `bukti_loc` varchar(500) NOT NULL,
  `statusPembayaran` tinyint(4) DEFAULT 0,
  `id_assignment` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  `sts_pembayaran` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_reviewer`, `id_user`, `kurs`, `amount`, `bukti_loc`, `statusPembayaran`, `id_assignment`, `data_created`, `data_updated`, `sts_pembayaran`) VALUES
(1, 0, 7, 'Rupiah', 4320000, '1589853005_Pembayaran.jpg', 1, 5, '2020-05-19 01:50:05', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

DROP TABLE IF EXISTS `penarikan`;
CREATE TABLE IF NOT EXISTS `penarikan` (
  `id_penarikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jumlah` int(128) NOT NULL,
  `pno_rek` int(11) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `sts_penarikan` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_penarikan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_user`, `jumlah`, `pno_rek`, `data_created`, `sts_penarikan`) VALUES
(1, 3, 1000000, 2147483647, '2020-05-19 01:52:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_assignment` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `authors` text DEFAULT NULL,
  `katakunci` text DEFAULT NULL,
  `rfilelocation` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sts_review` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_review`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_assignment`, `judul`, `authors`, `katakunci`, `rfilelocation`, `id_user`, `date_created`, `date_updated`, `sts_review`) VALUES
(1, 1, 'Pemecahan Masalah Sampah', 'Calvin', 'Lingkungan', '1589802563_ETS AGAMA.docx', 3, '2020-05-18 11:49:23', '0000-00-00 00:00:00', 1),
(2, 4, 'Komplikasi Gagal Jantung', 'Daniel S', 'Kedokteran', '1589851694_Tugas Agama.docx', 3, '2020-05-19 01:28:14', '0000-00-00 00:00:00', 1),
(3, 5, 'Keamanan Siber', 'Harry Potter', 'CTF', '1589852861_Soal Evaluasi Tengah semester 2019.docx', 3, '2020-05-19 01:47:41', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

DROP TABLE IF EXISTS `reviewer`;
CREATE TABLE IF NOT EXISTS `reviewer` (
  `id_reviewer` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `no_rek` varchar(20) DEFAULT 'Belum Diisi',
  `data_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  `sts_reviewer` int(11) NOT NULL,
  `kompetensi` text NOT NULL DEFAULT 'Belum Diisi',
  `biaya` text DEFAULT NULL,
  PRIMARY KEY (`id_reviewer`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id_reviewer`, `id_user`, `no_rek`, `data_created`, `data_updated`, `sts_reviewer`, `kompetensi`, `biaya`) VALUES
(1, 3, '05311940000008', '2020-05-17 06:04:59', '2020-05-17 06:04:59', 0, 'Cyber Security, Etchical Hacking and Malware Analysis', '80000'),
(2, 5, '053119400000109', '2020-05-18 12:14:22', '2020-05-18 12:14:22', 0, 'Malware Analysis, Bug Bounty, Pentesting', '90000'),
(3, 9, 'Belum Diisi', '2020-05-19 03:18:00', '2020-05-19 03:18:00', 0, 'Belum Diisi', NULL),
(4, 10, '0053119400012', '2020-05-19 03:43:33', '2020-05-19 03:43:33', 0, 'Medical and Hospital', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `authors` varchar(300) DEFAULT NULL,
  `katakunci` varchar(300) DEFAULT NULL,
  `halaman` int(255) NOT NULL,
  `filelocation` varchar(300) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL,
  `sts_task` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_task`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `judul`, `authors`, `katakunci`, `halaman`, `filelocation`, `id_user`, `date_created`, `date_updated`, `sts_task`) VALUES
(1, 'Pemecahan Masalah Sampah', 'Calvin', 'Lingkungan', 100, '1589802350_05311940000008_Ian Felix Jonathan_ Kelas Agama 3_Tugas2.docx', 4, '2020-05-18 11:45:50', NULL, 1),
(2, 'Keamanan Siber', 'Ian Felix Jonathan S', 'cyber', 100, '1589805180_ETS AGAMA.docx', 2, '2020-05-18 12:33:00', NULL, 1),
(3, 'Komplikasi Gagal Jantung', 'Daniel S', 'Kedokteran', 54, '1589851529_ETS AGAMA.docx', 6, '2020-05-19 01:25:29', NULL, 1),
(4, 'Keamanan Siber', 'Harry Potter', 'CTF', 54, '1589852664_ETS AGAMA.docx', 7, '2020-05-19 01:44:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `nama` varchar(126) NOT NULL,
  `email` varchar(256) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_update` timestamp NULL DEFAULT NULL,
  `sts_user` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `pwd`, `nama`, `email`, `photo`, `data_created`, `data_update`, `sts_user`) VALUES
(1, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(2, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(3, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(4, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(5, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(11, 'Ian', 'Ayam', 'Nia Maylani', 'ian25yola@gmail.com', '1590997815IMG-20190426-WA0138.jpg', '2020-06-01 07:50:15', NULL, 1),
(6, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(7, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', '1590997131Capture.PNG', '2020-06-01 07:38:51', NULL, 1),
(8, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(9, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1),
(10, 'Potter', 'potter', 'Harry', 'ian25yola@gmail.com', 'Array', '2020-06-01 07:30:10', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
