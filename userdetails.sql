-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 01:52 PM
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
-- Database: `mvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `zip_code`, `city`, `email`, `created_at`, `updated_at`) VALUES
(1, 19532, 'Dolorem minim ullamc', 'hukuq@mailinator.com', '2024-07-27 12:57:14', '2024-07-27 12:57:14'),
(2, 44263, 'Eum voluptatum velit', 'xoqozy@mailinator.com', '2024-07-27 13:38:57', '2024-07-27 13:38:57'),
(3, 44000, NULL, 'waseemanwar849@gmail.com', '2024-07-29 06:00:30', '2024-07-29 06:00:30'),
(4, NULL, 'Eum sunt magni facil', 'razapa@mailinator.com', '2024-07-29 06:01:19', '2024-07-29 06:01:19'),
(5, NULL, 'Quo aut sit tenetur', 'wazowi@mailinator.com', '2024-07-29 06:07:38', '2024-07-29 06:07:38'),
(6, 34003, 'Voluptas deserunt se', 'pasafunep@mailinator.com', '2024-07-29 06:08:16', '2024-07-29 06:08:16'),
(7, NULL, 'Islamabad', 'waseemanwar849@gmail.com', '2024-07-29 06:47:53', '2024-07-29 06:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
