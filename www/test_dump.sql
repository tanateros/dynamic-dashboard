-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2015 г., 12:18
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_group` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `weight` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `menu_group`, `icon`, `title`, `link`, `weight`) VALUES
(1, 0, 1, '2', 'Главная', '', 1),
(2, 0, 1, '3', 'Новости', 'news/page', 3),
(19, 0, 1, '1', 'Пример статичной страницы', 'example', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_icons`
--

CREATE TABLE IF NOT EXISTS `menu_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `menu_icons`
--

INSERT INTO `menu_icons` (`id`, `icon`) VALUES
(1, ''),
(2, '<i class="fa fa-home"></i>'),
(3, '<i class="fa fa-reddit"></i>'),
(4, '<i class="fa fa-check-square-o"></i>'),
(5, '<i class="fa fa-sitemap"></i>'),
(6, '<i class="fa fa-weixin"></i>'),
(7, '<i class="glyphicon glyphicon-globe"></i>'),
(8, '<i class="glyphicon glyphicon-envelope"></i>');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `about_text` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `about_text`, `text`, `link`, `thumb`, `description`, `keywords`, `date_create`) VALUES
(1, 'Новость 1', 'Новсоть', '<p>Чтото по новости</p>\r\n', 'news1', '', 'descr', 'keywords', '2014-10-23 09:00:55'),
(41, 'Новость 2', 'Новсоть', '<p>Описание</p>\r\n', 'news2', '', '', '', '2014-12-10 10:20:28');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title_SEO` varchar(355) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `weight` int(3) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `link`, `title_SEO`, `content`, `description`, `keywords`, `weight`, `date_create`) VALUES
(25, 'Пример статичной страницы', 'example', 'title', '<p>content tut</p>\r\n', '', '', 0, '2015-03-11 12:14:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
