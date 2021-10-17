-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 17 2021 г., 17:53
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `notification`
--

-- --------------------------------------------------------

--
-- Структура таблицы `emailtemplate`
--

DROP TABLE IF EXISTS `emailtemplate`;
CREATE TABLE `emailtemplate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `templateText` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `emailtemplate`
--

INSERT INTO `emailtemplate` (`id`, `name`, `templateText`) VALUES
(1, 'welcome', 'Привет! Добро пожаловать в наш сервис. {text}');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634225130),
('m211014_152757_add_queue', 1634225445),
('m211016_101654_add_user_group', 1634381445),
('m211016_105201_add_templates', 1634382011);

-- --------------------------------------------------------

--
-- Структура таблицы `pushtemplate`
--

DROP TABLE IF EXISTS `pushtemplate`;
CREATE TABLE `pushtemplate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `templateText` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `queue`
--

DROP TABLE IF EXISTS `queue`;
CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `params` text,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `queue`
--

INSERT INTO `queue` (`id`, `type`, `params`, `status`) VALUES
(1, 'message', '{\"text\":\"\\u041f\\u0440\\u0438\\u0432\\u0435\\u0442\",\"userId\":\"\",\"groupId\":\"1\",\"channels\":{\"email\":\"welcome\"}}', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `smstemplate`
--

DROP TABLE IF EXISTS `smstemplate`;
CREATE TABLE `smstemplate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `templateText` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`) VALUES
(1, 'Юрий', '+79126666044', 'skulines@mail.ru'),
(2, 'Нет телефона', '', 'hunterofwallstreet@mail.ru'),
(3, 'Нет email', '+79126666044', ''),
(4, 'Нет контактов', '', ''),
(5, 'Ваня Оловянников', '+79127894381', 'i.oloviannikov@corp.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`) VALUES
(1, 'Все пользователи'),
(2, 'Випы');

-- --------------------------------------------------------

--
-- Структура таблицы `usertousergroup`
--

DROP TABLE IF EXISTS `usertousergroup`;
CREATE TABLE `usertousergroup` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `userGroupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usertousergroup`
--

INSERT INTO `usertousergroup` (`id`, `userId`, `userGroupId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 5, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `emailtemplate`
--
ALTER TABLE `emailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `pushtemplate`
--
ALTER TABLE `pushtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `smstemplate`
--
ALTER TABLE `smstemplate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usertousergroup`
--
ALTER TABLE `usertousergroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-userToUserGroup-user` (`userId`),
  ADD KEY `fk-userToUserGroup-userGroup` (`userGroupId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `emailtemplate`
--
ALTER TABLE `emailtemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pushtemplate`
--
ALTER TABLE `pushtemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `smstemplate`
--
ALTER TABLE `smstemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `usertousergroup`
--
ALTER TABLE `usertousergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `usertousergroup`
--
ALTER TABLE `usertousergroup`
  ADD CONSTRAINT `fk-userToUserGroup-userGroup` FOREIGN KEY (`userGroupId`) REFERENCES `usergroup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-userToUserGroup-user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
