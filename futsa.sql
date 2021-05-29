-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 03:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `futsal_id` int(11) NOT NULL,
  `booker_id` int(11) NOT NULL,
  `book_time_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_time`
--

CREATE TABLE `book_time` (
  `book_time_id` int(10) NOT NULL,
  `book_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_time`
--

INSERT INTO `book_time` (`book_time_id`, `book_time`) VALUES
(1, '06:00-07:00 AM'),
(2, '07:00-08:00 AM'),
(3, '08:00-09:00 AM'),
(4, '09:00-10:00 AM'),
(5, '10:00-11:00 AM'),
(6, '11:00-12:00 AM'),
(9, '12:00-01:00 PM'),
(10, '01:00-02:00 PM'),
(11, '02:00-03:00 PM'),
(12, '03:00-04:00 PM'),
(13, '04:00-05:00 PM'),
(14, '05:00-06:00 PM'),
(15, '06:00-07:00 PM'),
(16, '07:00-08:00 PM'),
(17, '08:00-09:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `futsal`
--

CREATE TABLE `futsal` (
  `futsal_id` int(10) NOT NULL,
  `futsal_name` varchar(100) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `futsal`
--

INSERT INTO `futsal` (`futsal_id`, `futsal_name`, `owner`, `address`, `phone_no`, `images`) VALUES
(1, 'Oh yeah Futsal', 'Joerush', 'Santinagr Chowk Pokhara', '123456', 'https://img.fifa.com/image/upload/t_l1/rihhx0hpcbhhxjowkemc.jpg'),
(2, 'ABC futsal Corner', 'ABC', 'Nadipur', '984664515369', 'https://the-anfa.com/storage/images/news/futsal-news_1611562395.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `role` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `address`, `phone_no`, `role`) VALUES
(1, 'Joerush', 'joerush@newfutsal.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Santinagr Chowk Pokhara', '123456', 'owner'),
(2, 'ABC', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nadipur', '984664515369', 'owner'),
(3, 'Bot', 'bot@test.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Santinagr Chowk Pokhara', '123456', 'user'),
(5, 'Tester', 'test@futsa.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Syangja', '9846168323', 'user'),
(6, 'Bot joey', 'bot@futsal.com', '202cb962ac59075b964b07152d234b70', 'Santinagr Chowk Pokhara', '984661234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `futsal_id` (`futsal_id`),
  ADD KEY `booker_id` (`booker_id`),
  ADD KEY `book_time_id` (`book_time_id`);

--
-- Indexes for table `book_time`
--
ALTER TABLE `book_time`
  ADD PRIMARY KEY (`book_time_id`);

--
-- Indexes for table `futsal`
--
ALTER TABLE `futsal`
  ADD PRIMARY KEY (`futsal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_time`
--
ALTER TABLE `book_time`
  MODIFY `book_time_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `futsal`
--
ALTER TABLE `futsal`
  MODIFY `futsal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`futsal_id`) REFERENCES `futsal` (`futsal_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`booker_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`book_time_id`) REFERENCES `book_time` (`book_time_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
