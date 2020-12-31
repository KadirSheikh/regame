-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 07:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regame`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_tbl`
--

CREATE TABLE `match_tbl` (
  `id` int(11) NOT NULL,
  `user_id_1` int(10) NOT NULL,
  `user_id_2` int(10) NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `winner_id` int(20) NOT NULL,
  `match_status` varchar(20) NOT NULL,
  `bet_amt` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otp_tbl`
--

CREATE TABLE `otp_tbl` (
  `id` int(11) NOT NULL,
  `requested_by` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_tbl`
--

INSERT INTO `otp_tbl` (`id`, `requested_by`, `otp`, `is_expired`, `requested_at`) VALUES
(22, 'sheikhkadir02@gmail.com', 271258, 0, '2020-12-31 18:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `set_challenge`
--

CREATE TABLE `set_challenge` (
  `challenge_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `is_set` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_challenge`
--

INSERT INTO `set_challenge` (`challenge_id`, `user_id`, `user_name`, `amount`, `is_set`) VALUES
(6, 14, 'Kadir@12345', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tnx_tbl`
--

CREATE TABLE `tnx_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `tnx_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(600) NOT NULL,
  `username` varchar(255) NOT NULL,
  `referal_code` varchar(50) NOT NULL,
  `wallet_bal` varchar(255) NOT NULL DEFAULT '0',
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_tbl`
--

CREATE TABLE `withdraw_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_tbl`
--
ALTER TABLE `match_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_tbl`
--
ALTER TABLE `otp_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_challenge`
--
ALTER TABLE `set_challenge`
  ADD PRIMARY KEY (`challenge_id`);

--
-- Indexes for table `tnx_tbl`
--
ALTER TABLE `tnx_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_tbl`
--
ALTER TABLE `withdraw_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_tbl`
--
ALTER TABLE `match_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_tbl`
--
ALTER TABLE `otp_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `set_challenge`
--
ALTER TABLE `set_challenge`
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tnx_tbl`
--
ALTER TABLE `tnx_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `withdraw_tbl`
--
ALTER TABLE `withdraw_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
