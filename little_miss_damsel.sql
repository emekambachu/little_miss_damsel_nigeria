-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2022 at 11:22 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `little_miss_damsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'neutrondeveloper@gmail.com', 'admin', NULL, '$2y$10$IJUBFr3SuD6zRe1Acd0MXOPS.fbb5hcRG4vNygJfVybQT.3.fLS0a', NULL, NULL, '2021-07-17 15:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `health_issues` tinyint(1) NOT NULL DEFAULT '0',
  `health_details` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vital_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bust` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waist` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hips` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question5` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_surname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_other_names` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mobile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_details` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `application_id`, `image`, `surname`, `other_names`, `age`, `health_issues`, `health_details`, `country`, `state`, `city`, `address`, `vital_state`, `school_name`, `school_class`, `height`, `bust`, `waist`, `hips`, `question1`, `question2`, `question3`, `question4`, `question5`, `parent_surname`, `parent_other_names`, `parent_mobile`, `parent_email`, `parent_address`, `payment_details`, `paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'LMDN08823', NULL, 'Neutron', 'dexter mbachu', 22, 1, 'ttttt', 'Albania', 'Bulqize', 'Boston', 'Address and stuff', 'rrr', 'school name', 'school class', 'heught', 'bust', 'waist', 'hips', 'dddddddddddd', 'dddddddddd', 'ddddddddddddddd', 'ddddddddddddddd', 'dddddddddd', 'ddddddd', 'ffffffffffffffff', 'ddddddd', 'neutrondevelopers@gmail.com', 'wwwwwwww', 'wwwwwwwww', 1, '2020-09-18 18:20:31', '2020-09-18 18:41:27', NULL),
