-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2013 at 02:35 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kofc`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `description` text NOT NULL,
  `image_path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `datetime_created`, `start_datetime`, `end_datetime`, `description`, `image_path`) VALUES
(1, 'Cancer Marathon', '2013-05-02 23:58:53', '2013-05-22 08:34:20', '2013-05-02 06:14:31', 'A cancer marathon to raise funds for the fight against cancer', NULL),
(2, 'Abortion Protest', '2013-05-02 23:58:53', '2013-05-23 07:34:41', '2013-05-31 10:30:39', 'A rally to protest against child abortion in hospitals', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `date_joined` date NOT NULL,
  `rank` text NOT NULL,
  `description` text,
  `date_of_birth` date NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `date_joined`, `rank`, `description`, `date_of_birth`, `priority`) VALUES
(1, 'Jude', 'Fernandez', '2013-05-02', 'Trustee (1st Year)', 'Newly added member', '1990-06-16', 15),
(2, 'Calvin', 'Au', '2013-05-02', 'Trustee (2nd Year)', 'Second year Trustee', '1990-05-26', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`, `datetime_created`) VALUES
(1, 'Jude', 'Fernandez', 'jcf1990', '9a618248b64db62d15b300a07b00580b', '2013-05-03 00:29:01'),
(2, 'Calvin', 'Au', 'ccau', '9a618248b64db62d15b300a07b00580b', '2013-05-03 00:29:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
