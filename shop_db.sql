-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 13 日 16:32
-- 伺服器版本： 8.0.29
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `shop_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 12342, 'moca', 'agdudhua@gmail.com', '1', 'hi testing'),
(2, 28, 'asudhua', 'sahd@gmail.com', '2', 'still testing');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `number` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `method` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `total_products` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` int NOT NULL,
  `placed_on` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 16, 'test', '1', 'test@gmail.com', 'credit card', 'Road No.304, Hsinchu', '兵長的白眼', 2999, '10-06-2022', 'pending');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brand`, `type`, `image`) VALUES
(15, '兵長的白眼', 2999, '進擊的巨人', 'mental', '兵長的白眼.png'),
(16, '安妮亞頭上的角', 599, '間諜過家家', 'accessories', 'card1.jpeg'),
(17, '血小板帽子', 899, '工作細胞', 'accessories', '血小板.jpeg'),
(18, '高領衣服', 799, '咒術迴戰', 'shirts', '領子很長的衣服.jpeg'),
(19, '兒童藍色長袖', 499, '國王排名', 'shirts', 'editor8815047945.jpeg'),
(20, '傲嬌ok繃', 59, '間諜過家家', 'accessories', '達米安ok崩.jpeg'),
(21, '短版上衣', 499, '獵人', 'shirts', '短版上衣.jpeg'),
(22, '條文T', 499, '崛與宮村', 'shirts', '條文t.jpeg'),
(23, '小傑八百年沒洗的衣服', 1599, '獵人', 'shirts', '小傑八百年沒洗的衣服.jpeg'),
(24, '奇犽偶爾會換衣服', 1599, '獵人', 'shirts', '奇犽偶爾會換衣服.jpeg'),
(26, '惡魔西裝', 2999, '黑執事', 'suits', '惡魔.jpeg'),
(27, '教練我想打籃球', 699, '灌籃高手', 'shirts', '球衣.jpeg'),
(28, '安妮亞制服', 1999, '間諜過家家', 'suits', '安妮雅制服.jpeg'),
(29, '乙骨的劍', 3999, '咒術迴戰', 'accessories', '刀.jpeg'),
(30, '伯爵單眼眼罩', 2999, '黑執事', 'accessories', '眼罩.jpeg'),
(31, '雙眼眼罩', 399, '咒術迴戰', 'accessories', '雙眼眼罩.jpeg'),
(32, '髮帶', 199, '間諜過家家', 'accessories', '約兒髮帶.png'),
(33, '小孩西裝', 999, '柯南', 'suits', '西裝.jpeg'),
(34, 'jk制服', 1599, '崛與宮村', 'suits', 'jk制服.jpeg'),
(35, '伸縮自如的愛', 199, '獵人', 'mental', 'e7e2462544ace74aa2cb68040cf49af4.jpeg'),
(36, '今日份的可愛', 599, '進擊的巨人', 'mental', 'w644.jpeg'),
(37, '眼鏡', 1399, '間諜過家家', 'accessories', '黃昏的眼鏡.png'),
(38, '草帽', 399, '海賊王', 'accessories', '草帽.jpeg'),
(39, '遊戲boy假髮', 899, '遊戲王', 'accessories', '遊戲boy.jpeg');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'admin'),
(5, 'test1', 'test1@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'zhs', 'asd@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'user'),
(7, 'zhs', 'ad@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(9, 'zhsw', 'aadd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(10, 'zhsw', 'afadd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(11, 'zhsw', 'aafadd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(12, 'zhsw', 'a2afadd@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(16, 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(17, 'testing', 'testing@hotmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
