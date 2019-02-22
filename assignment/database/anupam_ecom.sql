-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2019 at 05:52 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.3.1-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anupam_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(23, 'Electronics', 'All type of electronic product including mobile, tv, Irons'),
(24, 'Appliances', 'Washing machine, Iron and Camera, keyboard'),
(26, 'Baby', 'Toy,  Care, Clothing'),
(27, 'Books', 'maths, Physics , chemistry'),
(33, 'Home', 'furniture, Decor, Lightning, Tools and Hardware'),
(44, 'Mobiles Phones', 'Apple, Samsung, Nokia, LG');

-- --------------------------------------------------------

--
-- Table structure for table `euser`
--

CREATE TABLE `euser` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `euser`
--

INSERT INTO `euser` (`user_id`, `user_name`, `user_type`, `user_email`, `user_password`) VALUES
(1, 'Anupam', 'admin', 'admin@abc.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(50) DEFAULT NULL,
  `pro_tag_text` text,
  `pro_image` text,
  `pro_cat` int(10) DEFAULT NULL,
  `pro_desc` text,
  `pro_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_tag_text`, `pro_image`, `pro_cat`, `pro_desc`, `pro_price`) VALUES
(13, 'Testing 2', NULL, '../assets/uploads/avatar.png', 23, 'test 2 Description', 6999),
(14, 'Test 3', NULL, '../assets/uploads/avatar.png', 27, 'Test 3', 0),
(15, 'Test 4', NULL, '../assets/uploads/cover.png', 27, 'Test 4', 9999),
(16, 'Test 5', NULL, '../assets/uploads/155073391114032459855c6e5257840f7avatar.png', 27, 'None', 66),
(17, 'Test 6', NULL, '../assets/uploads/15507339304709569865c6e526ae2488avatar.png', 23, 'None Test', 77),
(18, 'test 141', NULL, '../assets/uploads/155082522512380203915c6fb7091387aScreenshot from 2019-02-18 12-00-04.png', NULL, 'Testing', 4545),
(19, 'Test 121', NULL, '../assets/uploads/155082538517342409745c6fb7a9b6aabScreenshot from 2019-02-18 12-00-04.png', 23, 'Testing Component Testing Component', 5555);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `euser`
--
ALTER TABLE `euser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cat` (`pro_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `euser`
--
ALTER TABLE `euser`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pro_cat`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
