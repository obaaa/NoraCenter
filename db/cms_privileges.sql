-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 25 يوليو 2018 الساعة 01:09
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
-- بنية الجدول `cms_privileges`
--

CREATE TABLE IF NOT EXISTS `cms_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- إرجاع أو استيراد بيانات الجدول `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `created_at`, `updated_at`, `name`, `is_superadmin`, `theme_color`) VALUES
(1, '2018-01-25 14:14:27', NULL, 'Super Administrator', 1, 'skin-red'),
(2, NULL, NULL, 'Manager', 0, 'skin-red'),
(3, NULL, NULL, 'Receptionist', 0, 'skin-red'),
(4, NULL, NULL, 'Accountant', 0, 'skin-blue'),
(5, NULL, NULL, 'Marketer', 0, 'skin-blue'),
(6, NULL, NULL, 'Trainer', 0, 'skin-red'),
(7, NULL, NULL, 'Trainee', 0, 'skin-red');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
