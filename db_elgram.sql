-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2024 pada 16.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elgram`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media_uploads`
--

CREATE TABLE `media_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `media_uploads`
--

INSERT INTO `media_uploads` (`id`, `user_id`, `file_path`, `file_type`, `caption`, `created_at`, `updated_at`) VALUES
(1, 2, 'uploads/61IUointGdU0PFLrUtPhfHcAOdlJn4ia3klfcGEq.jpg', 'jpg', 'Indahnya alam!', '2024-10-15 22:00:09', '2024-10-15 22:00:32'),
(2, 2, 'uploads/5nbBheCrBauc8BX80xVftLoaoRmxahlKj1wd3HMu.jpg', 'jpg', 'Natural', '2024-10-15 22:01:38', '2024-10-15 22:01:38'),
(3, 2, 'uploads/pFjqj2axzXKaoqmTjitwuVAd6FY2cZhkIKgEGBVA.jpg', 'jpg', 'Cartoon Natural', '2024-10-15 22:02:11', '2024-10-15 22:02:11'),
(4, 2, 'uploads/Ji5kugSRtoDXmJ9yy4viroQgCtuFhcEcBLKpK86V.jpg', 'jpg', 'On Cam', '2024-10-16 06:47:31', '2024-10-16 06:47:31'),
(5, 2, 'uploads/LxszxQS7ndWhcqAEyKPaXNQMljVGomnSDCwnVLPk.jpg', 'jpg', 'Roll On', '2024-10-16 06:55:39', '2024-10-16 06:55:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(57, '0001_01_01_000000_create_users_table', 1),
(58, '0001_01_01_000001_create_cache_table', 1),
(59, '0001_01_01_000002_create_jobs_table', 1),
(60, '2024_10_13_172130_create_media_uploads_table', 1),
(61, '2024_10_14_064523_add_feed_settings_to_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('adminTesting@gmail.com', '$2y$12$sAYcyF2kNb883tiEChw/hezAYHAGfkWdsXKfLy7wk4ZnAnWpOX5zm', '2024-10-16 04:05:30'),
('hanydwinov94@gmail.com', '$2y$12$RoBpT8z/5uC4f0gg1hwvpu/41V/YErYggxxRffKKF.XI7A/njn4Bu', '2024-10-16 04:07:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DjfRyY83lkLp1WCWBc84sewhySw0m7ofVEkNKRXA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkUzNDdveW9MYnhzS1NQRnlnc3JJTmV4d0d3Z2I1ZGl6OXVVaUdkeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1729087775);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feed_per_row` int(11) NOT NULL DEFAULT 3,
  `profile_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `bio`, `remember_token`, `created_at`, `updated_at`, `feed_per_row`, `profile_photo`) VALUES
(1, 'Admin', 'adminTesting', 'adminTesting@gmail.com', NULL, '$2y$12$qIGnbUx6XRM..I5xKN2AiuLDOnjCsli9DoW7H33OG.lOPnw1/LR8i', NULL, NULL, '2024-10-15 21:28:45', '2024-10-15 21:28:45', 3, NULL),
(2, 'Picture', 'testingPicture', 'testingPicture@gmail.com', NULL, '$2y$12$g3VGdEUg0Te1ZsOQEAlGhuGac/26E0Jne1bpuYQXrgoWOdy94rTP2', 'myPicture Here!', NULL, '2024-10-15 21:56:17', '2024-10-16 06:55:20', 3, 'profile_photos/tgAxqaC0xV6iWGCrO6FhRiJ3aoHwv4fHsLY268Jw.jpg'),
(4, 'iniName', 'testRegis', 'regis@gmail.com', NULL, '$2y$12$TBbgimlLgM22bslrjRyud.IaFcxUG5Nzk0Bcb3gBEX9ENJtS/n08y', NULL, NULL, '2024-10-16 04:08:52', '2024-10-16 04:08:52', 3, NULL),
(5, 'testReg', 'testReg', 'testReg@gmail.com', NULL, '$2y$12$0p8rcyr7kQP6TgN7l2/ot.yBzuoD.F0zVzb9nHNAiurXQzHRkJmXS', NULL, NULL, '2024-10-16 05:55:13', '2024-10-16 05:55:13', 3, NULL),
(6, 'Marco', 'losdol', 'marco@gmail.com', NULL, '$2y$12$LXb/ndk2hV1Uw9BoOnePleb2FtfUwwK3NDLtVWbiLjS/vKUfEZSZO', NULL, NULL, '2024-10-16 06:04:24', '2024-10-16 06:04:24', 3, NULL),
(7, 'Joko', 'itsJoko', 'joko@gmail.com', NULL, '$2y$12$Meho2j0D8rxoco.aONH0ROGuy50abekgPvNKSWERU88a8H4RdxhJu', NULL, NULL, '2024-10-16 06:07:30', '2024-10-16 06:07:30', 3, NULL),
(8, 'Kotok', 'itsKotok', 'itskotok@gmail.com', NULL, '$2y$12$tXQS/h3m0Kza6bqJLzsdaeW2x8CpDq/0o0Zo/GarTLFqmEsVUWg0a', NULL, NULL, '2024-10-16 06:15:29', '2024-10-16 06:15:29', 3, NULL),
(9, 'Manda', 'itsManda', 'itsmanda@gmail.com', NULL, '$2y$12$msduTh0bF3DgtJe.HzbkweL2oNHNyw03f7Yjy7CV1ZghdzapsGb6q', NULL, NULL, '2024-10-16 06:19:49', '2024-10-16 06:19:49', 3, NULL),
(10, 'Mpis', 'itsMpis', 'itsmpis@gmail.com', NULL, '$2y$12$znu6wnwMNG2F9wyNr4j1qecgDQiv4vRFxbJPKNTdVfTzSfBdJQaqC', NULL, NULL, '2024-10-16 06:20:55', '2024-10-16 06:20:55', 3, NULL),
(11, 'Lami', 'itsLami', 'itslami@gmail.com', NULL, '$2y$12$VlqazPql07hy2SECPHzSpOvnzfK9EAyiRDlshyTARmn8mXFRvEsra', NULL, NULL, '2024-10-16 06:22:03', '2024-10-16 06:22:03', 3, NULL),
(12, 'Prigen', 'itsPrigen', 'itsprigen@gmail.com', NULL, '$2y$12$3C90eq3aLNjtapTSAIifSeHKLx6Ek6eREXHotLWjLUgwRtoN7D.jy', NULL, NULL, '2024-10-16 06:26:23', '2024-10-16 06:26:23', 3, NULL),
(13, 'Keramat', 'itsKeramat', 'itskeramat@gmail.com', NULL, '$2y$12$7LJIA01Wi5rz0wmb17yOhOpdYNMGwBgfnCPRSRbqIpJzZtp5cP5uW', NULL, NULL, '2024-10-16 06:33:12', '2024-10-16 06:33:12', 3, NULL),
(14, 'Tester', 'itsTester', 'itstester@gmail.com', NULL, '$2y$12$0zCTqyPcjX9zXHW6gMuSuegfdHA1KiKaSm0Vl1O4GIsOwST1UoAcC', NULL, NULL, '2024-10-16 06:34:57', '2024-10-16 06:34:57', 3, NULL),
(15, 'Cuanki', 'itsCuanki', 'itscuanki@gmail.com', NULL, '$2y$12$4C87A0xHw9a2o5TbJlTo7ecGSuC/tPSGd3HzjOnvIaHSJhd29.0Sq', NULL, NULL, '2024-10-16 06:36:30', '2024-10-16 06:36:30', 3, NULL),
(16, 'Elnusa', 'itsElnusa', 'itselnusa@gmail.com', NULL, '$2y$12$B3lZ91wO/G76OA31riz3x.i72zE9jHqkZmo4WQx.5V0TBEpx.q7.m', NULL, NULL, '2024-10-16 06:37:14', '2024-10-16 06:37:14', 3, NULL),
(17, 'Mamak', 'itsMamak', 'itsmamak@gmail.com', NULL, '$2y$12$i5mYXRp/p3fgvX22oguUVOKcg/r96OPQA00mEs0sgPz8hslWVA59.', NULL, NULL, '2024-10-16 06:41:31', '2024-10-16 06:41:31', 3, NULL),
(18, 'Dopo', 'itsDopo', 'itsdopo@gmail.com', NULL, '$2y$12$W9DjVwgq4Yeo/QAdDGFSm.obmNmbYLsgMWNWUxMx14X03kDABok9G', NULL, NULL, '2024-10-16 06:42:34', '2024-10-16 06:42:34', 3, NULL),
(19, 'Kiri', 'itsKiri', 'itskiri@gmail.com', NULL, '$2y$12$kjLL.RvgmNxvFmmYAhzlbufhKZ6wIiiBarZFzaYCuQzY6eMvxAF3a', NULL, NULL, '2024-10-16 06:44:16', '2024-10-16 06:44:16', 3, NULL),
(20, 'Faiz', 'itsFaiz', 'itsfaiz@gmail.com', NULL, '$2y$12$Yfi3oMc2asysDxgzJfTdFeJNNT5m.WgeOijROfeKdtpwyJPP1WCUm', NULL, NULL, '2024-10-16 07:07:29', '2024-10-16 07:07:29', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_uploads_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `media_uploads`
--
ALTER TABLE `media_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD CONSTRAINT `media_uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
