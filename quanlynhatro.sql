-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 05:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhatro`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_nhatro` int(11) NOT NULL,
  `diem` int(11) NOT NULL,
  `noidung` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id`, `id_taikhoan`, `id_nhatro`, `diem`, `noidung`, `img1`, `img2`, `video`, `thoigian`) VALUES
(1283, 23, 724, 5, 'nhà trọ đẹp thoáng mát, mọi người đến ở cùng mình cho vui', 'uploads/2.1.jpg', 'uploads/2.3.jpg', 'uploads/sdasdasd.mp4', '2023-05-26 04:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `img_nhatro`
--

CREATE TABLE `img_nhatro` (
  `id` int(11) NOT NULL,
  `id_nhatro` int(11) NOT NULL,
  `name_img` varchar(33) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_nhatro`
--

INSERT INTO `img_nhatro` (`id`, `id_nhatro`, `name_img`) VALUES
(714, 721, '2.1.jpg'),
(715, 721, '2.2.jpg'),
(716, 721, '2.3.jpg'),
(717, 721, '2.4.jpg'),
(718, 722, '3.2.jpg'),
(719, 722, '3.3.jpg'),
(720, 722, '3.4.jpg'),
(721, 722, '3.jpg'),
(722, 723, '4.2.jpg'),
(723, 723, '4.3.jpg'),
(724, 723, '4.4.jpg'),
(725, 723, '4.jpg'),
(726, 724, '5.1.jpg'),
(727, 724, '5.2.jpg'),
(728, 724, '5.3.jpg'),
(729, 724, '5.4.jpg'),
(730, 725, '2.1.jpg'),
(731, 725, '2.2.jpg'),
(732, 725, '2.3.jpg'),
(733, 725, '2.4.jpg'),
(734, 726, '2.2.jpg'),
(735, 726, '2.3.jpg'),
(736, 726, '2.4.jpg'),
(737, 726, '2.5.jpg'),
(738, 727, '3.1.jpg'),
(739, 727, '3.2.jpg'),
(740, 727, '3.3.jpg'),
(741, 727, '3.4.jpg'),
(742, 728, '4.1.jpg'),
(743, 728, '4.2.jpg'),
(744, 728, '4.3.jpg'),
(745, 728, '4.4.jpg'),
(746, 729, '5.1.jpg'),
(747, 729, '5.2.jpg'),
(748, 729, '5.3.jpg'),
(749, 729, '5.4.jpg'),
(750, 730, '2.2.jpg'),
(751, 730, '2.3.jpg'),
(752, 730, '2.5.jpg'),
(753, 730, '2.jpg'),
(754, 731, '2.1.jpg'),
(755, 731, '2.2.jpg'),
(756, 731, '2.3.jpg'),
(757, 731, '2.5.jpg'),
(758, 732, '3.4.jpg'),
(759, 732, '3.jpg'),
(760, 732, '4.1.jpg'),
(761, 732, '4.2.jpg'),
(762, 733, '2.jpg'),
(763, 733, '3.1.jpg'),
(764, 733, '3.2.jpg'),
(765, 733, '3.3.jpg'),
(766, 734, '4.jpg'),
(767, 734, '5.1.jpg'),
(768, 734, '5.2.jpg'),
(769, 734, '5.3.jpg'),
(770, 735, '2.jpg'),
(771, 735, '3.1.jpg'),
(772, 735, '3.2.jpg'),
(773, 735, '3.3.jpg'),
(774, 759, '5.1.jpg'),
(775, 759, '5.2.jpg'),
(776, 759, '5.3.jpg'),
(777, 759, '5.4.jpg'),
(778, 720, '5.1.jpg'),
(779, 720, '5.2.jpg'),
(780, 720, '5.3.jpg'),
(781, 720, '5.4.jpg'),
(782, 736, '2.jpg'),
(783, 736, '3.1.jpg'),
(784, 736, '3.2.jpg'),
(785, 736, '3.3.jpg'),
(786, 737, '2.jpg'),
(787, 737, '3.1.jpg'),
(788, 737, '3.2.jpg'),
(789, 737, '3.3.jpg'),
(790, 738, '4.2.jpg'),
(791, 738, '4.3.jpg'),
(792, 738, '4.4.jpg'),
(793, 738, '4.jpg'),
(794, 739, '3.4.jpg'),
(795, 739, '3.jpg'),
(796, 739, '4.2.jpg'),
(797, 739, '4.3.jpg'),
(798, 740, '4.1.jpg'),
(799, 740, '4.2.jpg'),
(800, 740, '4.3.jpg'),
(801, 740, '4.jpg'),
(802, 741, '4.1.jpg'),
(803, 741, '4.2.jpg'),
(804, 741, '4.3.jpg'),
(805, 741, '5.3.jpg'),
(806, 742, '3.1.jpg'),
(807, 742, '3.2.jpg'),
(808, 742, '3.3.jpg'),
(809, 742, '3.4.jpg'),
(810, 743, '2.1.jpg'),
(811, 743, '2.2.jpg'),
(812, 743, '2.3.jpg'),
(813, 743, '2.4.jpg'),
(814, 744, '4.3 - Copy.jpg'),
(815, 744, '4.3.jpg'),
(816, 744, '4.4 - Copy - Copy.jpg'),
(817, 744, '4.4 - Copy (2).jpg'),
(818, 745, '3.4.jpg'),
(819, 745, '3.jpg'),
(820, 745, '4.1.jpg'),
(821, 745, '4.2.jpg'),
(822, 746, '4.1.jpg'),
(823, 746, '4.2.jpg'),
(824, 746, '4.3 - Copy.jpg'),
(825, 746, '4.3.jpg'),
(826, 747, '4.1.jpg'),
(827, 747, '4.2.jpg'),
(828, 747, '4.3 - Copy.jpg'),
(829, 747, '4.4 - Copy - Copy.jpg'),
(830, 748, '2.5.jpg'),
(831, 748, '2.jpg'),
(832, 748, '3.1.jpg'),
(833, 748, '3.2.jpg'),
(834, 749, '2.2.jpg'),
(835, 749, '2.3.jpg'),
(836, 749, '2.4.jpg'),
(837, 749, '2.5.jpg'),
(838, 750, '3.jpg'),
(839, 750, '3.2.jpg'),
(840, 750, '3.3.jpg'),
(841, 750, '3.4.jpg'),
(842, 751, '4.1.jpg'),
(843, 751, '4.2.jpg'),
(844, 751, '4.4.jpg'),
(845, 751, '4.jpg'),
(846, 752, '4.4.jpg'),
(847, 752, '4.jpg'),
(848, 752, '5.1.jpg'),
(849, 752, '5.2 - Copy.jpg'),
(850, 754, '3.1.jpg'),
(851, 754, '3.2.jpg'),
(852, 754, '3.3.jpg'),
(853, 754, '3.4.jpg'),
(854, 753, '2.2.jpg'),
(855, 753, '2.3.jpg'),
(856, 753, '2.5.jpg'),
(857, 753, '2.jpg'),
(858, 755, '2.1.jpg'),
(859, 755, '2.2.jpg'),
(860, 755, '2.3.jpg'),
(861, 755, '2.4.jpg'),
(862, 756, '3.2.jpg'),
(863, 756, '3.3.jpg'),
(864, 756, '3.4.jpg'),
(865, 756, '3.jpg'),
(866, 757, '2.2.jpg'),
(867, 757, '2.3.jpg'),
(868, 757, '2.4.jpg'),
(869, 757, '2.5.jpg'),
(870, 758, '4.2.jpg'),
(871, 758, '4.3 - Copy.jpg'),
(872, 758, '4.3.jpg'),
(873, 758, '4.4 - Copy - Copy.jpg'),
(874, 760, '4.1 - Copy.jpg'),
(875, 760, '4.1.jpg'),
(876, 760, '4.2.jpg'),
(877, 760, '4.4 - Copy.jpg'),
(878, 761, '5.1.jpg'),
(879, 761, '5.2 - Copy.jpg'),
(880, 761, '5.3.jpg'),
(881, 761, '5.4.jpg'),
(882, 762, '2.1.jpg'),
(883, 762, '2.2.jpg'),
(884, 762, '2.3.jpg'),
(885, 762, '2.4.jpg'),
(886, 763, '3.1.jpg'),
(887, 763, '3.2.jpg'),
(888, 763, '3.3.jpg'),
(889, 763, '3.4.jpg'),
(890, 764, '3.1.jpg'),
(891, 764, '3.2.jpg'),
(892, 764, '3.3.jpg'),
(893, 764, '3.4.jpg'),
(894, 765, '5.2 - Copy.jpg'),
(895, 765, '5.2.jpg'),
(896, 765, '5.3 - Copy.jpg'),
(897, 765, '5.4.jpg'),
(898, 766, '1.jpg'),
(899, 766, '2.1.jpg'),
(900, 766, '2.2.jpg'),
(901, 766, '2.3.jpg'),
(902, 767, '3.1.jpg'),
(903, 767, '3.2.jpg'),
(904, 767, '3.3.jpg'),
(905, 767, '3.4.jpg'),
(906, 768, '4.1.jpg'),
(907, 768, '4.2.jpg'),
(908, 768, '4.3.jpg'),
(909, 768, '4.4 - Copy.jpg'),
(910, 769, '5.1.jpg'),
(911, 769, '5.2.jpg'),
(912, 769, '5.3.jpg'),
(913, 769, '5.4.jpg'),
(914, 770, '2.1.jpg'),
(915, 770, '2.2.jpg'),
(916, 770, '2.3.jpg'),
(917, 770, '2.4.jpg'),
(918, 771, '3.1.jpg'),
(919, 771, '3.2.jpg'),
(920, 771, '3.3.jpg'),
(921, 771, '3.4.jpg'),
(922, 772, '4.1.jpg'),
(923, 772, '4.2.jpg'),
(924, 772, '4.3.jpg'),
(925, 772, '4.jpg'),
(926, 773, '2.1.jpg'),
(927, 773, '2.2.jpg'),
(928, 773, '2.3.jpg'),
(929, 773, '2.4.jpg'),
(930, 774, '3.2.jpg'),
(931, 774, '3.3.jpg'),
(932, 774, '3.4.jpg'),
(933, 774, '3.jpg'),
(934, 775, '4.jpg'),
(935, 775, '5.2.jpg'),
(936, 775, '5.3.jpg'),
(937, 775, '5.4.jpg'),
(938, 776, '1.jpg'),
(939, 776, '2.1.jpg'),
(940, 776, '2.2.jpg'),
(941, 776, '2.3.jpg'),
(942, 777, '3.2.jpg'),
(943, 777, '3.3.jpg'),
(944, 777, '3.4.jpg'),
(945, 777, '3.jpg'),
(946, 778, '4.1.jpg'),
(947, 778, '4.2.jpg'),
(948, 778, '4.3.jpg'),
(949, 778, '4.jpg'),
(950, 779, '5.1.jpg'),
(951, 779, '5.2.jpg'),
(952, 779, '5.3.jpg'),
(953, 779, '5.4.jpg'),
(954, 780, '2.2.jpg'),
(955, 780, '2.3.jpg'),
(956, 780, '2.4.jpg'),
(957, 780, '2.5.jpg'),
(958, 781, '3.1.jpg'),
(959, 781, '3.2.jpg'),
(960, 781, '3.3.jpg'),
(961, 781, '3.4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `img_tintuc`
--

CREATE TABLE `img_tintuc` (
  `id` int(11) NOT NULL,
  `id_tintuc` int(11) NOT NULL,
  `name_img` varchar(33) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id_khuvuc` int(11) NOT NULL,
  `tenkhuvuc` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuvuc`
--

INSERT INTO `khuvuc` (`id_khuvuc`, `tenkhuvuc`) VALUES
(11, 'Nguyễn Thị Duệ'),
(36, 'Kim Đồng'),
(37, 'Chu Văn An'),
(38, 'Trần Bình Trọng'),
(39, 'Hữu Nghị'),
(40, 'Thái Hưng'),
(41, 'QL37'),
(42, 'An Ninh'),
(43, 'Nguyễn Thái Học');

-- --------------------------------------------------------

--
-- Table structure for table `lichsu_dat`
--

CREATE TABLE `lichsu_dat` (
  `id` int(11) NOT NULL,
  `id_nhatro` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `ma_don` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsu_dat`
--

INSERT INTO `lichsu_dat` (`id`, `id_nhatro`, `id_taikhoan`, `ma_don`, `trangthai`) VALUES
(10, 720, 13, 'madon-1685025094', 1),
(11, 724, 23, 'madon-1685067333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lichsu_nap`
--

CREATE TABLE `lichsu_nap` (
  `id` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `sotien` float NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsu_nap`
--

INSERT INTO `lichsu_nap` (`id`, `id_taikhoan`, `sotien`, `trangthai`) VALUES
(1, 6, 1000000, 0),
(2, 23, 1000000, 1),
(3, 23, 100000000, 0),
(4, 23, 132434000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhatro`
--

CREATE TABLE `nhatro` (
  `id_nhatro` int(11) NOT NULL,
  `id_khuvuc` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `tiencoc` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `image` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `tenchu` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_map` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `dess` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhatro`
--

INSERT INTO `nhatro` (`id_nhatro`, `id_khuvuc`, `id_taikhoan`, `name`, `price`, `tiencoc`, `soluong`, `loai`, `image`, `tenchu`, `sdt`, `diachi`, `link_map`, `dess`, `trangthai`) VALUES
(720, 38, 13, 'Ngỏ Văn Hùng', 500000, 50000, 9, 1, '5.5.jpg', 'Ngỏ Văn Hùng', '0365675485', 'SN 10, ngỏ 34. Trần Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                                                ', 'Trọ đẹp thoáng mát                                                                ', 1),
(721, 11, 13, 'Hoàng Danh Luân', 500000, 50000, 15, 1, '1.jpg', 'Hoàng Danh Luân', '0978348012', 'SN 3A, Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(722, 11, 13, 'Nguyền Thị Hương', 500000, 50000, 4, 1, '3.jpg', 'Nguyền Thị Hương', '0942433929', 'SN 33. Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(723, 11, 13, 'BÙI Công Hưng', 500000, 50000, 14, 1, '4.1.jpg', 'BÙI Công Hưng', '0942913362', 'SN 35. Nguyên Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(724, 11, 13, 'Trần Thị Miền', 550000, 50000, 9, 1, '5.3.jpg', 'Trần Thị Miền', '0375797257', 'SN 6. Nguyền Thi Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                                                                                                                ', 'Trọ đẹp thoáng mát                                                                                  ', 1),
(725, 11, 13, 'Nguyên Thị Miên', 500000, 50000, 6, 1, '3.1.jpg', 'Nguyên Thị Miên', '0944799623', 'SN 59. Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(726, 11, 13, 'Phạm Thị Tiệp', 400000, 50000, 7, 0, '2.1.jpg', 'Phạm Thị Tiệp', '0986279105', 'SN 62. Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(727, 11, 13, 'Phạm Vãn Sỳ', 500000, 50000, 5, 1, '3.2.jpg', 'Phạm Vãn Sỳ', '0365077980', 'SN 71. Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(728, 11, 13, 'Nguyền Trung Toàn', 550000, 50000, 10, 1, '4.3.jpg', 'Nguyền Trung Toàn', '0766395570', 'SN 72B. Nguyền Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(729, 11, 13, 'Nguyền Tiền Cư', 500000, 50000, 9, 1, '5.2.jpg', 'Nguyền Tiền Cư', '0329004798', 'SN 101. Nguyễn Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(730, 11, 13, 'Đồng Thị Tinh', 400000, 50000, 7, 0, '2.4.jpg', 'Đồng Thị Tinh', '0904187250', 'SN 123. Nguyễn Thị Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(731, 11, 13, 'Nguyền Thị Vịnh', 500000, 50000, 1, 1, '2.5.jpg', 'Nguyền Thị Vịnh', '0357100616', 'SN 21. Nguyền Thi Duệ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(732, 36, 13, 'Lê Thị Thường', 550000, 50000, 10, 1, '4.2.jpg', 'Lê Thị Thường', '0913396441', 'SN15. Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(733, 36, 13, 'Phạm Thi Thanh', 550000, 50000, 15, 1, '3.3.jpg', 'Phạm Thi Thanh', '0386473677', 'SN 39. Kim Đồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(734, 36, 13, 'Cù Chi Hiều', 550000, 50000, 11, 1, '2.3.jpg', 'Cù Chi Hiều', '0972345790', 'SN 53. Kim Đong', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(735, 36, 13, 'Nguyên Xuân Trường', 550000, 50000, 11, 1, '2.5.jpg', 'Nguyên Xuân Trường', '0974745827', 'SN 49. Kim Dong', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(736, 36, 13, 'Nguyền Thị Bao', 400000, 50000, 6, 1, '4.jpg', 'Nguyền Thị Bao', '0967978659', 'SN 02. ngô 1. Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(737, 36, 13, 'Phạm Công Lý', 500000, 50000, 9, 1, '2.1.jpg', 'Phạm Công Lý', '0388656152', 'SN 10. ngỏ 1, Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(738, 36, 13, 'Nguyên Thị Vân', 550000, 50000, 24, 1, '4.1.jpg', 'Nguyên Thị Vân', '0975107196', 'SN 12+14. ngỏ 1. Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(739, 36, 13, 'Đồ Văn Sơn', 300000, 50000, 7, 0, '5.1.jpg', 'Đồ Văn Sơn', '0984226459', 'SN 5. ngõ 1. Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(740, 36, 13, 'Nguyễn Thị Sĩu', 250000, 50000, 7, 0, '4.jpg', 'Nguyễn Thị Sĩu', '0357956323', 'SN 7. ngỏ 1. Kim Dồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(741, 36, 13, 'Nguyễn Đinh Phương', 1000000, 50000, 2, 1, '4.4.jpg', 'Nguyễn Đinh Phương', '0916150985', 'SN 8. ngỏ 1. Kim Đồng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(742, 37, 13, 'Vù Dức Hưởng', 500000, 50000, 5, 1, '3.jpg', 'Vù Dức Hưởng', '0359716322', 'SN 7. ngô 51. Chu Vàn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(743, 37, 13, 'Mac Thị Yên', 550000, 50000, 5, 1, '4.3.jpg', 'Mac Thị Yên', '0968894566', 'SN 6. ngô 51. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(744, 37, 13, 'Nguyền Thị Hai Hưng', 400000, 50000, 10, 1, '5.1.jpg', 'Nguyền Thị Hai Hưng', '0387489286', 'SN 11. ngô 51. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(745, 37, 13, 'Vũ Văn Sơn', 550000, 50000, 6, 1, '2.4.jpg', 'Vũ Văn Sơn', '0917708123', 'SN 17. ngò 51. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(746, 37, 13, 'Tran Vản Dỏng', 400000, 50000, 9, 1, '3.2.jpg', 'Tran Vản Dỏng', '0397064868', 'SN 21 ngò 51. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(747, 37, 13, 'Phạm Xuân Anh', 400000, 50000, 5, 1, '4.4 - Copy - Copy.jpg', 'Phạm Xuân Anh', '0969837450', 'SN 28 ngỏ 51, Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(748, 37, 13, 'Phạm Thi Càn', 400000, 50000, 6, 1, '3.3.jpg', 'Phạm Thi Càn', '0352279954', 'SN 32 ngỏ 51. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(749, 37, 13, 'Dương Thị Thuận', 500000, 50000, 12, 1, '2.1.jpg', 'Dương Thị Thuận', '0398201498', 'SN 34 ngỏ 51. Chu Vàn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(750, 37, 13, 'Trịnh Ngọc Binh', 500000, 50000, 4, 1, '3.1.jpg', 'Trịnh Ngọc Binh', '0385083225', 'SN 14. đường 1/5', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(751, 37, 13, 'Nguyền Thị Liên', 450000, 50000, 11, 1, '4.2.jpg', 'Nguyền Thị Liên', '0986826106', 'SN 51, Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(752, 37, 13, 'Vũ Đức Cường', 350000, 50000, 9, 0, '5.2.jpg', 'Vũ Đức Cường', '0355244689', 'SN 31. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(753, 37, 13, 'Đỏ Văn Quỵnh', 500000, 50000, 14, 1, '2.1.jpg', 'Đỏ Văn Quỵnh', '0969685165', 'SN 41. Chu Văn An', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(754, 38, 13, 'Đặng Văn linh', 500000, 50000, 13, 1, '1.jpg', 'Đặng Văn linh', '0964426394', 'SN 48. ngỏ 34. Trần Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(755, 38, 13, 'Trương Mạnh Thường', 1000000, 50000, 9, 1, '2.2.jpg', 'Trương Mạnh Thường', '0363296266', 'SN 40. ngỏ 34. Trần Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(756, 38, 13, 'Phạm Văn Tiến', 500000, 50000, 5, 1, '4.3.jpg', 'Phạm Văn Tiến', '0946090247', 'SN 21. ngỏ 34. Trần Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(757, 38, 13, 'Nguyễn Chí Cư', 500000, 50000, 5, 1, '2.2.jpg', 'Nguyễn Chí Cư', '0355937055', 'SN 5/19/34, Trằn Bình Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(758, 38, 13, 'Nguyền Thị Hà', 500000, 50000, 6, 1, '4.1 - Copy.jpg', 'Nguyền Thị Hà', '0936990700', 'SN 3/19/34. Trằn Bình Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(760, 38, 13, 'Đồng Thế Quý', 500000, 50000, 17, 1, '4.jpg', 'Đồng Thế Quý', '0354101000', 'SN 13, ngỏ 34. Trần Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(761, 38, 13, 'Lý Hai Nhi', 500000, 50000, 10, 1, '5.1.jpg', 'Lý Hai Nhi', '0356074196', 'SN 30, ngỏ 34. Trằn Binh Trọng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(762, 38, 13, 'Đặng Ngọc Oanh', 550000, 50000, 14, 1, '1.jpg', 'Đặng Ngọc Oanh', '0904023769', 'SN 1. ngõ 16. Trần Binh Trong', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(763, 39, 13, 'Nguyền Thị Hà', 500000, 50000, 11, 1, '2.jpg', 'Nguyền Thị Hà', '0916129286', 'SN 5. ngô 29. Hừu Nghị', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(764, 39, 13, '1 ran I lu Bích Hương', 500000, 50000, 23, 1, '3.jpg', '1 ran I lu Bích Hương', '0968894566', 'SN 39, ngỏ 29. Hừu Nghị', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(765, 39, 13, 'Vù Thị Miên', 500000, 50000, 19, 1, '5.1.jpg', 'Vù Thị Miên', '0961005640', 'SN 7. ngô 29. Hừu Nghị', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(766, 39, 13, 'Vũ Thị Quế', 500000, 50000, 10, 1, '2.2.jpg', 'Vũ Thị Quế', '0363296265', 'SN 33. ngỏ 29. Hữu Nghị', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(767, 40, 13, 'Nghiêm Thị Thọ', 350000, 50000, 12, 0, '3.1.jpg', 'Nghiêm Thị Thọ', '0913255733', 'SN 5. Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(768, 40, 13, 'Lê Tiến Nam', 350000, 50000, 15, 0, '4.1.jpg', 'Lê Tiến Nam', '0932289886', 'SN 39, Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(769, 40, 13, 'Phạm Thị Tính', 500000, 50000, 10, 1, '5.1.jpg', 'Phạm Thị Tính', '0352600599', 'Ngỏ 21. Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(770, 40, 13, 'Dào Vân Tinh', 500000, 50000, 5, 1, '1.jpg', 'Dào Vân Tinh', '0978832380', 'SN 42. Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(771, 40, 13, 'Trần Thị Ngà', 500000, 50000, 4, 1, '3.3.jpg', 'Trần Thị Ngà', '0352129065', 'SN 55, Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(772, 40, 13, 'Nguyễn Thị Tâm', 500000, 50000, 9, 1, '4.1.jpg', 'Nguyễn Thị Tâm', '0942597509', 'SN 61, Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(773, 40, 13, 'Phạm Thi Hiẻu', 500000, 50000, 6, 1, '2.3.jpg', 'Phạm Thi Hiẻu', '0975736276', 'SN 23. Ngô 21, Thái Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(774, 40, 13, 'Phạm Thị Tuyét', 500000, 50000, 5, 1, '3.1.jpg', 'Phạm Thị Tuyét', '0348129965', 'SN 38. Ngỏ 21, Thải Hưng', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(775, 41, 13, 'Nguyễn Đình Hòng', 400000, 50000, 15, 1, '5.1.jpg', 'Nguyễn Đình Hòng', '0355244689', 'SN 3. ngỏ 112. QL37', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(776, 41, 13, 'Nguyễn Thi Binh', 500000, 50000, 3, 1, '2.2.jpg', 'Nguyễn Thi Binh', '0398409251', 'SN 6. ngỏ 112 QL37', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(777, 42, 13, 'Nguyền Vãn Kỳ', 500000, 50000, 18, 1, '3.3.jpg', 'Nguyền Vãn Kỳ', '0969685165', 'SN 147. An Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(778, 42, 13, 'Nguyền Vân Tỏn', 500000, 50000, 9, 1, '4.1.jpg', 'Nguyền Vân Tỏn', '0353090984', 'SN 6. ngô 38. An Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(779, 42, 13, 'Trương Văn Quang', 600000, 50000, 2, 1, '5.1.jpg', 'Trương Văn Quang', '0904272254', 'SN 1. ngỏ 38. An Ninh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(780, 43, 13, 'Nguyễn Thị Ký', 500000, 50000, 5, 1, '2.1.jpg', 'Nguyễn Thị Ký', '0377643896', 'SN 1. ngõ 165. Nguyễn Thái Học', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1),
(781, 43, 13, 'Dào Cõng Chín', 500000, 50000, 6, 1, '3.1.jpg', 'Dào Cõng Chín', '0915867445', 'SN 27, ngỏ 165. Nguyên Thái Học', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3278.0812940779892!2d106.39271827425857!3d21.110895234954416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1685011505618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>                                ', 'Trọ đẹp thoáng mát                                ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `coin` float NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taikhoan`, `matkhau`, `email`, `coin`, `quyen`) VALUES
(6, 'Admin', '1', 'aevantho1@gmail.com', 8234240, 1),
(13, 'chutro', '1', 'aevantho7@gmail.com', 153423, 2),
(23, 'sinhvien', '1', 'sadssdsdsadadasdads@gmail.vn', 1132360000, 0),
(24, 'sinhvien1', '1', 'aevantho34234@gmail.com', 0, 0),
(25, 'sinhvien111', '1', 'aevanthssfo34234@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `noidung1` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung2` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung3` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung4` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung5` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image5` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tenanh5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenanhconlai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhatro` (`id_nhatro`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `img_nhatro`
--
ALTER TABLE `img_nhatro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhatro` (`id_nhatro`);

--
-- Indexes for table `img_tintuc`
--
ALTER TABLE `img_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id_khuvuc`);

--
-- Indexes for table `lichsu_dat`
--
ALTER TABLE `lichsu_dat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhatro` (`id_nhatro`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `lichsu_nap`
--
ALTER TABLE `lichsu_nap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Indexes for table `nhatro`
--
ALTER TABLE `nhatro`
  ADD PRIMARY KEY (`id_nhatro`),
  ADD KEY `id_khuvuc` (`id_khuvuc`),
  ADD KEY `idUser` (`id_taikhoan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1284;

--
-- AUTO_INCREMENT for table `img_nhatro`
--
ALTER TABLE `img_nhatro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=962;

--
-- AUTO_INCREMENT for table `img_tintuc`
--
ALTER TABLE `img_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `id_khuvuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `lichsu_dat`
--
ALTER TABLE `lichsu_dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lichsu_nap`
--
ALTER TABLE `lichsu_nap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhatro`
--
ALTER TABLE `nhatro`
  MODIFY `id_nhatro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=782;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_nhatro`) REFERENCES `nhatro` (`id_nhatro`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `lichsu_dat`
--
ALTER TABLE `lichsu_dat`
  ADD CONSTRAINT `lichsu_dat_ibfk_1` FOREIGN KEY (`id_nhatro`) REFERENCES `nhatro` (`id_nhatro`),
  ADD CONSTRAINT `lichsu_dat_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `lichsu_nap`
--
ALTER TABLE `lichsu_nap`
  ADD CONSTRAINT `lichsu_nap_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `nhatro`
--
ALTER TABLE `nhatro`
  ADD CONSTRAINT `nhatro_ibfk_1` FOREIGN KEY (`id_khuvuc`) REFERENCES `khuvuc` (`id_khuvuc`),
  ADD CONSTRAINT `nhatro_ibfk_2` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
