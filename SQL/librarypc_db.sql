-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 01:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarypc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banunbanlogs_table`
--

CREATE TABLE `banunbanlogs_table` (
  `banID` int(11) UNSIGNED NOT NULL,
  `studentID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `studentName` varchar(355) NOT NULL,
  `status` varchar(40) NOT NULL,
  `reason` varchar(355) NOT NULL,
  `dateOfBan` date DEFAULT NULL,
  `dateOfUnban` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarianlogs_table`
--

CREATE TABLE `librarianlogs_table` (
  `logsID` int(11) UNSIGNED NOT NULL,
  `employeeID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `logIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `logOut` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs_table`
--

CREATE TABLE `logs_table` (
  `logID` int(11) UNSIGNED NOT NULL,
  `studentID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `studentName` varchar(355) NOT NULL,
  `timeIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `pcNumber` int(2) NOT NULL,
  `timeOut` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc_table`
--

CREATE TABLE `pc_table` (
  `pcNumber` int(2) NOT NULL,
  `pcStatus` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pc_table`
--

INSERT INTO `pc_table` (`pcNumber`, `pcStatus`) VALUES
(1, 'AVAILABLE'),
(2, 'AVAILABLE'),
(3, 'AVAILABLE'),
(4, 'AVAILABLE'),
(5, 'AVAILABLE'),
(6, 'AVAILABLE'),
(7, 'AVAILABLE'),
(8, 'AVAILABLE'),
(9, 'AVAILABLE'),
(10, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `request_table`
--

CREATE TABLE `request_table` (
  `requestID` int(11) UNSIGNED NOT NULL,
  `studentID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `studentName` varchar(355) NOT NULL,
  `timeOfRequest` timestamp NOT NULL DEFAULT current_timestamp(),
  `pcNumber` int(2) DEFAULT NULL,
  `requestStatus` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentpcslot_table`
--

CREATE TABLE `studentpcslot_table` (
  `studentID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `studentName` varchar(355) NOT NULL,
  `timeIn` timestamp NOT NULL DEFAULT current_timestamp(),
  `pcNumber` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentstatus_table`
--

CREATE TABLE `studentstatus_table` (
  `studentID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `studentName` varchar(355) NOT NULL,
  `status` varchar(40) NOT NULL,
  `reason` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentstatus_table`
--

INSERT INTO `studentstatus_table` (`studentID`, `studentName`, `status`, `reason`) VALUES
('2015-115355', 'Benexisto Escobin', 'PERMITTED', ''),
('2016-116594', 'Maricell Soriano', 'PERMITTED', ''),
('2017-117001', 'Marielle Pamulaklakin', 'PERMITTED', ''),
('2018-123234', 'Aeuz Caranto', 'PERMITTED', ''),
('2020-120323', 'Lhenard Trinidad', 'PERMITTED', ''),
('2021-120048', 'Serge Trever B. De Guzman', 'PERMITTED', ''),
('2021-121467', 'Andrei Esquejo', 'PERMITTED', ''),
('2022-135645', 'Christian Sydney Earl Gomez', 'PERMITTED', ''),
('2023-122365', 'Ezekiel Ian Labradores', 'PERMITTED', ''),
('2024-152341', 'Mark Anthony Galicia', 'PERMITTED', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banunbanlogs_table`
--
ALTER TABLE `banunbanlogs_table`
  ADD PRIMARY KEY (`banID`);

--
-- Indexes for table `librarianlogs_table`
--
ALTER TABLE `librarianlogs_table`
  ADD PRIMARY KEY (`logsID`);

--
-- Indexes for table `logs_table`
--
ALTER TABLE `logs_table`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `pc_table`
--
ALTER TABLE `pc_table`
  ADD PRIMARY KEY (`pcNumber`);

--
-- Indexes for table `request_table`
--
ALTER TABLE `request_table`
  ADD PRIMARY KEY (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banunbanlogs_table`
--
ALTER TABLE `banunbanlogs_table`
  MODIFY `banID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `librarianlogs_table`
--
ALTER TABLE `librarianlogs_table`
  MODIFY `logsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs_table`
--
ALTER TABLE `logs_table`
  MODIFY `logID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_table`
--
ALTER TABLE `request_table`
  MODIFY `requestID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
