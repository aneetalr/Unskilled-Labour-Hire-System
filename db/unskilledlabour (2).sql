-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 06:08 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unskilledlabour`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `uname`, `addr`, `district`, `gender`, `phone`, `email`, `username`, `password`, `status`) VALUES
(2, 'anu', 'ghj', 'ernakulam', 'female', '9987654345', 'anu@gmail.com', 'anu', 'anu', '1'),
(3, 'qwe', 'er', 'we', 'male', '0956325478', 'mano@gmail.com', 'fg', '', '1'),
(4, 'fgh', 'jghj', 'ghj', 'male', '0874523265', 'riya@gmail.com', 'fgh', '', '1'),
(5, 'fgh', 'jghj', 'ghj', 'male', '0874523265', 'riya@gmail.com', 'fgh', '', '1'),
(6, 'aswathy', 'dfgg', 'ernakulam', 'female', '8745236587', 'aswathy@gmail.com', 'aswathy', 'aswathy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customerbookings`
--

CREATE TABLE IF NOT EXISTS `customerbookings` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `nod` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `place` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `wid1` int(11) NOT NULL,
  `wid2` int(11) NOT NULL,
  `wid3` int(11) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `customerbookings`
--

INSERT INTO `customerbookings` (`bookid`, `cid`, `service`, `nod`, `fromdate`, `todate`, `place`, `bdate`, `status`, `sid`, `wid`, `wid1`, `wid2`, `wid3`) VALUES
(1, 1, 'agriculture', 2, '2020-10-14', '2020-10-16', 'aluva', '2020-10-01', 'not approved', 1, 1, 0, 0, 0),
(2, 0, 'cleaning', 3, '2020-10-22', '2020-10-25', 'aluva', '2020-10-19', 'not approved', 0, 0, 0, 0, 0),
(4, 2, 'fvg', 4, '2020-10-22', '2020-10-24', 'aluva', '2020-10-19', 'completed', 4, 5, 0, 0, 0),
(5, 2, 'cleaning', 3, '2020-10-23', '2020-10-26', 'aluva', '2020-10-22', 'accepted', 0, 0, 0, 0, 0),
(7, 2, 'plumbing', 3, '2020-10-25', '2020-10-27', 'vytilla', '2020-10-22', 'accepted', 12, 1, 0, 0, 0),
(8, 6, 'plumbing', 2, '2020-11-04', '2020-11-06', 'squarejunction', '2020-10-28', 'completed', 13, 6, 0, 0, 0),
(9, 2, 'cleaning', 3, '2020-11-25', '2020-11-28', 'vytilla', '2020-10-28', 'accepted', 13, 0, 0, 0, 0),
(18, 2, 'cleaning', 4, '2020-11-28', '2020-12-02', 'tfyguhij', '2020-10-29', 'not approved', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `feedbackdesc` varchar(50) NOT NULL,
  PRIMARY KEY (`feedid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `cid`, `sid`, `feedbackdesc`) VALUES
(2, 2, 4, 'good'),
(3, 2, 4, 'nice'),
(4, 2, 4, 'excellent'),
(5, 6, 13, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackworker`
--

CREATE TABLE IF NOT EXISTS `feedbackworker` (
  `feedid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `feedbackdesc` varchar(50) NOT NULL,
  PRIMARY KEY (`feedid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedbackworker`
--

INSERT INTO `feedbackworker` (`feedid`, `cid`, `wid`, `feedbackdesc`) VALUES
(1, 2, 0, 'nice work'),
(2, 2, 5, 'very nice');

-- --------------------------------------------------------


--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `pass`, `utype`, `status`) VALUES
('manu', 'manu', 'supervisor', '1'),
('meenu', 'meenu', 'worker', '1'),
('anu', 'anu', 'customer', '1'),
('admin', 'admin', 'admin', '1'),
('dfgh', 'dfg', 'worker', '0'),
('fg', 'fg', 'customer', '1'),
('dfg', 'fgh', 'supervisor', '0'),
('fgh', 'fg', 'customer', '1'),
('fgh', 'ghj', 'supervisor', '0'),
('fgh', 'fghj', 'supervisor', '0'),
('dfg', 'fg', 'worker', '0'),
('ttt', 'tttt', 'worker', '0'),
('vidya', 'vidya', 'supervisor', '0'),
('manoj', 'manoj', 'supervisor', '0'),
('manojjj', 'manoj', 'supervisor', '0'),
('manojjj123', 'manoj', 'supervisor', '1'),
('ann', 'ann', 'supervisor', '1'),
('aswathy', 'aswathy', 'customer', '1'),
('archana', 'archana', 'worker', '1');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `idno` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `certificate` varchar(500) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`sid`, `uname`, `addr`, `district`, `idno`, `phone`, `email`, `image`, `qualification`, `specialization`, `experience`, `username`, `password`, `status`, `certificate`) VALUES
(4, 'manu', 'fgh', 'ernakulam', '1236587496', '9874526321', 'manu@gmail.com', 'HTB1pFGJSVXXXXcOXXXXq6xXFXXX2.jpg', 'dfgh', 'sdfgh', '1', '', '', '1', 'Box-Makers-Certificate-1024x444.png'),
(5, 'dfg', 'fg', 'fgh', '1256332659', '0956325478', 'jithin@gmail.com', 'pexels-photo-12255.jpeg', 'fgh', 'dfghj', '2', '', '', '0', 'pexels-photo-176342.jpeg'),
(6, 'fgh', 'fg', 'gh', '1236587496', '0998765434', 'anu@gmail.com', 'images.jpg', 'fgh', '', 'fghj', '', '', '0', '2603662823.jpg'),
(7, 'fgh', 'fg', 'gh', '1236587496', '0998765434', 'anu@gmail.com', 'images.jpg', 'fgh', '', 'fghj', '', '', '0', '2603662823.jpg'),
(8, 'fgh', 'fg', 'gh', '1236587496', '0998765434', 'anu@gmail.com', 'images.jpg', 'fgh', '', 'fghj', '', '', '1', '2603662823.jpg'),
(9, 'ghj', 'bn', 'bnm', '1236587496', '0956325478', 'anu@gmail.com', 'farm-labour.jpg', 'ghj', '', 'bn', '', '', '1', 'farm-labour.jpg'),
(10, 'fgbh', 'fgu', 'fgh', '1236587496', '0985632547', 'manoj@gmail.com', 'Agriculture-770x433.jpg', 'dfgh', '', '3', '', '', '1', 'Wheat-Production-in-Punjab.jpg'),
(11, 'vidya', 'dfghj', 'ernakulam', '2365987452', '0956325478', 'vidya@gmail.com', 'Haryana_farmers_distress_COVID-19_lockdown.jpg', 'bsc', '', '3', '', '', '1', 'images.jpg'),
(12, 'manoj', 'fgh', 'ernakulam', '6587452369', '0985632547', 'manoj@gmail.com', 'simple_login_form.jpg', 'bcom', '', '2', 'manojjj123', 'manoj', '1', 'Agriculture-770x433.jpg'),
(13, 'ann', 'palarivattom', 'ernakulam', '2563215478', '9874521254', 'ann@gmail.com', 'Shipping_Policy_image.jpg', 'bsc', '', '2', 'ann', 'ann', '1', 'agri-kE0--621x414@LiveMint.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `idcard` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`wid`, `uname`, `addr`, `district`, `gender`, `idcard`, `phone`, `email`, `username`, `password`, `experience`, `status`) VALUES
(1, 'meenu', 'cvbn', 'ernakulam', 'female', '1236584566', '9874526321', 'meenu@gmail.com', 'meenu', 'meenu', '1', '1'),
(2, 'meenu', 'cvbn', 'ernakulam', 'female', '1236584566', '9874526321', 'meenu@gmail.com', 'meenu', 'meenu', '1', '1'),
(3, 'dfgh', 'fgh', 'dfg', 'male', '1236598875', '0956325478', 'family@gmail.com', 'dfgh', 'meenu', '1', '1'),
(4, 'fgh', 'fgh', 'ernakulam', 'male', '1256998455', '09563254789', 'mano@gmail.com', 'dfg', 'meenu', '2', '0'),
(5, 'dfg', 'dfg', 'cfg', 'male', '123659887', '0956325478', 'mano@gmail.com', 'ttt', 'meenu', '3', '1'),
(6, 'archana', 'dfg', 'ernakulam', 'female', '8563254785', '7452365874', 'archana@gmail.com', 'meenu', 'archana', '2', '1');
