-- Adminer 4.8.1 MySQL 10.4.21-MariaDB-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `news_portal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `news_portal`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1,	'Ashraful',	'ashraf@gmail.com',	'$2y$10$95sDBlkH4kE7r/DEKuO0ZOY7ka7LB1plEFWrGKA.cfLVIqOj7Orye',	'admin.jpg',	'',	'2023-04-23 13:37:11',	'2023-06-30 03:59:45');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `category_name`, `show_on_menu`, `category_order`, `created_at`, `updated_at`) VALUES
(1,	'Sports',	'show',	'1',	'2023-05-10 14:41:00',	'2023-05-10 15:55:58'),
(2,	'National',	'show',	'2',	'2023-05-10 15:56:21',	'2023-05-10 15:56:21'),
(3,	'Lifestyle',	'show',	'3',	'2023-05-10 15:56:36',	'2023-05-10 15:56:36');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faqs` (`id`, `faq_title`, `faq_detail`, `created_at`, `updated_at`) VALUES
(1,	'Had strictly mrs handsome mistaken cheerful',	'<p><span style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\">Had strictly mrs handsome mistaken cheerful. We it so if resolution invitation remarkably unpleasant conviction. As into ye then form. To easy five less if rose were. Now set offended own out required entirely. Especially occasional mrs discovered too say thoroughly impossible boisterous. My head when real no he high rich at with. After so power of young as. Bore year does has get long fat cold saw neat. Put boy carried chiefly shy general.</span><br style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\"><br style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\"><span style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\">Greatly cottage thought fortune no mention he. Of mr certainty arranging am smallness by conveying. Him plate you allow built grave. Sigh sang nay sex high yet door game. She dissimilar was favourable unreserved nay expression contrasted saw. Past her find she like bore pain open. Shy lose need eyes son not shot. Jennings removing are his eat dashwood. Middleton as pretended listening he smallness perceived. Now his but two green spoil drift.</span><br></p>',	'2023-08-16 16:03:40',	'2023-08-16 16:03:40'),
(2,	'Sigh view am high neat half to what. Sent late held than set why wife our.',	'<p><span style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\">Sigh view am high neat half to what. Sent late held than set why wife our. If an blessing building steepest. Agreement distrusts mrs six affection satisfied. Day blushes visitor end company old prevent chapter. Consider declared out expenses her concerns. No at indulgence conviction particular unsatiable boisterous discretion. Direct enough off others say eldest may exeter she. Possible all ignorant supplied get settling marriage recurred.</span><br></p>',	'2023-08-16 16:04:08',	'2023-08-16 16:04:08'),
(3,	'Tolerably earnestly middleton extremely distrusts she boy now not.',	'<p><span style=\"font-family: verdana, arial, sans-serif; font-size: 14.4px;\">Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may. Wicket do manner others seemed enable rather in. Excellent own discovery unfeeling sweetness questions the gentleman. Chapter shyness matters mr parlors if mention thought.</span><br></p>',	'2023-08-16 16:04:25',	'2023-08-16 16:04:25');

DROP TABLE IF EXISTS `home_advertisements`;
CREATE TABLE `home_advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `above_search_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `above_search_ad_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `above_search_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `above_footer_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `above_footer_ad_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `above_footer_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `home_advertisements` (`id`, `above_search_ad`, `above_search_ad_url`, `above_search_ad_status`, `above_footer_ad`, `above_footer_ad_url`, `above_footer_ad_status`, `created_at`, `updated_at`) VALUES
(1,	'above_search_ad.png',	'abc.com',	'show',	'above_footer_ad.png',	'xyz.org',	'show',	'2023-04-26 16:19:43',	'2023-04-30 16:06:50');

DROP TABLE IF EXISTS `live_channels`;
CREATE TABLE `live_channels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `live_channels` (`id`, `heading`, `video_id`, `created_at`, `updated_at`) VALUES
(1,	'Ekattor TV Live Stream',	'jwiyLF7chno',	'2023-08-25 13:48:13',	'2023-08-25 13:48:13'),
(2,	'SOMOY TV LIVE',	'iencvYwg3iA',	'2023-08-25 13:50:08',	'2023-08-25 13:50:08'),
(4,	'Al Jazeera English | Live',	'gCNeDWCI0vo',	'2023-08-25 13:51:59',	'2023-08-25 14:04:13');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2023_04_23_052155_create_admins_table',	1),
(6,	'2023_04_26_160813_create_home_advertisements_table',	2),
(7,	'2023_04_30_161140_create_top_advertisements_table',	3),
(8,	'2023_05_01_152823_create_sidebar_advertisements_table',	4),
(9,	'2023_05_09_140617_create_categories_table',	5),
(10,	'2023_05_10_160449_create_sub_categories_table',	6),
(13,	'2023_05_12_154528_create_news_posts_table',	7),
(15,	'2023_05_13_034250_create_tags_table',	8),
(16,	'2023_06_01_144638_create_settings_table',	9),
(17,	'2023_07_07_111035_create_photos_table',	10),
(18,	'2023_07_13_155409_create_videos_table',	11),
(19,	'2023_07_23_142221_create_pages_table',	12),
(20,	'2023_08_16_153509_create_faqs_table',	13),
(21,	'2023_08_21_154510_create_subscribers_table',	14),
(22,	'2023_08_24_154724_create_jobs_table',	15),
(24,	'2023_08_25_131017_create_live_channels_table',	16),
(25,	'2023_09_04_044008_create_online_polls_table',	17);

