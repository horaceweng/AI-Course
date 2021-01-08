-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 06, 2021 at 04:32 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AI05`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_accnt`
--

CREATE TABLE `t_accnt` (
  `id` int(11) NOT NULL,
  `uname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` int(11) NOT NULL,
  `tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_accnt`
--

INSERT INTO `t_accnt` (`id`, `uname`, `passwd`, `tag`) VALUES
(1, '林宇玲', 111, 1),
(2, '楊佩宜', 111, 1),
(3, '王儀', 111, 1),
(4, '劉珈彣', 111, 1),
(5, '陳瑜如', 111, 1),
(6, '王筑琪', 111, 1),
(7, '吳佳穎', 111, 1),
(8, '吳佩姍', 111, 1),
(9, '吳韋智', 111, 1),
(10, '陳宜嫻', 111, 1),
(11, '陳志明', 111, 1),
(12, '何秉宸', 111, 1),
(13, '賴佳臨', 111, 1),
(14, '蕭上韋', 111, 1),
(15, '蕭信潔', 111, 1),
(16, '洪綉镁', 111, 1),
(17, '周承漢', 111, 1),
(18, '廖啟宏', 111, 1),
(19, '翁先弘', 111, 1),
(20, '邱珮芝', 111, 1),
(21, '鄭博駿', 111, 1),
(22, '林彩姿', 111, 1),
(23, '廖柏鈞', 111, 1),
(24, '彭玉婷', 111, 1),
(25, '邱子玄', 111, 1),
(26, '曹弘中', 111, 1),
(27, '李守豐', 111, 1),
(28, '黃彥彰', 111, 1),
(29, '柯文竣', 111, 1),
(30, '王姿惠', 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_bd`
--

CREATE TABLE `t_bd` (
  `id` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `uname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `bdtype` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_bd`
--

INSERT INTO `t_bd` (`id`, `cdate`, `uname`, `bdtype`, `tag`) VALUES
(1, '2021-01-05', 'apollo', '葷', 1),
(2, '2021-01-05', 'vicky', '素', 1),
(3, '2021-01-05', 'pig', '葷', 0),
(5, '2021-01-05', 'apollo', '素', 1),
(6, '2021-01-05', 'apollo', '素', 1),
(7, '2021-01-05', 'vicky', '葷', 1),
(8, '2021-01-05', 'pig', '葷', 0),
(9, '2021-01-05', 'pig', '葷', 0),
(10, '2021-01-06', '林宇玲', '葷', 0),
(11, '2021-01-06', '楊佩宜', '素', 1),
(12, '2021-01-06', '王儀', '葷', 1),
(13, '2021-01-06', '劉珈彣', '素', 1),
(46, '2021-01-06', '林宇玲', '葷', 1),
(47, '2021-01-06', '吳佳穎', '葷', 0),
(49, '2021-01-06', '吳佳穎', '素', 1),
(50, '2021-01-06', '王筑琪', '葷', 0),
(51, '2021-01-06', '王筑琪', '素', 1),
(52, '2021-01-06', '吳韋智', '葷', 1),
(53, '2021-01-06', '陳宜嫻', '葷', 1),
(54, '2021-01-06', '吳佩姍', '葷', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_accnt`
--
ALTER TABLE `t_accnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bd`
--
ALTER TABLE `t_bd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_accnt`
--
ALTER TABLE `t_accnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_bd`
--
ALTER TABLE `t_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
