-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Nov 2017 pada 11.39
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esidak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` int(12) NOT NULL,
  `nama_siswa` varchar(26) NOT NULL,
  `id_jurusan` int(8) NOT NULL,
  `kelas` int(5) NOT NULL,
  `indeks` int(5) NOT NULL,
  `nama_ortu` varchar(26) NOT NULL,
  `no_ortu` varchar(14) NOT NULL,
  `alamat` varchar(38) NOT NULL,
  `poin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_siswa`, `id_jurusan`, `kelas`, `indeks`, `nama_ortu`, `no_ortu`, `alamat`, `poin`) VALUES
(24901, 'budi a rpl 1', 1, 10, 1, 'qwertyy', '123456789', 'jalan', 100),
(24902, 'budi b rpl 1', 1, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24903, 'budi a rpl 2', 1, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24904, 'budi b rpl 2', 1, 10, 2, 'qwerty', '123456789', 'jalan', 90),
(24905, 'budi a mm 1', 2, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24906, 'budi b mm 1', 2, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24907, 'budi a mm 2', 2, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24908, 'budi b mm 2', 2, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24909, 'budi a tkj 1', 3, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24910, 'budi b tkj 1', 3, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24911, 'budi a tkj 2', 3, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24912, 'budi b tkj 2', 3, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24913, 'budi a pm 1', 4, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24914, 'budi b pm 1', 4, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24915, 'budi a pm 2', 4, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24916, 'budi b pm 2', 4, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24917, 'budi a ek 1', 5, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24918, 'budi b ek 1', 5, 10, 1, 'qwerty', '123456789', 'jalan', 100),
(24919, 'budi a ek 2', 5, 10, 2, 'qwerty', '123456789', 'jalan', 100),
(24920, 'budi b ek 2', 5, 10, 2, 'qwerty', '123456789', 'jalan', 5),
(24921, 'yan a rpl 1', 1, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24922, 'yan b rpl 1', 1, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24923, 'yan a rpl 2', 1, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24924, 'yan b rpl 2', 1, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24925, 'yan a mm 1', 2, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24926, 'yan b mm 1', 2, 11, 1, 'asas12', '123456789', 'jalan', 90),
(24927, 'yan a mm 2', 2, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24928, 'yan b mm 2', 2, 11, 2, 'asas12', '123456789', 'jalan', 5),
(24929, 'yan a tkj 1', 3, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24930, 'yan b tkj 1', 3, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24931, 'yan a tkj 2', 3, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24932, 'yan b tkj 2', 3, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24933, 'yan a pm 1', 4, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24934, 'yan b pm 1', 4, 11, 1, 'asas12', '123456789', 'jalan', 100),
(24935, 'yan a pm 2', 4, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24936, 'yan b pm 2', 4, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24937, 'yan a ek 1', 5, 11, 1, 'asas12', '123456789', 'jalan', 95),
(24938, 'yan b ek 1', 5, 11, 1, 'asas12', '123456789', 'jalan', 95),
(24939, 'yan a ek 2', 5, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24940, 'yan b ek 2', 5, 11, 2, 'asas12', '123456789', 'jalan', 100),
(24941, 'adit a rpl 1', 1, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24942, 'adit b rpl 1', 1, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24943, 'adit a rpl 2', 1, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24944, 'adit b rpl 2', 1, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24945, 'adit a mm 1', 2, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24946, 'adit b mm 1', 2, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24947, 'adit a mm 2', 2, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24948, 'adit b mm 2', 2, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24949, 'adit a tkj 1', 3, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24950, 'adit b tkj 1', 3, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24951, 'adit a tkj 2', 3, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24952, 'adit b tkj 2', 3, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24953, 'adit a pm 1', 4, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24954, 'adit b pm 1', 4, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24955, 'adit a pm 2', 4, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24956, 'adit b pm 2', 4, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24957, 'adit a ek 1', 5, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24958, 'adit b ek 1', 5, 12, 1, 'qwerty', '123456789', 'jalan', 100),
(24959, 'adit a ek 2', 5, 12, 2, 'qwerty', '123456789', 'jalan', 100),
(24960, 'adit b ek 2', 5, 12, 2, 'qwerty', '123456789', 'jalan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `singkatan` varchar(100) NOT NULL,
  `indeks_x` int(5) NOT NULL,
  `indeks_xi` int(5) NOT NULL,
  `indeks_xii` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `singkatan`, `indeks_x`, `indeks_xi`, `indeks_xii`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'RPL', 2, 2, 2),
(2, 'Multimedia', 'MM', 2, 2, 2),
(3, 'Teknik Komputer dan Jaringan', 'TKJ', 2, 2, 2),
(4, 'Pemesinan', 'PM', 2, 2, 2),
(5, 'Elektronika', 'EK', 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(12) NOT NULL,
  `nama_pelanggaran` varchar(18) NOT NULL,
  `min_poin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `min_poin`) VALUES
(1, 'Sidak Rambut', 10),
(2, 'Sidak Pakaian', 10),
(3, 'Sidak Sepatu', 5),
(4, 'Sidak Artibut', 5),
(5, 'Terlambat', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(12) NOT NULL,
  `id_user` int(50) NOT NULL,
  `nis` int(12) NOT NULL,
  `id_pelanggaran` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_user`, `nis`, `id_pelanggaran`, `tanggal`) VALUES
(111, 3, 24937, 3, '2017-11-13'),
(113, 3, 24938, 5, '2017-11-13'),
(114, 3, 24926, 1, '2017-11-13'),
(115, 2, 24904, 2, '2017-11-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(18) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `level` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `level`) VALUES
(1, 'I Ketut Budi Astawa', 'admin', 'admin', 'admin'),
(2, 'Hendra Setiawan', 'hendra', 'hendra', 'osis'),
(3, 'Yan Wiratama', 'yan', 'yan', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
