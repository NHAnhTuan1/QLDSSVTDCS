-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 02:57 AM
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
-- Cơ sở dữ liệu: `sretksor.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ab_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_ngaysinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_tuoi` tinyint(4) DEFAULT NULL,
  `ab_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ab_html` int(11) DEFAULT NULL,
  `ab_css` int(11) DEFAULT NULL,
  `ab_js` int(11) DEFAULT NULL,
  `ab_php` int(11) DEFAULT NULL,
  `ab_wordpress` int(11) DEFAULT NULL,
  `ab_psd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `ab_title`, `ab_description`, `ab_job`, `ab_ngaysinh`, `ab_tuoi`, `ab_web`, `ab_phone`, `ab_email`, `ab_content`, `ab_avatar`, `created_at`, `updated_at`, `ab_html`, `ab_css`, `ab_js`, `ab_php`, `ab_wordpress`, `ab_psd`) VALUES
(1, 'Về chúng tôi', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 'UI/UX Designer & Web Developer.', '12/07/1999', 22, 'sret.com.vn', '0343191473', 'sretksorjiu.nguyen@gmail.com', 'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis. Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.', 'avt.jpg', NULL, NULL, 89, 78, 88, 88, 45, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about_me`
--

CREATE TABLE `about_me` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_installgram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about_me`
--

INSERT INTO `about_me` (`id`, `diachi`, `email`, `dt`, `link_google_map`, `link_fb`, `link_installgram`, `created_at`, `updated_at`) VALUES
(1, 'Gia Lai', 'sretksorjiu.nguyen@gmail.com', '0343191473', NULL, 'https://www.facebook.com/noojames.fifa20154', NULL, NULL, NULL);

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
  `avt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `avt`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'KSOR SRET', 'sretksorjiu.nguyen@gmail.com', NULL, '$2y$10$CooFrRzRssaLTo1.MXOwdeKhmxc5ZeHt0.80ZuNlnB62OKbnFDd6S', 'http://localhost/sretksor.com/public/anh/qHuU_win10_2.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_noidung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `c_name`, `c_mail`, `c_job`, `c_noidung`, `created_at`, `updated_at`) VALUES
(1, 'KSOR SRET', 'sretksorjiu.nguyen@gmail.com', 'Bóng đá, Lập trình', 'Lorem ipsum', '2021-11-28 14:28:03', '2021-11-28 14:28:03');

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
-- Cấu trúc bảng cho bảng `home`
--

CREATE TABLE `home` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `home`
--

INSERT INTO `home` (`id`, `name`, `my1`, `my2`, `my3`, `bg_image`, `created_at`, `updated_at`) VALUES
(1, 'Sret Ksor', 'Coder', 'Freelancer', 'Designer', 'http://localhost/sretksor.com/public/anh/tfbt_xe.jpg', NULL, NULL);

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
(3, '2021_11_25_155331_create_home_table', 1),
(4, '2021_11_26_155739_create_about_table', 2),
(5, '2021_11_27_143800_them_skill_bang_about', 3),
(6, '2021_11_27_144208_them_skill_bang_about2', 4),
(7, '2021_11_28_012111_create_portfolio_table', 5),
(8, '2021_11_28_014930_create_service_table', 6),
(9, '2021_11_28_021222_create_contact_table', 7),
(10, '2021_11_28_024847_create_about_me_table', 8),
(11, '2021_11_28_025721_create_admins_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `portfolio`
--

CREATE TABLE `portfolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_tieude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_mota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `portfolio`
--

INSERT INTO `portfolio` (`id`, `p_tieude`, `p_mota`, `created_at`, `updated_at`) VALUES
(1, 'Portfolio 2', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_tieude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_mota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_tieude6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `s_tieude`, `s_mota`, `s_tieude1`, `s_tieude2`, `s_tieude3`, `s_tieude4`, `s_tieude5`, `s_tieude6`, `created_at`, `updated_at`) VALUES
(1, 'Dịch vụ', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.', 'Lập trình nhanh chóng', 'Dolor Sitema', 'Sed ut perspiciatis', 'Magni Dolores', 'Nemo Enim', 'Eiusmod Tempor', NULL, NULL);

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
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `home`
--
ALTER TABLE `home`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