DROP TABLE IF EXISTS `news_posts`;
CREATE TABLE `news_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_category_id` bigint(20) unsigned NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitors` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `is_share` int(11) NOT NULL,
  `is_comment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_posts_sub_category_id_index` (`sub_category_id`),
  CONSTRAINT `news_posts_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `news_posts` (`id`, `sub_category_id`, `post_title`, `post_detail`, `post_photo`, `visitors`, `author_id`, `admin_id`, `is_share`, `is_comment`, `created_at`, `updated_at`) VALUES
(3,	2,	'Cricket Update',	'<p><span style=\"font-size: 14px;\">Cricket Update    </span>Cricket Update   Cricket Update   Cricket Update   Cricket Update   Cricket Updates   <br></p>',	'news_post_1685110462.jpg',	3,	0,	1,	1,	1,	'2023-05-20 13:18:07',	'2023-08-28 14:20:21'),
(5,	5,	'Life Insurance',	'<p><span style=\"font-size: 14px;\">Life Insurance </span>Life Insurance Life Insurance Life Insurance Life Insurance <br></p>',	'news_post_1685288813.png',	4,	0,	1,	1,	1,	'2023-05-26 16:25:40',	'2023-08-31 04:03:41'),
(7,	1,	'Mason Mount: Manchester United agree deal to sign England midfielder from Chelsea',	'<p role=\"introduction\" class=\"qa-introduction gel-pica-bold\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-2\" style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 1.25rem; font-weight: 700; box-sizing: inherit; color: rgb(18, 18, 18); font-family: ReithSans, Arial, Helvetica, freesans, sans-serif;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-2.0\" style=\"box-sizing: inherit;\">Manchester United have agreed a deal to sign England midfielder Mason Mount from Chelsea on a five-year contract for £55m, plus £5m in add-ons.</span></p><div data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3\" style=\"box-sizing: inherit; color: rgb(18, 18, 18); font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 16px;\"><p class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3.0\" style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; padding: 0px; box-sizing: inherit;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3.0.0\" style=\"box-sizing: inherit;\">Mount, 24, will be Erik ten Hag\'s first signing of the summer as he looks to strengthen his side following United\'s qualification for next season\'s Champions League.</span></p><div class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3.1\" style=\"box-sizing: inherit;\"><div id=\"bbccom_mpu_1_2_3\" class=\"bbccom_slot bbccom_standard_slot mpu_first_slot\" aria-hidden=\"true\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3.1.$body-0\" style=\"margin-left: -8px; box-sizing: inherit;\"><div class=\"bbccom_advert\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-3.1.$body-0.0\" style=\"box-sizing: inherit;\"></div></div></div></div><p class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-4\" style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; padding: 0px; box-sizing: inherit; color: rgb(18, 18, 18); font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 16px;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-4.0\" style=\"box-sizing: inherit;\">Chelsea spent £600m last season and needed to sell before 30 June to ease Financial Fair Play concerns.</span></p><p class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-5\" style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; padding: 0px; box-sizing: inherit; color: rgb(18, 18, 18); font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 16px;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-5.0\" style=\"box-sizing: inherit;\">Mount joined Chelsea aged six.</span></p><ul data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6\" style=\"margin-right: 0px; margin-bottom: 1.5rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; line-height: inherit; font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px; vertical-align: baseline; list-style-type: square; box-sizing: inherit; color: rgb(18, 18, 18);\"><li class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-0\" style=\"margin-top: 1rem; margin-left: 20px; padding-left: 4px; box-sizing: inherit;\"><a href=\"https://www.bbc.co.uk/sounds/play/p0fy4cvw\" class=\"story-body__internal-link\" title=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-0.$undefined-link-1\" style=\"color: rgb(18, 18, 18); border-bottom: 1px solid rgb(219, 219, 219); font-weight: 700; box-sizing: inherit;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-0.$undefined-link-1.0\" style=\"box-sizing: inherit;\">Football Daily: Mount to Man Utd &amp; Rice price nice for Arsenal</span></a></li><li class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-1\" style=\"margin-top: 1rem; margin-left: 20px; padding-left: 4px; box-sizing: inherit;\"><a href=\"https://www.bbc.co.uk/sport/football/teams/manchester-united\" class=\"story-body__internal-link\" title=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-1.$undefined-link-1\" style=\"color: rgb(18, 18, 18); border-bottom: 1px solid rgb(219, 219, 219); font-weight: 700; box-sizing: inherit;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-1.$undefined-link-1.0\" style=\"box-sizing: inherit;\">Latest Manchester United news, analysis and fan views</span></a></li><li class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-2\" style=\"margin-top: 1rem; margin-left: 20px; padding-left: 4px; box-sizing: inherit;\"><a href=\"https://www.bbc.co.uk/sport/football/62294536\" class=\"story-body__internal-link\" title=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-2.$undefined-link-1\" style=\"color: rgb(18, 18, 18); border-bottom: 1px solid rgb(219, 219, 219); font-weight: 700; box-sizing: inherit;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-2.$undefined-link-1.0\" style=\"box-sizing: inherit;\">Get Man Utd news notifications</span></a></li><li class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-3\" style=\"margin-top: 1rem; margin-left: 20px; padding-left: 4px; box-sizing: inherit;\"><a href=\"https://www.bbc.co.uk/sounds/brand/p00500pg\" class=\"story-body__internal-link\" title=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-3.$undefined-link-1\" style=\"color: rgb(18, 18, 18); border-bottom: 1px solid rgb(219, 219, 219); font-weight: 700; box-sizing: inherit;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$list-6.$list-item-3.$undefined-link-1.0\" style=\"box-sizing: inherit;\">Listen to the latest The Devils\' Advocate podcast</span></a></li></ul><p class=\"\" data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-7\" style=\"margin-right: 0px; margin-bottom: 24px; margin-left: 0px; padding: 0px; box-sizing: inherit; color: rgb(18, 18, 18); font-family: ReithSans, Arial, Helvetica, freesans, sans-serif; font-size: 16px;\"><span data-reactid=\".1f2wze07dfs.0.0.0.1.$paragraph-7.0\" style=\"box-sizing: inherit;\">Chelsea had rejected United\'s first three bids but talks between the two clubs resumed this week to resolve the impasse.</span></p>',	'news_post_1688098493.jpg',	10,	0,	1,	1,	1,	'2023-06-30 04:14:53',	'2023-08-28 14:26:17'),
(8,	2,	'McGlashan: Lyon injury could yet define this Test',	'<p class=\"ds-text-comfortable-m ds-my-4 ci-html-content\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 16px; line-height: 1.75; --tw-text-opacity: 1; color: rgb(43, 44, 45); font-family: BentonSans, Arial, &quot;Noto Sans&quot;, sans-serif;\"></p><div style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">At around 4.30pm,&nbsp;<a href=\"https://www.espncricinfo.com/cricketers/nathan-lyon-272279\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgba(var(--color-typo-primary),var(--tw-text-opacity)); text-decoration: inherit; --tw-text-opacity: 1; font-family: BentonSans-Medium, Arial, &quot;Noto Sans&quot;, sans-serif;\">Nathan Lyon</a>, playing his 100th consecutive Test, set off to chase a ball towards the Grand Stand boundary. He pulled up and started to limp, a few moments later he was hobbling towards the dressing room. England were 182 for 1 and Australia had, at least for the day, likely the match and maybe even the series, lost a specialist bowler, one with 496 Test wickets to his name. If you wanted any more comparisons to 2005, was this the Glenn McGrath moment?</div><p></p><p class=\"ds-text-comfortable-m ds-my-4 ci-html-content\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 16px; line-height: 1.75; --tw-text-opacity: 1; color: rgb(43, 44, 45); font-family: BentonSans, Arial, &quot;Noto Sans&quot;, sans-serif;\"></p><div style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">It had already been a day where Australia had let slip their grip on the contest. It had started late on the first evening when they handed two wickets to&nbsp;<a href=\"https://www.espncricinfo.com/cricketers/joe-root-303669\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgba(var(--color-typo-primary),var(--tw-text-opacity)); text-decoration: inherit; --tw-text-opacity: 1; font-family: BentonSans-Medium, Arial, &quot;Noto Sans&quot;, sans-serif;\">Joe Root</a>&nbsp;shortly before the second new ball. Although&nbsp;<a href=\"https://www.espncricinfo.com/cricketers/steven-smith-267192\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgba(var(--color-typo-primary),var(--tw-text-opacity)); text-decoration: inherit; --tw-text-opacity: 1; font-family: BentonSans-Medium, Arial, &quot;Noto Sans&quot;, sans-serif;\">Steven Smith</a>&nbsp;crafted a superb century, the slide continued on Thursday morning and in all their last seven wickets fell for 100. From England\'s point of view a total of 416 isn\'t a great result when you\'ve asked a side to bat, but they had not been shut out the way Smith and&nbsp;<a href=\"https://www.espncricinfo.com/cricketers/travis-head-530011\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgba(var(--color-typo-primary),var(--tw-text-opacity)); text-decoration: inherit; --tw-text-opacity: 1; font-family: BentonSans-Medium, Arial, &quot;Noto Sans&quot;, sans-serif;\">Travis Head</a>&nbsp;had threatened to.</div><p></p><p class=\"ds-text-comfortable-m ds-my-4 ci-html-content\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 16px; line-height: 1.75; --tw-text-opacity: 1; color: rgb(43, 44, 45); font-family: BentonSans, Arial, &quot;Noto Sans&quot;, sans-serif;\"></p><div style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\">A few hours later, Lyon was being helped off the field, a fate he had avoided since being recalled midway through the 2013 Ashes - the corresponding fixture on this ground was the last Test he did not play. The sun was breaking through the clouds, the pitch was looking flat, England\'s second-wicket pair of&nbsp;<a href=\"https://www.espncricinfo.com/cricketers/ben-duckett-521637\" style=\"border: 0px solid; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(147 197 253/0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; color: rgba(var(--color-typo-primary),var(--tw-text-opacity)); text-decoration: inherit; --tw-text-opacity: 1; font-family: BentonSans-Medium, Arial, &quot;Noto Sans&quot;, sans-serif;\">Ben Duckett</a>&nbsp;and Ollie Pope had put together 91 in 20 overs at that point and Cameron Green was struggling to keep his foot behind the line.</div><p></p>',	'news_post_1688098626.webp',	10,	0,	1,	1,	1,	'2023-06-30 04:17:06',	'2023-08-28 14:33:24'),
(9,	3,	'২৪ ঘণ্টার মধ্যে কোরবানির বর্জ্য সরানোর আশ্বাস ঢাকার দুই মেয়রের',	'<p class=\"single-artical-content-container-600\" style=\"width: 600px; color: rgb(51, 51, 51); font-family: solaimanlipi; font-size: 20.8px; text-align: justify; margin-right: auto !important; margin-bottom: 0.9375rem !important; margin-left: auto !important;\">তুমুল বৃষ্টির কারণে জলাবদ্ধতার মধ্যেই ঢাকায় পশু কোরবানি করেছেন নগরবাসী। এর ফলে জলাবদ্ধতা ও কোরবানির পশুর বর্জ্যজনিত দুর্ভোগ পোহাতে হবে নগরবাসীকে। এই দুই সমস্যা ২৪ ঘণ্টার মধ্যে সমাধানের আশ্বাস দিয়েছেন ঢাকার দুই মেয়র।</p><p class=\"single-artical-content-container-600\" style=\"width: 600px; color: rgb(51, 51, 51); font-family: solaimanlipi; font-size: 20.8px; text-align: justify; margin-right: auto !important; margin-bottom: 0.9375rem !important; margin-left: auto !important;\">বৃহস্পতিবার&nbsp;(২৯ জুন)&nbsp;সকাল সাড়ে ৭টার দিকে&nbsp;জাতীয় ঈদগাহ ময়দানে ঈদ-উল-আজহার প্রধান জামাত শেষে সাংবাদিকদের&nbsp;সঙ্গে&nbsp;কথা&nbsp;বলার সময় এই আশ্বাস দেন&nbsp;ঢাকা উত্তর ও দক্ষিণ সিটির মেয়র।</p><div class=\"a-d-holder-container\" style=\"color: rgb(51, 51, 51); font-family: solaimanlipi; font-size: 20.8px;\"><p class=\"a-d-text\" style=\"margin-top: 40px; text-align: center; color: rgb(161, 158, 158); font-size: 10px; padding-top: 10px; margin-bottom: 0.4rem !important;\"></p><div class=\"single-page-ad-area static-position-2\" data-ad-id=\"123\" style=\"min-height: 80px; padding: 0px 20px 20px; text-align: center; margin: 0px 0px 40px;\"><a target=\"_blank\" href=\"https://waltonbd.com/air-conditioner/Split-ac\" title=\"static-position-2\" style=\"color: rgb(24, 144, 255); outline: 0px; cursor: pointer; transition-duration: 0.3s; transition-timing-function: ease-in-out; touch-action: manipulation; max-width: 100%; display: block;\"><img alt=\"dt-ad\" src=\"https://new-media.dhakatribune.com/bn/uploads/2023/03/20/300-x-250-5.gif\" style=\"max-width: 100%; position: relative;\"></a></div></div><p class=\"single-artical-content-container-600\" style=\"width: 600px; color: rgb(51, 51, 51); font-family: solaimanlipi; font-size: 20.8px; text-align: justify; margin-right: auto !important; margin-bottom: 0.9375rem !important; margin-left: auto !important;\">দক্ষিণের মেয়র শেখ ফজলে নূর তাপস বলেন, “ঈদের দিনে তৈরি হওয়া বর্জ্য অপসারণে দক্ষিণ সিটির সাড়ে ৩০০ সরঞ্জাম কাজ করবে। আশা করছি,&nbsp;২৪ ঘণ্টার মধ্যে আজ তৈরি হওয়া পশুর বর্জ্য অপসারণ করা সম্ভব হবে।”</p>',	'news_post_1688098773.jpg',	14,	0,	1,	1,	1,	'2023-06-30 04:19:33',	'2023-08-31 04:03:09'),
(10,	5,	'ইউনাইটেড আইগ্যাস এলপিজি ও গ্রীন ডেল্টা ইন্স্যুরেন্সের সাথে চুক্তি স্বাক্ষর',	'<p style=\"font-family: SolaimanLipi, sans-serif; font-size: 20px; padding-bottom: 10px; line-height: 35px; color: rgb(68, 68, 68); text-align: justify;\">গ্রীন ডেল্টা ইন্স্যুরেন্স এবং ইউনাইটেড আইগ্যাস এলপিজি লিমিটেড সম্প্রতি একটি মাইক্রো-হেল্থ চুক্তি স্বাক্ষর করেছে। ইউনাইটেড আয়গাজ এলপিজি লিমিটেডের পরিবেশক, খুচরা বিক্রেতাদের জন্য মাইক্রো-হেল্থ ইন্স্যুরেন্স সুবিধা প্রদান করবে, যার মধ্যে আইপিডি (হাসপাতাল), ওপিডি, মৃত্যু এবং অঙ্গহানির কভারেজ ছাড়াও টেলি-কনসাল্টেশন সেবা অন্তর্ভুক্ত থাকবে।</p><p class=\"contentAds01\" style=\"font-family: SolaimanLipi, sans-serif; font-size: 20px; padding-bottom: 10px; line-height: 35px; color: rgb(68, 68, 68); text-align: justify;\">গ্রীন ডেল্টা ইন্স্যুরেন্সের অতিরিক্ত ব্যবস্থাপনা পরিচালক সৈয়দ মঈনঊদ্দিন আহমেদ এবং ইউনাইটেড আইগ্যাস এলপিজি লিমিটেডের সিইও আহমেদ আর্যুমান পোলাত নিজ নিজ প্রতিষ্ঠানের পক্ষে চুক্তিতে স্বাক্ষর করেন।</p><div class=\"contentAdBlock01\" style=\"background: rgb(253, 253, 253); padding: 0px; margin: 0px; text-align: center;\"><a href=\"https://green-delta.com/\" target=\"_blank\" style=\"color: rgb(68, 68, 68); font-family: SolaimanLipi, sans-serif; display: inline-block;\"><center style=\"padding-bottom: 5px;\"><p class=\"adsTitle01\" style=\"margin-bottom: 0px; font-size: 20px; padding: 10px 0px; line-height: 35px; color: rgb(158, 158, 158);\">বিজ্ঞাপন</p><img class=\"adcontente01\" src=\"https://insurancenewsbd.com/ads/green-delta-insurance_banner03.png\" style=\"max-width: 100%; width: auto; max-height: 100%; min-height: 100%; padding-bottom: 5px; height: 250px;\"></center></a></div><p></p><p style=\"font-family: SolaimanLipi, sans-serif; font-size: 20px; padding-bottom: 10px; line-height: 35px; color: rgb(68, 68, 68); text-align: justify;\">এছাড়াও গ্রীন ডেল্টা ইন্স্যুরেন্সের হেড অফ ডিজিটাল বিজনেস মনিরুজ্জামান খান, ইউনাইটেড আইগ্যাস এলপিজি লিমিটেডের সিএফও হারুন অর্টাজ এবং উভয় প্রতিষ্ঠানের অন্যান্য সংশ্লিষ্ট কর্মকর্তারা ও চুক্তি স্বাক্ষর অনুষ্ঠানে উপস্থিত ছিলেন।</p><p style=\"font-family: SolaimanLipi, sans-serif; font-size: 20px; padding-bottom: 10px; line-height: 35px; color: rgb(68, 68, 68); text-align: justify;\">গ্রীন ডেল্টা ইন্স্যুরেন্সের অতিরিক্ত ব্যবস্থাপনা পরিচালক বলেন, বাংলাদেশের এলপিজি শিল্পে খুচরা বিক্রেতাদের স্বাস্থ্যসেবা নিশ্চিত করতে গৃহীত উদ্যোগ এটিই প্রথম এবং এর অংশ হতে পেরে আমরা সত্যিই উচ্ছ্বসিত। আমরা আশা করি এই উদ্যোগ বাংলাদেশে এলপিজি শিল্পের অংশীদারদের স্বাস্থ্যসেবায় একটি নতুন মাত্রা যোগ করবে এবং বেশ কিছু এসডিজি লক্ষ্য অর্জনে অবদান রাখবে।</p><p style=\"font-family: SolaimanLipi, sans-serif; font-size: 20px; padding-bottom: 10px; line-height: 35px; color: rgb(68, 68, 68); text-align: justify;\">ইউনাইটেড আইগ্যাস এলপিজি লিমিটেডের সিইও বলেন, এই উদ্যোগটি এলপিজি শিল্পে একটি যুগান্তকারী মাইলফলক। কারণ এটি শুধুমাত্র আমাদের কর্মচারীদের নয়, আমাদের সাপ্লাই চেইনের সাথে জড়িত সকল ব্যক্তির স্বাস্থ্যসেবায় অবদান রাখবে।</p>',	'news_post_1688098912.jpg',	27,	0,	1,	1,	1,	'2023-06-30 04:21:52',	'2023-08-28 14:26:01'),
(12,	1,	'Amid Doubts Over PSG Future, Kylian Mbappe Visits Father\'s Native Cameroon',	'<p style=\"-webkit-tap-highlight-color: transparent; color: var(--vj-cl-dr5); font-family: Inter, sans-serif; font-weight: 500; line-height: 24px; margin-bottom: 18px; font-size: 16px; display: inline-block; width: 556.745px;\">France\'s star footballer Kylian Mbappe arrived in Cameroon to an ecstatic welcome from fans Thursday for a visit that includes charity work with deaf children and a trip to his father\'s village.</p><p style=\"-webkit-tap-highlight-color: transparent; color: var(--vj-cl-dr5); font-family: Inter, sans-serif; font-weight: 500; line-height: 24px; margin-bottom: 18px; font-size: 16px; display: inline-block; width: 556.745px;\"><br></p><span style=\"text-align: justify; color: rgba(0, 0, 0, 0.8); font-family: Inter, sans-serif; font-size: 16px;\">France\'s star footballer&nbsp;</span><a href=\"https://sports.ndtv.com/football/players/109633-kylian-mbappe-playerprofile\" title=\"Kylian Mbappe\" style=\"text-align: justify; font-family: Inter, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); -webkit-tap-highlight-color: transparent; color: var(--vj-cl-rg5); cursor: pointer; border-bottom: 2px solid var(--vj-cl-rg8);\">Kylian Mbappe</a><span style=\"text-align: justify; color: rgba(0, 0, 0, 0.8); font-family: Inter, sans-serif; font-size: 16px;\">&nbsp;arrived in Cameroon to an ecstatic welcome from fans Thursday for a visit that includes charity work with deaf children and a trip to his father\'s village. Many among the hundreds who greeted the 24-year-old forward were dressed in his Paris Saint-Germain team\'s football jersey for the occasion. They excitedly screamed his name as he emerged from the airport in the capital Yaounde, according to an AFP journalist. A group of about a hundred traditional dancers performed in his honour.</span>',	'news_post_1688727724.webp',	6,	0,	1,	1,	1,	'2023-07-07 11:02:04',	'2023-08-28 14:19:28');

