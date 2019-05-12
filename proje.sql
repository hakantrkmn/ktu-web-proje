-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 May 2019, 18:15:03
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `img`, `k_id`) VALUES
(1, 'http://www.ktu.edu.tr/dosyalar/bilgisayar_1fd3b.pdf', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `duyuru`, `k_id`) VALUES
(1, 'dfg', 4),
(2, 'bak yaw', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlik`
--

DROP TABLE IF EXISTS `etkinlik`;
CREATE TABLE IF NOT EXISTS `etkinlik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlik` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kullanici_etkinlik` (`k_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `etkinlik`
--

INSERT INTO `etkinlik` (`id`, `etkinlik`, `tarih`, `k_id`) VALUES
(2, 'asfas', '2019-05-19', 4),
(4, 'dfg', '2019-05-11', 4),
(11, '4 mayıs', '2019-05-04', 4),
(13, 'asfasf', '2019-05-05', 4),
(14, 'asf', '2019-05-04', 4),
(15, 'haha', '2019-05-01', 5),
(16, 'haha2', '2019-05-02', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`k_id`, `k_ad`, `sifre`) VALUES
(4, 'bilgisayar', '123456'),
(5, 'elektrik', '123456');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`resim_id`, `resim`, `aciklama`, `k_id`) VALUES
(5, '2425632199.png', 'as', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `link`, `aciklama`, `k_id`) VALUES
(1, '3323644889.mp4', 'sa', 4);

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
