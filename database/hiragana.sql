-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 05:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `hiragana`
--

CREATE TABLE `hiragana` (
  `userId` int(8) NOT NULL,
  `username` varchar(16) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin NOT NULL,
  `quiz_v` int(3) NOT NULL,
  `quiz_k` int(3) NOT NULL,
  `quiz_s` int(3) NOT NULL,
  `quiz_t` int(3) NOT NULL,
  `quiz_n` int(3) NOT NULL,
  `quiz_h` int(3) NOT NULL,
  `quiz_m` int(3) NOT NULL,
  `quiz_r` int(3) NOT NULL,
  `quiz_yw` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hiragana`
--

INSERT INTO `hiragana` (`userId`, `username`, `password`, `quiz_v`, `quiz_k`, `quiz_s`, `quiz_t`, `quiz_n`, `quiz_h`, `quiz_m`, `quiz_r`, `quiz_yw`) VALUES
(36, 'u180257', 'Ashefield112', 1, 0, 1, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hiragana`
--
ALTER TABLE `hiragana`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hiragana`
--
ALTER TABLE `hiragana`
  MODIFY `userId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
