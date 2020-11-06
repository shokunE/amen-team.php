-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 06 2020 г., 09:05
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `amen_team_php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `review_id` int(11) UNSIGNED DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `review_id`, `path`) VALUES
(1, 17, 'images/reviews/2020/11/d5da2a17bb692ba0d2eca3e31b316f39.png'),
(2, 19, 'images/reviews/2020/11/2b759758e75ec4c0c05e0bf02a0eb784.png'),
(3, 20, 'images/reviews/2020/11/fdb5b0af61e8cc2cc432c82bd5f05d11.png'),
(4, 21, 'images/reviews/2020/11/976bc42db78c9fd2d4ebca1ce90540ca.png'),
(5, 24, 'images/reviews/2020/11/2db2922121448992409e39dc3e56b71b.png'),
(6, 25, 'images/reviews/2020/11/739f040b36b52911db69f6e273ebdd93.png'),
(7, 27, 'images/reviews/2020/11/12a54afaf39aae7591864beab73951b5.png'),
(8, 28, 'images/reviews/2020/11/1f946f9a2a1e1d98c814e1896bc3f3db.png'),
(9, 29, 'images/reviews/2020/11/758d5021c9f10ccdfaf9de9de7907532.png');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `name`, `text`, `created_at`, `status`, `edit`) VALUES
(9, 'admin@mail.ru', 'гонки', 'фыафыаыфа', 1604238480, 0, 0),
(10, 'schokun2000@gmail.com', 'Хоррор', 'фыафыафыпыфп', 1604238494, 0, 0),
(11, 'schokun@mail.ru', 'Евгений', 'фыафыпыфп', 1604238505, 0, 0),
(12, 'admin@mail.ru', 'гонки', 'Новый', 1604238538, 0, 0),
(13, 'admin@mail.ru', 'asdasd', 'sgasdgsgds gasg sda g asdg sdg sadgasdgsdgasgsdg sdgsadgasdgsad\r\ng asdg sdg sadgasdgsdgasgsdg s', 1604244625, 0, 0),
(14, 'schokun@mail.ru', 'Евгений', 'wewtetwet', 1604327252, 0, 0),
(15, 'schokun@mail.ru', 'Евгений', 'gjhghjg', 1604328244, 0, 0),
(16, 'admin@mail.ru', 'Евгений', 'hsdfhdfhdfh', 1604328752, 0, 1),
(17, 'schokun@mail.ru', 'Евгений', 'sgdghsdhgsdhsdh', 1604328801, 1, 0),
(18, 'admin@mail.ru', 'Евгений', 'sdgsdghsdhdh', 1604329755, 0, 0),
(19, 'schokun@mail.ru', 'Евгений', 'sdgsdhsdh', 1604330727, 0, 0),
(20, 'admin@mail.ru', 'Хоррор', 'wetwetwety', 1604330748, 0, 0),
(21, 'schokun@mail.ru', 'Евгений', 'asgasg', 1604331266, 1, 0),
(22, 'schokun@mail.ru', 'Евгений', 'asgasg', 1604331330, 0, 0),
(23, 'schokun@mail.ru', 'Евгений', 'asgasg', 1604331345, 0, 0),
(24, 'schokun@mail.ru', 'Евгений', 'asgasg', 1604331366, 1, 0),
(25, 'schokun@mail.ru', 'Евгений', 'asgasg', 1604331608, 0, 0),
(26, 'schokun@mail.ru', 'Евгений', 'twewte', 1604331650, 0, 0),
(27, 'schokun@mail.ru', 'Евгений', 'sdgsdgsdgsdgd', 1604331664, 0, 1),
(28, 'schokun2000@gmail.com', 'SGSgsgddg', 'sdgsdgdsg', 1604332371, 0, 1),
(29, 'schokun@mail.ru', 'Евгений', 'Работает вродь', 1604333937, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_files_review` (`review_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
