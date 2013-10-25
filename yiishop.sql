-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 25 2013 г., 23:05
-- Версия сервера: 5.1.50
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yiishop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `yii_cart`
--

CREATE TABLE IF NOT EXISTS `yii_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `quantity` smallint(9) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `yii_cart`
--


-- --------------------------------------------------------

--
-- Структура таблицы `yii_product`
--

CREATE TABLE IF NOT EXISTS `yii_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `lastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `yii_product`
--

INSERT INTO `yii_product` (`id`, `name`, `description`, `price`, `stock`, `url`, `image`, `lastModified`) VALUES
(1, 'Owon SDS7102 осциллограф цифровой двухканальный', 'Осциллограф цифровой Owon SDS7102– двухканальный осциллограф с полосой пропускания 100 МГц, частотой семплирования 1000 MВыб/с . Бесплатная доставка по СПб.', 19200.00, 3, 'Owon-SDS7102-ostsillograf-tsifrovoj-dvuhkanalnyj.html', 'Owon-SDS7102-ostsillograf-tsifrovoj-dvuhkanalnyj.jpg', '2013-01-16 17:20:24'),
(2, 'Syma 107 вертолет ИК-управление, 3 канала', 'Выпустив новую модель радиоуправляемого вертолета syma s107, китайская компания попала в точку, эта модель заслужено стала любимицей моделистов. А полюбили syma s107 за его непревзойденный дизайн, легкость управления, стабильный полет, размер и прочность.', 1470.50, 1, 'Syma-107-vertolet-ik-upravlenie-3-kanala.html', 'Syma-107-vertolet-ik-upravlenie-3-kanala.jpg', '2013-01-16 17:20:11'),
(3, 'Лампа накаливания 100 Вт', 'Лампа!!!!! Ильича, светит сплошным спектром без мерцания', 24.00, 1, 'lampa-nakalivaniya-100-vt.html', 'lampa-nakalivaniya-100-vt.jpg', '2013-01-16 17:21:06'),
(4, 'Спички картонные', 'Спи́чка — палочка (черенок, соломка) из горючего материала, снабжённая на конце зажигательной головкой, служащая для получения открытого огня.', 57.00, 1, 'spichki-kartonnye.html', 'spichki-kartonnye.jpg', '2013-01-19 13:22:50'),
(5, 'Игрушка мягкая "Слон PHP"', 'для тех, кто в теме', 500.00, 1, 'igrushka-myagkaya-slon-PHP.html', 'igrushka-myagkaya-slon-PHP.jpg', '2013-01-16 17:21:21');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_products_tags`
--

CREATE TABLE IF NOT EXISTS `yii_products_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `yii_products_tags`
--


-- --------------------------------------------------------

--
-- Структура таблицы `yii_tags`
--

CREATE TABLE IF NOT EXISTS `yii_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_name` (`tag_name`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `yii_tags`
--

INSERT INTO `yii_tags` (`id`, `tag_name`) VALUES
(1, 'Воблеры');

-- --------------------------------------------------------

--
-- Структура таблицы `yii_user`
--

CREATE TABLE IF NOT EXISTS `yii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` varchar(24) NOT NULL DEFAULT 'client' COMMENT 'admin,client',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Дамп данных таблицы `yii_user`
--

INSERT INTO `yii_user` (`id`, `username`, `password`, `email`, `role`) VALUES
(53, 'Boris', '59ecc845a50543aaec543cbdf4d2496d', 'admin@yiishop.ru', 'admin');
