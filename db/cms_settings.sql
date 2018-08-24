-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 28 يوليو 2018 الساعة 12:36
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
-- بنية الجدول `cms_settings`
--

CREATE TABLE IF NOT EXISTS `cms_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- إرجاع أو استيراد بيانات الجدول `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `created_at`, `updated_at`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `group_setting`, `label`) VALUES
(1, '2018-01-25 14:14:27', NULL, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Background Color'),
(2, '2018-01-25 14:14:27', NULL, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Font Color'),
(3, '2018-01-25 14:14:27', NULL, 'login_background_image', NULL, 'upload_image', NULL, NULL, 'Login Register Style', 'Login Background Image'),
(4, '2018-01-25 14:14:27', NULL, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, 'Email Setting', 'Email Sender'),
(5, '2018-01-25 14:14:27', NULL, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, 'Email Setting', 'Mail Driver'),
(6, '2018-01-25 14:14:27', NULL, 'smtp_host', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Host'),
(7, '2018-01-25 14:14:27', NULL, 'smtp_port', '25', 'text', NULL, 'default 25', 'Email Setting', 'SMTP Port'),
(8, '2018-01-25 14:14:27', NULL, 'smtp_username', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Username'),
(9, '2018-01-25 14:14:27', NULL, 'smtp_password', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Password'),
(10, '2018-01-25 14:14:27', NULL, 'appname', 'alzaiem', 'text', NULL, NULL, 'Application Setting', 'Application Name'),
(11, '2018-01-25 14:14:27', NULL, 'default_paper_size', 'A4', 'text', NULL, 'Paper size, ex : A4, Legal, etc', 'Application Setting', 'Default Paper Print Size'),
(12, '2018-01-25 14:14:27', NULL, 'logo', 'uploads/2018-03/70175f38d60de695c9da28eab59c5cfa.jpg', 'upload_image', NULL, NULL, 'Application Setting', 'Logo'),
(13, '2018-01-25 14:14:27', NULL, 'favicon', NULL, 'upload_image', NULL, NULL, 'Application Setting', 'Favicon'),
(14, '2018-01-25 14:14:27', NULL, 'api_debug_mode', 'true', 'select', 'true,false', NULL, 'Application Setting', 'API Debug Mode'),
(15, '2018-01-25 14:14:27', NULL, 'google_api_key', 'AIzaSyD0ihqaFKBsqynBYlHCaGvoe9UI9bN-6Gg', 'text', NULL, NULL, 'Application Setting', 'Google API Key'),
(16, '2018-01-25 14:14:27', NULL, 'google_fcm_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google FCM Key'),
(17, '2018-01-29 08:59:03', NULL, 'email', 'obaaa8@gmail.com', 'email', '', '', 'Application Setting', 'Email'),
(18, '2018-01-29 08:59:18', '2018-03-05 10:55:32', 'phone', '+249127799120', 'text', '', '+249×××××××××', 'Application Setting', 'Phone'),
(19, '2018-01-29 08:59:37', NULL, 'details', 'null', 'textarea', '', '', 'Application Setting', 'Details'),
(20, '2018-03-03 07:37:09', '2018-03-05 10:55:53', 'location', 'بحري المحطة الوسطى', 'text', '', '', 'Application Setting', 'location'),
(21, '2018-03-03 10:50:39', NULL, 'facebook', 'https://web.facebook.com/groups/124522464233393/', 'text', '', '', 'Application Setting', 'facebook'),
(22, '2018-03-03 10:51:11', NULL, 'youtube', '#', 'text', '', '', 'Application Setting', 'youtube'),
(23, '2018-03-03 10:51:30', NULL, 'twitter', '#', 'text', '', '', 'Application Setting', 'twitter'),
(24, '2018-03-03 10:51:54', NULL, 'google', '#', 'text', '', '', 'Application Setting', 'google+');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
