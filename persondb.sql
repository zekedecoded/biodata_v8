-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 11:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educationID` int(11) NOT NULL,
  `acadLevel` varchar(50) NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `yr_grad` year(4) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educationID`, `acadLevel`, `schoolName`, `yr_grad`, `course_name`) VALUES
(7, 'College', 'Nueva Ecija University of Science and Technology', '2026', 'BSIT'),
(9, 'Elementary', 'San Fernando Sur Elementary School', '2016', 'BSIT'),
(11, 'Elementary', 'Greenwood Elementary', '2010', NULL),
(12, 'High School', 'Northside High School', '2014', NULL),
(13, 'College', 'State University of Tech', '2018', 'BS Computer Science'),
(14, 'Post-Graduate', 'Metropolitan University', '2020', 'MS Data Analytics'),
(15, 'Vocational', 'Technical Skills Institute', '2015', 'Welding & Fabrication'),
(16, 'College', 'Pacific Coast College', '2019', 'AB Psychology'),
(17, 'High School', 'East Ridge Academy', '2012', NULL),
(19, 'Post-Graduate', 'Institute of Arts', '2023', 'MA Fine Arts'),
(20, 'Elementary', 'St. Jude Primary School', '2008', NULL),
(21, 'College', 'Global Maritime Academy', '2017', 'BS Marine Engineering'),
(23, 'College', 'Healthcare College', '2022', 'BS Nursing'),
(24, 'Vocational', 'Culinary Arts Center', '2019', 'Commercial Cooking');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `employmentID` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `date_joined` date DEFAULT NULL,
  `date_exit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`employmentID`, `company`, `position`, `date_joined`, `date_exit`) VALUES
(6, 'Microsoft Corporation', 'Software Developer', '2009-12-09', '2020-12-02'),
(7, 'Tech Nova Corp', 'Junior Developer', '2015-06-01', '2017-08-15'),
(8, 'Global Solutions Inc', 'System Analyst', '2017-09-01', '2019-12-20'),
(9, 'Creative Pulse Media', 'Graphic Designer', '2020-01-10', '2022-03-30'),
(10, 'Summit Logistics', 'Operations Manager', '2014-02-15', '2018-05-10'),
(11, 'Blue Horizon FinTech', 'Senior Backend Engineer', '2022-04-01', NULL),
(12, 'Stellar Retail', 'Sales Lead', '2010-11-20', '2013-12-31'),
(13, 'Evergreen Hospitals', 'HR Administrator', '2019-05-05', '2023-01-15'),
(14, 'Apex Law Firm', 'Legal Assistant', '2016-08-12', '2020-09-30'),
(15, 'Nova Marketing', 'Content Strategist', '2021-02-14', NULL),
(16, 'Silverline Banking', 'Financial Advisor', '2012-07-01', '2016-10-25'),
(17, 'Red Cedar Construction', 'Project Coordinator', '2018-03-22', '2021-11-05'),
(18, 'Oceanic Shipping', 'Logistics Clerk', '2013-04-10', '2015-06-30'),
(20, 'CyberGuard Security', 'SOC Analyst', '2024-01-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personID` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `father_lastName` varchar(50) DEFAULT NULL,
  `father_firstName` varchar(50) DEFAULT NULL,
  `father_middleName` varchar(50) DEFAULT NULL,
  `father_suffix` varchar(10) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `lang_known` varchar(100) DEFAULT NULL,
  `hobbiesName` varchar(200) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `skills` varchar(200) DEFAULT NULL,
  `pfp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `lastname`, `firstname`, `middlename`, `suffix`, `mobile`, `email`, `dob`, `gender`, `marital_status`, `father_lastName`, `father_firstName`, `father_middleName`, `father_suffix`, `religion`, `lang_known`, `hobbiesName`, `street`, `barangay`, `city`, `province`, `skills`, `pfp`) VALUES
(23, 'Torres', 'Sofia', 'Hernandez', NULL, 639228889900, 'sofia.t@email.com', '1995-04-04', 'Female', 'Single', 'Torres', 'Manuel', 'Lopez', NULL, 'Catholic', 'English, Spanish', 'Painting, Piano', '19 Hillside', 'Upper Village', 'Baguio City', 'Benguet', 'Customer Relations, French', ''),
(31, 'Santiago', 'Ezekiel Clarence', 'Santos', '', 9876767876, 'ezekielclarence6@gmail.com', '2003-12-06', 'Male', 'Single', 'Santiago', 'Edwin ', 'Estrella', '', 'Roman Catholic', 'Filipino, English', 'Playing Games', 'Purok 4', 'San Fernando Sur', 'Cabiao', 'Nueva Ecija', 'Programming', ''),
(38, 'SAMSON', 'JASMIN', 'FUERTEZ', 'III.', 9787287364, 'JASMINSAMSON@GMAIL.COM', '2006-06-21', 'Female', 'SINGLE', 'SMITH', 'JOHN', 'DOE', '', 'ROMAN CATHOLIC', 'FILIPINO, ENGLISH', 'CROCHETTING', 'PUROK 4', 'ENTABLADO', 'CABIAO', 'NUEVA ECIJA', 'SINGING', '69b7ef2e94d4d-1773661998IMG_1367.JPG'),
(39, 'Gascon', 'Dann', 'A', '', 98776546121, 'danngascon@gmail.com', '2003-10-13', 'Male', 'Single', 'Gascon', 'Danilo', 'T', '', 'Roman Catholic', 'English, Filipino', 'Badminton', 'Purok 5', 'Sapang', 'Jaen', 'Nueva Ecija', 'Scamming', '69dc77ee1ca74-1776056302download.jpg'),
(40, 'Santiago', 'Ezekiel Clarence', 'Santos', '', 9876543321, 'ezekielclarencesantiago68@gmail.com', '2003-12-06', 'Male', 'Single', 'Santos', 'Edwin', 'Estrella', '', 'Roman Catholic', 'English', 'Coding', 'Purok 4', 'San Fernando Sur', 'Cabiao', 'Nueva Ecija', 'Watching', '69dc97ac29a15-1776064428baby.jpg'),
(70, 'Cabiad', 'Liam', 'David', '', 9876767876, 'daitodump@gmail.com', '2001-12-12', 'Male', 'MARRIED', 'SMITH', 'Simon', 'Garcia', '', 'Roman Catholic', 'Filipino, English', 'Playing Games', 'Purok 4', 'San Fernando Sur', 'San Antonio', 'METRO MANILA', 'Programming', '69dd264683313-1776100934IMG_1319.JPG'),
(71, 'l;kl;k', 'MICHAEL', 'lkl;k', ';lk', 121212123123, 'daitodump@gmail.com', '0120-12-12', 'Male', 'l;kl;k', 'l;kl;k', 'l;kl;k', 'l;kl;k', 'l;k', 'lkl;klk', 'l;kl;k', 'lkl;k', 'kjkljkl', 'jkljkl', 'jklj', 'kljklj', 'l;kl;k', '69dcbb963554b-1776073622baby.jpg'),
(72, 'Bautista', 'Greg', 'Castaneda', 'JR.', 9876767876, 'daitodump@gmail.com', '2001-02-17', 'Male', 'SINGLE', 'SMITH', 'JOHN', 'DOE', 'SR.', 'Roman Catholic', 'Filipino, English', 'PHOTOGRAPHY, CODING', 'Purok 4', 'San Fernando Sur', 'CABIAO', 'NUEVA ECIJA', 'SINGING', '69dda2d853644-1776132824IMG_1396.JPG'),
(73, 'SADSAD', 'TEST 1', 'SDADSAD', 'ASDSAD', 9787287364, 'daitodump@gmail.com', '2211-12-12', 'Male', 'KGHGH', 'GHJGJHG', 'HJGHJG', 'JHGJHGH', 'JHGHJG', 'DSADSAD', 'GHJGJH', 'GHJGJH', 'Purok 6', 'BARANGAY 14', 'CABIAO', 'sdfsdf', 'GHJGHJG', '69ddae4cba85c-1776135756IMG_1324.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `temp_education`
--

CREATE TABLE `temp_education` (
  `educationID` int(11) NOT NULL,
  `acadLevel` varchar(50) NOT NULL,
  `schoolName` varchar(100) NOT NULL,
  `yr_grad` year(4) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_education`
