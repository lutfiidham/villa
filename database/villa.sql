-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 09:45 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_inventori`
--

CREATE TABLE `cek_inventori` (
  `id_cek_inventori` varchar(10) NOT NULL,
  `id_co` varchar(10) DEFAULT NULL,
  `id_detil_inventori` varchar(10) DEFAULT NULL,
  `status_inventori` varchar(10) DEFAULT NULL,
  `charge_inventori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id_channel` varchar(10) NOT NULL,
  `nama_channel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id_channel`, `nama_channel`) VALUES
('CH-0001', 'Traveloka');

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id_ci` varchar(10) NOT NULL,
  `id_kw` varchar(10) DEFAULT NULL,
  `plan_ci` datetime DEFAULT NULL,
  `real_ci` datetime DEFAULT NULL,
  `charge_ci` int(11) DEFAULT NULL,
  `id_pemesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id_ci`, `id_kw`, `plan_ci`, `real_ci`, `charge_ci`, `id_pemesanan`) VALUES
('CI-0001', 'KW-0001', '2017-10-31 14:00:00', NULL, NULL, 'BO-0001'),
('CI-0002', 'KW-0001', '2017-11-01 14:00:00', NULL, NULL, 'BO-0002'),
('CI-0003', 'KW-0001', '2017-11-01 14:00:00', NULL, NULL, 'BO-0003');

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE `check_out` (
  `id_co` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) DEFAULT NULL,
  `id_kw` varchar(10) DEFAULT NULL,
  `plan_co` datetime DEFAULT NULL,
  `real_co` datetime DEFAULT NULL,
  `charge_co` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_out`
--

INSERT INTO `check_out` (`id_co`, `id_pemesanan`, `id_kw`, `plan_co`, `real_co`, `charge_co`) VALUES
('CO-0001', 'BO-0001', 'KW-0001', '2017-10-31 12:00:00', NULL, NULL),
('CO-0002', 'BO-0002', 'KW-0001', '2017-11-01 12:00:00', NULL, NULL),
('CO-0003', 'BO-0003', 'KW-0001', '2017-11-01 12:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detil_inventori`
--

CREATE TABLE `detil_inventori` (
  `id_detil_inventori` varchar(10) NOT NULL,
  `id_inventori` varchar(10) NOT NULL,
  `id_kamar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_layanan`
--

CREATE TABLE `detil_layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `charge_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `id_inventori` varchar(10) NOT NULL,
  `nama_inventori` varchar(10) DEFAULT NULL,
  `harga_inventori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JA-0001', 'Magang'),
('JA-0002', 'Tukang');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(10) NOT NULL,
  `nama_kamar` varchar(20) DEFAULT NULL,
  `no_kamar` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `status_kamar` varchar(10) DEFAULT NULL,
  `harga_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `no_kamar`, `kapasitas`, `status_kamar`, `harga_kamar`) VALUES
