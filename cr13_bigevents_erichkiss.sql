-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mai 2021 um 12:40
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_bigevents_erichkiss`
--
CREATE DATABASE IF NOT EXISTS `cr13_bigevents_erichkiss` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr13_bigevents_erichkiss`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210514073341', '2021-05-14 09:33:58', 147);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `event_date`, `description`, `image`, `capacity`, `email`, `phone`, `address`, `web_address`, `type`) VALUES
(2, 'Lady with Fan', '2021-05-14 10:00:00', 'It is Gustav Klimt’s last, almost completed painting and a fascinating, self-confident female portrait.', 'https://events.wien.info/media/full/Dame_mit_F%C3%A4cher.jpg', 25, 'belvedere@belvedere.at', 12345, 'Prinz-Eugen-Straße 27, 1030 Wien', 'https://events.wien.info/en/139j/lady-with-fan/', 'Gallery'),
(3, 'Die Fledermaus', '2021-05-20 18:30:00', 'This quintessential Viennese operetta deserves to be enjoyed throughout the year, and not just on New Year\'s Eve.', 'https://events.wien.info/media/full/Presse_VolksoperDSC_6988.jpg', 100, 'volksoper@volksoper.at', 12345, 'Währinger Straße 78, 1090 Wien', 'https://events.wien.info/en/5y/die-fledermaus/', 'Opera'),
(4, 'Tosca', '2021-05-24 18:30:00', 'Rome, 1800: The city suffers from Scarpias, the Chief Constables, reign of terror.', 'https://events.wien.info/media/full/oper.jpg', 150, 'oper@oper.at', 1234567, 'Opernring 2, 1010 Wien', 'https://events.wien.info/en/for/tosca/', 'Opera'),
(5, 'Ballet: A Suite of Dances', '2021-05-23 19:00:00', 'An American neoclassical dance festival', 'https://events.wien.info/media/full/oper.jpg', 200, 'oper@oper.at', 1234567, 'Opernring 2, 1010 Wien', 'https://events.wien.info/en/11x4/ballet-a-suite-of-dances/', 'Ballet'),
(6, 'Beethoven – the total work of art', '2021-12-08 12:00:00', 'It was mainly the artists of the Vienna Secession who were addicted to the musical genius.', 'https://www.wien.info/resource/image/301260/1x1/350/350/c0b452d74fe0952e77a194bc11a8b755/Wz/inspiration-beethoven-leopold-museum-2020-3-.jpg', 10, 'office@leopoldmuseum.org', 555777, 'Museumsplatz 1, 1070 Vienna', 'https://www.wien.info/en/sightseeing/museums-exhibitions/inspiration-beethoven-leopold-museum-349038', 'Museum'),
(7, 'Tischtennis', '2016-01-01 00:00:00', 'Tischtennis spielen in der Halle', 'https://cdn.pixabay.com/photo/2016/04/01/09/42/athletics-1299524__340.png', 2, 'franz@franz.com', 12345, 'Währinger Straße', 'http://www.tischtennis.at', 'Sport');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
