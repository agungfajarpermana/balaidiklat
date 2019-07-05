-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 02:39 PM
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
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `file` varchar(150) NOT NULL,
  `extensi` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin@test.test', '$2y$10$lj4r023kyetQByf8TTvUZO70yq3rA9Y7bmPD9q50hY5/ZoUbzHXQi', 1, 'MHQcfEN5VjIS5Wm0UsEiZtQMHcNSZsnCFa4JAScTcqAcES8NPbRZbfCdrt0Z', '2018-04-28 12:01:28', '2018-04-28 12:01:28'),
(2, 'pusat@test.test', '$2y$10$lj4r023kyetQByf8TTvUZO70yq3rA9Y7bmPD9q50hY5/ZoUbzHXQi', 2, 'ImqT4q8IKk3PqUCRa2eAHsrEN4YdSg1j3csDuyepImCJezSkJgUNdihl2Y1N', '2018-05-08 10:49:55', '2018-05-08 10:49:55'),
(3, 'owner@test.test', '$2y$10$qS5E5JU6Mgj/qLwu3NpE6.bNPBqBj.7Qqi0F5qESbhbPWueBaGPdy', 3, '1wsLU9U18kes3rhXVOII7iR0qUpzr5Sl0mVZbxFtNE2r3ntYYIZ7qfzY3J4p', '2019-01-29 11:23:58', '2019-01-29 22:20:37');

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
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nama_pelatihan`
--
ALTER TABLE `tb_nama_pelatihan`
  MODIFY `id_nama_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_rbpmd`
--
ALTER TABLE `tb_rbpmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rbpmd_3`
--
ALTER TABLE `tb_rbpmd_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rbpmd_4`
--
ALTER TABLE `tb_rbpmd_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rbpmd_5`
--
ALTER TABLE `tb_rbpmd_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran`
--
ALTER TABLE `tb_rencana_pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_2`
--
ALTER TABLE `tb_rencana_pembelajaran_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_3`
--
ALTER TABLE `tb_rencana_pembelajaran_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rencana_pembelajaran_4`
--
ALTER TABLE `tb_rencana_pembelajaran_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
