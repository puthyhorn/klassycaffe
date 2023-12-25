-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2023 at 07:40 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klassycafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

DROP TABLE IF EXISTS `tbl_booking`;
CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `bookid` int UNSIGNED NOT NULL,
  `cus_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tid` varchar(15) NOT NULL,
  KEY `tableid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookid`, `cus_name`, `phone`, `email`, `date`, `time`, `tid`) VALUES
(100016, 'Nita', '08282823', 'nita@gmail.com', '2023-07-29', '5:43 PM', 'S002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chef`
--

DROP TABLE IF EXISTS `tbl_chef`;
CREATE TABLE IF NOT EXISTS `tbl_chef` (
  `cid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `cardid` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `timein` varchar(10) DEFAULT NULL,
  `timeout` varchar(10) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_chef`
--

INSERT INTO `tbl_chef` (`cid`, `name`, `cardid`, `phone`, `start_date`, `timein`, `timeout`, `img`) VALUES
(1, 'Horn Puthy', '1811038444', '087880636', '2020-01-01', '1:00', '8:00', 'chef-04.jpg'),
(2, 'Mr. Kong Kea', '2102224532', '0129247474', '2022-01-11', '7:00', '4:00', 'chefs-06.jpg'),
(3, 'Mr. Kim San', '1954322076', '0736456409', '2022-02-08', '4:00', '9:00', 'chefs-03.jpg'),
(4, 'Mr. Ponnareay', '1923040432', '0973482212', '2023-05-02', '7:00', '11:00', 'chefs-01.jpg'),
(5, 'Mr.Chetra', '2033249546', '0112747583', '2023-04-26', '4:00', '9:00', 'chefs-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ckbook`
--

DROP TABLE IF EXISTS `tbl_ckbook`;
CREATE TABLE IF NOT EXISTS `tbl_ckbook` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookid` int NOT NULL,
  `cus_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(15) NOT NULL,
  `tableid` varchar(15) NOT NULL,
  `amount` double NOT NULL,
  `ckdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_ckbook`
--

INSERT INTO `tbl_ckbook` (`id`, `bookid`, `cus_name`, `phone`, `email`, `date`, `time`, `tableid`, `amount`, `ckdate`) VALUES
(3, 100003, 'Mr.Manith', '0972177781', 'manith@gmail.com', '2023-07-01', '06:00 PM', 'G001', 33.5, '2023-07-06'),
(4, 100014, 'Vuth', '0972177781', 'vuth@gmail.com', '2023-07-01', '9:28 PM', 'S001', 26.5, '2023-07-08'),
(5, 100002, 'Mr.Puthy', '012323981', 'puthy@gmail.com', '2023-07-02', '04:20 PM', 'G002', 40, '2023-07-08'),
(6, 100017, 'Bopha', '012935733', 'bopha@gmail.com', '2023-07-03', '2:44 PM', 'F003', 11, '2023-07-08'),
(7, 100019, 'Manith', '0862234433', 'nith@gmail.com', '2023-07-03', '5:48 PM', 'F001', 41.5, '2023-07-08'),
(8, 100013, 'Sna', '082828222', 'sna@gmail.com', '2023-07-08', '9:27 PM', 'G001', 20, '2023-07-08'),
(9, 100020, 'Bunthouen', '017990234', 'bt@gmail.com', '2023-07-08', '9:49 AM', 'S002', 49.5, '2023-07-09'),
(10, 100018, 'Piseth', '0129247474', 'seth@yahoo.com', '2023-07-09', '7:45 PM', 'F002', 64.5, '2023-07-09'),
(11, 100022, 'Phanit', '017990434', 'nit@yahoo.com', '2023-07-10', '1:54 PM', 'S002', 42.5, '2023-07-10'),
(12, 100021, 'Dollar', '06609009', 'dolar@gmail.com', '2023-07-03', '3:47 AM', 'G001', 101.5, '2023-07-10'),
(13, 100023, 'Kong Kea', '073645643', 'kea@gmail.com', '2023-07-10', '4:22 PM', 'S002', 68.5, '2023-07-11'),
(14, 100024, 'Kakada', '06432234', 'da@gmail.com', '2023-07-12', '7:37 PM', 'S001', 22.5, '2023-07-12'),
(15, 100025, 'Ratanak', '0972177781', 'nak@gmail.com', '2023-07-12', '5:24 PM', 'G002', 37.5, '2023-07-12'),
(16, 100026, 'Cheata', '024345665', 'ta@gmail.com', '2023-07-12', '6:37 PM', 'G004', 32.5, '2023-07-12'),
(17, 100029, 'Chenda', '012344567', 'chenda@gmail.com', '2023-07-13', '7:54 PM', 'F002', 52.5, '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `con_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `smg` varchar(255) NOT NULL,
  `trash` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`con_id`, `name`, `email`, `subject`, `smg`, `trash`) VALUES
(1, 'Puthy', 'puthy@gmail.com', 'About Reservation', 'I already booked a table. Please confirm it.', 0),
(6, 'Mr.Adole', 'adole@gmail.com', 'Info', 'I want to book a table for next month.', 0),
(7, 'Veasna', 'sna@gmail.com', 'About Reservation', 'I already booked a table for 08 this  month.', 0),
(8, 'Dara', 'dara@yahoo.com', 'About Reservation', 'I already booked a table. Pls confirm.', 0),
(9, 'Chenda', 'chenda@gmail.com', 'About Reservation', 'I already booked a table for today. Pls Confirm.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

DROP TABLE IF EXISTS `tbl_food`;
CREATE TABLE IF NOT EXISTS `tbl_food` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ingridient` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` double NOT NULL,
  `img` varchar(50) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `trash` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `name`, `ingridient`, `price`, `img`, `cid`, `trash`) VALUES
(1, 'Canbodia KuyTeav', 'The original kuy teav recipe is hotly debated. The only real consensus is that the two soups certainly different: the Cambodian broth is perhaps a little sweeter, but in what other ways, no one seems clear.', 6.5, '01.jpg', 'food', 0),
(2, 'Banh Srung', 'The original kuy teav recipe is hotly debated. The only real consensus is that the two soups certainly different: the Cambodian broth is perhaps a little sweeter, but in what other ways, no one seems clear.', 4.5, '03.jpg', 'food', 0),
(3, 'Tung Yum', 'The famous Thai Soup, made at home, and it\'s honestly the real deal!! See recipe notes for shortcut using frozen peeled prawns/shrimp. Also, CHOOSE from classic clear Tom Yum (Tom Yum Goong Nam Sa) or the creamy Tom Yum version (Tom Yum Goong Nam Khon).', 8.5, '02.jpg', 'food', 0),
(4, 'Sweeties Berry', 'Sweet Berries A full-bodied mixture with the sweetness of juicy fruits. Ingredients: hibiscus, apple pieces, rosehip peel, sweet blackberry leaves, flavorings, raspberries (5%), orange peel, rose petals.', 9.5, '4.jpg', 'dessert', 0),
(5, 'Special Strawberry', 'strawberry and raspberry flavor Sweet Berries A full-bodied mixture with the sweetness of juicy fruits.', 7, '6.jpg', 'dessert', 0),
(6, 'Sam Lour Kari Khmer', 'Tomato, yogurt, and onion are also essential ingredients in this classic Indian main dish. Fresh minced garlic and ginger lend a pleasant sharpness.', 6, '14.png', 'food', 0),
(7, 'Lemon Soda Tea', 'Lemon tea is prepared using black tea or green tea and by adding the right amount of lemon juice to it. When you add lemon juice to your tea, it changes the colour of tea.', 3.5, '2.jpg', 'juice', 0),
(8, 'Avocado Frappe', 'n a blender, combine whole milk, sweetened condensed milk, avocado, ice, coffee, and salt. Blend on high speed until smooth, 30 seconds to 1 minute', 4.5, '3.jpg', 'juice', 0),
(9, 'Chocolate Ice Smoothies', 'A frappe is simply an iced beverage that has been blended, shaken or beaten.  It creates a foamy, creamy delicious drink.  You will often see it served topped with whipped cream and possibly other toppings too.', 5.5, '2.jpg', 'dessert', 0),
(10, 'Coke Ice Lemon', 'The delicious taste of a refreshing can of Coca-Cola, but completely sugar-free. With Coca-Cola Zero you can enjoy your favorite soft drink without calories. Available in different flavours, such as this Lemon flavour.', 3.5, '4.jpg', 'juice', 0),
(11, 'Berry Lemon Tea', 'Bring 4 cups water to a boil in same saucepan; add 3 family-size tea bags, and let stand 5 minutes. Remove and discard tea bags. Stir in 3/4 cup sugar and blueberry juice mixture. Pour into a pitcher; cover and chill 1 hour. Serve over ice.', 3, '6.jpg', 'juice', 0),
(12, 'Cookies Cup Cake', 'The melted butter in this chocolate chip cookie dough makes it super smooth and helps it bake up into the perfect chewy, yet sturdy cookie.', 3, '3.jpg', 'dessert', 0),
(13, 'Strawberry Western Cake', 'Added a simple strawberry glaze to the still warm layers before chilling. Then used a strawberry buttercream on top. whipped the egg whites separately and folded them in at the end. also used fresh strawberries for the purée. Cake came out delicious and moist.', 6.5, '4.jpg', 'dessert', 0),
(14, 'tst', 'fdfd', 23, '12.png', 'food', 1),
(15, 'Test', 'updated', 56, '8.jpg', 'juice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderhis`
--

DROP TABLE IF EXISTS `tbl_orderhis`;
CREATE TABLE IF NOT EXISTS `tbl_orderhis` (
  `oid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tableid` varchar(15) NOT NULL,
  `foodid` int NOT NULL,
  `bookid` int NOT NULL,
  `price` double NOT NULL,
  `num` int NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_orderhis`
--

INSERT INTO `tbl_orderhis` (`oid`, `tableid`, `foodid`, `bookid`, `price`, `num`) VALUES
(1, 'G001', 1, 100003, 6.5, 1),
(2, 'G001', 2, 100003, 4.5, 0),
(3, 'G001', 3, 100003, 8.5, 0),
(4, 'G001', 4, 100003, 9.5, 0),
(8, 'G001', 5, 100003, 7, 0),
(9, 'G001', 4, 100003, 9.5, 1),
(10, 'G001', 2, 100003, 4.5, 1),
(11, 'G001', 1, 100003, 6.5, 1),
(13, 'G001', 1, 100003, 6.5, 1),
(14, 'S001', 5, 100014, 7, 1),
(15, 'S001', 3, 100014, 8.5, 1),
(16, 'S001', 2, 100014, 4.5, 1),
(17, 'S001', 1, 100014, 6.5, 1),
(5, 'G002', 4, 100002, 9.5, 1),
(6, 'G002', 5, 100002, 7, 1),
(7, 'G002', 5, 100002, 7, 1),
(12, 'G002', 4, 100002, 9.5, 1),
(18, 'G002', 5, 100002, 7, 1),
(21, 'F003', 4, 100017, 9.5, 0),
(22, 'F003', 2, 100017, 4.5, 1),
(23, 'F003', 1, 100017, 6.5, 1),
(24, 'F001', 5, 100019, 7, 0),
(25, 'F001', 2, 100019, 4.5, 1),
(26, 'F001', 1, 100019, 6.5, 1),
(27, 'F001', 4, 100019, 9.5, 1),
(28, 'F001', 5, 100019, 7, 0),
(29, 'F001', 5, 100019, 7, 1),
(30, 'F001', 5, 100019, 7, 1),
(31, 'F001', 5, 100019, 7, 1),
(32, 'G001', 1, 100013, 6.5, 1),
(34, 'G001', 5, 100013, 7, 1),
(35, 'G001', 1, 100013, 6.5, 1),
(41, 'S002', 2, 100020, 4.5, 1),
(42, 'S002', 1, 100020, 6.5, 1),
(43, 'S002', 1, 100020, 6.5, 1),
(44, 'S002', 1, 100020, 6.5, 1),
(45, 'S002', 1, 100020, 6.5, 1),
(46, 'S002', 8, 100020, 4.5, 1),
(47, 'S002', 11, 100020, 3, 1),
(48, 'S002', 12, 100020, 3, 1),
(49, 'S002', 9, 100020, 5.5, 1),
(50, 'S002', 11, 100020, 3, 1),
(20, 'F001', 5, 100018, 7, 0),
(33, 'F002', 4, 100018, 9.5, 1),
(36, 'F002', 6, 100018, 6, 1),
(37, 'F002', 9, 100018, 5.5, 1),
(38, 'F002', 8, 100018, 4.5, 1),
(39, 'F002', 1, 100018, 6.5, 1),
(40, 'F002', 2, 100018, 4.5, 1),
(51, 'F002', 10, 100018, 3.5, 1),
(52, 'F002', 13, 100018, 6.5, 1),
(53, 'F002', 5, 100018, 7, 1),
(54, 'F002', 1, 100018, 6.5, 1),
(55, 'F002', 2, 100018, 4.5, 1),
(56, 'S002', 6, 100022, 6, 1),
(57, 'S002', 3, 100022, 8.5, 1),
(58, 'S002', 3, 100022, 8.5, 1),
(59, 'S002', 3, 100022, 8.5, 1),
(60, 'S002', 8, 100022, 4.5, 1),
(61, 'S002', 10, 100022, 3.5, 1),
(62, 'S002', 12, 100022, 3, 1),
(63, 'G001', 1, 100021, 6.5, 1),
(64, 'G001', 1, 100021, 6.5, 1),
(65, 'G001', 2, 100021, 4.5, 1),
(66, 'G001', 4, 100021, 9.5, 1),
(67, 'G001', 5, 100021, 7, 1),
(68, 'G001', 1, 100021, 6.5, 1),
(69, 'G001', 13, 100021, 6.5, 1),
(70, 'G001', 10, 100021, 3.5, 1),
(71, 'G001', 12, 100021, 3, 1),
(72, 'G001', 12, 100021, 3, 1),
(73, 'G001', 12, 100021, 3, 1),
(74, 'G001', 8, 100021, 4.5, 1),
(75, 'G001', 5, 100021, 7, 1),
(76, 'G001', 1, 100021, 6.5, 1),
(77, 'G001', 13, 100021, 6.5, 1),
(78, 'G001', 1, 100021, 6.5, 1),
(79, 'G001', 1, 100021, 6.5, 1),
(80, 'G001', 2, 100021, 4.5, 1),
(81, 'S002', 13, 100023, 6.5, 1),
(82, 'S002', 3, 100023, 8.5, 1),
(83, 'S002', 4, 100023, 9.5, 1),
(84, 'S002', 5, 100023, 7, 1),
(85, 'S002', 1, 100023, 6.5, 1),
(86, 'S002', 3, 100023, 8.5, 1),
(87, 'S002', 4, 100023, 9.5, 1),
(88, 'S002', 13, 100023, 6.5, 1),
(89, 'S002', 11, 100023, 3, 1),
(90, 'S002', 11, 100023, 3, 1),
(91, 'S001', 13, 100024, 6.5, 0),
(92, 'S001', 11, 100024, 3, 1),
(93, 'S001', 13, 100024, 6.5, 1),
(94, 'S001', 13, 100024, 6.5, 1),
(95, 'S001', 12, 100024, 3, 1),
(96, 'S001', 10, 100024, 3.5, 1),
(97, 'G002', 14, 100025, 23, 0),
(98, 'G002', 13, 100025, 6.5, 1),
(99, 'G002', 13, 100025, 6.5, 1),
(100, 'G002', 13, 100025, 6.5, 1),
(101, 'G002', 9, 100025, 5.5, 1),
(102, 'G002', 9, 100025, 5.5, 1),
(103, 'G002', 5, 100025, 7, 1),
(104, 'G004', 13, 100026, 6.5, 1),
(105, 'G004', 13, 100026, 6.5, 1),
(106, 'G004', 13, 100026, 6.5, 1),
(107, 'G004', 13, 100026, 6.5, 1),
(108, 'G004', 13, 100026, 6.5, 1),
(109, 'F002', 13, 100029, 6.5, 1),
(110, 'F002', 1, 100029, 6.5, 1),
(111, 'F002', 3, 100029, 8.5, 1),
(112, 'F002', 3, 100029, 8.5, 1),
(113, 'F002', 5, 100029, 7, 1),
(114, 'F002', 6, 100029, 6, 1),
(115, 'F002', 6, 100029, 6, 1),
(116, 'F002', 10, 100029, 3.5, 1),
(117, 'F001', 13, 100030, 6.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prebook`
--

DROP TABLE IF EXISTS `tbl_prebook`;
CREATE TABLE IF NOT EXISTS `tbl_prebook` (
  `bookid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(15) NOT NULL,
  `tid` varchar(15) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM AUTO_INCREMENT=100031 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_prebook`
--

INSERT INTO `tbl_prebook` (`bookid`, `cus_name`, `phone`, `email`, `date`, `time`, `tid`) VALUES
(100027, 'Makara', '088675344', 'makara@gmail.com', '2023-07-15', '6:48 PM', 'G003'),
(100028, 'Sovanan', '097504033', 'nan@gmail.com', '2023-07-15', '7:52 PM', 'F001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preorder`
--

DROP TABLE IF EXISTS `tbl_preorder`;
CREATE TABLE IF NOT EXISTS `tbl_preorder` (
  `oid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tableid` varchar(15) NOT NULL,
  `foodid` int NOT NULL,
  `bookid` int NOT NULL,
  `price` double NOT NULL,
  `num` int NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `tableid` (`foodid`),
  KEY `foodid` (`tableid`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_preorder`
--

INSERT INTO `tbl_preorder` (`oid`, `tableid`, `foodid`, `bookid`, `price`, `num`) VALUES
(19, 'jh', 1, 1, 1, 1),
(118, 'S002', 13, 100016, 6.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE IF NOT EXISTS `tbl_report` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

DROP TABLE IF EXISTS `tbl_table`;
CREATE TABLE IF NOT EXISTS `tbl_table` (
  `tid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mark` varchar(50) NOT NULL,
  `table_num` varchar(25) NOT NULL,
  `floor` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `trash` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`tid`, `mark`, `table_num`, `floor`, `img`, `trash`) VALUES
(1, 'Family Dinning', 'G001', 'Ground Floor', '4.jpg', 0),
(2, 'Mini Dinning', 'G002', 'Ground Floor', '5.jpg', 0),
(3, 'Partner Dinning', 'F001', 'First Floor', '2.jpg', 0),
(4, 'Party Dinning Small Set', 'F002', 'First Floor', '8.jpg', 0),
(5, 'Partner Dinning Classic', 'S001', 'Second Floor', '3.jpg', 0),
(6, 'Party Dinning Giant Set', 'S002', 'Second Floor', '7.jpg', 0),
(7, 'Partner Dinning', 'G003', 'Ground Floor', '1.jpg', 0),
(8, 'Partner Dinning', 'F003', 'First Floor', '2.jpg', 0),
(9, 'Party Dinning Small Set', 'G004', 'Ground Floor', '8.jpg', 0),
(10, 'test', 'G005', 'Ground Floor', '3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `position` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `img` varchar(200) NOT NULL,
  `trash` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `position`, `password`, `img`, `trash`) VALUES
(1, 'admin', 'Manager', '123', '4.jpg', 0),
(2, 'user2', 'Accountant', '123', '3.jpg', 0),
(3, 'bopha', 'Cashier', '12345', '2.jpg', 0),
(4, 'user4', 'Cashier', '123', '1.jpg', 0),
(5, 'test', 'Sale', '123', '3.jpg', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
