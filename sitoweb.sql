-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 30, 2023 alle 10:39
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitoweb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(10) NOT NULL,
  `servizio_shop` varchar(30) NOT NULL,
  `prezzo_shop` int(10) NOT NULL,
  `acquirente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `servizio_shop`, `prezzo_shop`, `acquirente`) VALUES
(3, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com'),
(4, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com'),
(10, 'Lavaggio Silver CITY/BERLINA', 15, 'giuliapollini01@gmail.com'),
(11, 'Lavaggio Silver CITY/BERLINA', 15, 'giuliapollini01@gmail.com'),
(12, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com'),
(13, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com'),
(14, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com'),
(15, 'Lavaggio Gold SUV/FUORI-STRADA', 25, 'giuliapollini01@gmail.com'),
(16, 'Lavaggio Silver CITY/BERLINA', 15, 'giuliapollini01@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `credit_card`
--

CREATE TABLE `credit_card` (
  `email` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `ncarta` int(30) NOT NULL,
  `scadenza` varchar(30) NOT NULL,
  `cvc` int(30) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `credit_card`
--

INSERT INTO `credit_card` (`email`, `nome`, `cognome`, `ncarta`, `scadenza`, `cvc`, `saldo`) VALUES
('giuliapollini01@gmail.com', 'Giulia', 'Pollini', 2147483647, '12/25', 458, 75797);

-- --------------------------------------------------------

--
-- Struttura della tabella `pacchetti_acquistati`
--

CREATE TABLE `pacchetti_acquistati` (
  `id` int(10) NOT NULL,
  `servizio_acquistato` varchar(30) NOT NULL,
  `prezzo` int(10) NOT NULL,
  `email_acquirente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pacchetti_acquistati`
--

INSERT INTO `pacchetti_acquistati` (`id`, `servizio_acquistato`, `prezzo`, `email_acquirente`) VALUES
(215213, 'Lavaggio Silver CITY/BERLINA', 15, 'dimaio.andrea96@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `servizi`
--

CREATE TABLE `servizi` (
  `lavaggio` varchar(30) NOT NULL,
  `prezzo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `servizi`
--

INSERT INTO `servizi` (`lavaggio`, `prezzo`) VALUES
('Lavaggio Diamond CITY/BERLINA', 45),
('Lavaggio Diamond SUV/FUORI-STR', 50),
('Lavaggio Gold CITY/BERLINA', 22),
('Lavaggio Gold SUV/FUORI-STRADA', 25),
('Lavaggio Platinum CITY/BERLINA', 35),
('Lavaggio Platinum SUV/FUORI-ST', 38),
('Lavaggio Silver CITY/BERLINA', 15),
('Lavaggio Silver SUV/FUORI-STRA', 18);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `nome_utente` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`nome_utente`, `password`, `email`) VALUES
('Admin', 'Admin', 'admin@gmail.com'),
('Andrea', 'c', 'dimaio.andrea96@gmail.com'),
('Giulia', 'a', 'giuliapollini01@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acquirente` (`acquirente`),
  ADD KEY `servizio_shop` (`servizio_shop`);

--
-- Indici per le tabelle `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`ncarta`),
  ADD KEY `email` (`email`);

--
-- Indici per le tabelle `pacchetti_acquistati`
--
ALTER TABLE `pacchetti_acquistati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_acquirente` (`email_acquirente`),
  ADD KEY `servizio_acquistato` (`servizio_acquistato`);

--
-- Indici per le tabelle `servizi`
--
ALTER TABLE `servizi`
  ADD PRIMARY KEY (`lavaggio`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `pacchetti_acquistati`
--
ALTER TABLE `pacchetti_acquistati`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215214;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`acquirente`) REFERENCES `utenti` (`email`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`servizio_shop`) REFERENCES `servizi` (`lavaggio`);

--
-- Limiti per la tabella `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`email`) REFERENCES `utenti` (`email`);

--
-- Limiti per la tabella `pacchetti_acquistati`
--
ALTER TABLE `pacchetti_acquistati`
  ADD CONSTRAINT `pacchetti_acquistati_ibfk_1` FOREIGN KEY (`email_acquirente`) REFERENCES `utenti` (`email`),
  ADD CONSTRAINT `pacchetti_acquistati_ibfk_2` FOREIGN KEY (`servizio_acquistato`) REFERENCES `servizi` (`lavaggio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