--

INSERT INTO `temp_education` (`educationID`, `acadLevel`, `schoolName`, `yr_grad`, `course_name`) VALUES
(7, 'College', 'Nueva Ecija University of Science and Technology', '2026', 'BSIT'),
(9, 'Elementary', 'San Fernando Sur Elementary School', '2016', 'BSIT'),
(11, 'Elementary', 'Greenwood Elementary', '2010', NULL),
(12, 'High School', 'Northside High School', '2014', NULL),
(13, 'College', 'State University of Tech', '2018', 'BS Computer Science'),
(14, 'Post-Graduate', 'Metropolitan University', '2020', 'MS Data Analytics'),
(15, 'Vocational', 'Technical Skills Institute', '2015', 'Welding & Fabrication'),
(16, 'College', 'Pacific Coast College', '2019', 'AB Psychology'),
(17, 'High School', 'East Ridge Academy', '2012', NULL),
(19, 'Post-Graduate', 'Institute of Arts', '2023', 'MA Fine Arts'),
(20, 'Elementary', 'St. Jude Primary School', '2008', NULL),
(21, 'College', 'Global Maritime Academy', '2017', 'BS Marine Engineering'),
(23, 'College', 'Healthcare College', '2022', 'BS Nursing'),
(24, 'Vocational', 'Culinary Arts Center', '2019', 'Commercial Cooking');

