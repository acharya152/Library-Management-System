-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 06:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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

--
-- Dumping data for table `books_barcode`
--

INSERT INTO `books_barcode` (`bid`, `barcode`) VALUES
(9789937890090, 97899378900901),
(9789937890090, 97899378900902),
(9789937890090, 97899378900903),
(9789937890090, 97899378900904),
(9789937890090, 97899378900905),
(9789937890090, 97899378900906),
(9789937890090, 97899378900907),
(9789937890090, 97899378900908),
(9789937890090, 97899378900909),
(9789937890090, 978993789009010),
(9789937890090, 978993789009011),
(9789937890090, 978993789009012),
(9789937890090, 978993789009013),
(9789937890090, 978993789009014),
(9789937890090, 978993789009015);

-- --------------------------------------------------------

--
-- Table structure for table `books_data`
--

CREATE TABLE `books_data` (
  `bid` bigint(20) NOT NULL,
  `bname` varchar(15) NOT NULL,
  `autname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_data`
--

INSERT INTO `books_data` (`bid`, `bname`, `autname`) VALUES
(9789937890090, 'Rajniti', 'rameshnath');

-- --------------------------------------------------------

--
-- Table structure for table `books_inventory`
--

CREATE TABLE `books_inventory` (
  `bid` bigint(20) DEFAULT NULL,
  `noBooks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_inventory`
--

INSERT INTO `books_inventory` (`bid`, `noBooks`) VALUES
(9789937890090, 15);

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbook_data`
--

CREATE TABLE `borrowedbook_data` (
  `sid` bigint(20) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowedbook_data`
--

INSERT INTO `borrowedbook_data` (`sid`, `barcode`) VALUES
(20120038, 97899378900901);

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
(20120038, 'Pranav Acharya', 9869006865, '3rd year/ 5th semester', 'it'),
(20120076, 'Yunil Raj Poudel', 9869006866, '3rd year/ 5th semester', 'it');

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
(28645564, 'Anuj Ghimire', 9869006867, 'MFCS', 'it');

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
