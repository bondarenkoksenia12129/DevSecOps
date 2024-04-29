-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2012 at 12:48 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `huts`
--

-- --------------------------------------------------------

--
-- Table structure for table `hut`
--

CREATE TABLE IF NOT EXISTS `hut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  `state` enum('in production','for sale','sold') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hut`
--

INSERT INTO `hut` (`id`, `name`, `description`, `price`, `state`) VALUES
(8, 'namelis', 'asdf asdfasdf', 10, 'in production'),
(9, 'kitas', 'bbb ddddd', 30, 'for sale'),
(10, 'test', 'sdf xvxcvxcv', 50, 'sold');

-- --------------------------------------------------------

--
-- Table structure for table `hut_worker`
--

CREATE TABLE IF NOT EXISTS `hut_worker` (
  `hut_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  PRIMARY KEY (`hut_id`,`worker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hut_worker`
--

INSERT INTO `hut_worker` (`hut_id`, `worker_id`) VALUES
(8, 1),
(8, 14),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(10, 11),
(10, 12),
(10, 14),
(10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `name`) VALUES
(1, 'chimpanzee1'),
(2, 'chimpanzee2'),
(3, 'chimpanzee3'),
(4, 'chimpanzee4'),
(5, 'chimpanzee5'),
(6, 'chimpanzee6'),
(7, 'chimpanzee7'),
(8, 'chimpanzee8'),
(9, 'chimpanzee9'),
(10, 'chimpanzee10'),
(11, 'chimpanzee11'),
(12, 'chimpanzee12'),
(13, 'chimpanzee13'),
(14, 'gorilla1'),
(15, 'gorilla2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hut_worker`
--
ALTER TABLE `hut_worker`
  ADD CONSTRAINT `hut_worker_ibfk_1` FOREIGN KEY (`hut_id`) REFERENCES `hut` (`id`) ON DELETE CASCADE;
