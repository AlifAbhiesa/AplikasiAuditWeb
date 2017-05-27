-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 09:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `audit`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_nilai`(IN `id_mas` VARCHAR(20), IN `ni` DOUBLE, IN `bobot` DOUBLE)
BEGIN
insert into tbl_nilai_audit(id_master,nilai,bobot_nilai) values(id_mas,ni,bobot);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_nilai_jdw`(IN `jdw` VARCHAR(20))
BEGIN
select sum(bobot_nilai) as jml from tbl_nilai_audit LEFT JOIN tbl_master_audit ON tbl_master_audit.id_master = tbl_nilai_audit.id_master where tbl_master_audit.id_jadwal = jdw;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_nilai`(IN `nil` DOUBLE, IN `bbt` DOUBLE, IN `id_mas` VARCHAR(20))
BEGIN
update tbl_nilai_audit set nilai = nil, bobot_nilai = bbt where id_master = id_mas;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0395f97f0d88c272480067e6118e358e', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 1495604901, 'a:6:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"1";s:5:"admin";s:1:"1";s:4:"nama";s:5:"admin";s:7:"id_jrsn";s:1:"5";s:9:"id_jadwal";s:15:"jdw-gd-2017-001";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit`
--

CREATE TABLE IF NOT EXISTS `tbl_audit` (
  `id_master_audit` varchar(20) NOT NULL,
  `target_genap` int(11) DEFAULT NULL,
  `pelaksanaan_kegiatan` varchar(200) DEFAULT NULL,
  `permasalahan` varchar(200) DEFAULT NULL,
  `rencana_kegiatan_audit` varchar(200) DEFAULT NULL,
  UNIQUE KEY `id_master_audit` (`id_master_audit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_audit`
--

INSERT INTO `tbl_audit` (`id_master_audit`, `target_genap`, `pelaksanaan_kegiatan`, `permasalahan`, `rencana_kegiatan_audit`) VALUES
('MST-TL-2017-01-IA0I', 95, 'Akan dilasanakan', 'Masih banyak masalah', 'rencana berjalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auditor`
--

CREATE TABLE IF NOT EXISTS `tbl_auditor` (
  `id_auditor` int(11) NOT NULL AUTO_INCREMENT,
  `id_dsn` int(11) NOT NULL,
  `id_jadwal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_auditor`),
  KEY `FK_tbl_auditor_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_auditor_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_auditor`
--

INSERT INTO `tbl_auditor` (`id_auditor`, `id_dsn`, `id_jadwal`) VALUES
(3, 2, 'jdw-if-2017-001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng15`
--

CREATE TABLE IF NOT EXISTS `tbl_brng15` (
  `id_brng15` int(11) NOT NULL AUTO_INCREMENT,
  `id_dsn` int(11) NOT NULL,
  `hasil_kuesioner` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng15`),
  KEY `FK_tbl_brng15_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng15_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng17`
--

CREATE TABLE IF NOT EXISTS `tbl_brng17` (
  `id_brng17` int(4) NOT NULL AUTO_INCREMENT,
  `id_mtk` varchar(8) NOT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `rkpss` int(3) DEFAULT NULL,
  `kmbl_tgs_kuis` int(3) DEFAULT NULL,
  `sol_uts` int(3) DEFAULT NULL,
  `sol_uas` int(3) DEFAULT NULL,
  `kmbl_uts_uas` int(3) DEFAULT NULL,
  `msk_nil_uts` int(3) DEFAULT NULL,
  `msk_nil_uas` int(3) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng17`),
  KEY `id_mtk` (`id_mtk`),
  KEY `FK_tbl_brng17_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_brng17`
--

INSERT INTO `tbl_brng17` (`id_brng17`, `id_mtk`, `kelas`, `rkpss`, `kmbl_tgs_kuis`, `sol_uts`, `sol_uas`, `kmbl_uts_uas`, `msk_nil_uts`, `msk_nil_uas`, `id_jadwal`) VALUES
(1, 'IF-212', 'A', 1, 1, 1, 1, 1, 11, 1, 'jdw-if-2017-001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng18b`
--

CREATE TABLE IF NOT EXISTS `tbl_brng18b` (
  `id_brng18b` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `stts_kuliah` varchar(50) DEFAULT NULL,
  `reg_akhir` int(4) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng18b`),
  KEY `FK_tbl_brng18b_tbl_mhs` (`id_mhs`),
  KEY `FK_tbl_brng18b_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng20`
--

CREATE TABLE IF NOT EXISTS `tbl_brng20` (
  `id_brng20` int(11) NOT NULL AUTO_INCREMENT,
  `id_dsn` int(11) NOT NULL,
  `id_mtk` varchar(8) NOT NULL,
  `kelas` varchar(1) DEFAULT NULL,
  `jml_peserta` int(5) DEFAULT NULL,
  `ipk_kelas` double DEFAULT NULL,
  `ipk_mtk` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng20`),
  KEY `FK_tbl_brng20_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng20_tbl_jadwal` (`id_jadwal`),
  KEY `FK_tbl_brng20_tbl_mtk` (`id_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng21`
--

CREATE TABLE IF NOT EXISTS `tbl_brng21` (
  `id_brng21` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `sks_smester` int(2) DEFAULT NULL,
  `ips` double DEFAULT NULL,
  `sks_total` int(3) DEFAULT NULL,
  `ipk` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng21`),
  KEY `FK_tbl_brng21_tbl_mhs` (`id_mhs`),
  KEY `FK_tbl_brng21_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_brng21`
--

INSERT INTO `tbl_brng21` (`id_brng21`, `id_mhs`, `sks_smester`, `ips`, `sks_total`, `ipk`, `id_jadwal`) VALUES
(3, 3, 18, 2.9, 90, 3.1, 'jdw-di-2016-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng24`
--

CREATE TABLE IF NOT EXISTS `tbl_brng24` (
  `id_brng24` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `nrp_mhs` int(11) NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng24`),
  KEY `FK_tbl_brng24_tbl_kegiatan` (`id_kegiatan`),
  KEY `FK_tbl_brng24_tbl_mhs` (`nrp_mhs`),
  KEY `FK_tbl_brng24_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_brng24`
--

INSERT INTO `tbl_brng24` (`id_brng24`, `id_kegiatan`, `nrp_mhs`, `id_jadwal`) VALUES
(3, 2, 4, 'jdw-di-2016-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng25`
--

CREATE TABLE IF NOT EXISTS `tbl_brng25` (
  `id_brng25` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `status` enum('AKTIF','TIDAK AKTIF') DEFAULT NULL,
  `reg_akhir` year(4) DEFAULT NULL,
  `bts_studi` year(4) DEFAULT NULL,
  `id_dsn` int(11) NOT NULL,
  `stts_keluar` int(11) DEFAULT NULL,
  `mundur_pertama` int(11) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng25`),
  KEY `FK_tbl_brng25_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng25_tbl_mhs` (`id_mhs`),
  KEY `FK_tbl_brng25_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_brng25`
--

INSERT INTO `tbl_brng25` (`id_brng25`, `id_mhs`, `status`, `reg_akhir`, `bts_studi`, `id_dsn`, `stts_keluar`, `mundur_pertama`, `id_jadwal`) VALUES
(4, 3, 'AKTIF', 2015, 2019, 2, 0, 0, 'jdw-di-2016-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng30`
--

CREATE TABLE IF NOT EXISTS `tbl_brng30` (
  `id_brng30` int(11) NOT NULL AUTO_INCREMENT,
  `id_dsn` int(11) NOT NULL,
  `id_mtk` varchar(8) NOT NULL,
  `judul_buku` varchar(50) DEFAULT NULL,
  `bln_thn` varchar(10) DEFAULT NULL,
  `asli_terjemah` enum('ASLI','TERJEMAH') DEFAULT NULL,
  `tk_lokal` int(3) DEFAULT NULL,
  `tk_nasional` int(3) DEFAULT NULL,
  `tk_internasional` int(3) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng30`),
  KEY `FK_tbl_brng30_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng30_tbl_jadwal` (`id_jadwal`),
  KEY `FK_tbl_brng30_tbl_mtk` (`id_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng33`
--

CREATE TABLE IF NOT EXISTS `tbl_brng33` (
  `id_brng33` int(11) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `jenis_kegiatan` varchar(50) DEFAULT NULL,
  `awal_kerjasama` varchar(10) DEFAULT NULL,
  `akhir_kerjasama` varchar(10) DEFAULT NULL,
  `manfaat` varchar(100) DEFAULT NULL,
  `dalam_negri` enum('YA','TIDAK') DEFAULT NULL,
  `luar_negri` enum('YA','TIDAK') DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng33`),
  KEY `FK_tbl_brng33_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng34`
--

CREATE TABLE IF NOT EXISTS `tbl_brng34` (
  `id_brng34` int(11) NOT NULL AUTO_INCREMENT,
  `karya` varchar(50) DEFAULT NULL,
  `waktu_daftar` varchar(10) DEFAULT NULL,
  `waktu_dapat` varchar(10) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng34`),
  KEY `FK_tbl_brng34_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng35`
--

CREATE TABLE IF NOT EXISTS `tbl_brng35` (
  `id_brng35` int(11) NOT NULL AUTO_INCREMENT,
  `id_dsn` int(11) NOT NULL,
  `nama_org` varchar(30) DEFAULT NULL,
  `kurun_wkt` varchar(20) DEFAULT NULL,
  `tk_lokal` enum('YA','TIDAK') DEFAULT NULL,
  `tk_nasional` enum('YA','TIDAK') DEFAULT NULL,
  `tk_internasional` enum('YA','TIDAK') DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng35`),
  KEY `FK_tbl_brng35_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng35_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_brng35`
--

INSERT INTO `tbl_brng35` (`id_brng35`, `id_dsn`, `nama_org`, `kurun_wkt`, `tk_lokal`, `tk_nasional`, `tk_internasional`, `id_jadwal`) VALUES
(2, 2, 'Organisasi', '12', 'TIDAK', 'TIDAK', 'YA', 'jdw-di-2016-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng810`
--

CREATE TABLE IF NOT EXISTS `tbl_brng810` (
  `id_brng810` int(4) NOT NULL AUTO_INCREMENT,
  `id_mtk` varchar(8) NOT NULL,
  `awal` int(3) DEFAULT NULL,
  `tengah` int(3) DEFAULT NULL,
  `akhir` int(3) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng810`),
  KEY `FK_tbl_brng810_tbl_jadwal` (`id_jadwal`),
  KEY `FK_tbl_brng810_tbl_mtk` (`id_mtk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_brng810`
--

INSERT INTO `tbl_brng810` (`id_brng810`, `id_mtk`, `awal`, `tengah`, `akhir`, `id_jadwal`) VALUES
(5, 'DI-001', 1, 0, 2, 'jdw-di-2016-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng1113`
--

CREATE TABLE IF NOT EXISTS `tbl_brng1113` (
  `id_brng1113` int(5) NOT NULL AUTO_INCREMENT,
  `id_mtk` varchar(8) NOT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `hdr_dsn` int(4) DEFAULT NULL,
  `hdr_mhsw` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng1113`),
  KEY `FK_tbl_brng1113_tbl_mtk` (`id_mtk`),
  KEY `FK_tbl_brng1113_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng1214`
--

CREATE TABLE IF NOT EXISTS `tbl_brng1214` (
  `id_brng1214` int(5) NOT NULL AUTO_INCREMENT,
  `id_mtk` varchar(8) NOT NULL,
  `kelas` varchar(2) DEFAULT NULL,
  `hdr_asisten` int(3) DEFAULT NULL,
  `hdr_resp_mhsw` double DEFAULT NULL,
  `hit_tk1` int(3) DEFAULT NULL,
  `hit_tk234` int(3) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng1214`),
  KEY `FK_tbl_brng1214_tbl_jadwal` (`id_jadwal`),
  KEY `FK_tbl_brng1214_tbl_mtk` (`id_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng1719`
--

CREATE TABLE IF NOT EXISTS `tbl_brng1719` (
  `id_brng1719` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `ipk` double DEFAULT NULL,
  `lama_studi` double DEFAULT NULL,
  `lama_ta` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng1719`),
  KEY `FK_tbl_brng1719_tbl_mhs` (`id_mhs`),
  KEY `FK_tbl_brng1719_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng2223`
--

CREATE TABLE IF NOT EXISTS `tbl_brng2223` (
  `id_brng2223` int(11) NOT NULL AUTO_INCREMENT,
  `id_mtk` varchar(8) NOT NULL,
  `sedia_gbpp` double DEFAULT NULL,
  `sedia_rkpss` double DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng2223`),
  KEY `FK_tbl_brng2223_tbl_jadwal` (`id_jadwal`),
  KEY `FK_tbl_brng2223_tbl_mtk` (`id_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng2629`
--

CREATE TABLE IF NOT EXISTS `tbl_brng2629` (
  `id_brng2629` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `id_dsn` int(11) NOT NULL,
  `publikasi` varchar(20) DEFAULT NULL,
  `bln_thn` varchar(10) DEFAULT NULL,
  `pub_lokal` enum('YA','TIDAK') DEFAULT NULL,
  `pub_nas` enum('YA','TIDAK') DEFAULT NULL,
  `pub_inter` enum('YA','TIDAK') DEFAULT NULL,
  `penelitian` enum('YA','TIDAK') DEFAULT NULL,
  `hibah_penelitian` varchar(50) DEFAULT NULL,
  `dana_pribadi` int(11) DEFAULT NULL,
  `dana_lokal` int(11) DEFAULT NULL,
  `dana_internasional` int(11) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_brng2629`),
  KEY `FK_tbl_brng2629_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng2629_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brng3132`
--

CREATE TABLE IF NOT EXISTS `tbl_brng3132` (
  `id_brng3132` int(11) NOT NULL AUTO_INCREMENT,
  `judul_kegiatan` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `waktu` varchar(10) DEFAULT NULL,
  `jml_dana` int(11) DEFAULT NULL,
  `id_dsn` int(11) NOT NULL,
  `hibah_pengabdian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_brng3132`),
  KEY `FK_tbl_brng3132_tbl_dsn` (`id_dsn`),
  KEY `FK_tbl_brng3132_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dsn`
--

CREATE TABLE IF NOT EXISTS `tbl_dsn` (
  `id_dsn` int(11) NOT NULL AUTO_INCREMENT,
  `id_jrsn` int(11) DEFAULT NULL,
  `jbtn_dsn` varchar(20) NOT NULL,
  `nip_dsn` varchar(15) DEFAULT NULL,
  `kode_dsn` varchar(10) DEFAULT NULL,
  `nama_dsn` varchar(30) DEFAULT NULL,
  `alamat_dsn` varchar(50) DEFAULT NULL,
  `email_dsn` varchar(30) DEFAULT NULL,
  `nohp_dsn` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_dsn`),
  KEY `FK_tbl_dsn_tbl_jrsn` (`id_jrsn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_dsn`
--

INSERT INTO `tbl_dsn` (`id_dsn`, `id_jrsn`, `jbtn_dsn`, `nip_dsn`, `kode_dsn`, `nama_dsn`, `alamat_dsn`, `email_dsn`, `nohp_dsn`) VALUES
(2, 2, 'Dosen Wali', '091271251', '0009', 'Ahmad', 'Cirebon', 'ahmad@gmail.com', '0987365'),
(7, 3, 'Ketua Jurusan', '152015007', 'DSN-004', 'Unixman', 'jl. unix no 20', 'unixman@gmail.com', '091219'),
(8, 4, 'Ketua Jurusan', '10291209', 'DSN-010', 'Kausar', 'Jl. Bandung', 'kausar@gmail.com', '1029120');

--
-- Triggers `tbl_dsn`
--
DROP TRIGGER IF EXISTS `trigger_delete_dosen`;
DELIMITER //
CREATE TRIGGER `trigger_delete_dosen` BEFORE DELETE ON `tbl_dsn`
 FOR EACH ROW BEGIN
delete from tbl_brng35 where id_dsn = old.id_dsn;
delete from tbl_brng3132 where id_dsn = old.id_dsn;
delete from tbl_brng30 where id_dsn = old.id_dsn;
delete from tbl_brng2629 where id_dsn = old.id_dsn;
delete from tbl_brng25 where id_dsn = old.id_dsn;
delete from tbl_brng20 where id_dsn = old.id_dsn;
delete from tbl_brng15 where id_dsn = old.id_dsn;
delete from tbl_auditor where id_dsn = old.id_dsn;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indikator`
--

CREATE TABLE IF NOT EXISTS `tbl_indikator` (
  `kode_indikator` varchar(6) NOT NULL,
  `indikator_audit` varchar(100) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `nol` varchar(20) DEFAULT NULL,
  `satu` varchar(20) DEFAULT NULL,
  `dua` varchar(20) DEFAULT NULL,
  `tiga` varchar(20) DEFAULT NULL,
  `empat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_indikator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_indikator`
--

INSERT INTO `tbl_indikator` (`kode_indikator`, `indikator_audit`, `bobot`, `nol`, `satu`, `dua`, `tiga`, `empat`) VALUES
('IA-01', 'Persentase Kesesuaian Rancangan Kegiatan Pembelajaran Satu Semester di dalam BAP', 4, '< 55 % sesuai', '55 – 64 % sesuai', '65 – 74 % sesuai', '75 – 84 % sesuai', '>= 85 % sesuai'),
('IA-02', 'Persentase Keberadaan Berita Acara Pengembalian Tugas Mahasiswa', 1, '< 55 %', '55 – 64 %', '65 – 74 %', '75 – 84 %', '>= 85 %'),
('IA-03', 'Persentase Pembahasan dan Pengumuman Solusi UTS', 1, '< 55 %', '55 – 64 %', '65 – 74 %', '75 – 84 %', '>= 85 %'),
('IA-04', 'Persentase Pembahasan dan Pengumuman Solusi UAS ', 1, NULL, NULL, NULL, NULL, NULL),
('IA-05', 'Persentase Berita Acara Pengembalian Berkas Ujian (UTS & UAS) Kepada Mahasiswa/Melalui jurusan', 1, NULL, NULL, NULL, NULL, NULL),
('IA-06', 'Persentase Ketepatan Waktu Pemasukan Nilai UTS', 1, '', '', '', '', ''),
('IA-07', 'Persentase Ketepatan Waktu Pemasukan Nilai UAS', 1, '', '', '', '', ''),
('IA-08', 'Persentase Kesesuaian Waktu Pemasukan Laporan Awal Semester Dosen Pengampu ', 2, '', '', '', '', ''),
('IA-09', 'Persentase Kesesuaian Waktu Pemasukan Laporan Tengah Semester Dosen Pengampu ', 2, '', '', '', '', ''),
('IA-10', 'Persentase Kesesuaian Waktu Pemasukan Laporan Akhir Semester Dosen Pengampu ', 2, '', '', '', '', ''),
('IA-11', 'Persentase Kehadiran Dosen Minimal 90% dari Kehadiran Seharusnya', 4, '', '', '', '', ''),
('IA-12', 'Persentase Kehadiran Dosen/Asisten di Laboratorium/ Studio Responsi Minimal 90% dari Kehadiran Sehar', 4, '', '', '', '', ''),
('IA-13', 'Persentase Kehadiran Mahasiswa Minimal 80% dalam Perkuliahan', 3, '', '', '', '', ''),
('IA-14', 'Persentase Kehadiran Mahasiswa Minimal 80% untuk Tingkat I dan 80% untuk Tingkat II,III,IV dalam Res', 3, '', '', '', '', ''),
('IA-15', 'Persentase Jumlah Dosen Tetap Dengan Nilai dari Kuesioner Mahasiswa  ? 3,00', 2, '', '', '', '', ''),
('IA-16', 'Jumlah Tugas Dalam Bahasa Inggris (TIDAK DIUKUR LAGI)', 0, '', '', '', '', ''),
('IA-17', 'Persentase Indeks Prestasi Kumulatif Lulusan ? 3,00', 3.5, '', '', '', '', ''),
('IA-18', 'Persentase Lulusan yang Tepat Waktu Terhadap Populasi Lulusan', 3, '', '', '', '', ''),
('IA-18b', 'Persentase Lulusan yang Tepat Waktu Terhadap Populasi Angkatan (TIDAK DIUKUR DI SEMESTER GANJIL)', 3.5, '', '', '', '', ''),
('IA-19', 'Rata-rata Waktu Penyelesaian Tugas Akhir', 3, '', '', '', '', ''),
('IA-20', 'Persentase Indeks Prestasi Matakuliah >= 2,75', 3.5, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `id_jrsn` int(11) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` enum('GANJIL','GENAP') NOT NULL,
  `tgl_visitasi` varchar(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `FK_tbl_jadwal_tbl_jrsn` (`id_jrsn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_jrsn`, `tahun`, `semester`, `tgl_visitasi`) VALUES
('jdw-di-2016-003', 2, '2015-2016', 'GENAP', '2016-09-13'),
('jdw-gd-2017-001', 5, '2017-2018', 'GENAP', '2017-05-17'),
('jdw-if-2017-001', 4, '2017-2018', 'GENAP', '2017-05-09'),
('jdw-tl-2017-002', 3, '2017-2018', 'GENAP', '2017-05-13');

--
-- Triggers `tbl_jadwal`
--
DROP TRIGGER IF EXISTS `delete_jadwal`;
DELIMITER //
CREATE TRIGGER `delete_jadwal` BEFORE DELETE ON `tbl_jadwal`
 FOR EACH ROW BEGIN
delete from tbl_brng810 where id_jadwal = old.id_jadwal;
delete from tbl_brng35 where id_jadwal = old.id_jadwal;
delete from tbl_brng34 where id_jadwal = old.id_jadwal;
delete from tbl_brng33 where id_jadwal = old.id_jadwal;
delete from tbl_brng3132 where id_jadwal = old.id_jadwal;
delete from tbl_brng30 where id_jadwal = old.id_jadwal;
delete from tbl_brng2629 where id_jadwal = old.id_jadwal;
delete from tbl_brng25 where id_jadwal = old.id_jadwal;
delete from tbl_brng24 where id_jadwal = old.id_jadwal;
delete from tbl_brng2223 where id_jadwal = old.id_jadwal;
delete from tbl_brng21 where id_jadwal = old.id_jadwal;
delete from tbl_brng20 where id_jadwal = old.id_jadwal;
delete from tbl_brng18b where id_jadwal = old.id_jadwal;
delete from tbl_brng1719 where id_jadwal = old.id_jadwal;
delete from tbl_brng17 where id_jadwal = old.id_jadwal;
delete from tbl_brng15 where id_jadwal = old.id_jadwal;
delete from tbl_brng1214 where id_jadwal = old.id_jadwal;
delete from tbl_brng1113 where id_jadwal = old.id_jadwal;
delete from tbl_auditor where id_jadwal = old.id_jadwal;
delete from tbl_master_audit where id_jadwal = old.id_jadwal;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jrsn`
--

CREATE TABLE IF NOT EXISTS `tbl_jrsn` (
  `id_jrsn` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(50) DEFAULT NULL,
  `nama_jrsn` varchar(50) DEFAULT NULL,
  `email_jrsn` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jrsn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_jrsn`
--

INSERT INTO `tbl_jrsn` (`id_jrsn`, `fakultas`, `nama_jrsn`, `email_jrsn`) VALUES
(2, 'SENI RUPA DAN DESAIN', 'Desain Interior', 'fsrd@itenas.ac.id'),
(3, 'Teknologi Industri', 'Teknik Lingkungan', 'tl@gmail.com'),
(4, 'Teknologi Industri', 'Teknik Informatika', 'if@gmail.com'),
(5, 'Teknologi Industri', 'Geodesi', 'gd@gmail.com');

--
-- Triggers `tbl_jrsn`
--
DROP TRIGGER IF EXISTS `delete_jrsn`;
DELIMITER //
CREATE TRIGGER `delete_jrsn` BEFORE DELETE ON `tbl_jrsn`
 FOR EACH ROW BEGIN
delete from tbl_jadwal where id_jrsn = old.id_jrsn;
delete from tbl_dsn where id_jrsn = old.id_jrsn;
delete from tbl_mhs where id_jrsn = old.id_jrsn;
delete from tbl_mtk where id_jrsn = old.id_jrsn;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE IF NOT EXISTS `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(300) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tahun`) VALUES
(1, 'Program Karya Ilmiah Mahasiswa (PKM) tahun 2013, Bidang Penelitian, dengan Judul Pembuatan Papan Komposit Berbasis Sampah Plastik', 2012),
(2, 'Program Karya Ilmiah Mahasiswa (PKM) tahun 2013, Bidang Penelitian, dengan Judul Pembuatan Etanol Dari Kulit Pisang Nangka Melalui Proses Hidrolisis dan Fermentasi Sel Tertambat Dengan Menggunakan Batu Apung Sebagai Media Penambat', 2015),
(3, 'Program Kreatifitas Mahasiswa (PKM) Tahun 2014 Bidang Kewirausahaan dari Direktorat Penelitian dan Pengabdian Kepada Masyarakat Dirjen Dikti, dengan judul Pembuatan', 2014);

--
-- Triggers `tbl_kegiatan`
--
DROP TRIGGER IF EXISTS `delete_kegiatan`;
DELIMITER //
CREATE TRIGGER `delete_kegiatan` BEFORE DELETE ON `tbl_kegiatan`
 FOR EACH ROW BEGIN
delete from tbl_brng24 where id_kegiatan = old.id_kegiatan;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kesimpulan`
--

CREATE TABLE IF NOT EXISTS `tbl_kesimpulan` (
  `id_kesimpulan` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` varchar(15) NOT NULL,
  `uraian` varchar(200) DEFAULT NULL,
  `keterangan` enum('KESIMPULAN','REKOMENDASI') DEFAULT NULL,
  PRIMARY KEY (`id_kesimpulan`),
  KEY `FK_tbl_kesimpulan_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_kesimpulan`
--

INSERT INTO `tbl_kesimpulan` (`id_kesimpulan`, `id_jadwal`, `uraian`, `keterangan`) VALUES
(4, 'jdw-tl-2017-002', 'Kesimpulan untuk teknik lingkungan', 'KESIMPULAN'),
(5, 'jdw-tl-2017-002', 'Rekomendasi untuk teknik lingkungan', 'REKOMENDASI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_audit`
--

CREATE TABLE IF NOT EXISTS `tbl_master_audit` (
  `id_master` varchar(20) NOT NULL,
  `kode_indikator` varchar(5) NOT NULL,
  `hasil_genap` double DEFAULT NULL,
  `target_genap` double DEFAULT NULL,
  `capaian_genap` double DEFAULT NULL,
  `rencana_kegiatan` varchar(100) DEFAULT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  PRIMARY KEY (`id_master`),
  UNIQUE KEY `Index 4` (`kode_indikator`,`id_jadwal`),
  KEY `FK_tbl_master_audit_tbl_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_audit`
--

INSERT INTO `tbl_master_audit` (`id_master`, `kode_indikator`, `hasil_genap`, `target_genap`, `capaian_genap`, `rencana_kegiatan`, `id_jadwal`) VALUES
('MST-IF-2017-01-IA01', 'IA-01', 90, 90, 90, 'rencana aja', 'jdw-if-2017-001'),
('MST-IF-2017-01-IA02', 'IA-02', 80, 70, 60, 'Perencanaan', 'jdw-if-2017-001'),
('MST-TL-2017-01-IA0I', 'IA-01', 20, 70, 80, 'masih direncanakan', 'jdw-tl-2017-002');

--
-- Triggers `tbl_master_audit`
--
DROP TRIGGER IF EXISTS `delete_master`;
DELIMITER //
CREATE TRIGGER `delete_master` BEFORE DELETE ON `tbl_master_audit`
 FOR EACH ROW BEGIN
delete from tbl_audit where id_master_audit = old.id_master;
delete from tbl_nilai_audit where id_master = old.id_master;
delete from tbl_kesimpulan where id_jadwal = old.id_jadwal;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE IF NOT EXISTS `tbl_mhs` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `id_jrsn` int(11) NOT NULL,
  `nrp_mhs` varchar(12) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `alamat_mhs` varchar(50) NOT NULL,
  `email_mhs` varchar(30) NOT NULL,
  `nohp_mhs` varchar(13) NOT NULL,
  `ortu_mhs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mhs`),
  KEY `FK_tbl_mhs_tbl_jrsn` (`id_jrsn`),
  KEY `nrp_mhs` (`nrp_mhs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `id_jrsn`, `nrp_mhs`, `nama_mhs`, `alamat_mhs`, `email_mhs`, `nohp_mhs`, `ortu_mhs`) VALUES
(3, 2, '152015078', 'Ahmad Habibi', 'Cirebon', 'habibi@gmail.com', '092238', 'Habib'),
(4, 2, '152015009', 'Kibul', 'Semarang', 'kibul@gmail.com', '0129129', 'Anugrah'),
(5, 3, '172015001', 'Ummar bin khattab', 'Jl. Husein no 20', 'umar@gmail.com', '09121289', 'Khattab'),
(6, 3, '172015002', 'Ali bin Abi Thalib', 'Jl. Sultan No 10', 'ali@gmail.com', '01291217', 'Abi Thalib'),
(7, 4, '152015077', 'M. Alif Abhiesa Al Kautsar', 'Jl. Pangerann Sutajaya', 'noobunixman@gmail.com', '089121828', 'Orang tua'),
(8, 5, '1820150001', 'Ahmad', 'Jl. Bandung', 'ahmad@gmail.com', '01212917278', 'Ahmadin');

--
-- Triggers `tbl_mhs`
--
DROP TRIGGER IF EXISTS `trigger_delete_mhs`;
DELIMITER //
CREATE TRIGGER `trigger_delete_mhs` BEFORE DELETE ON `tbl_mhs`
 FOR EACH ROW BEGIN
delete from tbl_brng25 where id_mhs = old.id_mhs;
delete from tbl_brng24 where nrp_mhs = old.id_mhs;
delete from tbl_brng21 where id_mhs = old.id_mhs;
delete from tbl_brng18b where id_mhs = old.id_mhs;
delete from tbl_brng1719 where id_mhs = old.id_mhs;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mtk`
--

CREATE TABLE IF NOT EXISTS `tbl_mtk` (
  `id_mtk` varchar(8) NOT NULL,
  `nama_mtk` varchar(60) NOT NULL,
  `id_jrsn` int(11) NOT NULL,
  `sks_mtk` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_mtk`),
  KEY `FK_tbl_mtk_tbl_jrsn` (`id_jrsn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mtk`
--

INSERT INTO `tbl_mtk` (`id_mtk`, `nama_mtk`, `id_jrsn`, `sks_mtk`) VALUES
('DI-001', 'CorelDraw', 2, 3),
('DI-002', 'PhotoShop', 2, 2),
('IF-212', 'Sistem Basis Data', 4, 4),
('TL-001', 'Tatanan Kota Modern', 3, 4),
('TL-002', 'Kota Modern Bebas Polusi', 3, 3);

--
-- Triggers `tbl_mtk`
--
DROP TRIGGER IF EXISTS `trigger_delete_mtk`;
DELIMITER //
CREATE TRIGGER `trigger_delete_mtk` BEFORE DELETE ON `tbl_mtk`
 FOR EACH ROW BEGIN
delete from tbl_brng810 where id_mtk = old.id_mtk;
delete from tbl_brng30 where id_mtk = old.id_mtk;
delete from tbl_brng2223 where id_mtk = old.id_mtk;
delete from tbl_brng20 where id_mtk = old.id_mtk;
delete from tbl_brng17 where id_mtk = old.id_mtk;
delete from tbl_brng1214 where id_mtk = old.id_mtk;
delete from tbl_brng1113 where id_mtk = old.id_mtk;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_audit`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai_audit` (
  `id_master` varchar(20) NOT NULL DEFAULT '0',
  `nilai` int(11) NOT NULL,
  `bobot_nilai` double NOT NULL,
  KEY `FK_tbl_nilai_audit_tbl_master_audit` (`id_master`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_audit`
--

INSERT INTO `tbl_nilai_audit` (`id_master`, `nilai`, `bobot_nilai`) VALUES
('MST-TL-2017-01-IA0I', 3, 0.12),
('MST-IF-2017-01-IA01', 4, 0.16),
('MST-IF-2017-01-IA02', 1, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestasi`
--

CREATE TABLE IF NOT EXISTS `tbl_prestasi` (
  `id_pres` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `nama_pres` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pres`),
  KEY `FK_tbl_prestasi_tbl_kegiatan` (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_prestasi`
--

INSERT INTO `tbl_prestasi` (`id_pres`, `id_kegiatan`, `nama_pres`) VALUES
(2, 1, 'Mendapatkan Hibah Penelitian'),
(3, 2, 'Hibah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(20) NOT NULL,
  `pass_user` varchar(20) NOT NULL,
  `level` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nama_user` (`nama_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `nama_user`, `pass_user`, `level`) VALUES
(1, 'admin', 'user', '1'),
(2, 'kausar', 'unixman', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
  ADD CONSTRAINT `FK_tbl_audit_tbl_master_audit` FOREIGN KEY (`id_master_audit`) REFERENCES `tbl_master_audit` (`id_master`);

--
-- Constraints for table `tbl_auditor`
--
ALTER TABLE `tbl_auditor`
  ADD CONSTRAINT `FK_tbl_auditor_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_auditor_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng15`
--
ALTER TABLE `tbl_brng15`
  ADD CONSTRAINT `FK_tbl_brng15_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng15_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`);

--
-- Constraints for table `tbl_brng17`
--
ALTER TABLE `tbl_brng17`
  ADD CONSTRAINT `FK_tbl_brng17_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `FK_tbl_brng17_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng18b`
--
ALTER TABLE `tbl_brng18b`
  ADD CONSTRAINT `FK_tbl_brng18b_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng18b_tbl_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs` (`id_mhs`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng20`
--
ALTER TABLE `tbl_brng20`
  ADD CONSTRAINT `FK_tbl_brng20_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng20_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng20_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng21`
--
ALTER TABLE `tbl_brng21`
  ADD CONSTRAINT `FK_tbl_brng21_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng21_tbl_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs` (`id_mhs`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng24`
--
ALTER TABLE `tbl_brng24`
  ADD CONSTRAINT `FK_tbl_brng24_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng24_tbl_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng24_tbl_mhs` FOREIGN KEY (`nrp_mhs`) REFERENCES `tbl_mhs` (`id_mhs`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng25`
--
ALTER TABLE `tbl_brng25`
  ADD CONSTRAINT `FK_tbl_brng25_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng25_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng25_tbl_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs` (`id_mhs`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng30`
--
ALTER TABLE `tbl_brng30`
  ADD CONSTRAINT `FK_tbl_brng30_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng30_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng30_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng33`
--
ALTER TABLE `tbl_brng33`
  ADD CONSTRAINT `FK_tbl_brng33_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng34`
--
ALTER TABLE `tbl_brng34`
  ADD CONSTRAINT `FK_tbl_brng34_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng35`
--
ALTER TABLE `tbl_brng35`
  ADD CONSTRAINT `FK_tbl_brng35_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng35_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng810`
--
ALTER TABLE `tbl_brng810`
  ADD CONSTRAINT `FK_tbl_brng810_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng810_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng1113`
--
ALTER TABLE `tbl_brng1113`
  ADD CONSTRAINT `FK_tbl_brng1113_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng1113_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng1214`
--
ALTER TABLE `tbl_brng1214`
  ADD CONSTRAINT `FK_tbl_brng1214_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng1214_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng1719`
--
ALTER TABLE `tbl_brng1719`
  ADD CONSTRAINT `FK_tbl_brng1719_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng1719_tbl_mhs` FOREIGN KEY (`id_mhs`) REFERENCES `tbl_mhs` (`id_mhs`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng2223`
--
ALTER TABLE `tbl_brng2223`
  ADD CONSTRAINT `FK_tbl_brng2223_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng2223_tbl_mtk` FOREIGN KEY (`id_mtk`) REFERENCES `tbl_mtk` (`id_mtk`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng2629`
--
ALTER TABLE `tbl_brng2629`
  ADD CONSTRAINT `FK_tbl_brng2629_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng2629_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brng3132`
--
ALTER TABLE `tbl_brng3132`
  ADD CONSTRAINT `FK_tbl_brng3132_tbl_dsn` FOREIGN KEY (`id_dsn`) REFERENCES `tbl_dsn` (`id_dsn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_brng3132_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_dsn`
--
ALTER TABLE `tbl_dsn`
  ADD CONSTRAINT `FK_tbl_dsn_tbl_jrsn` FOREIGN KEY (`id_jrsn`) REFERENCES `tbl_jrsn` (`id_jrsn`);

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `FK_tbl_jadwal_tbl_jrsn` FOREIGN KEY (`id_jrsn`) REFERENCES `tbl_jrsn` (`id_jrsn`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kesimpulan`
--
ALTER TABLE `tbl_kesimpulan`
  ADD CONSTRAINT `FK_tbl_kesimpulan_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_master_audit`
--
ALTER TABLE `tbl_master_audit`
  ADD CONSTRAINT `FK_tbl_master_audit_tbl_indikator` FOREIGN KEY (`kode_indikator`) REFERENCES `tbl_indikator` (`kode_indikator`),
  ADD CONSTRAINT `FK_tbl_master_audit_tbl_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`);

--
-- Constraints for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD CONSTRAINT `FK_tbl_mhs_tbl_jrsn` FOREIGN KEY (`id_jrsn`) REFERENCES `tbl_jrsn` (`id_jrsn`);

--
-- Constraints for table `tbl_mtk`
--
ALTER TABLE `tbl_mtk`
  ADD CONSTRAINT `FK_tbl_mtk_tbl_jrsn` FOREIGN KEY (`id_jrsn`) REFERENCES `tbl_jrsn` (`id_jrsn`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai_audit`
--
ALTER TABLE `tbl_nilai_audit`
  ADD CONSTRAINT `FK_tbl_nilai_audit_tbl_master_audit` FOREIGN KEY (`id_master`) REFERENCES `tbl_master_audit` (`id_master`);

--
-- Constraints for table `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD CONSTRAINT `FK_tbl_prestasi_tbl_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `tbl_kegiatan` (`id_kegiatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
