-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2023 at 10:18 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgc2crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MG Consulting', '2023-07-13 07:32:12', '2023-07-13 08:12:20'),
(8, 'ICMPD', '2023-07-13 10:02:31', '2023-07-13 10:02:31'),
(9, 'American Council', '2023-07-13 10:02:52', '2023-07-13 10:02:52'),
(10, 'Elita Construction', '2023-07-13 10:03:04', '2023-07-13 10:03:12'),
(11, 'SOS Milli office', '2023-07-13 10:03:23', '2023-07-13 10:03:23'),
(12, 'SOS Xetai', '2023-07-13 10:03:28', '2023-07-13 10:03:28'),
(13, 'SOS Ganja', '2023-07-13 10:03:34', '2023-07-13 10:03:34'),
(14, 'FORTAS EXPERIENCE', '2023-07-13 10:03:45', '2023-07-13 10:03:45'),
(15, 'ECNL', '2023-07-13 10:03:52', '2023-07-13 10:04:08'),
(16, 'ICNL', '2023-07-13 10:04:14', '2023-07-13 10:04:14'),
(17, 'INTERTEK', '2023-07-13 10:04:19', '2023-07-13 10:04:19'),
(18, 'CNFA', '2023-07-13 10:04:27', '2023-07-13 10:04:27'),
(19, 'TRUB TRADING', '2023-07-13 10:04:44', '2023-07-13 10:04:44'),
(20, 'ANESHA', '2023-07-13 10:05:06', '2023-07-13 10:05:06'),
(21, 'E-NEZARET', '2023-07-13 10:05:57', '2023-07-13 10:05:57');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_05_130816_create_customers_table', 1),
(6, '2023_07_07_073721_create_permission_tables', 1),
(7, '2023_07_13_121533_create_timesheets_table', 2),
(8, '2023_07_13_123808_create_participations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `participations`
--

CREATE TABLE `participations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participations`
--

INSERT INTO `participations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'At work', '2023-07-13 08:53:36', '2023-07-13 08:53:36'),
(2, 'Vacation', '2023-07-13 08:54:06', '2023-07-13 08:54:06'),
(3, 'Sickleave', '2023-07-13 08:55:16', '2023-07-13 08:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-07-13 07:03:59', '2023-07-13 07:03:59'),
(3, 'Employee', 'web', '2023-07-14 06:30:11', '2023-07-14 06:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `participation_id` int(11) DEFAULT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `working_day` date DEFAULT NULL,
  `work_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `employee_id`, `customer_id`, `participation_id`, `working_hours`, `working_day`, `work_desc`, `created_at`, `updated_at`) VALUES
