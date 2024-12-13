-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 07:29 PM
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
-- Database: `smart_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Shop','Startup','Company','Freelance','Other') NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_business`
--

INSERT INTO `tbl_business` (`id`, `name`, `type`, `location`, `description`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 'plastic', '', 'nill', 'mmmmmmmmmmm', 'Active', '2024-12-12 18:06:45', '2024-12-12 18:06:45', NULL),
(2, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:47:41', '2024-12-13 17:47:41', NULL),
(3, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:51:15', '2024-12-13 17:51:15', NULL),
(4, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:51:18', '2024-12-13 17:51:18', NULL),
(5, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:52:33', '2024-12-13 17:52:33', NULL),
(6, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:55:18', '2024-12-13 17:55:18', ''),
(7, 'Property', '', 'Pak', 'Property investment', 'Active', '2024-12-13 17:55:51', '2024-12-13 17:55:51', ''),
(8, 'Property', '', 'Pak', 'mmmmmm', 'Active', '2024-12-13 17:56:10', '2024-12-13 17:56:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `status` enum('Open','Closed') DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `title`, `department`, `location`, `description`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'IT', 'ISB', 'NILL', 100000.00, 'Open', '2024-12-12 18:20:18', '2024-12-12 18:20:18'),
(2, 'AM', 'IT', 'nill', 'ISB', 126676.00, 'Open', '2024-12-12 18:20:53', '2024-12-12 18:20:53'),
(3, 'nill', 'asd', 'asdfg', 'qwert', 1234.00, 'Open', '2024-12-13 15:37:05', '2024-12-13 15:37:05'),
(4, 'Manager', 'IT', 'Pak', 'IT Work', 50000.00, 'Open', '2024-12-13 15:38:10', '2024-12-13 15:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_facilities`
--

CREATE TABLE `tbl_student_facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Library','Hostel','Lab','Sports Complex','Cafeteria','Other') NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_facilities`
--

INSERT INTO `tbl_student_facilities` (`id`, `name`, `type`, `location`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ali', '', 'nill', 'nnnnnnnn', 'Active', '2024-12-12 17:22:54', '2024-12-12 17:22:54'),
(2, 'ali', '', 'nill', 'asdfghjkl', 'Active', '2024-12-12 18:29:10', '2024-12-12 18:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tourism`
--

CREATE TABLE `tbl_tourism` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Hotel','Restaurant','Attraction','ATM','Theatre','Other') NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Open','Closed') DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tourism`
--

INSERT INTO `tbl_tourism` (`id`, `name`, `type`, `location`, `description`, `status`, `created_at`, `updated_at`, `image_url`) VALUES
(53, 'PC', 'Hotel', 'Pak', 'Hotel', 'Open', '2024-12-13 17:37:38', '2024-12-13 17:37:38', 'uploads/Screenshot 2024-09-09 115819.png'),
(54, 'PC', 'Hotel', 'Pak', 'Hotel', 'Open', '2024-12-13 17:40:22', '2024-12-13 17:40:22', 'uploads/Screenshot 2024-09-09 115819.png'),
(55, 'PC', '', 'NET', 'netrmn', 'Open', '2024-12-13 17:40:45', '2024-12-13 17:40:45', 'uploads/blog-1.jpg'),
(56, 'PC', '', 'NET', 'netrmn', 'Open', '2024-12-13 17:41:37', '2024-12-13 17:41:37', 'uploads/blog-1.jpg'),
(57, 'HM', '', 'asdfg', 'NET', 'Open', '2024-12-13 17:41:44', '2024-12-13 17:41:44', 'uploads/am.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_facilities`
--
ALTER TABLE `tbl_student_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tourism`
--
ALTER TABLE `tbl_tourism`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student_facilities`
--
ALTER TABLE `tbl_student_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tourism`
--
ALTER TABLE `tbl_tourism`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
