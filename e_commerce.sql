-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `oneprice` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `image`, `price`, `quantity`, `product_id`, `user_id`, `oneprice`, `created_at`, `updated_at`) VALUES
(29, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Nemo exercitationem', 'images\\php8B1F.tmp.png', '49', '1', '6', '1', '49', '2023-12-28 06:50:23', '12:20:23'),
(30, 'user', 'user@gmail.com', '8530379169', 'Paris', 'women clothe', 'images\\php40DB.tmp.png', '1088', '2', '5', '1', '544', '2023-12-28 12:20:40', '12:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(6, 'sds', '2023-12-21 05:21:08', '10:51:08'),
(7, 'admin', '2023-12-21 05:21:41', '10:51:41'),
(8, 'admin', '2023-12-21 05:22:27', '10:52:27'),
(9, 'map_demo', '2023-12-21 05:22:42', '10:52:42'),
(10, 'jsldfbnmj,eds', '2023-12-21 05:23:24', '10:53:24'),
(11, 'Lunea Cantrell', '2023-12-21 05:24:42', '10:54:42'),
(12, 'admin admin11', '2023-12-21 05:26:25', '10:56:25'),
(13, 'admin', '2023-12-21 05:29:02', '10:59:02'),
(14, 'admin admin11', '2023-12-22 01:00:10', '06:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `commets`
--

CREATE TABLE `commets` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commets`
--

INSERT INTO `commets` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'deep@gmail.com', 'szdv', '2023-12-25 07:24:58', '12:54:58'),
(2, 'admin admin11', 'qawabetef@mailinator.com', 'asecfasdzv', '2023-12-25 07:25:18', '12:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_18_094301_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `image`, `price`, `quantity`, `product_id`, `user_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(6, 'user', 'user@gmail.com', '8530379169', 'Paris', 'women clothe', 'images\\php40DB.tmp.png', '544', '1', '5', '1', 'cash on delivery', 'User has cancel the order', '2023-12-26 06:05:26', '06:05:26'),
(7, 'user', 'user@gmail.com', '8530379169', 'Paris', 't-shirt', 'images\\php6FB.tmp.png', '722', '1', '3', '1', 'cash on delivery', 'User has cancel the order', '2023-12-26 06:05:41', '06:05:41'),
(8, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Nemo exercitationem', 'images\\php8B1F.tmp.png', '49', '1', '6', '1', 'cash on delivery', 'User has cancel the order', '2023-12-27 12:42:01', '12:42:01'),
(9, 'user', 'user@gmail.com', '8530379169', 'Paris', 'women clothe', 'images\\php40DB.tmp.png', '544', '1', '5', '1', 'cash on delivery', 'User has cancel the order', '2023-12-27 12:41:54', '12:41:54'),
(10, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Nemo exercitationem', 'images\\php8B1F.tmp.png', '49', '1', '6', '1', 'Paid', 'User has cancel the order', '2023-12-27 12:41:57', '12:41:57'),
(11, 'user', 'user@gmail.com', '8530379169', 'Paris', 'women clothe', 'images\\php40DB.tmp.png', '544', '1', '5', '1', 'Paid', 'proccessing', '2023-12-27 07:11:40', '12:41:40'),
(12, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Provident id asper', 'images\\phpBB58.tmp.png', '159', '1', '7', '1', 'cash on delivery', 'proccessing', '2023-12-28 03:06:34', '08:36:34'),
(13, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Nemo exercitationem', 'images\\php8B1F.tmp.png', '49', '1', '6', '1', 'cash on delivery', 'proccessing', '2023-12-28 03:06:34', '08:36:34'),
(14, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Provident id asper', 'images\\phpBB58.tmp.png', '159', '1', '7', '1', 'cash on delivery', 'proccessing', '2023-12-28 06:19:27', '11:49:27'),
(15, 'user', 'user@gmail.com', '8530379169', 'Paris', 'Nemo exercitationem', 'images\\php8B1F.tmp.png', '49', '1', '6', '1', 'cash on delivery', 'proccessing', '2023-12-28 06:19:27', '11:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(3, 't-shirt', 'Unde reprehenderit p', 'images\\php6FB.tmp.png', 'admin', '951', '106', '722', '2023-12-22 00:58:18', '06:28:18'),
(4, 'Dress', 'Id qui amet in aut', 'images\\phpD956.tmp.png', 'sds', '625', '833', '632', '2023-12-22 01:01:22', '06:31:22'),
(5, 'women clothe', 'Qui sunt aut est si', 'images\\php40DB.tmp.png', 'jsldfbnmj,eds', '971', '994', '544', '2023-12-22 01:01:49', '06:31:49'),
(6, 'Nemo exercitationem', 'Beatae ex quasi labo', 'images\\php8B1F.tmp.png', 'Lunea Cantrell', '578', '720', '49', '2023-12-22 01:03:13', '06:33:13'),
(7, 'Provident id asper', 'Atque rem illo incid', 'images\\phpBB58.tmp.png', 'Lunea Cantrell', '448', '573', '159', '2023-12-22 01:03:26', '06:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CdVGIjGDilnpkyWzJ9UYlhHwSE0p0h1JMSy1q5W6', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmpwWGRjYkpjM2EySnc3b3k0V1g4RURIdXlteHhMNTJ5dlV2TXZTTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3QvZS1jb21tZXJjZS9wdWJsaWMiO319', 1704082874);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(11) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` varchar(255) DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `email_verified`) VALUES
(1, 'user', 'user@gmail.com', '0', '0', '8530379169', 'Paris', NULL, '$2y$10$siMCFUzuHrq3P1bJtK1bwu.laE4q8c87h5PB.1lV4b6MVYKQWY22W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 04:33:11', '2023-12-18 04:33:11', ''),
(2, 'admin', 'admin@gmail.com', '0', '1', '8530379169', 'Paris', NULL, '$2y$10$cZsiUWSB4PKjWfl/N3zUY.BCKPomZIpgqkYFEUbgDbGOmGCb39SUu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 04:34:48', '2023-12-18 04:34:48', ''),
(4, 'Slade Parks', 'jecavi@mailinator.com', '0', '1', '+1 (512) 437-3566', 'Dolore assumenda qui', NULL, 'Et id suscipit volup', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-22 00:07:27', '2023-12-22 00:11:44', ''),
(19, 'Jack Patel', 'jackdeveloper100@gmail.com', NULL, '0', NULL, NULL, NULL, '$2y$10$HvdHRfc3dn..CZCW8TVSIuo9N85jtz5oXAVHO9HCDuASMOY3koW..', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-26 02:56:04', '2023-12-26 02:56:04', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commets`
--
ALTER TABLE `commets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `commets`
--
ALTER TABLE `commets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
