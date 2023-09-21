-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 01:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verify_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `email_verification` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verification`, `username`, `password`, `date`) VALUES
(1, 'mary green', 'green@gmail.com', 'green@gmail.com', 'mary', '$2y$10$KwX9mCu1dIvXtL3ArRy/.Oz1WbuUOTqjhgFeh4cRon099rhJW71VS', '2023-09-13 23:18:52'),
(2, 'donald duck', 'duck@gmail.com', 'duck@gmail.com', 'donald21', '$2y$10$TNOFoMI.V7ikqS7yk53/MOk8LgWqJ/vqeFYQSvqjSq45nkknJiAjW', '2023-09-14 01:26:53'),
(3, 'homer simpson', 'simpson45@gmail.com', NULL, 'homer45', '$2y$10$VKMj7ub53tJSTa/WntoC8.CBADznHWSOPdVnOry.xQRUeZ9Tt2B9K', '2023-09-14 01:30:16'),
(4, 'tweety bird', 'bird@gmail.com', NULL, 'tweety', '$2y$10$Rf2ZgxhBRKMfgg7rkvz0JurH7/IaxFgJicdvJIhwCs18eTAJESPAi', '2023-09-14 01:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `admin_verification`
--

CREATE TABLE `admin_verification` (
  `id` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `expired` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_verification`
--

INSERT INTO `admin_verification` (`id`, `code`, `expired`, `email`) VALUES
(1, 27648, 1694640265, 'green@gmail.com'),
(2, 74537, 1694647954, 'duck@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `email_verification` varchar(200) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verification`, `username`, `password`, `date`) VALUES
(1, 'little prince', 'lprince@gmail.com', 'lprince@gmail.com', 'lprince', '$2y$10$SjAyHCQdMhJ9MIwCCD/OzusTm0.dxaKJW4Iap38CCG/6q/4cbLhne', '2023-09-11 20:38:01'),
(2, 'harry potter', 'potter@gmail.com', NULL, 'hpotter', '$2y$10$ETYJiMo/KQXcNt7mR8eTluhKyM7hC6wDwVHmB428k8osWbU34DZVS', '2023-09-11 20:44:04'),
(3, 'robin hood', 'rhood@gmail.com', 'rhood@gmail.com', 'rhood', '$2y$10$4PD4D3ra.fn6nIIPD/Sp4u1d7k0Bnq9feZSq4pYHc1U38qNFnTNfe', '2023-09-12 03:24:50'),
(11, 'oliver twist', 'oliver@gmail.com', 'oliver@gmail.com', 'oliver', '$2y$10$SpXRowbNGugktUvNxwzCRu1AN5kpKSw49zNwA0E9q3Gn64XX2y1lm', '2023-09-13 21:16:14'),
(12, 'sponge bob', 'bob@gmail.com', NULL, 'bob', '$2y$10$f8G1NEdZgHox9TmEXwHzaeBG7jj8AnY4nxfE.f/ljkPDn3P3Dh/iq', '2023-09-13 21:51:24'),
(13, 'jack sparrow', 'sparrow@gmail.com', 'sparrow@gmail.com', 'jack', '$2y$10$td7IpfsqCFkMZwTJelJ08e0u0w00V/rudgD1QaIGgyYzhjbDDwmSy', '2023-09-13 22:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `expired` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `code`, `expired`, `email`) VALUES
(1, 11366, 1694563733, 'lprince@gmail.com'),
(2, 60727, 1694564135, 'lprince@gmail.com'),
(3, 75683, 1694564204, 'lprince@gmail.com'),
(4, 58284, 1694566031, 'lprince@gmail.com'),
(5, 94193, 1694567079, 'rhood@gmail.com'),
(6, 11044, 1694575265, 'edwigebk03@gmail.com'),
(7, 61229, 1694575275, 'edwigebk03@gmail.com'),
(8, 64825, 1694575279, 'edwigebk03@gmail.com'),
(9, 52167, 1694575280, 'edwigebk03@gmail.com'),
(10, 73198, 1694575282, 'edwigebk03@gmail.com'),
(11, 37681, 1694575283, 'edwigebk03@gmail.com'),
(12, 22181, 1694575284, 'edwigebk03@gmail.com'),
(13, 43633, 1694575287, 'edwigebk03@gmail.com'),
(14, 49166, 1694575288, 'edwigebk03@gmail.com'),
(15, 32554, 1694575290, 'edwigebk03@gmail.com'),
(16, 78449, 1694575292, 'edwigebk03@gmail.com'),
(17, 61839, 1694575295, 'edwigebk03@gmail.com'),
(18, 99245, 1694575300, 'edwigebk03@gmail.com'),
(19, 92937, 1694575301, 'edwigebk03@gmail.com'),
(20, 76677, 1694575303, 'edwigebk03@gmail.com'),
(21, 38979, 1694575304, 'edwigebk03@gmail.com'),
(22, 74969, 1694575305, 'edwigebk03@gmail.com'),
(23, 98539, 1694575307, 'edwigebk03@gmail.com'),
(24, 19324, 1694575308, 'edwigebk03@gmail.com'),
(26, 26565, 1694575312, 'edwigebk03@gmail.com'),
(27, 17265, 1694575314, 'edwigebk03@gmail.com'),
(28, 26337, 1694575315, 'edwigebk03@gmail.com'),
(29, 81562, 1694575317, 'edwigebk03@gmail.com'),
(30, 30719, 1694575319, 'edwigebk03@gmail.com'),
(31, 73766, 1694575503, 'edwigebk03@gmail.com'),
(32, 40006, 1694627164, 'edwigebk03@gmail.com'),
(33, 72632, 1694630756, 'edwigebk03@gmail.com'),
(34, 25422, 1694633371, 'oliver@gmail.com'),
(35, 72617, 1694633552, 'oliver@gmail.com'),
(36, 36544, 1694633579, 'oliver@gmail.com'),
(37, 41704, 1694633906, 'oliver@gmail.com'),
(38, 85658, 1694634342, 'oliver@gmail.com'),
(39, 24649, 1694634359, 'oliver@gmail.com'),
(40, 31578, 1694636428, 'sparrow@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `admin_verification`
--
ALTER TABLE `admin_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expired` (`expired`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expired` (`expired`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_verification`
--
ALTER TABLE `admin_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;