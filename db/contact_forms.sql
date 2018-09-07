-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 01 سبتمبر 2018 الساعة 16:43
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
-- بنية الجدول `contact_forms`
--

CREATE TABLE IF NOT EXISTS `contact_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=65 ;

--
-- إرجاع أو استيراد بيانات الجدول `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `name`, `email`, `subject`, `contact_message`, `created_at`, `updated_at`) VALUES
(4, 'عبدالرحمن علي', 'abody199111@gmail.com', 'بحري المحطة الوسطى', 'السلام عليكم ورحمة الله و بركاته \r\nوبعد :', '2018-03-10 13:22:53', NULL),
(6, 'Someone', '0968197700@mail.com', 'Complaining', 'Am happy for your new programs thanks for addition good lack', '2018-03-18 17:54:05', NULL),
(7, 'سماح المصري', 'samahasim@yahoo.com', 'شرق النيل', 'نرجو من سيادة المدير صيانة تكيف القاعة 2انجليزي', '2018-03-18 23:32:52', NULL),
(10, 'مريم عبد الله محمد عبد الجبار', '0903817995@gmail.com', 'السامراب شمال', 'دراسة حديثة في الزعيم', '2018-03-21 17:38:37', NULL),
(11, 'مريم عبد الله محمد عبد الجبار', '0903817995@gmail.com', 'السامراب شمال', 'دراسة حديثة في الزعيم', '2018-03-21 17:38:38', NULL),
(16, 'مريم عبد الله محمد عبد الجبار', '0903817995@gmail.com', 'السامراب شمال', 'مشاركه صوره', '2018-03-24 17:21:43', NULL),
(17, 'محمد يحي حاج عمر', '0124070266', 'السامراب بحري', 'نحب نتعلم  من  يااحل زعيم', '2018-03-28 10:05:18', NULL),
(20, 'عادل سيداحمد الشفيع', 'adelwarag@gmail.com', 'رئيس قسم التدريب / شركة جياد للصناعات الحديدية', 'نرغب صادقين فى مد جسور التعاون بيننا فى شركة جياد للصناعات الحديدية وبينكم .....', '2018-04-28 13:37:07', NULL),
(21, 'Abeer', 'Hmoodymoawia@gmail.com', 'شرق النيل', 'تمام', '2018-05-15 11:06:10', NULL),
(22, 'عبدالله علي عبدالله', 'aa7416904@gmail.com', 'شكوي', 'الصورة الشخصية مابتتحمل معاي لاني عاوز اقدم للشهادة ومكان تقديم الشهادة ماظهر معاي حتي . بتمني يكون في استجابة ورد سريع ورمضان كريم', '2018-05-17 18:11:32', NULL),
(24, 'حسن صباح', 'alahoosany2022@gmail.com', 'بحري الحاج يوسف', 'هل البوم اول محاضرة في الرخصة الدوليه الساعه 12ظهرا ان شالله', '2018-05-21 04:03:34', NULL),
(25, 'حسن صباح', 'alahoosany2022@gmail.com', 'بحري الحاج يوسف', 'هل البوم اول محاضرة في الرخصة الدوليه الساعه 12ظهرا ان شالله', '2018-05-21 04:04:04', NULL),
(26, 'advokatClirm', 'glyctimanri1970@beget.com', 'Юрист в Нижнем Новгороде', '<a href=http://ukzakon.ru> Составление претензий, исков и иных процессуальных документов </a>        - <a href=http://ukzakon.ru>ukzakon.ru</a>', '2018-05-23 20:07:35', NULL),
(27, 'احمد ابراهيم عثمان ابراهيم', 'bagura1985@gmail.com', 'امدرمان', 'رمضان كريم عليكم اول مره اسجل عبر موقعكم متميز جدااعانكم الله للامام ان شاء الله', '2018-05-25 20:57:39', NULL),
(28, 'Enas', 'nosa2441991@gmail.com', 'مقترح', 'السلام عليكم. . ياريت تعملو كورس لغه فرنسيه في فر بحري )مجاني( اذا موجود ياريت تبلغوني على الرقم 0123602866 و شكرا ليكم و فيد ميزان حسناتكم ?', '2018-06-14 14:11:07', NULL),
(29, 'test message', 'obaaa8@gmail.com', 'test', 'تجربة إستلام،إشعارات عند إرسال رسالة. تواصل جديدة.', '2018-06-25 13:17:24', NULL),
(30, 'test', 'obaaa8@gmail.com', 'test', 'تجربة إستلام،إشعارات عند إرسال رسالة. تواصل جديدة.', '2018-06-25 13:28:41', NULL),
(31, 'test', 'obaaa8@gmail.com', 'test', 'تجربة إستلام،إشعارات عند إرسال رسالة. تواصل جديدة.', '2018-06-25 13:29:36', NULL),
(32, 'test', 'obaaa8@gmail.com', 'test', 'تجربة إستلام،إشعارات عند إرسال رسالة. تواصل جديدة.', '2018-06-25 13:30:07', NULL),
(33, 'test', 'obaaa8@gmail.com', 'test', 'تجربة إستلام،إشعارات عند إرسال رسالة. تواصل جديدة.', '2018-06-25 13:32:34', NULL),
(34, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 13:44:31', NULL),
(35, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 13:45:27', NULL),
(36, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 13:47:35', NULL),
(37, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 14:17:35', NULL),
(38, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 14:18:35', NULL),
(39, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 14:20:29', NULL),
(40, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 14:20:43', NULL),
(41, 'test', 'obaaa8@gmail.com', 'test', 'testtest', '2018-06-25 14:21:01', NULL),
(42, 'عبدالله عبداللطيف على موسي', 'bdalltyfbdallh34@gmail.com', 'الخرطوم', 'المبلغ المتبقي 150 عباره عن شنو انا مسجل في الدورات المجانيه', '2018-06-29 20:19:31', NULL),
(43, 'عبدالله عبداللطيف على موسي', 'bdalltyfbdallh34@gmail.com', 'الخرطوم', 'المبلغ المتبقي 150 عباره عن شنو انا مسجل في الدورات المجانيه', '2018-06-29 20:20:54', NULL),
(44, 'ريهام معاوية', 'rehaym240@gmail.com', 'بحري', 'لغة الانجليزية المستوى الرابع متين', '2018-07-01 21:43:26', NULL),
(45, 'Moody Rasta', 'moodyhinde@gmail.com', 'Programmer', 'BAHRI_shambat', '2018-07-03 01:36:38', NULL),
(46, 'Randy', 'Randy@TalkWithLead.com', 'Concerning alzaiem.net', 'Hi,\n\nMy name is Randy and I was looking at a few different sites online and came across your site alzaiem.net.  I must say - your website is very impressive.  I found your website on the first page of the Search Engine. \n\nHave you noticed that 70 percent of visitors who leave your website will never return?  In most cases, this means that 95 percent to 98 percent of your marketing efforts are going to waste, not to mention that you are losing more money in customer acquisition costs than you need to.\n \nAs a business person, the time and money you put into your marketing efforts is extremely valuable.  So why let it go to waste?  Our users have seen staggering improvements in conversions with insane growths of 150 percent going upwards of 785 percent. Are you ready to unlock the highest conversion revenue from each of your website visitors?  \n\nTalkWithLead is a widget which captures a website visitor’s Name, Email address and Phone Number and then calls you immediately, so that you can talk to the Lead exactly when they are live on your website — while they''re hot!\n  \nTry the TalkWithLead Live Demo now to see exactly how it works.  Visit: https://www.talkwithlead.com/Contents/LiveDemo.aspx\n\nWhen targeting leads, speed is essential - there is a 100x decrease in Leads when a Lead is contacted within 30 minutes vs being contacted within 5 minutes.\n\nIf you would like to talk to me about this service, please give me a call.  We do offer a 30 days free trial.  \n\nThanks and Best Regards,\nRandy', '2018-07-05 02:03:46', NULL),
(47, 'ProgonClirm', 'torjuncconsstar1996@plusgmail.ru', 'Регистрация сайта в каталогах', 'http://xrumer.su/ - Регистрация сайта  в каталогах http://xrumer.su/ - xrumer.su', '2018-07-13 06:02:40', NULL),
(48, 'TimothyLiach', 'tiohumrare1972@plusgmail.ru', 'пеноблоки', 'газосиликат \r\n \r\n<a href=http://gazobeton-smolensk.portalsnab.ru>газосиликат</a>', '2018-07-18 23:23:26', NULL),
(49, 'ProgonClirm', 'torjuncconsstar1996@plusgmail.ru', 'Регистрация сайта в каталогах', 'http://xrumer.su/ - Регистрация сайта  в каталогах http://xrumer.su/ - xrumer.su', '2018-07-23 19:04:17', NULL),
(50, 'ريان يعقوب عمر', '0968010200@mail.com', 'الحاج يوسف', 'مجموعه محاسبة إسماك اليوم شغالين ولا لا', '2018-07-25 04:42:41', NULL),
(51, 'عبدالرحمن', '0900520131@mail.com', 'استفسار', 'سلام عليكم ..ظاهر معاي في حسابي انو متبقي علي ١٥٠٠ ف حين انا مسدد رسووم الكورس كاامل وحتي استلمت الشهاده', '2018-07-27 12:29:55', NULL),
(52, 'عبد الرحمن اسماعيل النور الزم', 'abdoismail229@gmail.com', 'الصالحة', 'بالنسبة للصورة البتكون علي الشهادة بتمني تكون. فتوغرافية وبعد الشهادة تطلع تتلصق الصورة بـ نوكرين او سيلسيون', '2018-07-30 11:56:16', NULL),
(53, 'مروة صالح', 'marwa011317@mail.com', 'بحري', 'السلام عليكم بسال من الدراسة بتبدا متين والمواعيد', '2018-07-31 18:14:06', NULL),
(54, 'pavingClirm', 'stroy@plusgmail.ru', 'Брусчатка в Нижнем Новгороде', 'http://rsk-nn.ru - благоустройство   - подробнее на сайте http://rsk-nn.ru - rsk-nn.ru', '2018-08-03 00:30:10', NULL),
(55, 'MagClirm', 'sergei-soyuz-magov-rossii@mail.ru', 'СОЮЗ МАГОВ РОССИИ', 'Официальный сайт по борьбе с магами-шарлатанами https://soyuz-magov-rossii.com - СОЮЗ МАГОВ РОССИИ - подробнее читайте на сайте https://soyuz-magov-rossii.com - soyuz-magov-rossii.com', '2018-08-12 22:08:55', NULL),
(56, 'JackssPal', 'ilomark@op.pl', 'www.0daymusic.org', 'Hello. \r\n \r\nDownloads music club Dj''s, mp3 private server. \r\n \r\nPrivate FTP Music/Albums/mp3 1990-2018: \r\nPlan A: 20 EUR - 200GB - 30 Days \r\nPlan B: 45 EUR - 600GB - 90 Days \r\nPlan C: 80 EUR - 1500GB - 180 Days \r\n \r\nBest Regards, \r\nRobert', '2018-08-13 02:08:26', NULL),
(57, 'Randy', 'Randy@TalkWithLead.com', 'Concerning alzaiem.net', 'Hi,\r\n\r\nMy name is Randy and I was looking at a few different sites online and came across your site alzaiem.net.  I must say - your website is very impressive.  I found your website on the first page of the Search Engine. \r\n\r\nHave you noticed that 70 percent of visitors who leave your website will never return?  In most cases, this means that 95 percent to 98 percent of your marketing efforts are going to waste, not to mention that you are losing more money in customer acquisition costs than you need to.\r\n \r\nAs a business person, the time and money you put into your marketing efforts is extremely valuable.  So why let it go to waste?  Our users have seen staggering improvements in conversions with insane growths of 150 percent going upwards of 785 percent. Are you ready to unlock the highest conversion revenue from each of your website visitors?  \r\n\r\nTalkWithLead is a widget which captures a website visitor’s Name, Email address and Phone Number and then calls you immediately, so that you can talk to the Lead exactly when they are live on your website — while they''re hot!\r\n  \r\nTry the TalkWithLead Live Demo now to see exactly how it works.  Visit: https://www.talkwithlead.com/Contents/LiveDemo.aspx\r\n\r\nWhen targeting leads, speed is essential - there is a 100x decrease in Leads when a Lead is contacted within 30 minutes vs being contacted within 5 minutes.\r\n\r\nIf you would like to talk to me about this service, please give me a call.  We do offer a 14 days free trial.  \r\n\r\nThanks and Best Regards,\r\nRandy', '2018-08-13 08:33:19', NULL),
(58, 'MagClirm', 'sergei-soyuz-magov-rossii@mail.ru', 'СОЮЗ МАГОВ РОССИИ', 'Официальный сайт по борьбе с магами-шарлатанами https://soyuz-magov-rossii.com - СОЮЗ МАГОВ РОССИИ - подробнее читайте на сайте https://soyuz-magov-rossii.com - soyuz-magov-rossii.com', '2018-08-18 08:27:41', NULL),
(59, 'Khadija', 'khadIJAABDALNOUR96@GMAIL.COM', '', 'السلام عليكم .. عايزه اعرف الكورسات الحتكون في خلال شهر 9 مع التفاصيل', '2018-08-23 09:39:19', NULL),
(60, 'MagClirm', 'sergei-soyuz-magov-rossii@mail.ru', 'СОЮЗ МАГОВ РОССИИ', 'Официальный сайт по борьбе с магами-шарлатанами https://soyuz-magov-rossii.com - СОЮЗ МАГОВ РОССИИ - подробнее читайте на сайте https://soyuz-magov-rossii.com - soyuz-magov-rossii.com', '2018-08-25 09:08:40', NULL),
(61, 'Alyaa Awad Mohammed Elbadawi', 'alyaaawad26@gmail.com', 'changing the branch', 'I want to change the branch into alsouq alaraby', '2018-08-26 13:39:49', NULL),
(62, 'Alyaa Awad Mohammed Elbadawi', 'alyaaawad26@gmail.com', 'changing the branch', 'I want to change the branch into alsouq alaraby', '2018-08-26 13:51:24', NULL),
(63, 'عمار عبد الفتاح محمد علب', '0923332442@mail.com', 'شهاده كويك بكس', 'شهاده', '2018-08-28 10:57:03', NULL),
(64, 'Arthurrails', 'telyatewwsewolod@mail.ru', 'Indian Sexy Video Tube Girl', 'Arab Sex Video 3gp Download. Sex 3gp Arab. Www Sex Df6 Org Com.  3gp Indian Sex Mms Free Download. Xxx Madhuri Video. Porn Sex India Video.  Indian Schoolgirl Sex Tube. Raping Video Free Download. Rape Sex Videos Download. Sweet Boobs Tube. Nude Katrina Sexy. Sara Meow Porn. \r\n<a href=http://www.talbotcompany.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Indian Sexy Video Tube Girl </a>\r\n<a href=http://disastermedicine.net/__media__/js/netsoltrademark.php?d=www.jarab.tv>Indian Masala Sex </a>\r\n<a href=http://www.campusmall.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Xnxxmalaysia.  </a>\r\n<a href=http://www.hititskor.net/__media__/js/netsoltrademark.php?d=www.jarab.tv>Sex Mms India Free </a>\r\n<a href=http://mintopolis.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Indian Masala Sex </a>\r\n<a href=http://statetimes.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Sinhala Sex Girls</a>\r\n<a href=http://false-teeth.ru/bitrix/rk.php?goto=https://www.jarab.tv/>Free Desi Mms Sites</a>\r\n<a href=http://api.militaryspot.com/meta/go.php?url=https://www.jarab.tv/>Sl Porn</a>\r\n<a href=http://www.pdxparking.net/__media__/js/netsoltrademark.php?d=www.jarab.tv>Porn Full Movie In Hindi</a>\r\n<a href=http://www.dairy-food.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Download Free Sex Asian</a>\r\n<a href=http://www.payam.net/__media__/js/netsoltrademark.php?d=www.jarab.tv>Rape Sex Videos Download </a>\r\n<a href=http://www.endlessshores.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>First Time Sex</a>\r\n<a href=http://www.4hansens.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Sinhala Sex Girls</a>\r\n<a href=http://tallcotten.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Secret Girl Porn</a>\r\n<a href=http://www.uel.br/portal/frm/frmOpcao.php?opcao=http://www.jarab.tv/>Mms Leaked Scandals</a>\r\n<a href=http://www.adelaideenergy.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Adult South Indian Movies</a>\r\n<a href=http://www.zahay.biz/__media__/js/netsoltrademark.php?d=www.jarab.tv>Sex Video Indian Teen</a>\r\n<a href=http://www.videolinkondemand.net/__media__/js/netsoltrademark.php?d=www.jarab.tv>Arabic Porn 3gp</a>\r\n<a href=http://verigov.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Xvideo Indian Actress</a>\r\n<a href=http://justsoftballs.com/__media__/js/netsoltrademark.php?d=www.jarab.tv>Xvideo Indian Actress</a>', '2018-08-30 17:46:38', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
