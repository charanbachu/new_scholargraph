-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2017 at 10:34 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_schooldayz`
--

-- --------------------------------------------------------

--
-- Table structure for table `AttributeNodeTable`
--

CREATE TABLE `AttributeNodeTable` (
  `Node_ID` int(11) NOT NULL,
  `Node_Tier` int(11) NOT NULL DEFAULT '0',
  `Node_Name` varchar(50) DEFAULT NULL,
  `Node_Type` varchar(255) DEFAULT NULL,
  `Prev_Node` int(11) DEFAULT NULL,
  `Trigger_Ques` int(11) DEFAULT NULL,
  `Trigger_AnsOp` int(11) DEFAULT NULL,
  `Footer_comment` varchar(255) NOT NULL DEFAULT '',
  `Footer_value` varchar(255) NOT NULL DEFAULT '',
  `footer_value_flag` int(2) NOT NULL DEFAULT '0',
  `Club_ID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AttributeNodeTable`
--

INSERT INTO `AttributeNodeTable` (`Node_ID`, `Node_Tier`, `Node_Name`, `Node_Type`, `Prev_Node`, `Trigger_Ques`, `Trigger_AnsOp`, `Footer_comment`, `Footer_value`, `footer_value_flag`, `Club_ID`) VALUES
(1, 1, 'Class Size', 'Decision', 0, 336, NULL, '', '', 0, 0),
(2, 2, 'Value_Class Size', 'Structural', 1, 336, 1, '', '', 0, 0),
(3, 2, 'NotSure_Class Size', 'Structural', 1, 336, 2, '', '', 0, 0),
(4, 2, 'Varies_Class Size', 'Structural', 1, 336, 3, '', '', 0, 0),
(5, 1, 'Faculty Strength', 'Decision', 0, 337, NULL, '', '', 0, 0),
(6, 2, 'Value_Faculty Strength', 'Structural', 5, 337, 1, '', '', 0, 0),
(7, 2, 'NotSure_Faculty Strength', 'Structural', 5, 337, 2, '', '', 0, 0),
(8, 2, 'Varies_Faculty Strength', 'Structural', 5, 337, 3, '', '', 0, 0),
(9, 1, 'Degree Duration', 'Decision', 0, 338, NULL, '', '', 0, 0),
(10, 2, 'Degree Duration', 'Structural', 9, 338, 1, '', '', 0, 0),
(11, 2, 'Degree Duration', 'Structural', 9, 338, 2, '', '', 0, 0),
(12, 2, 'Degree Duration', 'Structural', 9, 338, 3, '', '', 0, 0),
(13, 2, 'Degree Duration', 'Structural', 9, 338, 4, '', '', 0, 0),
(14, 2, 'Degree Duration', 'Structural', 9, 338, 5, '', '', 0, 0),
(15, 1, 'Academic Calendar', 'Decision', 0, 339, NULL, '', '', 0, 0),
(16, 2, 'Academic Calendar', 'Structural', 15, 339, 1, '', '', 0, 0),
(17, 2, 'Academic Calendar', 'Structural', 15, 339, 2, '', '', 0, 0),
(18, 2, 'Academic Calendar', 'Structural', 15, 339, 3, '', '', 0, 0),
(19, 2, 'Academic Calendar', 'Structural', 15, 339, 4, '', '', 0, 0),
(20, 2, 'Academic Calendar', 'Structural', 15, 339, 5, '', '', 0, 0),
(21, 1, 'Acceptance Rate', 'Decision', 0, 340, NULL, '', '', 0, 0),
(22, 2, 'Value_Acceptance Rate', 'Structural', 21, 340, 1, '', '', 0, 0),
(23, 2, 'NotSure_Acceptance Rate', 'Structural', 21, 340, 2, '', '', 0, 0),
(24, 1, 'Secondary School (10+2) performance', 'Decision', 0, 341, NULL, '', '', 0, 32),
(25, 2, 'Yes_Considered', 'Structural', 24, 341, 1, '', '', 0, 0),
(26, 2, 'No_Secondary School (10+2) performance', 'Structural', 24, 341, 2, '', '', 0, 0),
(27, 2, 'NotSure_Secondary School (10+2) performance', 'Structural', 24, 341, 3, '', '', 0, 0),
(28, 1, 'Letter of Recommendation', 'Decision', 0, 342, NULL, '', '', 0, 32),
(29, 2, 'Yes_Considered', 'Structural', 28, 342, 1, '', '', 0, 0),
(30, 2, 'No_Letter of Recommendation', 'Structural', 28, 342, 2, '', '', 0, 0),
(31, 2, 'NotSure_Letter of Recommendation', 'Structural', 28, 342, 3, '', '', 0, 0),
(32, 1, 'Statement of Purpose / Essay', 'Decision', 0, 343, NULL, '', '', 0, 32),
(33, 2, 'Yes_Considered', 'Structural', 32, 343, 1, '', '', 0, 0),
(34, 2, 'No_Statement of Purpose / Essay', 'Structural', 32, 343, 2, '', '', 0, 0),
(35, 2, 'NotSure_Statement of Purpose / Essay', 'Structural', 32, 343, 3, '', '', 0, 0),
(36, 1, 'Standardized Tests - GRE', 'Decision', 0, 349, NULL, '', '', 0, 33),
(37, 2, 'Yes_Standardized Tests - GRE', 'Structural', 36, 349, 1, '', '', 0, 0),
(38, 2, 'No_GRE', 'Structural', 36, 349, 2, '', '', 0, 0),
(39, 2, 'NotSure_GRE', 'Structural', 36, 349, 3, '', '', 0, 0),
(40, 1, 'Standardized Tests - GMAT', 'Decision', 0, 350, NULL, '', '', 0, 33),
(41, 2, 'Yes_Standardized Tests - GMAT', 'Structural', 40, 350, 1, '', '', 0, 0),
(42, 2, 'No_GMAT', 'Structural', 40, 350, 2, '', '', 0, 0),
(43, 2, 'NotSure_GMAT', 'Structural', 40, 350, 3, '', '', 0, 0),
(44, 1, 'Standardized Tests - CAT', 'Decision', 0, 351, NULL, '', '', 0, 33),
(45, 2, 'Yes_Standardized Tests - CAT', 'Structural', 44, 351, 1, '', '', 0, 0),
(46, 2, 'No_CAT', 'Structural', 44, 351, 2, '', '', 0, 0),
(47, 2, 'NotSure_CAT', 'Structural', 44, 351, 3, '', '', 0, 0),
(48, 1, 'Standardized Tests - JEE', 'Decision', 0, 352, NULL, '', '', 0, 33),
(49, 2, 'Yes_Standardized Tests - JEE', 'Structural', 48, 352, 1, '', '', 0, 0),
(50, 2, 'No_JEE', 'Structural', 48, 352, 2, '', '', 0, 0),
(51, 2, 'NotSure_JEE', 'Structural', 48, 352, 3, '', '', 0, 0),
(52, 1, 'Standardized Tests - NEET', 'Decision', 0, 353, NULL, '', '', 0, 33),
(53, 2, 'Yes_Standardized Tests - NEET', 'Structural', 52, 353, 1, '', '', 0, 0),
(54, 2, 'No_NEET', 'Structural', 52, 353, 2, '', '', 0, 0),
(55, 2, 'NotSure_NEET', 'Structural', 52, 353, 3, '', '', 0, 0),
(56, 1, 'Standardized Tests - BITSAT', 'Decision', 0, 354, NULL, '', '', 0, 33),
(57, 2, 'Yes_Standardized Tests - BITSAT', 'Structural', 56, 354, 1, '', '', 0, 0),
(58, 2, 'No_BITSAT', 'Structural', 56, 354, 2, '', '', 0, 0),
(59, 2, 'NotSure_BITSAT', 'Structural', 56, 354, 3, '', '', 0, 0),
(60, 1, 'GRE-Score', 'Decision', 37, 357, NULL, '', '', 0, 0),
(61, 2, 'Value_GRE-Score', 'Structural', 60, 357, 1, '', '', 0, 0),
(62, 2, 'Varies_GRE-Score', 'Structural', 60, 357, 2, '', '', 0, 0),
(63, 2, 'NotSure_GRE-Score', 'Structural', 60, 357, 3, '', '', 0, 0),
(64, 1, 'GMAT-Score', 'Decision', 41, 358, NULL, '', '', 0, 0),
(65, 2, 'Value_GMAT-Score', 'Structural', 64, 358, 1, '', '', 0, 0),
(66, 2, 'Varies_GMAT-Score', 'Structural', 64, 358, 2, '', '', 0, 0),
(67, 2, 'NotSure_GMAT-Score', 'Structural', 64, 358, 3, '', '', 0, 0),
(68, 1, 'CAT-Score', 'Decision', 45, 359, NULL, '', '', 0, 0),
(69, 2, 'Value_CAT-Score', 'Structural', 68, 359, 1, '', '', 0, 0),
(70, 2, 'Varies_CAT-Score', 'Structural', 68, 359, 2, '', '', 0, 0),
(71, 2, 'NotSure_CAT-Score', 'Structural', 68, 359, 3, '', '', 0, 0),
(72, 1, 'JEE-Score', 'Decision', 49, 360, NULL, '', '', 0, 0),
(73, 2, 'Value_JEE-Score', 'Structural', 72, 360, 1, '', '', 0, 0),
(74, 2, 'Varies_JEE-Score', 'Structural', 72, 360, 2, '', '', 0, 0),
(75, 2, 'NotSure_JEE-Score', 'Structural', 72, 360, 3, '', '', 0, 0),
(76, 1, 'NEET-Score', 'Decision', 53, 361, NULL, '', '', 0, 0),
(77, 2, 'Value_NEET-Score', 'Structural', 76, 361, 1, '', '', 0, 0),
(78, 2, 'Varies_NEET-Score', 'Structural', 76, 361, 2, '', '', 0, 0),
(79, 2, 'NotSure_NEET-Score', 'Structural', 76, 361, 3, '', '', 0, 0),
(80, 1, 'BITSAT-Score', 'Decision', 57, 362, NULL, '', '', 0, 0),
(81, 2, 'Value_BITSAT-Score', 'Structural', 80, 362, 1, '', '', 0, 0),
(82, 2, 'Varies_BITSAT-Score', 'Structural', 80, 362, 2, '', '', 0, 0),
(83, 2, 'NotSure_BITSAT-Score', 'Structural', 80, 362, 3, '', '', 0, 0),
(84, 1, 'interview performance', 'Decision', 0, 344, NULL, '', '', 0, 34),
(85, 2, 'Yes_Considered', 'Structural', 84, 344, 1, '', '', 0, 0),
(86, 2, 'No_interview performance', 'Structural', 84, 344, 2, '', '', 0, 0),
(87, 2, 'NotSure_interview performance', 'Structural', 84, 344, 3, '', '', 0, 0),
(88, 1, 'alumni relationship', 'Decision', 0, 345, NULL, '', '', 0, 34),
(89, 2, 'Yes_Considered', 'Structural', 88, 345, 1, '', '', 0, 0),
(90, 2, 'No_alumni relationship', 'Structural', 88, 345, 2, '', '', 0, 0),
(91, 2, 'NotSure_alumni relationship', 'Structural', 88, 345, 3, '', '', 0, 0),
(92, 1, 'state or town of residernce', 'Decision', 0, 346, NULL, '', '', 0, 34),
(93, 2, 'Yes_Considered', 'Structural', 92, 346, 1, '', '', 0, 0),
(94, 2, 'No_state or town of residernce', 'Structural', 92, 346, 2, '', '', 0, 0),
(95, 2, 'NotSure_state or town of residernce', 'Structural', 92, 346, 3, '', '', 0, 0),
(96, 1, 'nationality', 'Decision', 0, 347, NULL, '', '', 0, 34),
(97, 2, 'Yes_Considered', 'Structural', 96, 347, 1, '', '', 0, 0),
(98, 2, 'No_nationality', 'Structural', 96, 347, 2, '', '', 0, 0),
(99, 2, 'NotSure_nationality', 'Structural', 96, 347, 3, '', '', 0, 0),
(100, 1, 'extra curricular activities', 'Decision', 0, 348, NULL, '', '', 0, 34),
(101, 2, 'Yes_Considered', 'Structural', 100, 348, 1, '', '', 0, 0),
(102, 2, 'No_extra curricular activities', 'Structural', 100, 348, 2, '', '', 0, 0),
(103, 2, 'NotSure_extra curricular activities', 'Structural', 100, 348, 3, '', '', 0, 0),
(104, 1, 'Overall Yearly Expenses', 'Decision', 0, 363, NULL, '', '', 0, 0),
(105, 2, 'Value_Overall Yearly Expenses', 'Structural', 104, 363, 1, '', '', 0, 0),
(106, 2, 'Varies_Overall Yearly Expenses', 'Structural', 104, 363, 2, '', '', 0, 0),
(107, 2, 'NotSure_Overall Yearly Expenses', 'Structural', 104, 363, 3, '', '', 0, 0),
(108, 1, 'Tuition', 'Decision', 105, 364, NULL, '', '', 0, 0),
(109, 2, 'Value_Tuition', 'Structural', 108, 364, 1, '', '', 0, 0),
(110, 2, 'Varies_Tuition', 'Structural', 108, 364, 2, '', '', 0, 0),
(111, 2, 'NotSure_Tuition', 'Structural', 108, 364, 3, '', '', 0, 0),
(112, 1, 'Hostel & Boarding', 'Decision', 105, 365, NULL, '', '', 0, 0),
(113, 2, 'Value_Hostel & Boarding', 'Structural', 112, 365, 1, '', '', 0, 0),
(114, 2, 'Varies_Hostel & Boarding', 'Structural', 112, 365, 2, '', '', 0, 0),
(115, 2, 'NotSure_Hostel & Boarding', 'Structural', 112, 365, 3, '', '', 0, 0),
(116, 1, 'Personal & Other', 'Decision', 105, 366, NULL, '', '', 0, 0),
(117, 2, 'Value_Personal & Other', 'Structural', 116, 366, 1, '', '', 0, 0),
(118, 2, 'Varies_Personal & Other', 'Structural', 116, 366, 2, '', '', 0, 0),
(119, 2, 'NotSure_Personal & Other', 'Structural', 116, 366, 3, '', '', 0, 0),
(120, 1, 'Scholarship / Aid ', 'Decision', 0, 367, NULL, '', '', 0, 0),
(121, 2, 'Yes_Yes', 'Structural', 120, 367, 1, '', '', 0, 0),
(122, 2, 'No_Scholarship / Aid ', 'Structural', 120, 367, 2, '', '', 0, 0),
(123, 2, 'NotSure_Scholarship / Aid ', 'Structural', 120, 367, 3, '', '', 0, 0),
(124, 1, 'percentage_Aid', 'Decision', 121, 368, NULL, '', '', 0, 0),
(125, 2, 'percentage_Aid', 'Structural', 124, 368, 1, '', '', 0, 0),
(126, 2, 'percentage_Aid', 'Structural', 124, 368, 2, '', '', 0, 0),
(127, 2, 'percentage_Aid', 'Structural', 124, 368, 3, '', '', 0, 0),
(128, 2, 'percentage_Aid', 'Structural', 124, 368, 4, '', '', 0, 0),
(129, 2, 'percentage_Aid', 'Structural', 124, 368, 5, '', '', 0, 0),
(130, 1, 'Aid amount', 'Decision', 121, 369, NULL, '', '', 0, 0),
(131, 2, 'Value_Aid amount', 'Structural', 130, 369, 1, '', '', 0, 0),
(132, 2, 'Varies_Aid amount', 'Structural', 130, 369, 2, '', '', 0, 0),
(133, 2, 'NotSure_Aid amount', 'Structural', 130, 369, 3, '', '', 0, 0),
(134, 1, 'Loan availability', 'Decision', 0, 370, NULL, '', '', 0, 0),
(135, 2, 'Loan availability', 'Structural', 134, 370, 1, '', '', 0, 0),
(136, 2, 'Loan availability', 'Structural', 134, 370, 2, '', '', 0, 0),
(137, 2, 'Loan availability', 'Structural', 134, 370, 3, '', '', 0, 0),
(138, 2, 'Loan availability', 'Structural', 134, 370, 4, '', '', 0, 0),
(139, 1, 'Loan amount', 'Decision', 0, 371, NULL, '', '', 0, 0),
(140, 2, 'Value_Loan amount', 'Structural', 139, 371, 1, '', '', 0, 0),
(141, 2, 'Varies_Loan amount', 'Structural', 139, 371, 2, '', '', 0, 0),
(142, 2, 'NotSure_Loan amount', 'Structural', 139, 371, 3, '', '', 0, 0),
(143, 1, 'Starting Salary', 'Decision', 0, 372, NULL, '', '', 0, 0),
(144, 2, 'Value_Starting Salary', 'Structural', 143, 372, 1, '', '', 0, 0),
(145, 2, 'Varies_Starting Salary', 'Structural', 143, 372, 2, '', '', 0, 0),
(146, 2, 'NotSure_Starting Salary', 'Structural', 143, 372, 3, '', '', 0, 0),
(147, 1, 'Starting Salary', 'Decision', 0, 373, NULL, '', '', 0, 0),
(148, 2, 'Value_Starting Salary', 'Structural', 147, 373, 1, '', '', 0, 0),
(149, 2, 'Varies_Starting Salary', 'Structural', 147, 373, 2, '', '', 0, 0),
(150, 2, 'NotSure_Starting Salary', 'Structural', 147, 373, 3, '', '', 0, 0),
(151, 1, 'Post 3 year Salary', 'Decision', 0, 374, NULL, '', '', 0, 0),
(152, 2, 'Value_Post 3 year Salary', 'Structural', 151, 374, 1, '', '', 0, 0),
(153, 2, 'Varies_Post 3 year Salary', 'Structural', 151, 374, 2, '', '', 0, 0),
(154, 2, 'NotSure_Post 3 year Salary', 'Structural', 151, 374, 3, '', '', 0, 0),
(155, 1, 'Further studies', 'Decision', 0, 375, NULL, '', '', 0, 0),
(156, 2, 'Further studies', 'Structural', 155, 375, 1, '', '', 0, 0),
(157, 2, 'Further studies', 'Structural', 155, 375, 2, '', '', 0, 0),
(158, 2, 'Further studies', 'Structural', 155, 375, 3, '', '', 0, 0),
(159, 2, 'Further studies', 'Structural', 155, 375, 4, '', '', 0, 0),
(160, 2, 'Further studies', 'Structural', 155, 375, 5, '', '', 0, 0),
(161, 1, 'Starting up (entrepreneurship)', 'Decision', 0, 376, NULL, '', '', 0, 0),
(162, 2, 'Starting up (entrepreneurship)', 'Structural', 161, 376, 1, '', '', 0, 0),
(163, 2, 'Starting up (entrepreneurship)', 'Structural', 161, 376, 2, '', '', 0, 0),
(164, 2, 'Starting up (entrepreneurship)', 'Structural', 161, 376, 3, '', '', 0, 0),
(165, 2, 'Starting up (entrepreneurship)', 'Structural', 161, 376, 4, '', '', 0, 0),
(166, 2, 'Starting up (entrepreneurship)', 'Structural', 161, 376, 5, '', '', 0, 0),
(167, 1, 'On campus Job Interviews', 'Decision', 0, 377, NULL, '', '', 0, 0),
(168, 2, 'Yes_Provided', 'Structural', 167, 377, 1, '', '', 0, 0),
(169, 2, 'No_Not Provided', 'Structural', 167, 377, 2, '', '', 0, 0),
(170, 2, 'NotSure_On campus Job Interviews', 'Structural', 167, 377, 3, '', '', 0, 0),
(171, 1, 'Resume assistance', 'Decision', 0, 378, NULL, '', '', 0, 0),
(172, 2, 'Yes_Provided', 'Structural', 171, 378, 1, '', '', 0, 0),
(173, 2, 'No_Not Provided', 'Structural', 171, 378, 2, '', '', 0, 0),
(174, 2, 'NotSure_Resume assistance', 'Structural', 171, 378, 3, '', '', 0, 0),
(175, 1, 'Alumni Network', 'Decision', 0, 379, NULL, '', '', 0, 0),
(176, 2, 'Yes_Provided', 'Structural', 175, 379, 1, '', '', 0, 0),
(177, 2, 'No_Not Provided', 'Structural', 175, 379, 2, '', '', 0, 0),
(178, 2, 'NotSure_Alumni Network', 'Structural', 175, 379, 3, '', '', 0, 0),
(179, 1, 'Internship Assistance', 'Decision', 0, 380, NULL, '', '', 0, 0),
(180, 2, 'Yes_Provided', 'Structural', 179, 380, 1, '', '', 0, 0),
(181, 2, 'No_Not Provided', 'Structural', 179, 380, 2, '', '', 0, 0),
(182, 2, 'NotSure_Alumni Network', 'Structural', 179, 380, 3, '', '', 0, 0),
(183, 1, 'Available', 'Decision', 0, 381, NULL, '', '', 0, 0),
(184, 2, 'Yes_Available', 'Structural', 183, 381, 1, '', '', 0, 0),
(185, 2, 'No_Available', 'Structural', 183, 381, 2, '', '', 0, 0),
(186, 2, 'NotSure_Available', 'Structural', 183, 381, 3, '', '', 0, 0),
(187, 1, 'Compulsory', 'Decision', 0, 382, NULL, '', '', 0, 0),
(188, 2, 'Yes_Compulsory', 'Structural', 187, 382, 1, '', '', 0, 0),
(189, 2, 'No_Compulsory', 'Structural', 187, 382, 2, '', '', 0, 0),
(190, 2, 'NotSure_Compulsory', 'Structural', 187, 382, 3, '', '', 0, 0),
(191, 1, 'Air Conditioned', 'Decision', 0, 383, NULL, '', '', 0, 0),
(192, 2, 'Yes_Air Conditioned', 'Structural', 191, 383, 1, '', '', 0, 0),
(193, 2, 'No_Air Conditioned', 'Structural', 191, 383, 2, '', '', 0, 0),
(194, 2, 'NotSure_Air Conditioned', 'Structural', 191, 383, 3, '', '', 0, 0),
(195, 1, 'Mess', 'Decision', 0, 384, NULL, '', '', 0, 0),
(196, 2, 'Yes_Mess', 'Structural', 195, 384, 1, '', '', 0, 0),
(197, 2, 'No_Mess', 'Structural', 195, 384, 2, '', '', 0, 0),
(198, 2, 'NotSure_Mess', 'Structural', 195, 384, 3, '', '', 0, 0),
(199, 1, 'Restaurants', 'Decision', 0, 385, NULL, '', '', 0, 0),
(200, 2, 'Value_Restaurants', 'Structural', 199, 385, 1, '', '', 0, 0),
(201, 2, 'NotSure_Restaurants', 'Structural', 199, 385, 2, '', '', 0, 0),
(202, 2, 'Varies_Restaurants', 'Structural', 199, 385, 3, '', '', 0, 0),
(203, 1, 'Veg', 'Decision', 0, 386, NULL, '', '', 0, 0),
(204, 2, 'Yes_Yes', 'Structural', 203, 386, 1, '', '', 0, 0),
(205, 2, 'No_Veg', 'Structural', 203, 386, 2, '', '', 0, 0),
(206, 2, 'NotSure_Veg', 'Structural', 203, 386, 3, '', '', 0, 0),
(207, 1, 'Non Veg', 'Decision', 0, 387, NULL, '', '', 0, 0),
(208, 2, 'Yes_Yes', 'Structural', 207, 387, 1, '', '', 0, 0),
(209, 2, 'No_Non Veg', 'Structural', 207, 387, 2, '', '', 0, 0),
(210, 2, 'NotSure_Non Veg', 'Structural', 207, 387, 3, '', '', 0, 0),
(211, 1, 'Vegan', 'Decision', 0, 388, NULL, '', '', 0, 0),
(212, 2, 'Yes_Yes', 'Structural', 211, 388, 1, '', '', 0, 0),
(213, 2, 'No_Vegan', 'Structural', 211, 388, 2, '', '', 0, 0),
(214, 2, 'NotSure_Vegan', 'Structural', 211, 388, 3, '', '', 0, 0),
(215, 1, 'Timing', 'Decision', 0, 389, NULL, '', '', 0, 0),
(216, 2, 'Timing', 'Structural', 215, 389, 1, '', '', 0, 0),
(217, 2, 'Timing', 'Structural', 215, 389, 2, '', '', 0, 0),
(218, 2, 'Timing', 'Structural', 215, 389, 3, '', '', 0, 0),
(219, 2, 'Timing', 'Structural', 215, 389, 4, '', '', 0, 0),
(220, 1, 'Cricket', 'Decision', 0, 390, NULL, '', '', 0, 35),
(221, 2, 'Yes_Yes', 'Structural', 220, 390, 1, '', '', 0, 0),
(222, 2, 'No_No', 'Structural', 220, 390, 2, '', '', 0, 0),
(223, 2, 'NotSure_Cricket', 'Structural', 220, 390, 3, '', '', 0, 0),
(224, 1, 'Football', 'Decision', 0, 391, NULL, '', '', 0, 35),
(225, 2, 'Yes_Yes', 'Structural', 224, 391, 1, '', '', 0, 0),
(226, 2, 'No_No', 'Structural', 224, 391, 2, '', '', 0, 0),
(227, 2, 'NotSure_Football', 'Structural', 224, 391, 3, '', '', 0, 0),
(228, 1, 'Basketball', 'Decision', 0, 392, NULL, '', '', 0, 35),
(229, 2, 'Yes_Yes', 'Structural', 228, 392, 1, '', '', 0, 0),
(230, 2, 'No_No', 'Structural', 228, 392, 2, '', '', 0, 0),
(231, 2, 'NotSure_Basketball', 'Structural', 228, 392, 3, '', '', 0, 0),
(232, 1, 'Rowing', 'Decision', 0, 393, NULL, '', '', 0, 35),
(233, 2, 'Yes_Yes', 'Structural', 232, 393, 1, '', '', 0, 0),
(234, 2, 'No_No', 'Structural', 232, 393, 2, '', '', 0, 0),
(235, 2, 'NotSure_Rowing', 'Structural', 232, 393, 3, '', '', 0, 0),
(236, 1, 'Ice Hockey', 'Decision', 0, 394, NULL, '', '', 0, 35),
(237, 2, 'Yes_Yes', 'Structural', 236, 394, 1, '', '', 0, 0),
(238, 2, 'No_No', 'Structural', 236, 394, 2, '', '', 0, 0),
(239, 2, 'NotSure_Ice Hockey', 'Structural', 236, 394, 3, '', '', 0, 0),
(240, 1, 'Lacrosse', 'Decision', 0, 395, NULL, '', '', 0, 35),
(241, 2, 'Yes_Yes', 'Structural', 240, 395, 1, '', '', 0, 0),
(242, 2, 'No_No', 'Structural', 240, 395, 2, '', '', 0, 0),
(243, 2, 'NotSure_Lacrosse', 'Structural', 240, 395, 3, '', '', 0, 0),
(244, 1, 'All Track Combined', 'Decision', 0, 396, NULL, '', '', 0, 35),
(245, 2, 'Yes_Yes', 'Structural', 244, 396, 1, '', '', 0, 0),
(246, 2, 'No_No', 'Structural', 244, 396, 2, '', '', 0, 0),
(247, 2, 'NotSure_All Track Combined', 'Structural', 244, 396, 3, '', '', 0, 0),
(248, 1, 'Swimming and Diving', 'Decision', 0, 397, NULL, '', '', 0, 35),
(249, 2, 'Yes_Yes', 'Structural', 248, 397, 1, '', '', 0, 0),
(250, 2, 'No_No', 'Structural', 248, 397, 2, '', '', 0, 0),
(251, 2, 'NotSure_Swimming and Diving', 'Structural', 248, 397, 3, '', '', 0, 0),
(252, 1, 'Soccer', 'Decision', 0, 398, NULL, '', '', 0, 35),
(253, 2, 'Yes_Yes', 'Structural', 252, 398, 1, '', '', 0, 0),
(254, 2, 'No_No', 'Structural', 252, 398, 2, '', '', 0, 0),
(255, 2, 'NotSure_Soccer', 'Structural', 252, 398, 3, '', '', 0, 0),
(256, 1, 'Tennis', 'Decision', 0, 399, NULL, '', '', 0, 35),
(257, 2, 'Yes_Yes', 'Structural', 256, 399, 1, '', '', 0, 0),
(258, 2, 'No_No', 'Structural', 256, 399, 2, '', '', 0, 0),
(259, 2, 'NotSure_Tennis', 'Structural', 256, 399, 3, '', '', 0, 0),
(260, 1, 'Baseball', 'Decision', 0, 400, NULL, '', '', 0, 35),
(261, 2, 'Yes_Yes', 'Structural', 260, 400, 1, '', '', 0, 0),
(262, 2, 'No_No', 'Structural', 260, 400, 2, '', '', 0, 0),
(263, 2, 'NotSure_Baseball', 'Structural', 260, 400, 3, '', '', 0, 0),
(264, 1, 'Volleyball', 'Decision', 0, 401, NULL, '', '', 0, 35),
(265, 2, 'Yes_Yes', 'Structural', 264, 401, 1, '', '', 0, 0),
(266, 2, 'No_No', 'Structural', 264, 401, 2, '', '', 0, 0),
(267, 2, 'NotSure_Volleyball', 'Structural', 264, 401, 3, '', '', 0, 0),
(268, 1, 'Golf', 'Decision', 0, 402, NULL, '', '', 0, 35),
(269, 2, 'Yes_Yes', 'Structural', 268, 402, 1, '', '', 0, 0),
(270, 2, 'No_No', 'Structural', 268, 402, 2, '', '', 0, 0),
(271, 2, 'NotSure_Golf', 'Structural', 268, 402, 3, '', '', 0, 0),
(272, 1, 'Squash', 'Decision', 0, 403, NULL, '', '', 0, 35),
(273, 2, 'Yes_Yes', 'Structural', 272, 403, 1, '', '', 0, 0),
(274, 2, 'No_No', 'Structural', 272, 403, 2, '', '', 0, 0),
(275, 2, 'NotSure_Squash', 'Structural', 272, 403, 3, '', '', 0, 0),
(276, 1, 'Softball', 'Decision', 0, 404, NULL, '', '', 0, 35),
(277, 2, 'Yes_Yes', 'Structural', 276, 404, 1, '', '', 0, 0),
(278, 2, 'No_No', 'Structural', 276, 404, 2, '', '', 0, 0),
(279, 2, 'NotSure_Softball', 'Structural', 276, 404, 3, '', '', 0, 0),
(280, 1, 'Water Polo', 'Decision', 0, 405, NULL, '', '', 0, 35),
(281, 2, 'Yes_Yes', 'Structural', 280, 405, 1, '', '', 0, 0),
(282, 2, 'No_No', 'Structural', 280, 405, 2, '', '', 0, 0),
(283, 2, 'NotSure_Water Polo', 'Structural', 280, 405, 3, '', '', 0, 0),
(284, 1, 'Wrestling', 'Decision', 0, 406, NULL, '', '', 0, 35),
(285, 2, 'Yes_Yes', 'Structural', 284, 406, 1, '', '', 0, 0),
(286, 2, 'No_No', 'Structural', 284, 406, 2, '', '', 0, 0),
(287, 2, 'NotSure_Wrestling', 'Structural', 284, 406, 3, '', '', 0, 0),
(288, 1, 'Field Hockey', 'Decision', 0, 407, NULL, '', '', 0, 35),
(289, 2, 'Yes_Yes', 'Structural', 288, 407, 1, '', '', 0, 0),
(290, 2, 'No_No', 'Structural', 288, 407, 2, '', '', 0, 0),
(291, 2, 'NotSure_Field Hockey', 'Structural', 288, 407, 3, '', '', 0, 0),
(292, 1, 'Skiing', 'Decision', 0, 408, NULL, '', '', 0, 35),
(293, 2, 'Yes_Yes', 'Structural', 292, 408, 1, '', '', 0, 0),
(294, 2, 'No_No', 'Structural', 292, 408, 2, '', '', 0, 0),
(295, 2, 'NotSure_Skiing', 'Structural', 292, 408, 3, '', '', 0, 0),
(296, 1, 'Fencing', 'Decision', 0, 409, NULL, '', '', 0, 35),
(297, 2, 'Yes_Yes', 'Structural', 296, 409, 1, '', '', 0, 0),
(298, 2, 'No_No', 'Structural', 296, 409, 2, '', '', 0, 0),
(299, 2, 'NotSure_Fencing', 'Structural', 296, 409, 3, '', '', 0, 0),
(300, 1, 'Sailing', 'Decision', 0, 410, NULL, '', '', 0, 35),
(301, 2, 'Yes_Yes', 'Structural', 300, 410, 1, '', '', 0, 0),
(302, 2, 'No_No', 'Structural', 300, 410, 2, '', '', 0, 0),
(303, 2, 'NotSure_Sailing', 'Structural', 300, 410, 3, '', '', 0, 0),
(304, 1, 'Air conditioned', 'Decision', 0, 411, NULL, '', '', 0, 0),
(305, 2, 'Yes_Yes', 'Structural', 304, 411, 1, '', '', 0, 0),
(306, 2, 'No_No', 'Structural', 304, 411, 2, '', '', 0, 0),
(307, 2, 'NotSure_Air conditioned', 'Structural', 304, 411, 3, '', '', 0, 0),
(308, 1, 'AV facilities', 'Decision', 0, 412, NULL, '', '', 0, 0),
(309, 2, 'Yes_Yes', 'Structural', 308, 412, 1, '', '', 0, 0),
(310, 2, 'No_No', 'Structural', 308, 412, 2, '', '', 0, 0),
(311, 2, 'NotSure_AV facilities', 'Structural', 308, 412, 3, '', '', 0, 0),
(312, 1, 'Video conferencing', 'Decision', 0, 413, NULL, '', '', 0, 0),
(313, 2, 'Yes_Yes', 'Structural', 312, 413, 1, '', '', 0, 0),
(314, 2, 'No_No', 'Structural', 312, 413, 2, '', '', 0, 0),
(315, 2, 'NotSure_Video conferencing', 'Structural', 312, 413, 3, '', '', 0, 0),
(316, 1, 'Specialized Labs', 'Decision', 0, 414, NULL, '', '', 0, 0),
(317, 2, 'Yes_Yes', 'Structural', 316, 414, 1, '', '', 0, 0),
(318, 2, 'No_No', 'Structural', 316, 414, 2, '', '', 0, 0),
(319, 2, 'NotSure_Specialized Labs', 'Structural', 316, 414, 3, '', '', 0, 0),
(320, 1, 'Library', 'Decision', 0, 415, NULL, '', '', 0, 0),
(321, 2, 'Yes_Yes', 'Structural', 320, 415, 1, '', '', 0, 0),
(322, 2, 'No_No', 'Structural', 320, 415, 2, '', '', 0, 0),
(323, 2, 'NotSure_Library', 'Structural', 320, 415, 3, '', '', 0, 0),
(324, 1, 'Seating_Library', 'Decision', 321, 416, NULL, '', '', 0, 0),
(325, 2, 'Value_Seating_Library', 'Structural', 324, 416, 1, '', '', 0, 0),
(326, 2, 'Varies_Seating_Library', 'Structural', 324, 416, 2, '', '', 0, 0),
(327, 2, 'NotSure_Seating_Library', 'Structural', 324, 416, 3, '', '', 0, 0),
(328, 1, 'Hospital / Medical Facilities', 'Decision', 0, 417, NULL, '', '', 0, 0),
(329, 2, 'Yes_Hospital / Medical Facilities', 'Structural', 328, 417, 1, '', '', 0, 0),
(330, 2, 'No_Hospital / Medical Facilities', 'Structural', 328, 417, 2, '', '', 0, 0),
(331, 2, 'NotSure_Hospital / Medical Facilities', 'Structural', 328, 417, 3, '', '', 0, 0),
(332, 1, 'Auditorium', 'Decision', 0, 418, NULL, '', '', 0, 0),
(333, 2, 'Yes_Yes', 'Structural', 332, 418, 1, '', '', 0, 0),
(334, 2, 'No_No', 'Structural', 332, 418, 2, '', '', 0, 0),
(335, 2, 'NotSure_Auditorium', 'Structural', 332, 418, 3, '', '', 0, 0),
(336, 1, 'Seating_Auditorium', 'Decision', 333, 419, NULL, '', '', 0, 0),
(337, 2, 'Value_Seating_Auditorium', 'Structural', 336, 419, 1, '', '', 0, 0),
(338, 2, 'Varies_Seating_Auditorium', 'Structural', 336, 419, 2, '', '', 0, 0),
(339, 2, 'NotSure_Seating_Auditorium', 'Structural', 336, 419, 3, '', '', 0, 0),
(340, 1, 'Internet / Wifi', 'Decision', 0, 420, NULL, '', '', 0, 0),
(341, 2, 'Yes_Yes', 'Structural', 340, 420, 1, '', '', 0, 0),
(342, 2, 'No_No', 'Structural', 340, 420, 2, '', '', 0, 0),
(343, 2, 'NotSure_Internet / Wifi', 'Structural', 340, 420, 3, '', '', 0, 0),
(344, 1, 'Salon', 'Decision', 0, 421, NULL, '', '', 0, 0),
(345, 2, 'Yes_Yes', 'Structural', 344, 421, 1, '', '', 0, 0),
(346, 2, 'No_No', 'Structural', 344, 421, 2, '', '', 0, 0),
(347, 2, 'NotSure_Salon', 'Structural', 344, 421, 3, '', '', 0, 0),
(348, 1, 'Supermarket', 'Decision', 0, 422, NULL, '', '', 0, 0),
(349, 2, 'Yes_Yes', 'Structural', 348, 422, 1, '', '', 0, 0),
(350, 2, 'No_No', 'Structural', 348, 422, 2, '', '', 0, 0),
(351, 2, 'NotSure_Supermarket', 'Structural', 348, 422, 3, '', '', 0, 0),
(352, 1, 'Bank / ATM', 'Decision', 0, 423, NULL, '', '', 0, 0),
(353, 2, 'Yes_Yes', 'Structural', 352, 423, 1, '', '', 0, 0),
(354, 2, 'No_No', 'Structural', 352, 423, 2, '', '', 0, 0),
(355, 2, 'NotSure_Bank / ATM', 'Structural', 352, 423, 3, '', '', 0, 0),
(356, 1, 'Campus activity', 'Decision', 0, 424, NULL, '', '', 0, 0),
(357, 2, 'Campus activity', 'Structural', 356, 424, 1, '', '', 0, 0),
(358, 2, 'Campus activity', 'Structural', 356, 424, 2, '', '', 0, 0),
(359, 2, 'Campus activity', 'Structural', 356, 424, 3, '', '', 0, 0),
(360, 2, 'Campus activity', 'Structural', 356, 424, 4, '', '', 0, 0),
(361, 2, 'Campus activity', 'Structural', 356, 424, 5, '', '', 0, 0),
(362, 1, 'Parties', 'Decision', 0, 425, NULL, '', '', 0, 0),
(363, 2, 'Parties', 'Structural', 362, 425, 1, '', '', 0, 0),
(364, 2, 'Parties', 'Structural', 362, 425, 2, '', '', 0, 0),
(365, 2, 'Parties', 'Structural', 362, 425, 3, '', '', 0, 0),
(366, 2, 'Parties', 'Structural', 362, 425, 4, '', '', 0, 0),
(367, 2, 'Parties', 'Structural', 362, 425, 5, '', '', 0, 0),
(368, 1, 'Curfew-Male', 'Decision', 0, 426, NULL, '', '', 0, 0),
(369, 2, 'Yes_Yes', 'Structural', 368, 426, 1, '', '', 0, 0),
(370, 2, 'No_No', 'Structural', 368, 426, 2, '', '', 0, 0),
(371, 2, 'NotSure_Curfew-Male', 'Structural', 368, 426, 3, '', '', 0, 0),
(372, 1, 'Time_Curfew-Male', 'Decision', 369, 427, NULL, '', '', 0, 0),
(373, 2, 'Value_Time_Curfew-Male', 'Structural', 372, 427, 1, '', '', 0, 0),
(374, 2, 'Varies_Time_Curfew-Male', 'Structural', 372, 427, 2, '', '', 0, 0),
(375, 2, 'NotSure_Time_Curfew-Male', 'Structural', 372, 427, 3, '', '', 0, 0),
(376, 1, 'Curfew-Female', 'Decision', 0, 428, NULL, '', '', 0, 0),
(377, 2, 'Yes_Yes', 'Structural', 376, 428, 1, '', '', 0, 0),
(378, 2, 'No_No', 'Structural', 376, 428, 2, '', '', 0, 0),
(379, 2, 'NotSure_Curfew-Female', 'Structural', 376, 428, 3, '', '', 0, 0),
(380, 1, 'Time_Curfew-Female', 'Decision', 377, 429, NULL, '', '', 0, 0),
(381, 2, 'Value_Time_Curfew-Female', 'Structural', 380, 429, 1, '', '', 0, 0),
(382, 2, 'Varies_Time_Curfew-Female', 'Structural', 380, 429, 2, '', '', 0, 0),
(383, 2, 'NotSure_Time_Curfew-Female', 'Structural', 380, 429, 3, '', '', 0, 0),
(384, 1, 'Social/Cultural', 'Decision', 0, 430, NULL, '', '', 0, 0),
(385, 2, 'Yes_Yes', 'Structural', 384, 430, 1, '', '', 0, 0),
(386, 2, 'No_No', 'Structural', 384, 430, 2, '', '', 0, 0),
(387, 2, 'NotSure_Social/Cultural', 'Structural', 384, 430, 3, '', '', 0, 0),
(388, 1, 'Year_Social/Cultural', 'Decision', 385, 431, NULL, '', '', 0, 0),
(389, 2, 'Year_Social/Cultural', 'Structural', 388, 431, 1, '', '', 0, 0),
(390, 2, 'Year_Social/Cultural', 'Structural', 388, 431, 2, '', '', 0, 0),
(391, 2, 'Year_Social/Cultural', 'Structural', 388, 431, 3, '', '', 0, 0),
(392, 1, 'Academic', 'Decision', 0, 432, NULL, '', '', 0, 0),
(393, 2, 'Yes_Yes', 'Structural', 392, 432, 1, '', '', 0, 0),
(394, 2, 'No_No', 'Structural', 392, 432, 2, '', '', 0, 0),
(395, 2, 'NotSure_Academic', 'Structural', 392, 432, 3, '', '', 0, 0),
(396, 1, 'Year_Academic', 'Decision', 393, 433, NULL, '', '', 0, 0),
(397, 2, 'Year_Academic', 'Structural', 396, 433, 1, '', '', 0, 0),
(398, 2, 'Year_Academic', 'Structural', 396, 433, 2, '', '', 0, 0),
(399, 2, 'Year_Academic', 'Structural', 396, 433, 3, '', '', 0, 0),
(400, 1, 'Criminal Offences', 'Decision', 0, 434, NULL, '', '', 0, 0),
(401, 2, 'Criminal Offences', 'Structural', 400, 434, 1, '', '', 0, 0),
(402, 2, 'Criminal Offences', 'Structural', 400, 434, 2, '', '', 0, 0),
(403, 2, 'Criminal Offences', 'Structural', 400, 434, 3, '', '', 0, 0),
(404, 2, 'Criminal Offences', 'Structural', 400, 434, 4, '', '', 0, 0),
(405, 2, 'Criminal Offences', 'Structural', 400, 434, 5, '', '', 0, 0),
(406, 1, 'Sexual Assaults', 'Decision', 0, 435, NULL, '', '', 0, 0),
(407, 2, 'Sexual Assaults', 'Structural', 406, 435, 1, '', '', 0, 0),
(408, 2, 'Sexual Assaults', 'Structural', 406, 435, 2, '', '', 0, 0),
(409, 2, 'Sexual Assaults', 'Structural', 406, 435, 3, '', '', 0, 0),
(410, 2, 'Sexual Assaults', 'Structural', 406, 435, 4, '', '', 0, 0),
(411, 2, 'Sexual Assaults', 'Structural', 406, 435, 5, '', '', 0, 0),
(412, 1, 'Hate crimes', 'Decision', 0, 436, NULL, '', '', 0, 0),
(413, 2, 'Hate crimes', 'Structural', 412, 436, 1, '', '', 0, 0),
(414, 2, 'Hate crimes', 'Structural', 412, 436, 2, '', '', 0, 0),
(415, 2, 'Hate crimes', 'Structural', 412, 436, 3, '', '', 0, 0),
(416, 2, 'Hate crimes', 'Structural', 412, 436, 4, '', '', 0, 0),
(417, 2, 'Hate crimes', 'Structural', 412, 436, 5, '', '', 0, 0),
(418, 1, 'Gender Ratio', 'Decision', 0, 437, NULL, '', '', 0, 0),
(419, 2, 'Value_Gender Ratio', 'Structural', 418, 437, 1, '', '', 0, 0),
(420, 2, 'Varies_Gender Ratio', 'Structural', 418, 437, 2, '', '', 0, 0),
(421, 2, 'NotSure_Gender Ratio', 'Structural', 418, 437, 3, '', '', 0, 0),
(422, 1, 'Native Country', 'Decision', 0, 438, NULL, '', '', 0, 0),
(423, 2, 'Value_Native Country', 'Structural', 422, 438, 1, '', '', 0, 0),
(424, 2, 'Varies_Native Country', 'Structural', 422, 438, 2, '', '', 0, 0),
(425, 2, 'NotSure_Native Country', 'Structural', 422, 438, 3, '', '', 0, 0),
(426, 1, 'Native State', 'Decision', 0, 439, NULL, '', '', 0, 0),
(427, 2, 'Value_Native State', 'Structural', 426, 439, 1, '', '', 0, 0),
(428, 2, 'Varies_Native State', 'Structural', 426, 439, 2, '', '', 0, 0),
(429, 2, 'NotSure_Native State', 'Structural', 426, 439, 3, '', '', 0, 0),
(430, 1, 'Resident', 'Decision', 0, 440, NULL, '', '', 0, 0),
(431, 2, 'Value_Resident', 'Structural', 430, 440, 1, '', '', 0, 0),
(432, 2, 'Varies_Resident', 'Structural', 430, 440, 2, '', '', 0, 0),
(433, 2, 'NotSure_Resident', 'Structural', 430, 440, 3, '', '', 0, 0),
(434, 1, 'Number', 'Decision', 0, 441, NULL, '', '', 0, 0),
(435, 2, 'Number', 'Structural', 434, 441, 1, '', '', 0, 0),
(436, 2, 'Number', 'Structural', 434, 441, 2, '', '', 0, 0),
(437, 2, 'Number', 'Structural', 434, 441, 3, '', '', 0, 0),
(438, 2, 'Number', 'Structural', 434, 441, 4, '', '', 0, 0),
(439, 2, 'Number', 'Structural', 434, 441, 5, '', '', 0, 0),
(440, 1, 'Elections', 'Decision', 0, 442, NULL, '', '', 0, 0),
(441, 2, 'Yes_Yes', 'Structural', 440, 442, 1, '', '', 0, 0),
(442, 2, 'No_No', 'Structural', 440, 442, 2, '', '', 0, 0),
(443, 2, 'NotSure_Elections', 'Structural', 440, 442, 3, '', '', 0, 0),
(444, 1, 'Student Government', 'Decision', 0, 443, NULL, '', '', 0, 0),
(445, 2, 'Yes_Yes', 'Structural', 444, 443, 1, '', '', 0, 0),
(446, 2, 'No_No', 'Structural', 444, 443, 2, '', '', 0, 0),
(447, 2, 'NotSure_Student Government', 'Structural', 444, 443, 3, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `AttributeTable`
--

CREATE TABLE `AttributeTable` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `Node_ID` int(11) NOT NULL,
  `Attr_String` varbinary(500) NOT NULL DEFAULT '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Attr_Bulk_Upload`
