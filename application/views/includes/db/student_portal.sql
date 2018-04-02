-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 08:37 PM
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
  `slug` varchar(500) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `url`, `subject`, `author`, `slug`, `tag`, `added_by`) VALUES
(1, 'Ajax For Dummies', 'https://hmt.es/Ajax%20For%20Dummies.pdf', 'AJAX', 'Steven Holzner', '', '#web#', 1),
(2, 'Software Engineering', 'https://google.com', 'Software Engineering', 'Alex Banks, Eve Porcello', '', 'Theory#UML', 2),
(3, '.NET Book Zero', 'http://google.com', '.NET', 'NA', '', 'Web#Microsoft', 1),
(4, 'Learning Python', 'http://google.com', 'Python', ' David Ascher and Mark Lutz', '', '', 1),
(5, 'Data Communications and Networking', 'http://library.aceondo.net/ebooks/Computer_Science/Data_Communication_and_Networking_by_Behrouz.A.Forouzan_4th.edition.pdf', 'Data Communications and Networking', 'Behrouz A. Forouzan', '', 'Networking#Theory', 1),
(6, 'Learning React: Functional Web Development with React and Redux', 'http://shop.oreilly.com/product/0636920049579.do', 'React Js', ' Alex Banks, Eve Porcello', '', 'Web', 2),
(7, 'Android Application Development for Dummies', 'https://books.google.co.in/books/about/Android_App_Development_For_Dummies.html?id=UjqkBgAAQBAJ&printsec=frontcover&source=kp_read_button&redir_esc=y#v=onepage&q&f=false', 'Android', 'Donn Felker', '', 'Android', 2),
(8, 'Learning Vue.js 2', 'https://books.google.co.in/books/about/Learning_Vue_js_2.html?id=nszcDgAAQBAJ&printsec=frontcover&source=kp_read_button&redir_esc=y#v=onepage&q&f=false', 'Web Development', 'Olga Filipova', '', 'Web', 2);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'jayashankar.jayan@gmail.com', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'admin'),
(2, 'Jayashankar', 'teacher@gmail.com', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'teacher'),
(3, 'Student', 'jayashankar.jayan@gmail.com', 'fe045f7c7a36e347c1723f52e02e077bc92f67ca', 'student');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
