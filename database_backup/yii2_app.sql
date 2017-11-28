-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 28 2017 г., 19:55
-- Версия сервера: 5.7.18-0ubuntu0.16.04.1
-- Версия PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `author`, `mail`, `text`, `article_id`, `parent_id`) VALUES
(1, 'Дмитрий', 'test@gmail.com', 'Первый коммент', 1, 0),
(2, 'dima', 'dima@mail.com', 'test', 1, 1),
(6, 'Lesa', 'sas@mail.ru', 'ответ', 1, 1),
(7, 'otvetdime', 'otvet@mail.ru', 'test1', 1, 2),
(8, 'еуые', 'test@mail.ru', 'testet', 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `short_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `text`, `short_desc`) VALUES
(1, 'Аннотация к научной статье', 'Аннотация – краткая характеристика научной статьи с точки зрения ее назначения, содержания, вида, формы и других особенностей.\r\n\r\nАннотация выполняет следующие функции:\r\n\r\nдает возможность установить основное содержание научной статьи, определить ее релевантность и решить, следует ли обращаться к полному тексту статьи;\r\nиспользуется в информационных, в том числе автоматизированных системах для поиска информации.\r\nАннотация должна включать характеристику основной темы, проблемы научной статьи, цели работы и ее результаты. В аннотации указывают, что нового несет в себе данная статья в сравнении с другими, родственными по тематике и целевому назначению.\r\n\r\nРекомендуемый средний объем аннотации 500 печатных знаков (ГОСТ 7.9-95 СИБИД).', 'Аннотация – краткая характеристика научной статьи с точки зрения ее');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
