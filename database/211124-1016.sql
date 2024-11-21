-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2024 pada 04.14
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
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(255) NOT NULL,
  `id_game` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_game`, `nama_barang`, `gambar_barang`) VALUES
('1731945876940', '1731852880551', 'Diamonds', './assets/images/product/pdc-ff.png'),
('1731946153701', '1731852880559', 'Diamonds', './assets/images/product/pdc-ml.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_game`
--

CREATE TABLE `tbl_game` (
  `id_game` varchar(255) NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `kategori_game` varchar(255) NOT NULL,
  `gambar_game` varchar(255) NOT NULL,
  `status_game` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_game`
--

INSERT INTO `tbl_game` (`id_game`, `nama_game`, `kategori_game`, `gambar_game`, `status_game`) VALUES
('1731852880551', 'Free Fire', 'rekomendasi', './assets/images/game/kat-ff.jpg', 1),
('1731852880552', 'Arena Breakout', 'rekomendasi', './assets/images/game/kat-ab.jpg', 1),
('1731852880553', 'EA Esport FC Mobile', 'sport', './assets/images/game/kat-fcm.jpg', 1),
('1731852880554', 'Call of Duty Mobile', 'fps', './assets/images/game/kat-codm.jpg', 1),
('1731852880555', 'VALORANT', 'fps', './assets/images/game/kat-valorant.jpg', 0),
('1731852880556', 'Stumble Guys', 'hiburan', './assets/images/game/kat-sg.jpg', 1),
('1731852880557', 'Genshin Impact', 'petualangan', './assets/images/game/kat-genshin.jpg', 1),
('1731852880558', 'Honor of Kings', 'Moba', './assets/images/game/kat-hok.jpg', 1),
('1731852880559', 'Mobile Legend', 'MOBA', './assets/images/game/kat-ml.jpg', 1),
('1731852880560', 'Clash of Clans', 'strategi', './assets/images/game/kat-coc.jpg', 1),
('1731852880561', 'Clash Royale', 'strategi', './assets/images/game/kat-cr.jpg', 1),
('1731852880562', 'PUBG Mobile', 'strategi', './assets/images/game/kat-pubg.jpg', 1),
('1731852880563', 'Arena Of Valor', 'Moba', './assets/images/game/kat-aov.jpg', 1),
('1731852880564', 'Blood Strike', 'fps', './assets/images/game/kat-bs.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` varchar(255) NOT NULL,
  `nama_pembayaran` varchar(255) NOT NULL,
  `gambar_pembayaran` varchar(255) NOT NULL,
  `biaya_pembayaran` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nama_pembayaran`, `gambar_pembayaran`, `biaya_pembayaran`) VALUES
('1732001613475', 'ShopeePay', './assets/images/payment/shopeepay.png', 1000),
('1732001613476', 'Telkomsel', './assets/images/payment/telkomsel.png', 1000),
('1732001613477', 'Dana', './assets/images/payment/dana.png', 1000),
('1732001613478', 'Tri', './assets/images/payment/tri.png', 1000),
('1732001613479', 'Smartfren', './assets/images/payment/smartfren.png', 1000),
('1732001613480', 'Indosat', './assets/images/payment/indosat.png', 1000),
('1732001613481', 'OVO', './assets/images/payment/ovo.png', 1000),
('1732001613482', 'GoPay', './assets/images/payment/gopay.png', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_barang`, `jumlah_produk`, `harga_produk`) VALUES
('1731988674306', '1731945876940', 5, 1000),
('1731988865907', '1731945876940', 3640, 450000),
('1731988896630', '1731946153701', 3, 1000),
('1731988904636', '1731946153701', 5, 1300),
('1731988911881', '1731946153701', 12, 3000),
('1731988918452', '1731946153701', 18, 7000),
('1731988925167', '1731946153701', 19, 5000),
('1731988935705', '1731946153701', 28, 7500),
('1731988942632', '1731946153701', 43, 11000),
('1731988951627', '1731946153701', 59, 15000),
('1731988965439', '1731946153701', 85, 21000),
('1731988977758', '1731945876940', 10, 2000),
('1731988988566', '1731946153701', 170, 43000),
('1731988998413', '1731946153701', 296, 76000),
('1731989008183', '1731946153701', 240, 61000),
('1731989022612', '1731946153701', 408, 104000),
('1731989029366', '1731945876940', 2180, 270000),
('1731989039302', '1731945876940', 1450, 180000),
('1731989046861', '1731945876940', 720, 90000),
('1731989055496', '1731945876940', 355, 45000),
('1731989063884', '1731945876940', 140, 18000),
('1731989071135', '1731945876940', 70, 9000),
('1731989082031', '1731945876940', 50, 7000),
('1731989092440', '1731946153701', 2010, 475000),
('1731989103463', '1731946153701', 875, 218000),
('1731989116153', '1731946153701', 592, 181000),
('1731989126040', '1731946153701', 466, 145000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
