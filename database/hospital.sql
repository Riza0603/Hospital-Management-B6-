-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 07:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `pid` varchar(50) NOT NULL,
  `did` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pid`, `did`, `date`, `time`, `status`) VALUES
('PAT1', 'DOC1', '2023-06-23', '12:00:00', 'Consulted'),
('PAT1', 'DOC1', '2023-06-24', '09:30:00', 'Pending'),
('PAT1', 'DOC1', '2023-06-25', '03:30:00', 'Consulted');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` varchar(50) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `dmob` bigint(50) NOT NULL,
  `spec` varchar(30) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `dadd` varchar(100) NOT NULL,
  `ddob` date NOT NULL,
  `dgen` varchar(30) NOT NULL,
  `duser` varchar(50) NOT NULL,
  `dpass` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `dmob`, `spec`, `degree`, `dadd`, `ddob`, `dgen`, `duser`, `dpass`, `status`) VALUES
('DOC1', 'Shreyas', 1111111111, 'Surgeon', 'MPHD', 'Barkur', '2001-01-22', 'Male', 'shreyas', 'shreyas12', 'Available'),
('DOC2', 'Druva', 2147483647, 'Neurologist', 'MBBS', 'Nagoor', '2002-08-06', 'Male', 'druva', 'druva111', 'Available'),
('DOC3', 'Srajan', 2147483642, 'Dermatologist', 'MPHIL', 'kumbashi', '2002-12-09', 'Male', 'srajan', 'srajan12', 'Available'),
('DOC4', 'razi', 1234567892, 'Pediatrician', 'mbbs', 'kodi', '2001-03-06', 'Male', 'raazi1', 'raazi123', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(50) NOT NULL,
  `did` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `mng` varchar(50) NOT NULL,
  `aftr` varchar(50) NOT NULL,
  `ngt` varchar(50) NOT NULL,
  `medi` varchar(255) NOT NULL,
  `dat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `did`, `pid`, `qty`, `mng`, `aftr`, `ngt`, `medi`, `dat`) VALUES
(49, 'DOC1', 'PAT1', '20', '0', '1', '1', 'dolo', '2023-06-23'),
(50, 'DOC1', 'PAT1', '20', '0', '0', '1', 'cipla', '2023-06-23'),
(51, 'DOC1', 'PAT1', '20', '0', '1', '1', 'pinion', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pmob` bigint(50) NOT NULL,
  `blood` varchar(50) NOT NULL,
  `adhar` varchar(50) NOT NULL,
  `padd` varchar(100) NOT NULL,
  `father` varchar(50) NOT NULL,
  `pdob` date NOT NULL,
  `pgen` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `puser` varchar(50) NOT NULL,
  `ppass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `pmob`, `blood`, `adhar`, `padd`, `father`, `pdob`, `pgen`, `status`, `puser`, `ppass`) VALUES
('PAT1', 'Rijjaaa', 1234567892, 'O+', '652345215624', 'kodi', 'ramu', '2001-03-06', 'Male', 'Active', 'Riza12', 'Riza1234'),
('PAT2', 'Karthik', 1234526521, 'B+', '462568452365', 'kundapura', 'somu', '2003-04-22', 'Male', 'Active', 'Karthik', 'kathu123'),
('PAT3', 'Yash', 1234562413, 'A+', '653245785242', 'koni', 'ramesh', '2001-06-02', 'Male', 'Active', 'Yah19', 'Yash1920'),
('PAT4', 'Vasanth', 1234562413, 'B-', '65234521562423', 'kodiiiii', 'Vasu', '2001-03-06', 'Male', 'Deactive', 'Vasanth', 'vasanth1'),
('PAT5', 'Rizaaa', 8946523542, 'A+', '462568452365', 'kodi', 'Ramu', '2001-03-06', 'Male', 'Active', 'Raaam', 'Riii1234');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `qid` int(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`qid`, `pid`, `sub`, `reply`, `date`) VALUES
(12, 'PAT1', 'toilet issue', 'ok sure yes', '2023-06-23'),
(13, 'PAT1', 'washroom prblm', 'cleared', '2023-06-25'),
(15, 'PAT1', 'sanitizer', '', '2023-06-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `qid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
