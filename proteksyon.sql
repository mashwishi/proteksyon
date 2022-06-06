-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 10:24 AM
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

--
-- Dumping data for table `establishment_tb`
--

INSERT INTO `establishment_tb` (`establishment_id`, `establishment_email`, `verified`, `approved`, `establishment_contactno`, `establishment_image`, `establishment_password`, `establishment_name`, `establishment_country`, `establishment_zipcode`, `establishment_city`, `establishment_address`, `establishment_longitude`, `establishment_latitude`, `establishment_time`, `establishment_status`, `establishment_document`, `establishment_forgotpw`, `establishment_uuid`) VALUES
(1, 'clinic@proteksyon.ph', 1, 1, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Health Center', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '05:00 AM - 08:00 PM', 'Open', 'sample.jpg', NULL, '0xa31233230c32ba606b97c9333e9887'),
(7, 'daycare@proteksyon.ph', 1, 1, 464320454, 'dswd.png', '21232f297a57a5a743894a0e4a801fc3', 'Daycare Center', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x81311sa90c32ba606b97c9333e9887'),
(8, 'elementary@proteksyon.ph', 1, 1, 464321024, 'sabang_elem.jpg', '21232f297a57a5a743894a0e4a801fc3', 'Sabang Elementary School', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92640833445498', '14.34407654576107', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x83230c32ba606423b97c9333e9887'),
(13, '7eleven_mcc@proteksyon.ph', 1, 1, 9000000000, '7eleven.png', '827ccb0eea8a706c4c34a16891f84e7b', '7 Eleven - Mary Cris ', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9238178', '14.3542211', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x08aa8640e5c89f23c93ed6618eea9457'),
(14, 'puregoldjr@proteksyon.ph', 1, 1, 9000000000, '1654092911.png', '21232f297a57a5a743894a0e4a801fc3', 'Puregold Jr.', 'Philippines', '4114', 'Dasmarinas', '208 Don Placido Campos Avenue', '120.9245159', '14.3491606', '09:00AM - 10:00PM', 'Closed', 'sample.jpg', NULL, '0x80d509fda90c32ba606b97c9333e9887'),
(15, 'barangayhall@proteksyon.ph', 1, 1, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Barangay Hall', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '08:00AM - 05:00PM', 'Open', 'sample.jpg', NULL, '0x80d509fda90423242606b97c9333e9887'),
(16, '7eleven_pl@proteksyon.ph', 1, 1, 9000000000, '7eleven.png', '827ccb0eea8a706c4c34a16891f84e7b', '7 Eleven - Parklane', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9248424', '14.3450732', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x08aa86dw78fg7ad0e5cc93ed8d67f6ea9457'),
(17, 'puremart@proteksyon.ph', 1, 1, 9000000000, 'puremart.webp', '827ccb0eea8a706c4c34a16891f84e7b', 'PureMart', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9249317', '14.344922', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x9d8df7fg7df7d7ds8a0f8ad0e5cc93ed8d67f6'),
(18, 'southstardrug_pl@proteksyon.ph', 1, 1, 9000000000, 'southstardrug.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'SouthStar Drug - Parklane', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9249317', '14.344922', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x9d8d78aw90f7ga790ddd0e5cc93ed8d67f6'),
(19, 'alfamart_pl@proteksyon.ph', 1, 1, 9000000000, 'ALFAMART.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'AlfaMart - Parklane', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9249317', '14.344922', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x9d8d77awg90a790wfg9ad0a7cc93ed8d67f6'),
(20, 'familydoc@proteksyon.ph', 1, 1, 9000000000, 'familydoc.png', '827ccb0eea8a706c4c34a16891f84e7b', 'FamilyDoc', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9247077', '14.345572', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x9d8d77awg97ga907a6ha6a9dagh091d9d67f6'),
(21, 'ltodasmarinas@proteksyon.ph', 1, 1, 464897988, 'LTO.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'LTO Dasmarinas District', 'Philippines', '4114', 'Dasmarinas', '208 Don Placido Campos Avenue', '120.9245159', '14.3491606', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x678a678h9a86ha6d9aa3g4a96a9daa6896a'),
(22, 'southstardrug_mcc@proteksyon.ph', 1, 1, 9000000000, 'southstardrug.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'SouthStar Drug - Mary Cris', 'Philippines', '4114', 'Dasmarinas', '408 Don Placido Campos Avenue', '120.9239529', '14.3544671', '08:00AM - 05:00PM', 'Closed', 'sample.jpg', NULL, '0x9d8a6ha6a6aw90fa575cc93ed8d67haghad');

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
-- Table structure for table `status_tb`
--

CREATE TABLE `status_tb` (
  `status_id` int(11) NOT NULL,
  `establishment_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_desc` varchar(255) DEFAULT '8:00 AM - 5:00 PM',
  `status_info` varchar(255) NOT NULL DEFAULT 'Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_tb`
--

INSERT INTO `status_tb` (`status_id`, `establishment_id`, `status_name`, `status_desc`, `status_info`) VALUES
(1, 1, 'Health Center', '8:00 AM - 5:00 PM', 'Open'),
(7, 7, 'Daycare Center', '8:00 AM - 5:00 PM', 'Closed'),
(8, 8, 'Sabang Elementary School', '8:00 AM - 5:00 PM', 'Closed');

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
(1, '0x5f1775f86786759dc51083bc233bf5f9', 'mashwishi@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 639093902913, 'male.jpg', 'Mathew Agustin', 'Ordoñez', 'Bella', '07/04/2000', 'Male', 'Philippines', '4114', 'Dasmarinas', 'Abraham st. Phase 1 Dexterville Classic, Brgy. Sabang', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Second Dose', 1, 1, 1, NULL),
(2, '0x52c9f2d2ba7c166497b743eb834349aa', 'charneenbella@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 69000000000, 'female.jpg', 'Charneen', 'Valdez', 'Salve', '29/07/1998', 'Female', 'Philippines', '4114', 'Dasmarinas City', 'Abraham st. Phase 1 Dexterville Classic, Brgy. Sabang', 'sample.jpg', 'sample.jpg', 'Moderna', 'Second Dose', 0, 1, 0, NULL),
(10, '0xfe55db489b52d47ec3325c0f450e0282', 'johnmichael.denisa@cvsu.edu.ph', '7ff402f0aa51495dfe96d911d4a5e105', 639291393358, 'male.jpg', 'JOHN ', 'MICHAEL', 'DENISA', '1999-04-28', 'Male', 'Philippines', '4104', 'Imus Cavite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL),
(24, '0xee41537471f42056682483ad5d9f0b84', 'vensoxas10@gmail.com', '89914cbcf7c5c37fea3ee736e5f8892f', 9752112120, 'male.jpg', 'Patrick Reiner ', 'Ancuelo', 'Faeldonea', '1999-05-05', 'Male', 'Philippines', '4103', 'Imus City', 'Blk 61 Lot 22 A boron St. Ph4 golden city', 'sample.jpg', 'sample.jpg', 'Moderna', 'Second Dose', 1, 0, 1, NULL),
(27, '0x185320cda7e0c6b599f51a32e404baaf', 'demo@proteksyon.ph', '827ccb0eea8a706c4c34a16891f84e7b', 9998982891, 'male.jpg', 'Demo', 'User', 'Account', '2012-05-24', 'Male', 'Philippines', '4114', 'Dasmarinas', 'BX LX Phase X Dexterville Classic, Sabang', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 0, NULL),
(34, '0x833a5adfaa7b527480b2e02db7333e8d', 'barangay@proteksyon.ph', '21232f297a57a5a743894a0e4a801fc3', 9672392332, 'sabang.png', 'Barangay', 'Multi-Purpose', 'Hall', '2008-03-13', 'Male', 'Philippines', '4114', 'Dasmarinas', 'Barangay Sabang, Dexterville Classic Phase 1 Green Court', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL),
(35, '0x926a09cc9dec481113888511b69c60f5', 'healthcenter@proteksyon.ph', '21232f297a57a5a743894a0e4a801fc3', 9392373927, 'sabang.png', 'Health Center', ' ', 'Sabang', '2008-03-08', 'Female', 'Philippines', '4114', 'Dasmarinas', 'Don Placido Campos Avenue', 'sample.jpg', 'sample.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL);

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
-- Indexes for table `status_tb`
--
ALTER TABLE `status_tb`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `provider_id` (`establishment_id`);

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
  MODIFY `establishment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `logs_tb`
--
ALTER TABLE `logs_tb`
  MODIFY `logs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_tb`
--
ALTER TABLE `request_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_tb`
--
ALTER TABLE `status_tb`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `status_tb`
--
ALTER TABLE `status_tb`
  ADD CONSTRAINT `provider_id` FOREIGN KEY (`establishment_id`) REFERENCES `establishment_tb` (`establishment_id`);

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
