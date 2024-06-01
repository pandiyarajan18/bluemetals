-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_argon`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `id` int(11) NOT NULL,
  `product_uid` int(144) DEFAULT NULL,
  `product_name` varchar(144) DEFAULT NULL,
  `status` int(144) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`id`, `product_uid`, `product_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'M.Sand', NULL, NULL, NULL, NULL),
(2, NULL, 'P.Sand', NULL, NULL, NULL, NULL),
(3, NULL, '5mm', NULL, NULL, NULL, NULL),
(4, NULL, '10mm', NULL, NULL, NULL, NULL),
(5, NULL, '20mm', NULL, NULL, NULL, NULL),
(6, NULL, '40mm', NULL, NULL, NULL, NULL),
(7, NULL, 'Dust', NULL, NULL, NULL, NULL),
(8, NULL, 'gravel', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `quarry_id` varchar(144) DEFAULT NULL,
  `complaint` varchar(144) DEFAULT NULL,
  `status` int(144) DEFAULT NULL,
  `transport_id` int(144) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `quarry_id`, `complaint`, `status`, `transport_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '22222', '222222', 0, 2, '2024-04-28', '2024-04-28', NULL),
(2, '20', '2', 1, 2, '2024-04-28', '2024-04-28', NULL),
(3, '20', '2', 0, 2, '2024-04-28', '2024-04-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `district` varchar(256) DEFAULT NULL,
  `status` int(144) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pudukkottai', 0, NULL, NULL, NULL),
(2, 'Trichy', 0, NULL, NULL, NULL),
(3, 'Thanjavur', 0, NULL, NULL, NULL),
(4, 'karur', 0, NULL, NULL, NULL),
(5, 'Perambalur', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_24_064623_add_column_to_users_table', 2),
(6, '2024_02_24_065044_add_column_to_users_table', 3),
(7, '2024_02_24_065310_add_column_to_users_table', 4),
(8, '2024_02_24_065402_add_column_to_users_table', 5),
(9, '2024_02_24_065429_add_column_to_users_table', 6),
(10, '2024_03_01_070846_add_column_to_table_name', 7),
(11, '2024_03_01_071113_add_column_to_table_name', 8),
(12, '2024_03_01_071219_add_column_to_table_name', 9),
(13, '2024_03_01_072229_add_column_to_table_name', 10),
(14, '2024_03_04_155929_add_column_to_your_table_name', 11),
(15, '2024_03_04_160150_add_column_to_your_table_name', 12),
(16, '2024_03_04_160209_add_column_to_your_table_name', 13),
(17, '2024_03_04_163232_add_column_to_your_table_name', 14),
(18, '2024_03_13_070017_add_column_to_your_table_name', 15),
(19, '2024_03_28_035907_add_column_to_orders_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(155) DEFAULT NULL,
  `product_id` varchar(144) DEFAULT NULL,
  `price` varchar(144) DEFAULT NULL,
  `quantity` varchar(144) DEFAULT NULL,
  `total` varchar(144) DEFAULT NULL,
  `quarry_id` varchar(144) DEFAULT NULL,
  `transport_id` varchar(144) DEFAULT NULL,
  `phone` varchar(144) DEFAULT NULL,
  `vehicle_no` varchar(144) DEFAULT NULL,
  `billing_address` varchar(144) DEFAULT NULL,
  `status` int(144) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `product_id`, `price`, `quantity`, `total`, `quarry_id`, `transport_id`, `phone`, `vehicle_no`, `billing_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, NULL, '2', '4500', '1', '4500', '20', '2', '1', '1', '1', 2, '2024-03-24', '2024-03-25 05:14:00', NULL),
