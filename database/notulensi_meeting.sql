-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 03:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notulensi_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(50) NOT NULL,
  `notul_id` int(50) DEFAULT NULL,
  `task` varchar(150) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `notul_id`, `task`, `pic`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(7, 32, 'ABC123', 'IJKLMN', '2023-05-15', 'OnProgress', '2023-05-12 03:47:20', '2023-05-12 03:47:20'),
(21, 34, '505', 'wasd', '2023-05-22', 'OnProgress', '2023-05-12 06:45:10', '2023-05-12 06:45:10'),
(35, 33, '101', 'Muhammad', '2023-05-15', 'Open', '2023-05-12 06:59:16', '2023-05-12 06:59:16'),
(36, 33, '303', 'Pramaskoro', '2023-05-18', 'Close', '2023-05-12 06:59:16', '2023-05-12 06:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `notulensi`
--

CREATE TABLE `notulensi` (
  `id` int(11) NOT NULL,
  `tgl_meeting` date DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `task_id` varchar(150) DEFAULT NULL,
  `progress` text DEFAULT NULL,
  `peserta` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notulensi`
--

INSERT INTO `notulensi` (`id`, `tgl_meeting`, `section`, `subjek`, `task_id`, `progress`, `peserta`, `created_at`, `updated_at`) VALUES
(2, '2023-05-02', NULL, '2', 'AB12', 'alb alb', 'ba12', '2023-04-28 14:41:33', NULL),
(3, '2023-05-08', NULL, '1', '54321', 'wasd', 'qwerty', '2023-05-02 11:41:26', NULL),
(9, '2023-05-16', 'GAA', 'Weekly GA', 'XV321', 'qwertyuiop', 'a,b,c', '2023-05-11 15:00:19', NULL),
(33, '2023-05-15', 'PSN', 'Data Karyawan', 'XV54321', 'Full Test', 'a-z', '2023-05-12 11:15:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
