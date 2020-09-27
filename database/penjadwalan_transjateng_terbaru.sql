-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2020 pada 14.55
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan_transjateng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `tanggal_jadwal` date DEFAULT NULL,
  `status_data_jadwal` varchar(50) DEFAULT NULL,
  `keterangan_lain_jadwal` varchar(50) DEFAULT NULL,
  `keterangan_waktu_jadwal` varchar(50) DEFAULT NULL,
  `keterangan_lambung_jadwal` int(11) DEFAULT NULL,
  `status_jadwal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_pengguna`, `tanggal_jadwal`, `status_data_jadwal`, `keterangan_lain_jadwal`, `keterangan_waktu_jadwal`, `keterangan_lambung_jadwal`, `status_jadwal`) VALUES
(5, 9, '2020-06-29', 'shift', NULL, '2', 2, 'approve'),
(6, 9, '2020-06-28', 'shift', NULL, '2', 1, 'noapprove'),
(10, 4, '2020-07-01', 'lambung', NULL, '1/11:25', 1, 'noapprove'),
(13, 9, '2020-07-02', 'libur', NULL, NULL, NULL, 'approve'),
(16, 9, '2020-07-03', 'lambung', '', '2/15:38', 10, 'approve'),
(19, 9, '2020-07-09', 'lambung', NULL, '1/11:25', 3, 'noapprove'),
(20, 9, '2020-07-05', 'lambung', NULL, '1/11:25', 3, 'approve'),
(21, 12, '2020-07-11', 'shift', 'bawen', '1', 0, 'noapprove'),
(22, 5, '2020-07-12', 'lambung', '', '1/11:25', 8, 'approve'),
(23, 4, '2020-07-13', 'shift', 'sukun', '2', 0, 'approve'),
(25, 4, '2020-07-16', 'libur', NULL, NULL, NULL, 'approve'),
(26, 12, '2020-07-18', 'shift', 'bawen', '1', 0, 'approve'),
(27, 9, '2020-07-11', 'libur', NULL, NULL, NULL, 'approve'),
(28, 12, '2020-07-19', 'shift', 'tawang', '2', 0, 'noapprove');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pengguna` varchar(30) DEFAULT NULL,
  `nama_lengkap_pengguna` varchar(50) DEFAULT NULL,
  `foto_pengguna` text,
  `tempat_lahir_pengguna` varchar(30) DEFAULT NULL,
  `tanggal_lahir_pengguna` date DEFAULT NULL,
  `jabatan_pengguna` varchar(30) DEFAULT NULL,
  `status_pengguna` varchar(15) DEFAULT NULL,
  `status_jadwal_pengguna` varchar(15) DEFAULT NULL,
  `tanggal_pembaruan_data_pengguna` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `kode_pengguna`, `nama_lengkap_pengguna`, `foto_pengguna`, `tempat_lahir_pengguna`, `tanggal_lahir_pengguna`, `jabatan_pengguna`, `status_pengguna`, `status_jadwal_pengguna`, `tanggal_pembaruan_data_pengguna`) VALUES
(4, '12345678', 'Khoirul Hadi', '173-Khoirul Huda.jpg', 'Grobogan #4', '1999-02-21', 'pengawas', 'karyawan', 'approve', '2020-06-27'),
(5, '11123312', 'Khoirul Budi', '664-Khoirul Huda.jpg', 'Grobogan #5', '1990-07-18', 'pramujasa', 'karyawan', 'approve', '2020-06-27'),
(9, '12332123', 'Khoirul', '961-himforma.png', 'Grobogan', '1889-07-18', 'pramujasa', 'karyawan', 'approve', '2020-06-30'),
(10, '12345123', 'Admin', '742-16670023.jpg', 'Grobogan', '1999-02-21', 'admin', 'admin', 'approve', '2020-06-29'),
(11, '54321123', 'Korlay', '427-16670023.jpg', 'Grobogan', '2000-02-21', 'korlay', 'korlay', 'approve', '2020-06-29'),
(12, '67890123', 'Kasir', '826-pendidikan.jpg', 'Grobogan', '1990-01-30', 'kasir', 'karyawan', 'approve', '2020-07-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_jadwal_asli` int(11) DEFAULT NULL,
  `id_jadwal_tukar` int(11) DEFAULT NULL,
  `status_jadwal_transaksi` varchar(25) DEFAULT NULL,
  `alasan_transaksi` varchar(250) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `status_transaksi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `id_jadwal_asli`, `id_jadwal_tukar`, `status_jadwal_transaksi`, `alasan_transaksi`, `tanggal_transaksi`, `status_transaksi`) VALUES
(7, 9, 16, 20, 'lambung', 'Oke lah. ', '2020-06-30', 'approve'),
(8, 12, 21, 26, 'shift', 'Pingin Pindah', '2020-07-10', 'approve'),
(9, 9, 19, 27, 'lambung', 'Pingin Pindah.', '2020-07-10', 'approve'),
(10, 9, 16, 27, 'libur', 'Coba Pindah.', '2020-07-10', 'approve'),
(11, 4, 23, 25, 'libur', 'Pingin Pindah.', '2020-07-10', 'approve'),
(12, 12, 26, 28, 'shift', 'Pingin Pindah Lho.', '2020-07-10', 'noapprove');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
