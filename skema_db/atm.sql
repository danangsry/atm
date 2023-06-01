-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 03:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

CREATE DATABASE IF NOT EXISTS `atm`;
-- --------------------------------------------------------

--
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id`, `userid`, `nama`, `password`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'AKUN2', 'Mr. Mose Hand', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 200000.00, '2023-05-30 10:04:12', '2023-05-31 09:45:18'),
(2, 'AKUN4', 'Rosella Bartell', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(3, 'AKUN7', 'Cassie Parker', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(4, 'AKUN3', 'Miss Kayla Effertz IV', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 50000.00, '2023-05-30 10:04:12', '2023-05-31 09:01:34'),
(5, 'AKUN5', 'Name White', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(6, 'AKUN6', 'Jennie Hammes', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(7, 'AKUN8', 'Ms. Pamela Leuschke', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(8, 'AKUN9', 'Mohammed Frami', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(9, 'AKUN1', 'Chanel Stanton', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12'),
(10, 'AKUN0', 'Dr. Lauren Hauck', '$2y$10$NOxzOzNtcWGpGgM80YfhWOWBwnbAEcRnuurQoYQKjyRfBnR5wDmIu', 0.00, '2023-05-30 10:04:12', '2023-05-30 10:04:12');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_30_134012_create_trans_table', 1),
(6, '2023_05_30_135008_create_akuns_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `jml` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `userid`, `tipe`, `jml`, `created_at`, `updated_at`) VALUES
(16, 'AKUN2', 'ST', 50000.00, '2023-05-31 07:57:10', '2023-05-31 07:57:10'),
(17, 'AKUN2', 'ST', 200000.00, '2023-05-31 08:05:38', '2023-05-31 08:05:38'),
(18, 'AKUN2', 'TT', -50000.00, '2023-05-31 08:05:52', '2023-05-31 08:05:52'),
(19, 'AKUN2', 'TR', -50000.00, '2023-05-31 09:01:34', '2023-05-31 09:01:34'),
(20, 'AKUN3', 'TR', 50000.00, '2023-05-31 09:01:34', '2023-05-31 09:01:34'),
(22, 'AKUN2', 'ST', 50000.00, '2023-05-31 09:45:18', '2023-05-31 09:45:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akuns_userid_IDX` (`userid`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_userid_IDX` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
