-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2026 at 08:31 AM
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
-- Database: `email_validator`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `email`, `username`, `domain`, `extension`, `provider`, `quality`, `security`, `status`, `created_at`) VALUES
(4, 'test@gmail.co', 'test', 'gmail.co', 'co', 'Google Gmail', '75', '80', 'Valid', '2026-07-23 02:56:18'),
(6, 'mahak231@gmail.co', 'mahak231', 'gmail.co', 'co', 'Google Gmail', '75', '100', 'Valid', '2026-07-23 03:05:11'),
(9, 'radaha@gmail.co', 'radaha', 'gmail.co', 'co', 'Google Gmail', '75', '80', 'Valid', '2026-07-23 03:12:59'),
(10, 'radaha@gmail.com', 'radaha', 'gmail.com', 'com', 'Google Gmail', '100', '80', 'Valid', '2026-07-23 03:12:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
