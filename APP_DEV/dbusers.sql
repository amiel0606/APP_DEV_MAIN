-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 01:24 PM
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
-- Database: `dbusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldogs`
--

CREATE TABLE `tbldogs` (
  `username` varchar(255) NOT NULL,
  `dogID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'No Name Yet',
  `breed` varchar(255) NOT NULL DEFAULT 'Unknown Breed',
  `age` varchar(50) NOT NULL DEFAULT 'Undefined',
  `description` varchar(500) NOT NULL DEFAULT 'No Description Given',
  `weight` varchar(5) NOT NULL DEFAULT 'N/A',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldogs`
--

INSERT INTO `tbldogs` (`username`, `dogID`, `name`, `breed`, `age`, `description`, `weight`, `image`) VALUES
('amiel', 1, 'nigger', 'husky', 'aw', 'adwda', '', '655edbbec0bf92.96462726.jpg'),
('amiel', 2, 'Black Eye', 'aspin', '12', 'awdawd', '', 'blackEye.jpg'),
('admin', 3, 'enz', 'ewan', '', 'nigga', '', 'enz.jpg'),
('admin', 4, 'igit', 'aspin', '12', 'ewan', '', 'igit.jpg'),
('admin', 5, 'pepper', 'shih tzu', '11', 'ewan', '', 'pepper.jpg'),
('amiel', 6, 'awd', 'awd', 'aw', 'awd', '', '655ee40a7098d0.09578960.jpg'),
('amiel', 7, 'awdawd', 'awdad', 'ad', 'dawdad', '', '655ee4b225a0b5.74442308.jpg'),
('amiel', 8, 'awda', 'wdawd', 'aw', 'awdawd', '', '655ee4ef119623.17479117.jpg'),
('amiel', 663, 'awd', 'awda', 'da', 'awd', '', '655ee54141df77.63123655.jpg'),
('amiel', 664, 'awdawd', 'awdaw', 'aw', 'dada', '', '655eeb70c5aab8.18286175.png'),
('amiel', 667, 'Black Eye', 'aspin', '', '', '22', '655f08c3c59893.31248353.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfavorites`
--

CREATE TABLE `tblfavorites` (
  `ownerUser` varchar(255) NOT NULL,
  `dogName` varchar(100) NOT NULL,
  `dogImage` varchar(255) NOT NULL,
  `dogBreed` varchar(255) NOT NULL,
  `dogAge` varchar(255) NOT NULL,
  `dogDescription` varchar(255) NOT NULL,
  `dogWeight` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfavorites`
--

INSERT INTO `tblfavorites` (`ownerUser`, `dogName`, `dogImage`, `dogBreed`, `dogAge`, `dogDescription`, `dogWeight`) VALUES
('admin', 'nigger', '655edbbec0bf92.96462726.jpg', 'husky', 'aw', 'adwda', ''),
('amiel', 'pepper', 'pepper.jpg', 'shih tzu', '11', 'ewan', ''),
('amiel', 'enz', 'enz.jpg', 'ewan', '', 'nigga', ''),
('amiel', 'igit', 'igit.jpg', 'aspin', '12', 'ewan', ''),

-- --------------------------------------------------------

--
-- Table structure for table `tblrejecteddogs`
--

CREATE TABLE `tblrejecteddogs` (
  `username` varchar(255) NOT NULL,
  `dogID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrejecteddogs`
--

INSERT INTO `tblrejecteddogs` (`username`, `dogID`) VALUES
('Renz', 1),
('Renz', 2),
('Renz', 3),
('Renz', 4),
('Renz', 5),
('Renz', 6),
('Renz', 7),
('Renz', 8),
('Renz', 663),
('Renz', 664),
('Renz', 667);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`username`, `password`, `city`, `fname`, `lname`, `uID`) VALUES
('amiel', '$2y$10$sZm47LoFFWC2eJ/bkCAcT.skbwBGgN1Z2RHX0IUpMwr5SXUCNhr7e', 'Imus', 'Amiel Carhyl', 'Lapid', 1),
('awd', '$2y$10$rVfvMjK0pA2W0ghxVp/CR.o6IePDOg7k.OsUQQRcrsPSJWEcZMhLy', 'Imus', 'Amiel Carhyl', 'Lapid', 2),
('amielito', '$2y$10$A8mLzjRKlhgBQziU9V/Q4.xVP3Jy7F.w0vMthzfJV7qbCR2eDKf/e', 'Imus', 'Amiel Carhyl', 'Lapid', 3),
('admin', '$2y$10$jkwhkebfNcCvoOlsz1EnneENR5pb4tO0kmhRFwFnUCzNQtRGVnk8a', 'Imus', 'Amiel Carhyl', 'Lapid', 4),
('aaawd', '$2y$10$IdRQ6GhKYaewduYxPjdPUOZnERrnhFMq1EtM9hEXFmLpaGYQwXJla', 'Imus', 'Amiel Carhyl', 'Lapid', 5),
('hArt06', '$2y$10$orprCUIzB6YcUpDh4qKRmujZCsNUUfmjNI8Rzn9iUOVXChn4vymnW', 'Caloocan', 'Nicole Heart', 'Mendoza', 6),
('Renz', '$2y$10$A7okzTUUynmbuv8JiuQjdOLt9OVb9E/S98NGQ7tPsTwPcpvV04Izq', 'General Trias', 'Jorenz', 'Ferrer', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldogs`
--
ALTER TABLE `tbldogs`
  ADD PRIMARY KEY (`dogID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tblrejecteddogs`
--
ALTER TABLE `tblrejecteddogs`
  ADD PRIMARY KEY (`username`,`dogID`),
  ADD KEY `FK_dog` (`dogID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`uID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldogs`
--
ALTER TABLE `tbldogs`
  MODIFY `dogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblrejecteddogs`
--
ALTER TABLE `tblrejecteddogs`
  ADD CONSTRAINT `FK_dog` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`),
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`),
  ADD CONSTRAINT `tblrejecteddogs_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
