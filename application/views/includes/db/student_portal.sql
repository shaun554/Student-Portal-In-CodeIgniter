-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 10:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(500) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `author` varchar(200) NOT NULL,
  `slug` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `books`
--
DELIMITER $$
CREATE TRIGGER `books_data_validator` BEFORE INSERT ON `books` FOR EACH ROW IF NEW.name IS null || NEW.url IS null || NEW.subject IS null || NEW.author IS null
THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
ELSEIF NEW.name = '' || NEW.url = '' || NEW.subject = '' || NEW.author = '' THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
ELSEIF NEW.name = ' ' || NEW.url = ' ' || NEW.subject = ' ' || NEW.author = ' ' THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('admin','student','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `user_data_validator` BEFORE INSERT ON `users` FOR EACH ROW IF NEW.name IS null || NEW.email IS null || NEW.password IS null || NEW.role IS null
THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
ELSEIF NEW.name = '' || NEW.email = '' || NEW.password = '' || NEW.role = '' THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
ELSEIF NEW.name = ' ' || NEW.email = ' ' || NEW.password = ' ' || NEW.role = ' ' THEN
SIGNAL SQLSTATE '02000' SET MESSAGE_TEXT = 'Field cannot be left empty';
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
