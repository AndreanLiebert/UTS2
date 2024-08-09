-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2024 pada 08.14
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
-- Database: `db_tokopancing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Set pancing profesional'),
(2, 'Set pancing pemula'),
(3, 'Umpan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `stok` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `stok`) VALUES
(7, 2, '1 set pancing Spinning', 180000, 'gambar/sp.jpg', 'adsadasd', 4),
(8, 2, '1 set pancing BC', 200000, 'gambar/bc.jpg', 'adadasd', 4),
(9, 1, 'Reel BC Shimano SLX DC XT', 2650000, 'gambar/shimano.jpg', 'sdaas', 1),
(10, 1, 'Reel BC Relix Nusantara Fury 101', 800000, 'gambar/relix.jpg', 'asfasaa', 3),
(11, 1, 'Reel Spinning Shimano Stella SW', 9000000, 'gambar/shimano sp.jpg', 'afafa', 4),
(12, 3, 'Lure SEAHAWK YASHITA EGI SYQ 1009C - #2.2 / 8gram, ORANGE TIGER', 25000, 'gambar/umpan1.jpg', 'UMPAN CUMI / Lure SEAHAWK YASHITA EGI SYQ 1009C\r\n\r\nSize yang tersedia :\r\n#2.2 (Length 9cm / Weight 8gram) = Rp.25.000.\r\n#3.0 (Length 11.5cm / Weight 11gram) = Rp.26.500.', 35),
(13, 3, 'Soft Frog / Froggy / Kodok2an 4cm / 5gr - Yellow', 95000, 'gambar/umpan2.jpg', 'SeaRyoma Soft Frog / Froggy / Kodok2an\r\n\r\nBrand: Searyoma\r\nType: Soft Frog / Froggy / Kodok2an\r\nSize: 4cm / 5gr\r\nFungsi: Floating Slow/Fast Jigging', 13),
(14, 3, 'Lure Set ULTIMATE FROG 21 pcs / soft frog kodok umpan', 400000, 'gambar/umpan3.jpg', 'Lure Set ULTIMATE FROG\r\nBARU & ORIGINAL\r\nMURAH MERIAH HARGA GROSIR\r\nSangat cocok untuk jual lagi\r\nPengambilan minimal 21 pcs (1 lembar), tidak jual ecer.\r\nWarna pasti berbeda dengan foto, tiap lembar tidak sama', 6),
(15, 3, 'Umpan cacing tiruan / umpan cacing buatan / cacing tiruan', 40000, 'gambar/umpan4.jpg', 'Fitur:\r\nA. Merek: Afishlure\r\nB. Tipe: cacing tanah lunak\r\nC. Berat: 0.23g / pc\r\nD. Warna: merah\r\nE. Performa bagus, menarik bagi ikan\r\nF. Cocok untuk semua orang yang suka memancing', 50),
(16, 2, 'JORAN PANCING 1 SET LENGKAP - 110+bonus', 46000, 'gambar/1set.jpg', '* SATU SET JORAN PANCING SIAP PAKAI\r\n* UKURAN BISA DI PILIH DARI UKURAN 110/150/180/210/240\r\n* BONUS YANG DI DAPAT MATA PANCING/SENAR BUSA LENGKAP DENGAN KILI /PELAMPUNG/TIMAH\r\n* BONUS REEL PANCING UK 200 LENGKAP DENGAN SENAR 50M\r\n* WARNA JORAN PANCING DAN REEL DAPAT BERUBAH SESUAI STOK ( WARNA DI KIIRM RANDOM)\r\n* TERMURAH\r\n* TERKUAT\r\n* BANYAK BONUS\r\n* YUK DIORDER', 5),
(17, 2, '1 set pancing/ bc casting 1 set murah / joran bc casting', 60000, 'gambar/2set.jpg', 'Bantalan bola 18 + 1\r\nRasio roda gigi 7.2:1\r\nPanduan garis penuh\r\nTarikan maks 8kg\r\nJoran pancing 1.8M\r\nJoran pancing Casting Putar\r\nCincin pemandu kualitas tinggi\r\nJoran pancing Portable 2 bagian\r\nSpesifikasi batang:\r\nWarna: biru\r\nPanjang bukaan: 1.8m\r\nPanjang tutup: 94CM\r\nDiameter atas: 2mm/0,0inci\r\nDia:\r\nBerat umpan: 1/8-3/4oz\r\nBerat baris: 5-10LB\r\nBerat berputar/melempar: 125/123g\r\nTindakan: sedang\r\nJenis memancing: Spinning /Casting\r\nGulungan Putar:\r\n1. Kategori: gulungan pancing putar\r\n2. Bantalan bola: 3BB\r\n3. Rasio roda gigi: 5.2:1\r\n4. Warna: merah/hijau/biru/emas\r\n5. Berat: 155g\r\n6. Tangan: kiri dan kanan dapat diganti\r\nGulungan pancing:\r\n1. Jenis: gulungan pancing umpan Casting\r\n2. Rasio roda gigi: 7.2:1\r\n3. Bantalan bola: 18 + 1\r\n4. Penggunaan tangan: tangan kiri/kanan\r\n5. Berat: 229g /8.7oz\r\n6. Kapasitas saluran: 0.23mm-180m 0.28mm-150m 0.30mm-110m', 4),
(18, 3, 'Minow Casting Lure / Umpan Pancing Daido 1 SET MURAH', 260000, 'gambar/umpan5.jpg', 'Umpan memancing diciptakan berenang seperti hidup di air\r\nWarna-warna cerah, mudah ditemukan ikan di air\r\nMudah digunakan karena kombinasi yang tepat bergoyang-goyang di Air.', 6),
(19, 2, 'Set Reel Joran Pancing Ikan Laut Galatama Empang - 2.1m', 149000, 'gambar/3set.png', 'Set Reel Joran Pancing Ikan Laut Galatama Empang\r\n\r\nA) Spesifikasi\r\n\r\n1. Joran\r\n\r\nSection Pancingan:\r\n2.1 M: 5\r\n2.4 M: 6\r\n2.7 M: 6\r\n3.0 M: 7\r\n\r\nMaterial 80% FRP dan 20% Serat Karbon\r\n\r\nPanjang Terlipat:\r\n2.1 M: 65.5 cm\r\n2.4 M: 65.5 cm\r\n2.7 M: 65.5 cm\r\n3.0 M: 65.5 cm\r\n\r\nPanjang Terbuka:\r\n2.1 M: 210 cm\r\n2.4 M: 240 cm\r\n2.7 M: 270 cm\r\n3.0 M: 290 cm\r\n\r\n2. Reel\r\n\r\nBall Bearing TT4000: 10 BB\r\nRasio Gear 5.2:1\r\nMaterial Aluminium dan Plastik\r\nLine Capacity TT4000: 0.20 mm/310 M, 0.25 mm/200 M, 0.30 mm/140 M', 3),
(20, 1, 'Joran Pancing Set 1.8m 5 Sections Casting Fishing Rod with 7.2:1 Gear', 280000, 'gambar/4set.jpg', 'Fishing Rod：\r\n\r\n\r\nLength：170cm/5.5ft\r\n\r\nSections：5\r\n\r\nTop Dia：1mm/0.039in\r\n\r\nButt Dia：10mm/0.39in\r\n\r\nLure Wt: 1/4-5-8oz\r\n\r\n\r\nWeight: 125g/4.4oz\r\n\r\n\r\n\r\nFishing Reel:\r\n\r\nColor: Purple\r\n\r\nType: Baitcasting\r\n\r\nGear Ratio:7.2:1\r\n\r\nBall Bearings: 8+1BB/18+1BB\r\n\r\nWeight: 210g/7.4oz\r\n', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`judul`, `isi`) VALUES
('ABOUT', 'Toko Sahabat Mancing sudah ada sejak 2003 dan menjual berbagai jenis alat mancing untuk pemula yang ingin belajar atau sudah profesional.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$1kbKdHXTKYCxJ/l6KrFfROHOw6LWDGSgmi5A5qkxhhwsM.Tp8aPAK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`judul`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
