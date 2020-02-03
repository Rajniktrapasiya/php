-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `userblogpost`
--

CREATE TABLE `userblogpost` (
  `postId` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `publishedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userId` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userblogpost`
--

INSERT INTO `userblogpost` (`postId`, `categoryName`, `title`, `publishedDate`, `userId`, `url`, `image`, `content`) VALUES
(1, 'Education', 'i am lerner', '2020-02-03 10:08:33', 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usercategory`
--

CREATE TABLE `usercategory` (
  `categoryId` int(11) NOT NULL,
  `categoryImage` varchar(200) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `createdDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `userId` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `meta Title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercategory`
--

INSERT INTO `usercategory` (`categoryId`, `categoryImage`, `categoryName`, `createdDate`, `userId`, `url`, `meta Title`) VALUES
(3, 'gvghv', 'hcfvfhcchg', '0000-00-00 00:00:00.000000', 4, '', ''),
(4, 'gvghv', 'hcfvfhcchg', '0000-00-00 00:00:00.000000', 8, '', ''),
(8, 'InkedUntitled_LI.jpg', 'rajnik', '2020-02-03 11:33:45.348000', 1, 'hgvhcf/https', 'education');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userId` int(11) NOT NULL,
  `prefix` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `information` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userId`, `prefix`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `information`) VALUES
(1, '', '', '', '', '9904357192', '', ''),
(2, 'Mr', '', '', '', '', '', ''),
(3, '', 'Rajnik', '', '', '', '', ''),
(4, '', '', 'Trapasiya', '', '', '', ''),
(5, '', '', '', 'trapasiyarajnik82@gmail.com', '', '', ''),
(6, '', '', '', '', '9904357192', '', ''),
(7, '', '', '', '', '', 'Tra@2399', ''),
(8, '', '', '', '', '', '', ''),
(9, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userblogpost`
--
ALTER TABLE `userblogpost`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userblogpost`
--
ALTER TABLE `userblogpost`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usercategory`
--
ALTER TABLE `usercategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userblogpost`
--
ALTER TABLE `userblogpost`
  ADD CONSTRAINT `userblogpost_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercategory`
--
ALTER TABLE `usercategory`
  ADD CONSTRAINT `usercategory_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
