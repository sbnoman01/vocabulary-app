-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 09:26 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vocabulary-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Noman', 'sb@gmail.com', '15984', 1),
(3, 'Noman', 'sdb@gmail.com', '15984', 1),
(4, 'wymugek', 'vavocyw@mailinator.com', '$2y$10$pV0BWRvNQuDXmYLe/BbrVudKliSh8PS7ridLbmkRdetasBiJejLju', 1),
(5, 'cedal', 'ciqomakatu@mailinator.com', '$2y$10$wfmmxQN2c03sAWq/Oh6vxuS/PdrFwo1oU4sfSKb2KVv0W/cJbkE.2', 1),
(7, 'mumyqimoju', 'hixuwarivu@mailinator.com', '$2y$10$gjswdgxcckhfKTRoZku07efbd6/5XQsYAV66NqLwIByP0C/YCDlCe', 1),
(8, 'papotun', 'vaxyr@mailinator.com', '$2y$10$vrdfgsn4mLTe9uGn5LEUHOATas4t6Y98XM.uvWxBELhKmjFdOPwWS', 1),
(9, 'Abdullah', 'vyta@mailinator.com', '$2y$10$ZhTwRsZnr5bvGdzG/6yb9et6RasSy2WsKcoSkQ5fMao2tiHI11Kmq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `word` varchar(150) NOT NULL,
  `meaning` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `user_id`, `word`, `meaning`) VALUES
(1, 8, 'Morning', 'Sokal'),
(2, 9, 'Food', 'Khabar'),
(3, 9, 'Car', 'gari'),
(4, 9, 'Tree', 'Gach pala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_words` (`user_id`,`word`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
