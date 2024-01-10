-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:10 AM
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
-- Database: dbusers
--

-- --------------------------------------------------------

--
-- Table structure for table tbldogs
--

CREATE TABLE tbldogs (
  username varchar(255) NOT NULL,
  dogID int(100) NOT NULL,
  name varchar(100) NOT NULL DEFAULT 'No Name Yet',
  breed varchar(255) NOT NULL DEFAULT 'Unknown Breed',
  age varchar(50) NOT NULL DEFAULT 'Undefined',
  description varchar(500) NOT NULL DEFAULT 'No Description Given',
  weight varchar(5) NOT NULL DEFAULT 'N/A',
  image varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table tbldogs
--

INSERT INTO `tbldogs` (`username`, `dogID`, `name`, `breed`, `age`, `description`, `weight`, `image`) VALUES
('Renz', 1, 'Ice', 'Shih Tzu', '3', 'cute dog', '4', '657c9bf54c6711.52098593.jpg'),
('Renz', 2, 'Enzorino', 'dikoalam', '5', 'aso ni Enz', '3', '657c9c14b2dcc9.07715651.jpg'),
('Renz', 3, 'Miki', 'Aspin', '5', 'Funny dog', '15', '657c9c2b3762c8.92311089.jpg'),
('Ferrer1515', 5, 'Pepper', 'Shih Tzu', '2', 'likes hats', '3', '657ca80bcf7585.88575588.jpg');

-- --------------------------------------------------------

--
-- Table structure for table tblfavorites
--

CREATE TABLE tblfavorites (
  ownerUser varchar(255) NOT NULL,
  uploader varchar(255) NOT NULL,
  dogID int(100) NOT NULL,
  dogName varchar(100) NOT NULL,
  dogImage varchar(255) NOT NULL,
  dogBreed varchar(255) NOT NULL,
  dogAge varchar(255) NOT NULL,
  dogDescription varchar(255) NOT NULL,
  dogWeight varchar(5) NOT NULL,
  timestamp timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table tblfavorites
--

INSERT INTO `tblfavorites` (`ownerUser`, `uploader`, `dogID`, `dogName`, `dogImage`, `dogBreed`, `dogAge`, `dogDescription`, `dogWeight`, `timestamp`) VALUES
('deCarte', 'Renz', 1, 'Ice', '657c9bf54c6711.52098593.jpg', 'Shih Tzu', '3', 'cute dog', '4', '2023-12-16 02:59:21'),
('deCarte', 'Renz', 3, 'Miki', '657c9c2b3762c8.92311089.jpg', 'Aspin', '5', 'Funny dog', '15', '2023-12-16 02:59:22'),
('Renki', 'Renz', 2, 'Enzorino', '657c9c14b2dcc9.07715651.jpg', 'dikoalam', '5', 'aso ni Enz', '3', '2023-12-15 19:46:49'),
('Renki', 'Renz', 3, 'Miki', '657c9c2b3762c8.92311089.jpg', 'Aspin', '5', 'Funny dog', '15', '2023-12-15 19:46:45'),
('Renz', 'Ferrer1515', 5, 'Pepper', '657ca80bcf7585.88575588.jpg', 'Shih Tzu', '2', 'likes hats', '3', '2023-12-16 02:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblmatch`
--
CREATE TABLE `tblmatch` (
  `interestedUsername` varchar(255) NOT NULL,
  `uploaderUsername` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `tblmatch`
--
CREATE TABLE `tblmatch` (
  `interestedUsername` varchar(255) NOT NULL,
  `uploaderUsername` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table tblmatch
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
(4, 'Renki', 'Ferrer1515', 'Match Request', 'Match request with dog successfully sent!', '2023-12-15 14:08:16', 5),
(5, 'Renz', 'Ferrer1515', 'Match Request', 'Match request with dog successfully sent!', '2023-12-15 19:53:47', 5),
(6, 'deCarte', 'Ferrer1515', 'Match Request', 'Match request with dog successfully sent!', '2023-12-15 19:59:50', 5),
(7, 'Ryujin', 'Ferrer1515', 'Match Request', 'Match request with dog successfully sent!', '2023-12-15 20:00:20', 5);

-- --------------------------------------------------------

--
-- Table structure for table tblnotifications
--

CREATE TABLE `tblrejecteddogs` (
  `username` varchar(255) NOT NULL,
  `dogID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblrejecteddogs`
--

INSERT INTO `tblrejecteddogs` (`username`, `dogID`) VALUES
('Ryujin', 2);

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
-- Table structure for table tblrejecteddogs
--

CREATE TABLE tblrejecteddogs (
  username varchar(255) NOT NULL,
  dogID int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table tblrejectedusers
--

CREATE TABLE tblrejectedusers (
  username varchar(255) NOT NULL,
  RejectedUser varchar(255) NOT NULL,
  timestamp timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table tblusers
--

CREATE TABLE tblusers (
  Status varchar(10) NOT NULL,
  username varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  password varchar(100) NOT NULL,
  city varchar(100) NOT NULL,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  dogsAdopted int(11) NOT NULL DEFAULT 0,
  dogsForAdoption int(11) NOT NULL,
  Rating int(11) NOT NULL DEFAULT 0,
  uID int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table tblusers
--

INSERT INTO `tblusers` (`Status`, `username`, `img`, `password`, `city`, `fname`, `lname`, `dogsAdopted`, `dogsForAdoption`, `Rating`, `uID`) VALUES
('', 'amiel', '6579da7967cd4.jpg', '$2y$10$sZm47LoFFWC2eJ/bkCAcT.skbwBGgN1Z2RHX0IUpMwr5SXUCNhr7e', 'Caloocan', 'Amiel Carhyl', 'Lapid', 0, 1, 0, 1),
('', 'awd', '', '$2y$10$rVfvMjK0pA2W0ghxVp/CR.o6IePDOg7k.OsUQQRcrsPSJWEcZMhLy', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0, 2),
('', 'amielito', '', '$2y$10$A8mLzjRKlhgBQziU9V/Q4.xVP3Jy7F.w0vMthzfJV7qbCR2eDKf/e', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0, 3),
('', 'admin', '', '$2y$10$jkwhkebfNcCvoOlsz1EnneENR5pb4tO0kmhRFwFnUCzNQtRGVnk8a', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 7, 0, 4),
('', 'aaawd', '', '$2y$10$IdRQ6GhKYaewduYxPjdPUOZnERrnhFMq1EtM9hEXFmLpaGYQwXJla', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0, 5),
('', 'hArt06', '', '$2y$10$orprCUIzB6YcUpDh4qKRmujZCsNUUfmjNI8Rzn9iUOVXChn4vymnW', 'Caloocan', 'Nicole Heart', 'Mendoza', 0, 0, 0, 6),
('', 'Renz', '657ca56d843bc.jpg', '$2y$10$A7okzTUUynmbuv8JiuQjdOLt9OVb9E/S98NGQ7tPsTwPcpvV04Izq', 'General Trias', 'Jorenz', 'Ferrer', 0, 3, 0, 7),
('', 'amiels22', '', '$2y$10$WlIApeGlXI7EI0.cNK5Wl.F5yXabywOKVDf1hVIqLEOTMVhYaPtaC', 'Imus', 'Amiel Carhyl', 'Lapid', 0, 0, 0, 9),
('', 'juandc', '', '$2y$10$oL9k4gFU.Vr5K83PH1rhyeTWbQ0c9SWqRpFflAwP44k4Xf72I20P6', 'Manila', 'Juan', 'Dela Cruz', 0, 0, 0, 10),
('', 'darius', '', '$2y$10$VFHPrU3VddnmmpU1n.Hy1uG9RUacaBXooPcX0i.NQTUjN6aPQXvhK', 'Cavite', 'Darius', 'Gavino', 0, 0, 0, 11),
('', 'Renki', '657cacc52dbf6.jpg', '$2y$10$MdWJzBjaHqmpzAQB.TxYVe7IDOu89VMAUjJiDnXmnJEykdp8P.4Qy', 'Imus', 'Kim Caryl', 'Ragay', 0, 0, 0, 12),
('', 'Ferrer1515', '657ca5822e41e.jpg', '$2y$10$TPBm0kwgiTJFprvRVJRoC.3nU4xQX5/1H2ARx5CH5ZGiWWuVDb0oK', 'General Trias', 'Lorenzo', 'Ferrer', 0, 2, 0, 13),
('', 'deCarte', '657d12a26e725.jpg', '$2y$10$XcfqFccusu18tVRozIOTf.DtHy5.oQH1v7egvKtZdwliWUwLkwzx6', 'Trece', 'Carl Vincent', 'Verdejo', 0, 0, 0, 14),
('', 'Ryujin', '657d12bd3d9e3.png', '$2y$10$K6a1ZgioGfTcbxdnI9TNEeU5WAvCordf6eF9W.HVwh7qiFh7y3W5m', 'General Trias', 'Jose Carlos', 'Descalzo', 0, 0, 0, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table tblmatch
--
ALTER TABLE tblmatch
  ADD PRIMARY KEY (matchID),
  ADD KEY interestedUser (interestedUser),
  ADD KEY uploader (uploader),
  ADD KEY dogID (dogID);

--
-- Indexes for table `tblmatch`
--
--
-- Indexes for table `tblmatch`
--
--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`Mid`),
  ADD KEY `Fk` (`sender`(768)),
  ADD KEY `foreignKey` (`receiver`(768));

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `FK_dog_notification` (`dogID`);

--
-- Indexes for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `FK_dog_notification` (`dogID`);

--
-- Indexes for table tblnotifications
--
ALTER TABLE tblnotifications
  ADD PRIMARY KEY (notificationID);

--
-- Indexes for table tblrejecteddogs
--
ALTER TABLE tblrejecteddogs
  ADD PRIMARY KEY (username,`dogID`),
  ADD KEY FK_dog (dogID);

--
-- Indexes for table tblrejectedusers
--
ALTER TABLE tblrejectedusers
  ADD PRIMARY KEY (username,`RejectedUser`),
  ADD KEY FK_rejectedUser (RejectedUser);

--
-- Indexes for table tblusers
--
ALTER TABLE tblusers
  ADD PRIMARY KEY (uID),
  ADD UNIQUE KEY username (username);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldogs`
--
ALTER TABLE `tbldogs`
  MODIFY `dogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;

--
-- AUTO_INCREMENT for table `tblmatch`
--

--
-- AUTO_INCREMENT for table `tblmatch`
--

--
-- AUTO_INCREMENT for table tblmatch
--
ALTER TABLE tblmatch
  MODIFY matchID int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table tblfavorites
--
ALTER TABLE tblfavorites
  ADD CONSTRAINT FK_dog_favorite FOREIGN KEY (dogID) REFERENCES tbldogs (dogID),
  ADD CONSTRAINT FK_user_favorite FOREIGN KEY (ownerUser) REFERENCES tblusers (username);

--
-- Constraints for table `tblmatch`
--

--
-- Constraints for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD CONSTRAINT `FK_dog_notification` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblmatch`
--

--
-- Constraints for table `tblnotifications`
--
ALTER TABLE `tblnotifications`
  ADD CONSTRAINT `FK_dog_notification` FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblrejecteddogs`
--
ALTER TABLE tblmatch
  ADD CONSTRAINT tblmatch_ibfk_1 FOREIGN KEY (interestedUser) REFERENCES tblusers (username),
  ADD CONSTRAINT tblmatch_ibfk_2 FOREIGN KEY (uploader) REFERENCES tblusers (username),
  ADD CONSTRAINT tblmatch_ibfk_3 FOREIGN KEY (dogID) REFERENCES tbldogs (dogID);

--
-- Constraints for table tblrejecteddogs
--
ALTER TABLE tblrejecteddogs
  ADD CONSTRAINT FK_dog FOREIGN KEY (dogID) REFERENCES tbldogs (dogID),
  ADD CONSTRAINT FK_user FOREIGN KEY (username) REFERENCES tblusers (username),
  ADD CONSTRAINT tblrejecteddogs_ibfk_1 FOREIGN KEY (username) REFERENCES tblusers (username);

--
-- Constraints for table tblrejectedusers
--
ALTER TABLE tblrejectedusers
  ADD CONSTRAINT FK_rejectedUser FOREIGN KEY (RejectedUser) REFERENCES tblusers (username),
  ADD CONSTRAINT FK_user_rejectedUser FOREIGN KEY (username) REFERENCES tblusers (username);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;