-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:20 AM
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
('Ferrer1515', 689, 'Ice', 'Shih Tzu', '3 years', 'likes treats', '4', '657aaaebd6d877.16696003.jpg'),
('Ferrer1515', 690, 'Miki', 'Aspin', '2 years', 'dog', '5', '657aab0822a4c4.96275313.jpg'),
('Ferrer1515', 691, 'Goldy', 'Golden Retriever', '5 years', 'big boi', '15', '657aab2eaa5893.11095398.jpg'),
('Renz', 692, 'Blackie', 'dikoalam', '1 year', 'black dog', '3', '657aab62d55ef3.88536328.jpg'),
('Renz', 693, 'Enzorino', 'anon', '3 months', 'Too ez for enz', '2', '657aaba0d43874.85712974.jpg'),
('Renz', 694, 'Copy', 'Domestic shorthair', '1', 'not a dog', '2', '657ac5cfb1b4d0.67949714.jpg');

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
('Renz', 'Ferrer1515', 689, 'Ice', '657aaaebd6d877.16696003.jpg', 'Shih Tzu', '3 years', 'likes treats', '4', '2023-12-14 08:58:20'),
('Renz', 'Ferrer1515', 690, 'Miki', '657aab0822a4c4.96275313.jpg', 'Aspin', '2 years', 'dog', '5', '2023-12-14 08:58:42'),
('Renz', 'Ferrer1515', 691, 'Goldy', '657aab2eaa5893.11095398.jpg', 'Golden Retriever', '5 years', 'big boi', '15', '2023-12-14 08:58:25');

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

-- --------------------------------------------------------

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
  `Rating` int(11) NOT NULL DEFAULT 0,
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

-- Table structure for notifications
CREATE TABLE `tblnotifications` (
  `notificationID` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




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
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `Mid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--


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

--
-- Constraints for table `tblrejectedusers`
--
ALTER TABLE `tblrejectedusers`
  ADD CONSTRAINT `FK_rejectedUser` FOREIGN KEY (`RejectedUser`) REFERENCES `tblusers` (`username`),
  ADD CONSTRAINT `FK_user_rejectedUser` FOREIGN KEY (`username`) REFERENCES `tblusers` (`username`);
COMMIT;

CREATE TABLE `tblMatch` (
  `matchID` INT NOT NULL AUTO_INCREMENT,
  `interestedUser` VARCHAR(255) NOT NULL,
  `uploader` VARCHAR(255) NOT NULL,
  `dogID` INT(100) NOT NULL,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`matchID`),
  FOREIGN KEY (`interestedUser`) REFERENCES `tblusers` (`username`),
  FOREIGN KEY (`uploader`) REFERENCES `tblusers` (`username`),
  FOREIGN KEY (`dogID`) REFERENCES `tbldogs` (`dogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