('KA-0001', 'Melati', 1, 4, 'available', 500000),
('KA-0002', 'Melati', 2, 3, 'available', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan_waktu`
--

CREATE TABLE `ketentuan_waktu` (
  `id_kw` varchar(10) NOT NULL,
  `toleransi_ci` int(11) DEFAULT NULL,
  `toleransi_co` int(11) DEFAULT NULL,
  `presentase_eci` int(11) DEFAULT NULL,
  `presentase_lco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketentuan_waktu`
--

INSERT INTO `ketentuan_waktu` (`id_kw`, `toleransi_ci`, `toleransi_co`, `presentase_eci`, `presentase_lco`) VALUES
('KW-0001', 1, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(20) DEFAULT NULL,
  `biaya_layanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(20, 'Master', '#', 'fa fa-bars', 1, 0),
(21, 'Pegawai', 'pegawai', 'fa fa-group', 1, 20),
(22, 'Jabatan', 'jabatan', 'fa fa-credit-card', 1, 20),
(23, 'Promo', 'promo', 'fa fa-list', 1, 20),
(24, 'Kamar', 'kamar', 'fa fa-bed', 1, 20),
(25, 'Layanan', 'layanan', 'fa fa-list', 1, 20),
(26, 'Status Pemesanan', 'status_pemesanan', 'fa fa-list', 1, 20),
(27, 'Inventori', 'inventori', 'fa fa-list', 1, 20),
(28, 'Detail Inventori', 'detail_inventori', 'fa fa-list', 1, 20),
(29, 'Ketentuan Waktu', 'ketentuan_waktu', 'fa fa-clock-o', 1, 20),
(30, 'Channel', 'channel', 'fa fa-plane', 1, 20),
(31, 'BOOKING', 'Pemesanan', 'fa fa-book', 1, 0),
(32, 'Check In', 'Check_in', 'fa fa-sign-in', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat_pegawai` varchar(70) DEFAULT NULL,
  `telp_pegawai` varchar(15) DEFAULT NULL,
  `password_pegawai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`, `password_pegawai`) VALUES
('PE-0001', 'JA-0002', 'Idham', 'Jauh', '081', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `waktu_pemesanan` datetime DEFAULT NULL,
  `uang_muka` varchar(10) DEFAULT NULL,
  `sisa_bayar` varchar(10) DEFAULT NULL,
  `total_harga` varchar(10) DEFAULT NULL,
  `id_channel` varchar(10) DEFAULT NULL,
  `id_promo` varchar(10) DEFAULT NULL,
  `id_kamar` varchar(10) DEFAULT NULL,
  `id_tamu` varchar(10) DEFAULT NULL,
  `jumlah_dewasa` int(11) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT NULL,
  `permintaan_spesial` varchar(100) DEFAULT NULL,
  `batas_waktu_pemesanan` datetime DEFAULT NULL,
  `id_status_pemesanan` varchar(10) DEFAULT NULL,
  `id_pegawai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `waktu_pemesanan`, `uang_muka`, `sisa_bayar`, `total_harga`, `id_channel`, `id_promo`, `id_kamar`, `id_tamu`, `jumlah_dewasa`, `jumlah_anak`, `permintaan_spesial`, `batas_waktu_pemesanan`, `id_status_pemesanan`, `id_pegawai`) VALUES
('BO-0001', '2017-10-25 12:36:00', '12000000', '0', '12000000', 'CH-0001', 'PR-0001', 'KA-0001', 'TA-0001', 2, 1, '', '2017-10-26 12:36:00', 'ST-0001', 'PE-0001'),
('BO-0002', '2017-11-01 10:40:00', '1000000', '0', '1000000', 'CH-0001', 'PR-0001', 'KA-0001', 'TA-0002', 2, 1, '', '2017-11-02 10:40:00', 'ST-0001', 'PE-0001'),
('BO-0003', '2017-11-01 11:04:00', '1000000', '0', '1000000', 'CH-0001', 'PR-0001', 'KA-0002', 'TA-0001', 2, 1, '', '2017-11-02 11:04:00', 'ST-0001', 'PE-0001');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` varchar(10) NOT NULL,
  `nama_promo` varchar(30) NOT NULL,
  `promo_awal` datetime DEFAULT NULL,
  `promo_akhir` datetime DEFAULT NULL,
  `diskon_promo` varchar(10) DEFAULT NULL,
  `ket_promo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `promo_awal`, `promo_akhir`, `diskon_promo`, `ket_promo`) VALUES
