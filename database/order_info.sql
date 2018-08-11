-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 03:13 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(11) NOT NULL,
  `is_package` int(11) NOT NULL,
  `phone_to_reroute` varchar(255) NOT NULL,
  `welcome_note` int(11) NOT NULL,
  `reroute_confirm` int(11) NOT NULL,
  `center_to_customer_route` varchar(255) NOT NULL,
  `unreach_note` int(11) NOT NULL,
  `info_type` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_type` varchar(255) NOT NULL,
  `company_info` text NOT NULL,
  `gender` char(4) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_iban` varchar(100) NOT NULL,
  `account_bic` varchar(100) NOT NULL,
  `accept` char(4) NOT NULL,
  `aggrement` char(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `is_package`, `phone_to_reroute`, `welcome_note`, `reroute_confirm`, `center_to_customer_route`, `unreach_note`, `info_type`, `company_name`, `company_type`, `company_info`, `gender`, `fullname`, `date_of_birth`, `address`, `postal_code`, `phone`, `email`, `account_name`, `account_iban`, `account_bic`, `accept`, `aggrement`, `created_at`, `updated_at`) VALUES
(1, 1, 'sgrfsgr', 5, 15, 'rsg', 12, 1, 'g', 'srgrs', 'grs', 'M', 'rsg', '1992-12-27', 'rsgs', 'xfbx', 'cbf', 'c', 'grs', 'sgr', 'gsr', 'sepa', '1', '2018-08-11 11:40:40', '2018-08-11 06:10:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
