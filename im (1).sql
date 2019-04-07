-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2019 at 02:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursefaculty`
--

DROP TABLE IF EXISTS `coursefaculty`;
CREATE TABLE IF NOT EXISTS `coursefaculty` (
  `cid` varchar(10) NOT NULL,
  `fid` varchar(10) NOT NULL,
  PRIMARY KEY (`cid`,`fid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursefaculty`
--

INSERT INTO `coursefaculty` (`cid`, `fid`) VALUES
('C0001', 'IM001'),
('C0002', 'IM002'),
('C0003', 'IM003'),
('C0004', 'IM004'),
('C0005', 'IM005'),
('C0006', 'IM006'),
('C0007', 'IM007'),
('C0008', 'IM008'),
('C0009', 'IM009');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `cid` varchar(10) NOT NULL,
  `cName` varchar(30) NOT NULL,
  `cLevel` varchar(15) NOT NULL,
  `cDetails` varchar(70) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cName`, `cLevel`, `cDetails`) VALUES
('C0001', 'HTML, CSS, Bootstrap', 'Basic', 'Basics of html, css and bootstrap'),
('C0002', 'HTML, CSS, Bootstrap', 'Intermediate', 'Mini Projects'),
('C0003', 'HTML, CSS, Bootstrap', 'Advanced', 'Internship'),
('C0004', 'ML', 'Basic', 'Basic of machine learning'),
('C0005', 'ML', 'Intermediate ', 'ML algorithms and their implementation in real world problems.'),
('C0006', 'ML', 'Advanced', 'ML application on real world problems. Project on ML.'),
('C0007', 'PHP', 'Basic', 'basics of PHP'),
('C0008', 'PHP', 'Intermediate ', 'Database connection and querying. Mini project.'),
('C0009', 'PHP', 'Advanced', 'Project. Building a real world website.');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

DROP TABLE IF EXISTS `enroll`;
CREATE TABLE IF NOT EXISTS `enroll` (
  `sid` varchar(10) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `cName` varchar(30) DEFAULT NULL,
  `cLevel` varchar(15) DEFAULT NULL,
  `fid` varchar(10) DEFAULT NULL,
  `fName` varchar(30) DEFAULT NULL,
  `payMethod` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`sid`,`cid`),
  KEY `cid` (`cid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`sid`, `cid`, `cName`, `cLevel`, `fid`, `fName`, `payMethod`) VALUES
('', '', '', '', '', '', ''),
('1jb16cs034', 'C0004', 'ML', 'Basic', 'IM004', 'Ramesh', 'cash'),
('1jb16cs000', 'C0008', 'PHP', 'Intermediate ', 'IM008', 'Nikhil yelidiyappa', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyID` varchar(10) NOT NULL,
  `facultyName` varchar(30) NOT NULL,
  `details` varchar(50) NOT NULL,
  PRIMARY KEY (`facultyID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `facultyName`, `details`) VALUES
('IM001', 'Vinay N.B', 'B.E, M.tech'),
('IM002', 'Kashmeena Bora', 'B.E, M.des'),
('IM003', 'Chandan P', 'B.E, MBA'),
('IM004', 'Ramesh', 'B.E, M.S'),
('IM005', 'Suresh', 'B.E'),
('IM006', 'Anjelina', 'B.E, M.S'),
('IM007', 'Raadha', 'B.Tech'),
('IM008', 'Nikhil yelidiyappa', '10th std'),
('IM009', 'Peddaramaih', '-');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('admin@incredibleminds.in', 'iamadmin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` varchar(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `sPhone` bigint(10) NOT NULL,
  `sEmail` varchar(50) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `pPhone` bigint(10) NOT NULL,
  `pEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `dob`, `sPhone`, `sEmail`, `address`, `city`, `state`, `pincode`, `pPhone`, `pEmail`) VALUES
('1jb16cs034', 'chandan', 'p', '1998-07-17', 7022223677, 'chandanps98@gmail.com', '#22,yamuna block,goodwill apartments,chandra layout', 'bengaluru', 'Karnataka', 560040, 9876543234, 'iwonttell@gmail.com'),
('1jb16cs000', 'chandannn', 'p', '1998-07-17', 7022223677, 'chandanps98@gmail.com', '#22,yamuna block,goodwill apartments,chandra layout', 'bengaluru', 'Karnataka', 560000, 9867534560, 'ggnnj@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
