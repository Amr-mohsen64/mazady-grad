-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 07:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `parent` int(11) NOT NULL COMMENT 'parent equal 0 is the main categoiries',
  `Ordering` int(11) DEFAULT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0,
  `Allow_Comment` tinyint(4) NOT NULL DEFAULT 0,
  `Allow_Ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Description`, `parent`, `Ordering`, `visibility`, `Allow_Comment`, `Allow_Ads`) VALUES
(11, 'Computers', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente iure maxime fugit placeat quibusdam accusamus quo, rem consequatur nemo aperiam dolor, magni aliquam cumque earum adipisci facere quas, quod necessitatibus?', 0, 2, 0, 0, 0),
(12, 'Cell phone', '', 0, 3, 0, 0, 0),
(13, 'Clothing', 'clothing amd fashio', 0, 4, 0, 0, 0),
(14, 'tools', 'home tools', 0, 0, 0, 0, 0),
(15, 'aar', '', 0, 0, 0, 0, 0),
(20, 'tyms', '', 11, 0, 1, 0, 1),
(23, 'hammer', '', 14, 0, 0, 0, 0),
(25, 'shakoush', '', 14, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `statues` tinyint(4) NOT NULL,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Desciription` text CHARACTER SET utf8 NOT NULL,
  `Price` int(255) NOT NULL,
  `Add_Date` date NOT NULL,
  `Country_Made` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Statues` varchar(255) NOT NULL,
  `Rating` smallint(6) NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Memeber_ID` int(11) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'pendnigng items\r\n',
  `tags` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) CHARACTER SET utf32 NOT NULL COMMENT 'username to login',
  `password` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_nopad_ci NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf16 NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0 COMMENT 'identify user group ',
  `trustStatues` int(11) NOT NULL DEFAULT 0 COMMENT 'seller rank ',
  `regStatues` int(11) NOT NULL DEFAULT 0 COMMENT 'pending aproval',
  `date` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `email`, `firstName`, `lastName`, `groupID`, `trustStatues`, `regStatues`, `date`, `avatar`) VALUES
(1, 'amroo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'amrmohsen72@gmail.com', '', '', 1, 0, 0, '0000-00-00', ''),
(2, 'amrroos', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'amrmohsen64@yahoo.com', 'amr ', 'mohsen', 0, 0, 1, '2020-04-11', '38942836794920663.png'),
(154, 'sabah123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sab@g.com', 'sabah', 'mohsen', 0, 0, 1, '2020-04-11', '23409884826761348.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `items_comment` (`item_id`),
  ADD KEY `member_comment` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `cat_1` (`Cat_ID`),
  ADD KEY `member_1` (`Memeber_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `items_comment` FOREIGN KEY (`item_id`) REFERENCES `items` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`Memeber_ID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
