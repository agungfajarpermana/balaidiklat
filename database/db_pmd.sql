-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 01:57 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alokasi_waktu`
--

CREATE TABLE `tb_alokasi_waktu` (
  `id_alokasi_waktu` int(11) NOT NULL,
  `id_mata_pelatihan` int(11) NOT NULL,
  `alokasi_waktu` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alokasi_waktu`
--

INSERT INTO `tb_alokasi_waktu` (`id_alokasi_waktu`, `id_mata_pelatihan`, `alokasi_waktu`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(2, 2, '3', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(3, 3, '5', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(4, 4, '5', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(5, 5, '4', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(6, 6, '5', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(7, 7, '3', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(8, 8, '3', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(9, 9, '2', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(10, 10, '8', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(11, 11, '6', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(12, 12, '3', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(13, 13, '4', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(14, 14, '10', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(15, 15, '7', '2018-04-11 19:24:09', '2018-04-11 19:24:09'),
(16, 16, '16', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(17, 17, '8', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(18, 18, '4', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(19, 19, '4', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(20, 20, '2', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(21, 21, '4', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(22, 22, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(23, 23, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(24, 24, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(25, 25, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(26, 26, '4', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(27, 27, '4', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(28, 28, '20', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(29, 29, '3', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(30, 30, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(31, 31, '5', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(32, 32, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(33, 33, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(34, 34, '5', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(35, 35, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(36, 36, '6', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(37, 37, '8', '2018-04-11 19:27:35', '2018-04-11 19:27:35'),
(38, 38, '8', '2018-04-12 14:16:59', '2018-04-12 14:16:59'),
(39, 41, '24', '2018-05-08 18:19:24', '2018-05-08 18:19:24'),
(40, 39, '8', '2018-05-08 19:37:09', '2018-05-08 19:37:09'),
(41, 40, '8', '2018-05-08 19:37:09', '2018-05-08 19:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mata_pelatihan`
--

CREATE TABLE `tb_mata_pelatihan` (
  `id_mata_pelatihan` int(11) NOT NULL,
  `id_nama_pelatihan` int(11) NOT NULL,
  `mata_pelatihan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mata_pelatihan`
--

INSERT INTO `tb_mata_pelatihan` (`id_mata_pelatihan`, `id_nama_pelatihan`, `mata_pelatihan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembangunan Integritas', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(2, 1, 'Pengantar Pengelolaan Teknis Pembangunan Bangunan', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(3, 1, 'Kebijakan Pembangunan Bangunan Gedung Negara', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(4, 1, 'Persyaratan Pembangunan Bangunan Gedung Negara', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(5, 1, 'Penyusunan Program Pembiayaan', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(6, 1, 'Tahapan Pembangunan Bangunan Gedung Negara', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(7, 1, 'Biaya Pembangunan Bangunan Gedung Negara', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(8, 1, 'Pembinaan Pembangunan Bangunan Gedung Negara', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(9, 1, 'Penyusunan Laporan PT BGN', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(10, 1, 'Persiapan Kunjungan Lapangan', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(11, 1, 'Kunjungan Lapangan', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(12, 1, 'Seminar', '2018-04-11 19:10:26', '2018-04-11 19:10:26'),
(13, 2, 'Ceramah Manajemen Kontruksi', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(14, 2, 'Perencanaan Kontruksi', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(15, 2, 'Pengadaan Tanah', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(16, 2, 'Pelaksanaan Kontruksi', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(17, 2, 'Operasi Dan Pemeliharaan', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(18, 2, 'Diskusi Kelompok', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(19, 2, 'Seminar', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(20, 2, 'Pretest - posttest', '2018-04-11 19:13:07', '2018-04-11 19:13:07'),
(23, 3, 'Pengenalan Unit Organisasi', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(24, 3, 'Pengelolaan SDA Terpadu', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(25, 3, 'Konservasi Sumber Daya Air', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(26, 3, 'Pendayaguanaan Sumber Daya Air', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(27, 3, 'Pengendalian Daya Rusak Air', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(28, 3, 'Pemberdayaan Masyarakat', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(29, 3, 'Sistem Informasi Sumber Daya Air', '2018-04-11 19:15:20', '2018-04-11 19:15:20'),
(31, 3, 'Studi Lapangan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(32, 4, 'Pembangunan Integritas', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(33, 4, 'Prinsip - Prinsip Penanganan Drainase Jalan Yang Berkelanjutan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(34, 4, 'Survei Pengumpulan Data Lapangan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(35, 4, 'Perencanaan Drainase Permukaan Jalanan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(36, 4, 'Perencanaan Sistem Polder Dan Kolam Retensi', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(37, 4, 'Drainase Bawah Permukaan Perkerasan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(38, 4, 'Sistem Drainase Jembatan Dan Lereng', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(39, 4, 'Inspeksi Dan Pemeliharaan Drainase Jalan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(40, 4, 'Kunjungan Lapangan', '2018-04-11 19:20:52', '2018-04-11 19:20:52'),
(41, 4, 'Makalah Dan Seminar', '2018-04-12 14:46:03', '2018-04-12 14:46:03'),
(42, 5, 'Anti Korupsi', '2018-05-08 18:18:33', '2018-05-08 18:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nama_pelatihan`
--

CREATE TABLE `tb_nama_pelatihan` (
  `id_nama_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nama_pelatihan`
--

INSERT INTO `tb_nama_pelatihan` (`id_nama_pelatihan`, `nama_pelatihan`, `created_at`, `updated_at`) VALUES
(1, 'Pengolahan Teknis Pembangunan Bangunan Gedung Negara', '2018-04-11 19:03:00', '2018-04-11 19:03:00'),
(2, 'Manajemen Kontruksi', '2018-04-11 19:03:00', '2018-04-11 19:03:00'),
(3, 'Latsartek', '2018-04-11 19:03:33', '2018-04-11 19:03:33'),
(4, 'Penanganan Drainase Jalan', '2018-04-11 19:03:33', '2018-04-11 19:03:33'),
(5, 'Latsar CPNS', '2018-05-08 18:17:57', '2018-05-08 18:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rbpmd`
--

CREATE TABLE `tb_rbpmd` (
  `id` int(11) NOT NULL,
  `nama_pelatihan` text,
  `mata_pelatihan` text,
  `alokasi_waktu` text,
  `hasil_belajar` text,
  `indikator_hasil_belajar` text,
  `materi_pokok` text,
  `waktu` text,
  `referensi` text,
  `deskripsi_singkat` text,
  `catatan` text,
  `nip` varchar(150) DEFAULT NULL,
  `pengajar` varchar(150) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created` tinyint(4) NOT NULL DEFAULT '0',
  `duplicate` tinyint(4) DEFAULT '0',
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rbpmd`
--

INSERT INTO `tb_rbpmd` (`id`, `nama_pelatihan`, `mata_pelatihan`, `alokasi_waktu`, `hasil_belajar`, `indikator_hasil_belajar`, `materi_pokok`, `waktu`, `referensi`, `deskripsi_singkat`, `catatan`, `nip`, `pengajar`, `status`, `created`, `duplicate`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(47, 'Penanganan Drainase Jalan', 'Pembangunan Integritas', '6', 'test hasil belajar', 'test indikator 1|test indikator 2', 'test materi 1|test materi 2', '751|1120', 'test referensi 1', 'test deskripsi singkat', NULL, '198010172005022002', 'Agung Fajar', 1, 2, 0, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:43'),
(50, 'Penanganan Drainase Jalan', 'Pembangunan Integritas', '6', 'test hasil belajar', 'test indikator 1|test indikator 2', 'test materi 1|test materi 2', '751|1120', 'test referensi 1', 'test deskripsi singkat', NULL, '198010172005022001', 'Dessy Aryani', 1, 0, 2, 44, '2019-01-08 18:23:50', '2019-01-08 18:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rbpmd_3`
--

CREATE TABLE `tb_rbpmd_3` (
  `id` int(11) NOT NULL,
  `sub_materi_pokok` text,
  `parent_id_materi` int(11) DEFAULT NULL,
  `tb_rbpmd_id` int(11) DEFAULT NULL,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rbpmd_3`
--

INSERT INTO `tb_rbpmd_3` (`id`, `sub_materi_pokok`, `parent_id_materi`, `tb_rbpmd_id`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(307, 'test sub materi 1', 1, 47, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:44'),
(308, 'test sub materi 2', 1, 47, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:44'),
(309, 'test sub materi 3', 2, 47, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:44'),
(310, 'test sub materi 4', 2, 47, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:44'),
(311, 'test sub materi 5', 2, 47, 42, '2019-01-08 17:51:54', '2019-01-08 17:57:44'),
(322, 'test sub materi 1', 1, 50, 44, '2019-01-08 18:23:51', '2019-01-08 18:27:24'),
(323, 'test sub materi 2', 1, 50, 44, '2019-01-08 18:23:51', '2019-01-08 18:27:24'),
(324, 'test sub materi 3', 2, 50, 44, '2019-01-08 18:23:51', '2019-01-08 18:27:24'),
(325, 'test sub materi 4', 2, 50, 44, '2019-01-08 18:23:51', '2019-01-08 18:27:24'),
(326, 'test sub materi 5', 2, 50, 44, '2019-01-08 18:23:51', '2019-01-08 18:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rbpmd_4`
--

CREATE TABLE `tb_rbpmd_4` (
  `id` int(11) NOT NULL,
  `metode` text,
  `parent_id_sub` int(11) DEFAULT NULL,
  `tb_rbpmd_id` int(11) DEFAULT NULL,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rbpmd_4`
--

INSERT INTO `tb_rbpmd_4` (`id`, `metode`, `parent_id_sub`, `tb_rbpmd_id`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(764, 'Expositori(paparan vasilitator)', 1, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(765, 'Tanya Jawab', 1, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(766, 'Studi Kasus', 2, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(767, 'Role Play', 2, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(768, 'Menyimpulkan', 2, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(769, 'Expositori(paparan vasilitator)', 0, 47, 42, '2019-01-08 17:57:44', '2019-01-08 17:57:44'),
(770, 'Tanya Jawab', 0, 47, 42, '2019-01-08 17:57:44', '2019-01-08 17:57:44'),
(771, 'fhdhfd', 1, 47, 42, '2019-01-08 17:57:44', '2019-01-08 17:57:44'),
(772, 'Role Play', 3, 47, 42, '2019-01-08 17:57:44', '2019-01-08 17:57:44'),
(773, 'Menyimpulkan', 3, 47, 42, '2019-01-08 17:57:44', '2019-01-08 17:57:44'),
(802, 'Expositori(paparan vasilitator)', 0, 50, 44, '2019-01-08 18:27:25', '2019-01-08 18:27:25'),
(803, 'Tanya Jawab', 0, 50, 44, '2019-01-08 18:27:25', '2019-01-08 18:27:25'),
(804, 'Expositori(paparan vasilitator)', 1, 50, 44, '2019-01-08 18:27:25', '2019-01-08 18:27:25'),
(805, 'Tanya Jawab', 1, 50, 44, '2019-01-08 18:27:25', '2019-01-08 18:27:25'),
(806, 'Ice Breaking', 1, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(807, 'Studi Kasus', 2, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(808, 'Role Play', 2, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(809, 'Menyimpulkan', 2, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(810, 'Role Play', 3, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(811, 'Menyimpulkan', 3, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rbpmd_5`
--

CREATE TABLE `tb_rbpmd_5` (
  `id` int(11) NOT NULL,
  `alat_bantu` text,
  `parent_id_metode` int(11) DEFAULT NULL,
  `tb_rbpmd_id` int(11) DEFAULT NULL,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rbpmd_5`
--

INSERT INTO `tb_rbpmd_5` (`id`, `alat_bantu`, `parent_id_metode`, `tb_rbpmd_id`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(882, 'Bahan Tayang', 1, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(883, 'Laptop + LCD', 1, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(884, 'Whiteboard', 2, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(885, 'Spidol', 2, 47, 42, '2019-01-09 00:57:44', '2019-01-08 17:57:44'),
(886, 'Bahan Tayang', 0, 47, 42, '2019-01-08 17:57:45', '2019-01-08 17:57:45'),
(887, 'Bahan Peraga', 0, 47, 42, '2019-01-08 17:57:45', '2019-01-08 17:57:45'),
(888, 'dfhdfhdfh', 1, 47, 42, '2019-01-08 17:57:45', '2019-01-08 17:57:45'),
(889, 'Speaker', 3, 47, 42, '2019-01-08 17:57:45', '2019-01-08 17:57:45'),
(890, 'Laptop + LCD', 3, 47, 42, '2019-01-08 17:57:45', '2019-01-08 17:57:45'),
(915, 'Bahan Tayang', 0, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(916, 'Bahan Peraga', 0, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(917, 'Bahan Tayang', 1, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(918, 'Laptop + LCD', 1, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(919, 'Wifi', 1, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(920, 'Whiteboard', 2, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(921, 'Spidol', 2, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(922, 'Speaker', 3, 50, 44, '2019-01-08 18:27:26', '2019-01-08 18:27:26'),
(923, 'Laptop + LCD', 3, 50, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana_pembelajaran`
--

CREATE TABLE `tb_rencana_pembelajaran` (
  `id` int(11) NOT NULL,
  `nama_pelatihan` text,
  `mata_pelatihan` text,
  `alokasi_waktu` int(11) NOT NULL,
  `hasil_belajar` text,
  `deskripsi_singkat` text,
  `indikator_hasil_belajar` text,
  `materi_pokok` text,
  `waktu` text,
  `referensi` text,
  `catatan` text,
  `nip` varchar(150) DEFAULT NULL,
  `pengajar` varchar(150) DEFAULT NULL,
  `check_list` text,
  `status` tinyint(4) DEFAULT '0',
  `tb_rbpmd_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencana_pembelajaran`
--

INSERT INTO `tb_rencana_pembelajaran` (`id`, `nama_pelatihan`, `mata_pelatihan`, `alokasi_waktu`, `hasil_belajar`, `deskripsi_singkat`, `indikator_hasil_belajar`, `materi_pokok`, `waktu`, `referensi`, `catatan`, `nip`, `pengajar`, `check_list`, `status`, `tb_rbpmd_id`, `created_at`, `updated_at`) VALUES
(42, 'Penanganan Drainase Jalan', 'Prinsip - Prinsip Penanganan Drainase Jalan Yang Berkelanjutan', 6, 'test hasil belajar', 'test deskripsi singkat', 'test indikator 1|test indikator 2', 'test materi 1|test materi 2', '220|466|420|120', 'test referensi 1', NULL, '198010172005022002', 'Agung Fajar', 'X|X|X|X', 1, 47, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(44, 'Penanganan Drainase Jalan', 'Prinsip - Prinsip Penanganan Drainase Jalan Yang Berkelanjutan', 6, 'test hasil belajar', 'test deskripsi singkat', 'test indikator 1|test indikator 2', 'test materi 1|test materi 2', '220|466|420|120', 'test referensi 1', NULL, '198010172005022001', 'Dessy Aryani', 'X|X|X|X', 1, 50, '2019-01-08 18:27:24', '2019-01-08 18:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana_pembelajaran_2`
--

CREATE TABLE `tb_rencana_pembelajaran_2` (
  `id` int(11) NOT NULL,
  `kegiatan_fasilitator` text,
  `parent_id` int(11) DEFAULT NULL,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencana_pembelajaran_2`
--

INSERT INTO `tb_rencana_pembelajaran_2` (`id`, `kegiatan_fasilitator`, `parent_id`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(459, 'fasilitator pendahuluan', 0, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(460, 'dfhdfhdfh', 1, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(461, 'dfhdfhhdfh', 1, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(462, 'dfhdfhdfh', 1, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(463, 'dfhfdhfdh', 2, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(464, 'dfhdfhdhdfh', 2, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(465, 'fasilitator penutup', 3, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(473, 'fasilitator pendahuluan', 0, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(474, 'fasilitator 1', 1, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(475, 'fasilitator 2', 1, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(476, 'fasilitator 3', 1, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(477, 'fasilitator 4', 2, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(478, 'fasilitator 5', 2, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(479, 'fasilitator penutup', 3, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana_pembelajaran_3`
--

CREATE TABLE `tb_rencana_pembelajaran_3` (
  `id` int(11) NOT NULL,
  `kegiatan_peserta` text,
  `parent_id` int(11) DEFAULT NULL,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencana_pembelajaran_3`
--

INSERT INTO `tb_rencana_pembelajaran_3` (`id`, `kegiatan_peserta`, `parent_id`, `tb_rp_id`, `created_at`, `updated_at`) VALUES
(564, 'peserta pendahuluan', 0, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(565, 'dfhdfhdfh', 1, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(566, 'dfhdfhdf', 1, 42, '2019-01-08 17:57:42', '2019-01-08 17:57:42'),
(567, 'dfhdfhdfhdfh', 2, 42, '2019-01-08 17:57:43', '2019-01-08 17:57:43'),
(568, 'dfhdfhdfh', 2, 42, '2019-01-08 17:57:43', '2019-01-08 17:57:43'),
(569, 'dfhfdhfdh', 2, 42, '2019-01-08 17:57:43', '2019-01-08 17:57:43'),
(570, 'peserta penutup', 3, 42, '2019-01-08 17:57:43', '2019-01-08 17:57:43'),
(578, 'peserta pendahuluan', 0, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(579, 'peserta 1', 1, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(580, 'peserta 2', 1, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(581, 'peserta 3', 2, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(582, 'peserta 4', 2, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(583, 'peserta 5', 2, 44, '2019-01-08 18:27:27', '2019-01-08 18:27:27'),
(584, 'peserta penutup', 3, 44, '2019-01-08 18:27:28', '2019-01-08 18:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencana_pembelajaran_4`
--

CREATE TABLE `tb_rencana_pembelajaran_4` (
  `id` int(11) NOT NULL,
  `evaluasi` text,
  `tb_rp_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@test.test', '$2y$10$lj4r023kyetQByf8TTvUZO70yq3rA9Y7bmPD9q50hY5/ZoUbzHXQi', 1, 'iVjAZBlVYg97OPytWGJV21XOeBGIGr2e6fqenjb7V5fckv6PQdAIPbLJLYot', '2018-04-28 12:01:28', '2018-04-28 12:01:28'),
(2, 'pusat@test.test', '$2y$10$lj4r023kyetQByf8TTvUZO70yq3rA9Y7bmPD9q50hY5/ZoUbzHXQi', 2, 'P2J1vUb9ECP6mqEfW2AsLGEsee7lWE6JBGIl9BKtHVNLxYKB6OHuqtM2dn8v', '2018-05-08 10:49:55', '2018-05-08 10:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alokasi_waktu`
--
ALTER TABLE `tb_alokasi_waktu`
  ADD PRIMARY KEY (`id_alokasi_waktu`);

--
-- Indexes for table `tb_mata_pelatihan`
--
ALTER TABLE `tb_mata_pelatihan`
  ADD PRIMARY KEY (`id_mata_pelatihan`);

--
-- Indexes for table `tb_nama_pelatihan`
--
ALTER TABLE `tb_nama_pelatihan`
  ADD PRIMARY KEY (`id_nama_pelatihan`);

--
-- Indexes for table `tb_rbpmd`
--
ALTER TABLE `tb_rbpmd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rbpmd_3`
--
ALTER TABLE `tb_rbpmd_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rbpmd_id` (`tb_rbpmd_id`),
  ADD KEY `tb_rp_id` (`tb_rp_id`);

--
-- Indexes for table `tb_rbpmd_4`
--
ALTER TABLE `tb_rbpmd_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rbpmd_id` (`tb_rbpmd_id`),
  ADD KEY `tb_rbpmd_4_ibfk_2` (`tb_rp_id`);

--
-- Indexes for table `tb_rbpmd_5`
--
ALTER TABLE `tb_rbpmd_5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rbpmd_id` (`tb_rbpmd_id`),
  ADD KEY `tb_rp_id` (`tb_rp_id`);

--
-- Indexes for table `tb_rencana_pembelajaran`
--
ALTER TABLE `tb_rencana_pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rencana_pembelajaran_2`
--
ALTER TABLE `tb_rencana_pembelajaran_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rp_id` (`tb_rp_id`);

--
-- Indexes for table `tb_rencana_pembelajaran_3`
--
ALTER TABLE `tb_rencana_pembelajaran_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rp_id` (`tb_rp_id`);

--
-- Indexes for table `tb_rencana_pembelajaran_4`
--
ALTER TABLE `tb_rencana_pembelajaran_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rp_id` (`tb_rp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alokasi_waktu`
--
ALTER TABLE `tb_alokasi_waktu`
  MODIFY `id_alokasi_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_mata_pelatihan`
--
ALTER TABLE `tb_mata_pelatihan`
  MODIFY `id_mata_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_nama_pelatihan`
--
ALTER TABLE `tb_nama_pelatihan`
  MODIFY `id_nama_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rbpmd`
--
ALTER TABLE `tb_rbpmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_rbpmd_3`
--
ALTER TABLE `tb_rbpmd_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `tb_rbpmd_4`
--
ALTER TABLE `tb_rbpmd_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=812;

--
-- AUTO_INCREMENT for table `tb_rbpmd_5`
--
ALTER TABLE `tb_rbpmd_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran`
--
ALTER TABLE `tb_rencana_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_2`
--
ALTER TABLE `tb_rencana_pembelajaran_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_3`
--
ALTER TABLE `tb_rencana_pembelajaran_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_4`
--
ALTER TABLE `tb_rencana_pembelajaran_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rbpmd_3`
--
ALTER TABLE `tb_rbpmd_3`
  ADD CONSTRAINT `tb_rbpmd_3_ibfk_1` FOREIGN KEY (`tb_rbpmd_id`) REFERENCES `tb_rbpmd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rbpmd_3_ibfk_2` FOREIGN KEY (`tb_rp_id`) REFERENCES `tb_rencana_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rbpmd_4`
--
ALTER TABLE `tb_rbpmd_4`
  ADD CONSTRAINT `tb_rbpmd_4_ibfk_1` FOREIGN KEY (`tb_rbpmd_id`) REFERENCES `tb_rbpmd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rbpmd_4_ibfk_2` FOREIGN KEY (`tb_rp_id`) REFERENCES `tb_rencana_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rbpmd_5`
--
ALTER TABLE `tb_rbpmd_5`
  ADD CONSTRAINT `tb_rbpmd_5_ibfk_1` FOREIGN KEY (`tb_rbpmd_id`) REFERENCES `tb_rbpmd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rbpmd_5_ibfk_2` FOREIGN KEY (`tb_rp_id`) REFERENCES `tb_rencana_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
