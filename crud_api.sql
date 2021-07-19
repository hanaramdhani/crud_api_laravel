-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 01:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `id_kategori`) VALUES
(1, 'Hana', NULL, NULL, 1),
(2, 'Yeyo', NULL, '2021-06-23 03:17:13', 1),
(4, 'Dadang', '2021-06-23 03:18:50', '2021-06-23 03:43:27', 2),
(5, 'Bapak & Ibu', '2021-06-23 03:52:01', '2021-06-23 03:52:36', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `histori`
-- (See below for the actual view)
--
CREATE TABLE `histori` (
`id` int(10) unsigned
,`total` int(11)
,`nama_guest` varchar(255)
,`kamar_id` int(10) unsigned
,`nama_kamar` varchar(255)
,`deskripsi` varchar(255)
,`kategori_id` int(10) unsigned
,`nama_kategori` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `histori_pemesanans`
--

CREATE TABLE `histori_pemesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nama_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_pesan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_guest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `histori_pemesanans`
--

INSERT INTO `histori_pemesanans` (`id`, `id_pemesanan`, `nama_kamar`, `deskripsi`, `lama_pesan`, `id_kamar`, `total`, `created_at`, `updated_at`, `nama_guest`) VALUES
(1, 1, '002', 'lantai 1', 10, 1, 8000000, NULL, NULL, ''),
(2, 17, '004', 'lantai 1', 10, 2, 8000000, NULL, NULL, 'Hana Ramdhani'),
(3, 20, '025', 'lantai 5', 10, 25, 4000000, NULL, NULL, 'Apriliani'),
(4, 23, '002', 'lantai 3', 10, 2, 10000000, NULL, NULL, 'Yaya');

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id`, `nama_kamar`, `deskripsi`, `created_at`, `updated_at`, `id_kategori`, `status`) VALUES
(1, '001', 'lantai 1', NULL, NULL, 1, 'tersedia'),
(2, '002', 'lantai 1', NULL, NULL, 1, 'tersedia'),
(3, '003', 'lantai 1', NULL, NULL, 1, 'tersedia'),
(4, '004', 'lantai 1', NULL, NULL, 1, 'tersedia'),
(5, '005', 'lantai 1', NULL, NULL, 1, 'tersedia'),
(6, '006', 'lantai 2', NULL, NULL, 2, 'disewa'),
(7, '007', 'lantai 2', NULL, NULL, 2, 'tersedia'),
(8, '008', 'lantai 2', NULL, NULL, 2, 'tersedia'),
(9, '009', 'lantai 2', NULL, NULL, 2, 'tersedia'),
(10, '010', 'lantai 2', NULL, NULL, 2, 'tersedia'),
(11, '011', 'lantai 3', NULL, NULL, 3, 'tersedia'),
(12, '012', 'lantai 3', NULL, NULL, 3, 'tersedia'),
(13, '013', 'lantai 3', NULL, NULL, 3, 'disewa'),
(14, '014', 'lantai 3', NULL, NULL, 3, 'disewa'),
(15, '015', 'lantai 3', NULL, NULL, 3, 'tersedia'),
(16, '016', 'lantai 4', NULL, NULL, 4, 'tersedia'),
(17, '017', 'lantai 4', NULL, NULL, 4, 'tersedia'),
(18, '018', 'lantai 4', NULL, NULL, 4, 'tersedia'),
(19, '019', 'lantai 4', NULL, NULL, 4, 'disewa'),
(20, '020', 'lantai 4', NULL, NULL, 4, 'tersedia'),
(21, '021', 'lantai 5', NULL, NULL, 5, 'tersedia'),
(22, '022', 'lantai 5', NULL, NULL, 5, 'tersedia'),
(23, '023', 'lantai 5', NULL, NULL, 5, 'disewa'),
(24, '024', 'lantai 5', NULL, NULL, 5, 'tersedia'),
(25, '025', 'lantai 5', NULL, NULL, 5, 'tersedia'),
(26, 'Holla', 'lantai 5', '2021-07-11 21:49:30', '2021-07-11 22:11:47', 5, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `maksimal_tamu` int(11) NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `harga`, `created_at`, `updated_at`, `maksimal_tamu`, `fasilitas`) VALUES
(1, 'standard', '400000', NULL, NULL, 3, 'AC, Wi-fi, Kulkas'),
(2, 'superior', '500000', NULL, NULL, 3, 'AC, Wi-fi, Kulkas, Televisi '),
(3, 'deluxe', '600000', NULL, NULL, 4, 'AC, Wi-fi, Kulkas, Televisi, Double Spring Bed'),
(4, 'suite', '700000', NULL, NULL, 5, 'AC, Wi-fi, Kulkas, Televisi, Double Spring Bed, Balkon'),
(5, 'presidential', '800000', NULL, NULL, 6, 'AC, Wi-fi, Kulkas, Televisi, Double Spring Bed, Balkon, Ruang Tamu');

-- --------------------------------------------------------

--
-- Stand-in structure for view `kategori_kamar`
-- (See below for the actual view)
--
CREATE TABLE `kategori_kamar` (
`id` int(10) unsigned
,`nama_kamar` varchar(255)
,`deskripsi` varchar(255)
,`status` varchar(255)
,`kategori_id` int(10) unsigned
,`nama_kategori` varchar(255)
,`harga` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_06_23_071507_create_categories_table', 1),
(4, '2021_07_05_043041_create_kamars_table', 2),
(5, '2021_07_05_045037_create_kategoris_table', 3),
(6, '2021_07_05_050651_add_id_kategori_to_kamars_table', 4),
(7, '2021_07_05_050725_add_id_kategori_to_categories_table', 4),
(8, '2021_07_05_060853_create_kategoris_table', 5),
(9, '2021_07_05_110519_tambah_status_tbl_kamar', 6),
(10, '2021_07_05_111044_create_pemesanans_table', 7),
(11, '2021_07_05_113928_add_total', 8),
(12, '2021_07_05_231523_create_histori_pemesanans_table', 9),
(13, '2021_07_05_233030_add_guest_name', 10),
(14, '2021_07_05_233231_add_guest_name_in_histori', 11),
(15, '2021_07_11_120428_triggers_histori_pemesanan', 12),
(16, '2021_07_11_123208_triggers_status_disewa', 13),
(17, '2021_07_11_123542_triggers_status_lama', 13),
(18, '2021_07_11_123834_triggers_histori_pemesanan', 14),
(19, '2021_07_11_125814_view_histori', 15),
(20, '2021_07_12_112955_kategori_count_', 16),
(21, '2021_07_12_113434_count_kategori', 17),
(22, '2021_07_18_110219_add_jumlah', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pemesanannn`
-- (See below for the actual view)
--
CREATE TABLE `pemesanannn` (
`id` int(10) unsigned
,`total` int(11)
,`nama_guest` varchar(255)
,`kamar_id` int(10) unsigned
,`nama_kamar` varchar(255)
,`deskripsi` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_pesan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` int(11) NOT NULL,
  `nama_guest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `nama_kamar`, `deskripsi`, `lama_pesan`, `id_kamar`, `created_at`, `updated_at`, `total`, `nama_guest`) VALUES
(1, '001', 'lantai 1', 10, 1, NULL, NULL, 4000000, ''),
(2, '002', 'lantai 5', 10, 21, NULL, NULL, 8000000, ''),
(8, '002', 'lantai 1', 10, 2, '2021-07-05 04:51:20', '2021-07-05 04:51:20', 8000000, ''),
(14, '004', 'lantai 1', 10, 2, '2021-07-05 06:07:52', '2021-07-05 06:07:52', 8000000, ''),
(18, '007', 'lantai 2', 10, 6, '2021-07-07 21:41:36', '2021-07-11 23:06:24', 10000000, 'Endah Koma'),
(19, '007', 'lantai 2', 10, 19, '2021-07-07 23:26:59', '2021-07-07 23:26:59', 10000000, 'Endah'),
(21, '023', 'lantai 5', 10, 23, '2021-07-12 01:21:21', '2021-07-12 01:21:21', 10000000, 'Endah'),
(22, '013', 'lantai 3', 10, 13, '2021-07-12 01:23:18', '2021-07-12 01:23:18', 10000000, 'Yaya');

--
-- Triggers `pemesanans`
--
DELIMITER $$
CREATE TRIGGER `add_history` AFTER DELETE ON `pemesanans` FOR EACH ROW BEGIN
                INSERT INTO histori_pemesanans ( id_pemesanan, nama_kamar, deskripsi, lama_pesan, id_kamar, total, nama_guest )
            VALUES
                (
                    OLD.id,
                    OLD.nama_kamar,
                    OLD.deskripsi,
                    OLD.lama_pesan,
                    OLD.id_kamar,
                    OLD.total,
                    OLD.nama_guest 
                );
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_new` AFTER INSERT ON `pemesanans` FOR EACH ROW BEGIN
                        UPDATE kamars 
                        SET status = "disewa"
                    WHERE
                        id = new.id_kamar;
                END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_old` AFTER DELETE ON `pemesanans` FOR EACH ROW BEGIN
                UPDATE kamars 
                SET STATUS = "tersedia" 
            WHERE
                id = old.id_kamar;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hana', 'hana@gmail.com', NULL, '$2y$10$p.xrj6Vkeb.R6KYk9ujIO.twLPQ.SpYrm/KTJtUMUC1R3..1izjG.', NULL, '2021-07-20 22:45:04', '2021-07-13 22:45:04');

-- --------------------------------------------------------

--
-- Structure for view `histori`
--
DROP TABLE IF EXISTS `histori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `histori`  AS  select `pemesanans`.`id` AS `id`,`pemesanans`.`total` AS `total`,`pemesanans`.`nama_guest` AS `nama_guest`,`kamars`.`id` AS `kamar_id`,`kamars`.`nama_kamar` AS `nama_kamar`,`kamars`.`deskripsi` AS `deskripsi`,`kategoris`.`id` AS `kategori_id`,`kategoris`.`nama_kategori` AS `nama_kategori`,`kategoris`.`harga` AS `harga` from ((`pemesanans` join `kamars` on(`pemesanans`.`id_kamar` = `kamars`.`id`)) join `kategoris` on(`kamars`.`id_kategori` = `kategoris`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `kategori_kamar`
--
DROP TABLE IF EXISTS `kategori_kamar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kategori_kamar`  AS  select `kamars`.`id` AS `id`,`kamars`.`nama_kamar` AS `nama_kamar`,`kamars`.`deskripsi` AS `deskripsi`,`kamars`.`status` AS `status`,`kategoris`.`id` AS `kategori_id`,`kategoris`.`nama_kategori` AS `nama_kategori`,`kategoris`.`harga` AS `harga` from (`kamars` join `kategoris` on(`kamars`.`id_kategori` = `kategoris`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pemesanannn`
--
DROP TABLE IF EXISTS `pemesanannn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemesanannn`  AS  select `pemesanans`.`id` AS `id`,`pemesanans`.`total` AS `total`,`pemesanans`.`nama_guest` AS `nama_guest`,`kamars`.`id` AS `kamar_id`,`kamars`.`nama_kamar` AS `nama_kamar`,`kamars`.`deskripsi` AS `deskripsi` from (`pemesanans` join `kamars` on(`pemesanans`.`id_kamar` = `kamars`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `histori_pemesanans`
--
ALTER TABLE `histori_pemesanans`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `histori_pemesanans`
--
ALTER TABLE `histori_pemesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
