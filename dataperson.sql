-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2012 at 06:07 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataperson`
--

CREATE TABLE IF NOT EXISTS `dataperson` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `repassword` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `subscription` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `firstName` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `lastName` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `company` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `businessPhone` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `person_id_UNIQUE` (`person_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=16 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
