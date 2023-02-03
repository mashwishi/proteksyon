-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 03:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proteksyon.ml`
--

-- --------------------------------------------------------

--
-- Table structure for table `establishment_tb`
--

CREATE TABLE `establishment_tb` (
  `establishment_id` int(255) NOT NULL,
  `establishment_email` varchar(255) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT 0,
  `approved` int(2) NOT NULL DEFAULT 0,
  `establishment_contactno` bigint(15) NOT NULL,
  `establishment_image` varchar(255) NOT NULL,
  `establishment_password` varchar(255) NOT NULL,
  `establishment_name` varchar(255) NOT NULL,
  `establishment_country` varchar(255) NOT NULL,
  `establishment_zipcode` varchar(255) NOT NULL,
  `establishment_city` varchar(255) NOT NULL,
  `establishment_address` varchar(255) NOT NULL,
  `establishment_longitude` varchar(255) DEFAULT NULL,
  `establishment_latitude` varchar(255) DEFAULT NULL,
  `establishment_time` varchar(50) DEFAULT NULL,
  `establishment_status` varchar(50) DEFAULT 'Closed',
  `establishment_document` varchar(255) DEFAULT NULL,
  `establishment_forgotpw` varchar(255) DEFAULT NULL,
  `establishment_uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs_tb`
--

CREATE TABLE `logs_tb` (
  `logs_id` int(5) NOT NULL,
  `establishment_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `time_in` varchar(25) DEFAULT NULL,
  `log_date` date DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_tb`
--

CREATE TABLE `request_tb` (
  `request_id` int(11) NOT NULL,
  `request_status` int(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `user_vaccine` varchar(255) NOT NULL,
  `user_dose` varchar(255) NOT NULL,
  `user_card_front` varchar(255) NOT NULL,
  `user_card_back` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(5) NOT NULL,
  `user_uuid` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_contactno` bigint(13) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_first_name` varchar(45) NOT NULL,
  `user_middle_name` varchar(25) DEFAULT NULL,
  `user_last_name` varchar(25) NOT NULL,
  `user_birthday` varchar(20) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_zipcode` varchar(10) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_card_front` varchar(255) NOT NULL,
  `user_card_back` varchar(255) NOT NULL,
  `user_vaccine` varchar(25) NOT NULL,
  `user_dose` varchar(20) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_verification` int(1) NOT NULL DEFAULT 0,
  `user_type` int(1) NOT NULL DEFAULT 0,
  `forgot_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `user_uuid`, `user_email`, `user_password`, `user_contactno`, `user_avatar`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_birthday`, `user_gender`, `user_country`, `user_zipcode`, `user_city`, `user_address`, `user_card_front`, `user_card_back`, `user_vaccine`, `user_dose`, `user_status`, `user_verification`, `user_type`, `forgot_password`) VALUES
(1, '0x926a09cc9dec481113888511b69c60f5', 'admin@proteksyon.ph', '21232f297a57a5a743894a0e4a801fc3', 9392373927, 'female.png', 'Health Center', ' ', 'Sabang', '2008-03-08', 'Female', 'Philippines', '4114', 'Dasmarinas', 'Don Placido Campos Avenue', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `report_id` int(11) NOT NULL,
  `establishment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) NOT NULL,
  `exported` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `report_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `establishment_tb`
--
ALTER TABLE `establishment_tb`
  ADD PRIMARY KEY (`establishment_id`);

--
-- Indexes for table `logs_tb`
--
ALTER TABLE `logs_tb`
  ADD PRIMARY KEY (`logs_id`),
  ADD KEY `provider_id` (`establishment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_uuid` (`user_uuid`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `provider_id` (`establishment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `establishment_tb`
--
ALTER TABLE `establishment_tb`
  MODIFY `establishment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `logs_tb`
--
ALTER TABLE `logs_tb`
  MODIFY `logs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request_tb`
--
ALTER TABLE `request_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD CONSTRAINT `request_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`);

--
-- Constraints for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD CONSTRAINT `user_reports_ibfk_1` FOREIGN KEY (`establishment_id`) REFERENCES `establishment_tb` (`establishment_id`),
  ADD CONSTRAINT `user_reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
