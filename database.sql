-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2026 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'dinundu', 'dinu@gmail.com', 'test 1', '2026-08-06 17:25:31'),
(2, 'yovindu', 'yovi@gmail.com', 'test2', '2026-08-06 17:26:13'),
(3, 'vihanga', 'vi@gmail.com', 'test3', '2026-08-06 17:29:35'),
(4, 'vihanga', 'vi@gmail.com', 'test3', '2026-08-06 17:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(15, 'TestUser', 'test@gmail.com', '$2y$10$v9aEErzoiHjQ1mrzD/pD6Os2YSOQH5ZHeNkFWNkk.epH7AyntSriK', '2026-08-06 15:59:47'),
(27, 'Yovi', 'Yovi12@gmail.com', '$2y$10$/YDZEPZwQO5ic5Sw7iQk4.gCp7/ixMNwDNOcSfokRCuvUs0LPH17q', '2026-08-05 16:28:02'),
(28, 'dinu', 'dinu@gmail.com', '$2y$10$O1.fQrz717I/gLRPRmu9xudL8otCAnYNxUPtuajVp/I3SBYTW.dVC', '2026-08-06 08:51:30'),
(29, 'dinu', 'dinu@gmail.com', '$2y$10$nIfooBaHT56dqTxmB6.yVua1J98JHGqosI88u5OzART8CbybVZjMS', '2026-08-06 08:53:53'),
(30, 'para', 'viha@gimail.com', '$2y$10$xmcemcQ2ZqTR.fHNPRL1duHDDOrB.DoG4g4hZCdV2/X3g2vJDFl5a', '2026-08-06 08:58:36'),
(31, 'tharu', 'taru@gmail.com', '$2y$10$9RZB0uhcFjvGM4gaBExiYOX44MyRdY.wq1LF3EI.hfBVfFCsyNSQi', '2026-08-06 09:05:24'),
(32, 'hhfhf', 'fffff@gmail.com', '$2y$10$2ac1jonAgPHHgUZQqDE7k.3asplk6s4W2LH4R/XHLQ18mSMbOVM1i', '2026-08-06 09:12:18'),
(33, 'testuser', 'test2@gmail.com', '$2y$10$UjEHBGGljVm2BdlvShPe3OzadUa1uOxvHxqul4MUX3C5Zoh9X1/mK', '2026-08-06 09:14:40'),
(34, 'newuser', 'newuser@gmail.com', '$2y$10$eLFUYneZyIM4FYLYky9Ax.LqB43XmnOhpui2Aygs51gedoo5snCXa', '2026-08-06 09:27:02'),
(35, 'yovie', 'yovindu@gmail.com', '$2y$10$F3hnQkRx5p5h2YD.LdjaiOn1CsEi89V7MleHb5dSDE.nIeyCcoZu2', '2026-08-06 09:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
