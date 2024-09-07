-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2022 at 11:35 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `int_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `book_author` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_title`, `book_author`, `book_image`, `book_price`) VALUES
(1, '123', 'sdf', 'f', '93453-IMG_20220206_180913.jpg', '456.00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ClientId` int(11) NOT NULL,
  `Client_User_Name` varchar(50) NOT NULL,
  `Model_Id` int(11) NOT NULL,
  `Model_No` varchar(50) NOT NULL,
  `Model_Title` varchar(50) NOT NULL,
  `Model_Image` varchar(50) NOT NULL,
  `Model_Price` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartId`, `cart_date`, `ClientId`, `Client_User_Name`, `Model_Id`, `Model_No`, `Model_Title`, `Model_Image`, `Model_Price`, `Status`) VALUES
(36, '2022-04-14 11:32:28', 8, 'alisha', 1, 'KT101', 'Modern Kitchen', '20317-IMG_20220206_180946.jpg', 35000, 'Yes'),
(38, '2022-04-14 08:55:34', 9, 'anees', 2, 'KT102', 'Kitchen Self', '84156-IMG_20220206_180902.jpg', 20000, 'No'),
(39, '2022-04-14 11:32:28', 8, 'alisha', 2, 'KT102', 'Kitchen Self', '84156-IMG_20220206_180902.jpg', 20000, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

DROP TABLE IF EXISTS `cart2`;
CREATE TABLE IF NOT EXISTS `cart2` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ClientId` int(11) NOT NULL,
  `Client_User_Name` varchar(50) NOT NULL,
  `Model_Id` int(11) NOT NULL,
  `Model_No` varchar(50) NOT NULL,
  `Model_Title` varchar(50) NOT NULL,
  `Model_Image` varchar(50) NOT NULL,
  `Model_Price` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart2`
--

INSERT INTO `cart2` (`CartId`, `cart_date`, `ClientId`, `Client_User_Name`, `Model_Id`, `Model_No`, `Model_Title`, `Model_Image`, `Model_Price`, `Status`) VALUES
(10, '2022-04-14 08:56:14', 8, 'alisha', 1, 'KT101', 'Modern Kitchen', '20317-IMG_20220206_180946.jpg', 35000, 'No'),
(12, '2022-04-14 08:56:28', 9, 'anees', 2, 'KT102', 'Kitchen Self', '84156-IMG_20220206_180902.jpg', 20000, 'No'),
(13, '2022-04-14 09:01:50', 8, 'alisha', 2, 'KT102', 'Kitchen Self', '84156-IMG_20220206_180902.jpg', 20000, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cart_checkout`
--

DROP TABLE IF EXISTS `cart_checkout`;
CREATE TABLE IF NOT EXISTS `cart_checkout` (
  `InvId` int(11) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(50) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `NetAmnt` int(11) NOT NULL,
  PRIMARY KEY (`InvId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_checkout`
--

INSERT INTO `cart_checkout` (`InvId`, `ClientName`, `ClientId`, `Address`, `Mobile`, `NetAmnt`) VALUES
(1, 'alisha', 8, 'Chennai', '987654321', 55000),
(2, 'alisha', 8, 'Chennai', '987456321', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ClientId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientId`, `Username`, `Address`, `Area`, `City`, `State`, `Mobile`, `Email`, `uname`, `Password`) VALUES
(2, 'Alisha', 'Chennai', 'Chennai', 'Chennai', 'Chennai', '987654321', 'alisha@gmail.com', 'alisha', '123'),
(3, 'anees', 'chennai', 'chennai', 'chennai', 'chennai', '9876543212', 'anees@gmail.com', 'anees', '123');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

DROP TABLE IF EXISTS `designs`;
CREATE TABLE IF NOT EXISTS `designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model_no` varchar(50) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `image_type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `Model_no`, `Title`, `Price`, `Description`, `image_type`) VALUES
(1, 'KT101', 'Modern Kitchen', 35000, 'Nearly Modern Kitchen With Advanced Functionalities', '20317-IMG_20220206_180946.jpg'),
(2, 'KT102', 'Kitchen Self', 20000, 'Kitchen Self Moderating', '84156-IMG_20220206_180902.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'Admin'),
(8, 'alisha', '123', 'User'),
(9, 'anees', '123', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