(17, 11, 1, 1, 2, '2023-07-03', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:27:32', '2023-07-14 08:27:32'),
(18, 11, 1, 1, 3, '2023-07-03', 'Enezaret sisteminin təkminləşdirilməsi', '2023-07-14 08:27:50', '2023-07-14 08:27:50'),
(19, 11, 1, 1, 2, '2023-07-04', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:28:00', '2023-07-14 08:28:00'),
(20, 11, 1, 1, 3, '2023-07-04', 'Enəzarət sisteminin təkminləşdirilməsi', '2023-07-14 08:28:19', '2023-07-14 08:28:19'),
(21, 11, 1, 1, 2, '2023-07-05', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:28:28', '2023-07-14 08:28:28'),
(22, 11, 1, 1, 3, '2023-07-05', 'MGC Timesheet sisteminin yaradılması', '2023-07-14 08:28:45', '2023-07-14 08:28:45'),
(23, 11, 1, 1, 2, '2023-07-06', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:28:54', '2023-07-14 08:28:54'),
(24, 11, 1, 1, 3, '2023-07-06', 'MGC Timesheet sisteminin qurulması', '2023-07-14 08:29:47', '2023-07-14 08:29:47'),
(25, 11, 1, 1, 2, '2023-07-07', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:30:01', '2023-07-14 08:30:01'),
(26, 11, 1, 1, 3, '2023-07-07', 'MGC Timesheet sisteminin qurulması', '2023-07-14 08:30:12', '2023-07-14 08:30:12'),
(27, 11, NULL, 2, NULL, '2023-07-12', NULL, '2023-07-14 08:30:40', '2023-07-14 08:30:40'),
(28, 11, NULL, 2, NULL, '2023-07-13', NULL, '2023-07-14 08:30:46', '2023-07-14 08:30:46'),
(29, 11, 1, 1, 2, '2023-07-14', 'Enezaret sisteminə problemlərin daxil edilməsi', '2023-07-14 08:30:54', '2023-07-14 08:30:54'),
(30, 11, 1, 1, 3, '2023-07-14', 'MGC Timesheet sisteminin qurulması', '2023-07-14 08:31:04', '2023-07-14 08:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Siyasat Gubadov', 'sgubadov@mgc.az', '2023-07-13 07:03:59', '$2y$10$KO6YFhn5A//XW.D/CxM5tuaTvcyL1MlAQJg8BzakE3PmgiJuaNtEO', 'OFl1m5DgLAZXzTUubKbLRZ51uLkRL2qvDeCQOCga0Qw9jl3bdOX5FvYw9iOZ', '2023-07-13 07:03:59', '2023-07-13 10:10:21'),
(14, 'Sevinc Kerimova', 'finance@mgc.az', NULL, '$2y$10$v7qKyyprtxn2LgMAfEmM2uFPgR9u5jrZZ729un0b.p39VQu0GG0s2', NULL, '2023-07-14 09:21:19', '2023-07-14 09:21:19'),
(15, 'Hamlet Babayev', 'hbabayev@mgc.az', NULL, '$2y$10$I5JOKVjkMyXkxwdjqSM47.0vuRDBUcMoQih9VfmRIryofF/KmLro2', NULL, '2023-07-14 09:22:03', '2023-07-14 09:22:03'),
(16, 'Eldar Kerimov', 'ekerimov@mgc.az', NULL, '$2y$10$9jRwTa8U.pBacC6N7WxLo.Y8AnGtWuHdWAUuU.Pk1RE9HUGrS.Jsa', NULL, '2023-07-14 09:22:14', '2023-07-14 09:22:14'),
(17, 'Cosgun Meherremli', 'cmeherremli@mgc.az', NULL, '$2y$10$m0vNhPEFfD61aZplmnQE0OCxLY32ElFg1g076KMZ/lxC1woS78l.O', NULL, '2023-07-14 09:22:28', '2023-07-14 09:22:28'),
(18, 'Vafa Qaragozlu', 'office@mgc.az', NULL, '$2y$10$8W9UOC5vOW/.66dceLaChOfYSQ5Vlk5QI.2NGA8aDSRGCiQtsyiV.', NULL, '2023-07-14 09:22:49', '2023-07-14 09:22:49'),
(19, 'Gulsum Adilzade', 'gadilzade@mgc.az', NULL, '$2y$10$SpORitP5dD3KSBHMC6BM8OcQfYkLXgtXqe7ti967VINg8FjsIDchq', NULL, '2023-07-14 09:23:12', '2023-07-14 09:23:12'),
(20, 'Emin Rzayev', 'erzayev@mgc.az', NULL, '$2y$10$xYKPtrw6WoxgrFkd5.tnmOfyxq0GBo/qXqVQzBb6PKrpnC.s2khE6', NULL, '2023-07-14 09:23:24', '2023-07-14 09:23:24'),
(21, 'Nurlana Aliyeva', 'naliyeva@mgc.az', NULL, '$2y$10$fqVrJWO803XMdQpD8dRgguK6gcPGV3Bfm0sNhnRR4jZvR.IqKRVA2', NULL, '2023-07-14 09:23:38', '2023-07-14 09:23:38'),
(22, 'Lala Adilova', 'director@mgc.az', NULL, '$2y$10$ID111VIPkwNHo7Ppcu/7JeT2OrD.l8fGMTvyrR61kaC8zZqIbAAf2', NULL, '2023-07-14 09:23:51', '2023-07-14 09:23:51'),
(23, 'Kochari Ismayilov', 'kismayilov@mgc.az', NULL, '$2y$10$LDItdF9RRAb47VfuyT0REubBXYXjiBeDroHOSAFQtEfRtm1F865SK', NULL, '2023-07-14 09:25:32', '2023-07-14 09:25:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `participations`
--
ALTER TABLE `participations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
