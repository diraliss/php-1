-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 27 2017 г., 20:37
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `path` varchar(200) NOT NULL,
  `path_tumb` varchar(200) NOT NULL,
  `img_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img_name`, `path`, `path_tumb`, `img_size`) VALUES
(15, 'f6ab2c9e550da03dd5b6f46e4ca9c6c2.jpeg', '/upload/f6ab2c9e550da03dd5b6f46e4ca9c6c2.jpeg', '/upload/tumb/f6ab2c9e550da03dd5b6f46e4ca9c6c2.jpeg', 74441),
(16, '684ebe5f9369fda8121131de541a52e2.jpeg', '/upload/684ebe5f9369fda8121131de541a52e2.jpeg', '/upload/tumb/684ebe5f9369fda8121131de541a52e2.jpeg', 147464),
(17, '29f342c88b4d8380a6194f2ccba85d53.jpeg', '/upload/29f342c88b4d8380a6194f2ccba85d53.jpeg', '/upload/tumb/29f342c88b4d8380a6194f2ccba85d53.jpeg', 115510);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
