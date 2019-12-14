-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 06:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diy`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id_about` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_rekening` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id_about`, `name`, `email`, `kontak`, `web`, `no_rekening`, `jenis_rekening`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'diy@gmail.com', '082287187', 'tokodiy.com', '67823678154', 'BCA', 'Toko Diy Merupakana ........', '2019-04-02 17:00:00', '2019-04-26 01:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelians`
--

CREATE TABLE `detail_pembelians` (
  `id_detail_pembelian` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualans`
--

CREATE TABLE `detail_penjualans` (
  `id_detail_penjualan` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE `detail_users` (
  `id_detailuser` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`id_detailuser`, `id_user`, `jk`, `alamat`, `icon_user`, `level`, `created_at`, `updated_at`) VALUES
(1, '1', 'l', 'ayooo apaaa', 'download.jpeg', '1', '2019-04-03 02:36:03', '2019-04-19 00:00:30'),
(2, '3', 'p', 'agam', '76fdca7ddd437c285f30700b720d87a71370042351_full.jpg', '2', '2019-04-08 08:44:53', '2019-04-08 08:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `favorits`
--

CREATE TABLE `favorits` (
  `id_favorit` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_penjual` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorits`
--

INSERT INTO `favorits` (`id_favorit`, `id_user`, `id_produk`, `id_penjual`, `nama_penjual`, `harga_beli`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 0, '', 500000, '2019-04-03 17:29:34', '2019-04-03 17:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `historys`
--

CREATE TABLE `historys` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `kode_pembayaran` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_detailuser` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `jlh_beli` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `id_jasapengiriman` int(11) NOT NULL,
  `is_status` enum('0','1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historys`
--

INSERT INTO `historys` (`id_history`, `kode_pembayaran`, `id_user`, `id_detailuser`, `id_penjual`, `id_produk`, `harga_beli`, `jlh_beli`, `total_harga`, `id_jasapengiriman`, `is_status`, `created_at`, `updated_at`) VALUES
(47, 'DIY0311', 3, 2, 1, 1, 5000, 1, 10000, 2, '1', '2019-04-21 20:57:12', '2019-04-22 20:11:27'),
(63, 'DIY0313', 3, 3, 1, 5, 105000, 2, 210000, 2, '1', '2019-04-24 21:53:09', '2019-04-24 21:53:09'),
(64, 'DIY0313', 3, 2, 1, 3, 10000, 2, 20000, 2, '1', '2019-04-30 00:44:17', '2019-04-30 00:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id_info` int(10) UNSIGNED NOT NULL,
  `judul_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id_info`, `judul_info`, `isi_info`, `gambar_info`, `created_at`, `updated_at`) VALUES
(1, 'entah', 'apo ancak?', 'a.jpg', '2019-04-03 00:59:03', '2019-04-03 00:59:03'),
(2, 'apo ancak selah', 'isi selah nan katuju', 'favorit.PNG', '2019-04-03 01:08:19', '2019-04-03 01:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `jasapengirimans`
--

CREATE TABLE `jasapengirimans` (
  `id_jasapengiriman` int(10) UNSIGNED NOT NULL,
  `jenis_jasa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jasa` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasapengirimans`
--

INSERT INTO `jasapengirimans` (`id_jasapengiriman`, `jenis_jasa`, `harga_jasa`, `created_at`, `updated_at`) VALUES
(2, 'JNT', 11000, '2019-04-29 22:11:00', '2019-04-29 22:12:46'),
(3, 'POS', 8000, '2019-04-29 22:56:51', '2019-04-29 23:22:03'),
(5, 'JNE', 8500, '2019-04-29 23:23:03', '2019-04-30 00:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gbr_kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama_kategori`, `gbr_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Plastic', 'plastik.jpg', '2019-03-27 08:28:48', '2019-03-27 08:28:48'),
(2, 'Metal', 'metal.jpg', '2019-03-27 08:29:04', '2019-03-27 08:29:04'),
(3, 'Wood', 'kayu.jpg', '2019-03-27 08:29:21', '2019-03-27 08:29:21'),
(4, 'Fabric', 'fabric.jpg', '2019-03-27 08:29:33', '2019-03-27 08:29:33'),
(5, 'Paper', 'paper.jpg', '2019-03-27 08:30:16', '2019-03-27 08:30:16'),
(7, 'Technology', 'technology', '2019-04-23 15:46:49', '2019-04-23 15:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_penjual` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `jlh_beli` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `is_status` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangs`
--

INSERT INTO `keranjangs` (`id_keranjang`, `id_user`, `id_produk`, `id_penjual`, `nama_penjual`, `harga_beli`, `jlh_beli`, `total_harga`, `is_status`, `created_at`, `updated_at`) VALUES
(17, 1, 3, 4, 'hello', 100, 5, 500, '1', '2019-04-25 21:09:24', '2019-04-25 21:43:01'),
(18, 3, 1, 1, 'admin', 200, 4, 800, '1', '2019-04-25 21:10:24', '2019-04-25 21:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id_media` int(10) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `file_media` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id_media`, `id_produk`, `file_media`, `created_at`, `updated_at`) VALUES
(14, 1, 'hp3', '2019-04-18 20:06:14', '2019-04-18 20:06:14'),
(15, 1, 'hp1', '2019-04-18 20:06:22', '2019-04-23 15:50:23'),
(16, 2, 'logo.png', '2019-04-26 02:17:22', '2019-04-26 02:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_03_12_065458_create_media_table', 6),
(17, '2019_03_12_083857_create_tokos_table', 12),
(19, '2019_03_12_093748_create_penjualans_table', 14),
(24, '2014_10_12_000000_create_users_table', 15),
(25, '2014_10_12_100000_create_password_resets_table', 15),
(26, '2016_06_01_000001_create_oauth_auth_codes_table', 15),
(27, '2016_06_01_000002_create_oauth_access_tokens_table', 15),
(28, '2016_06_01_000003_create_oauth_refresh_tokens_table', 15),
(29, '2016_06_01_000004_create_oauth_clients_table', 15),
(30, '2016_06_01_000005_create_oauth_personal_access_clients_table', 15),
(31, '2019_03_12_045157_create_kategoris_table', 15),
(32, '2019_03_12_050836_create_produks_table', 15),
(33, '2019_03_12_064643_create_units_table', 15),
(34, '2019_03_12_071607_create_medias_table', 15),
(35, '2019_03_12_074618_create_points_table', 15),
(36, '2019_03_12_075333_create_pesans_table', 15),
(37, '2019_03_12_080051_create_supliers_table', 15),
(38, '2019_03_12_082654_create_orders_table', 15),
(39, '2019_03_12_092715_create_tokos_table', 15),
(40, '2019_03_12_095454_create_penjualans_table', 15),
(41, '2019_03_12_100328_create_detail_penjualans_table', 15),
(42, '2019_03_12_102501_create_pembelians_table', 15),
(43, '2019_03_12_103440_create_detail_pembelians_table', 15),
(44, '2019_04_02_093309_create_info_table', 16),
(45, '2019_04_02_093609_create_infos_table', 17),
(46, '2019_04_02_094107_create_infos_table', 18),
(47, '2019_04_02_094545_create_detail_users_table', 19),
(48, '2019_04_02_204102_create_keranjangs_table', 20),
(49, '2019_04_03_051843_create_favorits_table', 21),
(50, '2019_04_03_081949_create_abouts_table', 22),
(51, '2019_04_05_083235_create_pembayarans_table', 23),
(52, '2019_04_09_092052_create_historys_table', 24),
(53, '2019_04_26_065929_create_pengirimans_table', 25),
(54, '2019_04_27_160825_create_jasa_pengirimans_table', 26),
(55, '2019_04_30_045714_create_jasapengirimans_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00badee05b6475471d1b2d11d7cabf000fe05dc3832e83b3eb4fe588b5fe603b1acef676ec5a2769', 4, 1, 'nApp', '[]', 0, '2019-04-24 00:24:05', '2019-04-24 00:24:05', '2020-04-24 07:24:05'),
('12bf118dc02ac7dbf8aa767496bbde335b74fc589fb31623de9f4cfb0fefba3edd86b4a50780b2e6', 1, 1, 'nApp', '[]', 0, '2019-04-29 08:59:02', '2019-04-29 08:59:02', '2020-04-29 15:59:02'),
('1b9efe158d236c8327f3b0ddc60fe13cc965e608647b9a82aee2a8b525e35c68e3413bba5c3f810c', 1, 1, 'nApp', '[]', 0, '2019-03-29 00:09:12', '2019-03-29 00:09:12', '2020-03-29 07:09:12'),
('267ee68d08eec4ba8545368687e4b316b55bd0b1ae5a501903e09fca19b740a2c5fe7553cd0a7e34', 1, 1, 'nApp', '[]', 0, '2019-04-30 01:31:20', '2019-04-30 01:31:20', '2020-04-30 08:31:20'),
('3875f5a05083483835cce14f04741f3a81310353071bf0b8f15b9bb1cafa6cfc6a41ed033d276069', 4, 1, 'nApp', '[]', 0, '2019-03-29 01:33:17', '2019-03-29 01:33:17', '2020-03-29 08:33:17'),
('42145a401d3f51db2b356f90d2bcf9fac926be623d67ad826be7e61a296fa8830eab8a6ef663e32c', 1, 1, 'nApp', '[]', 0, '2019-03-11 21:20:51', '2019-03-11 21:20:51', '2020-03-12 04:20:51'),
('4d36d57259be9e52f7dddded094cd70b572248e553a9094a7fedf9352256aa07892424ce1570859e', 4, 1, 'nApp', '[]', 0, '2019-03-29 00:47:01', '2019-03-29 00:47:01', '2020-03-29 07:47:01'),
('4ef053c90502ec0b0eba4d00db9ec206fb2cd14d781d5b6cc93788566b8482aaf2653d7d827fcdda', 2, 1, 'nApp', '[]', 0, '2019-03-11 21:36:24', '2019-03-11 21:36:24', '2020-03-12 04:36:24'),
('59255266c763f62900f45cb4a9759cd398bc02fed0dcced69b09705a729e9fc8385a2f6c3defa3bd', 4, 1, 'nApp', '[]', 0, '2019-04-24 00:24:50', '2019-04-24 00:24:50', '2020-04-24 07:24:50'),
('5b9a7e87e8883fd96c2c55dabfcdf62e14e969905aec5b53dab290220ebac3f8ab424bd3d578b919', 5, 1, 'nApp', '[]', 0, '2019-04-29 08:38:37', '2019-04-29 08:38:37', '2020-04-29 15:38:37'),
('5f0d08f886f81d428dc1abf32f0707b377b5207344aca5632f7cfd42f7c22e641e761e8726cd228e', 3, 1, 'nApp', '[]', 0, '2019-03-31 14:09:24', '2019-03-31 14:09:24', '2020-03-31 21:09:24'),
('646583d5ed12cb2ba33d4714c908cc0e2ad2898dc5d17f24df7a0656bcfeb9d5ff6c237c546d1526', 1, 1, 'nApp', '[]', 0, '2019-03-11 21:21:23', '2019-03-11 21:21:23', '2020-03-12 04:21:23'),
('72428cc4f96b000201ccc45bc76ceae2eb0dbbd5aca65c6ba056ea085b58e94f3b664b1618973e9b', 4, 1, 'nApp', '[]', 0, '2019-03-29 00:46:19', '2019-03-29 00:46:19', '2020-03-29 07:46:19'),
('7f3090c718f17bcdcafd9be2ad6cbad11083450e2d23a01706f45eecdb8a818996a53afa07f6045c', 5, 1, 'nApp', '[]', 0, '2019-04-30 01:31:29', '2019-04-30 01:31:29', '2020-04-30 08:31:29'),
('90b09d17a5e3dacf36c47329646fac84eea66e678d3e45d77916d9e4279ea7fc3689785b6c1d49c4', 5, 1, 'nApp', '[]', 0, '2019-04-30 02:30:05', '2019-04-30 02:30:05', '2020-04-30 09:30:05'),
('b2d7b7f7e5e915db086bb40b6e5188f4722dea00df02d3d66af4c818c3612e0447db04009d2a54c0', 1, 1, 'nApp', '[]', 0, '2019-03-31 14:51:36', '2019-03-31 14:51:36', '2020-03-31 21:51:36'),
('c090e695346a8694c9b7b30d76bd11ff383a0cd559aa57bcd15e5d10ed054f441455fa630a04daab', 4, 1, 'nApp', '[]', 0, '2019-03-29 00:47:35', '2019-03-29 00:47:35', '2020-03-29 07:47:35'),
('dab1be740f705d317258bbea48afdb5cfa1678f16a015c90cd96c7d4cdb12b6c1ab101ca5796c2d6', 1, 1, 'nApp', '[]', 0, '2019-04-30 01:27:52', '2019-04-30 01:27:52', '2020-04-30 08:27:52'),
('de4e534f5b0918590c6d6b1e9125383f44bec8106c29bf5157327bc8320d9eddad7fbde46578a1fa', 1, 1, 'nApp', '[]', 0, '2019-03-11 21:05:53', '2019-03-11 21:05:53', '2020-03-12 04:05:53'),
('e3fcb79b7bb5c0f6e8c5838e23df45a45bf024ec5488995f53a37b3b8709b09693fd01a67b4f2564', 1, 1, 'nApp', '[]', 0, '2019-04-29 08:58:10', '2019-04-29 08:58:10', '2020-04-29 15:58:10'),
('e7e6e87f1b5753063c4598d4eeff966dc058b110bff451125930c8860ee98d78f9ad9557ae45d6d9', 3, 1, 'nApp', '[]', 0, '2019-03-31 14:08:38', '2019-03-31 14:08:38', '2020-03-31 21:08:38'),
('ebc57fa88866272788288d7495d84352238c20de96e0edf549eff5571a96335fbe0312fda71802ea', 1, 1, 'nApp', '[]', 0, '2019-03-11 21:21:57', '2019-03-11 21:21:57', '2020-03-12 04:21:57'),
('ed0c54b20ae0022eb18fc610a2cdd23ce475a26e61af77c6ab917e6f32eab75f14d425db76e005b4', 3, 1, 'nApp', '[]', 0, '2019-03-29 00:10:38', '2019-03-29 00:10:38', '2020-03-29 07:10:38'),
('fae68e9c93b3e2da095cece6e6e8dcf54fe936bba444601e7300fa1c59e53d2856b5fbf9e2c3fe34', 5, 1, 'nApp', '[]', 0, '2019-04-30 01:27:42', '2019-04-30 01:27:42', '2020-04-30 08:27:42'),
('fe91c2a8f8fa469daa13cefb218afa1c80f9b78eaf8c22e0c85f6c3f3801f76b31ddae1781f07d9b', 1, 1, 'nApp', '[]', 0, '2019-04-30 01:23:33', '2019-04-30 01:23:33', '2020-04-30 08:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '4Ybcl5l3fIuRyCRVOrvgTf0VqpebXEOd3XXkyCqw', 'http://localhost', 1, 0, 0, '2019-03-11 20:56:43', '2019-03-11 20:56:43'),
(2, NULL, 'Laravel Password Grant Client', 'AjgCXAnsUCHJcVNz6LnKPQA8WkYkxs1sS2qTmR01', 'http://localhost', 0, 1, 0, '2019-03-11 20:56:43', '2019-03-11 20:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-03-11 20:56:43', '2019-03-11 20:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `qty` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_produk`, `id_suplier`, `tgl_order`, `qty`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2019-03-26', 1, '2019-03-27 09:04:07', '2019-03-27 09:04:07'),
(3, 3, 1, '2019-03-01', 2, '2019-03-27 19:43:39', '2019-03-27 19:43:39'),
(4, 5, 3, '2019-03-18', 1, '2019-03-28 00:06:49', '2019-03-28 00:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `norek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jlh_pembayaran` double NOT NULL,
  `bukti_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id_pembayaran`, `id_user`, `jenis_pembayaran`, `norek`, `jlh_pembayaran`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Transfer BNI', '1234567891', 1000000, '', '2019-04-05 02:18:06', '2019-04-05 02:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `kode_pembelian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id_pembelian`, `kode_pembelian`, `id_produk`, `harga_produk`, `total_item`, `total_harga`, `id_suplier`, `created_at`, `updated_at`) VALUES
(1, 'P001', 1, 20000, 2, 40000, 1, '2019-04-11 15:03:31', '2019-04-11 15:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `pengirimans`
--

CREATE TABLE `pengirimans` (
  `id_pengiriman` int(10) UNSIGNED NOT NULL,
  `kode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_resi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_status` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirimans`
--

INSERT INTO `pengirimans` (`id_pengiriman`, `kode_pembayaran`, `id_penjual`, `id_user`, `no_resi`, `is_status`, `created_at`, `updated_at`) VALUES
(3, 'DIY0313', 3, 1, '0001', '0', '2019-04-26 00:33:35', '2019-04-26 00:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `penjualans`
--

CREATE TABLE `penjualans` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `kode_penjualan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `diskon` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_success` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id_pesan` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `subjek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima_pesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id_pesan`, `id_user`, `subjek`, `isi_pesan`, `penerima_pesan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pesan Singkat', 'Terimakasih sudah belanja', 'antah', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id_point` int(10) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jlh_point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id_point`, `id_produk`, `jlh_point`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2019-03-27 08:58:53', '2019-03-27 08:58:53'),
(2, 2, 14, '2019-03-27 19:19:03', '2019-03-27 19:19:03'),
(3, 3, 8, '2019-03-27 19:19:14', '2019-03-27 19:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `kondisi_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_unit` int(11) NOT NULL,
  `is_promo` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `id_user`, `id_kategori`, `nama_produk`, `merk_produk`, `desc_produk`, `harga_produk`, `stok_produk`, `kondisi_produk`, `file_produk`, `id_unit`, `is_promo`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Hp', 'Samsung', 'Samsung A7 2018', 3000000, 3, 'Second', 'samsung a7.jpg', 3, '0', '2019-03-27 08:55:17', '2019-03-28 20:43:50'),
(2, 1, 2, 'Jam', 'Casio', 'Jam Rantai', 180000, 4, 'Baru', 'jam2.jpg', 3, '0', '2019-03-27 09:01:28', '2019-03-28 20:43:31'),
(3, 3, 1, 'Piring', '-', 'Piring Plastik', 40000, 10, 'Baru', 'piring3.jpg', 3, '0', '2019-03-27 09:05:32', '2019-04-23 16:20:39'),
(4, 1, 4, 'Gamis', 'Chanel', 'Dasar nya Wolfis', 125000, 10, 'Baru', 'baju gamis.jpg', 3, '0', '2019-03-28 00:00:47', '2019-03-28 20:43:03'),
(5, 1, 4, 'Gamis Cowok', 'Gucci', 'Dasar nya Katun', 250000, 5, 'Second', 'gamis cowok.jpg', 3, '0', '2019-03-28 00:01:53', '2019-03-28 20:42:51'),
(6, 3, 3, 'Meja Tamu', 'Nga Tauuuu', 'Meja Tamu Panjang', 1342000, 1, 'Baru', 'meja1.jpg', 3, '0', '2019-03-28 00:32:43', '2019-04-23 16:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id_suplier` int(10) UNSIGNED NOT NULL,
  `nama_suplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_suplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Ridha Sardiyeni', 'Pariaman', '082284246073', '2019-03-27 08:01:23', '2019-03-27 08:01:23'),
(2, 'Viola Ventika', 'Sungai Pua', '081278172678', '2019-03-27 08:01:48', '2019-03-27 08:01:58'),
(3, 'Muhammad Rafi Ulwa Pratama', 'Padang Panjang', '081245167281', '2019-03-27 08:02:34', '2019-03-27 08:02:34'),
(4, 'Nanda Saputra Ermon', 'Agam', '089977879102', '2019-03-27 08:03:01', '2019-03-27 08:03:01'),
(5, 'Rahmi Gusti', 'Padang', '081361726182', '2019-03-27 08:03:29', '2019-03-27 08:03:29'),
(6, 'Fatria Destika', 'Sicincin', '081172891012', '2019-03-27 08:04:04', '2019-03-27 08:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `tokos`
--

CREATE TABLE `tokos` (
  `id_toko` int(10) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_toko` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stts_toko` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembuatan_toko` date NOT NULL,
  `id_point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id_unit` int(10) UNSIGNED NOT NULL,
  `nama_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id_unit`, `nama_unit`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 'Kilogram', '2019-03-27 08:04:35', '2019-03-27 08:04:35'),
(2, 'Cm', 'Centimeter', '2019-03-27 08:04:44', '2019-03-27 08:04:44'),
(3, 'Pcs', 'Pieces', '2019-03-27 08:04:58', '2019-04-03 01:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('0','1','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '082284246070', '1', NULL, '$2y$10$3jqsCP4jgMvjzpLTux8vcOJ7GqYbDWiyyevCpmuwq0.SRmDIslL82', 'ZlyRh0VjZn75gXUu9lU2srW2Cf9OH0In9HjT4uir34ep8i7fuwedPcoCr4uR', '2019-03-27 08:27:26', '2019-04-18 22:27:42'),
(3, 'viola', 'tes@gmail.com', '082284246077', '0', NULL, '$2y$10$JJzF05SgfLK9z9D2iNwahuQrC9fWFq7mHS8e7fTdwbIlmA.gd7rkS', NULL, '2019-03-31 14:08:31', '2019-03-31 14:08:31'),
(4, 'hello', 'hello@gmail.com', '081199219019', '0', NULL, '$2y$10$B9vKrrMK688Tq9dODNFM/OioT8Bn9PMyJXp0etP4Qk57A0u4z5DgS', 'ggVejqzw5m896FiE4Z8Ovs3iDgVn9yieeJI9g5wTAZ19sFU0D6qQKC12aVeA', '2019-04-24 00:24:04', '2019-04-24 00:24:04'),
(5, 'ridha', 'ridha@gmail.com', '082284246073', '0', NULL, '$2y$10$HyNhvBBGqfU7FYdJuDSTyOycPPUbvmSJmCptAV96EkZFQ8ivMfjrC', 'pReBk01C8TG8WVxW5ITA2Nv7cN02cKZtRA6Fuq2jWffaThaYnQQLsBozm5Sx', '2019-04-29 08:38:37', '2019-04-29 08:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`id_detailuser`);

--
-- Indexes for table `favorits`
--
ALTER TABLE `favorits`
  ADD PRIMARY KEY (`id_favorit`);

--
-- Indexes for table `historys`
--
ALTER TABLE `historys`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jasapengirimans`
--
ALTER TABLE `jasapengirimans`
  ADD PRIMARY KEY (`id_jasapengiriman`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id_media`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengirimans`
--
ALTER TABLE `pengirimans`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id_about` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pembelians`
--
ALTER TABLE `detail_pembelians`
  MODIFY `id_detail_pembelian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penjualans`
--
ALTER TABLE `detail_penjualans`
  MODIFY `id_detail_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_users`
--
ALTER TABLE `detail_users`
  MODIFY `id_detailuser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorits`
--
ALTER TABLE `favorits`
  MODIFY `id_favorit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historys`
--
ALTER TABLE `historys`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id_info` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jasapengirimans`
--
ALTER TABLE `jasapengirimans`
  MODIFY `id_jasapengiriman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id_media` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id_pembelian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengirimans`
--
ALTER TABLE `pengirimans`
  MODIFY `id_pengiriman` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id_pesan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id_point` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id_suplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id_toko` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id_unit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
