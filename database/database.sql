-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2025 at 04:20 PM
-- Server version: 8.0.33
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_tenant_flat_bill`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `building_id` bigint UNSIGNED NOT NULL,
  `flat_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `month` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `building_id`, `flat_id`, `category_id`, `month`, `amount`, `status`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, '2025-08-01', 12000.00, 'paid', 'Hello', 3, '2025-09-26 06:02:27', '2025-09-26 07:20:49'),
(2, 2, 1, 4, '2025-08-01', 500.00, 'unpaid', NULL, 3, '2025-09-26 06:02:27', '2025-09-26 06:02:27'),
(3, 2, 1, 5, '2025-08-01', 300.00, 'paid', NULL, 3, '2025-09-26 06:02:27', '2025-09-26 07:20:49'),
(4, 2, 1, 6, '2025-08-01', 150.00, 'paid', NULL, 3, '2025-09-26 06:02:27', '2025-09-26 07:20:49'),
(5, 2, 1, 7, '2025-08-01', 1200.00, 'paid', NULL, 3, '2025-09-26 06:02:27', '2025-09-26 07:20:49'),
(41, 2, 1, 3, '2025-09-01', 12000.00, 'paid', NULL, 3, '2025-09-26 08:45:33', '2025-09-26 08:53:11'),
(42, 2, 1, 4, '2025-09-01', 800.00, 'unpaid', NULL, 3, '2025-09-26 08:45:33', '2025-09-26 08:45:33'),
(43, 2, 1, 5, '2025-09-01', 300.00, 'paid', NULL, 3, '2025-09-26 08:45:33', '2025-09-26 08:53:11'),
(44, 2, 1, 6, '2025-09-01', 150.00, 'paid', NULL, 3, '2025-09-26 08:45:33', '2025-09-26 08:53:11'),
(45, 2, 1, 7, '2025-09-01', 1200.00, 'paid', NULL, 3, '2025-09-26 08:45:33', '2025-09-26 08:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `bill_categories`
--

CREATE TABLE `bill_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `building_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_categories`
--

INSERT INTO `bill_categories` (`id`, `building_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 2, 'Rent', '2025-09-25 15:56:10', '2025-09-26 04:22:04'),
(4, 2, 'Electricity', '2025-09-26 04:22:22', '2025-09-26 04:23:07'),
(5, 2, 'Gas bill', '2025-09-26 04:23:16', '2025-09-26 04:23:16'),
(6, 2, 'Water bill', '2025-09-26 04:23:25', '2025-09-26 04:23:25'),
(7, 2, 'Utility Charges', '2025-09-26 04:23:34', '2025-09-26 04:23:34'),
(8, 3, 'Rent', '2025-09-26 10:03:33', '2025-09-26 10:03:33'),
(9, 3, 'Electricity', '2025-09-26 10:03:47', '2025-09-26 10:03:47'),
(10, 3, 'Gas bill', '2025-09-26 10:03:59', '2025-09-26 10:03:59'),
(11, 3, 'Water bill', '2025-09-26 10:04:11', '2025-09-26 10:04:11'),
(12, 3, 'Utility Charges', '2025-09-26 10:04:21', '2025-09-26 10:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint UNSIGNED NOT NULL,
  `house_owner_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `house_owner_id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(2, 3, 'Building A', '1428/1 GAZIPARA, UTTARKHAN, UTTARA, DHAKA', '2025-09-25 12:11:14', '2025-09-26 09:59:31'),
(3, 4, 'Building B', 'Nulla nesciunt pari', '2025-09-25 12:11:46', '2025-09-25 12:11:46'),
(4, 5, 'Building C', 'Eveniet sunt nulla', '2025-09-26 10:00:00', '2025-09-26 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` bigint UNSIGNED NOT NULL,
  `house_owner_id` bigint UNSIGNED NOT NULL,
  `building_id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `house_owner_id`, `building_id`, `number`, `owner_name`, `owner_email`, `owner_contact`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '101', 'Mahadi', 'bevivivul@mailinator.com', '01999999999', '2025-09-25 12:13:20', '2025-09-25 12:13:20'),
(2, 4, 3, 'Nathaniel Duffy', 'Xandra Underwood', 'boketus@mailinator.com', 'Ullamco fuga Accusa', '2025-09-25 12:13:41', '2025-09-25 12:13:41'),
(3, 4, 3, 'Margaret Reynolds', 'Andrew Whitehead', 'deravaqalu@mailinator.com', 'Fugit aut sint veli', '2025-09-25 12:13:51', '2025-09-25 12:13:51'),
(4, 3, 2, 'Sierra', 'Jesse Robertson', 'tesocyli@mailinator.com', 'Non quis asperiores', '2025-09-25 12:20:33', '2025-09-25 12:20:44'),
(6, 4, 3, 'Palmer Juarez', 'Skyler Castaneda', 'bujez@mailinator.com', 'Quibusdam corrupti', '2025-09-25 12:21:49', '2025-09-25 12:21:49'),
(7, 3, 2, '266', 'Kyra Singleton', 'zazetig@mailinator.com', '01999999991', '2025-09-25 14:56:12', '2025-09-25 14:56:12'),
(8, 5, 4, '101', 'Tamekah Puckett', 'joqo@mailinator.com', '01778765645', '2025-09-26 10:06:50', '2025-09-26 10:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_24_213335_create_permission_tables', 1),
(5, '2025_09_24_213804_add_phone_to_users_table', 1),
(6, '2025_09_25_102610_create_buildings_table', 1),
(7, '2025_09_25_170325_create_flats_table', 1),
(8, '2025_09_25_191153_create_tenants_table', 1),
(9, '2025_09_25_211626_create_bill_categories_table', 1),
(10, '2025_09_26_055932_create_bills_table', 1),
(11, '2025_09_26_064749_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `bill_id` bigint UNSIGNED NOT NULL,
  `paid_by_tenant_id` bigint UNSIGNED DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `paid_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bill_id`, `paid_by_tenant_id`, `amount`, `paid_at`, `payment_method`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 12000.00, '2025-09-26 07:20:49', 'cash', '2025-09-26 07:20:49', '2025-09-26 07:20:49'),
(7, 2, 1, 100.00, '2025-09-26 07:20:49', 'cash', '2025-09-26 07:20:49', '2025-09-26 07:20:49'),
(8, 3, 1, 300.00, '2025-09-26 07:20:49', 'cash', '2025-09-26 07:20:49', '2025-09-26 07:20:49'),
(9, 4, 1, 150.00, '2025-09-26 07:20:49', 'cash', '2025-09-26 07:20:49', '2025-09-26 07:20:49'),
(10, 5, 1, 1200.00, '2025-09-26 07:20:49', 'cash', '2025-09-26 07:20:49', '2025-09-26 07:20:49'),
(11, 2, 1, 100.00, '2025-09-26 07:28:03', 'cash', '2025-09-26 07:28:03', '2025-09-26 07:28:03'),
(12, 41, 1, 12000.00, '2025-09-26 08:53:11', 'cash', '2025-09-26 08:53:11', '2025-09-26 08:53:11'),
(13, 42, 1, 700.00, '2025-09-26 08:53:11', 'cash', '2025-09-26 08:53:11', '2025-09-26 08:53:11'),
(14, 43, 1, 300.00, '2025-09-26 08:53:11', 'cash', '2025-09-26 08:53:11', '2025-09-26 08:53:11'),
(15, 44, 1, 150.00, '2025-09-26 08:53:11', 'cash', '2025-09-26 08:53:11', '2025-09-26 08:53:11'),
(16, 45, 1, 1200.00, '2025-09-26 08:53:11', 'cash', '2025-09-26 08:53:11', '2025-09-26 08:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-09-25 11:57:13', '2025-09-25 11:57:13'),
(2, 'house_owner', 'web', '2025-09-25 11:57:13', '2025-09-25 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_house_owner_id` bigint UNSIGNED DEFAULT NULL,
  `assigned_building_id` bigint UNSIGNED DEFAULT NULL,
  `assigned_flat_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `contact`, `assigned_house_owner_id`, `assigned_building_id`, `assigned_flat_id`, `created_at`, `updated_at`) VALUES
(1, 'Raw', 'hello@speedybites.uk', '12345678910', 3, 2, 1, '2025-09-25 14:03:02', '2025-09-26 10:06:07'),
(2, 'Gillian Salinas', 'pewajanep@mailinator.com', '01938984203', 3, 2, 4, '2025-09-25 14:03:48', '2025-09-26 10:05:04'),
(3, 'Fuller England', 'jatoqade@mailinator.com', '01111111111', 3, 2, 7, '2025-09-26 10:05:47', '2025-09-26 10:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '01111111111', NULL, '$2y$12$TeeOg2Sy1lxTYpV7MqDSueYvSN0T5Wx17NVsO8ftAwJlWYIMS8UWq', NULL, '2025-09-25 11:57:13', '2025-09-25 11:57:13'),
(3, 'Test 1', 'test@test.com', '01777074302', NULL, '$2y$12$lFf8HOuhbBsGox.MoaN4X.RZrG/0cJ59hebuVMqcnwRpHuD8CPLpG', NULL, '2025-09-25 12:11:14', '2025-09-26 09:59:31'),
(4, 'Kuame Frank', 'sykuwovo@mailinator.com', '01777074303', NULL, '$2y$12$h8x8PiVNtWBXOktFP82MPeDLOO9qLZ8oEGoiXU.A5c7k81Coihca.', NULL, '2025-09-25 12:11:46', '2025-09-25 12:11:46'),
(5, 'Breanna Barr', 'vobutix@mailinator.com', '01922952081', NULL, '$2y$12$BSYXjF4sjd/7o.hocedGGObGYd/paRLHl9c4pZLRNS0JBfFxUYq1q', NULL, '2025-09-26 10:00:00', '2025-09-26 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_building_id_index` (`building_id`),
  ADD KEY `bills_flat_id_index` (`flat_id`),
  ADD KEY `bills_category_id_index` (`category_id`),
  ADD KEY `bills_created_by_index` (`created_by`),
  ADD KEY `bills_status_index` (`status`),
  ADD KEY `bills_month_index` (`month`);

--
-- Indexes for table `bill_categories`
--
ALTER TABLE `bill_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_categories_building_id_index` (`building_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_house_owner_id_index` (`house_owner_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flats_building_id_number_unique` (`building_id`,`number`),
  ADD UNIQUE KEY `flats_owner_email_unique` (`owner_email`),
  ADD UNIQUE KEY `flats_owner_contact_unique` (`owner_contact`),
  ADD KEY `building_id` (`house_owner_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_bill_id_index` (`bill_id`),
  ADD KEY `payments_paid_by_tenant_id_index` (`paid_by_tenant_id`),
  ADD KEY `payments_paid_at_index` (`paid_at`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_email_unique` (`email`),
  ADD UNIQUE KEY `tenants_contact_unique` (`contact`),
  ADD KEY `tenants_assigned_house_owner_id_index` (`assigned_house_owner_id`),
  ADD KEY `tenants_assigned_building_id_index` (`assigned_building_id`),
  ADD KEY `tenants_assigned_flat_id_index` (`assigned_flat_id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bill_categories`
--
ALTER TABLE `bill_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `bill_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bills_flat_id_foreign` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bill_categories`
--
ALTER TABLE `bill_categories`
  ADD CONSTRAINT `bill_categories_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `buildings_house_owner_id_foreign` FOREIGN KEY (`house_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flats_house_owner_id_foreign` FOREIGN KEY (`house_owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_paid_by_tenant_id_foreign` FOREIGN KEY (`paid_by_tenant_id`) REFERENCES `tenants` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_assigned_building_id_foreign` FOREIGN KEY (`assigned_building_id`) REFERENCES `buildings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tenants_assigned_flat_id_foreign` FOREIGN KEY (`assigned_flat_id`) REFERENCES `flats` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tenants_assigned_house_owner_id_foreign` FOREIGN KEY (`assigned_house_owner_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
