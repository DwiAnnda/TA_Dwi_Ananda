-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 02:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_dwianandadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_kalenderpendidikan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(20) DEFAULT '07:00',
  `id_siswa` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT '1' COMMENT '1=hadir,2=izin/sakit,3=tidak hadir',
  `keterangan` varchar(100) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aksesmenu`
--

CREATE TABLE `aksesmenu` (
  `id_aksesmenu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aksesmenu`
--

INSERT INTO `aksesmenu` (`id_aksesmenu`, `id_level`, `id_menu`) VALUES
(19, 1, 1),
(20, 1, 2),
(21, 1, 3),
(22, 1, 4),
(23, 1, 6),
(47, 2, 4),
(48, 2, 5),
(49, 2, 6),
(85, 4, 10),
(86, 4, 17),
(87, 4, 18),
(88, 3, 13),
(89, 3, 14),
(90, 3, 16),
(91, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `namabank` varchar(50) NOT NULL,
  `norekening` varchar(100) NOT NULL,
  `atasnama` varchar(50) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `namabank`, `norekening`, `atasnama`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'Bank Kalsel', '017.03.01.04704.6', 'Dwi Ananda Fajarwati', 'System', '2023-07-29 08:46:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `id_kelas`, `nominal`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 10000, 1, 'admin', '2023-08-07 00:00:00', 'admin', '2023-08-07 02:08:05'),
(2, 2, 20000, 1, 'admin', '2023-08-07 00:00:00', NULL, NULL),
(3, 3, 30000, 1, 'admin', '2023-08-07 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biayapendaftaran`
--

