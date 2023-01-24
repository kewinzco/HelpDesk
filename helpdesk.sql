-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jan 2023 um 10:43
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
  `EMailadresse` varchar(255) NOT NULL,
  `Hashwert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`MitarbeiterID`, `Vorname`, `Nachname`, `Telefonnummer`, `Büro`, `EMailadresse`, `Hashwert`) VALUES
(1, 'Kevin ', 'Klose', '0001', 'A301', 'kevin.klose@hof-university.de', 'https://formsubmit.co/ajax/16226ee088794398fdfc9911f7464bf1'),
(2, 'Matthias', 'Feil', '0002', 'A302', 'matthias.feil@hof-university.de', 'https://formsubmit.co/ajax/e1c8ab6cf84cb805b3ab50a8f4535a6e'),
(3, 'Regina', 'Richter', '003', 'A303', 'reginamarga.richter@hof-university.de', 'https://formsubmit.co/ajax/c5ff11483f1253e075b5843960816053'),
(4, 'Kevin2', 'Klose2', '1000', 'A1002', 'kevin.klose@aiv.hfoed.de', ''),
(5, 'Matthias2', 'Feil2', '2000', 'A1003', 'matthias.feil@aiv.hfoed.de', ''),
(6, 'Regina2', 'Richter2', '3000', 'A1004', 'reginamarga.richter@aiv.hfoed.de', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ticketsystem`
--

