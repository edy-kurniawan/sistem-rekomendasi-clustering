-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 02:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrekomendasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstra`
--

CREATE TABLE `tb_ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `kode_ekstra` varchar(15) DEFAULT NULL,
  `nama_ekstra` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ekstra`
--

INSERT INTO `tb_ekstra` (`id_ekstra`, `kode_ekstra`, `nama_ekstra`) VALUES
(5, 'E1', 'Hisbul Wathan'),
(6, 'E2', 'Tapak Suci'),
(7, 'E3', 'PMR'),
(8, 'E4', 'Pleton Khusus'),
(9, 'E5', 'Volly'),
(10, 'E6', 'Sepakbola'),
(11, 'E7', 'Musik'),
(12, 'E8', 'Bahasa Jepang'),
(13, 'E9', 'Futsal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_loguser`
--

CREATE TABLE `tb_loguser` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_loguser`
--

INSERT INTO `tb_loguser` (`user`, `pass`) VALUES
('user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_user`, `id_ekstra`, `nilai`) VALUES
(28, 7, 5, 7),
(29, 7, 6, 4),
(31, 8, 5, 2),
(32, 8, 6, 5),
(34, 7, 7, 3),
(35, 8, 7, 2),
(37, 7, 8, 5),
(38, 8, 8, 2),
(40, 7, 9, 2),
(41, 8, 9, 5),
(43, 7, 10, 8),
(44, 8, 10, 4),
(46, 7, 11, 5),
(47, 8, 11, 8),
(49, 7, 12, 2),
(50, 8, 12, 2),
(52, 7, 13, 9),
(53, 8, 13, 5),
(54, 9, 5, 5),
(55, 9, 6, 4),
(56, 9, 7, 6),
(57, 9, 8, 6),
(58, 9, 9, 6),
(59, 9, 10, 6),
(60, 9, 11, 7),
(61, 9, 12, 6),
(62, 9, 13, 8),
(69, 10, 5, 5),
(70, 10, 6, 5),
(71, 10, 7, 5),
(72, 10, 8, 5),
(73, 10, 9, 5),
(74, 10, 10, 5),
(75, 10, 11, 5),
(76, 10, 12, 5),
(77, 10, 13, 5),
(84, 11, 5, 10),
(85, 11, 6, 10),
(86, 11, 7, 10),
(87, 11, 8, 10),
(88, 11, 9, 10),
(89, 11, 10, 10),
(90, 11, 11, 10),
(91, 11, 12, 10),
(92, 11, 13, 10),
(99, 12, 5, 10),
(100, 12, 6, 10),
(101, 12, 7, 5),
(102, 12, 8, 9),
(103, 12, 9, 10),
(104, 12, 10, 10),
(105, 12, 11, 10),
(106, 12, 12, 9),
(107, 12, 13, 10),
(114, 13, 5, 10),
(115, 13, 6, 10),
(116, 13, 7, 10),
(117, 13, 8, 10),
(118, 13, 9, 10),
(119, 13, 10, 10),
(120, 13, 11, 10),
(121, 13, 12, 10),
(122, 13, 13, 10),
(129, 14, 5, 3),
(130, 14, 6, 4),
(131, 14, 7, 3),
(132, 14, 8, 4),
(133, 14, 9, 3),
(134, 14, 10, 3),
(135, 14, 11, 4),
(136, 14, 12, 4),
(137, 14, 13, 2),
(144, 15, 5, 1),
(145, 15, 6, 2),
(146, 15, 7, 1),
(147, 15, 8, 1),
(148, 15, 9, 1),
(149, 15, 10, 1),
(150, 15, 11, 1),
(151, 15, 12, 1),
(152, 15, 13, 1),
(159, 16, 5, 10),
(160, 16, 6, 10),
(161, 16, 7, 10),
(162, 16, 8, 10),
(163, 16, 9, 10),
(164, 16, 10, 10),
(165, 16, 11, 10),
(166, 16, 12, 10),
(167, 16, 13, 10),
(174, 17, 5, 7),
(175, 17, 6, 8),
(176, 17, 7, 7),
(177, 17, 8, 8),
(178, 17, 9, 7),
(179, 17, 10, 8),
(180, 17, 11, 7),
(181, 17, 12, 8),
(182, 17, 13, 9),
(189, 18, 5, 9),
(190, 18, 6, 9),
(191, 18, 7, 8),
(192, 18, 8, 9),
(193, 18, 9, 10),
(194, 18, 10, 10),
(195, 18, 11, 9),
(196, 18, 12, 8),
(197, 18, 13, 10),
(204, 19, 5, 4),
(205, 19, 6, 2),
(206, 19, 7, 3),
(207, 19, 8, 2),
(208, 19, 9, 4),
(209, 19, 10, 2),
(210, 19, 11, 3),
(211, 19, 12, 4),
(212, 19, 13, 2),
(219, 20, 5, 5),
(220, 20, 6, 8),
(221, 20, 7, 6),
(222, 20, 8, 5),
(223, 20, 9, 7),
(224, 20, 10, 8),
(225, 20, 11, 8),
(226, 20, 12, 7),
(227, 20, 13, 8),
(234, 21, 5, 8),
(235, 21, 6, 8),
(236, 21, 7, 8),
(237, 21, 8, 8),
(238, 21, 9, 8),
(239, 21, 10, 8),
(240, 21, 11, 8),
(241, 21, 12, 8),
(242, 21, 13, 8),
(249, 22, 5, 7),
(250, 22, 6, 7),
(251, 22, 7, 7),
(252, 22, 8, 7),
(253, 22, 9, 7),
(254, 22, 10, 7),
(255, 22, 11, 7),
(256, 22, 12, 7),
(257, 22, 13, 7),
(264, 23, 5, 4),
(265, 23, 6, 5),
(266, 23, 7, 6),
(267, 23, 8, 6),
(268, 23, 9, 5),
(269, 23, 10, 7),
(270, 23, 11, 8),
(271, 23, 12, 6),
(272, 23, 13, 6),
(279, 24, 5, 8),
(280, 24, 6, 8),
(281, 24, 7, 8),
(282, 24, 8, 8),
(283, 24, 9, 8),
(284, 24, 10, 8),
(285, 24, 11, 8),
(286, 24, 12, 8),
(287, 24, 13, 8),
(294, 25, 5, 3),
(295, 25, 6, 3),
(296, 25, 7, 4),
(297, 25, 8, 2),
(298, 25, 9, 4),
(299, 25, 10, 4),
(300, 25, 11, 4),
(301, 25, 12, 1),
(302, 25, 13, 4),
(309, 26, 5, 6),
(310, 26, 6, 8),
(311, 26, 7, 8),
(312, 26, 8, 7),
(313, 26, 9, 7),
(314, 26, 10, 8),
(315, 26, 11, 9),
(316, 26, 12, 7),
(317, 26, 13, 7),
(324, 27, 5, 9),
(325, 27, 6, 8),
(326, 27, 7, 9),
(327, 27, 8, 9),
(328, 27, 9, 8),
(329, 27, 10, 8),
(330, 27, 11, 9),
(331, 27, 12, 8),
(332, 27, 13, 9),
(339, 28, 5, 8),
(340, 28, 6, 7),
(341, 28, 7, 6),
(342, 28, 8, 6),
(343, 28, 9, 8),
(344, 28, 10, 6),
(345, 28, 11, 9),
(346, 28, 12, 5),
(347, 28, 13, 5),
(354, 29, 5, 1),
(355, 29, 6, 1),
(356, 29, 7, 3),
(357, 29, 8, 1),
(358, 29, 9, 2),
(359, 29, 10, 2),
(360, 29, 11, 4),
(361, 29, 12, 4),
(362, 29, 13, 2),
(369, 30, 5, 4),
(370, 30, 6, 4),
(371, 30, 7, 4),
(372, 30, 8, 4),
(373, 30, 9, 4),
(374, 30, 10, 4),
(375, 30, 11, 4),
(376, 30, 12, 4),
(377, 30, 13, 4),
(384, 31, 5, 2),
(385, 31, 6, 3),
(386, 31, 7, 2),
(387, 31, 8, 3),
(388, 31, 9, 3),
(389, 31, 10, 2),
(390, 31, 11, 3),
(391, 31, 12, 2),
(392, 31, 13, 3),
(399, 32, 5, 5),
(400, 32, 6, 5),
(401, 32, 7, 6),
(402, 32, 8, 4),
(403, 32, 9, 6),
(404, 32, 10, 6),
(405, 32, 11, 6),
(406, 32, 12, 5),
(407, 32, 13, 7),
(414, 33, 5, 5),
(415, 33, 6, 1),
(416, 33, 7, 3),
(417, 33, 8, 2),
(418, 33, 9, 2),
(419, 33, 10, 2),
(420, 33, 11, 4),
(421, 33, 12, 2),
(422, 33, 13, 2),
(429, 34, 5, 1),
(430, 34, 6, 1),
(431, 34, 7, 1),
(432, 34, 8, 1),
(433, 34, 9, 1),
(434, 34, 10, 4),
(435, 34, 11, 2),
(436, 34, 12, 1),
(437, 34, 13, 4),
(444, 35, 5, 6),
(445, 35, 6, 7),
(446, 35, 7, 8),
(447, 35, 8, 9),
(448, 35, 9, 8),
(449, 35, 10, 7),
(450, 35, 11, 10),
(451, 35, 12, 9),
(452, 35, 13, 10),
(459, 36, 5, 4),
(460, 36, 6, 4),
(461, 36, 7, 4),
(462, 36, 8, 4),
(463, 36, 9, 4),
(464, 36, 10, 4),
(465, 36, 11, 4),
(466, 36, 12, 4),
(467, 36, 13, 4),
(474, 37, 5, 3),
(475, 37, 6, 3),
(476, 37, 7, 4),
(477, 37, 8, 2),
(478, 37, 9, 3),
(479, 37, 10, 3),
(480, 37, 11, 4),
(481, 37, 12, 4),
(482, 37, 13, 4),
(489, 38, 5, 8),
(490, 38, 6, 9),
(491, 38, 7, 10),
(492, 38, 8, 8),
(493, 38, 9, 8),
(494, 38, 10, 10),
(495, 38, 11, 8),
(496, 38, 12, 8),
(497, 38, 13, 10),
(504, 39, 5, 8),
(505, 39, 6, 7),
(506, 39, 7, 4),
(507, 39, 8, 4),
(508, 39, 9, 6),
(509, 39, 10, 9),
(510, 39, 11, 7),
(511, 39, 12, 4),
(512, 39, 13, 9),
(519, 40, 5, 5),
(520, 40, 6, 5),
(521, 40, 7, 5),
(522, 40, 8, 5),
(523, 40, 9, 5),
(524, 40, 10, 5),
(525, 40, 11, 5),
(526, 40, 12, 5),
(527, 40, 13, 5),
(534, 41, 5, 8),
(535, 41, 6, 8),
(536, 41, 7, 7),
(537, 41, 8, 8),
(538, 41, 9, 10),
(539, 41, 10, 10),
(540, 41, 11, 8),
(541, 41, 12, 8),
(542, 41, 13, 10),
(549, 42, 5, 8),
(550, 42, 6, 8),
(551, 42, 7, 8),
(552, 42, 8, 8),
(553, 42, 9, 8),
(554, 42, 10, 8),
(555, 42, 11, 8),
(556, 42, 12, 8),
(557, 42, 13, 8),
(564, 43, 5, 7),
(565, 43, 6, 7),
(566, 43, 7, 7),
(567, 43, 8, 7),
(568, 43, 9, 7),
(569, 43, 10, 7),
(570, 43, 11, 7),
(571, 43, 12, 7),
(572, 43, 13, 7),
(579, 44, 5, 8),
(580, 44, 6, 6),
(581, 44, 7, 8),
(582, 44, 8, 6),
(583, 44, 9, 7),
(584, 44, 10, 5),
(585, 44, 11, 8),
(586, 44, 12, 5),
(587, 44, 13, 4),
(594, 45, 5, 7),
(595, 45, 6, 7),
(596, 45, 7, 3),
(597, 45, 8, 3),
(598, 45, 9, 3),
(599, 45, 10, 6),
(600, 45, 11, 4),
(601, 45, 12, 3),
(602, 45, 13, 8),
(609, 46, 5, 2),
(610, 46, 6, 2),
(611, 46, 7, 4),
(612, 46, 8, 4),
(613, 46, 9, 4),
(614, 46, 10, 3),
(615, 46, 11, 1),
(616, 46, 12, 4),
(617, 46, 13, 4),
(624, 47, 5, 2),
(625, 47, 6, 2),
(626, 47, 7, 2),
(627, 47, 8, 2),
(628, 47, 9, 4),
(629, 47, 10, 4),
(630, 47, 11, 4),
(631, 47, 12, 4),
(632, 47, 13, 4),
(639, 48, 5, 8),
(640, 48, 6, 8),
(641, 48, 7, 8),
(642, 48, 8, 8),
(643, 48, 9, 8),
(644, 48, 10, 8),
(645, 48, 11, 8),
(646, 48, 12, 8),
(647, 48, 13, 9),
(654, 49, 5, 7),
(655, 49, 6, 6),
(656, 49, 7, 8),
(657, 49, 8, 3),
(658, 49, 9, 2),
(659, 49, 10, 2),
(660, 49, 11, 3),
(661, 49, 12, 2),
(662, 49, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(15) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `kode_user`, `nama_user`, `keterangan`) VALUES
(9, 'P1', 'Jagad Dwi Satria', 'TSM'),
(10, 'P2', 'Zaki Nuruzzaman N', 'TSM'),
(11, 'P3', 'Muslim M Hanafi', 'TSM'),
(12, 'P4', 'Muhammad Setia Budi', 'TSM'),
(13, 'P5', 'Alfian septiandanu', 'TSM'),
(14, 'P6', 'Ridwan bima wiratama', 'TSM'),
(15, 'P7', 'Tito sahyogi wibowo', 'TSM'),
(16, 'P8', 'Dimas Eka Arya saputra', 'TSM'),
(17, 'P9', 'Hasan Syukur A', 'TSM'),
(18, 'P10', 'Muhammad Abin Mulyono', 'TSM'),
(19, 'P11', 'Akbar putera utama ', 'TSM'),
(20, 'P12', 'Choirul p', 'TSM'),
(21, 'P13', 'IRFAN KURNIAWAN', 'TKR'),
(22, 'P14', 'Alexander ', 'TEI'),
(23, 'P15', 'Nur Azizah', 'TKJ'),
(24, 'P16', 'Dani prasetyo', 'TSM'),
(25, 'P17', 'Ayu solekhah putri handayani', 'TKJ'),
(26, 'P18', 'Dewi Nafiika W', 'TKJ'),
(27, 'P19', 'Dyah wening indriaswati', 'TKJ'),
(28, 'P20', 'Devina Maya Alvionita', 'TKJ'),
(29, 'P21', 'Ririn Dwi Kurniawati', 'TEI'),
(30, 'P22', 'Dian Pratiwi', 'TKJ'),
(31, 'P23', 'Fitri Puji Astuti', 'TKJ'),
(32, 'P24', 'Istiyaning Agesti', 'TKJ'),
(33, 'P25', 'Alfia yuniar', 'TKJ'),
(34, 'P26', 'Ruben Givaru', 'TP'),
(35, 'P27', 'anisa fatmawati', 'TKJ'),
(36, 'P28', 'Anisa Ayu Anggraini', 'TKJ'),
(37, 'P29', 'Arifah Nurul', 'TKJ'),
(38, 'P30', 'Arif Hakim', 'RPL'),
(39, 'P31', 'Kenang fathoni aji prakoso', 'TKR'),
(40, 'P32', 'Putri Novitasari', 'TKJ'),
(41, 'P33', 'Rovik Fatkurohmah', 'TKJ'),
(42, 'P34', 'Anita setyaningsih', 'RPL'),
(43, 'P45', 'Marlina Dzulaida Arini', 'TKJ'),
(44, 'P36', 'Yohana', 'RPL'),
(45, 'P37', 'Karuniawan Putra Mulyanza', 'TSM'),
(46, 'P38', 'Tukijem', 'TKJ'),
(47, 'P39', 'Romadlon Ahmad Mustaqim ', 'TKJ'),
(48, 'P40', 'Fajar saputra', 'TKJ'),
(49, 'P41', 'Tazkia Putri Najibah', 'TKJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ekstra`
--
ALTER TABLE `tb_ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_loguser`
--
ALTER TABLE `tb_loguser`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ekstra`
--
ALTER TABLE `tb_ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