--

CREATE TABLE `Attr_Bulk_Upload` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `Node_ID` int(11) NOT NULL,
  `Attr_String` varbinary(500) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `value_attr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Attr_Position`
--

CREATE TABLE `Attr_Position` (
  `Node_ID` int(11) NOT NULL,
  `Node_Pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Attr_Position`
--

INSERT INTO `Attr_Position` (`Node_ID`, `Node_Pos`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(105, 105),
(106, 106),
(107, 107),
(108, 108),
(109, 109),
(110, 110),
(111, 111),
(112, 112),
(113, 113),
(114, 114),
(115, 115),
(116, 116),
(117, 117),
(118, 118),
(119, 119),
(120, 120),
(121, 121),
(122, 122),
(123, 123),
(124, 124),
(125, 125),
(126, 126),
(127, 127),
(128, 128),
(129, 129),
(130, 130),
(131, 131),
(132, 132),
(133, 133),
(134, 134),
(135, 135),
(136, 136),
(137, 137),
(138, 138),
(139, 139),
(140, 140),
(141, 141),
(142, 142),
(143, 143),
(144, 144),
(145, 145),
(146, 146),
(147, 147),
(148, 148),
(149, 149),
(150, 150),
(151, 151),
(152, 152),
(153, 153),
(154, 154),
(155, 155),
(156, 156),
(157, 157),
(158, 158),
(159, 159),
(160, 160),
(161, 161),
(162, 162),
(163, 163),
(164, 164),
(165, 165),
(166, 166),
(167, 167),
(168, 168),
(169, 169),
(170, 170),
(171, 171),
(172, 172),
(173, 173),
(174, 174),
(175, 175),
(176, 176),
(177, 177),
(178, 178),
(179, 179),
(180, 180),
(181, 181),
(182, 182),
(183, 183),
(184, 184),
(185, 185),
(186, 186),
(187, 187),
(188, 188),
(189, 189),
(190, 190),
(191, 191),
(192, 192),
(193, 193),
(194, 194),
(195, 195),
(196, 196),
(197, 197),
(198, 198),
(199, 199),
(200, 200),
(201, 201),
(202, 202),
(203, 203),
(204, 204),
(205, 205),
(206, 206),
(207, 207),
(208, 208),
(209, 209),
(210, 210),
(211, 211),
(212, 212),
(213, 213),
(214, 214),
(215, 215),
(216, 216),
(217, 217),
(218, 218),
(219, 219),
(220, 220),
(221, 221),
(222, 222),
(223, 223),
(224, 224),
(225, 225),
(226, 226),
(227, 227),
(228, 228),
(229, 229),
(230, 230),
(231, 231),
(232, 232),
(233, 233),
(234, 234),
(235, 235),
(236, 236),
(237, 237),
(238, 238),
(239, 239),
(240, 240),
(241, 241),
(242, 242),
(243, 243),
(244, 244),
(245, 245),
(246, 246),
(247, 247),
(248, 248),
(249, 249),
(250, 250),
(251, 251),
(252, 252),
(253, 253),
(254, 254),
(255, 255),
(256, 256),
(257, 257),
(258, 258),
(259, 259),
(260, 260),
(261, 261),
(262, 262),
(263, 263),
(264, 264),
(265, 265),
(266, 266),
(267, 267),
(268, 268),
(269, 269),
(270, 270),
(271, 271),
(272, 272),
(273, 273),
(274, 274),
(275, 275),
(276, 276),
(277, 277),
(278, 278),
(279, 279),
(280, 280),
(281, 281),
(282, 282),
(283, 283),
(284, 284),
(285, 285),
(286, 286),
(287, 287),
(288, 288),
(289, 289),
(290, 290),
(291, 291),
(292, 292),
(293, 293),
(294, 294),
(295, 295),
(296, 296),
(297, 297),
(298, 298),
(299, 299),
(300, 300),
(301, 301),
(302, 302),
(303, 303),
(304, 304),
(305, 305),
(306, 306),
(307, 307),
(308, 308),
(309, 309),
(310, 310),
(311, 311),
(312, 312),
(313, 313),
(314, 314),
(315, 315),
(316, 316),
(317, 317),
(318, 318),
(319, 319),
(320, 320),
(321, 321),
(322, 322),
(323, 323),
(324, 324),
(325, 325),
(326, 326),
(327, 327),
(328, 328),
(329, 329),
(330, 330),
(331, 331),
(332, 332),
(333, 333),
(334, 334),
(335, 335),
(336, 336),
(337, 337),
(338, 338),
(339, 339),
(340, 340),
(341, 341),
(342, 342),
(343, 343),
(344, 344),
(345, 345),
(346, 346),
(347, 347),
(348, 348),
(349, 349),
(350, 350),
(351, 351),
(352, 352),
(353, 353),
(354, 354),
(355, 355),
(356, 356),
(357, 357),
(358, 358),
(359, 359),
(360, 360),
(361, 361),
(362, 362),
(363, 363),
(364, 364),
(365, 365),
(366, 366),
(367, 367),
(368, 368),
(369, 369),
(370, 370),
(371, 371),
(372, 372),
(373, 373),
(374, 374),
(375, 375),
(376, 376),
(377, 377),
(378, 378),
(379, 379),
(380, 380),
(381, 381),
(382, 382),
(383, 383),
(384, 384),
(385, 385),
(386, 386),
(387, 387),
(388, 388),
(389, 389),
(390, 390),
(391, 391),
(392, 392),
(393, 393),
(394, 394),
(395, 395),
(396, 396),
(397, 397),
(398, 398),
(399, 399),
(400, 400),
(401, 401),
(402, 402),
(403, 403),
(404, 404),
(405, 405),
(406, 406),
(407, 407),
(408, 408),
(409, 409),
(410, 410),
(411, 411),
(412, 412),
(413, 413),
(414, 414),
(415, 415),
(416, 416),
(417, 417),
(418, 418),
(419, 419),
(420, 420),
(421, 421),
(422, 422),
(423, 423),
(424, 424),
(425, 425),
(426, 426),
(427, 427),
(428, 428),
(429, 429),
(430, 430),
(431, 431),
(432, 432),
(433, 433),
(434, 434),
(435, 435),
(436, 436),
(437, 437),
(438, 438),
(439, 439),
(440, 440),
(441, 441),
(442, 442),
(443, 443),
(444, 444),
(445, 445),
(446, 446),
(447, 447);

-- --------------------------------------------------------

--
-- Table structure for table `autoupdate`
--

CREATE TABLE `autoupdate` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college1` varchar(255) NOT NULL,
  `college2` varchar(255) NOT NULL,
  `data_collname` varchar(255) NOT NULL,
  `college_url` varchar(255) NOT NULL,
  `admission` varchar(255) NOT NULL,
  `cutoff` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `college_type` varchar(255) NOT NULL,
  `quality_staff` varchar(255) NOT NULL,
  `no_students` int(11) NOT NULL,
  `avg_classes` int(11) NOT NULL,
  `off_days` int(11) NOT NULL,
  `staff_perm_temp` int(11) NOT NULL,
  `no_degree` varchar(255) NOT NULL,
  `livingexpenses` int(11) NOT NULL,
  `exam_structure` varchar(255) NOT NULL,
  `college_events` varchar(255) NOT NULL,
  `intern_mandatory` varchar(255) NOT NULL,
  `cutoff_exam` varchar(255) NOT NULL,
  `student_ratio` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `loan` varchar(255) NOT NULL,
  `cost_scholarship` int(11) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `ref_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Bias_Table1`
--

CREATE TABLE `Bias_Table1` (
  `CID` int(11) NOT NULL,
  `NA` tinyint(4) NOT NULL,
  `S_Node` int(11) DEFAULT NULL,
  `P_Node` int(11) DEFAULT NULL,
  `COLL_ID` int(11) DEFAULT NULL,
  `VAL_TYPE` tinyint(4) DEFAULT NULL,
  `VAL_ID` int(11) NOT NULL,
  `NUM_VAL` int(11) DEFAULT NULL,
  `TEXT_VAL` varchar(100) DEFAULT NULL,
  `NUM_VAL_UNIT` varchar(100) DEFAULT NULL,
  `YEAR_START` int(11) DEFAULT NULL,
  `YEAR_END` int(11) DEFAULT NULL,
  `VAL_CRED` float NOT NULL DEFAULT '0.5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Bulk_Upload`
--

CREATE TABLE `Bulk_Upload` (
  `CID` int(11) NOT NULL,
  `Coll_ID` int(11) NOT NULL,
  `Answer_String` varbinary(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bulk_Upload`
--

INSERT INTO `Bulk_Upload` (`CID`, `Coll_ID`, `Answer_String`) VALUES
(1001, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1002, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1003, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1004, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1005, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1006, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1007, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1008, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1009, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
(1010, 34, 0x3031303130303031303031313030303030313131303030303130303030303030303030313130303030303030303130303130303030303030303030303030303030313130313131303031303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031303131313030303030303130303130303030313030303030303131313030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030);

-- --------------------------------------------------------

--
-- Table structure for table `Club_Questions`
--

CREATE TABLE `Club_Questions` (
  `Club_ID` int(11) NOT NULL,
  `Club_QID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Club_Questions`
--

INSERT INTO `Club_Questions` (`Club_ID`, `Club_QID`) VALUES
(1, 260),
(2, 261),
(3, 262),
(4, 263),
(5, 264),
(6, 265),
(7, 266),
(8, 267),
(9, 268),
(10, 269),
(11, 270),
(12, 271),
(13, 272),
(14, 273),
(15, 274),
(16, 275),
(17, 276),
(18, 277),
(19, 278),
(20, 279),
(21, 280),
(22, 281),
(23, 282),
(24, 283),
(25, 284),
(26, 285),
(27, 286),
(28, 287),
(29, 288),
(30, 289),
(31, 315),
(32, 355),
(33, 356),
(34, 355),
(35, 444);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `COLL_ID` int(11) NOT NULL,
  `fb_colg_id` bigint(18) DEFAULT NULL,
  `COLL_NAME` varchar(255) NOT NULL,
  `College_String` varbinary(1100) NOT NULL DEFAULT '01111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111000000000000000000000000000000000000000000000000000',
  `CountryCode` varchar(3) DEFAULT 'Int',
  `Views` int(11) DEFAULT '0',
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`COLL_ID`, `fb_colg_id`, `COLL_NAME`, `College_String`, `CountryCode`, `Views`, `latitude`, `longitude`, `city`) VALUES
(2, NULL, 'IIIT Hyderabad', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 161, NULL, NULL, NULL),
(3, NULL, 'IIT Delhi', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 2, NULL, NULL, NULL),
(4, NULL, 'IIT Bombay', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 1, 19.1334, 72.9133, 'Bombay'),
(5, NULL, 'IIT Kharagpur', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(6, NULL, 'IIT Madras', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 308, NULL, NULL, NULL),
(7, NULL, 'IIT Kanpur', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(8, NULL, 'IIT Guwahati', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(9, NULL, 'IIT Indore', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(11, NULL, 'IIT Mandi', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 2, NULL, NULL, NULL),
(12, NULL, 'IIT Hyderabad', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(13, NULL, 'IIT Goa', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(14, NULL, 'IIT Palakkad', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(15, NULL, 'IIT Bhubaneshwar', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(16, NULL, 'IIT BHU(Varansi)', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(17, NULL, 'NIT Kurukshetra', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(18, NULL, 'NIT Calicut', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(19, NULL, 'NIT Warangal', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(20, NULL, 'NIT Srinagar', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(21, 551982274933123, 'National Institute of Technology, Durgapur', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, 23.5483, 87.2914, 'Durgapur'),
(29, NULL, 'test123', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 63, NULL, NULL, NULL),
(30, NULL, 'testing123', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 192, 29.8649, 77.8966, NULL),
(31, NULL, 'IIT Roorkee', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 515, NULL, NULL, NULL);
INSERT INTO `college` (`COLL_ID`, `fb_colg_id`, `COLL_NAME`, `College_String`, `CountryCode`, `Views`, `latitude`, `longitude`, `city`) VALUES
(34, NULL, 'bits pilani', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 188, 28.364, 75.587, NULL),
(40, NULL, 'giddalur public school', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(41, NULL, 'iiit india', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(42, NULL, 'ASRAM', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(43, NULL, 'ISM Dhanbad', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(44, NULL, 'Good Shephard English Medium School', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 0, NULL, NULL, NULL),
(160, NULL, 'College160', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 19, NULL, NULL, NULL),
(1000, NULL, 'IIT Ropar', 0x3031313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in', 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coll_specific_leaderboard`
--

CREATE TABLE `coll_specific_leaderboard` (
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `total_attempted` int(11) NOT NULL DEFAULT '0',
  `answered` int(11) NOT NULL DEFAULT '0',
  `not_answered` int(11) NOT NULL DEFAULT '0',
  `user_coll_cred` int(11) NOT NULL DEFAULT '0',
  `num_ques` int(11) NOT NULL DEFAULT '0',
  `max_id` int(11) NOT NULL DEFAULT '1',
  `record_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `Country_Code` varchar(3) NOT NULL,
  `Country_Name` varchar(50) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `Units_per_USD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`Country_Code`, `Country_Name`, `currency_name`, `currency_code`, `Units_per_USD`) VALUES
('in', 'India', 'Indian Rupee', 'INR', 66.76),
('Int', 'International', 'US Dollar', 'USD', 1),
('us', 'United States', 'US Dollar', 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `NODE_ID` int(11) NOT NULL,
  `ATTRIBUTENODE_ID` int(11) DEFAULT NULL,
  `R_ID` int(11) NOT NULL,
  `COMMENTS` text,
  `user_cred` float NOT NULL,
  `N_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flag_response`
--

CREATE TABLE `flag_response` (
  `R_ID` int(11) NOT NULL,
  `Response` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flag_response`
--

INSERT INTO `flag_response` (`R_ID`, `Response`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `forum_answers`
--

CREATE TABLE `forum_answers` (
  `ansid` int(11) NOT NULL,
  `answer` varchar(5000) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `comments` tinyint(1) NOT NULL DEFAULT '0',
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_answer_comments`
--

CREATE TABLE `forum_answer_comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_notifications`
--

CREATE TABLE `forum_notifications` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `notification` varchar(500) NOT NULL,
  `qid` int(11) NOT NULL DEFAULT '-1',
  `ansid` int(11) NOT NULL DEFAULT '-1',
  `doerid` int(11) NOT NULL,
  `activity` enum('UPVOTED','COMMENTED','ANSWERED','ASKED') NOT NULL,
  `unseen` tinyint(1) NOT NULL DEFAULT '1',
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions`
--

CREATE TABLE `forum_questions` (
  `qid` int(11) NOT NULL,
  `question` varchar(5000) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT '0',
  `downvotes` int(11) NOT NULL DEFAULT '0',
  `comments` tinyint(1) NOT NULL DEFAULT '0',
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_questions_answers`
--

CREATE TABLE `forum_questions_answers` (
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `ansid` int(11) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_answer_image`
--

CREATE TABLE `forum_question_answer_image` (
  `qid` int(11) DEFAULT NULL,
  `ansid` int(11) DEFAULT NULL,
  `imagename` varchar(50) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_comments`
--

CREATE TABLE `forum_question_comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_question_views`
--

CREATE TABLE `forum_question_views` (
  `qid` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_tags`
--

CREATE TABLE `forum_tags` (
  `qid` int(11) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_users_questions`
--

CREATE TABLE `forum_users_questions` (
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_answer_comments`
--

CREATE TABLE `forum_user_answer_comments` (
  `cid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_answer_votes`
--

CREATE TABLE `forum_user_answer_votes` (
  `cid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `upvoted` tinyint(1) NOT NULL DEFAULT '1',
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_dt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `voted` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_follow_questions`
--

CREATE TABLE `forum_user_follow_questions` (
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `follow` tinyint(1) NOT NULL DEFAULT '1',
  `up_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_question_comments`
--

CREATE TABLE `forum_user_question_comments` (
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `cr_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_user_question_votes`
--

CREATE TABLE `forum_user_question_votes` (
  `cid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `upvoted` tinyint(1) NOT NULL DEFAULT '1',
  `up_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `voted` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ignored_keywords`
--

CREATE TABLE `ignored_keywords` (
  `keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ignored_keywords`
--

INSERT INTO `ignored_keywords` (`keyword`) VALUES
('College'),
('college');

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_log_table`
--

CREATE TABLE `nikhil_log_table` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `CID_SESSION_ID` int(11) NOT NULL,
  `ACTION` int(11) NOT NULL,
  `TYPE` int(11) NOT NULL,
  `TEXT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nikhil_log_table`
--

INSERT INTO `nikhil_log_table` (`ID`, `CID`, `CID_SESSION_ID`, `ACTION`, `TYPE`, `TEXT`) VALUES
(1, 1004, 1499261643, 7, 2, 'College160'),
(2, 1003, 1499264107, 7, 2, 'bits pilani'),
(3, 1010, 1499264107, 7, 2, 'bits pilani'),
(4, 1010, 1499271873, 7, 2, 'bits pilani'),
(5, 1010, 1499272224, 7, 2, 'bits pilani'),
(6, 1010, 1499372734, 7, 2, 'College160'),
(7, 1005, 1499374606, 7, 2, 'College160'),
(8, 1009, 1499375032, 7, 2, 'College160'),
(9, 1009, 1499376849, 7, 2, 'College160'),
(10, 1004, 1499517707, 7, 2, 'bits pilani'),
(11, 1004, 1499518014, 7, 2, 'bits pilani'),
(12, 1010, 1499518338, 7, 2, 'bits pilani'),
(13, 1010, 1499518338, 7, 2, 'bits pilani'),
(14, 1010, 1499518338, 7, 2, 'bits pilani'),
(15, 1010, 1499518338, 7, 2, 'bits pilani'),
(16, 1010, 1499518963, 7, 2, 'bits pilani'),
(17, 1010, 1499519490, 7, 2, 'bits pilani'),
(18, 1010, 1499519809, 7, 2, 'bits pilani'),
(19, 1010, 1499519809, 7, 2, 'bits pilani'),
(20, 1010, 1499519809, 7, 2, 'bits pilani'),
(21, 1010, 1499519809, 7, 2, 'bits pilani'),
(22, 1010, 1499519809, 7, 2, 'bits pilani'),
(23, 1010, 1499520132, 7, 2, 'bits pilani'),
(24, 1010, 1499520132, 7, 2, 'bits pilani'),
(25, 1010, 1499520518, 7, 2, 'bits pilani'),
(26, 1011, 1499523609, 7, 2, 'bits pilani'),
(27, 1011, 1499523609, 7, 2, 'bits pilani');

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_position`
--

CREATE TABLE `nikhil_position` (
  `LABEL` varchar(11) NOT NULL DEFAULT '',
  `TYPE` text,
  `NUM_DATA` int(11) DEFAULT NULL,
  `STR_DATA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nikhil_position`
--

INSERT INTO `nikhil_position` (`LABEL`, `TYPE`, `NUM_DATA`, `STR_DATA`) VALUES
('BATCH_C', 'NUM', 0, NULL),
('BATCH_E', 'NUM', -1, NULL),
('BATCH_S', 'NUM', 211, NULL),
('USER_C', 'NUM', 0, NULL),
('USER_E', 'NUM', -1, NULL),
('USER_S', 'NUM', 211, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_search_feed`
--

CREATE TABLE `nikhil_search_feed` (
  `ID` int(11) NOT NULL,
  `Priority` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nikhil_search_feed`
--

INSERT INTO `nikhil_search_feed` (`ID`, `Priority`, `Name`) VALUES
(1, 1, 'Medical Schools'),
(2, 2, 'IIT Roorkee');

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_similar_nodes`
--

CREATE TABLE `nikhil_similar_nodes` (
  `NODE_NAME` varchar(255) NOT NULL,
  `SIMILAR1` varchar(255) DEFAULT NULL,
  `SCORE1` double DEFAULT NULL,
  `SIMILAR2` varchar(255) DEFAULT NULL,
  `SCORE2` double DEFAULT NULL,
  `SIMILAR3` varchar(255) DEFAULT NULL,
  `SCORE3` double DEFAULT NULL,
  `SIMILAR4` varchar(255) DEFAULT NULL,
  `SCORE4` double DEFAULT NULL,
  `SIMILAR5` varchar(255) DEFAULT NULL,
  `SCORE5` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nikhil_similar_nodes`
--

INSERT INTO `nikhil_similar_nodes` (`NODE_NAME`, `SIMILAR1`, `SCORE1`, `SIMILAR2`, `SCORE2`, `SIMILAR3`, `SCORE3`, `SIMILAR4`, `SCORE4`, `SIMILAR5`, `SCORE5`) VALUES
('IIIT Hyderabad', 'IIT Roorkee', 1.7132517300282, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IIT Roorkee', 'IIIT Hyderabad', 1.5461542663037, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_trending_searches`
--

CREATE TABLE `nikhil_trending_searches` (
  `ID` int(11) NOT NULL,
  `Priority` int(11) NOT NULL DEFAULT '0',
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nikhil_trending_searches`
--

INSERT INTO `nikhil_trending_searches` (`ID`, `Priority`, `Name`) VALUES
(1, 1, 'Law Schools In India'),
(2, 2, 'Medical Schools In India'),
(3, 3, 'Engineering Schools In India');

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_users_similar_nodes`
--

CREATE TABLE `nikhil_users_similar_nodes` (
  `CID` int(11) NOT NULL,
  `SIMILAR1` varchar(255) DEFAULT NULL,
  `SCORE1` double DEFAULT NULL,
  `SIMILAR2` varchar(255) DEFAULT NULL,
  `SCORE2` double DEFAULT NULL,
  `SIMILAR3` varchar(255) DEFAULT NULL,
  `SCORE3` double DEFAULT NULL,
  `SIMILAR4` varchar(255) DEFAULT NULL,
  `SCORE4` double DEFAULT NULL,
  `SIMILAR5` varchar(255) DEFAULT NULL,
  `SCORE5` double DEFAULT NULL,
  `SIMILAR6` varchar(255) DEFAULT NULL,
  `SCORE6` double DEFAULT NULL,
  `SIMILAR7` varchar(255) DEFAULT NULL,
  `SCORE7` double DEFAULT NULL,
  `SIMILAR8` varchar(255) DEFAULT NULL,
  `SCORE8` double DEFAULT NULL,
  `SIMILAR9` varchar(255) DEFAULT NULL,
  `SCORE9` double DEFAULT NULL,
  `SIMILAR10` varchar(255) DEFAULT NULL,
  `SCORE10` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nikhil_user_profile`
--

CREATE TABLE `nikhil_user_profile` (
  `CID` int(11) NOT NULL,
  `Display_Name` varchar(255) DEFAULT NULL,
  `About` text,
  `College` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `NODETABLE`
--

CREATE TABLE `NODETABLE` (
  `Node_ID` int(11) NOT NULL,
  `Node_Tier` int(11) NOT NULL DEFAULT '0',
  `Node_Name` varchar(50) DEFAULT NULL,
  `Node_Type` varchar(255) DEFAULT NULL,
  `Prev_Node` int(11) DEFAULT NULL,
  `Public` int(11) NOT NULL DEFAULT '1',
  `Trigger_Ques` int(11) DEFAULT NULL,
  `Trigger_AnsOp` int(11) DEFAULT NULL,
  `Club_ID` int(11) NOT NULL,
  `Icon_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NODETABLE`
--

INSERT INTO `NODETABLE` (`Node_ID`, `Node_Tier`, `Node_Name`, `Node_Type`, `Prev_Node`, `Public`, `Trigger_Ques`, `Trigger_AnsOp`, `Club_ID`, `Icon_ID`) VALUES
(0, 0, 'College_Name', 'Structural', 0, 1, 0, 0, 0, NULL),
(1, 1, 'Streams/Schools', 'Decision', 0, 1, 1, NULL, 1, NULL),
(2, 2, 'Yes_Engineering', 'Structural', 1, 1, 1, 1, 0, 1),
(3, 2, 'No_Engineering', 'Structural', 1, 1, 1, 2, 0, NULL),
(4, 2, 'NotSure_Engineering', 'Structural', 1, 1, 1, 3, 0, NULL),
(5, 1, 'Streams/Schools', 'Decision', 0, 1, 2, NULL, 1, NULL),
(6, 2, 'Yes_Architecture', 'Structural', 5, 1, 2, 1, 0, 2),
(7, 2, 'No_Architecture', 'Structural', 5, 1, 2, 2, 0, NULL),
(8, 2, 'NotSure_Architecture', 'Structural', 5, 1, 2, 3, 0, NULL),
(9, 1, 'Streams/Schools', 'Decision', 0, 1, 3, NULL, 1, NULL),
(10, 2, 'Yes_Science', 'Structural', 9, 1, 3, 1, 0, 3),
(11, 2, 'No_Science', 'Structural', 9, 1, 3, 2, 0, NULL),
(12, 2, 'NotSure_Science', 'Structural', 9, 1, 3, 3, 0, NULL),
(13, 1, 'Streams/Schools', 'Decision', 0, 1, 4, NULL, 1, NULL),
(14, 2, 'Yes_ComputerApplication', 'Structural', 13, 1, 4, 1, 0, 4),
(15, 2, 'No_ComputerApplication', 'Structural', 13, 1, 4, 2, 0, NULL),
(16, 2, 'NotSure_ComputerApplication', 'Structural', 13, 1, 4, 3, 0, NULL),
(17, 1, 'Streams/Schools', 'Decision', 0, 1, 5, NULL, 1, NULL),
(18, 2, 'Yes_Medical', 'Structural', 17, 1, 5, 1, 0, 5),
(19, 2, 'No_Medical', 'Structural', 17, 1, 5, 2, 0, NULL),
(20, 2, 'NotSure_Medical', 'Structural', 17, 1, 5, 3, 0, NULL),
(21, 1, 'Streams/Schools', 'Decision', 0, 1, 6, NULL, 1, NULL),
(22, 2, 'Yes_Dental', 'Structural', 21, 1, 6, 1, 0, 6),
(23, 2, 'No_Dental', 'Structural', 21, 1, 6, 2, 0, NULL),
(24, 2, 'NotSure_Dental', 'Structural', 21, 1, 6, 3, 0, NULL),
(25, 1, 'Streams/Schools', 'Decision', 0, 1, 7, NULL, 1, NULL),
(26, 2, 'Yes_Pharmacy', 'Structural', 25, 1, 7, 1, 0, 7),
(27, 2, 'No_Pharmacy', 'Structural', 25, 1, 7, 2, 0, NULL),
(28, 2, 'NotSure_Pharmacy', 'Structural', 25, 1, 7, 3, 0, NULL),
(29, 1, 'Streams/Schools', 'Decision', 0, 1, 8, NULL, 1, NULL),
(30, 2, 'Yes_Paramedical', 'Structural', 29, 1, 8, 1, 0, 8),
(31, 2, 'No_Paramedical', 'Structural', 29, 1, 8, 2, 0, NULL),
(32, 2, 'NotSure_Paramedical', 'Structural', 29, 1, 8, 3, 0, NULL),
(33, 1, 'Streams/Schools', 'Decision', 0, 1, 9, NULL, 1, NULL),
(34, 2, 'Yes_Veterinary', 'Structural', 33, 1, 9, 1, 0, 9),
(35, 2, 'No_Veterinary', 'Structural', 33, 1, 9, 2, 0, NULL),
(36, 2, 'NotSure_Veterinary', 'Structural', 33, 1, 9, 3, 0, NULL),
(37, 1, 'Streams/Schools', 'Decision', 0, 1, 10, NULL, 1, NULL),
(38, 2, 'Yes_Management/Business', 'Structural', 37, 1, 10, 1, 0, 10),
(39, 2, 'No_Management/Business', 'Structural', 37, 1, 10, 2, 0, NULL),
(40, 2, 'NotSure_Management/Business', 'Structural', 37, 1, 10, 3, 0, NULL),
(41, 1, 'Streams/Schools', 'Decision', 0, 1, 11, NULL, 1, NULL),
(42, 2, 'Yes_Commerce/Economics', 'Structural', 41, 1, 11, 1, 0, 11),
(43, 2, 'No_Commerce/Economics', 'Structural', 41, 1, 11, 2, 0, NULL),
(44, 2, 'NotSure_Commerce/Economics', 'Structural', 41, 1, 11, 3, 0, NULL),
(45, 1, 'Streams/Schools', 'Decision', 0, 1, 12, NULL, 1, NULL),
(46, 2, 'Yes_LiberalArts', 'Structural', 45, 1, 12, 1, 0, 12),
(47, 2, 'No_LiberalArts', 'Structural', 45, 1, 12, 2, 0, NULL),
(48, 2, 'NotSure_LiberalArts', 'Structural', 45, 1, 12, 3, 0, NULL),
(49, 1, 'Streams/Schools', 'Decision', 0, 1, 13, NULL, 1, NULL),
(50, 2, 'Yes_Agriculture', 'Structural', 49, 1, 13, 1, 0, 13),
(51, 2, 'No_Agriculture', 'Structural', 49, 1, 13, 2, 0, NULL),
(52, 2, 'NotSure_Agriculture', 'Structural', 49, 1, 13, 3, 0, NULL),
(53, 1, 'Streams/Schools', 'Decision', 0, 1, 14, NULL, 1, NULL),
(54, 2, 'Yes_Design', 'Structural', 53, 1, 14, 1, 0, 14),
(55, 2, 'No_Design', 'Structural', 53, 1, 14, 2, 0, NULL),
(56, 2, 'NotSure_Design', 'Structural', 53, 1, 14, 3, 0, NULL),
(57, 1, 'Streams/Schools', 'Decision', 0, 1, 15, NULL, 1, NULL),
(58, 2, 'Yes_Communication', 'Structural', 57, 1, 15, 1, 0, 15),
(59, 2, 'No_Communication', 'Structural', 57, 1, 15, 2, 0, NULL),
(60, 2, 'NotSure_Communication', 'Structural', 57, 1, 15, 3, 0, NULL),
(61, 1, 'Streams/Schools', 'Decision', 0, 1, 16, NULL, 1, NULL),
(62, 2, 'Yes_Law', 'Structural', 61, 1, 16, 1, 0, 16),
(63, 2, 'No_Law', 'Structural', 61, 1, 16, 2, 0, NULL),
(64, 2, 'NotSure_Law', 'Structural', 61, 1, 16, 3, 0, NULL),
(65, 3, 'Degrees', 'Decision', 2, 1, 17, NULL, 31, NULL),
(66, 4, 'Yes_Undergraduate', 'Structural', 65, 1, 17, 1, 0, NULL),
(67, 4, 'No_Undergraduate', 'Structural', 65, 1, 17, 2, 0, NULL),
(68, 4, 'NotSure_Undergraduate', 'Structural', 65, 1, 17, 3, 0, NULL),
(69, 3, 'Degrees', 'Decision', 2, 1, 18, NULL, 31, NULL),
(70, 4, 'Yes_Masters', 'Structural', 69, 1, 18, 1, 0, NULL),
(71, 4, 'No_Masters', 'Structural', 69, 1, 18, 2, 0, NULL),
(72, 4, 'NotSure_Masters', 'Structural', 69, 1, 18, 3, 0, NULL),
(73, 3, 'Degrees', 'Decision', 2, 1, 19, NULL, 31, NULL),
(74, 4, 'Yes_Doctoral', 'Structural', 73, 1, 19, 1, 0, NULL),
(75, 4, 'No_Doctoral', 'Structural', 73, 1, 19, 2, 0, NULL),
(76, 4, 'NotSure_Doctoral', 'Structural', 73, 1, 19, 3, 0, NULL),
(77, 3, 'Degrees', 'Decision', 6, 1, 20, NULL, 31, NULL),
(78, 4, 'Yes_Undergraduate', 'Structural', 77, 1, 20, 1, 0, NULL),
(79, 4, 'No_Undergraduate', 'Structural', 77, 1, 20, 2, 0, NULL),
(80, 4, 'NotSure_Undergraduate', 'Structural', 77, 1, 20, 3, 0, NULL),
(81, 3, 'Degrees', 'Decision', 6, 1, 21, NULL, 31, NULL),
(82, 4, 'Yes_Masters', 'Structural', 81, 1, 21, 1, 0, NULL),
(83, 4, 'No_Masters', 'Structural', 81, 1, 21, 2, 0, NULL),
(84, 4, 'NotSure_Masters', 'Structural', 81, 1, 21, 3, 0, NULL),
(85, 3, 'Degrees', 'Decision', 6, 1, 22, NULL, 31, NULL),
(86, 4, 'Yes_Doctoral', 'Structural', 85, 1, 22, 1, 0, NULL),
(87, 4, 'No_Doctoral', 'Structural', 85, 1, 22, 2, 0, NULL),
(88, 4, 'NotSure_Doctoral', 'Structural', 85, 1, 22, 3, 0, NULL),
(89, 3, 'Degrees', 'Decision', 10, 1, 23, NULL, 31, NULL),
(90, 4, 'Yes_Undergraduate', 'Structural', 89, 1, 23, 1, 0, NULL),
(91, 4, 'No_Undergraduate', 'Structural', 89, 1, 23, 2, 0, NULL),
(92, 4, 'NotSure_Undergraduate', 'Structural', 89, 1, 23, 3, 0, NULL),
(93, 3, 'Degrees', 'Decision', 10, 1, 24, NULL, 31, NULL),
(94, 4, 'Yes_Masters', 'Structural', 93, 1, 24, 1, 0, NULL),
(95, 4, 'No_Masters', 'Structural', 93, 1, 24, 2, 0, NULL),
(96, 4, 'NotSure_Masters', 'Structural', 93, 1, 24, 3, 0, NULL),
(97, 3, 'Degrees', 'Decision', 10, 1, 25, NULL, 31, NULL),
(98, 4, 'Yes_Doctoral', 'Structural', 97, 1, 25, 1, 0, NULL),
(99, 4, 'No_Doctoral', 'Structural', 97, 1, 25, 2, 0, NULL),
(100, 4, 'NotSure_Doctoral', 'Structural', 97, 1, 25, 3, 0, NULL),
(101, 3, 'Degrees', 'Decision', 14, 1, 26, NULL, 31, NULL),
(102, 4, 'Yes_Undergraduate', 'Structural', 101, 1, 26, 1, 0, NULL),
(103, 4, 'No_Undergraduate', 'Structural', 101, 1, 26, 2, 0, NULL),
(104, 4, 'NotSure_Undergraduate', 'Structural', 101, 1, 26, 3, 0, NULL),
(105, 3, 'Degrees', 'Decision', 14, 1, 27, NULL, 31, NULL),
(106, 4, 'Yes_Masters', 'Structural', 105, 1, 27, 1, 0, NULL),
(107, 4, 'No_Masters', 'Structural', 105, 1, 27, 2, 0, NULL),
(108, 4, 'NotSure_Masters', 'Structural', 105, 1, 27, 3, 0, NULL),
(109, 3, 'Degrees', 'Decision', 14, 1, 28, NULL, 31, NULL),
(110, 4, 'Yes_Doctoral', 'Structural', 109, 1, 28, 1, 0, NULL),
(111, 4, 'No_Doctoral', 'Structural', 109, 1, 28, 2, 0, NULL),
(112, 4, 'NotSure_Doctoral', 'Structural', 109, 1, 28, 3, 0, NULL),
(113, 3, 'Degrees', 'Decision', 18, 1, 29, NULL, 31, NULL),
(114, 4, 'Yes_Undergraduate', 'Structural', 113, 1, 29, 1, 0, NULL),
(115, 4, 'No_Undergraduate', 'Structural', 113, 1, 29, 2, 0, NULL),
(116, 4, 'NotSure_Undergraduate', 'Structural', 113, 1, 29, 3, 0, NULL),
(117, 3, 'Degrees', 'Decision', 18, 1, 30, NULL, 31, NULL),
(118, 4, 'Yes_Masters', 'Structural', 117, 1, 30, 1, 0, NULL),
(119, 4, 'No_Masters', 'Structural', 117, 1, 30, 2, 0, NULL),
(120, 4, 'NotSure_Masters', 'Structural', 117, 1, 30, 3, 0, NULL),
(121, 3, 'Degrees', 'Decision', 18, 1, 31, NULL, 31, NULL),
(122, 4, 'Yes_Doctoral', 'Structural', 121, 1, 31, 1, 0, NULL),
(123, 4, 'No_Doctoral', 'Structural', 121, 1, 31, 2, 0, NULL),
(124, 4, 'NotSure_Doctoral', 'Structural', 121, 1, 31, 3, 0, NULL),
(125, 3, 'Degrees', 'Decision', 22, 1, 32, NULL, 31, NULL),
(126, 4, 'Yes_Undergraduate', 'Structural', 125, 1, 32, 1, 0, NULL),
(127, 4, 'No_Undergraduate', 'Structural', 125, 1, 32, 2, 0, NULL),
(128, 4, 'NotSure_Undergraduate', 'Structural', 125, 1, 32, 3, 0, NULL),
(129, 3, 'Degrees', 'Decision', 22, 1, 33, NULL, 31, NULL),
(130, 4, 'Yes_Masters', 'Structural', 129, 1, 33, 1, 0, NULL),
(131, 4, 'No_Masters', 'Structural', 129, 1, 33, 2, 0, NULL),
(132, 4, 'NotSure_Masters', 'Structural', 129, 1, 33, 3, 0, NULL),
(133, 3, 'Degrees', 'Decision', 22, 1, 34, NULL, 31, NULL),
(134, 4, 'Yes_Doctoral', 'Structural', 133, 1, 34, 1, 0, NULL),
(135, 4, 'No_Doctoral', 'Structural', 133, 1, 34, 2, 0, NULL),
(136, 4, 'NotSure_Doctoral', 'Structural', 133, 1, 34, 3, 0, NULL),
(137, 3, 'Degrees', 'Decision', 26, 1, 35, NULL, 31, NULL),
(138, 4, 'Yes_Undergraduate', 'Structural', 137, 1, 35, 1, 0, NULL),
(139, 4, 'No_Undergraduate', 'Structural', 137, 1, 35, 2, 0, NULL),
(140, 4, 'NotSure_Undergraduate', 'Structural', 137, 1, 35, 3, 0, NULL),
(141, 3, 'Degrees', 'Decision', 26, 1, 36, NULL, 31, NULL),
(142, 4, 'Yes_Masters', 'Structural', 141, 1, 36, 1, 0, NULL),
(143, 4, 'No_Masters', 'Structural', 141, 1, 36, 2, 0, NULL),
(144, 4, 'NotSure_Masters', 'Structural', 141, 1, 36, 3, 0, NULL),
(145, 3, 'Degrees', 'Decision', 26, 1, 37, NULL, 31, NULL),
(146, 4, 'Yes_Doctoral', 'Structural', 145, 1, 37, 1, 0, NULL),
(147, 4, 'No_Doctoral', 'Structural', 145, 1, 37, 2, 0, NULL),
(148, 4, 'NotSure_Doctoral', 'Structural', 145, 1, 37, 3, 0, NULL),
(149, 3, 'Degrees', 'Decision', 30, 1, 38, NULL, 31, NULL),
(150, 4, 'Yes_Undergraduate', 'Structural', 149, 1, 38, 1, 0, NULL),
(151, 4, 'No_Undergraduate', 'Structural', 149, 1, 38, 2, 0, NULL),
(152, 4, 'NotSure_Undergraduate', 'Structural', 149, 1, 38, 3, 0, NULL),
(153, 3, 'Degrees', 'Decision', 30, 1, 39, NULL, 31, NULL),
(154, 4, 'Yes_Masters', 'Structural', 153, 1, 39, 1, 0, NULL),
(155, 4, 'No_Masters', 'Structural', 153, 1, 39, 2, 0, NULL),
(156, 4, 'NotSure_Masters', 'Structural', 153, 1, 39, 3, 0, NULL),
(157, 3, 'Degrees', 'Decision', 30, 1, 40, NULL, 31, NULL),
(158, 4, 'Yes_Doctoral', 'Structural', 157, 1, 40, 1, 0, NULL),
(159, 4, 'No_Doctoral', 'Structural', 157, 1, 40, 2, 0, NULL),
(160, 4, 'NotSure_Doctoral', 'Structural', 157, 1, 40, 3, 0, NULL),
(161, 3, 'Degrees', 'Decision', 34, 1, 41, NULL, 31, NULL),
(162, 4, 'Yes_Undergraduate', 'Structural', 161, 1, 41, 1, 0, NULL),
(163, 4, 'No_Undergraduate', 'Structural', 161, 1, 41, 2, 0, NULL),
(164, 4, 'NotSure_Undergraduate', 'Structural', 161, 1, 41, 3, 0, NULL),
(165, 3, 'Degrees', 'Decision', 34, 1, 42, NULL, 31, NULL),
(166, 4, 'Yes_Masters', 'Structural', 165, 1, 42, 1, 0, NULL),
(167, 4, 'No_Masters', 'Structural', 165, 1, 42, 2, 0, NULL),
(168, 4, 'NotSure_Masters', 'Structural', 165, 1, 42, 3, 0, NULL),
(169, 3, 'Degrees', 'Decision', 34, 1, 43, NULL, 31, NULL),
(170, 4, 'Yes_Doctoral', 'Structural', 169, 1, 43, 1, 0, NULL),
(171, 4, 'No_Doctoral', 'Structural', 169, 1, 43, 2, 0, NULL),
(172, 4, 'NotSure_Doctoral', 'Structural', 169, 1, 43, 3, 0, NULL),
(173, 3, 'Degrees', 'Decision', 38, 1, 44, NULL, 31, NULL),
(174, 4, 'Yes_Undergraduate', 'Structural', 173, 1, 44, 1, 0, NULL),
(175, 4, 'No_Undergraduate', 'Structural', 173, 1, 44, 2, 0, NULL),
(176, 4, 'NotSure_Undergraduate', 'Structural', 173, 1, 44, 3, 0, NULL),
(177, 3, 'Degrees', 'Decision', 38, 1, 45, NULL, 31, NULL),
(178, 4, 'Yes_Masters', 'Structural', 177, 1, 45, 1, 0, NULL),
(179, 4, 'No_Masters', 'Structural', 177, 1, 45, 2, 0, NULL),
(180, 4, 'NotSure_Masters', 'Structural', 177, 1, 45, 3, 0, NULL),
(181, 3, 'Degrees', 'Decision', 38, 1, 46, NULL, 31, NULL),
(182, 4, 'Yes_Doctoral', 'Structural', 181, 1, 46, 1, 0, NULL),
(183, 4, 'No_Doctoral', 'Structural', 181, 1, 46, 2, 0, NULL),
(184, 4, 'NotSure_Doctoral', 'Structural', 181, 1, 46, 3, 0, NULL),
(185, 3, 'Degrees', 'Decision', 42, 1, 47, NULL, 31, NULL),
(186, 4, 'Yes_Undergraduate', 'Structural', 185, 1, 47, 1, 0, NULL),
(187, 4, 'No_Undergraduate', 'Structural', 185, 1, 47, 2, 0, NULL),
(188, 4, 'NotSure_Undergraduate', 'Structural', 185, 1, 47, 3, 0, NULL),
(189, 3, 'Degrees', 'Decision', 42, 1, 48, NULL, 31, NULL),
(190, 4, 'Yes_Masters', 'Structural', 189, 1, 48, 1, 0, NULL),
(191, 4, 'No_Masters', 'Structural', 189, 1, 48, 2, 0, NULL),
(192, 4, 'NotSure_Masters', 'Structural', 189, 1, 48, 3, 0, NULL),
(193, 3, 'Degrees', 'Decision', 42, 1, 49, NULL, 31, NULL),
(194, 4, 'Yes_Doctoral', 'Structural', 193, 1, 49, 1, 0, NULL),
(195, 4, 'No_Doctoral', 'Structural', 193, 1, 49, 2, 0, NULL),
(196, 4, 'NotSure_Doctoral', 'Structural', 193, 1, 49, 3, 0, NULL),
(197, 3, 'Degrees', 'Decision', 46, 1, 50, NULL, 31, NULL),
(198, 4, 'Yes_Undergraduate', 'Structural', 197, 1, 50, 1, 0, NULL),
(199, 4, 'No_Undergraduate', 'Structural', 197, 1, 50, 2, 0, NULL),
(200, 4, 'NotSure_Undergraduate', 'Structural', 197, 1, 50, 3, 0, NULL),
(201, 3, 'Degrees', 'Decision', 46, 1, 51, NULL, 31, NULL),
(202, 4, 'Yes_Masters', 'Structural', 201, 1, 51, 1, 0, NULL),
(203, 4, 'No_Masters', 'Structural', 201, 1, 51, 2, 0, NULL),
(204, 4, 'NotSure_Masters', 'Structural', 201, 1, 51, 3, 0, NULL),
(205, 3, 'Degrees', 'Decision', 46, 1, 52, NULL, 31, NULL),
(206, 4, 'Yes_Doctoral', 'Structural', 205, 1, 52, 1, 0, NULL),
(207, 4, 'No_Doctoral', 'Structural', 205, 1, 52, 2, 0, NULL),
(208, 4, 'NotSure_Doctoral', 'Structural', 205, 1, 52, 3, 0, NULL),
(209, 3, 'Degrees', 'Decision', 50, 1, 53, NULL, 31, NULL),
(210, 4, 'Yes_Undergraduate', 'Structural', 209, 1, 53, 1, 0, NULL),
(211, 4, 'No_Undergraduate', 'Structural', 209, 1, 53, 2, 0, NULL),
(212, 4, 'NotSure_Undergraduate', 'Structural', 209, 1, 53, 3, 0, NULL),
(213, 3, 'Degrees', 'Decision', 50, 1, 54, NULL, 31, NULL),
(214, 4, 'Yes_Masters', 'Structural', 213, 1, 54, 1, 0, NULL),
(215, 4, 'No_Masters', 'Structural', 213, 1, 54, 2, 0, NULL),
(216, 4, 'NotSure_Masters', 'Structural', 213, 1, 54, 3, 0, NULL),
(217, 3, 'Degrees', 'Decision', 50, 1, 55, NULL, 31, NULL),
(218, 4, 'Yes_Doctoral', 'Structural', 217, 1, 55, 1, 0, NULL),
(219, 4, 'No_Doctoral', 'Structural', 217, 1, 55, 2, 0, NULL),
(220, 4, 'NotSure_Doctoral', 'Structural', 217, 1, 55, 3, 0, NULL),
(221, 3, 'Degrees', 'Decision', 54, 1, 56, NULL, 31, NULL),
(222, 4, 'Yes_Undergraduate', 'Structural', 221, 1, 56, 1, 0, NULL),
(223, 4, 'No_Undergraduate', 'Structural', 221, 1, 56, 2, 0, NULL),
(224, 4, 'NotSure_Undergraduate', 'Structural', 221, 1, 56, 3, 0, NULL),
(225, 3, 'Degrees', 'Decision', 54, 1, 57, NULL, 31, NULL),
(226, 4, 'Yes_Masters', 'Structural', 225, 1, 57, 1, 0, NULL),
(227, 4, 'No_Masters', 'Structural', 225, 1, 57, 2, 0, NULL),
(228, 4, 'NotSure_Masters', 'Structural', 225, 1, 57, 3, 0, NULL),
(229, 3, 'Degrees', 'Decision', 54, 1, 58, NULL, 31, NULL),
(230, 4, 'Yes_Doctoral', 'Structural', 229, 1, 58, 1, 0, NULL),
(231, 4, 'No_Doctoral', 'Structural', 229, 1, 58, 2, 0, NULL),
(232, 4, 'NotSure_Doctoral', 'Structural', 229, 1, 58, 3, 0, NULL),
(233, 3, 'Degrees', 'Decision', 58, 1, 59, NULL, 31, NULL),
(234, 4, 'Yes_Undergraduate', 'Structural', 233, 1, 59, 1, 0, NULL),
(235, 4, 'No_Undergraduate', 'Structural', 233, 1, 59, 2, 0, NULL),
(236, 4, 'NotSure_Undergraduate', 'Structural', 233, 1, 59, 3, 0, NULL),
(237, 3, 'Degrees', 'Decision', 58, 1, 60, NULL, 31, NULL),
(238, 4, 'Yes_Masters', 'Structural', 237, 1, 60, 1, 0, NULL),
(239, 4, 'No_Masters', 'Structural', 237, 1, 60, 2, 0, NULL),
(240, 4, 'NotSure_Masters', 'Structural', 237, 1, 60, 3, 0, NULL),
(241, 3, 'Degrees', 'Decision', 58, 1, 61, NULL, 31, NULL),
(242, 4, 'Yes_Doctoral', 'Structural', 241, 1, 61, 1, 0, NULL),
(243, 4, 'No_Doctoral', 'Structural', 241, 1, 61, 2, 0, NULL),
(244, 4, 'NotSure_Doctoral', 'Structural', 241, 1, 61, 3, 0, NULL),
(245, 3, 'Degrees', 'Decision', 62, 1, 62, NULL, 31, NULL),
(246, 4, 'Yes_Undergraduate', 'Structural', 245, 1, 62, 1, 0, NULL),
(247, 4, 'No_Undergraduate', 'Structural', 245, 1, 62, 2, 0, NULL),
(248, 4, 'NotSure_Undergraduate', 'Structural', 245, 1, 62, 3, 0, NULL),
(249, 3, 'Degrees', 'Decision', 62, 1, 63, NULL, 31, NULL),
(250, 4, 'Yes_Masters', 'Structural', 249, 1, 63, 1, 0, NULL),
(251, 4, 'No_Masters', 'Structural', 249, 1, 63, 2, 0, NULL),
(252, 4, 'NotSure_Masters', 'Structural', 249, 1, 63, 3, 0, NULL),
(253, 3, 'Degrees', 'Decision', 62, 1, 64, NULL, 31, NULL),
(254, 4, 'Yes_Doctoral', 'Structural', 253, 1, 64, 1, 0, NULL),
(255, 4, 'No_Doctoral', 'Structural', 253, 1, 64, 2, 0, NULL),
(256, 4, 'NotSure_Doctoral', 'Structural', 253, 1, 64, 3, 0, NULL),
(257, 5, 'Majors', 'Decision', 66, 1, 65, NULL, 2, NULL),
(258, 6, 'Yes_ComputerScience', 'Structural', 257, 1, 65, 1, 0, NULL),
(259, 6, 'No_ComputerScience', 'Structural', 257, 1, 65, 2, 0, NULL),
(260, 6, 'NotSure_ComputerScience', 'Structural', 257, 1, 65, 3, 0, NULL),
(261, 5, 'Majors', 'Decision', 66, 1, 66, NULL, 2, NULL),
(262, 6, 'Yes_MechanicalEngineering', 'Structural', 261, 1, 66, 1, 0, NULL),
(263, 6, 'No_MechanicalEngineering', 'Structural', 261, 1, 66, 2, 0, NULL),
(264, 6, 'NotSure_MechanicalEngineering', 'Structural', 261, 1, 66, 3, 0, NULL),
(265, 5, 'Majors', 'Decision', 66, 1, 67, NULL, 2, NULL),
(266, 6, 'Yes_Electronics&Communication', 'Structural', 265, 1, 67, 1, 0, NULL),
(267, 6, 'No_Electronics&Communication', 'Structural', 265, 1, 67, 2, 0, NULL),
(268, 6, 'NotSure_Electronics&Communication', 'Structural', 265, 1, 67, 3, 0, NULL),
(269, 5, 'Majors', 'Decision', 66, 1, 68, NULL, 2, NULL),
(270, 6, 'Yes_CivilEngineering', 'Structural', 269, 1, 68, 1, 0, NULL),
(271, 6, 'No_CivilEngineering', 'Structural', 269, 1, 68, 2, 0, NULL),
(272, 6, 'NotSure_CivilEngineering', 'Structural', 269, 1, 68, 3, 0, NULL),
(273, 5, 'Majors', 'Decision', 66, 1, 69, NULL, 2, NULL),
(274, 6, 'Yes_ChemicalEngineering', 'Structural', 273, 1, 69, 1, 0, NULL),
(275, 6, 'No_ChemicalEngineering', 'Structural', 273, 1, 69, 2, 0, NULL),
(276, 6, 'NotSure_ChemicalEngineering', 'Structural', 273, 1, 69, 3, 0, NULL),
(277, 5, 'Majors', 'Decision', 66, 1, 70, NULL, 2, NULL),
(278, 6, 'Yes_Electrical&Electronics', 'Structural', 277, 1, 70, 1, 0, NULL),
(279, 6, 'No_Electrical&Electronics', 'Structural', 277, 1, 70, 2, 0, NULL),
(280, 6, 'NotSure_Electrical&Electronics', 'Structural', 277, 1, 70, 3, 0, NULL),
(281, 5, 'Majors', 'Decision', 66, 1, 71, NULL, 2, NULL),
(282, 6, 'Yes_Information Technology', 'Structural', 281, 1, 71, 1, 0, NULL),
(283, 6, 'No_Information Technology', 'Structural', 281, 1, 71, 2, 0, NULL),
(284, 6, 'NotSure_Information Technology', 'Structural', 281, 1, 71, 3, 0, NULL),
(285, 5, 'Majors', 'Decision', 66, 1, 72, NULL, 2, NULL),
(286, 6, 'Yes_Electrical', 'Structural', 285, 1, 72, 1, 0, NULL),
(287, 6, 'No_Electrical', 'Structural', 285, 1, 72, 2, 0, NULL),
(288, 6, 'NotSure_Electrical', 'Structural', 285, 1, 72, 3, 0, NULL),
(289, 5, 'Majors', 'Decision', 66, 1, 73, NULL, 2, NULL),
(290, 6, 'Yes_Electronics', 'Structural', 289, 1, 73, 1, 0, NULL),
(291, 6, 'No_Electronics', 'Structural', 289, 1, 73, 2, 0, NULL),
(292, 6, 'NotSure_Electronics', 'Structural', 289, 1, 73, 3, 0, NULL),
(293, 5, 'Majors', 'Decision', 66, 1, 74, NULL, 2, NULL),
(294, 6, 'Yes_BioTechnology', 'Structural', 293, 1, 74, 1, 0, NULL),
(295, 6, 'No_BioTechnology', 'Structural', 293, 1, 74, 2, 0, NULL),
(296, 6, 'NotSure_BioTechnology', 'Structural', 293, 1, 74, 3, 0, NULL),
(297, 5, 'Majors', 'Decision', 66, 1, 75, NULL, 2, NULL),
(298, 6, 'Yes_Aerospace Engineering', 'Structural', 297, 1, 75, 1, 0, NULL),
(299, 6, 'No_Aerospace Engineering', 'Structural', 297, 1, 75, 2, 0, NULL),
(300, 6, 'NotSure_Aerospace Engineering', 'Structural', 297, 1, 75, 3, 0, NULL),
(301, 5, 'Majors', 'Decision', 66, 1, 76, NULL, 2, NULL),
(302, 6, 'Yes_Industrial Engineering', 'Structural', 301, 1, 76, 1, 0, NULL),
(303, 6, 'No_Industrial Engineering', 'Structural', 301, 1, 76, 2, 0, NULL),
(304, 6, 'NotSure_Industrial Engineering', 'Structural', 301, 1, 76, 3, 0, NULL),
(305, 5, 'Majors', 'Decision', 66, 1, 77, NULL, 2, NULL),
(306, 6, 'Yes_BioMedical Engineering', 'Structural', 305, 1, 77, 1, 0, NULL),
(307, 6, 'No_BioMedical Engineering', 'Structural', 305, 1, 77, 2, 0, NULL),
(308, 6, 'NotSure_BioMedical Engineering', 'Structural', 305, 1, 77, 3, 0, NULL),
(309, 5, 'Majors', 'Decision', 66, 1, 78, NULL, 2, NULL),
(310, 6, 'Yes_Agricultural Engineering', 'Structural', 309, 1, 78, 1, 0, NULL),
(311, 6, 'No_Agricultural Engineering', 'Structural', 309, 1, 78, 2, 0, NULL),
(312, 6, 'NotSure_Agricultural Engineering', 'Structural', 309, 1, 78, 3, 0, NULL),
(313, 5, 'Majors', 'Decision', 66, 1, 79, NULL, 2, NULL),
(314, 6, 'Yes_Mechatronics', 'Structural', 313, 1, 79, 1, 0, NULL),
(315, 6, 'No_Mechatronics', 'Structural', 313, 1, 79, 2, 0, NULL),
(316, 6, 'NotSure_Mechatronics', 'Structural', 313, 1, 79, 3, 0, NULL),
(317, 5, 'Majors', 'Decision', 66, 1, 80, NULL, 2, NULL),
(318, 6, 'Yes_Food Science', 'Structural', 317, 1, 80, 1, 0, NULL),
(319, 6, 'No_Food Science', 'Structural', 317, 1, 80, 2, 0, NULL),
(320, 6, 'NotSure_Food Science', 'Structural', 317, 1, 80, 3, 0, NULL),
(321, 5, 'Majors', 'Decision', 66, 1, 81, NULL, 2, NULL),
(322, 6, 'Yes_Mining', 'Structural', 321, 1, 81, 1, 0, NULL),
(323, 6, 'No_Mining', 'Structural', 321, 1, 81, 2, 0, NULL),
(324, 6, 'NotSure_Mining', 'Structural', 321, 1, 81, 3, 0, NULL),
(325, 5, 'Majors', 'Decision', 66, 1, 82, NULL, 2, NULL),
(326, 6, 'Yes_Material Science', 'Structural', 325, 1, 82, 1, 0, NULL),
(327, 6, 'No_Material Science', 'Structural', 325, 1, 82, 2, 0, NULL),
(328, 6, 'NotSure_Material Science', 'Structural', 325, 1, 82, 3, 0, NULL),
(329, 5, 'Majors', 'Decision', 66, 1, 83, NULL, 2, NULL),
(330, 6, 'Yes_PetroChemical Engineering', 'Structural', 329, 1, 83, 1, 0, NULL),
(331, 6, 'No_PetroChemical Engineering', 'Structural', 329, 1, 83, 2, 0, NULL),
(332, 6, 'NotSure_PetroChemical Engineering', 'Structural', 329, 1, 83, 3, 0, NULL),
(333, 5, 'Majors', 'Decision', 66, 1, 84, NULL, 2, NULL),
(334, 6, 'Yes_Textile Engineering', 'Structural', 333, 1, 84, 1, 0, NULL),
(335, 6, 'No_Textile Engineering', 'Structural', 333, 1, 84, 2, 0, NULL),
(336, 6, 'NotSure_Textile Engineering', 'Structural', 333, 1, 84, 3, 0, NULL),
(337, 5, 'Majors', 'Decision', 78, 1, 85, NULL, 3, NULL),
(338, 6, 'Yes_Interior Design', 'Structural', 337, 1, 85, 1, 0, NULL),
(339, 6, 'No_Interior Design', 'Structural', 337, 1, 85, 2, 0, NULL),
(340, 6, 'NotSure_Interior Design', 'Structural', 337, 1, 85, 3, 0, NULL),
(341, 5, 'Majors', 'Decision', 78, 1, 86, NULL, 3, NULL),
(342, 6, 'Yes_Architecture Planning', 'Structural', 341, 1, 86, 1, 0, NULL),
(343, 6, 'No_Architecture Planning', 'Structural', 341, 1, 86, 2, 0, NULL),
(344, 6, 'NotSure_Architecture Planning', 'Structural', 341, 1, 86, 3, 0, NULL),
(345, 5, 'Majors', 'Decision', 90, 1, 87, NULL, 4, NULL),
(346, 6, 'Yes_ChemicalScience', 'Structural', 345, 1, 87, 1, 0, NULL),
(347, 6, 'No_ChemicalScience', 'Structural', 345, 1, 87, 2, 0, NULL),
(348, 6, 'NotSure_ChemicalScience', 'Structural', 345, 1, 87, 3, 0, NULL),
(349, 5, 'Majors', 'Decision', 90, 1, 88, NULL, 4, NULL),
(350, 6, 'Yes_Mathematics', 'Structural', 349, 1, 88, 1, 0, NULL),
(351, 6, 'No_Mathematics', 'Structural', 349, 1, 88, 2, 0, NULL),
(352, 6, 'NotSure_Mathematics', 'Structural', 349, 1, 88, 3, 0, NULL),
(353, 5, 'Majors', 'Decision', 90, 1, 89, NULL, 4, NULL),
(354, 6, 'Yes_Physics', 'Structural', 353, 1, 89, 1, 0, NULL),
(355, 6, 'No_Physics', 'Structural', 353, 1, 89, 2, 0, NULL),
(356, 6, 'NotSure_Physics', 'Structural', 353, 1, 89, 3, 0, NULL),
(357, 5, 'Majors', 'Decision', 90, 1, 90, NULL, 4, NULL),
(358, 6, 'Yes_ComputerScience', 'Structural', 357, 1, 90, 1, 0, NULL),
(359, 6, 'No_ComputerScience', 'Structural', 357, 1, 90, 2, 0, NULL),
(360, 6, 'NotSure_ComputerScience', 'Structural', 357, 1, 90, 3, 0, NULL),
(361, 5, 'Majors', 'Decision', 90, 1, 91, NULL, 4, NULL),
(362, 6, 'Yes_Zoology', 'Structural', 361, 1, 91, 1, 0, NULL),
(363, 6, 'No_Zoology', 'Structural', 361, 1, 91, 2, 0, NULL),
(364, 6, 'NotSure_Zoology', 'Structural', 361, 1, 91, 3, 0, NULL),
(365, 5, 'Majors', 'Decision', 102, 1, 92, NULL, 5, NULL),
(366, 6, 'Yes_Information Technology', 'Structural', 365, 1, 92, 1, 0, NULL),
(367, 6, 'No_Information Technology', 'Structural', 365, 1, 92, 2, 0, NULL),
(368, 6, 'NotSure_Information Technology', 'Structural', 365, 1, 92, 3, 0, NULL),
(369, 5, 'Majors', 'Decision', 102, 1, 93, NULL, 5, NULL),
(370, 6, 'Yes_Data Science', 'Structural', 369, 1, 93, 1, 0, NULL),
(371, 6, 'No_Data Science', 'Structural', 369, 1, 93, 2, 0, NULL),
(372, 6, 'NotSure_Data Science', 'Structural', 369, 1, 93, 3, 0, NULL),
(373, 5, 'Majors', 'Decision', 102, 1, 94, NULL, 5, NULL),
(374, 6, 'Yes_Animation', 'Structural', 373, 1, 94, 1, 0, NULL),
(375, 6, 'No_Animation', 'Structural', 373, 1, 94, 2, 0, NULL),
(376, 6, 'NotSure_Animation', 'Structural', 373, 1, 94, 3, 0, NULL),
(377, 5, 'Majors', 'Decision', 102, 1, 95, NULL, 5, NULL),
(378, 6, 'Yes_Visual Basic Application', 'Structural', 377, 1, 95, 1, 0, NULL),
(379, 6, 'No_Visual Basic Application', 'Structural', 377, 1, 95, 2, 0, NULL),
(380, 6, 'NotSure_Visual Basic Application', 'Structural', 377, 1, 95, 3, 0, NULL),
(381, 5, 'Majors', 'Decision', 138, 1, 96, NULL, 6, NULL),
(382, 6, 'Yes_Pharmacology', 'Structural', 381, 1, 96, 1, 0, NULL),
(383, 6, 'No_Pharmacology', 'Structural', 381, 1, 96, 2, 0, NULL),
(384, 6, 'NotSure_Pharmacology', 'Structural', 381, 1, 96, 3, 0, NULL),
(385, 5, 'Majors', 'Decision', 138, 1, 97, NULL, 6, NULL),
(386, 6, 'Yes_Ayurved', 'Structural', 385, 1, 97, 1, 0, NULL),
(387, 6, 'No_Ayurved', 'Structural', 385, 1, 97, 2, 0, NULL),
(388, 6, 'NotSure_Ayurved', 'Structural', 385, 1, 97, 3, 0, NULL),
(389, 5, 'Majors', 'Decision', 150, 1, 98, NULL, 7, NULL),
(390, 6, 'Yes_OPTOMETRY', 'Structural', 389, 1, 98, 1, 0, NULL),
(391, 6, 'No_OPTOMETRY', 'Structural', 389, 1, 98, 2, 0, NULL),
(392, 6, 'NotSure_OPTOMETRY', 'Structural', 389, 1, 98, 3, 0, NULL),
(393, 5, 'Majors', 'Decision', 150, 1, 99, NULL, 7, NULL),
(394, 6, 'Yes_CARDIAC TECHNOLOGY', 'Structural', 393, 1, 99, 1, 0, NULL),
(395, 6, 'No_CARDIAC TECHNOLOGY', 'Structural', 393, 1, 99, 2, 0, NULL),
(396, 6, 'NotSure_CARDIAC TECHNOLOGY', 'Structural', 393, 1, 99, 3, 0, NULL),
(397, 5, 'Majors', 'Decision', 150, 1, 100, NULL, 7, NULL),
(398, 6, 'Yes_HEALTH CARE PERSONNEL', 'Structural', 397, 1, 100, 1, 0, NULL),
(399, 6, 'No_HEALTH CARE PERSONNEL', 'Structural', 397, 1, 100, 2, 0, NULL),
(400, 6, 'NotSure_HEALTH CARE PERSONNEL', 'Structural', 397, 1, 100, 3, 0, NULL),
(401, 5, 'Majors', 'Decision', 150, 1, 101, NULL, 7, NULL),
(402, 6, 'Yes_RADIOTHERAPY', 'Structural', 401, 1, 101, 1, 0, NULL),
(403, 6, 'No_RADIOTHERAPY', 'Structural', 401, 1, 101, 2, 0, NULL),
(404, 6, 'NotSure_RADIOTHERAPY', 'Structural', 401, 1, 101, 3, 0, NULL),
(405, 5, 'Majors', 'Decision', 150, 1, 102, NULL, 7, NULL),
(406, 6, 'Yes_EMERGENCY MEDICINE', 'Structural', 405, 1, 102, 1, 0, NULL),
(407, 6, 'No_EMERGENCY MEDICINE', 'Structural', 405, 1, 102, 2, 0, NULL),
(408, 6, 'NotSure_EMERGENCY MEDICINE', 'Structural', 405, 1, 102, 3, 0, NULL),
(409, 5, 'Majors', 'Decision', 150, 1, 103, NULL, 7, NULL),
(410, 6, 'Yes_ANAESTHISIA', 'Structural', 409, 1, 103, 1, 0, NULL),
(411, 6, 'No_ANAESTHISIA', 'Structural', 409, 1, 103, 2, 0, NULL),
(412, 6, 'NotSure_ANAESTHISIA', 'Structural', 409, 1, 103, 3, 0, NULL),
(413, 5, 'Majors', 'Decision', 162, 1, 104, NULL, 8, NULL),
(414, 6, 'Yes_Animal Health', 'Structural', 413, 1, 104, 1, 0, NULL),
(415, 6, 'No_Animal Health', 'Structural', 413, 1, 104, 2, 0, NULL),
(416, 6, 'NotSure_Animal Health', 'Structural', 413, 1, 104, 3, 0, NULL),
(417, 5, 'Majors', 'Decision', 174, 1, 105, NULL, 9, NULL),
(418, 6, 'Yes_HOTEL MANAGEMENT', 'Structural', 417, 1, 105, 1, 0, NULL),
(419, 6, 'No_HOTEL MANAGEMENT', 'Structural', 417, 1, 105, 2, 0, NULL),
(420, 6, 'NotSure_HOTEL MANAGEMENT', 'Structural', 417, 1, 105, 3, 0, NULL),
(421, 5, 'Majors', 'Decision', 174, 1, 106, NULL, 9, NULL),
(422, 6, 'Yes_TOURISM MANAGEMENT', 'Structural', 421, 1, 106, 1, 0, NULL),
(423, 6, 'No_TOURISM MANAGEMENT', 'Structural', 421, 1, 106, 2, 0, NULL),
(424, 6, 'NotSure_TOURISM MANAGEMENT', 'Structural', 421, 1, 106, 3, 0, NULL),
(425, 5, 'Majors', 'Decision', 174, 1, 107, NULL, 9, NULL),
(426, 6, 'Yes_BANKING', 'Structural', 425, 1, 107, 1, 0, NULL),
(427, 6, 'No_BANKING', 'Structural', 425, 1, 107, 2, 0, NULL),
(428, 6, 'NotSure_BANKING', 'Structural', 425, 1, 107, 3, 0, NULL),
(429, 5, 'Majors', 'Decision', 174, 1, 108, NULL, 9, NULL),
(430, 6, 'Yes_BUSINESS ADMINISTRATION', 'Structural', 429, 1, 108, 1, 0, NULL),
(431, 6, 'No_BUSINESS ADMINISTRATION', 'Structural', 429, 1, 108, 2, 0, NULL),
(432, 6, 'NotSure_BUSINESS ADMINISTRATION', 'Structural', 429, 1, 108, 3, 0, NULL),
(433, 5, 'Majors', 'Decision', 174, 1, 109, NULL, 9, NULL),
(434, 6, 'Yes_DESIGN MANAGEMENT', 'Structural', 433, 1, 109, 1, 0, NULL),
(435, 6, 'No_DESIGN MANAGEMENT', 'Structural', 433, 1, 109, 2, 0, NULL),
(436, 6, 'NotSure_DESIGN MANAGEMENT', 'Structural', 433, 1, 109, 3, 0, NULL),
(437, 5, 'Majors', 'Decision', 174, 1, 110, NULL, 9, NULL),
(438, 6, 'Yes_CORPORATE LAW', 'Structural', 437, 1, 110, 1, 0, NULL),
(439, 6, 'No_CORPORATE LAW', 'Structural', 437, 1, 110, 2, 0, NULL),
(440, 6, 'NotSure_CORPORATE LAW', 'Structural', 437, 1, 110, 3, 0, NULL),
(441, 5, 'Majors', 'Decision', 186, 1, 111, NULL, 10, NULL),
(442, 6, 'Yes_Computer Application Studies', 'Structural', 441, 1, 111, 1, 0, NULL),
(443, 6, 'No_Computer Application Studies', 'Structural', 441, 1, 111, 2, 0, NULL),
(444, 6, 'NotSure_Computer Application Studies', 'Structural', 441, 1, 111, 3, 0, NULL),
(445, 5, 'Majors', 'Decision', 186, 1, 112, NULL, 10, NULL),
(446, 6, 'Yes_Accounting', 'Structural', 445, 1, 112, 1, 0, NULL),
(447, 6, 'No_Accounting', 'Structural', 445, 1, 112, 2, 0, NULL),
(448, 6, 'NotSure_Accounting', 'Structural', 445, 1, 112, 3, 0, NULL),
(449, 5, 'Majors', 'Decision', 186, 1, 113, NULL, 10, NULL),
(450, 6, 'Yes_Finance', 'Structural', 449, 1, 113, 1, 0, NULL),
(451, 6, 'No_Finance', 'Structural', 449, 1, 113, 2, 0, NULL),
(452, 6, 'NotSure_Finance', 'Structural', 449, 1, 113, 3, 0, NULL),
(453, 5, 'Majors', 'Decision', 186, 1, 114, NULL, 10, NULL),
(454, 6, 'Yes_Office Management', 'Structural', 453, 1, 114, 1, 0, NULL),
(455, 6, 'No_Office Management', 'Structural', 453, 1, 114, 2, 0, NULL),
(456, 6, 'NotSure_Office Management', 'Structural', 453, 1, 114, 3, 0, NULL),
(457, 5, 'Majors', 'Decision', 186, 1, 115, NULL, 10, NULL),
(458, 6, 'Yes_Banking', 'Structural', 457, 1, 115, 1, 0, NULL),
(459, 6, 'No_Banking', 'Structural', 457, 1, 115, 2, 0, NULL),
(460, 6, 'NotSure_Banking', 'Structural', 457, 1, 115, 3, 0, NULL),
(461, 5, 'Majors', 'Decision', 198, 1, 116, NULL, 11, NULL),
(462, 6, 'Yes_English', 'Structural', 461, 1, 116, 1, 0, NULL),
(463, 6, 'No_English', 'Structural', 461, 1, 116, 2, 0, NULL),
(464, 6, 'NotSure_English', 'Structural', 461, 1, 116, 3, 0, NULL),
(465, 5, 'Majors', 'Decision', 198, 1, 117, NULL, 11, NULL),
(466, 6, 'Yes_History', 'Structural', 465, 1, 117, 1, 0, NULL),
(467, 6, 'No_History', 'Structural', 465, 1, 117, 2, 0, NULL),
(468, 6, 'NotSure_History', 'Structural', 465, 1, 117, 3, 0, NULL),
(469, 5, 'Majors', 'Decision', 198, 1, 118, NULL, 11, NULL),
(470, 6, 'Yes_Economics', 'Structural', 469, 1, 118, 1, 0, NULL),
(471, 6, 'No_Economics', 'Structural', 469, 1, 118, 2, 0, NULL),
(472, 6, 'NotSure_Economics', 'Structural', 469, 1, 118, 3, 0, NULL),
(473, 5, 'Majors', 'Decision', 198, 1, 119, NULL, 11, NULL),
(474, 6, 'Yes_Political Science', 'Structural', 473, 1, 119, 1, 0, NULL),
(475, 6, 'No_Political Science', 'Structural', 473, 1, 119, 2, 0, NULL),
(476, 6, 'NotSure_Political Science', 'Structural', 473, 1, 119, 3, 0, NULL),
(477, 5, 'Majors', 'Decision', 198, 1, 120, NULL, 11, NULL),
(478, 6, 'Yes_Hindi', 'Structural', 477, 1, 120, 1, 0, NULL),
(479, 6, 'No_Hindi', 'Structural', 477, 1, 120, 2, 0, NULL),
(480, 6, 'NotSure_Hindi', 'Structural', 477, 1, 120, 3, 0, NULL),
(481, 5, 'Majors', 'Decision', 210, 1, 121, NULL, 12, NULL),
(482, 6, 'Yes_Agricultre Biotechnology', 'Structural', 481, 1, 121, 1, 0, NULL),
(483, 6, 'No_Agricultre Biotechnology', 'Structural', 481, 1, 121, 2, 0, NULL),
(484, 6, 'NotSure_Agricultre Biotechnology', 'Structural', 481, 1, 121, 3, 0, NULL),
(485, 5, 'Majors', 'Decision', 210, 1, 122, NULL, 12, NULL),
(486, 6, 'Yes_Fisheries Science', 'Structural', 485, 1, 122, 1, 0, NULL),
(487, 6, 'No_Fisheries Science', 'Structural', 485, 1, 122, 2, 0, NULL),
(488, 6, 'NotSure_Fisheries Science', 'Structural', 485, 1, 122, 3, 0, NULL),
(489, 5, 'Majors', 'Decision', 210, 1, 123, NULL, 12, NULL),
(490, 6, 'Yes_Agri Management', 'Structural', 489, 1, 123, 1, 0, NULL),
(491, 6, 'No_Agri Management', 'Structural', 489, 1, 123, 2, 0, NULL),
(492, 6, 'NotSure_Agri Management', 'Structural', 489, 1, 123, 3, 0, NULL),
(493, 5, 'Majors', 'Decision', 210, 1, 124, NULL, 12, NULL),
(494, 6, 'Yes_Plant Physiology', 'Structural', 493, 1, 124, 1, 0, NULL),
(495, 6, 'No_Plant Physiology', 'Structural', 493, 1, 124, 2, 0, NULL),
(496, 6, 'NotSure_Plant Physiology', 'Structural', 493, 1, 124, 3, 0, NULL),
(497, 5, 'Majors', 'Decision', 210, 1, 125, NULL, 12, NULL),
(498, 6, 'Yes_Agricultural Statistics', 'Structural', 497, 1, 125, 1, 0, NULL),
(499, 6, 'No_Agricultural Statistics', 'Structural', 497, 1, 125, 2, 0, NULL),
(500, 6, 'NotSure_Agricultural Statistics', 'Structural', 497, 1, 125, 3, 0, NULL),
(501, 5, 'Majors', 'Decision', 222, 1, 126, NULL, 13, NULL),
(502, 6, 'Yes_FASHION DESIGN', 'Structural', 501, 1, 126, 1, 0, NULL),
(503, 6, 'No_FASHION DESIGN', 'Structural', 501, 1, 126, 2, 0, NULL),
(504, 6, 'NotSure_FASHION DESIGN', 'Structural', 501, 1, 126, 3, 0, NULL),
(505, 5, 'Majors', 'Decision', 222, 1, 127, NULL, 13, NULL),
(506, 6, 'Yes_Interior Design', 'Structural', 505, 1, 127, 1, 0, NULL),
(507, 6, 'No_Interior Design', 'Structural', 505, 1, 127, 2, 0, NULL),
(508, 6, 'NotSure_Interior Design', 'Structural', 505, 1, 127, 3, 0, NULL),
(509, 5, 'Majors', 'Decision', 222, 1, 128, NULL, 13, NULL),
(510, 6, 'Yes_Textile Design', 'Structural', 509, 1, 128, 1, 0, NULL),
(511, 6, 'No_Textile Design', 'Structural', 509, 1, 128, 2, 0, NULL),
(512, 6, 'NotSure_Textile Design', 'Structural', 509, 1, 128, 3, 0, NULL),
(513, 5, 'Majors', 'Decision', 222, 1, 129, NULL, 13, NULL),
(514, 6, 'Yes_Industrial Design', 'Structural', 513, 1, 129, 1, 0, NULL),
(515, 6, 'No_Industrial Design', 'Structural', 513, 1, 129, 2, 0, NULL),
(516, 6, 'NotSure_Industrial Design', 'Structural', 513, 1, 129, 3, 0, NULL),
(517, 5, 'Majors', 'Decision', 222, 1, 130, NULL, 13, NULL),
(518, 6, 'Yes_JEWELRY DESIGN', 'Structural', 517, 1, 130, 1, 0, NULL),
(519, 6, 'No_JEWELRY DESIGN', 'Structural', 517, 1, 130, 2, 0, NULL),
(520, 6, 'NotSure_JEWELRY DESIGN', 'Structural', 517, 1, 130, 3, 0, NULL),
(521, 5, 'Majors', 'Decision', 234, 1, 131, NULL, 14, NULL),
(522, 6, 'Yes_MULTIMEDIA COMMUNICATION', 'Structural', 521, 1, 131, 1, 0, NULL),
(523, 6, 'No_MULTIMEDIA COMMUNICATION', 'Structural', 521, 1, 131, 2, 0, NULL),
(524, 6, 'NotSure_MULTIMEDIA COMMUNICATION', 'Structural', 521, 1, 131, 3, 0, NULL),
(525, 5, 'Majors', 'Decision', 234, 1, 132, NULL, 14, NULL),
(526, 6, 'Yes_ANIMATION', 'Structural', 525, 1, 132, 1, 0, NULL),
(527, 6, 'No_ANIMATION', 'Structural', 525, 1, 132, 2, 0, NULL),
(528, 6, 'NotSure_ANIMATION', 'Structural', 525, 1, 132, 3, 0, NULL),
(529, 5, 'Majors', 'Decision', 234, 1, 133, NULL, 14, NULL),
(530, 6, 'Yes_VIDEOGRAPHY', 'Structural', 529, 1, 133, 1, 0, NULL),
(531, 6, 'No_VIDEOGRAPHY', 'Structural', 529, 1, 133, 2, 0, NULL),
(532, 6, 'NotSure_VIDEOGRAPHY', 'Structural', 529, 1, 133, 3, 0, NULL),
(533, 5, 'Majors', 'Decision', 234, 1, 134, NULL, 14, NULL),
(534, 6, 'Yes_GRAPHIC DESIGNING', 'Structural', 533, 1, 134, 1, 0, NULL),
(535, 6, 'No_GRAPHIC DESIGNING', 'Structural', 533, 1, 134, 2, 0, NULL),
(536, 6, 'NotSure_GRAPHIC DESIGNING', 'Structural', 533, 1, 134, 3, 0, NULL),
(537, 5, 'Majors', 'Decision', 234, 1, 135, NULL, 14, NULL),
(538, 6, 'Yes_GAMES And SPORTS', 'Structural', 537, 1, 135, 1, 0, NULL),
(539, 6, 'No_GAMES And SPORTS', 'Structural', 537, 1, 135, 2, 0, NULL),
(540, 6, 'NotSure_GAMES And SPORTS', 'Structural', 537, 1, 135, 3, 0, NULL),
(541, 5, 'Majors', 'Decision', 70, 1, 136, NULL, 15, NULL),
(542, 6, 'Yes_Computer science', 'Structural', 541, 1, 136, 1, 0, NULL),
(543, 6, 'No_Computer science', 'Structural', 541, 1, 136, 2, 0, NULL),
(544, 6, 'NotSure_Computer science', 'Structural', 541, 1, 136, 3, 0, NULL),
(545, 5, 'Majors', 'Decision', 70, 1, 137, NULL, 15, NULL),
(546, 6, 'Yes_Electronics & communication', 'Structural', 545, 1, 137, 1, 0, NULL),
(547, 6, 'No_Electronics & communication', 'Structural', 545, 1, 137, 2, 0, NULL),
(548, 6, 'NotSure_Electronics & communication', 'Structural', 545, 1, 137, 3, 0, NULL),
(549, 5, 'Majors', 'Decision', 70, 1, 138, NULL, 15, NULL),
(550, 6, 'Yes_Electronics', 'Structural', 549, 1, 138, 1, 0, NULL),
(551, 6, 'No_Electronics', 'Structural', 549, 1, 138, 2, 0, NULL),
(552, 6, 'NotSure_Electronics', 'Structural', 549, 1, 138, 3, 0, NULL),
(553, 5, 'Majors', 'Decision', 70, 1, 139, NULL, 15, NULL),
(554, 6, 'Yes_Civil engineering', 'Structural', 553, 1, 139, 1, 0, NULL),
(555, 6, 'No_Civil engineering', 'Structural', 553, 1, 139, 2, 0, NULL),
(556, 6, 'NotSure_Civil engineering', 'Structural', 553, 1, 139, 3, 0, NULL),
(557, 5, 'Majors', 'Decision', 70, 1, 140, NULL, 15, NULL),
(558, 6, 'Yes_Mechanical engineering', 'Structural', 557, 1, 140, 1, 0, NULL),
(559, 6, 'No_Mechanical engineering', 'Structural', 557, 1, 140, 2, 0, NULL),
(560, 6, 'NotSure_Mechanical engineering', 'Structural', 557, 1, 140, 3, 0, NULL),
(561, 5, 'Majors', 'Decision', 70, 1, 141, NULL, 15, NULL),
(562, 6, 'Yes_Electrical', 'Structural', 561, 1, 141, 1, 0, NULL),
(563, 6, 'No_Electrical', 'Structural', 561, 1, 141, 2, 0, NULL),
(564, 6, 'NotSure_Electrical', 'Structural', 561, 1, 141, 3, 0, NULL),
(565, 5, 'Majors', 'Decision', 70, 1, 142, NULL, 15, NULL),
(566, 6, 'Yes_Design engineering', 'Structural', 565, 1, 142, 1, 0, NULL),
(567, 6, 'No_Design engineering', 'Structural', 565, 1, 142, 2, 0, NULL),
(568, 6, 'NotSure_Design engineering', 'Structural', 565, 1, 142, 3, 0, NULL),
(569, 5, 'Majors', 'Decision', 70, 1, 143, NULL, 15, NULL),
(570, 6, 'Yes_Electrical & electronics', 'Structural', 569, 1, 143, 1, 0, NULL),
(571, 6, 'No_Electrical & electronics', 'Structural', 569, 1, 143, 2, 0, NULL),
(572, 6, 'NotSure_Electrical & electronics', 'Structural', 569, 1, 143, 3, 0, NULL),
(573, 5, 'Majors', 'Decision', 70, 1, 144, NULL, 15, NULL),
(574, 6, 'Yes_Information technology', 'Structural', 573, 1, 144, 1, 0, NULL),
(575, 6, 'No_Information technology', 'Structural', 573, 1, 144, 2, 0, NULL),
(576, 6, 'NotSure_Information technology', 'Structural', 573, 1, 144, 3, 0, NULL),
(577, 5, 'Majors', 'Decision', 70, 1, 145, NULL, 15, NULL),
(578, 6, 'Yes_Industrial engineering', 'Structural', 577, 1, 145, 1, 0, NULL),
(579, 6, 'No_Industrial engineering', 'Structural', 577, 1, 145, 2, 0, NULL),
(580, 6, 'NotSure_Industrial engineering', 'Structural', 577, 1, 145, 3, 0, NULL),
(581, 5, 'Majors', 'Decision', 70, 1, 146, NULL, 15, NULL),
(582, 6, 'Yes_Software engineering', 'Structural', 581, 1, 146, 1, 0, NULL),
(583, 6, 'No_Software engineering', 'Structural', 581, 1, 146, 2, 0, NULL),
(584, 6, 'NotSure_Software engineering', 'Structural', 581, 1, 146, 3, 0, NULL),
(585, 5, 'Majors', 'Decision', 70, 1, 147, NULL, 15, NULL),
(586, 6, 'Yes_Manufacturing engineering', 'Structural', 585, 1, 147, 1, 0, NULL),
(587, 6, 'No_Manufacturing engineering', 'Structural', 585, 1, 147, 2, 0, NULL),
(588, 6, 'NotSure_Manufacturing engineering', 'Structural', 585, 1, 147, 3, 0, NULL),
(589, 5, 'Majors', 'Decision', 70, 1, 148, NULL, 15, NULL),
(590, 6, 'Yes_Environmental engineering', 'Structural', 589, 1, 148, 1, 0, NULL),
(591, 6, 'No_Environmental engineering', 'Structural', 589, 1, 148, 2, 0, NULL),
(592, 6, 'NotSure_Environmental engineering', 'Structural', 589, 1, 148, 3, 0, NULL),
(593, 5, 'Majors', 'Decision', 70, 1, 149, NULL, 15, NULL),
(594, 6, 'Yes_Biotechnology', 'Structural', 593, 1, 149, 1, 0, NULL),
(595, 6, 'No_Biotechnology', 'Structural', 593, 1, 149, 2, 0, NULL),
(596, 6, 'NotSure_Biotechnology', 'Structural', 593, 1, 149, 3, 0, NULL),
(597, 5, 'Majors', 'Decision', 70, 1, 150, NULL, 15, NULL),
(598, 6, 'Yes_Chemical engineering', 'Structural', 597, 1, 150, 1, 0, NULL),
(599, 6, 'No_Chemical engineering', 'Structural', 597, 1, 150, 2, 0, NULL),
(600, 6, 'NotSure_Chemical engineering', 'Structural', 597, 1, 150, 3, 0, NULL),
(601, 5, 'Majors', 'Decision', 70, 1, 151, NULL, 15, NULL),
(602, 6, 'Yes_Energy engineering', 'Structural', 601, 1, 151, 1, 0, NULL),
(603, 6, 'No_Energy engineering', 'Structural', 601, 1, 151, 2, 0, NULL),
(604, 6, 'NotSure_Energy engineering', 'Structural', 601, 1, 151, 3, 0, NULL),
(605, 5, 'Majors', 'Decision', 70, 1, 152, NULL, 15, NULL),
(606, 6, 'Yes_Control engineering', 'Structural', 605, 1, 152, 1, 0, NULL),
(607, 6, 'No_Control engineering', 'Structural', 605, 1, 152, 2, 0, NULL),
(608, 6, 'NotSure_Control engineering', 'Structural', 605, 1, 152, 3, 0, NULL),
(609, 5, 'Majors', 'Decision', 70, 1, 153, NULL, 15, NULL),
(610, 6, 'Yes_Network engineering', 'Structural', 609, 1, 153, 1, 0, NULL),
(611, 6, 'No_Network engineering', 'Structural', 609, 1, 153, 2, 0, NULL),
(612, 6, 'NotSure_Network engineering', 'Structural', 609, 1, 153, 3, 0, NULL),
(613, 5, 'Majors', 'Decision', 70, 1, 154, NULL, 15, NULL),
(614, 6, 'Yes_Nanotechnology', 'Structural', 613, 1, 154, 1, 0, NULL),
(615, 6, 'No_Nanotechnology', 'Structural', 613, 1, 154, 2, 0, NULL),
(616, 6, 'NotSure_Nanotechnology', 'Structural', 613, 1, 154, 3, 0, NULL),
(617, 5, 'Majors', 'Decision', 70, 1, 155, NULL, 15, NULL),
(618, 6, 'Yes_Instrumentation', 'Structural', 617, 1, 155, 1, 0, NULL),
(619, 6, 'No_Instrumentation', 'Structural', 617, 1, 155, 2, 0, NULL),
(620, 6, 'NotSure_Instrumentation', 'Structural', 617, 1, 155, 3, 0, NULL),
(621, 5, 'Majors', 'Decision', 82, 1, 156, NULL, 16, NULL),
(622, 6, 'Yes_Urban planning', 'Structural', 621, 1, 156, 1, 0, NULL),
(623, 6, 'No_Urban planning', 'Structural', 621, 1, 156, 2, 0, NULL),
(624, 6, 'NotSure_Urban planning', 'Structural', 621, 1, 156, 3, 0, NULL),
(625, 5, 'Majors', 'Decision', 82, 1, 157, NULL, 16, NULL),
(626, 6, 'Yes_Landscape architecture', 'Structural', 625, 1, 157, 1, 0, NULL),
(627, 6, 'No_Landscape architecture', 'Structural', 625, 1, 157, 2, 0, NULL),
(628, 6, 'NotSure_Landscape architecture', 'Structural', 625, 1, 157, 3, 0, NULL),
(629, 5, 'Majors', 'Decision', 82, 1, 158, NULL, 16, NULL),
(630, 6, 'Yes_Construction planning', 'Structural', 629, 1, 158, 1, 0, NULL),
(631, 6, 'No_Construction planning', 'Structural', 629, 1, 158, 2, 0, NULL),
(632, 6, 'NotSure_Construction planning', 'Structural', 629, 1, 158, 3, 0, NULL),
(633, 5, 'Majors', 'Decision', 82, 1, 159, NULL, 16, NULL),
(634, 6, 'Yes_Environmental architecture', 'Structural', 633, 1, 159, 1, 0, NULL),
(635, 6, 'No_Environmental architecture', 'Structural', 633, 1, 159, 2, 0, NULL),
(636, 6, 'NotSure_Environmental architecture', 'Structural', 633, 1, 159, 3, 0, NULL),
(637, 5, 'Majors', 'Decision', 82, 1, 160, NULL, 16, NULL),
(638, 6, 'Yes_Urban design', 'Structural', 637, 1, 160, 1, 0, NULL),
(639, 6, 'No_Urban design', 'Structural', 637, 1, 160, 2, 0, NULL),
(640, 6, 'NotSure_Urban design', 'Structural', 637, 1, 160, 3, 0, NULL),
(641, 5, 'Majors', 'Decision', 82, 1, 161, NULL, 16, NULL),
(642, 6, 'Yes_Architectural conservation', 'Structural', 641, 1, 161, 1, 0, NULL),
(643, 6, 'No_Architectural conservation', 'Structural', 641, 1, 161, 2, 0, NULL),
(644, 6, 'NotSure_Architectural conservation', 'Structural', 641, 1, 161, 3, 0, NULL),
(645, 5, 'Majors', 'Decision', 94, 1, 162, NULL, 17, NULL),
(646, 6, 'Yes_Mathematics', 'Structural', 645, 1, 162, 1, 0, NULL),
(647, 6, 'No_Mathematics', 'Structural', 645, 1, 162, 2, 0, NULL),
(648, 6, 'NotSure_Mathematics', 'Structural', 645, 1, 162, 3, 0, NULL),
(649, 5, 'Majors', 'Decision', 94, 1, 163, NULL, 17, NULL),
(650, 6, 'Yes_Chemical science', 'Structural', 649, 1, 163, 1, 0, NULL),
(651, 6, 'No_Chemical science', 'Structural', 649, 1, 163, 2, 0, NULL),
(652, 6, 'NotSure_Chemical science', 'Structural', 649, 1, 163, 3, 0, NULL),
(653, 5, 'Majors', 'Decision', 94, 1, 164, NULL, 17, NULL),
(654, 6, 'Yes_Physics', 'Structural', 653, 1, 164, 1, 0, NULL),
(655, 6, 'No_Physics', 'Structural', 653, 1, 164, 2, 0, NULL),
(656, 6, 'NotSure_Physics', 'Structural', 653, 1, 164, 3, 0, NULL),
(657, 5, 'Majors', 'Decision', 94, 1, 165, NULL, 17, NULL),
(658, 6, 'Yes_Computer science', 'Structural', 657, 1, 165, 1, 0, NULL),
(659, 6, 'No_Computer science', 'Structural', 657, 1, 165, 2, 0, NULL),
(660, 6, 'NotSure_Computer science', 'Structural', 657, 1, 165, 3, 0, NULL),
(661, 5, 'Majors', 'Decision', 94, 1, 166, NULL, 17, NULL),
(662, 6, 'Yes_Biotechnology', 'Structural', 661, 1, 166, 1, 0, NULL),
(663, 6, 'No_Biotechnology', 'Structural', 661, 1, 166, 2, 0, NULL),
(664, 6, 'NotSure_Biotechnology', 'Structural', 661, 1, 166, 3, 0, NULL),
(665, 5, 'Majors', 'Decision', 94, 1, 167, NULL, 17, NULL),
(666, 6, 'Yes_Zoology', 'Structural', 665, 1, 167, 1, 0, NULL),
(667, 6, 'No_Zoology', 'Structural', 665, 1, 167, 2, 0, NULL),
(668, 6, 'NotSure_Zoology', 'Structural', 665, 1, 167, 3, 0, NULL),
(669, 5, 'Majors', 'Decision', 94, 1, 168, NULL, 17, NULL),
(670, 6, 'Yes_Life sciences', 'Structural', 669, 1, 168, 1, 0, NULL),
(671, 6, 'No_Life sciences', 'Structural', 669, 1, 168, 2, 0, NULL),
(672, 6, 'NotSure_Life sciences', 'Structural', 669, 1, 168, 3, 0, NULL),
(673, 5, 'Majors', 'Decision', 94, 1, 169, NULL, 17, NULL),
(674, 6, 'Yes_Microbiology', 'Structural', 673, 1, 169, 1, 0, NULL),
(675, 6, 'No_Microbiology', 'Structural', 673, 1, 169, 2, 0, NULL),
(676, 6, 'NotSure_Microbiology', 'Structural', 673, 1, 169, 3, 0, NULL),
(677, 5, 'Majors', 'Decision', 94, 1, 170, NULL, 17, NULL),
(678, 6, 'Yes_Information technology', 'Structural', 677, 1, 170, 1, 0, NULL),
(679, 6, 'No_Information technology', 'Structural', 677, 1, 170, 2, 0, NULL),
(680, 6, 'NotSure_Information technology', 'Structural', 677, 1, 170, 3, 0, NULL),
(681, 5, 'Majors', 'Decision', 94, 1, 171, NULL, 17, NULL),
(682, 6, 'Yes_Biochemistry', 'Structural', 681, 1, 171, 1, 0, NULL),
(683, 6, 'No_Biochemistry', 'Structural', 681, 1, 171, 2, 0, NULL),
(684, 6, 'NotSure_Biochemistry', 'Structural', 681, 1, 171, 3, 0, NULL),
(685, 5, 'Majors', 'Decision', 94, 1, 172, NULL, 17, NULL),
(686, 6, 'Yes_Geographical sciences ', 'Structural', 685, 1, 172, 1, 0, NULL),
(687, 6, 'No_Geographical sciences ', 'Structural', 685, 1, 172, 2, 0, NULL),
(688, 6, 'NotSure_Geographical sciences ', 'Structural', 685, 1, 172, 3, 0, NULL),
(689, 5, 'Majors', 'Decision', 94, 1, 173, NULL, 17, NULL),
(690, 6, 'Yes_Environmental science', 'Structural', 689, 1, 173, 1, 0, NULL),
(691, 6, 'No_Environmental science', 'Structural', 689, 1, 173, 2, 0, NULL),
(692, 6, 'NotSure_Environmental science', 'Structural', 689, 1, 173, 3, 0, NULL),
(693, 5, 'Majors', 'Decision', 94, 1, 174, NULL, 17, NULL),
(694, 6, 'Yes_Food science', 'Structural', 693, 1, 174, 1, 0, NULL),
(695, 6, 'No_Food science', 'Structural', 693, 1, 174, 2, 0, NULL),
(696, 6, 'NotSure_Food science', 'Structural', 693, 1, 174, 3, 0, NULL),
(697, 5, 'Majors', 'Decision', 94, 1, 175, NULL, 17, NULL),
(698, 6, 'Yes_Statistics', 'Structural', 697, 1, 175, 1, 0, NULL),
(699, 6, 'No_Statistics', 'Structural', 697, 1, 175, 2, 0, NULL),
(700, 6, 'NotSure_Statistics', 'Structural', 697, 1, 175, 3, 0, NULL),
(701, 5, 'Majors', 'Decision', 94, 1, 176, NULL, 17, NULL),
(702, 6, 'Yes_Electronics', 'Structural', 701, 1, 176, 1, 0, NULL),
(703, 6, 'No_Electronics', 'Structural', 701, 1, 176, 2, 0, NULL),
(704, 6, 'NotSure_Electronics', 'Structural', 701, 1, 176, 3, 0, NULL),
(705, 5, 'Majors', 'Decision', 94, 1, 177, NULL, 17, NULL),
(706, 6, 'Yes_Psychology', 'Structural', 705, 1, 177, 1, 0, NULL),
(707, 6, 'No_Psychology', 'Structural', 705, 1, 177, 2, 0, NULL),
(708, 6, 'NotSure_Psychology', 'Structural', 705, 1, 177, 3, 0, NULL),
(709, 5, 'Majors', 'Decision', 106, 1, 178, NULL, 18, NULL),
(710, 6, 'Yes_Digital education', 'Structural', 709, 1, 178, 1, 0, NULL),
(711, 6, 'No_Digital education', 'Structural', 709, 1, 178, 2, 0, NULL),
(712, 6, 'NotSure_Digital education', 'Structural', 709, 1, 178, 3, 0, NULL),
(713, 5, 'Majors', 'Decision', 106, 1, 179, NULL, 18, NULL),
(714, 6, 'Yes_Information technology', 'Structural', 713, 1, 179, 1, 0, NULL),
(715, 6, 'No_Information technology', 'Structural', 713, 1, 179, 2, 0, NULL),
(716, 6, 'NotSure_Information technology', 'Structural', 713, 1, 179, 3, 0, NULL),
(717, 5, 'Majors', 'Decision', 106, 1, 180, NULL, 18, NULL),
(718, 6, 'Yes_Networking technologies', 'Structural', 717, 1, 180, 1, 0, NULL),
(719, 6, 'No_Networking technologies', 'Structural', 717, 1, 180, 2, 0, NULL),
(720, 6, 'NotSure_Networking technologies', 'Structural', 717, 1, 180, 3, 0, NULL),
(721, 5, 'Majors', 'Decision', 106, 1, 181, NULL, 18, NULL),
(722, 6, 'Yes_Software engineering', 'Structural', 721, 1, 181, 1, 0, NULL),
(723, 6, 'No_Software engineering', 'Structural', 721, 1, 181, 2, 0, NULL),
(724, 6, 'NotSure_Software engineering', 'Structural', 721, 1, 181, 3, 0, NULL),
(725, 5, 'Majors', 'Decision', 106, 1, 182, NULL, 18, NULL),
(726, 6, 'Yes_Data science', 'Structural', 725, 1, 182, 1, 0, NULL),
(727, 6, 'No_Data science', 'Structural', 725, 1, 182, 2, 0, NULL),
(728, 6, 'NotSure_Data science', 'Structural', 725, 1, 182, 3, 0, NULL),
(729, 5, 'Majors', 'Decision', 118, 1, 183, NULL, 19, NULL),
(730, 6, 'Yes_Surgery', 'Structural', 729, 1, 183, 1, 0, NULL),
(731, 6, 'No_Surgery', 'Structural', 729, 1, 183, 2, 0, NULL),
(732, 6, 'NotSure_Surgery', 'Structural', 729, 1, 183, 3, 0, NULL),
(733, 5, 'Majors', 'Decision', 118, 1, 184, NULL, 19, NULL),
(734, 6, 'Yes_Orthopaedics', 'Structural', 733, 1, 184, 1, 0, NULL),
(735, 6, 'No_Orthopaedics', 'Structural', 733, 1, 184, 2, 0, NULL),
(736, 6, 'NotSure_Orthopaedics', 'Structural', 733, 1, 184, 3, 0, NULL),
(737, 5, 'Majors', 'Decision', 118, 1, 185, NULL, 19, NULL),
(738, 6, 'Yes_E.n.t', 'Structural', 737, 1, 185, 1, 0, NULL),
(739, 6, 'No_E.n.t', 'Structural', 737, 1, 185, 2, 0, NULL),
(740, 6, 'NotSure_E.n.t', 'Structural', 737, 1, 185, 3, 0, NULL),
(741, 5, 'Majors', 'Decision', 118, 1, 186, NULL, 19, NULL),
(742, 6, 'Yes_Ophthalmology', 'Structural', 741, 1, 186, 1, 0, NULL),
(743, 6, 'No_Ophthalmology', 'Structural', 741, 1, 186, 2, 0, NULL),
(744, 6, 'NotSure_Ophthalmology', 'Structural', 741, 1, 186, 3, 0, NULL),
(745, 5, 'Majors', 'Decision', 118, 1, 187, NULL, 19, NULL),
(746, 6, 'Yes_Obstetrics', 'Structural', 745, 1, 187, 1, 0, NULL),
(747, 6, 'No_Obstetrics', 'Structural', 745, 1, 187, 2, 0, NULL),
(748, 6, 'NotSure_Obstetrics', 'Structural', 745, 1, 187, 3, 0, NULL),
(749, 5, 'Majors', 'Decision', 118, 1, 188, NULL, 19, NULL),
(750, 6, 'Yes_Human anatomy', 'Structural', 749, 1, 188, 1, 0, NULL),
(751, 6, 'No_Human anatomy', 'Structural', 749, 1, 188, 2, 0, NULL),
(752, 6, 'NotSure_Human anatomy', 'Structural', 749, 1, 188, 3, 0, NULL),
(753, 5, 'Majors', 'Decision', 118, 1, 189, NULL, 19, NULL);
INSERT INTO `NODETABLE` (`Node_ID`, `Node_Tier`, `Node_Name`, `Node_Type`, `Prev_Node`, `Public`, `Trigger_Ques`, `Trigger_AnsOp`, `Club_ID`, `Icon_ID`) VALUES
(754, 6, 'Yes_General surgery', 'Structural', 753, 1, 189, 1, 0, NULL),
(755, 6, 'No_General surgery', 'Structural', 753, 1, 189, 2, 0, NULL),
(756, 6, 'NotSure_General surgery', 'Structural', 753, 1, 189, 3, 0, NULL),
(757, 5, 'Majors', 'Decision', 118, 1, 190, NULL, 19, NULL),
(758, 6, 'Yes_Ayurved', 'Structural', 757, 1, 190, 1, 0, NULL),
(759, 6, 'No_Ayurved', 'Structural', 757, 1, 190, 2, 0, NULL),
(760, 6, 'NotSure_Ayurved', 'Structural', 757, 1, 190, 3, 0, NULL),
(761, 5, 'Majors', 'Decision', 118, 1, 191, NULL, 19, NULL),
(762, 6, 'Yes_Anaesthisia', 'Structural', 761, 1, 191, 1, 0, NULL),
(763, 6, 'No_Anaesthisia', 'Structural', 761, 1, 191, 2, 0, NULL),
(764, 6, 'NotSure_Anaesthisia', 'Structural', 761, 1, 191, 3, 0, NULL),
(765, 5, 'Majors', 'Decision', 118, 1, 192, NULL, 19, NULL),
(766, 6, 'Yes_Radiography', 'Structural', 765, 1, 192, 1, 0, NULL),
(767, 6, 'No_Radiography', 'Structural', 765, 1, 192, 2, 0, NULL),
(768, 6, 'NotSure_Radiography', 'Structural', 765, 1, 192, 3, 0, NULL),
(769, 5, 'Majors', 'Decision', 118, 1, 193, NULL, 19, NULL),
(770, 6, 'Yes_Pediatrics', 'Structural', 769, 1, 193, 1, 0, NULL),
(771, 6, 'No_Pediatrics', 'Structural', 769, 1, 193, 2, 0, NULL),
(772, 6, 'NotSure_Pediatrics', 'Structural', 769, 1, 193, 3, 0, NULL),
(773, 5, 'Majors', 'Decision', 118, 1, 194, NULL, 19, NULL),
(774, 6, 'Yes_Physical medicine', 'Structural', 773, 1, 194, 1, 0, NULL),
(775, 6, 'No_Physical medicine', 'Structural', 773, 1, 194, 2, 0, NULL),
(776, 6, 'NotSure_Physical medicine', 'Structural', 773, 1, 194, 3, 0, NULL),
(777, 5, 'Majors', 'Decision', 118, 1, 195, NULL, 19, NULL),
(778, 6, 'Yes_Urology', 'Structural', 777, 1, 195, 1, 0, NULL),
(779, 6, 'No_Urology', 'Structural', 777, 1, 195, 2, 0, NULL),
(780, 6, 'NotSure_Urology', 'Structural', 777, 1, 195, 3, 0, NULL),
(781, 5, 'Majors', 'Decision', 118, 1, 196, NULL, 19, NULL),
(782, 6, 'Yes_Physiology', 'Structural', 781, 1, 196, 1, 0, NULL),
(783, 6, 'No_Physiology', 'Structural', 781, 1, 196, 2, 0, NULL),
(784, 6, 'NotSure_Physiology', 'Structural', 781, 1, 196, 3, 0, NULL),
(785, 5, 'Majors', 'Decision', 118, 1, 197, NULL, 19, NULL),
(786, 6, 'Yes_Medical technology ', 'Structural', 785, 1, 197, 1, 0, NULL),
(787, 6, 'No_Medical technology ', 'Structural', 785, 1, 197, 2, 0, NULL),
(788, 6, 'NotSure_Medical technology ', 'Structural', 785, 1, 197, 3, 0, NULL),
(789, 5, 'Majors', 'Decision', 130, 1, 198, NULL, 20, NULL),
(790, 6, 'Yes_Periodontics', 'Structural', 789, 1, 198, 1, 0, NULL),
(791, 6, 'No_Periodontics', 'Structural', 789, 1, 198, 2, 0, NULL),
(792, 6, 'NotSure_Periodontics', 'Structural', 789, 1, 198, 3, 0, NULL),
(793, 5, 'Majors', 'Decision', 130, 1, 199, NULL, 20, NULL),
(794, 6, 'Yes_Orthodontics', 'Structural', 793, 1, 199, 1, 0, NULL),
(795, 6, 'No_Orthodontics', 'Structural', 793, 1, 199, 2, 0, NULL),
(796, 6, 'NotSure_Orthodontics', 'Structural', 793, 1, 199, 3, 0, NULL),
(797, 5, 'Majors', 'Decision', 130, 1, 200, NULL, 20, NULL),
(798, 6, 'Yes_Prosthodontics', 'Structural', 797, 1, 200, 1, 0, NULL),
(799, 6, 'No_Prosthodontics', 'Structural', 797, 1, 200, 2, 0, NULL),
(800, 6, 'NotSure_Prosthodontics', 'Structural', 797, 1, 200, 3, 0, NULL),
(801, 5, 'Majors', 'Decision', 130, 1, 201, NULL, 20, NULL),
(802, 6, 'Yes_Oral pathology', 'Structural', 801, 1, 201, 1, 0, NULL),
(803, 6, 'No_Oral pathology', 'Structural', 801, 1, 201, 2, 0, NULL),
(804, 6, 'NotSure_Oral pathology', 'Structural', 801, 1, 201, 3, 0, NULL),
(805, 5, 'Majors', 'Decision', 130, 1, 202, NULL, 20, NULL),
(806, 6, 'Yes_Oral surgery', 'Structural', 805, 1, 202, 1, 0, NULL),
(807, 6, 'No_Oral surgery', 'Structural', 805, 1, 202, 2, 0, NULL),
(808, 6, 'NotSure_Oral surgery', 'Structural', 805, 1, 202, 3, 0, NULL),
(809, 5, 'Majors', 'Decision', 130, 1, 203, NULL, 20, NULL),
(810, 6, 'Yes_Endodontics', 'Structural', 809, 1, 203, 1, 0, NULL),
(811, 6, 'No_Endodontics', 'Structural', 809, 1, 203, 2, 0, NULL),
(812, 6, 'NotSure_Endodontics', 'Structural', 809, 1, 203, 3, 0, NULL),
(813, 5, 'Majors', 'Decision', 142, 1, 204, NULL, 21, NULL),
(814, 6, 'Yes_Pharmaceutics', 'Structural', 813, 1, 204, 1, 0, NULL),
(815, 6, 'No_Pharmaceutics', 'Structural', 813, 1, 204, 2, 0, NULL),
(816, 6, 'NotSure_Pharmaceutics', 'Structural', 813, 1, 204, 3, 0, NULL),
(817, 5, 'Majors', 'Decision', 142, 1, 205, NULL, 21, NULL),
(818, 6, 'Yes_Pharmaceutical chemistry', 'Structural', 817, 1, 205, 1, 0, NULL),
(819, 6, 'No_Pharmaceutical chemistry', 'Structural', 817, 1, 205, 2, 0, NULL),
(820, 6, 'NotSure_Pharmaceutical chemistry', 'Structural', 817, 1, 205, 3, 0, NULL),
(821, 5, 'Majors', 'Decision', 142, 1, 206, NULL, 21, NULL),
(822, 6, 'Yes_Pharmaceutical analytics', 'Structural', 821, 1, 206, 1, 0, NULL),
(823, 6, 'No_Pharmaceutical analytics', 'Structural', 821, 1, 206, 2, 0, NULL),
(824, 6, 'NotSure_Pharmaceutical analytics', 'Structural', 821, 1, 206, 3, 0, NULL),
(825, 5, 'Majors', 'Decision', 142, 1, 207, NULL, 21, NULL),
(826, 6, 'Yes_Industrial pharmacy', 'Structural', 825, 1, 207, 1, 0, NULL),
(827, 6, 'No_Industrial pharmacy', 'Structural', 825, 1, 207, 2, 0, NULL),
(828, 6, 'NotSure_Industrial pharmacy', 'Structural', 825, 1, 207, 3, 0, NULL),
(829, 5, 'Majors', 'Decision', 142, 1, 208, NULL, 21, NULL),
(830, 6, 'Yes_Pharmacognosy', 'Structural', 829, 1, 208, 1, 0, NULL),
(831, 6, 'No_Pharmacognosy', 'Structural', 829, 1, 208, 2, 0, NULL),
(832, 6, 'NotSure_Pharmacognosy', 'Structural', 829, 1, 208, 3, 0, NULL),
(833, 5, 'Majors', 'Decision', 142, 1, 209, NULL, 21, NULL),
(834, 6, 'Yes_Practice pharmacy', 'Structural', 833, 1, 209, 1, 0, NULL),
(835, 6, 'No_Practice pharmacy', 'Structural', 833, 1, 209, 2, 0, NULL),
(836, 6, 'NotSure_Practice pharmacy', 'Structural', 833, 1, 209, 3, 0, NULL),
(837, 5, 'Majors', 'Decision', 154, 1, 210, NULL, 22, NULL),
(838, 6, 'Yes_Nursing', 'Structural', 837, 1, 210, 1, 0, NULL),
(839, 6, 'No_Nursing', 'Structural', 837, 1, 210, 2, 0, NULL),
(840, 6, 'NotSure_Nursing', 'Structural', 837, 1, 210, 3, 0, NULL),
(841, 5, 'Majors', 'Decision', 154, 1, 211, NULL, 22, NULL),
(842, 6, 'Yes_Pediatrics', 'Structural', 841, 1, 211, 1, 0, NULL),
(843, 6, 'No_Pediatrics', 'Structural', 841, 1, 211, 2, 0, NULL),
(844, 6, 'NotSure_Pediatrics', 'Structural', 841, 1, 211, 3, 0, NULL),
(845, 5, 'Majors', 'Decision', 166, 1, 212, NULL, 23, NULL),
(846, 6, 'Yes_Livestock management', 'Structural', 845, 1, 212, 1, 0, NULL),
(847, 6, 'No_Livestock management', 'Structural', 845, 1, 212, 2, 0, NULL),
(848, 6, 'NotSure_Livestock management', 'Structural', 845, 1, 212, 3, 0, NULL),
(849, 5, 'Majors', 'Decision', 166, 1, 213, NULL, 23, NULL),
(850, 6, 'Yes_Animal pathology', 'Structural', 849, 1, 213, 1, 0, NULL),
(851, 6, 'No_Animal pathology', 'Structural', 849, 1, 213, 2, 0, NULL),
(852, 6, 'NotSure_Animal pathology', 'Structural', 849, 1, 213, 3, 0, NULL),
(853, 5, 'Majors', 'Decision', 166, 1, 214, NULL, 23, NULL),
(854, 6, 'Yes_Animal nutrition', 'Structural', 853, 1, 214, 1, 0, NULL),
(855, 6, 'No_Animal nutrition', 'Structural', 853, 1, 214, 2, 0, NULL),
(856, 6, 'NotSure_Animal nutrition', 'Structural', 853, 1, 214, 3, 0, NULL),
(857, 5, 'Majors', 'Decision', 166, 1, 215, NULL, 23, NULL),
(858, 6, 'Yes_Animal genetics', 'Structural', 857, 1, 215, 1, 0, NULL),
(859, 6, 'No_Animal genetics', 'Structural', 857, 1, 215, 2, 0, NULL),
(860, 6, 'NotSure_Animal genetics', 'Structural', 857, 1, 215, 3, 0, NULL),
(861, 5, 'Majors', 'Decision', 166, 1, 216, NULL, 23, NULL),
(862, 6, 'Yes_Animal pharmacology', 'Structural', 861, 1, 216, 1, 0, NULL),
(863, 6, 'No_Animal pharmacology', 'Structural', 861, 1, 216, 2, 0, NULL),
(864, 6, 'NotSure_Animal pharmacology', 'Structural', 861, 1, 216, 3, 0, NULL),
(865, 5, 'Majors', 'Decision', 166, 1, 217, NULL, 23, NULL),
(866, 6, 'Yes_Animal surgery', 'Structural', 865, 1, 217, 1, 0, NULL),
(867, 6, 'No_Animal surgery', 'Structural', 865, 1, 217, 2, 0, NULL),
(868, 6, 'NotSure_Animal surgery', 'Structural', 865, 1, 217, 3, 0, NULL),
(869, 5, 'Majors', 'Decision', 178, 1, 218, NULL, 24, NULL),
(870, 6, 'Yes_Human resources management', 'Structural', 869, 1, 218, 1, 0, NULL),
(871, 6, 'No_Human resources management', 'Structural', 869, 1, 218, 2, 0, NULL),
(872, 6, 'NotSure_Human resources management', 'Structural', 869, 1, 218, 3, 0, NULL),
(873, 5, 'Majors', 'Decision', 178, 1, 219, NULL, 24, NULL),
(874, 6, 'Yes_Finance', 'Structural', 873, 1, 219, 1, 0, NULL),
(875, 6, 'No_Finance', 'Structural', 873, 1, 219, 2, 0, NULL),
(876, 6, 'NotSure_Finance', 'Structural', 873, 1, 219, 3, 0, NULL),
(877, 5, 'Majors', 'Decision', 178, 1, 220, NULL, 24, NULL),
(878, 6, 'Yes_Marketing', 'Structural', 877, 1, 220, 1, 0, NULL),
(879, 6, 'No_Marketing', 'Structural', 877, 1, 220, 2, 0, NULL),
(880, 6, 'NotSure_Marketing', 'Structural', 877, 1, 220, 3, 0, NULL),
(881, 5, 'Majors', 'Decision', 178, 1, 221, NULL, 24, NULL),
(882, 6, 'Yes_Hospitality management', 'Structural', 881, 1, 221, 1, 0, NULL),
(883, 6, 'No_Hospitality management', 'Structural', 881, 1, 221, 2, 0, NULL),
(884, 6, 'NotSure_Hospitality management', 'Structural', 881, 1, 221, 3, 0, NULL),
(885, 5, 'Majors', 'Decision', 178, 1, 222, NULL, 24, NULL),
(886, 6, 'Yes_Operations management', 'Structural', 885, 1, 222, 1, 0, NULL),
(887, 6, 'No_Operations management', 'Structural', 885, 1, 222, 2, 0, NULL),
(888, 6, 'NotSure_Operations management', 'Structural', 885, 1, 222, 3, 0, NULL),
(889, 5, 'Majors', 'Decision', 178, 1, 223, NULL, 24, NULL),
(890, 6, 'Yes_Information technology', 'Structural', 889, 1, 223, 1, 0, NULL),
(891, 6, 'No_Information technology', 'Structural', 889, 1, 223, 2, 0, NULL),
(892, 6, 'NotSure_Information technology', 'Structural', 889, 1, 223, 3, 0, NULL),
(893, 5, 'Majors', 'Decision', 190, 1, 224, NULL, 25, NULL),
(894, 6, 'Yes_Business management', 'Structural', 893, 1, 224, 1, 0, NULL),
(895, 6, 'No_Business management', 'Structural', 893, 1, 224, 2, 0, NULL),
(896, 6, 'NotSure_Business management', 'Structural', 893, 1, 224, 3, 0, NULL),
(897, 5, 'Majors', 'Decision', 190, 1, 225, NULL, 25, NULL),
(898, 6, 'Yes_International business', 'Structural', 897, 1, 225, 1, 0, NULL),
(899, 6, 'No_International business', 'Structural', 897, 1, 225, 2, 0, NULL),
(900, 6, 'NotSure_International business', 'Structural', 897, 1, 225, 3, 0, NULL),
(901, 5, 'Majors', 'Decision', 190, 1, 226, NULL, 25, NULL),
(902, 6, 'Yes_Entrepreneurship', 'Structural', 901, 1, 226, 1, 0, NULL),
(903, 6, 'No_Entrepreneurship', 'Structural', 901, 1, 226, 2, 0, NULL),
(904, 6, 'NotSure_Entrepreneurship', 'Structural', 901, 1, 226, 3, 0, NULL),
(905, 5, 'Majors', 'Decision', 202, 1, 227, NULL, 26, NULL),
(906, 6, 'Yes_Bengali', 'Structural', 905, 1, 227, 1, 0, NULL),
(907, 6, 'No_Bengali', 'Structural', 905, 1, 227, 2, 0, NULL),
(908, 6, 'NotSure_Bengali', 'Structural', 905, 1, 227, 3, 0, NULL),
(909, 5, 'Majors', 'Decision', 202, 1, 228, NULL, 26, NULL),
(910, 6, 'Yes_Social work', 'Structural', 909, 1, 228, 1, 0, NULL),
(911, 6, 'No_Social work', 'Structural', 909, 1, 228, 2, 0, NULL),
(912, 6, 'NotSure_Social work', 'Structural', 909, 1, 228, 3, 0, NULL),
(913, 5, 'Majors', 'Decision', 202, 1, 229, NULL, 26, NULL),
(914, 6, 'Yes_Marathi', 'Structural', 913, 1, 229, 1, 0, NULL),
(915, 6, 'No_Marathi', 'Structural', 913, 1, 229, 2, 0, NULL),
(916, 6, 'NotSure_Marathi', 'Structural', 913, 1, 229, 3, 0, NULL),
(917, 5, 'Majors', 'Decision', 202, 1, 230, NULL, 26, NULL),
(918, 6, 'Yes_Religious studies', 'Structural', 917, 1, 230, 1, 0, NULL),
(919, 6, 'No_Religious studies', 'Structural', 917, 1, 230, 2, 0, NULL),
(920, 6, 'NotSure_Religious studies', 'Structural', 917, 1, 230, 3, 0, NULL),
(921, 5, 'Majors', 'Decision', 202, 1, 231, NULL, 26, NULL),
(922, 6, 'Yes_Telugu', 'Structural', 921, 1, 231, 1, 0, NULL),
(923, 6, 'No_Telugu', 'Structural', 921, 1, 231, 2, 0, NULL),
(924, 6, 'NotSure_Telugu', 'Structural', 921, 1, 231, 3, 0, NULL),
(925, 5, 'Majors', 'Decision', 202, 1, 232, NULL, 26, NULL),
(926, 6, 'Yes_Anthropology', 'Structural', 925, 1, 232, 1, 0, NULL),
(927, 6, 'No_Anthropology', 'Structural', 925, 1, 232, 2, 0, NULL),
(928, 6, 'NotSure_Anthropology', 'Structural', 925, 1, 232, 3, 0, NULL),
(929, 5, 'Majors', 'Decision', 214, 1, 233, NULL, 27, NULL),
(930, 6, 'Yes_Horticulture', 'Structural', 929, 1, 233, 1, 0, NULL),
(931, 6, 'No_Horticulture', 'Structural', 929, 1, 233, 2, 0, NULL),
(932, 6, 'NotSure_Horticulture', 'Structural', 929, 1, 233, 3, 0, NULL),
(933, 5, 'Majors', 'Decision', 214, 1, 234, NULL, 27, NULL),
(934, 6, 'Yes_Forestry', 'Structural', 933, 1, 234, 1, 0, NULL),
(935, 6, 'No_Forestry', 'Structural', 933, 1, 234, 2, 0, NULL),
(936, 6, 'NotSure_Forestry', 'Structural', 933, 1, 234, 3, 0, NULL),
(937, 5, 'Majors', 'Decision', 214, 1, 235, NULL, 27, NULL),
(938, 6, 'Yes_Plant pathology', 'Structural', 937, 1, 235, 1, 0, NULL),
(939, 6, 'No_Plant pathology', 'Structural', 937, 1, 235, 2, 0, NULL),
(940, 6, 'NotSure_Plant pathology', 'Structural', 937, 1, 235, 3, 0, NULL),
(941, 5, 'Majors', 'Decision', 214, 1, 236, NULL, 27, NULL),
(942, 6, 'Yes_Agronomy', 'Structural', 941, 1, 236, 1, 0, NULL),
(943, 6, 'No_Agronomy', 'Structural', 941, 1, 236, 2, 0, NULL),
(944, 6, 'NotSure_Agronomy', 'Structural', 941, 1, 236, 3, 0, NULL),
(945, 5, 'Majors', 'Decision', 214, 1, 237, NULL, 27, NULL),
(946, 6, 'Yes_Agricultural technology', 'Structural', 945, 1, 237, 1, 0, NULL),
(947, 6, 'No_Agricultural technology', 'Structural', 945, 1, 237, 2, 0, NULL),
(948, 6, 'NotSure_Agricultural technology', 'Structural', 945, 1, 237, 3, 0, NULL),
(949, 5, 'Majors', 'Decision', 214, 1, 238, NULL, 27, NULL),
(950, 6, 'Yes_Agricultural genetics', 'Structural', 949, 1, 238, 1, 0, NULL),
(951, 6, 'No_Agricultural genetics', 'Structural', 949, 1, 238, 2, 0, NULL),
(952, 6, 'NotSure_Agricultural genetics', 'Structural', 949, 1, 238, 3, 0, NULL),
(953, 5, 'Majors', 'Decision', 226, 1, 239, NULL, 28, NULL),
(954, 6, 'Yes_Computer application studies', 'Structural', 953, 1, 239, 1, 0, NULL),
(955, 6, 'No_Computer application studies', 'Structural', 953, 1, 239, 2, 0, NULL),
(956, 6, 'NotSure_Computer application studies', 'Structural', 953, 1, 239, 3, 0, NULL),
(957, 5, 'Majors', 'Decision', 226, 1, 240, NULL, 28, NULL),
(958, 6, 'Yes_Game design', 'Structural', 957, 1, 240, 1, 0, NULL),
(959, 6, 'No_Game design', 'Structural', 957, 1, 240, 2, 0, NULL),
(960, 6, 'NotSure_Game design', 'Structural', 957, 1, 240, 3, 0, NULL),
(961, 5, 'Majors', 'Decision', 226, 1, 241, NULL, 28, NULL),
(962, 6, 'Yes_Universal design', 'Structural', 961, 1, 241, 1, 0, NULL),
(963, 6, 'No_Universal design', 'Structural', 961, 1, 241, 2, 0, NULL),
(964, 6, 'NotSure_Universal design', 'Structural', 961, 1, 241, 3, 0, NULL),
(965, 5, 'Majors', 'Decision', 226, 1, 242, NULL, 28, NULL),
(966, 6, 'Yes_Information design', 'Structural', 965, 1, 242, 1, 0, NULL),
(967, 6, 'No_Information design', 'Structural', 965, 1, 242, 2, 0, NULL),
(968, 6, 'NotSure_Information design', 'Structural', 965, 1, 242, 3, 0, NULL),
(969, 5, 'Majors', 'Decision', 226, 1, 243, NULL, 28, NULL),
(970, 6, 'Yes_Retail design', 'Structural', 969, 1, 243, 1, 0, NULL),
(971, 6, 'No_Retail design', 'Structural', 969, 1, 243, 2, 0, NULL),
(972, 6, 'NotSure_Retail design', 'Structural', 969, 1, 243, 3, 0, NULL),
(973, 5, 'Majors', 'Decision', 226, 1, 244, NULL, 28, NULL),
(974, 6, 'Yes_Industrial management', 'Structural', 973, 1, 244, 1, 0, NULL),
(975, 6, 'No_Industrial management', 'Structural', 973, 1, 244, 2, 0, NULL),
(976, 6, 'NotSure_Industrial management', 'Structural', 973, 1, 244, 3, 0, NULL),
(977, 5, 'Majors', 'Decision', 238, 1, 245, NULL, 29, NULL),
(978, 6, 'Yes_Journalism', 'Structural', 977, 1, 245, 1, 0, NULL),
(979, 6, 'No_Journalism', 'Structural', 977, 1, 245, 2, 0, NULL),
(980, 6, 'NotSure_Journalism', 'Structural', 977, 1, 245, 3, 0, NULL),
(981, 5, 'Majors', 'Decision', 238, 1, 246, NULL, 29, NULL),
(982, 6, 'Yes_Media studies', 'Structural', 981, 1, 246, 1, 0, NULL),
(983, 6, 'No_Media studies', 'Structural', 981, 1, 246, 2, 0, NULL),
(984, 6, 'NotSure_Media studies', 'Structural', 981, 1, 246, 3, 0, NULL),
(985, 5, 'Majors', 'Decision', 238, 1, 247, NULL, 29, NULL),
(986, 6, 'Yes_Advertising', 'Structural', 985, 1, 247, 1, 0, NULL),
(987, 6, 'No_Advertising', 'Structural', 985, 1, 247, 2, 0, NULL),
(988, 6, 'NotSure_Advertising', 'Structural', 985, 1, 247, 3, 0, NULL),
(989, 5, 'Majors', 'Decision', 238, 1, 248, NULL, 29, NULL),
(990, 6, 'Yes_Film making', 'Structural', 989, 1, 248, 1, 0, NULL),
(991, 6, 'No_Film making', 'Structural', 989, 1, 248, 2, 0, NULL),
(992, 6, 'NotSure_Film making', 'Structural', 989, 1, 248, 3, 0, NULL),
(993, 5, 'Majors', 'Decision', 238, 1, 249, NULL, 29, NULL),
(994, 6, 'Yes_Cinematography', 'Structural', 993, 1, 249, 1, 0, NULL),
(995, 6, 'No_Cinematography', 'Structural', 993, 1, 249, 2, 0, NULL),
(996, 6, 'NotSure_Cinematography', 'Structural', 993, 1, 249, 3, 0, NULL),
(997, 5, 'Majors', 'Decision', 238, 1, 250, NULL, 29, NULL),
(998, 6, 'Yes_Communication studies', 'Structural', 997, 1, 250, 1, 0, NULL),
(999, 6, 'No_Communication studies', 'Structural', 997, 1, 250, 2, 0, NULL),
(1000, 6, 'NotSure_Communication studies', 'Structural', 997, 1, 250, 3, 0, NULL),
(1001, 5, 'Majors', 'Decision', 250, 1, 251, NULL, 30, NULL),
(1002, 6, 'Yes_Civil law', 'Structural', 1001, 1, 251, 1, 0, NULL),
(1003, 6, 'No_Civil law', 'Structural', 1001, 1, 251, 2, 0, NULL),
(1004, 6, 'NotSure_Civil law', 'Structural', 1001, 1, 251, 3, 0, NULL),
(1005, 5, 'Majors', 'Decision', 250, 1, 252, NULL, 30, NULL),
(1006, 6, 'Yes_Criminal law', 'Structural', 1005, 1, 252, 1, 0, NULL),
(1007, 6, 'No_Criminal law', 'Structural', 1005, 1, 252, 2, 0, NULL),
(1008, 6, 'NotSure_Criminal law', 'Structural', 1005, 1, 252, 3, 0, NULL),
(1009, 5, 'Majors', 'Decision', 250, 1, 253, NULL, 30, NULL),
(1010, 6, 'Yes_Corporate law', 'Structural', 1009, 1, 253, 1, 0, NULL),
(1011, 6, 'No_Corporate law', 'Structural', 1009, 1, 253, 2, 0, NULL),
(1012, 6, 'NotSure_Corporate law', 'Structural', 1009, 1, 253, 3, 0, NULL),
(1013, 5, 'Majors', 'Decision', 250, 1, 254, NULL, 30, NULL),
(1014, 6, 'Yes_Intellectual property law', 'Structural', 1013, 1, 254, 1, 0, NULL),
(1015, 6, 'No_Intellectual property law', 'Structural', 1013, 1, 254, 2, 0, NULL),
(1016, 6, 'NotSure_Intellectual property law', 'Structural', 1013, 1, 254, 3, 0, NULL),
(1017, 5, 'Majors', 'Decision', 250, 1, 255, NULL, 30, NULL),
(1018, 6, 'Yes_International law', 'Structural', 1017, 1, 255, 1, 0, NULL),
(1019, 6, 'No_International law', 'Structural', 1017, 1, 255, 2, 0, NULL),
(1020, 6, 'NotSure_International law', 'Structural', 1017, 1, 255, 3, 0, NULL),
(1021, 5, 'Majors', 'Decision', 250, 1, 256, NULL, 30, NULL),
(1022, 6, 'Yes_Labor law', 'Structural', 1021, 1, 256, 1, 0, NULL),
(1023, 6, 'No_Labor law', 'Structural', 1021, 1, 256, 2, 0, NULL),
(1024, 6, 'NotSure_Labor law', 'Structural', 1021, 1, 256, 3, 0, NULL),
(1025, 0, 'Culture', 'Decision', 0, 1, 291, 5, -1, NULL),
(1026, 0, 'Culture', 'Decision', 0, 1, 292, 5, -1, NULL),
(1027, 0, 'Culture', 'Decision', 0, 1, 293, 2, -1, NULL),
(1028, 0, 'Culture', 'Decision', 0, 1, 294, 2, -1, NULL),
(1029, 0, 'Culture', 'Decision', 0, 1, 295, 2, -1, NULL),
(1030, 0, 'Culture', 'Decision', 0, 1, 296, 2, -1, NULL),
(1031, 0, 'Academics', 'Decision', 0, 1, 297, 5, -1, NULL),
(1032, 0, 'Academics', 'Decision', 0, 1, 298, 5, -1, NULL),
(1033, 0, 'Academics', 'Decision', 0, 1, 299, 5, -1, NULL),
(1034, 0, 'Academics', 'Decision', 0, 1, 300, 5, -1, NULL),
(1035, 0, 'Academics', 'Decision', 0, 1, 301, 5, -1, NULL),
(1036, 0, 'Culture', 'Decision', 0, 1, 302, 5, -1, NULL),
(1037, 0, 'Culture', 'Decision', 0, 1, 303, 2, -1, NULL),
(1038, 0, 'Development', 'Decision', 0, 1, 304, 2, -2, NULL),
(1039, 0, 'Development', 'Decision', 0, 1, 305, 2, -2, NULL),
(1040, 0, 'Development', 'Decision', 0, 1, 306, 2, -2, NULL),
(1041, 0, 'Development', 'Decision', 0, 1, 307, 5, -2, NULL),
(1042, 0, 'Development', 'Decision', 0, 1, 308, 5, -2, NULL),
(1043, 0, 'Development', 'Decision', 0, 1, 309, 5, -2, NULL),
(1044, 0, 'Staff(teaching)', 'Decision', 0, 1, 310, 5, -3, NULL),
(1045, 0, 'Staff(teaching)', 'Decision', 0, 1, 311, 2, -3, NULL),
(1046, 0, 'Staff(teaching)', 'Decision', 0, 1, 312, 5, -3, NULL),
(1047, 0, 'Scores', 'Decision', 0, 1, 313, 2, -4, NULL),
(1048, 0, 'Scores', 'Decision', 0, 1, 314, 2, -4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Node_Position`
--

CREATE TABLE `Node_Position` (
  `Node_ID` int(11) NOT NULL,
  `Node_Pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Node_Position`
--

INSERT INTO `Node_Position` (`Node_ID`, `Node_Pos`) VALUES
(0, 0),
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(34, 34),
(35, 35),
(36, 36),
(37, 37),
(38, 38),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(48, 48),
(49, 49),
(50, 50),
(51, 51),
(52, 52),
(53, 53),
(54, 54),
(55, 55),
(56, 56),
(57, 57),
(58, 58),
(59, 59),
(60, 60),
(61, 61),
(62, 62),
(63, 63),
(64, 64),
(65, 65),
(66, 66),
(67, 67),
(68, 68),
(69, 69),
(70, 70),
(71, 71),
(72, 72),
(73, 73),
(74, 74),
(75, 75),
(76, 76),
(77, 77),
(78, 78),
(79, 79),
(80, 80),
(81, 81),
(82, 82),
(83, 83),
(84, 84),
(85, 85),
(86, 86),
(87, 87),
(88, 88),
(89, 89),
(90, 90),
(91, 91),
(92, 92),
(93, 93),
(94, 94),
(95, 95),
(96, 96),
(97, 97),
(98, 98),
(99, 99),
(100, 100),
(101, 101),
(102, 102),
(103, 103),
(104, 104),
(105, 105),
(106, 106),
(107, 107),
(108, 108),
(109, 109),
(110, 110),
(111, 111),
(112, 112),
(113, 113),
(114, 114),
(115, 115),
(116, 116),
(117, 117),
(118, 118),
(119, 119),
(120, 120),
(121, 121),
(122, 122),
(123, 123),
(124, 124),
(125, 125),
(126, 126),
(127, 127),
(128, 128),
(129, 129),
(130, 130),
(131, 131),
(132, 132),
(133, 133),
(134, 134),
(135, 135),
(136, 136),
(137, 137),
(138, 138),
(139, 139),
(140, 140),
(141, 141),
(142, 142),
(143, 143),
(144, 144),
(145, 145),
(146, 146),
(147, 147),
(148, 148),
(149, 149),
(150, 150),
(151, 151),
(152, 152),
(153, 153),
(154, 154),
(155, 155),
(156, 156),
(157, 157),
(158, 158),
(159, 159),
(160, 160),
(161, 161),
(162, 162),
(163, 163),
(164, 164),
(165, 165),
(166, 166),
(167, 167),
(168, 168),
(169, 169),
(170, 170),
(171, 171),
(172, 172),
(173, 173),
(174, 174),
(175, 175),
(176, 176),
(177, 177),
(178, 178),
(179, 179),
(180, 180),
(181, 181),
(182, 182),
(183, 183),
(184, 184),
(185, 185),
(186, 186),
(187, 187),
(188, 188),
(189, 189),
(190, 190),
(191, 191),
(192, 192),
(193, 193),
(194, 194),
(195, 195),
(196, 196),
(197, 197),
(198, 198),
(199, 199),
(200, 200),
(201, 201),
(202, 202),
(203, 203),
(204, 204),
(205, 205),
(206, 206),
(207, 207),
(208, 208),
(209, 209),
(210, 210),
(211, 211),
(212, 212),
(213, 213),
(214, 214),
(215, 215),
(216, 216),
(217, 217),
(218, 218),
(219, 219),
(220, 220),
(221, 221),
(222, 222),
(223, 223),
(224, 224),
(225, 225),
(226, 226),
(227, 227),
(228, 228),
(229, 229),
(230, 230),
(231, 231),
(232, 232),
(233, 233),
(234, 234),
(235, 235),
(236, 236),
(237, 237),
(238, 238),
(239, 239),
(240, 240),
(241, 241),
(242, 242),
(243, 243),
(244, 244),
(245, 245),
(246, 246),
(247, 247),
(248, 248),
(249, 249),
(250, 250),
(251, 251),
(252, 252),
(253, 253),
(254, 254),
(255, 255),
(256, 256),
(257, 257),
(258, 258),
(259, 259),
(260, 260),
(261, 261),
(262, 262),
(263, 263),
(264, 264),
(265, 265),
(266, 266),
(267, 267),
(268, 268),
(269, 269),
(270, 270),
(271, 271),
(272, 272),
(273, 273),
(274, 274),
(275, 275),
(276, 276),
(277, 277),
(278, 278),
(279, 279),
(280, 280),
(281, 281),
(282, 282),
(283, 283),
(284, 284),
(285, 285),
(286, 286),
(287, 287),
(288, 288),
(289, 289),
(290, 290),
(291, 291),
(292, 292),
(293, 293),
(294, 294),
(295, 295),
(296, 296),
(297, 297),
(298, 298),
(299, 299),
(300, 300),
(301, 301),
(302, 302),
(303, 303),
(304, 304),
(305, 305),
(306, 306),
(307, 307),
(308, 308),
(309, 309),
(310, 310),
(311, 311),
(312, 312),
(313, 313),
(314, 314),
(315, 315),
(316, 316),
(317, 317),
(318, 318),
(319, 319),
(320, 320),
(321, 321),
(322, 322),
(323, 323),
(324, 324),
(325, 325),
(326, 326),
(327, 327),
(328, 328),
(329, 329),
(330, 330),
(331, 331),
(332, 332),
(333, 333),
(334, 334),
(335, 335),
(336, 336),
(337, 337),
(338, 338),
(339, 339),
(340, 340),
(341, 341),
(342, 342),
(343, 343),
(344, 344),
(345, 345),
(346, 346),
(347, 347),
(348, 348),
(349, 349),
(350, 350),
(351, 351),
(352, 352),
(353, 353),
(354, 354),
(355, 355),
(356, 356),
(357, 357),
(358, 358),
(359, 359),
(360, 360),
(361, 361),
(362, 362),
(363, 363),
(364, 364),
(365, 365),
(366, 366),
(367, 367),
(368, 368),
(369, 369),
(370, 370),
(371, 371),
(372, 372),
(373, 373),
(374, 374),
(375, 375),
(376, 376),
(377, 377),
(378, 378),
(379, 379),
(380, 380),
(381, 381),
(382, 382),
(383, 383),
(384, 384),
(385, 385),
(386, 386),
(387, 387),
(388, 388),
(389, 389),
(390, 390),
(391, 391),
(392, 392),
(393, 393),
(394, 394),
(395, 395),
(396, 396),
(397, 397),
(398, 398),
(399, 399),
(400, 400),
(401, 401),
(402, 402),
(403, 403),
(404, 404),
(405, 405),
(406, 406),
(407, 407),
(408, 408),
(409, 409),
(410, 410),
(411, 411),
(412, 412),
(413, 413),
(414, 414),
(415, 415),
(416, 416),
(417, 417),
(418, 418),
(419, 419),
(420, 420),
(421, 421),
(422, 422),
(423, 423),
(424, 424),
(425, 425),
(426, 426),
(427, 427),
(428, 428),
(429, 429),
(430, 430),
(431, 431),
(432, 432),
(433, 433),
(434, 434),
(435, 435),
(436, 436),
(437, 437),
(438, 438),
(439, 439),
(440, 440),
(441, 441),
(442, 442),
(443, 443),
(444, 444),
(445, 445),
(446, 446),
(447, 447),
(448, 448),
(449, 449),
(450, 450),
(451, 451),
(452, 452),
(453, 453),
(454, 454),
(455, 455),
(456, 456),
(457, 457),
(458, 458),
(459, 459),
(460, 460),
(461, 461),
(462, 462),
(463, 463),
(464, 464),
(465, 465),
(466, 466),
(467, 467),
(468, 468),
(469, 469),
(470, 470),
(471, 471),
(472, 472),
(473, 473),
(474, 474),
(475, 475),
(476, 476),
(477, 477),
(478, 478),
(479, 479),
(480, 480),
(481, 481),
(482, 482),
(483, 483),
(484, 484),
(485, 485),
(486, 486),
(487, 487),
(488, 488),
(489, 489),
(490, 490),
(491, 491),
(492, 492),
(493, 493),
(494, 494),
(495, 495),
(496, 496),
(497, 497),
(498, 498),
(499, 499),
(500, 500),
(501, 501),
(502, 502),
(503, 503),
(504, 504),
(505, 505),
(506, 506),
(507, 507),
(508, 508),
(509, 509),
(510, 510),
(511, 511),
(512, 512),
(513, 513),
(514, 514),
(515, 515),
(516, 516),
(517, 517),
(518, 518),
(519, 519),
(520, 520),
(521, 521),
(522, 522),
(523, 523),
(524, 524),
(525, 525),
(526, 526),
(527, 527),
(528, 528),
(529, 529),
(530, 530),
(531, 531),
(532, 532),
(533, 533),
(534, 534),
(535, 535),
(536, 536),
(537, 537),
(538, 538),
(539, 539),
(540, 540),
(541, 541),
(542, 542),
(543, 543),
(544, 544),
(545, 545),
(546, 546),
(547, 547),
(548, 548),
(549, 549),
(550, 550),
(551, 551),
(552, 552),
(553, 553),
(554, 554),
(555, 555),
(556, 556),
(557, 557),
(558, 558),
(559, 559),
(560, 560),
(561, 561),
(562, 562),
(563, 563),
(564, 564),
(565, 565),
(566, 566),
(567, 567),
(568, 568),
(569, 569),
(570, 570),
(571, 571),
(572, 572),
(573, 573),
(574, 574),
(575, 575),
(576, 576),
(577, 577),
(578, 578),
(579, 579),
(580, 580),
(581, 581),
(582, 582),
(583, 583),
(584, 584),
(585, 585),
(586, 586),
(587, 587),
(588, 588),
(589, 589),
(590, 590),
(591, 591),
(592, 592),
(593, 593),
(594, 594),
(595, 595),
(596, 596),
(597, 597),
(598, 598),
(599, 599),
(600, 600),
(601, 601),
(602, 602),
(603, 603),
(604, 604),
(605, 605),
(606, 606),
(607, 607),
(608, 608),
(609, 609),
(610, 610),
(611, 611),
(612, 612),
(613, 613),
(614, 614),
(615, 615),
(616, 616),
(617, 617),
(618, 618),
(619, 619),
(620, 620),
(621, 621),
(622, 622),
(623, 623),
(624, 624),
(625, 625),
(626, 626),
(627, 627),
(628, 628),
(629, 629),
(630, 630),
(631, 631),
(632, 632),
(633, 633),
(634, 634),
(635, 635),
(636, 636),
(637, 637),
(638, 638),
(639, 639),
(640, 640),
(641, 641),
(642, 642),
(643, 643),
(644, 644),
(645, 645),
(646, 646),
(647, 647),
(648, 648),
(649, 649),
(650, 650),
(651, 651),
(652, 652),
(653, 653),
(654, 654),
(655, 655),
(656, 656),
(657, 657),
(658, 658),
(659, 659),
(660, 660),
(661, 661),
(662, 662),
(663, 663),
(664, 664),
(665, 665),
(666, 666),
(667, 667),
(668, 668),
(669, 669),
(670, 670),
(671, 671),
(672, 672),
(673, 673),
(674, 674),
(675, 675),
(676, 676),
(677, 677),
(678, 678),
(679, 679),
(680, 680),
(681, 681),
(682, 682),
(683, 683),
(684, 684),
(685, 685),
(686, 686),
(687, 687),
(688, 688),
(689, 689),
(690, 690),
(691, 691),
(692, 692),
(693, 693),
(694, 694),
(695, 695),
(696, 696),
(697, 697),
(698, 698),
(699, 699),
(700, 700),
(701, 701),
(702, 702),
(703, 703),
(704, 704),
(705, 705),
(706, 706),
(707, 707),
(708, 708),
(709, 709),
(710, 710),
(711, 711),
(712, 712),
(713, 713),
(714, 714),
(715, 715),
(716, 716),
(717, 717),
(718, 718),
(719, 719),
(720, 720),
(721, 721),
(722, 722),
(723, 723),
(724, 724),
(725, 725),
(726, 726),
(727, 727),
(728, 728),
(729, 729),
(730, 730),
(731, 731),
(732, 732),
(733, 733),
(734, 734),
(735, 735),
(736, 736),
(737, 737),
(738, 738),
(739, 739),
(740, 740),
(741, 741),
(742, 742),
(743, 743),
(744, 744),
(745, 745),
(746, 746),
(747, 747),
(748, 748),
(749, 749),
(750, 750),
(751, 751),
(752, 752),
(753, 753),
(754, 754),
(755, 755),
(756, 756),
(757, 757),
(758, 758),
(759, 759),
(760, 760),
(761, 761),
(762, 762),
(763, 763),
(764, 764),
(765, 765),
(766, 766),
(767, 767),
(768, 768),
(769, 769),
(770, 770),
(771, 771),
(772, 772),
(773, 773),
(774, 774),
(775, 775),
(776, 776),
(777, 777),
(778, 778),
(779, 779),
(780, 780),
(781, 781),
(782, 782),
(783, 783),
(784, 784),
(785, 785),
(786, 786),
(787, 787),
(788, 788),
(789, 789),
(790, 790),
(791, 791),
(792, 792),
(793, 793),
(794, 794),
(795, 795),
(796, 796),
(797, 797),
(798, 798),
(799, 799),
(800, 800),
(801, 801),
(802, 802),
(803, 803),
(804, 804),
(805, 805),
(806, 806),
(807, 807),
(808, 808),
(809, 809),
(810, 810),
(811, 811),
(812, 812),
(813, 813),
(814, 814),
(815, 815),
(816, 816),
(817, 817),
(818, 818),
(819, 819),
(820, 820),
(821, 821),
(822, 822),
(823, 823),
(824, 824),
(825, 825),
(826, 826),
(827, 827),
(828, 828),
(829, 829),
(830, 830),
(831, 831),
(832, 832),
(833, 833),
(834, 834),
(835, 835),
(836, 836),
(837, 837),
(838, 838),
(839, 839),
(840, 840),
(841, 841),
(842, 842),
(843, 843),
(844, 844),
(845, 845),
(846, 846),
(847, 847),
(848, 848),
(849, 849),
(850, 850),
(851, 851),
(852, 852),
(853, 853),
(854, 854),
(855, 855),
(856, 856),
(857, 857),
(858, 858),
(859, 859),
(860, 860),
(861, 861),
(862, 862),
(863, 863),
(864, 864),
(865, 865),
(866, 866),
(867, 867),
(868, 868),
(869, 869),
(870, 870),
(871, 871),
(872, 872),
(873, 873),
(874, 874),
(875, 875),
(876, 876),
(877, 877),
(878, 878),
(879, 879),
(880, 880),
(881, 881),
(882, 882),
(883, 883),
(884, 884),
(885, 885),
(886, 886),
(887, 887),
(888, 888),
(889, 889),
(890, 890),
(891, 891),
(892, 892),
(893, 893),
(894, 894),
(895, 895),
(896, 896),
(897, 897),
(898, 898),
(899, 899),
(900, 900),
(901, 901),
(902, 902),
(903, 903),
(904, 904),
(905, 905),
(906, 906),
(907, 907),
(908, 908),
(909, 909),
(910, 910),
(911, 911),
(912, 912),
(913, 913),
(914, 914),
(915, 915),
(916, 916),
(917, 917),
(918, 918),
(919, 919),
(920, 920),
(921, 921),
(922, 922),
(923, 923),
(924, 924),
(925, 925),
(926, 926),
(927, 927),
(928, 928),
(929, 929),
(930, 930),
(931, 931),
(932, 932),
(933, 933),
(934, 934),
(935, 935),
(936, 936),
(937, 937),
(938, 938),
(939, 939),
(940, 940),
(941, 941),
(942, 942),
(943, 943),
(944, 944),
(945, 945),
(946, 946),
(947, 947),
(948, 948),
(949, 949),
(950, 950),
(951, 951),
(952, 952),
(953, 953),
(954, 954),
(955, 955),
(956, 956),
(957, 957),
(958, 958),
(959, 959),
(960, 960),
(961, 961),
(962, 962),
(963, 963),
(964, 964),
(965, 965),
(966, 966),
(967, 967),
(968, 968),
(969, 969),
(970, 970),
(971, 971),
(972, 972),
(973, 973),
(974, 974),
(975, 975),
(976, 976),
(977, 977),
(978, 978),
(979, 979),
(980, 980),
(981, 981),
(982, 982),
(983, 983),
(984, 984),
(985, 985),
(986, 986),
(987, 987),
(988, 988),
(989, 989),
(990, 990),
(991, 991),
(992, 992),
(993, 993),
(994, 994),
(995, 995),
(996, 996),
(997, 997),
(998, 998),
(999, 999),
(1000, 1000),
(1001, 1001),
(1002, 1002),
(1003, 1003),
(1004, 1004),
(1005, 1005),
(1006, 1006),
(1007, 1007),
(1008, 1008),
(1009, 1009),
(1010, 1010),
(1011, 1011),
(1012, 1012),
(1013, 1013),
(1014, 1014),
(1015, 1015),
(1016, 1016),
(1017, 1017),
(1018, 1018),
(1019, 1019),
(1020, 1020),
(1021, 1021),
(1022, 1022),
(1023, 1023),
(1024, 1024),
(1025, 1025),
(1026, 1026),
(1027, 1027),
(1028, 1028),
(1029, 1029),
(1030, 1030),
(1031, 1031),
(1032, 1032),
(1033, 1033),
(1034, 1034),
(1035, 1035),
(1036, 1036),
(1037, 1037),
(1038, 1038),
(1039, 1039),
(1040, 1040),
(1041, 1041),
(1042, 1042),
(1043, 1043),
(1044, 1044),
(1045, 1045),
(1046, 1046),
(1047, 1047),
(1048, 1048);

-- --------------------------------------------------------

--
-- Table structure for table `OPTIONTABLE`
--

CREATE TABLE `OPTIONTABLE` (
  `OP_ID` int(11) NOT NULL,
  `OP_Text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `OPTIONTABLE`
--

INSERT INTO `OPTIONTABLE` (`OP_ID`, `OP_Text`) VALUES
(1, 'Yes'),
(2, 'No'),
(3, 'Not Sure'),
(4, 'Not Applicable'),
(5, 'Varies'),
(6, 'Depends'),
(7, 'university'),
(8, 'campus of a university'),
(9, 'School/College within a university'),
(10, 'Is this an autonomous institute'),
(11, 'high-school'),
(12, 'primary-school'),
(13, 'knidergarten'),
(14, 'vocational training institute'),
(15, 'insert'),
(16, 'Social Class'),
(17, 'CitizenShip'),
(18, 'Extremely hectic/fast'),
(19, 'Comfortably fast'),
(20, 'Moderate'),
(21, 'A bit relaxed'),
(22, 'Minimal'),
(23, '2 or less'),
(24, '3-4 '),
(25, '5-6'),
(26, '7-8'),
(27, '9 or more'),
(28, '4 or less'),
(29, '9-10'),
(30, '11 or more'),
(31, 'Fantastic'),
(32, 'Good'),
(33, 'Neutral'),
(34, 'Bad'),
(35, 'Terrible'),
(36, '0-50%'),
(37, '50-75%'),
(38, '75-90%'),
(39, '90-99%'),
(40, '100% or greater'),
(41, 'Lack of post-college opportunities'),
(42, 'Negative cultural environment'),
(43, 'Poor quality of teaching'),
(44, 'Starting up'),
(45, 'Difficult staff and co-students'),
(46, 'Post-college career opportunities'),
(47, 'Brand name of the college'),
(48, 'Proximity to home/hometown'),
(49, 'Culture'),
(50, 'Xxx'),
(51, 'Communication\r\n'),
(52, 'Domain knowledge'),
(53, 'Empathy'),
(54, 'Work ethic'),
(55, 'Transparency'),
(56, 'Recruit quality faculty'),
(57, 'Improve college culture'),
(58, 'Reduce academic pressure'),
(59, 'Invest in non-academic development of students'),
(60, 'Improve college infrastructure'),
(61, 'Not'),
(62, 'Ultra fast, awesome'),
(63, 'Decent for work and entertainment'),
(64, 'Good for work only'),
(65, 'Wifi network patchy'),
(66, 'No Wifi'),
(67, 'Too expensive'),
(68, 'A bit on the higher side'),
(69, 'Value for Money'),
(70, 'Inexpensive'),
(71, 'Dirt cheap'),
(72, 'Ineffective'),
(73, 'Hardly Effective'),
(74, 'Effective'),
(75, 'Very Effective'),
(76, 'Transformational'),
(77, 'extremely transparent & logical'),
(78, 'fair'),
(79, 'ok'),
(80, 'biased towards some'),
(81, 'extremely erratic and biased'),
(82, '1'),
(83, '2'),
(84, '3'),
(85, '4'),
(86, '5+'),
(87, 'Annual'),
(88, 'Semester'),
(89, 'Trimester'),
(90, 'Quarters'),
(91, 'Any Other'),
(92, '<5%'),
(93, '5%-25%'),
(94, '25%-50%'),
(95, '50%-75%'),
(96, '>75%'),
(97, 'Very Easy'),
(98, 'Easy '),
(99, 'Hard'),
(100, 'Very Hard'),
(101, '5%-10%'),
(102, '10%-25%'),
(103, '25%-75%'),
(104, '24x7'),
(105, 'daytime only'),
(106, 'till late evenings'),
(107, 'mostly during night'),
(108, 'Free'),
(109, 'Subsidized'),
(110, 'No Internet'),
(111, 'Zero'),
(112, '<10'),
(113, '10-20'),
(114, '20-50'),
(115, '>50'),
(116, '<2'),
(117, '3-5'),
(118, '6-15'),
(119, '>15'),
(120, 'Never'),
(121, 'Once a year'),
(122, 'few times a year'),
(123, 'evey month'),
(124, 'evey week'),
(125, 'annual'),
(126, 'twice a year'),
(127, '4 times a year'),
(128, '7pm'),
(129, '10pm'),
(130, '1am'),
(131, '3am'),
(132, 'All night');

-- --------------------------------------------------------

--
-- Table structure for table `Pg_Degrees`
--

CREATE TABLE `Pg_Degrees` (
  `PG_ID` int(11) NOT NULL,
  `PG_Stream` int(11) NOT NULL DEFAULT '82',
  `PG_Major` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pg_Degrees`
--

INSERT INTO `Pg_Degrees` (`PG_ID`, `PG_Stream`, `PG_Major`) VALUES
(1, 70, 'COMPUTER SCIENCE'),
(2, 70, 'ELECTRONICS & COMMUNICATION'),
(3, 70, 'ELECTRONICS'),
(4, 70, 'CIVIL ENGINEERING'),
(5, 70, 'MECHANICAL ENGINEERING'),
(6, 70, 'ELECTRICAL'),
(7, 70, 'DESIGN ENGINEERING'),
(8, 70, 'ELECTRICAL & ELECTRONICS'),
(9, 70, 'INFORMATION TECHNOLOGY'),
(10, 70, 'INDUSTRIAL ENGINEERING'),
(11, 70, 'SOFTWARE ENGINEERING'),
(12, 70, 'MANUFACTURING ENGINEERING'),
(13, 70, 'ENVIRONMENTAL ENGINEERING'),
(14, 70, 'BIOTECHNOLOGY'),
(15, 70, 'CHEMICAL ENGINEERING'),
(16, 70, 'ENERGY ENGINEERING'),
(17, 70, 'CONTROL ENGINEERING'),
(18, 70, 'NETWORK ENGINEERING'),
(19, 70, 'NANOTECHNOLOGY'),
(20, 70, 'INSTRUMENTATION'),
(21, 82, 'URBAN PLANNING'),
(22, 82, 'LANDSCAPE ARCHITECTURE'),
(23, 82, 'CONSTRUCTION PLANNING'),
(24, 82, 'ENVIRONMENTAL ARCHITECTURE'),
(25, 82, 'URBAN DESIGN'),
(26, 82, 'ARCHITECTURAL CONSERVATION'),
(27, 94, 'MATHEMATICS'),
(28, 94, 'CHEMICAL SCIENCE'),
(29, 94, 'PHYSICS'),
(30, 94, 'COMPUTER SCIENCE'),
(31, 94, 'BIOTECHNOLOGY'),
(32, 94, 'ZOOLOGY'),
(33, 94, 'LIFE SCIENCES'),
(34, 94, 'MICROBIOLOGY'),
(35, 94, 'INFORMATION TECHNOLOGY'),
(36, 94, 'BIOCHEMISTRY'),
(37, 94, 'GEOGRAPHICAL SCIENCES '),
(38, 94, 'ENVIRONMENTAL SCIENCE'),
(39, 94, 'FOOD SCIENCE'),
(40, 94, 'STATISTICS'),
(41, 94, 'ELECTRONICS'),
(42, 94, 'PSYCHOLOGY'),
(43, 106, 'DIGITAL EDUCATION'),
(44, 106, 'INFORMATION TECHNOLOGY'),
(45, 106, 'NETWORKING TECHNOLOGIES'),
(46, 106, 'SOFTWARE ENGINEERING'),
(47, 106, 'DATA SCIENCE'),
(48, 118, 'SURGERY'),
(49, 118, 'ORTHOPAEDICS'),
(50, 118, 'E.N.T'),
(51, 118, 'OPHTHALMOLOGY'),
(52, 118, 'OBSTETRICS'),
(53, 118, 'HUMAN ANATOMY'),
(54, 118, 'GENERAL SURGERY'),
(55, 118, 'AYURVED'),
(56, 118, 'ANAESTHISIA'),
(57, 118, 'RADIOGRAPHY'),
(58, 118, 'PEDIATRICS'),
(59, 118, 'PHYSICAL MEDICINE'),
(60, 118, 'UROLOGY'),
(61, 118, 'PHYSIOLOGY'),
(62, 118, 'MEDICAL TECHNOLOGY '),
(63, 130, 'PERIODONTICS'),
(64, 130, 'ORTHODONTICS'),
(65, 130, 'PROSTHODONTICS'),
(66, 130, 'ORAL PATHOLOGY'),
(67, 130, 'ORAL SURGERY'),
(68, 130, 'ENDODONTICS'),
(69, 142, 'PHARMACEUTICS'),
(70, 142, 'PHARMACEUTICAL CHEMISTRY'),
(71, 142, 'PHARMACEUTICAL ANALYTICS'),
(72, 142, 'INDUSTRIAL PHARMACY'),
(73, 142, 'PHARMACOGNOSY'),
(74, 142, 'PRACTICE PHARMACY'),
(75, 154, 'NURSING'),
(76, 154, 'PEDIATRICS'),
(77, 166, 'LIVESTOCK MANAGEMENT'),
(78, 166, 'ANIMAL PATHOLOGY'),
(79, 166, 'ANIMAL NUTRITION'),
(80, 166, 'ANIMAL GENETICS'),
(81, 166, 'ANIMAL PHARMACOLOGY'),
(82, 166, 'ANIMAL SURGERY'),
(83, 178, 'HUMAN RESOURCES MANAGEMENT'),
(84, 178, 'FINANCE'),
(85, 178, 'MARKETING'),
(86, 178, 'HOSPITALITY MANAGEMENT'),
(87, 178, 'OPERATIONS MANAGEMENT'),
(88, 178, 'INFORMATION TECHNOLOGY'),
(89, 190, 'BUSINESS MANAGEMENT'),
(90, 190, 'INTERNATIONAL BUSINESS'),
(91, 190, 'ENTREPRENEURSHIP'),
(92, 202, 'BENGALI'),
(93, 202, 'SOCIAL WORK'),
(94, 202, 'MARATHI'),
(95, 202, 'RELIGIOUS STUDIES'),
(96, 202, 'TELUGU'),
(97, 202, 'ANTHROPOLOGY'),
(98, 214, 'HORTICULTURE'),
(99, 214, 'FORESTRY'),
(100, 214, 'PLANT PATHOLOGY'),
(101, 214, 'AGRONOMY'),
(102, 214, 'AGRICULTURAL TECHNOLOGY'),
(103, 214, 'AGRICULTURAL GENETICS'),
(104, 226, 'COMPUTER APPLICATION STUDIES'),
(105, 226, 'GAME DESIGN'),
(106, 226, 'UNIVERSAL DESIGN'),
(107, 226, 'INFORMATION DESIGN'),
(108, 226, 'RETAIL DESIGN'),
(109, 226, 'INDUSTRIAL MANAGEMENT'),
(110, 238, 'JOURNALISM'),
(111, 238, 'MEDIA STUDIES'),
(112, 238, 'ADVERTISING'),
(113, 238, 'FILM MAKING'),
(114, 238, 'CINEMATOGRAPHY'),
(115, 238, 'COMMUNICATION STUDIES'),
(116, 250, 'CIVIL LAW'),
(117, 250, 'CRIMINAL LAW'),
(118, 250, 'CORPORATE LAW'),
(119, 250, 'INTELLECTUAL PROPERTY LAW'),
(120, 250, 'INTERNATIONAL LAW'),
(121, 250, 'LABOR LAW');

-- --------------------------------------------------------

--
-- Table structure for table `preposition`
--

CREATE TABLE `preposition` (
  `Word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preposition`
--

INSERT INTO `preposition` (`Word`) VALUES
('at'),
('of'),
('as'),
('by'),
('for'),
('but'),
('like'),
('in'),
('on'),
('to');

-- --------------------------------------------------------

--
-- Table structure for table `psycho_table2`
--

CREATE TABLE `psycho_table2` (
  `TABLE2_ID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `D_Node` int(11) DEFAULT NULL,
  `S_Node` int(11) DEFAULT NULL,
  `P_Node` int(11) DEFAULT NULL,
  `Country` varchar(255) NOT NULL,
  `Stream` varchar(255) NOT NULL,
  `Degree` varchar(255) NOT NULL,
  `Major` varchar(255) NOT NULL,
  `NODE_NAME` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Node_Type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `MU` double NOT NULL DEFAULT '0',
  `SIGMA` double NOT NULL DEFAULT '0',
  `Sample_SZ` int(11) NOT NULL DEFAULT '0',
  `Op1` int(11) DEFAULT '0',
  `Op2` int(11) DEFAULT '0',
  `Op3` int(11) DEFAULT '0',
  `Op4` int(11) DEFAULT '0',
  `Op5` int(11) DEFAULT '0',
  `Op6` int(11) DEFAULT '0',
  `Op7` int(11) DEFAULT '0',
  `Op8` int(11) DEFAULT '0',
  `Op9` int(11) DEFAULT '0',
  `Op10` int(11) DEFAULT '0',
  `YEAR_DEPENDENT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `psycho_table2_tags`
--

CREATE TABLE `psycho_table2_tags` (
  `COLL_ID` int(11) NOT NULL,
  `TAG_ID` int(11) NOT NULL,
  `MU` double NOT NULL DEFAULT '0',
  `SIGMA` double NOT NULL DEFAULT '0',
  `Op1` int(11) DEFAULT '0',
  `Op2` int(11) DEFAULT '0',
  `Op3` int(11) DEFAULT '0',
  `Op4` int(11) DEFAULT '0',
  `Op5` int(11) DEFAULT '0',
  `Op6` int(11) DEFAULT '0',
  `Op7` int(11) DEFAULT '0',
  `Op8` int(11) DEFAULT '0',
  `Op9` int(11) DEFAULT '0',
  `Op10` int(11) DEFAULT '0',
  `YEAR_DEPENDENT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `PARAM_ID` int(11) NOT NULL,
  `PARAM_NAME` varchar(255) NOT NULL,
  `VAL_TYPE` tinyint(4) NOT NULL,
  `YEAR_DEPENDENT` tinyint(4) NOT NULL,
  `GLOB_DISP` tinyint(4) NOT NULL,
  `PARAM_WEIGH` float NOT NULL,
  `VAL_UNIT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`PARAM_ID`, `PARAM_NAME`, `VAL_TYPE`, `YEAR_DEPENDENT`, `GLOB_DISP`, `PARAM_WEIGH`, `VAL_UNIT`) VALUES
(1, 'Your College URL:', 1, 0, 1, 10, 'collegeurl'),
(2, 'Admission Process for the programmes:', 1, 1, 0, 20, 'exam'),
(3, 'CutOff for the admisssion:', 0, 1, 0, 20, 'marks'),
(4, 'College Annual Fee:', 0, 1, 0, 30, 'fees per annum'),
(5, 'Type Of the College:', 1, 1, 0, 20, 'degree'),
(6, 'Quality of teaching Staff(PHD VS NON PHD):', 1, 1, 0, 10, 'no. of teaching staff'),
(7, 'Number of students currently studying:', 0, 1, 0, 10, 'no. of students '),
(8, 'Number of Class Hours(Avg no of hours per day/week):', 0, 1, 0, 10, 'no. of classes'),
(9, 'Class Days(Weekly Off Days):', 0, 1, 0, 10, 'free days'),
(10, 'Number of teachers (with breakup of permanent and visiting faculty):', 0, 1, 0, 10, 'total no. of teachers'),
(11, 'Number of students admitted each year - in each degree/level:', 1, 1, 0, 10, 'no. of students in each degree'),
(12, 'Living Expenses(excluding fees):', 0, 1, 0, 10, 'cost per year'),
(13, 'Exam Structure - frequency, work-load', 1, 1, 0, 10, 'exams'),
(14, 'College Events / Fests - Tech & Non-Tech:\r\n', 1, 0, 1, 10, 'events in college'),
(15, 'Internship - whether mandatory or optional, at what time?:', 1, 0, 0, 10, 'internship timings'),
(16, 'Cutoff ranges of entrance exam for last entry to each individual course in that particular year:', 1, 0, 0, 10, 'year wise cutoff'),
(17, 'Students diversity - Gender ratio (for each degree), Local (city/state) vs national vs international students ratio (for each year, for each course/degree):', 1, 0, 0, 10, 'student ratio'),
(18, 'Mess & Food Outlets - availability and quality (inside and nearby):', 1, 0, 0, 10, 'food outlets'),
(19, 'Loan? Availability/Limits/Payback time/Interest - whether internal or via Banks:', 1, 0, 0, 10, 'loan for students'),
(20, 'Scholarship? Effective cost/fees?:', 1, 0, 0, 10, 'scholarship fee');

-- --------------------------------------------------------

--
-- Table structure for table `QUESTIONTABALE`
--

CREATE TABLE `QUESTIONTABALE` (
  `Q_ID` int(11) NOT NULL,
  `Q_Text` varchar(255) NOT NULL,
  `Header_val` varchar(255) DEFAULT NULL,
  `Ref_Entity` int(11) NOT NULL DEFAULT '0',
  `Option_Num` int(11) NOT NULL,
  `Op1` int(11) DEFAULT NULL,
  `Op2` int(11) DEFAULT NULL,
  `Op3` int(11) DEFAULT NULL,
  `Op4` int(11) DEFAULT NULL,
  `Op5` int(11) DEFAULT NULL,
  `Op6` int(11) DEFAULT NULL,
  `Op7` int(11) DEFAULT NULL,
  `Op8` int(11) DEFAULT NULL,
  `Op9` int(11) DEFAULT NULL,
  `Op10` int(11) DEFAULT NULL,
  `User_Tags` varchar(255) DEFAULT NULL,
  `Coll_Tags` varchar(255) DEFAULT NULL,
  `User_Content` varchar(255) DEFAULT NULL,
  `Coll_Content` varchar(255) DEFAULT NULL,
  `unit_flag` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QUESTIONTABALE`
--

INSERT INTO `QUESTIONTABALE` (`Q_ID`, `Q_Text`, `Header_val`, `Ref_Entity`, `Option_Num`, `Op1`, `Op2`, `Op3`, `Op4`, `Op5`, `Op6`, `Op7`, `Op8`, `Op9`, `Op10`, `User_Tags`, `Coll_Tags`, `User_Content`, `Coll_Content`, `unit_flag`) VALUES
(1, 'Does it offer programmes in Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, 'Does it offer programmes in Architecture?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 'Does it offer programmes in Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Does it offer programmes in Computer Application?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Does it offer programmes in Medical?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Does it offer programmes in Dental?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Does it offer programmes in Pharmacy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Does it offer programmes in Paramedical?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Does it offer programmes in Veterinary?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Does it offer programmes in Management/Business?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 'Does it offer programmes in Commerce/Economics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 'Does it offer programmes in Liberal Arts?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'Does it offer programmes in Agriculture?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'Does it offer programmes in Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'Does it offer programmes in Mass Communication?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'Does it offer programmes in Law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(29, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(32, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(33, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(38, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(39, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(46, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(47, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(48, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(50, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(51, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(52, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(53, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(54, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(55, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(56, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(57, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(58, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(59, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(60, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(61, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(62, 'Does it offer Undergraduate degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(63, 'Does it offer Masters degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(64, 'Does it offer Doctoral degree?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(65, 'Does it offer a major in Computer Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(66, 'Does it offer a major in Mechanical Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(67, 'Does it offer a major in Electronics And Communication?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(68, 'Does it offer a major in Civil Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(69, 'Does it offer a major in Chemical Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(70, 'Does it offer a major in Electrical And Electronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(71, 'Does it offer a major in Information Technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(72, 'Does it offer a major in Electrical Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(73, 'Does it offer a major in Electronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(74, 'Does it offer a major in BioTechnology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(75, 'Does it offer a major in Aerospace Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(76, 'Does it offer a major in Industrial Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(77, 'Does it offer a major in BioMedical Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(78, 'Does it offer a major in Agricultural Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(79, 'Does it offer a major in Mechatronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(80, 'Does it offer a major in Food Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(81, 'Does it offer a major in Mining?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(82, 'Does it offer a major in Material Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(83, 'Does it offer a major in PetroChemical Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(84, 'Does it offer a major in Textile Engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(85, 'Does it offer a major in Interior Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(86, 'Does it offer a major in Architecture Planning?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(87, 'Does it offer a major in Chemical Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(88, 'Does it offer a major in Mathematics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(89, 'Does it offer a major in Physics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(90, 'Does it offer a major in Computer Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(91, 'Does it offer a major in Zoology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(92, 'Does it offer a major in Information Technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(93, 'Does it offer a major in Data Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(94, 'Does it offer a major in Animation?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(95, 'Does it offer a major in Visual Basic Application?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(96, 'Does it offer a major in Pharmacology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(97, 'Does it offer a major in Ayurved?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(98, 'Does it offer a major in Optometry?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(99, 'Does it offer a major in Cardiac Technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(100, 'Does it offer a major in Health Care Personnel?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(101, 'Does it offer a major in Radiotherapy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(102, 'Does it offer a major in Emergency Medicine?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(103, 'Does it offer a major in Anaesthisia?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(104, 'Does it offer a major in Animal Health?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(105, 'Does it offer a major in Hotel Management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(106, 'Does it offer a major in Tourism Management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(107, 'Does it offer a major in Banking?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(108, 'Does it offer a major in Business Administration?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(109, 'Does it offer a major in Design Management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(110, 'Does it offer a major in Corporate Law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(111, 'Does it offer a major in Computer Application Studies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(112, 'Does it offer a major in Accounting?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(113, 'Does it offer a major in Finance?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(114, 'Does it offer a major in Office Management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(115, 'Does it offer a major in Banking?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(116, 'Does it offer a major in English?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(117, 'Does it offer a major in History?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(118, 'Does it offer a major in Economics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(119, 'Does it offer a major in Political Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(120, 'Does it offer a major in Hindi?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(121, 'Does it offer a major in Agricultre Biotechnology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(122, 'Does it offer a major in Fisheries Science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(123, 'Does it offer a major in Agri Management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(124, 'Does it offer a major in Plant Physiology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(125, 'Does it offer a major in Agricultural Statistics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(126, 'Does it offer a major in Fashion Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(127, 'Does it offer a major in Interior Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(128, 'Does it offer a major in Textile Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(129, 'Does it offer a major in Industrial Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(130, 'Does it offer a major in Jewelry Design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(131, 'Does it offer a major in Multimedia Communication?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(132, 'Does it offer a major in Animation?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(133, 'Does it offer a major in Videography?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(134, 'Does it offer a major in Graphic Designing?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(135, 'Does it offer a major in Games And Sports?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(136, 'Does it offer a major in Computer science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(137, 'Does it offer a major in Electronics & communication?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(138, 'Does it offer a major in Electronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(139, 'Does it offer a major in Civil engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(140, 'Does it offer a major in Mechanical engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(141, 'Does it offer a major in Electrical?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(142, 'Does it offer a major in Design engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(143, 'Does it offer a major in Electrical & electronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(144, 'Does it offer a major in Information technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(145, 'Does it offer a major in Industrial engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(146, 'Does it offer a major in Software engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(147, 'Does it offer a major in Manufacturing engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(148, 'Does it offer a major in Environmental engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(149, 'Does it offer a major in Biotechnology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(150, 'Does it offer a major in Chemical engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(151, 'Does it offer a major in Energy engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(152, 'Does it offer a major in Control engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(153, 'Does it offer a major in Network engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(154, 'Does it offer a major in Nanotechnology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(155, 'Does it offer a major in Instrumentation?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(156, 'Does it offer a major in Urban planning?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(157, 'Does it offer a major in Landscape architecture?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(158, 'Does it offer a major in Construction planning?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(159, 'Does it offer a major in Environmental architecture?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(160, 'Does it offer a major in Urban design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(161, 'Does it offer a major in Architectural conservation?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(162, 'Does it offer a major in Mathematics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(163, 'Does it offer a major in Chemical science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(164, 'Does it offer a major in Physics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(165, 'Does it offer a major in Computer science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(166, 'Does it offer a major in Biotechnology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(167, 'Does it offer a major in Zoology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(168, 'Does it offer a major in Life sciences?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(169, 'Does it offer a major in Microbiology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(170, 'Does it offer a major in Information technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(171, 'Does it offer a major in Biochemistry?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(172, 'Does it offer a major in Geographical sciences ?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(173, 'Does it offer a major in Environmental science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(174, 'Does it offer a major in Food science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(175, 'Does it offer a major in Statistics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(176, 'Does it offer a major in Electronics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(177, 'Does it offer a major in Psychology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(178, 'Does it offer a major in Digital education?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(179, 'Does it offer a major in Information technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(180, 'Does it offer a major in Networking technologies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(181, 'Does it offer a major in Software engineering?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(182, 'Does it offer a major in Data science?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(183, 'Does it offer a major in Surgery?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(184, 'Does it offer a major in Orthopaedics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(185, 'Does it offer a major in E.n.t?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(186, 'Does it offer a major in Ophthalmology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(187, 'Does it offer a major in Obstetrics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(188, 'Does it offer a major in Human anatomy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(189, 'Does it offer a major in General surgery?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(190, 'Does it offer a major in Ayurved?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(191, 'Does it offer a major in Anaesthisia?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(192, 'Does it offer a major in Radiography?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(193, 'Does it offer a major in Pediatrics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(194, 'Does it offer a major in Physical medicine?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(195, 'Does it offer a major in Urology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(196, 'Does it offer a major in Physiology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(197, 'Does it offer a major in Medical technology ?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(198, 'Does it offer a major in Periodontics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(199, 'Does it offer a major in Orthodontics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(200, 'Does it offer a major in Prosthodontics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(201, 'Does it offer a major in Oral pathology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(202, 'Does it offer a major in Oral surgery?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(203, 'Does it offer a major in Endodontics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(204, 'Does it offer a major in Pharmaceutics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(205, 'Does it offer a major in Pharmaceutical chemistry?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(206, 'Does it offer a major in Pharmaceutical analytics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(207, 'Does it offer a major in Industrial pharmacy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(208, 'Does it offer a major in Pharmacognosy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(209, 'Does it offer a major in Practice pharmacy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(210, 'Does it offer a major in Nursing?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(211, 'Does it offer a major in Pediatrics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(212, 'Does it offer a major in Livestock management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(213, 'Does it offer a major in Animal pathology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(214, 'Does it offer a major in Animal nutrition?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(215, 'Does it offer a major in Animal genetics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(216, 'Does it offer a major in Animal pharmacology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(217, 'Does it offer a major in Animal surgery?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(218, 'Does it offer a major in Human resources management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(219, 'Does it offer a major in Finance?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(220, 'Does it offer a major in Marketing?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(221, 'Does it offer a major in Hospitality management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(222, 'Does it offer a major in Operations management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(223, 'Does it offer a major in Information technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(224, 'Does it offer a major in Business management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(225, 'Does it offer a major in International business?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(226, 'Does it offer a major in Entrepreneurship?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(227, 'Does it offer a major in Bengali?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(228, 'Does it offer a major in Social work?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(229, 'Does it offer a major in Marathi?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(230, 'Does it offer a major in Religious studies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(231, 'Does it offer a major in Telugu?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(232, 'Does it offer a major in Anthropology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(233, 'Does it offer a major in Horticulture?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(234, 'Does it offer a major in Forestry?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(235, 'Does it offer a major in Plant pathology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(236, 'Does it offer a major in Agronomy?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(237, 'Does it offer a major in Agricultural technology?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(238, 'Does it offer a major in Agricultural genetics?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(239, 'Does it offer a major in Computer application studies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(240, 'Does it offer a major in Game design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(241, 'Does it offer a major in Universal design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(242, 'Does it offer a major in Information design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(243, 'Does it offer a major in Retail design?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(244, 'Does it offer a major in Industrial management?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(245, 'Does it offer a major in Journalism?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(246, 'Does it offer a major in Media studies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(247, 'Does it offer a major in Advertising?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(248, 'Does it offer a major in Film making?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(249, 'Does it offer a major in Cinematography?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(250, 'Does it offer a major in Communication studies?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(251, 'Does it offer a major in Civil law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(252, 'Does it offer a major in Criminal law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(253, 'Does it offer a major in Corporate law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(254, 'Does it offer a major in Intellectual property law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(255, 'Does it offer a major in International law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(256, 'Does it offer a major in Labor law?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(257, 'How many students get enrolled every year?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(258, 'How many full time faculty teach in college?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(259, 'Whats the duration of the degree program?', NULL, 0, 5, 82, 83, 84, 85, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(260, 'Which of the following programmes are offered ?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(261, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(262, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(263, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(264, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(265, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(266, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(267, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(268, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(269, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(270, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(271, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(272, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(273, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(274, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(275, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(276, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(277, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(278, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(279, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(280, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(281, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(282, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(283, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(284, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(285, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(286, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(287, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(288, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(289, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(290, 'Which of the following are majors in the above programme?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(291, 'What do you feel about the wifi facilities you get at college?', NULL, 0, 5, 62, 63, 64, 65, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(292, 'What do you think of the tuition fee you pay at college?', NULL, 0, 5, 67, 68, 69, 70, 71, NULL, NULL, NULL, NULL, NULL, 'much more expensive,more expensive,less expensive,much less expensive', 'much more expensive,more expensive,less expensive,much less expensive', 'You feel your college is % than what your college-mates feel.', 'Your college is % than most other % colleges as per students who study there.', 0),
(293, 'Are you satisfied with the quality of teaching staff in college?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(294, 'Do you look forward to interacting with co-students?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'strongly interested,interested,not interested,least interested', 'strongly eager,more eager,less eager,very less eager', 'You are % in interacting with co-students at your college.', 'People in your college are % to interact with co-students than other colleges.', 0),
(295, 'Do you look forward to interacting with senior students?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(296, 'Do you look forward to interacting with freshmen / juniors?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(297, 'Are your classes effective?', 'Class Effectiveness', 0, 5, 72, 73, 74, 75, 76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(298, 'What’s the academic pace at your college?', 'Academic Pace', 0, 5, 18, 19, 20, 21, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(299, 'On an average, how many hours of class work you do a day?', 'Daily class hours', 0, 5, 23, 24, 25, 26, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(300, 'On an average, how many hours a day do you end up studying apart from classwork?', 'Daily non-class study', 0, 5, 23, 24, 25, 26, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(301, 'How reasonable are student evaluations?', 'Student Evaluation', 0, 5, 77, 78, 79, 80, 81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(302, 'How do others perceive your college?', NULL, 0, 5, 31, 32, 33, 34, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(303, 'Are you typically excited about going to college everyday?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(304, 'Do you have clear goals and plans for your career?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(305, 'Do you have a mentor from faculty?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(306, 'Do you have a student mentor?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(307, 'What percentage of your potential do you think you are using?', NULL, 0, 5, 36, 37, 38, 39, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(308, 'Hypothetically, if you were to dropout from college tomorrow, what would your reason be?', NULL, 0, 5, 41, 42, 43, 44, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(309, 'What\'s the main reason you joined this college?', NULL, 0, 5, 46, 47, 48, 49, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(310, 'What do your instructors / faculty most need to improve?', NULL, 0, 5, 51, 52, 53, 54, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(311, 'Do your faculty staff seem to care about you as a person?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(312, 'If you were the college head, what’s the first thing you would change?', NULL, 0, 5, 56, 57, 58, 59, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(313, 'Are your marks / performance public?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(314, 'Do you share / discuss marks in tests with other students/friends at college?', NULL, 0, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(315, 'What are the degrees offered in the mentioned stream?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(316, 'What is the tuition fee for a year?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(317, 'How many new students enroll every year?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(318, 'How many faculty / instructors teach here?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(319, 'What is the hostel & boarding fee for a year?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(320, 'What is the maximum Placement figure?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(321, 'What is minimum Placement figure?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(322, 'What is Average Earnings post 3 yrs.?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(323, 'What is the pre-course earnings?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(324, 'What is the Tution Fees?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(325, 'What is the Financial Aid Amount provided by college?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(326, 'Scholarship Amount provided by college?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(327, 'What is the external Scholarship amount?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(328, 'What is the Fee Waiver offered?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(329, 'What is the Loan % available?', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(330, 'What is the total fee in your college?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(331, 'What is the total faculty count?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(332, 'What is the total fee? ', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(333, 'What is the faculty strength ?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(334, 'How much is the tution fee?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(335, 'What is meant by temp?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(336, 'How many students get enrolled every year?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(337, 'How many full time faculty teach in college?', NULL, 0, 3, 15, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(338, 'Whats the duration of the degree program?', NULL, 0, 5, 82, 83, 84, 85, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(339, 'Which academic calednar does it follow?', NULL, 0, 5, 87, 88, 89, 90, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(340, 'What is the acceptance rate? (1 admitted per XX applications, please fill XX)', NULL, 0, 2, 15, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(341, 'For admissions, does it consider "Secondary School (10+2) performance"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(342, 'For admissions, does it consider "Letter of Recommendation"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(343, 'For admissions, does it consider "Statement of Purpose / Essay"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(344, 'For admissions, does it consider "interview performance"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(345, 'For admissions, does it consider "alumni relationship"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(346, 'For admissions, does it consider "state or town of residernce"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `QUESTIONTABALE` (`Q_ID`, `Q_Text`, `Header_val`, `Ref_Entity`, `Option_Num`, `Op1`, `Op2`, `Op3`, `Op4`, `Op5`, `Op6`, `Op7`, `Op8`, `Op9`, `Op10`, `User_Tags`, `Coll_Tags`, `User_Content`, `Coll_Content`, `unit_flag`) VALUES
(347, 'For admissions, does it consider "nationality"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(348, 'For admissions, does it consider "extra curricular activities"?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(349, 'Does it require GRE score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(350, 'Does it require GMAT score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(351, 'Does it require CAT score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(352, 'Does it require JEE score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(353, 'Does it require NEET score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(354, 'Does it require BITSAT score for admissions?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(355, 'For admissions which of the following are considered?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(356, 'Which of the following Standardized test scores are used for admissions?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(357, 'What is the average GRE score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(358, 'What is the average GMAT score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(359, 'What is the average CAT score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(360, 'What is the average JEE score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(361, 'What is the average NEET score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(362, 'What is the average BITSAT score of admitted students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(363, 'What is the av annual expenses / costs for student?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(364, 'What is the tuition fee (annual)?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(365, 'How much is spent on Hostel & Boarding (annual)?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(366, 'How much are the personal and other expenses (annual)?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(367, 'Is AId / Scholarship available?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(368, 'How many students get aid?', NULL, 0, 5, 92, 93, 94, 95, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(369, 'What is the av annual aid amount?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(370, 'How would you rate the loan avaiability?', NULL, 0, 4, 97, 98, 99, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(371, 'How much does a student owe to loan at the time of graduation?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(372, 'What is the av starting salary after studies?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(373, 'What is the av starting salary for top 10% job offers?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(374, 'What is the av salary 3 years after studies?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(375, 'How many students go for higher studies post completion?', NULL, 0, 5, 92, 101, 102, 103, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(376, 'How many students startup during/after completing studies?', NULL, 0, 5, 92, 101, 102, 103, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(377, 'Does college provide on-campus job interviews?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(378, 'Does college provide resume assistance?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(379, 'Does college provide help via alumni network for jobs?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(380, 'Does college provide internship assistance?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(381, 'Does it have hostel facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(382, 'Is staying in hostel compulsory?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(383, 'Are hostels air-conditioned?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(384, 'Does it have mess facilities for students?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(385, 'How many restaurants / cafes are there in college?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(386, 'Does it have Veg options for food?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(387, 'Does it have Non-Veg options for food?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(388, 'Does it have Vegan options for food?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(389, 'When can I find at least one restuarant inside campus open?', NULL, 0, 4, 104, 105, 106, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(390, 'Does it have cricket playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(391, 'Does it have football playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(392, 'Does it have Basketball playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(393, 'Does it have Rowing playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(394, 'Does it have Ice Hockey playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(395, 'Does it have Lacrosse playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(396, 'Does it have All Track Combined playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(397, 'Does it have Swimming and Diving playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(398, 'Does it have Soccer playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(399, 'Does it have Tennis playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(400, 'Does it have Baseball playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(401, 'Does it have Volleyball playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(402, 'Does it have Golf playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(403, 'Does it have Squash playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(404, 'Does it have Softball playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(405, 'Does it have Water Polo playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(406, 'Does it have Wrestling playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(407, 'Does it have Field Hockey playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(408, 'Does it have Skiing playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(409, 'Does it have Fencing playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(410, 'Does it have Sailing playing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(411, 'Does it have air conditioned classrooms?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(412, 'Do classes have AV facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(413, 'Do classes have Video conferencing facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(414, 'Does it have specialized labs?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(415, 'Does it have a library?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(416, 'What is the seating capacity of library?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(417, 'Does it have a Hospital/Medical Facilities?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(418, 'Does it have an auditorium?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(419, 'What is the seating capacity of auditorium?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(420, 'Does it have free / subsidized internet?', NULL, 0, 3, 108, 109, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(421, 'Does it have a salon?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(422, 'Does it have a supermarket inside campus?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(423, 'Does it have a bank / ATM inside campus?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(424, 'Till when are students awake and active?', NULL, 0, 5, 128, 129, 130, 131, 132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(425, 'How ofter are parties organized on campus?', NULL, 0, 5, 120, 121, 122, 123, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(426, 'Is there a time curfew for males to return back to hostels?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(427, 'What is the curfew time limit?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(428, 'Is there a time curfew for females to return back to hostels?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(429, 'What is the curfew time limit?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(430, 'Does it organize a social / cultural fest?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(431, 'How often does it organize the social / cultiural fest?', NULL, 0, 3, 125, 126, 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(432, 'Does it organize an academic fest?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(433, 'How often does it organize the academic fest?', NULL, 0, 3, 125, 126, 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(434, 'How many criminal offences would be reported every year?', NULL, 0, 5, 111, 116, 117, 118, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(435, 'How many sexual assaults would be reported every year?', NULL, 0, 5, 111, 116, 117, 118, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(436, 'How many hate crimes would be reported every year?', NULL, 0, 5, 111, 116, 117, 118, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(437, 'What is the percentage of females among students?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(438, 'What percentage of students come from teh same country where college is located?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(439, 'What percentage of students come from teh same state where college is located?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(440, 'What is the percentage of students are residents on campus?', NULL, 0, 3, 15, 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(441, 'How many different student organizations are there on campus (e.g. drama club, etc)?', NULL, 0, 5, 111, 112, 113, 114, 115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(442, 'Does it have student elections?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(443, 'Does it have a student government?', NULL, 0, 3, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(444, 'Which of the following facilities are there in your college?', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Q_TABLE_1`
--

CREATE TABLE `Q_TABLE_1` (
  `Q_ID` int(11) NOT NULL,
  `Node_ID` int(11) NOT NULL,
  `Parent_Node` int(11) NOT NULL,
  `Bypassflag` int(11) NOT NULL,
  `BypassNode` varchar(255) DEFAULT NULL,
  `Ques_Text` varchar(255) DEFAULT NULL,
  `P_Name` varchar(255) DEFAULT NULL,
  `P_ID` int(11) NOT NULL,
  `P_Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Q_TABLE_1`
--

INSERT INTO `Q_TABLE_1` (`Q_ID`, `Node_ID`, `Parent_Node`, `Bypassflag`, `BypassNode`, `Ques_Text`, `P_Name`, `P_ID`, `P_Type`) VALUES
(1, 1, 0, 0, NULL, 'Have to studied in University', 'University_check', 1, 'conf'),
(2, 2, 1, 0, NULL, 'Name of your University', 'University_name', 2, 'text'),
(3, 3, 2, 1, '4', 'Does your university has different schools', 'school_check', 3, 'conf'),
(4, 4, 3, 1, '5', 'Does it have a School of Medicine', 'Medical_school_check', 4, 'conf'),
(5, 4, 3, 1, '5', 'Does it have a School of Law', 'law_school_check', 5, 'conf'),
(6, 4, 3, 1, '5', 'Does it have a School of Business', 'business_school_check', 6, 'conf');

-- --------------------------------------------------------

--
-- Table structure for table `search_home`
--

CREATE TABLE `search_home` (
  `query` varchar(255) DEFAULT NULL,
  `filter` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `sortby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_home`
--

INSERT INTO `search_home` (`query`, `filter`, `tag`, `sortby`) VALUES
('Top Engineering Colleges in India', 'Stream@Engineering,Country@India', '', 1),
('Top Masters Computer Science Colleges in India', 'Stream@ComputerApplication,Country@India,Degrees@Masters', '', 1),
('Top Mechanical Colleges in USA', 'Stream@Engineering,Country@United States,Majors@MechanicalEngineering', '', 1),
('Medical Colleges in India', 'Stream@Medical,Country@India', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `search_synonyms`
--

CREATE TABLE `search_synonyms` (
  `name` varchar(255) NOT NULL,
  `primary_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_synonyms`
--

INSERT INTO `search_synonyms` (`name`, `primary_name`) VALUES
('Engineering', 'Engineering'),
('Engg', 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `STRING`
--

CREATE TABLE `STRING` (
  `CountryCode` varchar(5) DEFAULT NULL,
  `Country_String` varbinary(1100) NOT NULL DEFAULT '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111100000000000000000000000000000000000000000000000000000000000000000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STRING`
--

INSERT INTO `STRING` (`CountryCode`, `Country_String`) VALUES
('Int', 0x3131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
('in', 0x3131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
('io', 0x3131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
('au', 0x3131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030),
('psych', 0x3030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030);

-- --------------------------------------------------------

--
-- Table structure for table `StructureAttribute`
--

CREATE TABLE `StructureAttribute` (
  `ID` int(11) NOT NULL,
  `Node_ID` int(11) NOT NULL,
  `Attr_Bit_String` varbinary(500) NOT NULL DEFAULT '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
  `CountryCode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StructureAttribute`
--

INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(1, 0, 0x303131313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(2, 2, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(3, 6, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(4, 10, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(5, 14, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(6, 18, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(7, 22, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(8, 26, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(9, 30, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(10, 34, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(11, 38, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(12, 42, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(13, 46, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(14, 50, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(15, 54, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(16, 58, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(17, 62, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(18, 66, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(19, 70, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(20, 74, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(21, 78, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(22, 82, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(23, 86, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(24, 90, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(25, 94, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(26, 98, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(27, 102, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(28, 106, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(29, 110, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(30, 114, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(31, 118, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(32, 122, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(33, 126, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(34, 130, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(35, 134, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(36, 138, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(37, 142, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(38, 146, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(39, 150, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(40, 154, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(41, 158, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(42, 162, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(43, 166, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(44, 170, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(45, 174, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(46, 178, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(47, 182, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(48, 186, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(49, 190, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(50, 194, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');
INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(51, 198, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(52, 202, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(53, 206, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(54, 210, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(55, 214, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(56, 218, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(57, 222, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(58, 226, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(59, 230, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(60, 234, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(61, 238, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(62, 242, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(63, 246, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(64, 250, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(65, 254, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(66, 258, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(67, 262, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(68, 266, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(69, 270, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(70, 274, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(71, 278, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(72, 282, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(73, 286, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(74, 290, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(75, 294, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(76, 298, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(77, 302, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(78, 306, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(79, 310, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(80, 314, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(81, 318, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(82, 322, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(83, 326, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(84, 330, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(85, 334, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(86, 338, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(87, 342, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(88, 346, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(89, 350, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(90, 354, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(91, 358, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(92, 362, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(93, 366, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(94, 370, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(95, 374, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(96, 378, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(97, 382, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(98, 386, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(99, 390, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(100, 394, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');
INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(101, 398, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(102, 402, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(103, 406, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(104, 410, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(105, 414, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(106, 418, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(107, 422, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(108, 426, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(109, 430, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(110, 434, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(111, 438, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(112, 442, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(113, 446, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(114, 450, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(115, 454, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(116, 458, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(117, 462, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(118, 466, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(119, 470, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(120, 474, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(121, 478, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(122, 482, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(123, 486, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(124, 490, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(125, 494, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(126, 498, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(127, 502, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(128, 506, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(129, 510, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(130, 514, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(131, 518, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(132, 522, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(133, 526, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(134, 530, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(135, 534, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(136, 538, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(137, 542, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(138, 546, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(139, 550, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(140, 554, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(141, 558, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(142, 562, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(143, 566, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(144, 570, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(145, 574, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(146, 578, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(147, 582, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(148, 586, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(149, 590, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(150, 594, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');
INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(151, 598, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(152, 602, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(153, 606, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(154, 610, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(155, 614, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(156, 618, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(157, 622, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(158, 626, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(159, 630, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(160, 634, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(161, 638, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(162, 642, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(163, 646, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(164, 650, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(165, 654, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(166, 658, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(167, 662, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(168, 666, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(169, 670, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(170, 674, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(171, 678, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(172, 682, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(173, 686, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(174, 690, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(175, 694, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(176, 698, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(177, 702, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(178, 706, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(179, 710, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(180, 714, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(181, 718, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(182, 722, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(183, 726, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(184, 730, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(185, 734, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(186, 738, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(187, 742, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(188, 746, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(189, 750, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(190, 754, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(191, 758, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(192, 762, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(193, 766, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(194, 770, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(195, 774, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(196, 778, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(197, 782, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(198, 786, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(199, 790, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(200, 794, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');
INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(201, 798, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(202, 802, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(203, 806, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(204, 810, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(205, 814, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(206, 818, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(207, 822, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(208, 826, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(209, 830, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(210, 834, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(211, 838, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(212, 842, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(213, 846, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(214, 850, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(215, 854, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(216, 858, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(217, 862, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(218, 866, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(219, 870, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(220, 874, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(221, 878, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(222, 882, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(223, 886, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(224, 890, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(225, 894, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(226, 898, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(227, 902, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(228, 906, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(229, 910, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(230, 914, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(231, 918, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(232, 922, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(233, 926, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(234, 930, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(235, 934, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(236, 938, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(237, 942, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(238, 946, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(239, 950, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(240, 954, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(241, 958, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(242, 962, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(243, 966, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(244, 970, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(245, 974, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(246, 978, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(247, 982, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(248, 986, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(249, 990, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(250, 994, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');
INSERT INTO `StructureAttribute` (`ID`, `Node_ID`, `Attr_Bit_String`, `CountryCode`) VALUES
(251, 998, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(252, 1002, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(253, 1006, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(254, 1010, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(255, 1014, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(256, 1018, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(257, 1022, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(312, 0, 0x303131313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131303030303030303030303030303030303030303030303030303030303030303030, 'in'),
(313, 2, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in'),
(314, 66, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in'),
(315, 258, 0x303131313131313131303030303030303030303030313131303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303031313131303030303030303031313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'in'),
(316, 66, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int'),
(317, 70, 0x303131313130303030313131313131303030303030313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313131313130303030303131313131313131313131313131313131313131313131313131313130303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030303030, 'Int');

-- --------------------------------------------------------

--
-- Table structure for table `synonyms`
--

CREATE TABLE `synonyms` (
  `colg_id` int(11) NOT NULL,
  `synonym` varchar(50) NOT NULL,
  `primary_name` tinyint(4) NOT NULL DEFAULT '0',
  `primary_college` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synonyms`
--

INSERT INTO `synonyms` (`colg_id`, `synonym`, `primary_name`, `primary_college`, `country`, `city`) VALUES
(2, 'IIIT Hyderabad', 1, 'IIIT Hyderabad', 'in', NULL),
(3, 'IIT Delhi', 1, 'IIT Delhi', 'in', NULL),
(4, 'IIT Bombay', 1, 'IIT Bombay', 'in', NULL),
(5, 'IIT Kharagpur', 1, 'IIT Kharagpur', 'in', NULL),
(6, 'IIT Madras', 1, 'IIT Madras', 'in', NULL),
(7, 'IIT Kanpur', 1, 'IIT Kanpur', 'in', NULL),
(8, 'IIT Guwahati', 1, 'IIT Guwahati', 'in', NULL),
(9, 'IIT Indore', 1, 'IIT Indore', 'in', NULL),
(11, 'IIT Mandi', 1, 'IIT Mandi', 'in', NULL),
(12, 'IIT Hyderabad', 1, 'IIT Hyderabad', 'in', NULL),
(13, 'IIT Goa', 1, 'IIT Goa', 'in', NULL),
(14, 'IIT Palakkad', 1, 'IIT Palakkad', 'in', NULL),
(15, 'IIT Bhubaneshwar', 1, 'IIT Bhubaneshwar', 'in', NULL),
(16, 'IIT BHU(Varansi)', 1, 'IIT BHU(Varansi)', 'in', NULL),
(17, 'NIT Kurukshetra', 1, 'NIT Kurukshetra', 'in', NULL),
(18, 'NIT Calicut', 1, 'NIT Calicut', 'in', NULL),
(19, 'NIT Warangal', 1, 'NIT Warangal', 'in', NULL),
(20, 'NIT Srinagar', 1, 'NIT Srinagar', 'in', NULL),
(21, 'National Institute of Technology, Durgapur', 1, 'National Institute of Technology, Durgapur', 'in', NULL),
(29, 'test123', 1, 'test123', 'in', NULL),
(30, 'testing123', 1, 'testing123', 'in', NULL),
(31, 'IIT Roorkee', 1, 'IIT Roorkee', 'in', NULL),
(34, 'bits pilani', 1, 'bits pilani', 'in', NULL),
(40, 'giddalur public school', 1, 'giddalur public school', 'India', NULL),
(41, 'iiit india', 1, 'iiit india', 'India', NULL),
(42, 'ASRAM', 1, 'ASRAM', 'India', NULL),
(43, 'ISM Dhanbad', 1, 'ISM Dhanbad', 'India', NULL),
(44, 'Good Shephard English Medium School', 1, 'Good Shephard English Medium School', 'India', NULL),
(1000, 'IIT Ropar', 1, 'IIT Ropar', 'in', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `CID` int(11) NOT NULL,
  `NA` tinyint(1) NOT NULL,
  `S_Node` int(11) DEFAULT NULL,
  `P_Node` int(11) DEFAULT NULL,
  `COLL_ID` int(11) DEFAULT NULL,
  `VAL_TYPE` tinyint(1) DEFAULT NULL,
  `VAL_ID` int(11) NOT NULL,
  `NUM_VAL` int(11) DEFAULT NULL,
  `TEXT_VAL` varchar(255) DEFAULT NULL,
  `NUM_VAL_UNIT` varchar(255) DEFAULT NULL,
  `YEAR_START` int(11) DEFAULT NULL,
  `YEAR_END` int(11) DEFAULT NULL,
  `VAL_CRED` float NOT NULL DEFAULT '0.5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Table1_Ques`
--

CREATE TABLE `Table1_Ques` (
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `Q_ID` int(11) NOT NULL,
  `Answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Table1_Tags`
--

CREATE TABLE `Table1_Tags` (
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `TAG_ID` int(11) NOT NULL,
  `A1` int(11) NOT NULL DEFAULT '0',
  `A2` int(11) NOT NULL DEFAULT '0',
  `A3` int(11) NOT NULL DEFAULT '0',
  `A4` int(11) NOT NULL DEFAULT '0',
  `A5` int(11) NOT NULL DEFAULT '0',
  `Sample_SZ` int(11) NOT NULL,
  `MU` double NOT NULL DEFAULT '0',
  `SIGMA` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table2`
--

CREATE TABLE `table2` (
  `TABLE2_ID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `D_Node` int(11) DEFAULT NULL,
  `S_Node` int(11) DEFAULT NULL,
  `P_Node` int(11) DEFAULT NULL,
  `Node_Type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `NODE_NAME` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `NODE_VALUE` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `Answer_Node` int(11) DEFAULT NULL,
  `Op1` int(11) DEFAULT '0',
  `Op2` int(11) DEFAULT '0',
  `Op3` int(11) DEFAULT '0',
  `Op4` int(11) DEFAULT '0',
  `Op5` int(11) DEFAULT '0',
  `Op6` int(11) DEFAULT '0',
  `Op7` int(11) DEFAULT '0',
  `Op8` int(11) DEFAULT '0',
  `Op9` int(11) DEFAULT '0',
  `Op10` int(11) DEFAULT '0',
  `VAL_DATA` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Frequency` int(11) DEFAULT NULL,
  `SSIZE_N` int(11) DEFAULT NULL,
  `SSIZE_A` int(11) DEFAULT NULL,
  `VAL_MU` float DEFAULT NULL,
  `VAL_SIGMA` float DEFAULT NULL,
  `Cu` float NOT NULL DEFAULT '0',
  `Cl` float NOT NULL DEFAULT '0',
  `Cu_adjusted` float NOT NULL DEFAULT '0',
  `Cl_adjusted` float NOT NULL DEFAULT '0',
  `VAL_PARAM_DISP` int(11) DEFAULT NULL,
  `CRED_PARAM_DISP` int(11) DEFAULT NULL,
  `NA` tinyint(1) DEFAULT NULL,
  `YES` int(11) DEFAULT NULL,
  `NO` int(11) DEFAULT NULL,
  `NS` int(11) DEFAULT NULL,
  `Varies` int(11) DEFAULT NULL,
  `flags` int(11) NOT NULL,
  `PARAM_CRED` float NOT NULL DEFAULT '0.5',
  `YEAR_DEPENDENT` tinyint(1) DEFAULT NULL,
  `Footer_comment` varchar(255) DEFAULT NULL,
  `Footer_value` varchar(255) DEFAULT NULL,
  `footer_value_flag` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Table2_Ques`
--

CREATE TABLE `Table2_Ques` (
  `COLL_ID` int(11) NOT NULL,
  `Q_ID` int(11) NOT NULL,
  `A1` int(11) NOT NULL DEFAULT '0',
  `A2` int(11) NOT NULL DEFAULT '0',
  `A3` int(11) NOT NULL DEFAULT '0',
  `A4` int(11) NOT NULL DEFAULT '0',
  `A5` int(11) NOT NULL DEFAULT '0',
  `MU` double NOT NULL DEFAULT '0',
  `SIGMA` double NOT NULL DEFAULT '0',
  `Sample_SZ` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Table2_Tags`
--

CREATE TABLE `Table2_Tags` (
  `COLL_ID` int(11) NOT NULL,
  `TAG_ID` int(11) NOT NULL,
  `A1` int(11) NOT NULL DEFAULT '0',
  `A2` int(11) NOT NULL DEFAULT '0',
  `A3` int(11) NOT NULL DEFAULT '0',
  `A4` int(11) NOT NULL DEFAULT '0',
  `A5` int(11) NOT NULL DEFAULT '0',
  `MU` double NOT NULL DEFAULT '0',
  `SIGMA` double NOT NULL DEFAULT '0',
  `Sample_SZ` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table3`
--

CREATE TABLE `table3` (
  `CID` int(11) NOT NULL,
  `NA` tinyint(1) NOT NULL,
  `CID_CRED` float NOT NULL DEFAULT '0.5',
  `INCEN` int(11) NOT NULL DEFAULT '50',
  `CID_NAME` varchar(255) NOT NULL,
  `INCEN_FROZEN` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tag_Table`
--

CREATE TABLE `Tag_Table` (
  `Q_ID` int(11) NOT NULL,
  `TAG_ID` int(11) NOT NULL,
  `TAG_NAME` varchar(255) NOT NULL,
  `TAG_Pos_Direction` varchar(255) NOT NULL,
  `TAG_Neg_Direction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tag_Table`
--

INSERT INTO `Tag_Table` (`Q_ID`, `TAG_ID`, `TAG_NAME`, `TAG_Pos_Direction`, `TAG_Neg_Direction`) VALUES
(291, 1, 'Physical Infra', 'Good', 'Bad'),
(291, 2, 'Wifi Facilities Speed', 'Good ', 'Bad'),
(292, 1, 'Physical Infra', 'Good', 'Bad'),
(292, 2, 'Wifi Facilities Speed', 'Good ', 'Bad');

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `otp` int(11) NOT NULL,
  `ref_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserCollegestring`
--

CREATE TABLE `UserCollegestring` (
  `ID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `total_attempted` int(11) NOT NULL DEFAULT '0',
  `answered` int(11) NOT NULL DEFAULT '0',
  `not_answered` int(11) NOT NULL DEFAULT '0',
  `user_coll_cred` int(11) NOT NULL DEFAULT '0',
  `num_ques` int(11) NOT NULL DEFAULT '0',
  `max_id` int(11) NOT NULL DEFAULT '1',
  `record_views` int(11) NOT NULL DEFAULT '0',
  `Bit_String` varbinary(1100) NOT NULL DEFAULT '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111100000000000000000000000000000000000000000000000000000000000000000000000000',
  `Valid_String` varbinary(1100) NOT NULL DEFAULT '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofiledata`
--

CREATE TABLE `userprofiledata` (
  `CID` int(11) NOT NULL,
  `COLL_ID` int(11) NOT NULL,
  `member` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `batch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fb_id` bigint(18) DEFAULT NULL,
  `Display_Name` varchar(225) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `ref_email` varchar(255) NOT NULL,
  `user_cred` float NOT NULL DEFAULT '0',
  `num_ques` int(11) NOT NULL DEFAULT '0',
  `forgot_password` varchar(255) DEFAULT NULL,
  `page_visit` varbinary(200) NOT NULL DEFAULT '1111111000000000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AttributeNodeTable`
--
ALTER TABLE `AttributeNodeTable`
  ADD PRIMARY KEY (`Node_ID`);

--
-- Indexes for table `AttributeTable`
--
ALTER TABLE `AttributeTable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Attr_Bulk_Upload`
--
ALTER TABLE `Attr_Bulk_Upload`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Attr_Position`
--
ALTER TABLE `Attr_Position`
  ADD UNIQUE KEY `Attr_ID` (`Node_ID`);

--
-- Indexes for table `autoupdate`
--
ALTER TABLE `autoupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Bias_Table1`
--
ALTER TABLE `Bias_Table1`
  ADD PRIMARY KEY (`VAL_ID`);

--
-- Indexes for table `Bulk_Upload`
--
ALTER TABLE `Bulk_Upload`
  ADD PRIMARY KEY (`CID`,`Coll_ID`);

--
-- Indexes for table `Club_Questions`
--
ALTER TABLE `Club_Questions`
  ADD PRIMARY KEY (`Club_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`COLL_ID`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`Country_Code`),
  ADD UNIQUE KEY `Country_Code` (`Country_Code`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `flag_response`
--
ALTER TABLE `flag_response`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `forum_answer_comments`
--
ALTER TABLE `forum_answer_comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `forum_notifications`
--
ALTER TABLE `forum_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_questions`
--
ALTER TABLE `forum_questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `forum_questions_answers`
--
ALTER TABLE `forum_questions_answers`
  ADD PRIMARY KEY (`ansid`);

--
-- Indexes for table `forum_question_comments`
--
ALTER TABLE `forum_question_comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `forum_question_views`
--
ALTER TABLE `forum_question_views`
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `forum_tags`
--
ALTER TABLE `forum_tags`
  ADD UNIQUE KEY `qid` (`qid`,`tags`),
  ADD UNIQUE KEY `qid_2` (`qid`,`tags`),
  ADD UNIQUE KEY `qid_3` (`qid`,`tags`);

--
-- Indexes for table `forum_user_follow_questions`
--
ALTER TABLE `forum_user_follow_questions`
  ADD UNIQUE KEY `cid` (`cid`,`qid`);

--
-- Indexes for table `nikhil_log_table`
--
ALTER TABLE `nikhil_log_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nikhil_position`
--
ALTER TABLE `nikhil_position`
  ADD PRIMARY KEY (`LABEL`);

--
-- Indexes for table `nikhil_search_feed`
--
ALTER TABLE `nikhil_search_feed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nikhil_similar_nodes`
--
ALTER TABLE `nikhil_similar_nodes`
  ADD PRIMARY KEY (`NODE_NAME`);

--
-- Indexes for table `nikhil_trending_searches`
--
ALTER TABLE `nikhil_trending_searches`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nikhil_users_similar_nodes`
--
ALTER TABLE `nikhil_users_similar_nodes`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `nikhil_user_profile`
--
ALTER TABLE `nikhil_user_profile`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `NODETABLE`
--
ALTER TABLE `NODETABLE`
  ADD PRIMARY KEY (`Node_ID`);

--
-- Indexes for table `Node_Position`
--
ALTER TABLE `Node_Position`
  ADD PRIMARY KEY (`Node_ID`),
  ADD UNIQUE KEY `Node_ID` (`Node_ID`);

--
-- Indexes for table `OPTIONTABLE`
--
ALTER TABLE `OPTIONTABLE`
  ADD PRIMARY KEY (`OP_ID`);

--
-- Indexes for table `Pg_Degrees`
--
ALTER TABLE `Pg_Degrees`
  ADD PRIMARY KEY (`PG_ID`);

--
-- Indexes for table `psycho_table2`
--
ALTER TABLE `psycho_table2`
  ADD PRIMARY KEY (`TABLE2_ID`);

--
-- Indexes for table `psycho_table2_tags`
--
ALTER TABLE `psycho_table2_tags`
  ADD PRIMARY KEY (`COLL_ID`,`TAG_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`PARAM_ID`);

--
-- Indexes for table `QUESTIONTABALE`
--
ALTER TABLE `QUESTIONTABALE`
  ADD PRIMARY KEY (`Q_ID`);

--
-- Indexes for table `Q_TABLE_1`
--
ALTER TABLE `Q_TABLE_1`
  ADD PRIMARY KEY (`Q_ID`);

--
-- Indexes for table `search_home`
--
ALTER TABLE `search_home`
  ADD UNIQUE KEY `query_3` (`query`),
  ADD KEY `query` (`query`);
ALTER TABLE `search_home` ADD FULLTEXT KEY `query_2` (`query`);

--
-- Indexes for table `STRING`
--
ALTER TABLE `STRING`
  ADD UNIQUE KEY `CountryCode` (`CountryCode`);

--
-- Indexes for table `StructureAttribute`
--
ALTER TABLE `StructureAttribute`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `synonyms`
--
ALTER TABLE `synonyms`
  ADD PRIMARY KEY (`colg_id`,`synonym`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`VAL_ID`);

--
-- Indexes for table `Table1_Ques`
--
ALTER TABLE `Table1_Ques`
  ADD PRIMARY KEY (`CID`,`COLL_ID`,`Q_ID`);

--
-- Indexes for table `Table1_Tags`
--
ALTER TABLE `Table1_Tags`
  ADD PRIMARY KEY (`CID`,`COLL_ID`,`TAG_ID`);

--
-- Indexes for table `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`TABLE2_ID`);

--
-- Indexes for table `Table2_Ques`
--
ALTER TABLE `Table2_Ques`
  ADD PRIMARY KEY (`COLL_ID`,`Q_ID`);

--
-- Indexes for table `Table2_Tags`
--
ALTER TABLE `Table2_Tags`
  ADD PRIMARY KEY (`COLL_ID`,`TAG_ID`);

--
-- Indexes for table `table3`
--
ALTER TABLE `table3`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `Tag_Table`
--
ALTER TABLE `Tag_Table`
  ADD PRIMARY KEY (`Q_ID`,`TAG_ID`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserCollegestring`
--
ALTER TABLE `UserCollegestring`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofiledata`
--
ALTER TABLE `userprofiledata`
  ADD UNIQUE KEY `unique_user_college` (`CID`,`COLL_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AttributeNodeTable`
--
ALTER TABLE `AttributeNodeTable`
  MODIFY `Node_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;
--
-- AUTO_INCREMENT for table `AttributeTable`
--
ALTER TABLE `AttributeTable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Attr_Bulk_Upload`
--
ALTER TABLE `Attr_Bulk_Upload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2314;
--
-- AUTO_INCREMENT for table `autoupdate`
--
ALTER TABLE `autoupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Bias_Table1`
--
ALTER TABLE `Bias_Table1`
  MODIFY `VAL_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `COLL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flag_response`
--
ALTER TABLE `flag_response`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_answer_comments`
--
ALTER TABLE `forum_answer_comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_notifications`
--
ALTER TABLE `forum_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_questions`
--
ALTER TABLE `forum_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_questions_answers`
--
ALTER TABLE `forum_questions_answers`
  MODIFY `ansid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_question_comments`
--
ALTER TABLE `forum_question_comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nikhil_log_table`
--
ALTER TABLE `nikhil_log_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `nikhil_search_feed`
--
ALTER TABLE `nikhil_search_feed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nikhil_trending_searches`
--
ALTER TABLE `nikhil_trending_searches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `OPTIONTABLE`
--
ALTER TABLE `OPTIONTABLE`
  MODIFY `OP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `Pg_Degrees`
--
ALTER TABLE `Pg_Degrees`
  MODIFY `PG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `psycho_table2`
--
ALTER TABLE `psycho_table2`
  MODIFY `TABLE2_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `PARAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `QUESTIONTABALE`
--
ALTER TABLE `QUESTIONTABALE`
  MODIFY `Q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;
--
-- AUTO_INCREMENT for table `Q_TABLE_1`
--
ALTER TABLE `Q_TABLE_1`
  MODIFY `Q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `StructureAttribute`
--
ALTER TABLE `StructureAttribute`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `VAL_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table2`
--
ALTER TABLE `table2`
  MODIFY `TABLE2_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `UserCollegestring`
--
ALTER TABLE `UserCollegestring`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
