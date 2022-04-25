-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 03:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tep`
--

-- --------------------------------------------------------

--
-- Table structure for table `appartiene`
--

CREATE TABLE `appartiene` (
  `NR_AVS` varchar(50) NOT NULL,
  `ID_GRUPPO` int(11) NOT NULL,
  `DATA_AGGIUNTA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appartiene`
--

INSERT INTO `appartiene` (`NR_AVS`, `ID_GRUPPO`, `DATA_AGGIUNTA`) VALUES
('765.6666.6566.54', 1, '2022-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `attivita`
--

CREATE TABLE `attivita` (
  `NOME_ATTIVITA` varchar(50) NOT NULL,
  `DESCRIZIONE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attivita`
--

INSERT INTO `attivita` (`NOME_ATTIVITA`, `DESCRIZIONE`) VALUES
('Installazione', 'Boh');

-- --------------------------------------------------------

--
-- Table structure for table `gruppi`
--

CREATE TABLE `gruppi` (
  `ID_GRUPPO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRIZIONE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gruppi`
--

INSERT INTO `gruppi` (`ID_GRUPPO`, `NOME`, `DESCRIZIONE`) VALUES
(1, 'operai', 'Gruppo degli operai');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID_REPORT` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `DURATA` time NOT NULL,
  `ID_GRUPPO` int(11) NOT NULL,
  `NR_AVS` varchar(50) NOT NULL DEFAULT '0',
  `ATTIVITA` varchar(50) NOT NULL DEFAULT '0',
  `DESCRIZIONE` char(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID_REPORT`, `DATA`, `DURATA`, `ID_GRUPPO`, `NR_AVS`, `ATTIVITA`, `DESCRIZIONE`) VALUES
(1, '2022-04-25', '00:05:00', 1, '765.6666.6566.54', 'Installazione', 'Easy');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `NR_AVS` varchar(50) NOT NULL DEFAULT '',
  `NOME` varchar(50) NOT NULL,
  `COGNOME` varchar(50) NOT NULL,
  `NR1` varchar(50) NOT NULL,
  `NR2` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SESSO` varchar(50) DEFAULT NULL,
  `INDIRIZZO` varchar(50) NOT NULL,
  `CAP` varchar(50) NOT NULL,
  `DATA_DI_NASCITA` date NOT NULL,
  `DATA_INIZIO` date NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `RUOLO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`NR_AVS`, `NOME`, `COGNOME`, `NR1`, `NR2`, `EMAIL`, `SESSO`, `INDIRIZZO`, `CAP`, `DATA_DI_NASCITA`, `DATA_INIZIO`, `PASSWORD`, `RUOLO`) VALUES
('765.6666.6566.54', 'Fabio', 'Gola', '0796436244', NULL, 'fabio.gola@icloud.com', 'M', 'Via sottomontagna 64', '6593', '1998-06-10', '2022-04-25', 'Fabio1111', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appartiene`
--
ALTER TABLE `appartiene`
  ADD PRIMARY KEY (`NR_AVS`,`ID_GRUPPO`,`DATA_AGGIUNTA`),
  ADD KEY `ID_GRUPPO` (`ID_GRUPPO`);

--
-- Indexes for table `attivita`
--
ALTER TABLE `attivita`
  ADD PRIMARY KEY (`NOME_ATTIVITA`);

--
-- Indexes for table `gruppi`
--
ALTER TABLE `gruppi`
  ADD PRIMARY KEY (`ID_GRUPPO`),
  ADD UNIQUE KEY `NOME` (`NOME`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_REPORT`),
  ADD KEY `FK_report_appartiene` (`NR_AVS`),
  ADD KEY `FK_report_appartiene_2` (`ID_GRUPPO`),
  ADD KEY `FK_report_attivita` (`ATTIVITA`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`NR_AVS`),
  ADD UNIQUE KEY `NR1` (`NR1`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `NR2` (`NR2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gruppi`
--
ALTER TABLE `gruppi`
  MODIFY `ID_GRUPPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID_REPORT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartiene`
--
ALTER TABLE `appartiene`
  ADD CONSTRAINT `ID_GRUPPO` FOREIGN KEY (`ID_GRUPPO`) REFERENCES `gruppi` (`ID_GRUPPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `NR_AVS` FOREIGN KEY (`NR_AVS`) REFERENCES `utenti` (`NR_AVS`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_report_appartiene` FOREIGN KEY (`NR_AVS`) REFERENCES `appartiene` (`NR_AVS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_report_appartiene_2` FOREIGN KEY (`ID_GRUPPO`) REFERENCES `appartiene` (`ID_GRUPPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_report_attivita` FOREIGN KEY (`ATTIVITA`) REFERENCES `attivita` (`NOME_ATTIVITA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
