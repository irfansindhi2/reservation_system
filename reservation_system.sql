-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 10:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation_log`
--

CREATE TABLE `reservation_log` (
  `reserve_id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `guest_num` int(255) DEFAULT NULL,
  `table_ids` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_log`
--

INSERT INTO `reservation_log` (`reserve_id`, `user_id`, `startdatetime`, `enddatetime`, `guest_num`, `table_ids`) VALUES
(35, NULL, '2021-12-01 18:28:00', '2021-12-01 19:28:00', 6, '1,2'),
(36, NULL, '2021-12-16 01:29:00', '2021-12-16 02:29:00', 6, '3'),
(37, NULL, '2021-12-02 03:42:00', '2021-12-02 04:42:00', 6, '1,2'),
(38, NULL, '2021-12-02 03:47:00', '2021-12-02 04:47:00', 6, '3');

-- --------------------------------------------------------

--
-- Table structure for table `table_info`
--

CREATE TABLE `table_info` (
  `table_id` int(255) NOT NULL,
  `table_capacity` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_info`
--

INSERT INTO `table_info` (`table_id`, `table_capacity`) VALUES
(1, 2),
(2, 4),
(3, 6),
(4, 8),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mail_address` varchar(25) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `pref_payment` varchar(255) NOT NULL,
  `reward` float NOT NULL,
  `pref_diner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `fname`, `phone`, `email`, `mail_address`, `bill_address`, `pref_payment`, `reward`, `pref_diner`) VALUES
(1, 'irfan', 'a', 'Irfan', '1234567890', 'irfansindhi2@gmail.com', '', '', '', 0, ''),
(3, 'Irfana', 'a', 'Irfan', '1234567890', 'irfansindhi21@gmail.com', 'asdad', 'asdad', 'cash', 0, ''),
(4, 'Irfanaa', 'a', 'Irfan', '1234567890', 'irfansindhi221@gmail.com', 'asdad', 'asdad', 'cash', 0, ''),
(5, 'Irfann', 'a', 'Irfan', '1234567890', 'irfansindhi23@gmail.com', 'asdad', 'asdad', 'cash', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation_log`
--
ALTER TABLE `reservation_log`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation_log`
--
ALTER TABLE `reservation_log`
  MODIFY `reserve_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `table_info`
--
ALTER TABLE `table_info`
  MODIFY `table_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
