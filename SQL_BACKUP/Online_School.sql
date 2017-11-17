-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 06:54 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Online_School`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(255) NOT NULL,
  `catagory_title` varchar(255) NOT NULL,
  `catagory_slug` varchar(255) NOT NULL,
  `catagory_status` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `catagory_title`, `catagory_slug`, `catagory_status`, `email`) VALUES
(1510508205, 'English', 'English First Paper', 'Active', 'kopika@gmail.com'),
(1510508264, 'Math', 'Math', 'Active', 'kopika@gmail.com'),
(1510510283, 'Bangla ', 'Bangla', 'Active', 'kopika@gmail.com'),
(1510510411, 'Social Science', 'Social Science First Semister', 'Active', 'tamim@gmail.com'),
(1510644433, 'Highermathematics', 'Highermathematics', 'Active', 'kopika@gmail.com'),
(1510730302, 'Riligion', 'Riligion', 'Active', 'kopika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_author` varchar(255) NOT NULL,
  `content_catagory` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `content_status` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content_title`, `content_author`, `content_catagory`, `video`, `post`, `content_status`, `email`) VALUES
(1510684108, 'Mininios', 'Kopika', 'English', 'Video/1510684108.mp4', 'This is Minion', 'Active', 'kopika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `birth_date`, `gender`, `phone`, `profile`) VALUES
(1, 'test', 'test', 'test@gmail.com', '12345', 'Active', '', '', '', ''),
(1510211362, 'Shakil', 'Ahmmed', 'shakil@gmail.com', 'MTIzNDU=', 'Active', '', '', '', ''),
(1510338717, 'Tamim', 'Ahmmed', 'tamim@gmail.com', 'MTIzNDU2', 'Active', '22/12/1998', 'Male', '01865801556', 'images/Profile/tamim@gmail.com.png'),
(1510338837, 'Kopika', 'Todos Caro', 'kopika@gmail.com', 'Mjg1MTc3', 'Active', '2017-03-09', 'Male', '<h1>Poor Validation</h1>', 'images/Profile/kopika@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1510730303;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1510684109;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1510338838;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
