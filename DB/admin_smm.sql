-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2021 at 06:18 PM
-- Server version: 10.2.25-MariaDB-10.2.25+maria~xenial
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_smm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `ID` int(15) NOT NULL,
  `USER_ID` varchar(100) DEFAULT NULL,
  `FULL_NAME` varchar(200) DEFAULT NULL,
  `USER_NAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`ID`, `USER_ID`, `FULL_NAME`, `USER_NAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'SMSE-A-01', 'SMSE Admin', 'Admin', 'admin@smse.com', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `ID` int(15) NOT NULL,
  `CATEGORY_ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DESCRIPTION` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DELETED` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`ID`, `CATEGORY_ID`, `NAME`, `DESCRIPTION`, `STATUS`, `DELETED`) VALUES
(1, 'Cat-3sEC7VMe', '2Demo2', '<p>Write Description Here</p><p>Hii😂</p>', 'ACTIVE', 'TRUE'),
(2, 'Cat-3sECdVk6', 'Demosdsd', '<p>Write Description Here😁</p>', 'ACTIVE', 'TRUE'),
(3, 'Cat-3sECjek0', '🆕🆕[HQ SmartPanel - Exclusive] - [COMMENTS SERVICES] [High Quality - REAL RELEVANT Comments]😍😍♥️♥️ ⭐', '<p>Write Description Here</p>', 'ACTIVE', 'FALSE'),
(4, 'Cat-3sEDHjcq', '⚡️⚡️⚡️ PROMOTION [Cheap Services] 🔥', '<p>Write Description Here</p>', 'ACTIVE', 'FALSE'),
(5, 'Cat-3sEVdYhX', '😊Hello', '<p>Write Description Here</p>', 'ACTIVE', 'FALSE'),
(6, 'Cat-3sEVR7k8', 'Its new😊', '<p>Write Description Here</p>', 'ACTIVE', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `CMS`
--

CREATE TABLE `CMS` (
  `ID` int(15) NOT NULL,
  `SLUG` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FIELD` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CONTENT` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CMS`
--

INSERT INTO `CMS` (`ID`, `SLUG`, `FIELD`, `CONTENT`) VALUES
(1, 'privacy-policy', 'Privacy Policy', '<p><strong>Its a demo Privacy Policy</strong></p><p><strong>Please read it carefully.</strong></p><p><strong>Thank You.&nbsp;</strong></p>'),
(2, 'terms-and-conditions', 'Terms & Conditions', '<p><strong>You need to verify for accessing the portal.</strong></p><p><strong>Thank You.&nbsp;😀</strong></p>'),
(3, 'refund-policy', 'Refund Policy', '<p><strong>Its refund policy</strong></p><ul><li><strong>We accept refund</strong></li><li><strong>we accept refund</strong></li></ul><p>Thank You</p>');

-- --------------------------------------------------------

--
-- Table structure for table `EMAIL_TEMPLATE`
--

