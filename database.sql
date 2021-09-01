-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 07:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`(50)),
  UNIQUE KEY `Username` (`username`(50))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`, `time`) VALUES
('Sadisha Nimsara', 'nsadisha@gmail.com', 'nsadisha', 'abcd1234', '2021-08-30 18:58:01'),
('Asitha Nuwan', 'asithanuwanbandara@gmail.com', 'asitha99', 'asitha123', '2021-08-30 19:00:46'),
('Tharushi Chamalsha', 'tharushichamalsha@gmail.com', 'tchamalsha', 'tharushi123', '2021-08-31 10:18:20'),
('Vinojan Abimanyu', 'vinojan@gmail.com', 'vinojan', 'vinojan99', '2021-08-31 10:22:40'),
('Sandun Rangana', 'sandunr@gmail.com', 'sandunR', 'sandunr97', '2021-08-31 10:24:01'),
('Nirmal Kapilarathne', 'nirkapila@gmail.com', 'nirkapila', 'nirkapila98', '2021-08-31 10:24:53'),
('Sachin Tharaka', 'sachin@gmail.com', 'sachin98', 'sachin123', '2021-08-31 10:25:18'),
('Imasha Weerakoon', 'imashawe@gmail.com', 'imashaWE', 'imasha123', '2021-08-31 11:02:27'),
('Nimantha Gayan', 'nimantha@gmail.com', 'nimantha', 'nimantha97', '2021-08-31 19:42:29'),
('Umayanga Vidunuwan', 'umayanga@gmail.com', 'umayanga', '123456789', '2021-09-01 06:34:50'),
('Waruni Lalendra', 'waruni@gmail.com', 'waruni', '123456789', '2021-09-01 06:35:19'),
('Nipuni Nawodani', 'nipuni@gmail.com', 'nipuni', '123456789', '2021-09-01 06:42:52');
COMMIT;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `email` text NOT NULL,
  `friendEmail` text NOT NULL,
  PRIMARY KEY (`email`(50),`friendEmail`(50))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`email`, `friendEmail`) VALUES
('nsadisha@gmail.com', 'sandunr@gmail.com'),
('sandunr@gmail.com', 'nsadisha@gmail.com'),
('asithanuwanbandara@gmail.com', 'nirkapila@gmail.com'),
('nirkapila@gmail.com', 'asithanuwanbandara@gmail.com'),
('asithanuwanbandara@gmail.com', 'vinojan@gmail.com'),
('vinojan@gmail.com', 'asithanuwanbandara@gmail.com'),
('tharushichamalsha@gmail.com', 'nsadisha@gmail.com'),
('nsadisha@gmail.com', 'tharushichamalsha@gmail.com'),
('asithanuwanbandara@gmail.com', 'nsadisha@gmail.com'),
('nsadisha@gmail.com', 'asithanuwanbandara@gmail.com'),
('nsadisha@gmail.com', 'waruni@gmail.com'),
('nsadisha@gmail.com', 'imashawe@gmail.com'),
('nimantha@gmail.com', 'vinojan@gmail.com'),
('vinojan@gmail.com', 'nimantha@gmail.com'),
('nirkapila@gmail.com', 'imashawe@gmail.com'),
('imashawe@gmail.com', 'nirkapila@gmail.com'),
('imashawe@gmail.com', 'nsadisha@gmail.com'),
('nimantha@gmail.com', 'sandunr@gmail.com'),
('sandunr@gmail.com', 'nimantha@gmail.com'),
('nimantha@gmail.com', 'nirkapila@gmail.com'),
('nirkapila@gmail.com', 'nimantha@gmail.com'),
('waruni@gmail.com', 'nsadisha@gmail.com'),
('nimantha@gmail.com', 'asithanuwanbandara@gmail.com'),
('asithanuwanbandara@gmail.com', 'nimantha@gmail.com'),
('nimantha@gmail.com', 'tharushichamalsha@gmail.com'),
('tharushichamalsha@gmail.com', 'nimantha@gmail.com'),
('nimantha@gmail.com', 'nsadisha@gmail.com'),
('nsadisha@gmail.com', 'nimantha@gmail.com'),
('waruni@gmail.com', 'imashawe@gmail.com'),
('imashawe@gmail.com', 'waruni@gmail.com'),
('waruni@gmail.com', 'sandunr@gmail.com'),
('sandunr@gmail.com', 'waruni@gmail.com'),
('tharushichamalsha@gmail.com', 'sandunr@gmail.com'),
('sandunr@gmail.com', 'tharushichamalsha@gmail.com'),
('nipuni@gmail.com', 'nsadisha@gmail.com'),
('nsadisha@gmail.com', 'nipuni@gmail.com'),
('nipuni@gmail.com', 'asithanuwanbandara@gmail.com'),
('asithanuwanbandara@gmail.com', 'nipuni@gmail.com'),
('nipuni@gmail.com', 'tharushichamalsha@gmail.com'),
('tharushichamalsha@gmail.com', 'nipuni@gmail.com'),
('nipuni@gmail.com', 'vinojan@gmail.com'),
('vinojan@gmail.com', 'nipuni@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
