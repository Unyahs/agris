-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 12:31 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrisinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `accountid` int(40) NOT NULL,
  `accounttype` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `lname` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `barangay` varchar(40) NOT NULL,
  `age` int(100) NOT NULL,
  `sex` text NOT NULL,
  `educattain` varchar(30) NOT NULL,
  `pondarea` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`accountid`, `accounttype`, `username`, `password`, `lname`, `fname`, `mname`, `barangay`, `age`, `sex`, `educattain`, `pondarea`) VALUES
(12, 'Farmers', 'thelmie', '1234', 'generoso', 'thelmie', 'gen', 'Bagong Kalsada', 21, 'Female', 'College Graduate', 2),
(13, 'Admin', 'ergiya', '1234', 'pailog', 'ergie', 'hobayan', 'Bagong Kalsada', 22, 'Male', 'College Graduate', 5),
(14, 'Farmers', 'Cedrick', '1234', 'Orozo', 'Cedrick', 'Mojica', 'Ibayo Silangan', 22, 'Male', 'College Graduate', 6),
(15, 'Farmers', 'Rod04', '1234', 'Abad', 'Rod', 'Spencer', 'Bagong Kalsada', 21, 'Male', 'College Graduate', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblfarminfo`
--

CREATE TABLE `tblfarminfo` (
  `stopercage` text NOT NULL,
  `weight` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `crabsex` text NOT NULL,
  `crabtype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblfiles`
--

CREATE TABLE `tblfiles` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfiles`
--

INSERT INTO `tblfiles` (`id`, `file`, `brgy`) VALUES
(3, '1st (1).docx', 'Ibayo Silangan');

-- --------------------------------------------------------

--
-- Table structure for table `tblresinfo`
--

CREATE TABLE `tblresinfo` (
  `farmcode` int(40) NOT NULL,
  `reslname` text NOT NULL,
  `resfname` text NOT NULL,
  `resmname` text NOT NULL,
  `resaddress` varchar(100) NOT NULL,
  `reseducat` varchar(100) NOT NULL,
  `resage` int(100) NOT NULL,
  `resdob` date NOT NULL,
  `resparea` int(100) NOT NULL,
  `rescweight` double NOT NULL,
  `resstcage` int(100) NOT NULL,
  `rescwidth` int(11) NOT NULL,
  `resmcsex` text NOT NULL,
  `resmctype` text NOT NULL,
  `rescaptida` datetime NOT NULL,
  `rescapdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresinfo`
--

INSERT INTO `tblresinfo` (`farmcode`, `reslname`, `resfname`, `resmname`, `resaddress`, `reseducat`, `resage`, `resdob`, `resparea`, `rescweight`, `resstcage`, `rescwidth`, `resmcsex`, `resmctype`, `rescaptida`, `rescapdate`) VALUES
(1, 'a', '', 'Bancaan', '1', '-1', 2019, '0000-00-00', 0, 0, 0, 0, '', '', '2020-02-20 00:00:00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`accountid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresinfo`
--
ALTER TABLE `tblresinfo`
  ADD PRIMARY KEY (`farmcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `accountid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblfiles`
--
ALTER TABLE `tblfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblresinfo`
--
ALTER TABLE `tblresinfo`
  MODIFY `farmcode` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
