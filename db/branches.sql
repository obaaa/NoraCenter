-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 26 يوليو 2018 الساعة 00:13
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
-- بنية الجدول `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `branches`
--

INSERT INTO `branches` (`id`, `name`, `location`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'فرع السوق العربي', 'الخرطوم - السوق العربي - شمال عمارة الإمارات - شمال غرب موقف جبرة القديم - جنوب مول الواحة بي شارعين', 'aaalbhrawy@mail.com', 129929729, '2018-01-26 07:01:05', '2018-03-14 20:28:09'),
(2, 'الرئاسة فرع المحطة الوسطى', 'الخرطوم بحري - المحطة الوسطى - غرب مصرف المزارع التجاري', 'aalbhrawy@mail.com', 128799120, '2018-01-30 12:51:42', '2018-03-14 20:25:53'),
(3, 'فرع بحري - احمد قاسم', 'الخرطوم بحري - شمال مستشفى احمد  قاسم', 'ah.oa@hotmail.com', 922702470, '2018-03-10 15:32:35', '2018-07-10 15:05:47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
