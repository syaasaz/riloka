-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2025 pada 00.39
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
-- Database: `riloka`
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

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1751668395),
('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1751668395;', 1751668395),
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:0:{}s:11:\"permissions\";a:0:{}s:5:\"roles\";a:0:{}}', 1751727219);

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
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `detail` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `nama`, `telepon`, `alamat`, `detail`, `created_at`, `updated_at`) VALUES
(1, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 06:16:07', '2025-06-23 06:16:07'),
(2, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 06:16:21', '2025-06-23 06:16:21'),
(3, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 06:20:01', '2025-06-23 06:20:01'),
(4, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 06:40:04', '2025-06-23 06:40:04'),
(5, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 06:47:09', '2025-06-23 06:47:09'),
(6, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 07:25:15', '2025-06-23 07:25:15'),
(7, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-23 07:30:46', '2025-06-23 07:30:46'),
(8, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-25 11:09:00', '2025-06-25 11:09:00'),
(9, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-25 12:10:14', '2025-06-25 12:10:14'),
(10, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 10:46:46', '2025-06-26 10:46:46'),
(11, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:16:05', '2025-06-26 11:16:05'),
(12, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:20:20', '2025-06-26 11:20:20'),
(13, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:21:06', '2025-06-26 11:21:06'),
(14, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:25:22', '2025-06-26 11:25:22'),
(15, 3, 'nana', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:28:58', '2025-06-26 11:28:58'),
(16, 3, 'alfian', '089504655678', 'jl. halmahera no.72', NULL, '2025-06-26 11:31:39', '2025-06-26 11:31:39'),
(17, 6, 'anisa', '082229484155', 'Jl.Pulanggeni III,Tipes,Serengan', 'kos', '2025-07-03 03:39:04', '2025-07-03 03:39:04'),
(18, 7, 'Safa', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 02:47:19', '2025-07-04 02:47:19'),
(19, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 06:21:30', '2025-07-04 06:21:30'),
(20, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 06:25:01', '2025-07-04 06:25:01'),
(21, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 06:42:15', '2025-07-04 06:42:15'),
(22, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 07:28:36', '2025-07-04 07:28:36'),
(23, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 07:51:47', '2025-07-04 07:51:47'),
(24, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 08:29:38', '2025-07-04 08:29:38'),
(25, 7, 'Keisha', '087806352944', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 16:03:39', '2025-07-04 16:03:39'),
(26, 7, 'Keisha', '086543217896', 'Dawung Wetan RT 004 RW 015, Danukusuman, Serengan, Surakarta', NULL, '2025-07-04 16:04:29', '2025-07-04 16:04:29'),
(27, 7, 'Keisha', '086543217896', 'Manahan, Banjarsari, Surakarta', NULL, '2025-07-04 16:05:23', '2025-07-04 16:05:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edit_panduan`
--

CREATE TABLE `edit_panduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_1` varchar(150) NOT NULL,
  `isi_1` text NOT NULL,
  `judul_2` varchar(150) NOT NULL,
  `isi_2` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `edit_panduan`
--

INSERT INTO `edit_panduan` (`id`, `judul_1`, `isi_1`, `judul_2`, `isi_2`, `created_at`, `updated_at`) VALUES
(1, 'Cara Jual Produk', 'Langkah-langkah :\n1. cari produk yang diinginkan\n2. pilih produk yang diinginkan\n3. masukkan kedalam keranjang\n4. pesan produk', 'Cara Beli Produk', 'langkah-langkah :\n1. klik profil\n2. klik tambah produk\n3. upload produk\n4. jual dan kirim produk', '2025-06-16 05:55:44', '2025-06-16 05:55:44');

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
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `user_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(12, 3, 3, 1, '2025-06-26 11:33:08', '2025-06-26 11:33:08'),
(13, 3, 2, 1, '2025-06-26 11:36:14', '2025-06-26 11:36:14'),
(14, 6, 3, 1, '2025-07-01 23:10:00', '2025-07-01 23:10:00'),
(17, 7, 4, 1, '2025-07-04 16:02:39', '2025-07-04 16:02:39');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_13_073226_create_produks_table', 1),
(5, '2025_06_13_084427_create_ulasans_table', 1),
(6, '2025_06_15_160618_create_permission_tables', 1),
(7, '2025_06_20_142923_add_status_to_produk_table', 1),
(8, '2025_06_23_120442_create_keranjang_table', 1),
(9, '2025_06_23_130403_create_checkouts_table', 2),
(10, '2025_06_25_182550_create_pesanans_table', 3),
(11, '2025_06_25_191356_create_transaksi_table', 4),
(12, '2025_07_02_090946_add_foto_to_users_table', 5),
(13, '2025_07_04_133552_create_pembelians_table', 6),
(14, '2025_07_04_134307_add_status_to_pesanans_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `total` decimal(12,0) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'dipesan',
  `tanggal_pembelian` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'keranjang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 2, 1, '2025-06-26 11:29:05', '2025-06-26 11:29:05', 'keranjang'),
(2, 3, 1, 1, '2025-06-26 11:29:05', '2025-06-26 11:29:05', 'keranjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint(20) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `user_id`, `nama`, `gambar`, `deskripsi`, `kategori`, `merek`, `ukuran`, `lokasi`, `harga`, `created_at`, `updated_at`) VALUES
(1, 3, 'jelas', '1750681801_kaligrafi.PNG', 'baju', 'Pria', 'udb', 'M', 'surakarta', 75000, '2025-06-23 05:30:01', '2025-06-23 05:30:01'),
(2, 3, 'gatau', '1750689560_cekkesehatan.jpg', 'sehat', 'Wanita', 'cardigan', 'S', 'surakarta', 60000, '2025-06-23 07:39:20', '2025-06-23 07:39:20'),
(3, 3, 'adf', '1750962774_ikutsertatpa.jpg', 'sweater', 'Wanita', 'cardigan', 'S', 'surakarta', 80000, '2025-06-26 11:32:54', '2025-06-26 11:32:54'),
(4, 6, 'Cardigan', '1751446512_cardigan.jpg', 'cardigan lucu', 'Wanita', 'Donna', 'L', 'Kartasura', 150, '2025-07-02 01:55:12', '2025-07-02 01:55:12'),
(5, 7, 'Cardigan Colorful', '1751635098_images.jpeg', 'Baru satu kali pakai, dijual karena kekecilan', 'Wanita', 'Colorbox', 'S', 'Solo Baru', 150000, '2025-07-04 06:18:18', '2025-07-04 06:18:18'),
(6, 7, 'Kaos Vercase Navy', '1751669994_baju_kaos_pria_vercase_navy_be_1723354213_69049f4f_progressive.jpg', 'Masih layak pakai tetapi ada noda tinta 1 titik di bagian lengan kanan', 'Pria', 'Vercase', 'XL', 'Mojosongo', 100000, '2025-07-04 15:59:54', '2025-07-04 15:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'User', 'web', '2025-06-23 05:28:14', '2025-06-23 05:28:14'),
(2, 'Admin', 'web', '2025-06-23 05:28:14', '2025-06-23 05:28:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('2yBJHaDBgOXLE7ciGnZpOofH513KVSz96CZmfcke', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTjBsMXRTZVh2TmI4cWZoeTJLcXdHZWxQSWVESEY2MHAyWWF3NFBnSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWwiO31zOjUwOiJsb2dpbl93ZWJfM2RjN2E5MTNlZjVmZDRiODkwZWNhYmUzNDg3MDg1NTczZTE2Y2Y4MiI7aTo3O30=', 1751670539);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `produk_id`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, 150, '2025-07-03 11:03:38', '2025-07-03 11:03:38'),
(2, 3, 4, 1, 150, '2025-07-03 11:03:56', '2025-07-03 11:03:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@riloka.com', NULL, NULL, '$2y$12$UlE/7BoGgQ76/d0Ywwkx4ukq3JV1rb.XbIlIEPiJEtfdOzsaoB/kW', NULL, '2025-06-23 05:28:15', '2025-07-04 15:34:43'),
(2, 'Test User', 'test@example.com', NULL, '2025-06-23 05:28:18', '$2y$12$fhHuIXtoCflj/Ovh0w6xAOQkWCJl.oq3qpVPab7sl0sx9EX7lyv6K', '490ijpiwqO', '2025-06-23 05:28:19', '2025-06-23 05:28:19'),
(3, 'alfian', 'alfiansyahputra@gmail.com', NULL, NULL, '$2y$12$Eh4rU6ACHEhE7nqO36K.aOwkXCqglWNhHhAqLo.3TnFEWGMSXULDm', NULL, '2025-06-23 05:29:02', '2025-06-23 05:29:02'),
(4, 'rizki anisa', 'anisharizki16@gmail.com', NULL, NULL, '$2y$12$OFOK/jVQQO1.DDkX2HPMNu77AqwGoWInA1Brf7H6wu2NDALvS08H.', NULL, '2025-07-01 23:06:37', '2025-07-01 23:06:37'),
(6, 'anisaaa', 'rizkianisa@gmail.com', NULL, NULL, '$2y$12$i6DVSoNtorZ7fxJMv8/mkeSebol/XKA3b1Di72zeZPxRWjkEAs4BW', NULL, '2025-07-01 23:08:52', '2025-07-01 23:08:52'),
(7, 'sasa', 'safakamila007@gmail.com', NULL, NULL, '$2y$12$v7a0npZaMsfKDu6VDakjeeTa.h3YQQnQOpIZAsz3rXjTE02u0nMc2', NULL, '2025-07-03 06:26:36', '2025-07-03 06:26:36');

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
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `edit_panduan`
--
ALTER TABLE `edit_panduan`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_user_id_foreign` (`user_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_user_id_foreign` (`user_id`),
  ADD KEY `pembelian_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`),
  ADD KEY `pesanans_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_produk_id_foreign` (`produk_id`),
  ADD KEY `ulasans_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `edit_panduan`
--
ALTER TABLE `edit_panduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembelian_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesans`
--
ALTER TABLE `pesans`
  ADD CONSTRAINT `pesans_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
