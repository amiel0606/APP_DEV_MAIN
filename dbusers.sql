-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 01:00 PM
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
('admin', 672, 'Calcifer', 'Beagle', '3y/o', 'Taba', '15kg', '655f297bc5c107.80978925.jpg'),
('admin', 673, 'Pepper', 'Shih Tzu', '3y/o', 'Ewan', '3', '655f29903d6427.44276022.jpg'),
('admin', 674, 'Nigga', 'Siberian Husky', '2mo', 'dadadada', '3kg', '655f29ab33faf5.44789911.jpg'),
('admin', 675, 'Enz', 'Maitim', '3y/o', 'Baymax Tagalog', '3kg', '655f2f55199337.92151354.jpg'),
('admin', 676, 'Mejo Nigga', 'Maitim', '3mo', 'Ewan ko rito', '3kg', '655f2f79e38f71.33581456.jpg'),
('admin', 680, 'Ichiro', 'aspin', '5y/o', 'cute', '11kg', '655f3cdb873397.12849812.jpg'),
('admin', 681, 'Blue', 'Siberian Husky', '3mo', 'laruan', '3kg', '655f3cfabdbd00.87664535.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfavorites`
--

CREATE TABLE `tblfavorites` (
  `ownerUser` varchar(255) NOT NULL,
  `dogName` varchar(100) DEFAULT NULL,
  `dogImage` varchar(255) NOT NULL,
  `dogBreed` varchar(255) NOT NULL DEFAULT 'Not Specified',
  `dogAge` varchar(255) NOT NULL DEFAULT 'N/A',
  `dogDescription` varchar(255) DEFAULT 'N/A',
  `dogWeight` varchar(5) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfavorites`
--

INSERT INTO `tblfavorites` (`ownerUser`, `dogName`, `dogImage`, `dogBreed`, `dogAge`, `dogDescription`, `dogWeight`) VALUES
('hArt06', 'Pepper', '655f29903d6427.44276022.jpg', 'Shih Tzu', '3y/o', 'Ewan', '3'),
('amiel', 'Ichiro', '655f3cdb873397.12849812.jpg', 'aspin', '5y/o', 'cute', '11kg'),
('amiel', 'Calcifer', '655f297bc5c107.80978925.jpg', 'Beagle', '3y/o', 'Taba', '15kg');

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
('clarence', '$2y$10$TD/cK45vlkENfHYD0cmYvOAGFOIT02BOGwmOWkW5QkdxTb9MrrJdK', 'Imus', 'Amiel Carhyl', 'Lapid', 7);

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
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`uID`),
  ADD KEY `FK` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldogs`
--
ALTER TABLE `tbldogs`
  MODIFY `dogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldogs`
--
ALTER TABLE `tbldogs`
  ADD CONSTRAINT `FK` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
