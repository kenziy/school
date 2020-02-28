-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 12:54 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theglob`
--
CREATE DATABASE IF NOT EXISTS `theglob` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `theglob`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'X4JBApULVJpdP3KyuOU6RDI0JN4Znv0Sohu41r22', 'http://localhost', 1, 0, 0, '2020-01-10 03:06:25', '2020-01-10 03:06:25'),
(2, NULL, 'Laravel Password Grant Client', 'I3aV6plMltHCNrHnqgJ5LJDW1obsbTBewPpB61W1', 'http://localhost', 0, 1, 0, '2020-01-10 03:06:25', '2020-01-10 03:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-10 03:06:25', '2020-01-10 03:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apaydates`
--

CREATE TABLE `tbl_apaydates` (
  `DbAuto` int(11) NOT NULL,
  `DbSdate` date DEFAULT NULL,
  `DbEdate` date DEFAULT NULL,
  `DbRange` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `DbAuto` int(11) NOT NULL,
  `DbAccount` varchar(20) DEFAULT NULL,
  `DbName` varchar(70) DEFAULT NULL,
  `DbCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbCreatedBy` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banklinks`
--

CREATE TABLE `tbl_banklinks` (
  `DbAuto` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `DbAccount` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binary`
--

CREATE TABLE `tbl_binary` (
  `DbPlacementid` bigint(11) DEFAULT NULL,
  `DbDate` date DEFAULT NULL,
  `id` bigint(11) DEFAULT NULL,
  `DbPoints` bigint(11) DEFAULT NULL,
  `DbPosition` varchar(5) DEFAULT NULL COMMENT 'LEFT or RIGHT leg\r\n',
  `DbResetLeft` float(9,0) DEFAULT NULL,
  `DbResetRight` float(9,0) DEFAULT NULL,
  `DbCurrentLeft` float(9,0) DEFAULT NULL,
  `DbCurrentRight` float(9,0) DEFAULT NULL,
  `DbNewResetLeft` float(9,0) DEFAULT NULL,
  `DbNewResetRight` float(9,0) DEFAULT NULL,
  `DbCurrentPair` float(9,2) DEFAULT NULL,
  `DbAchiever` bigint(11) DEFAULT NULL,
  `DbUp1` float(9,2) DEFAULT NULL,
  `DbUp2` float(9,2) DEFAULT NULL,
  `DbDown1` float(9,2) DEFAULT NULL,
  `DbDown2` float(9,2) DEFAULT NULL,
  `DbDown3` float(9,2) DEFAULT NULL,
  `DbDown4` float(9,2) DEFAULT NULL,
  `DbDown5` float(9,2) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbAuto` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `DbBranchCode` int(11) NOT NULL,
  `DbBranchName` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bulletin`
--

CREATE TABLE `tbl_bulletin` (
  `DbActivity` varchar(1000) DEFAULT NULL,
  `DbDate` date DEFAULT NULL,
  `DbAuto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `DbDeliveryOut` tinyint(1) NOT NULL,
  `DbTransId` int(11) NOT NULL,
  `DbReference` varchar(30) NOT NULL,
  `DbQty` int(11) NOT NULL,
  `DbItemId` int(11) NOT NULL,
  `DbSumQty` int(11) NOT NULL,
  `DbCost` float NOT NULL,
  `DbTotal` float NOT NULL,
  `DbSumCost` float NOT NULL,
  `DbAvgCost` float NOT NULL,
  `DbSRP` float NOT NULL,
  `DbTotalSales` float NOT NULL,
  `DbBranchId` int(11) NOT NULL,
  `DbWarehouseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `DbItem` varchar(50) DEFAULT NULL,
  `DbItemno` int(11) DEFAULT NULL,
  `DbStock` int(11) DEFAULT NULL,
  `DbPrice` float(9,2) DEFAULT NULL,
  `DbCost` float(9,2) DEFAULT NULL COMMENT 'cost of product',
  `DbType` varchar(10) DEFAULT NULL,
  `DbUniAmount` float(9,2) DEFAULT NULL COMMENT 'AMOUNT FOR UNILEVEL',
  `DbAuto` int(11) NOT NULL,
  `DbPermanent` int(11) DEFAULT '0' COMMENT '1 permanent 0 temporary',
  `DbUnipercent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` bigint(11) NOT NULL,
  `DbFirstName` varchar(50) DEFAULT NULL,
  `DbMiddle` varchar(1) DEFAULT NULL,
  `DbLast` varchar(50) DEFAULT NULL,
  `DbSponsorid` int(11) DEFAULT NULL,
  `DbPlacementid` int(11) DEFAULT NULL,
  `DbPosition` varchar(5) DEFAULT NULL,
  `DbPin` varchar(32) NOT NULL,
  `DbUsername` varchar(20) NOT NULL,
  `DbPass` varchar(20) DEFAULT NULL,
  `DbGender` varchar(6) DEFAULT NULL,
  `DbBday` date DEFAULT NULL,
  `DbSignupDate` date DEFAULT NULL,
  `DbPackage` varchar(10) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DbAddress1` varchar(70) DEFAULT NULL,
  `DbAddress2` varchar(70) DEFAULT NULL,
  `DbCity` varchar(50) DEFAULT NULL,
  `DbZip` varchar(12) DEFAULT NULL,
  `DbContact` varchar(50) DEFAULT NULL,
  `DbEmail` varchar(70) DEFAULT NULL,
  `DbBen` varchar(70) DEFAULT NULL,
  `DbBank` varchar(20) DEFAULT NULL,
  `DbLink` int(11) DEFAULT NULL,
  `DbPrevname` varchar(115) DEFAULT NULL,
  `DbActive` int(11) DEFAULT '1' COMMENT '1 active 0 inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal`
--

CREATE TABLE `tbl_personal` (
  `DbDate` date DEFAULT NULL COMMENT 'date of purchase',
  `id` int(11) DEFAULT NULL COMMENT 'member who purchased',
  `DbItemno` int(11) DEFAULT NULL,
  `DbItem` varchar(50) DEFAULT NULL COMMENT 'product bought',
  `DbPoints` int(11) DEFAULT NULL COMMENT 'Amount of Purchase',
  `DbPin` varchar(32) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbType` varchar(1) DEFAULT NULL COMMENT 'Q=quarterly M=Monthly W=Weekly Q appears once every quarter M apears once every month. W no limit',
  `DbD1` date DEFAULT NULL,
  `DbD2` date DEFAULT NULL,
  `DbAuto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `DbPoDate` date NOT NULL,
  `DbPoTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbPoBranchId` int(11) NOT NULL,
  `DbPoRequested` varchar(70) NOT NULL,
  `DbPoTransId` int(11) NOT NULL,
  `DbPoMemo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_podetails`
--

CREATE TABLE `tbl_podetails` (
  `DbPoTransId` int(11) NOT NULL,
  `DbQty` int(11) NOT NULL,
  `DbItemId` int(11) NOT NULL,
  `DbAvailable` int(11) NOT NULL,
  `DbID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poprocess`
--

CREATE TABLE `tbl_poprocess` (
  `DbDate` datetime NOT NULL,
  `DbStatus` varchar(30) NOT NULL,
  `DbPrepBy` varchar(70) NOT NULL,
  `DbCheckBy` varchar(70) NOT NULL,
  `DbWayBill` varchar(30) NOT NULL,
  `DbPoTransId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prepass`
--

CREATE TABLE `tbl_prepass` (
  `DbPin` varchar(32) NOT NULL,
  `DbPassword` varchar(32) DEFAULT NULL,
  `DbPasswordCode` varchar(32) DEFAULT NULL,
  `DbPINCode` varchar(32) DEFAULT NULL,
  `DbDsi` float(9,2) DEFAULT NULL,
  `DbPackage` varchar(10) DEFAULT NULL COMMENT 'STARTER REGULAR PREMIUM',
  `DbExpiry` date NOT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbPtype` varchar(5) NOT NULL,
  `DbBranchCode` int(11) DEFAULT NULL,
  `DbSoldTo` varchar(20) DEFAULT NULL COMMENT 'branch and others',
  `DbDateSold` date DEFAULT NULL,
  `DbStatus` int(11) NOT NULL DEFAULT '0' COMMENT 'status 0= unused\r\nstatus 1= used',
  `DbReference` varchar(30) DEFAULT NULL COMMENT 'foreign key from tbl_sales',
  `DbItemno` int(11) DEFAULT '0' COMMENT '0 package 1 product',
  `DbSold` int(11) DEFAULT '0' COMMENT '0 in store 1 sold to consumers',
  `DbProduct` int(11) DEFAULT '0' COMMENT '0 package 1 product',
  `DbPoints` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualified`
--

CREATE TABLE `tbl_qualified` (
  `DbDate` date NOT NULL,
  `DbSponsorid` int(11) NOT NULL,
  `Dbtype` varchar(4) NOT NULL,
  `DbAuto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referrals`
--

CREATE TABLE `tbl_referrals` (
  `DbDate` date DEFAULT NULL,
  `DbSponsorid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `DbIncome` float(9,2) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DbPin` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `DbDate` date DEFAULT NULL,
  `DbUserid` int(11) DEFAULT NULL,
  `DbBranchCode` int(11) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DbCashier` varchar(20) DEFAULT NULL,
  `DbAmountDue` float(9,2) DEFAULT NULL,
  `DbReference` varchar(30) NOT NULL,
  `DbCust` varchar(80) DEFAULT NULL,
  `DbQty` int(11) DEFAULT NULL,
  `DbCash` float(9,2) DEFAULT NULL,
  `DbChkBank` varchar(20) DEFAULT NULL,
  `DbChkNumber` varchar(20) DEFAULT NULL,
  `DbChkAmount` float(9,2) DEFAULT NULL,
  `DbCCHolder` varchar(20) DEFAULT NULL,
  `DbCCBank` varchar(20) DEFAULT NULL,
  `DbCCType` varchar(20) DEFAULT NULL,
  `DbCCExpiry` varchar(20) DEFAULT NULL,
  `DbCCAmount` float(9,2) DEFAULT NULL,
  `DbFinal` int(11) DEFAULT '0',
  `DbCancelled` int(11) DEFAULT '0' COMMENT '1 = cancelled'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesdetails`
--

CREATE TABLE `tbl_salesdetails` (
  `DbItemNo` int(11) DEFAULT NULL,
  `DbDescription` varchar(32) DEFAULT NULL,
  `DbPrice` float(9,2) DEFAULT NULL,
  `DbQty` int(11) DEFAULT '1',
  `DbDiscount` int(11) DEFAULT '0',
  `DbTotal` float(9,2) DEFAULT NULL,
  `DbReference` varchar(30) DEFAULT NULL COMMENT 'foreign key from tbl_sales',
  `DbBranchCode` int(11) DEFAULT NULL,
  `DbFinal` int(11) DEFAULT '0' COMMENT '0 not final 1 final',
  `DbAuto` int(11) NOT NULL,
  `DbUserid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesdetails1`
--

CREATE TABLE `tbl_salesdetails1` (
  `DbItemNo` int(11) DEFAULT NULL,
  `DbDescription` varchar(32) DEFAULT NULL,
  `DbPrice` float(9,2) DEFAULT NULL,
  `DbQty` int(11) DEFAULT '1',
  `DbDiscount` int(11) DEFAULT '0',
  `DbTotal` float(9,2) DEFAULT NULL,
  `DbReference` varchar(30) DEFAULT NULL COMMENT 'foreign key from tbl_sales',
  `DbBranchCode` int(11) DEFAULT NULL,
  `DbFinal` int(11) DEFAULT '0' COMMENT '0 not final 1 final',
  `DbAuto` int(11) NOT NULL,
  `DbUserid` int(11) DEFAULT NULL,
  `DbCancelled` int(11) DEFAULT '0' COMMENT '1 = cancelled'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesinvoice`
--

CREATE TABLE `tbl_salesinvoice` (
  `DbInvoiceNumber` int(11) NOT NULL,
  `DbDate` date NOT NULL,
  `DbbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbBranchID` int(11) NOT NULL,
  `DbPoTransId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `DbSupid` int(11) NOT NULL,
  `DbSupplierName` varchar(50) NOT NULL,
  `DbContactNum` varchar(30) NOT NULL,
  `DbContactPerson` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unigen`
--

CREATE TABLE `tbl_unigen` (
  `DbSponsorid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `DbDirectSponsor` int(11) DEFAULT NULL,
  `DbLevel` int(11) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unilevel`
--

CREATE TABLE `tbl_unilevel` (
  `DbDate` date DEFAULT NULL,
  `DbSponsorid` varchar(10) DEFAULT NULL,
  `id` varchar(10) DEFAULT NULL,
  `DbIncome` float(9,2) DEFAULT NULL,
  `DbLevel` int(11) DEFAULT NULL,
  `DbPin` varchar(32) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_used`
--

CREATE TABLE `tbl_used` (
  `DbPIN` varchar(32) NOT NULL,
  `DbExpiry` date NOT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbPtype` varchar(5) NOT NULL,
  `DbSoldTo` varchar(20) DEFAULT NULL,
  `DbDateSold` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `DbUsername` varchar(20) NOT NULL,
  `DbPass` varchar(32) DEFAULT NULL,
  `DbLevel` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userspos`
--

CREATE TABLE `tbl_userspos` (
  `DbUserid` int(11) NOT NULL,
  `DbUsername` varchar(20) DEFAULT NULL,
  `DbPassword` varchar(20) DEFAULT NULL,
  `DbLevel` int(11) DEFAULT '1',
  `DbBranchCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volume`
--

CREATE TABLE `tbl_volume` (
  `DbSponsorid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `DbDate` date DEFAULT NULL,
  `DbVolume` int(11) DEFAULT NULL,
  `DbVolume2` int(11) NOT NULL,
  `DbLevel` int(11) DEFAULT NULL,
  `DbTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DbAuto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `DbWarehouseId` int(11) NOT NULL,
  `DbWarehouse` varchar(30) NOT NULL,
  `DbWContact` varchar(30) NOT NULL,
  `DbWContactPerson` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DbFirstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbMiddle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbLast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbSponsorid` int(11) DEFAULT NULL,
  `DbPlacementid` int(11) DEFAULT NULL,
  `DbPosition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbPin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbUsername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbPass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbGender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbBday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbSignupDate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbPackage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbTime` timestamp NULL DEFAULT NULL,
  `DbAddress1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbAddress2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbCity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbZip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbContact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbBen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbBank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbLink` int(11) DEFAULT NULL,
  `DbPrevname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DbActive` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `DbFirstName`, `DbMiddle`, `DbLast`, `DbSponsorid`, `DbPlacementid`, `DbPosition`, `DbPin`, `DbUsername`, `DbPass`, `DbGender`, `DbBday`, `DbSignupDate`, `DbPackage`, `DbTime`, `DbAddress1`, `DbAddress2`, `DbCity`, `DbZip`, `DbContact`, `DbEmail`, `DbBen`, `DbBank`, `DbLink`, `DbPrevname`, `DbActive`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasdasdasda', 'test', 'test', 1, 1, 'test', 'test', 'admin', '$2y$10$fbTKOSo4I54i9yvasngxwOT99GEFjfhHY2UnanmPo6/CJNGhUqsAq', 'Male', 'Dec 1, 2000', 'Dec 1, 2000', 'test', NULL, 'test', 'test', 'davao', '8000', '8000', 'admin@admin.com', 'test', 'test', 1, 'test', 1, NULL, '2020-01-10 03:05:38', '2020-01-10 03:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_apaydates`
--
ALTER TABLE `tbl_apaydates`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `sdate` (`DbSdate`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAccount` (`DbAccount`);

--
-- Indexes for table `tbl_banklinks`
--
ALTER TABLE `tbl_banklinks`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_binary`
--
ALTER TABLE `tbl_binary`
  ADD PRIMARY KEY (`DbAuto`),
  ADD KEY `PLACEMENT` (`DbPlacementid`),
  ADD KEY `DBDATE` (`DbDate`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`DbBranchCode`),
  ADD UNIQUE KEY `DbBranchCode` (`DbBranchCode`);

--
-- Indexes for table `tbl_bulletin`
--
ALTER TABLE `tbl_bulletin`
  ADD PRIMARY KEY (`DbAuto`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`DbTransId`),
  ADD UNIQUE KEY `DbReference` (`DbReference`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAuto` (`DbAuto`),
  ADD UNIQUE KEY `DbItemno` (`DbItemno`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `DbUsername` (`DbUsername`),
  ADD UNIQUE KEY `DbUsername_2` (`DbUsername`);

--
-- Indexes for table `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAuto` (`DbAuto`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`DbPoTransId`);

--
-- Indexes for table `tbl_podetails`
--
ALTER TABLE `tbl_podetails`
  ADD KEY `DbPoTransId` (`DbPoTransId`);

--
-- Indexes for table `tbl_poprocess`
--
ALTER TABLE `tbl_poprocess`
  ADD KEY `DbPoTransId` (`DbPoTransId`);

--
-- Indexes for table `tbl_prepass`
--
ALTER TABLE `tbl_prepass`
  ADD PRIMARY KEY (`DbPin`),
  ADD UNIQUE KEY `DbPIN` (`DbPin`),
  ADD UNIQUE KEY `DbPassword` (`DbPassword`),
  ADD KEY `DbPINCode` (`DbPINCode`);

--
-- Indexes for table `tbl_qualified`
--
ALTER TABLE `tbl_qualified`
  ADD PRIMARY KEY (`DbAuto`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`DbReference`);

--
-- Indexes for table `tbl_salesdetails`
--
ALTER TABLE `tbl_salesdetails`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAuto` (`DbAuto`);

--
-- Indexes for table `tbl_salesdetails1`
--
ALTER TABLE `tbl_salesdetails1`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAuto` (`DbAuto`);

--
-- Indexes for table `tbl_salesinvoice`
--
ALTER TABLE `tbl_salesinvoice`
  ADD PRIMARY KEY (`DbInvoiceNumber`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`DbSupid`);

--
-- Indexes for table `tbl_unigen`
--
ALTER TABLE `tbl_unigen`
  ADD PRIMARY KEY (`DbId`);

--
-- Indexes for table `tbl_used`
--
ALTER TABLE `tbl_used`
  ADD PRIMARY KEY (`DbPIN`),
  ADD UNIQUE KEY `DbPIN` (`DbPIN`),
  ADD UNIQUE KEY `DbPIN_2` (`DbPIN`),
  ADD UNIQUE KEY `DbPIN_3` (`DbPIN`),
  ADD UNIQUE KEY `DbPIN_4` (`DbPIN`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`DbUsername`);

--
-- Indexes for table `tbl_userspos`
--
ALTER TABLE `tbl_userspos`
  ADD PRIMARY KEY (`DbUserid`),
  ADD UNIQUE KEY `DbUserid` (`DbUserid`),
  ADD UNIQUE KEY `DbUsername` (`DbUsername`);

--
-- Indexes for table `tbl_volume`
--
ALTER TABLE `tbl_volume`
  ADD PRIMARY KEY (`DbAuto`),
  ADD UNIQUE KEY `DbAuto` (`DbAuto`);

--
-- Indexes for table `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`DbWarehouseId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_dbusername_unique` (`DbUsername`),
  ADD UNIQUE KEY `users_dbemail_unique` (`DbEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_apaydates`
--
ALTER TABLE `tbl_apaydates`
  MODIFY `DbAuto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `DbAuto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_banklinks`
--
ALTER TABLE `tbl_banklinks`
  MODIFY `DbAuto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_binary`
--
ALTER TABLE `tbl_binary`
  MODIFY `DbAuto` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `DbBranchCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
