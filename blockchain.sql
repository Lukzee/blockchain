-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 10:07 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blockchain`
--
CREATE DATABASE IF NOT EXISTS `blockchain` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blockchain`;

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
  `t1file` varchar(50) NOT NULL,
  `t1nonce` varchar(10) NOT NULL,
  `t1phash` varchar(250) NOT NULL,
  `t1nhash` varchar(250) NOT NULL,
  `t2file` varchar(50) NOT NULL,
  `t2nonce` varchar(10) NOT NULL,
  `t2phash` varchar(250) NOT NULL,
  `t2nhash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`t1file`, `t1nonce`, `t1phash`, `t1nhash`, `t2file`, `t2nonce`, `t2phash`, `t2nhash`) VALUES
('760.xlsx', '2328', '02d6e627e4bfb3a31897cc66284dfee1', '74c933afacf0558851ea5f8141ad869a', '467.xlsx', '4656', '764cfd0ef18ac74cbe4385d4fe0eb31f', '4f63f44353d16c9990adfb064980027f');

-- --------------------------------------------------------

--
-- Table structure for table `examiner`
--

CREATE TABLE `examiner` (
  `t1file` varchar(250) NOT NULL,
  `t1nonce` varchar(250) NOT NULL,
  `t1phash` varchar(250) NOT NULL,
  `t1nhash` varchar(250) NOT NULL,
  `t2file` varchar(250) NOT NULL,
  `t2nonce` varchar(250) NOT NULL,
  `t2phash` varchar(250) NOT NULL,
  `t2nhash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examiner`
--

INSERT INTO `examiner` (`t1file`, `t1nonce`, `t1phash`, `t1nhash`, `t2file`, `t2nonce`, `t2phash`, `t2nhash`) VALUES
('467.xlsx', '582', '000000000000000000000', '5aebe6d53b76a6732bfdbfb2aec33496', '467.xlsx', '1164', '5aebe6d53b76a6732bfdbfb2aec33496', '02d6e627e4bfb3a31897cc66284dfee1');

-- --------------------------------------------------------

--
-- Table structure for table `exaoff`
--

CREATE TABLE `exaoff` (
  `t1file` varchar(50) NOT NULL,
  `t1nonce` varchar(10) NOT NULL,
  `t1phash` varchar(250) NOT NULL,
  `t1nhash` varchar(250) NOT NULL,
  `t2file` varchar(50) NOT NULL,
  `t2nonce` varchar(10) NOT NULL,
  `t2phash` varchar(250) NOT NULL,
  `t2nhash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exaoff`
--

INSERT INTO `exaoff` (`t1file`, `t1nonce`, `t1phash`, `t1nhash`, `t2file`, `t2nonce`, `t2phash`, `t2nhash`) VALUES
('467.xlsx', '9312', '4f63f44353d16c9990adfb064980027f', '8f6d34d4339fe88ff13414fef50f74c3', '467.xlsx', '18624', '8f6d34d4339fe88ff13414fef50f74c3', '1683570d4f3f21308d35d1044620b547');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