CREATE TABLE `biayapendaftaran` (
  `id_biayapendaftaran` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` double NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biayapendaftaran`
--

INSERT INTO `biayapendaftaran` (`id_biayapendaftaran`, `kode`, `tanggal`, `biaya`, `keterangan`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'uqz1HXOQKy', '2023-07-27', 0, 'Biaya pendaftaran akun siswa', 1, 'admin', '2023-07-27 09:07:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daftarnilai`
--

CREATE TABLE `daftarnilai` (
  `id_daftarnilai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kelassiswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftarsiswa`
--

CREATE TABLE `daftarsiswa` (
  `id_daftarsiswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_les` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarsiswa`
--

INSERT INTO `daftarsiswa` (`id_daftarsiswa`, `tanggal`, `id_les`, `id_siswa`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '2023-08-07', 5, 1, 1, 'admin', '2023-08-07 06:08:38', 'admin', NULL),
(2, '2023-08-07', 7, 2, 1, '', '2023-08-07 07:08:13', 'admin', NULL),
(3, '2023-08-13', 19, 3, 1, '', '2023-08-13 09:08:14', 'admin', NULL),
(4, '2023-08-13', 12, 5, 1, '', '2023-08-13 09:08:27', 'admin', NULL),
(5, '2023-08-13', 11, 4, 1, '', '2023-08-13 09:08:27', 'admin', NULL),
(6, '2023-08-13', 13, 6, 1, '', '2023-08-13 09:08:32', 'admin', NULL),
(7, '2023-08-13', 5, 7, 1, '', '2023-08-13 09:08:33', 'admin', NULL),
(8, '2023-08-13', 12, 8, 1, '', '2023-08-13 09:08:42', 'admin', NULL),
(9, '2023-08-13', 13, 9, 1, '', '2023-08-13 09:08:42', 'admin', NULL),
(10, '2023-08-13', 5, 19, 1, '', '2023-08-13 09:08:47', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailkelassiswa`
--

CREATE TABLE `detailkelassiswa` (
  `id_detailkelassiswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kelassiswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golpangkat`
--

CREATE TABLE `golpangkat` (
  `id_golpangkat` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_gol` varchar(100) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golpangkat`
--

INSERT INTO `golpangkat` (`id_golpangkat`, `urutan`, `nama_gol`, `nama_pangkat`) VALUES
(1, 1, 'IA', 'Juru Muda'),
(2, 2, 'IB', 'Juru Muda Tingkat I'),
(3, 3, 'IC', 'Juru'),
(4, 4, 'ID', 'Juru Tingkat I'),
(5, 5, 'IIA', 'Pengatur Muda'),
(6, 6, 'IIB', 'Pengatur Muda Tingkat I'),
(7, 7, 'IIC', 'Pengatur'),
(8, 8, 'IID', 'Pengatur Tingkat I'),
(9, 9, 'IIIA', 'Penata Muda'),
(10, 10, 'IIIB', 'Penata Muda Tingkat I'),
(11, 11, 'IIIC', 'Penata'),
(12, 12, 'IIID', 'Penata Tingkat I'),
(13, 13, 'IVA', 'Pembina'),
(14, 14, 'IVB', 'Pembina Tingkat I'),
(15, 15, 'IVC', 'Pembina Mudah'),
(16, 16, 'IVD', 'Pembina Madya'),
(17, 17, 'IVE', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `token` text,
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `tanggal`, `kode`, `nip`, `nama`, `id_jeniskelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nohp`, `email`, `password`, `id_status`, `token`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '2023-08-06', '60LH2', '19920512 202305 2 008', 'Alpian Noor, S.Pd', 1, 'Banjarbaru', '1991-08-06', 'Jalan A Yani', '082151365654', 'alpiannoorbanjar@gmail.com', '$2y$10$Qe8Db77Jb604hxAIjf8ca.L68kG9f264MtfZtUo1JhSZn2Mix6vVu', 2, 'Pq2zVY9AyU', 'alpiannoorbanjar@gmail.com', '2023-08-06 03:08:16', NULL, '2023-08-13 08:08:14'),
(2, '2023-08-07', 'OV4E9', '19920514 202305 2 001', 'Hasan, S.Pd', 1, 'Banjarbaru', '1990-01-01', 'Jalan A Yani', '082151365654', 'irigasoen@gmail.com', '$2y$10$M.unXitj62aVFTcu4Ab/Yu4qVPsusHDjoY7rBjK9Cr1i4vMarsnFK', 2, 'Q7T4Krg859', 'irigasoen@gmail.com', '2023-08-07 06:08:50', NULL, '2023-08-13 08:08:13'),
(3, '2023-08-11', 'LI2mh', '19651110 199504 1 010', 'Rusmilatifah, S.Pd', 2, 'Banjarmasin', '1990-08-05', 'JL. Kayu Tangi', '089724563718', 'aida29.auliasari@gmail.com', '$2y$10$ouqfAwhYh6AIM/1ZrxwnzupW4Ux94eFj4Q4Iv0n/n.tG7F0B5ICSi', 2, 'IhUwljWgS3', 'aida29.auliasari@gmail.com', '2023-08-11 11:08:55', NULL, '2023-08-11 12:08:01'),
(4, '2023-08-11', 'PRusB', '19651212 199504 1 010', 'Nanny Rismayanti, S.Pd', 2, 'Banjarmasin', '1989-08-02', 'Jl. Perdagangan', '089767584923', 'kifly.acuy@gmail.com', '$2y$10$V.KW4lHQabxJeL9ZkfcR.epKHw5NsxYbX5MUi9oyKCCPTPCB/Fl1G', 2, 'lQFUkWorgE', 'kifly.acuy@gmail.com', '2023-08-11 11:08:57', NULL, '2023-08-11 12:08:02'),
(5, '2023-08-11', 'utxNv', '19651110 199009 1 020', 'Herawati, S.Pd', 2, 'Banjarbaru', '1980-08-01', 'Jl. Simpang Anem', '089876543526', 'Herawati@gmail.com', '$2y$10$T.0Me3wov9/AgqeAdKiW2eilrmo6rXSxjRZ5Q3oU5KQ5AuFm6ZKh.', 2, 'yEsUAvg5kQ', 'Herawati@gmail.com', '2023-08-11 12:08:07', NULL, '2023-08-11 06:08:15'),
(6, '2023-08-11', '0rQ2V', '19701110 199504 1 010', 'Rapii Arsat, S.Pd', 1, 'Kotabaru', '1987-08-11', 'Jl. Teluk Dalam', '089728475856', 'rapiiarsat@gmail.com', '$2y$10$wi1li6MdYawP/6YVPm9yC.bzgcm70pjxLjxuf8h0NlovjwWZRDT/u', 2, 'EUvgFRhXBt', 'rapiiarsat@gmail.com', '2023-08-11 12:08:22', NULL, '2023-08-11 06:08:15'),
(7, '2023-08-11', 'eakl0', '19650808 199504 1 010', 'Ahmad Ansari, S.Pd', 1, 'Gambut', '1987-05-16', 'Jl. Sutoyo S', '087845367261', 'ansari@gmail.com', '$2y$10$R3GB03w.SJe4KmyXa9A9FueWwczk/qmBV2CDFx9rqJCSKhdUmb9vu', 2, 'RYq7el4IC2', 'ansari@gmail.com', '2023-08-11 12:08:24', NULL, '2023-08-11 06:08:16'),
(8, '2023-08-11', 'Bl2T1', '19560101 199004 1 010', 'Rusyihan Anwari, S.Pd', 1, 'Banjarmasin', '1989-05-15', 'Jl. Handil Bakti', '089674657834', 'rusyihan@gmail.com', '$2y$10$DQEfYNUGlhcof5vCRnRRMeZjQ4dBbMmJMd5/xcZxT.lMqaEAxrdry', 2, 'JYpeqTPSdg', 'rusyihan@gmail.com', '2023-08-11 12:08:27', NULL, '2023-08-13 08:08:13'),
(9, '2023-08-11', 'cBE7a', '19890809 199009 1 020', 'Indera Mahyuddin, S.Pd', 1, 'Banjarbaru', '1989-02-22', 'Jl. Handil Bakti', '089723456717', 'indera@gmail.com', '$2y$10$oihth6sKIBLqH2qq7NzT4OhnBVHJm.hS0UCVxTIfpHB7Sv7zml/nC', 2, 'Lh1VKF8UCt', 'indera@gmail.com', '2023-08-11 12:08:35', NULL, '2023-08-11 06:08:17'),
(10, '2023-08-11', 'lBO2D', '19661010 199003 2 010', 'Hidayat, S.Pd', 1, 'Banjarmasin', '1990-03-03', 'Jl. Kayu Tangi', '089723456718', 'hidayat@gmail.com', '$2y$10$gCYkoMa6KLeCIBZ/uPrWsuwFIMN9NYHoTOu1PykzbBPHwxmu1K1MS', 2, 'ORM8QH6jmi', 'hidayat@gmail.com', '2023-08-11 05:08:46', NULL, '2023-08-11 06:08:17'),
(11, '2023-08-11', 'eKQZk', '19890202 199006 2 010', 'Dewi Shinta, S.Pd', 2, 'Banjarmasin', '1989-02-02', 'Jl. Kayu Tangi', '089723456589', 'dewi@gmail.com', NULL, 3, NULL, 'dewi@gmail.com', '2023-08-11 05:08:51', NULL, '2023-08-13 12:08:32'),
(12, '2023-08-11', 'KLmNu', '19891212 199002 1 010', 'Riki Marliadi, S.Pd', 1, 'Banjarmasin', '1989-12-12', 'Jl. Cemara Raya', '089723452414', 'rikimarliadi@gmail.com', NULL, 3, NULL, 'rikimarliadi@gmail.com', '2023-08-11 05:08:53', NULL, '2023-08-13 12:08:32'),
(13, '2023-08-11', 'Ko3Un', '19890707 199002 1 010', 'Sugiatno, S.Pd', 1, 'Banjarmasin', '1989-07-07', 'Jl. Dahlia', '089723342516', 'sugiatno@gmail.com', NULL, 3, NULL, 'sugiatno@gmail.com', '2023-08-11 05:08:58', NULL, '2023-08-13 12:08:33'),
(14, '2023-08-11', 'lGANK', '19900808 199002 1 010', 'Suryati, S.Pd', 2, 'Banjarbaru', '1990-08-08', 'Jl. A Yani', '089723342516', 'suryati@gmail.com', NULL, 3, NULL, 'suryati@gmail.com', '2023-08-11 06:08:01', NULL, '2023-08-13 12:08:33'),
(15, '2023-08-11', 't6lAW', '19780506 199002 1 010', 'Zakiyah, S.Pd', 2, 'Banjarbaru', '1978-06-05', 'Jl. A Yani', '089845676543', 'zakiyah@gmail.com', NULL, 3, NULL, 'zakiyah@gmail.com', '2023-08-11 06:08:02', NULL, '2023-08-13 12:08:33'),
(16, '2023-08-13', 'uZEYp', '19661010 199003 2 010', 'Rachmiati, S.Pd', 2, 'Banjarbaru', '1990-08-13', 'Jl. Cemara Raya', '089723456718', 'rachmiati@gmail.com', NULL, 3, NULL, 'rachmiati@gmail.com', '2023-08-13 10:08:28', NULL, '2023-08-13 12:08:34'),
(17, '2023-08-13', 'sYvkA', '19661011 199003 2 010', 'Tria Sakti Lianti, S.Pd', 2, 'Banjarbaru', '1995-08-13', 'Jl. Cemara Raya', '089723456718', 'triasakti@gmail.com', NULL, 3, NULL, 'triasakti@gmail.com', '2023-08-13 10:08:31', NULL, '2023-08-13 12:08:34'),
(18, '2023-08-13', 'qYHMk', '19651011 199003 2 010', 'Azkiyatie, S.Pd', 2, 'Banjarbaru', '1995-08-13', 'Jl. Cemara Raya', '089723456718', 'azkiyatie@gmail.com', NULL, 3, NULL, 'azkiyatie@gmail.com', '2023-08-13 10:08:32', NULL, '2023-08-13 12:08:34'),
(19, '2023-08-13', 'iZVmL', '19651012 199003 2 010', 'Yuliansyah, S.Pd', 1, 'Banjarmasin', '1995-08-13', 'Jl. Cemara Raya', '089723456719', 'yuliansyah@gmail.com', NULL, 3, NULL, 'yuliansyah@gmail.com', '2023-08-13 10:08:33', NULL, '2023-08-13 12:08:34'),
(20, '2023-08-13', 'Wzg1w', '19651012 199003 2 010', 'Yuli Rahman, S.Pd', 1, 'Banjarmasin', '1989-08-13', 'Jl. Cemara Raya', '089723456719', 'yulirahman@gmail.com', NULL, 3, NULL, 'yulirahman@gmail.com', '2023-08-13 10:08:34', NULL, '2023-08-13 12:08:35'),
(21, '2023-08-13', 'MUXBe', '19661010 199003 2 010', 'Mutiara Zahra, S.Pd', 2, 'Banjarmasin', '1990-08-13', 'Jl. Cemara Raya', '089723456718', 'mutiara@gmail.com', NULL, 1, NULL, 'mutiara@gmail.com', '2023-08-13 12:08:28', NULL, NULL),
(22, '2023-08-13', 'bXp7N', '19660808 199003 2 010', 'Rizki Aulia Rahman, S.Pd', 1, 'Banjarmasin', '1990-08-13', 'Jl. Cemara Raya', '089723456719', 'rizki@gmail.com', NULL, 1, NULL, 'rizki@gmail.com', '2023-08-13 12:08:29', NULL, NULL),
(23, '2023-08-13', 'fwNpd', '19651011 199003 2 010', 'Akmal Maulana Rahman, S.Pd', 1, 'Banjarmasin', '1990-08-09', 'Jl. Kayu Tangi', '089723456713', 'akmal@gmail.com', NULL, 1, NULL, 'akmal@gmail.com', '2023-08-13 12:08:30', NULL, NULL),
(24, '2023-08-13', 'mEh7k', '19901010 199003 2 010', 'Rizka Aziza Putri, S.Pd', 2, 'Banjarmasin', '1990-08-01', 'Jl. Kayu Tangi', '089723456714', 'rizka@gmail.com', NULL, 1, NULL, 'rizka@gmail.com', '2023-08-13 12:08:31', NULL, NULL),
(25, '2023-08-13', 'TLK58', '19901010 199003 2 010', 'Heliya Fitri, S.Pd', 2, 'Banjarmasin', '1990-07-30', 'Jl. A Yani', '089723451213', 'heliya@gmail.com', NULL, 1, NULL, 'heliya@gmail.com', '2023-08-13 12:08:37', NULL, NULL),
(26, '2023-08-13', 'bmSTD', '19901010 199003 2 010', 'Oktavia, S.Pd', 2, 'Kotabaru', '1990-07-26', 'Jl. A Yani', '089723451010', 'Oktavia@gmail.com', NULL, 1, NULL, 'Oktavia@gmail.com', '2023-08-13 12:08:38', NULL, NULL),
(27, '2023-08-13', 'eHkGh', '19901015 199003 2 010', 'Ismi Rezani, S.Pd', 1, 'Banjarbaru', '1990-07-22', 'Jl. Beruntung Baru', '089723451009', 'ismi@gmail.com', NULL, 1, NULL, 'ismi@gmail.com', '2023-08-13 12:08:38', NULL, NULL),
(28, '2023-08-13', '4bISw', '19901015 199003 2 010', 'Nina Aprianti S.Pd', 2, 'Banjarbaru', '1990-07-16', 'Jl. Cemara Raya', '089723451008', 'Nina@gmail.com', NULL, 1, NULL, 'Nina@gmail.com', '2023-08-13 12:08:39', NULL, NULL),
(29, '2023-08-13', '8ePGV', '19901015 199003 2 010', 'Fikri Aprialdi, S.Pd', 1, 'Banjarmasin', '1990-07-09', 'Jl. Cemara Raya', '089723451076', 'fikri@gmail.com', NULL, 1, NULL, 'fikri@gmail.com', '2023-08-13 12:08:40', NULL, NULL),
(30, '2023-08-13', 'yYAtr', '19901015 199003 2 010', 'Ihsan Ahdi, S.Pd', 1, 'Banjarmasin', '1990-07-03', 'Jl. Cemara Raya', '089723451089', 'ihsan@gmail.com', NULL, 1, NULL, 'ihsan@gmail.com', '2023-08-13 12:08:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `urutan`, `nama_jabatan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Administrator', 'alpian', '2022-05-26 00:00:00', NULL, NULL),
(3, 2, 'Kepala Sekolah', 'admin', '2022-06-14 09:06:20', NULL, '2022-07-20 04:07:28'),
(4, 3, 'Guru', 'admin', '2022-06-14 09:06:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawabanlatihanganda`
--

CREATE TABLE `jawabanlatihanganda` (
  `id_jawabanlatihanganda` int(11) NOT NULL,
  `id_latihansoalganda` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawabanlatihanganda`
--

INSERT INTO `jawabanlatihanganda` (`id_jawabanlatihanganda`, `id_latihansoalganda`, `id_siswa`, `jawaban`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 1, 'A', 'maulida.rahmasari@gmail.com', '2023-08-07 06:08:43', NULL, NULL),
(2, 2, 2, 'A', 'adm.pnbatulicin@gmail.com', '2023-08-07 07:08:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jawabanlatihanisian`
--

CREATE TABLE `jawabanlatihanisian` (
  `id_jawabanlatihanisian` int(11) NOT NULL,
  `id_latihansoalisian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` text,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawabanlatihanisian`
--

INSERT INTO `jawabanlatihanisian` (`id_jawabanlatihanisian`, `id_latihansoalisian`, `id_siswa`, `jawaban`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 1, 'Basic Input Output System ', 'maulida.rahmasari@gmail.com', '2023-08-07 06:08:43', NULL, NULL),
(2, 2, 2, 'Local Area Network', 'adm.pnbatulicin@gmail.com', '2023-08-07 07:08:14', 'adm.pnbatulicin@gmail.com', '2023-08-07 07:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `jenistagihan`
--

CREATE TABLE `jenistagihan` (
  `id_jenistagihan` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama_jenistagihan` varchar(100) NOT NULL,
  `nominal` double NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenistagihan`
--

INSERT INTO `jenistagihan` (`id_jenistagihan`, `kode`, `nama_jenistagihan`, `nominal`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(3, 'i4l1X', 'Biaya Les Mata Pelajaran', 30000, 1, 'admin', '2023-07-29 09:07:17', 'admin', '2023-08-06 06:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `kalenderpendidikan`
--

CREATE TABLE `kalenderpendidikan` (
  `id_kalenderpendidikan` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalenderpendidikan`
--

INSERT INTO `kalenderpendidikan` (`id_kalenderpendidikan`, `id_tahunajaran`, `tanggal`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 3, '2023-06-01', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(2, 3, '2023-06-02', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(3, 3, '2023-06-03', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(4, 3, '2023-06-05', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(5, 3, '2023-06-06', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(6, 3, '2023-06-07', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(7, 3, '2023-06-08', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(8, 3, '2023-06-09', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(9, 3, '2023-06-10', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(10, 3, '2023-06-12', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(11, 3, '2023-06-13', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(12, 3, '2023-06-14', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(13, 3, '2023-06-15', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(14, 3, '2023-06-16', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(15, 3, '2023-06-17', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(16, 3, '2023-06-19', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(17, 3, '2023-06-20', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(18, 3, '2023-06-21', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(19, 3, '2023-06-22', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(20, 3, '2023-06-23', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(21, 3, '2023-06-24', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(22, 3, '2023-06-26', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(23, 3, '2023-06-27', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(24, 3, '2023-06-28', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(25, 3, '2023-06-29', 'admin', '2023-06-14 12:06:28', NULL, NULL),
(26, 3, '2023-06-30', 'admin', '2023-06-14 12:06:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoriortuwali`
--

CREATE TABLE `kategoriortuwali` (
  `id_kategoriortuwali` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_kategoriortuwali` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoriortuwali`
--

INSERT INTO `kategoriortuwali` (`id_kategoriortuwali`, `urutan`, `nama_kategoriortuwali`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Ayah', 'System', '2022-06-12 00:00:00', NULL, NULL),
(2, 2, 'Ibu', 'System', '2022-06-12 00:00:00', NULL, NULL),
(3, 3, 'Wali', 'System', '2022-06-12 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `urutan`, `nama_kelas`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'X', 1, 'system', '2023-08-07 00:00:00', NULL, NULL),
(2, 2, 'XI', 1, 'system', '2023-08-07 00:00:00', NULL, NULL),
(3, 3, 'XII', 1, 'system', '2023-08-07 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelasguru`
--

CREATE TABLE `kelasguru` (
  `id_kelasguru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelasguru`
--

INSERT INTO `kelasguru` (`id_kelasguru`, `id_guru`, `id_kelas`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(3, 1, 1, 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 07:08:25', NULL, NULL),
(4, 1, 2, 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 09:08:11', NULL, NULL),
(5, 2, 1, 1, 'irigasoen@gmail.com', '2023-08-07 06:08:54', NULL, NULL),
(6, 3, 2, 1, 'aida29.auliasari@gmail.com', '2023-08-13 08:08:17', NULL, NULL),
(7, 3, 3, 1, 'aida29.auliasari@gmail.com', '2023-08-13 08:08:18', NULL, NULL),
(8, 9, 3, 1, 'indera@gmail.com', '2023-08-13 08:08:18', NULL, NULL),
(9, 4, 2, 1, 'kifly.acuy@gmail.com', '2023-08-13 08:08:58', NULL, NULL),
(10, 7, 2, 1, 'ansari@gmail.com', '2023-08-13 09:08:00', NULL, NULL),
(11, 7, 3, 1, 'ansari@gmail.com', '2023-08-13 09:08:00', NULL, NULL),
(12, 10, 2, 1, 'hidayat@gmail.com', '2023-08-13 09:08:02', NULL, NULL),
(13, 5, 1, 1, 'Herawati@gmail.com', '2023-08-13 09:08:03', NULL, NULL),
(14, 5, 2, 1, 'Herawati@gmail.com', '2023-08-13 09:08:04', NULL, NULL),
(15, 6, 1, 1, 'rapiiarsat@gmail.com', '2023-08-13 09:08:06', NULL, NULL),
(16, 8, 3, 1, 'rusyihan@gmail.com', '2023-08-13 09:08:06', NULL, NULL),
(17, 2, 2, 1, 'irigasoen@gmail.com', '2023-08-13 09:08:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelassiswa`
--

CREATE TABLE `kelassiswa` (
  `id_kelassiswa` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelassiswa`
--

INSERT INTO `kelassiswa` (`id_kelassiswa`, `id_tahunajaran`, `id_guru`, `id_kelas`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 3, 1, 15, 1, 'alpiannoorbanjar@gmail.com', '2023-07-27 03:07:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_les` int(11) NOT NULL,
  `id_jenispengirim` int(1) NOT NULL DEFAULT '1',
  `id_pengirim` int(11) NOT NULL,
  `isi_komentar` text,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `tanggal`, `kode`, `id_les`, `id_jenispengirim`, `id_pengirim`, `isi_komentar`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(4, '1970-01-01', 'zgxXapK7El', 5, 2, 1, 'Asalamualaikum permisi izin bertanya pak', 'maulida.rahmasari@gmail.com', '2023-08-07 03:08:42', NULL, NULL),
(5, '1970-01-01', 'iSusE9cx2H', 5, 1, 1, 'Iya ada apa lida?', 'alpiannoorbanjar@gmail.com', '2023-08-07 03:08:49', NULL, NULL),
(6, '1970-01-01', 'NuH2ohKWj1', 7, 2, 2, 'Asalamulaiakum Pak', 'adm.pnbatulicin@gmail.com', '2023-08-07 07:08:16', NULL, NULL),
(7, '1970-01-01', 'bxfzQecV3I', 7, 1, 2, 'walaikumsalam, iya ada apa', 'irigasoen@gmail.com', '2023-08-07 07:08:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id_latihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_les` int(11) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id_latihan`, `tanggal`, `kode`, `id_les`, `judul`, `keterangan`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '2023-08-06', 'kXPxG81K7Y', 6, 'Latihan 1', 'Kerjakan latihan 1 dengan cermat', 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 11:08:32', 'alpiannoorbanjar@gmail.com', '2023-08-06 11:08:51'),
(2, '2023-08-07', 'Gwe1CHyxcX', 5, 'Latihan Komputer dan Jaringan Part 1', 'Jawab latihan dengan cermat', 1, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:50', NULL, NULL),
(3, '2023-08-07', 'qQXDTnCaAd', 7, 'Latihan Komputer dan Jaringan Part 1', 'Kerjakan dengan cermat', 1, 'irigasoen@gmail.com', '2023-08-07 06:08:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `latihansoalganda`
--

CREATE TABLE `latihansoalganda` (
  `id_latihansoalganda` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_soalganda` int(11) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihansoalganda`
--

INSERT INTO `latihansoalganda` (`id_latihansoalganda`, `id_latihan`, `id_soalganda`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 2, 2, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:58', NULL, NULL),
(2, 3, 3, 'irigasoen@gmail.com', '2023-08-07 06:08:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `latihansoalisian`
--

CREATE TABLE `latihansoalisian` (
  `id_latihansoalisian` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_soalisian` int(11) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihansoalisian`
--

INSERT INTO `latihansoalisian` (`id_latihansoalisian`, `id_latihan`, `id_soalisian`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 2, 6, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:59', NULL, NULL),
(2, 3, 7, 'irigasoen@gmail.com', '2023-08-07 06:08:59', NULL, NULL),
(3, 1, 5, 'irigasoen@gmail.com', '2023-08-13 01:08:56', NULL, NULL),
(4, 1, 21, 'irigasoen@gmail.com', '2023-08-13 01:08:56', NULL, NULL),
(5, 1, 22, 'irigasoen@gmail.com', '2023-08-13 01:08:56', NULL, NULL),
(6, 1, 23, 'irigasoen@gmail.com', '2023-08-13 01:08:56', NULL, NULL),
(7, 1, 24, 'irigasoen@gmail.com', '2023-08-13 01:08:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `les`
--

CREATE TABLE `les` (
  `id_les` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `id_kelasguru` int(11) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif;2=tidak',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `les`
--

INSERT INTO `les` (`id_les`, `kode`, `id_tahunajaran`, `id_matapelajaran`, `id_kelasguru`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(5, 'vAK8V', 3, 1, 3, 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 09:08:17', NULL, NULL),
(6, 'DFNax', 3, 1, 5, 0, 'alpiannoorbanjar@gmail.com', '2023-08-06 09:08:18', 'alpiannoorbanjar@gmail.com', '2023-08-11 11:08:27'),
(8, 'MT49c', 3, 1, 4, 1, 'alpiannoorbanjar@gmail.com', '2023-08-11 11:08:27', NULL, NULL),
(10, 'Wz91J', 3, 2, 8, 1, 'indera@gmail.com', '2023-08-13 08:08:26', NULL, NULL),
(11, '2XlAt', 3, 2, 6, 1, 'aida29.auliasari@gmail.com', '2023-08-13 08:08:27', NULL, NULL),
(12, 'EBTti', 3, 2, 7, 1, 'aida29.auliasari@gmail.com', '2023-08-13 08:08:27', NULL, NULL),
(13, 'WK5OT', 3, 3, 9, 1, 'kifly.acuy@gmail.com', '2023-08-13 08:08:58', NULL, NULL),
(14, 'Lvu8T', 3, 3, 10, 1, 'ansari@gmail.com', '2023-08-13 09:08:01', NULL, NULL),
(15, 'cb945', 3, 3, 11, 1, 'ansari@gmail.com', '2023-08-13 09:08:01', NULL, NULL),
(16, 'p6I1O', 3, 3, 12, 1, 'hidayat@gmail.com', '2023-08-13 09:08:03', NULL, NULL),
(19, 'TO01l', 3, 4, 13, 1, 'Herawati@gmail.com', '2023-08-13 09:08:04', NULL, NULL),
(20, '7ondM', 3, 4, 14, 1, 'Herawati@gmail.com', '2023-08-13 09:08:05', NULL, NULL),
(21, '26K5u', 3, 4, 15, 1, 'rapiiarsat@gmail.com', '2023-08-13 09:08:06', NULL, NULL),
(22, 'rjqoI', 3, 4, 16, 1, 'rusyihan@gmail.com', '2023-08-13 09:08:07', NULL, NULL),
(25, 'kU6Y9', 3, 1, 17, 1, 'irigasoen@gmail.com', '2023-08-13 09:08:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `urutan`, `nama_level`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Administrator', 'System', '2023-06-24 00:00:00', NULL, NULL),
(2, 2, 'Kepala Sekolah', 'System', '2023-06-24 00:00:00', NULL, NULL),
(3, 3, 'Guru', 'System', '2023-06-24 00:00:00', NULL, NULL),
(4, 4, 'Siswa', 'admin', '2023-07-08 04:07:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id_matapelajaran` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matapelajaran`, `urutan`, `nama_matapelajaran`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Komputer dan Jaringan', 1, 'admin', '2023-07-27 00:00:00', 'admin', '2023-08-06 06:08:53'),
(2, 2, 'Bahasa Inggris', 1, 'admin', '2023-07-28 12:07:48', 'admin', '2023-07-28 12:07:48'),
(3, 3, 'Bahasa Indonesia ', 1, 'admin', '2023-07-28 09:07:18', NULL, NULL),
(4, 4, 'Matematika', 1, 'admin', '2023-08-06 06:08:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_les` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `file` text,
  `link` text,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `tanggal`, `kode`, `id_les`, `nama_materi`, `file`, `link`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(2, '2023-08-06', 'ukmrVz9osd', 6, 'Talking About Self', 'SfivZIWuM9TjqVBR.pdf', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/RFUJj6cS_qw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen&gt;&lt;/iframe&gt;', 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 09:08:55', NULL, NULL),
(3, '2023-08-07', 'c6IKOGmCF1', 5, 'Pengenalan Komputer', '39zNUZJ682QaBO0X.pdf', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/eQZzRbAXct8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen&gt;&lt;/iframe&gt;', 1, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:46', NULL, NULL),
(4, '2023-08-07', 'KMFedH8V1E', 7, 'Komputer 123', 'LiyKf0Eh8ojVcUbd.pdf', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/WPhjxoVDygk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen&gt;&lt;/iframe&gt;', 1, 'irigasoen@gmail.com', '2023-08-07 06:08:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'admin',
  `aktif` int(11) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL DEFAULT '2022-05-21 10:00:00',
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `urutan`, `nama_menu`, `url`, `icon`, `keterangan`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Beranda', 'admin', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(2, 2, 'Master', 'master', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(3, 3, 'Register', 'register', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(4, 4, 'Laporan', 'laporan', 'nav-icon fas fa-tachometer-alt', 'admin', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(5, 1, 'Beranda', 'pengguna', 'nav-icon fas fa-tachometer-alt', 'pengguna', 1, 'system', '2022-05-21 10:00:00', NULL, NULL),
(6, 5, 'Profil', 'profil', 'nav-icon fas fa fa-user', 'pengguna', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(8, 2, 'Kelas Siswa', 'guru/kelassiswa', 'nav-icon fas fa-tachometer-alt', 'nav-icon fas fa-tachometer-alt', 1, 'admin', '2023-05-15 11:05:31', 'admin', '2023-07-27 02:07:56'),
(9, 2, 'Monitoring Siswa', 'ortu', 'nav-icon fas fa-tachometer-alt', 'nav-icon fas fa-tachometer-alt', 1, 'admin', '2023-05-15 11:05:54', NULL, NULL),
(10, 1, 'Beranda', 'siswa', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-08 04:07:56', NULL, NULL),
(11, 4, 'Materi', 'kelassiswa/materi', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-08 05:07:45', NULL, NULL),
(12, 3, 'Materi', 'siswa/materi', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-08 06:07:48', NULL, NULL),
(13, 1, 'Beranda', 'guru', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-26 06:07:34', NULL, NULL),
(14, 3, 'Les', 'guru/les', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-26 07:07:00', 'admin', '2023-08-06 07:08:35'),
(15, 2, 'Mata Pelajaran', 'siswa/matapelajaran', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-07-28 12:07:55', NULL, NULL),
(16, 2, 'Kelas', 'guru/kelasguru', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-08-06 07:08:02', NULL, NULL),
(17, 2, 'Kelas', 'siswa', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-08-07 12:08:00', NULL, NULL),
(18, 3, 'Riwayat Pembayaran', 'siswa/pembayaran', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-08-07 10:08:20', 'admin', '2023-08-07 10:08:21'),
(19, 5, 'Saldo', 'guru/saldo', 'fas fa-fw fa-tachometer-alt', 'fas fa-fw fa-tachometer-alt', 1, 'admin', '2023-08-07 03:08:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilaiangka` double NOT NULL,
  `keterangan` text,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `tanggal`, `id_latihan`, `id_siswa`, `nilaiangka`, `keterangan`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '2023-08-07', 2, 1, 100, NULL, 1, 'alpiannoorbanjar@gmail.com', '2023-08-07 06:08:45', NULL, NULL),
(2, '2023-08-07', 3, 2, 90, NULL, 1, 'irigasoen@gmail.com', '2023-08-07 07:08:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ortuwali`
--

CREATE TABLE `ortuwali` (
  `id_ortuwali` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kategoriortuwali` int(1) NOT NULL DEFAULT '1' COMMENT '1=ayah,2=ibu,3=wali',
  `nik` varchar(50) DEFAULT NULL,
  `nama_ortuwali` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(100) DEFAULT 'Tidak Bekerja',
  `nohp` varchar(13) DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `id_jabatan` int(11) DEFAULT NULL,
  `id_golpangkat` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(13) DEFAULT NULL,
  `foto` varchar(225) NOT NULL DEFAULT 'default.jpg',
  `ktp` text,
  `kk` text,
  `ijazah` text,
  `id_pendidikan` int(11) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1' COMMENT '1=aktif,2=tidak',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `id_jeniskelamin`, `id_jabatan`, `id_golpangkat`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nohp`, `foto`, `ktp`, `kk`, `ijazah`, `id_pendidikan`, `tmt`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '198802012017061002', 'Administrator', 2, 1, NULL, 'Martapura', '1988-02-01', 'Komplek Plajau Indah Blok B2 Nomor 3', '082151365654', 'iYmfWRpt3SHbXKC9.png', NULL, NULL, NULL, NULL, NULL, 1, 'system', '2022-05-16 00:00:00', 'admin', '2022-07-20 04:07:27'),
(22, '19651110 199003 2 010', 'Dr. Hj. Djunaidah, M.Pd', 2, 3, NULL, 'Jember', '1965-11-10', 'Jalan Ahmad Yani', '082151365654', 'Qri7D3xtRaZO50KS.jpeg', 'swDfR754bxhONcKv1.png', 'swDfR754bxhONcKv2.png', 'swDfR754bxhONcKv.png', 1, '2022-06-14', 1, 'admin', '2023-06-14 12:06:30', 'admin', '2023-07-22 12:07:48'),
(23, '19790717 201406 2 003', 'Herawati,S.SI', 2, 4, NULL, 'Banjarmasin', '1979-07-17', 'Jalan HKSN', '082151365654', 'QLbNnJRpOjZGEszA.jpg', 'GMmy20qscAWFNZtC1.png', 'GMmy20qscAWFNZtC2.png', 'GMmy20qscAWFNZtC.png', 1, '2023-06-24', 1, 'admin', '2023-06-24 05:06:58', 'admin', '2023-07-22 01:07:12'),
(24, '19820608 201101 2 001', 'Mastora, S.Pd', 2, 4, NULL, 'Sei Jelai, Banjar', '1982-06-08', 'JL. Kayutangi', '089956742314', 'VbG5Oe13dR8SkaT4.jpg', NULL, NULL, NULL, 2, '2023-07-22', 1, 'admin', '2023-07-22 01:07:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_ttd`
--

CREATE TABLE `pejabat_ttd` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_golpangkat` int(11) DEFAULT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pejabat_ttd`
--

INSERT INTO `pejabat_ttd` (`id_pegawai`, `nip`, `nama_pegawai`, `id_jabatan`, `id_golpangkat`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(2, '19651110 199003 2 010', 'Dr. Hj. Djunaidah, M.Pd', 2, 1, 1, 'system', '2022-05-16 00:00:00', 'admin', '2022-06-14 09:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_pemasukan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_sumberpemasukan` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `kode_pemasukan`, `tanggal`, `id_sumberpemasukan`, `nominal`, `keterangan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(7, 'PM00001', '2023-06-14', 1, 5000000, 'Dana Bantuan BOS', 'admin', '2023-06-14 12:06:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_les` int(11) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `atasnama` varchar(100) DEFAULT NULL,
  `namabank` varchar(100) DEFAULT NULL,
  `norekening` varchar(100) DEFAULT NULL,
  `file` text,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode`, `id_siswa`, `id_les`, `id_biaya`, `tanggal`, `nominal`, `id_status`, `atasnama`, `namabank`, `norekening`, `file`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'gOAG89uocB', 1, 5, 1, '2023-08-07', 10000, 3, 'Maulida', 'BNI', '3484949', 'jHDZiOmgbaCL7YTU.jpg', 'Umum', '2023-08-07 06:08:30', 'admin', '2023-08-07 06:08:38'),
(5, 'qsGJcUtAVj', 2, 7, 1, '2023-08-07', 10000, 3, 'Asyraf', 'BRI', '23482349', 'p94YkHJZiTtXr8Dn.jpg', 'Umum', '2023-08-07 07:08:11', 'admin', '2023-08-07 07:08:13'),
(6, 'fjzhCoYE7U', 3, 5, 1, '2023-08-13', 10000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:11', NULL, NULL),
(7, '0wsHdgEJRD', 3, 6, 1, '2023-08-13', 10000, 2, 'Rafiah', 'BNI', '346778789', 'zRxa41DmAKtPOH93.jpg', 'Umum', '2023-08-13 09:08:12', 'rafiah@gmail.com', '2023-08-13 09:08:12'),
(8, 'ro8uOSCn12', 3, 19, 1, '2023-08-13', 10000, 3, 'Rafiah', 'BNI', '4433656776', 'P5mbISZpgrRqGOF3.jpg', 'Umum', '2023-08-13 09:08:13', 'admin', '2023-08-13 09:08:14'),
(9, '9JvqlVQxYC', 4, 13, 2, '2023-08-13', 20000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:17', NULL, NULL),
(10, 'CsLrfl4qbm', 4, 14, 2, '2023-08-13', 20000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:18', NULL, NULL),
(11, 'UCT7npBQ0o', 4, 11, 2, '2023-08-13', 20000, 3, 'Haikal', 'BRI', '356789987', 'l6cYJnLbF5Ho1ZBj.jpg', 'Umum', '2023-08-13 09:08:18', 'admin', '2023-08-13 09:08:27'),
(12, 'Nq2KuTzLAy', 5, 12, 3, '2023-08-13', 30000, 3, 'Sugianoor', 'Kalsel', '546456664', 'yMs5aZ64hdeQq9nW.jpg', 'Umum', '2023-08-13 09:08:21', 'admin', '2023-08-13 09:08:27'),
(13, 'HPMvNtQYui', 5, 10, 3, '2023-08-13', 30000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:21', NULL, NULL),
(14, 'B3702Sy9xJ', 5, 22, 3, '2023-08-13', 30000, 2, 'Sugianoor', 'Kalsel', '4433656776', 'AbJEuv84eTOLRYtF.jpg', 'Umum', '2023-08-13 09:08:22', 'sugianoor@gmail.com', '2023-08-13 09:08:22'),
(15, 'W1pDVYeCad', 5, 15, 3, '2023-08-13', 30000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:22', NULL, NULL),
(16, 'cArlq9axFe', 6, 13, 2, '2023-08-13', 20000, 3, 'Nanda', 'BRI', '567787878', 'q5AKaxJkLTzID0PV.jpg', 'Umum', '2023-08-13 09:08:23', 'admin', '2023-08-13 09:08:32'),
(17, 'leURmzDX0P', 6, 16, 2, '2023-08-13', 20000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:24', NULL, NULL),
(18, 'NGfPhwqDTX', 6, 20, 2, '2023-08-13', 20000, 2, 'Nanda', 'BRI', '566534535665', 'VK9DL18kONiGCBRH.jpg', 'Umum', '2023-08-13 09:08:24', 'nanda@gmail.com', '2023-08-13 09:08:25'),
(19, 'd1tbPiu6o4', 6, 11, 2, '2023-08-13', 20000, 2, 'Nanda', 'BRI', '56777677', 'TGN2j1DSryOdtU9c.jpg', 'Umum', '2023-08-13 09:08:25', 'nanda@gmail.com', '2023-08-13 09:08:49'),
(20, 'HKCzDNxb0m', 7, 5, 1, '2023-08-13', 10000, 3, 'Joyodi', 'BRI', '56767677', 'meQqZ8Fod7JYUVfb.jpg', 'Umum', '2023-08-13 09:08:28', 'admin', '2023-08-13 09:08:33'),
(21, '7NfXDnmIYg', 7, 6, 1, '2023-08-13', 10000, 2, 'Joyodi', 'BRI', '56767677', 'buVWxmP01MYgGTqf.jpg', 'Umum', '2023-08-13 09:08:29', 'joyodi@gmail.com', '2023-08-13 09:08:30'),
(22, 'NPx0vq614F', 7, 19, 1, '2023-08-13', 10000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:30', NULL, NULL),
(23, '6DSQM9Ac7z', 7, 21, 1, '2023-08-13', 10000, 2, 'Joyodi', 'BRI', '56767677', 'gxvJKS5TG3I892CW.jpg', 'Umum', '2023-08-13 09:08:30', 'joyodi@gmail.com', '2023-08-13 09:08:30'),
(24, 'Nlg5pFIYjt', 8, 12, 3, '2023-08-13', 30000, 3, 'Ismawati', 'Kalsel', '67885667', 'hu08HORgw1t9G6xs.jpg', 'Umum', '2023-08-13 09:08:36', 'admin', '2023-08-13 09:08:42'),
(25, 'F4tlSEGOjy', 8, 10, 3, '2023-08-13', 30000, 2, 'Ismawati', 'Kalsel', '67885667', 'eImfX7A9dic6YS1M.jpg', 'Umum', '2023-08-13 09:08:36', 'ismawati@gmail.com', '2023-08-13 09:08:37'),
(26, 'FhD5wRvjoI', 8, 15, 3, '2023-08-13', 30000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:37', NULL, NULL),
(27, 'a0WZwvpG7C', 9, 13, 2, '2023-08-13', 20000, 3, 'Ernawati', 'BNI', '567888999', '8dG9RJUSKVOTlEFn.jpg', 'Umum', '2023-08-13 09:08:38', 'admin', '2023-08-13 09:08:42'),
(28, 'nwZuBNfhkb', 9, 16, 2, '2023-08-13', 20000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:38', NULL, NULL),
(29, '3xSntBDjEX', 9, 11, 2, '2023-08-13', 20000, 2, 'Ernawati', 'BNI', '56767677', 'pCN2HE6OxA0YImkB.jpg', 'Umum', '2023-08-13 09:08:39', 'ernawati@gmail.com', '2023-08-13 09:08:39'),
(30, 'FYfmIa51Mn', 9, 20, 2, '2023-08-13', 20000, 2, 'Ernawati', 'BNI', '56767677', 'gM35bBrWpO6PFvHf.jpg', 'Umum', '2023-08-13 09:08:40', 'ernawati@gmail.com', '2023-08-13 09:08:40'),
(31, 'jirKp8DBPU', 19, 5, 1, '2023-08-13', 10000, 3, 'Dwi Ananda', 'Kalsel', '5768787899', 'LVoeyHrnIqsUXP9l.jpg', 'Umum', '2023-08-13 09:08:44', 'admin', '2023-08-13 09:08:47'),
(32, 'Hy2v6Uox7A', 19, 19, 1, '2023-08-13', 10000, 2, 'Dwi Ananda', 'Kalsel', '5768787899', 'VXGaOLzwvgjNx7pu.jpg', 'Umum', '2023-08-13 09:08:45', 'dwianandaa02@gmail.com', '2023-08-13 09:08:45'),
(33, 'VLEKITQzlJ', 19, 21, 1, '2023-08-13', 10000, 1, NULL, NULL, NULL, NULL, 'Umum', '2023-08-13 09:08:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranguru`
--

CREATE TABLE `pendaftaranguru` (
  `id_pendaftaranguru` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_pendidikan` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `urutan`, `nama_pendidikan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'SMA', 'System', '2022-06-12 00:00:00', NULL, NULL),
(2, 2, 'S1', 'System', '2022-06-12 00:00:00', NULL, NULL),
(3, 3, 'S2', 'System', '2022-06-12 00:00:00', NULL, NULL),
(4, 4, 'S3', 'System', '2022-06-12 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_sumberpengeluaran` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `kode_pengeluaran`, `tanggal`, `id_sumberpengeluaran`, `nominal`, `keterangan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(7, 'PN00001', '2023-06-14', 2, 500000, 'Pengecatan Gedung Musola', 'admin', '2023-06-14 12:06:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `token` varchar(50) NOT NULL,
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `nama_pengguna`, `username`, `password`, `id_level`, `aktif`, `token`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Administrator', 'admin', '$2y$10$71IF8kzZE.WN8OkvApbt1unbL2s37OGVIDu6DzKfiF0qOuEyXd9Mm', 1, 1, 'SxKpmyh47e', 'system', '0000-00-00 00:00:00', 'admin', '2022-06-14 08:06:31'),
(4, 22, 'Dr. Hj. Djunaidah, M.Pd', 'kepsek', '$2y$10$go1FlbzUg.oSezMC/2bGA.IaQB/tBOf5pzgIDGWXI4utsTh/DLkXS', 2, 1, 'Bp7uaJDoVS', 'admin', '2023-07-22 01:07:19', NULL, NULL),
(5, 23, 'Herawati,S.SI', 'herawati', '$2y$10$zLUkavPg3Rn7yDBahOAU2eo9UH3uBcBp32CGPsqLewrPTG8FalNvC', 3, 1, '2PIGFRrTol', 'admin', '2023-07-22 01:07:20', 'admin', '2023-07-22 08:07:58'),
(6, 24, 'Mastora, S.Pd', 'mastora', '$2y$10$JIEvFZObgx3wm8mYuQMhN.Lk4b/UziQrPpzmz859zLHMJOzBkNVti', 3, 1, 'tgvkOyDWhQ', 'admin', '2023-07-22 01:07:20', 'admin', '2023-07-22 08:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `tanggal_akhir` date NOT NULL,
  `tempat` varchar(100) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `syarat` text,
  `kontak` varchar(20) DEFAULT NULL,
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tanggal`, `nomor_surat`, `perihal`, `tanggal_pendaftaran`, `tanggal_akhir`, `tempat`, `syarat`, `kontak`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(6, '2023-07-01', '01/SRT/SMA-06/2023', 'Pendaftaran Penerimaan Peserta Didik Baru 2023', '2023-07-03', '2023-07-31', 'Online ', 'Fotocopy Ijazah Terakhir', '082151365654', 'admin', '2023-07-22 01:07:53', NULL, NULL),
(7, '2023-07-06', '02/SRT/SMA-06/2023', 'Pengumuman Lulus ', '2023-07-07', '2023-07-07', 'Web PPDB atau Papan Pengumuman di Sekolah', '.', '089678564727', 'admin', '2023-07-22 01:07:38', NULL, NULL),
(8, '2023-07-09', '03/SRT/SMA-06/2023', 'Daftar Ulang ', '2023-07-10', '2023-07-12', 'Sekolah', '.', '098768574678', 'admin', '2023-07-22 01:07:40', NULL, NULL),
(9, '2023-07-15', '04/SRT/SMA-06/2023', 'Persiapan Pelaksanaan Masa Pengenalan Lingkungan Sekolah', '2023-07-14', '2023-07-14', 'Sekolah', '.', '098723457869', 'admin', '2023-07-22 01:07:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nama_aplikasi` text,
  `singkatan` varchar(50) DEFAULT NULL,
  `nama_profil` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'logo.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_aplikasi`, `singkatan`, `nama_profil`, `alamat`, `fax`, `telepon`, `kodepos`, `email`, `website`, `logo`) VALUES
(1, 'APLIKASI MEDIA PEMBELAJARAN INTERAKTIF PADA SMA NEGERI 6 BANJARMASIN BERBASIS WEB', 'AJARI', ' SMA Negeri 6 Banjarmasin', 'Jl. Belitung Darat No. 130 Banjarmasin', '(0511) 3353175', '05113353175', '70121', 'admin@sman6-bjm.sch.id', 'www.sman6-bjm.sch.id', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jeniskelamin` int(1) NOT NULL DEFAULT '1' COMMENT '1=Laki-laki,2=Perempuan',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `token` text,
  `user_input` varchar(100) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(100) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `tanggal`, `kode`, `nis`, `nama`, `id_jeniskelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nohp`, `email`, `password`, `id_status`, `token`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, '2023-08-06', 'nDNmz', '6757', 'Maulida Rahmasari', 2, 'Banjarbaru', '2007-09-01', 'Jalan A Yani', '085251243583', 'maulida.rahmasari@gmail.com', '$2y$10$tO5yo.IgQUt2rUsGdFEjTuYHIQkvX19/xrCWz0TZHeY04ElOOShTK', 2, '10b3RsZwW2', 'maulida.rahmasari@gmail.com', '2023-08-06 04:08:12', NULL, '2023-08-12 04:08:13'),
(2, '2023-08-07', '1q0hF', '2343', 'Asyraf', 1, 'Martapura', '2005-08-07', 'Jalan Kamboja', '082151365654', 'adm.pnbatulicin@gmail.com', '$2y$10$QkyvUlD9XjZmLSKkajbAdeQMfYz9zXFBOAHpUhq8hclu/geJyr8R2', 2, 'niI9PMyt7B', 'adm.pnbatulicin@gmail.com', '2023-08-07 07:08:00', NULL, '2023-08-12 04:08:13'),
(3, '2023-08-12', '6wF8G', '7070', 'Rafiah', 2, 'Banjarmasin', '2005-08-12', 'Jl. Kuin Selatan', '089678654321', 'rafiah@gmail.com', '$2y$10$Qaoq16XPnrq5kcFWy7t0ael9FXuUuJQs9X434rnK7kXyB81lutOpK', 2, '2O7FZALT0s', 'rafiah@gmail.com', '2023-08-12 04:08:11', NULL, '2023-08-13 07:08:23'),
(4, '2023-08-12', 'al9mf', '7071', 'Haikal', 1, 'Banjarmasin', '2005-08-02', 'Jl. Perdagangan', '089687969876', 'haikal@gmail.com', '$2y$10$QX/3I2uAh4e3pcagn2xgreTG0sYp54s00A8EPTfiTYmoHMSoIBycm', 2, 'eKoEUlQ3vb', 'haikal@gmail.com', '2023-08-12 04:08:15', NULL, '2023-08-13 07:08:24'),
(5, '2023-08-12', 'J8SvL', '6776', 'Sugianoor', 1, 'Banjarbaru', '2005-12-12', 'Jl. Simpang Anem', '089729356789', 'sugianoor@gmail.com', '$2y$10$ME4relZ2n4ufElPw3Q0lXeC88vW6/qqK02pPGP9BE9ekpkysI00.6', 2, 'Vxv6KuhR8d', 'sugianoor@gmail.com', '2023-08-12 04:08:17', NULL, '2023-08-13 07:08:24'),
(6, '2023-08-12', 'dhD8S', '6234', 'Nanda', 2, 'Banjarmasin', '2005-08-16', 'Jl. Handil Bakti', '089634567654', 'nanda@gmail.com', '$2y$10$3kKFhzRt/WaRVr5Zezszq.vyv/9aUCJNctH1N1ORdex20K.jgoO.m', 2, 'MDfuSxmKk4', 'nanda@gmail.com', '2023-08-12 04:08:29', NULL, '2023-08-13 07:08:25'),
(7, '2023-08-12', 'kne2m', '5665', 'Joyodi', 1, 'Banjarbaru', '2005-08-11', 'JL. HKSN', '089678546745', 'joyodi@gmail.com', '$2y$10$1El540TXJezIEa0q7gVfDuQeLDTvS6HgLhArFcMqoxVR.5fFYSB82', 2, 'hu0SFIbg84', 'joyodi@gmail.com', '2023-08-12 04:08:30', NULL, '2023-08-13 07:08:26'),
(8, '2023-08-12', '8jaKl', '6679', 'Ismawati', 2, 'Kandangan', '2005-08-06', 'Jl. Simpang Anem', '089678654323', 'ismawati@gmail.com', '$2y$10$QDv.gpRa7ax0B3dE7nBkwObmPd/GlMgF2BFAzmIyXiCv1Ly1ul4e2', 2, 'm8ui2FsZnd', 'ismawati@gmail.com', '2023-08-12 04:08:33', NULL, '2023-08-13 07:08:26'),
(9, '2023-08-12', 'MU5Yc', '6677', 'Ernawati', 2, 'Banjarbaru', '2005-08-24', 'Jl. Mantuil', '089678456765', 'ernawati@gmail.com', '$2y$10$7JJfd13vExtVwVON0qcAOumIQ3eBYgNUVfaUTsDCuybvV.lefLvCm', 2, 'bgj5eUskdh', 'ernawati@gmail.com', '2023-08-12 04:08:34', NULL, '2023-08-13 07:08:27'),
(10, '2023-08-12', 'qGwUr', '7887', 'Tika Astuti', 2, 'Banjarmasin', '2005-09-03', 'Jl. Kuin Selatan', '089956786543', 'tika@gmail.com', NULL, 3, NULL, 'tika@gmail.com', '2023-08-12 04:08:35', NULL, '2023-08-13 07:08:37'),
(11, '2023-08-12', 'upINd', '6543', 'Fajar ', 1, 'Banjarbaru', '2005-07-17', 'JL. Kayu Tangi', '089767890987', 'fajar@gmail.com', NULL, 3, NULL, 'fajar@gmail.com', '2023-08-12 04:08:36', NULL, '2023-08-13 07:08:38'),
(12, '2023-08-13', 'ulKvA', '6161', 'Asoka', 2, 'Banjarbaru', '2005-08-07', 'Jl. Beruntung Baru', '089765432123', 'asoka@gmail.com', NULL, 3, NULL, 'asoka@gmail.com', '2023-08-13 07:08:10', NULL, '2023-08-13 07:08:38'),
(13, '2023-08-13', '3AKIH', '6162', 'Maulina', 2, 'Banjarbaru', '2007-08-07', 'Jl. Manggis', '089765432123', 'maulina@gmail.com', NULL, 3, NULL, 'maulina@gmail.com', '2023-08-13 07:08:10', NULL, '2023-08-13 07:08:39'),
(14, '2023-08-13', 'YmKys', '6065', 'Muhammad Pahmi', 1, 'Banjarbaru', '2006-07-31', 'Jl. Cemara Raya', '089765432156', 'pahmi@gmail.com', NULL, 3, NULL, 'pahmi@gmail.com', '2023-08-13 07:08:12', NULL, '2023-08-13 07:08:39'),
(15, '2023-08-13', 'ysdPU', '7090', 'Muhammad Fakih', 1, 'Banjarbaru', '2005-07-31', 'Jl. Cemara Raya', '089765436789', 'fakih@gmail.com', NULL, 3, NULL, 'fakih@gmail.com', '2023-08-13 07:08:13', NULL, '2023-08-13 07:08:40'),
(16, '2023-08-13', 'j4fX0', '6779', 'Muhammad Nafis', 1, 'Banjarmasin', '2005-10-14', 'Jl. Kayu Tangi', '089765436709', 'nafis@gmail.com', NULL, 3, NULL, 'nafis@gmail.com', '2023-08-13 07:08:14', NULL, '2023-08-13 07:08:40'),
(17, '2023-08-13', 'ZmKzi', '6655', 'Muhammad Faris', 1, 'Banjarmasin', '2005-12-04', 'Jl. Kayu Tangi', '089765436708', 'faris@gmail.com', NULL, 3, NULL, 'faris@gmail.com', '2023-08-13 07:08:17', NULL, '2023-08-13 07:08:40'),
(18, '2023-08-13', 'wkOcK', '6445', 'Muhammad Alif', 1, 'Banjarmasin', '2005-12-04', 'Jl. Kayu Tangi', '089765436767', 'alif@gmail.com', NULL, 3, NULL, 'alif@gmail.com', '2023-08-13 07:08:22', NULL, '2023-08-13 08:08:03'),
(19, '2023-08-13', '9z4cf', '6070', 'Dwi Ananda', 2, 'Banjarmasin', '2005-02-02', 'Jl. Kuin Selatan', '081349175156', 'dwianandaa02@gmail.com', '$2y$10$9sK00JbzD7S.3pUmUX1hOuI0DDGYigS1PeHmgALDpzqiga/GMDUDy', 2, 'VxorCydHYL', 'dwianandaa02@gmail.com', '2023-08-13 07:08:43', NULL, '2023-08-13 07:08:44'),
(20, '2023-08-13', 'mvNdZ', '6773', 'Wati', 2, 'Banjarmasin', '2005-02-01', 'Jl. Kuin Selatan', '081349175890', 'wati@gmail.com', NULL, 3, NULL, 'wati@gmail.com', '2023-08-13 07:08:48', NULL, '2023-08-13 08:08:03'),
(21, '2023-08-13', '4h0nK', '6776', 'Bintang Akbar', 1, 'Banjarmasin', '2005-01-31', 'Jl. Cemara Raya', '081349175880', 'bintang@gmail.com', NULL, 1, NULL, 'bintang@gmail.com', '2023-08-13 07:08:49', NULL, NULL),
(22, '2023-08-13', 'RPm4u', '6001', 'Natasya ', 2, 'Banjarmasin', '2005-01-29', 'Jl. Cemara Raya', '081349175800', 'natasya@gmail.com', NULL, 1, NULL, 'natasya@gmail.com', '2023-08-13 07:08:50', NULL, NULL),
(23, '2023-08-13', 'EQ8Pu', '6334', 'Lindi Imtiyas', 2, 'Banjarbaru', '2005-01-29', 'Jl. Cemara Raya', '081349175800', 'lindi@gmail.com', NULL, 1, NULL, 'lindi@gmail.com', '2023-08-13 07:08:51', NULL, NULL),
(24, '2023-08-13', 'fTZKy', '6330', 'Nopel Aprilia', 2, 'Banjarmasin', '2004-11-25', 'Jl. Cemara Raya', '081349175889', 'nopel@gmail.com', NULL, 1, NULL, 'nopel@gmail.com', '2023-08-13 07:08:52', NULL, NULL),
(25, '2023-08-13', 'keNc8', '6332', 'Muhammad Naufal', 1, 'Banjarmasin', '2005-11-25', 'Jl. Cemara Raya', '081349175897', 'naufal@gmail.com', NULL, 1, NULL, 'naufal@gmail.com', '2023-08-13 07:08:58', NULL, NULL),
(26, '2023-08-13', 'jrt2N', '6338', 'Muhammad Zaki', 1, 'Banjarmasin', '2005-11-20', 'Jl. Kayu Tangi', '081349175870', 'zaki@gmail.com', NULL, 1, NULL, 'zaki@gmail.com', '2023-08-13 07:08:59', NULL, NULL),
(27, '2023-08-13', 'MdUZg', '6445', 'Muhammad Iqbal', 1, 'Banjarmasin', '2007-11-20', 'Jl. Kayu Tangi', '081349174334', 'iqbal@gmail.com', NULL, 1, NULL, 'iqbal@gmail.com', '2023-08-13 08:08:00', NULL, NULL),
(28, '2023-08-13', '4RXLu', '6440', 'Muhammad Arkan', 1, 'Banjarmasin', '2006-11-20', 'Jl. Kayu Tangi', '081349174332', 'arkan@gmail.com', NULL, 1, NULL, 'arkan@gmail.com', '2023-08-13 08:08:01', NULL, NULL),
(29, '2023-08-13', 'f8blt', '6450', 'Nafisa', 2, 'Banjarmasin', '2005-11-11', 'Jl. Kayu Tangi', '081349174343', 'nafisa@gmail.com', NULL, 1, NULL, 'nafisa@gmail.com', '2023-08-13 08:08:02', NULL, NULL),
(30, '2023-08-13', 'PxLFK', '6432', 'Afirah', 2, 'Banjarmasin', '2005-11-02', 'Jl. Cemara Raya', '081349174347', 'afirah@gmail.com', NULL, 1, NULL, 'afirah@gmail.com', '2023-08-13 08:08:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soalganda`
--

CREATE TABLE `soalganda` (
  `id_soalganda` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_les` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `jawaban` char(1) NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soalganda`
--

INSERT INTO `soalganda` (`id_soalganda`, `kode`, `id_les`, `pertanyaan`, `a`, `b`, `c`, `d`, `e`, `jawaban`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 'mCvRIkYiP9', 6, 'Sebuah sistem yang terdiri dari dua atau lebih computer yang saling terhubung satu sama lain melalui media transisi atau media komunikasi sehingga dapat saling berbagi data, aplikasi maupun berbagi perangkat keras computer disebut..', ' Jaringan nirkabel', 'Jaringan peer to peer', 'Jaringan terpusat', 'Jaringan client-server', 'Jaringan computer ', 'E', 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 10:08:06', 'irigasoen@gmail.com', '2023-08-13 12:08:44'),
(2, '56kXD7LEJV', 5, 'Kumpulan data yang bersifat elektronik yang secara fisik tidak terlihat tetapi dapat dioperasikan dan di simpan dan dikendalikan dengan perangkat komputer adalah', 'Software', 'Hardware', 'Brainware', 'Hardisk', 'Perangkat keras', 'A', 1, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:48', NULL, NULL),
(3, 'bP5XFeiLhI', 7, 'Jaringan besar yang saling berhubungan dari jaringan-jaringan komputer yang menghubungkan orang-orang dan komputer-komputer diseluruh dunia, melalui telepon, satelit dan sistem-sistem komunikasi yang lain., Pengertian dari?', 'Internet', 'Ekstranet', 'Komputer', 'Printer', 'Monitor', 'A', 1, 'irigasoen@gmail.com', '2023-08-07 06:08:58', NULL, NULL),
(4, 'I1vpCLUgVk', 8, 'Untuk melakukan update paket di Ubuntu kita harus menjalankan perintah...', 'apt-get install dhcp', 'apt-get install virtualbox', 'apt-get update', 'cd', 'ls', 'C', 1, 'alpiannoorbanjar@gmail.com', '2023-08-13 12:08:53', NULL, NULL),
(5, 'E7xfqR9lZi', 11, 'Which sentence that shows asking suggestion?   ', 'Don’t be so sad, my friend.  ', 'I have just lost my driver license.  ', 'You should tell the security.  ', 'Do you have any suggestion?   ', 'That sounds good.', 'C', 1, 'aida29.auliasari@gmail.com', '2023-08-13 12:08:58', NULL, NULL),
(6, '9kAxLGoCeV', 12, ' What is Rafa’s problem?', 'He lost a wallet.', 'He lost a bag.', 'He lost a car.', 'He lost his driver license.', 'He lost a pencil.', 'D', 1, 'aida29.auliasari@gmail.com', '2023-08-13 01:08:05', NULL, NULL),
(7, 'CZKzEGWn2w', 10, 'Wich sentence shows the giving suggestion?', 'I have got a headache.', 'You should stay at home.', 'Don’t you go to school?', 'Let me check.', 'It’s Monday morning.', 'B', 1, 'indera@gmail.com', '2023-08-13 01:08:15', NULL, NULL),
(8, '4hDN2u5qWZ', 13, 'Berikut merupakan tujuan pembuatan proposal, kecuali...  ', 'Meminta izin pihak bersangkutan ', 'Memohon bantuan dana  ', 'Memberikan masukan untuk keputusan', 'Untuk melakukan suatu kegiatan  ', 'Meminta dukungan pihak berwenang ', 'C', 1, 'kifly.acuy@gmail.com', '2023-08-13 01:08:21', NULL, NULL),
(9, 'I4qMNdtZyr', 14, 'Program proposal sebaiknya diajukan pada saat...  ', 'Sebelum kegiatan berlangsung  ', 'Saat kegiatan berlangsung  ', 'Setelah kegiatan berlangsung ', 'Selama kegiatan berlangsung  ', 'Selesai kegiatan  ', 'A', 1, 'ansari@gmail.com', '2023-08-13 01:08:26', NULL, NULL),
(10, 'MLsoF5tiaZ', 15, 'nsur-unsur dibawah ini ada dalam proposal penelitian ilmiah, kecuali...  ', 'Latar belakang masalah', 'Penutup ', 'Pembatasan masalah  ', 'Panitia kegiatan', 'Metodologi  ', 'D', 1, 'ansari@gmail.com', '2023-08-13 01:08:29', NULL, NULL),
(11, 'pJZq1YhSLU', 16, 'Tanggapan penolakan di bawah ini yang tepat adalah ….', 'Saya tidak sependapat dengan Anda yang tidak masuk akal.', 'Maaf, hal itu tidak dapat diterima.', 'Saya tidak setuju sebab hal itu tidak benar.', 'Wah, pendapat itu harus ditolak!', 'Saya kurang sependapat dengan Bapak karena saya belum yakin tentang hal itu.', 'E', 1, 'hidayat@gmail.com', '2023-08-13 01:08:32', NULL, NULL),
(12, 'CpnZgQBlbd', 19, 'Nilai sudut istimewa dikuadran 1 , untuk sin 30° adalah....', '?3     ', '?2   ', '1/2 ?3   ', '1/2 ?2   ', '1/2   ', 'E', 1, 'Herawati@gmail.com', '2023-08-13 01:08:35', NULL, NULL),
(13, 'pGYvkxhLdT', 20, 'Untuk Trigonometri di Kuadran I, nlai sin 30° setara dengan nilai ....  ', 'cos 60°         ', 'sin 60°   ', 'tan 30°  ', 'tan 60° .', 'Cos 90°   ', 'A', 1, 'Herawati@gmail.com', '2023-08-13 01:08:38', NULL, NULL),
(14, 'ZYE0TFR5sM', 21, 'Nilai sudut istimewa di Kuadran I untuk tan 45° adalah ...   ', '?3  ', '?2 ', '1', '1/3 ?3      ', '1/2 ?2  .', 'C', 1, 'rapiiarsat@gmail.com', '2023-08-13 01:08:40', NULL, NULL),
(15, 'a4o9cXeKVu', 22, 'ebuah segitiga siku-siku, sisi alasnya 8 cm , sisi miringnya 17 cm , maka tingginya =.....   .', '10 cm', '12 cm', '15 cm', '16 cm', '18 cm', 'C', 1, 'rusyihan@gmail.com', '2023-08-13 01:08:43', NULL, NULL),
(16, 'a5G0toyKIY', 25, 'Contoh teknologi yang menggunakan MAN adalah..', 'Jaringan 3G', 'ATM (Asynchronous Transfer Mode)', 'Wifi', 'Warnet', 'Jaringan 5G', 'B', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soalisian`
--

CREATE TABLE `soalisian` (
  `id_soalisian` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_les` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soalisian`
--

INSERT INTO `soalisian` (`id_soalisian`, `kode`, `id_les`, `pertanyaan`, `jawaban`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(5, 'h1XHL9F3z0', 6, 'ROM merupakan singkatan dari....', 'Read Only Memory', 1, 'alpiannoorbanjar@gmail.com', '2023-08-06 11:08:10', 'irigasoen@gmail.com', '2023-08-13 12:08:45'),
(6, 'oWw1ISDytJ', 5, 'Kepanjangan dari BIOS adalah', 'Basic Input Output System', 1, 'alpiannoorbanjar@gmail.com', '2023-08-07 01:08:50', NULL, NULL),
(7, 'UN7AXjPlO6', 7, 'Pengertian LAN?', 'Jaringan area lokal atau jejaring area setempat adalah jejaringan komputer yang menyambungkan komputer dalam area terbatas seperti tempat tinggal, sekolah, laboratorium, kampus universitas, atau gedung kantor', 1, 'irigasoen@gmail.com', '2023-08-07 06:08:58', NULL, NULL),
(8, 'X58ZBe6QIJ', 8, 'Sebutkan tempat penyimpanan BIOS yaitu....', 'Chip ROM', 1, 'alpiannoorbanjar@gmail.com', '2023-08-13 12:08:53', NULL, NULL),
(9, 'HaVjdNOPRI', 11, 'Our son.... (learn) how to read', 'has learned', 1, 'aida29.auliasari@gmail.com', '2023-08-13 01:08:00', NULL, NULL),
(10, 'wXFDfQNTcg', 12, 'He has never... (travel) by train', 'traveled', 1, 'aida29.auliasari@gmail.com', '2023-08-13 01:08:03', NULL, NULL),
(11, 'Wjfm2pyGeV', 10, 'My mother has never ... (travel) by air', ' traveled', 1, 'indera@gmail.com', '2023-08-13 01:08:11', NULL, NULL),
(12, 'yWx1A6nhEg', 13, 'Apa yang dimaksud dengan teks laporan hasil observasi?', 'teks laporan hasil observasi adalah teks yang berisi penjabaran umum/melaporkan sesuatu berupa hasil dari pengamatan (observasi)', 1, 'kifly.acuy@gmail.com', '2023-08-13 01:08:18', NULL, NULL),
(13, 'CX0IF4Vekh', 14, 'Mengapa teks laporan hasil observasi harus disajikan dengan menggunakan bahasa yang jelas, mudah dipahami, dan tidak boleh berbelit-belit?', ' hal ini dilakukan agar pembaca bisa dengan mudah memahami hasil laporan observasi yang disajikan dan menghindari kesalahpahaman.\r\n', 1, 'ansari@gmail.com', '2023-08-13 01:08:23', NULL, NULL),
(14, 'iU7evaFkAO', 15, 'Sebutkan berbagai hal yang harus diperhatikan dalam menganalisis teks laporan hasil observasi!', 'a. Kelengkapan laporan\r\nb. Isi laporan\r\nc. Keruntutan penyajian\r\nd. Penggunaan bahasa', 1, 'ansari@gmail.com', '2023-08-13 01:08:27', NULL, NULL),
(15, '8zEYC4dgAt', 16, 'Sebutkan berbagai tulisan yang ingin dicapai dari pembuatan teks hasil observasi!', 'a. Mengatasi suatu masalah\r\nb. Mengambil suatu keputusan yang lebih efektif\r\nc. Mengetahui kemajuan dan perkembangan suatu masalah\r\nd. Mengadakan pengawasan dan perbaikan\r\ne. Menemukan teknik-teknik baru', 1, 'hidayat@gmail.com', '2023-08-13 01:08:30', NULL, NULL),
(16, 'cNqKEmJkPA', 19, 'Hitunglah hasil dari vektor A = (2, 4) + vektor B = (3, -1)!', 'ektor A + vektor B = (2+3, 4-1) = (5, 3)', 1, 'Herawati@gmail.com', '2023-08-13 01:08:36', NULL, NULL),
(17, 'MxfIqThcpl', 20, 'Hitunglah hasil dari vektor C = (1, 3) – vektor D = (4, -2)!', 'vektor C – vektor D = (1-4, 3-(-2)) = (-3, 5)', 1, 'Herawati@gmail.com', '2023-08-13 01:08:37', NULL, NULL),
(18, 'x2u5vptiXB', 21, 'Hitunglah panjang dari vektor E = (3, 4)!', 'panjang vektor E = ?(3^2 + 4^2) = ?(9 + 16) = ?25 = 5', 1, 'rapiiarsat@gmail.com', '2023-08-13 01:08:41', NULL, NULL),
(19, 'dHrJyF2aq5', 22, 'Hitunglah dot product dari vektor F = (2, 3) dan vektor G = (4, -1)!', 'dot product vektor F dan vektor G = (2 x 4) + (3 x -1) = 8 – 3 = 5', 1, 'rusyihan@gmail.com', '2023-08-13 01:08:43', NULL, NULL),
(20, 'RC61JWyEvB', 25, 'BIOS merupakan singkatan dari....', 'Basic Input Output System', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:47', NULL, NULL),
(21, 'uYfCcO0UwS', 6, 'CMOS merupakan singkatan dari....', 'Complementary Metal Oxide Semiconductor', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:51', NULL, NULL),
(22, '2x9lgVIJdz', 6, 'Jelaskan fungsi dari menu supervisor password pada BIOS komputer yaitu....', ' Menu untuk memberikan password supervisor', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:52', NULL, NULL),
(23, '9tUS4PBCGf', 6, 'RAM merupakan singkatan dari....', 'Random Access Memory', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:53', NULL, NULL),
(24, 'GItTdve8El', 6, 'Jelaskan fungsi driver pada BIOS komputer....', 'Software untuk menghubungkan perangkat hardware saat Mode DOS', 1, 'irigasoen@gmail.com', '2023-08-13 01:08:53', NULL, NULL),
(25, 'Ea86bUYFIf', 8, 'RAM merupakan singkatan dari....', 'Random Access Memory', 1, 'alpiannoorbanjar@gmail.com', '2023-08-13 01:08:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL DEFAULT '2022-05-20 10:00:00',
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `urutan`, `nama_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Hadir', 'system', '2022-05-20 10:00:00', NULL, NULL),
(2, 2, 'Izin', 'system', '2022-05-20 10:00:00', NULL, NULL),
(3, 3, 'Sakit', 'system', '2022-05-20 10:00:00', NULL, NULL),
(4, 4, 'Tanpa Keterangan', 'system', '2022-05-20 10:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_submenu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL DEFAULT 'far fa-circle nav-icon',
  `aktif` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL DEFAULT 'system',
  `tgl_input` datetime NOT NULL DEFAULT '2022-05-21 10:00:00',
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `urutan`, `nama_submenu`, `url`, `icon`, `aktif`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 2, 1, 'Menu', 'master/menu', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(2, 2, 2, 'Sub Menu', 'master/submenu', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(3, 2, 3, 'Level', 'master/level', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(4, 2, 2, 'Pengguna', 'master/pengguna', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', 'admin', '2023-06-24 05:06:47'),
(5, 2, 5, 'Jabatan', 'master/jabatan', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(6, 2, 3, 'Tahun Ajaran', 'master/tahunajaran', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-06-24 05:06:48'),
(7, 2, 8, 'Satuan', 'master/satuan', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', NULL, NULL),
(8, 2, 9, 'Kelas', 'master/kelas', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2022-06-14 09:06:58'),
(15, 2, 1, 'Pegawai', 'master/pegawai', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', 'admin', '2023-06-24 05:06:47'),
(16, 4, 2, 'Siswa Diterima', 'laporan/siswaditerima', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 04:08:37'),
(17, 4, 3, 'Laporan Guru', 'laporan/guruditolak', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 05:08:25'),
(19, 4, 19, 'Guru Diterima', 'laporan/guruditerima', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 05:08:24'),
(20, 4, 20, 'Guru Ditolak', 'laporan/guruditolak', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 05:08:25'),
(22, 4, 22, 'Pembayaran Belum', 'laporan/pembayaranbelum', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 05:08:35'),
(23, 4, 23, 'Pembayaran Menunggu Konfirmasi', 'laporan/pembayaranmenunggu', 'far fa-circle nav-icon', 1, 'system', '2022-05-21 10:00:00', 'admin', '2023-08-07 05:08:38'),
(24, 4, 24, 'Laporan Absensi', 'laporan/absensi', 'far fa-circle nav-icon', 2, 'system', '2022-05-21 10:00:00', 'admin', '2022-07-03 03:07:36'),
(27, 3, 9, 'Kelas Siswa', 'register/kelassiswa', 'far fa-circle nav-icon', 2, 'admin', '2022-06-01 10:06:39', 'admin', '2022-07-02 12:07:55'),
(33, 3, 5, 'Guru', 'register/guru', 'far fa-circle nav-icon', 1, 'admin', '2022-06-04 08:06:55', 'admin', '2023-08-06 03:08:33'),
(34, 3, 6, 'Siswa', 'register/siswa', 'far fa-circle nav-icon', 1, 'admin', '2022-06-27 06:06:12', 'admin', '2023-08-06 04:08:23'),
(36, 2, 31, 'Sumber Pemasukan', 'master/sumberpemasukan', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 12:07:59', NULL, NULL),
(37, 2, 32, 'Sumber Pengeluaran', 'master/sumberpengeluaran', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 01:07:08', NULL, NULL),
(38, 3, 33, 'Pemasukan', 'register/pemasukan', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 01:07:40', NULL, NULL),
(39, 3, 34, 'Pengeluaran', 'register/pengeluaran', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 01:07:48', NULL, NULL),
(40, 4, 35, 'Laporan Pemasukan', 'laporan/pemasukan', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 03:07:59', NULL, NULL),
(41, 4, 36, 'Laporan Pengeluaran', 'laporan/pengeluaran', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 03:07:59', NULL, NULL),
(42, 4, 37, 'Laporan Saldo', 'laporan/saldo', 'far fa-circle nav-icon', 2, 'admin', '2022-07-03 04:07:17', 'admin', '2022-07-03 04:07:19'),
(43, 3, 500, 'Tagihan', 'register/tagihan', 'far fa-circle nav-icon', 2, 'admin', '2023-06-08 02:06:59', 'admin', '2023-08-06 03:08:34'),
(44, 4, 1, 'Siswa Pendaftaran', 'laporan/siswapendaftaran', 'far fa-circle nav-icon', 1, 'admin', '2023-06-08 03:06:40', 'admin', '2023-08-07 04:08:31'),
(45, 2, 5, 'Kalender Pendidikan', 'master/kalenderpendidikan', 'far fa-circle nav-icon', 2, 'admin', '2023-06-13 07:06:02', NULL, NULL),
(46, 3, 2, 'Calon Siswa', 'register/calonsiswa', 'far fa-circle nav-icon', 2, 'admin', '2023-06-14 04:06:56', NULL, NULL),
(47, 4, 3, 'Siswa Ditolak', 'laporan/siswaditolak', 'far fa-circle nav-icon', 1, 'admin', '2023-06-14 08:06:41', 'admin', '2023-08-07 04:08:38'),
(48, 2, 10, 'Mata Pelajaran', 'master/matapelajaran', 'far fa-circle nav-icon', 1, 'admin', '2023-07-08 05:07:21', 'admin', '2023-08-06 06:08:50'),
(50, 3, 5, 'Materi', 'register/materi', 'far fa-circle nav-icon', 2, 'admin', '2023-07-22 08:07:35', 'admin', '2023-07-26 09:07:18'),
(51, 3, 100, 'Pendaftaran', 'register/pendaftaran', 'far fa-circle nav-icon', 2, 'admin', '2023-07-26 09:07:18', 'admin', '2023-08-06 03:08:33'),
(52, 2, 38, 'Biaya Pendaftaran', 'master/biayapendaftaran', 'far fa-circle nav-icon', 2, 'admin', '2023-07-27 09:07:41', NULL, NULL),
(53, 2, 39, 'Jenis Tagihan', 'master/jenistagihan', 'far fa-circle nav-icon', 2, 'admin', '2023-07-27 09:07:59', NULL, NULL),
(54, 4, 5, 'Guru Pendaftaran', 'laporan/gurupendaftaran', 'far fa-circle nav-icon', 1, 'admin', '2023-07-28 04:07:22', 'admin', '2023-08-07 05:08:20'),
(55, 17, 1, 'X', 'siswa/kelasx', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 12:08:03', 'admin', '2023-08-07 12:08:05'),
(56, 17, 2, 'XI', 'siswa/kelasxi', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 12:08:04', 'admin', '2023-08-07 12:08:05'),
(57, 17, 3, 'XII', 'siswa/kelasxii', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 12:08:04', NULL, NULL),
(58, 3, 7, 'Pembayaran', 'register/pembayaran', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 10:08:35', 'admin', '2023-08-07 10:08:35'),
(59, 2, 4, 'Biaya', 'master/biaya', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 01:08:48', NULL, NULL),
(60, 3, 10, 'Saldo', 'register/saldo', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 02:08:08', 'admin', '2023-08-07 02:08:08'),
(61, 4, 25, 'Pembayaran Selesai', 'laporan/pembayaranselesai', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 05:08:38', 'admin', '2023-08-07 05:08:39'),
(62, 4, 30, 'Les', 'laporan/les', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 05:08:54', NULL, NULL),
(63, 4, 31, 'Soal Pilihan Ganda', 'laporan/soalganda', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 06:08:08', NULL, NULL),
(64, 4, 32, 'Soal Isian', 'laporan/soalisian', 'far fa-circle nav-icon', 1, 'admin', '2023-08-07 06:08:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sumberpemasukan`
--

CREATE TABLE `sumberpemasukan` (
  `id_sumberpemasukan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_sumberpemasukan` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'System',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumberpemasukan`
--

INSERT INTO `sumberpemasukan` (`id_sumberpemasukan`, `urutan`, `nama_sumberpemasukan`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'BOS (Bantuan Operasional Sekolah)', 'admin', '2022-07-03 01:07:03', NULL, '2022-07-26 04:07:04'),
(2, 2, 'Iuran SPP', 'admin', '2022-07-03 01:07:03', NULL, NULL),
(3, 3, 'Sumbangan', 'admin', '2022-07-03 01:07:04', NULL, NULL),
(5, 5, 'BOSDA (Bantuan Operasional Sekolah Daerah)', 'admin', '2022-07-26 04:07:04', NULL, '2023-07-22 01:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `sumberpengeluaran`
--

CREATE TABLE `sumberpengeluaran` (
  `id_sumberpengeluaran` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_sumberpengeluaran` varchar(100) NOT NULL,
  `user_input` varchar(50) NOT NULL DEFAULT 'System',
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumberpengeluaran`
--

INSERT INTO `sumberpengeluaran` (`id_sumberpengeluaran`, `urutan`, `nama_sumberpengeluaran`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(1, 1, 'Gaji Guru', 'admin', '2022-07-03 01:07:23', NULL, NULL),
(2, 2, 'Pemeliharaan Gedung', 'admin', '2022-07-03 01:07:23', NULL, NULL),
(4, 3, 'Pembelian ATK', 'admin', '2022-07-27 05:07:38', NULL, NULL),
(5, 4, 'Pembelian Alat Kebersihan', 'admin', '2022-07-27 05:07:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_jenistagihan` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `tanggal`, `id_pendaftaran`, `id_jenistagihan`, `nominal`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(7, '2023-07-29', 17, 1, 50000, 3, 'Umum', '2023-07-29 06:07:43', 'admin', '2023-07-29 06:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `id_tahunajaran` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `nama_tahunajaran` varchar(100) NOT NULL,
  `smester` int(1) NOT NULL DEFAULT '1',
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`id_tahunajaran`, `urutan`, `nama_tahunajaran`, `smester`, `id_status`, `user_input`, `tgl_input`, `user_ubah`, `tgl_ubah`) VALUES
(3, 1, '2023', 1, 1, 'admin', '2023-06-14 12:06:27', 'admin', '2023-08-06 04:08:28'),
(4, 2, '2023', 2, 1, 'admin', '2023-07-22 12:07:42', 'admin', '2023-08-06 04:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `judul` text NOT NULL,
  `keterangan` text,
  `id_status` int(1) NOT NULL DEFAULT '1',
  `user_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `user_ubah` varchar(50) DEFAULT NULL,
  `tgl_ubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
  ADD PRIMARY KEY (`id_aksesmenu`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `biayapendaftaran`
--
ALTER TABLE `biayapendaftaran`
  ADD PRIMARY KEY (`id_biayapendaftaran`);

--
-- Indexes for table `daftarnilai`
--
ALTER TABLE `daftarnilai`
  ADD PRIMARY KEY (`id_daftarnilai`);

--
-- Indexes for table `daftarsiswa`
--
ALTER TABLE `daftarsiswa`
  ADD PRIMARY KEY (`id_daftarsiswa`);

--
-- Indexes for table `detailkelassiswa`
--
ALTER TABLE `detailkelassiswa`
  ADD PRIMARY KEY (`id_detailkelassiswa`);

--
-- Indexes for table `golpangkat`
--
ALTER TABLE `golpangkat`
  ADD PRIMARY KEY (`id_golpangkat`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jawabanlatihanganda`
--
ALTER TABLE `jawabanlatihanganda`
  ADD PRIMARY KEY (`id_jawabanlatihanganda`);

--
-- Indexes for table `jawabanlatihanisian`
--
ALTER TABLE `jawabanlatihanisian`
  ADD PRIMARY KEY (`id_jawabanlatihanisian`);

--
-- Indexes for table `jenistagihan`
--
ALTER TABLE `jenistagihan`
  ADD PRIMARY KEY (`id_jenistagihan`);

--
-- Indexes for table `kalenderpendidikan`
--
ALTER TABLE `kalenderpendidikan`
  ADD PRIMARY KEY (`id_kalenderpendidikan`);

--
-- Indexes for table `kategoriortuwali`
--
ALTER TABLE `kategoriortuwali`
  ADD PRIMARY KEY (`id_kategoriortuwali`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelasguru`
--
ALTER TABLE `kelasguru`
  ADD PRIMARY KEY (`id_kelasguru`);

--
-- Indexes for table `kelassiswa`
--
ALTER TABLE `kelassiswa`
  ADD PRIMARY KEY (`id_kelassiswa`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id_latihan`);

--
-- Indexes for table `latihansoalganda`
--
ALTER TABLE `latihansoalganda`
  ADD PRIMARY KEY (`id_latihansoalganda`);

--
-- Indexes for table `latihansoalisian`
--
ALTER TABLE `latihansoalisian`
  ADD PRIMARY KEY (`id_latihansoalisian`);

--
-- Indexes for table `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`id_les`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ortuwali`
--
ALTER TABLE `ortuwali`
  ADD PRIMARY KEY (`id_ortuwali`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pejabat_ttd`
--
ALTER TABLE `pejabat_ttd`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftaranguru`
--
ALTER TABLE `pendaftaranguru`
  ADD PRIMARY KEY (`id_pendaftaranguru`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soalganda`
--
ALTER TABLE `soalganda`
  ADD PRIMARY KEY (`id_soalganda`);

--
-- Indexes for table `soalisian`
--
ALTER TABLE `soalisian`
  ADD PRIMARY KEY (`id_soalisian`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `sumberpemasukan`
--
ALTER TABLE `sumberpemasukan`
  ADD PRIMARY KEY (`id_sumberpemasukan`);

--
-- Indexes for table `sumberpengeluaran`
--
ALTER TABLE `sumberpengeluaran`
  ADD PRIMARY KEY (`id_sumberpengeluaran`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aksesmenu`
--
ALTER TABLE `aksesmenu`
  MODIFY `id_aksesmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `biayapendaftaran`
--
ALTER TABLE `biayapendaftaran`
  MODIFY `id_biayapendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daftarnilai`
--
ALTER TABLE `daftarnilai`
  MODIFY `id_daftarnilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daftarsiswa`
--
ALTER TABLE `daftarsiswa`
  MODIFY `id_daftarsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detailkelassiswa`
--
ALTER TABLE `detailkelassiswa`
  MODIFY `id_detailkelassiswa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `golpangkat`
--
ALTER TABLE `golpangkat`
  MODIFY `id_golpangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jawabanlatihanganda`
--
ALTER TABLE `jawabanlatihanganda`
  MODIFY `id_jawabanlatihanganda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jawabanlatihanisian`
--
ALTER TABLE `jawabanlatihanisian`
  MODIFY `id_jawabanlatihanisian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenistagihan`
--
ALTER TABLE `jenistagihan`
  MODIFY `id_jenistagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kalenderpendidikan`
--
ALTER TABLE `kalenderpendidikan`
  MODIFY `id_kalenderpendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kategoriortuwali`
--
ALTER TABLE `kategoriortuwali`
  MODIFY `id_kategoriortuwali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelasguru`
--
ALTER TABLE `kelasguru`
  MODIFY `id_kelasguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kelassiswa`
--
ALTER TABLE `kelassiswa`
  MODIFY `id_kelassiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `latihansoalganda`
--
ALTER TABLE `latihansoalganda`
  MODIFY `id_latihansoalganda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `latihansoalisian`
--
ALTER TABLE `latihansoalisian`
  MODIFY `id_latihansoalisian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `les`
--
ALTER TABLE `les`
  MODIFY `id_les` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ortuwali`
--
ALTER TABLE `ortuwali`
  MODIFY `id_ortuwali` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pejabat_ttd`
--
ALTER TABLE `pejabat_ttd`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `pendaftaranguru`
--
ALTER TABLE `pendaftaranguru`
  MODIFY `id_pendaftaranguru` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `soalganda`
--
ALTER TABLE `soalganda`
  MODIFY `id_soalganda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `soalisian`
--
ALTER TABLE `soalisian`
  MODIFY `id_soalisian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `sumberpemasukan`
--
ALTER TABLE `sumberpemasukan`
  MODIFY `id_sumberpemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sumberpengeluaran`
--
ALTER TABLE `sumberpengeluaran`
  MODIFY `id_sumberpengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
