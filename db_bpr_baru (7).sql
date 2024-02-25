-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Feb 2024 pada 02.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpr_baru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `kode_aset` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `perkiraan_harga` decimal(15,2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`kode_aset`, `nama_aset`, `jumlah`, `perkiraan_harga`, `tanggal`, `status`, `keterangan`) VALUES
(1, 'aset baru', 34, 24242535345.00, '2024-01-18', 'diterima', 'sfsfs'),
(2, 'kulkas', 2, 23123123.00, '2024-01-17', 'ditolak', 'adada'),
(3, 'Evercross', 2, 231231231.00, '2024-01-01', 'diterima', 'asada'),
(4, '1', 2, 657688.00, '2024-01-09', 'ditolak', '1'),
(5, 'aset newnew', 1, 121.00, '2024-01-16', 'diterima', 'ewewe'),
(6, 'ini aset baru1', 2, 3.00, '2024-01-16', 'ditolak', 'sasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_nonaktif`
--

CREATE TABLE `aset_nonaktif` (
  `kode_aset_nonaktif` int(11) NOT NULL,
  `kode_aset` varchar(255) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_merek` int(11) DEFAULT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `tanggal_nonaktif` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qr_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aset_nonaktif`
--

INSERT INTO `aset_nonaktif` (`kode_aset_nonaktif`, `kode_aset`, `nama_aset`, `jumlah`, `harga`, `id_kategori`, `id_ruangan`, `id_merek`, `id_kondisi`, `tanggal_nonaktif`, `foto`, `qr_code`) VALUES
(7, 'AS007', 'ini aset baru', 2, 222222, 1, 1, 1, 1, '2024-01-17', '1705535490_4898b4b4807cdbc86192.jpg', NULL),
(8, 'AS003', 'laptop', 0, 4234240, 1, 1, 1, 1, '2024-01-18', '1705528784_2ad66192062f4d848cdd.jpg', NULL),
(9, 'AS008', 'nama aset', 2, 231313, 1, 1, 1, 1, '2024-01-18', '1705544283_fd830638c70e3aa11f15.jpg', NULL),
(10, 'AS10', 'aset new', 1, 121212, 1, 1, 1, 1, '2024-01-18', '1705576356_d70455d6d68e951a19eb.jpg', NULL),
(11, 'AS008', 'laptop', 1, 23123200, 1, 1, 1, 1, '2024-01-18', '1705561862_e960778d0b01fb192e7d.jpg', NULL),
(12, 'AS11', 'dadada1', 2, 21212, 1, 1, 1, 1, '2024-01-18', '1705580778_c54fa640772d95f43bef.jpg', 'qr_code/AS11.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'admin site'),
(2, 'atasan', 'atasan site');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@gmail.com', 2, '2024-01-17 18:12:05', 1),
(2, '::1', 'admin@gmail.com', 2, '2024-01-17 18:12:28', 1),
(3, '::1', 'admin@gmail.com', 2, '2024-01-17 18:13:16', 1),
(4, '::1', 'atasan@gmail.com', 1, '2024-01-17 18:40:16', 1),
(5, '::1', 'admin@gmail.com', 2, '2024-01-17 18:40:57', 1),
(6, '::1', 'atasan@gmail.com', 1, '2024-01-17 18:41:10', 1),
(7, '::1', 'admin@gmail.com', 2, '2024-01-17 18:41:38', 1),
(8, '::1', 'atasan@gmail.com', 1, '2024-01-17 19:34:24', 1),
(9, '::1', 'admin@gmail.com', 2, '2024-01-17 19:34:33', 1),
(10, '::1', 'atasan@gmail.com', 1, '2024-01-17 19:36:28', 1),
(11, '::1', 'atasan@gmail.com', 1, '2024-01-17 19:37:52', 1),
(12, '::1', 'admin@gmail.com', 2, '2024-01-17 19:41:10', 1),
(13, '::1', 'atasan@gmail.com', 1, '2024-01-17 21:17:45', 1),
(14, '::1', 'admin@gmail.com', 2, '2024-01-18 07:01:00', 1),
(15, '::1', 'atasan@gmail.com', 1, '2024-01-18 07:02:36', 1),
(16, '::1', 'atasan@gmail.com', 1, '2024-01-18 07:41:25', 1),
(17, '::1', 'atasan@gmail.com', 1, '2024-01-18 07:41:35', 1),
(18, '::1', 'admin@gmail.com', 2, '2024-01-18 11:31:46', 1),
(19, '::1', 'atasan@gmail.com', 1, '2024-01-18 11:33:42', 1),
(20, '::1', 'atasan@gmail.com', 1, '2024-01-18 11:37:47', 1),
(21, '::1', 'adminbaru@gmail.com', 3, '2024-01-18 11:38:36', 1),
(22, '::1', 'atasan@gmail.com', 1, '2024-01-18 11:42:45', 1),
(23, '::1', 'adminbaruya@gmail.com', 4, '2024-01-18 12:01:26', 1),
(24, '::1', 'atasan@gmail.com', 1, '2024-01-18 12:08:44', 1),
(25, '::1', 'admin@gmail.com', 2, '2024-01-18 13:37:14', 1),
(26, '::1', 'atasan@gmail.com', 1, '2024-01-18 13:40:06', 1),
(27, '::1', 'admin@gmail.com', 2, '2024-01-19 06:15:42', 1),
(28, '::1', 'admin@gmail.com', 2, '2024-01-20 03:52:53', 1),
(29, '::1', 'admin@gmail.com', 2, '2024-01-21 09:58:18', 1),
(30, '::1', 'atasan@gmail.com', 1, '2024-01-21 13:12:34', 1),
(31, '::1', 'atasan@gmail.com', 1, '2024-01-21 13:13:41', 1),
(32, '::1', 'admin1@gmail.com', NULL, '2024-01-25 21:54:13', 0),
(33, '::1', 'admin@gmail.com', 2, '2024-01-25 21:54:20', 1),
(34, '::1', 'admin@gmail.com', 2, '2024-01-26 04:59:13', 1),
(35, '::1', 'admin1@gmail.com', NULL, '2024-02-08 09:10:35', 0),
(36, '::1', 'admin@gmail.com', 2, '2024-02-08 09:10:44', 1),
(37, '::1', 'atasan@gmail.com', 1, '2024-02-08 09:50:01', 1),
(38, '::1', 'admin1@gmail.com', NULL, '2024-02-17 01:03:59', 0),
(39, '::1', 'admin1@gmail.com', NULL, '2024-02-17 01:04:02', 0),
(40, '::1', 'admin1@gmail.com', NULL, '2024-02-17 01:04:04', 0),
(41, '::1', 'atasan@gmail.com', 1, '2024-02-17 01:04:17', 1),
(42, '::1', 'atasan@gmail.com', 1, '2024-02-17 01:09:32', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'kategori baru', 'blabla'),
(2, 'kategori baru lagi', 'blabla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_aset`
--

CREATE TABLE `kelola_aset` (
  `id_kelola` int(11) NOT NULL,
  `kode_aset` varchar(255) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `id_merek` int(11) DEFAULT NULL,
  `id_kondisi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qr_code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelola_aset`
--

INSERT INTO `kelola_aset` (`id_kelola`, `kode_aset`, `nama_aset`, `jumlah`, `harga`, `id_kategori`, `id_ruangan`, `id_merek`, `id_kondisi`, `tanggal`, `keterangan`, `foto`, `qr_code`) VALUES
(8, 'AS1010', 'adadad', 12, 131312, 1, 1, 1, 1, '2024-01-02', 'dadad', '1705585086_9c17fca692a41cdfed68.jpg', 'qr_code/AS1010.png'),
(9, 'AS10101', 'aaddddd', 2, 2222, 1, 1, 2, 1, '2024-01-15', 'dadd', '1705585193_26bc7c229c990f140f13.jpg', 'qr_code/AS10101.png'),
(10, 'AS11', 'aset', 2, 203913, 2, 1, 1, 1, '2024-01-09', 'wfsfsfsf', '1705645000_6dfb24203fbee21c5830.jpg', 'qr_code/AS11.png'),
(11, 'AS110', 'asettt', 1, 121212, 1, 1, 1, 1, '2024-01-10', 'adaddfdff', '1705645048_742024ce4f97871fe2e2.jpg', 'qr_code/AS110.png'),
(12, '002', 'aset', 1, 23123, 1, 1, 1, 1, '2024-01-17', 'sdsdsd', '1705647679_30a281670c801233351c.jpg', 'qr_code/002.png'),
(13, '002', 'aset baru', 2, 457, 1, 1, 1, 1, '0000-00-00', '', '1705647742_4fe916e161b3500379a0.jpg', 'qr_code/002.png'),
(14, 'AS008', 'aadadad', 1, 231313, 1, 1, 1, 1, '2024-02-09', 'qewqeqwe', '1707383483_7d1417015a8eeeb00365.png', 'qr_code/AS008.png'),
(15, 'AS100', 'dadadad', 2, 131313, 1, 1, 1, 1, '2024-02-06', 'eaadawewe', '1707384523_9e70d325f47ffb25442c.png', 'qr_code/AS100.png'),
(16, 'as22', 'adasdadada', 2, 1212310000, 2, 1, 1, 1, '2024-02-06', 'adadadad', '1708132224_d4fc5c4190d80df71ae3.png', 'qr_code/as22.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `keterangan`) VALUES
(1, 'baru', 'blabla'),
(2, 'bekas', 'blabla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`, `keterangan`) VALUES
(1, 'merek baru', 'ini merek baru'),
(2, 'merek baru lagi', 'blabla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1705514988, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `kode_aset` int(11) DEFAULT NULL,
  `kerusakan` text DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `kode_aset`, `kerusakan`, `tanggal_perbaikan`, `jumlah`, `status`, `keterangan`) VALUES
(1, 1, 'rombeng', '2024-01-17', 2, 'Selesai', 'aadaa'),
(2, 2, 'adaa', '2024-01-07', 1, 'Belum Selesai', 'adada'),
(3, 4, 'dadadad', '2024-01-16', 3, 'Selesai', 'addaddada'),
(4, 1, 'dwqeqwewqeqwe', '2024-01-15', 1, 'Proses', 'dddadad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `keterangan`) VALUES
(1, 'lantai atas', 'blabla'),
(2, 'lantai bawah', 'blabla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nomor_hp`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'atasan@gmail.com', '', 'atasan', '$2y$10$mAoaXRWGN9dSqwDf2A.V9ewzAbon5WLjA5u.c3h60vwLkhzSKvnqa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-17 18:10:35', '2024-01-17 18:10:35', NULL),
(2, 'admin@gmail.com', '', 'admin', '$2y$10$7v15NZQlo6OKUxht5pgUROnJspaTjvIFrBAErQZRQ5537saj/eTU2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-17 18:10:50', '2024-01-17 18:10:50', NULL),
(3, 'adminbaru@gmail.com', '2313131', 'adminbaru', '$2y$10$af2/ZHHSmc7LpWE.kLc5zuutMnMA1KnD4idBiFj66NQyFLcwb1Nqe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-18 11:38:17', '2024-01-18 11:38:17', NULL),
(4, 'adminbaruya@gmail.com', '013131', 'adminbaruya', '$2y$10$BsHXJgH6GFeIEztopANvlOhGikKv0FupYp8lyzUHAt4RqWbYC7dQa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-01-18 12:01:16', '2024-01-18 12:01:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`kode_aset`);

--
-- Indeks untuk tabel `aset_nonaktif`
--
ALTER TABLE `aset_nonaktif`
  ADD PRIMARY KEY (`kode_aset_nonaktif`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelola_aset`
--
ALTER TABLE `kelola_aset`
  ADD PRIMARY KEY (`id_kelola`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `kode_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aset_nonaktif`
--
ALTER TABLE `aset_nonaktif`
  MODIFY `kode_aset_nonaktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelola_aset`
--
ALTER TABLE `kelola_aset`
  MODIFY `id_kelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset_nonaktif`
--
ALTER TABLE `aset_nonaktif`
  ADD CONSTRAINT `aset_nonaktif_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `aset_nonaktif_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `aset_nonaktif_ibfk_4` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`),
  ADD CONSTRAINT `aset_nonaktif_ibfk_5` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi` (`id_kondisi`);

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `perbaikan_ibfk_1` FOREIGN KEY (`kode_aset`) REFERENCES `aset` (`kode_aset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
