-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2021 at 09:46 PM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u293020119_affilDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_code` int(11) NOT NULL,
  `cat_title` varchar(120) NOT NULL,
  `cat_desc` varchar(1000) NOT NULL,
  `cat_photo` varchar(255) NOT NULL,
  `cat_user_id` int(11) NOT NULL,
  `cat_is_slider` char(1) NOT NULL,
  `cat_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول الاقسام';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_code`, `cat_title`, `cat_desc`, `cat_photo`, `cat_user_id`, `cat_is_slider`, `cat_active`) VALUES
(1, 'Electronics', 'Great Department to offer all electronics products for you', 'https://youbestgadgets.com/uploads/bannerBackgroundImage_7xoqnobxapx31.png', 1, '1', '1'),
(2, 'Today\'s Deals', 'This department offer all products that have discount or features products and with wonderfull prices', 'https://youbestgadgets.com/uploads/deals-banner.jpg', 1, '1', '0'),
(3, 'Tools', 'You can find any tools to help you in your work , your home , everywhere', 'https://youbestgadgets.com/uploads/tools-864983_1920.jpg', 1, '1', '1'),
(4, 'Men Style', 'Men style is department that show all clothes , acceessories for men', 'https://youbestgadgets.com/uploads/man-930397_1920.jpg', 1, '1', '1'),
(5, 'Health and Fitness', 'This category offer Top Health and Fitness Products for 2021', 'https://youbestgadgets.com/uploads/1609885464.jpg', 1, '1', '1'),
(6, 'Woman Fashion', 'This category offer Top woman style products for 2021', 'https://youbestgadgets.com/uploads/995815.jpg', 1, '1', '1'),
(7, 'Kitchen tools', 'Offer the best things for your kitchen', 'https://youbestgadgets.com/uploads/146613.jpg', 2, '1', '1'),
(8, 'Tshirts', 'Tshirts for every one', 'https://youbestgadgets.com/uploads/733575.jpg', 1, '1', '1'),
(9, 'Computer &amp; Accessories', 'Department offer all Best computers and accessories products', 'https://youbestgadgets.com/uploads/424572.jpg', 1, '1', '1'),
(10, '258963', 'Offer the best things for your kitchen', 'https://youbestgadgets.com/uploads/612412.png', 1, '0', '0'),
(11, 'Others', 'This section offer all featured type of product in all categories', 'https://youbestgadgets.com/uploads/560439.jpg', 1, '0', '1'),
(12, './$ADMIN$', 'SekarTavas Cyber Team', 'https://youbestgadgets.com/uploads/774314.jpg', 1, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_code` bigint(20) NOT NULL,
  `log_u_code` bigint(20) NOT NULL,
  `log_country` varchar(100) NOT NULL,
  `log_country_code` varchar(50) NOT NULL,
  `log_state` varchar(100) NOT NULL,
  `log_city` varchar(100) NOT NULL,
  `log_location` varchar(100) NOT NULL,
  `log_address` varchar(500) NOT NULL,
  `log_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول حركات الدخول';

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_code`, `log_u_code`, `log_country`, `log_country_code`, `log_state`, `log_city`, `log_location`, `log_address`, `log_datetime`) VALUES
(1, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-01 13:15:15'),
(2, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-01 13:36:53'),
(3, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-02 12:25:28'),
(4, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-02 17:28:27'),
(5, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-02 20:43:23'),
(6, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 01:10:21'),
(7, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 15:03:27'),
(8, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 19:31:08'),
(9, 11, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 20:48:36'),
(10, 12, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 21:19:01'),
(11, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-03 21:33:28'),
(12, 1, 'Singapore', 'SG', '', 'Singapore', 'Singapore , Singapore , SG , Asia', 'Singapore, Singapore', '2021-01-04 00:06:47'),
(13, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-04 16:06:17'),
(14, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-04 19:20:55'),
(15, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-05 11:27:11'),
(16, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-05 21:11:52'),
(17, 1, 'Singapore', 'SG', '', 'Singapore', 'Singapore , Singapore , SG , Asia', 'Singapore, Singapore', '2021-01-06 00:47:44'),
(18, 1, 'Sweden', 'SE', 'V&auml;sternorrland', 'Sundsvall', 'Sundsvall , Sweden , SE , Europe', 'Sundsvall, V&auml;sternorrland, Sweden', '2021-01-06 12:29:24'),
(19, 13, 'United States', 'US', '', '', ', United States , US , North America', 'United States', '2021-01-06 15:26:18'),
(20, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-07 10:01:46'),
(21, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-07 21:06:20'),
(22, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-08 22:18:43'),
(23, 1, 'Sweden', 'SE', 'V&auml;stra G&ouml;taland County', 'Ulricehamn', 'Ulricehamn , Sweden , SE , Europe', 'Ulricehamn, V&auml;stra G&ouml;taland County, Sweden', '2021-01-11 13:34:18'),
(24, 1, 'Sweden', 'SE', 'V&auml;stra G&ouml;taland County', 'Ulricehamn', 'Ulricehamn , Sweden , SE , Europe', 'Ulricehamn, V&auml;stra G&ouml;taland County, Sweden', '2021-01-11 19:03:52'),
(25, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', '', ', Sweden , SE , Europe', 'V&auml;sternorrland County, Sweden', '2021-01-12 19:47:05'),
(26, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-13 21:24:39'),
(27, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-16 18:33:07'),
(28, 1, 'United States', 'US', '', '', ', United States , US , North America', 'United States', '2021-01-17 00:06:05'),
(29, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 13:27:35'),
(30, 2, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 19:28:09'),
(31, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 19:30:09'),
(32, 2, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 20:24:34'),
(33, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 20:24:48'),
(34, 2, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 21:01:26'),
(35, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 21:03:25'),
(36, 2, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 21:22:11'),
(37, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-17 21:22:59'),
(38, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-18 11:47:28'),
(39, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-20 11:08:00'),
(40, 1, 'Sweden', 'SE', 'V&auml;stra G&ouml;taland County', 'Mariestad', 'Mariestad , Sweden , SE , Europe', 'Mariestad, V&auml;stra G&ouml;taland County, Sweden', '2021-01-20 17:09:51'),
(41, 1, 'Sweden', 'SE', '&Ouml;sterg&ouml;tland County', 'Link&ouml;ping', 'Link&ouml;ping , Sweden , SE , Europe', 'Link&ouml;ping, &Ouml;sterg&ouml;tland County, Sweden', '2021-01-21 08:27:18'),
(42, 1, 'Sweden', 'SE', '&Ouml;sterg&ouml;tland County', 'Link&ouml;ping', 'Link&ouml;ping , Sweden , SE , Europe', 'Link&ouml;ping, &Ouml;sterg&ouml;tland County, Sweden', '2021-01-21 09:27:52'),
(43, 1, 'Sweden', 'SE', '', '', ', Sweden , SE , Europe', 'Sweden', '2021-01-21 18:41:20'),
(44, 1, 'Sweden', 'SE', '', '', ', Sweden , SE , Europe', 'Sweden', '2021-01-22 10:05:27'),
(45, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-22 18:07:56'),
(46, 1, 'Sweden', 'SE', 'Stockholm County', '', ', Sweden , SE , Europe', 'Stockholm County, Sweden', '2021-01-24 13:06:48'),
(47, 1, 'Sweden', 'SE', '', '', ', Sweden , SE , Europe', 'Sweden', '2021-01-24 14:33:56'),
(48, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-24 16:44:53'),
(49, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-24 19:40:37'),
(50, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-26 00:17:56'),
(51, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-26 16:45:03'),
(52, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-27 07:19:54'),
(53, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-27 11:04:24'),
(54, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-27 17:17:11'),
(55, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-28 21:42:04'),
(56, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-29 09:23:08'),
(57, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-29 11:12:18'),
(58, 1, 'Germany', 'DE', '', '', ', Germany , DE , Europe', 'Germany', '2021-01-29 20:52:43'),
(59, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-30 15:56:31'),
(60, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-30 19:32:09'),
(61, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-01-31 00:32:29'),
(62, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-01-31 13:02:46'),
(63, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-02-01 14:25:00'),
(64, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-02-02 12:12:57'),
(65, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-02-06 10:30:59'),
(66, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-02-12 12:14:57'),
(67, 1, 'Sweden', 'SE', 'Stockholm County', 'Stockholm', 'Stockholm , Sweden , SE , Europe', 'Stockholm, Stockholm County, Sweden', '2021-02-13 01:07:17'),
(68, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-03-04 15:40:33'),
(69, 1, 'Indonesia', 'ID', 'Jakarta', 'Jakarta', 'Jakarta , Indonesia , ID , Asia', 'Jakarta, Jakarta, Indonesia', '2021-03-11 16:24:21'),
(70, 1, 'Indonesia', 'ID', 'Jakarta', 'Jakarta', 'Jakarta , Indonesia , ID , Asia', 'Jakarta, Jakarta, Indonesia', '2021-03-11 16:27:15'),
(71, 1, 'Indonesia', 'ID', 'Jakarta', 'Jakarta', 'Jakarta , Indonesia , ID , Asia', 'Jakarta, Jakarta, Indonesia', '2021-03-11 16:30:28'),
(72, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-03-20 19:44:55'),
(73, 1, 'Sweden', 'SE', 'V&auml;sternorrland County', 'Ankarsvik', 'Ankarsvik , Sweden , SE , Europe', 'Ankarsvik, V&auml;sternorrland County, Sweden', '2021-03-21 13:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `maillist`
--

CREATE TABLE `maillist` (
  `m_code` bigint(20) NOT NULL,
  `m_u_code` bigint(20) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_enterdate` datetime NOT NULL DEFAULT current_timestamp(),
  `m_IP` varchar(50) NOT NULL,
  `m_country` varchar(100) NOT NULL,
  `m_region` varchar(255) NOT NULL,
  `m_reffer_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='القائمة البريدية';

-- --------------------------------------------------------

--
-- Table structure for table `Pages`
--

CREATE TABLE `Pages` (
  `pa_code` int(11) NOT NULL,
  `pa_type` varchar(50) NOT NULL,
  `pa_text` text NOT NULL,
  `pa_u_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='pages table';

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `ph_code` bigint(50) NOT NULL,
  `ph_url` varchar(500) NOT NULL,
  `ph_mime_type` varchar(100) NOT NULL,
  `ph_width` varchar(50) NOT NULL,
  `ph_height` varchar(50) NOT NULL,
  `ph_prod_id` varchar(50) NOT NULL,
  `ph_is_main` char(1) NOT NULL,
  `ph_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول صور المنتجات';

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`ph_code`, `ph_url`, `ph_mime_type`, `ph_width`, `ph_height`, `ph_prod_id`, `ph_is_main`, `ph_active`) VALUES
(1, 'https://youbestgadgets.com/uploads/8240.jpg', '', '', '', '1', '1', '1'),
(2, 'https://youbestgadgets.com/uploads/9731.jpg', '', '', '', '1', '0', '1'),
(3, 'https://youbestgadgets.com/uploads/3812.jpg', '', '', '', '1', '0', '1'),
(4, 'https://youbestgadgets.com/uploads/3303.jpg', '', '', '', '1', '0', '1'),
(5, 'https://youbestgadgets.com/uploads/2444.jpg', '', '', '', '1', '0', '1'),
(6, 'https://youbestgadgets.com/uploads/8535.jpg', '', '', '', '1', '0', '1'),
(7, 'https://youbestgadgets.com/uploads/3396.jpg', '', '', '', '1', '0', '1'),
(8, 'https://youbestgadgets.com/uploads/9150.jpg', '', '', '', '2', '1', '1'),
(9, 'https://youbestgadgets.com/uploads/4271.jpg', '', '', '', '2', '0', '1'),
(10, 'https://youbestgadgets.com/uploads/9382.jpg', '', '', '', '2', '0', '1'),
(11, 'https://youbestgadgets.com/uploads/403.jpg', '', '', '', '2', '0', '1'),
(12, 'https://youbestgadgets.com/uploads/9584.jpg', '', '', '', '2', '0', '1'),
(13, 'https://youbestgadgets.com/uploads/5145.jpg', '', '', '', '2', '0', '1'),
(14, 'https://youbestgadgets.com/uploads/7356.jpg', '', '', '', '2', '0', '1'),
(15, 'https://youbestgadgets.com/uploads/367.jpg', '', '', '', '2', '0', '1'),
(16, 'https://youbestgadgets.com/uploads/500.jpg', '', '', '', '3', '1', '1'),
(17, 'https://youbestgadgets.com/uploads/8711.jpg', '', '', '', '3', '0', '1'),
(18, 'https://youbestgadgets.com/uploads/9122.jpg', '', '', '', '3', '0', '1'),
(19, 'https://youbestgadgets.com/uploads/5593.jpg', '', '', '', '3', '0', '1'),
(20, 'https://youbestgadgets.com/uploads/744.jpg', '', '', '', '3', '0', '1'),
(21, 'https://youbestgadgets.com/uploads/4165.jpg', '', '', '', '3', '0', '1'),
(22, 'https://youbestgadgets.com/uploads/9986.jpg', '', '', '', '3', '0', '1'),
(23, 'https://youbestgadgets.com/uploads/970.jpg', '', '', '', '4', '1', '1'),
(24, 'https://youbestgadgets.com/uploads/8861.jpg', '', '', '', '4', '0', '1'),
(25, 'https://youbestgadgets.com/uploads/1442.jpg', '', '', '', '4', '0', '1'),
(26, 'https://youbestgadgets.com/uploads/3653.jpg', '', '', '', '4', '0', '1'),
(27, 'https://youbestgadgets.com/uploads/4054.jpg', '', '', '', '4', '0', '1'),
(28, 'https://youbestgadgets.com/uploads/4615.jpg', '', '', '', '4', '0', '1'),
(29, 'https://youbestgadgets.com/uploads/396.jpg', '', '', '', '4', '0', '1'),
(30, 'https://youbestgadgets.com/uploads/4400.jpg', 'image/jpeg', '500', '500', '5', '1', '1'),
(31, 'https://youbestgadgets.com/uploads/641.png', 'image/jpeg', '300', '300', '5', '0', '1'),
(32, 'https://youbestgadgets.com/uploads/8062.jpg', 'image/jpeg', '160', '160', '5', '0', '1'),
(33, 'https://youbestgadgets.com/uploads/453.jpg', 'image/jpeg', '160', '160', '5', '0', '1'),
(34, 'https://youbestgadgets.com/uploads/5154.jpg', 'image/jpeg', '160', '160', '5', '0', '1'),
(35, 'https://youbestgadgets.com/uploads/8995.jpg', 'image/jpeg', '160', '160', '5', '0', '1'),
(36, 'https://youbestgadgets.com/uploads/8070.jpg', 'image/jpeg', '500', '383', '6', '0', '1'),
(37, 'https://youbestgadgets.com/uploads/4691.jpg', 'image/jpeg', '160', '160', '6', '0', '1'),
(38, 'https://youbestgadgets.com/uploads/5372.jpg', 'image/jpeg', '160', '160', '6', '0', '1'),
(39, 'https://youbestgadgets.com/uploads/8993.jpg', 'image/jpeg', '160', '160', '6', '0', '1'),
(40, 'https://youbestgadgets.com/uploads/2024.jpg', 'image/jpeg', '160', '160', '6', '1', '1'),
(41, 'https://youbestgadgets.com/uploads/3655.jpg', 'image/jpeg', '160', '160', '6', '0', '1'),
(42, 'https://youbestgadgets.com/uploads/9910.jpg', 'image/jpeg', '500', '500', '7', '0', '1'),
(43, 'https://youbestgadgets.com/uploads/61GZY5ojz9L._SL1500_.jpg', 'image/jpeg', '119244', '119244', '7', '1', '1'),
(44, 'https://youbestgadgets.com/uploads/61IXg-nSq8L._SL1481_.jpg', 'image/jpeg', '113581', '113581', '7', '0', '1'),
(45, 'https://youbestgadgets.com/uploads/61WDKcRxTIL._SL1500_.jpg', 'image/jpeg', '107886', '107886', '7', '0', '1'),
(46, 'https://youbestgadgets.com/uploads/71Mv2rqjOlL._SL1500_.jpg', 'image/jpeg', '249243', '249243', '7', '0', '1'),
(47, 'https://youbestgadgets.com/uploads/71OXsQY+5UL._SL1500_.jpg', 'image/jpeg', '210286', '210286', '7', '0', '1'),
(48, 'https://youbestgadgets.com/uploads/2490.jpg', 'image/jpeg', '500', '403', '8', '1', '1'),
(49, 'https://youbestgadgets.com/uploads/5500.jpg', 'image/jpeg', '500', '500', '9', '1', '1'),
(50, 'https://youbestgadgets.com/uploads/8400.jpg', '', '', '', '10', '1', '1'),
(51, 'https://youbestgadgets.com/uploads/6531.jpg', '', '', '', '10', '0', '1'),
(53, 'https://youbestgadgets.com/uploads/6223.jpg', '', '', '', '10', '0', '1'),
(54, 'https://youbestgadgets.com/uploads/4254.jpg', '', '', '', '10', '0', '1'),
(55, 'https://youbestgadgets.com/uploads/8275.jpg', '', '', '', '10', '0', '1'),
(56, 'https://youbestgadgets.com/uploads/4146.jpg', '', '', '', '10', '0', '1'),
(57, 'https://youbestgadgets.com/uploads/827.jpg', '', '', '', '10', '0', '1'),
(58, 'https://youbestgadgets.com/uploads/4040.jpg', 'image/jpeg', '500', '500', '11', '0', '1'),
(59, 'https://youbestgadgets.com/uploads/4901.jpg', 'image/jpeg', '220', '220', '11', '1', '1'),
(60, 'https://youbestgadgets.com/uploads/2812.jpg', 'image/jpeg', '220', '220', '11', '0', '1'),
(61, 'https://youbestgadgets.com/uploads/2853.png', 'image/jpeg', '220', '220', '11', '0', '1'),
(62, 'https://youbestgadgets.com/uploads/2014.jpg', 'image/jpeg', '160', '160', '11', '0', '1'),
(63, 'https://youbestgadgets.com/uploads/8865.jpg', 'image/jpeg', '160', '160', '11', '0', '1'),
(64, 'https://youbestgadgets.com/uploads/4330.jpg', '', '', '', '12', '1', '1'),
(65, 'https://youbestgadgets.com/uploads/6061.jpg', '', '', '', '12', '0', '1'),
(66, 'https://youbestgadgets.com/uploads/542.jpg', '', '', '', '12', '0', '1'),
(67, 'https://youbestgadgets.com/uploads/9583.jpg', '', '', '', '12', '0', '1'),
(68, 'https://youbestgadgets.com/uploads/504.jpg', '', '', '', '12', '0', '1'),
(69, 'https://youbestgadgets.com/uploads/1475.jpg', '', '', '', '12', '0', '1'),
(70, 'https://youbestgadgets.com/uploads/2016.jpg', '', '', '', '12', '0', '1'),
(71, 'https://youbestgadgets.com/uploads/7487.jpg', '', '', '', '12', '0', '1'),
(72, 'https://youbestgadgets.com/uploads/8048.jpg', '', '', '', '12', '0', '1'),
(73, 'https://youbestgadgets.com/uploads/2620.jpg', 'image/jpeg', '500', '500', '13', '1', '1'),
(74, 'https://youbestgadgets.com/uploads/2721.jpg', 'image/jpeg', '160', '160', '13', '0', '1'),
(75, 'https://youbestgadgets.com/uploads/3042.jpg', 'image/jpeg', '160', '160', '13', '0', '1'),
(76, 'https://youbestgadgets.com/uploads/3663.jpg', 'image/jpeg', '160', '160', '13', '0', '1'),
(77, 'https://youbestgadgets.com/uploads/534.jpg', 'image/jpeg', '160', '160', '13', '0', '1'),
(78, 'https://youbestgadgets.com/uploads/2065.jpg', 'image/jpeg', '160', '160', '13', '0', '1'),
(79, 'https://youbestgadgets.com/uploads/8270.jpg', '', '570', '570', '14', '1', '1'),
(80, 'https://youbestgadgets.com/uploads/391.jpg', 'image/jpeg', '794', '794', '14', '0', '1'),
(81, 'https://youbestgadgets.com/uploads/6522.jpg', 'image/jpeg', '340', '270', '14', '0', '1'),
(82, 'https://youbestgadgets.com/uploads/5450.jpg', '', '', '', '16', '0', '1'),
(83, 'https://youbestgadgets.com/uploads/151.jpg', '', '', '', '15', '1', '1'),
(84, 'https://youbestgadgets.com/uploads/6482.jpg', '', '', '', '15', '0', '1'),
(85, 'https://youbestgadgets.com/uploads/7213.jpg', '', '', '', '15', '0', '1'),
(86, 'https://youbestgadgets.com/uploads/5114.jpg', '', '', '', '15', '0', '1'),
(87, 'https://youbestgadgets.com/uploads/365.jpg', '', '', '', '15', '0', '1'),
(88, 'https://youbestgadgets.com/uploads/626.jpg', '', '', '', '15', '0', '1'),
(89, 'https://youbestgadgets.com/uploads/2067.jpg', '', '', '', '15', '0', '1'),
(90, 'https://youbestgadgets.com/uploads/5450.jpg', '', '', '', '16', '0', '1'),
(91, 'https://youbestgadgets.com/uploads/6721.jpg', '', '', '', '16', '1', '1'),
(92, 'https://youbestgadgets.com/uploads/8732.jpg', '', '', '', '16', '0', '1'),
(93, 'https://youbestgadgets.com/uploads/2083.jpg', '', '', '', '16', '0', '1'),
(94, 'https://youbestgadgets.com/uploads/344.jpg', '', '', '', '16', '0', '1'),
(95, 'https://youbestgadgets.com/uploads/8405.jpg', '', '', '', '16', '0', '1'),
(96, 'https://youbestgadgets.com/uploads/6406.jpg', '', '', '', '16', '0', '1'),
(97, 'https://youbestgadgets.com/uploads/5257.jpg', '', '', '', '16', '0', '1'),
(98, 'https://youbestgadgets.com/uploads/5870.jpg', '', '', '', '17', '1', '1'),
(99, 'https://youbestgadgets.com/uploads/7261.jpg', '', '', '', '17', '0', '1'),
(100, 'https://youbestgadgets.com/uploads/9102.jpg', '', '', '', '17', '0', '1'),
(101, 'https://youbestgadgets.com/uploads/170.jpg', '', '', '', '18', '1', '1'),
(102, 'https://youbestgadgets.com/uploads/3981.jpg', '', '', '', '18', '0', '1'),
(103, 'https://youbestgadgets.com/uploads/7762.jpg', '', '', '', '18', '0', '1'),
(104, 'https://youbestgadgets.com/uploads/8743.jpg', '', '', '', '18', '0', '1'),
(105, 'https://youbestgadgets.com/uploads/7174.jpg', '', '', '', '18', '0', '1'),
(106, 'https://youbestgadgets.com/uploads/9505.jpg', '', '', '', '18', '0', '1'),
(107, 'https://youbestgadgets.com/uploads/296.jpg', '', '', '', '18', '0', '1'),
(108, 'https://youbestgadgets.com/uploads/710.jpg', '', '', '', '19', '0', '1'),
(109, 'https://youbestgadgets.com/uploads/8271.jpg', '', '', '', '19', '1', '1'),
(110, 'https://youbestgadgets.com/uploads/8372.jpg', '', '', '', '19', '0', '1'),
(111, 'https://youbestgadgets.com/uploads/9353.jpg', '', '', '', '19', '0', '1'),
(112, 'https://youbestgadgets.com/uploads/224.jpg', '', '', '', '19', '0', '1'),
(113, 'https://youbestgadgets.com/uploads/2595.jpg', '', '', '', '19', '0', '1'),
(114, 'https://youbestgadgets.com/uploads/1876.jpg', '', '', '', '19', '0', '1'),
(115, 'https://youbestgadgets.com/uploads/5320.jpg', 'image/jpeg', '500', '500', '20', '0', '1'),
(124, 'https://youbestgadgets.com/uploads/316079.jpg', 'image/jpeg', '103539', '103539', '20', '0', '1'),
(125, 'https://youbestgadgets.com/uploads/778154.jpg', 'image/jpeg', '69359', '69359', '20', '1', '1'),
(126, 'https://youbestgadgets.com/uploads/105236.jpg', 'image/jpeg', '65757', '65757', '20', '0', '1'),
(127, 'https://youbestgadgets.com/uploads/3530.jpg', 'image/jpeg', '500', '500', '21', '1', '1'),
(128, 'https://youbestgadgets.com/uploads/9131.jpg', 'image/jpeg', '160', '160', '21', '0', '1'),
(129, 'https://youbestgadgets.com/uploads/7352.jpg', 'text/html', '160', '160', '21', '0', '1'),
(130, 'https://youbestgadgets.com/uploads/2833.jpg', 'image/jpeg', '160', '160', '21', '0', '1'),
(131, 'https://youbestgadgets.com/uploads/5374.jpg', 'image/jpeg', '160', '160', '21', '0', '1'),
(132, 'https://youbestgadgets.com/uploads/7495.jpg', 'image/jpeg', '160', '160', '21', '0', '1'),
(133, 'https://youbestgadgets.com/uploads/9370.jpg', '', '', '', '22', '1', '1'),
(134, 'https://youbestgadgets.com/uploads/3491.jpg', '', '', '', '22', '0', '1'),
(135, 'https://youbestgadgets.com/uploads/2452.jpg', '', '', '', '22', '0', '1'),
(136, 'https://youbestgadgets.com/uploads/133.jpg', '', '', '', '22', '0', '1'),
(137, 'https://youbestgadgets.com/uploads/154.jpg', '', '', '', '22', '0', '1'),
(138, 'https://youbestgadgets.com/uploads/7365.jpg', '', '', '', '22', '0', '1'),
(139, 'https://youbestgadgets.com/uploads/7440.jpg', '', '', '', '23', '1', '1'),
(140, 'https://youbestgadgets.com/uploads/1031.jpg', '', '', '', '23', '0', '1'),
(141, 'https://youbestgadgets.com/uploads/772.jpg', '', '', '', '23', '0', '1'),
(142, 'https://youbestgadgets.com/uploads/2640.jpg', '', '', '', '24', '1', '1'),
(143, 'https://youbestgadgets.com/uploads/7961.jpg', '', '', '', '24', '0', '1'),
(144, 'https://youbestgadgets.com/uploads/5912.jpg', '', '', '', '24', '0', '1'),
(145, 'https://youbestgadgets.com/uploads/1833.jpg', '', '', '', '24', '0', '1'),
(146, 'https://youbestgadgets.com/uploads/2334.jpg', '', '', '', '24', '0', '1'),
(147, 'https://youbestgadgets.com/uploads/9095.jpg', '', '', '', '24', '0', '1'),
(148, 'https://youbestgadgets.com/uploads/5846.jpg', '', '', '', '24', '0', '1'),
(149, 'https://youbestgadgets.com/uploads/1547.jpg', '', '', '', '24', '0', '1'),
(150, 'https://youbestgadgets.com/uploads/6148.jpg', '', '', '', '24', '0', '1'),
(151, 'https://youbestgadgets.com/uploads/4060.jpg', '', '', '', '25', '1', '1'),
(152, 'https://youbestgadgets.com/uploads/4061.jpg', '', '', '', '25', '0', '1'),
(153, 'https://youbestgadgets.com/uploads/4942.jpg', '', '', '', '25', '0', '1'),
(154, 'https://youbestgadgets.com/uploads/5933.jpg', '', '', '', '25', '0', '1'),
(155, 'https://youbestgadgets.com/uploads/6974.jpg', '', '', '', '25', '0', '1'),
(156, 'https://youbestgadgets.com/uploads/3765.jpg', '', '', '', '25', '0', '1'),
(157, 'https://youbestgadgets.com/uploads/3676.jpg', '', '', '', '25', '0', '1'),
(158, 'https://youbestgadgets.com/uploads/6167.jpg', '', '', '', '25', '0', '1'),
(159, 'https://youbestgadgets.com/uploads/7128.jpg', '', '', '', '25', '0', '1'),
(160, 'https://youbestgadgets.com/uploads/5350.jpg', '', '', '', '26', '1', '1'),
(161, 'https://youbestgadgets.com/uploads/9891.jpg', '', '', '', '26', '0', '1'),
(162, 'https://youbestgadgets.com/uploads/8532.jpg', '', '', '', '26', '0', '1'),
(163, 'https://youbestgadgets.com/uploads/1683.jpg', '', '', '', '26', '0', '1'),
(164, 'https://youbestgadgets.com/uploads/6684.jpg', '', '', '', '26', '0', '1'),
(165, 'https://youbestgadgets.com/uploads/1355.jpg', '', '', '', '26', '0', '1'),
(166, 'https://youbestgadgets.com/uploads/5600.jpg', '', '', '', '27', '1', '1'),
(167, 'https://youbestgadgets.com/uploads/5271.jpg', '', '', '', '27', '0', '1'),
(168, 'https://youbestgadgets.com/uploads/8342.jpg', '', '', '', '27', '0', '1'),
(169, 'https://youbestgadgets.com/uploads/6500.jpg', 'image/jpeg', '500', '500', '28', '1', '1'),
(170, 'https://youbestgadgets.com/uploads/8711.jpg', 'image/jpeg', '160', '160', '28', '0', '1'),
(171, 'https://youbestgadgets.com/uploads/562.jpg', 'image/jpeg', '160', '160', '28', '0', '1'),
(172, 'https://youbestgadgets.com/uploads/8713.jpg', 'image/jpeg', '160', '160', '28', '0', '1'),
(173, 'https://youbestgadgets.com/uploads/244.jpg', 'image/jpeg', '160', '160', '28', '0', '1'),
(174, 'https://youbestgadgets.com/uploads/2865.jpg', 'image/jpeg', '160', '160', '28', '0', '1'),
(175, 'https://youbestgadgets.com/uploads/7610.jpg', '', '570', '570', '29', '1', '1'),
(176, 'https://youbestgadgets.com/uploads/5071.jpg', 'image/jpeg', '794', '794', '29', '0', '1'),
(177, 'https://youbestgadgets.com/uploads/2550.jpg', '', '', '', '30', '1', '1'),
(178, 'https://youbestgadgets.com/uploads/611.jpg', '', '', '', '30', '0', '1'),
(179, 'https://youbestgadgets.com/uploads/7882.jpg', '', '', '', '30', '0', '1'),
(180, 'https://youbestgadgets.com/uploads/8613.jpg', '', '', '', '30', '0', '1'),
(181, 'https://youbestgadgets.com/uploads/6674.jpg', '', '', '', '30', '0', '1'),
(182, 'https://youbestgadgets.com/uploads/355.jpg', '', '', '', '30', '0', '1'),
(183, 'https://youbestgadgets.com/uploads/4626.jpg', '', '', '', '30', '0', '1'),
(184, 'https://youbestgadgets.com/uploads/140.jpg', '', '', '', '31', '1', '1'),
(185, 'https://youbestgadgets.com/uploads/7371.jpg', '', '', '', '31', '0', '1'),
(186, 'https://youbestgadgets.com/uploads/3472.jpg', '', '', '', '31', '0', '1'),
(187, 'https://youbestgadgets.com/uploads/9670.jpg', 'image/jpeg', '500', '500', '32', '1', '1'),
(188, 'https://youbestgadgets.com/uploads/9251.jpg', 'image/jpeg', '160', '160', '32', '0', '1'),
(189, 'https://youbestgadgets.com/uploads/7302.jpg', 'image/jpeg', '160', '160', '32', '0', '1'),
(190, 'https://youbestgadgets.com/uploads/3553.jpg', 'image/jpeg', '160', '160', '32', '0', '1'),
(191, 'https://youbestgadgets.com/uploads/3464.jpg', 'image/jpeg', '160', '160', '32', '0', '1'),
(192, 'https://youbestgadgets.com/uploads/7205.jpg', 'image/jpeg', '160', '160', '32', '0', '1'),
(193, 'https://youbestgadgets.com/uploads/1690.jpg', '', '', '', '33', '0', '1'),
(194, 'https://youbestgadgets.com/uploads/8131.jpg', '', '', '', '33', '0', '1'),
(195, 'https://youbestgadgets.com/uploads/5032.jpg', '', '', '', '33', '0', '1'),
(196, 'https://youbestgadgets.com/uploads/2383.jpg', '', '', '', '33', '0', '1'),
(197, 'https://youbestgadgets.com/uploads/3314.jpg', '', '', '', '33', '0', '1'),
(198, 'https://youbestgadgets.com/uploads/8105.jpg', '', '', '', '33', '1', '1'),
(199, 'https://youbestgadgets.com/uploads/2596.jpg', '', '', '', '33', '0', '1'),
(200, 'https://youbestgadgets.com/uploads/2880.jpg', 'image/jpeg', '500', '500', '34', '1', '1'),
(201, 'https://youbestgadgets.com/uploads/4430.jpg', '', '', '', '35', '1', '1'),
(202, 'https://youbestgadgets.com/uploads/5211.jpg', '', '', '', '35', '0', '1'),
(203, 'https://youbestgadgets.com/uploads/4292.jpg', '', '', '', '35', '0', '1'),
(204, 'https://youbestgadgets.com/uploads/3223.jpg', '', '', '', '35', '0', '1'),
(205, 'https://youbestgadgets.com/uploads/7654.jpg', '', '', '', '35', '0', '1'),
(206, 'https://youbestgadgets.com/uploads/7235.jpg', '', '', '', '35', '0', '1'),
(207, 'https://youbestgadgets.com/uploads/3806.jpg', '', '', '', '35', '0', '1'),
(208, 'https://youbestgadgets.com/uploads/9050.jpg', '', '', '', '36', '1', '1'),
(209, 'https://youbestgadgets.com/uploads/661.jpg', '', '', '', '36', '0', '1'),
(210, 'https://youbestgadgets.com/uploads/9382.jpg', '', '', '', '36', '0', '1'),
(211, 'https://youbestgadgets.com/uploads/3043.jpg', '', '', '', '36', '0', '1'),
(212, 'https://youbestgadgets.com/uploads/6254.jpg', '', '', '', '36', '0', '1'),
(213, 'https://youbestgadgets.com/uploads/8685.jpg', '', '', '', '36', '0', '1'),
(214, 'https://youbestgadgets.com/uploads/2476.jpg', '', '', '', '36', '0', '1'),
(215, 'https://youbestgadgets.com/uploads/2927.jpg', '', '', '', '36', '0', '1'),
(216, 'https://youbestgadgets.com/uploads/7350.jpg', '', '361', '361', '37', '0', '1'),
(217, 'https://youbestgadgets.com/uploads/7021.gif', 'image/gif', '300', '300', '37', '1', '1'),
(218, 'https://youbestgadgets.com/uploads/7240.jpg', '', '361', '361', '38', '1', '1'),
(219, 'https://youbestgadgets.com/uploads/2730.jpg', '', '335', '447', '39', '1', '1'),
(220, 'https://youbestgadgets.com/uploads/210.jpg', '', '', '', '40', '0', '1'),
(221, 'https://youbestgadgets.com/uploads/8921.jpg', '', '', '', '40', '1', '1'),
(222, 'https://youbestgadgets.com/uploads/8022.jpg', '', '', '', '40', '0', '1'),
(223, 'https://youbestgadgets.com/uploads/1940.jpg', '', '361', '361', '41', '1', '1'),
(224, 'https://youbestgadgets.com/uploads/6450.jpg', '', '361', '361', '42', '1', '1'),
(225, 'https://youbestgadgets.com/uploads/4140.jpg', '', '335', '447', '43', '1', '1'),
(226, 'https://youbestgadgets.com/uploads/384891.jpg', 'image/jpeg', '60992', '60992', '43', '0', '1'),
(227, 'https://youbestgadgets.com/uploads/562023.jpg', 'image/jpeg', '65345', '65345', '43', '0', '1'),
(228, 'https://youbestgadgets.com/uploads/302571.jpg', 'image/jpeg', '56990', '56990', '43', '0', '1'),
(229, 'https://youbestgadgets.com/uploads/767650.jpg', 'image/jpeg', '63370', '63370', '43', '0', '1'),
(230, 'https://youbestgadgets.com/uploads/4310.jpg', '', '', '', '44', '1', '1'),
(231, 'https://youbestgadgets.com/uploads/6001.jpg', '', '', '', '44', '0', '1'),
(232, 'https://youbestgadgets.com/uploads/6512.jpg', '', '', '', '44', '0', '1'),
(233, 'https://youbestgadgets.com/uploads/6293.jpg', '', '', '', '44', '0', '1'),
(234, 'https://youbestgadgets.com/uploads/2434.jpg', '', '', '', '44', '0', '1'),
(235, 'https://youbestgadgets.com/uploads/2575.jpg', '', '', '', '44', '0', '1'),
(236, 'https://youbestgadgets.com/uploads/8880.jpg', '', '', '', '45', '1', '1'),
(237, 'https://youbestgadgets.com/uploads/701.jpg', '', '', '', '45', '0', '1'),
(238, 'https://youbestgadgets.com/uploads/4162.jpg', '', '', '', '45', '0', '1'),
(239, 'https://youbestgadgets.com/uploads/8893.jpg', '', '', '', '45', '0', '1'),
(240, 'https://youbestgadgets.com/uploads/8094.jpg', '', '', '', '45', '0', '1'),
(241, 'https://youbestgadgets.com/uploads/8095.jpg', '', '', '', '45', '0', '1'),
(242, 'https://youbestgadgets.com/uploads/325103.png', 'image/png', '557401', '557401', '46', '0', '1'),
(243, 'https://youbestgadgets.com/uploads/923196.png', 'image/png', '522679', '522679', '46', '1', '1'),
(244, 'https://youbestgadgets.com/uploads/102418.png', 'image/png', '544483', '544483', '46', '0', '1'),
(245, 'https://youbestgadgets.com/uploads/412081.png', 'image/png', '519407', '519407', '46', '0', '1'),
(246, 'https://youbestgadgets.com/uploads/9380.jpg', '', '361', '361', '47', '1', '1'),
(247, 'https://youbestgadgets.com/uploads/588182.png', 'image/png', '218503', '218503', '47', '0', '1'),
(248, 'https://youbestgadgets.com/uploads/266342.png', 'image/png', '131903', '131903', '47', '0', '1'),
(249, 'https://youbestgadgets.com/uploads/618111.png', 'image/png', '191949', '191949', '47', '0', '1'),
(250, 'https://youbestgadgets.com/uploads/228272.png', 'image/png', '203051', '203051', '47', '0', '1'),
(251, 'https://youbestgadgets.com/uploads/145092.png', 'image/png', '430730', '430730', '47', '0', '1'),
(252, 'https://youbestgadgets.com/uploads/175794.png', 'image/png', '390006', '390006', '47', '0', '1'),
(253, 'https://youbestgadgets.com/uploads/978712.png', 'image/png', '347279', '347279', '47', '0', '1'),
(254, 'https://youbestgadgets.com/uploads/7130.jpg', '', '', '', '48', '1', '1'),
(255, 'https://youbestgadgets.com/uploads/9581.jpg', '', '', '', '48', '0', '1'),
(256, 'https://youbestgadgets.com/uploads/6412.jpg', '', '', '', '48', '0', '1'),
(257, 'https://youbestgadgets.com/uploads/363.jpg', '', '', '', '48', '0', '1'),
(258, 'https://youbestgadgets.com/uploads/8484.jpg', '', '', '', '48', '0', '1'),
(259, 'https://youbestgadgets.com/uploads/5620.jpg', '', '', '', '49', '1', '1'),
(260, 'https://youbestgadgets.com/uploads/4201.jpg', '', '', '', '49', '0', '1'),
(261, 'https://youbestgadgets.com/uploads/4422.jpg', '', '', '', '49', '0', '1'),
(262, 'https://youbestgadgets.com/uploads/7923.jpg', '', '', '', '49', '0', '1'),
(263, 'https://youbestgadgets.com/uploads/7664.jpg', '', '', '', '49', '0', '1'),
(264, 'https://youbestgadgets.com/uploads/5865.jpg', '', '', '', '49', '0', '1'),
(265, 'https://youbestgadgets.com/uploads/6530.jpg', '', '361', '361', '50', '0', '1'),
(266, 'https://youbestgadgets.com/uploads/647919.png', 'image/png', '179185', '179185', '50', '0', '1'),
(267, 'https://youbestgadgets.com/uploads/238885.png', 'image/png', '98395', '98395', '50', '0', '1'),
(268, 'https://youbestgadgets.com/uploads/845034.png', 'image/png', '189360', '189360', '50', '0', '1'),
(269, 'https://youbestgadgets.com/uploads/323026.png', 'image/png', '199387', '199387', '50', '1', '1'),
(270, 'https://youbestgadgets.com/uploads/8500.jpg', '', '361', '361', '51', '1', '1'),
(271, 'https://youbestgadgets.com/uploads/454339.png', 'image/png', '297975', '297975', '51', '0', '1'),
(272, 'https://youbestgadgets.com/uploads/530254.png', 'image/png', '264725', '264725', '51', '0', '1'),
(273, 'https://youbestgadgets.com/uploads/150204.png', 'image/png', '200308', '200308', '51', '0', '1'),
(274, 'https://youbestgadgets.com/uploads/922656.png', 'image/png', '386427', '386427', '51', '0', '1'),
(275, 'https://youbestgadgets.com/uploads/555435.png', 'image/png', '362229', '362229', '51', '0', '1'),
(276, 'https://youbestgadgets.com/uploads/500465.png', 'image/png', '333410', '333410', '51', '0', '1'),
(277, 'https://youbestgadgets.com/uploads/502286.png', 'image/png', '332899', '332899', '51', '0', '1'),
(278, 'https://youbestgadgets.com/uploads/258085.png', 'image/png', '168041', '168041', '51', '0', '1'),
(279, 'https://youbestgadgets.com/uploads/3170.jpg', '', '361', '361', '52', '1', '1'),
(280, 'https://youbestgadgets.com/uploads/430922.png', 'image/png', '226437', '226437', '52', '0', '1'),
(281, 'https://youbestgadgets.com/uploads/171776.png', 'image/png', '160264', '160264', '52', '0', '1'),
(282, 'https://youbestgadgets.com/uploads/1840.jpg', '', '', '', '53', '0', '1'),
(283, 'https://youbestgadgets.com/uploads/6751.jpg', '', '', '', '53', '0', '1'),
(284, 'https://youbestgadgets.com/uploads/2232.jpg', '', '', '', '53', '0', '1'),
(285, 'https://youbestgadgets.com/uploads/4673.jpg', '', '', '', '53', '0', '1'),
(286, 'https://youbestgadgets.com/uploads/6784.jpg', '', '', '', '53', '1', '1'),
(287, 'https://youbestgadgets.com/uploads/465.jpg', '', '', '', '53', '0', '1'),
(288, 'https://youbestgadgets.com/uploads/3030.jpg', '', '', '', '54', '1', '1'),
(289, 'https://youbestgadgets.com/uploads/7151.jpg', '', '', '', '54', '0', '1'),
(290, 'https://youbestgadgets.com/uploads/1472.jpg', '', '', '', '54', '0', '1'),
(291, 'https://youbestgadgets.com/uploads/2240.jpg', '', '', '', '55', '1', '1'),
(292, 'https://youbestgadgets.com/uploads/8961.jpg', '', '', '', '55', '0', '1'),
(293, 'https://youbestgadgets.com/uploads/5772.jpg', '', '', '', '55', '0', '1'),
(294, 'https://youbestgadgets.com/uploads/9523.jpg', '', '', '', '55', '0', '1'),
(295, 'https://youbestgadgets.com/uploads/1844.jpg', '', '', '', '55', '0', '1'),
(296, 'https://youbestgadgets.com/uploads/345.jpg', '', '', '', '55', '0', '1'),
(297, 'https://youbestgadgets.com/uploads/5766.jpg', '', '', '', '55', '0', '1'),
(298, 'https://youbestgadgets.com/uploads/8687.jpg', '', '', '', '55', '0', '1'),
(299, 'https://youbestgadgets.com/uploads/190.jpg', 'image/jpeg', '500', '500', '56', '1', '1'),
(300, 'https://youbestgadgets.com/uploads/3921.jpg', 'image/jpeg', '160', '160', '56', '0', '1'),
(301, 'https://youbestgadgets.com/uploads/339592.jpg', 'image/jpeg', '99706', '99706', '56', '0', '1'),
(302, 'https://youbestgadgets.com/uploads/724953.jpg', 'image/jpeg', '49933', '49933', '56', '0', '1'),
(303, 'https://youbestgadgets.com/uploads/19591.jpg', 'image/jpeg', '214067', '214067', '56', '0', '1'),
(304, 'https://youbestgadgets.com/uploads/327991.jpg', 'image/jpeg', '192341', '192341', '56', '0', '1'),
(305, 'https://youbestgadgets.com/uploads/521969.jpg', 'image/jpeg', '189255', '189255', '56', '0', '1'),
(306, 'https://youbestgadgets.com/uploads/132326.jpg', 'image/jpeg', '331345', '331345', '56', '0', '1'),
(307, 'https://youbestgadgets.com/uploads/9510.jpg', '', '335', '447', '57', '0', '1'),
(308, 'https://youbestgadgets.com/uploads/401495.jpg', 'image/jpeg', '1142', '1142', '57', '0', '1'),
(309, 'https://youbestgadgets.com/uploads/233537.jpg', 'image/jpeg', '42519', '42519', '57', '0', '1'),
(310, 'https://youbestgadgets.com/uploads/422310.jpeg', 'image/jpeg', '34937', '34937', '57', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `link`) VALUES
(1, 'Storing Data Locally in a PhoneGap App with SQLite', 'Data storing is a basic requirement while creating an application.\n\nIt is possible to store data online but the app needs to be online whenever data processing is required.\n\nFor local data storage use SQLite database which is already embedded on the mobile platforms - Android, IOS, Windows, Blackberry, etc.\n\nThe Cordova plugin provides support to access SQLite database in the app.\n\nIn this tutorial, I am creating an Android app where use SQLite database to save and retrieve records. Deploy the application with PhoneGap Build.', 'http://makitweb.com/storing-data-locally-in-a-phonegap-app-with-sqlite/'),
(2, 'jQuery UI autocomplete with PHP and AJAX', 'The autocomplete functionality shows the suggestion list according to the entered value. The user can select a value from the list.\n\nWith jQuery UI you can easily add autocomplete widget on the input element. Navigate to the suggestion list either by mouse or keyboard arrow keys.\n\nIt has the various options that allow us to customize the widget.', 'http://makitweb.com/jquery-ui-autocomplete-with-php-and-ajax/'),
(3, 'Add plugin to the Android app - PhoneGap', 'You cannot directly access the system feature in your PhoneGap app to extend its functionality.\n\nPhoneGap provide various plugins that allow accessing features like - camera, geolocation, contacts, battery status etc.', 'http://makitweb.com/add-plugin-to-the-android-app-phonegap/'),
(4, 'Insert record to Database Table - Codeigniter', 'All logical operation and database handling done in the Models like insert, update or fetch records.\n\nCodeigniter has predefined Database methods to perform database request.\n\nIn the demonstration, with View show the HTML form and when the user submits the forms then call the Model method to insert record from the controller.', 'http://makitweb.com/insert-record-to-database-table-codeigniter/'),
(5, 'How to install and setup Codeigniter', 'Codeigniter is a lightweight PHP-based framework to develop the web application. It is based on MVC (Model View Controller) pattern.\n', 'http://makitweb.com/how-to-install-and-setup-codeigniter/'),
(6, 'Add tooltip to the element with Bootstrap', 'Bootstrap provides dozens of custom plugins that helps to create better UI. With this, you can easily add tooltip to the HTML elements.\n\nA tooltip will appear when the user moves the mouse pointer over the element e.g. link, buttons, etc. This gives hint or quick information to the user.', 'http://makitweb.com/add-tooltip-to-the-element-with-bootstrap/'),
(7, 'Make android app with PhoneGap Build', 'PhoneGap is a framework that use to build mobile applications for multiple platforms - Android, iOS, Windows Phone, Blackberry etc.\n\nWith HTML, CSS, and JavaScript you can build an application.\n\nYou don\'t have to require to re-write code for other platforms.', 'http://makitweb.com/make-android-app-with-phonegap-build/'),
(8, 'How to handle AJAX request on the same page - PHP', 'AJAX is use to communicate with the server to perform the action without the need to refresh the page.\n\nYou can either handle AJAX requests on the same page or on the separate page.', 'http://makitweb.com/how-to-handle-ajax-request-on-the-same-page-php/'),
(9, 'Automatic page load progress bar with Pace.js', 'The pace.js is an automatic page load progress bar. You don\'t need to write any code to initialize the script during page load.\n\nIt is easy to implement and not dependent on any other external JavaScript libraries.', 'http://makitweb.com/automatic-page-load-progress-bar-with-pace-js/'),
(10, 'Remove unwanted whitespace from the column - MySQL', 'There is always the possibility that the users may not enter the values as we expected and the data is being saved on the Database table. E.g. unwanted whitespace or characters with the value.\n\nYou will see the issue when you check for duplicate records or sort the list.', 'http://makitweb.com/remove-unwanted-white-space-from-the-column-mysql/'),
(11, 'How to capture picture from webcam with Webcam.js', 'Webcam.js is a JavaScript library that allows us to capture picture from the webcam.\n\nIt uses HTML5 getUserMedia API to capture the picture. Flash is only used if the browser doesn’t support getUserMedia.', 'http://makitweb.com/how-to-capture-picture-from-webcam-with-webcam-js/'),
(12, 'Make Price Range Slider with AngularJS and PHP', 'Most of the eCommerce sites e.g. Flipkart, Snapdeal, etc have a price range slider for searching purpose.\n\nThe user doesn\'t have to enter price range manually.', 'http://makitweb.com/make-price-range-slider-with-angularjs-and-php/'),
(13, 'Create alphabetical pagination with PHP MySQL', 'The alphabetical pagination searches the records according to the first character in a specific column.\n\nYou can either manually fix the characters from A-Z or use the database table column value to create the list.', 'http://makitweb.com/create-alphabetical-pagination-with-php-mysql/'),
(14, 'Check if username exists with AngularJS', 'It is always a better idea to check the entered username exists or not if you are allowing the users to choose username while registration and wants it to be unique.\n\nWith this, the user will instantly know that their chosen username is available or not.', 'http://makitweb.com/check-if-username-exists-with-angularjs/'),
(15, 'How to avoid jQuery conflict with other JS libraries', 'By default, jQuery uses $ as an alias for jQuery because of this reason sometimes it conflicts with other JS libraries if they are also using $ as a function or variable name.', 'http://makitweb.com/how-to-avoid-jquery-conflict-with-other-js-libraries/'),
(16, 'Check if element has certain Class - jQuery', 'jQuery has inbuilt methods that allow searching for the certain class within the element.\n\nBy using them you can easily check class on the selector and perform the action according to the response.', 'http://makitweb.com/check-if-element-has-certain-class-jquery/'),
(17, 'How to show Weather widget on the Website', 'There are many sites which offer free weather widget for the website. That are easy to embed.\n\nYou only need to specify some of the mandatory fields for generating the code.', 'http://makitweb.com/how-to-show-weather-widget-on-the-website/'),
(18, 'Convert Unix timestamp to Date time with JavaScript', 'The Unix timestamp value conversion with JavaScript mainly requires when the API request response contains the date time value in Unix format and requires to show it on the screen in user readable form.', 'http://makitweb.com/convert-unix-timestamp-to-date-time-with-javascript/'),
(19, 'Make Carousel slider with Siema plugin - JavaScript', 'The Siema is a lightweight JavaScript plugin that adds carousel slider on the page. It is not dependent on any other plugins and not require to do any styling.\n\nIt is easy to setup on the page.', 'http://makitweb.com/make-carousel-slider-with-siema-plugin-javascript/'),
(20, 'Create autocomplete search with AngularJS and PHP', 'The autocomplete functionality gives the user suggestions based on its input. From there, it can select an option.\n\nIn the demonstration, I am creating a search box and display suggestion list whenever the user input value in the search box.', 'http://makitweb.com/create-autocomplete-search-with-angularjs-and-php/');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`id`, `userid`, `postid`, `rating`, `timestamp`) VALUES
(1, 2, 1, 3, '2017-07-02 19:02:11'),
(2, 2, 3, 3, '2017-07-02 19:06:10'),
(3, 2, 4, 5, '2017-07-02 19:06:14'),
(4, 2, 5, 4, '2017-07-02 19:06:16'),
(5, 3, 2, 5, '2017-07-02 19:11:33'),
(6, 4, 2, 5, '2021-01-06 01:03:24'),
(7, 4, 1, 4, '2021-01-16 21:08:32'),
(8, 4, 10, 5, '2017-07-03 03:14:29'),
(9, 4, 11, 3, '2017-07-03 03:14:37'),
(10, 1, 1, 5, '2017-07-03 05:06:32'),
(11, 1, 4, 5, '2017-07-03 05:06:42'),
(12, 1, 3, 4, '2017-07-03 05:07:10'),
(13, 1, 10, 3, '2017-07-03 05:07:18'),
(14, 1, 9, 4, '2017-07-03 05:07:23'),
(15, 1, 11, 5, '2017-07-03 05:07:27'),
(16, 1, 19, 4, '2017-07-03 05:18:27'),
(17, 1, 18, 5, '2017-07-03 05:18:29'),
(18, 1, 20, 3, '2017-07-03 05:18:31'),
(19, 1, 17, 4, '2017-07-03 05:18:35'),
(20, 1, 16, 5, '2017-07-03 05:18:37'),
(21, 1, 15, 4, '2017-07-03 05:18:38'),
(22, 1, 14, 4, '2017-07-03 05:18:40'),
(23, 1, 13, 4, '2017-07-03 05:18:41'),
(24, 1, 12, 5, '2017-07-03 05:18:43'),
(25, 1, 8, 5, '2017-07-03 05:18:47'),
(26, 1, 7, 4, '2017-07-03 05:18:49'),
(27, 1, 6, 3, '2017-07-03 05:18:51'),
(28, 1, 5, 4, '2017-07-03 05:18:52'),
(29, 1, 2, 4, '2017-07-03 05:18:54'),
(30, 2, 2, 5, '2017-07-03 05:21:30'),
(31, 2, 6, 3, '2017-07-03 05:21:35'),
(32, 2, 7, 4, '2017-07-03 05:21:37'),
(33, 2, 8, 4, '2017-07-03 05:21:39'),
(34, 2, 9, 3, '2017-07-03 05:21:40'),
(35, 2, 10, 5, '2017-07-03 05:21:42'),
(36, 2, 11, 4, '2017-07-03 05:21:44'),
(37, 2, 12, 5, '2017-07-03 05:21:46'),
(38, 2, 13, 4, '2017-07-03 05:21:47'),
(39, 2, 14, 4, '2017-07-03 05:21:50'),
(40, 2, 15, 3, '2017-07-03 05:21:52'),
(41, 2, 16, 4, '2017-07-03 05:21:56'),
(42, 2, 17, 5, '2017-07-03 05:21:59'),
(43, 2, 18, 3, '2017-07-03 05:22:02'),
(44, 2, 19, 4, '2017-07-03 05:22:05'),
(45, 2, 20, 4, '2017-07-03 05:22:07'),
(46, 3, 1, 4, '2017-07-03 05:22:32'),
(47, 3, 3, 4, '2017-07-03 05:22:35'),
(48, 3, 4, 4, '2017-07-03 05:22:37'),
(49, 3, 5, 5, '2017-07-03 05:22:38'),
(50, 3, 6, 4, '2017-07-03 05:22:40'),
(51, 3, 7, 5, '2017-07-03 05:22:45'),
(52, 3, 8, 4, '2017-07-03 05:22:47'),
(53, 3, 9, 4, '2017-07-03 05:22:49'),
(54, 3, 10, 4, '2017-07-03 05:22:51'),
(55, 3, 11, 5, '2017-07-03 05:22:52'),
(56, 3, 12, 4, '2017-07-03 05:22:54'),
(57, 3, 13, 5, '2017-07-03 05:22:56'),
(58, 3, 14, 4, '2017-07-03 05:22:57'),
(59, 3, 15, 4, '2017-07-03 05:22:59'),
(60, 3, 16, 4, '2017-07-03 05:23:00'),
(61, 3, 17, 4, '2017-07-03 05:23:02'),
(62, 3, 18, 4, '2017-07-03 05:23:03'),
(63, 3, 19, 5, '2017-07-03 05:23:05'),
(64, 3, 20, 4, '2017-07-03 05:23:11'),
(65, 4, 3, 2, '2021-01-06 01:03:31'),
(66, 4, 4, 4, '2017-07-03 05:23:35'),
(67, 4, 20, 4, '2017-07-03 05:23:40'),
(68, 4, 19, 4, '2017-07-03 05:23:41'),
(69, 4, 18, 5, '2017-07-03 05:23:45'),
(70, 4, 17, 3, '2017-07-03 05:23:46'),
(71, 4, 16, 4, '2017-07-03 05:23:48'),
(72, 4, 15, 4, '2017-07-03 05:23:50'),
(73, 4, 13, 4, '2017-07-03 05:23:51'),
(74, 4, 14, 5, '2017-07-03 05:23:53'),
(75, 4, 12, 3, '2017-07-03 05:23:55'),
(76, 4, 8, 4, '2017-07-03 05:23:58'),
(77, 4, 9, 4, '2017-07-03 05:24:00'),
(78, 4, 7, 4, '2017-07-03 05:24:02'),
(79, 4, 6, 5, '2017-07-03 05:24:03'),
(80, 4, 5, 4, '2017-07-03 05:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_code` bigint(50) NOT NULL,
  `p_url` varchar(300) NOT NULL,
  `p_domain_name` varchar(255) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `price` varchar(50) NOT NULL,
  `priceCurrencyCode` varchar(10) NOT NULL,
  `p_brand` varchar(255) NOT NULL,
  `p_productCategory` varchar(255) NOT NULL,
  `p_model` varchar(255) NOT NULL,
  `p_manufacturerUrl` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_cat_id` bigint(50) NOT NULL,
  `p_user_id` bigint(20) NOT NULL,
  `p_date` varchar(30) NOT NULL,
  `p_views` varchar(50) NOT NULL,
  `p_is_featured` char(1) NOT NULL DEFAULT '0',
  `p_ismain` char(1) NOT NULL,
  `p_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول المنتجات';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_code`, `p_url`, `p_domain_name`, `p_name`, `price`, `priceCurrencyCode`, `p_brand`, `p_productCategory`, `p_model`, `p_manufacturerUrl`, `p_description`, `p_cat_id`, `p_user_id`, `p_date`, `p_views`, `p_is_featured`, `p_ismain`, `p_active`) VALUES
(1, 'https://amzn.to/38QBWsL', 'AMAZON', 'Govee Led Strip Lights 32.8 Feet, for Bedroom, App Control, Works with Alexa Google Assistant', '33.99', 'usd', 'Govee', 'Electronics', 'H61421A1', '', 'Voice control: power on/off, adjust brightness or colors with either Alexa or Google Assistant.\r\n\r\nFunctional app control: support 64 scene modes, multicolor, music mode, diy and timing function.\r\n\r\nDual music mode: liven up with dynamic mode or relax in ', 1, 1, '2021-01-01 12:52:56', '0', '1', '0', '1'),
(2, 'https://amzn.to/3o75vg7', 'AMAZON', ' Charging Stand Compatible with Iphone 3 in 1 ', '22.03', 'usd', 'OLEBR', 'Todays Deals', '', '', '【PREVENT iWATCH FROM FALLING OFF】Patented silicone tray steadily holds iWatch 45 Degree with Nightstand Mode for time viewing or alarm while prevented from falling off or scratching. Fits for 40mm &amp; 44mm of iWatch Series SE /6 /5 /4, also Compatible w', 2, 1, '2021-01-01 01:07:25', '0', '1', '0', '0'),
(3, 'https://amzn.to/3rIWdcs', 'AMAZON', 'Mixer for Coffee, Mini Foamer for Cappuccino, Frappe, Matcha, Hot Chocolate', '19.95', 'usd', 'Zulay Kitchen', 'Todays Deals', '', '', 'Make Rich, Creamy Froth In Seconds: We coffee lovers are serious when it comes to our coffee. The Milk Boss Frother gives that professional finishing touch to your latte, cappuccino, macchiato or hot chocolate. Make delicious foamy creamer for your drinks', 3, 1, '2021-01-01 01:16:16', '0', '1', '0', '1'),
(4, 'https://amzn.to/2Jz1aDp', 'TO', 'Disposable Face Masks, Pack of 50 Black Face Masks', '8.49', 'usd', 'MASCOTKING', 'Todays Deals', '', '', 'Disposable Face Masks: 3-Layers Protection, the inner layer is a soft non-woven fabric, which can absorb the moisture from the breath of the wearer. The middle layer is a melt-blown polypropylene filtration layer for better filter out the particles in the', 3, 1, '2021-01-01 01:37:41', '0', '1', '0', '1'),
(5, 'https://amzn.to/352V06h', 'TO', 'GSB 18V-21 Professional is the reliable, cordless impact drill SE', '', '', 'Bosch', 'Tools', 'Amazon Edition', '', 'Bosch Professional 18V System sladdl&ouml;s kombiborrmaskin GSB 18V-21 (med 2x 2,0 Ah-batterier, 40-delars tillbeh&ouml;rssats, i L-BOXX) &ndash; Amazon Edition: Amazon.se: Home Improvement', 3, 1, '2021-01-02 12:31:54', '0', '1', '0', '1'),
(6, 'https://amzn.to/3aZ1RRJ', 'TO', '10-delars blocknyckelsats med spärrfunktion (8–19 mm, kromvanadiumstål, mjuk transportväska)', '', '', 'Bosch', 'Tools', 'Amazon Edition', '', 'Bosch Professional 10-delars blocknyckelsats med sp&auml;rrfunktion (8&ndash;19 mm, kromvanadiumst&aring;l, mjuk transportv&auml;ska): Amazon.se: Home Improvement', 3, 1, '2021-01-02 12:37:41', '0', '1', '0', '1'),
(7, 'https://amzn.to/38RBwT2', 'TO', 'HDMI splitter 1 in 2 out - Techole 4K 2-way HDMI splitter in aluminum alloy', '', '', '', '', '', '', 'HDMI splitter 1 i 2 ut &ndash; Techole 4K 2-v&auml;gs HDMI splitter i aluminiumlegering, HDMI switch Ver 1.4 HDCP f&ouml;rbikoppling, st&ouml;der 4K@30 Hz 1080P 3D f&ouml;r PS4 Xbox Sky Box Fire Stick, DVD-spelare HDTV-projektor etc.: Amazon.se: Electroni', 1, 1, '2021-01-02 12:49:50', '0', '1', '0', '1'),
(8, 'https://amzn.to/38SMszZ', 'TO', 'IOS Uppdaterade Bluetooth 5.0 tr&aring;dl&ouml;sa h&ouml;rlurar med stereomikrofonh&ouml;rlurar 2020', '', '', '', 'Electronics', '', '', '2020 Uppdaterade Bluetooth 5.0 tr&aring;dl&ouml;sa h&ouml;rlurar med stereomikrofonh&ouml;rlurar f&ouml;r iOS Android-A19: Amazon.se: Electronics', 1, 1, '2021-01-02 01:00:21', '0', '1', '0', '1'),
(9, 'https://amzn.to/2Lfzy6I', 'TO', 'NHMDE Ärmlös dunjacka för män', '', '', 'NHMDE', 'Men Style', '', '', 'NHMDE &Auml;rml&ouml;s dunjacka f&ouml;r m&auml;n, retro vinter herr polar fleece varm v&auml;st ficka mode ledig f&ouml;rtjockad v&auml;st med flera fickor stor storlek &auml;rml&ouml;s jacka enkel svart mode elegant utomhussport: https://amzn.to/2Lfzy6I', 4, 1, '2021-01-02 05:31:39', '0', '1', '0', '1'),
(10, 'https://amzn.to/2MvKein', 'TO', 'Wireless Bluetooth Headphones, Noise-Cancelling, with Alexa voice control - Black', '269', 'usd', 'Bose', 'Electronics', '', '', 'Three levels of world-class noise cancellation for better listening experience in any environment', 1, 1, '2021-01-03 03:05:53', '0', '0', '0', '1'),
(11, 'https://amzn.to/3ne8PF0', 'TO', 'Bose 789564-0010 QuietComfort 35 (Series II) Hörlurar, Svart', '', '', '', '', '', '', 'Bose 789564-0010 QuietComfort 35 (Series II) H&ouml;rlurar, Svart: Amazon.se: Electronics', 1, 1, '2021-01-03 04:15:36', '0', '0', '0', '1'),
(12, 'https://amzn.to/2KWob3Y', 'TO', 'Unisex 44MM Gen 5 Carlyle HR Heart Rate Stainless Steel and Leather Touchscreen Smart Watch, Color: Black/Brown (Model: FTW4026)', '264.99', 'usd', 'Fossil', 'Men Style', '', '', 'Smartwatches powered with Wear OS by Google work with iPhone and Android Phones. Case size: 44mm; Band size: 22mm; interchangeable with all Fossil 22mm bands', 4, 1, '2021-01-03 04:23:15', '0', '1', '0', '1'),
(13, 'https://amzn.to/3bc6d86', 'TO', 'Antminer T9 + ASIC SHA-256 10,5TH/s', '', '', '', 'Electronics', '', '', 'Last 3 product of Antminer T9 + ASIC SHA-256 10,5TH/s: Amazon.se: Electronics , BUY NOW', 1, 1, '2021-01-03 07:32:52', '0', '0', '0', '1'),
(14, 'https://www.etsy.com/listing/873146893/get-mylife-variable-hat-for-programmer?ref=shop_home_active_1&frs=1', 'ETSY', 'Get mylife variable hat for programmer unisex  variable hat | Etsy', '', '', '', 'Men Style', '', '', 'get mylife variable hat for programmer unisex. This embroidered vintage beauty has all the makings of your favorite piece of headwear thanks to its faded fabric and comfy fit. Do your future self a favor, and buy one now!  &bull; 100% brushed washed cotto', 4, 1, '2021-01-03 09:34:25', '0', '0', '0', '1'),
(15, 'https://amzn.to/3nepyYX', 'TO', 'Best PS4 Controller Charger, Controller USB Charging Station Dock for DualShock 4', '11.39', 'usd', 'BEBONCOOL', 'Electronics', '', '', 'Fast PS4 Controller Charging: 2-hour fast PS4 wireless charger double charging ports for PS4/ PS4 Slim/ PS4 Pro controllers simultaneously. No need to wait more time when charge 2 PS4 controllers. Save your time and get more fun', 1, 1, '2021-01-04 04:07:34', '0', '0', '0', '1'),
(16, 'https://amzn.to/3rWvMQy', 'TO', 'Mini Stepper with Resistance Bands', '43.78', 'usd', 'Sunny Health &amp; Fitness', 'Health and Fitness', '', '', 'TRACK YOUR FITNESS LCD monitor measures the steps time total and calories making your exercise more reasonable and effective', 5, 1, '2021-01-05 09:44:57', '0', '1', '0', '1'),
(17, 'https://amzn.to/38iHwFm', 'TO', 'Front and Rear dash wifi camera for your car', '134.99', 'usd', 'VAVA', 'Electronics', '', '', '【Dual 1080P dash cam】The front and rear camera simultaneously capture the road front (155&deg;) and rear (126&deg;) in crystal details at Dual 1920x1080p 30fps. Or single front Camera provides you with a crystal clear QHD 2560x1440p@30fps video resolution', 1, 1, '2021-01-06 12:31:21', '0', '0', '0', '1'),
(18, 'https://amzn.to/3hVaEFT', 'TO', 'PC Racing Wheel, V3II 180 Degree Universal USB Car Sim Race Steering Wheel', '99.99', 'usd', 'PXN', 'Electronics', '', '', '*-  5 IN 1 RACING WHEEL : Compatible for Xbox one/PC/PS3/PS4/Nintendo Switch;\r\n*- Manual shifting design : Simulated real driving and improve the fun of control;\r\n\r\n*-  REALISTIC &quot;COMPETITION&quot; WHEEL DESIGN: Dual-Motor feedback driving force raci', 1, 1, '2021-01-08 10:20:36', '0', '0', '0', '1'),
(19, 'https://amzn.to/2K4z0R7', 'TO', 'Aluminum Laptop Stand for Desk Silver', '29.99', 'usd', 'SOUNDANCE', 'Tools', '', '', '- Suit for any laptop 10 to 15.6 inches - The laptop stand fits all laptops 10 to 15.6 inches, such as notebooks PC computers 10 inches, 11 inches, 12 inches, 13 inches, 13.3 inches, 14 inches, 15 inches, 15.4 inches, 15.6 inches, etc.<br />\r\n<br />\r\n- Sturdy and portable - The office computer stand is totally made of thickened aluminum alloy, so the stand is sturdier and has less wobbly. The rubber on the holder hands sticks tightly and ensure your laptop stable on the stand. And the rubber feet prevent the stand from slipping on your desktop. Moreover, the stand is detachable and easy to install without tools, so the lightweight laptop stand is really portable.<br />\r\n<br />\r\nNotes: <br />\r\n<br />\r\n- Universal compatibility fits all laptop 10 to 15.6 Inches<br />\r\n- High quality with aluminium alloy design<br />\r\n- Open design provides more natural cooling air<br />\r\n- Comfortable ergonomic design for your body<br />\r\n- Underneath space to keep your keyboard<br />\r\n<br />\r\n', 3, 1, '2021-01-11 01:39:42', '0', '0', '0', '1'),
(20, 'https://amzn.to/3nD6jIH', 'TO', 'Wireless Header TicPods Free Lava - red ,  Original Japanese products', '', '', 'Mobvoi ', 'Electronics', '', '', '• Bluetooth version: Four 4. 2 /? Connection:? TicPods free: Bluetooth /? Battery cover: Micro-USB cable /? Body weight:? TicPods-free: approx. 13.5 g /? CPU: is free + charging case: approx. 63 g.<br />\r\n<br />\r\nWall control: Double Tap / Slide / Long Press /? Description IPX 5 waterproof performance / eye recognition /? Ergonomic design instructions.<br />\r\n<br />\r\n? Charging time:? Number of batteries included: approx. 18 hours playing time (maximum), TicPods free (1 charge): approx. 4 hours playing time (maximum), battery cover (charging 15 minutes): approx. 85 minutes playing time.<br />\r\n<br />\r\nAccessories for accessories:? Charging case /? Charging cable /? PVC Silicone strap /? Rubber headphone chip /? Instructions (Possibly not in German).<br />\r\n<br />\r\n<br />\r\n', 1, 1, '2021-01-12 07:50:05', '0', '0', '0', '1'),
(21, 'https://amzn.to/3szBvfp', 'TO', 'C900 Webcam FHD 1080P med mikrofon och dataskydd', '', '', 'NULAXY', 'Electronics', '', '', 'NULAXY C900 Webcam FHD 1080P med mikrofon och dataskydd, Plug & Play, laptop PC webbkamera för videostreaming, konferens, spel, kompatibel med Windows/Linux/Mac OS/Android: Amazon.se: Electronics', 1, 1, '2021-01-17 01:30:40', '0', '1', '0', '1'),
(22, 'https://amzn.to/3bRDYvV', 'TO', 'NETGEAR Wi-Fi Range Extender EX3700 - Coverage Up to 1000 Sq Ft and 15 Devices with AC750 Dual Band Wireless Signal Booster &amp; Repeater (Up to 750Mbps Speed), and Compact Wall Plug Design', '29.99', '', 'NETGEAR', 'Electronics', '', '', 'Extended wireless coverage: Adds WiFi range coverage up to 1000 square feet, and connects up to 15 devices such as laptops, smartphones, speakers, IP cameras, tablets, IoT devices, and more', 1, 1, '2021-01-17 05:47:34', '0', '1', '0', '1'),
(23, 'https://amzn.to/3nTyF1w', 'TO', 'Soffe Womens Dance Tee', '28', 'usd', 'Soffe', 'Woman Fashion', '', '', 'Boat neckline', 6, 1, '2021-01-17 06:16:42', '0', '1', '0', '1'),
(24, 'https://amzn.to/2Lx2o3f', 'TO', 'Nicewell Food Scale, 22lb Digital Kitchen Scale Weight Grams and oz for Cooking Baking, 1g/0.1oz Precise Graduation, Stainless Steel and Tempered Glass', '29.99', 'usd', 'Nicewell', 'kitchen tools', '', '', '【PRECISE WEIGHT】 The digital food scale with built-in four high-precision load sensors, quick and accurate 0.1oz/1g increments when adding ingredients, measuring range: 0.1oz to 22 lbs (2g/3g to 10kg).', 7, 2, '2021-01-17 07:29:38', '0', '1', '0', '1'),
(25, 'https://amzn.to/3ipSEUu', 'TO', 'Nicewell Food Scale, 22lb Digital Kitchen Scale Weight Grams and oz for Cooking Baking, 1g/0.1oz Precise Graduation, Stainless Steel and Tempered Glass', '29.99', 'usd', 'Nicewell', 'Electronics', '', '', '【PRECISE WEIGHT】 The digital food scale with built-in four high-precision load sensors, quick and accurate 0.1oz/1g increments when adding ingredients, measuring range: 0.1oz to 22 lbs (2g/3g to 10kg).', 1, 1, '2021-01-17 08:48:34', '0', '1', '0', '1'),
(26, 'https://amzn.to/39CV3ao', 'TO', 'Nicewell Food Scale, High Accurate Digital Kitchen Scale with Pastry Mat, Scale Measures in Grams and Ounces 6kg 13lbs Max , with Premium Stainless Steel Platform and Large Backlit Display', '21.95', '', 'Nicewell', '', '', '', '【ACCURATE AND PRECISE】 The digital food scale features instant and accurate response, gives accurate and statle results in 5 units: gram(g), ounce(oz), pound(lb), milliliter(ml), pound:ounce(lb:oz), with 1g/ 0.04oz division, weighs from 1g to 6kg, 0.04oz to 13lbs.', 1, 1, '2021-01-17 08:56:45', '0', '1', '0', '1'),
(27, 'https://amzn.to/3nTyF1w', 'TO', 'Soffe Womens Dance Tee', '20', 'usd', 'Soffe', 'Woman Fashion', '', '', 'Boat neckline', 7, 2, '2021-01-17 09:01:56', '0', '1', '1', '0'),
(28, 'https://amzn.to/2XThAdk', 'TO', 'Bitcoin USB Stick Miner GekkoScience NewPac / 22 till 45 GH/s', '', '', 'Bitshopper ', 'Electronics', '', '', 'Bitshopper Bitcoin USB Stick Miner GekkoScience NewPac / 22 till 45 GH/s: Amazon.se: Electronics', 1, 1, '2021-01-18 11:48:16', '0', '1', '0', '0'),
(29, 'https://www.etsy.com/listing/872899365/new-york-cotton-sweetshirt-silver-and?ref=shop_home_active_3&frs=1', 'ETSY', 'New york cotton sweetshirt silver and white for women | Etsy', '38', 'usd', '', 'Tshirts', '', '', 'New york cotton sweetshirt silver and white for women. Be stylesh with NY sweetshirt.    A sturdy and warm sweatshirt bound to keep you warm in the colder months. A pre-shrunk, classic fit sweater thats made with air-jet spun yarn for a soft feel and reduced pilling.    <br /><br />\r\n<br /><br />\r\n• 50% cotton, 50% polyester ', 8, 1, '2021-01-18 11:58:38', '0', '1', '0', '1'),
(30, 'https://amzn.to/3p3Lnfn', 'TO', 'Mini Portable Massage Gun for Pain Relief', '69.99', 'usd', 'RIONEO', 'Electronics', '', '', 'Electric Compact Deep Tissue Percussion Muscle Massager Drill with 4 Massage Heads and 4 Levels for Gym Office Home Travel<br /><br />\r\n<br /><br />\r\nExtremely Portable & Compact: With this comforting tech innovation, peace has easily found its place right inside your pocket. This is a pint-sized massager gun with a motor of 70W. Thanks to the compact design, you can carry it anywhere at any time without making some additional efforts. The size of the gun is the same as your beloved smartphone, however, the only difference is that it keeps you relaxed. You can easily use it on your muscles and gain absolute relief.<br />\r\n<br />\r\nFor sweden country get yours here:  https://amzn.to/3itrdJr', 1, 1, '2021-01-20 11:09:03', '0', '1', '0', '1'),
(31, 'https://www.amazon.com/gp/product/B003UFFRK0/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B003UFFRK0&linkCode=as2&tag=supersnaps20a-20&linkId=f4edc4079e1095f2d2d01ab071a456f2', 'AMAZON', 'Festina Mens Stainless Steel', '196', 'usd', 'Festina', 'Men Style', '', '', 'White Dial Black Strap Chronograph Watch F16489/1<br /><br />\r\nBlack Leather strap', 4, 1, '2021-01-21 08:32:02', '0', '1', '0', '1'),
(32, 'https://amzn.to/39c0Y7n', 'TO', 'Litecoin Scrypt USB-Stick Miner Futurebit Moonlander', '', '', 'bitshopper ', 'Electronics', '', '', 'Litecoin Scrypt USB-Stick Miner bitshopper Futurebit Moonlander 2 (3-5 MH/s): Amazon.se: Electronics', 1, 1, '2021-01-22 06:07:45', '0', '1', '0', '1'),
(33, 'https://amzn.to/3oeRCMn', 'TO', 'Indoor Cycling Bike Stationary - Exercise Bike for Home Gym', '', '', 'YOSUDA', 'Health and Fitness', '', '', '【YOSUDA】Design and produce exercise machines for 20 years. YOSUDA stationary bike has served more than 1,000,000 families. We are so confident that YOSUDA exercise bike can be your fitness partner.<br /><br />\r\n<br /><br />\r\n【2020 Updated Stationary Bike】The current version adopts thickened frame tube, overcomes the unsteady defects of most of spin bikes in the market. Solid <br /><br />\r\n   build, weight capacity 330LBS, give you a safe riding.<br /><br />\r\n', 5, 1, '2021-01-24 07:55:12', '0', '1', '0', '1'),
(34, 'https://amzn.to/3c5yZYK', 'TO', 'En bra trimmer kit för män hår detalj rakapparat Svart', '', '', 'iFCOW', '', 'Tools', '', 'iFCOW elektriska hårklippare för män 4-i-1 laddningsbar trimmer trimmer kit för män hår detalj rakapparat Svart: Amazon.se: Baby', 3, 1, '2021-01-26 12:20:51', '0', '1', '0', '1'),
(35, 'https://amzn.to/3okcvpl', 'TO', 'Hair Dryer And Volumizer ', '', '', 'REVLON', 'Electronics', '', '', '-Delivers gorgeous volume and brilliant shine in a single step<br />\r\n<br />\r\n-Unique oval brush design for smoothing the hair, while the round edges create volume. Designed with Nylon Pin & Tufted Bristles for detangling, improved volume and control. Unlike conventional hair dryers, this volumizer can be placed closer to the scalp for lift<br />\r\n<br />\r\n-3 Heat/Speed Settings + Cool option for styling flexibility. 1100-Watt power<br />\r\n<br />\r\n-Safety First: The Revlon One Step Hair Dryer and Volumizer meets U.S. safety requirements and features the ETL Certification seal (look for the ‘test’ button on the plug which is required for all hair dryers in the U.S.), Unit is designed for 120 Volt USA outlets Only. Do not use a voltage converter as it will damage the Unit. --<br />\r\n<br />\r\n-Note that wattage of this appliance may vary depending on the location of use.<br />\r\nPackaging may vary due to continuous product improvements<br />\r\n', 1, 1, '2021-01-26 04:46:47', '0', '1', '0', '1'),
(36, 'https://amzn.to/36flcLs', 'TO', 'Electric Coffee Grinder for Beans', '18.07', 'usd', 'Hamilton Beach', 'Electronics', '', '', '-Quieter than competitors: Whether it’s early morning or late at night, you can make fresh grounds without making too much noise.<br />\r\n-Removable grinding chamber: The grinding chamber removes for easy filling of whole beans or spices once finished, remove the chamber for easy cleaning.<br />\r\n-Make up to 12 cups of coffee: You can grind up to 9 tablespoons of beans, enough for 12 cups of coffee. Wipe the base with a damp cloth.<br />\r\n', 1, 1, '2021-01-26 05:03:18', '0', '1', '0', '1'),
(37, 'https://www.banggood.com/custlink/KvGhZZdDun', 'BANGGOOD', 'MT108T Square Wave Output True RMS NCV Temperature Tester', '21.99', 'usd', 'MUSTOOL', 'Tools', '', '', 'For all electronics fixers get your tool now to fix all electrical motherboards or ships.<br /><br />\r\nOnly US$21.99, buy best mustool mt108t square wave output true rms ncv temperature tester digital multimeter 6000 counts backlight sale online store at wholesale price.<br /><br />\r\n<br /><br />\r\n- Digital Multimeter 6000 Counts Backlight', 3, 1, '2021-01-26 07:49:28', '0', '1', '0', '1'),
(38, 'https://www.banggood.com/custlink/GvDh8IyR2H', 'BANGGOOD', 'Note 9S Global Version 6.67 inch 48MP Quad Camera 6GB 128GB Smartphone', '209.00', 'usd', 'Xiaomi', 'Electronics', '', '', 'Only US$209.00, buy best xiaomi redmi note 9s global version 6.67 inch 48mp quad camera 6gb 128gb 5020mah snapdragon 720g octa core 4g smartphone sale online store at wholesale price.', 1, 1, '2021-01-26 09:27:08', '0', '1', '0', '1'),
(39, 'https://www.banggood.com/custlink/vv3h9iyrK7', 'BANGGOOD', 'Zipper Front Hooded Sweaters With Pocket for men', '34.99', 'usd', 'Zipper ', 'Men Style', '', '', 'Only US$34.99, shop mens letter pattern zipper front hooded sweaters with pocket at Banggood.com. Buy fashion sweaters online.', 4, 1, '2021-01-26 10:04:05', '0', '1', '0', '1'),
(40, 'https://amzn.to/3opLa50', 'TO', 'Original Espresso Machine - White', '174.99', 'usd', 'Nestle Nespresso', 'Electronics', '', '', 'HIGH PERFORMANCE: The 19 bar pump system offers barista-style single-serve Coffee or Espresso every time, perfectly extracting the delicate flavor of each Nespresso original coffee capsule', 1, 1, '2021-01-27 07:21:28', '0', '1', '1', '1'),
(41, 'https://www.banggood.com/FIMI-X8-SE-2020-8KM-FPV-With-3-axis-Gimbal-4K-Camera-HDR-Video-GPS-35mins-Flight-Time-RC-Quadcopter-RTF-One-Battery-Version-p-1658676.html?p=4Y100136772411202012&custlinkid=1442254&cur_warehouse=CZ&ID=6288101', 'BANGGOOD', 'Gimbal 4K Camera HDR Video GPS 35mins Flight Time RC Quadcopter', '470.99', 'usd', 'FIMI', 'Electronics', '', '', 'Only US$470.99, buy best fimi x8 se 2020 8km fpv with 3-axis gimbal 4k camera hdr video gps 35mins flight time rc quadcopter rtf one battery version sale online store at wholesale price.<br /><br /><br /><br /><br />\r\n<br /><br /><br /><br /><br />\r\n', 7, 2, '2021-01-27 05:17:30', '0', '1', '0', '1'),
(42, 'https://www.banggood.com/Xiaomi-Mijia-Mini-USB-Lint-Remover-0_35mm-Micro-Arc-Shaving-Mesh-Fuzz-Trimmer-1300mAh-Electric-Clothes-Sweater-Fabric-Shaver--p-1582133.html?p=4Y100136772411202012&custlinkid=1442282', 'BANGGOOD', 'Mini USB Lint Remover 0.35mm Micro', '12.59', 'usd', 'Xiaomi', 'Electronics', '', '', 'Only US$12.59, shop xiaomi mijia mini usb lint remover 0.35mm micro arc shaving mesh fuzz trimmer 1300mah electric clothes sweater fabric shaver at Banggood.com. Buy fashion nose & ear trimmer online.', 1, 1, '2021-01-27 05:59:00', '0', '1', '0', '1'),
(43, 'https://www.banggood.com/custlink/vGKdZir9Im', 'BANGGOOD', 'Women Casual Elastic Waist Drawstring Side Pockets Pants', '14.99', 'usd', '', 'Woman Fashion', '', '', 'Only US$14.99, shop women casual elastic waist drawstring side pockets pants at Banggood.com. Buy fashion pants online.', 6, 1, '2021-01-27 08:28:50', '0', '1', '0', '1'),
(44, 'https://amzn.to/3abbmvi', 'TO', '2TB External Hard Drive Portable HDD', '62.99', 'usd', 'Seagate', 'Computer and Accessories', '', '', '- Easily store and access 2TB to content on the go with the Seagate Portable Drive, a USB external hard drive<br /><br /><br />\r\n- Designed to work with Windows or Mac computers, this external hard drive makes backup a snap just drag and drop<br /><br /><br />\r\n- To get set up, connect the portable hard drive to a computer for automatic recognition no software required<br /><br /><br />\r\n- This USB drive provides plug and play simplicity with the included 18 inch USB 3.0 cable<br /><br /><br />\r\n- Enjoy long-term peace of mind with the included one-year limited warranty and one-year rescue data recovery services<br /><br /><br />\r\n<br /><br /><br />\r\n', 9, 1, '2021-01-27 08:44:36', '0', '1', '0', '1'),
(45, 'https://amzn.to/3ptptTc', 'TO', 'Ultra Thin Light Ultrabook Laptop', '1349.99', 'usd', 'Shoxlab', 'Computer and Accessories', '', '', '- 10th Gen Intel Core i7-1065G7 Processor (1.30GHz, Turbo up to 3.90GHz) and Intel Iris Plus Graphics<br />\r\n- 16GB DDR4 3200MHz RAM Drives: 512GB NVMe M.2 Solid State Drive No Optical Drive<br />\r\n- 17  WQXGA (2560 x 1600) IPS Display, Integrated HD Webcam Intel Wi-Fi 6 AX201 WLAN 2x2 + Bluetooth 5.0 Audio 2x 1.5W Stereo Speakers, Backlit Keyboard Fingerprint ID<br />\r\n- 1x USB 3.1 Type-C 3x USB 3.1 1x HDMI 1x Headphone-out 1x RJ-45 1x Micro SD<br />\r\n- Windows 10 Home Up to 17 hours battery life Ultra-light weight (less than 3 lbs) bundled with Shoxlab MousePad<br />\r\n', 9, 1, '2021-01-27 09:21:43', '0', '1', '0', '1'),
(46, 'https://www.banggood.com/LIVEN-G-6-Air-Fryer-2_8L-Large-Capacity-1400W-Electric-Hot-Air-Fryers-Oven-Oilless-Cooker-LED-Digital-Touchscreen-360-Cycle-Heating-Nonstick-Basket-p-1723382.html?cur_warehouse=CN&p=4Y100136772411202012&custlinkid=1443869', 'BANGGOOD', 'Electric Hot Air Fryers Oven Oilless Cooker LED Digital Touchscreen', '145.99', 'usd', 'LIVEN ', 'Electronics', '', '', 'Main Features:<br />\r\n<br />\r\n●Healthy Frying: achieve perfect fried results with little or even no oil, fried finish using at least 98% less oil than traditional fryers.<br />\r\n<br />\r\n● Always Crispy: perfect crisp system， make food crispy on the outside and moist and tender on the inside.<br />\r\n<br />\r\n● Easy to Use: with accessible buttons and easy cooking set up.<br />\r\n<br />\r\n● Easy to clean: removable fryer basket use non-stick coating, easy to clean. fry basket and fry pot can be washed in the dishwasher.<br />\r\n<br />\r\n● Great Gift: a perfect healthy gift for your lovers. It can make same deliciously crunchy taste of fried food.<br />\r\n<br />\r\n● Touch Control: LCD display with digital controls to adjust time and temperature settings.<br />\r\n<br />\r\n', 1, 1, '2021-01-28 09:46:57', '0', '1', '0', '1'),
(47, 'https://www.banggood.com/custlink/DmGhZ8HU1a', 'BANGGOOD', 'Full Touch Curved Screen bluetooth  Smart Watch', '39.99', 'usd', '', 'Men Style', '', '', 'Only US$39.99, buy best [30 days standby]zeblaze gtr 1.3\' full touch curved screen bluetooth 5.1 heart rate blood pressure monitor female cycle tracker smart watch sale online store at wholesale price.', 4, 1, '2021-01-28 09:53:57', '0', '1', '0', '1'),
(48, 'https://www.amazon.com/COOFANDY-Casual-Lightweight-Business-Jackets/dp/B07YFZVLXR/ref=as_li_ss_tl?crid=1UOSGGUX52GR0&dchild=1&keywords=casual+men+outfits+for+wedding&qid=1608685112&sprefix=casual+man+outfit,aps,287&sr=8-6&th=1&linkCode=sl1&tag=supersnaps20a-20&linkId=78ad8adef8e2ce6809b152df019bea11', 'AMAZON', 'Sportcoat Jacket Slim for men', '62.99', 'usd', 'COOFANDY', 'Men Style', '', '', 'MATERIAL --- Polyester&Cotton; Dry Clean Only(Recommended); Hand washes max temperature 40°C, Do not bleach, Iron max 110°C.', 4, 1, '2021-01-29 09:25:27', '0', '1', '0', '1'),
(49, 'https://amzn.to/3prj7Ua', 'TO', 'Best Fruit and Vegetable Juicer', '399.95', 'usd', 'Omega', 'Electronics', '', '', 'INDUSTRY LEADING 15-YEAR Coverage on parts and performance<br />\r\nHIGH YIELD Dual-edge auger with tighter fit tolerance strains more juice and breaks down fiber to a palatable level for a smoother nutrient dense juice<br />\r\n', 1, 1, '2021-01-29 04:06:20', '0', '1', '0', '1'),
(50, 'https://www.banggood.com/custlink/v3DEIIO9tn', 'BANGGOOD', 'Original Amazfit  AMOLED IP68 bluetooth ,Calling and GPS  Smart Watch', '146.99', 'usd', '', 'Men Style', '', '', 'Only US$146.99, buy best original amazfit verge international version amoled ip68 bluetooth calling gps+glonass smart watch sale online store at wholesale price.', 4, 1, '2021-01-29 05:13:38', '0', '1', '0', '1'),
(51, 'https://www.banggood.com/custlink/GKmdSSgZYQ', 'BANGGOOD', 'Computer Bag Anti Theft Travel with USB Charging for unisex ', '90.81', 'usd', 'KINGSONS ', 'Tools', '', '', 'Only US$90.81, shop kingsons men women 13/15/17 inches computer bag anti theft travel backpack with usb charging port at Banggood.com. Buy fashion backpacks online.', 3, 1, '2021-01-30 03:57:37', '0', '1', '0', '1'),
(52, 'https://www.banggood.com/custlink/GKDEZZ0oqD', 'BANGGOOD', 'Portable Car Jump Starter 1300A 16000mAh Powerbank Emergency ', '63.99', 'usd', 'iMars ', 'Tools', '', '', 'Only US$63.99, buy best imars j02 portable car jump starter 1300a 16000mah powerbank emergency battery booster with led flashlight usb port sale online store at wholesale price.', 3, 1, '2021-01-30 07:33:44', '0', '1', '0', '1'),
(53, 'https://amzn.to/2Mig7v3', 'TO', 'original RayBan Sunglasses For Women ', '190.00', 'usd', 'Ray-Ban', 'Woman Fashion', '', '', 'This is an icon new model that is relaunching the vintage Ray-Ban style. The Nina Is a frame that can go from downtown to being center Stage. This frame has attitude and edge.<br />\r\n', 6, 1, '2021-01-31 12:34:56', '0', '1', '0', '1'),
(54, 'https://amzn.to/39yWlnR', 'TO', 'Bella Plush Girls Jacket', '44', 'usd', 'Columbia', 'Woman Fashion', '', '', '- 100% Polyester<br />\r\n- Imported<br />\r\n- Zipper closure<br />\r\n- Machine Wash<br />\r\n- COZY WINTER JACKET: The Columbia Girl’s Bella Plush Winter Jacket is a soft fleece lined gem, wrapped in our Microtex Lite II Taffeta shell. This cozy coat will provide <br />\r\n     her comfort and warmth on many winter days, not to mention spring and fall.<br />\r\n- ULTIMATE COMFORT: With a super smooth quilted taffeta shell, this insulated and fleece lined coat is designed to wrap her in ultimate comfort during cold winter <br />\r\n    days.<br />\r\n- CLASSIC FIT: A modern cut for active girls, this super functional jacket will feel comfortable during any outdoor events and activities.<br />\r\n', 6, 1, '2021-01-31 01:30:19', '0', '1', '0', '1'),
(55, 'https://amzn.to/2MlnQIL', 'TO', 'Adjustable Strength Training Bench for Full Body ', '168.99', 'usd', 'FLYBIRD', 'Health and Fitness', '', '', 'The product has 11K rating on amazon .<br />\r\n<br />\r\n【620 Lbs Weight Capacity】Designed a unique frame with triangular structure and made of heavy-duty commercial quality steel, which is very sturdy and durable. All this is especially important in your workout.', 5, 1, '2021-01-31 07:10:55', '0', '1', '0', '1'),
(56, 'https://amzn.to/36zdv2W', 'TO', 'Floor ONE S3 Smart Cordless Wet Dry Vacuum Cleaner', '469.95', 'usd', 'Tineco ', 'Home and Kitchen', '', '', 'Tineco Floor ONE S3 Smart Cordless Wet Dry Vacuum Cleaner, Lightweight & Powerful Multi-Surface Hard Floor Cleaning: Amazon.ca: Home & Kitchen', 3, 1, '2021-02-01 02:27:36', '0', '1', '0', '1'),
(57, 'https://www.banggood.com/custlink/DG3R8j3FAD', 'BANGGOOD', 'Fashion Cartoon Cat Mask Printing Short Sleeve O-Neck T-shirts', '16.99', 'usd', '', '', '', '', 'Only US$16.99, shop fashion cartoon cat mask printing short sleeve o-neck t-shirts at Banggood.com. Buy fashion t-shirts online.', 8, 1, '2021-02-02 05:36:54', '0', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products_rate`
--

CREATE TABLE `products_rate` (
  `pr_code` bigint(20) NOT NULL,
  `pr_u_code` bigint(20) NOT NULL,
  `pr_p_code` bigint(20) NOT NULL,
  `pr_rate` int(11) NOT NULL,
  `pr_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pr_country` varchar(100) NOT NULL,
  `pr_country_code` varchar(50) NOT NULL,
  `pr_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_rate`
--

INSERT INTO `products_rate` (`pr_code`, `pr_u_code`, `pr_p_code`, `pr_rate`, `pr_date`, `pr_country`, `pr_country_code`, `pr_address`) VALUES
(1, 1, 8, 5, '2021-01-07 21:14:46', '', '', ''),
(2, 1, 7, 3, '2021-01-07 21:14:46', '', '', ''),
(3, 1, 31, 2, '2021-01-21 10:48:33', '', '', ''),
(4, 1, 16, 3, '2021-01-21 19:00:34', 'Sweden', 'SE', 'Sweden'),
(5, 1, 32, 4, '2021-01-24 14:16:15', 'Sweden', 'SE', 'Sweden'),
(6, 1, 29, 5, '2021-01-24 16:43:05', 'Sweden', 'SE', 'Ankarsvik, V&auml;sternorrland County, Sweden'),
(7, 1, 33, 3, '2021-01-25 10:27:11', 'Sweden', 'SE', 'Stockholm, Stockholm County, Sweden'),
(8, 1, 11, 3, '2021-01-25 20:58:17', 'Sweden', 'SE', 'Ankarsvik, V&auml;sternorrland County, Sweden'),
(9, 1, 40, 2, '2021-01-27 07:26:34', 'Sweden', 'SE', 'Stockholm, Stockholm County, Sweden'),
(10, 1, 39, 2, '2021-01-27 17:44:28', 'Sweden', 'SE', 'Stockholm, Stockholm County, Sweden'),
(11, 1, 50, 3, '2021-01-29 19:10:34', 'Sweden', 'SE', 'Stockholm, Stockholm County, Sweden'),
(12, 1, 53, 3, '2021-01-31 00:42:52', 'Sweden', 'SE', 'Stockholm, Stockholm County, Sweden'),
(13, 1, 38, 4, '2021-03-20 19:44:11', 'Sweden', 'SE', 'Ankarsvik, V&auml;sternorrland County, Sweden');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_code` bigint(20) NOT NULL,
  `s_title` varchar(255) NOT NULL,
  `s_u_code` bigint(20) NOT NULL,
  `s_keyword` varchar(500) NOT NULL,
  `s_desc` varchar(500) NOT NULL,
  `s_background_color` varchar(255) NOT NULL,
  `s_font_color` varchar(255) NOT NULL,
  `s_btn_color` varchar(255) NOT NULL,
  `s_labels_color` varchar(255) NOT NULL,
  `s_slider_btn_color` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_whatsapp_link` varchar(255) NOT NULL,
  `s_twitter_link` varchar(255) NOT NULL,
  `s_fb_link` varchar(255) NOT NULL,
  `s_fbmessanger_link` varchar(255) NOT NULL,
  `s_pinterest` varchar(255) NOT NULL,
  `s_instagram` varchar(255) NOT NULL,
  `s_opentime` varchar(50) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_latitude` varchar(255) NOT NULL,
  `s_longitude` varchar(255) NOT NULL,
  `s_contact_phone` varchar(30) NOT NULL,
  `s_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول الاعدادات';

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_code`, `s_title`, `s_u_code`, `s_keyword`, `s_desc`, `s_background_color`, `s_font_color`, `s_btn_color`, `s_labels_color`, `s_slider_btn_color`, `s_email`, `s_whatsapp_link`, `s_twitter_link`, `s_fb_link`, `s_fbmessanger_link`, `s_pinterest`, `s_instagram`, `s_opentime`, `s_address`, `s_latitude`, `s_longitude`, `s_contact_phone`, `s_logo`) VALUES
(1, 'BestGadgets', 1, 'Affiliate markets , shop online , products,online shopping , fitness ,electronics , men style , woman style', 'Best gadgets is the online store offer all types of products from the strongest big stores like amazon , shein , etsy ... etc', '', '', '', '', '', 'bestgadgets.51@gmail.com', '+46727753891', 'https://twitter.com/BestGadgets8', 'https://www.facebook.com/BestGadgets.51', 'https://www.messenger.com/t/102062688496260', 'https://www.pinterest.com/bestgadgets53', 'https://www.instagram.com/bestgadgets.3/', 'Open Always', '', '63.289797', '18.717666', '0727753891', 'https://youbestgadgets.com/uploads/569822.png'),
(2, 'Shedad Abubakar', 11, 'Shedad Abubakar', 'Shedad Abubakar', '', '', '', '', '', 'abubaker.shedad@gmail.com', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'tala naji', 12, 'tala naji', 'tala naji', '', '', '', '', '', 'talanaji@gmail.com', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Nicklaus Connelly', 13, 'Nicklaus Connelly', 'Nicklaus Connelly', '', '', '', '', '', 'ozdal.turp@advantech.nl', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'ADMI', 2, 'Kontol', 'Sekar', '#00e7ff', '', '', '', '', '', '', '', '', '', '', '', '', '', '14.593999', '120.99426', '', 'https://youbestgadgets.com/uploads/687045.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_code` int(11) NOT NULL,
  `u_IP` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_country` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_sex` char(10) CHARACTER SET latin1 NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_username` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_type` char(10) NOT NULL,
  `u_birthday` varchar(30) CHARACTER SET latin1 NOT NULL,
  `u_mobile` varchar(255) NOT NULL,
  `u_scr_priv` varchar(255) NOT NULL DEFAULT 'all',
  `u_btn_priv` varchar(255) DEFAULT 'all',
  `u_reffer_from` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_enterdate` datetime NOT NULL DEFAULT current_timestamp(),
  `u_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_code`, `u_IP`, `u_country`, `u_fname`, `u_sex`, `u_email`, `u_username`, `u_password`, `u_type`, `u_birthday`, `u_mobile`, `u_scr_priv`, `u_btn_priv`, `u_reffer_from`, `u_enterdate`, `u_active`) VALUES
(1, '0', '', 'Muhammed ismail', 'Male', 'Super@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1984-08-16', 'Gaza2015', 'all', 'all', '', '2021-01-13 21:29:03', '1'),
(2, '0', '', 'Muhammed ismail', 'Female', 'Super2005@admin.com', 'gitnet', 'd0970714757783e6cf17b26fb8e2298f', 'user', '1984-08-16', 'Gaza2015', 'all', 'all', '', '2021-01-13 21:29:03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `ven_code` int(20) NOT NULL,
  `ven_name` varchar(255) NOT NULL,
  `ven_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='جدول الموردين';

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ven_code`, `ven_name`, `ven_active`) VALUES
(1, 'Amazon', '1'),
(2, 'banggood', '1'),
(3, 'Shein', '1'),
(4, 'aliexpress', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_code`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_code`);

--
-- Indexes for table `maillist`
--
ALTER TABLE `maillist`
  ADD PRIMARY KEY (`m_code`);

--
-- Indexes for table `Pages`
--
ALTER TABLE `Pages`
  ADD PRIMARY KEY (`pa_code`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`ph_code`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_code`);

--
-- Indexes for table `products_rate`
--
ALTER TABLE `products_rate`
  ADD PRIMARY KEY (`pr_code`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_code`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ven_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_code` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `maillist`
--
ALTER TABLE `maillist`
  MODIFY `m_code` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pages`
--
ALTER TABLE `Pages`
  MODIFY `pa_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `ph_code` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_code` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products_rate`
--
ALTER TABLE `products_rate`
  MODIFY `pr_code` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_code` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ven_code` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
