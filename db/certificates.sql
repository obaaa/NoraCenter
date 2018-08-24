-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 14 أغسطس 2018 الساعة 12:23
-- إصدارة المزود: 10.1.27-MariaDB
-- PHP إصدارة: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `cl43-bd-retnec`
--

-- --------------------------------------------------------

--
-- بنية الجدول `certificates`
--

CREATE TABLE IF NOT EXISTS `certificates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groups_id` int(11) NOT NULL,
  `trainers_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('open','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=38 ;

--
-- إرجاع أو استيراد بيانات الجدول `certificates`
--

INSERT INTO `certificates` (`id`, `groups_id`, `trainers_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 54, 'مجموعة كبيرة', 'open', '2018-05-19 16:58:34', NULL),
(4, 39, 90, 'مجموعة مستوى أول أستاذ عثمان', 'open', '2018-05-19 17:03:41', NULL),
(5, 111, 684, 'اسماك عبير', 'open', '2018-05-19 18:29:42', NULL),
(6, 22, 828, 'تمهيدي', 'open', '2018-05-21 06:19:46', NULL),
(7, 105, 909, 'مجموعة شجاع محاسبة لغير المحاسبين مبادئ محاسبة', 'open', '2018-06-20 12:18:28', NULL),
(8, 118, 90, 'درجات الطلاب المستوي الأول', 'open', '2018-06-26 08:57:00', NULL),
(9, 66, 54, 'درجات طلاب وطالبات', 'open', '2018-06-26 10:41:07', NULL),
(10, 129, 54, 'درجات طلاب وطالبات', 'open', '2018-06-26 10:45:16', NULL),
(11, 9, 54, 'درجات طلاب وطالبات', 'open', '2018-06-26 10:48:19', NULL),
(12, 122, 54, 'درجات طلاب وطالبات', 'open', '2018-06-26 10:48:59', NULL),
(13, 15, 90, '', 'open', '2018-07-19 09:00:32', NULL),
(14, 128, 90, '', 'open', '2018-07-19 09:00:44', NULL),
(15, 200, 64, '', 'open', '2018-07-19 09:01:01', NULL),
(16, 208, 1604, '', 'open', '2018-07-19 09:01:10', NULL),
(17, 168, 1508, '', 'open', '2018-07-19 09:01:23', NULL),
(18, 209, 1508, '', 'open', '2018-07-19 09:01:32', NULL),
(19, 147, 684, '', 'open', '2018-07-19 09:01:39', NULL),
(20, 220, 640, '', 'open', '2018-07-19 09:01:47', NULL),
(21, 226, 1604, '', 'open', '2018-07-19 09:01:54', NULL),
(22, 205, 90, '', 'open', '2018-07-19 09:02:01', NULL),
(23, 232, 64, '', 'open', '2018-07-19 09:02:11', NULL),
(25, 234, 909, NULL, 'finished', '2018-07-19 14:21:59', NULL),
(26, 137, 90, NULL, 'open', '2018-07-22 11:34:37', NULL),
(27, 167, 1290, 'اوتوكاد مج خاصة', 'finished', '2018-07-26 15:53:44', NULL),
(28, 219, 1616, NULL, 'open', '2018-07-28 09:31:41', NULL),
(29, 215, 1508, NULL, 'open', '2018-07-28 09:37:10', NULL),
(30, 126, 124, 'رخثة دولية لقياظة الحل', 'open', '2018-07-28 16:50:39', NULL),
(31, 258, 1508, NULL, 'open', '2018-08-01 10:20:15', NULL),
(32, 17, 54, 'جيد جدا\r\nمخ', 'finished', '2018-08-04 11:39:34', NULL),
(33, 286, 347, NULL, 'open', '2018-08-07 13:43:56', NULL),
(34, 182, 90, 'English pre\r\nEnglish', 'finished', '2018-08-11 17:22:49', NULL),
(35, 187, 513, 'درجات الطلاب محلاسبة', 'finished', '2018-08-11 19:07:38', NULL),
(36, 183, 513, 'كاعلعلتلاتلتلتالاتلاتل', 'finished', '2018-08-11 19:09:08', NULL),
(37, 145, 513, 'ناللب تلتلتالتلاتلاتل', 'finished', '2018-08-11 19:10:32', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
