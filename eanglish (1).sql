-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2022 г., 17:28
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eanglish`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `groups` varchar(64) NOT NULL,
  `simulator_1` varchar(64) DEFAULT NULL,
  `simulator_2` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `simulator1_block` int NOT NULL DEFAULT '0',
  `simulator2_block` int NOT NULL DEFAULT '0',
  `id_test` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `groups`, `simulator_1`, `simulator_2`, `simulator1_block`, `simulator2_block`, `id_test`) VALUES
(1, 'ИСП-397', 'traffic signs', 'car interior', 1, 1, 2),
(2, 'ТД-92', 'traffic signs', 'car interior', 1, 1, 2),
(7, 'ОГЛ-91', NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id_question` int NOT NULL,
  `question` varchar(64) NOT NULL,
  `ans1` varchar(220) NOT NULL,
  `ans2` varchar(220) NOT NULL,
  `ans3` varchar(220) NOT NULL,
  `ans4` varchar(220) NOT NULL,
  `ans_true` varchar(220) NOT NULL,
  `id_test` int NOT NULL,
  `id_group` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans_true`, `id_test`, `id_group`) VALUES
(1, '25+25', '12', '23', '55', '23', '55', 1, 0),
(2, '10+10', '890', '89', '89', '20', '20', 1, 1),
(3, '100+100', '200', '202', '89', '90', '200', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `result`
--

CREATE TABLE `result` (
  `login` varchar(64) NOT NULL,
  `test_id` int NOT NULL,
  `test_date` date NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `result`
--

INSERT INTO `result` (`login`, `test_id`, `test_date`, `score`) VALUES
('', 1, '2021-12-12', 5),
('', 1, '2021-12-12', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id_test` int NOT NULL,
  `test_name` varchar(64) NOT NULL,
  `groups` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id_test`, `test_name`, `groups`) VALUES
(1, 'Пробник', 'ИСП-397');

-- --------------------------------------------------------

--
-- Структура таблицы `useranswer`
--

CREATE TABLE `useranswer` (
  `id` int NOT NULL,
  `sess_id` varchar(64) NOT NULL,
  `test_id` int NOT NULL,
  `que_des` varchar(64) NOT NULL,
  `ans1` varchar(64) NOT NULL,
  `ans2` varchar(64) NOT NULL,
  `ans3` varchar(64) NOT NULL,
  `ans4` varchar(64) NOT NULL,
  `true_ans` varchar(64) NOT NULL,
  `your_ans` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `useranswer`
--

INSERT INTO `useranswer` (`id`, `sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
(10, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '1+1', '2', '4', '5', '6', '2', '1'),
(11, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '5+5', '12', '10', '6', '21', '10', '2'),
(12, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '9+1', '12', '43', '12', '10', '10', '4'),
(13, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, 'Красный', 'Зеленый', 'Зеленый', 'Зеленый', 'Зеленый', 'Красный', '3'),
(14, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '1+1', '2', '4', '5', '6', '1', '1'),
(15, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '5+5', '12', '10', '6', '21', '2', '2'),
(16, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, '9+1', '12', '43', '12', '10', '4', '4'),
(17, 'u9nfkrrevedlkgtdvoc0n5jb274vpra9', 1, 'Красный', 'Зеленый', 'Зеленый', 'Красный', 'Зеленый', '3', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `status` int DEFAULT NULL,
  `sess_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fio` varchar(164) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `login` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `groups` varchar(10) DEFAULT NULL,
  `id_test_20` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `status`, `sess_id`, `fio`, `login`, `password`, `groups`, `id_test_20`) VALUES
(52, 1, '', 'Дорошев Илья Андреевич', 'admin', 'admin', 'ТД-192', NULL),
(666, NULL, '', 'Терец Илья Двенашкин', 'terec', 'terec', 'ТД-92', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

--
-- Индексы таблицы `useranswer`
--
ALTER TABLE `useranswer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `useranswer`
--
ALTER TABLE `useranswer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=882;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
