-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2025 at 02:17 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_dress`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_attire_type`
--

DROP TABLE IF EXISTS `master_attire_type`;
CREATE TABLE IF NOT EXISTS `master_attire_type` (
  `master_attire_type_id` int NOT NULL AUTO_INCREMENT,
  `master_attire_type_name` varchar(50) NOT NULL,
  `master_attire_type_isribbon` char(2) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`master_attire_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4;

--
-- Dumping data for table `master_attire_type`
--

INSERT INTO `master_attire_type` (`master_attire_type_id`, `master_attire_type_name`, `master_attire_type_isribbon`) VALUES
(1, 'Aksesoris', 'y'),
(2, 'Hijab', 'y'),
(3, 'Non Hijab', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `master_brands`
--

DROP TABLE IF EXISTS `master_brands`;
CREATE TABLE IF NOT EXISTS `master_brands` (
  `brand_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `brand_isactive` char(2) COLLATE utf8mb4_general_ci DEFAULT 'y',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_code` (`brand_code`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_brands`
--

INSERT INTO `master_brands` (`brand_id`, `brand_name`, `brand_code`, `brand_isactive`, `created_at`) VALUES
(1, 'Atelier Mode', 'AM', 'y', '2025-02-26 21:18:48'),
(2, 'Lyra Official', 'LO', 'y', '2025-02-26 21:18:48'),
(3, 'Kartinis Label', 'KL', 'y', '2025-02-26 21:18:48'),
(4, 'Seliyane', 'SL', 'y', '2025-02-26 21:18:48'),
(5, 'Cera Official', 'CO', 'y', '2025-02-26 21:18:48'),
(6, 'YOURS Clothing', 'YC', 'y', '2025-03-11 09:51:00'),
(28, 'REZA4', 'RX1', 'n', '2025-03-20 11:25:39'),
(27, 'REZAA', 'RX', 'n', '2025-03-20 09:36:37'),
(26, 'Reza', 'RZ', 'n', '2025-03-20 09:17:50'),
(25, 'testx', 'ttx', 'n', '2025-03-20 09:11:52'),
(29, 'Test', 'TT', 'n', '2025-03-20 17:36:28'),
(30, 'New Brand', 'NB', 'n', '2025-03-21 09:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

DROP TABLE IF EXISTS `master_category`;
CREATE TABLE IF NOT EXISTS `master_category` (
  `master_category_id` int NOT NULL AUTO_INCREMENT,
  `master_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`master_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`master_category_id`, `master_category_name`) VALUES
(1, 'Dress'),
(2, 'Clutch');

-- --------------------------------------------------------

--
-- Table structure for table `master_colours`
--

DROP TABLE IF EXISTS `master_colours`;
CREATE TABLE IF NOT EXISTS `master_colours` (
  `colour_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `colour_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`colour_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_colours`
--

INSERT INTO `master_colours` (`colour_id`, `colour_name`, `created_at`) VALUES
(1, 'Red', '2025-02-26 21:19:05'),
(2, 'Blue', '2025-02-26 21:19:05'),
(3, 'Green', '2025-02-26 21:19:05'),
(4, 'Black', '2025-02-26 21:19:05'),
(5, 'White', '2025-02-26 21:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

DROP TABLE IF EXISTS `master_product`;
CREATE TABLE IF NOT EXISTS `master_product` (
  `master_product_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `master_product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `master_product_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `master_product_colour` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `master_product_size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `master_product_tag` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `master_product_type` int UNSIGNED NOT NULL,
  `master_product_brand` int UNSIGNED NOT NULL,
  `master_product_price` decimal(10,2) NOT NULL,
  `master_product_extra_days_price` decimal(10,2) DEFAULT NULL,
  `master_product_rental_period` int NOT NULL,
  `master_product_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `master_product_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `master_product_isactive` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'y',
  `master_product_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`master_product_id`),
  UNIQUE KEY `product_code` (`master_product_code`),
  KEY `master_products_product_colour_foreign` (`master_product_colour`),
  KEY `master_products_product_size_foreign` (`master_product_size`),
  KEY `master_products_product_brand_foreign` (`master_product_brand`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_product`
--

INSERT INTO `master_product` (`master_product_id`, `master_product_name`, `master_product_code`, `master_product_colour`, `master_product_size`, `master_product_tag`, `master_product_type`, `master_product_brand`, `master_product_price`, `master_product_extra_days_price`, `master_product_rental_period`, `master_product_desc`, `master_product_thumbnail`, `master_product_isactive`, `master_product_created_at`) VALUES
(25, 'YOURS Curve Black Dot Print Wrap Maxi Dress', '025', 'Black,White', 'XS,S,M,L,XL,XXL', 'One Set', 2, 6, '250000.00', '100000.00', 2, '<p>YOURS Curve Black Dot Print Wrap Maxi Dress</p>', '1743147616_2b91c638d7c4d0e95af3.jpg', 'y', '2025-03-28 07:40:16'),
(24, 'LUXE Curve Blue Embellished Wrap Midi Dress', '024', 'Green,Black', 'XS,S,L', 'Bumil Friendly', 2, 2, '300000.00', '150000.00', 2, '<p>Opsional 1</p><p>Opsional 2</p><p>Opsional 3</p><p>Opsional 4</p>', '1743136323_11b50655d47c58fdc931.jpg', 'y', '2025-03-28 04:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `master_products`
--

DROP TABLE IF EXISTS `master_products`;
CREATE TABLE IF NOT EXISTS `master_products` (
  `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `product_colour` int UNSIGNED NOT NULL,
  `product_size` int DEFAULT NULL,
  `product_brand` int UNSIGNED NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_extra_days_price` decimal(10,2) DEFAULT NULL,
  `product_rental_period` int NOT NULL,
  `product_desc` text COLLATE utf8mb4_general_ci,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_isactive` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'y',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`),
  KEY `master_products_product_colour_foreign` (`product_colour`),
  KEY `master_products_product_size_foreign` (`product_size`),
  KEY `master_products_product_brand_foreign` (`product_brand`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_products`
--

INSERT INTO `master_products` (`product_id`, `product_name`, `product_code`, `product_colour`, `product_size`, `product_brand`, `product_price`, `product_extra_days_price`, `product_rental_period`, `product_desc`, `product_thumbnail`, `product_isactive`, `created_at`) VALUES
(1, 'YOURS Curve Pink Retro Floral Print Smock Dress', 'BB-5456', 1, 3, 6, '500000.00', '100000.00', 3, '<p>Features:</p><ul><li>Retro floral print</li><li>Smock style</li><li>Short sleeves</li><li>Midi length</li><li>Made from a soft jersey fabric</li><li>95% viscose, 5% elastane</li><li>Length from (approx):122cm/48\"</li><li>Machine washable</li><li>Model is 5\'10.5\"/178cm and size UK 16/EU 44</li></ul><p><strong>Fit &amp; Fashion Notes:</strong><br>Add this bold print to your colelction! Made from a soft jersey fabric, this dress features short sleeves, and a midi length, in a smock style. Partner with trainers for an elevated daytime look.</p>', 'media/products/1741251296_d8a0d26df3c1a5e7bd01.jpg', 'y', '2025-03-06 15:54:56'),
(2, 'YOURS Curve Blue Paisley Print Smock Dress', 'BB-0134', 2, 4, 6, '150000.00', '50000.00', 3, '<p>Features:</p><ul><li>Blue Paisley print</li><li>Smock style</li><li>Short sleeves</li><li>Midi length</li><li>Made from a soft jersey fabric</li><li>95% viscose, 5% elastane</li><li>Length from (approx):122cm/48\"</li><li>Machine washable</li><li>Model is 5\'10.5\"/178cm and size UK 16/EU 44</li></ul><p><strong>Fit &amp; Fashion Notes:</strong><br>Add this bold print to your colelction! Made from a soft jersey fabric, this dress features short sleeves, and a midi length, in a smock style. Partner with trainers for an elevated daytime look.</p>', 'media/products/1741251694_8c1ecf34ded390c0a2ac.jpg', 'y', '2025-03-06 16:01:34'),
(3, 'YOURS Curve Black & Green Palm Print Shirred Tiered Maxi Dress', 'BB-4904', 3, 3, 6, '500000.00', '100000.00', 3, '<p>Features:</p><ul><li>Palm print design</li><li>Maxi length</li><li>Sleeveless design</li><li>Shirred upper fabric</li><li>Tiered design</li><li>Made from a comfortable woven fabric</li><li>100% viscose</li><li>Machine washable</li><li>Model is 5\' 9.5\" / 176.53 cm and size UK 16/EU 44</li></ul><p><strong>Fit &amp; Fashion Notes:</strong><br>This new-in maxi dress is the perfect option for your casual summer plans. Made from a comfortable woven fabric, it features a palm print, a shirred upper fabric, and a tiered design. Team with sandals for an effortless daytime look that you can wear with confidence.</p>', 'media/products/1741661344_df0f3d9bfee84b3d576d.jpg', 'y', '2025-03-11 09:49:04'),
(4, 'Test_20250320041234', '004', 3, 2, 1, '10000.00', '100.00', 1, '<p>test</p>', 'media/products/1742461990_92a2a5241233478f4712.jpg', 'n', '2025-03-20 16:13:10'),
(5, 'LTS Black', '005', 1, 5, 6, '250000.00', '100000.00', 3, '<p>test</p>', 'media/products/1742540726_66aacab0e9cea3b914f4.jpg', 'y', '2025-03-21 14:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `master_product_image`
--

DROP TABLE IF EXISTS `master_product_image`;
CREATE TABLE IF NOT EXISTS `master_product_image` (
  `master_product_image_id` int NOT NULL AUTO_INCREMENT,
  `master_product_image_name` varchar(100) NOT NULL,
  `master_product_image_productid` int NOT NULL,
  `master_product_image_createdby` varchar(50) NOT NULL,
  `master_product_image_createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`master_product_image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47;

--
-- Dumping data for table `master_product_image`
--

INSERT INTO `master_product_image` (`master_product_image_id`, `master_product_image_name`, `master_product_image_productid`, `master_product_image_createdby`, `master_product_image_createdat`) VALUES
(1, '1742980185_98f7e489ad601fa45418.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(2, '1742980185_0743d25bd6fb89caa39b.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(3, '1742980185_88754a729bd84ff6bb0c.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(4, '1742980185_4f7278479000d6cdad1a.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(5, '1742980185_25201f1ba8ae70b35498.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(6, '1742980185_73b6adea549180aa3e0c.jpg', 14, 'admin', '2025-03-26 09:09:45'),
(7, '1742980882_4c82c6145fc13e43b070.jpg', 15, 'admin', '2025-03-26 09:21:22'),
(8, '1742980882_c4f393badd712e8046c5.jpg', 15, 'admin', '2025-03-26 09:21:22'),
(9, '1742980882_0cbafdd7a6db8f867f6c.jpg', 15, 'admin', '2025-03-26 09:21:22'),
(10, '1742980882_087986204ddeb543c68b.jpg', 15, 'admin', '2025-03-26 09:21:22'),
(11, '1742981032_724384e27e04ace9e0d5.jpg', 16, 'admin', '2025-03-26 09:23:52'),
(12, '1742981032_816188ab798d3a183b2b.jpg', 16, 'admin', '2025-03-26 09:23:52'),
(13, '1742981032_9be3b64bbc812f85d7d1.jpg', 16, 'admin', '2025-03-26 09:23:52'),
(14, '1742981032_63d1f4f9382041b44645.jpg', 16, 'admin', '2025-03-26 09:23:52'),
(15, '1742983008_74d0bb4651210c9205bf.jpg', 17, 'admin', '2025-03-26 09:56:48'),
(16, '1742983008_113d56cdf5c3eff77e43.jpg', 17, 'admin', '2025-03-26 09:56:48'),
(17, '1742998449_4ccb730f057faf8554de.jpg', 18, 'admin', '2025-03-26 14:14:09'),
(18, '1742998449_6df592475e108252f111.jpg', 18, 'admin', '2025-03-26 14:14:09'),
(19, '1742998449_89291c1dfe2aa5425b23.jpg', 18, 'admin', '2025-03-26 14:14:09'),
(20, '1742998449_e0402e66ed62c4561978.jpg', 18, 'admin', '2025-03-26 14:14:09'),
(21, '1743049181_f3b5cd593a337716ea69.jpg', 19, 'admin', '2025-03-27 04:19:41'),
(22, '1743049181_b2670496c0593eabc8a6.jpg', 19, 'admin', '2025-03-27 04:19:41'),
(23, '1743049181_4990e51e6aad32f03bda.jpg', 19, 'admin', '2025-03-27 04:19:41'),
(24, '1743049181_671adcb02a74052edf47.jpg', 19, 'admin', '2025-03-27 04:19:41'),
(25, '1743049181_b18750070eb13f056435.jpg', 19, 'admin', '2025-03-27 04:19:41'),
(26, '1743134936_2b554331aeb3b2d397fe.jpg', 20, 'admin', '2025-03-28 04:08:56'),
(27, '1743134936_46657f34f219d678c034.jpg', 20, 'admin', '2025-03-28 04:08:56'),
(28, '1743135699_0b1e6fcc019e740aeac0.jpg', 21, 'admin', '2025-03-28 04:21:39'),
(29, '1743135699_6445d0f22fbf59ce4224.jpg', 21, 'admin', '2025-03-28 04:21:39'),
(30, '1743135699_ff8b9cf9829423fb1296.jpg', 21, 'admin', '2025-03-28 04:21:39'),
(31, '1743135699_d33be1712a04b9226a02.jpg', 21, 'admin', '2025-03-28 04:21:39'),
(32, '1743135699_29b3d987610d672a0b91.jpg', 21, 'admin', '2025-03-28 04:21:39'),
(33, '1743135841_d7e4d3c9b4c24c00d0ab.jpg', 22, 'admin', '2025-03-28 04:24:01'),
(34, '1743135841_baccdcee499956aa3742.jpg', 22, 'admin', '2025-03-28 04:24:01'),
(35, '1743135841_8b6228f10bb6dab065e5.jpg', 22, 'admin', '2025-03-28 04:24:01'),
(36, '1743135841_5f83683a644ce8eb9378.jpg', 22, 'admin', '2025-03-28 04:24:01'),
(37, '1743135841_d6ccf411b01db4b5a829.jpg', 22, 'admin', '2025-03-28 04:24:01'),
(38, '1743136094_cb6e57f4bcc67fe7ad39.jpg', 23, 'admin', '2025-03-28 04:28:14'),
(39, '1743136323_4babed703b705b2337ca.jpg', 24, 'admin', '2025-03-28 04:32:03'),
(40, '1743136323_9528ed50ef449caebb09.jpg', 24, 'admin', '2025-03-28 04:32:03'),
(41, '1743136323_8b749fc16536305727dd.jpg', 24, 'admin', '2025-03-28 04:32:03'),
(42, '1743147616_96218c2b077b46e4cc54.jpg', 25, 'admin', '2025-03-28 07:40:16'),
(43, '1743147616_5649a2df238a19f85932.jpg', 25, 'admin', '2025-03-28 07:40:16'),
(44, '1743147616_22f2acd756f8b8f54985.jpg', 25, 'admin', '2025-03-28 07:40:16'),
(45, '1743147616_f78f6394847e1154d1c6.jpg', 25, 'admin', '2025-03-28 07:40:16'),
(46, '1743147616_8b11e15dee9f9b03614c.jpg', 25, 'admin', '2025-03-28 07:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `master_sizes`
--

DROP TABLE IF EXISTS `master_sizes`;
CREATE TABLE IF NOT EXISTS `master_sizes` (
  `size_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_sizes`
--

INSERT INTO `master_sizes` (`size_id`, `size_name`, `created_at`) VALUES
(1, 'XS', '2025-02-26 21:21:39'),
(2, 'S', '2025-02-26 21:21:39'),
(3, 'M', '2025-02-26 21:21:39'),
(4, 'L', '2025-02-26 21:21:39'),
(5, 'XL', '2025-02-26 21:21:39'),
(6, 'XXL', '2025-02-26 21:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `master_tag`
--

DROP TABLE IF EXISTS `master_tag`;
CREATE TABLE IF NOT EXISTS `master_tag` (
  `master_tag_id` int NOT NULL AUTO_INCREMENT,
  `master_tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`master_tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4;

--
-- Dumping data for table `master_tag`
--

INSERT INTO `master_tag` (`master_tag_id`, `master_tag_name`) VALUES
(1, 'Bumil Friendly'),
(2, 'Kebaya'),
(3, 'One Set');

-- --------------------------------------------------------

--
-- Table structure for table `master_users`
--

DROP TABLE IF EXISTS `master_users`;
CREATE TABLE IF NOT EXISTS `master_users` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_users`
--

INSERT INTO `master_users` (`user_id`, `user_username`, `user_password`, `user_role`, `created_at`) VALUES
(1, 'admin', '$2y$10$8q/2y4iQOgwSdY9wJhfku.whcI1pFQ.2pxaJu7i7gFoGk5fq0b3N6', 'admin', '2025-03-10 07:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-02-26-100725', 'App\\Database\\Migrations\\MasterBrands', 'default', 'App', 1740566977, 1),
(2, '2025-02-26-101229', 'App\\Database\\Migrations\\MasterColours', 'default', 'App', 1740566977, 1),
(3, '2025-02-26-101555', 'App\\Database\\Migrations\\MasterSizes', 'default', 'App', 1740566977, 1),
(4, '2025-02-26-102400', 'App\\Database\\Migrations\\MasterProducts', 'default', 'App', 1740566977, 1),
(5, '2025-02-26-103447', 'App\\Database\\Migrations\\ProductImages', 'default', 'App', 1740566977, 1),
(6, '2025-03-04-070822', 'App\\Database\\Migrations\\AddProductThumbnailToMasterProducts', 'default', 'App', 1741072167, 2),
(8, '2025-03-05-034853', 'App\\Database\\Migrations\\AddExtraRentToMasterProducts', 'default', 'App', 1741147023, 3),
(9, '2025-03-07-055632', 'App\\Database\\Migrations\\AddIsActiveToMasterProducts', 'default', 'App', 1741327118, 4),
(10, '2025-03-10-072153', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1741591838, 5),
(12, '2025-03-17-073031', 'App\\Database\\Migrations\\CreateOrdersTable', 'default', 'App', 1742197971, 6),
(14, '2025-03-20-070250', 'App\\Database\\Migrations\\AddIsActiveToBrands', 'default', 'App', 1742454755, 7),
(15, '2025-03-25-022558', 'App\\Database\\Migrations\\CreateTmpproducts', 'default', 'App', 1742873474, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL DEFAULT '2025-03-17',
  `order_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `order_product_id` int UNSIGNED NOT NULL,
  `order_product_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `order_product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_takendate` date DEFAULT NULL,
  `order_startdate` date DEFAULT NULL,
  `order_enddate` date DEFAULT NULL,
  `order_returndate` date DEFAULT NULL,
  `order_isreturn` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_code` (`order_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `created_at`) VALUES
(1, 1, 'media/products/1741251297_d42c06fb730a2b6ce341.jpg', NULL),
(2, 1, 'media/products/1741251297_7bae641f97138d066352.jpg', NULL),
(3, 1, 'media/products/1741251297_7b857eae0c5b14d05733.jpg', NULL),
(4, 1, 'media/products/1741251297_80777497f6e30db3e2fa.jpg', NULL),
(5, 1, 'media/products/1741251297_e9a4b442ac08fdc6c152.jpg', NULL),
(6, 2, 'media/products/1741251694_cf6b1593446c7748e968.jpg', NULL),
(7, 2, 'media/products/1741251694_2140705a9d44f4fd8b3d.jpg', NULL),
(8, 2, 'media/products/1741251694_b510bc21ae19e3c04769.jpg', NULL),
(9, 2, 'media/products/1741251694_1362ed03cb0f3717e37c.jpg', NULL),
(10, 2, 'media/products/1741251694_294fd2395d4a9066b116.jpg', NULL),
(11, 3, 'media/products/1741661344_43108642dbf523be69f2.jpg', NULL),
(12, 3, 'media/products/1741661344_0d95cf0ef74f1b33d0b5.jpg', NULL),
(13, 3, 'media/products/1741661344_da2e1033ac8836df1ae7.jpg', NULL),
(14, 3, 'media/products/1741661344_6b9a87f6681c2de5af1f.jpg', NULL),
(15, 3, 'media/products/1741661344_e32bc6282f263437abef.webp', NULL),
(16, 4, 'media/products/1742461990_75c88a170b50d1324a0f.jpg', NULL),
(17, 4, 'media/products/1742461990_174ce194b7c866495884.jpg', NULL),
(18, 4, 'media/products/1742461990_d0a2a644e697aa3e62f5.jpg', NULL),
(19, 4, 'media/products/1742461990_5e1c536c3f46284c8e9f.jpg', NULL),
(20, 4, 'media/products/1742461990_e42ee7d5953ebddcb2b6.webp', NULL),
(21, 5, 'media/products/1742540726_330d81365a8437791946.jpg', NULL),
(22, 5, 'media/products/1742540726_eb664d1116fbab102407.jpg', NULL),
(23, 5, 'media/products/1742540726_7d51712f00190693c52d.jpg', NULL),
(24, 5, 'media/products/1742540726_bbb7f122b565e16f2d33.jpg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
