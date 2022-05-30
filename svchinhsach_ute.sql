-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2022 lúc 11:43 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `svchinhsach.ute`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị admin', 'admin@gmail.com', NULL, '$2y$10$45Zx9pCy/Z1UcDHTRpe7y.QN4DlJyqUsBLQ5qzrZtoxixDNhkttuO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctsv`
--

CREATE TABLE `ctsv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ctsv_ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctsv_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctsv_sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctsv_diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctsv`
--

INSERT INTO `ctsv` (`id`, `ctsv_ten`, `ctsv_email`, `password`, `ctsv_sdt`, `ctsv_diachi`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Hòa', 'ctsv@gmail.com', '$2y$10$Fv9TN6FraxznLKnodtMMruVzZnFLfQCSITQR4ghWrdyitTzwE4rCq', '0787565434', '48 Cao Thắng', NULL, NULL),
(3, 'CTSV 2', 'ctsv2@gmail.com', '$2y$10$1Gy.NFKtngArxWhPWsuyu.9Anetb7Ol7KfSGzK8uGqZ7j77sCK7Sq', '0356565787', 'Đà Nẵng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doituong`
--

CREATE TABLE `doituong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dt_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_hinhthuc` tinyint(4) NOT NULL,
  `dt_mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doituong`
--

INSERT INTO `doituong` (`id`, `dt_ten`, `dt_hinhthuc`, `dt_mota`, `created_at`, `updated_at`) VALUES
(1, 'Hộ nghèo(HN)', 100, 'Giảm 100% học phí cho đối tượng.\r\nHồ sơ bao gồm:\r\n- Bản sao Sổ hộ khẩu gia đình có công chứng\r\n- Bản sao có công chứng: Con Liệt sĩ, Con của AHLLVT, AHLĐ\r\n- Con Thương binh, Con Bệnh binh ……..\r\n- Bản sao có công chứng: sổ (thẻ) chứng nhận.\r\n- Giấy xác nhận của Phòng LĐ-TBXH cấp huyện/quận/thị xã\r\n- Giấy tờ khác (nếu có).', NULL, NULL),
(2, 'Hộ cận nghèo', 70, 'giảm 70% cho đối tượng\r\n-Hồ sơ:\r\n	Quyết định cử tuyển\r\n	Bản sao Sổ hộ khẩu gia đình có công chứng\r\n	Đơn miễn giảm phải có xác nhận của chính quyền địa phương\r\n	Giấy xác nhận chưa được cấp học phí của cơ quan cử truyển đi học', NULL, NULL),
(5, 'Thương binh', 50, 'Giảm 30% học phí cho sinh viên.\r\nHồ sơ:\r\n	Bản sao Sổ hộ khẩu gia đình có công chứng\r\n	Bản sao có công chứng: Con Liệt sĩ, Con của AHLLVT, AHLĐ', NULL, NULL),
(6, 'Mồ côi', 100, 'Giảm 100% học phí cho đối tượng trên.\r\nHồ sơ:\r\n	Photo giấy báo tử\r\n	Bản sao Sổ hộ khẩu gia đình có công chứng.', NULL, NULL),
(7, 'Dân tộc thiểu số ít người', 100, '- Người dân tộc thiểu số rất ít người bao gồm: La Hủ, La Ha, Pà Thẻn, Lự, Ngái, Chứt, Lô Lô, Mảng, Cống, Cờ Lao, Bố Y, Si La, Pu Péo, Rơ Măm, BRâu, Ơ Đu.\r\n- Vùng có điều kiện kinh tế - xã hội khó khăn và đặc biệt khó khăn được quy định cụ thể tại phụ lục I kèm theo Thông tư liên tịch này.\r\n-Hồ sơ:\r\n	Giấy khai sinh và sổ hộ khẩu thường trú\r\n	Sổ hưởng trợ cấp hàng tháng do tổ chức bao hiểm xã hội cấp do tại nạn lao động;\r\n	Bản sao Sổ hộ khẩu gia đình có công chứng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hk_ma` int(11) DEFAULT NULL,
  `hk_namhoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hk_hocki` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`id`, `hk_ma`, `hk_namhoc`, `hk_hocki`, `created_at`, `updated_at`) VALUES
