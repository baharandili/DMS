-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2022 pada 08.45
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmsbahar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `branch`
--

CREATE TABLE `branch` (
  `id_branch` int(11) NOT NULL,
  `kode_branch` varchar(50) NOT NULL,
  `branch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `branch`
--

INSERT INTO `branch` (`id_branch`, `kode_branch`, `branch`) VALUES
(35, 'wrc', 'SANBE UNIT 45'),
(36, 'SB', 'SANBE UNIT 41'),
(37, 'CCW', 'SANBE UNIT 45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(1) NOT NULL,
  `kode_category` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `kode_category`, `category`) VALUES
(5, 'ARC', 'Analisis Record'),
(6, 'ARD', 'Analisis Document');

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `id_department` int(1) NOT NULL,
  `kode_department` varchar(11) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`id_department`, `kode_department`, `department`) VALUES
(3, '0aaa', 'DCC'),
(4, 'TEST', 'IT Department');

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `kode_dokumen` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `grp` varchar(50) NOT NULL,
  `sitelocation` varchar(50) NOT NULL,
  `picemail` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`id_document`, `kode_dokumen`, `branch`, `department`, `section`, `category`, `grp`, `sitelocation`, `picemail`, `tanggal`, `deskripsi`) VALUES
(3, 'DOC0001', 'SANBE UNIT 45', 'PRODUCTION', 'Production Proses', 'Analisis Record', 'GROUP A', 'Hormon', 'najar@gmail.com', '2022-02-18', 'Arsip'),
(7, 'DOC0007', 'SANBE UNIT 45', 'DCC', 'Production Proses', 'Analisis Record', 'DEPT IT SA', 'it dept', 'najar@gmail.com', '2022-03-23', 'asbvdhjavdjahvdahjvdajds'),
(8, 'DOC0008', 'SANBE UNIT 41', 'DCC', 'Production Proses', 'Analisis Record', 'GROUP', 'it dept', 'najar@gmail.com', '2022-04-06', 'Arsip'),
(9, 'DOC0009', 'SANBE UNIT 45', 'DCC', 'Production Proses', 'Analisis Record', 'DEPT IT SA', 'it dept', 'najar@gmail.com', '2022-03-16', 'dokumen didalam file');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grp`
--

CREATE TABLE `grp` (
  `id_group` int(1) NOT NULL,
  `kode_group` varchar(50) NOT NULL,
  `grp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grp`
--

INSERT INTO `grp` (`id_group`, `kode_group`, `grp`) VALUES
(5, 'GRA', 'DEPT IT SA'),
(6, 'GRA', 'GROUP'),
(7, 'GRA', 'DEPT IT'),
(9, 'AS', 'TTF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `picemail`
--

CREATE TABLE `picemail` (
  `id_picemail` int(1) NOT NULL,
  `kode_picemail` varchar(50) NOT NULL,
  `picemail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `picemail`
--

INSERT INTO `picemail` (`id_picemail`, `kode_picemail`, `picemail`) VALUES
(4, 'DCC', 'najar@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `section`
--

CREATE TABLE `section` (
  `id_section` int(1) NOT NULL,
  `kode_section` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `section`
--

INSERT INTO `section` (`id_section`, `kode_section`, `section`) VALUES
(4, 'PR', 'Production Proses'),
(5, 'dsc', 'DCC officer'),
(6, 'PR', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sitelocation`
--

CREATE TABLE `sitelocation` (
  `id_sitelocation` int(1) NOT NULL,
  `kode_sitelocation` varchar(11) NOT NULL,
  `sitelocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sitelocation`
--

INSERT INTO `sitelocation` (`id_sitelocation`, `kode_sitelocation`, `sitelocation`) VALUES
(4, 'HM', 'it dept');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin'),
(3, 'bahar', 'bahar', 'BAHAR', 'DMSOfficer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id_branch`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indeks untuk tabel `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`id_group`);

--
-- Indeks untuk tabel `picemail`
--
ALTER TABLE `picemail`
  ADD PRIMARY KEY (`id_picemail`);

--
-- Indeks untuk tabel `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indeks untuk tabel `sitelocation`
--
ALTER TABLE `sitelocation`
  ADD PRIMARY KEY (`id_sitelocation`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `branch`
--
ALTER TABLE `branch`
  MODIFY `id_branch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `grp`
--
ALTER TABLE `grp`
  MODIFY `id_group` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `picemail`
--
ALTER TABLE `picemail`
  MODIFY `id_picemail` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sitelocation`
--
ALTER TABLE `sitelocation`
  MODIFY `id_sitelocation` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
