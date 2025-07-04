-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 09:36 AM
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
-- Database: `workwise`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply_job`
--

INSERT INTO `apply_job` (`id`, `userid`, `jobid`) VALUES
(1, 7, 0),
(2, 7, 1),
(3, 7, 3),
(4, 8, 1),
(5, 9, 9),
(6, 0, 1),
(7, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `bmjob`
--

CREATE TABLE `bmjob` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `jobId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmjob`
--

INSERT INTO `bmjob` (`id`, `userId`, `jobId`) VALUES
(8, 0, 0),
(19, 5, 1),
(26, 1, 1),
(27, 1, 2),
(30, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jobtable`
--

CREATE TABLE `jobtable` (
  `jobId` int(10) NOT NULL,
  `userId` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `title` varchar(20) NOT NULL,
  `jobType` varchar(10) NOT NULL,
  `company` varchar(20) NOT NULL,
  `location` varchar(32) NOT NULL,
  `price` int(10) NOT NULL,
  `exitDay` date NOT NULL,
  `responsibilities` varchar(120) NOT NULL,
  `requirements` varchar(200) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobtable`
--

INSERT INTO `jobtable` (`jobId`, `userId`, `category`, `title`, `jobType`, `company`, `location`, `price`, `exitDay`, `responsibilities`, `requirements`, `payment`) VALUES
(2, 1, 'Programming', 'Software Developer', 'Part Time', 'CodeCraft Inc.', 'San Francisco, CA', 30000, '2024-07-15', 'Develop and maintain software applications.', 'Experience with Java and Python.', 20),
(3, 1, 'Digital', 'Digital Marketing Sp', 'Full Time', 'Digital Solutions Ag', 'Los Angeles, CA', 45000, '2024-09-01', 'Create and execute online marketing campaigns.', 'Experience with SEO, SEM, and social media advertising.', 30),
(4, 1, 'Video', 'Video Editor', 'Full Time', 'FilmCuts Studio', 'Chicago, IL', 55000, '2024-08-15', 'Edit and produce engaging video content.', 'Proficient in video editing software.', 35),
(5, 1, 'Writing', 'Content Writer', 'Freelance', 'WordCraft Creations', 'Miami, FL', 20000, '2024-07-30', 'Create compelling and SEO-friendly written content.', 'Excellent writing and editing skills.', 10),
(6, 1, 'Music', 'Music Composer', 'Full Time', 'Harmony Studios', 'Austin, TX', 60000, '2024-09-15', 'Compose original music for various projects.', 'Proficient in music composition software.', 20),
(7, 1, 'Music', 'Music Producer', 'Part Time', 'BeatMasters Co.', 'Nashville, TN', 35000, '2024-08-10', 'Produce and arrange music tracks.', 'Experience in music production, knowledge of audio equipment.', 30),
(8, 1, 'Music', 'Live Music Performer', 'Freelance', 'StageSounds Entertai', 'Seattle, WA', 15000, '2024-09-01', 'Perform live music at events and venues.', 'Musical talent, stage presence.', 35),
(9, 1, 'Graphics', 'UI/UX Designer', 'Full Time', 'PixelPerfect Design', 'Phoenix, AZ', 48000, '2024-08-20', 'Design user interfaces for websites and applications.', 'UI/UX design experience, proficiency in design tools.', 10),
(10, 1, 'Programming', 'Web Developer', 'Full Time', 'WebTech Solutions', 'Portland, OR', 55000, '2024-07-25', 'Develop and maintain web applications.', 'Experience with HTML, CSS, and JavaScript.', 20),
(11, 1, 'Digital', 'Social Media Manager', 'Full Time', 'SocialBuzz Agency', 'Atlanta, GA', 40000, '2024-09-10', 'Manage social media accounts and campaigns.', 'Social media marketing experience.', 30),
(12, 1, 'Video', 'Videographer', 'Part Time', 'CineCapture Producti', 'Houston, TX', 25000, '2024-08-05', 'Capture and edit video footage for various projects.', 'Experience in videography, proficiency in video editing software.', 35),
(25, 0, 'Business', 'coba', 'Full Time', 'coba', 'semarang', 123333, '2024-06-14', '222', '2323', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unapproved_job`
--

CREATE TABLE `unapproved_job` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `job_type` varchar(10) NOT NULL,
  `company` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `price` int(5) NOT NULL,
  `exit_day` date NOT NULL,
  `responsibilities` text NOT NULL,
  `requirement` text NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fName` varchar(11) NOT NULL,
  `lName` varchar(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `question` varchar(32) NOT NULL,
  `answer` varchar(64) NOT NULL,
  `favourite_field` varchar(10) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  `image` varchar(50) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fName`, `lName`, `email`, `password`, `question`, `answer`, `favourite_field`, `role`, `image`) VALUES
(0, 'Admin', 'Mikel', 'mikellubis@gmail.com', '$2y$10$AazU4Nkd5DIaPTARx/Jy3OPE/V4qNqmbOSObdxjz7xIYqPQBuOhxa', 'What is your favourite color', '$2y$10$ZhK39XA3BqBgrg8hmCaCmu7TxRSWl3CAm5TBmdGyczPQhi84BZ31W', '', 'admin', 'user.jpg'),
(0, 'Wijayanto A', 'Wibowo', 'wijayantoaw1@gmail.com', '$2y$10$PLDff3TqGIXEt/cxFuWmQ.xlV3XxTm4.gLuYsf7IhV0Itp5tWbBq6', 'What is your favourite color', '$2y$10$Psb7no0tUD0TKhPVKpi4VuZv4QMlvFm9EokXV4S8EO8AZ/gli4RSq', '', 'user', 'user.jpg'),
(0, 'Nurhasan', 'Hasan', 'enhas03@gmail.com', '$2y$10$HEguf7YRefk9.10m8YOwGuU17NVs8JcdbITeMpc0QkBqzvQezs2ka', 'What is your favourite color', 'blue', '', 'user', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmjob`
--
ALTER TABLE `bmjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtable`
--
ALTER TABLE `jobtable`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `unapproved_job`
--
ALTER TABLE `unapproved_job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bmjob`
--
ALTER TABLE `bmjob`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jobtable`
--
ALTER TABLE `jobtable`
  MODIFY `jobId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `unapproved_job`
--
ALTER TABLE `unapproved_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
