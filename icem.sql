-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 06:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icem`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventId` int(255) NOT NULL,
  `EventName` varchar(256) NOT NULL,
  `EventDept` varchar(256) NOT NULL,
  `EventIncharge` varchar(256) NOT NULL,
  `EventMail` varchar(256) DEFAULT NULL,
  `EventDate` date DEFAULT NULL,
  `EventMobile` int(10) DEFAULT NULL,
  `EventType` varchar(256) DEFAULT NULL,
  `EventSize` int(4) DEFAULT NULL,
  `EventDetails` varchar(256) DEFAULT NULL,
  `EventPlace` varchar(256) DEFAULT NULL,
  `EventImage` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventId`, `EventName`, `EventDept`, `EventIncharge`, `EventMail`, `EventDate`, `EventMobile`, `EventType`, `EventSize`, `EventDetails`, `EventPlace`, `EventImage`) VALUES
(65, 'petrichor', 'petrichor', 'petrichor', '', '2023-11-12', 0, 'Technical Event', 0, '', ' ', 'bg.jpg'),
(66, 'zest1', 'zest', 'zest', '', '2023-12-14', 0, 'Non-Technical Event', 0, '', ' ', 'prem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `EventImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`EventImage`) VALUES
('489641.jpg'),
('Messi-&-Ronaldo.jpg'),
('Messi-&-Ronaldo.jpg'),
('cristiano-ronaldo-lionel-messi.jpg'),
('489641.jpg'),
(''),
(''),
(''),
(''),
(''),
('lokeshbalasubramaniam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `Part_Id` int(20) NOT NULL,
  `partname` char(255) NOT NULL,
  `partdeptno` varchar(7) NOT NULL,
  `partdept` char(40) NOT NULL,
  `partmailid` varchar(40) NOT NULL,
  `partmobileno` int(10) NOT NULL,
  `partpassword` varchar(20) NOT NULL,
  `partcpassword` varchar(20) NOT NULL,
  `IDimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`Part_Id`, `partname`, `partdeptno`, `partdept`, `partmailid`, `partmobileno`, `partpassword`, `partcpassword`, `IDimage`) VALUES
(1, 'peter', '23mx213', 'MCA', '23mx213@psgtech.ac.in', 2147483647, 'iii', 'iii', 'bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventId`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`Part_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `Part_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
