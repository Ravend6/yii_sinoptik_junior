-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 11 2016 г., 23:52
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_sinoptik_junior`
--

-- --------------------------------------------------------

--
-- Структура таблицы `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `temperature` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `source`
--

INSERT INTO `source` (`id`, `name`, `latitude`, `longitude`, `temperature`) VALUES
(2, 'good', '50.339529', '30.894000', 15),
(3, 'bob', '50.163000', '29.831000', 0),
(7, 'last', '50.603611 ', '30.191667', 12),
(8, 'first', '50.510000 ', '50.510000 ', -10);

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE `town` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `amount` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `source_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `town`
--

INSERT INTO `town` (`id`, `name`, `amount`, `latitude`, `longitude`, `source_id`) VALUES
(3, 'Irpen', 32432234, '50.515572 ', '30.238318', 3),
(4, 'Kiev', 345436365365, '50.401984 ', '30.531065', 7),
(5, 'Magadan', 34563456, '59.567218 ', '150.800000', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`),
  ADD KEY `town_source_id_foreign` (`source_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `source` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