DROP TABLE IF EXISTS `online_polls`;
CREATE TABLE `online_polls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_vote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disclaimer_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disclaimer_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disclaimer_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `about_title`, `about_detail`, `about_status`, `faq_title`, `faq_detail`, `faq_status`, `contact_title`, `contact_detail`, `contact_status`, `contact_map`, `terms_title`, `terms_detail`, `terms_status`, `privacy_title`, `privacy_detail`, `privacy_status`, `disclaimer_title`, `disclaimer_detail`, `disclaimer_status`, `login_title`, `login_status`, `created_at`, `updated_at`) VALUES
(1,	'About Us',	'<p style=\"color: rgb(33, 37, 41); font-family: \"Maven Pro\", sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: \"Maven Pro\", sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: \"Maven Pro\", sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p style=\"color: rgb(33, 37, 41); font-family: \"Maven Pro\", sans-serif;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>',	'show',	'faq',	'<p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.<br></p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\"><br></p>',	'show',	'Contact Us',	'<span style=\"font-size: 14px;\">Contact Us&nbsp;&nbsp;</span>Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp; Contact Us&nbsp;&nbsp;',	'show',	'<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.3438642679253!2d90.42332290910397!3d23.735114189277585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b843d903b7af%3A0x40161dabae96a795!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1691238192216!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',	'Terms & Conditions',	'<ol><li style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</li><li style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</li><li style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</li><li style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</li></ol>',	'show',	'Privacy Page',	'<p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>',	'show',	'Disclaimer Page',	'<p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p><p maven=\"\" pro\",=\"\" sans-serif;\"=\"\" style=\"color: rgb(33, 37, 41);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic iure delectus, aperiam eius sed suscipit corporis quas, nisi dicta harum excepturi quis est id deserunt a, ipsa autem in distinctio.</p>',	'show',	'Login',	'show',	NULL,	'2023-08-05 12:23:58');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `photos` (`id`, `photo`, `caption`, `created_at`, `updated_at`) VALUES
(1,	'photo_1688752128.jpg',	'computer',	'2023-07-07 14:52:21',	'2023-07-07 17:49:04'),
(2,	'photo_1688741690.jpg',	'football',	'2023-07-07 14:54:50',	'2023-07-07 14:54:50'),
(3,	'photo_1688741735.jpg',	'cricket',	'2023-07-07 14:55:35',	'2023-07-07 14:55:35');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_ticker_total` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_ticker_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `news_ticker_total`, `news_ticker_status`, `video_total`, `video_status`, `created_at`, `updated_at`) VALUES
(1,	'5',	'show',	'5',	'show',	'2023-06-02 05:52:21',	'2023-07-14 18:03:08');

