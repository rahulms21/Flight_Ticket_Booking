-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 06:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gryffdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_det`
--

CREATE TABLE `admin_det` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_det`
--

INSERT INTO `admin_det` (`username`, `password`) VALUES
('raghusvr', 'raghu@3'),
('vignesh24', 'vicky5'),
('dhamodaran', 'dhamo28');

-- --------------------------------------------------------

--
-- Table structure for table `airlines_list`
--

CREATE TABLE `airlines_list` (
  `id` int(5) NOT NULL,
  `airline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airlines_list`
--

INSERT INTO `airlines_list` (`id`, `airline`) VALUES
(4, 'Air India'),
(12, 'Deccan');

-- --------------------------------------------------------

--
-- Table structure for table `airport_list`
--

CREATE TABLE `airport_list` (
  `id` int(5) NOT NULL,
  `airport` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport_list`
--

INSERT INTO `airport_list` (`id`, `airport`, `location`) VALUES
(1, 'Indira Gandhi National Airport ', 'Hyderabad'),
(2, 'Anna Domestic Airport', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `customer_det`
--

CREATE TABLE `customer_det` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_det`
--

INSERT INTO `customer_det` (`id`, `username`, `password`, `name`, `mobile`) VALUES
(4, 'eswarb28@gmail.com', 'test', 'eswar', 987677),
(5, 'murali26@gmail.com', 'test', 'Murali R', 9976589765);

-- --------------------------------------------------------

--
-- Table structure for table `flight_list`
--

CREATE TABLE `flight_list` (
  `id` int(11) NOT NULL,
  `airline` int(11) NOT NULL,
  `flight_num` varchar(5) NOT NULL,
  `dept` int(11) NOT NULL,
  `arr` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `d_date` date NOT NULL,
  `a_date` date NOT NULL,
  `d_time` time NOT NULL,
  `a_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`id`, `airline`, `flight_num`, `dept`, `arr`, `seat`, `price`, `d_date`, `a_date`, `d_time`, `a_time`) VALUES
(16, 12, 'DC123', 2, 1, 0, 525, '2022-01-06', '2022-01-06', '08:00:00', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `pnr` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_gender` enum('M','F') NOT NULL,
  `flight_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`pnr`, `uid`, `p_name`, `p_age`, `p_gender`, `flight_id`) VALUES
(60, 4, 'hello', 25, 'F', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines_list`
--
ALTER TABLE `airlines_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport_list`
--
ALTER TABLE `airport_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_det`
--
ALTER TABLE `customer_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_list`
--
ALTER TABLE `flight_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airline_test` (`airline`),
  ADD KEY `dept_test` (`dept`),
  ADD KEY `arr_test` (`arr`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `flight_test` (`flight_id`),
  ADD KEY `u_test` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines_list`
--
ALTER TABLE `airlines_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `airport_list`
--
ALTER TABLE `airport_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_det`
--
ALTER TABLE `customer_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flight_list`
--
ALTER TABLE `flight_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_list`
--
ALTER TABLE `flight_list`
  ADD CONSTRAINT `airline_test` FOREIGN KEY (`airline`) REFERENCES `airlines_list` (`id`),
  ADD CONSTRAINT `arr_test` FOREIGN KEY (`arr`) REFERENCES `airport_list` (`id`),
  ADD CONSTRAINT `dept_test` FOREIGN KEY (`dept`) REFERENCES `airport_list` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `flight_test` FOREIGN KEY (`flight_id`) REFERENCES `flight_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_test` FOREIGN KEY (`uid`) REFERENCES `customer_det` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
