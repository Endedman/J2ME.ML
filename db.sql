SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jstore2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(8) NOT NULL,
  `app_name` text NOT NULL,
  `dev_name` text NOT NULL,
  `votes` int(6) NOT NULL,
  `icon` varchar(1024) NOT NULL DEFAULT '/no-photo.jpg',
  `banner` varchar(1024) NOT NULL DEFAULT '/app/opera-mini/frontimage.jpg',
  `shorten_link` text NOT NULL,
  `file` text NOT NULL,
  `token` varchar(32) NOT NULL,
  `disabled` varchar(8) NOT NULL DEFAULT 'false',
  `paid` varchar(8) NOT NULL DEFAULT 'false',
  `fee` int(4) NOT NULL DEFAULT '0',
  `paytoken` varchar(64) NOT NULL DEFAULT 'endedman',
  `payway` varchar(8) NOT NULL DEFAULT 'free'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apps`
--

INSERT INTO `apps` (`id`, `app_name`, `dev_name`, `votes`, `icon`, `banner`, `shorten_link`, `file`, `token`, `disabled`, `paid`, `fee`, `paytoken`, `payway`) VALUES
(1, 'Opera Mini', 'Opera ASA', 1, '/app/opera-mini/logo-opera-mini.png', '/app/opera-mini/frontimage.jpg', '/app/opera-mini/', '/app/opera-mini/opera-mini.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(2, 'MPGram', 'nnproject', 1, '/app/mpgram/logo-mpgram.png', '/app/mpgram/frontimage.jpg', '/app/mpgram/', '/app/mpgram/mpgram.jar', '0', 'true', 'false', 0, 'endedman', 'free'),
(3, 'vk4me', 'crx.moe', 1, '/app/vk4me/logo-vk4me.png', '/app/vk4me/frontimage.jpg', '/app/vk4me/', '/app/vk4me/vk4me.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(4, 'JTube', 'nnproject', 5, '/app/jtube/logo-jtube.png', '/app/opera-mini/frontimage.jpg', '/app/jtube', '/app/jtube/jtube.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(5, 'Example', 'Endedman', 666, '/no-photo.jpg', 'https://via.placeholder.com/705x355/09f/fff.png', '', '/jars', '0', 'false', 'true', 20, 'endedman', 'free'),
(6, 'mobap-game', 'vipaoL', 1, '/no-photo.jpg', '/app/mobap-game/frontimage.jpg', '/app/mobap-game', '/app/mobap-game/mobap-game.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(7, 'Yandex Mail', 'Yandex', 1, '/app/yandexmail/logo-yandexmail.png', '/app/opera-mini/frontimage.jpg', '', '/app/yandexmail/yandexmail.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(8, 'PvZ Java', 'PopCap Games', 1, '/no-photo.jpg', '/app/opera-mini/frontimage.jpg', '', '/app/plants-vs-zombies/plants-vs-zombies.jar', '0', 'false', 'false', 0, 'endedman', 'free'),
(10, 'EnderServ', 'Endedman', 0, 'http://j2me.ml/no-photo.jpg', 'http://j2me.ml/no-photo.jpg', '', 'http://j2me.ml/app/EnderServ/EnderServ.jar', 'e63b9959cbf8e9dae15cfd09790dbdaa', 'false', 'false', 0, '', 'free'),
(11, 'Example App', 'Endedman', 0, 'http://j2me.ml/no-photo.jpg', 'http://j2me.ml/no-photo.jpg', '', 'http://j2me.ml/app/Example App/Example App.jar', 'cfe496a34b36bcdd84785cba6a88e1ff', 'false', 'false', 0, '', 'free');

-- --------------------------------------------------------

--
-- Структура таблицы `apps_screenshoots`
--

CREATE TABLE IF NOT EXISTS `apps_screenshoots` (
  `id` int(8) NOT NULL,
  `scr1` text NOT NULL,
  `scr2` text NOT NULL,
  `scr3` text NOT NULL,
  `scr4` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apps_screenshoots`
--

INSERT INTO `apps_screenshoots` (`id`, `scr1`, `scr2`, `scr3`, `scr4`) VALUES
(1, 'http://j2me.ml/app/opera-mini/screenshoot1.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `devs`
--

CREATE TABLE IF NOT EXISTS `devs` (
  `id` int(8) NOT NULL,
  `dev_name` text NOT NULL,
  `votes` int(8) NOT NULL,
  `shorten-link` text NOT NULL,
  `icon` varchar(1024) NOT NULL DEFAULT 'http://via.placeholder.com/72',
  `banner` varchar(1024) NOT NULL DEFAULT 'http://j2me.ml/app/opera-mini/frontimage.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `devs`
--

INSERT INTO `devs` (`id`, `dev_name`, `votes`, `shorten-link`, `icon`, `banner`) VALUES
(1, 'Opera ASA', 11, 'http://j2me.ml/dev/opera-asa', 'http://j2me.ml/app/opera-mini/logo-opera-mini.png', 'http://j2me.ml/app/opera-mini/frontimage.jpg'),
(2, 'nnproject', 7, '', 'http://via.placeholder.com/72', 'http://j2me.ml/app/opera-mini/frontimage.jpg'),
(3, 'crx.moe', 3, '', 'http://via.placeholder.com/72', 'http://j2me.ml/app/opera-mini/frontimage.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `apps_screenshoots`
--
ALTER TABLE `apps_screenshoots`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `devs`
--
ALTER TABLE `devs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `apps_screenshoots`
--
ALTER TABLE `apps_screenshoots`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `devs`
--
ALTER TABLE `devs`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
