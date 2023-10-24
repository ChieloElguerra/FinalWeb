-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 06:29 AM
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `ootd` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `date`, `time`, `location`, `ootd`, `created_at`, `userID`) VALUES
(97, 'Elguerra Villegas Perpetua', '2023-11-01', '00:14:00', 'sdgfsg', 'sgfgs', '2023-10-24 04:14:05', 55),
(98, 'asdcsfd adfcadfdsfsd', '2023-10-07', '12:24:00', 'fdafad', 'fdfdaf', '2023-10-24 04:20:10', 73);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementID` int(11) NOT NULL,
  `announcementContent` text DEFAULT NULL,
  `announcementDate` date DEFAULT NULL,
  `announcementStatus` enum('important','not_important') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementID`, `announcementContent`, `announcementDate`, `announcementStatus`) VALUES
(1, 'usc days', '2023-10-28', 'important'),
(3, 'instrams', '2023-10-28', 'important'),
(5, 'Mamauli Nataaa', '2023-10-28', 'important'),
(6, 'Holidaytyy', '2024-02-08', 'important');

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
(54, 'Sheila Elguerra Villegas adfsdfds', 'sheila@gmail.com', '$2y$10$MaFc8vkT5ZM61sTgzRDIf.T1Il1kFhf2ij3sTNFg8ba1q4pMXYeCO', 'user', 'male', 1),
(55, 'Badie Elguerra', 'badie@gmail.com', '$2y$10$rKFia4vC7cuqALGE32jfnOlZYIBDpBPIGfuZoJcesyTb0L5hNKnVq', 'user', 'female', 1),
(59, 'Renelie Arcilla', 'renelie@gmail.com', '$2y$10$RS9v1sZhH5NH6Bs5HuCDQuyP7KavWLw3Lea11JrFVJj14Oc8zf3vi', 'admin', 'female', 0),
(61, 'Catherine Vidas', 'cath@gmail.com', '$2y$10$s4T8O/nJY0QxFXVjroejUu2E1H34oRj1KVwUuWWuPIA2sXCxs2M0e', 'user', 'male', 1),
(67, 'Chielo Elguerra', 'chielo@gmail.com', '$2y$10$Y2nh6Ilz56FXNl1toktrdetkaLi8t/uH7zAs3ZX0PySnwyEjclELi', 'admin', 'female', 1),
(72, 'testreg', 'testreg@gmail.com', '$2y$10$bx.fSq6IhmSYkiYokzI0hObp9ZP/TOOSnK9wV1iqR/vW9eNNiVfN2', 'admin', 'male', 1),
(74, 'Makapasar', 'makapasar@gmail.com', '$2y$10$RFmy2gQ.0bWKzMwzorfGu.Dm28p6zrgKwnI4fuH5SUN33Xdb6x5Z6', 'user', 'female', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementID`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