(1, 118, '2018-2019', '1', NULL, NULL),
(2, 218, '2018-2019', '2', NULL, NULL),
(3, 119, '2019-2020', '1', NULL, NULL),
(4, 219, '2019-2020', '2', NULL, NULL),
(7, 120, '2020-2021', '1', NULL, NULL),
(8, 220, '2020-2021', '2', NULL, NULL),
(9, 121, '2021-2022', '1', NULL, NULL),
(10, 221, '2021-2022', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `k_ma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id`, `k_ma`, `k_ten`, `created_at`, `updated_at`) VALUES
(1, 'DDT', 'Điện-Điện tử', NULL, NULL),
(2, 'XD', 'Xây dựng', NULL, NULL),
(3, 'TP', 'Khoa thực phẩm', NULL, NULL),
(4, 'TDH', 'Tự động hoá', NULL, NULL),
(8, 'CN1', 'Công nghệ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khoa_id` int(10) UNSIGNED NOT NULL,
  `l_ma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `khoa_id`, `l_ma`, `l_ten`, `created_at`, `updated_at`) VALUES
(3, 2, '2020XD', '17XD2', NULL, NULL),
(4, 1, '2020T3', '18T3', NULL, NULL),
(5, 1, '2020T4', '18T4', NULL, NULL),
(7, 1, '2020T1', '18T1', NULL, NULL),
(10, 1, '2020T2', '18T2', NULL, NULL),
(11, 3, '2020TP', '20TP1', NULL, NULL),
(12, 4, '2020TDH', '20TDH', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_12_06_115521_create_khoa_table', 1),
(4, '2021_12_07_015944_create_lop_table', 2),
(5, '2021_12_09_021439_create_admins_table', 3),
(6, '2021_12_09_115045_create_doituong_table', 4),
(7, '2021_12_10_011244_create_hocki_table', 5),
(8, '2021_12_10_123724_create_sinhvien_table', 6),
(9, '2021_12_10_140359_alter_column_lop_id_in_sinhvien_table', 7),
(10, '2014_10_12_100000_create_password_resets_table', 8),
(11, '2021_12_13_130141_create_sv_dt_hk_table', 9),
(12, '2021_12_13_130837_create_minh_chung_table', 10),
(13, '2021_12_13_135413_create_ctsv_table', 11),
(14, '2021_12_26_012046_create_thongbao_table', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `minh_chung`
--

CREATE TABLE `minh_chung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sv_dt_hk_id` tinyint(4) DEFAULT NULL,
  `mc_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `minh_chung`
--

INSERT INTO `minh_chung` (`id`, `sv_dt_hk_id`, `mc_file`, `created_at`, `updated_at`) VALUES
(20, 8, 'http://localhost/svchinhsach.ute/public/files/lX29_da33eh5-7ad0e215-ae4a-4020-a361-1f1d980b12c9.jpg', '2022-01-05 09:06:35', '2022-01-05 09:06:35'),
(21, 8, 'http://localhost/svchinhsach.ute/public/files/6Acv_hinhdepw10.jpg', '2022-01-05 09:06:35', '2022-01-05 09:06:35'),
(22, 8, 'http://localhost/svchinhsach.ute/public/files/kdUY_nendep.jpg', '2022-01-05 09:06:35', '2022-01-05 09:06:35'),
(23, 8, 'http://localhost/svchinhsach.ute/public/files/mTik_officalw10.jpg', '2022-01-05 09:06:35', '2022-01-05 09:06:35'),
(24, 9, 'http://localhost/svchinhsach.ute/public/files/M9t4_tron.jpg', '2022-01-07 02:38:19', '2022-01-07 02:38:19'),
(25, 9, 'http://localhost/svchinhsach.ute/public/files/SCxJ_win10.jpg', '2022-01-07 02:38:19', '2022-01-07 02:38:19'),
(26, 9, 'http://localhost/svchinhsach.ute/public/files/SyhY_win10_1.jpg', '2022-01-07 02:38:20', '2022-01-07 02:38:20'),
(27, 10, 'http://localhost/svchinhsach.ute/public/files/Gg8h_win10_3.jpg', '2022-01-14 03:30:16', '2022-01-14 03:30:16'),
(28, 10, 'http://localhost/svchinhsach.ute/public/files/XY93_win10_4.jpg', '2022-01-14 03:30:16', '2022-01-14 03:30:16'),
(29, 11, 'http://localhost/svchinhsach.ute/public/files/hyYl_hoa.jpg', '2022-01-14 04:20:44', '2022-01-14 04:20:44'),
(30, 11, 'http://localhost/svchinhsach.ute/public/files/kruc_moon.jpg', '2022-01-14 04:20:44', '2022-01-14 04:20:44'),
(31, 12, 'http://localhost/svchinhsach.ute/public/files/K2BQ_win10.jpg', '2022-01-14 06:41:25', '2022-01-14 06:41:25'),
(32, 12, 'http://localhost/svchinhsach.ute/public/files/IAgp_win10_1.jpg', '2022-01-14 06:41:25', '2022-01-14 06:41:25'),
(33, 12, 'http://localhost/svchinhsach.ute/public/files/2HJt_win10_2.jpg', '2022-01-14 06:41:25', '2022-01-14 06:41:25'),
(34, 13, 'http://localhost/svchinhsach.ute/public/files/aCGI_apple.jpg', '2022-01-14 08:23:11', '2022-01-14 08:23:11'),
(35, 13, 'http://localhost/svchinhsach.ute/public/files/h7nR_da33eh5-7ad0e215-ae4a-4020-a361-1f1d980b12c9.jpg', '2022-01-14 08:23:11', '2022-01-14 08:23:11'),
(36, 14, 'http://localhost/svchinhsach.ute/public/files/haGO_win10_4.jpg', '2022-01-15 12:30:30', '2022-01-15 12:30:30'),
(37, 14, 'http://localhost/svchinhsach.ute/public/files/M2gW_win102.png', '2022-01-15 12:30:30', '2022-01-15 12:30:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sv_ma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sv_ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sv_gioitinh` tinyint(4) DEFAULT NULL,
  `sv_ngaysinh` date DEFAULT NULL,
  `sv_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sv_sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sv_cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sv_diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lop_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `sv_ma`, `sv_ten`, `sv_gioitinh`, `sv_ngaysinh`, `sv_email`, `password`, `sv_sdt`, `sv_cmnd`, `sv_diachi`, `created_at`, `updated_at`, `lop_id`) VALUES
(4, '1811505310237', 'Ksor Sret', 1, '1999-07-12', 'sretksorjiu.nguyen@gmail.com', '$2y$10$4WzFRQtK3Ug5Ns2kioJD2.YU/BWunNNz1YZabEcnMbQ6Gq8bXmu0W', '0343191473', '234344523', 'Chứ Mố, Iapa, Gia Lai', NULL, '2021-12-12 21:26:32', 10),
(5, '1811505310238', 'Nguyễn Văn A', 1, '2000-05-09', 'vana@gmail.com', '$2y$10$4VXDeTI9p3ZXxwalVXGfwOiD1EHN9Ni.YbqE3qbhVC3qhugZ6UHbq', '0899788688', '677567865', 'Đà Nẵng', NULL, NULL, 12),
(7, '1811505310239', 'Anh Tuấn', 1, '2000-06-21', 'tuan@gmail.com', '$2y$10$DjKrElbu/0baszF8/haia.ozKHbsDpoaHXhuNckeG36VAshtBqg6.', '0989766867', '989657333', 'Đà Nẵng', NULL, NULL, 4),
(8, '1811505310240', 'Nguyễn Thành Văn', 1, '2000-12-29', 'thanhvan@gmail.com', '$2y$10$rbZvMgGoSuauT3Cp/YoIyu78Mu8rylw0Pg9ntB0iWXY4aUC2aWVVy', '0988676444', '898343656', 'Đà Nẵng', NULL, NULL, 10),
(9, '1811505310241', 'Văn Mai Bùi', 1, '2000-05-31', 'mai@gmail.com', '$2y$10$1PbekL6HN6SAgU4x70poj.xaEmtZ4Abxpqgr9a3QzUZyxu/aGxduy', '0977554777', '343765888', 'Quảng Nam', NULL, NULL, 3),
(10, '1811505310244', 'Đặng Quốc Dũng', 1, '2000-05-09', 'dung@gmail.com', '$2y$10$BoW3TXmN0TYGxMpO/WHyl.D8pbDBf75hLPm.naZHTFKLh6KcELzw.', '0977554733', '989657122', 'Đà Nẵng', NULL, NULL, 11),
(11, '2020876655434', 'Trần Lý', 0, '1999-06-18', 'ly@gmail.com', '$2y$10$JOwre8YrqhXcFq4M.ni3yufZoow2BNE7.t6T3E7QUO2H0iB5pZKY.', '0899788222', '989657333', 'Đà Nẵng', NULL, NULL, 11),
(12, '1911676798945', 'Tùng Sơn', 1, '2000-06-28', 'tung@gmail.com', '$2y$10$31qitxq7Gqu2lte2ZvAK5ucmgYGGcObm8HBYRzzRrneKBJGzlm7Hi', '0977554111', '435325642', 'Đà Nẵng', NULL, NULL, 3),
(13, '1811505310200', 'Ksor Sret', 1, '1999-07-12', 'sretksorjiu.nguyen1@gmail.com', '$2y$10$GmALxKow.hNLSDvGfGq.7OVoIJENcZxESKPtynv5wV6yQ2p9LcYh2', '0343191411', '989657333', 'Gia Lai', NULL, NULL, 4),
(14, '2020876655411', 'Sret Ksor', 1, '1999-07-12', 'sretksorjiu.nguyen2@gmail.com', '$2y$10$yfisZsBq7OkAgTg69Ekd9eqw/mqluxMcxfaUhJBGY7QV71iFzLB2C', '0899785454', '231256455', 'Gia Lai', NULL, NULL, 5),
(15, '1911676798915', 'Nguyễn Anh Tú', 1, '2000-06-14', 'anhtu@gmail.com', '$2y$10$KQOKG9jwaizA.xojZkwgSel8YZeL76Ogazo8Qm39tEjBMcMWmXF6K', '0989762432', '787989565', 'Quảng Nam', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_dt_hk`
--

CREATE TABLE `sv_dt_hk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sinhvien_id` tinyint(4) NOT NULL,
  `doituong_id` tinyint(4) NOT NULL,
  `hk_id` tinyint(4) NOT NULL,
  `tinhtrang` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sv_dt_hk`
--

INSERT INTO `sv_dt_hk` (`id`, `sinhvien_id`, `doituong_id`, `hk_id`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(8, 4, 2, 7, 1, '2022-01-05 09:06:35', '2022-01-07 02:10:35'),
(9, 8, 2, 8, 1, '2022-01-07 02:38:19', '2022-01-10 06:47:10'),
(10, 9, 2, 7, 1, '2022-01-14 03:30:16', '2022-01-14 03:30:36'),
(11, 11, 6, 8, 1, '2022-01-14 04:20:43', '2022-01-14 04:20:57'),
(12, 5, 1, 8, 1, '2022-01-14 06:41:25', '2022-01-14 06:42:18'),
(13, 5, 5, 8, 2, '2022-01-14 08:23:11', '2022-01-14 08:24:01'),
(14, 15, 6, 9, 1, '2022-01-15 12:30:29', '2022-01-15 12:31:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tb_tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tb_noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ctsv_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `tb_tieude`, `tb_noidung`, `ctsv_id`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Đào tạo công bố thời khóa biểu các lớp học phần giảng dạy và học trực tuyến của sinh viên Khóa 2021.', 'Tân sinh viên khóa 2021 xem thời khóa biểu tại trang cá nhân của mình.\r\n\r\nLưu ý:\r\n           + Thời khóa biểu học kỳ 1 năm học 2021-2022 của tân sinh viên Khóa 2021 được đăng ký mặc định theo chương trình đào tạo và phân bổ học phần theo học kỳ 1 của mỗi ngành. Do vậy, tổng số tín chỉ có thể cao hơn hoặc thấp hơn mặc định đã đóng học phí khi nhập học đầu năm.\r\n           + Các lớp học phần có ngày bắt đầu học 11/10/2021 và phòng học ONLINE sẽ học trực tuyến.\r\n           + Sinh viên khóa 2021 có thể phản hồi trực tiếp tại phòng Đào tạo các trường hợp thời khóa biểu cá nhân không hợp lý đến hết ngày 17/10/2021.\r\n\r\nTrân trọng./.', 1, NULL, NULL),
(2, 'Phòng Đào tạo công bố Danh sách kiểm tra tiếng anh đầu vào cho tân sinh viên khóa 2021.', 'Phòng Đào tạo công bố Danh sách kiểm tra tiếng anh đầu vào cho tân sinh viên khóa 2021.', 1, '2021-12-26 02:13:38', NULL),
(3, 'Các sinh viên CHƯA thi học kỳ 2 năm học 2020-2021 thì vào xem lịch thi kết thúc học phần đợt bổ sung.', 'Các sinh viên CHƯA thi học kỳ 2 năm học 2020-2021 thì vào xem lịch thi kết thúc học phần đợt bổ sung.', 1, '2021-12-26 02:14:25', NULL),
(4, 'Thông báo 4/1/2022', 'Nội dung thông báo ngày 4/1/2022', 1, '2022-01-04 07:11:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `ctsv`
--
ALTER TABLE `ctsv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ctsv_ctsv_email_unique` (`ctsv_email`);

--
-- Chỉ mục cho bảng `doituong`
--
ALTER TABLE `doituong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoa_k_ten_unique` (`k_ten`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `minh_chung`
--
ALTER TABLE `minh_chung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sinhvien_sv_email_unique` (`sv_email`);

--
-- Chỉ mục cho bảng `sv_dt_hk`
--
ALTER TABLE `sv_dt_hk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ctsv`
--
ALTER TABLE `ctsv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `doituong`
--
ALTER TABLE `doituong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocki`
--
ALTER TABLE `hocki`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `minh_chung`
--
ALTER TABLE `minh_chung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sv_dt_hk`
--
ALTER TABLE `sv_dt_hk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
