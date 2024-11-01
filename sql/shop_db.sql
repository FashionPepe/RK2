-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 01 2024 г., 11:46
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `created_at`) VALUES
(4, 'Перфоратор', 'Мощный перфоратор для бурения и долбления.', 4500.00, '../images/perforator.jpg', '2024-11-01 09:24:11'),
(5, 'Дрель', 'Удобная дрель с функцией удара.', 2500.00, '../images/drill.jpg', '2024-11-01 09:24:11'),
(6, 'Шуруповерт', 'Легкий и мощный шуруповерт для работы с деревом и металлом.', 3000.00, '../images/screwdriver.jpg', '2024-11-01 09:24:11'),
(7, 'Ножовка', 'Качественная ножовка для резки дерева.', 800.00, '../images/saw.jpg', '2024-11-01 09:24:11'),
(8, 'Угловая шлифмашина', 'Шлифмашина для обработки различных материалов.', 3500.00, '../images/grinder.jpg', '2024-11-01 09:24:11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Иван Иванов', 'ivan@example.com', '$2y$10$EIXq8u9Y0k4D5QW6O4yD1u5k3mR2a4g3I5F1eZ9U6C5xK0D1M8W5y', '2024-11-01 08:46:38'),
(2, 'Мария Петрова', 'maria@example.com', '$2y$10$EIXq8u9Y0k4D5QW6O4yD1u5k3mR2a4g3I5F1eZ9U6C5xK0D1M8W5y', '2024-11-01 08:46:38'),
(3, 'test', 'e@example.com', '$2y$10$OqC8Jrc5Jh8CuGJ8qhFUfOuKlRwtwcAgnIHQJboijDpCqicFuIgKy', '2024-11-01 08:57:06'),
(4, '123', 'e1@example.com', '$2y$10$xMh3pVpbjv/uxMAwctxHg.BZUrGMAPjDsNaB2gTyHKN6fSq3Ex6V2', '2024-11-01 09:15:32'),
(5, '123', 'e12@example.com', '$2y$10$eqf9FuAQc3wiASRtE4SE7.l.402CIDLn5thDO85vhQ1fr/RLUxD8S', '2024-11-01 09:15:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
