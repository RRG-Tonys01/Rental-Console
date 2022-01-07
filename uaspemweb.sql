-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2021 pada 11.41
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `Email`, `Username`, `Password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$NhqBUu9Lc3j8c.WVXQr1nOJbKchjmm/bSlAJnCVxrqF.14a2WYgpm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `consoles`
--

CREATE TABLE `consoles` (
  `ConsoleID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Descrip` varchar(1000) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 1,
  `Images` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `consoles`
--

INSERT INTO `consoles` (`ConsoleID`, `Name`, `Descrip`, `Price`, `Quantity`, `Images`) VALUES
(17, 'PlayStation 1', 'PlayStation, video game console released in 1994 by Sony Computer Entertainment. The PlayStation, one of a new generation of 32-bit consoles, signaled Sony’s rise to power in the video game world. Also known as the PS One, the PlayStation used compact discs (CDs), heralding the video game industry’s move away from cartridges.', 50000, 1, 'images/9uG25j1pMZMGGmcoMZ85MsomatFrLthzRequJQ9d.jpg'),
(18, 'PlayStation 2', 'The PS2 began life in a critical time in the video game industry. Its predecessor, the PlayStation, had been the first major console to use CDs for its games and competed against the cartridge-based Nintendo 64. By the time of the PS2, DVDs had become much more commonplace, and processing power had made substantial leaps in performance, paving the way for larger games with much more visually appealing graphics.', 80000, 3, 'images/Lp2vWhku4fVd1IRwBiXA04hvR9xChJXxZhC3c1YQ.png'),
(19, 'PlayStation 3', 'The PlayStation 3 (PS3) is a dedicated machine – \'games console\' – for playing video games, which connects to your television. The third in Sony\'s extremely successful series of game consoles, the PlayStation 3 was released in 2007. The PS3 was the first console to produce a full 1080p HD (high definition) image – giving it a clearer picture on a TV screen. The PS3 is the only games console currently available that can play high-definition Blu-ray discs, the successor to DVDs. As well as being able to play all the Blu-ray movies available, it can also play 3D movies on a compatible television.', 120000, 4, 'images/qhkzC6XpjdS1i2rBJw3F7qG3cLwl3qEVRktMdySj.png'),
(20, 'PlayStation 4', 'The PS4 is understated, unobtrusive, sleek, and elegant. The console\'s form factor also makes a departure from what\'s come before it, opting for a slanted, parallelogram design rather than a typical boxy or dome-shaped approach. The PS4 is even smaller and quieter than the PS3 launch box and the PS3 slim.', 150000, 1, 'images/1cp7GfzxE91Pt01moL9IPifzQlw0ogABf0aavTC8.jpg'),
(21, 'PlayStation 5', 'This generation, it seems like Sony is sticking with the approach that made the PS4 so successful: sell consoles that can play first-party games from Sony’s storied franchises, and supplement that lineup with great third-party titles, too. You should expect to see better graphics in your games, and the PS5 will also support high refresh rates, which should make games feel smoother (if you have a display that supports those refresh rates). Plus, the PS5’s custom SSD promises to offer such a leap forward in loading speeds that it could change the way games are designed.', 200000, 1, 'images/LdwFrKPE4HU7UE5aLPqZGQhkl9Dmm03wL6ky5AZC.png'),
(22, 'Xbox 360', 'Microsoft rebuilt the Xbox from the ground up. From the name to the look to hardware and features, the Xbox 360 is a radically different and more powerful machine than its predecessor. Far more than a video game console, the Xbox 360 is a total media center that allows users to play, network, rip, stream and download all types of media, including high-definition movies, music, digital pictures and game content.', 100000, 1, 'images/oP16TFSSRtyQ2RdLBh1wE349Zn8txV32mtmOAf9J.jpg'),
(23, 'Xbox One', 'On May 21st, Microsoft unveiled the Xbox One, set for release by the end of 2013. While the name was kept strictly under wraps, the Xbox One announcement confirmed many of the rumors we’d been hearing for months or even years. Those include live TV support, a new Kinect, upgraded specs, and a series of new next-generation games – but there are still loads of questions Microsoft will need to answer about the One before gamers will have a complete picture of its newest console.', 140000, 1, 'images/RghjzfxdeuyIIYifveoad6rinizHFINjcakgTBka.jpg'),
(24, 'Xbox Series X', 'The new Xbox Series X utilizes its powerful specs to significantly reduce load times and boost overall game performance and visual fidelity. But while features such as Quick Resume, Smart Delivery and backwards compatibility give it that extra edge, it’s hard to deny that it’s lacking in key areas – notably significant UI improvements and captivating exclusive launch titles.', 190000, 1, 'images/dijcEuB1ER0anx96FeSlmHwOCNbkuM7xpA2cqFwd.jpg'),
(25, 'Super Nintendo Entertainment System', 'The Super Nintendo Entertainment System (officially abbreviated as Super NES and SNES), commonly known as Super Nintendo, is a 16-bit home video game console developed by Nintendo. It is the second video game home console released by Nintendo internationally. The successor to the Nintendo Entertainment System, the Super Nintendo Entertainment System featured enhanced graphics, a brand new controller with additional buttons, superior sound and more features.', 50000, 1, 'images/CRl660kBlDUybo62kx8rzUHtRXm5Q1SXVt4HqNff.png'),
(26, 'Nintendo GameCube', 'The Nintendo GameCube (abbreviated as GameCube, GC, GCN, or NGC) is Nintendo\'s fourth home console and a sixth generation video game console initially released on September 14, 2001 in Japan. Nintendo first mentioned a successor to the Nintendo 64 on March 3, 1999, a day after Sony\'s announcement of the PlayStation 2. Two months later, on May 12, 1999, Nintendo of America\'s former chairman Howard Lincoln officially announced the console, which would be codenamed Dolphin.', 80000, 1, 'images/VEtE4TkTxD8n9sjMP7Lzmv8j505FhPXWnqbxMwRn.png'),
(27, 'Nintendo Switch', 'Unlike the PS4 and Xbox One S, though, the Nintendo Switch is what’s known as a hybrid console. This means you can connect it to a TV and play it in the normal home console style. However, you can also use it as a wireless handheld device', 140000, 1, 'images/zkSJi1ClHJSP4Btf78wlvJ2hRxVNtLywQl6b89Ed.jpg'),
(28, 'Nintendo DS', 'Originally released in 2004, the Nintendo DS is a series of portable game consoles sold by Nintendo. The handheld form factor utilizes two screens, one being stylus-based for controlling and writing, and the other acting as the game display screen. The Nintendo DS also has buttons and a D-pad similar to more traditional game console controllers. The Nintendo DS family of gaming products is characterized by its original proprietary games using popular Nintendo properties, like Mario, Pokemon, and Zelda.', 100000, 1, 'images/nxMJaJ6lXipeHFUhswaYEOn1qnlWwmYCJX2xXxhF.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_05_15_093255_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `OrderID` varchar(100) NOT NULL,
  `idUser` bigint(50) NOT NULL,
  `items` varchar(100) NOT NULL,
  `lama` int(100) NOT NULL,
  `tglPick` date NOT NULL,
  `tglCheckout` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`OrderID`, `idUser`, `items`, `lama`, `tglPick`, `tglCheckout`, `status`, `total`) VALUES
('2W8Z536', 1, '[{\"idItem\":17},{\"idItem\":18}]', 2, '2021-05-25', '2021-05-23', 'Sedang Dikirim', 260000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1ugVvxxDaBHf8d0wvSoOfz0AyAgw0Xcs5IrY0jCU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibWVvWFRMekdDWEJlY2dVZ0dqWXl0WjcyZnNOVGJ0OXM2YWVZamVQRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9PcmRlckxpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVy5IODdvMDhiV2daVEV3bERET05uZU1GWjZxdkNKTnM1UU5jY1J3T1ZsQ3B0cGVTTzBpYmkiO3M6NDoiZGF0YSI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7aTowO086ODoic3RkQ2xhc3MiOjY6e3M6OToiQ29uc29sZUlEIjtpOjE4O3M6NDoiTmFtZSI7czoxMzoiUGxheVN0YXRpb24gMiI7czo3OiJEZXNjcmlwIjtzOjQxNDoiVGhlIFBTMiBiZWdhbiBsaWZlIGluIGEgY3JpdGljYWwgdGltZSBpbiB0aGUgdmlkZW8gZ2FtZSBpbmR1c3RyeS4gSXRzIHByZWRlY2Vzc29yLCB0aGUgUGxheVN0YXRpb24sIGhhZCBiZWVuIHRoZSBmaXJzdCBtYWpvciBjb25zb2xlIHRvIHVzZSBDRHMgZm9yIGl0cyBnYW1lcyBhbmQgY29tcGV0ZWQgYWdhaW5zdCB0aGUgY2FydHJpZGdlLWJhc2VkIE5pbnRlbmRvIDY0LiBCeSB0aGUgdGltZSBvZiB0aGUgUFMyLCBEVkRzIGhhZCBiZWNvbWUgbXVjaCBtb3JlIGNvbW1vbnBsYWNlLCBhbmQgcHJvY2Vzc2luZyBwb3dlciBoYWQgbWFkZSBzdWJzdGFudGlhbCBsZWFwcyBpbiBwZXJmb3JtYW5jZSwgcGF2aW5nIHRoZSB3YXkgZm9yIGxhcmdlciBnYW1lcyB3aXRoIG11Y2ggbW9yZSB2aXN1YWxseSBhcHBlYWxpbmcgZ3JhcGhpY3MuIjtzOjU6IlByaWNlIjtpOjgwMDAwO3M6ODoiUXVhbnRpdHkiO2k6NDtzOjY6IkltYWdlcyI7czo1MToiaW1hZ2VzL0xwMnZXaGt1NGZWZDFJUndCaVhBMDRodlI5eENoSlh4WmhDM2MxWVEucG5nIjt9fX19', 1621762837);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `PhoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `PhoneNumber`, `Address`, `City`, `email`, `Username`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'julius', '0', '087867131109a', '15313513', '46466', 'adler@gmail.com', 'wwwww', NULL, '$2y$10$W.H87o08bWgZTEwlDDONneMFZ6qvCJNs5QNccRwOVlCptpeSO0ibi', NULL, NULL, NULL, NULL, '2021-05-18 09:40:46', '2021-05-18 09:40:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`ConsoleID`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `consoles`
--
ALTER TABLE `consoles`
  MODIFY `ConsoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
