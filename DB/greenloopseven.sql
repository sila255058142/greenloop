-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2026 at 02:09 PM
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
-- Database: `greenloopseven`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `co2_per_kg` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `co2_per_kg`) VALUES
(1, 'โทรศัพท์', 20),
(2, 'โทรศัพท์', 20);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `start_at`, `end_at`, `user_id`, `body`, `title`) VALUES
(3, '2026-11-08 11:29:00', '2026-11-08 17:26:00', 5, 'zazaza', 'zazaz'),
(4, '2026-11-08 17:30:00', '2026-11-08 17:31:00', 5, 'zax', 'zax'),
(5, '2026-11-08 17:32:00', '2026-11-08 17:37:00', 5, 'zazaza', 'zazaza'),
(8, '2026-11-08 18:00:00', '2026-11-08 18:02:00', 5, 'ฟกฟหก', 'หกฟก'),
(9, '2026-11-08 19:05:00', '2026-11-08 19:06:00', 5, 'ฆโฆฏโ', 'ฏโฆโ'),
(11, '2026-11-08 19:56:00', '2026-11-08 19:57:00', 5, 'ZAX', 'ZAX');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `link`, `is_read`, `created_at`) VALUES
(1, 4, '0', 'adminสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 16:44:45'),
(2, 5, '0', 'SLสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:06:15'),
(3, 1, '0', 'asasสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:07:48'),
(4, 2, '0', 'asasสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:07:48'),
(5, 4, '0', 'asasสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:07:48'),
(6, 6, '0', 'asasสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:07:48'),
(7, 7, '0', 'asasสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:07:48'),
(10, 1, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(11, 2, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(12, 4, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(13, 6, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(14, 7, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(15, 8, 'สมาชิกใหม่', 'asadasasasaสมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:09:37'),
(17, 5, 'สมาชิกใหม่', 'sd สมัครสมาฃิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:12:57'),
(18, 5, 'สมาชิกใหม่', 'ฟหฟหฟห สมัครสมาชิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:16:09'),
(19, 5, 'สมาชิกใหม่', 'aaa สมัครสมาชิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 18:24:20'),
(20, 5, 'สมาชิกใหม่', 'er สมัครสมาชิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 19:33:38'),
(21, 5, 'สมาชิกใหม่', 'Sila สมัครสมาชิกสำเร็จ', 'admin/users.php', 0, '2026-11-08 19:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `point_transactions`
--

CREATE TABLE `point_transactions` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `related_type` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_transactions`
--

INSERT INTO `point_transactions` (`id`, `amount`, `user_id`, `related_id`, `related_type`, `description`, `created_at`) VALUES
(2, 1, 1, 1, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 17:40:10'),
(8, 240, 4, 4, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 17:58:48'),
(16, 240, 9, 7, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 18:28:01'),
(17, 220, 4, 1, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 18:28:15'),
(18, 240, 4, 4, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 19:08:01'),
(19, 2460, 9, 6, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 19:08:16'),
(20, 60, 13, 8, 'recycles', 'แต้มรีไซเคิล', '2026-11-08 19:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `recycles`
--

CREATE TABLE `recycles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_type` enum('self','pickup','','') NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `co2_kg` decimal(10,0) NOT NULL,
  `points` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('pending','done','rejected','') NOT NULL DEFAULT 'pending',
  `item_name` varchar(200) NOT NULL,
  `weight_kg` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recycles`
--

INSERT INTO `recycles` (`id`, `user_id`, `delivery_type`, `address`, `image`, `co2_kg`, `points`, `category_id`, `status`, `item_name`, `weight_kg`, `created_at`) VALUES
(1, 4, 'self', 'zaax', '', 220, 220, 2, 'done', '', 11, '2026-11-08 16:15:40'),
(2, 4, 'self', 'adad', '', 0, 0, 2, 'done', '', 112, '2026-11-08 17:44:54'),
(3, 4, 'self', 'asasas', '', 0, 0, 2, 'done', '', 12, '2026-11-08 17:47:39'),
(4, 4, 'self', 'asasasa', '', 240, 240, 2, 'done', 'qwq', 12, '2026-11-08 17:58:12'),
(5, 9, 'self', 'ฟหฟหฟ', '', 0, 0, 2, 'done', 'หกห', 121, '2026-11-08 18:15:24'),
(6, 9, 'self', 'asda', '', 2460, 2460, 1, 'done', 'sda', 123, '2026-11-08 18:18:08'),
(7, 9, 'self', 'qwqwq', '', 240, 240, 1, 'done', 'sdsd', 12, '2026-11-08 18:21:34'),
(8, 13, 'pickup', 'TCC', '', 60, 60, 2, 'done', 'IPHONE 18', 3, '2026-11-08 19:49:01');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `points` int(11) NOT NULL,
  `role` enum('user','admin','','') NOT NULL DEFAULT 'user',
  `status` enum('active','suspended','','') NOT NULL DEFAULT 'active',
  `password` varchar(200) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `points`, `role`, `status`, `password`, `question`, `answer`, `created_at`) VALUES
(1, '$name', '$email', '$phone', 0, 'user', 'active', '$ph', '$question', '$ah', '2026-11-08 13:34:20'),
(2, 'dgsss', 'Sila@gmail.coms', '0627984407', 0, 'user', 'active', '$2y$10$jCJSmJwydc/D3qDBXtPgSuKsZybW2vuV6SB7CL9wYbifL5VEkYSLW', 'สัตว์เลี้ยง', '$2y$10$npf6nvQCX.gJTKksIyxooeijHc2tnyjSpPqUrLxxG5XRyEKbX/b72', '2026-11-08 15:38:52'),
(4, 'dgsssx', 'df@gmail.coms', '0627984402', 700, 'user', 'active', '$2y$10$kN5T8xZoXp9LJrkKDECGkOwRSP/v38FwautOr6Ls0kEmusDFV8Nim', 'สัตว์เลี้ยง', '$2y$10$cUn14.Ns6/ekCdubpWs10.3If7zOKw14NEddLy89BCm2iRMhBJkJe', '2026-11-08 16:06:48'),
(5, 'admin', 'admin@greenloop.local', '0627984402', 0, 'admin', 'active', '$2y$10$VJis0DOPqDn9Wsms7Br5Tu5ZsQSv1mHSYZtR/PntiYafUt0Fiaury', 'สัตว์เลี้ยง', '$2y$10$/2IvgdmbF9JDogiAtp8iG.0ByN/.nSZuJxa6Tc6pGH8vniOLUVGj2', '2026-11-08 16:44:45'),
(6, 'SL', 'aa@we.com', '0627984402', 0, 'user', 'active', '$2y$10$DcHbOi3E9tq3TahYZ7ET0eoKwxeUbRchIBqrsyp4Bn.RWJnZtQ9la', 'สัตว์เลี้ยง', '$2y$10$yqDT7iix4D8ddaqTH3QCYeR4PYs2KkOWW/agmJ4rPUfcHapFtgi.a', '2026-11-08 18:06:15'),
(7, 'asas', 'wwsw@gmail.coms', '0627984402', 0, 'user', 'suspended', '$2y$10$84N.awYibZ7vSvh4tkaO5uFKKoP3Bx84jll4IXE5L0./WesXgrQLm', 'สัตว์เลี้ยง', '$2y$10$7I4MW3FFzFHJAdrd7KRrjOtWiCP28bXQPWeB0JG2/ZAb2Hcqeb.5m', '2026-11-08 18:07:48'),
(8, 'asadasasasa', 'www@gmail.coms', '0627984402', 0, 'user', 'active', '$2y$10$D/jIKUkabQwOBc4cVs603.jWuV3EzgdDUxSj.aoKjxfPp/oWzid5G', 'สัตว์เลี้ยง', '$2y$10$Lw63M2s/6aUuUppMjwwJd.EkDD2k9VcL8yDT2eQenKJj9jIDzJ60u', '2026-11-08 18:09:37'),
(9, 'sd', 'sds@gmail.coms', '0627984402', 2700, 'user', 'active', '$2y$10$jipghhBlTUN9a082udr2ke.JdzYlBb71K1LF9jpHRfC9dkHw5KaMu', 'สัตว์เลี้ยง', '$2y$10$slH11rz7Rkz6h3qtkAgbvuiHMi01/OI1.m5Q3smyKaMVlps3NQPFm', '2026-11-08 18:12:57'),
(10, 'ฟหฟหฟห', 'ass@gmail.coms', '0627984402', 0, 'user', 'active', '$2y$10$Tnbl7Yuz5YQPc8YtRU8ouuA6OiD1p51OPIy8mn0kURLF.Fd9Knyku', 'สัตว์เลี้ยง', '$2y$10$1CFJ94t06Cl0BHDiCHOW5ultbPvAFtmxUT23u7.7ZzcsVTIFiXFpW', '2026-11-08 18:16:09'),
(11, 'aaa', 'nnn@gmail.com', '0932461284', 0, 'user', 'active', '$2y$10$ipRL8Jxr0urKe0gm5AlBt.qby.2DqApe412H3wpfQVKAuAPrwn84y', 'สัตว์เลี้ยง', '$2y$10$TtaPp8YuOuVIj0FITFbd6u9eynZoKoBE70WSJC9y3FC9vOcbTF1Yu', '2026-11-08 18:24:20'),
(12, 'er', 'er@gmail.com', '0627984402', 0, 'user', 'active', '$2y$10$QmPKfLE8KQAds.tlmLZhau.p5zrlWwyC8c73qEkBCf94DbyDAAwfG', 'สัตว์เลี้ยง', '$2y$10$SwxdUHtfFFVpM/RQagBsiufUkEFqoWpPAUFYgT79DCSBsZ6xtYEMi', '2026-11-08 19:33:38'),
(13, 'SilaPTT', 'Silr@gmail.comS', '0627984403', 60, 'user', 'suspended', '$2y$10$bPtKz.IsjeHffVK3EXSOPubaDnnsRP9eBe.FLNEGErEmo8G2dVap.', 'สัตว์เลี้ยง', '$2y$10$FhBbELzfMtzZ01ak17eUfewmkiEWMpymq4tg9O3U7eUU8ypEKUzg2', '2026-11-08 19:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recycles`
--
ALTER TABLE `recycles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `point_transactions`
--
ALTER TABLE `point_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recycles`
--
ALTER TABLE `recycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `point_transactions`
--
ALTER TABLE `point_transactions`
  ADD CONSTRAINT `point_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recycles`
--
ALTER TABLE `recycles`
  ADD CONSTRAINT `recycles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recycles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