DROP TABLE IF EXISTS `sidebar_advertisements`;
CREATE TABLE `sidebar_advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sidebar_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_ad_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_ad_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sidebar_advertisements` (`id`, `sidebar_ad`, `sidebar_ad_url`, `sidebar_ad_location`, `created_at`, `updated_at`) VALUES
(2,	'sidebar_ad_1683383842.jpg',	'wer.org',	'top',	'2023-05-05 09:32:20',	'2023-05-06 14:37:22'),
(3,	'sidebar_ad_1683383854.jpg',	'ccc.net',	'bottom',	'2023-05-05 09:48:27',	'2023-05-06 14:37:34'),
(5,	'sidebar_ad_1683383928.jpg',	'fruits.com',	'top',	'2023-05-06 14:38:48',	'2023-05-06 14:38:48'),
(6,	'sidebar_ad_1683383993.jpg',	'cricket.net',	'bottom',	'2023-05-06 14:39:53',	'2023-05-07 14:34:18');

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE `subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(5,	'rotonmunsipara@gmail.com',	'',	'active',	'2023-08-22 16:09:10',	'2023-08-22 16:09:28'),
(6,	'david@gmail.com',	'',	'active',	'2023-08-22 16:10:08',	'2023-08-22 16:10:45'),
(7,	'jamil@gmail.com',	'',	'active',	'2023-08-22 16:14:44',	'2023-08-22 16:15:00'),
(8,	'ashraf@gmail.com',	'',	'active',	'2023-08-22 16:16:55',	'2023-08-22 16:17:15');

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_home_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `sub_category_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sub_categories` (`id`, `sub_category_name`, `show_on_menu`, `show_on_home_page`, `sub_category_order`, `category_id`, `created_at`, `updated_at`) VALUES
(1,	'Football',	'show',	'show',	'1',	1,	'2023-05-12 13:26:44',	'2023-05-12 14:17:27'),
(2,	'Cricket',	'show',	'show',	'2',	1,	'2023-05-12 13:27:21',	'2023-05-12 14:17:33'),
(3,	'Dhaka',	'show',	'show',	'1',	2,	'2023-05-12 13:29:27',	'2023-06-09 05:26:39'),
(4,	'Khulna',	'show',	'show',	'2',	2,	'2023-05-12 13:29:39',	'2023-05-12 13:29:39'),
(5,	'Insurance',	'show',	'show',	'1',	3,	'2023-05-12 13:30:03',	'2023-05-12 13:30:03'),
(6,	'Habits',	'show',	'show',	'2',	3,	'2023-05-12 13:30:20',	'2023-05-12 14:22:21');

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_post_id_index` (`post_id`),
  CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `news_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tags` (`id`, `post_id`, `tag_name`, `created_at`, `updated_at`) VALUES
