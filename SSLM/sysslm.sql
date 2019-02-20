-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 09:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysslm`
--

-- --------------------------------------------------------

--
-- Table structure for table `maklumat_kesalahan_pelajar`
--

CREATE TABLE `maklumat_kesalahan_pelajar` (
  `id_maklumat_pelajar` int(10) NOT NULL,
  `id_pelajar` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `id_kesalahan` int(10) NOT NULL,
  `tarikh` date NOT NULL,
  `masa` time NOT NULL,
  `perincian_kesalahan_lain` text NOT NULL,
  `tindakan` int(1) NOT NULL,
  `tempat_kesalahan` varchar(100) NOT NULL,
  `tarikh_cipta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maklumat_kesalahan_pelajar`
--

INSERT INTO `maklumat_kesalahan_pelajar` (`id_maklumat_pelajar`, `id_pelajar`, `id_pengguna`, `id_kesalahan`, `tarikh`, `masa`, `perincian_kesalahan_lain`, `tindakan`, `tempat_kesalahan`, `tarikh_cipta`) VALUES
(1, 2, 5, 4, '2019-02-10', '04:00:00', '', 1, 'Kajang', '2019-02-10 15:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `maklumat_pelajar`
--

CREATE TABLE `maklumat_pelajar` (
  `id_pelajar` int(10) NOT NULL,
  `nama_pelajar` varchar(200) NOT NULL,
  `no_kp` varchar(20) NOT NULL,
  `jantina` varchar(15) NOT NULL,
  `kelas_kohot` varchar(15) NOT NULL,
  `keturunan` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `guru_kls` varchar(200) NOT NULL,
  `tel_penjaga` varchar(15) NOT NULL,
  `asrama` varchar(10) NOT NULL,
  `dicipta_oleh` varchar(200) NOT NULL,
  `tarikh_cipta` datetime DEFAULT CURRENT_TIMESTAMP,
  `kemaskini_oleh` varchar(200) NOT NULL,
  `tarikh_kemaskini` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maklumat_pelajar`
--

INSERT INTO `maklumat_pelajar` (`id_pelajar`, `nama_pelajar`, `no_kp`, `jantina`, `kelas_kohot`, `keturunan`, `agama`, `alamat`, `guru_kls`, `tel_penjaga`, `asrama`, `dicipta_oleh`, `tarikh_cipta`, `kemaskini_oleh`, `tarikh_kemaskini`) VALUES
(1, 'upin', '123456-10-1111', 'Lelaki', '1SVM KPD', 'MELAYU', 'ISLAM', 'KAJANG', 'LAILATI', '011-60731612', 'Ya', 'danny', '2019-02-10 15:02:11', '', NULL),
(2, 'NUR ARISSA IRWANI BINTI IMRAN', '080506-10-0344', 'Perempuan', '1SVM KPD', 'MELAYU', 'ISLAM', 'KAJANG SELANGOR', 'RAHAYU BINTI ABDULLAH SANI', '0192226224', 'Ya', 'danny', '2019-02-10 15:17:54', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maklumat_pengguna`
--

CREATE TABLE `maklumat_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `no_kp` varchar(20) NOT NULL,
  `log_nama` varchar(100) NOT NULL,
  `katalaluan` varchar(20) NOT NULL,
  `aras` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `kemaskini_oleh` varchar(200) NOT NULL,
  `tarikh_kemaskini` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maklumat_pengguna`
--

INSERT INTO `maklumat_pengguna` (`id_pengguna`, `no_kp`, `log_nama`, `katalaluan`, `aras`, `status`, `kemaskini_oleh`, `tarikh_kemaskini`) VALUES
(1, '010101010101', 'danny', 'mdanial', 'Admin', 1, 'danny', '2019-02-06 19:00:23'),
(2, '123456-10-1111', 'upin', 'upinipin', 'Pelajar', 1, 'danny', '2019-02-10 15:02:11'),
(3, '761201-10-2322', 'eimsolo', 'imran', 'Pensyarah', 1, 'danny', '2019-02-10 15:11:18'),
(4, '080506-10-0344', 'waniirwani', '12345678', 'Pelajar', 1, 'danny', '2019-02-10 15:17:54'),
(5, '761201-10-2322', 'ayu', 'ayu', 'Pensyarah', 1, 'danny', '2019-02-10 15:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kesalahan`
--

CREATE TABLE `ref_kesalahan` (
  `id_kesalahan` int(10) NOT NULL,
  `kod_kesalahan` varchar(10) NOT NULL,
  `perincian_kesalahan` varchar(100) NOT NULL,
  `merit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_kesalahan`
--

INSERT INTO `ref_kesalahan` (`id_kesalahan`, `kod_kesalahan`, `perincian_kesalahan`, `merit`) VALUES
(1, '001', 'merokok', 5),
(2, 'A03', 'Mengancam/memukul/mencederakan pensyarah', 40),
(3, '003', 'Buli', 5),
(4, '004', 'vandalisme', 5),
(5, 'A02', 'Mencuri', 40),
(6, 'A06', 'Peras ugut', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maklumat_kesalahan_pelajar`
--
ALTER TABLE `maklumat_kesalahan_pelajar`
  ADD PRIMARY KEY (`id_maklumat_pelajar`);

--
-- Indexes for table `maklumat_pelajar`
--
ALTER TABLE `maklumat_pelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- Indexes for table `maklumat_pengguna`
--
ALTER TABLE `maklumat_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `ref_kesalahan`
--
ALTER TABLE `ref_kesalahan`
  ADD PRIMARY KEY (`id_kesalahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maklumat_kesalahan_pelajar`
--
ALTER TABLE `maklumat_kesalahan_pelajar`
  MODIFY `id_maklumat_pelajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maklumat_pelajar`
--
ALTER TABLE `maklumat_pelajar`
  MODIFY `id_pelajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maklumat_pengguna`
--
ALTER TABLE `maklumat_pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_kesalahan`
--
ALTER TABLE `ref_kesalahan`
  MODIFY `id_kesalahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
