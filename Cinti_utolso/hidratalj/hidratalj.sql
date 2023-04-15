-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230408.0ff3f10134
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 09. 12:04
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hidratalj`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `kosar_id` int(11) NOT NULL,
  `kosar_kep` varchar(100) NOT NULL,
  `kosar_nev` varchar(30) NOT NULL,
  `kosar_ar` int(11) NOT NULL,
  `kosar_db` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles`
--

CREATE TABLE `megrendeles` (
  `megrendeles_id` int(11) NOT NULL,
  `megrendeles_kep` varchar(30) NOT NULL,
  `megrendeles_nev` varchar(24) NOT NULL,
  `megrendeles_db` int(11) NOT NULL,
  `megrendeles_ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termekek_id` int(11) NOT NULL,
  `kep` varchar(100) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termekek_id`, `kep`, `nev`, `ar`) VALUES
(1, 'elso_kulacs.jpeg', 'Szivárvány', 3000),
(2, 'kulacs.jpeg', 'Kékség', 4000),
(3, 'hatodik_kulacs.jpeg', 'Cukiság', 1500),
(4, 'negyedik_kulacs.jpeg', 'Koala', 1500),
(5, 'otodik_kulacs.jpeg', 'Lovacska', 1500),
(6, 'utolso_kulacs.jpeg', 'Fém kulacs', 3000),
(7, 'elso_termosz.jpeg', 'Fém termosz', 5000),
(8, 'masodik_termosz.jpeg', 'Átmenetes termosz', 3000),
(9, 'negyedik_termosz.jpeg', 'Unikornis', 1500),
(10, 'hatodik_termosz.jpeg', 'Virág', 6000),
(11, 'nyolcadik_termosz.jpeg', 'Cukiság', 4000),
(12, 'otodik_termosz.jpeg', 'Fa termosz', 5000);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`kosar_id`);

--
-- A tábla indexei `megrendeles`
--
ALTER TABLE `megrendeles`
  ADD PRIMARY KEY (`megrendeles_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termekek_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `kosar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  MODIFY `megrendeles_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termekek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
