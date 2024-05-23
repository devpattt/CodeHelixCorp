-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 11:26 PM
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
-- Database: `code_helix`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `email`) VALUES
(71, 2055614695550757, 'tanod', '$2y$10$6/A4gvD0mLD0YBbcoXE9V.G3sTC.rjnK0zG6IuCzwFlyjnzbKb62a', 'tanod@gmail.com'),
(76, 70259401978, 'pat', '$2y$10$uaqWzdzWLwjF855BZ..9DeD1aRtpE3F3N.tfsVkCjUg5BACCX7aFa', 'patsandesu@gmail.com'),
(77, 1526155293357, 'patpogi', '$2y$10$As25iSWol22RWo01TuHRC.uVOoPjxzydHReixBP2iV/RlGgjMMZ5G', 'patsandesu@gmail.com'),
(78, 6561215, 'sdsd', '$2y$10$muCWPNUJoOzIB1Ygqpbep.He3fXgN6e0t9o2ncWgSYbEdpWU1Sh.m', 'jobertbordamonte@gma'),
(79, 99949888698582305, 'patpogi', '$2y$10$DVymyjeADBLlWUwKYmJ4i.66KfdYAkZKQDTkfsz3DH2vHnHLWnqJW', 'patsandesu@gmail.com'),
(80, 84811, 'patpogi', '$2y$10$9PyvYmL7JKesESysCE6NTuXcRNnXqhgXaat.YpNm7GgDsHC3A79U6', 'patsandesu@gmail.com'),
(81, 428079, 'patpogi', '$2y$10$nxn0PzMDG/D/edUNR5aXVuWheu.wfZ6T30tgB7cLy0u69QKb0ICxK', 'patsandesu@gmail.com'),
(82, 9470477498695814, 'patpogi', '$2y$10$See7tGTUSLLeFhi5QR4E9.Sx2JD5cVAEzUtL2IR2RmTojScz7y78a', 'patsandesu@gmail.com'),
(83, 91629, 'patpogi', '$2y$10$DWq.Le.MPfpSo0i7u4Fx0OTOWD/NEZ6yO2L9Lf9iC57K7mJgOhX0.', 'jobertbordamonte@gma'),
(84, 45441301, 'bazar', '$2y$10$5w6nTJT0qLdHEYA9H4g2m.c.UipVdekBNWC4y3hQKxSqFA06FZY7W', 'alegriaisananrolly12'),
(85, 57624945713504, 'sss', '$2y$10$XQZ3mi4pKypxappO8VenlujTUITrNb9CSX5.JgOg5rUhXUmnMIPxO', 'ss'),
(86, 9223372036854775807, 'patpogi', '$2y$10$zlG1YwPf8QkmOHTBB2pszuw/xGRavChWrCwzG7SHzhr773j6TmHcK', 'ss'),
(87, 631013541994849991, 'patpogi', '$2y$10$A0XhbdM90gV7VlcW2Ui5Qe3OkZycD37kLj32wwtIiUSJSsxFWawgm', 'patsandesu@gmail.com'),
(88, 48788202045, 'aeron', '$2y$10$Ibl84M0bCOwipIkOLHnSqO8JtuV8Z39XS39vIA9aWoT26s.ULue6a', 'aeron@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
