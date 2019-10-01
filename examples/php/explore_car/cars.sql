-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2019 at 07:42 PM
-- Server version: 5.7.27
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `make_id` int(11) NOT NULL,
  `make_name` varchar(65) COLLATE utf8_bin NOT NULL,
  `hq` text COLLATE utf8_bin NOT NULL,
  `make_notes` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`make_id`, `make_name`, `hq`, `make_notes`) VALUES
(1, 'Ford', 'Dearborn, Michigan, USA', 'Best make'),
(2, 'Chevrolet', 'Detroit, Michigan, USA', 'A good second best'),
(3, 'Honda', 'Minato, Tokyo, Japan', 'Most popular car maker');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `model_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `model_name` varchar(65) COLLATE utf8_bin NOT NULL,
  `horsepower` int(11) DEFAULT NULL,
  `num_doors` int(11) DEFAULT NULL,
  `model_notes` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`model_id`, `make_id`, `model_name`, `horsepower`, `num_doors`, `model_notes`) VALUES
(1, 1, 'Mustang GT', 435, 2, 'Crazy awesome car'),
(2, 1, 'Focus', 123, 4, 'Cheaper car'),
(3, 2, 'Camaro SS', 650, 2, 'Looks good on paper'),
(4, 2, 'Impala', 197, 4, 'Really not worth buying'),
(5, 3, 'Odyssey', 280, 5, 'Best selling family car');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `key_make_id` (`make_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makes`
--
ALTER TABLE `makes`
  MODIFY `make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `key_make_id` FOREIGN KEY (`make_id`) REFERENCES `makes` (`make_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
