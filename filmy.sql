-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 11:39 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `id` int(11) NOT NULL,
  `nazwa_filmu` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `rok_wydania` year(4) NOT NULL,
  `gatunek` varchar(11) NOT NULL,
  `rezyser` varchar(20) NOT NULL,
  `ocena` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filmy`
--

INSERT INTO `filmy` (`id`, `nazwa_filmu`, `opis`, `rok_wydania`, `gatunek`, `rezyser`, `ocena`) VALUES
(2, 'Mufasa: Król Lew', 'Prequel opowiadający historię młodego Mufasy, przyszłego władcy Lwiej Ziemi.', '2024', 'Animowany, ', 'Barry Jenkins', 5.0),
(3, 'Avatar: Istota Wody', 'Sequel opowiadający o przygodach rodziny Jake\'a Sully na Pandorze.', '2022', 'Sci-Fi, Prz', 'James Cameron', 4.0),
(4, 'Interstellar', 'Zespół astronautów wyrusza w podróż w kosmos, aby znaleźć nowy dom dla ludzkości.', '2014', 'Sci-Fi, Dra', 'Christopher Nolan', 4.0),
(5, 'Gladiator', 'Historia generała zdradzonego przez cesarza, który zostaje gladiatorem, by dokonać zemsty.', '2000', 'Dramat, His', 'Ridley Scott', 4.0),
(6, 'Shrek', 'Ogr wyrusza w podróż, by uratować księżniczkę dla okrutnego lorda, ale znajduje prawdziwą miłość.', '2001', 'Animowany, ', 'Andrew Adamson, Vick', 4.0),
(7, 'Incepcja', 'Zespół specjalistów wprowadza sny, by manipulować wspomnieniami.', '2010', 'Sci-Fi, Thr', 'Christopher Nolan', 4.0),
(8, 'Toy Story', 'Zabawki w dziecięcym pokoju ożywają, a nowy przybysz wywołuje konflikt.', '1995', 'Animowany, ', 'John Lasseter', 4.0),
(9, 'Jurassic Park', 'Naukowcy odtwarzają dinozaury w parku rozrywki, ale chaos wkrótce się zaczyna.', '1993', 'Sci-Fi, Prz', 'Steven Spielberg', 4.0),
(10, 'Coco', 'Chłopiec wyrusza do Krainy Umarłych, by odnaleźć swoje korzenie i spełnić marzenia o muzyce.', '2017', 'Animowany, ', 'Lee Unkrich', 4.0),
(11, 'Spider-Man: Bez drogi do domu', 'Peter Parker mierzy się z konsekwencjami ujawnienia swojej tożsamości jako Spider-Man.', '2021', 'Akcja, Sci-', 'Jon Watts', 5.0),
(12, 'Top Gun: Maverick', 'Maverick powraca jako mentor nowego pokolenia pilotów.', '2022', 'Akcja, Dram', 'Joseph Kosinski', 4.0),
(13, 'The Batman', 'Mroczny rycerz Gotham mierzy się z seryjnym mordercą znanym jako Riddler.', '2022', 'Akcja, Thri', 'Matt Reeves', 5.0),
(14, 'Oppenheimer', 'Biografia naukowca, który odegrał kluczową rolę w stworzeniu bomby atomowej.', '2023', 'Dramat, His', 'Christopher Nolan', 4.8);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
