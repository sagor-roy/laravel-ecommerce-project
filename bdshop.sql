-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 07:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `slug`, `brand_code`, `created_at`, `updated_at`) VALUES
(16, 'samsung', 'samsung', '021af5077b', '2021-02-11 10:13:37', '2021-02-11 10:36:36'),
(17, 'nokia', 'nokia', '5f91c6be51', '2021-02-11 10:13:46', '2021-02-11 10:13:46'),
(18, 'xiaomi', 'xiaomi', '35ef99a113', '2021-02-11 10:14:20', '2021-02-11 10:14:20'),
(19, 'realme', 'realme', '932417ad70', '2021-02-11 10:14:45', '2021-02-11 10:14:45'),
(20, 'huwaei', 'huwaei', 'cb05ec76a7', '2021-02-11 10:14:54', '2021-02-11 10:14:54'),
(21, 'sony', 'sony', 'd587fde99a', '2021-02-11 10:15:12', '2021-02-11 10:15:12'),
(22, 'symphony', 'symphony', 'aca77ee382', '2021-02-11 10:15:27', '2021-02-11 10:15:27'),
(23, 'apple', 'apple', 'c0710c10c7', '2021-02-11 10:15:52', '2021-02-11 10:15:52'),
(24, 'oppo', 'oppo', 'eaa81dd336', '2021-02-11 10:18:25', '2021-02-11 10:18:25'),
(25, 'walton', 'walton', '0145f7354f', '2021-02-11 10:18:33', '2021-02-11 10:18:33'),
(26, 'vivo', 'vivo', '91e38f3561', '2021-02-11 10:19:48', '2021-02-11 10:19:48'),
(27, 'asus laptpp', 'asus-laptpp', '1ff02961be', '2021-02-11 10:22:56', '2021-02-11 10:22:56'),
(28, 'microsoft laptop', 'microsoft-laptop', '9947357773', '2021-02-11 10:23:12', '2021-02-11 10:23:12'),
(29, 'hp laptop', 'hp-laptop', 'd895840359', '2021-02-11 10:23:21', '2021-02-11 10:23:21'),
(30, 'dell laptop', 'dell-laptop', '63689931a8', '2021-02-11 10:23:31', '2021-02-11 10:23:31'),
(31, 'lenevo laptop', 'lenevo-laptop', '85fca8d48c', '2021-02-11 10:23:42', '2021-02-11 10:23:42'),
(32, 'apple laptop', 'apple-laptop', '071ed4c1a6', '2021-02-11 10:24:16', '2021-02-11 10:24:16'),
(33, 'gigabyte laptop', 'gigabyte-laptop', '8622f5c69a', '2021-02-11 10:24:54', '2021-02-11 10:24:54'),
(34, 'walton laptop', 'walton-laptop', '9eed8085c6', '2021-02-11 10:25:01', '2021-02-11 10:25:01'),
(35, 'xiaomi laptop', 'xiaomi-laptop', '6780c76795', '2021-02-11 10:25:50', '2021-02-11 10:25:50'),
(36, 'acer laptop', 'acer-laptop', '899da27656', '2021-02-11 10:25:57', '2021-02-11 10:25:57'),
(37, 'acer desktop', 'acer-desktop', 'd47f7a522e', '2021-02-11 10:27:48', '2021-02-11 10:27:48'),
(38, 'xiaomi desktop', 'xiaomi-desktop', 'fd63acba69', '2021-02-11 10:28:03', '2021-02-11 10:28:03'),
(39, 'walton desktop', 'walton-desktop', 'f9c0161158', '2021-02-11 10:28:15', '2021-02-11 10:28:15'),
(40, 'gigabyte desktop', 'gigabyte-desktop', '4c1b366c7a', '2021-02-11 10:28:27', '2021-02-11 10:28:27'),
(41, 'apple desktop', 'apple-desktop', 'f9e4a925b2', '2021-02-11 10:28:39', '2021-02-11 10:28:39'),
(42, 'microsoft desktop', 'microsoft-desktop', 'bc274a474c', '2021-02-11 10:28:54', '2021-02-11 10:28:54'),
(43, 'asus desktop', 'asus-desktop', '2d197ffec5', '2021-02-11 10:29:18', '2021-02-11 10:29:18'),
(44, 'dell desktop', 'dell-desktop', 'de87bd0bde', '2021-02-11 10:29:25', '2021-02-11 10:29:25'),
(45, 'hp desktop', 'hp-desktop', 'c7844eefb1', '2021-02-11 10:29:32', '2021-02-11 10:29:32'),
(46, 'bata shoes', 'bata-shoes', 'd9cdeeca23', '2021-02-11 10:35:19', '2021-02-11 10:35:54'),
(47, 'nike shoes', 'nike-shoes', '3a96649230', '2021-02-11 10:35:43', '2021-02-11 10:35:43'),
(48, 'pegasus shoes', 'pegasus-shoes', 'ce4622c08f', '2021-02-11 10:36:51', '2021-02-11 10:36:58'),
(49, 'apex shoes', 'apex-shoes', '0fc5a20224', '2021-02-11 10:37:07', '2021-02-11 10:37:07'),
(50, 'classic shoes', 'classic-shoes', 'db4697861c', '2021-02-11 10:38:01', '2021-02-11 10:38:01'),
(51, 'loafers for man', 'loafers-for-man', 'b798928b59', '2021-02-11 10:38:08', '2021-02-11 10:40:33'),
(52, 'ladies shoes', 'ladies-shoes', '705fcfb293', '2021-02-11 10:38:17', '2021-02-11 10:38:17'),
(53, 'ladies hil', 'ladies-hil', '01bf678700', '2021-02-11 10:38:27', '2021-02-11 10:38:27'),
(54, 'leather slip loafer', 'leather-slip-loafer', '12a5d02fe5', '2021-02-11 10:41:49', '2021-02-11 10:41:49'),
(55, 'adidas shoes', 'adidas-shoes', '9090e9b7a6', '2021-02-11 10:43:58', '2021-02-11 10:43:58'),
(56, 'hand bag', 'hand-bag', 'c9c5c0d89a', '2021-02-11 10:44:08', '2021-02-11 10:44:08'),
(57, 'college bag', 'college-bag', 'f1b7d182ea', '2021-02-11 10:44:17', '2021-02-11 10:44:17'),
(58, 'office bag', 'office-bag', '2cd45737ef', '2021-02-11 10:44:25', '2021-02-11 10:44:25'),
(59, 'laptop bag', 'laptop-bag', '57a7e9656d', '2021-02-11 10:44:32', '2021-02-11 10:44:32'),
(60, 'shoulder bag', 'shoulder-bag', 'b9b785fe20', '2021-02-11 10:44:59', '2021-02-11 10:44:59'),
(61, 'travel bag', 'travel-bag', '36eea68262', '2021-02-11 10:45:05', '2021-02-11 10:45:05'),
(62, 'trolly bag', 'trolly-bag', '35272ebc50', '2021-02-11 10:45:22', '2021-02-11 10:45:22'),
(63, 'leather bag', 'leather-bag', '90d05cc542', '2021-02-11 10:45:54', '2021-02-11 10:45:54'),
(64, 'ladies bag', 'ladies-bag', '1856ed7a88', '2021-02-11 10:46:03', '2021-02-11 10:46:03'),
(65, 'ladies shoulder bag', 'ladies-shoulder-bag', 'd899f542b0', '2021-02-11 10:46:32', '2021-02-11 10:46:32'),
(66, 'fastrak watch', 'fastrak-watch', '83d5567601', '2021-02-11 10:49:52', '2021-02-11 10:49:52'),
(67, 'casio watch', 'casio-watch', 'c5c50c3063', '2021-02-11 10:50:02', '2021-02-11 10:50:02'),
(68, 'hubbolt watch', 'hubbolt-watch', '44d59fb89a', '2021-02-11 10:50:20', '2021-02-11 10:50:20'),
(69, 'tissot watch', 'tissot-watch', '50b7b5175f', '2021-02-11 10:50:26', '2021-02-11 10:50:26'),
(70, 'carnival watch', 'carnival-watch', '9882b46895', '2021-02-11 10:50:40', '2021-02-11 10:50:49'),
(71, 'titan watch', 'titan-watch', '68c4cdd2c7', '2021-02-11 10:50:57', '2021-02-11 10:50:57'),
(72, 'naviforce watch', 'naviforce-watch', '11d7b975d9', '2021-02-11 10:51:07', '2021-02-11 10:51:07'),
(73, 'boss watch', 'boss-watch', 'e1caa43c59', '2021-02-11 10:51:26', '2021-02-11 10:51:26'),
(74, 'seiko watch', 'seiko-watch', '7715b06c1d', '2021-02-11 10:51:35', '2021-02-11 10:51:35'),
(75, 'children cycle', 'children-cycle', '9e6a8b076b', '2021-02-11 10:55:42', '2021-02-11 10:55:42'),
(76, 'baby socks', 'baby-socks', '59ff635cd8', '2021-02-11 10:55:55', '2021-02-11 10:55:55'),
(77, 'umbrella for baby', 'umbrella-for-baby', 'e005fa9e69', '2021-02-11 10:56:12', '2021-02-11 10:56:12'),
(78, 'scholl bag for baby', 'scholl-bag-for-baby', '08500ba8d0', '2021-02-11 10:56:30', '2021-02-11 10:56:30'),
(79, 'kid shoes boy', 'kid-shoes-boy', '5329ae3ebf', '2021-02-11 10:56:56', '2021-02-11 10:56:56'),
(80, 'kids shoes girl', 'kids-shoes-girl', 'ffc578b78f', '2021-02-11 10:57:09', '2021-02-11 10:57:09'),
(81, 'baby sunglass', 'baby-sunglass', '1df84b0de0', '2021-02-11 10:57:39', '2021-02-11 10:57:39'),
(82, 'baby gear', 'baby-gear', '6e5798d394', '2021-02-11 10:58:05', '2021-02-11 10:58:05'),
(83, 'baby hair decoration', 'baby-hair-decoration', '31dba3b9ef', '2021-02-11 10:58:16', '2021-02-11 10:58:16'),
(84, 'study table for baby', 'study-table-for-baby', '0d9a0ad306', '2021-02-11 10:58:36', '2021-02-11 10:58:36'),
(85, 'Cotton Kraft Ltd', 'cotton-kraft-ltd', 'c5e6e77f5e', '2021-02-11 11:02:15', '2021-02-11 11:02:15'),
(86, 'SaRa LIFESTYLE LTD', 'sara-lifestyle-ltd', '12ad0b20b3', '2021-02-11 11:02:30', '2021-02-11 11:02:30'),
(87, 'Benaroshi World', 'benaroshi-world', '66d97c1936', '2021-02-11 11:03:07', '2021-02-11 11:03:07'),
(88, 'Tahoor', 'tahoor', '73545cfcbe', '2021-02-11 11:03:17', '2021-02-11 11:03:17'),
(89, 'Livingtex', 'livingtex', '3b8b2270a7', '2021-02-11 11:03:27', '2021-02-11 11:03:27'),
(90, 'Vogue Sultana', 'vogue-sultana', '124f00bd66', '2021-02-11 11:03:37', '2021-02-11 11:03:37'),
(91, 'M And N Fashion', 'm-and-n-fashion', 'eedf1398cb', '2021-02-11 11:03:48', '2021-02-11 11:03:48'),
(92, 'Prem\'s Collections', 'prem\'s-collections', '6f10dd4f4e', '2021-02-11 11:04:11', '2021-02-11 11:04:11'),
(93, 'Sadakalo', 'sadakalo', '7fde6c6713', '2021-02-11 11:04:22', '2021-02-11 11:04:22'),
(94, 'Trendz', 'trendz', 'b6f9ca2b53', '2021-02-11 11:04:31', '2021-02-11 11:04:31'),
(95, 'shirt for man', 'shirt-for-man', 'fdf9435e48', '2021-02-11 11:07:02', '2021-02-11 11:07:02'),
(96, 't-shirt for man', 't-shirt-for-man', 'e021dcf282', '2021-02-11 11:07:14', '2021-02-11 11:07:14'),
(97, 'punjabi', 'punjabi', 'bfe1732c11', '2021-02-11 11:07:27', '2021-02-11 11:07:27'),
(98, 'kurta for man', 'kurta-for-man', 'a2bfcb4eb5', '2021-02-11 11:07:34', '2021-02-11 11:07:34'),
(99, 'jeans for men', 'jeans-for-men', '8bf6697c93', '2021-02-11 11:08:23', '2021-02-11 11:08:23'),
(100, 'corton', 'corton', '682a3b505c', '2021-02-11 11:09:13', '2021-02-11 11:09:13'),
(101, 'denim', 'denim', '66a2681469', '2021-02-11 11:09:18', '2021-02-11 11:09:18'),
(102, 'polester', 'polester', '4ee2bd0f69', '2021-02-11 11:09:24', '2021-02-11 11:09:24'),
(103, 'twill', 'twill', '6c9b4de7cd', '2021-02-11 11:09:40', '2021-02-11 11:09:40'),
(104, 'leather for mens', 'leather-for-mens', '58db3e1290', '2021-02-11 11:09:58', '2021-02-11 11:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `brand_id`, `quantity`, `price`, `user_ip`, `first_image`, `second_image`, `third_image`, `fourth_image`, `created_at`, `updated_at`) VALUES
(187, 32, 28, 1, 55200, '127.0.0.1', 'uploads/products/473ad55570df31ed7796_01.jpg', 'uploads/products/473ad55570df31ed7796_02.jpg', 'uploads/products/27d698235d28c1bbd903_03.jpg', 'uploads/products/27d698235d28c1bbd903_04.jpg', '2021-03-05 12:35:52', '2021-03-05 12:35:52'),
(190, 35, 20, 1, 33000, '::1', 'uploads/products/336c6d329e423f1ef3bd_01.png', 'uploads/products/336c6d329e423f1ef3bd_02.jpg', 'uploads/products/336c6d329e423f1ef3bd_03.jpg', 'uploads/products/5431f492623defba0d72_04.jpg', '2021-03-09 05:22:26', '2021-03-09 05:22:26'),
(191, 34, 18, 1, 22000, '::1', 'uploads/products/1101d8c398d6ef45a9ef_01.jpg', 'uploads/products/1101d8c398d6ef45a9ef_02.png', 'uploads/products/1101d8c398d6ef45a9ef_03.jpg', 'uploads/products/136e7efe604609bbe52d_04.png', '2021-03-09 05:24:19', '2021-03-09 05:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(35, 'fashion for womens', 'fashion-for-womens', 'active', '2021-02-11 09:43:36', '2021-02-11 10:53:08'),
(36, 'kids', 'kids', 'active', '2021-02-11 09:43:42', '2021-02-11 09:43:42'),
(38, 'watch', 'watch', 'active', '2021-02-11 09:45:25', '2021-02-11 09:45:25'),
(39, 'bags', 'bags', 'active', '2021-02-11 09:45:37', '2021-02-11 09:45:37'),
(40, 'shoes', 'shoes', 'active', '2021-02-11 09:46:06', '2021-02-11 09:46:06'),
(41, 'desktop', 'desktop', 'active', '2021-02-11 09:48:28', '2021-02-11 09:48:28'),
(42, 'laptop', 'laptop', 'active', '2021-02-11 09:48:37', '2021-02-11 09:48:37'),
(43, 'smart phone', 'smart-phone', 'active', '2021-02-11 09:48:55', '2021-02-11 22:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `comment`, `created_at`, `updated_at`) VALUES
(6, 3, 43, 'very good product', '2021-03-02 07:43:24', '2021-03-02 07:43:24'),
(7, 7, 43, 'product is available', '2021-03-02 07:54:57', '2021-03-02 07:54:57'),
(8, 7, 43, 'hello admin i say this product available', '2021-03-02 07:55:08', '2021-03-02 07:55:08'),
(9, 5, 43, 'very bad', '2021-03-02 07:59:53', '2021-03-02 07:59:53'),
(10, 5, 32, 'how much price', '2021-03-02 08:01:12', '2021-03-02 08:01:12'),
(11, 5, 32, 'good', '2021-03-02 08:01:44', '2021-03-02 08:01:44'),
(12, 8, 32, 'not bad', '2021-03-02 08:03:31', '2021-03-02 08:03:31'),
(13, 10, 32, 'comment here', '2021-03-02 08:06:19', '2021-03-02 08:06:19'),
(14, 5, 16, 'nice', '2021-03-02 08:30:47', '2021-03-02 08:30:47'),
(18, 6, 36, 'nice shoes', '2021-03-02 09:24:51', '2021-03-02 09:24:51'),
(21, 3, 24, 'Nice', '2021-03-02 09:33:41', '2021-03-02 09:33:41'),
(27, 8, 43, 'very bad', '2021-03-02 11:14:42', '2021-03-02 11:14:42'),
(28, 6, 16, 'good', '2021-03-03 18:36:35', '2021-03-03 18:36:35'),
(29, 6, 43, 'wow this is good', '2021-03-03 18:39:45', '2021-03-03 18:39:45'),
(31, 3, 34, 'why this phone is to be hot :(', '2021-03-05 08:37:08', '2021-03-05 08:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`, `created_at`, `updated_at`) VALUES
(9, 'justin', 5, '2021-02-26 02:10:22', '2021-02-26 02:10:22'),
(10, 'sagor', 2, '2021-03-01 04:18:06', '2021-03-01 04:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `number`, `image`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Sagor Roy', 'sagor@gmail.com', 1785400204, 'uploads/user-profile/image3.jpg', '$2y$10$9T2RikbBmE22gOL14jyq2OMJogsU4sN7KkyZLJvR4T.lvHy1jt2uG', '2021-02-24 09:12:27', '2021-03-05 08:32:25'),
(4, 'justin sagor roy', 'sagor204@gmail.com', 1963760523, 'uploads/products/image2.jpg', '$2y$10$J7bT5IfI2p3HQ8Wtsqyr6uBh/CbqN6/.wcPOJNrEA2F3Fgwg67062', '2021-02-24 09:49:36', '2021-02-26 11:27:37'),
(5, 'Md Jahidul Hossain', 'jahidul@gmail.com', 1762740360, 'uploads/user-profile/image2.jpg', '$2y$10$hjLfHIJxFHmv53mrvOt2xOIlUeRd/ZWQ/DdBNwpvUGvIc3RikLDqy', '2021-02-25 01:24:18', '2021-03-02 08:23:09'),
(6, 'Sumon Islam', 'sumon@gmail.com', 1852369874, 'uploads/user-profile/steav.png', '$2y$10$tBLcmDipgzQFwGGmieIevOD0p7jWgoM5I59tCoZqjGj65nWsb0PAS', '2021-02-27 05:39:40', '2021-03-02 08:46:29'),
(7, 'Md Kawsar Islam', 'kawsar@gmail.com', 1789632589, 'uploads/user-profile/avatar_2.jpg', '$2y$10$m6oSPWQgCNBFJpQHB2/YRuwp6/2mCqhZWILjobCiAOfwV/SGk6fn.', '2021-02-27 10:38:13', '2021-02-28 03:36:06'),
(8, 'Md Mahadi Islam', 'mahadi@gmail.com', 1725525879, 'uploads/user-profile/john.png', '$2y$10$KoL614KxXm5BiKBgAq4GUuXAP9csTBlZKLC76RGY5U9mYpGXW1Kjq', '2021-03-01 17:49:26', '2021-03-01 17:59:29'),
(9, 'Customer', 'customer@gmail.com', 1702587412, 'uploads/user-profile/PicsArt_08-18-12.15.29.png', '$2y$10$kLgiR2iEQ0K7GlJLH5AAh.u7Fn3q9Biz3dn0f5D9.10eeC08vpjvq', '2021-03-01 18:45:04', '2021-03-01 18:46:07'),
(10, 'rehana khatum', 'rehana@gmail.com', 1785693214, 'uploads/user-profile/image1.jpg', '$2y$10$Za6pU2keWgdUb9EmYRC3detP9jHrGeSn1nPSoPKh0sK.M0s2Azmqe', '2021-03-02 08:05:43', '2021-03-02 08:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_04_140526_create_categories_table', 1),
(5, '2021_02_09_132600_create_brands_table', 2),
(12, '2021_02_09_153225_create_products_table', 3),
(19, '2021_02_12_190333_create_carts_table', 4),
(20, '2021_02_13_135101_create_coupons_table', 5),
(23, '2021_02_24_131334_create_customers_table', 6),
(33, '2021_02_25_111416_create_orders_table', 7),
(34, '2021_02_25_111526_create_order_items_table', 7),
(35, '2021_02_25_111609_create_shippings_table', 7),
(38, '2021_02_25_213911_create_wishlists_table', 8),
(41, '2021_02_27_081121_create_order_manages_table', 9),
(43, '2021_03_02_122318_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_discount` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(45, 30, 32, 1, '2021-02-28 06:13:39', NULL),
(46, 31, 36, 1, '2021-02-28 06:31:29', NULL),
(47, 32, 35, 4, '2021-02-28 07:41:28', NULL),
(48, 32, 34, 1, '2021-02-28 07:41:28', NULL),
(49, 32, 42, 1, '2021-02-28 07:41:28', NULL),
(50, 33, 43, 1, '2021-02-28 10:17:35', NULL),
(51, 34, 34, 1, '2021-03-01 17:31:10', NULL),
(52, 34, 40, 1, '2021-03-01 17:31:10', NULL),
(53, 35, 35, 2, '2021-03-01 18:02:02', NULL),
(54, 35, 34, 3, '2021-03-01 18:02:02', NULL),
(55, 36, 43, 2, '2021-03-01 18:48:42', NULL),
(56, 36, 35, 3, '2021-03-01 18:48:42', NULL),
(57, 37, 24, 2, '2021-03-05 08:44:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_manages`
--

CREATE TABLE `order_manages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_discount` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process` enum('waiting','shifted','return') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_manages`
--

INSERT INTO `order_manages` (`id`, `user_id`, `payment_type`, `sub_total`, `total`, `coupon_discount`, `invoice_no`, `process`, `created_at`, `updated_at`) VALUES
(1, 7, 'cash-on-delivery', 55200, NULL, NULL, 'f345f535b01e3ee', 'return', '2021-02-28 06:13:39', '2021-02-28 07:48:51'),
(2, 5, 'cash-on-delivery', 990, NULL, NULL, 'c05b3a1e88a03ea', 'shifted', '2021-02-28 06:31:29', '2021-02-28 08:29:57'),
(3, 7, 'cash-on-delivery', 155300, 147535, 5, '23e6e5cf03ba249', 'shifted', '2021-02-28 07:41:27', '2021-02-28 08:31:01'),
(4, 3, 'cash-on-delivery', 22660, NULL, NULL, 'd29c1b3f23a0a04', 'shifted', '2021-03-01 17:31:10', '2021-03-03 18:42:50'),
(5, 7, 'cash-on-delivery', 1800, NULL, NULL, 'ba041fa275cef2d', 'waiting', '2021-02-28 10:17:35', NULL),
(6, 8, 'cash-on-delivery', 132000, 129360, 2, '87b62fa11f983b4', 'return', '2021-03-01 18:02:02', '2021-03-01 18:05:41'),
(7, 9, 'cash-on-delivery', 102600, 100548, 2, 'b8da5980f80852a', 'return', '2021-03-01 18:48:42', '2021-03-01 18:54:12'),
(8, 3, 'cash-on-delivery', 44000, 43120, 2, '9d817820661db92', 'waiting', '2021-03-05 08:43:59', '2021-03-05 08:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_title`, `slug`, `sort_desc`, `long_desc`, `price`, `status`, `first_image`, `second_image`, `third_image`, `fourth_image`, `created_at`, `updated_at`) VALUES
(16, 42, 32, 'Apple MacBook Air 13.3-Inch 10th Gen Core i3-1.1GHz, 8GB RAM, 256GB SSD (MWTJ2) Space Gray 2020', 'apple-macbook-air-13.3-inch-10th-gen-core-i3-1.1ghz,-8gb-ram,-256gb-ssd-(mwtj2)-space-gray-2020', 'Processor	Intel Core i3-1000NG4 Processor (4M Cache, 1.10 GHz up to 3.20 GHz)\r\nDisplay	13.3-inch (diagonal) Retina LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors\r\nMemory	8GB 3733MHz LPDDR4X onboard RAM\r\nStorage	256GB SSD\r\nGraphics	Intel Iris Plus Graphics\r\nOperating System	macOS\r\nBattery	Up to 10 hours battery back (Video & web browsing up to 05 hours depending on resolution)\r\nBuilt-in 49.9 watt-hour lithium polymer battery\r\nAdapter	30W USB-C power adapter\r\nAudio	Stereo speakers\r\nSupports Dolby Atmos playback\r\nThree microphone high wind array, with directional beam forming\r\n\r\n\r\nSpecial Feature	Display WithTouch ID sensor\r\nInput Devices\r\nKeyboard	Backlit Keyboard - US English Retina is equipped with:\r\n78 keys (ANSI specification) or 79 keys (ISO specification), including 12 function keys and 4 direction keys arranged in an \"inverted T\" shape.\r\nAmbient light sensor\r\nForce touchpad brings precise cursors Control and pressure-sensing functions, support forceful long press, acceleration function, pressure-sensitive drawing and multi-touch gestures\r\nOptical Drive	No\r\nWebCam	720p FaceTime HD camera\r\nNetwork & Wireless Connectivity\r\nWi-Fi	802.11ac Wi-Fi wireless network, compatible with IEEE 802.11a / b / g / n\r\nBluetooth	5.0 wireless technology\r\nPorts, Connectors & Slots\r\nUSB (s)	Two Thunderbolt 3 (USB-C) ports, support:\r\nCharging\r\nDisplayPort\r\nThunderbolt (up to 40Gb / s)\r\nUSB 3.1 Gen 2 (up to 10Gb / s)\r\nHDMI	Yes\r\nVGA	Yes\r\nAudio Jack Combo	1 x 3.5 mm Headphone Output\r\nPhysical Specification\r\nDimensions (W x D x H)	Thickness: 0.41 to 1.61 cm (0.16 to 0.63 inches)\r\nWidth: 30.41 cm (11.97 inches)\r\nDepth: 21.24 cm (8.36 inches)\r\nWeight	1.29 kg (2.8 lbs)', 'The extremely thin and light MacBook Air is now stronger and better than ever. It has an eye-catching Retina display, a new and elegant keyboard, Touch ID, a processor with up to double performance, faster image processing, and double storage capacity. The sleek design of the wedge-shaped side is made of 100% recycled aluminum metal, making it the most environmentally friendly Mac ever.The 2560 x 1600 resolution brings over 4 million pixels, and the results are naturally stunning. The original color technology can automatically adjust the white point of the display to match the color temperature of your environment, so that the web pages and emails you see are as natural as printed products. Thousands of colors are displayed to make everything you see rich and vivid. The display glass extends to the edge of the fuselage, allowing you to focus on the screen content and love what you see. The MacBook Air weighs as little as 1.29 kg, but the inner performance is sufficient to complete the heavy work. The currently available Intel Core i3 1.1GHz dual-core, Turbo Boost up to 3.2GHz, with 4MB L3 cache memory processing faster performance, giving you a powerful boost, whether browsing the web, playing games, or even editing videos, also easy to handle. And equipped with up to 8GB high-performance memory, even if you run multiple apps at the same time, you can still work smoothly and freely. In addition, it is equipped with 256GB fast SSD storage as standard configuration, double the previous generation, and can be configured up to 2TB, providing a large amount of space to store all your movies, music, photos, files and games. MacBook Air is now equipped with a new and elaborate keyboard that debuted on the 16-inch MacBook Pro. It adopts the scissor structure of excellence, and the 1mm keystroke brings you a sensitive, comfortable and quiet typing experience. The arrow keys arranged in an inverted T shape help you easily control, coding line by line, one by one spreadsheet, and even come and go in various game environments. Coupled with a backlit key with ambient light sensor, you can also type easily in dim environments. No matter where you press the touchpad, it can be precisely controlled and the response is consistent; it also provides more space, using two-finger opening and closing to zoom in and out and other multi-touch gestures, more handy. The advanced security and convenience brought by Touch ID has been built into the MacBook Air. Just place your finger on the Touch ID sensor to unlock your Mac. It ’s that simple. Using your fingerprint, you can unlock locked files, memos, and system settings without entering a password. Online shopping is also easier than ever. Select Apple Pay at checkout and pay with one touch. MacBook Air is equipped with the Apple T2 security chip, which is the second-generation special Mac chip designed by Apple, which further enhances the security of MacBook Air. Therefore, when you use Touch ID to unlock your Mac, authenticate documents, or pay at online merchants for shopping, your information will remain safe and private. With the real-time data encryption function, all data you store on the SSD will be fully encrypted automatically. In addition, the T2 security chip also brings a familiar sound to the MacBook Air. Just say \"Hello Siri\", Siri will be ready to open apps, find files, play music or answer your questions for you.MacBook Air uses the latest audio processing and tuning technology to present a more pleasant tone. Stereo speakers bring double bass and the volume is increased by as much as 25% 3. Wider stereo, so you can feel the shocking sound when listening to music or watching movies. The FaceTime lens allows one or more relatives and friends to meet you in high definition. Three microphones form an array, which can capture your voice more accurately when you are calling FaceTime, dictating or talking with Siri. Thunderbolt 3 combines ultra-high bandwidth and the extremely diverse USB-C industry standard to become an enhanced universal port. The MacBook Air has two Thunderbolt 3 ports. It integrates data transmission, charging and video output with a single interface, and the bandwidth is twice that of Thunderbolt 2, bringing data traffic as fast as 40Gb / s.\r\n\r\nThis exclusive Apple Macbook Air (MWTJ2) 2020 comes with 01 year International Limited Warranty (Terms & Condition Apply As Per Apple)', 98000, 'active', 'uploads/products/eddc5b297a7158231232_01.jpg', 'uploads/products/24a312ced3cb855e2b8c_02.jpg', 'uploads/products/24a312ced3cb855e2b8c_03.jpg', 'uploads/products/24a312ced3cb855e2b8c_04.jpg', '2021-02-11 22:17:47', '2021-02-12 03:20:58'),
(17, 42, 30, 'Dell Vostro 14 3405 Ryzen 3 3250U 14\" HD Laptop with Windows 10', 'dell-vostro-14-3405-ryzen-3-3250u-14\"-hd-laptop-with-windows-10', 'The latest price of Dell Vostro 14 3405 Ryzen 3 14\" HD Laptop in Bangladesh is 41,000৳. You can buy the Dell Vostro 14 3405 Ryzen 3 14\" HD Laptop at best price from our website or visit any of our showrooms.', 'Dell Vostro 14 3405 Laptop comes with Ryzen 3 3250U (4MB CPU Cache, 2.60GHz up to 3.50GHz), 4GB 3200 MHz DDR4 RAM, 1TB 5400rpm SATA HDD, Integrated graphics with AMD APU and Windows 10 Home. This Laptop is featured with 14\" HD (1366x768) Anti-glare Display, Battery 3 Cell 42 Whr, Battery Type Integrated, Power Adapter 45 W AC adapter, Adapter Type External. Here, Ethernet RJ-45, WiFi 802.11 ac (1x1), Bluetooth Network & Connectivity are also available. In this Laptop, It is also has Multimedia Card Slot x 1, SD Media Card Reader, 1 x USB2.0, 1 x USB 3.2 Gen 1 Type-A, Headphone Port Combo, Microphone Port Combo with Security Lock Slot 1 x Wedge-shaped lock slot and Ports are also available. This new Dell Vostro 14 3405 Laptop has 03 years of warranty.', 41000, 'active', 'uploads/products/bc0c09f0a987489aa369_01.jpg', 'uploads/products/bc0c09f0a987489aa369_02.jpg', 'uploads/products/bc0c09f0a987489aa369_03.jpg', 'uploads/products/bc0c09f0a987489aa369_04.jpg', '2021-02-11 22:28:43', '2021-02-11 22:33:24'),
(18, 42, 29, 'HP Pavilion 15-eg0077TU Core i5 11th Gen 15.6\" FHD Laptop', 'hp-pavilion-15-eg0077tu-core-i5-11th-gen-15.6\"-fhd-laptop', 'The latest price of HP Pavilion 15-eg0077TU i5 11th Gen 15.6\" FHD Laptop in Bangladesh is 76,500৳. You can buy the HP Pavilion 15-eg0077TU i5 11th Gen 15.6\" FHD Laptop at best price from our website or visit any of our showrooms.', 'HP Pavilion 15-eg0077TU Laptop comes with Intel Core i5-1135G7 Processor (8M Cache, 2.40 GHz up to 4.20 GHz), 8GB DDR4 Ram, 512GB SSD, 15.6\" diagonal FHD IPS anti-glare backlit (1920 x 1080) Display, Intel UHD Graphics and Windows 10 Home. This laptop featured with 3-cell, 41 Wh Li-ion battery, Backlit Keyboard, HP True Vision 720p HD Webcamera with integrated dual array digital microphones. Here, Realtek RTL8822CE 802.11a/b/g/n/ac (2x2) Wi-Fi and Bluetooth 5 wireless and networking connectivity are also availble. This laptop also has SuperSpeed USB Type-C 2 SuperSpeed USB Type-A 5Gbps signaling rate AC smart pin, HDMI x 1, 2.0 headphone/microphone combo ports and connectivity. This latest HP Pavilion 15-eg0077TU Laptop has 02 years International Limited Warranty (Terms & condition Apply As Per HP).', 75000, 'active', 'uploads/products/6768975e1d6965c789e7_01.jpg', 'uploads/products/6768975e1d6965c789e7_02.jpg', 'uploads/products/6768975e1d6965c789e7_03.jpg', 'uploads/products/6768975e1d6965c789e7_04.jpg', '2021-02-11 22:39:16', '2021-02-11 22:39:16'),
(19, 42, 27, 'ASUS X509JP Core i5 10th Gen NVIDIA MX330 Graphics 15.6\" FHD Laptop with Windows 10', 'asus-x509jp-core-i5-10th-gen-nvidia-mx330-graphics-15.6\"-fhd-laptop-with-windows-10', 'The latest price of ASUS X509JP Core i5 10th Gen NVIDIA MX330 Graphics 15.6\" FHD Laptop in Bangladesh is 67,000৳. You can buy the ASUS X509JP Core i5 10th Gen NVIDIA MX330 Graphics 15.6\" FHD Laptop at best price from our website or visit any of our showrooms.', 'The ASUS X509JB 15.6\" Full HD (1920x1080) Laptop owns Intel Core i5 1035G1 processor having the base frequency of 1.00GHz, maximum turbo speed 3.60 GHz. This American stylish brand also contains 1TB HDD storage and 4GB DDR4 RAM to ensure greater compatibility. In addition, it has NVIDIA GeForce MX330 with 2GB GDDR5 Graphics, windows 10 operating system, full-size Backlit keyboard and Webcam. Its 2 -Cell 32 Wh Polymer Battery will provide longer power backup on travelling and the weight of only 1.8 kg will ensure the comfort while carrying.\r\n\r\nThis multi function extreme durable device comes with 02 years International Limited Warranty (Terms & condition Apply As Per Asus)', 67000, 'active', 'uploads/products/c2cafdc4c9b76bcd88e2_01.jpg', 'uploads/products/c2cafdc4c9b76bcd88e2_02.jpg', 'uploads/products/c2cafdc4c9b76bcd88e2_03.jpg', 'uploads/products/c2cafdc4c9b76bcd88e2_04.jpg', '2021-02-11 22:46:10', '2021-02-11 22:46:10'),
(20, 42, 35, 'Xiaomi Redmi Book 14 Ryzen 5 4500U 8GB RAM 14” FHD Laptop', 'xiaomi-redmi-book-14-ryzen-5-4500u-8gb-ram-14”-fhd-laptop', 'The laptop comes with bAMD Ryzen 5 4500U powers the device along with 8GB of DDR4 RAM. For graphics, the laptop offers AMD Radeon Vega 8 Graphics. Ultra-low-voltage platform and quad-core processing provide maximum high-efficiency power. The RedmiBook 14 features a 14-inch Full HD display with narrow 5.75mm bezels and a solid 81.2% screen to body ratio. Substantial high-bandwidth RAM to smoothly run your games, photos, and video-editing applications, as well as multiple programs and browser tabs all at once.', 'The laptop comes with bAMD Ryzen 5 4500U powers the device along with 8GB of DDR4 RAM. For graphics, the laptop offers AMD Radeon Vega 8 Graphics. Ultra-low-voltage platform and quad-core processing provide maximum high-efficiency power. The RedmiBook 14 features a 14-inch Full HD display with narrow 5.75mm bezels and a solid 81.2% screen to body ratio. Substantial high-bandwidth RAM to smoothly run your games, photos, and video-editing applications, as well as multiple programs and browser tabs all at once. RedmiBook 14 Ryzen Edition is up to 512GB of solid-state drive (SSD) which provides room to store pictures, videos, music, and more. The machine carries a new cooling system to disperse heat. You can connect the device to a high-definition monitor or projector. The RedmiBook 14 Ryzen Edition is powered with the 46W battery, local video playback for 8.5 hours, online video playback for 6.5 hours, web browsing for 6.5 hours. It supports ultra-low power standby as well as Xiaomi Smart Unlock 2.0, wherein you can unlock the RedmiBook 14 Ryzen Edition in just 1.2 seconds with your Mi Band 3. Wirelessly transfer photos, music, and other media between the computer and your Bluetooth-enabled cell phone or MP3 player, or connect Bluetooth wireless accessories. Support 2.4GHz and 5GHz dual-band WiFi, Supports 802.11ac network protocol; compatible with 802.11 a/b/g/n, 867Mbpss max, Bluetooth 4.2 wireless technology. The laptop carries support for Dolby Audio and AKG tuned custom-made dual speakers. The new RedmiBook 14 Ryzen Edition offers features like USB-C, 2 USB 2.0 ports, HDMI, 3.5mm audio jack.', 69000, 'active', 'uploads/products/5b571fde12d03928294c_01.jpg', 'uploads/products/5b571fde12d03928294c_02.jpg', 'uploads/products/5b571fde12d03928294c_03.jpg', 'uploads/products/5b571fde12d03928294c_04.jpg', '2021-02-11 22:52:01', '2021-02-11 22:52:01'),
(21, 42, 34, 'Walton Prelude N41 Intel N4100 13.3” FHD Laptop with Windows 10', 'walton-prelude-n41-intel-n4100-13.3”-fhd-laptop-with-windows-10', 'The latest price of Walton Prelude N41 Intel N4100 13.3” FHD Laptop in Bangladesh is 26,500৳. You can buy the Walton Prelude N41 Intel N4100 13.3” FHD Laptop at best price from our website or visit any of our showrooms', 'Walton Prelude N41 Laptop comes with Intel Gemini Lake N4100 processor (14nm, 1.1GHz, DDR4-2400MHz, 4MB Smart Cache, TDP: 6W), 4GB DDR4 2400MHz Onboard RAM, 256GB SATAIII M.2 2280 SSD, SATA interface and Intel UHD Graphics 600. This Laptop is featured with 33.78cm (13.3”) FHD(1920x1080), IPS Matte LED Backlit Display with 99% sRGB. This Laptop has Multi languages A4 size isolated keyboard with Bengali font (Bijoy Bangla Layout) that is built in touch pad with Microsoft PTP multi-gesture and scrolling function. In this Laptop, It has 2 x 1.5 W speakers, High Definition Audio, Built in array microphone, 1 x USB 2.0 port, 1 x USB 3.0 port (Type A), 1 x USB 3.0 port (Type C), 1 x HDMI output port (with HDCP), 1 x Audio Combo jack and 1 x DC-in jack interface with TF Card slot that support SDHC/SDXC. Here, Intel Dual Band Wireless-AC 7265, 2x2 AC and Bluetooth 4.2 version is also avaiolble. This laptop has Embedded Polymer Smart Lithium-Ion battery pack, 37WH (Battery life: 285 minutes; N.B: Based on testing with MobileMark 2014. Battery life varies significantly with settings, usage, & other factors.) This latest Walton Prelude N41 Laptop has 01 year warranty.', 55000, 'active', 'uploads/products/41e144b8a3ed1ea31672_01.jpg', 'uploads/products/41e144b8a3ed1ea31672_02.jpg', 'uploads/products/41e144b8a3ed1ea31672_03.png', 'uploads/products/41e144b8a3ed1ea31672_04.jpg', '2021-02-11 22:55:42', '2021-02-11 22:55:42'),
(22, 42, 31, 'Lenovo IP Slim 3i Core i3 10th Gen 14\" Full HD Abyss Blue Color Laptop', 'lenovo-ip-slim-3i-core-i3-10th-gen-14\"-full-hd-abyss-blue-color-laptop', 'The latest price of Lenovo IP Slim 3i Core 14\" Full HD Abyss Blue Color Laptop in Bangladesh is 47,000৳. You can buy the Lenovo IP Slim 3i Core 14\" Full HD Abyss Blue Color Laptop at best price from our website or visit any of our showrooms.', 'Lenovo IP Slim 3i Laptop is comes with Intel Core i3-1005G1 Processor (4M Cache,1.20 GHz up to 3.40 GHz, 4 MB Cache, 4 Threads), 4GB DDR4 SODIMM 2666MHz RAM which is upgrade able up to 16 GB, 1TB HDD and optional discrete graphics, you can do more with your PC and enjoy a rich entertainment experience. In this laptop, it is also has 3 Cell Li-Polymer, Up to 7.5 hours, 2 x 1.5W speakers, Dolby Audio with Extra SSD slot. Narrow bezels on two sides give the IdeaPad Slim 3i (14) a clean look and give you a great viewing experience. Dolby Audio delivers crystal-clear sound whether you’re watching a video, streaming music, or video-chatting. The IdeaPad Slim 3i (14) laptop’s webcam makes it easy to video chat with friends and family.By flicking the webcam shutter closed and create an impenetrable barrier to potential hackers. This laptop also featured with 14.0\"FHD IPS AntiGlare LED Backlight Narrow Bezel 1920x1080 display, Full size English (US) keyboard, SD card reader, Bluetooth Version 5.0, WiFi 2 x 2, 1 x 1 AC, Headphone / mic combo with HDMI 1.4b ,2 x USB 3.1 (Gen 1) and USB 2.0 port. This genuine Lenovo Laptop comes with 2 years International Limited Warranty (Terms & condition Apply As Per Lenovo).', 45000, 'active', 'uploads/products/a998e9adf208cc8cf493_01.jpg', 'uploads/products/a998e9adf208cc8cf493_02.jpg', 'uploads/products/a998e9adf208cc8cf493_03.jpg', 'uploads/products/a998e9adf208cc8cf493_04.jpg', '2021-02-11 22:58:47', '2021-02-11 22:58:47'),
(23, 43, 16, 'Let every user access this bookmark', 'let-every-user-access-this-bookmark', 'Let every user access this bookmarkLet every user access this bookmarkLet every user access this bookmark', 'Let every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmark', 28000, 'active', 'uploads/products/e9471032a0b09ff25193_01.png', 'uploads/products/c901f98ccc3ffec05a7a_02.jpg', 'uploads/products/c901f98ccc3ffec05a7a_03.png', 'uploads/products/c901f98ccc3ffec05a7a_04.jpg', '2021-02-12 00:20:02', '2021-02-12 03:17:02'),
(24, 41, 44, 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'dell-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 25000, 'active', 'uploads/products/2cec29b76c53eaf3b10e_01.jpg', 'uploads/products/9a6a54fc961653c9af2c_02.jpg', 'uploads/products/9a6a54fc961653c9af2c_03.jpg', 'uploads/products/9a6a54fc961653c9af2c_04.jpg', '2021-02-12 04:17:46', '2021-02-12 04:18:10'),
(25, 41, 45, 'HP OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'hp-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'HP OptiPlex 5060 Micro Core i5 8th Gen Brand PC Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro', 'Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PCDell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 20000, 'active', 'uploads/products/37f5d7e1aba1b24bc633_01.jpg', 'uploads/products/37f5d7e1aba1b24bc633_02.jpg', 'uploads/products/37f5d7e1aba1b24bc633_03.jpg', 'uploads/products/37f5d7e1aba1b24bc633_04.jpg', '2021-02-12 04:19:57', '2021-02-12 04:19:57'),
(26, 41, 37, 'Acer Dell OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'acer-dell-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PC OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 27000, 'active', 'uploads/products/56a2d026d0b1113419a8_01.jpg', 'uploads/products/56a2d026d0b1113419a8_02.jpg', 'uploads/products/56a2d026d0b1113419a8_03.jpg', 'uploads/products/56a2d026d0b1113419a8_04.jpg', '2021-02-12 04:21:53', '2021-02-12 04:21:53'),
(27, 41, 38, 'xioame OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'xioame-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 35500, 'active', 'uploads/products/3e61de7cfa010fa895b2_01.jpg', 'uploads/products/3e61de7cfa010fa895b2_02.jpg', 'uploads/products/3e61de7cfa010fa895b2_03.jpg', 'uploads/products/1487c12a3ace6646c2aa_04.jpg', '2021-02-12 04:24:05', '2021-02-12 04:24:05'),
(28, 41, 39, 'walton OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'walton-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 28000, 'active', 'uploads/products/a68112a64287d0740569_01.jpg', 'uploads/products/a68112a64287d0740569_02.jpg', 'uploads/products/a68112a64287d0740569_03.jpg', 'uploads/products/a68112a64287d0740569_04.jpg', '2021-02-12 04:25:12', '2021-02-12 04:25:12'),
(29, 41, 43, 'asus OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'asus-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 32500, 'active', 'uploads/products/271942979ac93adce15d_01.jpg', 'uploads/products/2f8a66ef2df61388ee6e_02.jpg', 'uploads/products/2f8a66ef2df61388ee6e_03.jpg', 'uploads/products/2f8a66ef2df61388ee6e_04.jpg', '2021-02-12 04:27:42', '2021-02-12 04:27:42'),
(30, 41, 40, 'Gigabyte OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'gigabyte-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 39300, 'active', 'uploads/products/c872a0ef29f2aeb5f2e1_01.jpg', 'uploads/products/3968216beb563123d36b_02.jpg', 'uploads/products/3968216beb563123d36b_03.jpg', 'uploads/products/3968216beb563123d36b_04.jpg', '2021-02-12 04:28:46', '2021-02-12 04:28:46'),
(31, 41, 42, 'Microsoft OptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'microsoft-optiplex-5060-micro-core-i5-8th-gen-brand-pc', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 45200, 'active', 'uploads/products/abf7526bed8aefbbab5c_01.jpg', 'uploads/products/abf7526bed8aefbbab5c_02.jpg', 'uploads/products/abf7526bed8aefbbab5c_03.jpg', 'uploads/products/abf7526bed8aefbbab5c_04.jpg', '2021-02-12 04:30:39', '2021-02-12 04:30:39'),
(32, 42, 28, 'Microsoft OptiPlex 5060 Micro Core i5 8th Gen Brand laptop', 'microsoft-optiplex-5060-micro-core-i5-8th-gen-brand-laptop', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 'OptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PCOptiPlex 5060 Micro Core i5 8th Gen Brand PC', 55200, 'active', 'uploads/products/473ad55570df31ed7796_01.jpg', 'uploads/products/473ad55570df31ed7796_02.jpg', 'uploads/products/27d698235d28c1bbd903_03.jpg', 'uploads/products/27d698235d28c1bbd903_04.jpg', '2021-02-12 04:33:03', '2021-02-12 04:33:03'),
(33, 43, 17, 'Nokia P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 'nokia-p30-pro-(aurora,-8gb-ram,-256gb-storage)', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 25000, 'active', 'uploads/products/4381f711b61ff53da476_01.jpg', 'uploads/products/4381f711b61ff53da476_02.jpg', 'uploads/products/4381f711b61ff53da476_03.jpg', 'uploads/products/ef738d35d6362ce07a5c_04.jpg', '2021-02-12 05:00:45', '2021-02-12 05:00:45'),
(34, 43, 18, 'Xioame', 'xioame', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 22000, 'active', 'uploads/products/1101d8c398d6ef45a9ef_01.jpg', 'uploads/products/1101d8c398d6ef45a9ef_02.png', 'uploads/products/1101d8c398d6ef45a9ef_03.jpg', 'uploads/products/136e7efe604609bbe52d_04.png', '2021-02-12 05:01:40', '2021-02-12 05:01:40'),
(35, 43, 20, 'Huwaei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 'huwaei-p30-pro-(aurora,-8gb-ram,-256gb-storage)', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 'Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)Huawei P30 Pro (Aurora, 8GB RAM, 256GB Storage)', 33000, 'active', 'uploads/products/336c6d329e423f1ef3bd_01.png', 'uploads/products/336c6d329e423f1ef3bd_02.jpg', 'uploads/products/336c6d329e423f1ef3bd_03.jpg', 'uploads/products/5431f492623defba0d72_04.jpg', '2021-02-12 05:02:49', '2021-02-13 09:55:55'),
(36, 40, 46, 'Power Brown Velcro Sandal For Men', 'power-brown-velcro-sandal-for-men', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 990, 'active', 'uploads/products/f43c3b9ceac05fb7d1ff_01.webp', 'uploads/products/f43c3b9ceac05fb7d1ff_02.webp', 'uploads/products/f43c3b9ceac05fb7d1ff_03.webp', 'uploads/products/f43c3b9ceac05fb7d1ff_04.webp', '2021-02-12 05:12:26', '2021-02-12 05:12:26'),
(37, 40, 50, 'Power Brown Velcro Sandal For Men0', 'power-brown-velcro-sandal-for-men0', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Menv', 1200, 'active', 'uploads/products/d19063b35feb89ea3188_01.webp', 'uploads/products/d19063b35feb89ea3188_02.jpg', 'uploads/products/d19063b35feb89ea3188_03.webp', 'uploads/products/bd87ab49c10eafda89ef_04.webp', '2021-02-12 05:14:17', '2021-02-12 05:14:17'),
(38, 40, 49, 'Power Brown Velcro Sandal For Men2', 'power-brown-velcro-sandal-for-men2', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 1500, 'active', 'uploads/products/a4bff1aa736621898e2e_01.webp', 'uploads/products/a4bff1aa736621898e2e_02.webp', 'uploads/products/ccd1ca547d0549c9cd83_03.webp', 'uploads/products/ccd1ca547d0549c9cd83_04.jpg', '2021-02-12 05:15:22', '2021-02-12 05:15:22'),
(39, 40, 55, 'Power Brown Velcro Sandal For Men gfd', 'power-brown-velcro-sandal-for-men-gfd', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 'Power Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For MenPower Brown Velcro Sandal For Men', 700, 'active', 'uploads/products/35f20f51a697feb1614d_01.webp', 'uploads/products/35f20f51a697feb1614d_02.jpg', 'uploads/products/b42f6d51ef60427ae5e1_03.webp', 'uploads/products/b42f6d51ef60427ae5e1_04.webp', '2021-02-12 05:16:16', '2021-02-12 05:16:16'),
(40, 39, 60, 'Black Backpack For Men Black Backpack For Men', 'black-backpack-for-men-black-backpack-for-men', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in', 660, 'active', 'uploads/products/35d6002112d228ce8233_01.jpg', 'uploads/products/35d6002112d228ce8233_02.jpg', 'uploads/products/35d6002112d228ce8233_03.jpg', 'uploads/products/35d6002112d228ce8233_04.jpg', '2021-02-12 05:22:52', '2021-02-12 05:22:52'),
(41, 39, 61, 'Sale Roll over or click image to zoom in', 'sale-roll-over-or-click-image-to-zoom-in', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in v', 1190, 'active', 'uploads/products/7d25eb7d02ea9936d8fa_01.jpg', 'uploads/products/7d25eb7d02ea9936d8fa_02.jpg', 'uploads/products/7d25eb7d02ea9936d8fa_03.jpg', 'uploads/products/7d25eb7d02ea9936d8fa_04.jpg', '2021-02-12 05:23:40', '2021-02-12 05:23:40'),
(42, 39, 57, 'Sale Roll over', 'sale-roll-over', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in', 'Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in  Sale Roll over or click image to zoom in', 1300, 'active', 'uploads/products/795633dd353797a2286e_01.jpg', 'uploads/products/795633dd353797a2286e_02.jpg', 'uploads/products/795633dd353797a2286e_03.jpg', 'uploads/products/795633dd353797a2286e_04.jpg', '2021-02-12 05:24:49', '2021-02-12 05:24:49'),
(43, 39, 59, 'Black Backpack For Men Black Backpack For', 'black-backpack-for-men-black-backpack-for', 'Let every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmark', 'Let every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmarkLet every user access this bookmark', 1800, 'active', 'uploads/products/402a77ece46a47538bde_04.DSC_4290_300x.jpg', 'uploads/products/346fcf3b15381640169e_04.MG_1907_300x.jpg', 'uploads/products/1f5b1c4c52b5592320b1_04.IMG_2018_300x.jpg', 'uploads/products/7bbbd7df9218f0a76881_04.IMG_1917_300x.jpg', '2021-02-12 05:27:16', '2021-03-01 17:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `email`, `number`, `country`, `city`, `address`, `post_code`, `created_at`, `updated_at`) VALUES
(30, 30, 'Md Kawsar Islam', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 5220, '2021-02-28 06:13:39', NULL),
(31, 31, 'Md Jahidul Hossain', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 5220, '2021-02-28 06:31:29', NULL),
(32, 32, 'Md Kawsar Islam', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 5220, '2021-02-28 07:41:28', NULL),
(33, 33, 'Md Kawsar Islam', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 5220, '2021-02-28 10:17:35', NULL),
(34, 34, 'Sagor Roy', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 5220, '2021-03-01 17:31:10', NULL),
(35, 35, 'Md Mahadi Islam', 'mahadi@gmail.com', 1725525879, 'bangladesh', 'dhaka', 'mirpur-14,dhaka', 1725525879, '2021-03-01 18:02:02', NULL),
(36, 36, 'Customer', 'customer@gmail.com', 1702587412, 'bangladesh', 'dhaka', 'mirpur-14,dhaka', 1702587412, '2021-03-01 18:48:42', NULL),
(37, 37, 'Sagor Roy', 'sagor@gmail.com', 1785400204, 'bangladesh', 'Dinajpur', 'Birgonj', 1785400204, '2021-03-05 08:44:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sagor Roy', 'sagor@gmail.com', NULL, '$2y$10$eQSTbLd5irGj2CmLsD2e3./75ZyiJOhWN.XXU73FdSp.DZ1.ogwzO', NULL, '2021-02-08 10:16:01', '2021-02-08 10:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_unique` (`brand`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD UNIQUE KEY `brands_brand_code_unique` (`brand_code`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_number_unique` (`number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manages`
--
ALTER TABLE `order_manages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_title_unique` (`product_title`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_first_image_unique` (`first_image`),
  ADD UNIQUE KEY `products_second_image_unique` (`second_image`),
  ADD UNIQUE KEY `products_third_image_unique` (`third_image`),
  ADD UNIQUE KEY `products_fourth_image_unique` (`fourth_image`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `order_manages`
--
ALTER TABLE `order_manages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
