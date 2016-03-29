-- phpMyAdmin SQL Dump
-- version 4.6.0-alpha1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2016 at 07:16 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 7.0.4-7+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newawe`
--

-- --------------------------------------------------------

--
-- Table structure for table `nw_followers`
--

CREATE TABLE `nw_followers` (
  `row_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nw_images`
--

CREATE TABLE `nw_images` (
  `row_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` varchar(64) NOT NULL,
  `isFavicon` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nw_projects`
--

CREATE TABLE `nw_projects` (
  `row_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` varchar(64) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nw_users`
--

CREATE TABLE `nw_users` (
  `row_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nw_followers`
--
ALTER TABLE `nw_followers`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `nw_projects`
--
ALTER TABLE `nw_projects`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `nw_users`
--
ALTER TABLE `nw_users`
  ADD PRIMARY KEY (`row_id`),
  ADD UNIQUE KEY `user` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nw_followers`
--
ALTER TABLE `nw_followers`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nw_projects`
--
ALTER TABLE `nw_projects`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nw_users`
--
ALTER TABLE `nw_users`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
