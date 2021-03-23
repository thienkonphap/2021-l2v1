-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 10:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2021-l2v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `color`, `description`, `usersUid`, `usersId`) VALUES
(2, 'test 1', '2021-03-17 19:09:51', '2021-03-18 19:09:51', '#CCCCFF', 'das', 'thien', 10),
(3, 'test ben', '2021-03-18 20:52:19', '2021-03-18 21:52:19', '#00000', NULL, 'ben10', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` char(128) NOT NULL,
  `usersEmail` char(128) NOT NULL,
  `usersUid` char(128) NOT NULL,
  `usersPwd` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(7, 'thien', 'thien@gmail.com', 'thien12', '$2y$10$b1OTFhBP4ZKbCd55ngbmzuZ3yoshBhVbIpJTSYL0aPj0ZvLHv3ONm'),
(8, 'ben', 'ben@gmail.com', 'ben10', '$2y$10$6wVfjapN40FHHRX9xMqQcefgEF8seRxs9v0FqFUP8WYwLdA7O3k0C'),
(9, 'thien', 'ngocthien@gmail.com', 'asd', '$2y$10$Hy6PGv0Gd5pgswXz2Gs4muMhEs8lPvbrrXLEHu65yhAr.4VEOiPIK'),
(10, 'thien', 'thien12@gmail.com', 'thien', '$2y$10$xkQbnRTdPPTrUfSHVDz5EektsRrGURf9ADZ4p8NeEwPUl4qKrh44y'),
(11, 'asd', 'asd@gmail.com', 'asd10', '$2y$10$cPNGhXTIEfTWcPaauL.nHOz4JnwocQAO93g9CQ1Ycu8kgTK28qQ9y'),
(12, 'tony', 'tony10@gmail.com', 'tony10', '$2y$10$mAPIhuwVNjiGFfPFL81MVOtXS2zIP16daZN2K5FofiSmCfwOSWAFK'),
(13, 'tonyyyy', 'tony17@gmail.com', 'tony17', '$2y$10$6ZrJPHBFCBg62htAWgx6w.gfbLnD3BG3euWzBzm9xugygST6DkKO6'),
(14, 'tuyet ngoc', 'hanangoc123@gmail.com', 'hanangoc', '$2y$10$6.WE6hfWqCDtMiC2t7C7dO/8nW6DZm5ukcGajvi4wU1OcMvMcCSN2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usersUid` (`usersId`,`usersUid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`,`usersUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_usersUid` FOREIGN KEY (`usersId`,`usersUid`) REFERENCES `users` (`usersId`, `usersUid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
