-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 29 2014 г., 19:50
-- Версия сервера: 5.5.33-log
-- Версия PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ivan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `showhide`) VALUES
(11, 'пицца', 'show'),
(12, 'добавки', 'show'),
(13, 'упаковка', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `body` tinytext NOT NULL,
  `prise` tinytext NOT NULL,
  `picture` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `catid`, `name`, `body`, `prise`, `picture`, `showhide`) VALUES
(26, '11', 'elDiablo', 'Вкусная. Непересказать!', '300 руб', 'g1419860843.jpg', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('en','by','ru') NOT NULL DEFAULT 'ru',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт', '<p class="indent">Большинству языков различие между этими понятиями вообще неизвестно. Б. В. Томашевский называет рассказ специфически русским синонимом международного термина «новелла». Другой представитель школы формализма, Б. М. Эйхенбаум, предлагал разводить эти понятия на том основании, что новелла сюжетна, а рассказ — более психологичен и рефлексивен, ближе к бессюжетному очерку. На остросюжетность новеллы указывал ещё Гёте, считавший её предметом «свершившееся неслыханное событие». При таком толковании новелла и очерк — две противоположные ипостаси рассказа.</p>\r\n		<p class="indent">На примере творчества О. Генри Эйхенбаум выделял следующие черты новеллы в наиболее чистом, «незамутнённом» виде: краткость, острый сюжет, нейтральный стиль изложения, отсутствие психологизма, неожиданная 			развязка. Рассказ, в понимании Эйхенбаума, не отличается от новеллы объёмом, но отличается структурой: персонажам или событиям даются развёрнутые психологические характеристики, на первый план выступает 				изобразительно-словесная фактура.</p>\r\n		<p class="indent">Разграничение новеллы и рассказа, предложенное Эйхенбаумом, получило в советском литературоведении определённую, хотя и не всеобщую поддержку. Авторов рассказов по-прежнему называют новеллистами, а 				«совокупность малых по объёму эпических жанров» — новеллистикой. Различение терминов, неизвестное зарубежному литературоведению, кроме того, теряет смысл применительно к экспериментальной прозе XX века 				(например, к короткой прозе Гертруды Стайн или Сэмюэла Беккета).</p>', 'index', 'hide', 'ru', '2014-12-05'),
(2, '', '<p align="left">Ivan тел. +375 (29) 7551009\r\nг. Минск, ул. Лопатина</p>\r\n\r\n<img src="media/img/map.jpg" width="620" height="380" class="map">', 'about', 'hide', 'ru', '2014-12-05'),
(3, 'Каталог', 'Мы рады вам предложить наборы "Чистый воздух" в упаковках по 1,2 и 5 вздохов!', 'catalog', 'hide', 'ru', '2014-12-05'),
(4, 'услуги', 'ыпфывпфв', 'uslugi', 'hide', 'ru', '2014-12-05'),
(5, 'Полезно знать', '<p align="justify" class="indent">Во́здух — естественная смесь газов (главным образом азота и кислорода — 98-99 % в сумме, а также углекислого газа, воды, водорода и пр.) образующая земную атмосферу. Воздух необходим для нормального существования подавляющего числа наземных живых организмов. Кислород, содержащийся в воздухе, в процессе дыхания поступает в клетки организма и используется в процессе окисления, в результате которого происходит выделение необходимой для жизни энергии (метаболизм, аэробы). В промышленности и в быту кислород воздуха используется для сжигания топлива с целью получения тепла и механической энергии в двигателях внутреннего сгорания. Из воздуха, используя метод сжижения, добывают инертные газы. В соответствии с Федеральным Законом «Об охране атмосферного воздуха» под атмосферным воздухом понимается «жизненно важный компонент окружающей среды, представляющий собой естественную смесь газов атмосферы, находящуюся за пределами жилых, производственных и иных помещений».</p>\r\n<p align="justify" class ="indent">В 1754 году Джозеф Блэк экспериментально доказал, что воздух представляет собой смесь газов, а не однородное вещество.</p>\r\n\r\n<p align="center"><big><strong>Состав воздуха:</strong></big>\r\n<table class="table table-bordered" align="center">\r\n	<tr><th>Вещество</th><th>Обозначение</th><th>По объёму, %</th><th>По массе, %</th>\r\n	<tr><td>Азот</td><td>N<sub>2</sub></td><td>78,084</td><td>75,50</td></tr>\r\n	<tr><td>Кислород</td><td>O<sub>2</sub></td><td>20,9476</td><td>23,15</td></tr>\r\n	<tr><td>Аргон</td><td>Ar</td><td>0,934</td><td>1,292</td></tr>\r\n	<tr><td>Углекислый газ</td><td>CO<sub>2</sub></td><td>0.0314</td><td>0,046</td></tr>\r\n	<tr><td>Неон</td><td>Ne</td><td>0,001818</td><td>0,0014</td></tr>\r\n	<tr><td>Метан</td><td>CH<sub>4</sub></td><td>0,0002</td><td>0,000084</td></tr>\r\n	<tr><td>Гелий</td><td>He</td><td>0,000524</td><td>0,000073</td></tr>\r\n	<tr><td>Криптон</td><td>Kr</td><td>0,000114</td><td>0,003</td></tr>\r\n	<tr><td>Водород</td><td>H<sub>2</sub></td><td>0,00005</td><td>0,00008</td></tr>\r\n	<tr><td>Ксенон</td><td>Xe</td><td>0,0000087</td><td>0,00004</td></tr>\r\n</table>\r\n</p>\r\n<p aling="justify" class="indent">Состав воздуха может меняться: в крупных городах содержание углекислого газа будет выше, чем в лесах; в горах пониженное содержание кислорода, вследствие того, что кислород тяжелее азота, и поэтому его плотность с высотой уменьшается быстрее. В различных частях земли состав воздуха может варьироваться в пределах 1-3 % для каждого газа. </p>\r\n\r\n<p align="justify" class="indent">Воздух всегда содержит пары воды. Так, при температуре 0 °C 1 м³ воздуха может вмещать максимально 5 граммов воды, а при температуре +10 °C — уже 10 граммов.</p>', 'info', 'hide', 'ru', '2014-12-06'),
(6, 'Информация по существующим акциям доступна только зарегистрированным пользователям.', '', 'sale', 'hide', 'ru', '2014-12-06'),
(7, 'Доставка', 'Куръером по миру. <strong>Бесплатно!</strong>', 'delivery', 'show', 'ru', '2014-12-06'),
(8, 'Гарантия', 'И не сомневайтесь!', 'garant', 'show', 'ru', '2014-12-06');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `adress` tinytext NOT NULL,
  `body` tinytext NOT NULL,
  `ip` tinytext NOT NULL,
  `sposob` enum('delivery','mail','card') NOT NULL DEFAULT 'delivery',
  `currency` enum('BYR','USD') NOT NULL DEFAULT 'BYR',
  `currency_value` tinytext NOT NULL,
  `putdate` date NOT NULL,
  `status` enum('new','inway','done') NOT NULL DEFAULT 'new',
  `message` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `fio`, `phone`, `adress`, `body`, `ip`, `sposob`, `currency`, `currency_value`, `putdate`, `status`, `message`) VALUES
