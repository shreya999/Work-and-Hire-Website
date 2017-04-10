-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2014 at 05:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `worknhire`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `project_id` varchar(250) NOT NULL,
  `hire_name` varchar(50) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_desc` varchar(2000) NOT NULL,
  `project_cat` int(1) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `budget` int(9) NOT NULL,
  `submit` int(255) NOT NULL,
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `index` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `psd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(60) NOT NULL,
  PRIMARY KEY (`index`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `image_id` int(255) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(25) NOT NULL,
  `image` longblob NOT NULL,
  `image_size` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `project_id` varchar(25) NOT NULL,
  `solution_desc` varchar(1900) NOT NULL,
  `solution_name` varchar(25) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image_thumb` longblob NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id_2` (`image_id`),
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
