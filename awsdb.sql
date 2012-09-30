-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2012 at 05:57 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `aws`
--

-- --------------------------------------------------------

--
-- Table structure for table `costCenters`
--

CREATE TABLE `costCenters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oracleCode` char(10) DEFAULT NULL,
  `costCenterName` char(50) DEFAULT NULL,
  `contactEmail` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `costCenters`
--

INSERT INTO `costCenters` (`id`, `oracleCode`, `costCenterName`, `contactEmail`) VALUES
(1, '69333', 'Implementation Services', 'impmanager@pearson.com'),
(2, '69101', 'Cloud Operations', 'clmanager@pearson.com'),
(3, '69501', 'SIS Operations', 'sismanager@pearson.com'),
(4, '69555', 'Quality Assurance', 'qamanager@pearson.com'),
(5, '69599', 'Development', 'devmanager@pearson.com');

-- --------------------------------------------------------

--
-- Table structure for table `instanceTypes`
--

CREATE TABLE `instanceTypes` (
  `id` int(11) NOT NULL DEFAULT '0',
  `awsId` char(10) DEFAULT NULL,
  `os` char(20) DEFAULT NULL,
  `cpu` char(20) DEFAULT NULL,
  `ram` char(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` char(8) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(50) NOT NULL,
  `password` char(40) NOT NULL,
  `salt` varchar(24) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_costCenters`
--

CREATE TABLE `users_costCenters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `users_employeeId` char(10) DEFAULT NULL,
  `costCenters_id` int(11) DEFAULT NULL,
  `costCenters_oracleCode` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_instances`
--

CREATE TABLE `users_instances` (
  `id` int(11) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL,
  `instances_id` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
