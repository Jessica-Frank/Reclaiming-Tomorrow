-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 04:11 PM
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
-- table drops if they exist(this is just to get rid of errors in sql) 
--

DROP TABLE IF EXISTS admin;

DROP TABLE IF EXISTS `admin_inbox`;

DROP TABLE IF EXISTS `county_search`;

DROP TABLE IF EXISTS `rewards`;

DROP TABLE IF EXISTS `recycling_center`;

DROP TABLE IF EXISTS `tickets`;

DROP TABLE IF EXISTS `users`;

DROP TABLE IF EXISTS `user_inbox`;

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
-- Table structure for table `admin_inbox`
--

CREATE TABLE `admin_inbox` (
  `id` int(20) NOT NULL,
  `from_id` int(20) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `read_receipt` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `county_search`
--

CREATE TABLE `county_search` (
  `County` varchar(150) NOT NULL,
  `Accepted Materials` varchar(150) NOT NULL,
  `Local event` varchar(150) NOT NULL,
  `Pick-up Schedule` varchar(150) NOT NULL,
  `Associated Links` varchar(600) NOT NULL,
  `Alternatives` varchar(600) NOT NULL,
  `Buy Bins` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `county_search`
--

INSERT INTO `county_search` (`County`, `Accepted Materials`, `Local event`, `Pick-up Schedule`, `Associated Links`, `Alternatives`, `Buy Bins`) VALUES
('Guilford County', 'Paper, Glass, plastic bottles, aluminum cans, tin cans, cardboard', 'Pleasant Garden Recycles: March 16, 2024', 'Every Other Tuesday', 'https://www.guilfordcountync.gov/our-county/planning-development/environmental-services/household-recycling', 'https://www.greensboro-nc.gov/departments/field-operations/recycle/gso-collects', 'https://www.homedepot.com/p/Rubbermaid-Roughneck-45-Gal-Vented-Blue-Wheeled-Recycling-Trash-Container-2149498/316790901?source=shoppingads&locale=en-US&pla&mtc=SHOPPING-BF-AIB-GGL-Multi-Multi-NA-NA-NA-PLALIA-NA-IIM-NA-NA-NBR-NA-NA-NEW-PRIO_CLASS&cm_m'),
('Scotland County', 'Aluminum & Steel cans, cardboard, glass', 'Highway clean-up: November 30, 2023', 'Recycling picked up every other Monday ', 'https://www.scotlandcounty.org/422/What-Can-Be-Recycled', 'https://get-green-now.com/reuse-styrofoam/', 'https://www.staples.com/rubbermaid-stacking-recycle-bin-rectangular-polyethylene-18-gallon-blue/product_815627?cid=PS:GS:SBD:PLA:CB&gclid=Cj0KCQjwhL6pBhDjARIsAGx8D5_3e-Ho6W4C9895JTpkIHtGNhCuKQ2Fx91JxcptPfpRovdGWpOLkXQaApFNEALw_wcB'),
('Cumberland County', 'Paper, Cardboard, Bottles, Aluminum & Tin cans', 'E-Waste Free Recycling : November 14, 2023', 'Every other Friday', 'https://www.cumberlandcountync.gov/departments/solid-waste-group/solid-waste-management/recycling', 'https://www.cumberlandcountync.gov/departments/solid-waste-group/solid-waste-management/recycling/electronic-recycling\'', 'https://www.fayettevillenc.gov/city-services/public-services/solid-waste/roll-out-carts'),
('Robeson County', 'Cardboard, Paper, Plastic Bottles', 'Clean & Green Meeting: February 23, 2024', 'Every other Wednesday', 'https://www.robesoncountysw.org/index.php/environmental-control-1', 'https://www.robesoncountysw.org/pdf/Trifold_pest.pdf', 'https://www.googleadservices.com/pagead/aclk?sa=L&ai=DChcSEwjs9r3uqIGCAxUO9-MHHfjqDZ8YABBPGgJ5bQ&gclid=Cj0KCQjwhL6pBhDjARIsAGx8D5-oINUSISaj0XiRH1zq-mwcOAwG3kiU5NUAA-hElqWBfLDTtjBZuKsaAn6FEALw_wcB&ohost=www.google.com&cid=CAESVuD2XUNw_QjiJDq870BK9Bup6'),
('Wake County', 'Cardboard, Cooking oil, Plastic bottles, Aluminum cans', 'Public Landfill Tour: December 9, 2023', 'Every other Thursday', 'https://www.wake.gov/departments-government/waste-recycling/recycling-101/what-you-can-recycle', 'https://raleighnc.gov/trash-recycling-and-clean/services/where-take-items-city-cant-pick', 'https://raleighnc.gov/trash-recycling-and-clean/services/order-garbage-or-recycling-cart#paragraph--216076');

-- --------------------------------------------------------

--
-- Table structure for table `recycling_center`
--

CREATE TABLE `recycling_center` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `material_recycled` varchar(200) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recycling_center`
--

INSERT INTO `recycling_center` (`id`, `name`, `address`, `material_recycled`, `latitude`, `longitude`) VALUES
(1, 'Aluminum Recycling', '2412 S Elm-Eugene St. Greensboro, NC 27406', 'Aluminum, Plastic, Paper', 36.04388000, -79.79174000),
(2, 'ReCommunity Greensboro', '706 Patton Ave, Greensboro, NC 27406', 'Plastic, Metal, Aluminum', 36.04194000, -79.77545000),
(3, 'Greensboro Recycling', '2300 W Meadowview Rd #207 Greensboro, NC 27407', 'Aluminum, Electronics, Metal, Plastic', 36.05143000, -79.84160000),
(4, 'J & M Recycling', '2307 W Cone Blvd #180, Greensboro, NC 27408', 'Aluminum', 36.11063000, -79.82725000),
(5, 'Gate City Recycling', '610 Industrial Ave, Greensboro, NC 27406', 'Aluminum', 36.02768000, -79.77424000),
(6, 'A & A Recycling', '3934 Hahns Ln, Greensboro, NC 27401', 'Aluminum', 36.07986000, -79.74060000),
(7, 'Cardinals Metals LLC', '5149 Randleman Rd, Greensboro, NC 27406', 'Aluminum', 36.93220000, -79.81101000),
(8, 'Salvage America', '3001 Holts Chapel Rd, Greensboro, NC 27401', 'Aluminum', 36.07792000, -79.75260000),
(9, 'Boom Recycling', '717 Green Valley Rd Suite 200, Greensboro, NC 27408', 'Aluminum', 36.09513000, -79.82247000),
(10, 'ARC', '2091 Bishop Rd, Greensboro, NC 27406', 'Aluminum', 36.99517000, -79.84645000),
(11, 'Securis', '1108 N. O.Henry Blvd, Greensboro, NC 27405', 'Aluminum', 36.08940000, -79.76568000),
(12, 'Piedmont Paper Stock Co', '3909 Riverdale Rd, Greensboro, NC 27406', 'Aluminum', 36.01555000, -79.77916000),
(13, 'D.H. Griffin Wrecking Co., Inc. - Scrap Yard', '4700 Hilltop Rd, Greensboro, NC 27406', 'Aluminum', 36.03919000, -79.88258000),
(14, 'Forsyth County Recycling Center', 'Pfafftown, NC 27040', 'Aluminum', 36.17918000, -80.40765000),
(15, 'Recycling Station', '325 W Hanes Mill Rd, Winston-Salem, NC 27105', 'Aluminum', 36.19798000, -80.28614000),
(16, 'The 3RC EnviroStation', '1401 S Martin Luther King Jr Dr, Winston-Salem, NC 27107', 'Aluminum', 36.09091000, -80.22327000),
(17, 'WM - Winston-Salem Recycle Center', '280 Business Park Dr, Winston-Salem, NC 27107', 'Aluminum', 36.04984000, -80.15667000),
(18, 'Sonoco Recycling', '4175 N Glenn Ave, Winston-Salem, NC 27105', 'Aluminum', 36.15470000, -80.23083000),
(19, 'Recycle America of The Piedmont', '1330 Ivy Ave, Winston-Salem, NC 27105', 'Aluminum', 36.12253000, -80.23975000),
(20, 'Reflective Recycling Inc', '3380 Old Lexington Rd #2, Winston-Salem, NC 27107', 'Aluminum', 36.06372000, -80.22396000),
(21, 'leisure time recycling', '1801 Ivy Ave, Winston-Salem, NC 27105', 'Aluminum', 36.13141000, -80.23701000),
(22, 'Hanes Mill Road Solid Waste Facility', '325 W Hanes Mill Rd, Winston-Salem, NC 27105', 'Plastic', 36.19635000, -80.28037000),
(23, 'Abbey Green (DBA A-1 Service Group)', '5030 Overdale Rd, Winston-Salem, NC 27107', 'Copper', 36.04818000, -80.23220000),
(24, 'OmniSource Corporation', '1426 W Mountain St, Kernersville, NC 27284', 'Metal', 36.13971000, -80.10225000),
(25, 'Industrial Electronic Recycling', '1381 S Park Dr Q, Kernersville, NC 27284', 'Electronics', 36.10989000, -80.06505000),
(26, 'Kernersville Town Recycling', '720 Mckaughan St, Kernersville, NC 27284', 'Metal', 36.11444000, -80.06988000),
(27, 'Feest-Ferry', '652 Gralin St, Kernersville, NC 27284', 'Plastic', 36.12082000, -80.06026000),
(28, 'Piney Hill Acres', '2020 Piney Grv Rd, Kernersville, NC 27284', 'Plastic', 36.17710000, -80.06146000),
(29, 'Rural Garbage Services', '2838, 302 E Bodenhamer St Suite B, Kernersville, NC 27284', 'Metal', 36.12276000, -80.06850000),
(30, 'ecoATM', '1130 S Main St, Kernersville, NC 27284', 'Electronics', 36.11379000, -80.10047000);

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
('2', 4, 'jack sparrow', NULL, NULL, '2023-10-19 14:08:57'),
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
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires` datetime DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verification`, `username`, `password`, `reward_points`, `is_logged_in`, `role`, `reset_token_hash`, `reset_token_expires`, `date`) VALUES
(1, 'little prince', 'lprince@gmail.com', 'lprince@gmail.com', 'lprince', '$2y$10$SjAyHCQdMhJ9MIwCCD/OzusTm0.dxaKJW4Iap38CCG/6q/4cbLhne', 0, 1, 'user', NULL, NULL, '2023-09-11 20:38:01'),
(2, 'harry potter', 'potter@gmail.com', NULL, 'hpotter', '$2y$10$ETYJiMo/KQXcNt7mR8eTluhKyM7hC6wDwVHmB428k8osWbU34DZVS', 0, 0, 'user', NULL, NULL, '2023-09-11 20:44:04'),
(3, 'robin hood', 'rhood@gmail.com', 'rhood@gmail.com', 'rhood', '$2y$10$4PD4D3ra.fn6nIIPD/Sp4u1d7k0Bnq9feZSq4pYHc1U38qNFnTNfe', 0, 0, 'user', NULL, NULL, '2023-09-12 03:24:50'),
(11, 'oliver twist', 'oliver@gmail.com', 'oliver@gmail.com', 'oliver', '$2y$10$SpXRowbNGugktUvNxwzCRu1AN5kpKSw49zNwA0E9q3Gn64XX2y1lm', 0, 1, 'user', NULL, NULL, '2023-09-13 21:16:14'),
(12, 'sponge bob', 'bob@gmail.com', 'bob@gmail.com', 'bob', '$2y$10$f8G1NEdZgHox9TmEXwHzaeBG7jj8AnY4nxfE.f/ljkPDn3P3Dh/iq', 0, 1, 'user', NULL, NULL, '2023-09-13 21:51:24'),
(13, 'jack sparrow', '3103sparrow@gmail.com', '3103sparrow@gmail.com', 'jack', '$2y$10$RkQK8AddE3uyf74ACwKd.u0exZA2DTLUmjJsqTmt/CAGeAj/Rd/Sm', 0, 1, 'user', NULL, NULL, '2023-09-13 22:13:14'),
(14, 'test', 'test@test.test', 'test@test.test', 'test', '$2y$10$CulmdOK/R83f/Bwv8eRc1O902g2aAYpLmsixPonn6Xt2cvqBQG0Rq', 0, 0, 'user', NULL, NULL, '2023-09-11 20:38:01'),
(15, 'timmy', 'timmy@gmail.com', 'timmy@gmail.com', 'timmy', '$2y$10$a.fkywhFPwyxCMJXrvzG1unF1A5NwUWF5pRAmfNJbwi/IFHv28hfW', 0, 1, 'user', NULL, NULL, '2023-10-05 02:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_inbox`
--

CREATE TABLE `user_inbox` (
  `id` int(20) NOT NULL,
  `from_id` int(20) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `read_receipt` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_inbox`
--

INSERT INTO `user_inbox` (`id`, `from_id`, `from_name`, `to_id`, `message`, `title`, `date_sent`, `read_receipt`) VALUES
(1, 13, 'jack sparrow', 'admin', 'ybbbt', 'yyy', '2023-10-19 10:07:16', 0);

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
-- Indexes for table `admin_inbox`
--
ALTER TABLE `admin_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recycling_center`
--
ALTER TABLE `recycling_center`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `date` (`date`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_inbox`
--
ALTER TABLE `user_inbox`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_inbox`
--
ALTER TABLE `admin_inbox`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recycling_center`
--
ALTER TABLE `recycling_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- AUTO_INCREMENT for table `user_inbox`
--
ALTER TABLE `user_inbox`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;