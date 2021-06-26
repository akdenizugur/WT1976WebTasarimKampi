-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Haz 2021, 16:36:53
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `chatapp`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(23, 798448936, 906962830, 'Selam'),
(24, 906962830, 798448936, 'Selam'),
(25, 906962830, 798448936, 'Naber'),
(26, 798448936, 906962830, 'İyi senden naber'),
(27, 906962830, 798448936, 'İyi'),
(28, 798448936, 906962830, 'Görüşürüz'),
(29, 906962830, 798448936, 'Görüşürüz'),
(30, 945747142, 1088718051, 'Selam'),
(31, 906962830, 945747142, 'Selam Yusuf!'),
(32, 945747142, 906962830, 'Selam Burak!'),
(33, 1088718051, 906962830, 'Çağlar! Merhaba!'),
(34, 906962830, 1088718051, 'Merhaba Yusuf!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
(6, 798448936, 'Uğur', 'Akdeniz', 'ugur@gmail.com', '202cb962ac59075b964b07152d234b70', '1624629795chrissie-giannakoudi-Y37JTJNLQk4-unsplash.jpg', 'Çevrimiçi'),
(7, 906962830, 'Yusuf', 'Yazıcı', 'yusuf@gmail.com', '202cb962ac59075b964b07152d234b70', '16246298695.jpg', 'Çevrimiçi'),
(8, 945747142, 'Burak', 'Yılmaz', 'burak@gmail.com', '202cb962ac59075b964b07152d234b70', '16246302038.jpg', 'Çevrimdışı'),
(9, 1088718051, 'Çağlar', 'Söyüncü', 'caglar@gmail.com', '202cb962ac59075b964b07152d234b70', '16246302446.jpg', 'Çevrimiçi');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
