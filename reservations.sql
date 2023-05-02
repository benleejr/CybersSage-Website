-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `reservations` (
  `ResNumber` int(11) NOT NULL,
  `ResName` varchar(20) NOT NULL,
  `ResSize` int(11) NOT NULL,
  `ResDate` date NOT NULL,
  `ResTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ResNumber`, `ResName`, `ResSize`, `ResDate`, `ResTime`) VALUES
(2, 'Nick', 10, '2023-05-08', '15:00:00'),
(6, 'Nicholas', 7, '2023-05-09', '13:05:00'),
(7, 'john holly', 5, '2023-05-10', '14:09:00'),
(11, 'facebook scandal', 5, '2023-05-03', '12:16:00'),
(17, 'Nicholas', 10, '2023-05-10', '16:24:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ResNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ResNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
