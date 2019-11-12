-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 12:18 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamdard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_id` int(11) NOT NULL,
  `invoice_master_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_net_price` decimal(10,2) NOT NULL,
  `product_market_price` double(10,2) NOT NULL,
  `product_total_price` decimal(10,2) NOT NULL,
  `product_performances` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_bonus` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice_update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`invoice_id`, `invoice_master_id`, `product_name`, `product_net_price`, `product_market_price`, `product_total_price`, `product_performances`, `product_id`, `product_quantity`, `product_bonus`, `invoice_create_at`, `invoice_update_at`) VALUES
(1, 1, 'সিনকারা', '300.00', 300.00, '300.00', '1000  মিলি', 1, 1, '0.03333333333333333', '2018-11-21 22:38:17', '0000-00-00 00:00:00'),
(2, 1, 'সিনকারা R', '290.00', 290.00, '290.00', '500  মিলি', 2, 1, 'বোনাস নেই', '2018-11-21 22:38:17', '0000-00-00 00:00:00'),
(3, 1, 'ন্যাপাR', '80.00', 80.00, '80.00', '10x10  ট্যাবলেট', 18, 1, '0.1', '2018-11-21 22:38:17', '0000-00-00 00:00:00'),
(4, 1, 'ন্যাপাR', '50.00', 50.00, '50.00', '10X5  ট্যাবলেট', 17, 1, '0.02', '2018-11-21 22:38:17', '0000-00-00 00:00:00'),
(5, 2, 'ন্যাপাR', '80.00', 100.00, '2000.00', '10x10  ট্যাবলেট', 18, 20, '2', '2018-11-21 22:56:21', '0000-00-00 00:00:00'),
(6, 2, 'ন্যাপাR', '50.00', 70.00, '3500.00', '10X5  ট্যাবলেট', 17, 50, '1', '2018-11-21 22:56:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `invoice_master_id` int(11) NOT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ph_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `re_id` int(11) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `invoice_master_create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`invoice_master_id`, `serial_no`, `order_date_time`, `ph_id`, `br_id`, `re_id`, `grand_total`, `status`, `invoice_master_create_at`) VALUES
(1, '112204-382', '2018-11-21 22:38:17', 1, 1, 1, '720.00', 1, '2018-11-22'),
(2, '112204-56C', '2018-11-21 22:56:21', 1, 1, 1, '5500.00', 1, '2018-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `table_branch`
--

CREATE TABLE `table_branch` (
  `br_id` int(11) NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_branch`
--

INSERT INTO `table_branch` (`br_id`, `branch_name`, `branch_create_at`) VALUES
(1, 'চুনারুঘাট', '2018-11-21 21:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `table_pharmacy`
--

CREATE TABLE `table_pharmacy` (
  `ph_id` int(11) NOT NULL,
  `ph_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_proprietor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_under_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_under_representative` int(11) NOT NULL,
  `ph_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ph_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pharmacy`
--

INSERT INTO `table_pharmacy` (`ph_id`, `ph_name`, `ph_proprietor`, `ph_address`, `ph_phone`, `ph_under_branch`, `ph_under_representative`, `ph_create_at`, `ph_update_at`) VALUES
(1, 'মদিনা ফার্মেসি ', 'খান সাহেব ', 'দেউলিয়া বাজার, চুনারুঘাট ', '+8801671146363 ', '1', 1, '2018-11-21 21:57:54', '2018-11-21 22:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_net_price` decimal(10,2) NOT NULL,
  `pro_market_price` decimal(10,2) NOT NULL,
  `pro_performances` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_unit` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `bonus_target` int(11) NOT NULL,
  `gained_bonus` int(11) NOT NULL,
  `pro_created_at` datetime NOT NULL,
  `pro_update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`pro_id`, `pro_name`, `pro_sku`, `pro_type`, `pro_net_price`, `pro_market_price`, `pro_performances`, `pro_unit`, `pro_stock`, `bonus_target`, `gained_bonus`, `pro_created_at`, `pro_update_at`) VALUES
(1, 'সিনকারা', 'sin101', 'সিরাপ', '300.00', '340.00', '1000', 'মিলি', 500, 30, 1, '2018-11-22 04:05:28', '0000-00-00 00:00:00'),
(2, 'সিনকারা R', 'sin102', 'সিরাপ', '290.00', '310.00', '500', 'মিলি', 500, 0, 0, '2018-11-22 04:05:28', '0000-00-00 00:00:00'),
(6, 'শাপা', 'sap101', 'ট্যাবলেট', '10.00', '12.00', '10X5', 'মিলি', 500, 30, 5, '2018-11-22 04:14:12', '0000-00-00 00:00:00'),
(17, 'ন্যাপাR', 'nap303', 'ট্যাবলেট', '50.00', '70.00', '10X5', 'ট্যাবলেট', 500, 50, 1, '2018-11-22 04:27:39', '0000-00-00 00:00:00'),
(18, 'ন্যাপাR', 'nap304', 'ট্যাবলেট', '80.00', '100.00', '10x10', 'ট্যাবলেট', 500, 100, 10, '2018-11-22 04:27:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_product_sku`
--

CREATE TABLE `table_product_sku` (
  `sku_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_create_at` datetime NOT NULL,
  `sku_update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_representative`
--

CREATE TABLE `table_representative` (
  `id` int(11) NOT NULL,
  `re_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_branch` int(11) NOT NULL,
  `re_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `re_update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_representative`
--

INSERT INTO `table_representative` (`id`, `re_name`, `re_phone`, `re_address`, `re_branch`, `re_code`, `re_create_at`, `re_update_at`) VALUES
(1, 'সুমন', '+8801731001333', 'চুনারুঘাট সদর', 1, '111', '2018-11-21 21:54:27', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`invoice_master_id`);

--
-- Indexes for table `table_branch`
--
ALTER TABLE `table_branch`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `table_pharmacy`
--
ALTER TABLE `table_pharmacy`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `table_product_sku`
--
ALTER TABLE `table_product_sku`
  ADD PRIMARY KEY (`sku_id`);

--
-- Indexes for table `table_representative`
--
ALTER TABLE `table_representative`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `invoice_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_branch`
--
ALTER TABLE `table_branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_pharmacy`
--
ALTER TABLE `table_pharmacy`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `table_product_sku`
--
ALTER TABLE `table_product_sku`
  MODIFY `sku_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_representative`
--
ALTER TABLE `table_representative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
