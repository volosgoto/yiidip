-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 19 2018 г., 12:53
-- Версия сервера: 5.7.21-0ubuntu0.17.10.1
-- Версия PHP: 7.1.12-2+ubuntu17.10.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiidip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(1, 0, 'Sportswear', '', ''),
(2, 0, 'Mens', NULL, NULL),
(3, 0, 'Womens', NULL, NULL),
(4, 1, 'Nike', NULL, NULL),
(5, 1, 'Under Armour', NULL, NULL),
(6, 1, 'Adidas', NULL, NULL),
(7, 1, 'Puma', NULL, NULL),
(8, 1, 'ASICS', NULL, NULL),
(9, 2, 'Fendi', NULL, NULL),
(10, 2, 'Guess', NULL, NULL),
(11, 2, 'Valentino', NULL, NULL),
(12, 2, 'Dior', NULL, NULL),
(13, 2, 'Versace', NULL, NULL),
(14, 2, 'Armani', NULL, NULL),
(15, 2, 'Prada', NULL, NULL),
(16, 2, 'Dolce and Gabbana', NULL, NULL),
(17, 2, 'Chanel', NULL, NULL),
(18, 2, 'Gucci', NULL, NULL),
(19, 3, 'Fendi', NULL, NULL),
(20, 3, 'Guess', NULL, NULL),
(21, 3, 'Valentino', NULL, NULL),
(22, 3, 'Dior', NULL, NULL),
(23, 3, 'Versace', NULL, NULL),
(24, 0, 'Kids', NULL, NULL),
(25, 0, 'Fashion', NULL, NULL),
(26, 0, 'Households', NULL, NULL),
(27, 0, 'Interiors', NULL, NULL),
(28, 0, 'Clothing', NULL, NULL),
(29, 0, 'Bags', 'сумки ключевики...', 'сумки описание...'),
(30, 0, 'Shoes', NULL, NULL),
(31, 0, 'Testcategory', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(5, 'Products/Product2/accadb.jpg', 2, 1, 'Product', '484b4f69d4-1', ''),
(6, 'Products/Product8/529ecf.jpg', 8, 1, 'Product', '66533504c7-1', ''),
(7, 'Products/Product1/3d039f.jpg', 1, 1, 'Product', 'ec1bfba151-1', ''),
(8, 'Products/Product1/1c9de3.jpg', 1, NULL, 'Product', '96c90deb82-2', ''),
(9, 'Products/Product1/748aec.jpg', 1, NULL, 'Product', 'f69600592e-3', ''),
(10, 'Products/Product1/3ada42.jpg', 1, NULL, 'Product', 'bc725d0c69-4', ''),
(11, 'Products/Product3/af3976.jpg', 3, 0, 'Product', 'dbcd908e23-3', ''),
(12, 'Products/Product3/613ebc.jpg', 3, 0, 'Product', '207850f12e-4', ''),
(13, 'Products/Product3/c23a11.jpg', 3, 0, 'Product', '8d64498d3d-5', ''),
(14, 'Products/Product3/d38cbc.jpg', 3, 0, 'Product', 'dbc430a824-6', ''),
(15, 'Products/Product3/cb987d.jpg', 3, 0, 'Product', 'b1b39d9a62-2', ''),
(16, 'Products/Product3/59f1d7.jpg', 3, 1, 'Product', '36eea6330c-1', ''),
(17, 'Products/Product14/f88f11.jpg', 14, 1, 'Product', '02640e16bf-1', ''),
(18, 'Products/Product1/ce1897.jpg', 1, NULL, 'Product', '6f8a93ab75-5', ''),
(19, 'Products/Product1/5e5b87.jpg', 1, NULL, 'Product', 'f6002e3149-6', ''),
(20, 'Products/Product1/c64f53.jpg', 1, NULL, 'Product', '8b78744d0f-7', ''),
(21, 'Products/Product1/038fb1.jpg', 1, NULL, 'Product', '4d05521f5d-8', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1519977972),
('m140506_102106_rbac_init', 1520932908),
('m140622_111540_create_image_table', 1519978094),
('m140622_111545_add_name_to_image_table', 1519978095),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1520932908),
('m180303_134547_image_table', 1520084802),
('m180303_134621_name_to_image_table', 1520084802),
('m180303_134951_upd_image_table', 1520085130),
('m180303_135010_upd_name_in_image_table', 1520085130),
('m180309_202133_update_user_table', 1520627385),
('m180310_133413_upd_user', 1520688886);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(1, NULL, '2018-02-19 16:17:05', '2018-02-19 16:17:05', 2, 20, '1', 'DFdfd', '1@1.ru', '23423423423', '2323432'),
(2, NULL, '2018-02-19 16:19:14', '2018-02-19 16:19:14', 2, 20, '0', 'DDd', '1@1.ru', '12345678', 'we 3'),
(3, NULL, '2018-02-19 16:22:21', '2018-02-19 16:22:21', 2, 156, '0', 'Андрей', 'myenail@mail.ru', '23423423423', 'fsdfsf 1223 sdfsd'),
(4, NULL, '2018-02-19 16:25:14', '2018-02-19 16:25:14', 2, 156, '0', 'Андрей', 'myenail@mail.ru', '23423423423', 'fsdfsf 1223 sdfsd'),
(5, NULL, '2018-02-19 16:35:26', '2018-02-19 16:35:26', 2, 100, '0', 'VVV', '1@1.ru', '1234567', 'try'),
(6, NULL, '2018-02-19 16:49:17', '2018-02-19 16:49:17', 1, 20, '0', 'www', 'w@w.ua', 'fhfhg', 'vhvgjhgjhg'),
(7, NULL, '2018-02-20 11:06:30', '2018-02-20 11:06:30', 2, 76, '0', 'QQQ', 'a@q.com', '2424324234', '54235'),
(8, NULL, '2018-02-20 11:09:54', '2018-02-20 11:09:54', 2, 76, '0', 'DDd', '1@1.ru', '1234567', 'we 3'),
(9, NULL, '2018-02-20 11:10:36', '2018-02-20 11:10:36', 2, 76, '0', 'DDd', '1@1.ru', '1234567', 'we 3'),
(10, NULL, '2018-02-20 11:14:25', '2018-02-20 11:14:25', 1, 20, '0', 'vxcxc', '1@1.ru', '5235345', '353554'),
(11, NULL, '2018-02-20 11:15:08', '2018-02-20 11:15:08', 1, 20, '0', 'vxcxc', '1@1.ru', '5235345', '353554'),
(12, NULL, '2018-02-20 11:15:56', '2018-02-20 11:15:56', 1, 70, '0', 'ads1', 'myenail@mail.ru', '233242', '123'),
(13, NULL, '2018-03-15 09:25:46', '2018-03-15 09:25:46', 1, 56, '0', 'www', 'w@w.ua', '1234567', 'dgddf'),
(14, NULL, '2018-03-15 09:27:12', '2018-03-15 09:27:12', 1, 56, '0', 'www', 'w@w.ua', '1234567', 'sfgdfgdf'),
(15, NULL, '2018-03-16 21:51:31', '2018-03-16 21:51:31', 2, 40, '0', 'qqqqqqqqqqqqqqqqqqqqqqqqq', 'q@q.ua', '1234567', 'dfdfbdfgdg'),
(16, NULL, '2018-03-16 21:52:15', '2018-03-16 21:52:15', 2, 40, '0', 'qqqqqqqqqqqqqqqqqqqqqqqqq', 'q@q.ua', '12345678', 'sqdassadad'),
(17, 107, '2018-03-17 14:10:18', '2018-03-17 14:10:18', 1, 20, '0', 'qaz', 'qaz@qaz.ua', '123456', '123456'),
(18, 107, '2018-03-17 14:11:47', '2018-03-17 14:11:47', 3, 146, '0', 'qaz-----qaz', 'qaz@qaz.ua', '8765413232', 'qweqwsd'),
(19, 111, '2018-03-18 16:33:21', '2018-03-18 16:33:21', 2, 156, '0', 'aaa', 'a@a.ua', '1234567', '23424 dfgdfgdgf fsfs'),
(20, 111, '2018-03-18 16:42:11', '2018-03-18 16:42:11', 6, 336, '0', 'aaa', 'a@a.ua', '1233333434', 'sdfsdfsdfsdfsdf'),
(21, 111, '2018-03-19 09:15:15', '2018-03-19 09:15:15', 1, 56, '0', 'aaa', 'a@a.ua', '1234343434', '21212 wfsd'),
(22, 111, '2018-03-19 09:21:59', '2018-03-19 09:21:59', 1, 56, '0', 'aaa', 'volosovich@i.ua', '3132413', 'sadfsdf'),
(23, 112, '2018-03-19 10:01:21', '2018-03-19 10:01:21', 1, 20, '0', 'bbb', 'b@b.ua', '1234567', 'dfhsrthstfh'),
(24, 112, '2018-03-19 10:11:01', '2018-03-19 10:11:01', 1, 20, '0', 'aaa', 'a@a.ua', '1234567', 'gfhfsthft'),
(25, 112, '2018-03-19 10:14:57', '2018-03-19 10:14:57', 1, 20, '0', 'aaa', 'a@a.ua', '1234567', '224sfgsdfsdhg'),
(26, 112, '2018-03-19 10:16:49', '2018-03-19 10:16:49', 1, 20, '0', 'aaa', 'a@a.ua', '1234567', 'ds'),
(27, 112, '2018-03-19 10:44:34', '2018-03-19 10:44:34', 1, 20, '0', 'bbb', 'b@b.ua', '1234567', '123gfgdfgd'),
(28, 112, '2018-03-19 11:39:03', '2018-03-19 11:39:03', 2, 90, '0', 'bbb', 'b@b.ua', '1234567', '231 dfgfd');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 5, 5, 'Блузка Kira Plastinina 17-16-17453-SM-29 S', 0, 1, 0),
(2, 5, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(3, 6, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(4, 7, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(5, 7, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(6, 8, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(7, 8, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(8, 9, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(9, 9, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(10, 10, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(11, 11, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(12, 12, 4, 'Блуза Tom Tailor TT 20312490071 7610 M Зелёная', 70, 1, 70),
(13, 13, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(14, 14, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(15, 15, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 2, 40),
(16, 16, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 2, 40),
(17, 17, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(18, 18, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(19, 18, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(20, 18, 4, 'Блуза Tom Tailor TT 20312490071 7610 M Зелёная', 70, 1, 70),
(21, 19, 6, 'Кардиган Levi\'s Icy Grey Heather M', 100, 1, 100),
(22, 19, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(23, 20, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 6, 336),
(24, 21, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(25, 22, 2, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', 56, 1, 56),
(26, 23, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(27, 24, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(28, 25, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(29, 26, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(30, 27, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(31, 28, 3, 'Блуза Mango 53005681-05 M Бежевая', 20, 1, 20),
(32, 28, 4, 'Блуза Tom Tailor TT 20312490071 7610 M Зелёная', 70, 1, 70);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `content`, `price`, `keywords`, `description`, `img`, `hit`, `new`, `sale`) VALUES
(1, 4, 'Джинсы Garcia 244/32/856 28-32 р Серо-синие', '<p><img alt=\"\" src=\"/web/upload/global/3942.jpg\" style=\"height:720px; width:1280px\" />Великолепные джинсы винтажно-голубого цвета. Настоящая находка для любителей качественного денима. Особенности: Зауженные к низу Пять карманов Высококачественный деним Высокая посадка (high fit) Выгодно подчеркивают фигуру</p>\r\n', 10, '', '', 'product1.jpg', '0', '0', '0'),
(2, 4, 'Джинсы MR520 MR 227 20002 0115 29-34 р Синие', '<p>MR520 &ndash; амбициозный восточноевропейский бренд, который предлагает качественную и стильную одежду, сделанную специально для молодых людей, следящих за своим внешним видом. Женские джинсы фасона boyfriend fit (в переводе с англ. &ndash; &quot;джинсы моего парня&quot;). Модель с зауженными штанинами. Застегивается на пуговицы. Изделие с низкой посадкой. Джинсы дополнены прорезными карманами спереди и накладными карманами сзади. Изделие декорировано эффектом потертости, вареным эффектом и необычными швами.</p>\r\n', 56, '', '', 'product2.jpg', '1', '0', '0'),
(3, 9, 'Блуза Mango 53005681-05 M Бежевая', '<p>Испанский бренд модной одежды &quot;Mango&quot; родился в 1984 году в Барселоне, где и по сей день находится штаб-квартира компании. В том же городе появился и первый магазин &mdash; на улице Пасео де Грасия (Paseo de Gracia). Компания, основанная братьями Исааком и Нахманом Андиком (Isaac &amp; Nahman Andic), очень быстро набрала популярность &mdash; всего лишь годом позднее был открыт магазин в другом городе, на этот раз в Валенсии. Одежда &quot;Mango&quot; отличается высоким качеством, приемлемой ценой, современным дизайном и неповторимым стилем.</p>\r\n', 20, '', '', 'product3.jpg', '1', '1', '0'),
(4, 21, 'Блуза Tom Tailor TT 20312490071 7610 M Зелёная', '\r\n\r\nTom Tailor Group — один из ведущих и быстро развивающихся Fashion холдингов германии и европы, продукция которого ориентирована на целевую аудиторию в возрасте от 0 до 60 лет.\r\n\r\nTom Tailor известен на рынке текстиля с 1962 года и до сих пор сохраняет стандарты немецкого качества. Tom Tailor предлагает повседневную одежду и аксессуары высокого качества для женщин, мужчин и детей.\r\n\r\nОдежда от Tom Tailor поможет создать активный повседневный образ с нотками элегантности.', 70, NULL, NULL, 'product4.jpg', '1', '0', '1'),
(5, 25, 'Блузка Kira Plastinina 17-16-17453-SM-29 S', NULL, 0, NULL, NULL, 'product5.jpg', '1', '0', '0'),
(6, 28, 'Кардиган Levi\'s Icy Grey Heather M', NULL, 100, NULL, NULL, 'product6.jpg', '1', '0', '0'),
(7, 28, 'Кардиган ONLY ON 15102048 M Black Tan/Partridg', '\r\n\r\nCasual марка молодежной женской одежды ONLY является частью датской компании Bestseller AS. Изначально Bestseller занимался производством детской одежды, а в 1995 году появилась на свет марка ONLY. Популярность этой марки возрастала быстрыми темпами и теперь ONLY владеет 770 магазинами в более чем 40 странах мира.\r\n\r\nONLY — бренд стильной молодежной одежды. Это бренд для тех, кто любит добиваться успеха и быть не таким, как все. Демократичные цены, модные модели, экологически чистые ткани делают одежду от ONLY сверхпопулярной.', 0, NULL, NULL, 'no-image.png', '1', '1', '0'),
(8, 26, 'Брюки SK House 2211-1972кор L Коричневые', '<p>Компания SK House &mdash; это украинский производитель модной женской одежды с безупречной репутацией и тысячами поклонников по всему СНГ. SK House изготавливает качественный и долговечный товар, созданный из высококачественных тканей. Компания использует современные методы пошива и, изучая текущие мировые тенденции и локальные требования покупателей, создает модели, которые не задерживаются на полках длительное время и быстро раскупаются во всех странах.</p>\r\n', 99, '', '', 'no-image.png', '0', '0', '1'),
(9, 26, 'Брюки Kira Plastinina 17-07-17418-FL-58 L', NULL, 0, NULL, NULL, 'product1.jpg', '0', '0', '0'),
(10, 29, 'Сумка GUSSACI TUGUS13A060-3-10', 'Простота, инновационный стиль бренда, высококачественные требования к продукции, благодаря этому GUSSACI Italy пользуется высокой репутацией во многих странах Европы. Превосходное качество, отличный дизайн, соответствующие цены делают \"Гуссачи\" модным и популярным!\r\n\r\nОсобенности:\r\n\r\nКоличество основных отделений: 1. Сумка имеет прорезной карман на молнии, а также два небольших накладных кармана для хранения мобильного телефона, разных портативных гаджетов и мелочей. На лицевой стороне модели есть узкий прорезной карман на \"молнии\". На тыльной стороне модели есть прорезной карман на \"молнии\". Особенностью данной модели является возможность изменения ее формы при помощи дополнительной внешней застежки-молнии. Сумка имеет 2 ручки для переноса на локте или в руке. Их длина не регулируется и составляет 45 см, а высота от крайней точки ручки до сумки — 16 см. В комплект к изделию прилагается съемный плечевой ремень. Его длина может регулироваться при помощи металлической пряжки от 78 до 137.5 см. Сумка закрывается при помощи застежки-молнии.\r\n\r\nМатериал подкладки: плотная ткань.\r\nМатериал сумки: кожезаменитель.\r\nЦвет фурнитуры: золото.\r\nРазмеры сумки: 26 х 25 х 10.5 см', 15, NULL, NULL, 'product3.jpg', '0', '1', '0'),
(11, 29, 'Сумка Michael Kors Jet Set Travel Нежно-розовая', '\r\n\r\nОсобенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью. Этому дизайнеру под силу объединить американский утилитаризм в манере одеваться с европейской изысканностью и шармом. Все его работы отличает изящная утонченность, которая рождается из строгих, почти примитивных линий. Все аксессуары поддерживают общий стиль человека с безупречным вкусом.\r\n\r\nМодели Michael Kors могут оставаться оригинальными, стильными и неотразимыми в течение многих лет, что особо важно для покупательниц, не желающих постоянно обновлять свой гардероб.', 200, NULL, NULL, 'no-image.png', '0', '0', '1'),
(12, 29, 'Сумка Michael Kors Selma Золотистая', '\r\n\r\nОсобенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью. Этому дизайнеру под силу объединить американский утилитаризм в манере одеваться с европейской изысканностью и шармом. Все его работы отличает изящная утонченность, которая рождается из строгих, почти примитивных линий. Все аксессуары поддерживают общий стиль человека с безупречным вкусом.\r\n\r\nМодели Michael Kors могут оставаться оригинальными, стильными и неотразимыми в течение многих лет, что особо важно для покупательниц, не желающих постоянно обновлять свой гардероб.', 205, NULL, NULL, 'product5.jpg', '0', '0', '0'),
(13, 29, 'Сумка Michael Kors Bedford Красная', '\r\n\r\nОсобенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью. Этому дизайнеру под силу объединить американский утилитаризм в манере одеваться с европейской изысканностью и шармом. Все его работы отличает изящная утонченность, которая рождается из строгих, почти примитивных линий. Все аксессуары поддерживают общий стиль человека с безупречным вкусом.\r\n\r\nМодели Michael Kors могут оставаться оригинальными, стильными и неотразимыми в течение многих лет, что особо важно для покупательниц, не желающих постоянно обновлять свой гардероб.', 0, NULL, NULL, 'no-image.png', '0', '0', '0'),
(14, 29, 'Сумка Michael Kors JS Travel Светло-розовая', '<p>Особенность стиля Michael Kors заключается в том, что простота его коллекций гармонирует с роскошью. Этому дизайнеру под силу объединить американский утилитаризм в манере одеваться с европейской изысканностью и шармом. Все его работы отличает изящная утонченность, которая рождается из строгих, почти примитивных линий. Все аксессуары поддерживают общий стиль человека с безупречным вкусом. Модели Michael Kors могут оставаться оригинальными, стильными и неотразимыми в течение многих лет, что особо важно для покупательниц, не желающих постоянно обновлять свой гардероб.</p>\r\n', 0, '', '', 'no-image.png', '0', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `email`, `status`, `created_at`, `updated_at`, `isAdmin`) VALUES
(1, 'admin', '$2y$13$GvZYui6S.IFA10Di8vbWveWdgI6.48yqsnxZ9fv7UjJ9YEKvEMF0i', 'k38i2hh4tJKoLHCqAesO2OrzOFEski_X', '', 10, '2018-03-10 14:05:30', '2018-03-10 14:05:30', 1),
(111, 'aaa', '$2y$13$10FaFmPgtIlOLGmK2m3.1OoyLqKcmAL9uONKMvKOhFWnmW5TYRuRe', 'ylOfRZjC9XLziQbJTgqagDqaPX91-Cf9', 'a@a.ua', 10, '2018-03-18 13:46:57', '2018-03-18 13:46:57', 0),
(112, 'bbb', '$2y$13$kXF8cm6ChBy.NpfLTjqy6.bfGgwQt1Co6980GbNXqfqut0/OJZeMS', '94-WZwBvr_Si842bINakZXYYx91QIYNb', 'b@b.ua', 10, '2018-03-18 13:47:20', '2018-03-18 13:47:20', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
