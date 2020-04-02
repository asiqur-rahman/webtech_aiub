-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 09:06 AM
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
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `teacherId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `Name`, `Section`, `teacherId`) VALUES
(9, 'Nine', 'a', 'asiq'),
(10, 'Nine', 'b', ''),
(11, 'Nine', 'c', ''),
(12, 'Nine', 'd', ''),
(15, 'Ten', 'a', ''),
(16, 'Nine', 'e', ''),
(17, 'Eleven', 'a', ''),
(18, 'Ten', 'b', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistered`
--

CREATE TABLE `courseregistered` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(20) NOT NULL,
  `courseName` varchar(20) NOT NULL,
  `courseSection` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseregistered`
--

INSERT INTO `courseregistered` (`id`, `StudentId`, `courseName`, `courseSection`) VALUES
(1, '12345', 'Nine', 'a'),
(2, '12345', 'Nine', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `elevena`
--

CREATE TABLE `elevena` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finalterm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ninea`
--

CREATE TABLE `ninea` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(20) NOT NULL,
  `midterm` int(3) NOT NULL,
  `finalterm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ninea`
--

INSERT INTO `ninea` (`id`, `StudentId`, `midterm`, `finalterm`) VALUES
(1, '12345', 50, 70),
(12353, '12345', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nineb`
--

CREATE TABLE `nineb` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(20) NOT NULL,
  `midterm` int(11) NOT NULL,
  `finalterm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ninee`
--

CREATE TABLE `ninee` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finalterm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ninee`
--

INSERT INTO `ninee` (`id`, `studentId`, `midterm`, `finalterm`) VALUES
(0, '12345', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `StudentId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Name`, `StudentId`) VALUES
(1, 'Arafat', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `teacherId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `Name`, `Department`, `teacherId`) VALUES
(1, 'Md. Asiqur Rahman kh', 'Science', 'asiq'),
(2, 'Shokal Ahmed', 'Mathmatics', 'shokal'),
(3, 'Alif Rifat Mim', 'English', 'alif'),
(4, 'Rafin Maidul Islam', 'Accounting', 'rafin'),
(7, 'Humayun Ahmed', 'Science', 'humayun');

-- --------------------------------------------------------

--
-- Table structure for table `tenb`
--

CREATE TABLE `tenb` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finalterm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `permission`) VALUES
(1, 'Ashik', 'ashik', 'admin', 1),
(5, 'asiq', 'tea', 'teacher', 0),
(6, '12345', 'stu', 'student', 0),
(7, 'rafin', 'tea', 'teacher', 1),
(8, 'admin', 'admin', 'superAdmin', 1),
(10, 'admin', 'admin', 'admin', 1),
(11, 'humayun', 'tea', 'teacher', 1),
(12, 'humayun', 'tea', 'teacher', 1),
(13, 'admin2', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseregistered`
--
ALTER TABLE `courseregistered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elevena`
--
ALTER TABLE `elevena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ninea`
--
ALTER TABLE `ninea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nineb`
--
ALTER TABLE `nineb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ninee`
--
ALTER TABLE `ninee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenb`
--
ALTER TABLE `tenb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `courseregistered`
--
ALTER TABLE `courseregistered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ninea`
--
ALTER TABLE `ninea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12354;

--
-- AUTO_INCREMENT for table `nineb`
--
ALTER TABLE `nineb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
