-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2019 at 07:19 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib_man`
--
CREATE DATABASE IF NOT EXISTS `lib_man` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lib_man`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `bid` varchar(10) NOT NULL DEFAULT '',
  `bname` varchar(500) NOT NULL,
  `bcopies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `bname`, `bcopies`) VALUES
('1090', 'biog', 10);

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE `credentials` (
  `lid` varchar(10) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `cpass` varchar(256) NOT NULL,
  `ctype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`lid`, `cid`, `cpass`, `ctype`) VALUES
('0', 'administrator', '25e4ee4e9229397b6b17776bfceaf8e7', 'admin'),
('909090', 'sunnylib', '71afa64b371225e627317bcbbf77a95e', 'librarian'),
('101010', 'syslib', '5472c0b887a226fe564abafe615a58b2', 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

DROP TABLE IF EXISTS `issue`;
CREATE TABLE `issue` (
  `isno` int(11) NOT NULL,
  `bid` varchar(10) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `lid` varchar(10) NOT NULL,
  `idate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

DROP TABLE IF EXISTS `librarians`;
CREATE TABLE `librarians` (
  `lid` varchar(10) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `laddress` varchar(500) NOT NULL,
  `lphone` varchar(10) NOT NULL,
  `lmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`lid`, `lname`, `laddress`, `lphone`, `lmail`) VALUES
('0', 'administrator', '0', '0', '0'),
('101010', 'sys soni', 'rohini', '123456', 'abc@xyz.com'),
('909090', 'sunny soni', 'rohini', '1001102', 'abc@xyz.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `sid` varchar(10) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sclass` varchar(20) NOT NULL,
  `saddress` varchar(500) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `smail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `sname`, `sclass`, `saddress`, `sphone`, `smail`) VALUES
('123456', 'sunny soni', 'CSE-1B', 'rohini, new delhi', '9900112233', 'xyz@abc.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `tid` varchar(10) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `taddress` varchar(500) NOT NULL,
  `tphone` int(10) NOT NULL,
  `tmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `tname`, `taddress`, `tphone`, `tmail`) VALUES
('123456', 'abcdef harma', 'rohini sector 2', 87987987, 'asd@ghjh.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`isno`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
