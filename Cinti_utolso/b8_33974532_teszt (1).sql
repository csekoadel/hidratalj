-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: sql305.byethost8.com
-- Létrehozás ideje: 2023. Ápr 15. 03:47
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
  `profilkep` varchar(500) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `tel`, `nem`, `jelszo`, `varos`, `iranyitoszam`, `kozterulet_tipusa`, `hazszam`, `profilkep`, `admin`) VALUES
(4, 'Cinty', 'farkascinti27@gmail.com', '06203333333', 'egyeb', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Szeged', '123', 'utca', '123', 'image/profilkepek/64392eb18fc9f.jpeg', 1),
(7, 'teszt', 'teszt@gmail.com', '06203333333', 'egyeb', '34228a532093278fcdc65c3a1338482e8bdc44f6', 'Szeged', '2', 'utca', '3', NULL, NULL),
(8, 'almafa 333333', 'almafa@almafa.com', '06203333333', 'ferfi', '7cdab41b409db1d38c13dfc9f5b6635dd7b6352a', 'asd', '3', 'utca', '7', 'image/profilkepek/643990b90f5b9.jpeg', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles`
--

CREATE TABLE `megrendeles` (
  `megrendeles_id` int(11) NOT NULL,
  `felhasznalo_id` int(11) NOT NULL,
  `megrendeles_nev` varchar(24) NOT NULL,
  `rendeles_ideje` datetime DEFAULT NULL,
  `osszesen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `megrendeles`
--

INSERT INTO `megrendeles` (`megrendeles_id`, `felhasznalo_id`, `megrendeles_nev`, `rendeles_ideje`, `osszesen`) VALUES
(9, 4, 'Cinty', '2023-04-14 15:24:08', '33000'),
(10, 8, 'almafa', '2023-04-14 16:02:41', '13000'),
(12, 8, 'almafa', '2023-04-14 18:15:13', '3000'),
(14, 8, 'almafa', '2023-04-14 19:43:42', '13500'),
(15, 4, 'Cinty', '2023-04-14 21:33:01', '11500'),
(16, 4, 'Cinty', '2023-04-14 21:34:43', '11500'),
(17, 4, 'Cinty', '2023-04-14 21:36:07', '11500'),
(18, 4, 'Cinty', '2023-04-14 21:36:49', '11500'),
(19, 4, 'Cinty', '2023-04-14 21:42:02', '4000'),
(20, 4, 'Cinty', '2023-04-14 21:42:46', '3000');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megrendeles_termekek`
--

CREATE TABLE `megrendeles_termekek` (
  `id` int(11) NOT NULL,
  `megrendeles_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `termekek_nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` decimal(10,2) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `megrendeles_termekek`
--

INSERT INTO `megrendeles_termekek` (`id`, `megrendeles_id`, `termek_id`, `termekek_nev`, `ar`, `mennyiseg`) VALUES
(6, 10, 11, 'Cukiság', '4000.00', 1),
(5, 10, 1, 'Szivárvány', '3000.00', 3),
(3, 9, 1, 'Szivárvány', '3000.00', 1),
(4, 9, 6, 'Fém kulacs', '3000.00', 10),
(7, 11, 1, 'Szivárvány', '3000.00', 1),
(8, 12, 6, 'Fém kulacs', '3000.00', 1),
(9, 13, 6, 'Fém kulacs', '3000.00', 1),
(10, 14, 6, 'Fém kulacs', '3000.00', 4),
(11, 14, 9, 'Unikornis', '1500.00', 1),
(12, 15, 12, 'Fa termosz', '5000.00', 2),
(13, 15, 3, 'Cukiság', '1500.00', 1),
(14, 16, 12, 'Fa termosz', '5000.00', 2),
(15, 16, 3, 'Cukiság', '1500.00', 1),
(16, 17, 12, 'Fa termosz', '5000.00', 2),
(17, 17, 3, 'Cukiság', '1500.00', 1),
(18, 18, 12, 'Fa termosz', '5000.00', 2),
(19, 18, 3, 'Cukiság', '1500.00', 1),
(20, 19, 2, 'Kékség', '4000.00', 1),
(21, 20, 6, 'Fém kulacs', '3000.00', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termekek_id` int(11) NOT NULL,
  `kep` varchar(100) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `ar` int(11) NOT NULL,
  `kategoria` varchar(200) DEFAULT NULL,
  `leiras` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termekek_id`, `kep`, `nev`, `ar`, `kategoria`, `leiras`) VALUES
(1, 'elso_kulacs.jpeg', 'Szivárvány', 3000, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(2, 'kulacs.jpeg', 'Kékség', 4000, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(3, 'hatodik_kulacs.jpeg', 'Cukiság', 1500, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(4, 'negyedik_kulacs.jpeg', 'Koala', 1500, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(5, 'otodik_kulacs.jpeg', 'Lovacska', 1500, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(6, 'utolso_kulacs.jpeg', 'Fém kulacs', 3000, 'Kulacs', ' <p>Kulacsaink különböző prémium minőségű agyagokból készültek.</p><p>Lányoknak és nőknek ajánljuk.</p>'),
(7, 'elso_termosz.jpeg', 'Fém termosz', 5000, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>'),
(8, 'masodik_termosz.jpeg', 'Átmenetes termosz', 3000, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>'),
(9, 'negyedik_termosz.jpeg', 'Unikornis', 1500, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>'),
(10, 'hatodik_termosz.jpeg', 'Virág', 6000, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>'),
(11, 'nyolcadik_termosz.jpeg', 'Cukiság', 4000, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>'),
(12, 'otodik_termosz.jpeg', 'Fa termosz', 5000, 'Termosz', ' <p>Termoszaink különböző minőségű anyagokból készültek.</p>\r\n            <p>Idősebb felnőtteknek ajánljuk.</p>');

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
-- A tábla indexei `megrendeles_termekek`
--
ALTER TABLE `megrendeles_termekek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `megrendeles_id` (`megrendeles_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `megrendeles`
--
ALTER TABLE `megrendeles`
  MODIFY `megrendeles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `megrendeles_termekek`
--
ALTER TABLE `megrendeles_termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termekek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
