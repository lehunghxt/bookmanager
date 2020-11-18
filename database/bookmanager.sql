-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2020 lúc 06:46 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookmanager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_qty` int(11) NOT NULL,
  `book_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'actice',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `cate_id`, `user_id`, `book_code`, `book_name`, `book_slug`, `book_image`, `book_qty`, `book_description`, `book_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'sachs123', 'Sách Giáo Khoa Lớp 12', 'Sach-Giao-Khoa-Lop-12', 'a4rSn0qXYA.jpg', 12, 'admin123', 'active', '2020-11-17 15:02:32', '2020-11-17 15:02:32'),
(2, 1, 1, 'sachs12312', 'Sách Văn Học Lớp 14', 'Sach-Van-Hoc-Lop-14', 'NyeHeyHBRn.JPG', 33, 'asdasd', 'active', '2020-11-17 15:02:53', '2020-11-17 15:02:53'),
(3, 2, 1, 'toan123', 'Toán Lớp 1', 'Toan-Lop-1', 'I2VnFtLoLD.jpg', 12, 'Toán Lớp 1', 'active', '2020-11-17 18:17:07', '2020-11-17 18:17:07'),
(4, 1, 1, 'demo', 'demo123', 'demo123', 'yBiMmKvIxg.jpg', 123, 'demo13', 'active', '2020-11-18 04:18:33', '2020-11-18 04:18:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `borrow_books`
--

CREATE TABLE `borrow_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'borrowing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `borrow_books`
--

INSERT INTO `borrow_books` (`id`, `book_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'borrowing', '2020-11-17 17:18:41', '2020-11-17 17:18:41'),
(2, 2, 2, 'borrowing', '2020-11-17 18:17:26', '2020-11-17 18:17:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_slug`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Sách Văn Học', 'Sach-Van-Hoc', 'active', '2020-11-17 15:02:16', '2020-11-17 15:02:16'),
(2, 'Sách giáo khoa lớp 1', 'Sach-giao-khoa-lop-1', 'active', '2020-11-17 18:16:35', '2020-11-18 03:41:43');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_13_032548_create_categories_table', 1),
(4, '2020_11_13_032612_create_books_table', 1),
(5, '2020_11_17_182534_create_borrow_books_table', 1);

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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `user_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disable',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `user_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hỏa Ngoc Lê Hùng', 'admin@gmail.com', NULL, '$2y$10$QETJclMBOd7PlagMgLzHDu7YhpFGRaSCqIQvmWAk8a4YcWc.rVchm', 'admin', 'active', 'xi6A11VoFi4k8BGWwa0rfHjjn6WhS8Uoa83r5xOldcwCH3agGzqjChZO0XtN', '2020-11-17 15:01:49', '2020-11-17 15:01:49'),
(2, 'hung', 'hung@gmail.com', NULL, '$2y$10$.59Dg/XfLjpYYilWI5SV8eLDh.tvPbUEHC42mheIRMkjYSESYosra', 'user', 'active', 'BBfg5esYqmdUruB57jMxznqftab9wEr91T1B0u3lHBfNpQjHjYxNgSI0cgf9', '2020-11-17 15:03:09', '2020-11-18 05:24:57'),
(3, 'demo', 'demo@demo.com', NULL, '$2y$10$En7F3x1Y4IlYbnXtgKm0Bu3Q9Pgp/r9LxQP8UcbDBZ5zlPGEBvkGS', 'user', 'active', NULL, '2020-11-18 04:57:19', '2020-11-18 05:24:50'),
(4, 'hihi', 'hihi@gmail.com', NULL, '$2y$10$3WFXW5VqXM5XxJM9z5fItO.e8YO7k3urwJzVzh5oc.Fe7K/q5zb8e', 'user', 'active', NULL, '2020-11-18 05:15:26', '2020-11-18 05:24:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `borrow_books`
--
ALTER TABLE `borrow_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
