-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2024 pada 14.08
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
('1731852880552', 'Arena Breakout', 'nelayan', './assets/images/game/kat-ab.jpg', 1),
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
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password_pengguna` varchar(255) DEFAULT NULL,
  `akun_tamu` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_pengguna`, `password_pengguna`, `akun_tamu`) VALUES
('17328078428421', 'Sepuh', 'aseli', 0),
('17328089674674', 'Hitam', 'hytam', 0),
('17328139845074', 'FURY', 'solidsolid', 0);

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
('1731989126040', '1731946153701', 466, 145000),
('1732850476463', '1732850289190', 60, 15000),
('1732850604002', '1732850289190', 310, 80000),
('1732850634855', '1732850289190', 630, 160000),
('1732850652446', '1732850289190', 1580, 410000),
('1732850673149', '1732850289190', 3200, 830000),
('1732850694072', '1732850289190', 6500, 1650000),
('1733023796644', '1732850452749', 60, 16000),
('1733023868511', '1732850452749', 325, 80000),
('1733023896798', '1732850452749', 660, 150000),
('1733023913516', '1732850452749', 1800, 380000),
('1733023946994', '1732850452749', 3850, 770000),
('1733023976773', '1732850452749', 8100, 1150000),
('1733024004496', '1732850336605', 40, 6000),
('1733024064853', '1732850336605', 100, 16000),
('1733024082738', '1732850336605', 520, 79000),
('1733024105099', '1732850336605', 1070, 150000),
('1733024130136', '1732850336605', 2200, 320000),
('1733024161933', '1732850336605', 5750, 799000),
('1733024191690', '1732850336605', 1200, 1500000),
('1733024234626', '1732849863471', 60, 16000),
('1733024300101', '1732849863471', 330, 70000),
('1733024324873', '1732849863471', 1090, 220000),
('1733024352328', '1732849863471', 2240, 440000),
('1733024378540', '1732849863471', 3880, 730000),
('1733024405615', '1732849863471', 8800, 1400000),
('1733024434399', '1732850174982', 80, 15000),
('1733024495094', '1732850174982', 240, 45000),
('1733024532767', '1732850174982', 400, 70000),
('1733024561977', '1732850174982', 560, 100000),
('1733024584634', '1732850174982', 830, 150000),
('1733024604817', '1732850174982', 1245, 230000),
('1733024622071', '1732850174982', 2508, 450000),
('1733024644951', '1732850174982', 4180, 770000),
('1733024663566', '1732850174982', 8360, 1500000),
('1733116996650', '1732850369677', 250, 10000),
('1733117087851', '1732850369677', 800, 30000),
('1733117109561', '1732850369677', 1600, 50000),
('1733117132846', '1732850369677', 5000, 110000),
('1733117168378', '1732850369677', 8000, 280000),
('1733117225307', '1732850250455', 31, 5000),
('1733117292396', '1732850250455', 63, 10000),
('1733117307461', '1732850250455', 128, 20000),
('1733117328740', '1732850250455', 321, 45000),
('1733117353383', '1732850250455', 645, 100000),
('1733117381012', '1732850250455', 1373, 200000),
('1733117403415', '1732850250455', 2060, 270000),
('1733117428236', '1732850250455', 3564, 450000),
('1733117452164', '1732850250455', 5619, 650000),
('1733117473197', '1732850250455', 7656, 900000),
('1733117493318', '1732850250455', 15312, 1800000),
('1733117522294', '1732850007938', 40, 10000),
('1733117606599', '1732850007938', 90, 18000),
('1733117623017', '1732850007938', 230, 45000),
('1733117644430', '1732850007938', 470, 100000),
('1733117663151', '1732850007938', 950, 180000),
('1733117678789', '1732850007938', 1430, 300000),
('1733117697467', '1732850007938', 2390, 450000),
('1733117725551', '1732850007938', 4800, 1000000),
('1733117766962', '1732850146438', 105, 15000),
('1733117817140', '1732850146438', 320, 35000),
('1733117832856', '1732850146438', 540, 65000),
('1733117854765', '1732850146438', 1100, 130000),
('1733117877881', '1732850146438', 2260, 250000),
('1733117898358', '1732850146438', 5800, 630000),
('1733117917285', '1732849922141', 88, 19000),
('1733118067871', '1732849922141', 550, 96000),
('1733118084840', '1732849922141', 2750, 400000),
('1733118104848', '1732849922141', 7150, 975000),
('1733118138557', '1732849922141', 15400, 1952000),
('1733118161998', '1732850123699', 500, 66000),
('1733118276913', '1732850123699', 2500, 265000),
('1733118296909', '1732850123699', 6500, 665000),
('1733118323447', '1732850123699', 8000, 780000),
('1733118385438', '1732850123699', 14000, 1320000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `id_produk` varchar(255) NOT NULL,
  `id_pembayaran` varchar(255) NOT NULL,
  `data_player` varchar(255) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `tanggal_kadaluarsa` datetime NOT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `pajak` int(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pengguna`, `id_produk`, `id_pembayaran`, `data_player`, `tanggal_pemesanan`, `tanggal_kadaluarsa`, `tanggal_pembayaran`, `pajak`, `total`) VALUES
('12482481732969999883', '17328078428421', '1731988674306', '1732001613478', 'kntal', '2024-11-30 19:03:12', '2024-11-30 19:48:24', NULL, 200, 2200),
('12482481732970460024', '17328078428421', '1731989022612', '1732001613475', 'asdad', '2024-11-30 19:03:12', '2024-11-30 19:56:04', NULL, 10500, 115500),
('12482481733070798545', '17328078428421', '1731988977758', '1732001613475', 'kjkkj', '2024-11-30 19:03:12', '2024-12-01 23:48:23', NULL, 300, 3300),
('12482481733072534882', '17328078428421', '1731988942632', '1732001613480', 'sdaad', '2024-11-30 19:03:12', '2024-12-02 00:17:20', NULL, 1200, 13200),
('12482481733074148420', '17328078428421', '1731988911881', '1732001613478', 'jo', '2024-12-02 00:29:15', '2024-12-02 00:44:15', '2024-12-02 00:30:04', 400, 4400),
('12482481733076004911', '17328078428421', '1731989082031', '1732001613478', 'kok', '2024-12-02 01:00:08', '2024-12-02 01:15:08', NULL, 800, 8800),
('18944551733075572041', '17328078428421', '1731988977758', '1732001613480', 'ko', '2024-12-02 00:52:55', '2024-12-02 01:07:55', '2024-12-02 00:53:08', 300, 3300);

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
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