(4, 'жив', '834271239874', 'домой', 'a:2:{i:1;s:0:"";s:9:"PHPSESSID";s:26:"gp3hblka5v9dblpa4p4oqhbq63";}', '127.0.0.1', 'delivery', 'BYR', '0', '2014-12-29', 'new', 'бегом!');

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `picture` tinytext NOT NULL,
  `picturesmall` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `catid`, `name`, `body`, `picture`, `picturesmall`, `showhide`, `putdate`) VALUES
(8, '', '15', '<p>описание</p>\r\n', '14_12_12_06_27_Penguins.jpg', 's_14_12_12_06_27_Penguins.jpg', 'show', '2014-12-12'),
(9, '', '464564', '<p>описание</p>\r\n', '14_12_12_06_27_Koala.jpg', 's_14_12_12_06_27_Koala.jpg', 'show', '2014-12-12');

-- --------------------------------------------------------

--
-- Структура таблицы `system_accounts`
--

CREATE TABLE IF NOT EXISTS `system_accounts` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `pass` tinytext NOT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `system_accounts`
--

INSERT INTO `system_accounts` (`id_account`, `name`, `pass`) VALUES
(26, 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `blockunblock` enum('block','unblock') DEFAULT 'unblock',
  `datereg` date NOT NULL,
  `lastvisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `blockunblock`, `datereg`, `lastvisit`) VALUES
(1, '', '123', 'something@server.com', NULL, '0000-00-00', '0000-00-00 00:00:00'),
(2, 'ivan', '123', 'tut.by', 'unblock', '2014-12-08', '2014-12-19 16:06:35'),
(3, 'dk', '123', 'something@server.com', 'unblock', '2014-12-08', '2014-12-08 17:30:21'),
(4, 'kfk', '123', 'something@server.com', 'block', '2014-12-08', '2014-12-08 18:08:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
