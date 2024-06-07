-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 06:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_rental_management`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addData` (IN `_fname` VARCHAR(20), IN `_mname` VARCHAR(20), IN `_lname` VARCHAR(20), IN `_email` VARCHAR(50), IN `_address` VARCHAR(30), IN `_contact` VARCHAR(11), IN `_room` INT(8), IN `_date` DATETIME)   INSERT INTO renters ( firstname, middlename, lastname, email, address, contact, room_id,  date_in) VALUES (_fname,_mname,_lname,_email,_address,_contact,_room,_date)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `renter_id` int(10) NOT NULL,
  `report` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `renter_id`, `report`, `date`) VALUES
(1, 137, 'VERY GOOD!', '2023-12-20'),
(2, 145, 'It is good', '2023-12-21'),
(3, 145, 'It is good ma negga', '2023-12-21'),
(5, 139, 'hihfahs', '2023-12-21'),
(6, 139, 'asdaljdlaksd', '2023-12-21'),
(7, 148, 'I like the view', '2023-12-21'),
(8, 149, 'The landlord is very accommodating', '2023-12-21'),
(9, 149, 'The landlord is very accommodating', '2023-12-21'),
(10, 149, 'The landlord is very accommodating', '2023-12-21'),
(11, 149, 'The landlord is very accommodating', '2023-12-21'),
(12, 146, 'hello world I love programming', '2023-12-21'),
(13, 146, 'the service is good. I love the environment in your rental space. &lt;3', '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `logbook_report`
--

CREATE TABLE `logbook_report` (
  `log_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `log_report` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook_report`
--

INSERT INTO `logbook_report` (`log_id`, `renter_id`, `log_report`, `date`) VALUES
(1, 137, 'i will go home today', '2023-12-20'),
(2, 148, 'i&#039;m going to the moon', '2023-12-21'),
(3, 149, 'I&#039;m going to the mall', '2023-12-21'),
(4, 149, 'I&#039;m going to the mall', '2023-12-21'),
(5, 149, 'I&#039;m going to the mall', '2023-12-21'),
(6, 146, 'I am going to Japan and I will go back next week.', '2023-12-21'),
(7, 146, 'I am going home and will be back on thursday.', '2023-12-21'),
(8, 146, 'Report here the logbook', '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `issue` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_pass` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `renter_id`, `issue`, `status`, `date_pass`) VALUES
(12, 137, 'your the problem', 'Completed', '2023-12-20'),
(13, 145, 'BED IS BROKE PLEASE FIX AS SOON AS POSSIBLE!', 'Completed', '2023-12-21'),
(14, 148, 'I am the problem', 'Completed', '2023-12-21'),
(15, 149, 'My bed is broken', 'Pending', '2023-12-21'),
(16, 149, 'My bed is broken', 'Pending', '2023-12-21'),
(17, 149, 'My bed is broken', 'Pending', '2023-12-21'),
(18, 149, 'My bed is broken', 'Pending', '2023-12-21'),
(19, 146, 'I have a broken electric fan.', 'Pending', '2023-12-21'),
(20, 146, 'Maintenance Report', 'Pending', '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `past_renters`
--

CREATE TABLE `past_renters` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `last_time_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `past_renters`
--

INSERT INTO `past_renters` (`id`, `firstname`, `middlename`, `lastname`, `last_time_in`) VALUES
(137, 'Arwein', 'Villar', 'Valencia', '2023-12-21'),
(147, 'Erica Mae', 'Ambot', 'Suganob', '2023-12-21'),
(148, 'Mica', 'Dacapio', 'Suganob', '2023-12-21'),
(151, 'Alex', 'jade', 'Santiago', '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `renter_id`, `amount`, `invoice`, `date_created`) VALUES
(42, 146, 1000, '234242', '2023-12-21 05:05:07'),
(43, 148, 1000, '234242', '2023-12-21 10:51:58'),
(44, 149, 1000, '1231343', '2023-12-21 11:24:32'),
(45, 146, 1000, '234242', '2023-12-21 11:37:13'),
(46, 150, 1000, '23421', '2023-12-21 14:22:49'),
(47, 140, 1000, '24332', '2023-12-21 14:25:50'),
(48, 153, 1000, '2321', '2023-12-21 14:29:09'),
(49, 154, 1000, '23532', '2023-12-21 14:36:58'),
(50, 154, 1000, '234242', '2023-12-21 14:37:37'),
(51, 155, 1000, '34533', '2023-12-21 14:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `room_id` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `balance` float NOT NULL,
  `date_in` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `email`, `address`, `contact`, `room_id`, `status`, `balance`, `date_in`) VALUES
(140, 'Trix Adrian', 'Marron', 'Agni', 'Male', 'trixadrian.agni@gmail.com', 'Asuncion', '09700456987', 1, 1, -1000, '2023-12-20'),
(141, 'Kenneath Kim', 'Dayaganon', 'Gomez', 'Male', 'kenneathmanegga@gmail.com', 'New Corella', '09700456987', 1, 1, -1000, '2023-12-20'),
(146, 'Meowrrr', 'C', 'Soju', 'Male', 'example@email.com', 'Panabo City', '09700456987', 2, 1, -1000, '2023-12-11'),
(149, 'Megumi', 'N/A', 'Shi', 'Male', 'megumi@gmail.com', 'Shibuya', '', 1, 1, -1000, '2023-12-21'),
(150, 'Joder', 'Tilap', 'Cadungog', 'Male', 'jodercadungog@gmail.com', 'Purok15', '09332266354', 1, 1, -1000, '2023-12-21'),
(152, 'Queenie Fathima', 'Patana', 'Cepe', 'Female', 'queeniefathima@outlook.com', 'New Corella', '09297487743', 5, 1, 0, '2023-12-20'),
(153, 'rafael', 'onoon', 'ocquias', 'Male', 'ocquias@gmail.com', 'PUROK 11 QUILISADIO', '09335525354', 4, 1, 0, '2023-12-20'),
(154, 'Johnlloyd', 'Dato', 'Bautista', 'Male', 'bautista@gmail.com', 'PUROK 11 QUILISADIO', '', 3, 1, 0, '2023-12-10'),
(155, 'Nicole', 'Librero', 'Deguzman', 'Male', 'nicole@gmail.com', 'PUROK 11 QUILISADIO', '09226633456', 4, 1, 0, '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `renters_info`
--

CREATE TABLE `renters_info` (
  `id` int(11) NOT NULL,
  `room_id` int(1) NOT NULL,
  `balance` float NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1-active\r\n0- inactive',
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renters_info`
--

INSERT INTO `renters_info` (`id`, `room_id`, `balance`, `status`, `date_in`) VALUES
(140, 1, 0, 1, '2023-12-21'),
(141, 1, 0, 1, '2023-12-17'),
(146, 2, 0, 1, '2023-12-11'),
(149, 1, 0, 1, '2023-12-21'),
(150, 1, 0, 1, '2023-12-21'),
(152, 5, 0, 1, '2023-12-20'),
(153, 4, 0, 1, '2023-12-20'),
(154, 3, 0, 1, '2023-12-10'),
(155, 4, 0, 1, '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(1) NOT NULL,
  `room_num` int(1) NOT NULL,
  `total_bed_avail` int(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_num`, `total_bed_avail`, `category_id`, `description`, `price`) VALUES
(1, 1, 0, 1, '4 bed inside, 1 electic fan', 1000),
(2, 2, 3, 2, '4 bed inside, 1 electric fan', 1000),
(3, 3, 3, 3, '4 bed inside, 1 electric fan', 1000),
(4, 4, 2, 4, '4 bed inside, 1 electric fan', 1000),
(5, 5, 3, 5, '4 bed inside, 1 electric fan', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`system_id`, `name`, `contact`, `email`) VALUES
(1, 'Manait\'s Rental', 963345641, 'manait.rental@gmail.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `pass`, `type`) VALUES
(136, 'Zygrade Cagang Patana', 'Zygrade', '$2y$10$YZcAjDuzk5BsvttFGK.SIeJtNDkw6dOLpRtRk6nmZfgUU1utc8ZS6', 'admin'),
(139, 'Jay Ar Alloñar Alcoran', 'admin', '$2y$10$kjwHnuM5RWOCwGhgvYv2aOXcYBxe2Zwf81ROjrcB1rVr9BDhUG5fq', 'admin'),
(140, 'Trix Adrian Marron Agni', 'Trix Adrian', '$2y$10$h6mh/b4XG3R2WJbgbGRUP.TD7HMtA7CWJZizd0W9yVjBOceAtXuB2', 'renter'),
(141, 'Kenneath Kim D Gomez', 'Meowrrr.Soju', '$2y$10$YjjTRtEGBpNRpaBgBn96g.ufbeR/yRMBJImiJmgWoc2lb7kQnGRgS', 'renter'),
(146, 'Meowrrr C Soju', 'alem cris', '$2y$10$YRt4t18NK/e2SU/WlGHIV.s2xhvhmq6rVpMLreASv14NQDtwOk39O', 'renter'),
(149, 'Megumi N/A Shi', 'Megumi', '$2y$10$2Ul.KGp6m3LaqT7gUGxFc.FlwzCBDBaAMF35j14Vnpiq3.EzZafga', 'renter'),
(150, 'Joder Tilap Cadungog', 'Joder', '$2y$10$JhdAjjU78YGKytpZPZPQ4uNzhhxT1mv9/NwQqEbbtacPljnG219j.', 'renter'),
(152, 'Queenie Fathima Patana Cepe', 'queenie', '$2y$10$GzbEzVkfmyVz7kvij5MAFuIJZN.vaDdtRqsxNY1i0Ei16M.6.GgGu', 'renter'),
(153, 'rafael onoon ocquias', 'rafael', '$2y$10$Mn3cW6sYxrw.vPrs9e9Bo.T8WOxP.tN8rBbn1K9dAcoqMDTG7R9u.', 'renter'),
(154, 'Johnlloyd Dato Bautista', 'Johnlloyd', '$2y$10$r3fhZ/LkFLGQYJNivx7dUOn9y.neja3qDh2h.6L/HlSdIf.bDWHHu', 'renter'),
(155, 'Nicole Librero Deguzman', 'Nicole', '$2y$10$lxdiAz3ZbkIJYLln7CKHX.6Rg6d9mCZxxQL9B6OJV4OWyw5wJrhUS', 'renter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook_report`
--
ALTER TABLE `logbook_report`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renters_info`
--
ALTER TABLE `renters_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logbook_report`
--
ALTER TABLE `logbook_report`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `renters_info`
--
ALTER TABLE `renters_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `renters_info`
--
ALTER TABLE `renters_info`
  ADD CONSTRAINT `renters_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `renters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
