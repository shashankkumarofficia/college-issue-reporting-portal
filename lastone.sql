-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 28, 2022 at 10:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` bigint(100) NOT NULL,
  `Aname` varchar(255) NOT NULL,
  `A_Email` varchar(255) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aname`, `A_Email`, `Password`) VALUES
(1, 'shashank kumar ', 's@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` bigint(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `phone`, `email`, `message`) VALUES
(1, 'shashank', 8978945, 'shashanK@gmail.com', 'asfasfas');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Fid` int(100) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `F_email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Fid`, `Fname`, `Branch`, `F_email`, `Password`) VALUES
(16, 'Pavithra T S', 'MCA', 'p@gmail.com', '123'),
(17, 'Subramanya', 'MBA', 'su@gmail.com', '123'),
(18, 'Manjunath m', 'Computer Science', 'manj@gmail.com', '123'),
(19, 'Pradeep ', 'Civil Engineering', 'pra@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` varchar(900) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `studentid` bigint(100) NOT NULL,
  `postoption` varchar(100) NOT NULL DEFAULT 'public',
  `done` varchar(30) NOT NULL DEFAULT 'notdone'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `date`, `studentid`, `postoption`, `done`) VALUES
(23, 'I need to post an issue regarding to the placement officer\r\nwho is not co-operating with us about placements ', '2022-09-28 08:10:33', 109, 'Public', 'notdone'),
(24, 'posting to admin sorry about placement issue', '2022-09-28 08:11:11', 109, 'ToAdmin', 'Solvedp'),
(25, 'an anonymous hahahah', '2022-09-28 08:11:35', 109, 'Anonymous', 'notdone'),
(26, 'I have an issue about the dogs in the canteen please clear it as soon as possible', '2022-09-28 08:12:40', 112, 'Public', 'notdone'),
(27, 'i am afraid of bus driver whose bus no is 09-- he is too arrogant  ', '2022-09-28 08:13:50', 112, 'Anonymous', 'notdone'),
(28, 'Sir am 1st MCA please go through the placements which not happing to us ', '2022-09-28 08:15:03', 112, 'ToAdmin', 'notdone'),
(29, 'I have issue about hostel faculty who does give food on time', '2022-09-28 08:16:07', 111, 'Public', 'notdone'),
(30, 'we have to celebrate our college fest grandly so please we need every one support join us', '2022-09-28 08:19:53', 113, 'Public', 'notdone'),
(31, 'some students rag the juniors in the bus stop please take an action on them.', '2022-09-28 08:21:49', 113, 'ToAdmin', 'notdone');

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`user_id`, `post_id`, `rating_action`) VALUES
(109, 23, 'like'),
(109, 25, 'like'),
(111, 26, 'like'),
(112, 23, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sid` bigint(100) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` bigint(50) NOT NULL,
  `Batch` varchar(200) DEFAULT NULL,
  `Branch` int(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Sid`, `Name`, `Email`, `Phone`, `Batch`, `Branch`, `Password`, `status`) VALUES
(109, 'shashank kumar', 's@gmail.com', 7894561235, '4mh21mc042', 16, '123', 'approved'),
(110, 'chandu', 'c@gmail.com', 1234567895, '4mh21mc009', 16, '123', 'pending'),
(111, 'renuka', 'r@gmail.com', 9638527415, '4mh21mc039', 16, '123', 'approved'),
(112, 'shilpa', 'sh@gmail.com', 8529637415, '4mh21mc045', 17, '123', 'approved'),
(113, 'nithish', 'n@gmail.com', 7891234565, '4mh21mb035', 17, '123', 'approved'),
(114, 'karthick', 'k@gmail.com', 8523697895, '4mh21mb023', 17, '123', 'pending'),
(115, 'shankar', 'sha@gmail.com', 1237899635, '4mh21mc046', 18, '123', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`post_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sid`),
  ADD KEY `Branch` (`Branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Sid` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`Sid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Branch`) REFERENCES `faculty` (`Fid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
