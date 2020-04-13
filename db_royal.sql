-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 08:51 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_royal`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_golongan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `margin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `kode`, `nama_golongan`, `margin`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'G1', 'Harga UMUM', '-', 'Gol 1 harga jual tes', 'N', '2019-09-16 00:18:10', '2019-09-16 02:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `katagori`
--

CREATE TABLE `katagori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_katagori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katagori`
--

INSERT INTO `katagori` (`id`, `nama_katagori`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'DOG FOOD', 'tes', 'Y', '2019-09-14 21:14:12', '2019-09-26 02:38:38'),
(2, 'CAT FOOD', 'MAKANAN KUCING', 'Y', '2019-09-14 21:15:30', '2019-09-15 22:45:24'),
(3, 'BIRD FOOD', 'Makanan Burung', 'N', '2019-09-14 21:18:31', '2019-09-15 22:20:00');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_15_032935_create_katagori', 2),
(4, '2019_09_15_033815_create_sub_katagori', 3),
(5, '2019_09_15_140204_create_produk', 4),
(6, '2019_09_16_073404_create_golongan', 4);

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
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `katagori_id` int(11) NOT NULL,
  `sub_katagori_id` int(11) NOT NULL,
  `suplier_id` int(11) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `barcode`, `katagori_id`, `sub_katagori_id`, `suplier_id`, `keterangan`, `aktif`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'testes', '-', 1, 4, NULL, 'tes', 'Y', NULL, '2019-09-23 17:45:30', '2019-09-26 02:57:55'),
(2, 'tes', '0', 1, 4, NULL, 'tes', 'Y', 'titip_05.jpeg', '2019-09-23 22:36:06', '2019-09-23 22:36:06'),
(3, 't', NULL, 1, 3, NULL, NULL, 'Y', 'user.png', '2019-09-23 23:08:56', '2019-09-23 23:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_katagori`
--

CREATE TABLE `sub_katagori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `katagori_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_subkatagori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_katagori`
--

INSERT INTO `sub_katagori` (`id`, `katagori_id`, `nama_subkatagori`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '2', 'DRY FOOD 1', 'TES', 'Y', '2019-09-16 03:27:00', '2019-09-16 03:27:00'),
(2, '3', 'DRY FOOD 4', 'TES', 'Y', '2019-09-16 03:27:24', '2019-09-16 03:27:24'),
(3, '1', 'TES SUB', 'TES', 'Y', '2019-09-16 03:34:38', '2019-09-16 03:34:38'),
(4, '1', 'DRY DOG 1', 'Tes', 'Y', '2019-09-17 03:51:46', '2019-09-17 03:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@me.com', NULL, '$2y$10$fxrRgEbGu1OK0L7XFQfFYenV5mbedAL1JwlGBpuon0FkfnM3stoZa', 'admin', 'AzCL3ViC5Eq0fFigV9cgTdmktqM9s7OEUBrmvNvCEHsXNzOU2LROnFMGbxQr', '2019-09-09 04:21:05', '2019-09-09 04:21:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katagori`
--
ALTER TABLE `katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_katagori`
--
ALTER TABLE `sub_katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_katagori`
--
ALTER TABLE `sub_katagori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
