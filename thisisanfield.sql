-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:37 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thisisanfield`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(25) COLLATE ucs2_slovenian_ci NOT NULL,
  `password` varchar(25) COLLATE ucs2_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `golmani`
--

CREATE TABLE `golmani` (
  `ID` int(11) NOT NULL,
  `ime` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `tekst` text COLLATE ucs2_slovenian_ci NOT NULL,
  `slika` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Dumping data for table `golmani`
--

INSERT INTO `golmani` (`ID`, `ime`, `tekst`, `slika`) VALUES
(25, 'Loris Karius', 'Loris Karijus (rođen 22 juna 1993.) je njemački nogometaš, koji trenutno igra za Liverpool. Debitovao je za FC Mainz 05 1. decembra 2012. protiv Hanovera. U 2015-2016 sezone izabran je za trećeg najboljeg golmana u Bundesligi. Za Liverpool je potpisao u maju 2016. godine.', '../Slike/loris.jpg'),
(26, 'Alex Manninger', 'Alexander Manninger (Salzburg, 4. lipnja 1977.), austrijski nogometaš. Manninger igra za Liverpool. Za austrijsku reprezentaciju je igrao deset godina i sakupio preko 30 utakmica.', '../Slike/AlexManninger.jpg'),
(27, 'Simon Mignolet', 'Simon Luc Hildebert Mignolet born 6 March 1988)  is a Belgian professional footballer who plays as a goalkeeper for Premier League club Liverpool and the Belgium national team.', '../Slike/SimonMignolet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE `novosti` (
  `ID` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `sadrzaj` text COLLATE ucs2_slovenian_ci NOT NULL,
  `golman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`ID`, `naslov`, `sadrzaj`, `golman`) VALUES
(24, 'Jurgen Klopp nominiran za FIFA trenera godine', 'Menadzer Liverpoola Jurgen Klopp je usao u uzi izbor za trenera FIFA nagradu godine za 2016. godine. Njemac, koji je preuzeo uzde na Anfieldu u oktobru 2015. godine, vodio je Reds u finale  Lige Kupu i Lige Evrope.', 25),
(25, 'Liverpool potvrdio Danny Ings mora na operaciju koljena', 'Liverpool Football Club je potvrdio da Danny Ings mora na operaciju zbog povrede koljena usljed udara koji je zadobio u desnom koljenu tokom EFL Cupa u cetvrtom krugu, u mecu protiv Tottenham Hotspura koji je odigran prosle sedmice.', 26),
(26, 'Novost3', 'Sadrzaj novosti3', 27),
(27, 'Novost4', 'Sadrzaj novosti4 azuriran', 26);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `ID` int(11) NOT NULL,
  `imeiprezime` varchar(100) COLLATE ucs2_slovenian_ci NOT NULL,
  `telefon` varchar(15) COLLATE ucs2_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE ucs2_slovenian_ci NOT NULL,
  `sadrzaj` text COLLATE ucs2_slovenian_ci NOT NULL,
  `golman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_slovenian_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`ID`, `imeiprezime`, `telefon`, `email`, `sadrzaj`, `golman`) VALUES
(13, 'lejl bb', '061224433', 'lejlabajgo@yahoo.com', 'sadrzaj porukeeee', 26),
(14, 'lejla bajgoric', '061222333', 'lejlabajgoric@yahoo.com', 'sadrzaj poruke', 27),
(15, 'adnan bajgoric', '061456789', 'lllejlabajgoric@yahoo.com', 'jajjajajjaja', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `golmani`
--
ALTER TABLE `golmani`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `novosti`
--
ALTER TABLE `novosti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `golman` (`golman`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `golman` (`golman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `golmani`
--
ALTER TABLE `golmani`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `novosti`
--
ALTER TABLE `novosti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `novosti`
--
ALTER TABLE `novosti`
  ADD CONSTRAINT `novosti_ibfk_1` FOREIGN KEY (`golman`) REFERENCES `golmani` (`ID`);

--
-- Constraints for table `poruke`
--
ALTER TABLE `poruke`
  ADD CONSTRAINT `poruke_ibfk_1` FOREIGN KEY (`golman`) REFERENCES `golmani` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
