-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 07:04 AM
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
-- Database: `reclaiming_tomorrow_db`
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
  `role` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verification`, `username`, `password`, `role`, `date`) VALUES
(1, 'mary green', 'green@gmail.com', 'green@gmail.com', 'mary', '$2y$10$KwX9mCu1dIvXtL3ArRy/.Oz1WbuUOTqjhgFeh4cRon099rhJW71VS', 'admin', '2023-09-13 23:18:52'),
(2, 'donald duck', 'duck@gmail.com', 'duck@gmail.com', 'donald21', '$2y$10$TNOFoMI.V7ikqS7yk53/MOk8LgWqJ/vqeFYQSvqjSq45nkknJiAjW', 'admin', '2023-09-14 01:26:53'),
(3, 'homer simpson', 'simpson45@gmail.com', NULL, 'homer45', '$2y$10$VKMj7ub53tJSTa/WntoC8.CBADznHWSOPdVnOry.xQRUeZ9Tt2B9K', 'admin', '2023-09-14 01:30:16'),
(4, 'tweety bird', 'bird@gmail.com', NULL, 'tweety', '$2y$10$Rf2ZgxhBRKMfgg7rkvz0JurH7/IaxFgJicdvJIhwCs18eTAJESPAi', 'admin', '2023-09-14 01:32:23'),
(5, 'mike blue', 'mike@gmail.com', NULL, 'mike', '$2y$10$GQBkIf.WSV5jxAzlgw1Iyuw//T3q7wINoUBRjvD8YE0VlO9rPN.le', 'admin', '2023-10-05 02:56:12');

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
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `img_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `name`, `price`, `img_link`) VALUES
(1, 'Restaurant Coupon', 200, 'https://cdn.pixabay.com/photo/2015/11/19/10/38/food-1050813_1280.jpg'),
(2, 'Recycling T-Shirt', 50, 'https://cdn.pixabay.com/photo/2017/01/13/04/28/blank-1976317_1280.png'),
(3, 'Tree Poster', 100, 'https://www.publicdomainpictures.net/pictures/370000/velka/mond-baum-kunst-vintage.jpg'),
(4, 'Charity Donation', 75, 'https://www.publicdomainpictures.net/pictures/260000/velka/love-handout-outreach-watercolor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` varchar(10) NOT NULL,
  `point_value` int(255) NOT NULL DEFAULT 0,
  `organization` varchar(50) DEFAULT NULL,
  `redeeming_user` varchar(50) DEFAULT NULL,
  `date_redeemed` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `point_value`, `organization`, `redeeming_user`, `date_redeemed`, `date_created`) VALUES
