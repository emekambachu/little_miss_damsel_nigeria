-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2020 at 05:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `health_issues` tinyint(1) NOT NULL DEFAULT 0,
  `health_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vital_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bust` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hips` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_other_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(26, '160049752326.jpg', 'sokeiprim-george', 'Sokeiprim George', NULL, '2020-09-19 05:38:45', '2020-09-19 12:39:07'),
(27, '160049755027.jpg', 'christabel-ifejika', 'Christabel Ifejika', NULL, '2020-09-19 05:39:14', '2020-09-19 05:39:14'),
(28, '160049758028.jpg', 'sonia-lucky', 'Sonia Lucky', NULL, '2020-09-19 05:39:43', '2020-09-19 12:45:52'),
(29, '160053455429.jpg', 'oyinyechi-okechukwu', 'Oyinyechi Okechukwu', 0, '2020-09-19 15:55:57', '2020-09-19 15:55:57'),
(30, '160053459130.jpg', 'cynthia-ugwuoke', 'Cynthia Ugwuoke', 0, '2020-09-19 15:56:34', '2020-09-19 15:56:34'),
(31, '160053463031.jpg', 'angel-i-maurice', 'Angel I. Maurice', 0, '2020-09-19 15:57:13', '2020-09-19 15:57:13'),
(32, '160053465232.jpg', 'jane-barika', 'Jane Barika', 0, '2020-09-19 15:57:35', '2020-09-19 15:57:35'),
(33, '160053467333.jpg', 'wealth-ofem', 'Wealth Ofem', 0, '2020-09-19 15:57:56', '2020-09-19 15:57:56'),
(34, '160053469534.jpg', 'amadi-charish', 'Amadi Charish', 0, '2020-09-19 15:58:18', '2020-09-19 15:58:18'),
(35, '160053471835.jpg', 'lucky-daniella-chioma', 'Lucky Daniella Chioma', 0, '2020-09-19 15:58:41', '2020-09-19 15:58:41'),
(36, '160053481136.jpg', 'favour-chinedu', 'Favour Chinedu', 0, '2020-09-19 16:00:14', '2020-09-19 16:00:14'),
(37, '160053483837.jpg', 'albert-angel-clinton', 'Albert Angel Clinton', 0, '2020-09-19 16:00:41', '2020-09-19 16:00:41'),
(38, '160053487138.jpg', 'boma-wyse', 'Boma Wyse', 0, '2020-09-19 16:01:14', '2020-09-19 16:01:14'),
(39, '160053504839.jpg', 'sokari-west', 'Sokari West', 0, '2020-09-19 16:04:11', '2020-09-19 16:04:11'),
(40, '160053508340.jpg', 'emmanuella-k-botoye', 'Emmanuella K. Botoye', 0, '2020-09-19 16:04:46', '2020-09-19 16:04:46'),
(41, '160053511041.jpg', 'delphina-edebiri', 'Delphina Edebiri', 0, '2020-09-19 16:05:13', '2020-09-19 16:05:13'),
(42, '160053515342.jpg', 'oghomeh-olere-elma', 'Oghomeh Olere Elma', 0, '2020-09-19 16:05:56', '2020-09-19 16:05:56'),
(43, '160053518043.jpg', 'shalom-chukwu', 'Shalom Chukwu', 0, '2020-09-19 16:06:23', '2020-09-19 16:06:23'),
(44, '160053520544.jpg', 'victory-obioma', 'Victory Obioma', 0, '2020-09-19 16:06:49', '2020-09-19 16:06:49'),
(45, '160053522845.jpg', 'esther-obioma', 'Esther Obioma', 0, '2020-09-19 16:07:11', '2020-09-19 16:07:11'),
(46, '160053525746.jpg', 'gwendolyn-okon', 'Gwendolyn Okon', 0, '2020-09-19 16:07:40', '2020-09-19 16:07:40'),
(47, '160053529347.jpg', 'daniella-o-ogah', 'Daniella O. Ogah', 0, '2020-09-19 16:08:16', '2020-09-19 16:08:16'),
(48, '160053533948.jpg', 'praise-gideon-worukwo', 'Praise Gideon Worukwo', 0, '2020-09-19 16:09:02', '2020-09-19 16:09:02'),
(49, '160053537549.jpg', 'biobele-longjohn', 'Biobele LongJohn', 0, '2020-09-19 16:09:37', '2020-09-19 16:09:37'),
(50, '160053539450.jpg', 'omagbemi-princess', 'Omagbemi Princess', 0, '2020-09-19 16:09:57', '2020-09-19 16:09:57'),
(51, '160053542151.jpg', 'isabella-madubuogo', 'Isabella Madubuogo', 0, '2020-09-19 16:10:24', '2020-09-19 16:10:24'),
(52, '160053544552.jpg', 'chinasa-ewuru', 'Chinasa Ewuru', 0, '2020-09-19 16:10:48', '2020-09-19 16:10:48'),
(53, '160053546653.jpg', 'blosson-dare', 'Blosson Dare', 0, '2020-09-19 16:11:09', '2020-09-19 16:11:09'),
(54, '160053549954.jpg', 'deborah-ojuekaiye', 'Deborah Ojuekaiye', 0, '2020-09-19 16:11:41', '2020-09-19 16:11:41');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_14_125545_create_applications_table', 1),
(5, '2019_07_31_150941_create_contestants_table', 2),
(6, '2019_07_31_151402_create_votes_table', 2),
(7, '2019_07_31_152443_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contestant_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_contestant_id_index` (`contestant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Administrator', 'kidstarmodels@gmail.com', NULL, '$2y$12$h/u/p1ORNYMbcseluVekZ.d1KtGlxWOD6zzlyXOmHgSterQ6T/ke.', '7jicz6coSo9QEvxmzHtiw2j4dcKmcvkcYJaIwndMRqj7jb1OnGyrybLQB3XE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contestant_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `votes_contestant_id_index` (`contestant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
