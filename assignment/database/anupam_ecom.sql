-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2019 at 07:23 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `c_id`) VALUES
(3, 24, 2),
(4, 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_desc` text NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `created_by`) VALUES
(23, 'Electronics', 'All type of electronic product including mobile, tv, Irons', 1),
(24, 'Appliances', 'Washing machine, Iron and Camera, keyboard', 1),
(26, 'Baby', 'Toy,  Care, Clothing', 1),
(27, 'Books', 'maths, Physics , chemistry', 1),
(33, 'Home', 'furniture, Decor, Lightning, Tools and Hardware', 1),
(44, 'Mobiles Phones', 'Apple, Samsung, Nokia, LG', 1),
(45, 'New', 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `euser`
--

CREATE TABLE `euser` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `euser`
--

INSERT INTO `euser` (`user_id`, `user_name`, `user_type`, `user_email`, `user_password`) VALUES
(1, 'Anupam', 'admin', 'admin@abc.com', 'admin'),
(2, 'Lawkush', NULL, 'law@gmail.com', '1234'),
(4, 'Chean', NULL, 'chetan@gmail.com', '1234');

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
  `pro_price` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_tag_text`, `pro_image`, `pro_cat`, `pro_desc`, `pro_price`, `added_by`, `added_on`) VALUES
(13, 'Testing 2', NULL, '../assets/uploads/avatar.png', 23, 'test 2 Description', 6999, 1, NULL),
(14, 'Test 3', NULL, '../assets/uploads/avatar.png', 27, 'Test 3', 0, 1, NULL),
(15, 'Test 4', NULL, '../assets/uploads/cover.png', 27, 'Test 4', 9999, 1, NULL),
(16, 'Test 5', NULL, '../assets/uploads/155073391114032459855c6e5257840f7avatar.png', 27, 'None', 66, 1, NULL),
(17, 'Test 6', NULL, '../assets/uploads/15507339304709569865c6e526ae2488avatar.png', 23, 'None Test', 77, 1, NULL),
(18, 'test 141', NULL, '../assets/uploads/155082522512380203915c6fb7091387aScreenshot from 2019-02-18 12-00-04.png', 23, 'Testing', 4545, 1, NULL),
(19, 'Test 121', NULL, '../assets/uploads/155082538517342409745c6fb7a9b6aabScreenshot from 2019-02-18 12-00-04.png', 23, 'Testing Component Testing Component', 5555, 1, NULL),
(20, 'New', NULL, '../assets/uploads/155106949519795865915c737137446b9responsive-online-resume-desktop.jpg', 27, 'New Book Product 25 Feb 2019', 7000, 1, NULL),
(21, 'test', NULL, '../assets/uploads/155107534014929543875c73880c59eaagalaxy-s10.jpg', 27, 'ADbfdfGHADF', 1000, 1, NULL),
(22, 'Flower', NULL, '../assets/uploads/1551100000576223475c73e860cc8bddownload.jpeg', 33, 'Flower Collection.', 5, 1, NULL),
(23, 'View', NULL, '../assets/uploads/155110004912399314895c73e891d0c6bdownload.jpeg', 33, 'Wall painting', 50000, 1, NULL),
(24, 'Philips Iron', NULL, '../assets/uploads/155110009413911430065c73e8be96a7adownload (2).jpeg', 24, '1 Year Warennty', 1400, 1, NULL),
(25, 'Lenovo U41', NULL, '../assets/uploads/15511001601485022115c73e90070288download (3).jpeg', 23, 'Intel core i5\n8Gb DDR4', 51000, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `euser`
--
ALTER TABLE `euser`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