('00820', 30, 'Community Center 1', NULL, NULL, '2023-09-28 17:34:25'),
('01764', 80, 'ABC Recycling', NULL, NULL, '2023-09-28 17:34:25'),
('41642', 65, 'Community Center 1', NULL, NULL, '2023-09-28 17:34:25'),
('67122', 100, 'ABC Recycling', NULL, NULL, '2023-09-28 17:34:25');

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
  `reward_points` int(255) NOT NULL DEFAULT 0,
  `is_logged_in` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verification`, `username`, `password`, `reward_points`, `is_logged_in`, `role`, `date`) VALUES
(1, 'little prince', 'lprince@gmail.com', 'lprince@gmail.com', 'lprince', '$2y$10$SjAyHCQdMhJ9MIwCCD/OzusTm0.dxaKJW4Iap38CCG/6q/4cbLhne', 0, 1, 'user', '2023-09-11 20:38:01'),
(2, 'harry potter', 'potter@gmail.com', NULL, 'hpotter', '$2y$10$ETYJiMo/KQXcNt7mR8eTluhKyM7hC6wDwVHmB428k8osWbU34DZVS', 0, 0, 'user', '2023-09-11 20:44:04'),
(3, 'robin hood', 'rhood@gmail.com', 'rhood@gmail.com', 'rhood', '$2y$10$4PD4D3ra.fn6nIIPD/Sp4u1d7k0Bnq9feZSq4pYHc1U38qNFnTNfe', 0, 0, 'user', '2023-09-12 03:24:50'),
(11, 'oliver twist', 'oliver@gmail.com', 'oliver@gmail.com', 'oliver', '$2y$10$SpXRowbNGugktUvNxwzCRu1AN5kpKSw49zNwA0E9q3Gn64XX2y1lm', 0, 1, 'user', '2023-09-13 21:16:14'),
(12, 'sponge bob', 'bob@gmail.com', 'bob@gmail.com', 'bob', '$2y$10$f8G1NEdZgHox9TmEXwHzaeBG7jj8AnY4nxfE.f/ljkPDn3P3Dh/iq', 0, 1, 'user', '2023-09-13 21:51:24'),
(13, 'jack sparrow', 'sparrow@gmail.com', 'sparrow@gmail.com', 'jack', '$2y$10$td7IpfsqCFkMZwTJelJ08e0u0w00V/rudgD1QaIGgyYzhjbDDwmSy', 0, 0, 'user', '2023-09-13 22:13:14'),
(14, 'test', 'test@test.test', 'test@test.test', 'test', '$2y$10$CulmdOK/R83f/Bwv8eRc1O902g2aAYpLmsixPonn6Xt2cvqBQG0Rq', 0, 0, 'user', '2023-09-11 20:38:01'),
(15, 'timmy', 'timmy@gmail.com', 'timmy@gmail.com', 'timmy', '$2y$10$a.fkywhFPwyxCMJXrvzG1unF1A5NwUWF5pRAmfNJbwi/IFHv28hfW', 0, 1, 'user', '2023-10-05 02:40:41');

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
(40, 31578, 1694636428, 'sparrow@gmail.com'),
(41, 88755, 1695937505, 'bob@gmail.com'),
(42, 27620, 1696471243, 'timmy@gmail.com');

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
  ADD KEY `username` (`username`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `admin_verification`
--
ALTER TABLE `admin_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expired` (`expired`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`),
  ADD KEY `role` (`role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_verification`
--
ALTER TABLE `admin_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
-- Table structure for table `county_search`
--

CREATE TABLE `county_search` (
  `County` varchar(150) NOT NULL,
  `Local event` varchar(150) NOT NULL,
  `Pick-up Schedule` varchar(150) NOT NULL,
  `Associated Links` varchar(600) NOT NULL,
  `Alternatives` varchar(600) NOT NULL,
  `Buy Bins` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `county_search`
--

INSERT INTO `county_search` (`County`, `Local event`, `Pick-up Schedule`, `Associated Links`, `Alternatives`, `Buy Bins`) VALUES
('Gilford County', 'Pleasant Garden Recycles: March 16, 2024', 'Every Other Tuesday', 'https://www.guilfordcountync.gov/our-county/planning-development/environmental-services/household-recycling', 'https://www.greensboro-nc.gov/departments/field-operations/recycle/gso-collects', 'https://www.homedepot.com/p/Rubbermaid-Roughneck-45-Gal-Vented-Blue-Wheeled-Recycling-Trash-Container-2149498/316790901?source=shoppingads&locale=en-US&pla&mtc=SHOPPING-BF-AIB-GGL-Multi-Multi-NA-NA-NA-PLALIA-NA-IIM-NA-NA-NBR-NA-NA-NEW-PRIO_CLASS&cm_m'),
('Scotland County', 'Highway clean-up: November 30, 2023', 'Recycling picked up every other Monday morning.', 'https://www.scotlandcounty.org/422/What-Can-Be-Recycled', 'https://get-green-now.com/reuse-styrofoam/', 'https://www.staples.com/rubbermaid-stacking-recycle-bin-rectangular-polyethylene-18-gallon-blue/product_815627?cid=PS:GS:SBD:PLA:CB&gclid=Cj0KCQjwhL6pBhDjARIsAGx8D5_3e-Ho6W4C9895JTpkIHtGNhCuKQ2Fx91JxcptPfpRovdGWpOLkXQaApFNEALw_wcB'),
('Cumberland County', 'E-Waste Free Recycling : November 14, 2023', 'Every other Friday', 'https://www.cumberlandcountync.gov/departments/solid-waste-group/solid-waste-management/recycling', 'https://www.cumberlandcountync.gov/departments/solid-waste-group/solid-waste-management/recycling/electronic-recycling', 'https://www.fayettevillenc.gov/city-services/public-services/solid-waste/roll-out-carts'),
('Robeson County', 'Clean & Green Meeting: February 23, 2024 ', 'Every other Wednesday', 'https://www.robesoncountysw.org/index.php/environmental-control-1', 'https://www.robesoncountysw.org/pdf/Trifold_pest.pdf', 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjs9r3uqIGCAxUO9-MHHfjqDZ8YABBPGgJ5bQ&gclid=Cj0KCQjwhL6pBhDjARIsAGx8D5-oINUSISaj0XiRH1zq-mwcOAwG3kiU5NUAA-hElqWBfLDTtjBZuKsaAn6FEALw_wcB&ohost=www.google.com&cid=CAESVuD2XUNw_QjiJDq870BK9Bup6'),
('Wake County', 'Public Landfill Tour: December 9, 2023', 'Every other Thursday', 'https://www.wake.gov/departments-government/waste-recycling/recycling-101/what-you-can-recycle', 'https://raleighnc.gov/trash-recycling-and-clean/services/where-take-items-city-cant-pick', 'https://raleighnc.gov/trash-recycling-and-clean/services/order-garbage-or-recycling-cart#paragraph--216076');
COMMIT;

--

DROP TABLE IF EXISTS admin_inbox;
CREATE TABLE admin_inbox (
  id int(20) NOT NULL AUTO_INCREMENT,
  from_id int(20) NOT NULL,
  from_name varchar(255) NOT NULL,
  to_id varchar(255) NOT NULL,
  message varchar(255) NOT NULL,
  title varchar(100) NOT NULL,
  date_sent datetime NOT NULL DEFAULT current_timestamp(),
  read_receipt int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

DROP TABLE IF EXISTS user_inbox;
CREATE TABLE user_inbox (
  id int(20) NOT NULL AUTO_INCREMENT,
  from_id int(20) NOT NULL,
  from_name varchar(255) NOT NULL,
  to_id varchar(255) NOT NULL,
  message varchar(255) NOT NULL,
  title varchar(100) NOT NULL,
  date_sent datetime NOT NULL DEFAULT current_timestamp(),
  read_receipt int(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
