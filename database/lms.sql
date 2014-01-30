-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 08:12 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` varchar(20) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publications` varchar(50) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `price` double(10,3) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author`, `publications`, `edition`, `price`) VALUES
('4', 'c in depth', ' balaguru', 'TMH', '5th', 250.630);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `description` char(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `description`) VALUES
(1, 'N-user', 'this is normal user'),
(2, 'Admin', 'this is admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `emp_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `designation` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`emp_id`, `firstname`, `lastname`, `password`, `email`, `is_active`, `designation`) VALUES
(2, 'ashok', 'yadav', '1234', 'ashok.yadav@tradus.com', 1, 'employee'),
(101, 'prem', 'narayan', '77', 'prem.narayan@gmail.com', 1, 'employee'),
(1176, 'san', 'kumar', '0', 'kdgupta.1988@gmail.com', 0, 'employee'),
(1183, 'kuldeep', 'gupta', '12345', 'singh.ashishkumar359@gmail.com', 1, 'employee'),
(1189, 'jkjk', 'jk', 'password', 'gghg@gmail.com', 1, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  KEY `fk_emp_id` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `emp_id`, `role_id`) VALUES
(10, 2, 1),
(11, 101, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `fk_emp_id` FOREIGN KEY (`emp_id`) REFERENCES `users` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `users` (`emp_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
