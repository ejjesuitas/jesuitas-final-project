-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 04:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neeco1_consumer_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `billing_number` varchar(250) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `billing_month` varchar(20) NOT NULL,
  `reading_date` date NOT NULL DEFAULT current_timestamp(),
  `due_date` varchar(250) NOT NULL,
  `previous_reading` int(11) NOT NULL,
  `present_reading` int(11) NOT NULL,
  `kwh_used` int(11) NOT NULL,
  `consumer_type` varchar(5) NOT NULL,
  `bill_amount` decimal(65,2) NOT NULL,
  `penalty` decimal(11,2) NOT NULL,
  `total_amount_due` decimal(65,2) NOT NULL,
  `bill_status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_rates`
--

CREATE TABLE `billing_rates` (
  `id` int(11) NOT NULL,
  `billing_month` varchar(20) NOT NULL,
  `consumer_type` varchar(5) NOT NULL,
  `con_distribution` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `supply` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `metering` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `transmission` decimal(11,4) NOT NULL DEFAULT 0.0000,
  `rates_status` enum('ONGOING','ARCHIVED') NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_rates`
--

INSERT INTO `billing_rates` (`id`, `billing_month`, `consumer_type`, `con_distribution`, `supply`, `metering`, `transmission`, `rates_status`, `uploaded_by`, `uploaded_date`) VALUES
(1, '202306', 'R', '1.1234', '2.0551', '3.1414', '0.1222', 'ARCHIVED', 0, '2023-06-22 11:41:03'),
(2, '202306', 'C', '1.1223', '32.0551', '4.1414', '156.1222', 'ARCHIVED', 0, '2023-06-22 11:41:03'),
(3, '202306', 'LV', '123.1222', '12.0551', '23.1414', '336.1222', 'ARCHIVED', 0, '2023-06-22 11:41:03'),
(4, '202306', 'HV', '1123.1222', '112.0551', '223.1414', '3236.1222', 'ARCHIVED', 0, '2023-06-22 11:41:03'),
(5, '202307', 'R', '1.1256', '2.0556', '3.1456', '0.1256', 'ONGOING', 0, '2023-06-22 11:41:03'),
(6, '202307', 'C', '1.1245', '32.0556', '4.1456', '156.1256', 'ONGOING', 0, '2023-06-22 11:41:03'),
(7, '202307', 'LV', '123.1245', '12.0545', '23.1445', '336.1245', 'ONGOING', 0, '2023-06-22 11:41:03'),
(8, '202307', 'HV', '1127.1222', '117.0551', '227.1414', '3276.1222', 'ONGOING', 0, '2023-06-22 11:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `collection_table`
--

CREATE TABLE `collection_table` (
  `id` int(11) NOT NULL,
  `account_number` int(15) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `or_number` int(15) NOT NULL,
  `or_date` datetime NOT NULL DEFAULT current_timestamp(),
  `teller_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `id` int(11) NOT NULL,
  `account_number` varchar(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `con_address` varchar(250) NOT NULL,
  `district` varchar(5) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `consumer_type` varchar(5) NOT NULL,
  `meter_number` varchar(30) NOT NULL,
  `previous_reading` int(11) NOT NULL,
  `present_reading` int(11) NOT NULL,
  `kwh_used` int(11) NOT NULL,
  `billing_month` varchar(250) NOT NULL,
  `con_status` varchar(5) NOT NULL,
  `registered_by` int(11) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`id`, `account_number`, `first_name`, `last_name`, `middle_name`, `con_address`, `district`, `contact_number`, `consumer_type`, `meter_number`, `previous_reading`, `present_reading`, `kwh_used`, `billing_month`, `con_status`, `registered_by`, `register_date`) VALUES
(25, '04046521751', 'Enry Jasper', 'Jesuitas', 'Pascual', 'San Nicolas', '01', '98865441232', 'R', '2367786', 1, 0, 0, '', 'A', 0, '2023-07-12 13:09:40'),
(26, '04046521561', 'Mark Joren', 'Espiritu', 'Jose', 'San Nicolas', '01', '98865718251', 'R', '2367412', 1, 0, 0, '', 'A', 0, '2023-07-12 13:13:12'),
(27, '04046521856', 'John Carlo ', 'Pangilinan', 'Timog', 'Jaen', '05', '94671283123', 'C', '2367567', 1, 0, 0, '', 'A', 0, '2023-07-12 13:14:02'),
(28, '04046521098', 'Karl Joshua', 'Manucdoc', 'Manak', 'Sto. Niño', '01', '947157812351', 'HV', '2367081', 1, 0, 0, '', 'A', 0, '2023-07-12 13:16:58'),
(29, '04046521651', 'Julius Dale', 'Arandia', 'Aram', 'San Lorenzo', '01', '97812367812', 'HV', '2367016', 1, 0, 0, '', 'A', 0, '2023-07-12 13:17:55'),
(30, '04046521761', 'Juan Miguel', 'Apolonio', 'Lim', 'Jaen', '05', '95758123765', 'HV', '2367102', 1, 0, 0, '', 'A', 0, '2023-07-12 13:19:16'),
(31, '04046521581', 'Judd', 'Wycoco', 'Hilda', 'Cabiao', '03', '90791235681', 'R', '2367789', 1, 0, 0, '', 'A', 0, '2023-07-12 13:20:18'),
(32, '0404011106', 'web', 'web', 'web', 'San Nicolas', '01', '09786577123', 'HV', '7861', 1, 0, 0, '', 'A', 0, '2023-07-18 10:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `or_number`
--

CREATE TABLE `or_number` (
  `id` int(11) NOT NULL,
  `teller` int(11) NOT NULL,
  `current_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `or_number`
--

INSERT INTO `or_number` (`id`, `teller`, `current_number`) VALUES
(1, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `admin_name`, `user_name`, `admin_password`) VALUES
(4072023, 'EJ Jesuitas', 'adminJ', 'adminpass'),
(4072024, 'Mark Joren Espiritu', 'adminM', 'adminpass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_rates`
--
ALTER TABLE `billing_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection_table`
--
ALTER TABLE `collection_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `or_number`
--
ALTER TABLE `or_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `billing_rates`
--
ALTER TABLE `billing_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `collection_table`
--
ALTER TABLE `collection_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `or_number`
--
ALTER TABLE `or_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4072026;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
