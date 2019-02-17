-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 05:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appraisal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvsandcerts`
--

CREATE TABLE `cvsandcerts` (
  `id` int(2) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cv` text NOT NULL,
  `cert` text NOT NULL,
  `cert_name` text NOT NULL,
  `uploaded` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{\r\n\"admin\": 1,\r\n\"moderator\": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(2) NOT NULL,
  `username` varchar(60) NOT NULL,
  `staff_id` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL,
  `letter` text NOT NULL,
  `promoted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `salt` varchar(32) NOT NULL,
  `title` varchar(30) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `sog` varchar(25) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `department` varchar(35) NOT NULL,
  `image` text NOT NULL,
  `bio` varchar(100) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `salt`, `title`, `firstname`, `lastname`, `email`, `phone`, `sog`, `street`, `city`, `state`, `level`, `dob`, `department`, `image`, `bio`, `joined`, `group`) VALUES
(2, 'Admin ', 'c1527e9debe309254fe136908d59292e94eab27fea61a21e5b81090de86c1bc7', '­2×ôøŒœùæóà¾Š´·ØB8B!\'zÓLë8½d', '', 'Arowolo', 'Dada', '', ' 08171716532', '', '', '', '', '13', '', 'l Unit', '', '', '2018-12-31 11:02:31', 2),
(39, 'adesanyafolorunso1@gmail.com', '80a117f24d12db3df1947def46247d0a1584485a1f89a3ad2ffd7e804659a4d0', '>-‹¾@{4JJuDP·“†2añŽy¤Å,îK~x”Øf', 'Mr.', 'Adesanya', 'Folorunso', 'adesanyafolorunso1@gmail.com', '08171716532', 'Ogun', '9, Sanyaolu street, Ibara G.R.A', 'Abeokuta', 'Lagos', '', '2999-01-01', 'Software Development', 'staffpic/FB_IMG_1528537734074.jpg', 'Its More than code.. its creativity.', '2019-02-15 16:59:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(4, 3, '9761d520d6a5e3d30131fd779258de5002b102b40ef6cadacf66f18bbe3b9c6d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvsandcerts`
--
ALTER TABLE `cvsandcerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvsandcerts`
--
ALTER TABLE `cvsandcerts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
