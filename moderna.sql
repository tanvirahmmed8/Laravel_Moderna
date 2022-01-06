-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 09:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moderna`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `tittle`, `description`, `image`, `btn_text`, `btn_url`, `created_at`, `updated_at`) VALUES
(1, 'Nice example of quote post format below', 'Nice example of quote post format below', 'banner_602d21c3eb178.jpg', 'Learn More', '#', '2021-02-17 14:01:42', '2021-02-17 14:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_works`
--

CREATE TABLE `categories_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_works`
--

INSERT INTO `categories_works` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'web-design', '2021-02-17 14:10:41', '2021-02-17 14:10:41'),
(2, 'Online business', 'online-business', '2021-02-17 14:10:44', '2021-02-17 14:10:44'),
(3, 'Marketing strategy', 'marketing-strategy', '2021-02-17 14:10:48', '2021-02-17 14:10:48'),
(4, 'Technology', 'technology', '2021-02-17 14:10:52', '2021-02-17 14:10:52'),
(5, 'About finance', 'about-finance', '2021-02-17 14:10:55', '2021-02-17 14:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2021_01_03_162742_create_banners_table', 1),
(24, '2021_01_10_211454_create_categories_works_table', 1),
(25, '2021_01_11_155936_create_portfolio_p_osts_table', 1),
(26, '2021_01_22_211208_create_categories_table', 1),
(27, '2021_01_22_225832_create_posts_table', 1),
(28, '2021_01_23_214624_create_category_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_p_osts`
--

CREATE TABLE `portfolio_p_osts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_work_id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_p_osts`
--

INSERT INTO `portfolio_p_osts` (`id`, `categories_work_id`, `tittle`, `description`, `portfolio_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nice example of quote post format below', 'Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.Lorem ipsum dolor sit amet, ei quod constituto qui.', 'work_602d248875cb8.jpg', 1, '2021-02-17 14:13:28', '2021-02-17 14:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_body` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi,\n             id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper \n             laoreet perfecto ad qui, est rebum nulla argumentum ei.',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `user_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'montasir', 'montasir@gmail.com', NULL, '123456789', 1, 'default.jpg', NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$QOHnIJIuPmNdtr3VKMG6HOfRaDAs2c0Rg1ZnIoDkTj8cBMTsoLvhC', 1, 'default.jpg', NULL, '2021-02-17 13:59:19', '2021-02-17 13:59:19'),
(4, 'User', 'user@gmail.com', NULL, '$2y$10$7/arhBXfDj3Q8QTos/oLXeQ/nzkyg/19n6QQfu.LBqaquV20xN7vi', 2, 'default.jpg', NULL, '2021-02-17 15:25:31', '2021-02-17 15:25:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_works`
--
ALTER TABLE `categories_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolio_p_osts`
--
ALTER TABLE `portfolio_p_osts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_p_osts_categories_work_id_foreign` (`categories_work_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_works`
--
ALTER TABLE `categories_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `portfolio_p_osts`
--
ALTER TABLE `portfolio_p_osts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio_p_osts`
--
ALTER TABLE `portfolio_p_osts`
  ADD CONSTRAINT `portfolio_p_osts_categories_work_id_foreign` FOREIGN KEY (`categories_work_id`) REFERENCES `categories_works` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
