-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 09:15 AM
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
(1, 'clinic@proteksyon.ph', 1, 1, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Health Center', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '05:00 AM - 08:00 PM', 'Open', NULL, NULL, '0xa31233230c32ba606b97c9333e9887'),
(7, 'daycare@proteksyon.ph', 1, 1, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Daycare Center', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '08:00AM - 05:00PM', 'Closed', NULL, NULL, '0x81311sa90c32ba606b97c9333e9887'),
(8, 'elementary@proteksyon.ph', 1, 1, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Sabang Elementary School', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92640833445498', '14.34407654576107', '08:00AM - 05:00PM', 'Closed', NULL, NULL, '0x83230c32ba606423b97c9333e9887'),
(13, '7eleven@proteksyon.ph', 1, 1, 903948593, '7eleven.png', '827ccb0eea8a706c4c34a16891f84e7b', '7 Eleven', 'Philippines', '4114', 'Dasmarinas', 'BXX LX Don Placido', '', '', '08:00AM - 05:00PM', 'Closed', '1654090131.docx', NULL, '0x08aa8640e5c89f23c93ed6618eea9457'),
(14, 'puregoldjr@proteksyon.ph', 1, 1, 9485777534, '1654092911.png', '21232f297a57a5a743894a0e4a801fc3', 'Puregold Jr.', 'Philippines', '4114', 'Dasmarinas', 'XXXX XXXXX', NULL, NULL, '09:00AM - 10:00PM', 'Closed', '1654092911.docx', NULL, '0x80d509fda90c32ba606b97c9333e9887'),
(15, 'barangayhall@proteksyon.ph', 1, 0, 464320454, 'sabang.png', '21232f297a57a5a743894a0e4a801fc3', 'Barangay Hall', 'Philippines', '4114', 'Dasmarinas Cavite', 'Dexterville Classic, Barangay Sabang', '120.92452059737307', '14.347695036217885', '08:00AM - 05:00PM', 'Open', 'IMG_20220530_101801.png', NULL, '0x80d509fda90423242606b97c9333e9887');

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

--
-- Dumping data for table `logs_tb`
--

INSERT INTO `logs_tb` (`logs_id`, `establishment_id`, `user_id`, `status`, `time_in`, `log_date`, `timestamp`) VALUES
(4, 1, 1, NULL, '2022-03-25', '2022-03-25', '2022-03-25 09:59:21'),
(5, 1, 2, NULL, '2022-03-26', '2022-03-26', '2022-03-26 04:08:08'),
(6, 1, 3, NULL, '2022-03-26', '2022-03-26', '2022-03-26 04:08:37'),
(7, 1, 1, NULL, '2022-03-26', '2022-03-26', '2022-03-26 04:22:57'),
(8, 1, 2, NULL, '2022-03-28', '2022-03-28', '2022-03-28 03:31:57'),
(9, 1, 1, NULL, 'April 29, 2022 9:31:AM ', '2022-04-29', '2022-04-29 01:31:16'),
(10, 1, 1, NULL, 'May 1, 2022 10:24:AM ', '2022-05-01', '2022-05-01 02:24:40'),
(11, 1, 26, NULL, 'May 1, 2022 10:41:AM ', '2022-05-01', '2022-05-01 02:41:45'),
(12, 1, 1, NULL, 'May 20, 2022 3:37:PM ', '2022-05-20', '2022-05-20 07:37:23'),
(13, 1, 1, NULL, 'May 24, 2022 7:07:AM ', '2022-05-24', '2022-05-23 23:07:59'),
(14, 1, 27, NULL, 'May 29, 2022 3:09:AM ', '2022-05-29', '2022-05-28 19:09:54'),
(15, 1, 1, NULL, 'May 29, 2022 10:02:PM ', '2022-05-29', '2022-05-29 14:02:49'),
(16, 1, 33, NULL, 'June 1, 2022 3:42:PM ', '2022-06-01', '2022-06-01 07:42:46'),
(17, 1, 1, NULL, 'June 5, 2022 1:53:PM ', '2022-06-05', '2022-06-05 05:53:11');

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
(1, '0x5f1775f86786759dc51083bc233bf5f9', 'mashwishi@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 639093902913, 'male.jpg', 'Mathew Agustin', 'Ordoñez', 'Bella', '07/04/2000', 'Male', 'Philippines', '4114', 'Dasmarinas', 'Abraham st. Phase 1 Dexterville Classic, Brgy. Sabang', '1653833253.jpg', '1653833253.jpg', 'BioNTech, Pfizer', 'Second Dose', 1, 1, 1, NULL),
(2, '0x52c9f2d2ba7c166497b743eb834349aa', 'charneenbella@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 69000000000, 'female.jpg', 'Charneen', 'Valdez', 'Salve', '29/07/1998', 'Female', 'Philippines', '4114', 'Dasmarinas City', 'Abraham st. Phase 1 Dexterville Classic, Brgy. Sabang', 'id.jpg', 'id.jpg', 'Moderna', 'Second Dose', 0, 1, 0, NULL),
(10, '0xfe55db489b52d47ec3325c0f450e0282', 'johnmichael.denisa@cvsu.edu.ph', '7ff402f0aa51495dfe96d911d4a5e105', 639291393358, 'male.jpg', 'JOHN ', 'MICHAEL', 'DENISA', '1999-04-28', 'Male', 'Philippines', '4104', 'Imus Cavite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'id.jpg', 'id.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL),
(19, '0x03952c54bdc93465cf20e3fd8879547e', 'aldencraig.cataluna@cvsu.edu.ph', '19b32552aaf0ee824edec2f4f9a3e3af', 9773379467, '1650219704.png', 'ALDEN', 'BIAGO', 'CATALUNA', '2022-10-11', 'Male', 'Philippines', '4104', 'Imus', 'B3 L35 Greenvale homes Malagasang 2 E', '1650220203.png', '1650220203.png', 'Moderna', 'Second Dose', 1, 1, 0, NULL),
(20, '0x951aff5ddba1836a62fd4f0f0ddb1f94', 'cadientejomel0@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 9497429460, '1650265399.jpg', 'Jomel', 'Carpio', 'Cadiente', '2000-04-23', 'Male', 'Philippines', '3318', 'San Mateo', 'Cadeliña st Dagupan San Mateo Isabela', '1650265399.jpg', '1650265399.jpg', 'BioNTech, Pfizer', 'Second Dose', 1, 1, 0, NULL),
(21, '0x75b70131dc6314d7da14a3648be0f239', 'vincentlezter.formaran@cvsu.edu.ph', 'a96a25dbeec0f829fa711e869d22c498', 9262173625, '1650266385.jpg', 'Vincent Lezter', 'Bucatcat', 'Formaran', '1998-04-03', 'Male', 'Philippines', '4103', 'Imus', 'P1 B6 L8 Silverstone St. Sterling Manors, Anabu 1-C, Imus City, Cavite', '1650266385.png', '1650266385.png', 'Moderna', 'Booster Dose', 1, 1, 0, NULL),
(23, '0x3d9be02dda09c1caeb0fb97ad7513cbe', 'krizzia.sanmiguel@cvsu.edu.ph', '99f71b44f1d2444f5cfb56b274c28525', 9272837569, '1650297147.jpg', 'Krizzia', 'D', 'San Miguel', '1999-09-29', 'Female', 'Philippines', '4102', 'Bacoor', 'Aniban 5, Bacoor City, Cavite', '1650297147.jpg', '1650297147.jpg', 'Oxford, Astraženeca', 'Second Dose', 1, 1, 0, NULL),
(24, '0xee41537471f42056682483ad5d9f0b84', 'vensoxas10@gmail.com', '89914cbcf7c5c37fea3ee736e5f8892f', 9752112120, '1650300724.png', 'Patrick Reiner ', 'Ancuelo', 'Faeldonea', '1999-05-05', 'Male', 'Philippines', '4103', 'Imus City', 'Blk 61 Lot 22 A boron St. Ph4 golden city', '1650300724.jpg', '1650300724.jpg', 'Moderna', 'Second Dose', 1, 0, 1, NULL),
(25, '0x90eda4a2d6f442b06b8716dd5eb23dd1', 'poncianosimon@gmail.com', 'ac1c8d64fd23ae5a7eac5b7f7ffee1fa', 9204688397, '1650883896.jpg', 'Simon James', 'Crescencio', 'Ponciano', '2001-05-08', 'Male', 'Philippines', '4103', 'Imus, City', 'B21 L29 Guam St. Hamilton Homes Bucandala 1 Imus City Cavite', '1650883896.jpg', '1650883896.jpg', 'Moderna', 'Booster Dose', 1, 1, 0, NULL),
(26, '0x3c2fc7088c7f086e9750291c2dbedf40', 'mathewbella14@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 9093928173, '1651372487.png', 'Mathew', 'Ordonez', 'Bella', '2014-02-11', 'Male', 'Philippines', '4114', 'Dasmarinas', 'BX LX PhaseX Sabang ', '1651372741.jpg', '1651372741.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 0, NULL),
(27, '0x185320cda7e0c6b599f51a32e404baaf', 'demo@proteksyon.ml', '827ccb0eea8a706c4c34a16891f84e7b', 9998982891, '1653368628.jpg', 'Demo', 'User', 'Account', '2012-05-24', 'Male', 'Philippines', '4114', 'Dasmarinas', 'BX LX Phase X Dexterville Classic, Sabang', '1653368628.png', '1653368628.png', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 0, NULL),
(28, '0x71f21b32254272a6e42d3a58bfa7c1ef', 'vanessagie.aruta@gmail.com', '28b9c30d523e493e7b5cd7ea1b9cf7ce', 9563357579, '1653384904.jpg', 'Angelina', 'Antonio', 'Aruta', '1980-08-09', 'Female', 'Philippines', '4115', 'Dasmariñas', 'Blk 15 lot 11 joshua st. P-1', '1653384904.jpg', '1653384904.jpg', 'BioNTech, Pfizer', 'Second Dose', 1, 0, 0, NULL),
(29, '0x51aed66489f028692e9bdefdf8966e89', 'eugeniorubyrose30@gmail.com', '99c113b176255c1eb9c4c07e53571703', 9355329842, '1653438844.png', 'rubyrose', 'Bermudez', 'eugenio', '1999-06-30', 'Female', 'Philippines', '4114', 'Dasmariñas', 'B9 L16 Dexterville Classic Sabang Dasmariñas City Cavite', '1653438844.jpg', '1653438844.jpg', 'Sinovac-CoronaVac', 'First Dose', 1, 1, 0, NULL),
(30, '0xc6e5da113daf375f6b5a26e3d8b9c093', 'shanetapawan01@gmail.com', '8cb426371b48c901ad0f499fd434745e', 9272562522, '1653442721.jpeg', 'Shane', 'Medina', 'Tapawan', '2000-04-01', 'Female', 'Philippines', '4114', 'Cavite', 'B4 L27 Greensborough Subdivision Sabang Dasmariñas, Cavite', '1653442721.png', '1653442721.png', 'Oxford, Astraženeca', 'Second Dose', 1, 0, 0, NULL),
(33, '0x9ca5557efb757774b27a5d593d176ca4', 'matthewagustinebella@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 9093928371, '1654015183.png', 'Matthew Agustine', 'Ordonez', 'Bella', '2000-04-07', 'Male', 'Philippines', '4114', 'Dasmarinas', 'BX LX Abraham st. Phase 1', '1654015183.jpg', '1654015183.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 0, NULL),
(34, '0x833a5adfaa7b527480b2e02db7333e8d', 'barangay@proteksyon.ph', '21232f297a57a5a743894a0e4a801fc3', 9672392332, '1654246707.png', 'Barangay', 'Multi-Purpose', 'Hall', '2008-03-13', 'Male', 'Philippines', '4114', 'Dasmarinas', 'Barangay Sabang, Dexterville Classic Phase 1 Green Court', '1654246707.jpg', '1654246707.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL),
(35, '0x926a09cc9dec481113888511b69c60f5', 'healthcenter@proteksyon.ph', '21232f297a57a5a743894a0e4a801fc3', 9392373927, '1654246970.png', 'Health Center', ' ', 'Sabang', '2008-03-08', 'Female', 'Philippines', '4114', 'Dasmarinas', 'Don Placido Campos Avenue', '1654246970.jpg', '1654246970.jpg', 'BioNTech, Pfizer', 'Booster Dose', 1, 1, 1, NULL);

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
-- Dumping data for table `user_reports`
--

INSERT INTO `user_reports` (`report_id`, `establishment_id`, `user_id`, `status`, `message`, `attachment`, `exported`, `date`, `timestamp`, `report_status`) VALUES
(17, 1, 33, '3', 'Testing the excel file', '1654149835.jpg', '1654149835.xlsx', 'June 3, 2022 3:44:PM ', '2022-06-03 07:44:40', 2),
(18, 1, 33, '0', 'dawawf', '1654151277.jpg', NULL, 'June 2, 2022 2:27:PM ', '2022-06-02 06:27:56', 5),
(20, 1, 1, '3', 'Positive user', '1654165349.jpg', '1654165349.xlsx', 'June 3, 2022 6:38:PM ', '2022-06-03 10:38:35', 2),
(21, 1, 26, '3', 'Exposed', '1654165412.jpg', '1654165412.xlsx', 'June 6, 2022 1:11:AM ', '2022-06-05 17:11:05', 1),
(22, 7, 33, '1', 'remarks here', '1654259679.pdf', '1654259679.xlsx', 'June 3, 2022 8:39:PM ', '2022-06-03 12:39:42', 1);

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
  MODIFY `establishment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
