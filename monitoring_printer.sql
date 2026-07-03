-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 10:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_printer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_printer`
--

CREATE TABLE `tb_printer` (
  `id_printer` int(11) NOT NULL,
  `device_model` varchar(100) NOT NULL,
  `sn_printer` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `status` enum('online','offline','error') DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_printer`
--

INSERT INTO `tb_printer` (`id_printer`, `device_model`, `sn_printer`, `ip_address`, `hostname`, `lokasi`, `status`) VALUES
(1, 'HP Pagewide MFP 586', 'SN99UEK03Q', '192.168.15.205', 'Pengadaan1', 'KAPUS LT 2 (Kantor Staff Pengadaan Jasa)', 'offline'),
(2, 'HP Pagewide MFP 586', 'CN99UEK040', '192.168.15.206', 'Pengadaan2', 'KAPUS LT 2 (Kantor Staff Pengadaan Barang)', 'offline'),
(3, 'HP Pagewide MFP 586', 'CN99UEK033', '192.168.16.200', 'Penjualan1', 'KAPUS LT 2 (Kantor Stadd Penjualan Wilayah 1)', 'offline'),
(4, 'HP Officejet MFP X585', 'CN63SCZ03W', '192.168.16.207', 'Verifikasi', 'KAPUS LT 1 (Kantor Staff Verifikasi)', 'offline'),
(5, 'HP Pagewide MFP 586', 'CN99UEK04H', '192.168.16.222', 'Penjualan2', 'KAPUS LT 2 (Kantor Staff Penjualan)', 'offline'),
(6, 'HP Pagewide MFP 586', 'CN99UEK02Z', '192.168.18.201', 'Distrans', 'KAPUS LT 2 (Kantor Staff SCM Infrastructure)', 'offline'),
(7, 'HP Pagewide MFP 586', 'CN99UEK055', '192.168.18.202', 'Pajak', 'PAJAK LT 1 (Kantor Staff Pajak)', 'offline'),
(8, 'HP Pagewide MFP 586', 'CN99UEK081', '192.168.18.203', 'Kas', 'KAPUS LT 1 (Kantor Staff Pembendaharaan)', 'offline'),
(9, 'HP Officejet MFP X585', 'CN64PCZ03R', '192.168.20.202', 'K3LH', 'Kantor ADM K3LH', 'offline'),
(10, 'HP Officejet MFP X585', 'CN64PCZ0BS', '192.168.21.202', 'Labor', 'Kantor JKPM (Labor)', 'offline'),
(11, 'HP Officejet MFP X585', 'CN63SCZ02N', '192.168.21.210', 'CAPEX', 'Kantor Staff CAPEX (RB)', 'offline'),
(12, 'HP Pagewide MFP 586', 'CN99UEK05R', '192.168.23.203', 'Diklat', 'Kantor Diklat', 'offline'),
(13, 'HP Pagewide MFP 586', 'CN99UEK03Z', '192.168.30.202', 'Tambang', 'Kantor ADM Tambang', 'offline'),
(14, 'HP Pagewide MFP 586', 'CN99UEK00R', '192.168.32.202', 'Ind5', 'Kantor ADM Ind V', 'offline'),
(15, 'HP Pagewide MFP 586', 'CN99UEK05B', '192.168.32.203', 'Staff Ind5', 'Kantor Staff Ind V', 'offline'),
(16, 'HP Pagewide MFP 586', 'CN99UEK05P', '192.168.34.202', 'CCPIV', 'Kantor CCP IV', 'offline'),
(17, 'HP Pagewide MFP 586', 'CN99UEK057', '192.168.35.201', 'Hukum', 'Kantor GRC MR', 'offline'),
(18, 'HP Pagewide MFP 586', 'CN99UEK060', '192.168.35.202', 'GCG', 'Kantor GRC MR', 'offline'),
(19, 'HP Pagewide MFP 586', 'CN99UEK0DC', '192.168.35.204', 'Pengamanan', 'Kantor Satuan Pengamanan', 'offline'),
(20, 'HP Pagewide MFP 586', 'CN99UEK00Y', '192.168.35.206', 'PSM', 'Kantor GRC MR', 'offline'),
(21, 'HP Officejet MFP X585', 'CN63SCZ044', '192.168.35.209', 'CSR', 'Kantor CSR', 'offline'),
(22, 'HP Pagewide MFP 586', 'CN99UEK05Z', '192.168.36.207', 'PGOH', 'Kantor Exs Proyek IND IV', 'offline'),
(23, 'HP Pagewide MFP 586', 'CN99UEK035', '192.168.50.201', 'Teluk_bayur', 'Kantor Staff Teluk Bayur', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `tb_printer_deleted`
--

CREATE TABLE `tb_printer_deleted` (
  `id_printer` int(11) NOT NULL,
  `device_model` varchar(100) NOT NULL,
  `sn_printer` varchar(100) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_printer`
--

CREATE TABLE `tb_status_printer` (
  `id_status` int(11) NOT NULL,
  `id_printer` int(11) NOT NULL,
  `status` enum('online','offline','error') NOT NULL,
  `waktu_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status_printer`
--

INSERT INTO `tb_status_printer` (`id_status`, `id_printer`, `status`, `waktu_update`) VALUES
(1, 1, 'online', '2025-07-17 08:00:00'),
(2, 2, 'offline', '2025-07-17 08:10:00'),
(3, 3, 'error', '2025-07-17 08:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `nik`, `password`, `level`, `last_login`) VALUES
(1, 'Admin', 'admin@email.com', '123456789', '$2y$10$Qw1XtpD3k3tRQGxV5blqHeimTqdzJg.zBxqlC0RGG4XbO/4ZYasJi', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_deleted`
--

CREATE TABLE `tb_user_deleted` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_printer`
--
ALTER TABLE `tb_printer`
  ADD PRIMARY KEY (`id_printer`);

--
-- Indexes for table `tb_printer_deleted`
--
ALTER TABLE `tb_printer_deleted`
  ADD PRIMARY KEY (`id_printer`);

--
-- Indexes for table `tb_status_printer`
--
ALTER TABLE `tb_status_printer`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_printer` (`id_printer`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_deleted`
--
ALTER TABLE `tb_user_deleted`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_printer`
--
ALTER TABLE `tb_printer`
  MODIFY `id_printer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_printer_deleted`
--
ALTER TABLE `tb_printer_deleted`
  MODIFY `id_printer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_status_printer`
--
ALTER TABLE `tb_status_printer`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_deleted`
--
ALTER TABLE `tb_user_deleted`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_status_printer`
--
ALTER TABLE `tb_status_printer`
  ADD CONSTRAINT `tb_status_printer_ibfk_1` FOREIGN KEY (`id_printer`) REFERENCES `tb_printer` (`id_printer`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
