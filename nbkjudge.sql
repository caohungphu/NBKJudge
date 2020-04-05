-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2020 at 01:54 PM
-- Server version: 5.5.46
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chambaitructuyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `caidat`
--

CREATE TABLE `caidat` (
  `adminsubmit` tinyint(4) NOT NULL,
  `submission` tinyint(1) NOT NULL,
  `registration` tinyint(1) NOT NULL,
  `viewrank` tinyint(1) NOT NULL,
  `editprofile` tinyint(1) NOT NULL,
  `document` tinyint(1) NOT NULL,
  `tests` tinyint(1) NOT NULL,
  `history` tinyint(1) NOT NULL,
  `adminarlert` text NOT NULL,
  `adminarlert2` text NOT NULL,
  `adminarlert3` text NOT NULL,
  `id` int(11) NOT NULL,
  `cosodulieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caidat`
--

INSERT INTO `caidat` (`adminsubmit`, `submission`, `registration`, `viewrank`, `editprofile`, `document`, `tests`, `history`, `adminarlert`, `adminarlert2`, `adminarlert3`, `id`, `cosodulieu`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '', '', '', 1, 'members');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `tentable` text COLLATE utf8_unicode_ci NOT NULL,
  `short_name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `teacher_folder` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `timecount` tinyint(4) NOT NULL,
  `timestart` datetime NOT NULL,
  `timefinish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `tentable`, `short_name`, `title`, `teacher_folder`, `description`, `timecount`, `timestart`, `timefinish`) VALUES
(0, 'members', '', 'TIÊU ĐỀ', 'TenThuMuc', 'MÔ TẢ', 0, '2020-04-04 07:00:00', '2020-04-04 14:35:00'),
(1, 'members1', '', '', 'CONTEST', '', 0, '2019-10-13 07:00:00', '2019-10-13 07:00:00'),
(2, 'members2', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(3, 'members3', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(4, 'members4', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(5, 'members5', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(6, 'members6', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(7, 'members7', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(8, 'members8', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(9, 'members9', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00'),
(10, 'members10', '', '', 'CONTEST', '', 0, '2020-04-04 07:00:00', '2020-04-04 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members1`
--

CREATE TABLE `members1` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members1`
--

INSERT INTO `members1` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members2`
--

CREATE TABLE `members2` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members2`
--

INSERT INTO `members2` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members3`
--

CREATE TABLE `members3` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members3`
--

INSERT INTO `members3` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members4`
--

CREATE TABLE `members4` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members4`
--

INSERT INTO `members4` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members5`
--

CREATE TABLE `members5` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members5`
--

INSERT INTO `members5` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members6`
--

CREATE TABLE `members6` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members6`
--

INSERT INTO `members6` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members7`
--

CREATE TABLE `members7` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members7`
--

INSERT INTO `members7` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members8`
--

CREATE TABLE `members8` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members8`
--

INSERT INTO `members8` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members9`
--

CREATE TABLE `members9` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members9`
--

INSERT INTO `members9` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members10`
--

CREATE TABLE `members10` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `color` text,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members10`
--

INSERT INTO `members10` (`id`, `username`, `password`, `email`, `phone`, `name`, `birthday`, `color`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', '', 'admin', '2001-01-01', 'red', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members1`
--
ALTER TABLE `members1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members2`
--
ALTER TABLE `members2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members3`
--
ALTER TABLE `members3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members4`
--
ALTER TABLE `members4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members5`
--
ALTER TABLE `members5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members6`
--
ALTER TABLE `members6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members7`
--
ALTER TABLE `members7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members8`
--
ALTER TABLE `members8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members9`
--
ALTER TABLE `members9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members10`
--
ALTER TABLE `members10`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members1`
--
ALTER TABLE `members1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members2`
--
ALTER TABLE `members2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members3`
--
ALTER TABLE `members3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members4`
--
ALTER TABLE `members4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members5`
--
ALTER TABLE `members5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members6`
--
ALTER TABLE `members6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members7`
--
ALTER TABLE `members7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members8`
--
ALTER TABLE `members8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members9`
--
ALTER TABLE `members9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members10`
--
ALTER TABLE `members10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
