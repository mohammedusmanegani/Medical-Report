-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 12:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodpressure`
--

CREATE TABLE `bloodpressure` (
  `bpId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dateOfEntry` text NOT NULL,
  `timeOfEntry` text NOT NULL,
  `systole` text NOT NULL,
  `diastole` text NOT NULL,
  `pulse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodpressure`
--

INSERT INTO `bloodpressure` (`bpId`, `patientId`, `dateOfEntry`, `timeOfEntry`, `systole`, `diastole`, `pulse`) VALUES
(1, 2, 'Aug 21, 2019', '08:03 PM', '123', '167', '98');

-- --------------------------------------------------------

--
-- Table structure for table `bloodsugar`
--

CREATE TABLE `bloodsugar` (
  `entryId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dateOfEntry` text NOT NULL,
  `timeOfEntry` text NOT NULL,
  `beforeFasting` text NOT NULL,
  `afterFasting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodsugar`
--

INSERT INTO `bloodsugar` (`entryId`, `patientId`, `dateOfEntry`, `timeOfEntry`, `beforeFasting`, `afterFasting`) VALUES
(1, 2, 'Aug 20, 2019', '07:03 PM', '105', '106'),
(2, 2, 'Aug 27, 2019', '03:20 PM', '1345', '2346');

-- --------------------------------------------------------

--
-- Table structure for table `paitents`
--

CREATE TABLE `paitents` (
  `patientId` int(11) NOT NULL,
  `patientName` text NOT NULL,
  `patientAge` int(11) NOT NULL,
  `patientSex` text NOT NULL,
  `patientEmail` text NOT NULL,
  `patientPassword` longtext NOT NULL,
  `patientPhotoUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paitents`
--

INSERT INTO `paitents` (`patientId`, `patientName`, `patientAge`, `patientSex`, `patientEmail`, `patientPassword`, `patientPhotoUrl`) VALUES
(1, 'Usman', 20, 'M', 'ka.usmanegani@gmail.com', '$2y$10$pm77mVydBqul0IIJhplThO9vkDySrmatTy6HvHNu094YNE.oOqDtK', 'uploads/1.jpg'),
(2, 'gani', 20, 'M', 'ka.usman@gmail.com', '$2y$10$NcE1BuYLrgQpqReqLw553Of/wDrQB4zBSoxgK7zV0xUzWbb0uBJYa', 'uploads/2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  ADD PRIMARY KEY (`bpId`);

--
-- Indexes for table `bloodsugar`
--
ALTER TABLE `bloodsugar`
  ADD PRIMARY KEY (`entryId`);

--
-- Indexes for table `paitents`
--
ALTER TABLE `paitents`
  ADD PRIMARY KEY (`patientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  MODIFY `bpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodsugar`
--
ALTER TABLE `bloodsugar`
  MODIFY `entryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paitents`
--
ALTER TABLE `paitents`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
