-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2019 at 07:50 AM
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
  PRIMARY KEY (`fid`),
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
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `teacherID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`teacherID`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyID` varchar(10) NOT NULL,
  `facultyName` text NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('1jb16cs000', 'kiladihandan', '\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\k', '2019-04-30', 7022223677, 'imemyself497@gmail.com', 'sda', 'Bangalore', 'Karnataka', 560040, 7022223677, 'imemyself497@gmail.com'),
('1jb16cs749', 'the legend', 'chilla', '2019-05-01', 9876543210, 'GOTiscrazyaf@crazymail.com', '#life, fucked up street', 'no idea', 'why divide?', 560040, 1234567890, 'iwonttell@bye.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_admission`
--

DROP TABLE IF EXISTS `student_admission`;
CREATE TABLE IF NOT EXISTS `student_admission` (
  `stud_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `trans_id` varchar(20) NOT NULL,
  `trans_proof_url` varchar(50) NOT NULL,
  `bill_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
  `stud_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `faculty_id` varchar(10) NOT NULL,
  KEY `stud_id` (`stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`stud_id`, `course_id`, `faculty_id`) VALUES
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('1jb16cs034', 'C0001', 'IM0001'),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('', '', ''),
('1jb16cs749', 'C0005', 'IM005'),
('1jb16cs749', 'C0005', 'IM005');

-- --------------------------------------------------------

--
-- Table structure for table `wokrshop`
--

DROP TABLE IF EXISTS `wokrshop`;
CREATE TABLE IF NOT EXISTS `wokrshop` (
  `ws_id` varchar(10) NOT NULL,
  `ws_dutration` int(11) NOT NULL COMMENT 'in weeks time',
  `ws_name` varchar(20) NOT NULL,
  `ws_cost` int(11) NOT NULL,
  PRIMARY KEY (`ws_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
