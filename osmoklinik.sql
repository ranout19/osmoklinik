-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 03:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osmoklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `nomor_resep` int(100) NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `jumlahObt` int(11) NOT NULL,
  `hargaObt` int(100) DEFAULT NULL,
  `dosis` varchar(100) NOT NULL,
  `subtotal` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `nomor_resep`, `kode_obat`, `jumlahObt`, `hargaObt`, `dosis`, `subtotal`) VALUES
(55, 149738691, 'OBT01', 2, 2000, '2x1', 4000),
(56, 149738691, 'OBT02', 2, 2000, '2x1', 4000),
(57, 737123727, 'OBT01', 8, 8000, '2x1', 16000),
(58, 737123727, 'OBT02', 8, 8000, '2x1', 16000),
(59, 926652945, 'OBT01', 10, 10000, '2x1', 30000),
(60, 926652945, 'OBT01', 10, 10000, '2x1', 30000),
(61, 926652945, 'OBT02', 10, 10000, '2x1', 30000),
(62, 493574664, 'OBT01', 100, 100000, ' 2 x 1', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kode_dokter` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis_dokter` varchar(100) NOT NULL,
  `alamat_dokter` text NOT NULL,
  `kode_poliklinik` varchar(100) NOT NULL,
  `telepon_dokter` int(100) NOT NULL,
  `tarif_dokter` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dokter`, `nama_dokter`, `spesialis_dokter`, `alamat_dokter`, `kode_poliklinik`, `telepon_dokter`, `tarif_dokter`) VALUES
('DOK01', 'Dr. Strange', 'gigi', 'Asgar', 'POLI01', 9289122, 10000),
('DOK02', 'Dr. Randy', 'tulang', 'Kp. Sampora, Rt 01/01, Nanggewer Mekar, Cibinong', 'POLI02', 87138278, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `kategori_obat` varchar(100) NOT NULL,
  `harga_obat` int(100) NOT NULL,
  `jumlah_obat` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `kategori_obat`, `harga_obat`, `jumlah_obat`) VALUES
('OBT01', 'Antasida', 'tablet', 'obat terbatas', 1000, 670),
('OBT02', 'Amoxcilin', 'tablet', 'obat terbatas', 1000, 873);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pasien` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `gender_pasien` varchar(10) NOT NULL,
  `umur_pasien` int(11) NOT NULL,
  `telepon_pasien` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pasien`, `nama_pasien`, `alamat_pasien`, `gender_pasien`, `umur_pasien`, `telepon_pasien`) VALUES
('PSN0001', 'Fitri Syahrani', 'pabuaran', 'P', 18, 249887788),
('PSN0002', 'Muhammad Randy', 'kp. sampora 01/01, nanggewer mekar', 'L', 18, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `nomor_pembayaran` int(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `kode_pasien` varchar(100) NOT NULL,
  `jumlah_pembayaran` int(100) NOT NULL,
  `bayar` int(100) NOT NULL,
  `kembali` int(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`nomor_pembayaran`, `tanggal_pembayaran`, `kode_pasien`, `jumlah_pembayaran`, `bayar`, `kembali`, `created`) VALUES
(215851027, '2020-05-15', 'PSN0002', 4000, 7000, 3000, '2020-05-15 14:03:51'),
(347890570, '2020-05-08', 'PSN0002', 24000, 30000, 6000, '2020-05-08 17:11:27'),
(876758466, '2020-06-11', 'PSN0001', 4000, 10000, 6000, '2020-06-11 10:54:58'),
(924153487, '2020-04-30', 'PSN0001', 24000, 30000, 6000, '2020-04-30 22:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `nomor_pendaftaran` int(100) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `kode_dokter` varchar(100) NOT NULL,
  `kode_pasien` varchar(100) NOT NULL,
  `kode_poliklinik` varchar(100) NOT NULL,
  `biaya_pendaftaran` int(100) NOT NULL,
  `keluhan` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`nomor_pendaftaran`, `tanggal_pendaftaran`, `kode_dokter`, `kode_pasien`, `kode_poliklinik`, `biaya_pendaftaran`, `keluhan`, `status`, `created`) VALUES
(91123530, '2020-05-08', 'DOK02', 'PSN0002', 'POLI02', 24000, 'rfc44', 1, '2020-05-08 17:11:15'),
(549729938, '2020-04-30', 'DOK02', 'PSN0001', 'POLI02', 24000, 'sakit pinggang', 1, '2020-04-30 22:41:51'),
(626465290, '2020-05-15', 'DOK01', 'PSN0002', 'POLI01', 4000, 'Ngilu', 1, '2020-05-15 14:03:42'),
(765888383, '2020-06-11', 'DOK02', 'PSN0001', 'POLI02', 4000, 'sakt gigi', 1, '2020-06-11 10:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `kode_poliklinik` varchar(100) NOT NULL,
  `nama_poliklinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`kode_poliklinik`, `nama_poliklinik`) VALUES
