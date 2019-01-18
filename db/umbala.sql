-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 05:14 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umbala`
--
CREATE DATABASE IF NOT EXISTS `umbala` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `umbala`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `AttendanceNum` bigint(20) NOT NULL,
  `ClassStudentNum` bigint(20) NOT NULL,
  `AttendanceRoom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AttendanceSession` int(11) NOT NULL,
  `AttendanceDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `AttendanceCheck` bit(1) NOT NULL DEFAULT b'0',
  `AttendanceReason` text COLLATE utf8_unicode_ci,
  `PersonnelAccount` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceNum`, `ClassStudentNum`, `AttendanceRoom`, `AttendanceSession`, `AttendanceDate`, `AttendanceCheck`, `AttendanceReason`, `PersonnelAccount`) VALUES
(1, 4, '4', 1, '2019-01-18 15:08:59', b'1', NULL, 'nhdung'),
(2, 4, '4', 1, '2019-01-18 15:32:52', b'0', NULL, 'nhdung');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `ClassId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ClassName` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ClassQty` int(11) NOT NULL,
  `ClassActive` date NOT NULL,
  `PersonnelAccount` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubjectId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassId`, `ClassName`, `ClassQty`, `ClassActive`, `PersonnelAccount`, `SubjectId`) VALUES
('F02', 'CP1896F01', 12, '2019-01-16', 'vvlinh', 'PHP'),
('G05', 'CP1896G05', 12, '2019-01-18', 'dthuy', 'J2EE'),
('K02', 'CP1896K02', 17, '2017-05-16', 'dthuy', 'WAD');

-- --------------------------------------------------------

--
-- Table structure for table `classstudent`
--

DROP TABLE IF EXISTS `classstudent`;
CREATE TABLE `classstudent` (
  `ClassStudentNum` bigint(20) NOT NULL,
  `ClassId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StudentId` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classstudent`
--

INSERT INTO `classstudent` (`ClassStudentNum`, `ClassId`, `StudentId`) VALUES
(4, 'K02', 'A18013'),
(7, 'F02', 'A17007'),
(8, 'K02', 'A17008');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `EducationId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EducationName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `EducationDetails` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`EducationId`, `EducationName`, `EducationDetails`) VALUES
('ACCPi10', 'ACCPi10', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.'),
('ACCPi13', 'ACCPi13', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.'),
('ACCPi17', 'ACCPI17', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.'),
('ACCPi7', 'ACCPi7 - AD', ' Diploma in Information System Management DISM'),
('ADSE', 'ACCPi18', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.'),
('CPISM', 'CPISM', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.'),
('DIM', 'DIM', 'Aptech is a premier education institute since 1986. Aptech has trained 70 lakh professionals in more than 40 countries.\r\n\r\nUnder Digital & Information Technology domain, the institute provides a wide variety of career, professional, short term and certification courses, designed by our expert academicians after careful market study and research. All the courses are taught by experienced and certified faculty. Our trainers constantly update their technical skills to maintain their expertise.');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE `personnel` (
  `PersonnelAccount` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ParsonnelPassword` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PersonnelEmail` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `PersonnelPhone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PersonnelName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PersonnelCetificate` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PersonnalStatus` int(1) NOT NULL DEFAULT '0',
  `RoleId` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`PersonnelAccount`, `ParsonnelPassword`, `PersonnelEmail`, `PersonnelPhone`, `PersonnelName`, `PersonnelCetificate`, `PersonnalStatus`, `RoleId`) VALUES
('dthuy', 'e807f1fcf82d132f9bb018ca6738a19f', 'dthuya17007@cusc.ctu.edu.vn', '0962505928', 'Dang Tuan Huy', 'DISM, HSDE,ADSE', 1, 1),
('nhdung', '202cb962ac59075b964b07152d234b70', 'nhdung@ctu.edu.vn', '0123456789', 'Nguyen Hung Dung', 'Windows Store App', 0, 1),
('otmlinh', '827ccb0eea8a706c4c34a16891f84e7b', 'luonghoanghuong@gmail.com', '0963505927', 'Ong Thi My Linh', 'Advance JAVA', 1, 2),
('vvlinh', '202cb962ac59075b964b07152d234b70', 'vvlinh@ctu.edu.vn', '0963505927', 'Huy Dang Tuan', 'DISM, HSDE,ADSE', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `RoleDescription` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`, `RoleDescription`) VALUES
(1, 'Admin', NULL),
(2, 'Teacher', NULL),
(3, 'Manager', NULL),
(4, 'Aao', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `StudentCode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StudentName` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `StudentBirth` date DEFAULT NULL,
  `StudentPhone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StudentAddress` text COLLATE utf8_unicode_ci,
  `StudentEmail` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentCode`, `StudentName`, `StudentBirth`, `StudentPhone`, `StudentAddress`, `StudentEmail`) VALUES
