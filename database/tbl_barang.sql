-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2024 pada 12.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

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
('1731946153701', '1731852880559', 'Diamonds', './assets/images/product/pdc-ml.png'),
('1732849863471', '1731852880557', 'Genesis Crystal', './assets/images/product/pdc-uc.png'),
('1732849922141', '1731852880560', 'Gems', './assets/images/product/pdc-gems coc.png'),
('1732850007938', '1731852880563', 'Voucher', './assets/images/product/pdc-voucher aov.png'),
('1732850123699', '1731852880561', 'Berlian', './assets/images/product/pdc-gems cr.png'),
('1732850146438', '1731852880564', 'Gold', './assets/images/product/pdc-gold bs.png'),
('1732850174982', '1731852880558', 'Token', './assets/images/product/pdc-token hok.png'),
('1732850201440', '1731852880555', 'Point', './assets/images/product/pdc-vp.png'),
('1732850250455', '1731852880554', 'CP', './assets/images/product/pdc-cp.png'),
('1732850289190', '1731852880552', 'Bond', './assets/images/product/pdc-bond.png'),
('1732850336605', '1731852880553', 'Fc Point', './assets/images/product/pdc-point fc.png'),
('1732850369677', '1731852880556', 'Gem', './assets/images/product/pdc-gems sg.png'),
('1732850452749', '1731852880562', 'UC', './assets/images/product/pdc-uc.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
