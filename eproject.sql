-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 10:11 AM
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
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `created_at`) VALUES
(1, 'Abdul Rehman', 'ar@gmail.com', 'ar2003', '2025-01-26 11:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `theater_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` varchar(20) NOT NULL,
  `seating_category` enum('Gold','Platinum','Box') NOT NULL,
  `adult_tickets` int(11) NOT NULL,
  `kid_tickets` int(11) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `theater_id`, `movie_id`, `show_date`, `show_time`, `seating_category`, `adult_tickets`, `kid_tickets`, `total_cost`, `booking_time`) VALUES
(1, NULL, 1, 5, '2025-02-04', '4:00 PM', 'Gold', 3, 1, 2450.00, '2025-02-10 13:46:10'),
(2, NULL, 1, 5, '2025-02-04', '4:00 PM', 'Gold', 3, 1, 2450.00, '2025-02-10 13:51:27'),
(3, NULL, 1, 5, '2025-02-04', '4:00 PM', 'Gold', 3, 1, 2450.00, '2025-02-10 13:52:29'),
(4, NULL, 1, 5, '2025-02-04', '4:00 PM', 'Gold', 3, 1, 2450.00, '2025-02-10 13:54:14'),
(5, NULL, 1, 5, '2025-02-04', '4:00 PM', 'Gold', 3, 1, 2450.00, '2025-02-10 13:55:05'),
(6, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:03:18'),
(7, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:06:45'),
(8, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:07:35'),
(9, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:08:03'),
(10, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:08:21'),
(11, NULL, 1, 5, '2025-02-19', '7:00 PM', 'Platinum', 5, 2, 12000.00, '2025-02-10 14:08:31'),
(12, NULL, 1, 5, '2025-02-11', '1:00 PM', 'Platinum', 2, 1, 5000.00, '2025-02-10 14:12:41'),
(13, NULL, 2, 2, '2025-02-14', '4:00 PM', 'Platinum', 21, 21, 63000.00, '2025-02-11 10:19:03'),
(14, NULL, 2, 5, '2025-02-17', '1:00 PM', 'Platinum', 4, 3, 11000.00, '2025-02-13 10:14:22'),
(15, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:51:06'),
(16, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:52:49'),
(17, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:53:14'),
(18, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:53:58'),
(19, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:54:28'),
(20, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:54:50'),
(21, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:56:26'),
(22, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:56:36'),
(23, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:56:55'),
(24, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:57:34'),
(25, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:58:28'),
(26, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:59:00'),
(27, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:59:26'),
(28, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:59:37'),
(29, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 10:59:46'),
(30, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:00:01'),
(31, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:00:10'),
(32, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:01:17'),
(33, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:01:36'),
(34, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:01:49'),
(35, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:01:58'),
(36, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:02:06'),
(37, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:02:18'),
(38, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:02:32'),
(39, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:02:40'),
(40, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:12:17'),
(41, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:12:40'),
(42, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:14:08'),
(43, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:14:24'),
(44, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:14:47'),
(45, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:14:56'),
(46, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:15:41'),
(47, NULL, 2, 2, '2025-01-31', '4:00 PM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:15:52'),
(48, NULL, 2, 7, '2025-02-28', '1:00 PM', 'Box', 3, 0, 15000.00, '2025-02-16 11:17:22'),
(49, 2, 2, 5, '2025-02-17', '10:00 AM', 'Platinum', 1, 0, 2000.00, '2025-02-16 11:54:03'),
(50, 2, 1, 11, '2025-02-20', '4:00 PM', 'Platinum', 2, 0, 4000.00, '2025-02-16 11:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `trailer_link` varchar(2083) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT 0.0,
  `poster_url` varchar(2083) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `age_rating` varchar(10) DEFAULT NULL,
  `genre` varchar(200) NOT NULL,
  `movie_status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `description`, `trailer_link`, `rating`, `poster_url`, `release_date`, `age_rating`, `genre`, `movie_status`, `created_at`) VALUES
(2, 'Inception', 'A mind-bending thriller about dream manipulation and reality.', 'PujfgNSQ_RM', 8.8, 'img/movie_posters/inception.jpg', '2010-07-16', 'PG-13', 'Action, Thriller, Fiction, Mystery', 'Released', '2025-01-23 15:11:12'),
(5, 'Venom Last Dance', 'Eddie Brock and Venom must make a devastating decision as they\'re pursued by a mysterious military man and alien monsters from Venom\'s home world.', '__2bjWbetsA', 6.0, 'img/movie_posters/venom_the_last_dance_xlg.jpg', '2024-10-25', 'PG-13', 'Action, Thriller, Adventure', 'Released', '2025-01-25 11:55:08'),
(6, 'Jurassic World Rebirth', 'Five years post-Jurassic World Dominion, an expedition braves isolated equatorial regions to extract DNA from three massive prehistoric creatures for a groundbreaking medical breakthrough.', 'jan5CFWs9ic', 0.0, 'img/movie_posters/jurassic rebirth.jpg', '2025-07-02', 'PG', 'Action, Science-fiction, Adventure', 'Comming_Soon', '2025-02-07 12:16:24'),
(7, 'Superman', 'Follows the titular superhero as he reconciles his heritage with his human upbringing. He is the embodiment of truth, justice and the human way in a world that views this as old-fashioned.', 'uhUht6vAsMY', 8.5, 'img/movie_posters/superman.jpg', '2025-07-11', 'G', 'Action, Science-fiction, Adventure', 'Released', '2025-02-07 12:20:03'),
(9, 'Captain America: Brave New World', 'Sam Wilson, the new Captain America, finds himself in the middle of an international incident and must discover the motive behind a nefarious global plan.', '1pHDWnXmK7Y', 0.0, 'img/movie_posters/Captain America Brave New World.jpg', '2025-02-14', 'PG-13', 'Action, Science-fiction, Adventure', 'Comming_Soon', '2025-02-09 13:00:15'),
(10, 'Snow White', 'Live-action adaptation of the 1937 Disney animated film \'Snow White and the Seven Dwarfs\'.', 'iV46TJKL8cU', 0.0, 'img/movie_posters/Snow white.jpg', '2025-03-21', 'PG', 'Romance, Adventure', 'Comming_Soon', '2025-02-09 13:03:52'),
(11, 'Cash Out', 'Professional thief Mason attempts his biggest heist with his brother, robbing a bank. When it goes wrong, they\'re trapped inside surrounded by law enforcement. Tension rises as Mason negotiates with his ex-lover, the lead negotiator.', 'https://www.youtube.com/watch?v=aM4REXXrbvE', 7.7, 'img/movie_posters/Cash out.jpg', '2025-02-14', 'R', 'Action', 'Released', '2025-02-09 13:08:16'),
(12, 'Anak Kunt', 'A riot between residents. In the midst of that critical condition, there was a mother who gave birth to twins.', 'KhDS7vGTBpY', 0.0, 'img/movie_posters/Anak Kunti.jpg', '2025-02-20', 'PG-13', 'Horror', 'Comming_Soon', '2025-02-09 13:13:36'),
(13, 'Peter Pan\'s Neverland Nightmare', 'Wendy Darling strikes out in an attempt to rescue her brother Michael from \'the clutches of the evil Peter Pan.\' Along the way she meets Tinkerbell, who will be seen taking heroin, believing that it\'s pixie dust.', 'BL6M27fz_d0', 0.0, 'img/movie_posters/Peter Pans Neverland Nightmare.jpg', '2025-02-24', 'R', 'Thriller, Horror, Mystery, Adventure', 'Comming_Soon', '2025-02-09 13:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` tinyint(4) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `title`, `review`, `user_id`, `review_timestamp`, `rating`, `movie_id`) VALUES
(1, 'Good horror movie', 'its the few of the good horror movie that we got this year', 2, '2025-02-16 15:17:22', 9, 12),
(2, 'nice movie', 'i was on  my edge the whole time its really scary', 2, '2025-02-16 15:22:31', 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

CREATE TABLE `theaters` (
  `theater_id` int(11) NOT NULL,
  `theater_name` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available_seat_classes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`theater_id`, `theater_name`, `city`, `address`, `capacity`, `available_seat_classes`) VALUES
(1, 'Cineplex Karachi', 'Karachi', 'Plot 123, Main Boulevard, Karachi', 300, 'Gold, Platinum, Box'),
(2, 'newplex', 'karachi', 'sahre fasile', 200, 'Gold, Platinum, Box');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'fakhar', 'fak123@gmail.com', '1234'),
(2, 'fakhar', 'fk@gmail.com', '1234'),
(3, 'fahad', 'fd@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `theater_id` (`theater_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_movie_id` (`movie_id`);

--
-- Indexes for table `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`theater_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `theaters`
--
ALTER TABLE `theaters`
  MODIFY `theater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`theater_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