('PR-0001', 'No Promo', '2017-01-01 00:00:00', '2017-12-31 00:00:00', '0', 'Tidak Ada'),
('PR-0002', 'Akhir Tahun', '2017-10-01 00:00:00', '2017-12-31 00:00:00', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status_pemesanan` varchar(10) NOT NULL,
  `nama_status_pemesanan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status_pemesanan`, `nama_status_pemesanan`) VALUES
('ST-0001', 'Paid'),
('ST-0002', 'Arrears Payment'),
('ST-0003', 'Expired');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` varchar(10) NOT NULL,
  `tanda_pengenal` varchar(10) DEFAULT NULL,
  `nomor_pengenal` varchar(25) DEFAULT NULL,
  `nama_depan_tamu` varchar(30) DEFAULT NULL,
  `telepon_tamu` varchar(15) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `nama_belakang_tamu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `tanda_pengenal`, `nomor_pengenal`, `nama_depan_tamu`, `telepon_tamu`, `kebangsaan`, `nama_belakang_tamu`) VALUES
('TA-0001', 'KTP', '3567', 'Atika', '0786', 'Indonesia', 'Rizky'),
('TA-0002', NULL, '1234', 'Aisyah', '123', 'Eru', 'Salsa'),
('TA-0003', NULL, '134566', 'Alia', '343567', 'Ydsbb', 'Jul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_inventori`
--
ALTER TABLE `cek_inventori`
  ADD PRIMARY KEY (`id_cek_inventori`),
  ADD KEY `fk_ref_4496` (`id_detil_inventori`),
  ADD KEY `fk_relation_520` (`id_co`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id_ci`),
  ADD KEY `fk_check_in` (`id_pemesanan`),
  ADD KEY `fk_ketentuan_ci` (`id_kw`);

--
-- Indexes for table `check_out`
--
ALTER TABLE `check_out`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `fk_check_out2` (`id_pemesanan`),
  ADD KEY `fk_ketentuan_co` (`id_kw`);

--
-- Indexes for table `detil_inventori`
--
ALTER TABLE `detil_inventori`
  ADD PRIMARY KEY (`id_detil_inventori`,`id_inventori`,`id_kamar`),
  ADD KEY `fk_detil_inventori` (`id_kamar`),
  ADD KEY `fk_memiliki32` (`id_inventori`);

--
-- Indexes for table `detil_layanan`
--
ALTER TABLE `detil_layanan`
  ADD PRIMARY KEY (`id_layanan`,`id_pemesanan`),
  ADD KEY `fk_detil_layanan` (`id_pemesanan`);

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`id_inventori`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `ketentuan_waktu`
--
ALTER TABLE `ketentuan_waktu`
  ADD PRIMARY KEY (`id_kw`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_menjabat` (`id_jabatan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_melakukan` (`id_tamu`),
  ADD KEY `fk_melakukan4` (`id_pegawai`),
  ADD KEY `fk_menggunakan2` (`id_promo`),
  ADD KEY `fk_sewa` (`id_kamar`),
  ADD KEY `fk_status_pesan` (`id_status_pemesanan`),
  ADD KEY `fk_via` (`id_channel`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status_pemesanan`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cek_inventori`
--
ALTER TABLE `cek_inventori`
  ADD CONSTRAINT `fk_ref_4496` FOREIGN KEY (`id_detil_inventori`) REFERENCES `detil_inventori` (`id_detil_inventori`),
  ADD CONSTRAINT `fk_relation_520` FOREIGN KEY (`id_co`) REFERENCES `check_out` (`id_co`);

--
-- Constraints for table `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `fk_check_in` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `fk_ketentuan_ci` FOREIGN KEY (`id_kw`) REFERENCES `ketentuan_waktu` (`id_kw`);

--
-- Constraints for table `check_out`
--
ALTER TABLE `check_out`
  ADD CONSTRAINT `fk_check_out2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `fk_ketentuan_co` FOREIGN KEY (`id_kw`) REFERENCES `ketentuan_waktu` (`id_kw`);

--
-- Constraints for table `detil_inventori`
--
ALTER TABLE `detil_inventori`
  ADD CONSTRAINT `fk_detil_inventori` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`),
  ADD CONSTRAINT `fk_memiliki32` FOREIGN KEY (`id_inventori`) REFERENCES `inventori` (`id_inventori`);

--
-- Constraints for table `detil_layanan`
--
ALTER TABLE `detil_layanan`
  ADD CONSTRAINT `fk_detil_layanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `fk_detil_layanan2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_menjabat` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_melakukan` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`),
  ADD CONSTRAINT `fk_melakukan4` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `fk_menggunakan2` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`),
  ADD CONSTRAINT `fk_sewa` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`),
  ADD CONSTRAINT `fk_status_pesan` FOREIGN KEY (`id_status_pemesanan`) REFERENCES `status_pemesanan` (`id_status_pemesanan`),
  ADD CONSTRAINT `fk_via` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
