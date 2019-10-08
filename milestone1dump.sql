-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 05:48 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `name` varchar(64) NOT NULL,
  `ph_number` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `verify_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `ph_number`, `password`, `email`, `verify_status`) VALUES
(3, 'Pavan', '+17577574528', '$2y$10$lPNRad90/Uah4.KmVyPdxu/Xm4w2ez1ZhIwOFaTmBY0lyDmzYW.4a', 'pgala001@odu.edu', 1),
(4, 'Pavan PG', '+17577574527', '$2y$10$2m0RfVnuf1qOHD2DyXs.N.oVN5ELPVtslQtRIuRJUGVHHThxV6D1q', 'pavangalagali@gmail.com', 1),
(5, 'Anusha', '+17577574529', '$2y$10$MQmaj7Do7uXppfbkvZhPgeNS645mgJDrA4mC9lutJU5HFuD6Uo4g6', 'amatc001@odu.edu', 1),
(6, 'David', '+17577574526', '$2y$10$IpEMdY0l3bhZ2MIygavKEeRA8tEMGju0SEGXVVwDfe1d6x0/z28Mi', 'dbaya001@odu.edu', 1),
(7, 'Adithya', '+17577574523', '$2y$10$vvNwXFV3hSqljqOsS2KZIe8CNWvjubih8n63VTR8/TKASKYDfRmt6', 'adithyar82@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
