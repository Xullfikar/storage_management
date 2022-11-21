-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2022 pada 02.23
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storage_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_barang`
--

CREATE TABLE `table_barang` (
  `Id_Barang` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Id_Tipe` int(11) NOT NULL,
  `Id_Kondisi` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `Waktu_Ditambahkan` date DEFAULT NULL,
  `Waktu_Diubah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_barang`
--

INSERT INTO `table_barang` (`Id_Barang`, `Nama`, `Gambar`, `Id_Tipe`, `Id_Kondisi`, `Jumlah`, `Id_User`, `Waktu_Ditambahkan`, `Waktu_Diubah`) VALUES
(1, 'PC', '6214933761a1d.jpg', 1, 1, 10, 2, '2022-02-15', '2022-02-22'),
(2, 'Kabel LAN', '6210cf2c70333.jpg', 3, 3, 99, 2, '2022-02-15', '2022-02-19'),
(4, 'Keybord', '', 1, 2, 25, 2, NULL, NULL),
(9, 'asd', '620b618984b3c.jpg', 2, 1, 88, 2, '2022-02-15', '2022-02-15'),
(10, 'asd', '620b8c5ed614d.png', 2, 1, 87, 2, '2022-02-15', '2022-02-16'),
(11, 'asd', '620f02e1b3d03.png', 2, 1, 88, 2, '2022-02-18', '2022-02-18'),
(13, 'asd', '621492a83072a.jpg', 2, 2, 199, 2, '2022-02-22', '2022-02-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_kondisi_barang`
--

CREATE TABLE `table_kondisi_barang` (
  `Id_Kondisi` int(11) NOT NULL,
  `Kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_kondisi_barang`
--

INSERT INTO `table_kondisi_barang` (`Id_Kondisi`, `Kondisi`) VALUES
(1, 'Baru'),
(2, 'Bekas'),
(3, 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_tipe_barang`
--

CREATE TABLE `table_tipe_barang` (
  `Id_Tipe` int(11) NOT NULL,
  `Tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_tipe_barang`
--

INSERT INTO `table_tipe_barang` (`Id_Tipe`, `Tipe`) VALUES
(1, 'Hardware Input'),
(2, 'Hardware Output'),
(3, 'Connectivity');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_user`
--

CREATE TABLE `table_user` (
  `Id_User` int(11) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Level` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `table_user`
--

INSERT INTO `table_user` (`Id_User`, `Nama_Lengkap`, `username`, `password`, `Level`) VALUES
(1, 'Zulfikar', 'andizulfikar', '$2y$10$TvI7.xkFVlzhNX21EahhOu9gFL.daaJRqAKcCQ7jPID/p0JRevMvq', 'User'),
(2, 'Afrisa', 'afrsa123', '$2y$10$lridYXYYVEoyAhYN34Kx8O9SV26q1/J/vz9kfsmnNcn/S1CF5P.zi', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `table_barang`
--
ALTER TABLE `table_barang`
  ADD PRIMARY KEY (`Id_Barang`);

--
-- Indeks untuk tabel `table_kondisi_barang`
--
ALTER TABLE `table_kondisi_barang`
  ADD PRIMARY KEY (`Id_Kondisi`) USING BTREE;

--
-- Indeks untuk tabel `table_tipe_barang`
--
ALTER TABLE `table_tipe_barang`
  ADD PRIMARY KEY (`Id_Tipe`) USING BTREE;

--
-- Indeks untuk tabel `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `table_barang`
--
ALTER TABLE `table_barang`
  MODIFY `Id_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `table_user`
--
ALTER TABLE `table_user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
