-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: sql305.byethost8.com
-- Létrehozás ideje: 2023. Ápr 14. 07:36
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `b8_33974532_teszt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `nem` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `iranyitoszam` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `kozterulet_tipusa` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `hazszam` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `profilkep` varchar(500) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `tel`, `nem`, `jelszo`, `varos`, `iranyitoszam`, `kozterulet_tipusa`, `hazszam`, `profilkep`) VALUES
(4, 'Cinty', 'farkascinti27@gmail.com', '06203333333', 'egyeb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Szeged', '123', 'utca', '123', 'image/profilkepek/64392eb18fc9f.jpeg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles`
--

CREATE TABLE `megrendeles` (
  `megrendeles_id` int(11) NOT NULL,
  `megrendelo` varchar(11) NOT NULL,
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
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
