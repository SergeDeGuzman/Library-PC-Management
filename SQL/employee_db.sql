-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 01:23 AM
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
-- Database: `employee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employeeID` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userType` varchar(255) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `employeeUsername` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `employeePassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employeeID`, `userType`, `employeeName`, `employeeUsername`, `employeePassword`) VALUES
('2014-231', 'Librarian', 'John Doe', 'johndoe19', 'johndoe19'),
('2017-251', 'Teacher', 'Joseph Santiago', 'josesan06', '12345'),
('2018-353', 'Janitor', 'Helen Delos Reyes', 'hdr1991', 'hello_22'),
('2020-402', 'Admin', 'Sammuel Rodriguez', 'samrodri@gmail.com', 'samrodri-52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