(5,	3,	'domestic',	'2023-05-20 13:18:07',	'2023-05-20 13:18:07'),
(6,	3,	'international',	'2023-05-20 13:18:07',	'2023-05-20 13:18:07'),
(20,	3,	'league',	'2023-05-26 15:46:19',	'2023-05-26 15:46:19'),
(21,	3,	'leagues',	'2023-05-26 15:47:31',	'2023-05-26 15:47:31'),
(25,	5,	'life',	'2023-05-26 16:25:40',	'2023-05-26 16:25:40'),
(26,	5,	'insurance',	'2023-05-26 16:25:40',	'2023-05-26 16:25:40'),
(27,	5,	'benefit',	'2023-05-26 16:25:40',	'2023-05-26 16:25:40'),
(31,	7,	'football',	'2023-06-30 04:14:53',	'2023-06-30 04:14:53'),
(32,	7,	'MU',	'2023-06-30 04:14:53',	'2023-06-30 04:14:53'),
(33,	7,	'chelsea',	'2023-06-30 04:14:53',	'2023-06-30 04:14:53'),
(34,	8,	'cricket',	'2023-06-30 04:17:06',	'2023-06-30 04:17:06'),
(35,	8,	'aus',	'2023-06-30 04:17:06',	'2023-06-30 04:17:06'),
(36,	8,	'eng',	'2023-06-30 04:17:06',	'2023-06-30 04:17:06'),
(37,	9,	'dhaka',	'2023-06-30 04:19:33',	'2023-06-30 04:19:33'),
(38,	9,	'korbani',	'2023-06-30 04:19:33',	'2023-06-30 04:19:33'),
(39,	10,	'bima',	'2023-06-30 04:21:52',	'2023-06-30 04:21:52'),
(40,	10,	'insurance',	'2023-06-30 04:21:52',	'2023-06-30 04:21:52'),
(44,	12,	'Kylian',	'2023-07-07 11:02:04',	'2023-07-07 11:02:04'),
(45,	12,	'football',	'2023-07-07 11:02:04',	'2023-07-07 11:02:04'),
(46,	12,	'france',	'2023-07-07 11:02:04',	'2023-07-07 11:02:04');

