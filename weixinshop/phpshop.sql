-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-08-07 15:34:51
-- 服务器版本： 5.5.53
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `it_address`
--

CREATE TABLE `it_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '电话号码',
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '省份',
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '城市',
  `country` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '区县',
  `detail` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '详细地址',
  `user_id` int(11) NOT NULL COMMENT '用户信息',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_address`
--

INSERT INTO `it_address` (`id`, `name`, `mobile`, `province`, `city`, `country`, `detail`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '张三', '020-81167888', '广东省', '广州市', '海珠区', '新港中路397号', 1, '2018-08-07 03:56:44', '2018-08-07 03:56:44');

-- --------------------------------------------------------

--
-- 表的结构 `it_admin`
--

CREATE TABLE `it_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_admin`
--

INSERT INTO `it_admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '宋江', '$2y$10$y8QZ8h7aaBwbPyR1rF7wTeEptmtrpfycnjoXgUXQDS7sHTBp8cT7q', 'QaqIM8D4PFy5Jvv6clLwHQJaBlIYDVwWsvhTneXi28y5bBJuwJZzWinYdK1V', NULL, '2018-08-03 01:51:33'),
(2, 'libai', '$2y$10$jYnDp8NQjPZ1us46lEYdMuftgDju2ugt9fAYtNxIyBdRQB6PD8yKi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `it_category`
--

CREATE TABLE `it_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '栏目名称',
  `cat_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目描述',
  `cat_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目缩略图',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_category`
--

INSERT INTO `it_category` (`id`, `cat_name`, `cat_desc`, `cat_thumb`, `created_at`, `updated_at`) VALUES
(1, '保湿产品', '让肌肤充满了水！', '/uploads/image/category1.jpg', NULL, NULL),
(2, '美白产品', '肌肤晶莹剔透，白里透红！', '/uploads/image/index-banner1.jpg', NULL, NULL),
(3, '去皱产品', '肌肤宛如新生，肤若凝脂！', '/uploads/image/category3.jpg', '2018-08-02 03:11:45', '2018-08-02 03:11:45'),
(4, '祛痘产品', '排毒养颜，立回光嫩肌肤', '/uploads/image/index-banner2.jpg', NULL, NULL),
(5, '手工香皂', '手工香皂，香气醇厚', '/uploads/image/index-banner3.jpg', NULL, NULL);


-- --------------------------------------------------------

--
-- 表的结构 `it_goods`
--

CREATE TABLE `it_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `cat_id` int(11) NOT NULL COMMENT '所属栏目的id',
  `goods_price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `stock` int(11) NOT NULL DEFAULT '100' COMMENT '库存',
  `goods_thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `goods_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `is_hot` int(11) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_goods`
--

INSERT INTO `it_goods` (`id`, `goods_name`, `cat_id`, `goods_price`, `stock`, `goods_thumb`, `goods_desc`, `is_hot`, `created_at`, `updated_at`) VALUES
(1, '珀莱雅美白', 2, '120.00', 100, '/uploads/image/product_8.jpg', '美白保湿', 1, '2018-08-03 02:28:41', '2018-08-03 02:28:41'),
(2, '芦荟保湿', 1, '280.00', 80, '/uploads/image/product_7.jpg', '芦荟保湿，功能卓越', 0, '2018-08-03 02:28:41', '2018-08-03 02:28:41'),
(3, '去皱霜', 3, '800.00', 120, '/uploads/image/product_9.jpg', '去皱晚霜', 1, '2018-08-03 03:44:59', '2018-08-03 03:44:59'),
(4, '祛痘套装', 4, '999.00', 100, '/uploads/image/product_2.jpg', '祛痘三件套', 1, '2018-08-03 03:45:33', '2018-08-03 03:45:33'),
(5, '保湿精华水', 1, '99.00', 50, '/uploads/image/product_4.jpg', '内含大量保湿精华', 1, '2018-08-03 03:51:16', '2018-08-03 03:51:16'),
(6, '牛奶香皂', 5, '58.00', 30, '/uploads/image/product_11.jpg', '纯手工，进口奶酪香皂', 1, NULL, NULL),
(7, '去皱眼霜', 3, '699.00', 80, '/uploads/image/product_10.jpg', '去除岁月皱纹，还你一双明眸！', 0, NULL, NULL),
(8, '玫瑰香皂', 5, '58.00', 30, '/uploads/image/product_5.jpg', '玫瑰香氛', 0, NULL, NULL),
(9, '黑泥香皂', 5, '58.00', 30, '/uploads/image/product_3.jpg', '源自太平洋深层海藻泥', 0, NULL, NULL),
(10, '桂花香皂', 5, '58.00', 30, '/uploads/image/product_6.jpg', '浓浓桂花香', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `it_migrations`
--

CREATE TABLE `it_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_migrations`
--

INSERT INTO `it_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_02_091906_create_user_table', 1),
(2, '2018_08_02_092327_create_category_table', 1),
(3, '2018_08_02_154644_create_admin_table', 2),
(5, '2018_08_03_101518_create_goods_table', 3),
(6, '2018_08_07_093819_create_user_table', 4),
(7, '2018_08_07_112920_create_address_table', 5),
(8, '2018_08_07_151109_create_order_table', 6);

