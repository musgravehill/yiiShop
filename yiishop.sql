-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 11 2012 г., 15:15
-- Версия сервера: 5.1.53
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
-- Структура таблицы `yii_product`
--

CREATE TABLE IF NOT EXISTS `yii_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `yii_product`
--

INSERT INTO `yii_product` (`id`, `name`, `description`, `price`, `stock`, `url`) VALUES
(1, 'Owon SDS7102 цифровой осциллограф', 'Осциллограф цифровой Owon SDS7102– двухканальный осциллограф с полосой пропускания 100 МГц, частотой семплирования 1000 MВыб/с . Бесплатная доставка по СПб.', 19500.99, 1, 'owon-sds7102.html'),
(2, 'Syma 107 вертолет ИК-управление, 3 канала', 'Выпустив новую модель радиоуправляемого вертолета syma s107, китайская компания попала в точку, эта модель заслужено стала любимицей моделистов. А полюбили syma s107 за его непревзойденный дизайн, легкость управления, стабильный полет, размер и прочность.', 1470.50, 1, 'syma-107.asp');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `yii_user`
--

INSERT INTO `yii_user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'adm', '2e3f2a6ca18e1ece5766eb734b2cb4b7', 'admin@yiishop.ru', 'admin'),
(45, 'bob', 'e8557d12f6551b2ddd26bbdd0395465c', 'bob@ff.ru', 'client');
