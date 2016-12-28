-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2016 at 09:13 PM
-- Server version: 5.5.52-0+deb8u1-log
-- PHP Version: 7.0.12-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('rejected','approved') NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `email`, `amount`, `status`, `create_date`) VALUES
(212178, 'test@yopmail.com', '47.00', 'approved', '2016-12-27 17:02:03'),
(888019, 'aa@test.ru', '1.10', 'approved', '2016-12-27 19:19:40'),
(1598344, 'test@yopmail.com', '34.00', 'approved', '2016-12-27 17:02:30'),
(1948651, 'test@yopmail.com', '34.00', 'approved', '2016-12-30 16:59:50'),
(1955521, 'test@yopmail.com', '10.00', 'approved', '2016-12-27 17:02:30'),
(2147608, 'test@yopmail.com', '23.00', 'approved', '2016-12-27 17:02:30'),
(3444344, 'sergei777@yopmail.com', '1.00', 'approved', '2016-12-27 17:02:30'),
(3616300, 'aa@test.ru', '10.50', 'approved', '2016-12-30 07:44:12'),
(3698393, 'aa@test.ru', '10.30', 'approved', '2016-12-27 17:02:30'),
(4314075, 'aa@test.ru', '10.20', 'approved', '2016-12-27 07:41:32'),
(4930406, 'aa@test.ru', '7.40', 'approved', '2016-12-27 19:19:53'),
(4959990, 'test@yopmail.com', '31.00', 'approved', '2016-12-26 16:59:57'),
(5448993, 'test@yopmail.com', '34.00', 'approved', '2016-12-27 17:02:30'),
(5565386, 'test@yopmail.com', '10.00', 'approved', '2016-12-28 11:28:44'),
(6380975, 'aa@test.ru', '7.40', 'approved', '2016-12-27 19:19:55'),
(6530646, 'aa@test.ru', '10.00', 'approved', '2016-12-25 07:39:49'),
(6970697, 'aa@test.ru', '10.50', 'approved', '2016-12-24 07:54:53'),
(7271739, 'aa@test.ru', '7.40', 'rejected', '2016-12-27 19:20:08'),
(7286560, 'test@yopmail.com', '34.00', 'approved', '2016-12-27 17:02:30'),
(8201178, 'aa@test.ru', '10.40', 'approved', '2016-12-27 17:02:30'),
(8258121, 'test@yopmail.com', '34.00', 'approved', '2016-12-30 11:33:42'),
(9188889, 'test@yopmail.com', '48.00', 'approved', '2016-12-31 17:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
