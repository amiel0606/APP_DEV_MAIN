-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 09:44 PM
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
('admin', 702, 'black Eye', 'Aspin', '2', 'awdaaz', '2', '659ea406c43a69.99931803.jpg'),
('admin', 703, 'C', 'Beagle', '3', 'awd', '22', '659ea41426cda3.46730488.jpg'),
('admin', 704, 'Enz', 'aawd', '23', 'adazsc', '11', '659ea4413fb943.96780452.jpg'),
('admin', 705, 'Pepper', 'Shih Tzu', '3', 'awdzc', '3', '659ea44dca93a8.32618058.jpg'),
('Renz', 706, 'Ice', 'Shih Tzu', '3', 'Likes to eat treats', '4kg', '65a00c1411e929.71547577.jpg'),
('Renz', 707, 'Miki', 'Aspin', '4', 'Has cute dog ears', '8kg', '65a0154ab5ce53.12743417.jpg'),
('Ferrer1515', 708, 'Goldy', 'Golden Retriever', '5', 'Furry Doggo', '15kg', '65a04bbb4a5119.59602700.jpg');

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
('amiel', 'admin', 702, 'black Eye', '659ea406c43a69.99931803.jpg', 'Aspin', '2', 'awdaaz', '2', '2024-01-10 17:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblmatch`
--

CREATE TABLE `tblmatch` (
  `interestedUser` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `dogID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmatch`
--

INSERT INTO `tblmatch` (`interestedUser`, `uploader`, `dogID`, `timestamp`) VALUES
('amiel', 'admin', 703, '2024-01-10 17:18:43'),
('hArt06', 'admin', 702, '2024-01-10 17:24:21'),
('hArt06', 'admin', 703, '2024-01-10 17:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `Mid` int(255) NOT NULL,
  `sender` varchar(3000) NOT NULL,
  `receiver` varchar(3000) NOT NULL,
  `message` text NOT NULL,
  `dogID` int(11) NOT NULL,
  `received` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`Mid`, `sender`, `receiver`, `message`, `dogID`, `received`, `seen`, `timestamp`) VALUES
(48, 'hArt06', 'admin', 'hello check C', 703, '0', '0', '2024-01-11 02:37:11'),
(49, 'hArt06', 'admin', 'hello 702 ????', 702, '0', '0', '2024-01-11 02:49:13'),
(50, 'admin', 'hArt06', 'wtf???', 702, '0', '0', '2024-01-11 02:49:24'),
(51, 'admin', 'hArt06', '702 check test', 702, '0', '0', '2024-01-11 02:53:23'),
(52, 'admin', 'hArt06', 'hehe check 703 baka di nagana ', 703, '0', '0', '2024-01-11 02:59:49'),
(53, 'admin', 'hArt06', 'hello nigga C', 702, '0', '0', '2024-01-11 03:01:09'),
(54, 'admin', 'hArt06', 'check blackEye', 702, '0', '0', '2024-01-11 03:01:43'),
(55, 'admin', 'hArt06', 'zzz', 702, '0', '0', '2024-01-11 03:01:55'),
(56, 'hArt06', 'admin', 'ewan haha', 702, '0', '0', '2024-01-11 03:04:31'),
(57, 'admin', 'hArt06', 'zzz magic', 702, '0', '0', '2024-01-11 03:05:48'),
(58, 'admin', 'hArt06', 'hello nigga?', 702, '0', '0', '2024-01-11 03:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotifications`
--

CREATE TABLE `tblnotifications` (
  `notificationID` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `dogID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnotifications`
--

INSERT INTO `tblnotifications` (`notificationID`, `sender`, `receiver`, `type`, `message`, `timestamp`, `dogID`) VALUES
(12, 'amiel', 'admin', 'Success', 'Match request with dog successfully sent!', '2024-01-10 17:18:34', 703),
(13, 'hArt06', 'admin', 'Success', 'Match request with dog successfully sent!', '2024-01-10 17:24:13', 702),
(14, 'hArt06', 'admin', 'Match Request', 'Match request with dog successfully sent!', '2024-01-10 17:38:04', 705),
(15, 'hArt06', 'admin', 'Success', 'Match request with dog successfully sent!', '2024-01-10 17:38:06', 703),
(18, 'Renki', 'Renz', 'Success', 'Match request with dog successfully sent!', '2024-01-11 17:03:39', 706),
(20, 'Ryujin', 'Renz', 'Match Request', 'Match request with dog successfully sent!', '2024-01-11 18:13:28', 706),
(21, 'deCarte', 'Renz', 'Match Request', 'Match request with dog successfully sent!', '2024-01-11 18:13:58', 706),
(22, 'Renki', 'Ferrer1515', 'Success', 'Match request with dog successfully sent!', '2024-01-11 20:13:45', 708);

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
('amiel', 703),
('deCarte', 706),
('hArt06', 702),
('hArt06', 703),
('hArt06', 705);

-- --------------------------------------------------------

--
-- Table structure for table `tblrejectedusers`
--

CREATE TABLE `tblrejectedusers` (
  `username` varchar(255) NOT NULL,
  `RejectedUser` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
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
  `dogsAdopted` int(11) NOT NULL DEFAULT 0,
  `dogsForAdoption` int(11) NOT NULL,
  `Rating` decimal(2,1) NOT NULL DEFAULT 0.0,
  `NumRatings` int(11) DEFAULT 0,
  `uID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Status`, `username`, `img`, `password`, `city`, `fname`, `lname`, `dogsAdopted`, `dogsForAdoption`, `Rating`, `NumRatings`, `uID`) VALUES
('', 'amiel', '6579da7967cd4.jpg', '$2y$10$sZm47LoFFWC2eJ/bkCAcT.skbwBGgN1Z2RHX0IUpMwr5SXUCNhr7e', 'Caloocan', 'Amiel Carhyl', 'Lapid', 0, 1, 0.0, 0, 1),
('', 'awd', '', '$2y$10$rVfvMjK0pA2W0ghxVp/CR.o6IePDOg7k.OsUQQRcrsPSJWEcZMhLy', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0.0, 0, 2),
('', 'amielito', '', '$2y$10$A8mLzjRKlhgBQziU9V/Q4.xVP3Jy7F.w0vMthzfJV7qbCR2eDKf/e', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0.0, 0, 3),
('', 'admin', '659f567290c64.jpg', '$2y$10$jkwhkebfNcCvoOlsz1EnneENR5pb4tO0kmhRFwFnUCzNQtRGVnk8a', 'Imus', 'Admin Amiel', 'Lapid', 0, 11, 0.0, 0, 4),
('', 'aaawd', '', '$2y$10$IdRQ6GhKYaewduYxPjdPUOZnERrnhFMq1EtM9hEXFmLpaGYQwXJla', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0.0, 0, 5),
('', 'hArt06', '659f56f64cec3.jpg', '$2y$10$orprCUIzB6YcUpDh4qKRmujZCsNUUfmjNI8Rzn9iUOVXChn4vymnW', 'Caloocan', 'Nicole Heart', 'Mendoza', 0, 0, 0.0, 0, 6),
('', 'Renz', '65a00b7007e22.jpg', '$2y$10$A7okzTUUynmbuv8JiuQjdOLt9OVb9E/S98NGQ7tPsTwPcpvV04Izq', 'General Trias', 'Jorenz', 'Ferrer', 0, 5, 0.0, 0, 7),
('', 'amiels22', '', '$2y$10$WlIApeGlXI7EI0.cNK5Wl.F5yXabywOKVDf1hVIqLEOTMVhYaPtaC', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0.0, 0, 9),
('', 'juandc', '', '$2y$10$oL9k4gFU.Vr5K83PH1rhyeTWbQ0c9SWqRpFflAwP44k4Xf72I20P6', 'Manila', 'Juan', 'Dela Cruz', 0, 0, 0.0, 0, 10),
('', 'darius', '', '$2y$10$VFHPrU3VddnmmpU1n.Hy1uG9RUacaBXooPcX0i.NQTUjN6aPQXvhK', 'Cavite', 'Darius', 'Gavino', 0, 0, 0.0, 0, 11),
('', 'Renki', '65a015cd06ab1.jpg', '$2y$10$MdWJzBjaHqmpzAQB.TxYVe7IDOu89VMAUjJiDnXmnJEykdp8P.4Qy', 'Imus', 'Kim Caryl', 'Ragay', 0, 0, 0.0, 0, 12),
('', 'Ferrer1515', '65a04b77d3fa8.jpg', '$2y$10$TPBm0kwgiTJFprvRVJRoC.3nU4xQX5/1H2ARx5CH5ZGiWWuVDb0oK', 'General Trias', 'Lorenzo', 'Ferrer', 0, 3, 0.0, 0, 13),
('', 'deCarte', '65a02f945ecdf.jpg', '$2y$10$XcfqFccusu18tVRozIOTf.DtHy5.oQH1v7egvKtZdwliWUwLkwzx6', 'Trece', 'Carl Vincent', 'Verdejo', 0, 0, 0.0, 0, 14),
('', 'Ryujin', '65a02f6588b15.png', '$2y$10$K6a1ZgioGfTcbxdnI9TNEeU5WAvCordf6eF9W.HVwh7qiFh7y3W5m', 'General Trias', 'Jose Carlos', 'Descalzo', 0, 0, 0.0, 0, 15);

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
  ADD KEY `foreignKey` (`receiver`(768)),
  ADD KEY `dogID_FK` (`dogID`);

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `FK_dog_notification` (`dogID`);

--
-- Indexes for table `tblrejecteddogs`
--
ALTER TABLE `tblrejecteddogs`
  ADD PRIMARY KEY (`username`,`dogID`),
  ADD KEY `FK_dog` (`dogID`);

--
-- Indexes for table `tblrejectedusers`
--
ALTER TABLE `tblrejectedusers`
  ADD PRIMARY KEY (`username`,`RejectedUser`),
  ADD KEY `FK_rejectedUser` (`RejectedUser`);

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
  MODIFY `dogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `Mid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD CONSTRAINT `FK_dog_notification` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblrejecteddogs`
--
ALTER TABLE `tblrejecteddogs`
  ADD CONSTRAINT `FK_dog` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`),
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`),
  ADD CONSTRAINT `tblrejecteddogs_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`);

--
-- Constraints for table `tblrejectedusers`
--
ALTER TABLE `tblrejectedusers`
  ADD CONSTRAINT `FK_rejectedUser` FOREIGN KEY (`RejectedUser`) REFERENCES `tblusers` (`username`),
  ADD CONSTRAINT `FK_user_rejectedUser` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
