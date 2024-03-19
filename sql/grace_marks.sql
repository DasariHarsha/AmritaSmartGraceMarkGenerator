-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 02:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grace_marks`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `adminID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmailID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT 'Null',
  `DOB` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `resettoken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `expiresin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminID`, `Name`, `EmailID`, `PhoneNum`, `Address`, `DOB`, `Gender`, `Password`, `role`, `resettoken`, `expiresin`) VALUES
(28, 'test_admin', 'admin@test.com', '1234567890', 'testaddress', '20/2/1999', 'male', 'Admin1@123', 3, 'N/A', 'N/A'),
(123456, 'Admin207', 'admin@207.com', '9207251675', 'Home Name , India', '2021-04-20T18:00:39.561Z', 'Male', 'Admin2@123', 3, '3d22b80bd069261a8d3d4aa696c2e709f8a60ca1a33297ad47785cdc2db4004a', '1618681306721');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CourseName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Department` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `Department`, `credits`) VALUES
('15CSE201', 'Data Structures and Algorithms', 'CSE', '4'),
('15CSE213', 'Operating Systems', 'CSE', '4'),
('15CSE302', 'DBMS Lab', 'CSE', '1'),
('15CSE312', 'Computer Networks', 'CSE', '3'),
('15CSE313', 'Software Engineering', 'CSE', '2');

-- --------------------------------------------------------

--
-- Table structure for table `course_mark`
--

