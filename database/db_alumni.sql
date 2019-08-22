-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2019 pada 06.53
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'admin', 'foto1r.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_thn` int(11) NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`nis`, `nama`, `id_thn`, `jns_kelamin`, `tmpt_lahir`, `tgl_lahir`, `telp`, `pekerjaan`, `alamat`, `foto`, `password`) VALUES
('1111', 'Doni Tata', 3, 'Laki-Laki', 'Sukabumi', '2019-12-31', '021918191', '-', 'Sukabumi', 'foto1111g.png', '1111'),
('12345', 'Test Siswa', 4, 'Laki-Laki', 'Jakarta', '2019-12-31', '081291819189', 'Mahasiswa', 'Sukabumi', 'user.jpg', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tgl_event` date NOT NULL,
  `tempat_event` varchar(50) NOT NULL,
  `waktu_event` varchar(20) NOT NULL,
  `batas_daftar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tgl_event`, `tempat_event`, `waktu_event`, `batas_daftar`, `keterangan`, `status`, `id_adm`) VALUES
(1, 'Reuni Akbar', '2019-05-20', 'Sekolah', '08:00', '2019-06-20', 'Reuni Akbar', 'Open', 1),
(3, 'Test Event', '2019-06-20', 'SMK BM2', '09:00', '2019-06-20', 'Test Event', 'Open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `id_thn` int(11) NOT NULL,
  `nama_thn` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_thn`, `nama_thn`) VALUES
(3, '2010/2011'),
(4, '2011/2012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_event`
--

CREATE TABLE IF NOT EXISTS `temp_event` (
  `id_temp` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `temp_event`
--

INSERT INTO `temp_event` (`id_temp`, `id_event`, `nis`) VALUES
(1, 1, '12345'),
(2, 1, '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_thn`);

--
-- Indexes for table `temp_event`
--
ALTER TABLE `temp_event`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temp_event`
--
ALTER TABLE `temp_event`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
