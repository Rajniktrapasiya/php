-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 06:56 PM
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
-- Database: `vehicleservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_registrations`
--

CREATE TABLE `service_registrations` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `vehicleNumber` varchar(20) NOT NULL,
  `userLicenceNumber` varchar(50) NOT NULL,
  `Date` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `timeSlot` varchar(20) NOT NULL,
  `VehicleIssue` text NOT NULL,
  `center` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_registrations`
--

INSERT INTO `service_registrations` (`service_id`, `user_id`, `title`, `vehicleNumber`, `userLicenceNumber`, `Date`, `timeSlot`, `VehicleIssue`, `center`, `status`, `created_At`) VALUES
(4, 1, 'rajnik', '56464', 'Dfd45221', '2020-02-14', '9-10', 'sdds', 'Ahemdabad', 'accept', '2020-02-21 11:09:10'),
(5, 1, 'rajnik', '56464', 'Dfd45221', '0046-12-08', '9-10', 'dfdf', 'Ahemdabad', 'accept', '2020-02-21 11:11:50'),
(6, 1, 'Tirth', '56464', 'Dfd45221', '2020-02-09', '9-10', 'Ghghgh', 'Rajkot', 'accept', '2020-02-21 11:25:12'),
(7, 1, 'kirtan', '56464', 'Dfd45221', '2020-02-09', '11-12', 'fgafg', 'Vadodara', 'accept', '2020-02-21 11:27:00'),
(9, 1, 'try', 'fjgghfg', 'tfgjfhft', '2020-02-09', '9-10', 'ghjjghn', 'kjkjk', 'accept', '2020-02-21 11:41:43'),
(10, 1, 'rajnik', '56464', 'Dfd45221', '2020-02-09', '9-10', 'fghj', 'Ahemdabad', 'accept', '2020-02-21 11:54:56'),
(12, 1, 'rajnik', '56464', 'Dfd45221', '0000-00-00', '9-10', 'fgfgf', 'Ahemdabad', 'Pending', '2020-02-21 13:24:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_registrations`
--
ALTER TABLE `service_registrations`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registrations`
--
ALTER TABLE `service_registrations`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_registrations`
--
ALTER TABLE `service_registrations`
  ADD CONSTRAINT `service_registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
