-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 03:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_cek_pembayaran`
--

CREATE TABLE `tabel_cek_pembayaran` (
  `nisn` int(10) NOT NULL,
  `tgl_terakhir_bayar` date NOT NULL,
  `tgl_sekarang` date NOT NULL,
  `status_pembayaran` enum('Belum Lunas','Sudah Lunas') CHARACTER SET utf8 DEFAULT 'Belum Lunas',
  `jumlah_bulan` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `not_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `komp_keahlian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `nama_kelas`, `komp_keahlian`) VALUES
(1, 'XII PEMROG', 0),
(2, 'XII TKJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembayaran`
--

CREATE TABLE `tabel_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `status` enum('Belum Lunas','Sudah Lunas') DEFAULT 'Belum Lunas',
  `nisn` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_terakhir_bayar` date NOT NULL,
  `batas_pembayaran` date NOT NULL,
  `jumlah_bulan` varchar(10) NOT NULL,
  `id_spp` int(40) NOT NULL,
  `nominal_bayar` varchar(100) NOT NULL,
  `jumlah_bayar` varchar(40) NOT NULL,
  `kembalian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_petugas`
--

CREATE TABLE `tabel_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') DEFAULT 'petugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_petugas`
--

INSERT INTO `tabel_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', '$2y$10$3Dm7Lh956c76WgV8Op30a.VgBNHPMERbdtffJE.Rz7rvU8Ywm1olG', 'Admin', 'admin'),
(2, 'luqman', '$2y$10$t712ucFfXo4ciiyMWcmq2u6l9qzNQ5Q9vZJnpOw6OON.ZK.W4r5iq', 'Luqman', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `nisn` int(11) NOT NULL,
  `nis` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_spp`
--

CREATE TABLE `tabel_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_cek_pembayaran`
--

ALTER TABLE `tabel_cek_pembayaran`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `not_telp` (`not_telp`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tabel_kelas`
--

ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tabel_pembayaran`
--

ALTER TABLE `tabel_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tabel_petugas`
--

ALTER TABLE `tabel_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tabel_siswa`
--

ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `FOREIGN KEY` (`nis`) USING BTREE,
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `no_telp` (`no_telp`),
  ADD KEY `nama` (`nama`),
  ADD KEY `tabel_kelas_idKelas` (`id_kelas`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tabel_spp`
--

ALTER TABLE `tabel_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_cek_pembayaran`
--
ALTER TABLE `tabel_cek_pembayaran`
  MODIFY `nisn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_petugas`
--
ALTER TABLE `tabel_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--

ALTER TABLE `tabel_siswa`
  MODIFY `nisn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_spp`
--
ALTER TABLE `tabel_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD CONSTRAINT `cek_pembayaran_nama` FOREIGN KEY (`nama`) REFERENCES `tabel_cek_pembayaran` (`nama`),
  ADD CONSTRAINT `cek_pembayaran_nisn` FOREIGN KEY (`nisn`) REFERENCES `tabel_cek_pembayaran` (`nisn`),
  ADD CONSTRAINT `cek_pembayaran_noTlp` FOREIGN KEY (`no_telp`) REFERENCES `tabel_cek_pembayaran` (`not_telp`),
  ADD CONSTRAINT `tabel_kelas_idKelas` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_kelas_namaKelas` FOREIGN KEY (`nama_kelas`) REFERENCES `tabel_kelas` (`nama_kelas`),
  ADD CONSTRAINT `tabel_pembayaran_idSpp` FOREIGN KEY (`id_spp`) REFERENCES `tabel_pembayaran` (`id_spp`),
  ADD CONSTRAINT `tabel_pembayaran_nisn` FOREIGN KEY (`nisn`) REFERENCES `tabel_pembayaran` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
