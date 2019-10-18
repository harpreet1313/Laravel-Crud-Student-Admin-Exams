-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 09:28 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_exams`
--

CREATE TABLE `assign_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_exams`
--

INSERT INTO `assign_exams` (`id`, `exam_id`, `user_id`, `score`, `test_status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '15', 1, '2019-10-18 00:13:28', '2019-10-18 00:41:18'),
(2, 2, 3, '', 0, '2019-10-18 00:13:28', '2019-10-18 00:13:28'),
(3, 2, 4, '', 0, '2019-10-18 00:13:28', '2019-10-18 00:13:28'),
(4, 3, 2, '', 0, '2019-10-18 00:50:42', '2019-10-18 00:50:42'),
(5, 3, 3, '', 0, '2019-10-18 00:50:42', '2019-10-18 00:50:42'),
(6, 3, 4, '', 0, '2019-10-18 00:50:42', '2019-10-18 00:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_text_html` text COLLATE utf8mb4_unicode_ci,
  `bottom_text_html` text COLLATE utf8mb4_unicode_ci,
  `exam_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_title`, `top_text_html`, `bottom_text_html`, `exam_date`, `created_at`, `updated_at`) VALUES
(2, 'Global Strategic Management', '<p><strong>Insructions:&nbsp;</strong></p>\r\n\r\n<p>All Questions are mandatory.</p>\r\n\r\n<p>Each question carry 5 marks.</p>\r\n\r\n<p>Answer the following questions and then press &#39;Submit&#39; to get your score.</p>', NULL, '2019-10-18', '2019-10-18 00:03:30', '2019-10-18 00:03:30'),
(3, 'Global business environment: analysis of the internal environment', '<p><strong>Instructions: </strong>All questions are mandatory.</p>\r\n\r\n<p>Each question carry 5 marks.</p>', NULL, '2019-10-30', '2019-10-18 00:50:06', '2019-10-18 00:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `exam_listings`
--

CREATE TABLE `exam_listings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_14_123057_create_exams_table', 1),
(4, '2019_10_15_045430_create_quizzes_table', 1),
(5, '2019_10_16_050420_create_assign_exams_table', 1),
(6, '2019_10_16_094844_create_student_exams_table', 1),
(7, '2019_10_16_095143_create_students_table', 1),
(8, '2019_10_16_120545_create_submit_assignments_table', 1),
(9, '2019_10_17_173929_create_exam_listings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `exam_id`, `question`, `answer`, `correct_answer`, `created_at`, `updated_at`) VALUES
(2, 2, 's:25:\"Innovation is defined as:\";', 'a:4:{i:0;s:50:\"the commercialization of a new product or process.\";i:1;s:42:\"the invention of a new product or process.\";i:2;s:28:\"new product or process idea.\";i:3;s:46:\"the implementation of a new production method.\";}', '1', '2019-10-18 00:03:30', '2019-10-18 00:03:30'),
(3, 2, 's:29:\"Process innovation refers to:\";', 'a:4:{i:0;s:33:\"the development of a new service.\";i:1;s:33:\"the development of a new product.\";i:2;s:58:\"the implementation of a new or improved production method.\";i:3;s:44:\"the development of new products or services.\";}', '2', '2019-10-18 00:03:30', '2019-10-18 00:03:30'),
(4, 2, 's:70:\"Innovation can help to provide a temporary competitive advantage when:\";', 'a:4:{i:0;s:27:\"barriers to entry are high.\";i:1;s:88:\"barriers to imitation are low and intellectual property rights are difficult to enforce.\";i:2;s:32:\"there are few other competitors.\";i:3;s:26:\"barriers to entry are low.\";}', '3', '2019-10-18 00:03:30', '2019-10-18 00:03:30'),
(5, 2, 's:54:\"Established firms relative to new firms are better at:\";', 'a:4:{i:0;s:24:\"all types of innovation.\";i:1;s:41:\"innovation which is competence-enhancing.\";i:2;s:42:\"innovation which is competence-destroying.\";i:3;s:31:\"Innovation which is disruptive.\";}', '4', '2019-10-18 00:03:30', '2019-10-18 00:03:30'),
(6, 3, 's:40:\"Google.com is an example of a firm that:\";', 'a:4:{i:0;s:61:\"adapted well to the business environment within its industry.\";i:1;s:52:\"hanged the business environment within its industry.\";i:2;s:56:\"applied the VRIO framework in global strategic planning.\";i:3;s:55:\"applied the SWOT Analysis in global strategic planning.\";}', '1', '2019-10-18 00:50:07', '2019-10-18 00:50:07'),
(7, 3, 's:133:\"The resource-based perspective suggests that unique firm resources should be the starting point for developing successful strategies.\";', 'a:4:{i:0;s:90:\"the business opportunity should be the starting point for developing successful strategies\";i:1;s:88:\"unique firm resources should be the starting point for developing successful strategies.\";i:2;s:118:\"both business opportunity and unique firm resources should be the starting point for developing successful strategies.\";i:3;s:121:\"neither business opportunity nor unique firm resources should be the starting point for developing successful strategies.\";}', '2', '2019-10-18 00:50:07', '2019-10-18 00:50:07'),
(8, 3, 's:59:\"The concept of core competencies was originally devised by:\";', 'a:4:{i:0;s:17:\"Michael E. Porter\";i:1;s:27:\"John Dunning and John Child\";i:2;s:29:\"C. K. Prahalad and Gary Hamel\";i:3;s:13:\"Jay B. Barney\";}', '3', '2019-10-18 00:50:07', '2019-10-18 00:50:07'),
(9, 3, 's:43:\"The VRIO framework can be used to identify:\";', 'a:4:{i:0;s:46:\"a firm\'s resources and external opportunities.\";i:1;s:52:\"the organizational structure of multinational firms.\";i:2;s:29:\"a firm\'s technical resources.\";i:3;s:27:\"a firm\'s core competencies.\";}', '4', '2019-10-18 00:50:07', '2019-10-18 00:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_exams`
--

CREATE TABLE `student_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submit_assignments`
--

CREATE TABLE `submit_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `isAdmin`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', '$2y$10$bOKU3.k6wbdRazbujnZKk.qeYKGeVdLW6v5bhddclTn1/UDzqJe6.', '59lO35LKfZ2LBE1cUcxpoA0UTNnK6lcoAvR659iKcAtLrV0GPnzSPJe8f3CO', '2019-10-17 22:59:49', '2019-10-17 22:59:49', 1),
(2, 'Raman Pratap', 'ramanpr42', 'raman@gmail.com', '$2y$10$L7y7iC.tRlc/5kEDIRx5AeSIkTAI7wiGxgCX8/CEG/66.OkZw3JNq', 'ERUqNQkcDGROJpdRUHabKuHFEoUtkypcRuDrux9PvBGoQ9NLHhAHHRu2DxvK', '2019-10-17 23:01:09', '2019-10-17 23:01:09', 0),
(3, 'Raesh Purohit', 'rakeshpu6', 'rakesh.purohit@gmail.com', '$2y$10$dHyggHT5wg2jJ1AFeLAxCuchhf3oSDzSkyVBSoLFzP509ENDNU8iK', NULL, '2019-10-17 23:06:40', '2019-10-17 23:06:40', 0),
(4, 'Harpreet Singh', 'harpreetsi49', 'reach4harpreet@gmail.com', '$2y$10$lol8wWANyMihcEpPGrjJ2OL/aJL51GH2kjiLqKSLLjKSSiB84t1ye', NULL, '2019-10-17 23:16:44', '2019-10-17 23:16:44', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_exams`
--
ALTER TABLE `assign_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_listings`
--
ALTER TABLE `exam_listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exams`
--
ALTER TABLE `student_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_assignments`
--
ALTER TABLE `submit_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_exams`
--
ALTER TABLE `assign_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exam_listings`
--
ALTER TABLE `exam_listings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_exams`
--
ALTER TABLE `student_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submit_assignments`
--
ALTER TABLE `submit_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
