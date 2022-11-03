-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 01:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EmployeeReimbursementSep2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeMaster`
--

CREATE TABLE `EmployeeMaster` (
  `Id` int(11) NOT NULL,
  `EmpCode` varchar(10) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeMaster`
--

INSERT INTO `EmployeeMaster` (`Id`, `EmpCode`, `FirstName`, `LastName`, `Department`, `Designation`, `Phone`) VALUES
(1, 'UBI001', 'Allie', 'Grater', 'Finance', 'Accountant', '8654721036'),
(2, 'UBI002', 'Olive', 'Dactyl', 'Admin', 'Superviser', '5698741320'),
(3, 'UBI003', 'Amanda', 'Kewshun', 'Technical', 'Technical ', '8547896023'),
(4, 'UBI004', 'Roy', 'Thettick', 'Management', 'Manager', '5786012369'),
(5, 'UBI005', 'Rod', 'Knee', 'Management', 'Assistant ', '8746320891'),
(6, 'UBI006', 'Dee', 'Mandingbos', 'Technical', 'Developer', '6578941023'),
(7, 'UBI007', 'Willie', 'Clowd', 'Technical', 'Developer', '4258963248');

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeReimburse`
--

CREATE TABLE `EmployeeReimburse` (
  `Id` int(11) NOT NULL,
  `EmpId` int(11) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `Description` text NOT NULL,
  `TotalAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeReimburse`
--

INSERT INTO `EmployeeReimburse` (`Id`, `EmpId`, `FromDate`, `ToDate`, `Description`, `TotalAmount`) VALUES
(1, 1, '2022-09-01', '2022-09-02', 'visit head office', 100);

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeReimburseDetails`
--

CREATE TABLE `EmployeeReimburseDetails` (
  `Id` int(11) NOT NULL,
  `EmpId` int(11) NOT NULL,
  `ReimburseDate` date NOT NULL,
  `Heads` varchar(25) NOT NULL,
  `HeadAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeReimburseDetails`
--

INSERT INTO `EmployeeReimburseDetails` (`Id`, `EmpId`, `ReimburseDate`, `Heads`, `HeadAmount`) VALUES
(1, 1, '2022-09-01', 'Ticket', 40),
(2, 1, '2022-09-02', 'Food', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EmployeeMaster`
--
ALTER TABLE `EmployeeMaster`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmpCode` (`EmpCode`);

--
-- Indexes for table `EmployeeReimburse`
--
ALTER TABLE `EmployeeReimburse`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `EmployeeReimburseDetails`
--
ALTER TABLE `EmployeeReimburseDetails`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EmployeeMaster`
--
ALTER TABLE `EmployeeMaster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `EmployeeReimburse`
--
ALTER TABLE `EmployeeReimburse`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `EmployeeReimburseDetails`
--
ALTER TABLE `EmployeeReimburseDetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
