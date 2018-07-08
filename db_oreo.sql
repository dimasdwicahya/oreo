-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2018 at 09:26 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oreo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_datel`
--

CREATE TABLE `tb_datel` (
  `kd_datel` int(11) NOT NULL,
  `kd_witel` int(11) NOT NULL,
  `datel` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datel`
--

INSERT INTO `tb_datel` (`kd_datel`, `kd_witel`, `datel`, `alamat`) VALUES
(101, 1, 'ACEH', ''),
(102, 1, 'LANGSA', ''),
(103, 1, 'LHOKSEUMAWE', ''),
(104, 1, 'MEULABOH', ''),
(301, 3, 'BENGKULU', ''),
(302, 3, 'MUKO-MUKO', ''),
(401, 4, 'JAMBI', ''),
(402, 4, 'MUARA BUNGO', ''),
(501, 5, 'LAMPUNG', ''),
(502, 5, 'METRO', ''),
(503, 5, 'PRINGSEWU', ''),
(601, 6, 'BINJAI', ''),
(602, 6, 'LUBUK PAKAM', ''),
(603, 6, 'MEDAN', ''),
(901, 9, 'BUKIT TINGGI', ''),
(902, 9, 'PADANG', ''),
(903, 9, 'SOLOK', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lampiran`
--

CREATE TABLE `tb_lampiran` (
  `id` int(11) NOT NULL,
  `notiket` varchar(10) NOT NULL,
  `ft_sebelum_1` varchar(100) NOT NULL,
  `ft_sebelum_2` varchar(100) NOT NULL,
  `ft_sebelum_3` varchar(100) NOT NULL,
  `ft_progress_1` varchar(100) NOT NULL,
  `ft_progress_2` varchar(100) NOT NULL,
  `ft_progress_3` varchar(100) NOT NULL,
  `ft_sesudah_1` varchar(100) NOT NULL,
  `ft_sesudah_2` varchar(100) NOT NULL,
  `ft_sesudah_3` varchar(100) NOT NULL,
  `ft_denah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lampiran`
--

INSERT INTO `tb_lampiran` (`id`, `notiket`, `ft_sebelum_1`, `ft_sebelum_2`, `ft_sebelum_3`, `ft_progress_1`, `ft_progress_2`, `ft_progress_3`, `ft_sesudah_1`, `ft_sesudah_2`, `ft_sesudah_3`, `ft_denah`) VALUES
(43, 'P0001', 'ft_sebelum_1.png', 'ft_sebelum_2.png', 'ft_sebelum_3.png', 'ft_progress_1.png', 'ft_progress_2.png', 'ft_progress_3.png', 'ft_sesudah_1.png', 'ft_sesudah_2.png', 'ft_sesudah_3.png', 'ft_denah.png'),
(44, 'P0002', 'ft_sebelum_1.png', 'ft_sebelum_2.png', '', 'ft_progress_1.png', 'ft_progress_2.png', '', 'ft_sesudah_1.png', 'ft_sesudah_2.png', '', 'ft_denah.png'),
(46, 'P0003', 'ft_progress_1.png', '', '', 'ft_progress_1.png', '', '', 'ft_sesudah_1.png', '', '', 'ft_denah.png'),
(63, 'P0008', 'ft_sebelum_1.png', 'ft_sebelum_2.png', 'ft_sebelum_3.png', 'ft_progress_1.png', 'ft_progress_2.png', 'ft_progress_3.png', 'ft_sesudah_1.png', 'ft_sesudah_2.png', 'ft_sesudah_3.png', ''),
(64, 'P0009', 'ft_sebelum_1.png', 'ft_sebelum_2.png', 'ft_sebelum_3.png', 'ft_progress_1.png', 'ft_progress_2.png', '', 'ft_sesudah_1.png', '', '', ''),
(65, 'P0010', 'ft_denah.png', 'ft_progress_1.png', '', 'ft_denah.png', 'ft_progress_1.png', '', 'ft_sebelum_3.png', 'ft_sesudah_1.png', '', ''),
(66, 'P0011', 'ft_sebelum_1.png', '', '', 'ft_progress_2.png', '', '', 'ft_sesudah_1.png', '', '', ''),
(67, 'P0012', 'ft_sebelum_1.png', 'ft_sebelum_2.png', 'ft_sebelum_3.png', 'ft_progress_1.png', '', '', 'ft_sesudah_1.png', 'ft_sesudah_2.png', 'ft_sesudah_3.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `id` int(11) NOT NULL,
  `notiket` varchar(10) NOT NULL,
  `material` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`id`, `notiket`, `material`, `unit`, `volume`) VALUES
(20, 'P0001', 'Material 1', 'Unit', 1),
(21, 'P0001', 'Material 2', 'Unit', 2),
(22, 'P0001', 'Material 3', 'Unit', 3),
(23, 'P0002', 'Material A', 'Unit', 1),
(24, 'P0002', 'Material B', 'Unit', 2),
(26, 'P0003', 'Mat 1', 'Unit', 1),
(27, 'P0004', 'Material A', 'Unit', 1),
(28, 'P0004', '', '', 0),
(29, 'P0004', 'Material A', 'Unit', 1),
(30, 'P0005', 'A', 'U', 1),
(31, 'P0006', 'A', 'A', 1),
(32, 'P0007', 'A', 'A', 1),
(33, 'P0008', 'A', 'A', 1),
(34, 'P0009', 'P', 'P', 1),
(35, 'P0010', 'popop', 'a', 1),
(36, 'P0011', 'w', 'u', 1),
(37, 'P0012', 'l', 'l', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `namapekerjaan` varchar(100) NOT NULL,
  `notiket` varchar(10) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kd_witel` int(5) NOT NULL,
  `kd_sto` varchar(3) NOT NULL,
  `penyebab` text NOT NULL,
  `lampiran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `namapekerjaan`, `notiket`, `lokasi`, `kd_witel`, `kd_sto`, `penyebab`, `lampiran`) VALUES
(11, 'Order 1', 'P0001', 'Lokasi Order 1', 1, 'BAK', 'Penyebab 1', ''),
(12, 'Order 2', 'P0002', 'Lokasi Order 2', 1, 'BAK', 'Penyebab 2', ''),
(14, 'Order 3', 'P0003', 'Lokasi Order 3', 1, 'BAK', 'Penyebab Order 3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id` int(11) NOT NULL,
  `namapekerjaan` varchar(200) NOT NULL,
  `notiket` varchar(10) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id`, `namapekerjaan`, `notiket`, `unit`, `volume`) VALUES
(20, 'Pekerjaan 1', 'P0001', 'Core', 1),
(21, 'Pekerjaan 2', 'P0001', 'Core', 2),
(22, 'Pekerjaan 3', 'P0001', 'Core', 3),
(23, 'Pasang', 'P0002', 'Unit', 1),
(24, 'Bongkar', 'P0002', 'Unit', 1),
(26, 'Pek 1', 'P0003', 'Unit', 2),
(27, 'Pasang', 'P0004', 'Unit', 1),
(28, '', 'P0004', '', 0),
(29, 'Pekerjaan 1', 'P0004', 'Unit', 1),
(30, 'A', 'P0005', 'U', 2),
(31, 'A', 'P0006', 'A', 2),
(32, 'A', 'P0007', 'A', 2),
(33, 'A', 'P0008', 'A', 2),
(34, 'P', 'P0009', 'P', 2),
(35, 'popipip', 'P0010', 'u', 2),
(36, 'p', 'P0011', 'u', 1),
(37, 'n', 'P0012', 'n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plasa`
--

CREATE TABLE `tb_plasa` (
  `kd_plasa` varchar(5) NOT NULL,
  `plasa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_plasa`
--

INSERT INTO `tb_plasa` (`kd_plasa`, `plasa`, `alamat`) VALUES
('P01', 'AIR BANGIS', ''),
('P02', 'ALAHAN PANJANG', ''),
('P03', 'BALAI SELASA', ''),
('P04', 'BANDAR BUAT', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_regional`
--

CREATE TABLE `tb_regional` (
  `kd_regional` int(11) NOT NULL,
  `regional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_regional`
--

INSERT INTO `tb_regional` (`kd_regional`, `regional`) VALUES
(1, 'Regional 1'),
(2, 'Regional 2'),
(3, 'Regional 3'),
(4, 'Regional 4'),
(5, 'Regional 5'),
(6, 'Regional 6'),
(7, 'Regional 7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sto`
--

CREATE TABLE `tb_sto` (
  `kd_sto` varchar(3) NOT NULL,
  `kd_datel` int(11) NOT NULL,
  `sto` varchar(100) NOT NULL,
  `isa` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kd_plasa` varchar(5) NOT NULL,
  `ksta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sto`
--

INSERT INTO `tb_sto` (`kd_sto`, `kd_datel`, `sto`, `isa`, `kota`, `kd_plasa`, `ksta`) VALUES
('ABG', 901, 'AIR BANGIS', 'SPE', 'KAB PASAMAN BARAT', 'P01', ''),
('ALH', 903, 'ALAHAN PANJANG', 'MLH', 'KAB SOLOK', 'P02', ''),
('BAK', 101, 'BAK BAKONGAN', '', '', 'P01', ''),
('BDT', 902, 'BANDAR BUAT', 'BDT', 'KOTA PADANG', 'P04', ''),
('BIR', 101, 'BIR BIREUN', '', '', '', ''),
('BJK', 101, 'BKJ BLANGKEJEREN', '', '', '', ''),
('BLS', 902, 'BALAI SELASA', 'PNN', 'KAB PESISIR SELATAN', 'P03', ''),
('BNA', 101, 'BNA BANDA ACEH CENTRUM', '', '', '', ''),
('BNN', 101, 'BNN BEUREUNUN', '', '', '', ''),
('BPD', 101, 'BPD BLANGPIDIE', '', '', '', ''),
('CAG', 101, 'CAG CALANG', '', '', '', ''),
('DAR', 101, 'DAR DARUSSALAM', '', '', '', ''),
('GEU', 101, 'GEU GEUDONG', '', '', '', ''),
('IDI', 101, 'IDI IDI', '', '', '', ''),
('JHO', 101, 'JHO JHANTO', '', '', '', ''),
('JRM', 101, 'JRM JEURAM', '', '', '', ''),
('KFR', 101, 'KFR KOTA FAJAR', '', '', '', ''),
('KGH', 101, 'KGH KRUENG GEUKEUH', '', '', '', ''),
('KSG', 101, 'KSG KUALA SIMPANG', '', '', '', ''),
('KTN', 101, 'KTN KUTACANE', '', '', '', ''),
('LBR', 101, 'LBR LAMBARO', '', '', '', ''),
('LGS', 101, 'LGS LANGSA', '', '', '', ''),
('LNO', 101, 'LNO MDF LAMNO', '', '', '', ''),
('LOA', 101, 'LOA LHOKNGA', '', '', '', ''),
('LSK', 101, 'LSK LHOKSUKON', '', '', '', ''),
('LSM', 101, 'LSM LHOKSEUMAWE', '', '', '', ''),
('LTM', 101, 'LTM LAMTEUMEN', '', '', '', ''),
('MBO', 101, 'MBO MEULABOH', '', '', '', ''),
('MGD', 101, 'MGD MATANG GLUMPANG DUA', '', '', '', ''),
('MKL', 101, 'MKL MATANGKULI', '', '', '', ''),
('MRU', 101, 'MRU MEUREUDU', '', '', '', ''),
('PRL', 101, 'PRL PEUREULAK', '', '', '', ''),
('PTL', 101, 'PTL PANTON LABU', '', '', '', ''),
('SAB', 101, 'SAB SABANG', '', '', '', ''),
('SGI', 101, 'SGI SIGLI', '', '', '', ''),
('SKL', 101, 'SKL SINGKIL', '', '', '', ''),
('SLG', 101, 'SLG SAMALANGA', '', '', '', ''),
('SMM', 101, 'SMM SELIMEUM', '', '', '', ''),
('SNA', 101, 'SNA SINABANG', '', '', '', ''),
('SPU', 101, 'SPU SIMPANG ULIM', '', '', '', ''),
('SUS', 101, 'SUS SUBULUSSALAM', '', '', '', ''),
('TKN', 101, 'TKN TAKENGON', '', '', '', ''),
('TSE', 101, 'TSE TANGSE', '', '', '', ''),
('TTN', 101, 'TTN TAPAKTUAN', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `notiket` varchar(10) NOT NULL,
  `nip_pembuat` int(10) NOT NULL,
  `tanggal_buat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nip_penyetuju` int(10) NOT NULL,
  `tanggal_acc` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`notiket`, `nip_pembuat`, `tanggal_buat`, `nip_penyetuju`, `tanggal_acc`, `status`) VALUES
('P0001', 650876, '2018-07-06 11:33:16', 650871, '2018-07-07 13:50:14', 1),
('P0002', 650876, '2018-07-06 13:24:09', 650871, '2018-07-07 13:51:57', 3),
('P0003', 650876, '2018-07-06 14:41:13', 650871, '2018-07-07 13:51:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nip` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `foto_ttd` varchar(100) NOT NULL,
  `level` enum('admin','teknisi','manager','organik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nip`, `nama`, `username`, `password`, `foto`, `foto_ttd`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin.jpg', '', 'admin'),
(2, 'organik', 'organik', '4b58bbea0198a4397aae06ea62021425', 'organik.jpg', '', 'organik'),
(650871, 'Ricardo Panggabean', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager.jpg', 'ttd_1.png', 'manager'),
(650876, 'Deni Hamdani, ST., MSM', 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'teknisi.jpg', 'ft_ttd_1.png', 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_witel`
--

CREATE TABLE `tb_witel` (
  `kd_witel` int(11) NOT NULL,
  `kd_regional` int(11) NOT NULL,
  `witel` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_witel`
--

INSERT INTO `tb_witel` (`kd_witel`, `kd_regional`, `witel`, `alamat`) VALUES
(1, 1, 'ACEH', 'Jl. Sultan Mahmudsyah No.10, Kp. Baru, Baiturrahman, Kota Banda Aceh'),
(2, 1, 'BABEL', 'Jl. Kemuning No.1, Matraman, Opas Indah, Pangkalpinang, Kota Pangkal Pinang, Kepulauan Bangka Belitung 33684, Indonesia.'),
(3, 1, 'BENGKULU', 'Jl. Suprapto No.132 Bengkulu 38221 Bengkulu'),
(4, 1, 'JAMBI', 'Jl. Prof. DR. Soemantri Brojonegoro, Selamat, Telanaipura, Kota Jambi, Jambi 36124, Indonesia '),
(5, 1, 'LAMPUNG', 'Jl. Raden Ajeng Kartini No.1, Tj. Karang, Engal, Kota Bandar Lampung, Lampung 35127'),
(6, 1, 'MEDAN', 'Jl.Professor HM. Yamin no. 2, Sidodadi, Medan Timur, Perintis, Medan Tim., Kota Medan, Sumatera Utara 20233'),
(7, 1, 'RIDAR', 'Jl. Jenderal Sudirman No.199. Pekanbaru 28111'),
(8, 1, 'RIKEP', 'Jl. Jaksa Agung R. Suprapto SH Sekupang Batam 29422'),
(9, 1, 'SUMBAR', 'Jl. K.H. Dahlan No.17 Padang Padang 25138 Sumatra Barat Telp 0751-5000 Fax 0751-50001'),
(10, 1, 'SUMSEL', 'Jl. Jenderal Sudirman No.459. Palembang 30129. Sumatra Selatan Telepon: 0711-355678. Fax: 0711-310444'),
(11, 1, 'SUMUT', 'Jl. Prof. H. M. Yamin, SH No. 2. Medan Sumatera Utara Indonesia.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_datel`
--
ALTER TABLE `tb_datel`
  ADD PRIMARY KEY (`kd_datel`),
  ADD KEY `tb_datel_ibfk_1` (`kd_witel`);

--
-- Indexes for table `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notiket` (`notiket`),
  ADD KEY `fk_sto` (`kd_sto`),
  ADD KEY `fk_witel` (`kd_witel`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_plasa`
--
ALTER TABLE `tb_plasa`
  ADD PRIMARY KEY (`kd_plasa`);

--
-- Indexes for table `tb_regional`
--
ALTER TABLE `tb_regional`
  ADD PRIMARY KEY (`kd_regional`);

--
-- Indexes for table `tb_sto`
--
ALTER TABLE `tb_sto`
  ADD PRIMARY KEY (`kd_sto`),
  ADD KEY `fk_datel` (`kd_datel`),
  ADD KEY `fk_plasa` (`kd_plasa`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`notiket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_witel`
--
ALTER TABLE `tb_witel`
  ADD PRIMARY KEY (`kd_witel`),
  ADD KEY `kd_regional` (`kd_regional`),
  ADD KEY `kd_regional_2` (`kd_regional`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datel`
--
ALTER TABLE `tb_datel`
  MODIFY `kd_datel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=904;

--
-- AUTO_INCREMENT for table `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_witel`
--
ALTER TABLE `tb_witel`
  MODIFY `kd_witel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_datel`
--
ALTER TABLE `tb_datel`
  ADD CONSTRAINT `tb_datel_ibfk_1` FOREIGN KEY (`kd_witel`) REFERENCES `tb_witel` (`kd_witel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_tiket` FOREIGN KEY (`notiket`) REFERENCES `tb_tiket` (`notiket`),
  ADD CONSTRAINT `fk_witel` FOREIGN KEY (`kd_witel`) REFERENCES `tb_witel` (`kd_witel`);

--
-- Constraints for table `tb_sto`
--
ALTER TABLE `tb_sto`
  ADD CONSTRAINT `fk_datel` FOREIGN KEY (`kd_datel`) REFERENCES `tb_datel` (`kd_datel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_witel`
--
ALTER TABLE `tb_witel`
  ADD CONSTRAINT `tb_witel_ibfk_1` FOREIGN KEY (`kd_regional`) REFERENCES `tb_regional` (`kd_regional`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
