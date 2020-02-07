-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 03:05 PM
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
(2, 'LifeStyle', 'hi all is fine', 'https//LifeStyle.ac.in', 'Life', 2, 'live.jpg', '2020-02-05 12:33:07'),
(6, 'Goverment', 'Government', 'https//gov.ac.in', 'Government', 6, 'gov.png', '2020-02-06 04:39:26'),
(7, 'Love', 'About Love', 'www.love.in', 'LOVE', 2, 'love.png', '2020-02-05 18:07:18'),
(9, 'Scolarship', 'government Scolarship', 'htttp//digitalGujrat.com', 'Scolarship', 6, 'gov.png', '2020-02-06 12:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `PostId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`PostId`, `CategoryId`, `post_category_id`) VALUES
(25, 6, 22),
(25, 9, 23),
(26, 2, 24),
(26, 7, 25),
(27, 2, 37),
(27, 7, 38),
(27, 9, 39);

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
(4, 'LifeStyle_Goverment', 'Book', '2020-01-05', 12, 'https.//fh.co.in', 'book.jpg', 'Life is Not Simple.'),
(5, 'LifeStyle_Goverment', 'plpl', '1212-02-01', 12, 'https.//fh.co.in', '', 'Living Category'),
(19, '2_7', 'Life About', '2020-02-01', 14, 'https//freelancer.com', '', 'Life is Not Simple.'),
(20, 'LifeStyle', 'Rajnik', '2020-03-02', 15, 'https.//start-up.co.in', 'love.png', 'trapasiya'),
(22, 'Goverment_Scolarship', 'Living', '1212-01-02', 17, 'hgvhcf/https', 'live.jpg', 'edu cation dep'),
(23, 'Goverment_Scolarship', 'Life About', '1212-01-02', 14, 'https//freelancer.com', 'live.jpg', 'Life is Not Simple.'),
(25, '6_9', 'Book', '2020-02-01', 14, 'https//freelancer.com', '', 'Life is Not Simple.'),
(26, '2_7', 'print', '1212-01-02', 14, 'https//freelancer.com', 'live.jpg', 'Free lancing'),
(27, '2_7_9', 'Living', '1212-02-01', 18, 'https//www.freelancer.com', '', 'Life is Not Simple.');

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
(9, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', 'hi'),
(10, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', 'hi'),
(11, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '9904357192', 'Tra@2399', ''),
(12, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '2312121212', 'Tra@2399', 'hi my name is rajnik'),
(14, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik82@gmail.com', '2563256325', 'Tra@2399', 'hi my name is nikunj patel'),
(15, 'Mr', 'Rohit', 'ranpariya', 'ppp@gmail.com', '3232323232', 'Tra@2399', 'Rohit'),
(16, 'Mr', 'Rajnik', 'Trapasiya', 'qaqa@gmail.com', '1231234512', 'Tra@2399', 'hi my name is nikunj patel'),
(17, 'Mr', 'Rajnik', 'Trapasiya', 'trapasiyarajnik123@gmail.com', '2020201232', 'Tra@2399', ''),
(18, 'Mr', 'mihir', 'shah', 'amit@gmail.com', '2312123211', 'Tra@2399', 'amit shah');

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
  ADD PRIMARY KEY (`post_category_id`),
  ADD KEY `post_category_ibfk_1` (`PostId`),
  ADD KEY `post_category_ibfk_2` (`CategoryId`);

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
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `userblogpost`
--
ALTER TABLE `userblogpost`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `userblogpost` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`CategoryId`) REFERENCES `categorytable` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userblogpost`
--
ALTER TABLE `userblogpost`
  ADD CONSTRAINT `userblogpost_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
