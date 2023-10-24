-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 01:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_208`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','others') NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `login_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`, `role`, `gender`, `login_status`) VALUES
(17, 'Aliah Shane ', 'aliah@gmail.com', '$2y$10$0IM/wbhmydB/myrrFnsLye7SuEFQEyDOHeUkQSf3oBm/xluQ.RZF2', 'admin', 'male', 0),
(30, 'Chielo Elguerra', 'chielo@gmail.com', '$2y$10$6/CYC4ht8amEVKOrOguFBOfkPWt3zMYuNCzXbQttZ//6n6lXOYcde', 'admin', 'female', 0),
(34, 'James Walter', 'james@gmail.com', '$2y$10$okIDN1obYjwi6uz7EXIto.XI6xP1ffQqsw/uBo2TBt8uffsexi9dq', 'admin', 'male', 0),
(37, 'Anne Castro', 'anne@gmail.com', '$2y$10$MA5ZQwfodtFLF3CQC7jrye62X2I60DdAUhDtYX5OdR5fh/Y7X4g.q', 'user', 'female', 0),
(38, 'Jenelyn Pepito', 'jenelyn@gmail.com', '$2y$10$dfDX.Y7RCQY73kM8KmKjmOWV9TM6rw/2I29Y957AaEwZQ8pVRz2Z.', 'user', 'female', 0),
(39, 'Sheila ELguerra', 'sheila@gmail.com', '$2y$10$xKYN2tUOAXiKQ.LpG3tbauz5we49SHdCSXFBYSwvXUMmvYXJyN5yi', 'user', 'female', 0),
(40, 'Aljames Besin', 'aljane@gmail', '$2y$10$pBsS5Rvohb9suCNVMlggW.I0V55xpFuCpm8SSQrHIQtNh54ND/5RS', 'user', 'female', 0),
(41, 'Robert Cabilin', 'robert@gmail.com', '$2y$10$tsXRrqNPAM.g0ls2YenD/uesMeIAfwYqm60dBdqLAEDSd4raRa.9C', 'admin', 'male', 0),
(42, 'Christine', 'christine@gmail.com', '$2y$10$uIojyy73xRq.TTRja/B18.E/fBid79rm6v1Xo7sJo5skZM5i0VDeG', 'admin', 'female', 0),
(43, 'Badie Elguerra', 'badie@gmail.com', '$2y$10$16HGR56aQcW1Jq1JF7uAZ.oM805eAk6YV5.BNSlA1hM6Ovo8Gzg.C', 'user', 'female', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
