-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2024 pada 15.54
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_topupzone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_game`
--

CREATE TABLE `tbl_game` (
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `kategori_game` varchar(255) NOT NULL,
  `gambar_game` varchar(255) NOT NULL,
  `status_game` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_game`
--

INSERT INTO `tbl_game` (`id_game`, `nama_game`, `kategori_game`, `gambar_game`, `status_game`) VALUES
(1, 'Free Fire', 'rekomendasi', 'assets/images/game/kat-ff.jpg', 1),
(2, 'Mobile Legend', 'MOBA', 'assets/images/game/kat-ml.jpg', 1),
(3, 'Clash of Clans', 'strategi', 'assets/images/game/kat-coc.jpg', 1),
(5, 'Clash Royale', 'strategi', 'assets/images/game/kat-cr.jpg', 1),
(6, 'PUBG Mobile', 'strategi', 'assets/images/game/kat-pubg.jpg', 1),
(7, 'Arena Of Valor', 'Moba', 'assets/images/game/kat-aov.jpg', 1),
(8, 'Blood Strike', 'fps', 'assets/images/game/kat-bs.jpg', 1),
(9, 'Honor of Kings', 'Moba', 'assets/images/game/kat-hok.jpg', 1),
(10, 'Arena Breakout', 'horor', 'assets/images/game/kat-ab.jpg', 1),
(11, 'EA Esport FC Mobile', 'sport', 'assets/images/game/kat-fcm.jpg', 1),
(12, 'Call of Duty Mobile', 'fps', 'assets/images/game/kat-codm.jpg', 1),
(13, 'VALORANT', 'fps', 'assets/images/game/kat-valorant.jpg', 0),
(14, 'Stumble Guys', 'hiburan', 'assets/images/game/kat-sg.jpg', 1),
(15, 'Genshin Impact', 'petualangan', 'assets/images/game/kat-genshin.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(255) NOT NULL,
  `gambar_pembayaran` varchar(255) NOT NULL,
  `biaya_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nama_pembayaran`, `gambar_pembayaran`, `biaya_pembayaran`) VALUES
(1, 'Shopee Pay', 'assets/images/payment/shopeepay.png', 1000),
(2, 'Telkomsel', 'assets/images/payment/telkomsel.png', 1000),
(3, 'Dana', 'assets/images/payment/dana.png', 1000),
(4, 'Tri', 'assets/images/payment/tri.png', 1000),
(5, 'Smartfren', 'assets/images/payment/smartfren.png', 1000),
(6, 'Indoosat', 'assets/images/payment/indosat.png', 1000),
(7, 'OVO', 'assets/images/payment/ovo.png', 1000),
(8, 'Gopay', 'assets/images/payment/gopay.png', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL DEFAULT 'Diamonds'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_game`, `gambar_produk`, `jumlah_produk`, `harga_produk`, `nama_produk`) VALUES
(1, 1, 'assets/images/product/pdc-ff.png', 5, 1000, 'Diamonds'),
(2, 1, 'assets/images/product/pdc-ff.png', 10, 2000, 'Diamonds'),
(3, 1, 'assets/images/product/pdc-ff.png', 50, 7000, 'Diamonds'),
(4, 1, 'assets/images/product/pdc-ff.png', 70, 9000, 'Diamonds'),
(5, 1, 'assets/images/product/pdc-ff.png', 140, 18000, 'Diamonds'),
(6, 1, 'assets/images/product/pdc-ff.png', 355, 45000, 'Diamonds'),
(7, 1, 'assets/images/product/pdc-ff.png', 720, 90000, 'Diamonds'),
(8, 1, 'assets/images/product/pdc-ff.png', 1450, 180000, 'Diamonds'),
(9, 1, 'assets/images/product/pdc-ff.png', 2180, 270000, 'Diamonds'),
(10, 1, 'assets/images/product/pdc-ff.png', 3640, 450000, 'Diamonds'),
(11, 2, 'assets/images/product/pdc-ml.png', 3, 1000, 'Diamonds'),
(12, 2, 'assets/images/product/pdc-ml.png', 5, 1300, 'Diamonds'),
(13, 2, 'assets/images/product/pdc-ml.png', 12, 3000, 'Diamonds'),
(14, 2, 'assets/images/product/pdc-ml.png', 18, 7000, 'Diamonds'),
(15, 2, 'assets/images/product/pdc-ml.png', 19, 5000, 'Diamonds'),
(16, 2, 'assets/images/product/pdc-ml.png', 28, 7500, 'Diamonds'),
(17, 2, 'assets/images/product/pdc-ml.png', 43, 11000, 'Diamonds'),
(18, 2, 'assets/images/product/pdc-ml.png', 59, 15000, 'Diamonds'),
(19, 2, 'assets/images/product/pdc-ml.png', 85, 21000, 'Diamonds'),
(20, 2, 'assets/images/product/pdc-ml.png', 170, 43000, 'Diamonds'),
(21, 2, 'assets/images/product/pdc-ml.png', 240, 61000, 'Diamonds'),
(22, 2, 'assets/images/product/pdc-ml.png', 296, 76000, 'Diamonds'),
(23, 2, 'assets/images/product/pdc-ml.png', 408, 104000, 'Diamonds'),
(24, 2, 'assets/images/product/pdc-ml.png', 466, 145000, 'Diamonds'),
(25, 2, 'assets/images/product/pdc-ml.png', 592, 181000, 'Diamonds'),
(26, 2, 'assets/images/product/pdc-ml.png', 875, 218000, 'Diamonds'),
(27, 2, 'assets/images/product/pdc-ml.png', 2010, 475000, 'Diamonds');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_game`
--
ALTER TABLE `tbl_game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_game`
--
ALTER TABLE `tbl_game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