-- --------------------------------------------------------

--
-- Table structure for table `temp_employment`
--

CREATE TABLE `temp_employment` (
  `employmentID` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `date_joined` date DEFAULT NULL,
  `date_exit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_employment`
--

INSERT INTO `temp_employment` (`employmentID`, `company`, `position`, `date_joined`, `date_exit`) VALUES
(6, 'Microsoft Corporation', 'Software Developer', '2009-12-09', '2020-12-02'),
(7, 'Tech Nova Corp', 'Junior Developer', '2015-06-01', '2017-08-15'),
(8, 'Global Solutions Inc', 'System Analyst', '2017-09-01', '2019-12-20'),
(9, 'Creative Pulse Media', 'Graphic Designer', '2020-01-10', '2022-03-30'),
(10, 'Summit Logistics', 'Operations Manager', '2014-02-15', '2018-05-10'),
(11, 'Blue Horizon FinTech', 'Senior Backend Engineer', '2022-04-01', NULL),
(12, 'Stellar Retail', 'Sales Lead', '2010-11-20', '2013-12-31'),
(13, 'Evergreen Hospitals', 'HR Administrator', '2019-05-05', '2023-01-15'),
(14, 'Apex Law Firm', 'Legal Assistant', '2016-08-12', '2020-09-30'),
(15, 'Nova Marketing', 'Content Strategist', '2021-02-14', NULL),
(16, 'Silverline Banking', 'Financial Advisor', '2012-07-01', '2016-10-25'),
(17, 'Red Cedar Construction', 'Project Coordinator', '2018-03-22', '2021-11-05'),
(18, 'Oceanic Shipping', 'Logistics Clerk', '2013-04-10', '2015-06-30'),
(20, 'CyberGuard Security', 'SOC Analyst', '2024-01-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_person`
--

CREATE TABLE `temp_person` (
  `personID` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `father_lastName` varchar(50) DEFAULT NULL,
  `father_firstName` varchar(50) DEFAULT NULL,
  `father_middleName` varchar(50) DEFAULT NULL,
  `father_suffix` varchar(10) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `lang_known` varchar(100) DEFAULT NULL,
  `hobbiesName` varchar(200) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `skills` varchar(200) DEFAULT NULL,
  `pfp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educationID`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`employmentID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`);

--
-- Indexes for table `temp_education`
--
ALTER TABLE `temp_education`
  ADD PRIMARY KEY (`educationID`);

--
-- Indexes for table `temp_employment`
--
ALTER TABLE `temp_employment`
  ADD PRIMARY KEY (`employmentID`);

--
-- Indexes for table `temp_person`
--
ALTER TABLE `temp_person`
  ADD PRIMARY KEY (`personID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `employmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `temp_education`
--
ALTER TABLE `temp_education`
  MODIFY `educationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `temp_employment`
--
ALTER TABLE `temp_employment`
  MODIFY `employmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `temp_person`
--
ALTER TABLE `temp_person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
