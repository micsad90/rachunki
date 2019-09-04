-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Wrz 2019, 22:09
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rachunki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czynsz`
--

CREATE TABLE `czynsz` (
  `id_czynszu` int(2) NOT NULL,
  `mieszkanie` int(10) NOT NULL,
  `garaz` int(10) NOT NULL,
  `smieci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czynsz`
--

INSERT INTO `czynsz` (`id_czynszu`, `mieszkanie`, `garaz`, `smieci`) VALUES
(1, 1600, 200, 54);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszty_licznikow`
--

CREATE TABLE `koszty_licznikow` (
  `id_kosztow_licznikow` int(2) NOT NULL,
  `energia` float NOT NULL,
  `zimna_woda` float NOT NULL,
  `ciepla_woda` float NOT NULL,
  `ogrzewanie` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `koszty_licznikow`
--

INSERT INTO `koszty_licznikow` (`id_kosztow_licznikow`, `energia`, `zimna_woda`, `ciepla_woda`, `ogrzewanie`) VALUES
(1, 0.75, 12.5, 25, 100);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rachunki`
--

CREATE TABLE `rachunki` (
  `id_rachunku` int(5) NOT NULL,
  `miesiac` text COLLATE utf8_polish_ci NOT NULL,
  `rok` float NOT NULL,
  `mieszkanie` float NOT NULL,
  `garaz` float NOT NULL,
  `smieci` float NOT NULL,
  `energia` float NOT NULL,
  `zimna_woda` float NOT NULL,
  `ciepla_woda` float NOT NULL,
  `ogrzewanie` float NOT NULL,
  `suma` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `rachunki`
--

INSERT INTO `rachunki` (`id_rachunku`, `miesiac`, `rok`, `mieszkanie`, `garaz`, `smieci`, `energia`, `zimna_woda`, `ciepla_woda`, `ogrzewanie`, `suma`) VALUES
(16, 'Kwiecien', 2019, 2600, 400, 54, 0, 0, 0, 0, 3054),
(17, 'Maj', 2019, 1600, 200, 54, 79.545, 52.875, 20.975, 0, 2007.4),
(18, 'Czerwiec', 2019, 1600, 200, 54, 80.145, 55.4875, 33.025, 0, 2022.66),
(19, 'Lipiec', 2019, 1600, 200, 54, 92.7, 46.8875, 27.7, 0, 2021.29),
(20, 'Sierpien', 2019, 1600, 200, 54, 70.0875, 42.4375, 36.925, 0, 2003.45);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stany_licznikow`
--

CREATE TABLE `stany_licznikow` (
  `id_stanow_licznikow` int(10) NOT NULL,
  `miesiac` text COLLATE utf8_polish_ci NOT NULL,
  `rok` int(4) NOT NULL,
  `energia` float NOT NULL,
  `zimna_woda` float NOT NULL,
  `ciepla_woda` float NOT NULL,
  `ogrzewanie` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stany_licznikow`
--

INSERT INTO `stany_licznikow` (`id_stanow_licznikow`, `miesiac`, `rok`, `energia`, `zimna_woda`, `ciepla_woda`, `ogrzewanie`) VALUES
(16, 'Marzec', 2019, 1573.73, 29.697, 14.884, 0),
(17, 'Kwiecien', 2019, 1573.73, 29.697, 14.884, 0),
(18, 'Maj', 2019, 1679.79, 33.927, 15.723, 0),
(19, 'Czerwiec', 2019, 1786.65, 38.366, 17.044, 0),
(20, 'Lipiec', 2019, 1910.25, 42.117, 18.152, 0),
(21, 'Sierpien', 2019, 2003.7, 45.512, 19.629, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czynsz`
--
ALTER TABLE `czynsz`
  ADD PRIMARY KEY (`id_czynszu`);

--
-- Indeksy dla tabeli `koszty_licznikow`
--
ALTER TABLE `koszty_licznikow`
  ADD PRIMARY KEY (`id_kosztow_licznikow`);

--
-- Indeksy dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  ADD PRIMARY KEY (`id_rachunku`);

--
-- Indeksy dla tabeli `stany_licznikow`
--
ALTER TABLE `stany_licznikow`
  ADD PRIMARY KEY (`id_stanow_licznikow`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `czynsz`
--
ALTER TABLE `czynsz`
  MODIFY `id_czynszu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `koszty_licznikow`
--
ALTER TABLE `koszty_licznikow`
  MODIFY `id_kosztow_licznikow` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `rachunki`
--
ALTER TABLE `rachunki`
  MODIFY `id_rachunku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `stany_licznikow`
--
ALTER TABLE `stany_licznikow`
  MODIFY `id_stanow_licznikow` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
