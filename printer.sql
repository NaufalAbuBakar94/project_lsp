-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Mar 2022 pada 01.52
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `foto` text,
  `stok` varchar(150) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `foto`, `stok`, `deskripsi`) VALUES
(87, 'HP Printer', '2500000', 'p2.jpeg', '80', 'ini adalah printer merek HP'),
(95, 'Canon Printer', '2000000', 'p1.jpeg', '92', 'ini adalah printer merk canon'),
(97, 'HP DeskJet', '2500000', 'p3.jpeg', '95', 'Hp Printer DeskJet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(150) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `subtotal` varchar(150) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('proses','dikirim','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama`, `alamat`, `no_hp`, `nama_produk`, `harga`, `subtotal`, `foto`, `status`) VALUES
(10, 'Naufal Abu Bakar', 'Jalan jati baru', '087868584838', 'Canon Printer', '2000000', '6000000', 'p1.jpeg', 'dikirim'),
(11, 'Naufal Abu Bakar', 'jatipulo', '087868584838', 'HP Printer', '2500000', '10000000', 'p2.jpeg', 'dikirim'),
(12, 'Naufal Abu Bakar', 'jatipulo', '087868584838', 'HP Printer', '2500000', '12500000', 'p2.jpeg', 'ditolak'),
(13, 'Naufal Abu Bakar', 'jalan jalan', '087868584838', 'Canon Printer', '2000000', '8000000', 'p1.jpeg', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `roles` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `roles`) VALUES
(1, 'Naufal Abu Bakar', 'falak', '1234', 'customer'),
(2, 'admin', 'admin', '1234', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