CREATE TABLE `EMAIL_TEMPLATE` (
  `ID` int(15) NOT NULL,
  `SLUG` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SUBJECT` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CONTENT` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOPIC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `REPLIES`
--

CREATE TABLE `REPLIES` (
  `ID` int(15) NOT NULL,
  `REPLY_ID` varchar(100) NOT NULL,
  `TICKET_ID` varchar(200) NOT NULL,
  `USER_ID` varchar(200) NOT NULL,
  `USER_ROLE` varchar(200) NOT NULL,
  `TEXT` text NOT NULL,
  `DATE_TIME` varchar(50) NOT NULL,
  `STATUS` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `REPLIES`
--

INSERT INTO `REPLIES` (`ID`, `REPLY_ID`, `TICKET_ID`, `USER_ID`, `USER_ROLE`, `TEXT`, `DATE_TIME`, `STATUS`) VALUES
(1, 'R-3syyLbMy', 'T-3srCjV5p', 'SMSE-A-01', 'ADMIN', 'dfdfdfdfdfd', '2021-02-14 04:50', NULL),
(2, 'R-3syyMUoA', 'T-3srCjV5p', 'SMSE-A-01', 'ADMIN', 'dfgdfgdfgdfgdfg', '2021-02-14 04:52', NULL),
(3, 'R-3syyN3Xe', 'T-3srCjV5p', 'SMSE-A-01', 'ADMIN', 'hello', '2021-02-14 04:52', NULL),
(4, 'R-3syyYDvQ', 'T-3srCjV5p', '3rL9APK9', 'USER', 'hI THERE', '2021-02-14 05:02', NULL),
(5, 'R-3syz2w2Q', 'T-3syz23Bh', '3rL9APK9', 'USER', 'Hi please reply', '2021-02-14 05:05', NULL),
(6, 'R-3sESye0z', 'T-3syz23Bh', 'SMSE-A-01', 'ADMIN', 'Hello\r\nHi', '2021-02-28 10:39', NULL),
(7, 'R-3sET76Ly', 'T-3syz23Bh', 'SMSE-A-01', 'ADMIN', 'Ok we will do that', '2021-02-28 11:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `ID` int(15) NOT NULL,
  `SERVICE_ID` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CATEGORY_ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TYPE_ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MIN_AMOUNT` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAX_AMOUNT` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RATE` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DRIP_FEED` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DELETED` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SERVICE`
--

INSERT INTO `SERVICE` (`ID`, `SERVICE_ID`, `NAME`, `CATEGORY_ID`, `TYPE_ID`, `MIN_AMOUNT`, `MAX_AMOUNT`, `RATE`, `DRIP_FEED`, `STATUS`, `DESCRIPTION`, `DELETED`) VALUES
(2, 'Ser-3sEFAiC-', 'Demo Service Updated😂', 'Cat-3sEDHjcq', 'ST-3sEEJ5Dh', '60', '609', '6', 'DEACTIVE', 'ACTIVE', '<p>Write Description Here</p><p>Hello&nbsp;😅</p>', 'FALSE'),
(3, 'Ser-3sEJyEco', 'Its a Demo Service to test', 'Cat-3sEDHjcq', 'ST-3sEEJ5Dh', '120', '300', '0.87', 'DEACTIVE', 'INACTIVE', '<p>Write Description Here</p>', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `SERVICE_TYPE`
--

CREATE TABLE `SERVICE_TYPE` (
  `ID` int(15) NOT NULL,
  `TYPE_ID` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NAME` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DELETED` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `SERVICE_TYPE`
--

INSERT INTO `SERVICE_TYPE` (`ID`, `TYPE_ID`, `NAME`, `DELETED`) VALUES
(1, 'ST-3sEEEuib', 'Default', 'FALSE'),
(2, 'ST-3sEEENFK', 'Custom Comment', 'FALSE'),
(3, 'ST-3sEEEWmo', 'Comment Like', 'TRUE'),
(4, 'ST-3sEEJ5Dh', 'Comments & Likes', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `TICKETS`
--

CREATE TABLE `TICKETS` (
  `ID` int(15) NOT NULL,
  `USER_ID` varchar(100) DEFAULT NULL,
  `TICKET_ID` varchar(200) DEFAULT NULL,
  `SUBJECT` text DEFAULT NULL,
  `ORDER_ID` text DEFAULT NULL,
  `REQUEST` text DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'Pending',
  `DATE_TIME` varchar(100) DEFAULT NULL,
  `DELETED` varchar(100) NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TICKETS`
--

INSERT INTO `TICKETS` (`ID`, `USER_ID`, `TICKET_ID`, `SUBJECT`, `ORDER_ID`, `REQUEST`, `MESSAGE`, `STATUS`, `DATE_TIME`, `DELETED`) VALUES
(1, '3rL9APK9', 'T-3srCjV5p', 'Order', 'Order 1', 'Cancel', 'Hgelo', 'Pending', NULL, 'FALSE'),
(2, '3rL9APK9', 'T-3srCGucT', 'Payment', 'Order 2', 'Speed Up', 'Fast\r\n', 'Pending', NULL, 'TRUE'),
(3, '3rL9APK9', 'T-3syz23Bh', 'Other', 'Order 2', 'Refill', 'Hello I want help', 'Closed', '2021-02-14 05:04', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `ID` int(15) NOT NULL,
  `USER_ID` varchar(100) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `USER_NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `WEBSITE` varchar(200) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `TELEGRAM_ID` varchar(100) DEFAULT NULL,
  `WHATSAPP` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `PROFILE_PIC` varchar(200) DEFAULT NULL,
  `REG_DATE` date DEFAULT NULL,
  `STATUS` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`ID`, `USER_ID`, `FIRST_NAME`, `LAST_NAME`, `USER_NAME`, `EMAIL`, `WEBSITE`, `PHONE`, `TELEGRAM_ID`, `WHATSAPP`, `ADDRESS`, `PASSWORD`, `PROFILE_PIC`, `REG_DATE`, `STATUS`) VALUES
(5, '3rL8LaA4', 'Gourav', 'Chatterjee', 'gour', 'chatteouravking@gmail.com', NULL, NULL, NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-11-01', 'NOT VERIFIED'),
(6, '3rL9APK9', 'Gourav', 'Chatterjee', 'gourav', 'chatterjeegouravking@gmail.com', 'helloo.com', '8621071620', '7878', '8620993994', 'Kolkata', '96e79218965eb72c92a549dd5a330112', '1611427905web-development.png', '2020-11-01', 'NOT VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `WEBSITE_DETAILS`
--

CREATE TABLE `WEBSITE_DETAILS` (
  `ID` int(15) NOT NULL,
  `TITLE` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `META` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KEYWORDS` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HAPPY_CLIENTS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `COFFE_CUPS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ORDERS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STAFFS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `WEBSITE_DETAILS`
--

INSERT INTO `WEBSITE_DETAILS` (`ID`, `TITLE`, `META`, `KEYWORDS`, `HAPPY_CLIENTS`, `COFFE_CUPS`, `ORDERS`, `STAFFS`, `EMAIL`) VALUES
(1, 'Social My Social+', 'Social My Social', 'Demo Keywords', '10', '11', '10', '10', 'contact@smseplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `WEBSITE_LOGO`
--

CREATE TABLE `WEBSITE_LOGO` (
  `ID` int(15) NOT NULL,
  `MAIN_LOGO` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FAVICON` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `WEBSITE_LOGO`
--

INSERT INTO `WEBSITE_LOGO` (`ID`, `MAIN_LOGO`, `FAVICON`) VALUES
(1, '1615650792logo.png', '1615650792black-logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CMS`
--
ALTER TABLE `CMS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `EMAIL_TEMPLATE`
--
ALTER TABLE `EMAIL_TEMPLATE`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `REPLIES`
--
ALTER TABLE `REPLIES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SERVICE`
--
ALTER TABLE `SERVICE`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SERVICE_TYPE`
--
ALTER TABLE `SERVICE_TYPE`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `TICKETS`
--
ALTER TABLE `TICKETS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `WEBSITE_DETAILS`
--
ALTER TABLE `WEBSITE_DETAILS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `WEBSITE_LOGO`
--
ALTER TABLE `WEBSITE_LOGO`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMIN`
--
ALTER TABLE `ADMIN`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `CMS`
--
ALTER TABLE `CMS`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `EMAIL_TEMPLATE`
--
ALTER TABLE `EMAIL_TEMPLATE`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `REPLIES`
--
ALTER TABLE `REPLIES`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `SERVICE`
--
ALTER TABLE `SERVICE`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `SERVICE_TYPE`
--
ALTER TABLE `SERVICE_TYPE`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `TICKETS`
--
ALTER TABLE `TICKETS`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `WEBSITE_DETAILS`
--
ALTER TABLE `WEBSITE_DETAILS`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `WEBSITE_LOGO`
--
ALTER TABLE `WEBSITE_LOGO`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
