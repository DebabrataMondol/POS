-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 11:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` text COLLATE utf8mb4_unicode_ci,
  `opening_date` date DEFAULT NULL,
  `opening_balance` double(8,2) DEFAULT NULL,
  `branch_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_mobile`, `branch_email`, `branch_address`, `opening_date`, `opening_balance`, `branch_userid`) VALUES
(3, 'Mirpur Branch', '0199887755', 'branch@gmail.com', 'Mirpur,Dhaka, Bangladesh', '2019-01-06', 5000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Nokia', 1, 1, '2018-10-15 01:29:34', '2019-01-05 03:48:47'),
(3, 'Oppo', 1, 1, '2018-10-15 01:29:42', '2019-01-04 11:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `candf`
--

CREATE TABLE `candf` (
  `candfid` int(10) UNSIGNED NOT NULL,
  `cf_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cf_address` text COLLATE utf8mb4_unicode_ci,
  `cfopaning_blance` double(8,2) DEFAULT NULL,
  `cf_date` date DEFAULT NULL,
  `cf_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candf`
--

INSERT INTO `candf` (`candfid`, `cf_name`, `cf_mobile`, `cf_email`, `cf_address`, `cfopaning_blance`, `cf_date`, `cf_userid`) VALUES
(2, 'Abid Ahmed', '01558877223', 'abid@gmail.com', 'Uttara,Dhaka-1230', 2000.00, '2019-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Electrical', 1, 1, '2018-10-15 01:55:12', '2019-01-05 03:48:54'),
(4, 'Electrical', 1, 1, '2018-10-15 03:18:03', '2019-01-04 11:15:33'),
(5, 'rack', 1, 1, '2018-10-15 03:18:48', '2019-01-04 11:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_date` date DEFAULT NULL,
  `comy_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_mobile`, `company_email`, `company_website`, `company_address`, `country`, `currency_code`, `company_vat`, `company_image`, `company_date`, `comy_userid`) VALUES