('POLI01', 'Poli Gigi'),
('POLI02', 'Poli Umum'),
('POLI03', 'Poli Mata');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `nomor_resep` int(100) NOT NULL,
  `tanggal_resep` date NOT NULL,
  `kode_dokter` varchar(100) NOT NULL,
  `kode_pasien` varchar(100) NOT NULL,
  `kode_poliklinik` varchar(100) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`nomor_resep`, `tanggal_resep`, `kode_dokter`, `kode_pasien`, `kode_poliklinik`, `diagnosa`, `totalHarga`, `bayar`, `kembali`, `status`, `created`) VALUES
(149738691, '2020-04-30', 'DOK02', 'PSN0001', 'POLI02', 'fecfr', 4000, 10000, 6000, 1, '2020-04-30 23:25:56'),
(493574664, '2020-06-11', 'DOK02', 'PSN0001', 'POLI02', 'makan sembarangan', 100000, 100000, 0, 1, '2020-06-11 11:02:52'),
(737123727, '2020-05-08', 'DOK02', 'PSN0002', 'POLI02', 'frc', 16000, 20000, 4000, 1, '2020-05-08 17:13:13'),
(926652945, '2020-05-15', 'DOK01', 'PSN0002', 'POLI01', 'sering minum es', 30000, 30000, 0, 1, '2020-05-15 14:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode_dokter` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` int(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kode_dokter`, `username`, `password`, `nama`, `telepon`, `level`, `created`) VALUES
(1, NULL, 'admin', 'admin', 'Muhammad Randy', 8998987, 'admin', '2020-01-14 21:31:00'),
(2, NULL, 'receipt', 'receipt', 'Receptionists', 9788778, 'receipt', '2020-01-14 21:31:00'),
(3, 'DOK01', 'strange', 'strange', 'Dr. Strange ', 9988831, 'dokter', '2020-01-15 14:02:25'),
(4, NULL, 'apotek', 'apotek', 'Apoteker', 788709, 'apotek', '2020-01-15 14:08:32'),
(6, 'DOK02', 'randy', 'randy', 'Dr. Randy', 87138278, 'dokter', '2020-01-15 22:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `nomor_resep` (`nomor_resep`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kode_dokter`),
  ADD KEY `kode_poliklinik` (`kode_poliklinik`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`nomor_pembayaran`),
  ADD KEY `kode_pasien` (`kode_pasien`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nomor_pendaftaran`),
  ADD KEY `kode_dokter` (`kode_dokter`),
  ADD KEY `kode_pasien` (`kode_pasien`),
  ADD KEY `kode_poliklinik` (`kode_poliklinik`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`kode_poliklinik`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`nomor_resep`),
  ADD KEY `kode_dokter` (`kode_dokter`),
  ADD KEY `kode_pasien` (`kode_pasien`),
  ADD KEY `kode_poliklinik` (`kode_poliklinik`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_dokter` (`kode_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`kode_poliklinik`) REFERENCES `poliklinik` (`kode_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_pasien`) REFERENCES `pasien` (`kode_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`kode_pasien`) REFERENCES `pasien` (`kode_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`kode_poliklinik`) REFERENCES `poliklinik` (`kode_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`kode_poliklinik`) REFERENCES `poliklinik` (`kode_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`kode_pasien`) REFERENCES `pasien` (`kode_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
