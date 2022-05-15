-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2000 at 07:55 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lhf`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `add` text NOT NULL,
  `tel` text NOT NULL,
  `logo` varchar(300) NOT NULL,
  `datetime` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `name`, `email`, `add`, `tel`, `logo`, `datetime`) VALUES
(5, 'Leonardft Estate Managers', 'leo@gmail.com', 'Plot A4 Adniyi jones ikeja Lagos Nigeria', '+234-70-37385018', 'Opera.png', '2000-04-26 14:30:04'),
(6, 'The Firsy Group', 'tfg@gmail.com', 'No4 Oke Agbe Street Garki 2 Abuja Nigeria', '+234-80-99324234', 'Maxthon.png', '2000-04-26 14:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `agentid` int(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `tel` text NOT NULL,
  `email` varchar(300) NOT NULL,
  `type` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `agentid`, `name`, `message`, `tel`, `email`, `type`, `datetime`) VALUES
(1, 0, '', '', '', '', '', '0000-00-00 00:00:00'),
(2, 5, 'caleb olojio', 'i want to know how much you are', '07037385018', '', '', '2000-04-27 13:39:03'),
(3, 5, 'caleb olojio', 'i want to know how much you are', '07037385018', 'calebbankole@yahoo.com', '', '2000-04-27 13:41:56'),
(4, 5, 'caleb olojio', 'i want to know how much you are', '07037385018', 'calebbankole@yahoo.com', 'Request Details', '2000-04-27 13:42:46'),
(5, 5, '', '', '', '', '', '2000-04-27 15:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE IF NOT EXISTS `rent` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `date_added` date NOT NULL,
  `agent_id` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `per` varchar(100) NOT NULL,
  `add` text NOT NULL,
  `area` varchar(200) NOT NULL,
  `feature1` text NOT NULL,
  `feature2` text NOT NULL,
  `feature3` text NOT NULL,
  `feature4` text NOT NULL,
  `feature5` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `bed` varchar(20) NOT NULL,
  `title` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `description`, `summary`, `date_added`, `agent_id`, `price`, `per`, `add`, `area`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `type`, `bed`, `title`) VALUES
(7, 'I therefore desire to be a part of your organization success story. I look forward to obtaining new learning opportunities,  to progress in your exciting organization where excellence is recognized. I also hope to acquire and develop new skills in unfamiliar areas.', 'I therefore desire to be a part of your organization success story. I look forward to obtaining new learning opportunities,  to progress in your exciting organization where excellence is recognized. I also hope to acquire and develop new skills in unfamiliar areas.', '2000-04-30', 5, 2000000, 'per Anum', 'No 4 Adeola Ogunshila close Victoria Island', 'Victoria Island', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'House', '4+', 'Beautifull home of your dream'),
(6, 'I very much understand the complexities of todayâ€™s Information Communication Technology (ICT) requirements in a fast developing economy as ours; also bearing in mind the move by government to rapidly switch to a cashless economy', 'I therefore desire to be a part of your organization success story. I look forward to obtaining new learning opportunities,  to progress in your exciting organization where excellence is recognized. I also hope to acquire and develop new skills in unfamiliar areas.', '2000-04-30', 5, 3000000, 'per Anum', 'Plot 20A adetokumbo crescent victorial island laogos', 'Victoria Island', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'Lorem sit amet', 'House', '4+', 'Exquisite Bungalow for rent');

-- --------------------------------------------------------

--
-- Table structure for table `rent_photo`
--

CREATE TABLE IF NOT EXISTS `rent_photo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `entry_id` int(20) NOT NULL,
  `mainpic1` varchar(200) NOT NULL,
  `pic2` varchar(200) NOT NULL,
  `pic3` varchar(200) NOT NULL,
  `pic4` varchar(200) NOT NULL,
  `pic5` varchar(200) NOT NULL,
  `pic6` varchar(200) NOT NULL,
  `pic7` varchar(200) NOT NULL,
  `pic8` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rent_photo`
--

INSERT INTO `rent_photo` (`id`, `entry_id`, `mainpic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`) VALUES
(4, 7, '2.jpg', '4,jpg', '5.jpg', '11.jpg', '9.jpg', '8.jpg', '4.jpg', '5.jpg'),
(3, 6, '6.jpg', '3.jpg', '5.jpg', '7.jpg', '10.jpg', '14.jpg', '8.jpg', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `date_added` date NOT NULL,
  `agent_id` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `add` text NOT NULL,
  `area` varchar(200) NOT NULL,
  `feature1` text NOT NULL,
  `feature2` text NOT NULL,
  `feature3` text NOT NULL,
  `feature4` text NOT NULL,
  `feature5` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `bed` varchar(20) NOT NULL,
  `title` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `description`, `summary`, `date_added`, `agent_id`, `price`, `add`, `area`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `type`, `bed`, `title`) VALUES
(11, 'There have been some consigns expressed regarding the use of Facebook as the means of surveillance and data mining of user profile. The Facebook privacy policy states”we may use information about you that will collect from other sources-Including but limited to newspapers and internet sources such as blogs, instant messaging services and other  users of Facebook to supplement your profile”.', 'Facebook has been critisied heavily for tracking users even when logged out of the site: when a user logs out of Facebook, the cookies from the log-in are still kept in the browser allowing facebook to track users', '2000-04-26', 5, 3000000, 'Plot 3/4 Admemola Tokunbo wuse II abuja', 'Magodo GRA', 'Swimming pool', 'Free Electricity', 'Furnished', 'Exquiste bedroom', 'furnished bathroom', 'Flat', '2+', '2 Bed room bungalow in Lekki Phase II for Sale'),
(10, 'Facebook  has proven vulnerable to likejacking: on july 28th 2010, the BBC reported hat security consultant used a piece of code to scan Facebook profiles to collect data of hundred million profiles. The data collected was not hidden by the users privacy settings .\r\n\r\n', 'Facebook  has proven vulnerable to likejacking: on july 28th 2010, the BBC reported hat security consultant used a piece of code to scan Facebook profiles to collect data of hundred million profiles. The data collected was not hidden by the users privacy settings .\r\n\r\n', '2000-04-26', 5, 2000000, 'plot 3c ikoyi magodo', 'Magodo GRA', 'Lorem Ipsum sit amet dolor', 'Lorem Ipsum sit amet dolor', 'Lorem Ipsum sit amet dolor', 'Lorem Ipsum sit amet dolor', 'Lorem Ipsum sit amet dolor', 'Flat', '2+', '3bed room luxury flat'),
(8, 'bbbbbbbbbb', 'bbbbbbbbbbbbbbbbb', '2000-04-26', 6, 3434, 'bbbbbbbbbb', 'bbbbbb', 'bb', 'b', 'boys quaters', 'b', 'b', 'Flat', '4+', 'bbbbbbbbbbbbbb'),
(9, 'zcxvzxvz', 'gdnbvcb', '2000-04-26', 6, 10000000, 'cvcvzcv', 'zxcvzcv', 'fdgff', 'fff', 'fdssz', 'ddd', 'ssxz', 'Flat', '3+', 'zcvzcxz');

-- --------------------------------------------------------

--
-- Table structure for table `sale_photo`
--

CREATE TABLE IF NOT EXISTS `sale_photo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `entry_id` int(20) NOT NULL,
  `mainpic1` varchar(200) NOT NULL,
  `pic2` varchar(200) NOT NULL,
  `pic3` varchar(200) NOT NULL,
  `pic4` varchar(200) NOT NULL,
  `pic5` varchar(200) NOT NULL,
  `pic6` varchar(200) NOT NULL,
  `pic7` varchar(200) NOT NULL,
  `pic8` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sale_photo`
--

INSERT INTO `sale_photo` (`id`, `entry_id`, `mainpic1`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `pic7`, `pic8`) VALUES
(1, 10, 'IE.jpg', '10.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg'),
(2, 11, 'Opera.jpg', '11.jpg', '12.jpg', '13.jpg', '14.jpg', '17.jpg', '9.jpg', '15.jpg'),
(3, 0, '', '', '', '', '', '', '', '');
