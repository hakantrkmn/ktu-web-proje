-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 05 May 2019, 15:31:07
-- Sunucu sürümü: 5.7.24
-- PHP Sürümü: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `ders`;
CREATE TABLE IF NOT EXISTS `ders` (
  `ders_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`ders_id`),
  KEY `k_id` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

DROP TABLE IF EXISTS `duyuru`;
CREATE TABLE IF NOT EXISTS `duyuru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duyuru` varchar(255) NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kullanici_duyuru` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlik`
--

DROP TABLE IF EXISTS `etkinlik`;
CREATE TABLE IF NOT EXISTS `etkinlik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlik` varchar(255) NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kullanici_etkinlik` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_ad` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL,
  PRIMARY KEY (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

DROP TABLE IF EXISTS `resim`;
CREATE TABLE IF NOT EXISTS `resim` (
  `resim_id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(250) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`resim_id`),
  KEY `k_id` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `aciklama` varchar(255) NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kullanici_video` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ders`
--
ALTER TABLE `ders`
  ADD CONSTRAINT `ders_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `duyuru`
--
ALTER TABLE `duyuru`
  ADD CONSTRAINT `kullanici_duyuru` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `etkinlik`
--
ALTER TABLE `etkinlik`
  ADD CONSTRAINT `kullanici_etkinlik` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `resim`
--
ALTER TABLE `resim`
  ADD CONSTRAINT `resim_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `kullanici_video` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