(5, NULL, NULL, 'Neutron', 'dexter mbachu', 22, 1, 'ttttt', 'Afghanistan', 'Badghis', 'Boston', 'Address and stuff', 'rrr', 'school name', 'school class', 'heught', 'bust', 'waist', 'hips', 'dddddddddddd', 'dddddddddd', 'ddddddddddddddd', 'ddddddddddddddd', 'dddddddddd', 'ddddddd', 'ffffffffffffffff', 'ddddddd', 'neutrondevelopers@gmail.com', 'wwwwwwww', 'wwwwwwwww', 0, '2020-09-18 18:19:57', '2020-09-18 18:39:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

DROP TABLE IF EXISTS `contestants`;
CREATE TABLE IF NOT EXISTS `contestants` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `image`, `slug`, `name`, `votes`, `created_at`, `updated_at`) VALUES
(1, '16004965471.jpg', 'chioma-onuegbu', 'Chioma Onuegbu', NULL, '2020-09-19 05:22:31', '2020-09-19 05:22:31'),
(2, '16004967622.jpg', 'chidera-lawson', 'Chidera Lawson', NULL, '2020-09-19 05:26:05', '2020-09-19 05:26:05'),
(3, '16004967993.jpg', 'emmanuel-oliver', 'Emmanuel Oliver', NULL, '2020-09-19 05:26:41', '2020-09-19 05:26:41'),
(4, '16004968454.jpg', 'silver-agu', 'Silver Agu', NULL, '2020-09-19 05:27:28', '2020-09-19 05:27:28'),
(5, '16004968895.jpg', 'oluebube-okoro', 'Oluebube Okoro', NULL, '2020-09-19 05:28:12', '2020-09-19 05:28:12'),
(6, '16004969246.jpg', 'rizy-e-sunday', 'Rizy E. Sunday', NULL, '2020-09-19 05:28:47', '2020-09-19 05:28:47'),
(7, '16004969477.jpg', 'shalom-ugochukwu', 'Shalom Ugochukwu', NULL, '2020-09-19 05:29:10', '2020-09-19 05:29:10'),
(8, '16004969768.jpg', 'amalagha-paula', 'Amalagha Paula', NULL, '2020-09-19 05:29:40', '2020-09-19 05:29:40'),
(9, '16004970119.jpg', 'maruchi-atako', 'Maruchi Atako', NULL, '2020-09-19 05:30:15', '2020-09-19 05:30:15'),
(10, '160049704710.jpg', 'chikemka-atako', 'Chikemka Atako', NULL, '2020-09-19 05:30:50', '2020-09-19 05:30:50'),
(11, '160049707411.jpg', 'jemimah-a-john', 'Jemimah A. John', NULL, '2020-09-19 05:31:16', '2020-09-19 05:31:16'),
(12, '160049710212.jpg', 'faith-okiriaja', 'Faith Okiriaja', NULL, '2020-09-19 05:31:44', '2020-09-19 05:31:44'),
(13, '160049712513.jpg', 'blessing-egbe', 'Blessing Egbe', NULL, '2020-09-19 05:32:08', '2020-09-19 05:32:08'),
(14, '160049715314.jpg', 'gideon-oyinyechi', 'Gideon Oyinyechi', NULL, '2020-09-19 05:32:37', '2020-09-19 05:32:37'),
(15, '160049720315.jpg', 'frama-olileanya', 'Frama Olileanya', NULL, '2020-09-19 05:33:26', '2020-09-19 05:33:26'),
(16, '160049722916.jpg', 'bliss-olileanya', 'Bliss Olileanya', NULL, '2020-09-19 05:33:52', '2020-09-19 05:33:52'),
(17, '160049725317.jpg', 'whitney-biaou', 'Whitney Biaou', NULL, '2020-09-19 05:34:15', '2020-09-19 05:34:15'),
(18, '160049727318.jpg', 'rinnah-diamond', 'Rinnah Diamond', NULL, '2020-09-19 05:34:36', '2020-09-19 05:34:36'),
(19, '160049731519.jpg', 'emmanuella-ike-cyril', 'Emmanuella Ike-Cyril', NULL, '2020-09-19 05:35:18', '2020-09-19 05:35:18'),
(20, '160049734020.jpg', 'okeoghene-efemena', 'Okeoghene Efemena', NULL, '2020-09-19 05:35:43', '2020-09-19 05:35:43'),
(21, '160049736521.jpg', 'favour-anyadike', 'Favour Anyadike', NULL, '2020-09-19 05:36:08', '2020-09-19 05:36:08'),
(22, '160049739920.jpg', 'queen-esther-tam-george', 'Queen-Esther Tam-George', NULL, '2020-09-19 05:36:42', '2020-09-19 05:36:42'),
(23, '160049742623.jpg', 'queen-esther-mandu', 'Queen-Esther Mandu', NULL, '2020-09-19 05:37:09', '2020-09-19 05:37:09'),
(24, '160049746024.jpg', 'faith-chisaoka-woka', 'Faith Chisaoka Woka', NULL, '2020-09-19 05:37:44', '2020-09-19 11:47:19'),
(25, '160049749725.jpg', 'chinalu-ukachukwu', 'Chinalu Ukachukwu', NULL, '2020-09-19 05:38:20', '2020-09-19 05:38:20'),
(28, '160049758028.jpg', 'sonia-lucky', 'Sonia Lucky', NULL, '2020-09-19 05:39:43', '2020-09-19 12:45:52'),
(29, '160053455429.jpg', 'oyinyechi-okechukwu', 'Oyinyechi Okechukwu', 0, '2020-09-19 15:55:57', '2020-09-19 15:55:57'),
(30, '160053459130.jpg', 'cynthia-ugwuoke', 'Cynthia Ugwuoke', 0, '2020-09-19 15:56:34', '2020-09-19 15:56:34'),
(31, '160053463031.jpg', 'angel-i-maurice', 'Angel I. Maurice', 0, '2020-09-19 15:57:13', '2020-09-19 15:57:13'),
(56, '1663112680istockphoto-1190027469-612x612.jpg', 'ffffff', 'ffffff', 0, '2022-09-13 22:44:40', '2022-09-13 22:44:40'),
(34, '160053469534.jpg', 'amadi-charish', 'Amadi Charish', 0, '2020-09-19 15:58:18', '2020-09-19 15:58:18'),
(35, '160053471835.jpg', 'lucky-daniella-chioma', 'Lucky Daniella Chioma', 0, '2020-09-19 15:58:41', '2020-09-19 15:58:41'),
(36, '160053481136.jpg', 'favour-chinedu', 'Favour Chinedu', 0, '2020-09-19 16:00:14', '2020-09-19 16:00:14'),
(37, '160053483837.jpg', 'albert-angel-clinton', 'Albert Angel Clinton', 0, '2020-09-19 16:00:41', '2020-09-19 16:00:41'),
(39, '160053504839.jpg', 'sokari-west', 'Sokari West', 0, '2020-09-19 16:04:11', '2020-09-19 16:04:11'),
(40, '160053508340.jpg', 'emmanuella-k-botoye', 'Emmanuella K. Botoye', 0, '2020-09-19 16:04:46', '2020-09-19 16:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_14_125545_create_applications_table', 1),
(5, '2019_07_31_150941_create_contestants_table', 2),
(15, '2019_07_31_151402_create_votes_table', 7),
(17, '2019_07_31_152443_create_payments_table', 8),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(9, '2022_09_13_134344_create_sessions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pairings`
--

DROP TABLE IF EXISTS `pairings`;
CREATE TABLE IF NOT EXISTS `pairings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payer_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `proof_of_payment` text COLLATE utf8mb4_unicode_ci,
  `time_limit` int(50) NOT NULL,
  `confirm_payment` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `cancelled` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pairings`
--

INSERT INTO `pairings` (`id`, `payer_id`, `receiver_id`, `amount`, `proof_of_payment`, `time_limit`, `confirm_payment`, `approved`, `cancelled`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 5000, 'Dexter Neutron-16268825537f377b725a568efb281bb69a25995967.jpg', 12, 1, 1, 0, '2021-07-21 10:24:35', '2021-07-21 15:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contestant_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_contestant_id_index` (`contestant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `contestant_id`, `email`, `name`, `bank`, `amount`, `quantity`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 40, 'dd@fff.com', 'ddddddd', NULL, 150, 3, 'online', 1, '2022-09-15 21:38:28', '2022-09-15 21:38:28'),
(2, 40, 'dd@fff.com', 'ddddddd', NULL, 150, 3, 'online', 1, '2022-09-15 21:38:31', '2022-09-15 21:38:31'),
(3, 40, 'sss@email.com', 'fffffffff', NULL, 150, 3, 'online', 1, '2022-09-15 21:40:18', '2022-09-15 21:40:18'),
(4, 40, 'ddd@email.com', 'ffffffffff', NULL, 150, 3, 'online', 1, '2022-09-15 21:46:57', '2022-09-15 21:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment_plans`
--

DROP TABLE IF EXISTS `payment_plans`;
CREATE TABLE IF NOT EXISTS `payment_plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `percentage` int(50) NOT NULL,
  `days` int(50) NOT NULL,
  `min` int(50) NOT NULL,
  `max` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_plans`
--

INSERT INTO `payment_plans` (`id`, `percentage`, `days`, `min`, `max`, `created_at`, `updated_at`) VALUES
(1, 50, 7, 5000, 900000, NULL, NULL),
(2, 100, 7, 1000000, 3000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bfj9OARnxuV2v0gbTpmlucVdOiv7ABDcxzFll8Wq', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVzI1cGpIaThxWUdsUW9pWjJKcnpEamJ6bnFzRVhaMHVpcVUwT2swcCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1663076764),
('iHqhNL5ID1jdsttLFuDlpqaMC92IBjXmPaFT9ZRL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUm9wM3oyZDR2WVVtcVdxdXVYSVV2c0VBOVhIanYxWFlib2x2YXFhbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9fQ==', 1663076775),
('PDWmrhs0xcvD219uukwpYzkqYgrGDlGxKBw69jE6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjlnVDFMbk4wVGRjYmJNeldxbEFEbkgxcU9xY3l4STZUUE8zNnU3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb250ZXN0YW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663106203),
('cbRoyT2Rjb7edU6Q7UZfW02GpIMi59El2WdAMlq4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNFBQM2hXRVRtdDNjeTdVNUtqcDJMRHRGRWdsc3hldTJqZHp4ZWxaeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MTM6InNlYXJjaF9pbnB1dHMiO2E6Mjp7czo0OiJ0ZXJtIjtzOjI6ImFsIjtzOjQ6InBhZ2UiO3M6MjA6IltvYmplY3QgU3VibWl0RXZlbnRdIjt9czo1OiJpbWFnZSI7czo0NDoiMTY2MzExMjY4MGlzdG9ja3Bob3RvLTExOTAwMjc0NjktNjEyeDYxMi5qcGciO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1663119066),
('9J2tgm5aYYeWzx5vFS3Pg43R2e2N9sucgzT2PFYy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjl3TFVjUTYzcHFkZ29KS3BMdkxyTm1rV2VxM2pDQ0oyZUxmeERQciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb250ZXN0YW50L2FkZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663112008);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'kidstarmodels@gmail.com', NULL, '$2y$12$Y9Ug0wdaA9nKITd7SrDzle21WLi0.7jsUm0CqsWcLRRkHouX48Cje', 'TQUG5vZtiQVmFV6AyO1poHZh1zjzPeYEo0MUefzI7chgrupesmZ10zBUNPd8', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contestant_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `ip` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `votes_contestant_id_index` (`contestant_id`),
  KEY `votes_payment_id_index` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `contestant_id`, `payment_id`, `ip`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 40, 3, NULL, '150.00', 3, '2022-09-15 21:40:18', '2022-09-15 21:40:18'),
(2, 40, 4, NULL, '150.00', 3, '2022-09-15 21:46:57', '2022-09-15 21:46:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