CREATE TABLE `course_mark` (
  `RollNum` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `Section` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CourseID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `Internals` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Marks` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Total` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Grade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Final_Grade` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Final_status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_mark`
--

INSERT INTO `course_mark` (`RollNum`, `Section`, `CourseID`, `Internals`, `Marks`, `Total`, `Status`, `Grade`, `Final_Grade`, `Final_status`) VALUES
('CB.EN.U4CSE20012', 'A', '19CSE201', '23', '42', '65', 'P', 'B+', 'B+', 'N/P'),
('CB.EN.U4CSE20012', 'A', '19CSE213', '23', '42', '65', 'P', 'B+', 'B+', 'N/P'),
('CB.EN.U4CSE20012', 'A', '19CSE302', '22', '31', '53', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20012', 'A', '19CSE312', '34', '42', '76', 'P', 'A', 'A', 'N/P'),
('CB.EN.U4CSE20012', 'A', '19CSE313', '31', '4', '35', 'P', 'P', 'P', 'N/P'),
('CB.EN.U4CSE20119', 'B', '19CSE201', '23', '28', '51', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20119', 'B', '19CSE213', '32', '24', '56', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20119', 'B', '19CSE302', '40', '38', '78', 'P', 'A', 'A+', 'N/P'),
('CB.EN.U4CSE20119', 'B', '19CSE312', '36', '8', '44', 'P', 'C', 'C', 'N/P'),
('CB.EN.U4CSE20119', 'B', '19CSE313', '38', '27', '65', 'P', 'B+', 'B+', 'N/P'),
('CB.EN.U4CSE20213', 'C', '19CSE201', '21', '21', '42', 'P', 'C', 'C', 'N/P'),
('CB.EN.U4CSE20213', 'C', '19CSE213', '32', '43', '75', 'P', 'A', 'A', 'N/P'),
('CB.EN.U4CSE20213', 'C', '19CSE302', '2', '24', '26', 'P', 'F', 'F', 'N/P'),
('CB.EN.U4CSE20213', 'C', '19CSE312', '3', '24', '27', 'P', 'F', 'P', 'N/P'),
('CB.EN.U4CSE20213', 'C', '19CSE313', '34', '20', '54', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20345', 'D', '19CSE201', '21', '1', '22', 'P', 'F', 'F', 'N/P'),
('CB.EN.U4CSE20345', 'D', '19CSE213', '23', '33', '56', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20345', 'D', '19CSE302', '31', '8', '39', 'P', 'P', 'C', 'N/P'),
('CB.EN.U4CSE20345', 'D', '19CSE312', '28', '0', '28', 'P', 'F', 'P', 'N/P'),
('CB.EN.U4CSE20345', 'D', '19CSE313', '36', '41', '77', 'P', 'A', 'A+', 'N/P'),
('CB.EN.U4CSE20414', 'E', '19CSE201', '20', '31', '51', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20414', 'E', '19CSE213', '6', '20', '26', 'P', 'F', 'F', 'N/P'),
('CB.EN.U4CSE20414', 'E', '19CSE302', '32', '20', '52', 'P', 'B', 'B', 'N/P'),
('CB.EN.U4CSE20414', 'E', '19CSE312', '33', '24', '57', 'P', 'B', 'B+', 'N/P'),
('CB.EN.U4CSE20414', 'E', '19CSE313', '39', '29', '68', 'P', 'B+', 'A', 'N/P');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` varchar(30) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filenewname` varchar(100) NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `filename`, `filenewname`, `path`) VALUES
('CB.EN.U4CSE20412', '2020-END SEMESTER SCHEDULE.pdf', '646e621758d617.64271515', 'D:DontChangehtdocsSmart_Grace_Mark_Generatoruploads646e621758d617.64271515.pdf'),
('CB.EN.U4CSE20412', '2020-END SEMESTER SCHEDULE.pdf', '646e68f4c1bb69.63217292', 'D:DontChangehtdocsSmart_Grace_Mark_Generatoruploads646e68f4c1bb69.63217292.pdf'),
('CB.EN.U4CSE20412', '2020-END SEMESTER SCHEDULE.pdf', '646e69595ae611.74274009', 'D:DontChangehtdocsSmart_Grace_Mark_Generatoruploads646e69595ae611.74274009.pdf'),
('CB.EN.U4CSE20412', '2020-END SEMESTER SCHEDULE.pdf', '646e6a71e06650.23716121', 'D:DontChangehtdocsSmart_Grace_Mark_Generatoruploads646e6a71e06650.23716121.pdf'),
('CB.EN.U4CSE20412', '2020-END SEMESTER SCHEDULE.pdf', '646e7bc6dc8374.21081930', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads646e7bc6dc8374.21081930.pdf'),
('CB.EN.U4CSE20412', 'in.gov.abc-ABCID-896491616645.pdf', '646eea4cc6a473.12655919', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads646eea4cc6a473.12655919.pdf'),
('CB.EN.U4CSE20412', 'DEEP LEARNING BASED NUMBER PLATE RECOGNITION FOR DETECTING HELMETLES RIDERS.pdf', '646f5fdede1a59.15329771', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads646f5fdede1a59.15329771.pdf'),
('CB.EN.U4CSE20412', '19CSE456_NNDL_W3_MLP.ipynb - Colaboratory.pdf', '646fbb9dba2c42.87139359', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads646fbb9dba2c42.87139359.pdf'),
('CB.EN.U4CSE20412', 'NSS.pdf', '646fbcf9ebfad6.01947896', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads646fbcf9ebfad6.01947896.pdf'),
('CB.EN.U4CSE20412', 'DEEP LEARNING BASED NUMBER PLATE RECOGNITION FOR DETECTING HELMETLES RIDERS.pdf', '64703ea0e3f966.87557395', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads64703ea0e3f966.87557395.pdf'),
('CB.EN.U4CSE20412', 'DEEP LEARNING BASED NUMBER PLATE RECOGNITION FOR DETECTING HELMETLES RIDERS.pdf', '647052de393db1.39744554', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads647052de393db1.39744554.pdf'),
('CB.EN.U4CSE20012', 'CB.EN.U4CSE20414.DASARI_HARSHA.pdf', '648a2826835420.95497792', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a2826835420.95497792.pdf'),
('', 'Questions_Lab2.pdf', '648a3953b1f7d7.61727045', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a3953b1f7d7.61727045.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a397ce21411.02493377', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a397ce21411.02493377.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a3a5beace38.59720452', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a3a5beace38.59720452.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a3e7e365287.23538434', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a3e7e365287.23538434.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a43fa13ee57.23102654', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a43fa13ee57.23102654.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a454f74a625.75027091', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a454f74a625.75027091.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648a927f454d08.71081384', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648a927f454d08.71081384.pdf'),
('CB.EN.U4CSE20012', 'Questions_Lab2.pdf', '648aa70e9858b4.73003099', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads648aa70e9858b4.73003099.pdf'),
('', 'Capsule_Neural_Networks_and_Visualization_for_Segregation_of_Plastic_and_Non-Plastic_Wastes.pdf', '65f98aa016da13.47156796', 'D:DontChangehtdocsSmart_Grace_Mark_Generator	eacheruploads65f98aa016da13.47156796.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmailID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Department` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CourseID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ClassAdviser` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Batch` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `role` int(11) NOT NULL DEFAULT 2,
  `resettoken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `expiresin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `completion` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `Name`, `EmailID`, `PhoneNum`, `Address`, `DOB`, `Gender`, `Department`, `CourseID`, `Password`, `ClassAdviser`, `Batch`, `role`, `resettoken`, `expiresin`, `status`, `completion`) VALUES
(44, 'Faculty2', 'faculty2@sgmc.com', '6758439876', 'India', 'dd/mm/yyyyy', 'Male', 'CSE', '15CSE201', 'Faculty2@123', 'No', 'N/A', 2, 'N/A', 'N/A', 'P', 'Yes'),
(70, 'Faculty3', 'faculty3@sgmc.com', 'adsdsdsdsd', 'Address', '2021-04-20T09:29:21.649Z', 'Male', 'CSE', '15CSE312', 'Faculty3@123', 'No', 'N/A', 2, 'N/A', 'N/A', 'P', 'Yes'),
(74, 'faculty4', 'faculty4@sgmc.com', '9939393939', 's', '2021-05-08', 'Male', 'CSE', '15CSE302', 'Faculty4@123', 'No', 'N/A', 2, 'N/A', 'N/A', 'P', 'Yes'),
(75, 'faculty5', 'faculty5@sgmc.com', '8494929292', 's', '2021-05-08', 'Female', 'CSE', '15CSE313', 'Faculty5@123', 'No', 'N/A', 2, 'N/A', 'N/A', 'P', 'Yes'),
(45678, 'Class Advisor C', 'faculty1@sgmc.com', '856473829', 'India', '05-07-1995', 'Male', 'CSE', '15CSE213', 'Faculty1@123', 'Yes', 'C', 2, 'N/A', 'N/A', 'P', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_docs`
--

CREATE TABLE `faculty_docs` (
  `id` varchar(30) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filenewname` varchar(30) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_docs`
--

INSERT INTO `faculty_docs` (`id`, `filename`, `filenewname`, `path`) VALUES
('43', '2020-END SEMESTER SCHEDULE.pdf', '646ed8d53c1b34.41459136', 'D:DontChangehtdocsSmart_Grace_Mark_GeneratorAdminadmin_view_requests646ed8d53c1b34.41459136.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_request`
--

CREATE TABLE `faculty_request` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `event` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `gracemark` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `app_rej` varchar(100) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_request`
--

INSERT INTO `faculty_request` (`id`, `name`, `email`, `event`, `description`, `gracemark`, `filename`, `app_rej`) VALUES
('43', 'Class Advisor C', 'ganapathigundapaneni.2003@gmail.com', 'gokul', 'hsfkhif', '5', '2020-END SEMESTER SCHEDULE.pdf', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `gracemark`
--

CREATE TABLE `gracemark` (
  `GraceMarkID` int(11) NOT NULL,
  `Description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GraceMark` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gracemark`
--

INSERT INTO `gracemark` (`GraceMarkID`, `Description`, `GraceMark`) VALUES
(125, 'Inter University Sports and Games Events', '3'),
(126, 'Inter University Events', '3'),
(127, 'National Technical Competitions', '4'),
(129, 'Disaster Relief Activities', '2'),
(167, 'cir', '3'),
(196, 'NSS', '2'),
(200, 'Gokulashtami', '3');

-- --------------------------------------------------------

--
-- Table structure for table `grade_range`
--

CREATE TABLE `grade_range` (
  `CourseID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `O` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Ap` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `A` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Bp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `B` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `C` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `P` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `F` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_range`
--

INSERT INTO `grade_range` (`CourseID`, `O`, `Ap`, `A`, `Bp`, `B`, `C`, `P`, `F`, `status`) VALUES
('15CSE201', '57-53', '52 - 49', ' 48- 42', '41-37', '36-28', '27-22', '21 - 17 ', '16 - 0 ', 'P'),
('15CSE213', 'N/P-NaN', 'NaN - NaN', ' NaN- NaN', 'NaN-NaN', 'NaN-NaN', 'NaN-NaN', 'NaN - NaN ', 'NaN - 0 ', 'N/P'),
('15CSE302', '78-73', '72 - 67', ' 66- 58', '57-50', '49-39', '38-31', '30 - 23 ', '22 - 0 ', 'P'),
('15CSE312', '82-77', '76 - 70', ' 69- 61', '60-53', '52-41', '40-32', '31 - 24 ', '23 - 0 ', 'P'),
('15CSE313', '77-72', '71 - 66', ' 65- 57', '56-50', '49-38', '37-30', '29 - 23 ', '22 - 0 ', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `infopdf`
--

CREATE TABLE `infopdf` (
  `fileid` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL,
  `directory` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infopdf`
--

INSERT INTO `infopdf` (`fileid`, `filename`, `directory`, `created_date`) VALUES
(1, 'etp.pdf', '/document/', '2019-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`) VALUES
('ganapathigundapaneni.2003@gmail.com', 'eb1574937045ffaf252c74c902911423ce5887328866316f9d'),
('ganapathigundapaneni.2003@gmail.com', '43509d99626cc2e136108a3fc0855cf58ce7b3a504d211d8b6'),
('ganapathigundapaneni.2003@gmail.com', '2d877549f115d0d4176eef7aef6be8a18fbcd561cbd157f76f'),
('ganapathigundapaneni.2003@gmail.com', '3e3897af7e47f0df72cf0b9b766190a4c7ee78e401ddf502b2');

-- --------------------------------------------------------

--
-- Table structure for table `range`
--

CREATE TABLE `range` (
  `CourseID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `O` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Ap` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `A` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `Bp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `B` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `C` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `P` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `F` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `range`
--

INSERT INTO `range` (`CourseID`, `O`, `Ap`, `A`, `Bp`, `B`, `C`, `P`, `F`) VALUES
('15CSE201', '53', '49', '42', '37', '28', '22', '17', '0'),
('15CSE213', '70', '64', '56', '48', '37', '30', '22', '0'),
('15CSE302', '73', '67', '58', '50', '39', '31', '23', '0'),
('15CSE312', '77', '70', '61', '53', '41', '32', '24', '0'),
('15CSE313', '72', '66', '57', '50', '38', '30', '23', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `RollNum` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmailID` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNum` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Branch` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Batch` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Degree` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `Requested` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `GraceDesc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `GraceMark` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A''',
  `resettoken` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `expiresin` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `cgpa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `cgpa_status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `final_cgpa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `final_status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P',
  `grace_status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`RollNum`, `Name`, `EmailID`, `PhoneNum`, `Address`, `DOB`, `Gender`, `Branch`, `Batch`, `Degree`, `Password`, `role`, `Requested`, `GraceDesc`, `GraceMark`, `resettoken`, `expiresin`, `cgpa`, `cgpa_status`, `final_cgpa`, `final_status`, `grace_status`) VALUES
('CB.EN.U4CSE20012', 'Manoj Chavva', 'manojhchavva123@gmail.com', '9872637728', 'India', '2003-08-23', 'Male', 'CSE', 'A', 'BTech', 'Manoj@1234', 1, 'rejected', 'NSS', '2', 'ce0f1b433606cf57f25e81c39a8cc7e8', 'N/A', 'N/P', 'N/P', 'N/P', 'N/P', 'N/P'),
('CB.EN.U4CSE20119', 'Ganapathi Gundapaneni', 'cb.en.u4cse20419@cb.students.amrita.edu', '8008565141', 'India', '2021-06-11', 'Male', 'CSE', 'B', 'BTech', 'CB.EN.U4CSE20119', 1, 'N/A', 'N/A', '5', 'N/A', 'N/A', 'N/P', 'N/P', 'N/P', 'N/P', 'N/P'),
('CB.EN.U4CSE20213', 'Gowthami', 'cb.en.u4cse20413@cb.students.amrita.edu', '9347546498', 'India', '2002-15-12', 'Female', 'CSE', 'C', 'BTech', 'CB.EN.U4CSE20413', 1, 'N/A', 'N/A', '4', 'N/A', 'N/A', 'N/P', 'N/P', 'N/P', 'N/P', 'N/P'),
('CB.EN.U4CSE20345', 'Akhilesh NVSK', 'cb.en.u4cse20445@cb.students.amrita.edu', '9207251675', 'India', '2003-09-23', 'Male', 'CSE', 'D', 'BTech', 'CB.EN.U4CSE20445', 1, 'accepted', 'Inter University Events', '6', 'N/A', 'N/A', 'N/P', 'N/P', 'N/P', 'N/P', 'N/P'),
('CB.EN.U4CSE20414', 'Dasari HarshaVardhan Reddy', 'cb.en.u4cse20414@cb.students.amrita.edu', '6303191318', 'India', '2021-06-11', 'Male', 'CSE', 'E', 'BTech', 'CB.EN.U4CSE20414', 1, 'N/A', 'N/A', '5', 'N/A', 'N/A', 'N/P', 'N/P', 'N/P', 'N/P', 'N/P');

-- --------------------------------------------------------

--
-- Table structure for table `st_queries`
--

CREATE TABLE `st_queries` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RollNum` varchar(16) NOT NULL,
  `Query` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `st_queries`
--

INSERT INTO `st_queries` (`Name`, `Email`, `RollNum`, `Query`) VALUES
('Chavva Manoj', 'cb.en.u4cse20412@cb.students.a', 'CB.EN.U4CSE20412', 'Hi my grades are not yet published'),
('Ganapathi Gundapaneni', 'ganapathigundapaneni.2003@gmai', 'CB.EN.U4CSE20419', 'kkqsh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(9) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_docs`
--

CREATE TABLE `upload_docs` (
  `id` int(3) NOT NULL,
  `roll_num` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ph_no` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `app_rej` varchar(30) NOT NULL DEFAULT 'N/A',
  `teacher_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_docs`
--

INSERT INTO `upload_docs` (`id`, `roll_num`, `name`, `email`, `ph_no`, `branch`, `batch`, `event_name`, `filename`, `app_rej`, `teacher_name`) VALUES
(2, 'CB.EN.U4CSE20412', 'Manoj Chavva', 'dasariharsha264@gmail.com', '0768095125', 'CSE', 'C', 'Ugadhi', '2020-END SEMESTER SCHEDULE.pdf', 'Teacher Approved', 'Class Advisor C'),
(6, 'CB.EN.U4CSE20413', 'Gowthami', 'Gowthami@gmail.com', '0768095125', 'CSE', 'C', 'Gokulastami', 'in.gov.abc-ABCID-896491616645.pdf', 'N/A', ''),
(7, 'CB.EN.U4CSE20414', 'Harsha', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'C', 'Gokulastami', 'DEEP LEARNING BASED NUMBER PLATE RECOGNITION FOR DETECTING HELMETLES RIDERS.pdf', 'Teacher Rejected', 'Class Advisor C'),
(9, 'CB.EN.U4CSE20412', 'Manoj Chavva', 'harshadsr.rdy@gmail.com', '9872637728', 'CSE', 'C', 'NSS', 'NSS.pdf', 'Teacher Approved', 'Class Advisor C'),
(13, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'C', 'Gokulastami', 'DEEP LEARNING BASED NUMBER PLATE RECOGNITION FOR DETECTING HELMETLES RIDERS.pdf', 'N/A', ''),
(14, 'CB.EN.U4CSE20412', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Ugadhi', 'CB.EN.U4CSE20414.DASARI_HARSHA.pdf', 'N/A', ''),
(15, '', '', 'dasariharsha264@gmail.com', '', '', '', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(16, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(17, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(18, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(19, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(20, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'E', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(21, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'A', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(22, 'CB.EN.U4CSE20012', 'Manoj Chavva', 'dasariharsha264@gmail.com', '9872637728', 'CSE', 'A', 'Gokulastami', 'Questions_Lab2.pdf', 'N/A', ''),
(23, '', '', 'dasariharsha264@gmail.com', '', '', '', 'Gokulastami', 'Capsule_Neural_Networks_and_Visualization_for_Segregation_of_Plastic_and_Non-Plastic_Wastes.pdf', 'N/A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `EmailID_UNIQUE` (`EmailID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `course_mark`
--
ALTER TABLE `course_mark`
  ADD PRIMARY KEY (`RollNum`,`CourseID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`),
  ADD UNIQUE KEY `FacultyID_UNIQUE` (`FacultyID`),
  ADD UNIQUE KEY `EmailID_UNIQUE` (`EmailID`),
  ADD KEY `CID_idx` (`CourseID`);

--
-- Indexes for table `gracemark`
--
ALTER TABLE `gracemark`
  ADD UNIQUE KEY `GraceMarkID_UNIQUE` (`GraceMarkID`),
  ADD UNIQUE KEY `Desc_UNIQUE` (`Description`);

--
-- Indexes for table `grade_range`
--
ALTER TABLE `grade_range`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `infopdf`
--
ALTER TABLE `infopdf`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `range`
--
ALTER TABLE `range`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`RollNum`),
  ADD UNIQUE KEY `RollNum_UNIQUE` (`RollNum`),
  ADD UNIQUE KEY `EmailID_UNIQUE` (`EmailID`);

--
-- Indexes for table `st_queries`
--
ALTER TABLE `st_queries`
  ADD PRIMARY KEY (`RollNum`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `RollNum` (`RollNum`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_docs`
--
ALTER TABLE `upload_docs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123458;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `FacultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45680;

--
-- AUTO_INCREMENT for table `gracemark`
--
ALTER TABLE `gracemark`
  MODIFY `GraceMarkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `infopdf`
--
ALTER TABLE `infopdf`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_docs`
--
ALTER TABLE `upload_docs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `CID` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
