-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses_info`
--

CREATE TABLE `expenses_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_date` date NOT NULL,
  `item_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses_info`
--

INSERT INTO `expenses_info` (`item_id`, `item_name`, `item_price`, `item_date`, `item_details`) VALUES
(54, 'tests', 90, '0000-00-00', 'test'),
(55, 'test', 50, '2024-10-17', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `income_info`
--

CREATE TABLE `income_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_date` date NOT NULL,
  `item_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income_info`
--

INSERT INTO `income_info` (`item_id`, `item_name`, `item_price`, `item_date`, `item_details`) VALUES
(32, 'test', 100, '2024-10-17', 'tests');

-- --------------------------------------------------------

--
-- Table structure for table `lone_info`
--

CREATE TABLE `lone_info` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_date` date NOT NULL,
  `item_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lone_paid`
--

CREATE TABLE `lone_paid` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_date` date NOT NULL,
  `item_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE `reg_users` (
  `reg_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`reg_id`, `user_name`, `user_pass`, `user_pic`, `user_email`) VALUES
(14, 'Admin', '$2y$10$FTC7UPTRyakF.CunamUc4OzlCLIB8LFyteI17e1d6EjAt62yHKJHe', NULL, 'admin@gmail.com'),
(21, 'skabir', '$2y$10$KvQtz5gD4cUtgwMrXrOsSe2A3dTQq30IZyj.rJzCTw4MwIxFndlhy', NULL, 'skabir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `item_id` int(255) NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`item_id`, `item_name`, `item_price`, `item_date`) VALUES
(6, 'Customer', '50000', '2024-10-23'),
(7, 'Customer', '50000', '2024-10-23'),
(8, 'Customer', '50000', '2024-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_rules`
--

CREATE TABLE `user_rules` (
  `rule_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `rule_name` varchar(255) DEFAULT NULL,
  `rule_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_rules`
--

INSERT INTO `user_rules` (`rule_id`, `reg_id`, `rule_name`, `rule_description`) VALUES
(1, 14, 'View', 'Any customer view only'),
(2, 14, 'Edit', 'Customer edit file'),
(3, 14, 'Full access', 'Full access in this site');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses_info`
--
ALTER TABLE `expenses_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `income_info`
--
ALTER TABLE `income_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `lone_info`
--
ALTER TABLE `lone_info`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `lone_paid`
--
ALTER TABLE `lone_paid`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user_rules`
--
ALTER TABLE `user_rules`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses_info`
--
ALTER TABLE `expenses_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `income_info`
--
ALTER TABLE `income_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lone_info`
--
ALTER TABLE `lone_info`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lone_paid`
--
ALTER TABLE `lone_paid`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reg_users`
--
ALTER TABLE `reg_users`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_rules`
--
ALTER TABLE `user_rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_rules`
--
ALTER TABLE `user_rules`
  ADD CONSTRAINT `user_rules_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_users` (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
