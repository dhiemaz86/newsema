-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 02:15 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `semabaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(2) NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `password`) VALUES
(1, 'admin', 'rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(2) DEFAULT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `tgl_agenda` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `isi_berita` text,
  `tgl_input` date DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul_berita`, `tgl_agenda`, `tgl_akhir`, `isi_berita`, `tgl_input`, `gambar`) VALUES

(0, '2', 'contoh', '2017-04-10', '2017-04-12', 'Bismillahirohmanirohhim', '2017-02-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_lpj`
--

CREATE TABLE IF NOT EXISTS `data_lpj` (
  `id_data_lpj` int(5) NOT NULL,
  `id_orma` int(2) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `lpj` varchar(150) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lpj`
--

INSERT INTO `data_lpj` (`id_data_lpj`, `id_orma`, `no_surat`, `judul`, `lpj`, `deskripsi`, `tgl_input`) VALUES
(0, '3', '004/Fossil/A/2017', 'Pengjuan dana', 'lpj.doc', 'lpj untuk mengjukan dana keperluan orma', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_proposal`
--

CREATE TABLE IF NOT EXISTS `data_proposal` (
  `id_data_proposal` int(5) NOT NULL,
  `id_orma` int(2) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `proposal` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_proposal`
--

INSERT INTO `data_proposal` (`id_data_proposal`, `id_orma`, `no_surat`, `judul`, `proposal`, `deskripsi`, `tgl_input`) VALUES
(0, '3', '004/Fossil/A/2017', 'Pengjuan dana', 'proposal.doc', 'lpj untuk mengjukan dana keperluan orma', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Berita'),
(2, 'Agenda'),
(3, 'PBO'),
(4, 'Advokasi'),
(5, 'Aspirasi');

-- --------------------------------------------------------

--
-- Table structure for table `keadministrasian`
--

CREATE TABLE IF NOT EXISTS `keadministrasian` (
  `id_keadministrasian` int(5) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `upload` varchar(150) DEFAULT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keadministrasian`
--

INSERT INTO `keadministrasian` (`id_keadministrasian`, `judul`, `upload`, `deskripsi`, `tgl_input`) VALUES
(0, 'Pengjuan dana', 'lpj.doc', 'lpj untuk mengjukan dana keperluan orma', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `id_keuangan` int(2) NOT NULL,
  `id_orma` int(2) NOT NULL,
  `dana` varchar(30) NOT NULL,
  `pengeluaran` varchar(30) NOT NULL,
  `sisa` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_orma`, `dana`,`pengeluaran`, `sisa`) VALUES
(0, 2, '15.000.000','3.000.000', '12.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_lpj`
--

CREATE TABLE IF NOT EXISTS `kirim_lpj` (
  `id_lpj` int(5) NOT NULL,
  `id_orma` int(2) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `lpj` varchar(150) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim_lpj`
--

INSERT INTO `kirim_lpj` (`id_lpj`, `id_orma`, `no_surat`, `judul`, `lpj`, `deskripsi`, `tgl_input`, `status`) VALUES
(0, '3', '004/Fossil/A/2017', 'Pengjuan dana', 'lpj.doc', 'lpj untuk mengjukan dana keperluan orma', '0000-00-00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kirim_proposal`
--

CREATE TABLE IF NOT EXISTS `kirim_proposal` (
  `id_proposal` int(5) NOT NULL,
  `id_orma` int(2) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `proposal` varchar(150) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim_proposal`
--

INSERT INTO `kirim_proposal` (`id_proposal`, `id_orma`, `no_surat`, `judul`, `proposal`, `deskripsi`, `tgl_input`, `status`) VALUES
(0, 16, '003/Fossil/A/2017', 'Pengjuan dana', 'proposal.doc', 'proposal untuk mengjukan dana keperluan orma', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL,
  `kontak` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `nim`, `jabatan`, `kontak`) VALUES
('0', 'Dimas Dwi Nugroho', '14.11.7857', 'ketua', '085868037457');

-- --------------------------------------------------------

--
-- Table structure for table `orma`
--

CREATE TABLE IF NOT EXISTS `orma` (
  `id_orma` int(2) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orma`
--

INSERT INTO `orma` (`id_orma`, `user`, `password`) VALUES
(0, 'admin', 'admin'),
(1, 'senat', 'admin'),
(2, 'bem', 'admin'),
(3, 'hmjti', 'admin'),
(4, 'himssi', 'admin'),
(5, 'mayapala', 'admin'),
(6, 'manggar', 'admin'),
(7, 'lpmjournal', 'admin'),
(8, 'ukijasthis', 'admin'),
(9, 'ikna', 'admin'),
(10, 'amcc', 'admin'),
(11, 'koma', 'admin'),
(12, 'aec', 'admin'),
(13, 'amo', 'admin'),
(14, 'taekwondo', 'admin'),
(15, 'kempo', 'admin'),
(16, 'fossil', 'admin'),
(17, 'onegai', 'admin'),
(18, 'kmhd', 'admin'),
(19, 'psht', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(2) NOT NULL,
  `orma` int(2) NOT NULL,
  `nama_orma` varchar(30) NOT NULL,
  `ketua` varchar(30) NOT NULL,
  `kesekretariatan` varchar(150) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `deskripsi` varchar(350) NOT NULL,
  `logo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `orma`, `nama_orma`, `ketua`, `kesekretariatan`, `kontak`, `deskripsi`, `logo`) VALUES
('1', '1', 'SENAT', 'Bimo', 'BSC Lantai 1', '0812312312', 'Senat Mahasiswa', ''),
('2', '2', 'BEM', 'Taufik', 'BSC Lantai 1', '0812345623', 'Badan Eksekutif Mahasiswa', 'bem.png'),
('3', '3', '', '', '', '', '', ''),
('4', '4', '', '', '', '', '', ''),
('5', '5', '', '', '', '', '', ''),
('6', '6', '', '', '', '', '', ''),
('7', '7', '', '', '', '', '', ''),
('8', '8', '', '', '', '', '', ''),
('9', '9', '', '', '', '', '', ''),
('10', '10', '', '', '', '', '', ''),
('11', '11', '', '', '', '', '', ''),
('12', '12', '', '', '', '', '', ''),
('13', '13', '', '', '', '', '', ''),
('14', '14', '', '', '', '', '', ''),
('15', '15', '', '', '', '', '', ''),
('16', '16', 'FOSSIL', 'Hanif', 'BSC Lantai 3', '0812312312', 'Free Open Source Software Interest League', ''),
('17', '17', '', '', '', '', '', ''),
('18', '18', '', '', '', '', '', ''),
('19', '19', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(0, 'Un Read'),
(2, 'Revisi'),
(3, 'Benar');

--
-- Indexes for dumped tables
--
ALTER TABLE `berita` MODIFY COLUMN `id_berita` INT NOT NULL AUTO_INCREMENT KEY;

--
-- Indexes for table `data_lpj`
--
ALTER TABLE `data_lpj`
 ADD KEY `orma` (`id_orma`);
ALTER TABLE `data_lpj` MODIFY COLUMN `id_data_lpj` INT NOT NULL AUTO_INCREMENT KEY;

--
-- Indexes for table `data_proposal`
--
ALTER TABLE `data_proposal`
 ADD KEY `orma` (`id_orma`);
ALTER TABLE `data_proposal` MODIFY COLUMN `id_data_proposal` INT NOT NULL AUTO_INCREMENT KEY;

--
-- Indexes for table `keadministrasian`
--
ALTER TABLE `keadministrasian`
 ADD PRIMARY KEY (`id_keadministrasian`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
 ADD KEY `orma` (`id_orma`);

--
-- Indexes for table `kirim_lpj`
--
ALTER TABLE `kirim_lpj`
 ADD KEY `orma` (`id_orma`);
ALTER TABLE `kirim_lpj` MODIFY COLUMN `id_lpj` INT NOT NULL AUTO_INCREMENT KEY;

--
-- Indexes for table `kirim_proposal`
--
ALTER TABLE `kirim_proposal`
 ADD KEY `orma` (`id_orma`);
ALTER TABLE `kirim_proposal` MODIFY COLUMN `id_proposal` INT NOT NULL AUTO_INCREMENT KEY;

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
 ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `orma`
--
ALTER TABLE `orma`
 ADD PRIMARY KEY (`id_orma`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id_profil`), ADD KEY `orma` (`orma`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id_status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
