-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 10:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticktack`
--

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE `adviser` (
  `adviserID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `projectID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`adviserID`, `firstname`, `lastname`, `email`, `password`, `updated_at`, `projectID`) VALUES
(1, 'Marko', 'Ramzes', 'marko@gmail.com', '$2y$10$/1rer0Uc737A23slK7IUbu72nnjfULqpT1sM13c1sfyM95JARLNa.', '2021-03-17 12:42:13', NULL),
(2, 'paolo', 'moreno', 'paolo@gmail.com', '$2y$10$LqB.fGTAbeCPBalEkubNMeDCoPI.AP/oRCJStHtwkbXOZQmVkXjem', '2021-03-17 16:18:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` int(11) NOT NULL,
  `moduleName` varchar(255) NOT NULL,
  `memberID` int(15) NOT NULL,
  `projectID` int(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dueDate` date NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `moduleName`, `memberID`, `projectID`, `description`, `dueDate`, `created_at`) VALUES
(1, 'Gg', 4, 11, 'ggka', '2021-03-26', '2021-03-24'),
(2, 'GG ka', 3, 11, 'TRY', '2021-04-03', '2021-03-24'),
(3, 'gggggggg', 5, 11, 'gggggg', '2021-03-30', '2021-03-24'),
(4, 'Design', 7, 11, 'Finish it', '2021-03-30', '2021-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(11) NOT NULL,
  `projectTitle` varchar(255) NOT NULL,
  `leaderID` int(50) NOT NULL,
  `adviserID` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `projectTitle`, `leaderID`, `adviserID`, `created_at`) VALUES
(11, 'Programming', 4, 2, '2021-03-17 23:11:35'),
(12, 'Thesis', 6, 2, '2021-03-25 13:11:11'),
(13, 'Math', 5, 2, '2021-03-25 15:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `projectID` int(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `leader` enum('no','yes','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstname`, `lastname`, `email`, `password`, `projectID`, `updated_at`, `leader`) VALUES
(1, 'maaark', 'achacosoo', 'makmak111@gmail.com', '$2y$10$OjCxImBhRbHU8yEg1Zjhae6GMgq3rX9C/KF8r4.hETMu0G3O7WT5m', 9, '2021-03-17 12:32:19', 'yes'),
(2, 'vincentt', 'ramirezz', 'vincent123@gmail.com', '$2y$10$y9VS4/sVopbfRoaPaCRqce0HKkSlUZAdTwTFzaukO0QQq0SJnjpku', 10, '2021-03-17 12:35:25', 'yes'),
(3, 'markmark', 'achac', 'markmark@gmail.com', '$2y$10$st9h5VgsygnUy548zNfwGO1Bt2RZrFmxnAfZXCsyD9IlpH8jQQ4Li', 11, '2021-03-17 13:12:45', 'yes'),
(4, 'jim', 'lao', 'jimlao@gmail.com', '$2y$10$qSbdLyEXHF9wTs2NLGMEZuCHvxrOJIt27q8HjONI/gOyUxlgvCNwO', 11, '2021-03-17 14:56:25', 'yes'),
(5, 'mackenzz', 'ramirezz', 'mackenz12@gmail.com', '$2y$10$3jJiTO3rabZtVHDOqNdWmemlfLK8YkDLUH4PzuFpapG7E5tt9r/..', 13, NULL, 'yes'),
(6, 'jiiim', 'laolao', 'jimlao123@gmail.com', '$2y$10$o6IY0xZ6XekXRm.Ospw6iOCfdQyQEAfAI/h.B3UkJCMW3znmkKQ96', 12, NULL, 'yes'),
(7, 'Julie', 'Roaaaa', 'julieroa@gmail.com', '$2y$10$UdGKXUv1JwTM6GDIsniUbePQH.9dualxk//vHQfG0kZM9TZHhqWQi', 11, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(14, 'Mark', 'Achacoso', 'makmakachacoso@gmail.com', '$2y$10$xUpyfsHzvkCKYyiJmbEmSudSxkf9d9rMDhq5XK.PaWhmTlhp3L/by', 'student', '2021-02-25 19:09:30', '2021-02-25 19:09:30'),
(15, 'Mark', 'Ramirez', 'ramirez@gmail.com', '$2y$10$hyEi577rdXAU5RV63VCw3enoupKfgpjL/Lp4puDEeaIAIVJQVG312', 'student', '2021-02-25 19:12:15', '2021-02-25 19:12:15'),
(16, 'Vincent', 'Achacoso', 'vince@gmail.com', '$2y$10$KXC5UWJiZzqCvbaBQq.3Pet4vCdqdI/WEuLkoq5assBvrO0UZO3p6', 'student', '2021-02-25 20:22:08', '2021-02-25 20:22:08'),
(17, 'Mackenz', 'Achacoso', 'mackenz@gmail.com', '$2y$10$hyO1IoeMGPKuCvTTNHCuheajdv7Yid7yf7TPXv6xtC3dXhJIcRtJi', 'student', '2021-02-25 20:40:56', '2021-02-25 20:40:56'),
(18, 'makmakmak', 'achacosoo', 'makmak1@gmail.com', '$2y$10$cYspxXyRXmfVgB8MoXvtZeJoeBXI4kA.5SLQDe4AKOIdGbZATTk5i', 'adviser', '2021-03-02 14:48:15', '2021-03-02 14:48:15'),
(22, 'Admin', 'Admin', 'admin12@gmail.com', '$2y$10$g/duMnexgeoNvrFMcBxHr.0Qnd3XIAIR.rGE00o5.RgLRagsrPZay', 'admin', '2021-03-05 17:35:32', '2021-03-05 17:35:32'),
(23, 'Aster', 'Mirah', 'mirah@gmail.com', '$2y$10$JT4figvOA6IVMSV4kXziN.tq5uDsoITLYflQND7kKzuRWRK.lcTLm', 'student', '2021-03-05 20:42:15', '2021-03-05 20:42:15');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewmodule`
-- (See below for the actual view)
--
CREATE TABLE `viewmodule` (
`moduleID` int(11)
,`moduleName` varchar(255)
,`fullname` varchar(101)
,`projectTitle` varchar(255)
,`projectID` int(15)
,`studentID` int(11)
,`adviserID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewproject`
-- (See below for the actual view)
--
CREATE TABLE `viewproject` (
`projectID` int(11)
,`projectTitle` varchar(255)
,`Fulllname` varchar(101)
,`adviser_fullname` varchar(101)
,`adviserID` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `viewmodule`
--
DROP TABLE IF EXISTS `viewmodule`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewmodule`  AS SELECT `module`.`moduleID` AS `moduleID`, `module`.`moduleName` AS `moduleName`, concat(`students`.`firstname`,' ',`students`.`lastname`) AS `fullname`, `project`.`projectTitle` AS `projectTitle`, `module`.`projectID` AS `projectID`, `students`.`studentID` AS `studentID`, `adviser`.`adviserID` AS `adviserID` FROM (((`module` join `students` on(`module`.`memberID` = `students`.`studentID`)) join `project` on(`module`.`projectID` = `project`.`projectID`)) join `adviser` on(`project`.`adviserID` = `adviser`.`adviserID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `viewproject`
--
DROP TABLE IF EXISTS `viewproject`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewproject`  AS SELECT `project`.`projectID` AS `projectID`, `project`.`projectTitle` AS `projectTitle`, concat(`students`.`firstname`,' ',`students`.`lastname`) AS `Fulllname`, concat(`adviser`.`firstname`,' ',`adviser`.`lastname`) AS `adviser_fullname`, `adviser`.`adviserID` AS `adviserID` FROM ((`project` join `students` on(`students`.`studentID` = `project`.`leaderID`)) join `adviser` on(`adviser`.`adviserID` = `project`.`adviserID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
  ADD PRIMARY KEY (`adviserID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `adviserID` (`adviserID`),
  ADD KEY `leaderID` (`leaderID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `adviserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adviser`
--
ALTER TABLE `adviser`
  ADD CONSTRAINT `adviser_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `project` (`projectID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`adviserID`) REFERENCES `adviser` (`adviserID`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`leaderID`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
