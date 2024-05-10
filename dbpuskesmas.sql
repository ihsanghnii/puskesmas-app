-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2024 pada 11.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpuskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kec_id`) VALUES
(1, 'Abadijaya', 3),
(2, 'Beji', 6),
(3, 'CIlodong', 19),
(4, 'Mekarsari', 11),
(34, 'Cilodong', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paramedik`
--

CREATE TABLE `paramedik` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kategori` enum('Umum','THT','Anak','Bedah','Gigi') DEFAULT NULL,
  `telpon` varchar(45) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `unit_kerja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paramedik`
--

INSERT INTO `paramedik` (`id`, `nama`, `gender`, `tmp_lahir`, `tgl_lahir`, `kategori`, `telpon`, `alamat`, `unit_kerja_id`) VALUES
(1, 'Ihsan Ghani', '1', 'Bandung', '2000-02-10', 'Umum', '081288901234', 'jalan raya bandung', 1),
(2, 'Rafkaihza Ariyanto', '1', 'Bogor', '2000-06-14', 'Anak', '082245671245', 'jalan raya bogor', 2),
(3, 'Karina Karim', '0', 'Subang', '2000-03-12', 'Bedah', '089512349067', 'jalan raya subang', 4),
(4, 'Zacky Zulkifli', '1', 'Banjarmasin', '1990-03-12', 'THT', '089876879435', 'jalan raya banjarmasin', 3),
(20, 'Wulan Putri', '0', 'Semarang', '1999-03-12', 'Gigi', '081245834794', 'jalan raya semarang', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `tmp_lahir`, `tgl_lahir`, `gender`, `email`, `alamat`, `kelurahan_id`) VALUES
(1, 'rzrm01', 'Reza Saifullah', 'Lampung', '1999-03-12', '1', 'rezarm@gmail.com', 'jalan raya lampung', 4),
(13, 'ihsn12', 'Muhammad Ihsan Abdullah', 'Bandung', '2000-03-12', '1', 'abdullah@gmail.com', 'jalan raya bandung', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` double DEFAULT NULL,
  `tinggi` double DEFAULT NULL,
  `tensi` varchar(25) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `pasien_id` int(11) NOT NULL,
  `paramedik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `tanggal`, `berat`, `tinggi`, `tensi`, `keterangan`, `pasien_id`, `paramedik_id`) VALUES
(11, '2025-01-07', 67, 176, '90/65', 'sakit', 1, 1),
(17, '2024-08-15', 74, 172, '90/60', 'normal', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama`) VALUES
(1, 'Puskesmas Beji'),
(2, 'Puskesmas Sukmajaya'),
(3, 'Puskesmas Bogor'),
(4, 'Puskesmas Subang'),
(8, 'Puskesmas Cilodong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(105) NOT NULL,
  `password` varchar(145) NOT NULL,
  `role` enum('admin','operator') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'ihsan ghani', 'ihsan@gmail.com', 'ea1e2b66eb6f4d6a8c6d8555e1b46cea', 'admin'),
(9, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paramedik`
--
ALTER TABLE `paramedik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paramedik_unit_kerja1_idx` (`unit_kerja_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_pasien_kelurahan_idx` (`kelurahan_id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_pasien1_idx` (`pasien_id`),
  ADD KEY `fk_periksa_paramedik1_idx` (`paramedik_id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `paramedik`
--
ALTER TABLE `paramedik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paramedik`
--
ALTER TABLE `paramedik`
  ADD CONSTRAINT `fk_paramedik_unit_kerja1` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_pasien_kelurahan` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_paramedik1` FOREIGN KEY (`paramedik_id`) REFERENCES `paramedik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_periksa_pasien1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