CREATE TABLE `ticketsystem` (
  `TicketID` int(11) NOT NULL,
  `Datum` datetime NOT NULL,
  `AbsenderMail` varchar(255) NOT NULL,
  `PCNummer` int(11) NOT NULL,
  `Ort` varchar(30) NOT NULL,
  `Schlagwort` varchar(30) NOT NULL,
  `Freitext` mediumtext NOT NULL,
  `Gelöst` tinyint(1) NOT NULL,
  `Lösung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `ticketsystem`
--

INSERT INTO `ticketsystem` (`TicketID`, `Datum`, `AbsenderMail`, `PCNummer`, `Ort`, `Schlagwort`, `Freitext`, `Gelöst`, `Lösung`) VALUES
(1, '2023-01-17 10:07:05', 'matthias.feil@aiv.hfoed.de', 321, 'Behörde', 'Hardware_Bildschirm', 'Mein Bildschirm flackert\r\n              ', 1, 'Bildschirm wurde ausgetauscht.'),
(2, '2023-01-17 10:08:26', 'reginamarga.richter@hof-university.de', 234, 'Behörde', 'Hardware_Drucker', 'Mein Drucker am PC druckt nicht.\r\n              ', 0, NULL),
(3, '2023-01-17 10:09:33', 'matthias.feil@aiv.hfoed.de', 4523, 'Außendienst', 'Hardware_PC', 'Mein Laptop hat einen Wasserschaden.\r\n              ', 1, 'Laptop wurde ausgetauscht und Mitarbeiter darauf hingewiesen das nächste Mal besser aufzupassen.'),
(4, '2023-01-17 10:10:16', 'reginamarga.richter@aiv.hfoed.de', 3456, 'Außendienst', 'Hardware_Handy', 'Ich kann nicht mehr telefonieren. Keine Netzwerkverbindung.\r\n              ', 0, NULL),
(5, '2023-01-17 10:11:02', 'kevin.klose@aiv.hfoed.de', 3451, 'Homeoffice', 'Hardware_Sonstiges', 'Meine Docking Station ist kaputt. Es geht gar nichts mehr!!\r\n              ', 0, NULL),
(6, '2023-01-17 10:12:21', 'reginamarga.richter@aiv.hfoed.de', 32145, 'Behörde', 'Netzwerk', 'Ich habe keine Netzwerkverbindung.\r\n              ', 1, 'Netzwerkkabel war defekt. Wurde ausgetauscht.'),
(7, '2023-01-17 10:14:49', 'kevin.klose@aiv.hfoed.de', 32145, 'Behörde', 'Software_Office', 'Mein Word lässt sich nicht mehr öffnen. Es hängt sich ständig auf.\r\n              ', 0, NULL),
(8, '2023-01-17 10:15:48', 'kevin.klose@aiv.hfoed.de', 34521, 'Homeoffice', 'Software_Adobe', 'Mein Adobe Konto ist abgelaufen. Ich kann die Software nicht mehr verwenden.\r\n              ', 0, NULL),
(9, '2023-01-17 10:17:22', 'reginamarga.richter@aiv.hfoed.de', 34521, 'Behörde', 'Software_Sonstiges', 'Ich kann Netflix nicht auf meinem PC installieren. Es kommt ständig die Meldung, dass der Download blockiert wird!!! Wie kann ich das lösen???\r\n              ', 1, 'Mitarbeiter wurde zu Schulung angemeldet und in einem laaaaangen Gespräche erklärt wieso man kein Netflix installieren darf.'),
(10, '2023-01-17 10:19:23', 'matthias.feil@aiv.hfoed.de', 32451, 'Homeoffice', 'IT-Sicherheit_SpamMail', 'Ich erhalte ständig komische Mails von xyz@abc.de mit unseriösen Links. Kann man da etwas machen um diese Adresse zu sperren??\r\n              ', 0, NULL),
(11, '2023-01-17 10:21:03', 'kevin.klose@aiv.hfoed.de', 34521, 'Behörde', 'IT-Sicherheit_Sonstiges', 'Ich möchte WOW installieren. Dafür brauche ich Admin-Rechte, ansonsten geht das anscheinend nicht ?!?!\r\n              ', 0, NULL),
(12, '2023-01-17 10:21:45', 'reginamarga.richter@aiv.hfoed.de', 32145, 'Behörde', 'Beratung', 'Was ist ein Computer? Braucht man den wirklich???\r\n              ', 0, NULL),
(13, '2023-01-17 10:23:41', 'matthias.feil@aiv.hfoed.de', 321451, 'Behörde', 'Sonstiges', 'Meine Maus ist verstaubt und die Tastatur klebt. Kann das jemand reinigen??\r\n              ', 1, 'Mitarbeiter wurden Putzmittel gegeben.'),
(14, '2023-01-17 10:26:46', 'reginamarga.richter@aiv.hfoed.de', 3245, 'Behörde', 'Hardware_Drucker', 'Der Drucker hat meine Haare gefressen ;)\r\n              ', 0, NULL),
(15, '2023-01-17 10:27:35', 'kevin.klose@aiv.hfoed.de', 3214, 'Behörde', 'Sonstiges', 'Mein Radio hat einen Kurzschluss ausgelöst. Was soll ich jetzt machen???\r\n              ', 0, NULL),
(16, '2023-01-17 10:28:47', 'matthias.feil@aiv.hfoed.de', 3241, 'Homeoffice', 'IT-Sicherheit_Sonstiges', 'Ich habe einen Link per SMS gekriegt und diesen im PC eingegeben. Nun kann ich nichts mehr machen und es kommen ganz seltsame Meldungen!!!\r\n              ', 1, 'PC wurde neu aufgesetzt und gesicherte Daten übertragen. Der Mitarbeiter wird für eine IT-Sicherheits-Schulung angemeldet.'),
(17, '2023-01-17 10:30:06', 'kevin.klose@aiv.hfoed.de', 34521, 'Behörde', 'Software_Sonstiges', 'Mein XAMPP funktioniert nicht!!! Hilfe!!!!\r\n              ', 0, NULL),
(18, '2023-01-17 10:31:27', 'reginamarga.richter@aiv.hfoed.de', 3421, 'Behörde', 'Software_Office', 'Mein Fenster ist weg. Was soll ich tun??\r\n              ', 1, 'Wurde vor Ort gelöst. Einfach Fenster wieder öffnen :)'),
(19, '2023-01-17 10:32:14', 'matthias.feil@aiv.hfoed.de', 333221, 'Behörde', 'Hardware_Handy', 'Bei meinem Handy ist das Display kaputt.\r\n              ', 0, NULL),
(20, '2023-01-17 10:33:26', 'kevin.klose@aiv.hfoed.de', 3214, 'Behörde', 'Hardware_Bildschirm', 'Ich hätte gerne einen Minion als Hintergrundbildschirm. Wie geht das??\r\n              ', 0, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zustaendigkeit`
--

CREATE TABLE `zustaendigkeit` (
  `Schlagwort` varchar(30) NOT NULL,
  `MitarbeiterEMail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `zustaendigkeit`
--

INSERT INTO `zustaendigkeit` (`Schlagwort`, `MitarbeiterEMail`) VALUES
('Hardware_Drucker', 'kevin.klose@hof-university.de'),
('IT-Sicherheit_SpamMail', 'kevin.klose@hof-university.de'),
('Netzwerk', 'kevin.klose@hof-university.de'),
('Software_Sonstiges', 'kevin.klose@hof-university.de'),
('Beratung', 'matthias.feil@hof-university.de'),
('Hardware_Handy', 'matthias.feil@hof-university.de'),
('Hardware_Sonstiges', 'matthias.feil@hof-university.de'),
('IT-Sicherheit_Sonstiges', 'matthias.feil@hof-university.de'),
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
  ADD PRIMARY KEY (`Schlagwort`),
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
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
