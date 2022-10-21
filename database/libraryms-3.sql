-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2022 at 09:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_barcode`
--

CREATE TABLE `books_barcode` (
  `bid` bigint(20) DEFAULT NULL,
  `barcode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books_data`
--

CREATE TABLE `books_data` (
  `bid` bigint(20) NOT NULL,
  `bname` varchar(15) NOT NULL,
  `autname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books_inventory`
--

CREATE TABLE `books_inventory` (
  `bid` bigint(20) DEFAULT NULL,
  `noBooks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbook_data`
--

CREATE TABLE `borrowedbook_data` (
  `sid` bigint(20) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_form`
--

CREATE TABLE `login_form` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_form`
--

INSERT INTO `login_form` (`ID`, `Username`, `Password`) VALUES
(3, 'admin', 'admin'),
(5, 'pranav.acharya@mocca.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `Sid` bigint(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Year` varchar(30) NOT NULL,
  `Depart` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`Sid`, `Name`, `Contact`, `Year`, `Depart`) VALUES
(20120038, 'Pranav Acharya', 9869006865, '2nd year/4th sem', 'IT'),
(20120078, 'Yunil Poudel', 9867546758, '2nd year/4th sem', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `teacherborrowedbook_data`
--

CREATE TABLE `teacherborrowedbook_data` (
  `tid` bigint(20) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_data`
--

CREATE TABLE `teacher_data` (
  `tid` bigint(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_data`
--

INSERT INTO `teacher_data` (`tid`, `Name`, `Contact`, `Subject`, `Department`) VALUES
(20120058, 'Anuj Ghimire', 9876567876, 'MFCS', 'IT'),
(20120068, 'Lali manandar', 9855555555, 'dbms', 'it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_barcode`
--
ALTER TABLE `books_barcode`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `books_data`
--
ALTER TABLE `books_data`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `books_inventory`
--
ALTER TABLE `books_inventory`
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `borrowedbook_data`
--
ALTER TABLE `borrowedbook_data`
  ADD KEY `barcode` (`barcode`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `login_form`
--
ALTER TABLE `login_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `teacherborrowedbook_data`
--
ALTER TABLE `teacherborrowedbook_data`
  ADD KEY `barcode` (`barcode`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `teacher_data`
--
ALTER TABLE `teacher_data`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_form`
--
ALTER TABLE `login_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_barcode`
--
ALTER TABLE `books_barcode`
  ADD CONSTRAINT `books_barcode_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `books_data` (`bid`);

--
-- Constraints for table `books_inventory`
--
ALTER TABLE `books_inventory`
  ADD CONSTRAINT `books_inventory_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `books_data` (`bid`);

--
-- Constraints for table `borrowedbook_data`
--
ALTER TABLE `borrowedbook_data`
  ADD CONSTRAINT `borrowedbook_data_ibfk_1` FOREIGN KEY (`barcode`) REFERENCES `books_barcode` (`barcode`),
  ADD CONSTRAINT `borrowedbook_data_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `student_data` (`Sid`);

--
-- Constraints for table `teacherborrowedbook_data`
--
ALTER TABLE `teacherborrowedbook_data`
  ADD CONSTRAINT `teacherborrowedbook_data_ibfk_1` FOREIGN KEY (`barcode`) REFERENCES `books_barcode` (`barcode`),
  ADD CONSTRAINT `teacherborrowedbook_data_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `teacher_data` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
