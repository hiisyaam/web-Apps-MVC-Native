-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 02:06 AM
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
-- Database: `praktikumweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `nomorProgram` int(11) NOT NULL,
  `namaProgram` varchar(255) DEFAULT NULL,
  `suratKeterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`nomorProgram`, `namaProgram`, `suratKeterangan`) VALUES
(2, 'Sosisalisasi Game', 'abcde'),
(6, 'Jajan Cilok', 'jdkasdj'),
(12, 'Masak', 'abf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pengguna` varchar(50) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `role` enum('menteri','kadep') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pengguna`, `pw`, `role`) VALUES
(1, 'menteri1', '123', 'menteri'),
(2, 'kadep1', '456', 'kadep'),
(8, 'admin', 'admin', 'kadep'),
(13, 'adminBapukBanget', '123', 'kadep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`nomorProgram`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
