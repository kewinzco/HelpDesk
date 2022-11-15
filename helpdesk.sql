-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Nov 2022 um 14:01
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `helpdesk`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `Mitarbeiter-ID` int(11) NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Telefonnummer` int(4) NOT NULL,
  `Büro` varchar(10) NOT NULL,
  `E-Mailadresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ticketsystem`
--

CREATE TABLE `ticketsystem` (
  `Ticket-ID` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `Absender-Mail` varchar(30) NOT NULL,
  `Schlagwort` varchar(30) NOT NULL,
  `Text` mediumtext NOT NULL,
  `Unterschlagwort` varchar(30) DEFAULT NULL,
  `Screenshot` blob DEFAULT NULL,
  `Gelöst` tinyint(1) NOT NULL,
  `Lösung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zuständigkeit`
--

CREATE TABLE `zuständigkeit` (
  `Schlagwort` varchar(30) NOT NULL,
  `Mitarbeiter-ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`Mitarbeiter-ID`),
  ADD UNIQUE KEY `E-Mailadresse` (`E-Mailadresse`);

--
-- Indizes für die Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  ADD PRIMARY KEY (`Ticket-ID`),
  ADD KEY `Absender-Mail` (`Absender-Mail`);

--
-- Indizes für die Tabelle `zuständigkeit`
--
ALTER TABLE `zuständigkeit`
  ADD PRIMARY KEY (`Schlagwort`),
  ADD KEY `Mitarbeiter-ID` (`Mitarbeiter-ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  MODIFY `Ticket-ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  ADD CONSTRAINT `ticketsystem_ibfk_1` FOREIGN KEY (`Absender-Mail`) REFERENCES `mitarbeiter` (`E-Mailadresse`);

--
-- Constraints der Tabelle `zuständigkeit`
--
ALTER TABLE `zuständigkeit`
  ADD CONSTRAINT `zuständigkeit_ibfk_1` FOREIGN KEY (`Mitarbeiter-ID`) REFERENCES `mitarbeiter` (`Mitarbeiter-ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
