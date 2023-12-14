-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 06:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
('admin', 681, 'Pepper', 'Shih Tzu', '5years old', 'None', '3', '6574670a663c56.88710653.jpg'),
('admin', 682, 'Calcifer', 'Beagle', '2 years old', 'Taba hahaha', '15', '65746c6f624aa8.82463828.jpg'),
('admin', 683, 'Icey', 'Shih Tzu', '', 'Cute', '4', '65746cf0a6fb63.85080693.jpg'),
('admin', 684, 'Jacob', 'Husky', '', 'Laruan', '3kg', '65746d150c1f47.95767175.jpg'),
('admin', 685, 'AWda', 'aawd', '', 'awd', '3', '657487e48adff3.97499691.jpg'),
('admin', 686, 'adwd', 'awd', '', 'awd', '3', '657487ffd5b665.05157221.jpg'),
('admin', 687, 'awdas', 'ada', 'a', '', 'awdaw', '657488092aaff9.75478145.jpg'),
('amiel', 688, 'Igit', 'ASpin', '2', '', '4', '6575ad61be0484.06970347.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblfavorites`
--

CREATE TABLE `tblfavorites` (
  `ownerUser` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `dogID` int(100) NOT NULL,
  `dogName` varchar(100) NOT NULL,
  `dogImage` varchar(255) NOT NULL,
  `dogBreed` varchar(255) NOT NULL,
  `dogAge` varchar(255) NOT NULL,
  `dogDescription` varchar(255) NOT NULL,
  `dogWeight` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfavorites`
--

INSERT INTO `tblfavorites` (`ownerUser`, `uploader`, `dogID`, `dogName`, `dogImage`, `dogBreed`, `dogAge`, `dogDescription`, `dogWeight`, `timestamp`) VALUES
('amiel', 'admin', 682, 'Calcifer', '65746c6f624aa8.82463828.jpg', 'Beagle', '2 years old', 'Taba hahaha', '15', '2023-12-13 21:05:09'),
('amiel', 'admin', 683, 'Icey', '65746cf0a6fb63.85080693.jpg', 'Shih Tzu', '', 'Cute', '4', '2023-12-13 19:06:52'),
('amiel', 'admin', 684, 'Jacob', '65746d150c1f47.95767175.jpg', 'Husky', '', 'Laruan', '3kg', '2023-12-13 19:21:00'),
('amiel', 'admin', 685, 'AWda', '657487e48adff3.97499691.jpg', 'aawd', '', 'awd', '3', '2023-12-13 21:05:12'),
('amiel', 'admin', 687, 'awdas', '657488092aaff9.75478145.jpg', 'ada', 'a', '', 'awdaw', '2023-12-13 19:20:57'),
('hArt06', 'admin', 682, 'Calcifer', '65746c6f624aa8.82463828.jpg', 'Beagle', '2 years old', 'Taba hahaha', '15', '2023-12-13 21:06:02'),
('hArt06', 'admin', 685, 'AWda', '657487e48adff3.97499691.jpg', 'aawd', '', 'awd', '3', '2023-12-13 21:06:00'),
('hArt06', 'admin', 686, 'adwd', '657487ffd5b665.05157221.jpg', 'awd', '', 'awd', '3', '2023-12-13 21:06:03'),
('hArt06', 'admin', 687, 'awdas', '657488092aaff9.75478145.jpg', 'ada', 'a', '', 'awdaw', '2023-12-13 21:06:08'),
('hArt06', 'amiel', 688, 'Igit', '6575ad61be0484.06970347.jpg', 'ASpin', '2', '', '4', '2023-12-13 20:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `Mid` int(255) NOT NULL,
  `sender` varchar(3000) NOT NULL,
  `receiver` varchar(3000) NOT NULL,
  `message` text NOT NULL,
  `received` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`Mid`, `sender`, `receiver`, `message`, `received`, `seen`, `timestamp`) VALUES
(1, 'sender', 'receiver', 'hello testing', '0', '0', '2023-12-10 15:13:47'),
(5, 'admin', 'receiver', 'heee', '0', '0', '2023-12-10 17:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblrejecteddogs`
--

CREATE TABLE `tblrejecteddogs` (
  `username` varchar(255) NOT NULL,
  `dogID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `Status` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Status`, `username`, `img`, `password`, `city`, `fname`, `lname`, `uID`) VALUES
('', 'amiel', '6579da7967cd4.jpg', '$2y$10$sZm47LoFFWC2eJ/bkCAcT.skbwBGgN1Z2RHX0IUpMwr5SXUCNhr7e', 'Caloocan', 'Amiel Carhyl', 'Lapid', 1),
('', 'awd', '', '$2y$10$rVfvMjK0pA2W0ghxVp/CR.o6IePDOg7k.OsUQQRcrsPSJWEcZMhLy', 'Imus', 'Amiel Carhyl', 'Lapid', 2),
('', 'amielito', '', '$2y$10$A8mLzjRKlhgBQziU9V/Q4.xVP3Jy7F.w0vMthzfJV7qbCR2eDKf/e', 'Imus', 'Amiel Carhyl', 'Lapid', 3),
('', 'admin', '', '$2y$10$jkwhkebfNcCvoOlsz1EnneENR5pb4tO0kmhRFwFnUCzNQtRGVnk8a', 'Imus', 'Amiel Carhyl', 'Lapid', 4),
('', 'aaawd', '', '$2y$10$IdRQ6GhKYaewduYxPjdPUOZnERrnhFMq1EtM9hEXFmLpaGYQwXJla', 'Imus', 'Amiel Carhyl', 'Lapid', 5),
('', 'hArt06', '', '$2y$10$orprCUIzB6YcUpDh4qKRmujZCsNUUfmjNI8Rzn9iUOVXChn4vymnW', 'Caloocan', 'Nicole Heart', 'Mendoza', 6),
('', 'Renz', '', '$2y$10$A7okzTUUynmbuv8JiuQjdOLt9OVb9E/S98NGQ7tPsTwPcpvV04Izq', 'General Trias', 'Jorenz', 'Ferrer', 7),
('', 'Ferrer1515', '', '$2y$10$YWqK8bTdgj38qpyHBtT.nuxRqbmLj1YtvjOceXbP00y1q8FfeXfv6', 'General Trias', 'Joseph', 'Ferrer', 8),
('', 'amiels22', '', '$2y$10$WlIApeGlXI7EI0.cNK5Wl.F5yXabywOKVDf1hVIqLEOTMVhYaPtaC', 'Imus', 'Amiel Carhyl', 'Lapid', 9),
('', 'juandc', '', '$2y$10$oL9k4gFU.Vr5K83PH1rhyeTWbQ0c9SWqRpFflAwP44k4Xf72I20P6', 'Manila', 'Juan', 'Dela Cruz', 10),
('', 'darius', '', '$2y$10$VFHPrU3VddnmmpU1n.Hy1uG9RUacaBXooPcX0i.NQTUjN6aPQXvhK', 'Cavite', 'Darius', 'Gavino', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldogs`
--
ALTER TABLE `tbldogs`
  ADD PRIMARY KEY (`dogID`),
  ADD KEY `username` (`username`),
  ADD KEY `idx_dogID` (`dogID`);

--
-- Indexes for table `tblfavorites`
--
ALTER TABLE `tblfavorites`
  ADD PRIMARY KEY (`ownerUser`,`dogID`),
  ADD KEY `FK_dog_favorite` (`dogID`);

--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`Mid`),
  ADD KEY `Fk` (`sender`(768)),
  ADD KEY `fOREIGN` (`receiver`(768));

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
  MODIFY `dogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `Mid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfavorites`
--
ALTER TABLE `tblfavorites`
  ADD CONSTRAINT `FK_dog_favorite` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`),
  ADD CONSTRAINT `FK_user_favorite` FOREIGN KEY (`ownerUser`) REFERENCES `tblusers` (`username`);

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
