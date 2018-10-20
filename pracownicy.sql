-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Wrz 2016, 23:11
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pracownicy`
--
CREATE DATABASE IF NOT EXISTS `pracownicy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pracownicy`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `Id_adres` int(11) NOT NULL,
  `Miejscowosc` text NOT NULL,
  `Kod_pocztowy` varchar(6) NOT NULL,
  `Ulica` varchar(80) NOT NULL,
  `Nr_domu` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`Id_adres`, `Miejscowosc`, `Kod_pocztowy`, `Ulica`, `Nr_domu`) VALUES
(1, 'Pulawy', '24-100', 'Wojska Polskiego', 15),
(2, 'Lublin', '20-100', 'Lubelska', 45),
(3, 'Warszawa', '01-100', 'Warszawska', 54),
(4, 'Markuszow', '24-100', 'A. Mickiewicza', 23),
(7, 'Poznan', '14-100', 'Wojska', 55),
(8, 'Szczecin', '10-500', 'Partyzantow', 20),
(9, 'Bialystok', '10-300', 'Podolska', 120),
(10, 'Bydgoszcz', '23-500', 'Kuny', 41),
(11, 'Waszyngton', '01-001', 'Virginia Avenue', 12),
(12, 'Nowy York', '05-100', 'Scott Circle', 101),
(13, 'Wroclaw', '10-090', 'Lalki', 31),
(14, 'Warszawa', '01-100', 'Potoki', 72),
(15, 'Torun', '41-123', 'Romera', 85),
(16, 'Opole', '13-213', 'Marsa', 73),
(17, 'Zielona Gora', '18-962', 'Oczary', 63),
(18, 'Olsztyn', '12-454', 'Duracza', 68),
(19, 'Krakow', '12-630', 'Targowa', 2),
(20, 'Kielce', '11-852', 'Galijska', 37),
(21, 'Rzeszow', '23-964', 'Ustronie', 85),
(22, 'Katowice', '71-258', 'Gutta', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoba`
--

CREATE TABLE `osoba` (
  `Id_osoba` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` text NOT NULL,
  `PESEL` bigint(11) NOT NULL,
  `Plec` bit(1) NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Id_adresu` int(11) DEFAULT NULL,
  `Id_stanowiska` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `osoba`
--

INSERT INTO `osoba` (`Id_osoba`, `Imie`, `Nazwisko`, `PESEL`, `Plec`, `Data_urodzenia`, `Id_adresu`, `Id_stanowiska`) VALUES
(1, 'Piotr', 'Kowalski', 87092105866, b'0', '1987-09-21', 1, 2),
(2, 'Mateusz', 'Nowak', 90101205465, b'1', '1990-10-12', 2, 4),
(4, 'Katarzyna', 'Komosa', 98745632154, b'1', '1980-09-01', NULL, NULL),
(5, 'Anna', 'Kozak', 12345678910, b'1', '1960-09-02', NULL, NULL),
(6, 'Stanislaw', 'Leszek', 12365498701, b'0', '1930-01-07', 7, 3),
(7, 'Halina', 'Pilat', 12345678954, b'1', '1950-09-01', 9, 7),
(8, 'Laura', 'Abramek', 31265498721, b'1', '1945-04-01', 14, 13),
(9, 'Jacek', 'Przewloka', 98765412310, b'0', '2016-09-01', 20, 5),
(10, 'Adam', 'Duda', 65498732152, b'0', '2016-09-08', 11, 8),
(11, 'Radoslaw', 'Sienkiewicz', 65498232174, b'0', '2016-09-01', 21, 21),
(12, 'Rafal', 'Dudek', 54698721352, b'0', '2016-09-09', 4, 16),
(13, 'Natalia', 'Walczak', 65498231263, b'1', '2016-09-23', 5, 10),
(14, 'Tamara', 'Michalak', 12345698754, b'1', '2016-09-09', 9, 6),
(15, 'Zofia', 'Szewczyk', 45678921302, b'1', '2016-09-09', 10, 12),
(16, 'Zuzanna', 'Wilk', 54698712300, b'1', '2016-09-24', 16, 18),
(17, 'Ada', 'Szulc', 54632178952, b'1', '2016-09-11', 9, 14),
(18, 'Anastazja', 'Stefaniak', 96385274103, b'1', '2016-09-16', 10, 15),
(19, 'Kacper', 'Krupa', 65498732169, b'0', '2016-09-12', 8, 15),
(20, 'Krzysztof', 'Makowski', 45678932154, b'0', '2016-09-09', 17, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowisko`
--

CREATE TABLE `stanowisko` (
  `Id_stanowisko` int(11) NOT NULL,
  `R_stanowiska` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `stanowisko`
--

INSERT INTO `stanowisko` (`Id_stanowisko`, `R_stanowiska`) VALUES
(1, 'Informatyk'),
(2, 'Przedstawiciel handlowy'),
(3, 'Stolarz'),
(4, 'Lekarz'),
(5, 'Prawnik'),
(6, 'Nauczyciel'),
(7, 'Doradca podatkowy'),
(8, 'Tlumacz'),
(9, 'Farmaceuta'),
(10, 'Konstruktor'),
(11, 'Mechanik'),
(12, 'Analityk rynku'),
(13, 'Agent celny'),
(14, 'Komornik '),
(15, 'Automatyk'),
(16, 'Ekonomista'),
(17, 'Inzynier srodowiska'),
(18, 'Kurator sadowy'),
(19, 'Pracownik biurowy'),
(20, 'Notariusz'),
(21, 'Radca prawny');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`Id_adres`);

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`Id_osoba`);

--
-- Indexes for table `stanowisko`
--
ALTER TABLE `stanowisko`
  ADD PRIMARY KEY (`Id_stanowisko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `Id_adres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT dla tabeli `osoba`
--
ALTER TABLE `osoba`
  MODIFY `Id_osoba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `stanowisko`
--
ALTER TABLE `stanowisko`
  MODIFY `Id_stanowisko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for adres
--

--
-- Metadata for osoba
--

--
-- Zrzut danych tabeli `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'pracownicy', 'osoba', '[]', '2016-09-18 18:12:19');

--
-- Metadata for stanowisko
--

--
-- Metadata for pracownicy
--

--
-- Zrzut danych tabeli `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('pracownicy', 'osoba', 'Id_adresu', 'pracownicy', 'adres', 'Id_adres'),
('pracownicy', 'osoba', 'Id_stanowiska', 'pracownicy', 'stanowisko', 'Id_stanowisko');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
