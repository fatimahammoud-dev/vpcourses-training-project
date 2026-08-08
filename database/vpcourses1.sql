-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2025 at 12:14 AM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpcourses1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `about_img` varchar(255) DEFAULT NULL,
  `description1` varchar(255) NOT NULL,
  `description2` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `about_img`, `description1`, `description2`, `skills`) VALUES
(5, 'VP COURSES', 'about.jpg', 'A simple academy website used to practice front-end, PHP, MySQL, and database-driven content management during web development training.', 'The project includes an administrator dashboard for managing the public banner, academy information, course cards, instructor cards, and student testimonials.', 'Web Development Training');

-- --------------------------------------------------------

--
-- Table structure for table `admincourse`
--

DROP TABLE IF EXISTS `admincourse`;
CREATE TABLE IF NOT EXISTS `admincourse` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_image` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `duration` varchar(255) NOT NULL,
  `student_number` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admincourse`
--

INSERT INTO `admincourse` (`id`, `course_image`, `instructor`, `course_name`, `price`, `duration`, `student_number`) VALUES
(2, 'course-2-1.jpg', 'Kawthar', 'WEB-level-2', 200, '2 Months', 3),
(14, 'course-1.jpg', 'Lama', 'WEB-level-1', 100, '1 Month', 5),
(15, 'course-3.jpg', 'Ali', 'WEB-level-3', 100, '1 Month', 6);

-- --------------------------------------------------------

--
-- Table structure for table `admininstructor`
--

DROP TABLE IF EXISTS `admininstructor`;
CREATE TABLE IF NOT EXISTS `admininstructor` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admininstructor`
--

INSERT INTO `admininstructor` (`id`, `name`, `course`, `image`) VALUES
(10, 'Kawthar', 'WEB-level-3', 'teacher1.jpg'),
(12, 'Ali', 'WEB-level-1', 'backend.JPG'),
(14, 'Khaled', 'WEB-level-2', 'team-1-1-1.jpg'),
(15, 'Jana', 'Machine Learning', 'student3-1-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminstudent`
--

DROP TABLE IF EXISTS `adminstudent`;
CREATE TABLE IF NOT EXISTS `adminstudent` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `std_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminstudent`
--

INSERT INTO `adminstudent` (`id`, `name`, `comment`, `std_image`) VALUES
(3, 'Ali', 'Best Course I Study Ever', 'student4.jpg'),
(4, 'hasan', 'Amazing Course', 'teacher3-1-1.jpg'),
(5, 'Fatima', 'this course covers all my needs in web', 'teacher4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carusel`
--

DROP TABLE IF EXISTS `carusel`;
CREATE TABLE IF NOT EXISTS `carusel` (
  `slider_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_iamge` varchar(255) DEFAULT NULL,
  `descriptioin1` varchar(255) NOT NULL,
  `descriptioin2` varchar(255) NOT NULL,
  `descriptioin3` varchar(1000) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carusel`
--

INSERT INTO `carusel` (`slider_id`, `slider_iamge`, `descriptioin1`, `descriptioin2`, `descriptioin3`) VALUES
(6, 'carousel-1-4.jpg', 'Web Development Training', 'Learn and practice web development step by step', 'Explore training courses and academy content managed from the admin dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'currency', '$');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `address`, `email`, `phoneNumber`) VALUES
(1, 'Samhat Center,Tyr , Lebanon', 'info@vpcourses.net', '+961 71 52 88 81');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `title` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `courses_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `instructor_id` int UNSIGNED NOT NULL,
  `type_id` int UNSIGNED NOT NULL,
  `course_startDate` date NOT NULL,
  `course_endDate` date NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `course_paidPrice` int UNSIGNED NOT NULL,
  PRIMARY KEY (`courses_id`),
  KEY `courses_ibfk_1` (`instructor_id`),
  KEY `courses_ibfk_2` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coursestype`
--

DROP TABLE IF EXISTS `coursestype`;
CREATE TABLE IF NOT EXISTS `coursestype` (
  `type_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `courseType_name` varchar(50) NOT NULL,
  `courseType_price` int UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coursestype`
--

INSERT INTO `coursestype` (`type_id`, `description`, `courseType_name`, `courseType_price`, `image`) VALUES
(69, 'Html css js', 'WEB-LEVEL-1', 100, 'course-1.jpg'),
(70, 'PHP, JQuery', 'WEB-LEVEL-2', 200, 'course-2.jpg'),
(71, 'OOP PHP and Ajax', 'WEB-LEVEL-3', 100, 'course-3-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_schedule`
--

DROP TABLE IF EXISTS `course_schedule`;
CREATE TABLE IF NOT EXISTS `course_schedule` (
  `schedule_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_schedule`
--

INSERT INTO `course_schedule` (`schedule_id`, `type_id`, `title`, `description`, `time`) VALUES
(26, 69, 'Web-1', 'html, css and js', '1 Month'),
(27, 70, 'web-2', 'jquery, php', '2 Months'),
(28, 71, 'web-3', 'oop php and ajax', ' 1 Month');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `instructor_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `instructor_fullName` varchar(255) NOT NULL,
  `instructor_phoneNumber` varchar(255) NOT NULL,
  `instructor_email` varchar(255) NOT NULL,
  `instructor_address` varchar(255) NOT NULL,
  `instructor_image` varchar(255) NOT NULL,
  PRIMARY KEY (`instructor_id`),
  KEY `instructors_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `register_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int UNSIGNED NOT NULL,
  `course_id` int UNSIGNED NOT NULL,
  `register_date` date NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`register_id`),
  KEY `registrations_ibfk_1` (`course_id`),
  KEY `registrations_ibfk_2` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `student_fullName` varchar(255) NOT NULL,
  `student_phoneNumber` varchar(20) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_image` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `students_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_Type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_Type`) VALUES
(197, 'admin', '$2y$12$QzBOPIIbPeG0dmTpfO7OZOXpBMNvLwVrVyhcENH.3FlVBoUun3oC6', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `coursestype` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD CONSTRAINT `course_schedule_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `coursestype` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`courses_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
