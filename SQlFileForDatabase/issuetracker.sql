-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 05:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issuetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `code`) VALUES
(1, '+254'),
(2, '+1');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(11) NOT NULL,
  `issue_name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `issue_name`, `project_id`, `created_on`, `created_by`, `userID`, `assigned_to`, `description`, `priority`, `status`) VALUES
(3, 'Refusing to insert at first instance || newBug.php', 1, '2021-04-16', 'charity', 1, 'kiguhi@gmail.com', 'The page had not been reloaded, Bug was successfully fixed', 'Low', 'Completed'),
(4, 'Several Permissions need to be added for placement in google play store', 3, '2021-03-16', 'charity', 3, 'member2@gmail.com', 'Already submitted this issue', 'Low', 'Completed'),
(5, 'Several Permissions need to be added for placement in google play store', 3, '2021-03-16', 'charity', 3, 'member2@gmail.com', 'The internet permission need to be activated so that the application can be pushed to google play store', 'High', 'In Progress'),
(6, 'Copyright Issues', 3, '2021-03-17', 'charity', 3, 'member4@gmail.com', 'Application violets copy writ issues as you are not the original owner of website listed in the app', 'High', 'In Progress'),
(7, 'Display right number ofissues', 1, '2021-12-17', 'charity', 1, 'charitykiguhi@gmail.com', 'php displays the right number of bugs that a project has', 'Low', 'Completed'),
(13, 'checking sessions', 1, '2021-04-16', 'Charity Kiguhi', 1, 'charitykiguhi@gmail.com', 'session name was inserted successfully', 'Low', 'Completed'),
(15, 'inserting user id', 1, '2021-03-18', 'Joy Egehiza', 3, 'kiguhi@gmail.com', 'check if user id is inserted to table issues', 'Low', 'Completed'),
(16, 'boostrap not working', 4, '2021-04-12', 'Tifor Anita', 16, 'charity@gmail.com', 'finally working fine', 'Low', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `issues` int(11) NOT NULL,
  `participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `issues`, `participants`) VALUES
(1, 'Bug Tracker', 4, 3),
(3, 'Posta Web App', 3, 4),
(4, 'Front end Site', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `emails` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `emails`, `project_id`) VALUES
(1, 'charitykiguhi@gmail.com', '1'),
(2, 'kiguhi@gmail.com', '1'),
(3, 'member1@gmail.com', '3'),
(4, 'member2@gmail.com', '3'),
(5, 'member3@gmail.com', '3'),
(6, 'member4@gmail.com', '3'),
(7, 'charity@gmail.com', '4'),
(8, 'joy@gmail.com', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_names` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_phone`, `user_names`, `active`) VALUES
(1, 'chartykiguhi@gmail.com', '9090', '0723026492', 'Charity Kiguhi', 0),
(18, 'tiforanita@gmail.com', 'Tifor9090', '+254723778990', 'Tifor Anita', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