DROP TABLE IF EXISTS `top_advertisements`;
CREATE TABLE `top_advertisements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `top_search_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_search_ad_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_search_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `top_advertisements` (`id`, `top_search_ad`, `top_search_ad_url`, `top_search_ad_status`, `created_at`, `updated_at`) VALUES
(1,	'top_search_ad.png',	'aaa.net',	'show',	'2023-04-30 16:25:58',	'2023-05-07 14:10:21');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `videos` (`id`, `video_id`, `caption`, `created_at`, `updated_at`) VALUES
(1,	'lzMdBEtAz2U',	'একনজরে বিশ্বের আলোচিত সব খবর |Jamuna  i-Desk | 14 July 2023 | Jamuna TV',	'2023-07-14 14:27:53',	'2023-07-14 14:34:49'),
(2,	'EQSrRbcln3g',	'1 in a Trillion Moments',	'2023-07-14 14:36:20',	'2023-07-21 12:44:09'),
(3,	'iW2YvdDZ0fw',	'Highlights | HD | Bangladesh vs India | 2nd ODI | Cricket | T Sports',	'2023-07-14 14:37:06',	'2023-07-14 14:37:06'),
(4,	'b7FNvq11CEw',	'25 Best Places to Visit in the USA - Travel Video',	'2023-07-14 14:38:33',	'2023-07-14 14:38:33'),
(5,	'N7zi7s_y7Mc',	'Video marketing explained from start to finish',	'2023-07-14 14:40:26',	'2023-07-14 14:40:26'),
(6,	'uv87Sa8JP20',	'Small Business Idea',	'2023-07-14 14:41:23',	'2023-07-14 14:41:23');

-- 2024-01-01 09:41:24
