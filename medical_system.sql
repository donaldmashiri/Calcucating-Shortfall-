-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 09:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `msustaff`
--

CREATE TABLE `msustaff` (
  `staff_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msustaff`
--

INSERT INTO `msustaff` (`staff_id`, `firstName`, `lastName`, `email`, `department`, `password`) VALUES
(1, 'Donnie', 'Angel', 'donnie@gmail.com', 'ICT Department', '5c048dc5b5cf4235c74fee48207088ad'),
(2, 'Donald', 'Mashiri', 'donald@gmail.com', 'Accounting', 'donald'),
(3, 'Michael', 'ScoreField', 'michael@gmail.com', 'Structural Engineer', 'michael');

-- --------------------------------------------------------

--
-- Table structure for table `patient_requests`
--

CREATE TABLE `patient_requests` (
  `request_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` double NOT NULL,
  `req_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `req_status1` varchar(255) NOT NULL DEFAULT 'pending',
  `amountgiven` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_requests`
--

INSERT INTO `patient_requests` (`request_id`, `staff_id`, `title`, `description`, `amount`, `req_type`, `date`, `req_status1`, `amountgiven`) VALUES
(1, 1, 'Medical purpose', 'Request for the money for a medical condition', 100, 'cash', '2022-02-28', 'approved', '120'),
(2, 2, 'Leg problem', 'hey hey my leg is painful', 220, 'Cash', '2022-03-02', 'approved', '100'),
(3, 3, 'Headache', 'My head', 90, 'Cash', '2022-03-02', 'rejected', '0');

-- --------------------------------------------------------

--
-- Table structure for table `proof_payment`
--

CREATE TABLE `proof_payment` (
  `proof_id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proof_payment`
--

INSERT INTO `proof_payment` (`proof_id`, `ref_no`, `image`, `date`) VALUES
(1, '2', 'IMG-20190913-WA0011.jpg', '2022-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msustaff`
--
ALTER TABLE `msustaff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `patient_requests`
--
ALTER TABLE `patient_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `proof_payment`
--
ALTER TABLE `proof_payment`
  ADD PRIMARY KEY (`proof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msustaff`
--
ALTER TABLE `msustaff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_requests`
--
ALTER TABLE `patient_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proof_payment`
--
ALTER TABLE `proof_payment`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
