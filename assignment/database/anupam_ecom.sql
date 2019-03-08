-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2019 at 04:56 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
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
(1, 27, 3),
(2, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_desc` text NOT NULL,
  `created_by` int(10) NOT NULL,
  `cat_color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `created_by`, `cat_color`) VALUES
(23, 'Electronics', 'All type of electronic product including mobile, tv, Irons', 1, '#ea80fc'),
(24, 'Appliances', 'Washing machine, Iron and Camera, keyboard', 1, '#90caf9'),
(26, 'Baby', 'Toy,  Care, Clothing', 1, '#80deea'),
(27, 'Books', 'maths, Physics , chemistry', 1, '#80cbc4'),
(33, 'Home', 'furniture, Decor, Lightning, Tools and Hardware', 1, '#81c784'),
(44, 'Mobiles Phones', 'Apple, Samsung, Nokia, LG', 1, '#33691e'),
(45, 'New', 'Test', 1, '#f57c00'),
(46, 'Menz', 'menz clothing Footwear etc', 1, '#e91e63');

-- --------------------------------------------------------

--
-- Table structure for table `euser`
--

CREATE TABLE `euser` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `euser`
--

INSERT INTO `euser` (`user_id`, `user_name`, `user_type`, `user_email`, `user_password`) VALUES
(1, 'Anupam', 'admin', 'admin@abc.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Lawkush', NULL, 'law@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'test', NULL, 'test@test', '21232f297a57a5a743894a0e4a801fc3');

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
(14, 'Test 3', NULL, '../assets/uploads/avatar.png', 27, 'Test 3', 0, 1, NULL),
(15, 'Test 4', NULL, '../assets/uploads/cover.png', 27, 'Test 4', 9999, 1, NULL),
(16, 'Test 5', NULL, '../assets/uploads/155073391114032459855c6e5257840f7avatar.png', 27, 'None', 66, 1, NULL),
(20, 'New', NULL, '../assets/uploads/155106949519795865915c737137446b9responsive-online-resume-desktop.jpg', 27, 'New Book Product 25 Feb 2019', 7000, 1, NULL),
(22, 'Flower', NULL, '../assets/uploads/1551100000576223475c73e860cc8bddownload.jpeg', 33, 'Flower Collection.', 5, 1, NULL),
(23, 'View', NULL, '../assets/uploads/155110004912399314895c73e891d0c6bdownload.jpeg', 33, 'Wall painting', 50000, 1, NULL),
(24, 'Philips Iron', NULL, '../assets/uploads/155110009413911430065c73e8be96a7adownload (2).jpeg', 24, '1 Year Warennty', 1400, 1, NULL),
(25, 'Lenovo U41', NULL, '../assets/uploads/15511001601485022115c73e90070288download (3).jpeg', 23, 'Intel core i5\n8Gb DDR4', 51000, 1, NULL),
(26, 'SD0323G Canvas Shoes For Men  (White, Black)', NULL, '../assets/uploads/155115734513774106825c74c86155502121.jpeg', 45, 'the product quality is awesome,#comfortable ,#stylish\nAt this price point this product is excellent', 591, 1, NULL),
(27, 'INF NEW', NULL, '../assets/uploads/155115739616110902155c74c8942046233.jpeg', 23, 'Comfortable Grass Flip Flop Flip Flops\n', 215, 1, NULL),
(28, 'Sparx', NULL, '../assets/uploads/155115745121026521955c74c8cbb2a9e54.jpeg', 45, 'Men Olive Sandals\n', 664, 1, NULL),
(29, 'Sparx', NULL, '../assets/uploads/155115756218231259385c74c93aeddaf91.jpeg', 45, 'Men NavyBlueFlourscentGreen Sandals\n', 700, 1, NULL),
(30, 'Sparx', NULL, '../assets/uploads/15511578726378058885c74ca7028ed1ss0445g-6-sparx-oliveorange-original-imaf53t5gc9zfyjw.jpeg', 45, 'Men OliveOrange Sandals\n', 800, 1, NULL),
(31, 'Sparx', NULL, '../assets/uploads/155115790615051231265c74ca925928a545.jpeg', 45, 'Men Black Red Sandals\n', 999, 1, NULL),
(32, 'LG', NULL, '../assets/uploads/155115796415101730255c74cacc6034345.jpeg', 24, 'LG 6.2 kg Inverter Fully Automatic Top Load Washing Machine White, Silver  (T7269NDDL)\n', 11999, 1, NULL),
(33, 'Samsung', NULL, '../assets/uploads/155115802421032751505c74cb086eca7sma.jpeg', 24, 'Samsung 6.2 kg Fully Automatic Top Load Washing Machine Grey  (WA62M4100HY/TL)\n', 13900, 1, NULL),
(34, 'Motorola One Power (Black, 64 GB)  (4 GB RAM)', NULL, '../assets/uploads/155116577315299012995c74e94d763a3moto.jpeg', 44, 'Indulge in a long-lasting entertainment experience with the Motorola One Power smartphone. Boasting a 15.7-cm (6.2 inch) full HD+ screen with an aspect ratio of 19:9 and a powerful 5000-mAh battery, this smartphone lets you watch your favourite video content, listen to music, or play graphic-rich video games for a long duration.', 13999, 1, NULL),
(35, 'RBC RIYA R Cotton Bedding Set  (Blue)', NULL, '../assets/uploads/155117456910407351705c750ba95a712babay.jpeg', 26, '1 Sleeping Bag, 1 Baby Mosquito Net Bed', 699, 1, NULL),
(36, 'Fisher-Price Cotton', NULL, '../assets/uploads/155117468717648317615c750c1f11d6enew.jpeg', 26, 'Fisher-Price Cotton, Cotton Silk Blend Bedding Set  (Multicolor)', 1400, 1, NULL),
(37, 'Rico Sordi ', NULL, '../assets/uploads/15511748807648443085c750ce074f7er.jpeg', 46, 'Solid Men Round Neck Multicolor T-Shirt  (Pack of 2)\n', 399, 1, NULL),
(38, 'EG', NULL, '../assets/uploads/155117494012715116435c750d1c58787ru.jpeg', 46, 'Color block Men Round Neck Black, Red T-Shirt\n', 449, 1, NULL),
(39, 'Huami', NULL, '../assets/uploads/155117533812248487545c750eaab6fa5hu.jpeg', 23, 'Huami Amazfit Stratos Black Smartwatch  (Black Strap Free Size)#JustHere', 12599, 1, NULL),
(40, 'Kuber Industries', NULL, '../assets/uploads/15511754283584435245c750f048e0a8kuber.jpeg', 33, 'Kuber Industries Stainless Steel Fridge Water Bottle/Refrigerator Bottle/Thunder (1000 ML)-Kitchenware Set of 3 Pcs (Code-BT018) 1000 ml Bottle  (Pack of 3, Silver)', 595, 1, NULL),
(41, 'TCL', NULL, '../assets/uploads/15511757895118568165c75106d8d58atcl.jpeg', 24, 'iFFALCON by TCL Certified Android 138.71cm (55 inch) Ultra HD (4K) LED Smart TV with Netflix  (55K2A)#JustHere\n', 39499, 1, NULL),
(42, 'Ajanta', NULL, '../assets/uploads/1551175837200793015c75109de1c8eajan.jpeg', 33, 'Ajanta Analog 31.3 cm X 31.3 cm Wall Clock  (Brown, With Glass)', 359, 1, NULL),
(43, 'Railway', NULL, '../assets/uploads/155117589820979802535c7510da7de30rrb.jpeg', 27, 'Railway NTPC Graduate 2nd Stage Main Exam For Group I , II, III & IV - Solved Papers & Practice Work Book 44 sets  (Paperback, Hindi, Kiran Prakashan)', 235, 1, NULL),
(44, 'New Testing', NULL, '../assets/uploads/15512628982721056715c7664b2ba72dcover.png', 26, 'new testing', 500, 1, NULL),
(45, 'test', NULL, '../assets/uploads/15518700488414348405c7fa86071872Screenshot from 2019-03-01 10-09-22.png', 26, 'test', 100, 1, NULL),
(46, 'test', NULL, '../assets/uploads/15518705877051092105c7faa7b223baScreenshot from 2019-03-01 10-09-22.png', 26, 'test', 100, 1, NULL),
(47, 'test', NULL, '../assets/uploads/15518706803747103375c7faad8edbebScreenshot from 2019-03-01 10-09-22.png', 26, 'test', 100, 1, NULL);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `euser`
--
ALTER TABLE `euser`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
