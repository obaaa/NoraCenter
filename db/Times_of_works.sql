-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 12 أغسطس 2018 الساعة 16:03
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
-- بنية الجدول `Times_of_works`
--

CREATE TABLE IF NOT EXISTS `Times_of_works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Saturday` tinyint(1) NOT NULL DEFAULT '0',
  `Sunday` tinyint(1) NOT NULL DEFAULT '0',
  `Monday` tinyint(1) NOT NULL DEFAULT '0',
  `Tuesday` tinyint(1) NOT NULL DEFAULT '0',
  `Wednesday` tinyint(1) NOT NULL DEFAULT '0',
  `Thursday` tinyint(1) NOT NULL DEFAULT '0',
  `Friday` tinyint(1) NOT NULL DEFAULT '0',
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `Times_of_works`
--

INSERT INTO `Times_of_works` (`id`, `Saturday`, `Sunday`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `from_time`, `to_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, '08:00:00', '20:00:00', '2018-01-29 10:35:34', '2018-03-14 20:17:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
