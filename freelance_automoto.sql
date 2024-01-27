-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2024 at 12:09 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance_automoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'shams@automoto.com', NULL, NULL, NULL, '$2y$10$R8ZEBHIZweAC65m5bl4Cm.3edUVVjNPgemnjKX5akhxoFwjKv6B4y', NULL, '2023-12-24 20:56:59', '2023-12-24 20:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `alarms`
--

DROP TABLE IF EXISTS `alarms`;
CREATE TABLE IF NOT EXISTS `alarms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `active_alert` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alarms_user_id_foreign` (`user_id`),
  KEY `alarms_brand_id_foreign` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alarms`
--

INSERT INTO `alarms` (`id`, `user_id`, `brand_id`, `active_alert`, `created_at`, `updated_at`) VALUES
(177, 8, 3, 1, NULL, NULL),
(178, 8, 1, 1, NULL, NULL),
(179, 8, 4, 0, NULL, NULL),
(180, 8, 5, 1, NULL, NULL),
(181, 8, 6, 0, NULL, NULL),
(182, 8, 7, 0, NULL, NULL),
(183, 8, 9, 0, NULL, NULL),
(184, 8, 8, 0, NULL, NULL),
(185, 8, 10, 0, NULL, NULL),
(186, 8, 11, 0, NULL, NULL),
(187, 8, 12, 0, NULL, NULL),
(188, 8, 13, 0, NULL, NULL),
(189, 8, 14, 0, NULL, NULL),
(190, 8, 15, 0, NULL, NULL),
(191, 8, 16, 0, NULL, NULL),
(192, 8, 17, 0, NULL, NULL),
(193, 8, 18, 0, NULL, NULL),
(194, 8, 19, 0, NULL, NULL),
(195, 8, 20, 0, NULL, NULL),
(196, 8, 21, 0, NULL, NULL),
(197, 8, 22, 0, NULL, NULL),
(198, 8, 23, 0, NULL, NULL),
(199, 8, 24, 0, NULL, NULL),
(200, 8, 25, 0, NULL, NULL),
(201, 8, 26, 0, NULL, NULL),
(202, 8, 27, 0, NULL, NULL),
(203, 8, 28, 0, NULL, NULL),
(204, 8, 29, 0, NULL, NULL),
(205, 8, 30, 0, NULL, NULL),
(206, 8, 31, 0, NULL, NULL),
(207, 8, 32, 0, NULL, NULL),
(208, 8, 33, 0, NULL, NULL),
(209, 8, 34, 0, NULL, NULL),
(210, 8, 35, 0, NULL, NULL),
(211, 8, 36, 0, NULL, NULL),
(212, 8, 37, 0, NULL, NULL),
(213, 8, 38, 0, NULL, NULL),
(214, 8, 39, 0, NULL, NULL),
(215, 8, 40, 0, NULL, NULL),
(216, 8, 41, 1, NULL, NULL),
(217, 8, 42, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banners_image_id_foreign` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'asd asd asd asd', NULL, '2024-01-27 09:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brands_image_id_foreign` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 'فيات', 31, '2023-12-23 09:24:50', '2023-12-25 13:04:04'),
(3, 'ميتسوبيشي', 30, '2023-12-25 13:03:00', '2023-12-25 13:03:00'),
(4, 'كيا', 32, '2023-12-25 13:05:02', '2023-12-25 13:05:02'),
(5, 'دايو', 33, '2023-12-25 13:06:15', '2023-12-25 13:06:15'),
(6, 'لادا', 34, '2023-12-25 13:07:41', '2023-12-25 13:07:41'),
(7, 'رينو', 36, '2023-12-25 17:12:13', '2023-12-25 17:13:19'),
(8, 'مرسيدس', 38, '2023-12-25 17:13:39', '2023-12-25 20:27:28'),
(9, 'بروتون', 37, '2023-12-25 17:15:56', '2023-12-25 17:15:56'),
(10, 'دايهاتسو', 39, '2023-12-25 20:36:22', '2023-12-25 20:36:22'),
(11, 'بي واي دي', 40, '2023-12-25 20:51:32', '2023-12-25 20:51:32'),
(12, 'ڤولڤو', 41, '2023-12-25 20:54:56', '2023-12-25 20:54:56'),
(13, 'ماذدا', 42, '2023-12-25 20:55:53', '2023-12-25 20:55:53'),
(14, 'سيات', 43, '2023-12-25 20:56:22', '2023-12-25 20:56:22'),
(15, 'تويوتا', 44, '2023-12-25 20:56:58', '2023-12-25 20:56:58'),
(16, 'سوبارو', 45, '2023-12-25 20:57:33', '2023-12-25 20:57:33'),
(17, 'شيفروليه', 46, '2023-12-25 20:58:07', '2023-12-25 20:58:07'),
(18, 'ڤولكس ڤاجن', 47, '2023-12-25 20:58:51', '2023-12-25 20:58:51'),
(19, 'چيب', 48, '2023-12-25 20:59:38', '2023-12-25 20:59:38'),
(20, 'أودي', 49, '2023-12-25 21:00:06', '2023-12-25 21:00:06'),
(21, 'كرايسلر', 50, '2023-12-25 21:33:44', '2023-12-25 21:33:44'),
(22, 'بريليانس', 51, '2023-12-25 21:34:16', '2023-12-25 21:34:16'),
(23, 'ميني كوبر', 52, '2023-12-25 21:34:48', '2023-12-25 21:34:48'),
(24, 'أم چي', 53, '2023-12-25 21:35:14', '2023-12-25 21:35:14'),
(25, 'أوبل', 54, '2023-12-25 21:35:37', '2023-12-25 21:35:37'),
(26, 'سكودا', 55, '2023-12-25 21:35:58', '2023-12-25 21:35:58'),
(27, 'سوزوكي', 56, '2023-12-25 21:36:26', '2023-12-25 21:36:26'),
(28, 'دودچ', 57, '2023-12-25 21:37:00', '2023-12-25 21:37:00'),
(29, 'هوندا', 58, '2023-12-25 21:38:52', '2023-12-25 21:38:52'),
(30, 'فورد', 59, '2023-12-25 21:39:51', '2023-12-25 21:39:51'),
(31, 'ألفا روميو', 60, '2023-12-25 21:40:22', '2023-12-25 21:40:22'),
(32, 'لاندروفر', 61, '2023-12-25 21:41:01', '2023-12-25 21:41:01'),
(33, 'چي ام سي', 62, '2023-12-25 21:41:31', '2023-12-25 21:41:31'),
(34, 'بورش', 63, '2023-12-25 21:41:59', '2023-12-25 21:41:59'),
(35, 'نيسان', 67, '2023-12-26 07:32:54', '2023-12-26 07:32:54'),
(36, 'هيونداي', 68, '2023-12-26 07:34:41', '2023-12-26 07:34:41'),
(37, 'هايما', 74, '2023-12-27 15:21:39', '2023-12-27 15:21:39'),
(38, 'ليڤان', 75, '2023-12-27 15:23:16', '2023-12-27 15:23:16'),
(39, 'چيلي', 76, '2023-12-27 15:23:47', '2023-12-27 15:23:47'),
(40, 'چاك', 77, '2023-12-27 15:24:09', '2023-12-27 15:24:09'),
(41, 'جريت وول', 78, '2023-12-27 15:25:04', '2023-12-27 15:25:04'),
(42, 'شيري', 79, '2023-12-27 15:25:32', '2023-12-27 15:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `for_jobs` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `for_brands` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categories_image_id_foreign` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_id`, `for_jobs`, `created_at`, `updated_at`, `for_brands`) VALUES
(5, 'أكسسوارات', 69, 1, '2023-12-26 07:35:52', '2023-12-27 09:51:51', 0),
(6, 'ونش نجدة', 70, 0, '2023-12-26 11:31:05', '2023-12-26 11:31:05', 0),
(8, 'أيجار عربيات', 71, 1, '2023-12-26 11:33:44', '2023-12-27 09:50:10', 0),
(9, 'قطع غيار إستيراد', 72, 0, '2023-12-26 13:22:46', '2024-01-03 16:16:02', 0),
(10, 'قطع غيار جديد', 73, 0, '2023-12-26 13:23:24', '2024-01-03 16:16:49', 0),
(12, 'صنايعيه وحرفيين', 80, 0, '2023-12-27 15:33:55', '2023-12-27 15:33:55', 0),
(13, 'وظائف سائقين', 97, 1, '2023-12-27 18:10:08', '2023-12-28 18:15:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(2, NULL, 'القاهرة', '2023-12-22 20:01:05', '2023-12-22 20:01:05'),
(4, 2, 'الحرفيين', '2023-12-22 20:19:21', '2023-12-26 11:35:10'),
(5, NULL, 'الجيزه', '2023-12-25 12:54:07', '2023-12-25 12:54:07'),
(6, 2, 'الحي السابع مدينه نصر', '2023-12-26 11:35:27', '2023-12-26 11:35:27'),
(7, 2, 'صقر قريش المعادي', '2023-12-26 11:35:39', '2023-12-26 11:35:39'),
(8, 2, 'الحي العاشر مدينه نصر', '2023-12-26 11:35:55', '2023-12-26 11:35:55'),
(9, 2, 'عين شمس', '2023-12-26 11:36:04', '2023-12-26 11:36:04'),
(10, 2, 'مصر الجديده', '2023-12-26 11:36:23', '2023-12-26 11:36:23'),
(11, 2, 'النزهه', '2023-12-26 11:36:37', '2023-12-26 11:36:37'),
(12, 2, 'شيراتون', '2023-12-26 11:36:46', '2023-12-26 11:36:46'),
(13, 2, 'المنطقه الصناعيه بالتجمع', '2023-12-26 11:37:10', '2023-12-26 11:37:10'),
(14, 2, 'الشروق والمستقبل', '2023-12-26 11:37:24', '2023-12-26 11:37:24'),
(15, 2, 'مدينتي والرحاب', '2023-12-26 11:37:45', '2023-12-26 11:37:45'),
(16, 2, 'المقطم', '2023-12-26 11:38:04', '2023-12-26 11:38:04'),
(17, 2, 'المطريه', '2023-12-26 11:38:36', '2023-12-26 11:38:36'),
(18, 2, 'عزبة شلبي', '2023-12-26 11:40:09', '2023-12-26 11:40:29'),
(19, 2, 'شبرا الخيمه', '2023-12-26 11:42:26', '2023-12-26 11:42:26'),
(20, 5, 'فيصل', '2024-01-03 16:18:41', '2024-01-03 16:18:41'),
(21, NULL, 'الاسكندريه', '2024-01-03 16:19:03', '2024-01-03 16:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  KEY `favorites_vendor_id_foreign` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(7, 8, 27, '2024-01-27 09:04:28', '2024-01-27 09:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

DROP TABLE IF EXISTS `inboxes`;
CREATE TABLE IF NOT EXISTS `inboxes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `created_at`, `updated_at`) VALUES
(1, 'uploads/200X2001703280141So3Fm.jpg', '2023-12-22 19:22:21', '2023-12-22 19:22:21'),
(2, 'uploads/200X20017032803432iRW1.jpg', '2023-12-22 19:25:43', '2023-12-22 19:25:43'),
(3, 'uploads/200X2001703280379VqGaI.jpg', '2023-12-22 19:26:19', '2023-12-22 19:26:19'),
(4, 'uploads/200X2001703280459RU2aK.jpg', '2023-12-22 19:27:39', '2023-12-22 19:27:39'),
(5, 'uploads/200X2001703280838xoLMx.png', '2023-12-22 19:33:58', '2023-12-22 19:33:58'),
(6, 'uploads/200X2001703280871mJssA.jpg', '2023-12-22 19:34:31', '2023-12-22 19:34:31'),
(7, 'uploads/200X2001703280932rkK1l.jpg', '2023-12-22 19:35:32', '2023-12-22 19:35:32'),
(8, 'uploads/200X2001703280962GyV1e.jpg', '2023-12-22 19:36:02', '2023-12-22 19:36:02'),
(9, 'uploads/200X2001703288010RAaai.jpg', '2023-12-22 21:33:30', '2023-12-22 21:33:30'),
(10, 'uploads/200X2001703288110C2Q0i.jpg', '2023-12-22 21:35:10', '2023-12-22 21:35:10'),
(11, 'uploads/200X2001703288334wkekI.jpg', '2023-12-22 21:38:54', '2023-12-22 21:38:54'),
(12, 'uploads/200X2001703288470SqNFg.jpg', '2023-12-22 21:41:10', '2023-12-22 21:41:10'),
(13, 'uploads/200X20017032885509nfKE.jpg', '2023-12-22 21:42:30', '2023-12-22 21:42:30'),
(14, 'uploads/200X2001703288574xqG7w.jpg', '2023-12-22 21:42:55', '2023-12-22 21:42:55'),
(15, 'uploads/200X2001703291745p8tzt.jpg', '2023-12-22 22:35:45', '2023-12-22 22:35:45'),
(16, 'uploads/200X2001703330640b6NCK.jpg', '2023-12-23 09:24:00', '2023-12-23 09:24:00'),
(17, 'uploads/200X2001703330690wJ5w3.jpg', '2023-12-23 09:24:50', '2023-12-23 09:24:50'),
(18, 'uploads/200X2001703330772ezyJj.jpg', '2023-12-23 09:26:12', '2023-12-23 09:26:12'),
(19, 'uploads/200X2001703330785Pwsry.jpg', '2023-12-23 09:26:25', '2023-12-23 09:26:25'),
(20, 'uploads/200X2001703331915HzGtT.jpg', '2023-12-23 09:45:16', '2023-12-23 09:45:16'),
(21, 'uploads/200X2001703332456uUl8u.jpg', '2023-12-23 09:54:16', '2023-12-23 09:54:16'),
(22, 'uploads/200X2001703332496B5ctf.png', '2023-12-23 09:54:56', '2023-12-23 09:54:56'),
(23, 'uploads/200X2001703332496zCa7X.png', '2023-12-23 09:54:56', '2023-12-23 09:54:56'),
(24, 'uploads/200X2001703332545HUXT8.png', '2023-12-23 09:55:45', '2023-12-23 09:55:45'),
(25, 'uploads/200X20017033357344nSOu.png', '2023-12-23 10:48:54', '2023-12-23 10:48:54'),
(26, 'uploads/300X2001703335734kf6t8.jpg', '2023-12-23 10:48:54', '2023-12-23 10:48:54'),
(27, 'uploads/200X2001703335790GWYmK.png', '2023-12-23 10:49:50', '2023-12-23 10:49:50'),
(28, 'uploads/300X2001703335790KU1ei.jpg', '2023-12-23 10:49:50', '2023-12-23 10:49:50'),
(29, 'uploads/200X2001703433684deGcX.jpg', '2023-12-24 14:01:24', '2023-12-24 14:01:24'),
(30, 'uploads/200X20017035093804Nfqp.png', '2023-12-25 13:03:00', '2023-12-25 13:03:00'),
(31, 'uploads/200X2001703509444lEHXF.png', '2023-12-25 13:04:04', '2023-12-25 13:04:04'),
(32, 'uploads/200X2001703509502y6gTv.png', '2023-12-25 13:05:02', '2023-12-25 13:05:02'),
(33, 'uploads/200X2001703509575clpG7.png', '2023-12-25 13:06:15', '2023-12-25 13:06:15'),
(34, 'uploads/200X2001703509661R0b5o.png', '2023-12-25 13:07:41', '2023-12-25 13:07:41'),
(35, 'uploads/200X2001703524333rJUTS.jpeg', '2023-12-25 17:12:13', '2023-12-25 17:12:13'),
(36, 'uploads/200X2001703524399H1GlZ.png', '2023-12-25 17:13:19', '2023-12-25 17:13:19'),
(37, 'uploads/200X2001703524556EiJBd.png', '2023-12-25 17:15:56', '2023-12-25 17:15:56'),
(38, 'uploads/200X2001703536048BAoab.jpeg', '2023-12-25 20:27:28', '2023-12-25 20:27:28'),
(39, 'uploads/200X2001703536582ZTmF0.png', '2023-12-25 20:36:22', '2023-12-25 20:36:22'),
(40, 'uploads/200X2001703537492KxMUf.png', '2023-12-25 20:51:32', '2023-12-25 20:51:32'),
(41, 'uploads/200X2001703537696Kce8G.png', '2023-12-25 20:54:56', '2023-12-25 20:54:56'),
(42, 'uploads/200X2001703537752miwe5.png', '2023-12-25 20:55:53', '2023-12-25 20:55:53'),
(43, 'uploads/200X2001703537782eq2wh.png', '2023-12-25 20:56:22', '2023-12-25 20:56:22'),
(44, 'uploads/200X2001703537818dgkYm.png', '2023-12-25 20:56:58', '2023-12-25 20:56:58'),
(45, 'uploads/200X2001703537853YyrQH.png', '2023-12-25 20:57:33', '2023-12-25 20:57:33'),
(46, 'uploads/200X2001703537887Ah1Bg.png', '2023-12-25 20:58:07', '2023-12-25 20:58:07'),
(47, 'uploads/200X2001703537931debXj.png', '2023-12-25 20:58:51', '2023-12-25 20:58:51'),
(48, 'uploads/200X2001703537978tqls7.png', '2023-12-25 20:59:38', '2023-12-25 20:59:38'),
(49, 'uploads/200X2001703538006Q8URK.png', '2023-12-25 21:00:06', '2023-12-25 21:00:06'),
(50, 'uploads/200X2001703540024M0ibt.png', '2023-12-25 21:33:44', '2023-12-25 21:33:44'),
(51, 'uploads/200X2001703540056BJTkH.png', '2023-12-25 21:34:16', '2023-12-25 21:34:16'),
(52, 'uploads/200X2001703540088cYO74.png', '2023-12-25 21:34:48', '2023-12-25 21:34:48'),
(53, 'uploads/200X20017035401140auxt.png', '2023-12-25 21:35:14', '2023-12-25 21:35:14'),
(54, 'uploads/200X20017035401372SBv1.png', '2023-12-25 21:35:37', '2023-12-25 21:35:37'),
(55, 'uploads/200X2001703540158vvhvs.png', '2023-12-25 21:35:58', '2023-12-25 21:35:58'),
(56, 'uploads/200X2001703540186BIU1x.png', '2023-12-25 21:36:26', '2023-12-25 21:36:26'),
(57, 'uploads/200X2001703540220T3bGC.png', '2023-12-25 21:37:00', '2023-12-25 21:37:00'),
(58, 'uploads/200X2001703540332VM0Fr.png', '2023-12-25 21:38:52', '2023-12-25 21:38:52'),
(59, 'uploads/200X2001703540391XteKr.png', '2023-12-25 21:39:51', '2023-12-25 21:39:51'),
(60, 'uploads/200X200170354042295e4k.png', '2023-12-25 21:40:22', '2023-12-25 21:40:22'),
(61, 'uploads/200X20017035404611c9BP.png', '2023-12-25 21:41:01', '2023-12-25 21:41:01'),
(62, 'uploads/200X2001703540491RPxLy.png', '2023-12-25 21:41:31', '2023-12-25 21:41:31'),
(63, 'uploads/200X2001703540519cyBmc.png', '2023-12-25 21:41:59', '2023-12-25 21:41:59'),
(64, 'uploads/200X20017035405655Mh2H.png', '2023-12-25 21:42:45', '2023-12-25 21:42:45'),
(65, 'uploads/200X2001703540618Sl2SY.png', '2023-12-25 21:43:38', '2023-12-25 21:43:38'),
(66, 'uploads/200X2001703540782QHY3Y.png', '2023-12-25 21:46:22', '2023-12-25 21:46:22'),
(67, 'uploads/200X2001703575974O9NGO.png', '2023-12-26 07:32:54', '2023-12-26 07:32:54'),
(68, 'uploads/200X2001703576081dHEkM.png', '2023-12-26 07:34:41', '2023-12-26 07:34:41'),
(69, 'uploads/200X20017035764096WVu4.png', '2023-12-26 07:40:09', '2023-12-26 07:40:09'),
(70, 'uploads/200X2001703590265W6Bw0.png', '2023-12-26 11:31:05', '2023-12-26 11:31:05'),
(71, 'uploads/200X2001703590424Jpguw.png', '2023-12-26 11:33:44', '2023-12-26 11:33:44'),
(72, 'uploads/200X200170359696611FKk.png', '2023-12-26 13:22:46', '2023-12-26 13:22:46'),
(73, 'uploads/200X2001703597004Qubbm.png', '2023-12-26 13:23:24', '2023-12-26 13:23:24'),
(74, 'uploads/200X20017036904996MlOd.png', '2023-12-27 15:21:39', '2023-12-27 15:21:39'),
(75, 'uploads/200X2001703690596MMmYO.png', '2023-12-27 15:23:16', '2023-12-27 15:23:16'),
(76, 'uploads/200X2001703690626LzBbX.png', '2023-12-27 15:23:47', '2023-12-27 15:23:47'),
(77, 'uploads/200X2001703690649zD3LO.png', '2023-12-27 15:24:09', '2023-12-27 15:24:09'),
(78, 'uploads/200X2001703690703UW4eV.png', '2023-12-27 15:25:04', '2023-12-27 15:25:04'),
(79, 'uploads/200X2001703690732WopaB.png', '2023-12-27 15:25:32', '2023-12-27 15:25:32'),
(80, 'uploads/200X2001703691235ZcTIz.png', '2023-12-27 15:33:55', '2023-12-27 15:33:55'),
(81, 'uploads/200X2001703700363LSSsS.png', '2023-12-27 18:06:03', '2023-12-27 18:06:03'),
(82, 'uploads/200X2001703700498GyWb3.png', '2023-12-27 18:08:18', '2023-12-27 18:08:18'),
(83, 'uploads/200X2001703700608VjNsF.png', '2023-12-27 18:10:08', '2023-12-27 18:10:08'),
(84, 'uploads/200X2001703711496h6UZR.png', '2023-12-27 21:11:36', '2023-12-27 21:11:36'),
(85, 'uploads/200X2001703711496GUEsL.png', '2023-12-27 21:11:36', '2023-12-27 21:11:36'),
(86, 'uploads/200X2001703711499cc9eh.png', '2023-12-27 21:11:39', '2023-12-27 21:11:39'),
(87, 'uploads/200X2001703711499amIOe.png', '2023-12-27 21:11:39', '2023-12-27 21:11:39'),
(88, 'uploads/200X20017037125599tFaz.png', '2023-12-27 21:29:19', '2023-12-27 21:29:19'),
(89, 'uploads/200X20017037126218gaDj.png', '2023-12-27 21:30:22', '2023-12-27 21:30:22'),
(90, 'uploads/200X2001703712696nUZGJ.png', '2023-12-27 21:31:36', '2023-12-27 21:31:36'),
(91, 'uploads/200X2001703712762UH1jw.png', '2023-12-27 21:32:42', '2023-12-27 21:32:42'),
(92, 'uploads/200X2001703712929Lk7yo.png', '2023-12-27 21:35:29', '2023-12-27 21:35:29'),
(93, 'uploads/200X2001703713303z4INW.png', '2023-12-27 21:41:44', '2023-12-27 21:41:44'),
(94, 'uploads/200X2001703713359RGPaG.png', '2023-12-27 21:42:39', '2023-12-27 21:42:39'),
(95, 'uploads/200X2001703713359ssNNh.png', '2023-12-27 21:42:39', '2023-12-27 21:42:39'),
(96, 'uploads/200X2001703713456yDvlc.png', '2023-12-27 21:44:16', '2023-12-27 21:44:16'),
(97, 'uploads/200X2001703787301ETvew.png', '2023-12-28 18:15:01', '2023-12-28 18:15:01'),
(98, 'uploads/200X2001704242257XBoiI.png', '2024-01-03 00:37:37', '2024-01-03 00:37:37'),
(99, 'uploads/300X2001704242257X2vA9.jpg', '2024-01-03 00:37:37', '2024-01-03 00:37:37'),
(100, 'uploads/200X2001704380599irYnu.png', '2024-01-04 15:03:19', '2024-01-04 15:03:19'),
(101, 'uploads/200X2001704380599G0xbw.png', '2024-01-04 15:03:19', '2024-01-04 15:03:19'),
(102, 'uploads/200X2001704380601yJqIV.png', '2024-01-04 15:03:21', '2024-01-04 15:03:21'),
(103, 'uploads/200X2001704380601JMkkH.png', '2024-01-04 15:03:21', '2024-01-04 15:03:21'),
(104, 'uploads/200X2001704380644RxChE.png', '2024-01-04 15:04:04', '2024-01-04 15:04:04'),
(105, 'uploads/200X2001704380644gIHAb.png', '2024-01-04 15:04:04', '2024-01-04 15:04:04'),
(106, 'uploads/200X20017043807344bpn9.png', '2024-01-04 15:05:34', '2024-01-04 15:05:34'),
(107, 'uploads/200X2001704380734Ay3vU.png', '2024-01-04 15:05:34', '2024-01-04 15:05:34'),
(108, 'uploads/200X2001704481500MwAuI.jpeg', '2024-01-05 19:05:00', '2024-01-05 19:05:00'),
(109, 'uploads/200X2001704481500p1hkB.jpeg', '2024-01-05 19:05:00', '2024-01-05 19:05:00'),
(110, 'uploads/200X2001705672029Xjapw.jpg', '2024-01-19 11:47:09', '2024-01-19 11:47:09'),
(111, 'uploads/200X2001705673304LXExq.jpg', '2024-01-19 12:08:24', '2024-01-19 12:08:24'),
(112, 'uploads/200X2001705673347VooxY.jpg', '2024-01-19 12:09:07', '2024-01-19 12:09:07'),
(113, 'uploads/200X20017056734219SQr7.jpg', '2024-01-19 12:10:21', '2024-01-19 12:10:21'),
(114, 'uploads/200X2001705673664gKYcJ.jpg', '2024-01-19 12:14:24', '2024-01-19 12:14:24'),
(115, 'uploads/200X2001706164481d1rB8.png', '2024-01-25 04:34:41', '2024-01-25 04:34:41'),
(116, 'uploads/100X1001706165667iT3jc.png', '2024-01-25 04:54:27', '2024-01-25 04:54:27'),
(118, 'uploads/200X2001706165971PTBSI.png', '2024-01-25 04:59:31', '2024-01-25 04:59:31'),
(119, 'uploads/200X200170618841905Fhy.png', '2024-01-25 11:13:39', '2024-01-25 11:13:39'),
(120, 'uploads/300X200170618841944qV1.jpg', '2024-01-25 11:13:39', '2024-01-25 11:13:39'),
(121, 'uploads/200X2001706277731Z9BhL.png', '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(122, 'uploads/200X2001706356143TjYRm.jpg', '2024-01-27 09:49:03', '2024-01-27 09:49:03'),
(123, 'uploads/200X2001706356150DA01c.png', '2024-01-27 09:49:10', '2024-01-27 09:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_03_134159_create_media_table', 1),
(5, '2023_12_03_134160_create_users_table', 1),
(6, '2023_12_03_134217_create_cities_table', 1),
(7, '2023_12_03_134236_create_categories_table', 1),
(8, '2023_12_03_134246_create_banners_table', 1),
(10, '2023_12_03_134314_create_vendors_table', 1),
(11, '2023_12_03_134327_create_favorites_table', 1),
(12, '2023_12_03_134344_create_notifications_table', 1),
(14, '2023_12_03_134410_create_settings_table', 1),
(15, '2023_12_03_134430_create_inboxes_table', 1),
(17, '2023_12_03_134450_create_admins_table', 2),
(18, '2023_12_23_111428_create_brands_table', 3),
(20, '2023_12_23_113543_add_for_brand_id_to_categories_table', 4),
(21, '2023_12_03_134304_create_services_table', 5),
(22, '2023_12_23_111614_add_brand_id_to_services_table', 5),
(23, '2023_12_23_120435_add_fields_to_vendors_table', 6),
(24, '2023_12_23_121756_add_geo_url_to_vendors_table', 7),
(26, '2023_12_24_155555_remove_for_alarm_from_categories_table', 9),
(27, '2023_12_24_155048_add_fields_to_vendor_table', 10),
(30, '2024_01_19_125321_create_vendor_services_table', 11),
(31, '2024_01_19_125337_create_vendor_brands_table', 11),
(32, '2024_01_26_124242_create_reviews_table', 12),
(33, '2023_12_03_134354_create_alarms_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('news','brand') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_image_id_foreign` (`image_id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `rate` double(8,2) NOT NULL DEFAULT '5.00',
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_vendor_id_foreign` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `vendor_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 8, 27, 3.50, 'asd asd asd', '2024-01-26 13:10:00', '2024-01-26 13:10:00'),
(2, 12, 27, 5.00, 'asd asd ads', '2024-01-26 13:10:00', '2024-01-26 13:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `for_jobs` tinyint(1) NOT NULL DEFAULT '0',
  `for_alarm` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_category_id_foreign` (`category_id`),
  KEY `services_image_id_foreign` (`image_id`),
  KEY `services_city_id_foreign` (`city_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category_id`, `city_id`, `image_id`, `for_jobs`, `for_alarm`, `created_at`, `updated_at`) VALUES
(6, 'الميكانيكيه', 12, 2, 87, 0, 0, '2023-12-27 18:08:18', '2023-12-27 21:11:39'),
(7, 'الكهربائيه', 12, 2, 103, 0, 0, '2023-12-27 21:29:19', '2024-01-04 15:03:21'),
(8, 'كاوتش', 10, 2, 89, 0, 0, '2023-12-27 21:30:22', '2024-01-03 16:20:09'),
(9, 'السمكره والدهان', 12, 2, 90, 0, 0, '2023-12-27 21:31:36', '2023-12-27 21:31:36'),
(10, 'العفشه', 12, 2, 91, 0, 0, '2023-12-27 21:32:42', '2023-12-27 21:32:42'),
(11, 'شكمانات', 12, 2, 92, 0, 0, '2023-12-27 21:35:29', '2023-12-27 21:35:29'),
(12, 'لحام الچنوط', 12, 2, 95, 0, 0, '2023-12-27 21:41:44', '2023-12-27 21:42:39'),
(13, 'المخارط', 12, 2, 96, 0, 0, '2023-12-27 21:44:16', '2023-12-27 21:44:16'),
(14, 'السروجيه', 12, 2, 109, 0, 0, '2024-01-03 16:12:37', '2024-01-05 19:05:00'),
(15, 'بطاريات', 10, 2, 105, 0, 0, '2024-01-03 16:17:18', '2024-01-04 15:04:04'),
(16, 'ردياتير', 12, 2, 107, 0, 0, '2024-01-03 16:20:56', '2024-01-04 15:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data', 'privacy', 'test test', NULL, NULL),
(2, 'data', 'about', 'test test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  KEY `users_image_id_foreign` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image_id`, `email_verified_at`, `verified`, `verification_code`, `device_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Tarek Mahfouz', 'timahfouz262@gmail.com', '01114254513', 115, NULL, 1, NULL, NULL, '$2y$10$vfNcGIOF6prfEUGxdlRyTumXd.GAQVSgJcRvIBQRZWUKb.JDOH5iC', NULL, '2024-01-25 04:34:41', '2024-01-25 04:34:41'),
(12, 'Ahmed Shams', 'shams@automoto.com', '01004159059', 118, NULL, 0, '84793', NULL, '$2y$10$PQwsm3ua5iaA6sxutfApNO107pWwhe8VZfXOgjrmRKzVnJ0xvXALm', NULL, '2024-01-25 04:59:31', '2024-01-25 04:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_lon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_url` varchar(450) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `city_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `bg_image_id` bigint UNSIGNED DEFAULT NULL,
  `is_new_job` tinyint(1) NOT NULL DEFAULT '0',
  `is_driver` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendors_category_id_foreign` (`category_id`),
  KEY `vendors_image_id_foreign` (`image_id`),
  KEY `vendors_bg_image_id_foreign` (`bg_image_id`),
  KEY `vendors_city_id_foreign` (`city_id`),
  KEY `vendors_area_id_foreign` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `geo_lat`, `geo_lon`, `geo_url`, `phone`, `whatsapp`, `bio`, `city_id`, `area_id`, `category_id`, `image_id`, `bg_image_id`, `is_new_job`, `is_driver`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(24, 'Tarek Mahfouz', '30.0113326', '31.2748619', 'https://www.google.com/maps/place/30%C2%B000\'40.8%22N+31%C2%B016\'20.2%22E/@30.0113326,31.2748619,17z/data=!3m1!4b1!4m4!3m3!8m2!3d30.011328!4d31.272287?entry=ttu', '01114254513', '+201114254513', 'asd', 2, 4, 5, NULL, NULL, 0, 0, '14:42:00', '15:42:00', '2024-01-25 10:43:00', '2024-01-25 10:43:16'),
(25, 'Fiat', '30.011282', '31.271548', 'https://www.google.com/maps/place/30%C2%B000\'40.8%22N+31%C2%B016\'20.2%22E/@30.0113326,31.2748619,17z/data=!3m1!4b1!4m4!3m3!8m2!3d30.011328!4d31.272287?entry=ttu', '01114254513', NULL, 'asd', 5, 20, 5, NULL, NULL, 0, 0, '14:43:00', '15:43:00', '2024-01-25 10:43:36', '2024-01-25 10:43:36'),
(26, 'asd', '30.012109', '31.271623', 'https://www.google.com/maps/place/30%C2%B000\'40.8%22N+31%C2%B016\'20.2%22E/@30.0113326,31.2748619,17z/data=!3m1!4b1!4m4!3m3!8m2!3d30.011328!4d31.272287?entry=ttu', '01114254513', '+201114254513', 'شسيشسي', 2, 4, 5, 119, 120, 0, 0, '16:13:00', '17:13:00', '2024-01-25 11:13:39', '2024-01-25 11:13:43'),
(27, 'asd', '30.010781', '31.273115', 'https://www.google.com/maps/place/30%C2%B000\'40.8%22N+31%C2%B016\'20.2%22E/@30.0113326,31.2748619,17z/data=!3m1!4b1!4m4!3m3!8m2!3d30.011328!4d31.272287?entry=ttu', '01114254513', '+201114254513', NULL, 2, 4, 5, NULL, NULL, 0, 0, '15:13:00', '16:13:00', '2024-01-25 11:13:57', '2024-01-25 11:14:07'),
(28, 'Tarek Mahfouz', '30.0113326', '31.2748619', 'https://www.google.com/maps/place/30%C2%B000\'40.8%22N+31%C2%B016\'20.2%22E/@30.0113326,31.2748619,17z/data=!3m1!4b1!4m4!3m3!8m2!3d30.011328!4d31.272287?entry=ttu', '01114254513', '+201114254513', 'asdasd asdsad asdasd', 2, 4, 13, 121, NULL, 0, 1, '17:02:00', '20:05:00', '2024-01-26 12:02:12', '2024-01-26 12:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_brands`
--

DROP TABLE IF EXISTS `vendor_brands`;
CREATE TABLE IF NOT EXISTS `vendor_brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_brands_vendor_id_foreign` (`vendor_id`),
  KEY `vendor_brands_brand_id_foreign` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=747 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_brands`
--

INSERT INTO `vendor_brands` (`id`, `vendor_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(664, 24, 3, '2024-01-25 10:43:16', '2024-01-25 10:43:16'),
(705, 27, 3, '2024-01-25 11:14:07', '2024-01-25 11:14:07'),
(706, 28, 3, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(707, 28, 1, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(708, 28, 4, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(709, 28, 5, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(710, 28, 6, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(711, 28, 7, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(712, 28, 9, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(713, 28, 8, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(714, 28, 10, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(715, 28, 11, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(716, 28, 12, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(717, 28, 13, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(718, 28, 14, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(719, 28, 15, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(720, 28, 16, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(721, 28, 17, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(722, 28, 18, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(723, 28, 19, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(724, 28, 20, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(725, 28, 21, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(726, 28, 22, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(727, 28, 23, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(728, 28, 24, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(729, 28, 25, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(730, 28, 26, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(731, 28, 27, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(732, 28, 28, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(733, 28, 29, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(734, 28, 30, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(735, 28, 31, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(736, 28, 32, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(737, 28, 33, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(738, 28, 34, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(739, 28, 35, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(740, 28, 36, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(741, 28, 37, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(742, 28, 38, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(743, 28, 39, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(744, 28, 40, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(745, 28, 41, '2024-01-26 12:02:12', '2024-01-26 12:02:12'),
(746, 28, 42, '2024-01-26 12:02:12', '2024-01-26 12:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_services`
--

DROP TABLE IF EXISTS `vendor_services`;
CREATE TABLE IF NOT EXISTS `vendor_services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_services_vendor_id_foreign` (`vendor_id`),
  KEY `vendor_services_service_id_foreign` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_services`
--

INSERT INTO `vendor_services` (`id`, `vendor_id`, `service_id`, `created_at`, `updated_at`) VALUES
(31, 24, 6, NULL, NULL),
(32, 25, 11, NULL, NULL),
(33, 28, 6, '2024-01-26 12:02:12', '2024-01-26 12:02:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alarms`
--
ALTER TABLE `alarms`
  ADD CONSTRAINT `alarms_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `alarms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `services_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `services_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendors_bg_image_id_foreign` FOREIGN KEY (`bg_image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendors_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `vendors_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `vendors_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vendor_brands`
--
ALTER TABLE `vendor_brands`
  ADD CONSTRAINT `vendor_brands_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_brands_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_services`
--
ALTER TABLE `vendor_services`
  ADD CONSTRAINT `vendor_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_services_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
