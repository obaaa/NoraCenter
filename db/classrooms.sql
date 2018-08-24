-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 28 يوليو 2018 الساعة 10:45
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
-- بنية الجدول `classrooms`
--

CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branches_id` int(11) NOT NULL,
  `number_seats` int(11) NOT NULL,
  `lecture_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=20 ;

--
-- إرجاع أو استيراد بيانات الجدول `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `branches_id`, `number_seats`, `lecture_time`, `created_at`, `updated_at`) VALUES
(1, '- فرع السوق العربي Class _1', 1, 30, 120, '2018-01-26 07:34:22', '2018-03-19 07:03:00'),
(2, '- فرع السوق العربي لاب الحاسوب', 1, 12, 90, '2018-01-30 12:51:10', '2018-03-19 07:02:19'),
(3, '- فرع المحطة الوسطى Class - 4', 2, 20, 120, '2018-01-30 12:52:03', '2018-03-19 07:01:51'),
(4, '- فرع احمد قاسم لاب الحاسوب', 3, 10, 90, '2018-03-16 23:08:31', '2018-03-19 07:01:06'),
(5, '- فرع المحطة الوسطى class - 1', 2, 30, 120, '2018-03-16 23:10:43', '2018-03-19 07:00:26'),
(6, '- فرع المحطة الوسطى class - 2', 2, 20, 120, '2018-03-16 23:11:26', '2018-03-19 06:59:33'),
(7, '- فرع المحطة الوسطى class - 3', 2, 35, 120, '2018-03-16 23:12:06', '2018-03-19 06:58:49'),
(8, '- فرع العربي القاعة الكبيرة (class -2)', 1, 100, 120, '2018-03-16 23:15:58', '2018-03-19 06:57:52'),
(9, '- فرع العربي ورشة الصيانة (class -5)', 1, 3, 90, '2018-03-16 23:17:32', '2018-03-19 06:57:18'),
(10, '- فرع العربي قاعة كورسات خاصة (class -4)', 1, 3, 90, '2018-03-16 23:19:13', '2018-03-19 06:56:40'),
(11, '- فرع  بحري - لاب الحاسوب', 2, 10, 90, '2018-03-16 23:22:26', '2018-03-19 10:48:37'),
(12, '- فرع احمد قاسم قاعة رياض الاطفال (class - 2)', 3, 10, 90, '2018-03-16 23:23:32', '2018-03-19 06:55:10'),
(13, '-فرع احمد قاسم الكبرى (class - 3)', 3, 50, 120, '2018-03-16 23:24:38', '2018-03-19 06:54:31'),
(14, '- فرع احمد قاسم لغات )class - 4)', 3, 12, 120, '2018-03-16 23:25:29', '2018-03-19 06:53:53'),
(15, 'فرع احمد قاسم لغات (class - 5)', 3, 20, 120, '2018-03-16 23:26:20', '2018-03-19 06:47:56'),
(16, 'فرع العربي السطوح للأمسيات', 1, 250, 120, '2018-03-16 23:27:10', '2018-03-19 06:47:25'),
(17, '-فرع بحري الحسابا ت (للكورسات الخاصة)', 2, 4, 120, '2018-03-16 23:28:42', '2018-03-19 06:46:39'),
(18, '-فرع العربي class - 3- المصلى (للكورسات الخاصة)', 1, 5, 90, '2018-03-16 23:29:51', '2018-03-23 18:24:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
