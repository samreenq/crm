-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 07, 2023 at 10:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grace`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`c_id`, `c_name`, `c_email`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(6, 'Growing Effect', 'growing@gmail.com', 1, '2023-11-01 08:24:07', '2023-11-01 08:24:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `s_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_amount` int(11) NOT NULL,
  `invoice_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `user_id`, `plan_id`, `s_plan_id`, `invoice_plan`, `invoice_package`, `invoice_amount`, `invoice_currency`, `invoice_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 'Flourish Packages', 'Month', 255, '$', 'Client Questionnaire + Client Courses + Designer 1:1 Meetings', '2023-10-24 08:52:41', '2023-10-24 08:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `m_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`m_id`, `user_id`, `status`, `name`, `email`, `phone_no`, `meeting_link`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'test', 'test@gmail.com', '123456789', 'www.test.com', '2023-11-02 09:06:45', '2023-11-06 10:00:47'),
(2, 1, 0, 'test1', 'test1@gmail.com', '123456789', NULL, '2023-11-06 10:08:11', '2023-11-06 10:22:19'),
(3, 1, 0, 'test', 'testvendor@gmail.com', '123456789', 'www.test.com', '2023-11-06 10:27:12', '2023-11-06 10:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `meetings_detail`
--

CREATE TABLE `meetings_detail` (
  `md_id` bigint(20) UNSIGNED NOT NULL,
  `m_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_approval` int(11) NOT NULL,
  `admin_approval` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings_detail`
--

INSERT INTO `meetings_detail` (`md_id`, `m_id`, `user_id`, `date`, `user_approval`, `admin_approval`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-03 20:07:00', 2, 2, 'kindly schedule meeting', '2023-11-02 09:06:45', '2023-11-06 06:04:58'),
(4, 1, 3, '2023-11-07 17:05:00', 2, 2, 'New Request for Availability', '2023-11-06 06:04:58', '2023-11-06 06:55:43'),
(5, 1, 1, '2023-11-08 18:57:00', 2, 2, 'test', '2023-11-06 06:55:43', '2023-11-06 06:56:59'),
(6, 1, 3, '2023-11-09 18:58:00', 2, 2, 'Please Check this date, if Possible then do let me know', '2023-11-06 06:56:59', '2023-11-06 06:58:02'),
(7, 1, 1, '2023-11-11 18:59:00', 2, 2, 'Check this date', '2023-11-06 06:58:02', '2023-11-06 08:20:39'),
(12, 1, 3, '2023-11-18 20:20:00', 2, 2, 'check this date', '2023-11-06 08:20:39', '2023-11-06 08:24:06'),
(14, 1, 1, '2023-11-06 15:55:00', 2, 2, 'Excepteur quas odit', '2023-11-06 08:24:06', '2023-11-06 08:28:58'),
(15, 1, 3, '2023-11-25 21:00:00', 2, 2, 'test Mail', '2023-11-06 08:28:58', '2023-11-06 08:48:05'),
(16, 1, 1, '2023-11-06 15:17:00', 2, 2, 'Sit quasi consectet', '2023-11-06 08:48:05', '2023-11-06 08:56:03'),
(17, 1, 3, '2023-11-28 18:55:00', 2, 2, 'test', '2023-11-06 08:56:03', '2023-11-06 09:02:58'),
(18, 1, 1, '2023-11-06 17:05:00', 1, 1, 'Commodo sint delenit', '2023-11-06 09:02:59', '2023-11-06 09:06:33'),
(19, 2, 1, '2023-11-15 21:08:00', 2, 2, 'New Meeting Request', '2023-11-06 10:08:11', '2023-11-06 10:21:31'),
(20, 2, 3, '2023-11-08 21:21:00', 1, 1, 'new date availability', '2023-11-06 10:21:31', '2023-11-06 10:22:19'),
(21, 3, 1, '2023-11-16 21:26:00', 2, 2, 'I want you to schedule me a meeting on this date', '2023-11-06 10:27:12', '2023-11-06 10:28:27'),
(22, 3, 3, '2023-11-22 21:28:00', 1, 1, 'new availability', '2023-11-06 10:28:27', '2023-11-06 10:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_27_095731_add_deleted_at_to_users_table', 2),
(6, '2023_07_04_093037_create_companies_table', 3),
(7, '2023_07_04_155755_create_paid_users_table', 4),
(8, '2023_09_26_140739_create_plans_table', 5),
(9, '2023_09_27_103029_create_plans_table', 6),
(10, '2023_09_27_103332_create_sub_plans_table', 7),
(11, '2023_09_29_113638_create_invoices_table', 8),
(12, '2023_09_29_144146_create_paid_users_table', 9),
(13, '2023_10_05_111236_create_paid_users_table', 10),
(14, '2023_11_01_145657_create_meetings_table', 11),
(15, '2023_11_01_150805_create_meetings_detail_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `paid_users`
--

CREATE TABLE `paid_users` (
  `paid_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `s_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed_date` date NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_users`
--

INSERT INTO `paid_users` (`paid_id`, `user_id`, `plan_id`, `s_plan_id`, `sub_id`, `customer_id`, `subscribed_date`, `invoice_id`, `created_at`, `updated_at`, `status`, `expiry_date`) VALUES
(1, 1, 3, 5, 'sub_1O4l1zLC0BmxZtumhUqPUthh', 'cus_OsW4uA0Qgic6D2', '2023-10-24', 1, '2023-10-24 08:52:41', '2023-10-26 08:06:33', 1, '2023-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionaire` int(1) NOT NULL DEFAULT 0 COMMENT '0 - Not Included\r\n1- Included',
  `pdf` int(1) NOT NULL DEFAULT 0 COMMENT '0- not Included\r\n1 - Included',
  `meeting` int(1) NOT NULL DEFAULT 0 COMMENT '0- not Included\r\n1 - Included',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plan_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `plan_name`, `plan_currency`, `questionaire`, `pdf`, `meeting`, `created_at`, `updated_at`, `plan_desc`) VALUES
(1, 'Essence Package', '$', 1, 0, 0, '2023-09-27 10:45:11', '2023-09-27 10:45:11', 'Client Questionnaire'),
(2, 'Growth Packages', '$', 1, 1, 0, '2023-09-27 12:51:55', '2023-09-27 12:51:55', 'Client Questionnaire + Client Courses'),
(3, 'Flourish Packages', '$', 1, 1, 1, '2023-09-27 12:55:31', '2023-09-27 12:55:31', 'Client Questionnaire + Client Courses + Designer 1:1 Meetings');

-- --------------------------------------------------------

--
-- Table structure for table `sub_plans`
--

CREATE TABLE `sub_plans` (
  `s_plan_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_amount` int(11) DEFAULT NULL,
  `sp_stripe_product_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_plans`
--

INSERT INTO `sub_plans` (`s_plan_id`, `plan_id`, `sp_name`, `sp_amount`, `sp_stripe_product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Month', 175, 'price_1O4jouLC0BmxZtumcGVchOOI', '2023-09-27 10:45:33', '2023-09-27 10:45:33'),
(2, 1, 'Year', 1650, 'price_1O4jpQLC0BmxZtumYnYJKqFR', '2023-09-27 10:45:33', '2023-09-27 10:45:33'),
(3, 2, 'Month', 199, 'price_1O4jrdLC0BmxZtumIYF2aAWK', '2023-09-27 12:52:34', '2023-09-27 12:52:34'),
(4, 2, 'Yearly', 1890, 'price_1O4jrdLC0BmxZtumnrDcqW2Y', '2023-09-27 12:52:34', '2023-09-27 12:52:34'),
(5, 3, 'Month', 255, 'price_1O4jsRLC0BmxZtumvyrFYA2J', '2023-09-27 12:55:52', '2023-09-27 12:55:52'),
(6, 3, 'Year', 2450, 'price_1O4jsRLC0BmxZtum7fVF8lxj', '2023-09-27 12:55:52', '2023-09-27 12:55:52');

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
  `user_type` int(1) DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test@gmail.com', NULL, '$2y$10$.xwSLlsrKu8XjegIORAcNOeU2PtC2Ny3Y1771vEnayPyoMJJLhuxu', 2, NULL, '2023-06-28 02:21:49', '2023-10-25 10:28:25', NULL),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$FXjEbgAK2wPkgBBGkFhiueCpjfGn6P1T.jao9i1rIeUkWUbaw.mqe', 1, NULL, '2023-10-25 12:15:21', '2023-10-25 12:38:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `companies_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoices_user_id_index` (`user_id`),
  ADD KEY `invoices_plan_id_index` (`plan_id`),
  ADD KEY `invoices_s_plan_id_index` (`s_plan_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `meetings_user_id_index` (`user_id`);

--
-- Indexes for table `meetings_detail`
--
ALTER TABLE `meetings_detail`
  ADD PRIMARY KEY (`md_id`),
  ADD KEY `meetings_detail_m_id_index` (`m_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_users`
--
ALTER TABLE `paid_users`
  ADD PRIMARY KEY (`paid_id`),
  ADD KEY `paid_users_user_id_index` (`user_id`),
  ADD KEY `paid_users_plan_id_index` (`plan_id`),
  ADD KEY `paid_users_s_plan_id_index` (`s_plan_id`),
  ADD KEY `paid_users_invoice_id_index` (`invoice_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `sub_plans`
--
ALTER TABLE `sub_plans`
  ADD PRIMARY KEY (`s_plan_id`),
  ADD KEY `sub_plans_plan_id_index` (`plan_id`);

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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `m_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meetings_detail`
--
ALTER TABLE `meetings_detail`
  MODIFY `md_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paid_users`
--
ALTER TABLE `paid_users`
  MODIFY `paid_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_plans`
--
ALTER TABLE `sub_plans`
  MODIFY `s_plan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`plan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_s_plan_id_foreign` FOREIGN KEY (`s_plan_id`) REFERENCES `sub_plans` (`s_plan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings_detail`
--
ALTER TABLE `meetings_detail`
  ADD CONSTRAINT `meetings_detail_m_id_foreign` FOREIGN KEY (`m_id`) REFERENCES `meetings` (`m_id`) ON DELETE CASCADE;

--
-- Constraints for table `paid_users`
--
ALTER TABLE `paid_users`
  ADD CONSTRAINT `paid_users_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paid_users_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`plan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paid_users_s_plan_id_foreign` FOREIGN KEY (`s_plan_id`) REFERENCES `sub_plans` (`s_plan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paid_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_plans`
--
ALTER TABLE `sub_plans`
  ADD CONSTRAINT `sub_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`plan_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
