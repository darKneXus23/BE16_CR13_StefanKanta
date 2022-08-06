-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr13_bigevents_stefankanta`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `description`, `image`, `capacity`, `email`, `phone`, `address`, `zip`, `city`, `url`, `type`) VALUES
(10, 'SURREAL! Imagining New Realities', '2022-08-11 10:00:00', 'the special exhibition SURREAL! Imagining New Realities at the Sigmund Freud Museum explores the tense relationship between psychoanalysis and surrealism.', 'brauner-somnambule-62ee155b0bbfe.jpg', 200, 'info@freud-museum.at', '+43 1 319 15 96', 'Berggasse 19', '1090', 'Vienna', 'www.freud-museum.at', 'Museum'),
(11, 'Vienna 1900 - Birth of Modernism', '2022-08-12 10:30:00', 'The Leopold Museum is a unique treasury of Viennese Modernism and the Wiener Werkstätte. The new permanent exhibition “Vienna 1900. Birth of Modernism” offers insights into the enormous abundance and diversity of the artistic and intellectual achievements', 'Wien1900-62ee1623f415f.jpg', 250, 'office@leopoldmuseum.org', '+43 1 525 70 0', 'Museumsplatz 1', '1070', 'Vienna', 'www.leopoldmuseum.org', 'Museum'),
(12, 'Theater im Park am Belvedere 2022', '2022-08-09 16:00:00', 'The private garden of Palais Schwarzenberg - a beautiful, two-hectare English natural garden in the 3rd district is also open in 2022 for communal cultural enjoyment under the open sky.', 'fb-cover2-mit-button-62ee169ce1e0a.jpg', 500, 'ticket@theaterimpark.at', '+43 1 588 93 40', 'Prinz-Eugen-Straße/Ecke Plößlgasse', '1030', 'Vienna', 'theaterimpark.at/programm-tickets', 'Theatre'),
(13, 'The Magic Flute', '2022-08-17 19:30:00', 'This famous opera by Mozart is about the exciting story of the young Prince Tamino sent by the Queen of the Night to rescue her daughter Pamina, who was abducted by the Sovereign Sarastro. Tamino receives a Magic Flute, Papageno - the Birdcatcher - a magi', 'kinderzauberflote-1-1-62ee17167340b.jpg', 150, 'office@marionettentheater.at', '+43 1 817 32 47', 'Schloss Schönbrunn, Hofratstrakt', '1130', 'Vienna', 'www.marionettentheater.at', 'Music'),
(14, 'A1 CEV BeachVolley Nations Cup Vienna 2022', '2022-08-07 09:45:00', 'After the legendary World Championships in 2017 and the European Championships in August 2021, Vienna will write beach volleyball history once again with the A1 CEV BeachVolley Nations Cup. For the first time ever, the European Beach Volleyball Team Champ', 'Beahvolleyball-62ee179f59461.jpg', 50, 'info@beachvolleyball.at', '+43 1 654 321', 'Lothringerstraße 22', '1030', 'Vienna', 'www.beachvolleyball.at', 'Sport'),
(15, 'ImPulsTanz 2022', '2022-08-19 18:15:00', 'Founded in 1984, ImPulsTanz – Vienna International Dance Festival has over the years evolved into the largest festival for contemporary dance and performance in the world.', 'ImPulsTanz-Akram-Khan-Company-62ee186ad82d2.jpg', 235, 'info@ImPulsTanz.com', '+43 1 654 321', 'Taborstraße 10', '1020', 'Vienna', 'www.ImPulsTanz.com', 'Music');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