(1, 'Creative POS', '017107694821', 'creativepos@gmail.com', 'www.creativesoftware.com', 'Mirpur, Dhaka, Bangladesh', 'BD', 'BDT', '0', 'public/Company/2018/igbDH-053523-hNH.png', '2018-10-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companyusers`
--

CREATE TABLE `companyusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyusers`
--

INSERT INTO `companyusers` (`id`, `first_name`, `last_name`, `user_email`, `user_mobile`, `user_password`, `user_role`, `branch_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mashud', 'rana', 'sanucseduet@gmail.com', '01722159546', '$2y$10$jwViC2geXoImlIejZfUVNuy5/6Kr4wkVgZzFLL4qqyuChXEoSUqIa', 1, 1, 1, '2018-10-18 03:15:41', '2019-02-21 01:11:58'),
(2, 'Mahadi', 'Hasan Milon', 'milon@gmail.com', '563535635', '$2y$10$EE10hEZaj3b6kNwf9hlBm.a5SNbFk2RV/83lQgQTSiW2OclUEKi.y', 1, 1, 1, '2019-01-05 02:34:32', '2019-02-12 01:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci,
  `copaning_balance` double(8,2) DEFAULT NULL,
  `custmr_date` date DEFAULT NULL,
  `custmr_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_cat`, `customer_name`, `customer_mobile`, `customer_email`, `customer_address`, `copaning_balance`, `custmr_date`, `custmr_userid`) VALUES
(2, 'Silver', 'Rasel Ahmed Tusher', '01722159546', 'mashud624496@gmail.com', 'Eliphant Road, Dhaka, Bangladesh', 12000.00, '2018-10-16', 1),
(4, 'Silver', 'Mahadi Hasan Milon', '01735400444', 'mahadirumu@gmail.com', 'Uttara,Dhaka,Bangladesh', 12000.00, '2019-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Phone', 1, 1, '2018-10-14 04:42:09', '2019-01-05 03:54:30'),
(11, 'Papers', 1, 1, '2018-10-15 00:09:10', '2019-01-05 03:55:02'),
(13, 'Computer', 1, 1, '2018-10-15 00:16:24', '2018-10-15 00:16:24'),
(15, 'HP', 1, 1, '2018-10-15 04:24:55', '2019-01-04 11:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `lc_purchase`
--

CREATE TABLE `lc_purchase` (
  `lc_purchase_id` int(10) UNSIGNED NOT NULL,
  `lc_purdate` date DEFAULT NULL,
  `lc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_purchaseno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_supplierno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_unitetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_stockid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_suppliercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_conrate` int(11) DEFAULT NULL,
  `lc_candfbdt` double(8,2) DEFAULT NULL,
  `candfid` int(11) DEFAULT NULL,
  `lc_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_designno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_pquantity` int(11) DEFAULT NULL,
  `lc_revquantity` int(11) DEFAULT NULL,
  `lc_purrate` int(11) DEFAULT NULL,
  `lc_carryingtk` int(11) DEFAULT NULL,
  `lc_costbtb` int(11) DEFAULT NULL,
  `lc_wmargin` int(11) DEFAULT NULL,
  `lc_wprice` int(11) DEFAULT NULL,
  `lc_rmargin` int(11) DEFAULT NULL,
  `lc_retailprice` int(11) DEFAULT NULL,
  `lcp_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lc_purchase`
--

INSERT INTO `lc_purchase` (`lc_purchase_id`, `lc_purdate`, `lc_number`, `supplier_id`, `lc_purchaseno`, `lc_supplierno`, `lc_unitetype`, `lc_stockid`, `lc_suppliercode`, `lc_conrate`, `lc_candfbdt`, `candfid`, `lc_group`, `lc_brand`, `lc_category`, `lc_designno`, `lc_description`, `lc_pquantity`, `lc_revquantity`, `lc_purrate`, `lc_carryingtk`, `lc_costbtb`, `lc_wmargin`, `lc_wprice`, `lc_rmargin`, `lc_retailprice`, `lcp_userid`) VALUES
(27, '2019-01-06', '5555', '4', 'LPO60120191', '2222', 'Meter', '60120194', '3333', 10000, 500000.00, 2, '7', '3', '5', '585588', 'ertyhdhhjfjhm', 3, 2, 50, 1000, 500000, 5, 525000, 5, 551250, 1),
(28, '2019-01-06', '58252', '4', 'LPO60120191', '2222', 'Meter', '60120197', '3333', 100, 20000.00, 2, '13', '2', '1', '5242', 'ertyhdhhjfjhm', 2, 1, 200, 1000, 21000, 0, 21000, 0, 21000, 1),
(29, '2019-01-06', '56354365', '6', 'LPO60120191', '1234', 'PCS', '60120199', '1234', 1000, 150000.00, 2, '15', '3', '5', '56365436543', 'hdujhfdjfgjg', 5, 2, 150, 1200, 151200, 2, 154224, 2, 157308, 1);

-- --------------------------------------------------------

--
-- Table structure for table `local_purchase`
--

CREATE TABLE `local_purchase` (
  `local_purchase_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_invoiceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pgroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `margin` double(8,2) DEFAULT NULL,
  `sale_price` double(8,2) DEFAULT NULL,
  `localp_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_purchase`
--

INSERT INTO `local_purchase` (`local_purchase_id`, `purchase_date`, `supplier_id`, `purchase_no`, `supplier_invoiceno`, `unit_type`, `stock_id`, `supplier_code`, `pgroup`, `brand`, `category`, `description`, `quantity`, `cost`, `margin`, `sale_price`, `localp_userid`) VALUES
(28, '2019-01-06', '4', 'PO60120191', '12345', 'Meter', '60120191', '12345', 'Phone', NULL, NULL, 'Phone Nokia Electrical', 12, 15000.00, 5.00, 15750.00, 1),
(29, '2019-01-06', '4', 'PO60120191', '12345', 'Meter', '60120191', '12345', 'Papers', NULL, NULL, 'Papers Oppo rack', 20, 1500.00, 2.00, 1530.00, 1),
(30, '2019-01-06', '4', 'PO60120191', '12345', 'Meter', '60120191', '12345', 'Phone', NULL, NULL, 'Phone Nokia Electrical', 12, 10000.00, 2.00, 10200.00, 1),
(31, '2019-01-06', '6', 'PO60120194', '2468', 'PCS', '60120194', '2468', 'Papers', NULL, NULL, 'Papers Nokia rack', 20, 13000.00, 5.00, 13650.00, 1),
(32, '2019-01-06', '6', 'PO60120194', '2468', 'PCS', '60120194', '2468', 'Phone', NULL, NULL, 'Phone Oppo Electrical', 12, 14000.00, 5.00, 14700.00, 1),
(33, '2019-01-11', '4', 'PO110120196', NULL, 'PCS', '110120196', NULL, 'Computer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(34, '2019-01-11', '6', 'PO110120196', '123456', 'Meter', '110120196', '123456', 'HP', NULL, NULL, 'HP Oppo Electrical', 23, 20000.00, 2.00, 20400.00, 1),
(35, '2019-01-11', '4', 'PO110120198', 'hhhhh', 'PCS', '110120198', 'hhhhh', 'HP', NULL, NULL, 'HP Oppo Electrical', 15, 5000.00, 7.00, 5350.00, 1),
(36, '2019-01-11', '4', 'PO110120199', '56', 'PCS', '110120198', '786578', 'Phone', NULL, NULL, 'HP Nokia rack', 2, 454445.00, 4.00, 472622.80, 1),
(37, '2010-06-14', '4', 'PO140620110', '32563563', 'PCS', '140620107', '45345345', 'HP', NULL, NULL, 'HP Nokia rack', 52, 12000.00, 50.00, 18000.00, 1),
(38, '2010-06-14', '4', 'PO1406201011', '537634', 'Meter', '140620108', '786787866', 'Phone', NULL, NULL, 'Phone Oppo rack', 786, 786.00, 786.00, 6963.96, 1),
(39, '2010-06-14', '4', 'PO1406201012', '4564564', 'PCS', '140620109', '52764', 'HP', NULL, NULL, 'HP Nokia rack', 45, 12000.00, 50.00, 18000.00, 1),
(40, '2019-02-16', '4', 'PO1602201913', '32563563', 'Meter', '160220191', '45345345', 'Phone', NULL, NULL, 'Phone Nokia Electrical', 52, 12000.00, 50.00, 18000.00, 1),
(41, '2019-02-16', '4', 'PO1602201913', '32563563', 'Meter', '160220191', '45345345', 'Papers', NULL, NULL, 'Papers Nokia Electrical', 52, 12000.00, 50.00, 18000.00, 1),
(42, '2019-02-16', '4', 'PO1602201913', '32563563', 'Meter', '160220191', '45345345', 'HP', NULL, NULL, 'HP Oppo rack', 52, 12000.00, 50.00, 18000.00, 1),
(43, '2019-02-16', '4', 'PO1602201913', '32563563', 'Meter', '160220191', '45345345', 'HP', NULL, NULL, 'HP Nokia Electrical', 52, 12000.00, 50.00, 18000.00, 1),
(44, '2019-02-16', '4', 'PO1602201917', NULL, 'PCS', '160220195', '45345345', 'Computer', NULL, NULL, 'Computer Oppo Electrical', 52, 3700.00, 50.00, 5550.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `local_purchase_invoices`
--

CREATE TABLE `local_purchase_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_no` text COLLATE utf8mb4_unicode_ci,
  `supplier_invoiceno` text COLLATE utf8mb4_unicode_ci,
  `unit_type` text COLLATE utf8mb4_unicode_ci,
  `supplier_code` text COLLATE utf8mb4_unicode_ci,
  `stock_id` text COLLATE utf8mb4_unicode_ci,
  `quantity` text COLLATE utf8mb4_unicode_ci,
  `margin` text COLLATE utf8mb4_unicode_ci,
  `sale_price` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_purchase_invoices`
--

INSERT INTO `local_purchase_invoices` (`id`, `purchase_date`, `supplier_id`, `purchase_no`, `supplier_invoiceno`, `unit_type`, `supplier_code`, `stock_id`, `quantity`, `margin`, `sale_price`, `image`, `created_at`, `updated_at`) VALUES
(23, '2019-03-10', '4', 'PO100320191', NULL, 'PCS', NULL, '1003201915', '30', NULL, '2,640.00', NULL, '2019-03-10 03:48:46', '2019-03-10 03:48:46'),
(24, '2019-03-10', '4', 'PO100320192', NULL, 'PCS', NULL, '1003201915', '30', NULL, '12,000.00', NULL, '2019-03-10 04:01:59', '2019-03-10 04:01:59'),
(25, '2019-03-10', '4', 'PO100320193', NULL, 'PCS', NULL, '1003201916', '10', NULL, '220.00', NULL, '2019-03-10 04:39:46', '2019-03-10 04:39:46'),
(26, '2019-03-10', 'Mahadi Hasan Milon', 'PO100320194', NULL, 'PCS', NULL, '1003201917', '100', NULL, '2,200.00', NULL, '2019-03-10 04:40:54', '2019-03-10 04:40:54'),
(27, '2019-03-10', 'Mahadi Hasan Milon', 'PO100320195', NULL, 'PCS', NULL, '1003201918', '10', NULL, '2,200.00', NULL, '2019-03-10 06:42:19', '2019-03-10 06:42:19'),
(28, '2019-03-11', '4', 'PO110320196', NULL, 'PCS', NULL, '1103201920', '20', NULL, '4,400.00', NULL, '2019-03-11 00:04:28', '2019-03-11 00:04:28'),
(29, '2019-03-12', '4', 'PO120320197', NULL, 'PCS', NULL, '1203201921', '10', NULL, '2,200.00', NULL, '2019-03-11 22:51:58', '2019-03-11 22:51:58'),
(30, '2019-03-12', '4', 'PO120320198', NULL, 'PCS', NULL, '1203201922', '10', NULL, '2,000.00', NULL, '2019-03-11 23:29:58', '2019-03-11 23:29:58'),
(31, '2019-03-12', '4', 'PO120320199', NULL, 'PCS', NULL, '1203201923', '10', NULL, '2,000.00', NULL, '2019-03-11 23:40:37', '2019-03-11 23:40:37'),
(32, '2019-03-12', '4', 'PO1203201910', NULL, 'PCS', NULL, '1203201924', '100', NULL, NULL, NULL, '2019-03-11 23:49:01', '2019-03-11 23:49:01'),
(33, '2019-03-12', '4', 'PO1203201911', NULL, 'PCS', NULL, '1203201925', '1000', NULL, NULL, NULL, '2019-03-11 23:50:37', '2019-03-11 23:50:37'),
(34, '2019-03-12', '4', 'PO1203201912', NULL, 'PCS', NULL, '1203201926', '20', NULL, '200.00', NULL, '2019-03-11 23:53:57', '2019-03-11 23:53:57'),
(35, '2019-03-12', '4', 'PO1203201913', NULL, 'PCS', NULL, '1203201927', '10', NULL, NULL, NULL, '2019-03-11 23:55:00', '2019-03-11 23:55:00'),
(36, '2019-03-12', '4', 'PO1203201913', NULL, 'PCS', NULL, '1203201927', '10', NULL, NULL, NULL, '2019-03-11 23:57:25', '2019-03-11 23:57:25'),
(37, '2019-03-12', '4', 'PO1203201915', NULL, 'PCS', NULL, '1203201928', '10', NULL, NULL, NULL, '2019-03-11 23:57:50', '2019-03-11 23:57:50'),
(38, '2019-03-12', '4', 'PO1203201916', NULL, 'PCS', NULL, '120320194', '10', NULL, NULL, NULL, '2019-03-12 00:12:35', '2019-03-12 00:12:35'),
(39, '2019-03-12', '4', 'PO1203201917', NULL, 'PCS', NULL, '120320195', '10', NULL, '2,000.00', NULL, '2019-03-12 00:17:54', '2019-03-12 00:17:54'),
(40, '2019-03-12', '4', 'PO1203201918', NULL, 'PCS', NULL, '120320194', '10', NULL, '2,000.00', NULL, '2019-03-12 00:33:04', '2019-03-12 00:33:04'),
(41, '2019-03-12', '4', 'PO1203201919', NULL, 'PCS', NULL, '120320194', '10', NULL, '200.00', NULL, '2019-03-12 00:35:58', '2019-03-12 00:35:58'),
(42, '2019-03-12', '4', 'PO1203201920', NULL, 'PCS', NULL, '120320195', '1000', NULL, '2,000,000.00', NULL, '2019-03-12 02:05:30', '2019-03-12 02:05:30'),
(43, '2019-03-12', '4', 'PO1203201921', NULL, 'PCS', NULL, '120320196', '100', NULL, '20,000.00', NULL, '2019-03-12 11:30:43', '2019-03-12 11:30:43'),
(44, '2019-05-29', '4', 'PO2905201922', NULL, 'PCS', NULL, '290520198', '11', NULL, '102,000.00', NULL, '2019-05-29 08:39:05', '2019-05-29 08:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `local_purchase_items`
--

CREATE TABLE `local_purchase_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_purchase_items`
--

INSERT INTO `local_purchase_items` (`id`, `stock_id`, `purchase_no`, `description`, `quantity`, `cost`, `total_cost`, `created_at`, `updated_at`) VALUES
(32, '1003201911', 'PO100320191', 'HP Nokia Electrical', '10', '22', '220', '2019-03-10 03:03:07', '2019-03-10 03:03:07'),
(33, '1003201912', 'PO100320191', 'Phone Nokia Electrical', '10', '220', '2200', '2019-03-10 03:03:07', '2019-03-10 03:03:07'),
(34, '1003201913', 'PO100320192', 'HP Oppo rack', '10', '600', '6000', '2019-03-10 04:02:00', '2019-03-10 04:02:00'),
(35, '1003201914', 'PO100320192', 'Computer Nokia Electrical', '20', '300', '6000', '2019-03-10 04:02:00', '2019-03-10 04:02:00'),
(36, '1003201915', 'PO100320193', 'HP Oppo rack', '10', '22', '220', '2019-03-10 04:39:46', '2019-03-10 04:39:46'),
(37, '1003201916', 'PO100320194', 'HP Nokia Electrical', '100', '22', '2200', '2019-03-10 04:40:54', '2019-03-10 04:40:54'),
(38, '1003201917', 'PO100320195', 'Papers Oppo rack', '10', '220', '2200', '2019-03-10 06:42:19', '2019-03-10 06:42:19'),
(39, '1103201918', 'PO110320196', 'Papers Oppo Electrical', '10', '220', '2200', '2019-03-11 00:04:29', '2019-03-11 00:04:29'),
(40, '1103201919', 'PO110320196', 'HP Nokia rack', '10', '220', '2200', '2019-03-11 00:04:29', '2019-03-11 00:04:29'),
(41, '1203201920', 'PO120320197', 'Computer Nokia Electrical', '10', '220', '2200', '2019-03-11 22:51:58', '2019-03-11 22:51:58'),
(42, '1203201921', 'PO120320198', 'Papers Oppo Electrical', '10', '200', '2000', '2019-03-11 23:29:58', '2019-03-11 23:29:58'),
(43, '1203201922', 'PO120320199', 'Phone Oppo Electrical', '10', '200', '2000', '2019-03-11 23:40:37', '2019-03-11 23:40:37'),
(44, '1203201923', 'PO1203201910', 'Phone Oppo rack', '100', '200', '20000', '2019-03-11 23:49:01', '2019-03-11 23:49:01'),
(45, '1203201924', 'PO1203201911', 'Papers Oppo Electrical', '1000', '10', '10000', '2019-03-11 23:50:37', '2019-03-11 23:50:37'),
(46, '1203201925', 'PO1203201912', 'HP Oppo Electrical', '20', '10', '200', '2019-03-11 23:53:57', '2019-03-11 23:53:57'),
(47, '1203201926', 'PO1203201913', 'HP Nokia Electrical', '10', '200', '220', '2019-03-11 23:57:25', '2019-03-11 23:57:25'),
(48, '1203201927', 'PO1203201915', 'Papers Oppo Electrical', '10', '200', '220', '2019-03-11 23:57:50', '2019-03-11 23:57:50'),
(49, '120320193', 'PO1203201916', 'HP Nokia Electrical', '10', '200', '220', '2019-03-12 00:12:35', '2019-03-12 00:12:35'),
(50, '120320194', 'PO1203201917', 'Phone Nokia Electrical', '10', '200', '2000', '2019-03-12 00:17:54', '2019-03-12 00:17:54'),
(51, '120320193', 'PO1203201918', 'Computer Nokia Electrical', '10', '200', '2000', '2019-03-12 00:33:04', '2019-03-12 00:33:04'),
(52, '120320193', 'PO1203201919', 'Papers Oppo Electrical', '10', '20', '200', '2019-03-12 00:35:58', '2019-03-12 00:35:58'),
(53, '120320194', 'PO1203201920', 'HP Oppo rack', '1000', '2000', '2000000', '2019-03-12 02:05:30', '2019-03-12 02:05:30'),
(54, '120320195', 'PO1203201921', 'HP Nokia Electrical', '100', '200', '20000', '2019-03-12 11:30:43', '2019-03-12 11:30:43'),
(55, '290520196', 'PO2905201922', 'Computer Oppo Electrical', '10', '10000', '100000', '2019-05-29 08:39:05', '2019-05-29 08:39:05'),
(56, '290520197', 'PO2905201922', 'HP Oppo Electrical', '1', '2000', '2000', '2019-05-29 08:39:05', '2019-05-29 08:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `master_lc_purchase`
--

CREATE TABLE `master_lc_purchase` (
  `masterlc_id` int(10) UNSIGNED NOT NULL,
  `lc_purdate` date DEFAULT NULL,
  `lc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_purchaseno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_supplierno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_unitetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_stockid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_suppliercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_conrate` int(11) DEFAULT NULL,
  `lc_candfbdt` double(8,2) DEFAULT NULL,
  `candfid` int(11) DEFAULT NULL,
  `lc_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_designno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_pquantity` int(11) DEFAULT NULL,
  `lc_revquantity` int(11) DEFAULT NULL,
  `lc_purrate` int(11) DEFAULT NULL,
  `lc_carryingtk` int(11) DEFAULT NULL,
  `lc_costbtb` int(11) DEFAULT NULL,
  `lc_wmargin` int(11) DEFAULT NULL,
  `lc_wprice` int(11) DEFAULT NULL,
  `lc_rmargin` int(11) DEFAULT NULL,
  `lc_retailprice` int(11) DEFAULT NULL,
  `lcp_userid` int(11) NOT NULL
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
(3, '2018_10_06_051636_create_company_table', 2),
(4, '2018_10_06_060923_create_branch_table', 3),
(5, '2018_10_06_063733_create_customer_table', 4),
(6, '2018_10_06_070954_create_supplier_table', 5),
(7, '2018_10_06_073156_create_candf_table', 6),
(10, '2018_10_07_054657_create_temp_lc_purchase_table', 9),
(11, '2018_10_07_064717_create_lc_purchase_table', 10),
(12, '2018_10_07_065422_create_master_lc_purchase_table', 11),
(14, '2018_10_07_075847_create_stock_report_table', 12),
(15, '2018_10_14_095305_create_groups_table', 13),
(16, '2018_10_15_063515_create_brands_table', 14),
(17, '2018_10_15_074614_create_categories_table', 15),
(18, '2018_10_16_102539_create_companyusers_table', 16),
(19, '2018_10_20_063432_create_searceresults_table', 17),
(20, '2019_02_12_082908_create_sales_men_table', 18),
(23, '2019_02_13_071833_create_sale_invoices_table', 20),
(25, '2019_02_13_071730_create_sale_items_table', 22),
(29, '2019_02_28_063208_create_sales_return_invoices_table', 24),
(30, '2019_02_28_063246_create_sales_return_items_table', 24),
(31, '2019_02_24_153426_create_sales_returns_table', 25),
(32, '2019_02_28_062057_create_local_purchase_invoices_table', 25),
(33, '2019_02_28_064226_create_local_purchase_items_table', 25),
(34, '2019_03_02_091600_create_purchase_return_invoices_table', 26),
(35, '2019_03_02_091636_create_purchase_return_items_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$KjpDJ8//YeVigXeoPoUIBu1UWPYGgBUzFeiefxrMprUzVCr3mOJOS', '2019-01-05 07:50:48'),
('mahadirumu@gmail.com', '$2y$10$jjpxKbcPSkwh.n2ob45bOOyUmE7kYRG0xI8v286PN4GI1d3j6VAtO', '2019-01-05 07:51:35'),
('admin@gmail.com', '$2y$10$KjpDJ8//YeVigXeoPoUIBu1UWPYGgBUzFeiefxrMprUzVCr3mOJOS', '2019-01-05 07:50:48'),
('mahadirumu@gmail.com', '$2y$10$jjpxKbcPSkwh.n2ob45bOOyUmE7kYRG0xI8v286PN4GI1d3j6VAtO', '2019-01-05 07:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_invoices`
--

CREATE TABLE `purchase_return_invoices` (
  `purchaseReturnInvoice_id` int(10) UNSIGNED NOT NULL,
  `purchaseReturnInvoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnInvoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnInvoice_stockId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnInvoice_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnInvoice_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_return_invoices`
--

INSERT INTO `purchase_return_invoices` (`purchaseReturnInvoice_id`, `purchaseReturnInvoice_date`, `purchaseReturnInvoice_no`, `purchaseReturnInvoice_stockId`, `purchaseReturnInvoice_qty`, `purchaseReturnInvoice_total`, `created_at`, `updated_at`) VALUES
(9, '2019-03-02', 'PR020320191', NULL, '12', '11,252,000.00', '2019-03-02 06:24:31', '2019-03-02 06:24:31'),
(10, '2019-03-06', 'PR060320192', NULL, '2', '2,200,000.00', '2019-03-06 05:10:21', '2019-03-06 05:10:21'),
(11, '2019-03-06', 'PR060320193', NULL, '20', '22,000,000.00', '2019-03-06 05:11:05', '2019-03-06 05:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_items`
--

CREATE TABLE `purchase_return_items` (
  `purchaseReturnItem_id` int(10) UNSIGNED NOT NULL,
  `purchaseReturnItem_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnItem_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnItem_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnItem_unitPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchaseReturnItem_itemTotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_return_items`
--

INSERT INTO `purchase_return_items` (`purchaseReturnItem_id`, `purchaseReturnItem_no`, `purchaseReturnItem_description`, `purchaseReturnItem_qty`, `purchaseReturnItem_unitPrice`, `purchaseReturnItem_itemTotal`, `created_at`, `updated_at`) VALUES
(9, 'PR020320191', 'HP Nokia Electrical', '10', '1100000', '11000000', '2019-03-02 06:24:31', '2019-03-02 06:24:31'),
(10, 'PR020320191', 'Papers Nokia Electrical', '2', '126000', '252000', '2019-03-02 06:24:31', '2019-03-02 06:24:31'),
(11, 'PR060320192', 'HP Nokia Electrical', '2', '1100000', '2200000', '2019-03-06 05:10:21', '2019-03-06 05:10:21'),
(12, 'PR060320193', 'HP Nokia Electrical', '20', '1100000', '22000000', '2019-03-06 05:11:06', '2019-03-06 05:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales_men`
--

CREATE TABLE `sales_men` (
  `salesMan_id` int(10) UNSIGNED NOT NULL,
  `salesMan_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesMan_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesMan_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesMan_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_men`
--

INSERT INTO `sales_men` (`salesMan_id`, `salesMan_name`, `salesMan_mobile`, `salesMan_address`, `salesMan_status`, `created_at`, `updated_at`) VALUES
(1, 'Mahdi Hasan', '01735400444', 'Jatrabari, Dhaka, Bangladesh', '1', '2019-02-12 04:46:58', '2019-02-12 06:22:21'),
(3, 'Debabrata Mondol', '0154642654', 'Jatrabari, Dhaka, Bangladesh', '1', '2019-02-12 06:13:48', '2019-02-12 06:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE `sales_returns` (
  `salesReturn_id` int(10) UNSIGNED NOT NULL,
  `report_stock_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SalesReturnNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturn_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturn_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnUnitPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnTotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SalesReturnDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_invoices`
--

CREATE TABLE `sales_return_invoices` (
  `salesReturnInvoice_id` int(10) UNSIGNED NOT NULL,
  `salesReturnInvoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnInvoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnInvoice_stockId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnInvoice_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnInvoice_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_return_invoices`
--

INSERT INTO `sales_return_invoices` (`salesReturnInvoice_id`, `salesReturnInvoice_date`, `salesReturnInvoice_no`, `salesReturnInvoice_stockId`, `salesReturnInvoice_qty`, `salesReturnInvoice_total`, `created_at`, `updated_at`) VALUES
(22, '2019-03-01', 'SR010320191', '260220193', '2', '32,300.00', '2019-03-01 09:13:33', '2019-03-01 09:13:33'),
(23, '2019-03-01', 'SR010320191', '260220193', '2', '32,300.00', '2019-03-01 09:13:58', '2019-03-01 09:13:58'),
(24, '2019-03-01', 'SR010320191', '260220193', '2', '32,300.00', '2019-03-01 09:14:37', '2019-03-01 09:14:37'),
(25, '2019-03-17', 'SR170320194', '160220195', '2', '11,100.00', '2019-03-17 11:22:50', '2019-03-17 11:22:50'),
(26, '2019-03-17', 'SR170320195', '260220192', '2', '32,300.00', '2019-03-17 11:24:53', '2019-03-17 11:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_items`
--

CREATE TABLE `sales_return_items` (
  `salesReturnItem_id` int(10) UNSIGNED NOT NULL,
  `salesReturnItem_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnItem_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnItem_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnItem_unitPrice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesReturnItem_itemTotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_return_items`
--

INSERT INTO `sales_return_items` (`salesReturnItem_id`, `salesReturnItem_no`, `salesReturnItem_description`, `salesReturnItem_qty`, `salesReturnItem_unitPrice`, `salesReturnItem_itemTotal`, `created_at`, `updated_at`) VALUES
(42, 'SR010320191', 'Papers Oppo Electrical', '1', '11000', '11000', NULL, NULL),
(43, 'SR010320191', 'Papers Nokia Electrical', '1', '21300', '21300', NULL, NULL),
(44, 'SR170320194', 'Computer Oppo Electrical', '2', '5550', '11100', '2019-03-17 11:22:50', '2019-03-17 11:22:50'),
(45, 'SR170320195', 'Papers Nokia Electrical', '1', '21300', '21300', '2019-03-17 11:24:53', '2019-03-17 11:24:53'),
(46, 'SR170320195', 'Papers Oppo Electrical', '1', '11000', '11000', '2019-03-17 11:24:54', '2019-03-17 11:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `saleInvoice_id` int(10) UNSIGNED NOT NULL,
  `saleInvoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_customerName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_customerMobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_previousDue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_date` date DEFAULT NULL,
  `saleInvoice_subTotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_discountType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_discountAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_vatAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_totalPayable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_paidAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_returnAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_dueAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_transactionStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_collectionType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_salesMan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_invoices`
--

INSERT INTO `sale_invoices` (`saleInvoice_id`, `saleInvoice_no`, `saleInvoice_customerName`, `saleInvoice_customerMobile`, `saleInvoice_previousDue`, `saleInvoice_date`, `saleInvoice_subTotal`, `saleInvoice_discountType`, `saleInvoice_discountAmount`, `saleInvoice_vatAmount`, `saleInvoice_totalPayable`, `saleInvoice_paidAmount`, `saleInvoice_returnAmount`, `saleInvoice_dueAmount`, `saleInvoice_transactionStatus`, `saleInvoice_collectionType`, `saleInvoice_salesMan`, `created_at`, `updated_at`) VALUES
(23, 'INV201902261', 'Mahadi Hasan Milon', '01735400444', '12000', '2019-02-26', '11100', 't', '100', '2200', '13200', '43000', '-29800', '0', 'Paid', 'Cash', 'Mahdi Hasan', '2019-02-26 16:15:21', '2019-02-26 16:15:21'),
(24, 'INV201902262', 'Rasel Ahmed Tusher', '01722159546', '12000', '2019-02-26', '32300', 't', '100', '6440', '38640', '43000', '-4360', '0', 'Paid', 'Cash', 'Debabrata Mondol', '2019-02-26 16:19:37', '2019-02-26 16:19:37'),
(25, 'INV201902263', 'Mahadi Hasan Milon', '01735400444', '12000', '2019-02-26', '38550', 't', '100', '7690', '46140', '43000', '0', '3140', 'Due', 'Cash', 'Debabrata Mondol', '2019-02-26 16:27:16', '2019-02-26 16:27:16'),
(26, 'INV201903044', 'Cash', NULL, NULL, '2019-03-04', '220000000', 't', NULL, '44000000', '264000000', '434535499', '-170535499', '0', 'Paid', 'Cash', 'Cash', '2019-03-04 11:58:28', '2019-03-04 11:58:28'),
(27, 'INV201903045', 'Cash', NULL, NULL, '2019-03-04', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-04 11:59:57', '2019-03-04 11:59:57'),
(28, 'INV201903056', 'Rasel Ahmed Tusher', '01722159546', '12000', '2019-03-05', '220000000', 't', NULL, '44000000', '264000000', '264000001', '-1', '0', 'Paid', 'Cash', 'Cash', '2019-03-05 00:22:49', '2019-03-05 00:22:49'),
(29, 'INV201903057', 'Cash', NULL, NULL, '2019-03-05', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-05 02:12:25', '2019-03-05 02:12:25'),
(30, 'INV201903068', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '10000', '0', '1804400', 'Due', 'Cash', 'Cash', '2019-03-06 04:30:15', '2019-03-06 04:30:15'),
(31, 'INV201903069', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:43:49', '2019-03-06 04:43:49'),
(32, 'INV2019030610', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:46:48', '2019-03-06 04:46:48'),
(33, 'INV2019030610', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:47:17', '2019-03-06 04:47:17'),
(34, 'INV2019030610', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:47:27', '2019-03-06 04:47:27'),
(35, 'INV2019030610', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:47:41', '2019-03-06 04:47:41'),
(36, 'INV2019030610', 'Cash', NULL, NULL, '2019-03-06', '1512000', 't', NULL, '302400', '1814400', '2333333', '-518933', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 04:48:47', '2019-03-06 04:48:47'),
(37, 'INV2019030615', 'Cash', NULL, NULL, '2019-03-06', '120000', 't', NULL, '24000', '144000', '2333333', '-2189333', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 05:08:27', '2019-03-06 05:08:27'),
(38, 'INV2019030615', 'Cash', NULL, NULL, '2019-03-06', '120000', 't', NULL, '24000', '144000', '2333333', '-2189333', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 05:08:48', '2019-03-06 05:08:48'),
(39, 'INV2019030615', 'Cash', NULL, NULL, '2019-03-06', '120000', 't', NULL, '24000', '144000', '2333333', '-2189333', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 05:09:38', '2019-03-06 05:09:38'),
(40, 'INV2019030618', 'Cash', NULL, NULL, '2019-03-06', '221512000', 't', NULL, '44302400', '265814400', '2333333', '0', '263481067', 'Due', 'Cash', 'Cash', '2019-03-06 05:25:27', '2019-03-06 05:25:27'),
(41, 'INV2019030618', 'Cash', NULL, NULL, '2019-03-06', '221512000', 't', NULL, '44302400', '265814400', '2333333', '0', '263481067', 'Due', 'Cash', 'Cash', '2019-03-06 05:29:23', '2019-03-06 05:29:23'),
(42, 'INV2019030618', 'Cash', NULL, NULL, '2019-03-06', '221512000', 't', NULL, '44302400', '265814400', '2333333', '0', '263481067', 'Due', 'Cash', 'Cash', '2019-03-06 05:30:03', '2019-03-06 05:30:03'),
(43, 'INV2019030621', 'Cash', NULL, NULL, '2019-03-06', '120000', 't', NULL, '24000', '144000', '2333333', '-2189333', '0', 'Paid', 'Cash', 'Cash', '2019-03-06 05:31:55', '2019-03-06 05:31:55'),
(44, 'INV2019030622', 'Cash', NULL, NULL, '2019-03-06', '120000', 't', NULL, '24000', '144000', '10000', '0', '134000', 'Due', 'Cash', 'Cash', '2019-03-06 05:33:34', '2019-03-06 05:33:34'),
(45, 'INV2019031123', 'Cash', NULL, NULL, '2019-03-11', '221512000', 't', NULL, '44302400', '265814400', '114141', '0', '265700259', 'Due', 'Cash', 'Cash', '2019-03-11 00:27:55', '2019-03-11 00:27:55'),
(46, 'INV2019031124', 'Rasel Ahmed Tusher', NULL, NULL, '2019-03-11', '120', 't', '20', '20', '120', '120', '0', '0', 'Paid', 'Cash', 'Debabrata Mondol', '2019-03-11 05:13:21', '2019-03-11 05:13:21'),
(47, 'INV2019031625', 'Cash', NULL, NULL, '2019-03-16', '220', 't', NULL, '44', '264', '120', '0', '144', 'Due', 'Cash', 'Cash', '2019-03-16 05:19:51', '2019-03-16 05:19:51'),
(48, 'INV2019031726', 'Mahadi Hasan Milon', '01735400444', '12000', '2019-03-17', '220', 't', NULL, '44', '264', '500', '-236', '0', 'Paid', 'Cash', 'Cash', '2019-03-17 11:25:44', '2019-03-17 11:25:44'),
(49, 'INV2019052927', 'Cash', NULL, NULL, '2019-05-29', '13000', 't', '3000', '0', '10000', '8000', '0', '2000', 'Due', 'Cash', 'Cash', '2019-05-29 08:40:16', '2019-05-29 08:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `saleItem_id` int(10) UNSIGNED NOT NULL,
  `report_stock_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleItem_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleItem_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleItem_unite_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleItem_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleItem_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saleInvoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`saleItem_id`, `report_stock_id`, `saleItem_description`, `saleItem_quantity`, `saleItem_unite_price`, `saleItem_discount`, `saleItem_total`, `saleInvoice_no`, `created_at`, `updated_at`) VALUES
(12, '160220195', 'Computer Oppo Electrical', '2', '5550', NULL, '11100', 'INV201902261', NULL, NULL),
(13, '260220192', 'Papers Oppo Electrical', '1', '11000', NULL, '11000', 'INV201902262', NULL, NULL),
(14, '260220193', 'Papers Nokia Electrical', '1', '21300', NULL, '21300', 'INV201902262', NULL, NULL),
(15, '260220194', 'HP Oppo Electrical', '2', '11000', NULL, '22000', 'INV201902263', NULL, NULL),
(16, '160220195', 'Computer Oppo Electrical', '1', '5550', NULL, '5550', 'INV201902263', NULL, NULL),
(17, '260220192', 'Papers Oppo Electrical', '1', '11000', NULL, '11000', 'INV201902263', NULL, NULL),
(18, '20320191', 'HP Nokia Electrical', '1', '220000000', NULL, '220000000', 'INV201903044', NULL, NULL),
(19, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV201903045', NULL, NULL),
(20, '20320191', 'HP Nokia Electrical', '1', '220000000', NULL, '220000000', 'INV201903056', NULL, NULL),
(21, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV201903057', NULL, NULL),
(22, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV201903068', NULL, NULL),
(23, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV201903069', NULL, NULL),
(24, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030610', NULL, NULL),
(25, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030610', NULL, NULL),
(26, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030610', NULL, NULL),
(27, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030610', NULL, NULL),
(28, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030610', NULL, NULL),
(29, '60320193', 'HP Oppo Electrical', '1', '120000', NULL, '120000', 'INV2019030615', NULL, NULL),
(30, '60320193', 'HP Oppo Electrical', '1', '120000', NULL, '120000', 'INV2019030615', NULL, NULL),
(31, '60320193', 'HP Oppo Electrical', '1', '120000', NULL, '120000', 'INV2019030615', NULL, NULL),
(32, '20320191', 'HP Nokia Electrical', '1', '220000000', NULL, '220000000', 'INV2019030618', NULL, NULL),
(33, '20320191', 'HP Nokia Electrical', '1', '220000000', NULL, '220000000', 'INV2019030618', NULL, NULL),
(34, '20320191', 'HP Nokia Electrical', '1', '220000000', NULL, '220000000', 'INV2019030618', NULL, NULL),
(35, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019030618', NULL, NULL),
(36, '60320193', 'HP Oppo Electrical', '1', '120000', NULL, '120000', 'INV2019030621', NULL, NULL),
(37, '60320193', 'HP Oppo Electrical', '1', '120000', NULL, '120000', 'INV2019030622', NULL, NULL),
(38, '20320192', 'Papers Nokia Electrical', '1', '1512000', NULL, '1512000', 'INV2019031123', NULL, NULL),
(39, '100320195', 'Phone Oppo rack', '1', '220000000', NULL, '220000000', 'INV2019031123', NULL, NULL),
(40, '100320197', 'Computer Nokia Electrical', '1', '120', NULL, '120', 'INV2019031124', NULL, NULL),
(41, '1203201926', 'HP Nokia Electrical', '1', '220', NULL, '220', 'INV2019031625', NULL, NULL),
(42, '1203201926', 'HP Nokia Electrical', '1', '220', NULL, '220', 'INV2019031726', NULL, NULL),
(43, '290520196', 'Computer Oppo Electrical', '1', '13000', NULL, '13000', 'INV2019052927', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `searceresults`
--

CREATE TABLE `searceresults` (
  `id` int(10) UNSIGNED NOT NULL,
  `stockreport_id` int(11) NOT NULL,
  `stockreport_date` date DEFAULT NULL,
  `report_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_purchaseno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_stock_id` int(11) DEFAULT NULL,
  `report_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_quantity` int(11) DEFAULT NULL,
  `report_cost` int(11) DEFAULT NULL,
  `report_margin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_sales_price` int(11) DEFAULT NULL,
  `report_userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `stockreport_id` int(10) UNSIGNED NOT NULL,
  `stockreport_date` date DEFAULT NULL,
  `report_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_purchaseno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_stock_id` int(11) DEFAULT NULL,
  `report_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_quantity` int(11) DEFAULT NULL,
  `report_cost` int(11) DEFAULT NULL,
  `report_margin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_sales_price` int(11) DEFAULT NULL,
  `report_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_report`
--

INSERT INTO `stock_report` (`stockreport_id`, `stockreport_date`, `report_supplier_id`, `report_purchaseno`, `report_stock_id`, `report_group`, `report_brand`, `report_category`, `report_description`, `report_quantity`, `report_cost`, `report_margin`, `report_sales_price`, `report_userid`) VALUES
(101, '2019-03-12', '4', 'PO1203201913', 1203201926, 'PCS', '--Select Brand----', NULL, 'HP Nokia Electrical', 8, 200, NULL, 220, 1),
(102, '2019-03-12', '4', 'PO1203201915', 1203201927, 'PCS', '--Select Brand----', NULL, 'Papers Oppo Electrical', 10, 200, NULL, 220, 1),
(106, '2019-03-12', '4', 'PO1203201919', 120320193, 'PCS', '--Select Brand----', NULL, 'Papers Oppo Electrical', 10, 20, NULL, 22, 1),
(107, '2019-03-12', '4', 'PO1203201920', 120320194, 'PCS', '--Select Brand----', NULL, 'HP Oppo rack', 1000, 2000, NULL, 2200, 1),
(108, '2019-03-12', '4', 'PO1203201921', 120320195, 'PCS', '--Select Brand----', NULL, 'HP Nokia Electrical', 100, 200, NULL, 220, 1),
(109, '2019-05-29', '4', 'PO2905201922', 290520196, 'PCS', '--Select Brand----', NULL, 'Computer Oppo Electrical', 9, 10000, NULL, 13000, 1),
(110, '2019-05-29', '4', 'PO2905201922', 290520197, 'PCS', '--Select Brand----', NULL, 'HP Oppo Electrical', 1, 2000, NULL, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` text COLLATE utf8mb4_unicode_ci,
  `sopaning_balance` double(8,2) DEFAULT NULL,
  `supplier_date` date DEFAULT NULL,
  `supplier_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_mobile`, `supplier_email`, `supplier_address`, `sopaning_balance`, `supplier_date`, `supplier_userid`) VALUES
(4, 'Mahadi Hasan Milon', '01735400444', 'milon@gmail.com', 'Uttara,Dhaka-1230', 1250.00, '2019-01-05', 1),
(6, 'Monir', '0197854365', 'moni@gmail.com', 'Sherpur, Dhaka-1230', 1400.00, '2019-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_barcode`
--

CREATE TABLE `temp_barcode` (
  `t_b_id` int(11) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `bercode` int(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` float NOT NULL,
  `sell_price` float NOT NULL,
  `print_qnty` int(4) NOT NULL,
  `temp_ber_userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_barcode`
--

INSERT INTO `temp_barcode` (`t_b_id`, `description`, `bercode`, `quantity`, `cost`, `sell_price`, `print_qnty`, `temp_ber_userID`) VALUES
(1, 'Phone Oppo Electrical', 60120194, 12, 14000, 14700, 5, 1),
(2, 'Papers Nokia rack', 60120194, 20, 13000, 13650, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_lc_purchase`
--

CREATE TABLE `temp_lc_purchase` (
  `temp_lcpur_id` int(10) UNSIGNED NOT NULL,
  `lc_purdate` date DEFAULT NULL,
  `lc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_purchaseno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_supplierno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_unitetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_stockid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_suppliercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_conrate` int(11) DEFAULT NULL,
  `lc_candfbdt` double(8,2) DEFAULT NULL,
  `candfid` int(11) DEFAULT NULL,
  `lc_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_designno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_pquantity` int(11) DEFAULT NULL,
  `lc_revquantity` int(11) DEFAULT NULL,
  `lc_purrate` int(11) DEFAULT NULL,
  `lc_carryingtk` int(11) DEFAULT NULL,
  `lc_costbtb` int(11) DEFAULT NULL,
  `lc_wmargin` int(11) DEFAULT NULL,
  `lc_wprice` int(11) DEFAULT NULL,
  `lc_rmargin` int(11) DEFAULT NULL,
  `lc_retailprice` int(11) DEFAULT NULL,
  `lcp_userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` tinyint(2) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Debabrata Mondol', 'admin@gmail.com', '2018-09-29 03:33:35', '$2y$10$E5yyl91SyrXYjfuqZHj0PezN.t0JbmmTSxPjutQmoR5n3r8SIaDJC', 1, 'lShfAWVaPL0I9hH6B9YRmErNHhZmEnyXQCdUAIjSzAMRY9bDGXmKYSvDFDib', '2018-09-29 03:31:30', '2018-09-29 03:33:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candf`
--
ALTER TABLE `candf`
  ADD PRIMARY KEY (`candfid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyusers`
--
ALTER TABLE `companyusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_purchase`
--
ALTER TABLE `lc_purchase`
  ADD PRIMARY KEY (`lc_purchase_id`);

--
-- Indexes for table `local_purchase`
--
ALTER TABLE `local_purchase`
  ADD PRIMARY KEY (`local_purchase_id`);

--
-- Indexes for table `local_purchase_invoices`
--
ALTER TABLE `local_purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_purchase_items`
--
ALTER TABLE `local_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_lc_purchase`
--
ALTER TABLE `master_lc_purchase`
  ADD PRIMARY KEY (`masterlc_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchase_return_invoices`
--
ALTER TABLE `purchase_return_invoices`
  ADD PRIMARY KEY (`purchaseReturnInvoice_id`);

--
-- Indexes for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  ADD PRIMARY KEY (`purchaseReturnItem_id`);

--
-- Indexes for table `sales_men`
--
ALTER TABLE `sales_men`
  ADD PRIMARY KEY (`salesMan_id`);

--
-- Indexes for table `sales_returns`
--
ALTER TABLE `sales_returns`
  ADD PRIMARY KEY (`salesReturn_id`);

--
-- Indexes for table `sales_return_invoices`
--
ALTER TABLE `sales_return_invoices`
  ADD PRIMARY KEY (`salesReturnInvoice_id`);

--
-- Indexes for table `sales_return_items`
--
ALTER TABLE `sales_return_items`
  ADD PRIMARY KEY (`salesReturnItem_id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`saleInvoice_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`saleItem_id`);

--
-- Indexes for table `searceresults`
--
ALTER TABLE `searceresults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD PRIMARY KEY (`stockreport_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_barcode`
--
ALTER TABLE `temp_barcode`
  ADD PRIMARY KEY (`t_b_id`);

--
-- Indexes for table `temp_lc_purchase`
--
ALTER TABLE `temp_lc_purchase`
  ADD PRIMARY KEY (`temp_lcpur_id`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candf`
--
ALTER TABLE `candf`
  MODIFY `candfid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyusers`
--
ALTER TABLE `companyusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lc_purchase`
--
ALTER TABLE `lc_purchase`
  MODIFY `lc_purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `local_purchase`
--
ALTER TABLE `local_purchase`
  MODIFY `local_purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `local_purchase_invoices`
--
ALTER TABLE `local_purchase_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `local_purchase_items`
--
ALTER TABLE `local_purchase_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `master_lc_purchase`
--
ALTER TABLE `master_lc_purchase`
  MODIFY `masterlc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `purchase_return_invoices`
--
ALTER TABLE `purchase_return_invoices`
  MODIFY `purchaseReturnInvoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  MODIFY `purchaseReturnItem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_men`
--
ALTER TABLE `sales_men`
  MODIFY `salesMan_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_returns`
--
ALTER TABLE `sales_returns`
  MODIFY `salesReturn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_return_invoices`
--
ALTER TABLE `sales_return_invoices`
  MODIFY `salesReturnInvoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sales_return_items`
--
ALTER TABLE `sales_return_items`
  MODIFY `salesReturnItem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `saleInvoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `saleItem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `searceresults`
--
ALTER TABLE `searceresults`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `stockreport_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp_barcode`
--
ALTER TABLE `temp_barcode`
  MODIFY `t_b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_lc_purchase`
--
ALTER TABLE `temp_lc_purchase`
  MODIFY `temp_lcpur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