(10, NULL, '1', '3800', '5', '19000', '22', '2', '1', '1', '1', 2, '2024-03-24', '2024-03-25 08:03:44', NULL),
(11, NULL, '5', '3000', '4', '12000', '23', '3', '4', '4', '4', 1, '2024-03-24', '2024-03-24 16:07:37', NULL),
(12, NULL, '5', '3000', '3', '9000', '20', '2', '1', '1', '1', 2, '2024-03-24', '2024-03-25 05:15:57', NULL),
(13, NULL, '3', '2000', '3', '6000', '20', '3', '3', '3', '3', 2, '2024-03-25', '2024-03-25 08:00:05', NULL),
(14, NULL, '1', '4000', '5', '20000', '23', '2', '3', '5', '5', 1, '2024-03-26', '2024-03-26 16:02:01', NULL),
(15, NULL, '8', '4200', '5', '21000', '20', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:02:14', NULL),
(16, NULL, '5', '3000', '5', '15000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:02:26', NULL),
(17, NULL, '1', '4000', '5', '20000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:02:38', NULL),
(18, NULL, '1', '4000', '5', '20000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:02:48', NULL),
(19, NULL, '1', '4000', '5', '20000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:03:00', NULL),
(20, NULL, '1', '4000', '5', '20000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:03:11', NULL),
(21, NULL, '5', '3000', '5', '15000', '23', '2', '5', '5', '5', 1, '2024-03-26', '2024-03-26 16:03:25', NULL),
(22, NULL, '2', '4500', '6', '27000', '20', '2', '6', '6', '6', 1, '2024-03-26', '2024-03-26 16:04:00', NULL),
(23, NULL, '2', '4500', '6', '27000', '20', '2', '6', '6', '6', 1, '2024-03-26', '2024-03-26 16:04:10', NULL),
(24, NULL, '2', '4500', '3', '13500', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:04:21', NULL),
(25, NULL, '5', '3000', '3', '9000', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:04:35', NULL),
(26, NULL, '3', '2000', '3', '6000', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:04:46', NULL),
(27, NULL, '8', '4200', '3', '12600', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:05:10', NULL),
(28, NULL, '5', '3000', '3', '9000', '20', '2', '3', '3', '33', 1, '2024-03-26', '2024-03-26 16:05:19', NULL),
(29, NULL, '2', '4500', '3', '13500', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:05:27', NULL),
(30, NULL, '3', '2000', '3', '6000', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:05:37', NULL),
(31, NULL, '7', '1500', '3', '4500', '21', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:05:50', NULL),
(32, NULL, '3', '2000', '3', '6000', '20', '2', '3', '3', '3', 1, '2024-03-26', '2024-03-26 16:06:00', NULL),
(33, NULL, '3', '2000', '6', '12000', '20', '2', '6', '6', '6', 1, '2024-03-26', '2024-03-26 16:06:13', NULL),
(34, NULL, '3', '2000', '6', '12000', '20', '2', '2', '6', '6', 1, '2024-03-26', '2024-03-26 16:06:22', NULL),
(35, NULL, '5', '3000', '4', NULL, '23', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:06:36', NULL),
(36, NULL, '7', '1500', '4', '6000', '21', '2', '44', '4', '4', 1, '2024-03-26', '2024-03-26 16:06:46', NULL),
(37, NULL, '6', '4000', '4', '16000', '22', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:03', NULL),
(38, NULL, '6', '4000', '4', '16000', '22', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:13', NULL),
(39, NULL, '2', '4500', '4', '18000', '22', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:25', NULL),
(40, NULL, '2', '4500', '4', '18000', '20', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:36', NULL),
(41, NULL, '2', '4500', '4', '18000', '20', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:48', NULL),
(42, NULL, '1', '4000', '4', '16000', '23', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:07:58', NULL),
(43, NULL, '2', '4500', '4', '18000', '20', '2', '4', '4', '4', 1, '2024-03-26', '2024-03-26 16:08:12', NULL),
(44, NULL, '1', '4000', '4', '16000', '23', '2', '4', '4', '4', 1, '2024-03-27', '2024-03-27 17:05:54', NULL),
(45, NULL, '2', '4500', '5', '22500', '20', '2', '5', '5', '5', 1, '2024-03-27', '2024-03-27 17:06:07', NULL),
(46, NULL, '7', '1500', '5', '7500', '21', '2', '5', '5', '5', 1, '2024-04-02', '2024-04-02 02:45:17', NULL),
(47, NULL, '7', '1500', '8', '12000', '21', '2', '8', '8', '8', 1, '2024-04-02', '2024-04-02 02:45:36', NULL),
(48, NULL, '3', '2000', '16', '32000', '20', '2', '16', '16', '16', 1, '2024-04-02', '2024-04-02 02:51:04', NULL),
(49, NULL, '2', '5164', '15', '77460', '20', '2', '11', '15', '15', 1, '2024-04-02', '2024-04-02 03:03:58', NULL),
(50, NULL, '2', '5164', '8', '41312', '20', '2', '8', '8', '8', 1, '2024-04-02', '2024-04-02 03:04:39', NULL),
(51, NULL, '2', '5164', '4', '20656', '20', '2', '4', '4', '4', 1, '2024-04-02', '2024-04-02 03:09:25', NULL),
(52, NULL, '2', '5164', '40', '206560', '20', '2', '40', '40', '40', 1, '2024-04-02', '2024-04-02 03:43:28', NULL),
(53, NULL, '2', '5586', '15', '83790', '20', '2', '15', '15', '15', 1, '2024-04-02', '2024-04-02 03:50:27', NULL),
(54, NULL, '2', '5586', '10', '55860', '20', '2', '10', '10', '10', 1, '2024-04-02', '2024-04-02 03:50:55', NULL),
(55, NULL, '2', '6165', '30', '184950', '20', '2', '3', '3', '3', 1, '2024-04-02', '2024-04-02 04:01:06', NULL),
(56, NULL, '2', '6658', '1', '6658', '20', '2', '1', '1', '1', 1, '2024-04-02', '2024-04-02 04:01:27', NULL),
(57, NULL, '1', '4000', '25', '100000', '23', '2', '20', '25', '25', 1, '2024-04-02', '2024-04-02 04:09:48', NULL),
(58, NULL, '1', '4080', '10', '40800', '23', '2', '10', '10', '10', 1, '2024-04-02', '2024-04-02 04:10:25', NULL),
(59, NULL, '1', '4000', '5', '20000', '20', '2', '555', 'wwwwww', 'ww', 1, '2024-04-05', '2024-04-05 07:22:57', NULL),
(60, NULL, '2', '6658', '20', '133160', '20', '2', '1', 'q', 'q', 1, '2024-04-05', '2024-04-05 07:25:20', NULL),
(61, NULL, '2', '4500', '2', '9000', '22', '2', '2', '2', '2', 1, '2024-04-17', '2024-04-17 08:15:29', NULL),
(62, NULL, '2', '4500', '5', '22500', '22', '2', '5', '5', '5', 1, '2024-04-17', '2024-04-17 08:15:43', NULL),
(63, NULL, '2', '4500', '5', '22500', '22', '2', '5', '5', '5', 1, '2024-04-17', '2024-04-17 08:15:54', NULL),
(64, NULL, '2', '4680', '3', '14040', '22', '2', '3', '3', '3', 1, '2024-04-17', '2024-04-17 08:16:14', NULL),
(65, NULL, '2', '6658', '3', '19974', '20', '2', '2', '3', '3', 1, '2024-04-17', '2024-04-17 08:16:34', NULL),
(66, NULL, '1', '4406', '5', '22030', '23', '2', '6382218462', '8', '2222', 1, '2024-04-22', '2024-04-22 08:14:14', NULL),
(67, NULL, '5', '3000', '5', '15000', '20', '2', '6382218462', '33', '111', 1, '2024-04-22', '2024-04-22 08:30:19', NULL),
(68, NULL, '8', '4200', '3', '12600', '21', '2', '13', '3', '3', 1, '2024-04-23', '2024-04-23 06:42:29', NULL),
(69, NULL, '3', '1950', '5', '9750', '21', '2', '55', '55', '33', 1, '2024-04-23', '2024-04-23 06:44:05', NULL),
(70, NULL, '5', '3000', '20', '60000', '20', '2', '2', '2', '2', 1, '2024-04-23', '2024-04-23 14:50:56', NULL),
(71, NULL, '5', '3180', '5', '15900', '20', '2', '1', '1', '1', 1, '2024-04-23', '2024-04-23 14:51:24', NULL),
(72, NULL, '1', '3800', '5', '19000', '22', '2', '4', '4', '4', 1, '2024-04-23', '2024-04-23 14:52:29', NULL),
(73, NULL, '8', '4200', '5', '21000', '20', '2', '6382218462', 'tn69l5457', 'mandaiyur vadakadu', 1, '2024-04-29', '2024-04-29 05:50:18', NULL),
(74, NULL, '8', '4200', '5', '21000', '21', '2', '6382218462', 'tn69l5457', 'no:483,t.nallur,pudukkottai-622515', 1, '2024-05-03', '2024-05-03 17:22:54', NULL),
(75, NULL, '8', '4200', '5', '21000', '21', '2', '6382215462', '111', '1', 1, '2024-05-03', '2024-05-03 17:36:30', NULL),
(76, NULL, '1', '4000', '5', '20000', '20', '2', '6382218462', 'TN69L5457', 'NO 483, T.NALLUR ,PUDUKKOTTAI-622515', 1, '2024-05-05', '2024-05-05 02:56:06', NULL),
(77, NULL, '8', '4200', '5', '21000', '21', '2', '1', '1', '1', 1, '2024-05-05', '2024-05-05 02:58:24', NULL),
(78, NULL, '8', '4200', '30', '126000', '20', '2', '6382218462', 'TN69L5457', 'PUDUKKOTTAI', 1, '2024-05-05', '2024-05-05 03:17:26', NULL),
(79, NULL, '8', '4452', '5', '22260', '20', '2', '6382218462', 'TN69L7894', 'TRICHY', 1, '2024-05-05', '2024-05-05 03:19:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(144) NOT NULL,
  `uid` int(144) DEFAULT NULL,
  `product_id` int(144) DEFAULT NULL,
  `Product_name` int(144) DEFAULT NULL,
  `quantity` varchar(144) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `adv_quantity` int(144) DEFAULT NULL,
  `status` int(144) DEFAULT NULL,
  `price_status` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uid`, `product_id`, `Product_name`, `quantity`, `price`, `adv_quantity`, `status`, `price_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 20, 2, NULL, '1', 7057, NULL, 0, '3', '2024-04-17', '2024-04-17 08:16:34', NULL),
(20, 23, 1, NULL, '2', 4670, NULL, 0, '3', '2024-04-22', '2024-04-22 08:14:15', NULL),
(21, 20, 3, NULL, '88', 2000, NULL, 0, NULL, '2024-03-05', '2024-04-02 02:51:04', NULL),
(22, 20, 5, NULL, '3', 3434, NULL, 0, '4', '2024-04-23', '2024-04-23 14:51:24', NULL),
(23, 20, 8, NULL, '7', 4808, NULL, 0, '4', '2024-05-05', '2024-05-05 03:19:03', NULL),
(25, 23, 5, NULL, '36', 3000, NULL, 0, NULL, '2024-03-05', '2024-03-26 16:06:36', NULL),
(26, 23, 6, NULL, '55', 4000, NULL, 0, NULL, '2024-03-05', '2024-03-05 15:00:05', NULL),
(27, 23, 8, NULL, '45', 4200, NULL, 0, NULL, '2024-03-05', '2024-03-05 15:00:14', NULL),
(28, 22, 1, NULL, '83', 3800, NULL, 0, NULL, '2024-03-05', '2024-04-23 14:52:29', NULL),
(29, 22, 2, NULL, '3', 5054, NULL, 0, '4', '2024-04-17', '2024-04-17 08:16:14', NULL),
(30, 22, 4, NULL, '55', 2500, NULL, 0, NULL, '2024-03-05', '2024-03-05 15:00:48', NULL),
(31, 22, 6, NULL, '69', 4000, NULL, 0, NULL, '2024-03-05', '2024-03-26 16:07:13', NULL),
(32, 21, 3, NULL, '17', 1950, NULL, 0, NULL, '2024-03-05', '2024-04-23 06:44:05', NULL),
(34, 21, 8, NULL, '48', 4200, NULL, 0, NULL, '2024-03-05', '2024-05-05 02:58:24', NULL),
(35, 21, 7, NULL, '44', 1500, NULL, 0, NULL, '2024-03-05', '2024-04-02 02:45:36', NULL),
(36, 20, 1, NULL, '13', 4000, NULL, 0, NULL, '2024-03-13', '2024-05-05 02:56:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quarries`
--

CREATE TABLE `quarries` (
  `id` int(144) NOT NULL,
  `uid` int(144) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `quarry_name` varchar(144) NOT NULL,
  `quarry_ownername` varchar(144) NOT NULL,
  `phone` varchar(144) NOT NULL,
  `quarry_address` varchar(144) NOT NULL,
  `quarry_photo` varchar(144) NOT NULL,
  `lat1` varchar(255) DEFAULT NULL,
  `long1` varchar(255) DEFAULT NULL,
  `status` int(144) NOT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quarries`
--

INSERT INTO `quarries` (`id`, `uid`, `district`, `quarry_name`, `quarry_ownername`, `phone`, `quarry_address`, `quarry_photo`, `lat1`, `long1`, `status`, `pincode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, NULL, '1', 'sr', 'segar reddy', '6382218462', 'uppiliyakudi', '1709303340.jpg', '10.516197', '78.808092', 2, '622002', '2024-03-01 14:29:00', '2024-03-01 14:36:44', NULL),
(21, NULL, '1', 'MMR', 'samy', '6382218463', 'kulathur', '1709303401.jpg', '10.555708', '78.764621', 2, '622005', '2024-03-01 14:30:01', '2024-03-01 14:36:42', NULL),
(22, NULL, '1', 'senthoor', 'senthil', '6382218464', 'ammasathiram', '1709303463.jpg', '10.533168', '78.767705', 2, '622006', '2024-03-01 14:31:03', '2024-03-01 14:36:43', NULL),
(23, NULL, '2', 'krn', 'muniyan', '6382218465', 'sathiyamangalam', '1709303555.jpg', '10.471000', '78.785636', 2, '622007', '2024-03-01 14:32:35', '2024-03-01 14:36:41', NULL),
(25, NULL, '2', 'vmt', 'arun', '6382218465', 'trichy', '1712301188.jpg', '11.1271225', '78.6568942', 2, '622515', '2024-04-05 07:13:08', '2024-04-05 07:18:09', NULL),
(26, NULL, '4', 'mmf', 'arun', '6547895248', 'karur', '1714887107.jpg', '10.8003328', '78.6792448', 0, '655548', '2024-05-05 05:31:47', '2024-05-05 05:31:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `truckowners`
--

CREATE TABLE `truckowners` (
  `id` int(144) NOT NULL,
  `uid` int(144) DEFAULT NULL,
  `transport_name` varchar(144) NOT NULL,
  `transport_owner_name` varchar(144) NOT NULL,
  `phone` varchar(144) NOT NULL,
  `transport_address` varchar(144) NOT NULL,
  `status` int(144) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `truckowners`
--

INSERT INTO `truckowners` (`id`, `uid`, `transport_name`, `transport_owner_name`, `phone`, `transport_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, 'bmk', 'manikandan', '1234567890', 'thondaiman nallur', 0, '2024-03-01 15:06:42', '2024-03-01 15:06:42', NULL),
(3, NULL, 'smt', 'mahalingam', '7845124578', 'nalllur', 0, '2024-03-24 16:06:26', '2024-03-24 16:06:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(144) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `username`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `status`, `address`, `city`, `country`, `postal`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$12$Pa4lZPpuGsVbqUd2GfVqDOq.LwODzQlxqAo24id9TUoAak2vTSjky', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'pandi', 'pandi', NULL, 'quarry@gmail.com', NULL, '$2y$12$Pa4lZPpuGsVbqUd2GfVqDOq.LwODzQlxqAo24id9TUoAak2vTSjky', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'truck', 'truck', 'owner', 'truck@gmail.com', NULL, '$2y$12$Pa4lZPpuGsVbqUd2GfVqDOq.LwODzQlxqAo24id9TUoAak2vTSjky', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'demo', 'demo', 'demo', 'demo@gmail.com', NULL, '$2y$12$Pa4lZPpuGsVbqUd2GfVqDOq.LwODzQlxqAo24id9TUoAak2vTSjky', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '20', 'sr', NULL, NULL, 'sr@gmail.com', NULL, '$2y$12$WFS0s.ESPBbwp5dRrINjie1Q6IQz9W9g.VuMVuaUp7228e/3ZSD/K', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 08:59:00', '2024-03-01 09:06:44'),
(23, '21', 'MMR', NULL, NULL, 'mmr@gmail.com', NULL, '$2y$12$xwfFmlPj1SZTJ4diwEUTmO0Mx7JPjNF4RpSakyFSuouRTPFAv67KG', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 09:00:01', '2024-03-01 09:06:42'),
(24, '22', 'senthoor', NULL, NULL, 'senthoor@gmail.com', NULL, '$2y$12$PsGgJuXdYf5Gg/xtcx9ZC.07aXmIxbJ3NwKhUAGtPwvh3F/AKYK5i', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 09:01:03', '2024-03-01 09:06:43'),
(25, '23', 'krn', NULL, NULL, 'krn@gmail.com', NULL, '$2y$12$1HP9tOLNPB7yLoUwlVhhGOm8vMbCElC/0YCoOZUA0.RbjqmWQ52wG', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 09:02:35', '2024-03-01 09:06:41'),
(27, '2', 'bmk', NULL, NULL, 'mani@gmail.com', NULL, '$2y$12$iqH1rTwVvUhPTbiYXX5bOu75EnXgoL10luYsQMA23SAu68cE7rLMi', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-01 09:36:42', '2024-03-01 09:36:42'),
(28, '3', 'smt', NULL, NULL, 'smt@gmail.com', NULL, '$2y$12$UpnhE/fVaJxOLLMsKEcwe.PL44FZjjj.p0Ey25mTngJ3tDwp6bG2y', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:36:26', '2024-03-24 10:36:26'),
(29, '25', 'vmt', NULL, NULL, 'arun1@gmail.com', NULL, '$2y$12$bc.MW6BxrEU3Wobug0Y0/Oico620xIgt2i.bo8buoSmP.bq6uEF4O', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-05 01:43:08', '2024-04-05 01:48:09'),
(30, '26', 'mmf', NULL, NULL, 'akumar@gmail.com', NULL, '$2y$12$sgHzBRkzlcqhP0Qy.0tCveGA/1AXrRlVXOXtbiK5y7azI6cikSJbi', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-05 00:01:47', '2024-05-05 00:01:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarries`
--
ALTER TABLE `quarries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truckowners`
--
ALTER TABLE `truckowners`
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
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(144) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `quarries`
--
ALTER TABLE `quarries`
  MODIFY `id` int(144) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `truckowners`
--
ALTER TABLE `truckowners`
  MODIFY `id` int(144) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
