-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 02:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_title`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', '2017-04-18 11:02:48', '2017-05-08 12:03:18'),
(2, 'Samsung', '2017-04-18 11:04:03', '2017-04-18 11:04:03'),
(3, 'Nokia', '2017-04-18 11:04:38', '2017-04-18 11:04:38'),
(4, 'Google', '2017-04-18 11:04:57', '2017-04-18 11:04:57'),
(5, 'Motorola', '2017-04-18 11:05:02', '2017-04-18 11:05:02'),
(6, 'Blackberry', '2017-04-18 11:05:15', '2017-04-18 11:05:15'),
(7, 'HTC', '2017-04-18 11:05:20', '2017-04-18 11:05:20'),
(8, 'LG', '2017-04-18 11:05:41', '2017-04-18 11:05:41'),
(9, 'Lenovo', '2017-04-18 11:06:33', '2017-04-18 11:06:33'),
(10, 'Sony', '2017-04-18 11:07:17', '2017-04-18 11:07:17'),
(12, 'One+', '2017-05-08 12:08:34', '2017-05-08 12:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(11, 1, 17, 1, '2017-05-13 14:28:48', '2017-05-13 14:28:48'),
(5, 2, 9, 1, '2017-05-13 12:31:41', '2017-05-13 12:31:41'),
(7, 2, 10, 1, '2017-05-13 12:35:14', '2017-05-13 12:35:14'),
(8, 2, 18, 1, '2017-05-13 12:59:52', '2017-05-13 12:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `faveorites`
--

CREATE TABLE `faveorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faveorites`
--

INSERT INTO `faveorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2017-05-13 14:23:45', '2017-05-13 14:23:45'),
(2, 1, 9, '2017-05-13 14:24:56', '2017-05-13 14:24:56'),
(3, 1, 3, '2017-05-13 14:25:25', '2017-05-13 14:25:25'),
(4, 1, 16, '2017-05-13 14:28:56', '2017-05-13 14:28:56'),
(5, 2, 3, '2017-05-13 14:30:21', '2017-05-13 14:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_section_id` int(11) NOT NULL,
  `file_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `code`, `ord`, `visible`, `created_at`, `updated_at`) VALUES
(1, 'Shqip', 'sq', '0', '1', '2017-04-15 13:26:13', '2017-04-15 13:26:13'),
(2, 'English', 'en', '1', '1', '2017-04-15 13:26:13', '2017-04-15 13:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_10_02_180230_create_users_table', 1),
('2016_10_02_192553_create_languages_table', 1),
('2016_10_03_034002_create_roles_table', 1),
('2017_02_02_165607_create_role_user_table', 1),
('2017_04_16_193920_create_files_table', 2),
('2017_04_16_194600_create_sections_table', 3),
('2017_04_16_202914_create_brands_table', 4),
('2017_04_16_202928_create_products_table', 4),
('2017_04_18_134339_create_product_images_table', 5),
('2017_05_02_184414_create_carts_table', 6),
('2017_05_13_153743_create_faveorites_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `new_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_title`, `product_description`, `price`, `new_price`, `created_at`, `updated_at`) VALUES
(1, '2', 'Galaxy Note 4', 'asdasd', 300, 0, '2017-04-24 13:29:06', '2017-05-08 12:39:27'),
(9, '3', 'Lumia', 'asdasd', 250, 0, '2017-05-13 11:16:44', '2017-05-13 11:16:44'),
(3, '2', 'Note 1', 'asdasd', 200, 0, '2017-04-24 13:30:01', '2017-04-24 13:30:01'),
(10, '1', '6s', 'asdasd', 350, 0, '2017-05-13 12:34:58', '2017-05-13 12:34:58'),
(11, '12', '3', 'asdasdad', 400, 0, '2017-05-13 12:36:58', '2017-05-13 12:36:58'),
(12, '4', 'Nexus 5', 'asdasdas', 180, 0, '2017-05-13 12:38:13', '2017-05-13 12:38:13'),
(13, '5', 'nexus 6', 'efjkjksd', 550, 0, '2017-05-13 12:39:46', '2017-05-13 12:39:46'),
(14, '6', 'z30', 'dfgedfb', 450, 0, '2017-05-13 12:41:48', '2017-05-13 12:41:48'),
(15, '7', '10', 'dfbdfbdf', 400, 0, '2017-05-13 12:42:58', '2017-05-13 12:42:58'),
(16, '8', 'G5', 'dfbdbg', 300, 0, '2017-05-13 12:44:01', '2017-05-13 12:44:01'),
(17, '9', 'k6 note', 'jsdfdjkjk', 250, 0, '2017-05-13 12:44:58', '2017-05-13 12:44:58'),
(18, '10', 'Xperia', 'djjfdj', 400, 0, '2017-05-13 12:46:22', '2017-05-13 12:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `file_original_name`, `size`, `type`, `created_at`, `updated_at`) VALUES
(1, '1', 'galaxy-note-4.jpg', 36064, 'image/jpeg', '2017-04-24 13:29:06', '2017-04-24 13:29:06'),
(7, '9', '8eca6e45-3b1b-46c1-bb9f-b30f854debda.jpg', 38680, 'image/jpeg', '2017-05-13 11:16:44', '2017-05-13 11:16:44'),
(3, '3', 'galaxy-note-1.jpg', 51642, 'image/jpeg', '2017-04-24 13:30:01', '2017-04-24 13:30:01'),
(8, '10', 'iphone6s-plus-spacegrey.png', 213102, 'image/png', '2017-05-13 12:34:58', '2017-05-13 12:34:58'),
(9, '11', 'OnePlus-3T-Gunmetal-1.jpg', 97131, 'image/jpeg', '2017-05-13 12:36:58', '2017-05-13 12:36:58'),
(10, '12', '81ppdPjqhnL._SL1500_.jpg', 268834, 'image/jpeg', '2017-05-13 12:38:13', '2017-05-13 12:38:13'),
(11, '13', 'nexus 6.jpg', 4583, 'image/jpeg', '2017-05-13 12:39:46', '2017-05-13 12:39:46'),
(12, '14', 'blackberry.jpg', 74854, 'image/jpeg', '2017-05-13 12:41:48', '2017-05-13 12:41:48'),
(13, '15', 'htc-10.png', 140635, 'image/png', '2017-05-13 12:42:58', '2017-05-13 12:42:58'),
(14, '16', 'lg g5.jpg', 275082, 'image/jpeg', '2017-05-13 12:44:01', '2017-05-13 12:44:01'),
(15, '17', 'lenovo k6 note.jpg', 79382, 'image/jpeg', '2017-05-13 12:44:58', '2017-05-13 12:44:58'),
(16, '18', 'sony xperia.jpg', 3470, 'image/jpeg', '2017-05-13 12:46:22', '2017-05-13 12:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'Administrator of the website', '2017-04-16 13:12:20', '2017-04-16 13:12:20'),
(2, 'guest', 'guest user', 'websites guest user', '2017-04-16 13:14:15', '2017-04-16 13:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '3', NULL, NULL),
(2, 2, '1', NULL, NULL),
(3, 1, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_title`, `created_at`, `updated_at`) VALUES
(1, 'banner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Dren', 'Mullafetahu', 'dramdrum.m@gmail.com', '$2y$10$bArPaalG/C64QTS4TMciJutfBOY7PvYcX8jmnmPPaSWpnxkRyhhKW', 'q6swNhnxWteJwrp2zlWwnHWWq7WOF6kxE8wzCWVpgLZUxU9OVMQqXntBTqrl', '2017-04-16 13:27:30', '2017-05-13 14:29:08'),
(2, 0, 'Funda', 'Gashi', 'funda.gash@gmail.com', '$2y$10$.faTvLWDiroLgRUTgQswHOS0VXHjdEPvYKBB5JRuKLNPpDRle3YHu', 'oBKoNkizK0shT7F5yAvDzeagGO5iSm3jnnm5zixyCjMk6o20x1NL6pYeEPx2', '2017-04-16 13:28:01', '2017-05-13 14:31:13'),
(3, 0, 'Sara', 'Perolli', 'saraperolli@gmail.com', '$2y$10$C/2jYsT0Gtf6QhJ9rO8HAO4W7NVWkVEu6/ms8bLpmEdExpVpAbmMW', 'WSpPlR1rmjiaB9kb1zFZUKhDDoFJnYQVFeN7YdcrAf1OZ1s6iF4BwF9Q9kWO', '2017-04-18 12:44:54', '2017-04-18 12:51:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faveorites`
--
ALTER TABLE `faveorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `faveorites`
--
ALTER TABLE `faveorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
