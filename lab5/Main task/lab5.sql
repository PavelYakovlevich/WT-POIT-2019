-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 28 2019 г., 10:18
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lab5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) NOT NULL,
  `author_id` int(4) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` int(11) NOT NULL,
  `data_publications` date NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `opinion` text NOT NULL,
  `someindex` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `title`, `text`, `image`, `data_publications`, `hide`, `opinion`, `someindex`) VALUES
(1, 1, 'Пожилой человек', 'Какой-то текст', 12, '2019-04-09', 0, 'Пожилой человек, 54 года', 1),
(2, 2, '5 лабораторная работа', 'Я думаю, что это нормальная лабораторная работа', 123, '2019-04-12', 1, 'Нормально', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `assembly`
--

CREATE TABLE `assembly` (
  `id` int(4) UNSIGNED NOT NULL,
  `components` text NOT NULL,
  `peripherals` text NOT NULL,
  `design` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `assembly`
--

INSERT INTO `assembly` (`id`, `components`, `peripherals`, `design`) VALUES
(1, 'компоненты', 'периферийные устройства', 'дизайн');

-- --------------------------------------------------------

--
-- Структура таблицы `pc`
--

CREATE TABLE `pc` (
  `id` int(4) NOT NULL,
  `summ` int(4) DEFAULT NULL,
  `assembly_id` int(4) UNSIGNED NOT NULL,
  `client_id` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pc`
--

INSERT INTO `pc` (`id`, `summ`, `assembly_id`, `client_id`) VALUES
(1, 100, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `registration`
--

CREATE TABLE `registration` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `ip_registration` varchar(15) NOT NULL,
  `data_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registration`
--

INSERT INTO `registration` (`id`, `name`, `password`, `ip_registration`, `data_registration`) VALUES
(1, 'Жмышенко Валерий Альбертович', 'смерць', '192.168.1.1', '2019-04-11'),
(2, 'Яковлевич Павел Олегович', 'admin', '127.0.0.1', '2019-04-12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `assembly`
--
ALTER TABLE `assembly`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pc`
--
ALTER TABLE `pc`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `client_id` (`assembly_id`),
  ADD KEY `client_id_2` (`assembly_id`),
  ADD KEY `client_id_3` (`client_id`);

--
-- Индексы таблицы `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_registration` (`ip_registration`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `registration` (`id`);

--
-- Ограничения внешнего ключа таблицы `assembly`
--
ALTER TABLE `assembly`
  ADD CONSTRAINT `assembly_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pc` (`assembly_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
