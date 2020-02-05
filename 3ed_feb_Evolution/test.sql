-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 09:49 AM
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
-- Table structure for table `categorytable`
--

CREATE TABLE `categorytable` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryContent` varchar(200) NOT NULL,
  `categoryUrl` varchar(200) NOT NULL,
  `categoryMetaTitle` varchar(200) NOT NULL,
  `parentCategory` int(11) DEFAULT NULL,
  `categoryImage` varchar(200) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytable`
--

INSERT INTO `categorytable` (`categoryId`, `categoryName`, `categoryContent`, `categoryUrl`, `categoryMetaTitle`, `parentCategory`, `categoryImage`, `createdDate`) VALUES
(2, 'LifeStyle', 'lifestyle', 'http//www.Lifestyle.com', 'life', NULL, 'life.jpeg', '2020-02-04 12:05:00'),
(3, 'Freelancer', 'freelancer', 'htttp//feelancer.com', 'freelancer', 2, 'InkedUntitled_LI.jpg', '2020-02-04 12:05:00'),
(4, 'Scolarship', 'scolarship', 'htpps//gvhv', 'Scolarship', 3, 'InkedUntitled_LI.jpg', '2020-02-04 12:05:00'),
(6, 'Goverment', 'Government', 'https//gov.ac.in', 'Government', 2, 'gov.png', '2020-02-04 12:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `PostId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userblogpost`
--

CREATE TABLE `userblogpost` (
  `postId` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `publishedDate` date NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userblogpost`
--

INSERT INTO `userblogpost` (`postId`, `categoryName`, `title`, `publishedDate`, `userId`, `url`, `image`, `content`) VALUES
(2, 'LifeStyle_Scolarship', 'Life', '0000-00-00', 4, 'https.//fh.co.in', 'InkedUntitled_LI.jpg', 'edu cation dep'),
(3, 'Freelancer_Scolarship_Goverment', 'Life About', '0000-00-00', 12, 'https//freelancer.com', '', 'Life is Not Simple.'),
(4, 'LifeStyle_Scolarship', 'Book', '0000-00-00', 12, 'https//freelancer.com', 'book.jpg', 'Book is our true friend'),
(5, 'LifeStyle', 'Living', '1212-02-01', 12, 'https.//fh.co.in', 'live.jpg', 'Living Category');

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
(9, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', 'hi'),
(10, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', 'hi'),
(11, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', ''),
(12, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '2312121212', 'Tra@2399', 'hi my name is rajnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorytable`
--
ALTER TABLE `categorytable`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD KEY `PostId` (`PostId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `userblogpost`
--
ALTER TABLE `userblogpost`
  ADD PRIMARY KEY (`postId`),
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
-- AUTO_INCREMENT for table `categorytable`
--
ALTER TABLE `categorytable`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userblogpost`
--
ALTER TABLE `userblogpost`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `userblogpost` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `usercategory` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userblogpost`
--
ALTER TABLE `userblogpost`
  ADD CONSTRAINT `userblogpost_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
