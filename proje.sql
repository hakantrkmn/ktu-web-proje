-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 May 2019, 19:43:06
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `ders_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `img`, `k_id`) VALUES
(3, 'safsafsdfsdfsdgsdgdsf65dd6fsd', 1),
(4, 'dfsdfsdfsdfsdfsdfsd.sadsadsad', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `k_id` int(11) NOT NULL,
  `k_ad` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`k_id`, `k_ad`, `sifre`) VALUES
(1, 'bilgisayar', '123456'),
(2, 'makine', '123456'),
(3, 'elektrik', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazi`
--

CREATE TABLE `yazi` (
  `yazi_id` int(11) NOT NULL,
  `yazi` varchar(250) NOT NULL,
  `t_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazi`
--

INSERT INTO `yazi` (`yazi_id`, `yazi`, `t_id`, `k_id`) VALUES
(2, '7 Mayıs Proje Teslim Son günüdür', 2, 1),
(3, 'Merhaba ', 1, 1),
(9, 'asas4454', 1, 1),
(10, 'sadsad4s5adsa', 2, 1),
(11, 'sdasdsadsadsad', 1, 3),
(12, 'SELAM TİRABZON', 1, 3),
(13, 'TRABZON ŞAMPİ ', 2, 3),
(14, 'ŞAMPİYON FENERLEN', 2, 3);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`ders_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`k_id`);

--
-- Tablo için indeksler `yazi`
--
ALTER TABLE `yazi`
  ADD PRIMARY KEY (`yazi_id`),
  ADD KEY `k_id` (`k_id`),
  ADD KEY `k_id_2` (`k_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `ders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `yazi`
--
ALTER TABLE `yazi`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ders`
--
ALTER TABLE `ders`
  ADD CONSTRAINT `ders_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`);

--
-- Tablo kısıtlamaları `yazi`
--
ALTER TABLE `yazi`
  ADD CONSTRAINT `yazi_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
