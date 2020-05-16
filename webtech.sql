-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 05:59 PM
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
(10, 'Nine', 'b', 'shokal'),
(11, 'Nine', 'c', 'shokal'),
(12, 'Nine', 'd', 'asiq'),
(15, 'Ten', 'a', ''),
(16, 'Nine', 'e', ''),
(18, 'Ten', 'b', 'humayun'),
(19, 'Nine', 'b', ''),
(21, 'Nine', 'z', ''),
(25, 'Nine', 'b', ''),
(33, 'Eleven', 'a', ''),
(34, 'Nine', 'b', ''),
(35, 'Nine', 'b', ''),
(37, 'Ten', 'a', ''),
(38, 'Eleven', 'a', ''),
(40, 'Eleven', 'a', '');

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
(5, '12345', 'Nine', 'a'),
(6, '34907', 'Nine', 'a'),
(7, '34916', 'Nine', 'a');

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
(1, '12345', 34, 34),
(12357, '34907', 0, 0),
(12358, '34916', 0, 0);

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
-- Table structure for table `ninez`
--

CREATE TABLE `ninez` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finalterm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `CourseName` varchar(20) NOT NULL,
  `CourseSection` varchar(5) NOT NULL,
  `Msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `CourseName`, `CourseSection`, `Msg`) VALUES
(1, 'nine', 'a', 'New Chapter Uploaded');

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
(1, 'Arafat', '12345'),
(2, 'Ashik', '34907'),
(3, 'Mim', '34916'),
(4, 'Rafin', '37884');

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
(7, 'Humayun Ahmed', 'Science', 'humayun'),
(8, 'Assss', 'Science', 'asdsd'),
(9, 'wqeeq', 'qweq', 'qwe'),
(10, 'Humayun Ahmed', 'Science', 'humayun'),
(11, 'Humayun Ahmed', 'Science', 'humayun'),
(12, 'Humayun Ahmed', 'Science', 'humayun'),
(13, 'Humayun Ahmed', 'Science', 'humayun');

-- --------------------------------------------------------

--
-- Table structure for table `tena`
--

CREATE TABLE `tena` (
  `id` int(11) NOT NULL,
  `studentId` varchar(20) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finalterm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 'asiq', 'tea', 'teacher', 1),
(6, '12345', 'stu', 'student', 1),
(7, 'rafin', 'tea', 'teacher', 1),
(8, 'sadmin', 'sadmin', 'superAdmin', 1),
(10, 'admin', 'admin', 'admin', 1),
(13, 'admin2', 'admin', 'admin', 1),
(14, '34907', 'stu', 'student', 1),
(15, '34916', 'stu', 'student', 1),
(38, 'humayuna', 'tea', 'admin', 1);

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
-- Indexes for table `ninez`
--
ALTER TABLE `ninez`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
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
-- Indexes for table `tena`
--
ALTER TABLE `tena`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `courseregistered`
--
ALTER TABLE `courseregistered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ninea`
--
ALTER TABLE `ninea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12359;

--
-- AUTO_INCREMENT for table `nineb`
--
ALTER TABLE `nineb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
