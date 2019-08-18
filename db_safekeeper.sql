-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2018 г., 13:34
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_safekeeper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE `reg_user` (
  `user_id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`user_id`, `login`, `email`, `pass`) VALUES
(3, 'admin', 'admin@mail.ru', 'admin00'),
(4, 'ponchik2000', 'ponchik@mail.ru', '243jdfk4'),
(7, 'Alice', 'alisa@yandex.ru', '23456789'),
(9, 'Ivan', 'ivan@mail.ru', '121212'),
(10, 'Olga', 'olga@yandex.ru', '21342334'),
(11, 'Ivan', 'ivan@mail.ru', '121212'),
(12, 'Olga', 'olga@yandex.ru', '21342334');

-- --------------------------------------------------------

--
-- Структура таблицы `table_storage`
--

CREATE TABLE `table_storage` (
  `id_store` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_storage`
--

INSERT INTO `table_storage` (`id_store`, `title`, `description`, `user_id`) VALUES
(92, 'Vkontakte', '199823942dgbfg', 4),
(93, 'Telegram', 'dfjn2323jmo', 4),
(108, 'Instagram', 'Fire843input', 4),
(109, 'Facebook', 'asdjh2398', 4),
(111, 'Instagram', 'dgbdfhn657', 3),
(112, 'Facebook', 'fgseh34875', 3),
(115, 'Pool', 'fsgbsgf6u57', 7),
(118, 'Dropbox', 'gsrn653', 9),
(119, 'Telegram', 'fgdhndhg', 10),
(122, 'WhatsUpp', 'dgstgbhsfg', 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `table_storage`
--
ALTER TABLE `table_storage`
  ADD PRIMARY KEY (`id_store`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `table_storage`
--
ALTER TABLE `table_storage`
  MODIFY `id_store` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
