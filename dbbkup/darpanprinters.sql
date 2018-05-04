-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2017 at 06:57 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `darpanprinters`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('S','A') NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_name`, `email_id`, `password`, `user_type`, `added_on`) VALUES
(1, 'Tasleem Deals', 'info@darpanprinters.com', 'cdb55e8d3e41ea772be1a029dc48ff97', 'S', '2016-05-08 18:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `paper_boards`
--

CREATE TABLE IF NOT EXISTS `paper_boards` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('Paper','Board') NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `paper_boards`
--

INSERT INTO `paper_boards` (`id`, `category`, `type`) VALUES
(1, 'Paper', 'Art Card'),
(7, 'Paper', 'Art Card1'),
(8, 'Paper', 'Art Card33'),
(6, 'Paper', 'Chromo Paper'),
(3, 'Paper', 'Gumming Paper'),
(4, 'Paper', 'Maplitho Paper'),
(2, 'Board', 'Duplex Board');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `cpname` varchar(60) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `mobile_num` bigint(20) unsigned NOT NULL,
  `tin_num` bigint(20) unsigned NOT NULL,
  `ptype` enum('S','O') NOT NULL,
  `plimit` float(8,2) NOT NULL,
  `opening_bal` float(8,2) NOT NULL,
  `bill_open_bal` float(8,2) NOT NULL,
  `oadds` varchar(80) NOT NULL,
  `ocity` varchar(50) NOT NULL,
  `ostate` varchar(50) NOT NULL,
  `opincode` int(10) unsigned NOT NULL,
  `fadds` varchar(80) NOT NULL,
  `fcity` varchar(50) NOT NULL,
  `fstate` varchar(50) NOT NULL,
  `fpincode` int(10) unsigned NOT NULL,
  `added_by` int(10) unsigned NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `added_by` (`added_by`),
  KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `pname`, `cpname`, `email_id`, `mobile_num`, `tin_num`, `ptype`, `plimit`, `opening_bal`, `bill_open_bal`, `oadds`, `ocity`, `ostate`, `opincode`, `fadds`, `fcity`, `fstate`, `fpincode`, `added_by`, `added_on`) VALUES
(3, 'MANISH MANGLIK', 'A', '', 23232, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(4, 'VARSHA PRINTERS(SHIKOHABAD)', '', '', 94121, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(5, 'GOYAL PRESS(FIROZABAD)', '1', '', 32, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(6, 'DAYA SHANKAR', 'A', '', 9319215059, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(7, 'AGRAWAL PRESS( HATHRAS)', 'A', '', 9837013938, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(8, 'REAL ARTS ETAWAH', 'A', '', 11, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(9, 'STAR ADVERTISER', 'A', '', 9837543360, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(10, 'ANKIT GRAPHICS (PIONEER)', '((S', '', 9548552752, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(11, 'ATUL JAIN', 'A', '', 20, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(12, 'NISHI PROCESS (BAL KISHAN) JHANSI', 'S', '', 9454793204, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(13, 'PRADEEP AGRAWAL', 'S', '', 9760007844, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(14, 'N X G', 'S', '', 7417, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(15, 'RAJU METAL CRAFT', 'S', '', 12, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(16, 'ANU GRAPHIC', 'S', '', 9997079277, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(17, 'ASHISH ANANT GRAPHICS (FZD)', 'S', '', 9897016085, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(18, 'R.K.PACKESING JAVED', 'S', '', 9760077749, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(19, 'NANDINI GRAPHICS (PANKAJ BATRA) GWALIOR', 'A', '', 9770742107, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(20, 'SHOBHIT PRINTER (JHANSI )', 'A', '', 9235945636, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(21, 'JAIN OFFSET SHIKOHABAD', 'A', '', 9412875480, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(22, 'KALPANA PRESS AGRA', 'S', '', 9897954398, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(23, 'MONA PRESS FIROZABAD', 'S', '', 12, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(24, 'VISHAL CARD (NISHANT TRADING CO.)', 'A', '', 9927404324, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(25, 'VIVEK SAINI JI (7417744338,9358325809)', 'S', '', 21, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(26, 'DHIRAJ BHAI', '2', '', 9917581275, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(27, 'RAJ PRINTER', '2', '', 8899139955, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(28, 'BHATIA OFSET JHANSI', 'S', '', 9415401224, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(29, 'G-MAX MEDIA', 'S', '', 9368947309, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(30, 'FRENK ADD.', 'S', '', 9837038645, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(31, 'G.D.AGARWAL', 'S', '', 9897098102, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(32, 'CHIRAG GRAPHICS', 'S', '', 9359888793, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(33, 'ILYAS FIROZABAD', 'S', '', 9267448338, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(34, 'VARSHA PRINTER AGRA', '', '', 9837328624, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(35, 'AMAN PRINTERS GWALIOR', 'S', '', 9827297109, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(36, 'PARASHAR GRAPHICS FIROZABAD', 'S', '', 7417104375, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(37, 'JEEVAN PUBLICATION AGRA', 'A', '', 8057848371, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(38, 'MORENA PRINTERS (MORENA)', 'A', '', 9300344147, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(39, 'ABHISHEK PRINTER ETAWAH', 'S', '', 9412613613, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(40, 'DUBEY PRINTER JHANSI', 'S', '', 9451122504, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(41, 'KHANDELWAL GRAPHICS', 'S', '', 7500222238, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(42, 'H.M.PRINTER', 'S', '', 9719355750, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(43, 'ART ZONE', 'S', '', 8445441660, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(44, 'RAJ KUMARI ENTERPRISES', 'A', '', 9719972935, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(45, 'CLASSIC METAL CRAFT', 'S', '', 8126179012, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(46, 'AMAN IDEA GRAPHICS', 'S', '', 9837990774, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(47, 'DIKSHA PLASTIC', 'S', '', 9319217328, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(48, 'AJAY PRESS KAMLA NAGAR', 'S', '', 9319215860, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(49, 'SAI PLANTATION JHANSI', 'S', '', 9450068439, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(50, 'PAWAN GRAPHICS AGRA', 'A', '', 9760138985, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(51, 'HARENDRA PLASTIC HATHRAS', 'S', '', 9837002092, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(52, 'UDAY PRINTERS DEHRADUN (ABHISHEK)', 'S', '', 9917780299, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(53, 'IDEA GRAPHICS', 'S', '', 9837990774, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(54, 'CENSICO INTERNATIONAL', 'S', '', 9837053777, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(55, 'JAI OFSET JHANSI', 'S', '', 8005203626, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(56, 'A.R.PRINTERS', 'S', '', 9319930803, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(57, 'DHEERAJ BHAI UJALA AGRA', 'S', '', 9917581275, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(58, 'TANVEER ADVERTISER( ETAH)', '2', '', 9719051172, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(59, 'PUNEET BHASEEN(AGRA)', 'A', '', 9639304000, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(60, 'TAJ -2- MASROOM (AGRA)', 'A', '', 9557843076, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(61, 'VEENUS CARD (AGRA)', '', '', 9837870346, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(62, 'PRINT POINT(ALIGARH)', 'M.K.GUPTA', '', 9837037789, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(63, 'MANROOP PRINTERS AGRA', 'A', '', 9412720507, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(64, 'TANISHA & COM.(DHOLPUR)', 'A', '', 9772104601, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(65, 'A.ONE PRINTER (BADI)', 'A', '', 9351644153, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(66, 'TAPOVAN PRINTER(9412062308)', 'A', '', 9412062308, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(67, 'MEGHDOTAM PRAKASHAN', 'S', '', 9758877529, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(68, 'LAXMI PRINTING PRESS SHAMSABAD', 'S', '', 9760645415, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(69, 'PRINTS LAB JHANSI(9415179428)', 'A', '', 9415179428, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(70, 'VIJAY PAL SINGH(9927543181)', 'A', '', 9927543181, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(71, 'DEEPAK PRINTER MURAR (GWALIOR,)', '', '', 9893042630, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(72, 'SHARDA OFFSET PRINTERS ETAWAH', 'S', '', 9756217827, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(73, 'E.D.S AGRA', 'S', '', 9319186832, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(74, 'SARVESH JI', 'S', '', 8192996003, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(75, 'GOPAL PRINTER AGRA', 'S', '', 9219698260, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(76, 'VIKASH SKY TAWER AGRA', 'S', '', 8923850079, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(77, 'SAI ASSOCIATE GWALIOR', 'S', '', 9826070263, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(78, 'ARIHANT ADD (AMAN)', 'S', '', 9410203392, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(79, 'BHAGWATI ENTERPRISES JHANSI', 'S', '', 7052532242, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(80, 'NARESH BHATNAGAR C/O GAYATRI PRINTER', 'S', '', 9359422666, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(81, 'ALLSHRESTHA', 'S', '', 9412261098, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(82, 'CHARAN SINGH JADOUN', 'A', '', 9412591515, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(83, 'MANISH JAIN', 'A', '', 9358427383, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(84, 'DIGITAL WORD JHANSI', 'A', '', 9793104978, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(85, 'C.P SHARMA', 'A', '', 75000466141, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(86, 'ANUJ ENTERPRISES', 'a', '', 9219506709, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(87, 'VIRIYA PRESS JALON', 'A', '', 9795206196, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(88, 'N.S.N', '0', '', 8791579590, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(89, 'SAI TRADERS', '0', '', 7520717442, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(90, 'KUM KUM PRESS HATHARAS', 'A', '', 8272480840, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(91, 'WAHID GRAPHICAS JAHNSI', 'A', '', 9619925105, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(92, 'VIDHYA PRINTER SIKOHABAD', 'A', '', 7500524242, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(93, 'DEEKSHA  CARD JHANSI', 'A', '', 8090178164, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(94, 'BHARAT GRAPHIC [RADIKA PRINTERS]', '0', '', 8273412092, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(95, 'SHILPA PRINTER MORENA', 'A', '', 9179805311, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(96, 'FISHER ADD. LALA BHAI', '0', '', 8126911786, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(97, 'MAYUR PRESS ETAWAH', 'A', '', 8445750209, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(98, 'S.K.PRINTER DHOLPUR', 'A', '', 9024772791, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(99, 'VIKAS PRINTER(BHRAGU PRINTER)', 'A', '', 9837132330, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(100, 'SHYAM JI PRINTERS', 'A', '', 9258030850, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(101, 'SANMATI GRAPHICAS', 'A', '', 9219719820, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(102, 'M.L.ENGINEERING  WORKS', 'A', '', 9412158446, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(103, 'RAJ CARD', 'A', '', 9917568374, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(104, 'GELEXY LEEVING ARTS', '', '', 8273879662, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(105, 'BHASIM KHAN (ALIGARH)', '', '', 3952880222, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(106, 'SONA COMPUTER FIROZABAD', '', '', 9760679549, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(107, 'BABA PRESS ETAWAH', 'A', '', 9045431104, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(108, 'SHARDA ENTERPRISES', '', '', 9837479545, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(109, 'GOPAL AJANTA ARTS', 'A', '', 9690672949, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(110, 'AABDEEN COMPUTER (KANNOJ)', 'A', '', 9335378719, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(111, 'PRADEEP SHARMA', 'A', '', 8909585666, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(112, 'G.S.PUBLIC SCHOOL  (KUBERPUR)', 'A', '', 9758405403, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(113, 'GLOW ADD WORLD', 'A', '', 9412254254, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(114, 'MAHALAXMI PRESS AGRA', 'A', '', 9411961655, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(115, 'MADHU PRESS (BABARPUR)', '', '', 8791209722, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(116, 'PALIWAL PRESS (AMRISH)', '', '', 9457656656, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(117, 'TOMAR OFFSET (ETAWAH)', '', '', 9997990299, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(118, 'SANDHYA PRINTERS', '', '', 9837248260, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(119, 'MAA VAISHNO GRAPHICAS', '', '', 9219525421, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(120, 'AGRAWAL PRINTERS & ADVERTISESR', '', '', 9412593050, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(121, 'SHARMA JI( FULTTI BAZAR)', '', '', 9897223398, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(122, 'SHARMA PRINTING WORKS', '', '', 9412353641, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(123, 'BRAHAM PRESS A.K.MISHRA', 'S', '', 9451220480, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(124, 'GOVIND CARD (RAM BAGH AGRA)', 'A', '', 9760477518, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(125, 'PREKSHA MARK ETAWAH', 'S', '', 9045159945, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(126, 'M.D. SHARMA JHANSI', 'S', '', 7052532242, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(127, 'ABHISHEK GRAPHICAS(FIROZABAD)', '', '', 9917287274, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(128, 'RATHORE COMPUTER', 'A', '', 9319108094, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(129, 'PARIKALPANA', 'S', '', 7895218548, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(130, 'ABC WORK (JHANSI)', 'A', '', 9235688303, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(131, 'GOVIND CREATIVE ART FIROZABAD', '', '', 9760375406, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(132, 'VIKAS  AGRA', '', '', 9760048141, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(133, 'DWARIKA PUBLICATION', 'S', '', 8755842202, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(134, 'MOHAN KAPOOR', 'S', '', 9837192449, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(135, 'VIPIN BHOLA (GWALIOR', '', '', 9300865250, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(136, 'SWET PRACHARAK', 'S', '', 9557905381, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(137, 'ANURAG ETAWAH', '', '', 9917025131, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(138, 'TOTAL GRAPHICS', 'S', '', 8881759649, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(139, 'NEELAM PRINTER (ETAWAH)', '', '', 8439325380, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(140, 'M.N. PRINTER', '', '', 8899974075, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(141, 'HARSH GRAPHICAS (FIROZABAD)', 'A', '', 9045232136, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(142, 'BABANDER MAIL JHANSI', 'S', '', 7309378407, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(143, 'SHAHVAZ GRAPHICAS', '', '', 8273880978, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(144, 'KAVITA DRY FRUITS', 'S', '', 9412259408, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(145, 'SHREE PRINTING PRESS', 'S', '', 9219799741, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(146, 'KRISHNA PRESS AGRA', '', '', 7417298008, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(147, 'VICKY CHAWLA', 'S', '', 7060712227, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(148, 'SWASTIK TRADERS', 'A', '', 9358340139, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(149, 'TRU COLOUR PRINTING PRESS', 'a', '', 9837700024, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(150, 'KHANDELWAL JOB', 'S', '', 9412652211, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(151, 'YADAV & COMPANY', '', '', 9410837646, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17'),
(152, 'JAY KRISHNA ARYA(SHIKOHABAD)', '', '', 9412301732, 0, 'S', 0.00, 0.00, 0.00, '', '', '', 0, '', '', '', 0, 0, '2016-05-18 08:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `receipthead`
--

CREATE TABLE IF NOT EXISTS `receipthead` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `pb_type` varchar(30) NOT NULL,
  `pb_size` varchar(15) NOT NULL,
  `pb_sizein` enum('inch','cm') NOT NULL,
  `gsm` mediumint(8) unsigned NOT NULL,
  `weight` decimal(5,1) unsigned NOT NULL,
  `quantity` decimal(6,2) unsigned NOT NULL,
  `pb_category` enum('Paper','Board') NOT NULL,
  `pb_unit` enum('Ream','Gross') NOT NULL,
  `added_on` datetime NOT NULL,
  `particulars` varchar(150) NOT NULL,
  `narration` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pname` (`pname`,`pb_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `receipthead`
--

INSERT INTO `receipthead` (`id`, `pname`, `pb_type`, `pb_size`, `pb_sizein`, `gsm`, `weight`, `quantity`, `pb_category`, `pb_unit`, `added_on`, `particulars`, `narration`) VALUES
(1, 'A.R.PRINTERS', 'Chromo Paper', '22x34', 'inch', 10, 2.4, 2.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', 'Hello'),
(2, 'A.R.PRINTERS', 'Chromo Paper', '22x34', 'inch', 10, 2.4, 3.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'First Entry', ''),
(3, 'A.ONE PRINTER (BADI)', 'Duplex Board', '22x30', 'inch', 100, 6.1, 20.00, 'Board', 'Gross', '2016-02-07 00:00:00', 'Opening Balance', ''),
(4, 'A.ONE PRINTER (BADI)', 'Art Card', '50x90', 'cm', 100, 22.5, 20.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', ''),
(5, 'A.R.PRINTERS', 'Art Card', '60x120', 'cm', 200, 72.0, 5.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', ''),
(6, 'A.R.PRINTERS', 'Art Card', '60x120', 'cm', 200, 72.0, 5.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(30, 'Andaman and Nicobar Island'),
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(31, 'Chandigarh'),
(5, 'Chhattisgarh'),
(32, 'Dadra and Nagar Haveli'),
(33, 'Daman and Diu'),
(35, 'Delhi-NCR; Faridabad; Gurgaon; Ghaziabad and Noida'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu and Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(34, 'Lakshadweep'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Orissa'),
(36, 'Puducherry'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttar Pradesh'),
(28, 'Uttarakhand'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE IF NOT EXISTS `stock_report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receipt_id` int(10) unsigned NOT NULL,
  `issue_id` int(10) unsigned NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pb_type` varchar(30) NOT NULL,
  `pb_size` varchar(15) NOT NULL,
  `pb_sizein` enum('inch','cm') NOT NULL,
  `gsm` mediumint(8) unsigned NOT NULL,
  `weight` decimal(5,1) unsigned NOT NULL,
  `rqty` decimal(6,2) unsigned NOT NULL,
  `iqty` decimal(6,2) unsigned NOT NULL,
  `bqty` decimal(6,2) unsigned NOT NULL,
  `pb_category` enum('Paper','Board') NOT NULL,
  `pb_unit` enum('Ream','Gross') NOT NULL,
  `added_on` datetime NOT NULL,
  `particulars` varchar(150) NOT NULL,
  `narration` varchar(200) NOT NULL,
  `status` enum('r','t','j','c') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pname` (`pname`,`pb_type`),
  KEY `receipt_id` (`receipt_id`),
  KEY `issue_id` (`issue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `stock_report`
--

INSERT INTO `stock_report` (`id`, `receipt_id`, `issue_id`, `pname`, `pb_type`, `pb_size`, `pb_sizein`, `gsm`, `weight`, `rqty`, `iqty`, `bqty`, `pb_category`, `pb_unit`, `added_on`, `particulars`, `narration`, `status`) VALUES
(1, 1, 0, 'A.R.PRINTERS', 'Chromo Paper', '22x34', 'inch', 10, 2.4, 2.00, 0.00, 2.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', 'Hello', 'r'),
(2, 2, 0, 'A.R.PRINTERS', 'Chromo Paper', '22x34', 'inch', 10, 2.4, 3.00, 0.00, 5.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'First Entry', '', 'r'),
(3, 3, 0, 'A.ONE PRINTER (BADI)', 'Duplex Board', '22x30', 'inch', 100, 6.1, 20.00, 0.00, 20.00, 'Board', 'Gross', '2016-02-07 00:00:00', 'Opening Balance', '', 'r'),
(4, 4, 0, 'A.ONE PRINTER (BADI)', 'Art Card', '50x90', 'cm', 100, 22.5, 20.00, 0.00, 20.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', '', 'r'),
(5, 5, 0, 'A.R.PRINTERS', 'Art Card', '60x120', 'cm', 200, 72.0, 5.00, 0.00, 5.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', '', 'r'),
(6, 6, 0, 'A.R.PRINTERS', 'Art Card', '60x120', 'cm', 200, 72.0, 5.00, 0.00, 10.00, 'Paper', 'Ream', '2016-02-07 00:00:00', 'Opening Balance', '', 'r');
