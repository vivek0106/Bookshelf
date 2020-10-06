-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2020 at 05:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `userReviews`
--

CREATE TABLE `userReviews` (
  `reviewID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userReviews`
--

INSERT INTO `userReviews` (`reviewID`, `userId`, `bookId`, `review`, `rating`) VALUES
(1, 30, 11, 'asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd ', 5),
(2, 31, 20, 'fsd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd ', 4),
(3, 30, 11, 'asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd ', 5),
(4, 31, 20, 'fsd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd asdas sdas sdasd sd sdasd asdsd sd sdas asd dass asdasdqw cd d wd sad dqw  dqwd qwd ', 4),
(5, 30, 11, 'asdas', 3),
(6, 30, 11, 'sdscscascas', 5),
(7, 30, 3, 'pride and prejudice is awesome book to read', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userReviews`
--
ALTER TABLE `userReviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `book_foreignkey` (`bookId`),
  ADD KEY `user_foreignkey` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userReviews`
--
ALTER TABLE `userReviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userReviews`
--
ALTER TABLE `userReviews`
  ADD CONSTRAINT `book_foreignkey` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookID`),
  ADD CONSTRAINT `user_foreignkey` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
