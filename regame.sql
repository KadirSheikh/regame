-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 01:56 PM
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

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `name`, `email`, `mobile`, `password`, `username`, `referal_code`, `wallet_bal`, `create_date`) VALUES
(1, 'Kadir Rizwan Sheikh', 'sheikhkadir02@gmail.com', '99999', '', 'Kadir', '', '', '2020-12-27'),
(2, 'Kadir Rizwan Sheikh', 'sheikhkadir02@gmail.com', '444444', '$2y$10$f4JgjMzyYYkFxqZ0rURZiuo6cRs9aiqSmVWIoAhEyjhMZxHhRsJgG', 'Kadir', 'ffafasfsf', '', '2020-12-20'),
(3, '', '', '', '', '', '', '', '0000-00-00'),
(4, '', '', '', '', '', '', '', '0000-00-00'),
(5, '', '', '', '', 'Kadir', '', '', '0000-00-00'),
(6, '', '', '', '', '', '', '', '0000-00-00'),
(7, '', '', '', '', '', '', '', '0000-00-00'),
(8, '', '', '', '', '', '', '', '0000-00-00'),
(9, 'Kadir Rizwan Sheikh', 'sheikhkadir02@gmail.com', '787878', '$2y$10$cU1p/yVavCd877WJ.0yqkOH3.RhsowX8VVtvFFneu5cFLi3ogiJgC', 'Kadir123', '', '', '0000-00-00'),
(10, 'Kadir Rizwan Sheikh', 'sheikhkadir02@gmail.com', '789654123', '$2y$10$pBqJwovy0An6G/PwxxDnzedpAWMAcLRKnGJSecAqWJ..m.e876yH2', 'Kadir786', 'fafdsfaf', '0', '0000-00-00');

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
-- AUTO_INCREMENT for table `tnx_tbl`
--
ALTER TABLE `tnx_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `withdraw_tbl`
--
ALTER TABLE `withdraw_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
