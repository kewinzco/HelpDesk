-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Nov 2022 um 13:26
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
CREATE DATABASE IF NOT EXISTS `helpdesk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `helpdesk`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `MitarbeiterID` int(11) NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Telefonnummer` varchar(30) NOT NULL,
  `Büro` varchar(10) NOT NULL,
  `EMailadresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`MitarbeiterID`, `Vorname`, `Nachname`, `Telefonnummer`, `Büro`, `EMailadresse`) VALUES
(1, 'Kevin ', 'Klose', '0001', 'A301', 'kevin.klose@hof-university.de'),
(2, 'Matthias', 'Feil', '0002', 'A302', 'matthias.feil@hof-university.de'),
(3, 'Regina', 'Richter', '003', 'A303', 'reginamarga.richter@hof-university.de'),
(4, 'Kevin2', 'Klose2', '1000', 'A1002', 'kevin.klose@aiv.hfoed.de'),
(5, 'Matthias2', 'Feil2', '2000', 'A1003', 'matthias.feil@aiv.hfoed.de'),
(6, 'Regina2', 'Richter2', '3000', 'A1004', 'reginamarga.richter@aiv.hfoed.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ticketsystem`
--

CREATE TABLE `ticketsystem` (
  `TicketID` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `AbsenderMail` varchar(255) NOT NULL,
  `Schlagwort` varchar(30) NOT NULL,
  `Text` mediumtext NOT NULL,
  `Unterschlagwort` varchar(30) DEFAULT NULL,
  `Screenshot` blob DEFAULT NULL,
  `Gelöst` tinyint(1) NOT NULL,
  `Lösung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zustaendigkeit`
--

CREATE TABLE `zustaendigkeit` (
  `schlagwort` varchar(30) NOT NULL,
  `MitarbeiterEMail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `zustaendigkeit`
--

INSERT INTO `zustaendigkeit` (`schlagwort`, `MitarbeiterEMail`) VALUES
('Hardware_Drucker', 'kevin.klose@hof-university.de'),
('IT-Sicherheit', 'kevin.klose@hof-university.de'),
('Netzwerk', 'kevin.klose@hof-university.de'),
('Software_Sonstiges', 'kevin.klose@hof-university.de'),
('Beratung', 'matthias.feil@hof-university.de'),
('Hardware_Handy', 'matthias.feil@hof-university.de'),
('Hardware_Sonstiges', 'matthias.feil@hof-university.de'),
('Software_Office', 'matthias.feil@hof-university.de'),
('Hardware_Bildschirm', 'reginamarga.richter@hof-university.de'),
('Hardware_PC', 'reginamarga.richter@hof-university.de'),
('Software_Adobe', 'reginamarga.richter@hof-university.de'),
('Sonstiges', 'reginamarga.richter@hof-university.de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`MitarbeiterID`),
  ADD UNIQUE KEY `E-Mailadresse` (`EMailadresse`);

--
-- Indizes für die Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `Absender-Mail` (`AbsenderMail`);

--
-- Indizes für die Tabelle `zustaendigkeit`
--
ALTER TABLE `zustaendigkeit`
  ADD PRIMARY KEY (`schlagwort`),
  ADD KEY `zustaendigkeit_ibfk_1` (`MitarbeiterEMail`) USING BTREE;

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `MitarbeiterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ticketsystem`
--
ALTER TABLE `ticketsystem`
  ADD CONSTRAINT `ticketsystem_ibfk_1` FOREIGN KEY (`AbsenderMail`) REFERENCES `mitarbeiter` (`EMailadresse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `zustaendigkeit`
--
ALTER TABLE `zustaendigkeit`
  ADD CONSTRAINT `zustaendigkeit_ibfk_1` FOREIGN KEY (`MitarbeiterEMail`) REFERENCES `mitarbeiter` (`EMailadresse`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