('A17007', 'Dang Huy Hoang', '1998-01-02', '0963505928', 'Khu 3 - Trường Đại học Cần Thơ, Lý Tự Trọng, An Phú, Ninh Kiều, Cần Thơ,6', 'dthuya17007@student.ctu.edu.vn'),
('A17008', 'DAng Tuan Hung', '2019-02-17', '0963505927', 'Khu 3 - Trường Đại học Cần Thơ, Lý Tự Trọng, An Phú, Ninh Kiều, Cần Thơ,6', 'dthuya17007@student.ctu.edu.vn'),
('A17009', 'Hong Lac', '1997-01-12', '0925028450', 'Khu 3 - Trường Đại học Cần Thơ, Lý Tự Trọng, An Phú, Ninh Kiều, Cần Thơ,6', 'dthuya17007@student.ctu.edu.vn'),
('A18013', 'Phong Long', '1996-12-12', '08083508', 'Khu 3 - Trường Đại học Cần Thơ, Lý Tự Trọng, An Phú, Ninh Kiều, Cần Thơ,6', 'dthuya17007@student.ctu.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `SubjectId` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SubjectName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SubjectTheory` int(50) DEFAULT NULL,
  `SubjectPractical` int(50) DEFAULT NULL,
  `TheoryPractical` int(50) DEFAULT NULL,
  `SubjectSem` int(11) NOT NULL,
  `EducationId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `SubjectName`, `SubjectTheory`, `SubjectPractical`, `TheoryPractical`, `SubjectSem`, `EducationId`) VALUES
('BNGW', 'Building Next Generation Websites', 14, 14, 0, 3, 'ACCPi17'),
('J2EE', 'Architecting Applications for the Web', 0, 0, 21, 4, 'ACCPi17'),
('PHP', 'Web Application Development using PHP', 1, 0, 18, 2, 'CPISM'),
('WAD', 'Web Application Development', 0, 0, 20, 3, 'ACCPi17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceNum`),
  ADD KEY `ClassStudentNum` (`ClassStudentNum`),
  ADD KEY `PersonnelAccount` (`PersonnelAccount`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassId`),
  ADD KEY `PersonnelAccount` (`PersonnelAccount`),
  ADD KEY `SubjectId` (`SubjectId`);

--
-- Indexes for table `classstudent`
--
ALTER TABLE `classstudent`
  ADD PRIMARY KEY (`ClassStudentNum`),
  ADD KEY `classstudent_ibfk_1` (`ClassId`),
  ADD KEY `classstudent_ibfk_2` (`StudentId`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`EducationId`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`PersonnelAccount`),
  ADD KEY `RoleId` (`RoleId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentCode`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectId`),
  ADD KEY `EduCode` (`EducationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `AttendanceNum` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classstudent`
--
ALTER TABLE `classstudent`
  MODIFY `ClassStudentNum` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`ClassStudentNum`) REFERENCES `classstudent` (`ClassStudentNum`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`PersonnelAccount`) REFERENCES `personnel` (`PersonnelAccount`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`PersonnelAccount`) REFERENCES `personnel` (`PersonnelAccount`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`SubjectId`) REFERENCES `subject` (`SubjectId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `classstudent`
--
ALTER TABLE `classstudent`
  ADD CONSTRAINT `classstudent_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `class` (`ClassId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `classstudent_ibfk_2` FOREIGN KEY (`StudentId`) REFERENCES `student` (`StudentCode`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`EducationId`) REFERENCES `education` (`EducationId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
