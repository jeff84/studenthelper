-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 06. Feb 2012 um 16:19
-- Server Version: 5.1.58
-- PHP-Version: 5.3.8-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `swa3`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hochschule`
--

CREATE TABLE IF NOT EXISTS `hochschule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ortid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `typ` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `hochschule`
--

INSERT INTO `hochschule` (`id`, `ortid`, `name`, `typ`) VALUES
(1, 1, 'Johannes Gutenberg Universität', 1),
(2, 1, 'ÖÄÜSchule', 1),
(3, 1, 'ödsdoiasfääöü', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachhilfe`
--

CREATE TABLE IF NOT EXISTS `nachhilfe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ortid` int(11) NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `fach` varchar(30) CHARACTER SET latin1 NOT NULL,
  `zeitraum` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tage` varchar(30) CHARACTER SET latin1 NOT NULL,
  `text` varchar(300) CHARACTER SET latin1 NOT NULL,
  `typ` tinyint(1) NOT NULL,
  `erledigt` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `nachhilfe`
--

INSERT INTO `nachhilfe` (`id`, `userid`, `ortid`, `datetime`, `fach`, `zeitraum`, `tage`, `text`, `typ`, `erledigt`) VALUES
(1, 2, 1, '2012-01-29-22-23-29', 'Informatik', 'sofort', 'mo;di;do', 'Brauche dringend Nachhilfe in PHP!!!', 1, 0),
(2, 2, 1, '2012-02-02-14-05-42', 'Informatik', '02.02.2012', 'mo;di;mi;fr;sa;so', 'Ich kann auch kein SQL!!!', 1, 0),
(3, 2, 1, '2012-02-02-14-06-19', 'Nichts', 'nie', 'so', 'Ich kann doch nichts...', 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachrichten`
--

CREATE TABLE IF NOT EXISTS `nachrichten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uservid` int(11) NOT NULL,
  `useraid` int(11) NOT NULL,
  `datetime` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `betreff` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(300) CHARACTER SET latin1 NOT NULL,
  `gelesen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `nachrichten`
--

INSERT INTO `nachrichten` (`id`, `uservid`, `useraid`, `datetime`, `betreff`, `text`, `gelesen`) VALUES
(1, 3, 4, '2012-01-15-23-44-07', 'test', 'test', 0),
(2, 5, 5, '2012-01-16-11-16-35', 'test', 'test', 1),
(3, 6, 5, '2012-01-16-11-20-54', 'Testmail', 'Test', 1),
(4, 2, 2, '2012-01-19-12-23-26', 'test', 'test', 1),
(5, 2, 2, '2012-01-20-11-21-23', 'testnachricht', 'Werden Zeichen wie &#39 und &amp und &lt und &gt auch wirklich richtig gefiltert, wie das soll?', 1),
(6, 2, 2, '2012-02-05-14-27-51', 'Test', 'Testnachricht zur Anzeige... &#39; &amp; &lt; &gt;', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE IF NOT EXISTS `ort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `xcoords` varchar(9) CHARACTER SET latin1 NOT NULL,
  `ycoords` varchar(9) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `ort`
--

INSERT INTO `ort` (`id`, `name`, `xcoords`, `ycoords`) VALUES
(1, 'Mainz', '49.992512', '8.247585');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `orderid` varchar(50) CHARACTER SET latin1 NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`orderid`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `shoppingcart`
--

INSERT INTO `shoppingcart` (`orderid`, `name`, `quantity`, `price`) VALUES
('2', 'Birne', 4, 2),
('005', 'Birne', 2, 2),
('002', 'Wurst', 1, 5),
('002', 'Brot', 3, 7),
('Order001', 'Kartoffel', 2, 7),
('Order001', 'Apfel', 3, 2.55);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `hochschulid` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `vorname` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `nick`, `email`, `pass`, `hochschulid`, `name`, `vorname`) VALUES
(3, 'ta', 'ta@test.de', '7a6912ed89681c52573315e525d07a1d', 1, 'test', 'ta'),
(2, 'jeff', 'jwelle1@web.de', '425a4cd84f22da411dbc2e3aa00178b0', 1, 'Welzel', 'Jochen'),
(4, 'tb', 'tb@test.de', '167b9b668a5e7e156371ed4245122cd8', 1, 'test', 'tb'),
(5, 'testacc', 'dsobania@googlemail.com', 'feda952f98ec1b65f3f502a1e8af35a3', 1, 'Sobania', 'Dominik'),
(6, 'testacc2', 'erwgewg@erwgew.de', 'd68496d07933db81d2d08807b159d667', 1, 'S', 'D');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