-- --------------------------------------------------------

--
-- 表的结构 `it_order`
--

CREATE TABLE `it_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '会员的id',
  `order_sn` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单的编号',
  `order_price` decimal(9,2) NOT NULL COMMENT '订单金额',
  `order_status` int(11) NOT NULL DEFAULT '1' COMMENT '订单状态1正常0取消',
  `trade_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '订单交易号',
  `is_pay` int(11) NOT NULL DEFAULT '0' COMMENT '是否支付1已经支付',
  `is_shop` int(11) NOT NULL DEFAULT '0' COMMENT '是否发货0未发货',
  `is_receipt` int(11) NOT NULL DEFAULT '0' COMMENT '是否收货0未收货',
  `order_msg` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '订单留言',
  `address` varchar(108) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '收货地址',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_order`
--

INSERT INTO `it_order` (`id`, `user_id`, `order_sn`, `order_price`, `order_status`, `trade_no`, `is_pay`, `is_shop`, `is_receipt`, `order_msg`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, '5b69498e257ea', '493.84', 1, '', 0, 0, 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `it_order_goods`
--

CREATE TABLE `it_order_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL COMMENT '订单id',
  `goods_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品缩略图',
  `goods_price` decimal(9,2) NOT NULL COMMENT '商品金额',
  `goods_counts` int(11) NOT NULL COMMENT '购买数量',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_order_goods`
--

INSERT INTO `it_order_goods` (`id`, `order_id`, `goods_name`, `goods_thumb`, `goods_price`, `goods_counts`, `created_at`, `updated_at`) VALUES
(1, 1, '水壶帽', 'http://www.shopapi.com/uploads/goods/a79644dd0e80638026196dce6715c368.jpeg', '56.90', 5, NULL, NULL),
(2, 1, '太阳帽', 'http://www.shopapi.com/uploads/goods/1f95a161bce32eaff2203b0ef5a6767b.jpeg', '34.89', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `it_user`
--

CREATE TABLE `it_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `openid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'openid',
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `extend` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '扩展',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `it_user`
--

INSERT INTO `it_user` (`id`, `openid`, `nickname`, `extend`, `created_at`, `updated_at`) VALUES
(1, 'osnoY4yuuNinUh0QL8NWd7w6HdAk', '雄鹰展翅', '', '2018-08-07 01:46:55', '2018-08-07 03:08:18');

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `it_address`
--
ALTER TABLE `it_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_name_unique` (`name`);

--
-- Indexes for table `it_admin`
--
ALTER TABLE `it_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `it_category`
--
ALTER TABLE `it_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_cat_name_unique` (`cat_name`);

--
-- Indexes for table `it_goods`
--
ALTER TABLE `it_goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goods_goods_name_unique` (`goods_name`);

--
-- Indexes for table `it_migrations`
--
ALTER TABLE `it_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_order`
--
ALTER TABLE `it_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_order_goods`
--
ALTER TABLE `it_order_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_user`
--
ALTER TABLE `it_user`
  ADD PRIMARY KEY (`id`);



--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `it_address`
--
ALTER TABLE `it_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `it_admin`
--
ALTER TABLE `it_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `it_category`
--
ALTER TABLE `it_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `it_goods`
--
ALTER TABLE `it_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `it_migrations`
--
ALTER TABLE `it_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `it_order`
--
ALTER TABLE `it_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `it_order_goods`
--
ALTER TABLE `it_order_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `it_user`
--
ALTER TABLE `it_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
