-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 01:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_riseappsolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_logs`
--

CREATE TABLE IF NOT EXISTS `admin_user_logs` (
  `id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `admin_token` varchar(100) CHARACTER SET utf8 NOT NULL,
  `admin_date_created` datetime NOT NULL,
  `admin_date_modified` datetime NOT NULL,
  `admin_last_login` datetime NOT NULL,
  `admin_last_logout` datetime NOT NULL,
  `admin_flag` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0-offline 1-online',
  `admin_status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-disable 1-enable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL,
  `admin_firstname` varchar(100) NOT NULL,
  `admin_lastname` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_gender` tinyint(3) NOT NULL COMMENT '1-male , 2-female'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_password`, `admin_gender`) VALUES
(1, 'dfsdf', '', '', '', 1),
(2, 'John Robert', 'Jerodiaz', 'johnrobert', '$2y$10$5G.0M2ZR7h6IXCpwjbG9fOyt22qHwjZnlG7LA21gtrPKeFiZl7LEG', 1),
(3, 'john robert', 'jerodiaz', 'johnrobert', '$2y$10$TbKsd6opNyJ8vL7N/FrAo.5uP8fcq8fIhr6hAipRqQehT.6rSVwBy', 1),
(4, 'john robert', 'jerodiaz', 'johnrobert', '$2y$10$ciuI9L7StRa0RlIKP21.o.rB4ltYKzPf3y1AlRI5vrYfQVbGmrel6', 1),
(5, 'jkljkj', 'kljkljkl', 'jkljklj', '$2y$10$bT4rnXWsuyZZTJrUeJED...WyGIBmNyHXMWwjjPcxMi/Noc//0uHq', 1),
(6, 'jkljk', 'jkljkj', 'kljlkj', '$2y$10$ZE5tyw8nNM793SJmevWhjuCVXjJmj6dEggZg0kolkWLseZTA1xkc6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user_logs`
--
ALTER TABLE `admin_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user_logs`
--
ALTER TABLE `admin_user_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
