-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 06:07 AM
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
-- Database: `carenet`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'ทั่วไป', '2024-11-13 07:16:08', '2024-11-13 07:16:08'),
(2, 'สุขภาพ', '2024-11-14 03:43:55', '2024-11-14 03:43:55'),
(3, 'ประชาสัมพันธ์', '2024-11-14 03:43:55', '2024-11-14 03:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(12, 45, 11, '1wwwww', '2024-11-13 09:16:32'),
(14, 79, 15, 'sdsds', '2024-11-14 03:22:08'),
(15, 80, 18, 'sdsdsd', '2024-11-14 03:58:34'),
(16, 80, 18, 'dsds', '2024-11-14 03:59:25'),
(17, 80, 18, 'dsdssds', '2024-11-14 04:00:21'),
(18, 80, 18, 'dsdssdssds', '2024-11-14 04:00:54'),
(19, 80, 18, 'dsdssdssdssds', '2024-11-14 04:01:30'),
(20, 80, 18, 'sdsd', '2024-11-14 04:01:39'),
(21, 80, 18, 'sdsd', '2024-11-14 04:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_id`, `message`, `response`, `created_at`, `updated_at`) VALUES
(6, 15, 'หกฟหกฟ', 'sdsกหกหกหหกหกดกดก', '2024-11-14 09:22:38', '2024-11-14 09:23:09'),
(7, 15, 'sdssdsds', 'sdsกหกหกหหกหกดกดก', '2024-11-14 09:23:19', '2024-11-14 09:23:26'),
(8, 8, '78952', NULL, '2024-11-15 04:20:01', '2024-11-15 04:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `category_id`, `title`, `content`, `image`, `view`, `created_at`, `updated_at`) VALUES
(43, 11, 2, 'เกย์sdss', 'fsfdsfssdaasd', 'http://localhost/carenet/uploads/673458ff90b89_Screenshot 2024-09-05 161700.png', 0, '2024-11-13 07:45:03', '2024-11-15 04:55:30'),
(44, 11, 1, 'เกย์', 'fsfdsfssdaasdฟหกฟหกฟหก', 'http://localhost/carenet/uploads/67345915bf7cf_Screenshot 2024-09-05 161700.png', 0, '2024-11-13 07:45:25', '2024-11-13 07:45:25'),
(45, 11, 1, 'เกย์', 'fsfdsfssdaasdฟหกฟหกฟหก', 'http://localhost/carenet/uploads/6734599b7075d_Screenshot 2024-09-05 161700.png', 0, '2024-11-13 07:47:39', '2024-11-13 07:47:39'),
(46, 11, 1, 'เกย์', 'fsfdsfssdaasdฟหกฟหกฟหก', 'http://localhost/carenet/uploads/67345a6c587fc_Screenshot 2024-09-05 161700.png', 0, '2024-11-13 07:51:08', '2024-11-13 07:51:08'),
(74, 11, 1, 'เกย์', 'fsfdsfssdaasdฟหกฟหกฟหก', 'http://localhost/carenet/uploads/67346056e1a0e_Screenshot 2024-09-05 161700.png', 0, '2024-11-13 08:16:22', '2024-11-13 08:16:22'),
(77, 10, 1, 'ww', 'ww', 'http://localhost/carenet/uploads/67346b10d9e00_images (1).jpg', 0, '2024-11-13 09:02:08', '2024-11-13 09:02:08'),
(78, 15, 1, 'dsds', 'dssds', 'http://localhost/carenet/uploads/67355ffe68595_Screenshot 2024-09-05 161700.png', 0, '2024-11-14 02:27:10', '2024-11-14 02:27:10'),
(79, 15, 1, 'dsds', 'dssds', 'http://localhost/carenet/uploads/67356015aabbe_Screenshot 2024-09-05 161700.png', 5, '2024-11-14 02:27:33', '2024-11-14 03:57:27'),
(80, 15, 1, 'l', 'ss', '', 22, '2024-11-14 03:37:28', '2024-11-14 04:01:53'),
(81, 15, 3, 'dd', 'fdfd', 'http://localhost/carenet/uploads/673578618b549_กิจกรรมรักษ์ระยอง ลดขยะ มีหลายภาพ (2).png', 1, '2024-11-14 04:11:13', '2024-11-14 04:11:13'),
(85, 15, 1, 'dfsd', 'dfdfd', 'http://localhost/carenet/uploads/6736d4edb20dd_สีส้ม จดหมายข่าว ประชาสัมพันธ์ ประกาศ ข่าว บริษัท ธุรกิจ เอกสารขนาด A4.png', 1, '2024-11-15 04:58:21', '2024-11-15 04:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `first_name`, `last_name`, `age`, `profile_picture`, `created_at`, `updated_at`) VALUES
(5, 10, 'A', 'a', 5, NULL, '2024-11-12 04:35:16', '2024-11-12 04:35:16'),
(6, 11, 'A', 'a', 5, NULL, '2024-11-12 04:35:43', '2024-11-12 04:35:43'),
(7, 12, 'A', 'a', 5, NULL, '2024-11-12 04:36:12', '2024-11-12 04:36:12'),
(9, 14, 'w', 'w', 10, NULL, '2024-11-12 04:58:40', '2024-11-12 04:58:40'),
(10, 15, 'admin', 'admin', 20, NULL, '2024-11-12 06:09:18', '2024-11-12 06:09:18'),
(11, 16, 'admin', 'admin', 20, NULL, '2024-11-12 06:11:11', '2024-11-12 06:11:11'),
(12, 17, 'gay', 'gay', 10, NULL, '2024-11-12 07:22:07', '2024-11-12 07:22:07'),
(13, 18, 'user', 'user', 29, NULL, '2024-11-14 03:06:17', '2024-11-14 03:06:17'),
(14, 19, 'alert', 'alet', 2, NULL, '2024-11-14 03:11:49', '2024-11-14 03:11:49'),
(15, 20, 'alert', 'alet', 2, NULL, '2024-11-14 03:12:26', '2024-11-14 03:12:26'),
(16, 21, 'alert', 'alet', 2, NULL, '2024-11-14 03:13:52', '2024-11-14 03:13:52'),
(17, 22, 'alert', 'alet', 2, NULL, '2024-11-14 03:14:07', '2024-11-14 03:14:07'),
(18, 23, 'alert', 'alet', 2, NULL, '2024-11-14 03:14:48', '2024-11-14 03:14:48'),
(22, 27, NULL, NULL, NULL, NULL, '2024-11-15 04:12:42', '2024-11-15 04:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `topic_id`, `user_id`, `rating`, `created_at`) VALUES
(1, 1, 11, 3, '2024-11-14 07:37:52'),
(2, 2, 11, 3, '2024-11-14 07:37:52'),
(3, 3, 11, 3, '2024-11-14 07:37:52'),
(4, 1, 15, 5, '2024-11-14 07:42:12'),
(5, 2, 15, 1, '2024-11-14 07:42:12'),
(6, 3, 15, 3, '2024-11-14 07:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'คุณพึงพอใจกับการออกแบบของเว็บไซต์นี้หรือไม่?', '2024-11-14 07:20:14', '2024-11-14 07:20:14'),
(2, 'คุณพึงพอใจกับความง่ายในการใช้งานเว็บไซต์นี้หรือไม่?', '2024-11-14 07:20:14', '2024-11-14 07:20:14'),
(3, 'คุณพึงพอใจกับความเร็วในการโหลดเว็บไซต์นี้หรือไม่?', '2024-11-14 07:20:18', '2024-11-14 07:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(8, 'plam', 'plam@gmail.com', '$2y$10$gCDgFPiGLeoOuFo3z0zF/etT7.QEgH54rjSHIRnaAUis8mcfkHt5W', 'admin', '2024-11-12 04:27:28', '2024-11-12 06:11:06'),
(9, 'uname1', 'aaA@gmail.com', '$2y$10$s5rUMmRSMPMMNl.SkJ4VY.gykzShtF9FgTtN.K7A2cwi5HjD0qPLm', 'admin', '2024-11-12 04:32:30', '2024-11-15 03:39:40'),
(10, 'www', 'wwwA@gmail.com', '$2y$10$ais48xVQrYEbuFGLlzFYm.kQ00mJtOAJqf3OhV66EjWHU/Kb5jWLa', 'user', '2024-11-12 04:35:16', '2024-11-12 04:35:16'),
(11, 'wwwwww', 'wwwwwwA@gmail.com', '$2y$10$9yYB8qkSeAaJ7pbRABs9xuOnxaSker6BuZMSXYgC0a3MSW6HciJ9G', 'user', '2024-11-12 04:35:43', '2024-11-12 04:35:43'),
(12, 'wwwwwwww', 'wwwwwwwwA@gmail.com', '$2y$10$aoi1I1POL/hXsE1HwQSscu4jxiVBmEuPxNwhoEAZdf5JGPresL2.u', 'user', '2024-11-12 04:36:12', '2024-11-12 04:36:12'),
(14, 'aw', 'aw@gmail.com', '$2y$10$E8THbaipUFOTLNO9bU8Cm.K6FsTa4Pq0kY9r5Z0gRzspakqx6Gizm', 'user', '2024-11-12 04:58:40', '2024-11-12 04:58:40'),
(15, 'admin', 'admin@gmail.com', '$2y$10$.kuD9jsmjEkwesen.ygbAe/Ee8NFEmnNEdDsaKRuVhI0vIPwQNV4O', 'admin', '2024-11-12 06:09:18', '2024-11-12 06:10:43'),
(16, 'admin1', 'admin1@gmail.com', '$2y$10$CumFEM2SrWW3Tdhj8eIz9.i09kcf6OrMQx5bs5cYQZrcv5i5HHCGu', 'user', '2024-11-12 06:11:11', '2024-11-12 06:11:11'),
(17, 'gay', 'gay@gmail.com', '$2y$10$mge4/Ixz2tBlewyRrxkkA.Za9IFDAwfNbK4Uyfn.dqCMTtY1L2Yli', 'user', '2024-11-12 07:22:07', '2024-11-12 07:22:07'),
(18, 'user', 'user@123.com', '$2y$10$ClUuWFj96r9ZFxpmcxT7mudEqivHxLV4abBDgTwuvrfR7uJ27PSDm', 'user', '2024-11-14 03:06:17', '2024-11-14 03:06:17'),
(19, 'alet', 'alert@gmail.com', '$2y$10$.LQs/.kwOkGst7baOpjX0eBkg9sIkgBVH2JxCA8ha5wS9XYpLyw4q', 'user', '2024-11-14 03:11:49', '2024-11-14 03:11:49'),
(20, 'aletf', 'alefrt@gmail.com', '$2y$10$mMvEuMLV/OU4p4eeSW0ddervUM1vWCC6I4gIF2jidbZ6NkEmTu4OO', 'user', '2024-11-14 03:12:26', '2024-11-14 03:12:26'),
(21, 'aletf22', '2alefrt@gmail.com', '$2y$10$rp001MPwtM2a9ABxnehvpO5ZCm3RwaTskYrKPkGLgNJD//tyHEgQ.', 'user', '2024-11-14 03:13:52', '2024-11-14 03:13:52'),
(22, 'aletf221', '2alesdfrt@gmail.com', '$2y$10$K.iS4Ol42smzxAOKxMfRAuxq/tDi3xDeUPfdRxnVkprdMFDkwgNBW', 'user', '2024-11-14 03:14:07', '2024-11-14 03:14:07'),
(23, 'aletf2121', '2al1sdfrt@gmail.com', '$2y$10$Fbc85w6jyepga.W6zZRBN.ho3ZSc2M7xIi4T8Okr7Q.R8YIoxVJd.', 'user', '2024-11-14 03:14:48', '2024-11-14 03:14:48'),
(27, 'addsasdasdad', 'test22@gmail.com', '$2y$10$nTbANbs12pOivAGOqYbiluV84ADJLxGUH6svaCLkJ.OrtGEF.2YtO', 'user', '2024-11-15 04:12:42', '2024-11-15 04:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
