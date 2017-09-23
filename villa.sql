-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 04:41 AM
-- Server version: 5.6.36
-- PHP Version: 7.1.2

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

CREATE TABLE IF NOT EXISTS `cek_inventori` (
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

CREATE TABLE IF NOT EXISTS `channel` (
  `id_channel` varchar(10) NOT NULL,
  `nama_channel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id_channel`, `nama_channel`) VALUES
('1', 'Travelok');

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE IF NOT EXISTS `check_in` (
  `id_ci` varchar(10) NOT NULL,
  `id_kw` varchar(10) DEFAULT NULL,
  `plan_ci` datetime DEFAULT NULL,
  `real_ci` datetime DEFAULT NULL,
  `charge_ci` int(11) DEFAULT NULL,
  `id_pemesanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `check_out`
--

CREATE TABLE IF NOT EXISTS `check_out` (
  `id_co` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) DEFAULT NULL,
  `id_kw` varchar(10) DEFAULT NULL,
  `plan_co` datetime DEFAULT NULL,
  `real_co` datetime DEFAULT NULL,
  `charge_co` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_inventori`
--

CREATE TABLE IF NOT EXISTS `detil_inventori` (
  `id_detil_inventori` varchar(10) NOT NULL,
  `id_inventori` varchar(10) NOT NULL,
  `id_kamar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_layanan`
--

CREATE TABLE IF NOT EXISTS `detil_layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `id_pemesanan` varchar(10) NOT NULL,
  `charge_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE IF NOT EXISTS `inventori` (
  `id_inventori` varchar(10) NOT NULL,
  `nama_inventori` varchar(10) DEFAULT NULL,
  `harga_inventori` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` varchar(10) NOT NULL,
  `nama_kamar` varchar(20) DEFAULT NULL,
  `no_kamar` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `status_kamar` varchar(10) DEFAULT NULL,
  `harga_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan_waktu`
--

CREATE TABLE IF NOT EXISTS `ketentuan_waktu` (
  `id_kw` varchar(10) NOT NULL,
  `toleransi_ci` datetime DEFAULT NULL,
  `toleransi_co` datetime DEFAULT NULL,
  `presentase_eci` int(11) DEFAULT NULL,
  `presentase_lco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(20) DEFAULT NULL,
  `biaya_layanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(15, 'menu management', 'menu', 'fa fa-list-alt', 1, 0),
(16, 'data siswa', 'siswa', 'fa fa-graduation-cap', 1, 0),
(17, 'data jurusan', 'jurusan', 'fa fa-list-alt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat_pegawai` varchar(70) DEFAULT NULL,
  `telp_pegawai` varchar(15) DEFAULT NULL,
  `password_pegawai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `waktu_pemesanan` varchar(10) DEFAULT NULL,
  `uang_muka` varchar(10) DEFAULT NULL,
  `sisa_bayar` varchar(10) DEFAULT NULL,
  `total_harga` varchar(10) DEFAULT NULL,
  `id_channel` varchar(10) DEFAULT NULL,
  `id_promo` varchar(10) DEFAULT NULL,
  `id_kamar` varchar(10) DEFAULT NULL,
  `id_tamu` varchar(10) DEFAULT NULL,
  `jumlah_dewasa` int(11) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT NULL,
  `umur_anak` int(11) DEFAULT NULL,
  `permintaan_spesial` varchar(100) DEFAULT NULL,
  `batas_waktu_pemesa` datetime DEFAULT NULL,
  `id_status_pemesana` varchar(10) DEFAULT NULL,
  `id_pegawai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` varchar(10) NOT NULL,
  `promo_awal` datetime DEFAULT NULL,
  `promo_akhir` datetime DEFAULT NULL,
  `diskon_promo` varchar(10) DEFAULT NULL,
  `ket__promo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE IF NOT EXISTS `status_pemesanan` (
  `id_status_pemesana` varchar(10) NOT NULL,
  `nama_status_pemesa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE IF NOT EXISTS `tamu` (
  `id_tamu` varchar(10) NOT NULL,
  `tanda_pengenal` varchar(10) DEFAULT NULL,
  `nomor_pengenal` varchar(25) DEFAULT NULL,
  `nama_depan_tamu` varchar(30) DEFAULT NULL,
  `telepon_tamu` varchar(15) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `nama_belakang_tamu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `fk_status_pesan` (`id_status_pemesana`),
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
  ADD PRIMARY KEY (`id_status_pemesana`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
  ADD CONSTRAINT `fk_status_pesan` FOREIGN KEY (`id_status_pemesana`) REFERENCES `status_pemesanan` (`id_status_pemesana`),
  ADD CONSTRAINT `fk_via` FOREIGN KEY (`id_channel`) REFERENCES `channel` (`id_channel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
