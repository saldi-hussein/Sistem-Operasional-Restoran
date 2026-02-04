-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2026 pada 16.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

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
-- Struktur dari tabel `historystocks`
--

CREATE TABLE `historystocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `day` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `historystocks`
--

INSERT INTO `historystocks` (`id`, `name`, `description`, `day`, `amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ikan', 'null', '2026-10-14 00:00:00', 201.00, NULL, '2025-09-30 08:47:55', '2025-09-30 08:47:55'),
(2, 'Ikan', 'null', '2026-10-14 00:00:00', 12.00, NULL, '2025-09-30 08:49:58', '2025-09-30 08:49:58'),
(3, 'Ikan', 'null', '2026-10-14 00:00:00', 12.00, NULL, '2025-09-30 08:51:29', '2025-09-30 08:51:29'),
(4, 'Ikan', 'null', '2026-10-14 00:00:00', 44.00, 1, '2025-09-30 08:51:41', '2025-09-30 08:51:41'),
(5, 'Ikan', 'null', '2026-10-16 00:00:00', 12.00, 1, '2025-09-30 08:51:56', '2025-09-30 08:51:56'),
(6, 'Ikan', 'null', '2026-10-21 00:00:00', 21.00, 1, '2025-10-02 08:10:22', '2025-10-02 08:10:22'),
(7, 'Ikan', 'null', '2026-10-21 00:00:00', 2.00, 1, '2025-10-02 11:51:35', '2025-10-02 11:51:35'),
(8, 'Ikan', 'null', '2026-10-21 00:00:00', 22.00, 1, '2025-10-02 11:53:16', '2025-10-02 11:53:16'),
(9, 'Ikan', 'null', '2026-10-15 00:00:00', 22.00, 1, '2025-10-02 11:53:36', '2025-10-02 11:53:36'),
(10, 'Ikan', 'null', '2026-10-02 00:00:00', 22.00, 1, '2025-10-02 12:20:25', '2025-10-02 12:20:25'),
(11, 'Ikan Gurame', 'null', '2025-09-27 00:00:00', 20.00, 1, '2025-10-02 12:51:09', '2025-10-02 12:51:09'),
(17, 'Ikan Kakap', 'null', '2025-10-06 00:00:00', 50.00, NULL, '2025-10-06 03:14:00', '2025-10-06 03:14:00'),
(18, 'Ikan Gurame', 'null', '2025-10-06 00:00:00', 20.00, NULL, '2025-10-06 03:14:10', '2025-10-06 03:14:10'),
(19, 'Ikan Kerapu', 'null', '2025-09-28 00:00:00', 32.00, NULL, '2025-10-06 03:14:20', '2025-10-06 03:14:20'),
(20, 'Ikan Nila', 'null', '2025-10-06 00:00:00', 20.00, NULL, '2025-10-06 03:14:29', '2025-10-06 03:14:29'),
(21, 'Ikan Kakap', 'null', '2025-10-06 00:00:00', 40.00, NULL, '2025-10-06 03:20:07', '2025-10-06 03:20:07'),
(22, 'Ikan Kakap', 'null', '2025-10-06 00:00:00', 400.00, NULL, '2025-10-06 03:37:39', '2025-10-06 03:37:39'),
(23, 'Ikan Kakap', 'null', '2025-10-06 00:00:00', 20.00, NULL, '2025-10-24 19:33:04', '2025-10-24 19:33:04'),
(24, 'Ikan Kakap', 'null', '2025-10-06 00:00:00', 200.00, 1, '2025-10-24 19:33:56', '2025-10-24 19:33:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `price`, `available`, `created_at`, `updated_at`, `image`, `quantity`, `kategori`) VALUES
(2, 'ikan bakar daun', 'ikan bakar', 100000.00, 1, '2025-09-28 07:40:56', '2026-02-04 15:51:24', '01K68CA33QEPAJPBD431C80B8H.png', 65, NULL),
(3, 'ayam', 'atan', 20000.00, 1, '2025-09-28 09:07:17', '2026-02-04 15:51:37', '01K68H86MGBQC24AXZ0Z9ZKC3R.png', 292, NULL),
(4, 'juss', 'juis', 30000.00, 1, '2025-10-02 10:40:13', '2025-10-02 12:21:50', '01K6K057MSGP3EP2WABN012VS3.png', 0, NULL),
(8, 'Ayam Goreng Bumbu Uwo', 'Ayam yang digoreng langsung setelah dimarinasi menggunakan bumbu khas.\n+ Sambal Terasi.', 18000.00, 0, '2025-10-05 19:06:40', '2025-10-07 09:09:52', '01K6TW9PB9EWQKMQH59M48R7K8.jpg', 94, NULL),
(12, 'Ayam Krispi Uwo', 'Ayam yang sudah di marinasi digoreng menggunakan tepung  yang sudah dibumbui hingga menjadi krispi.\n+ Sambal Terasi', 20000.00, 1, '2025-10-06 02:16:26', '2025-10-07 09:09:53', '01K6VMWK9EE7D637RDF6E5GHHM.jpg', 97, NULL),
(13, 'Ayam Bakar Taliwang', 'Ayam yang sudah dimarinasi dibakar menggunakan bumbu Taliwang khas uwo.\n+  Sambal Terasi', 20000.00, 1, '2025-10-06 02:18:11', '2025-10-06 02:18:11', '01K6VMZSZG4N3RDDN4TSY466FH.jpg', 100, NULL),
(14, 'ikan bakar daun bumbu uwo', 'ikan nilai yang dilumuri bumbu pedas khas uwo lalu dibakar menggunakan daun pisang.\n+ Sambal Terasi', 32000.00, 1, '2025-10-06 02:22:01', '2025-10-06 02:22:01', '01K6VN6TSJYP4WHXMFA7RK793N.jpg', 50, NULL),
(15, 'Ikan Gurame Bakar Daun', 'ikan gurame yang dilumuri bumbu pedas khas uwo lalu dibakar menggunakan daun pisang.\n+ Sambal Terasi', 54000.00, 1, '2025-10-06 02:22:41', '2025-10-06 02:22:41', '01K6VN81B68X82JD7R8S3WDCQ7.jpg', 50, NULL),
(16, 'Air Hangat', 'Air Hangat', 2000.00, 1, '2025-10-06 02:30:20', '2026-02-04 15:52:21', '01K6VNP1WQ81C05G5M642D6DBJ.jpg', 998, NULL),
(17, 'Air Mineral', 'Air Mineral', 7000.00, 1, '2025-10-06 02:32:17', '2025-10-06 02:32:17', '01K6VNSMHRS3TNVF9AZ4QQH93M.jpg', 100, NULL),
(18, 'Jeruk Peras', 'Bisa Panas/Dingin', 10000.00, 1, '2025-10-06 02:53:04', '2025-10-06 02:53:04', '01K6VPZP9EDAP0YYG8H3FQW2RS.jpg', 30, NULL),
(19, 'Es Kelapa Jeruk', 'Es Jeruk yang dicampurkan dengan segarnya air kelapa.', 18000.00, 1, '2025-10-06 02:54:18', '2025-10-07 09:10:21', '01K6VQ1YBT3KR4ECJDG2QSGYCS.jpg', 30, NULL),
(20, 'Jus Pokat', 'Jus Buah Alpukat', 10000.00, 1, '2025-10-06 02:56:15', '2025-10-06 06:48:58', '01K6VQ5GYAK4Q9X6QVVNWZ2TBB.jpg', 26, NULL),
(21, 'Mil', 'Bisa Panas/Dingin', 10000.00, 1, '2025-10-06 02:56:58', '2025-10-06 02:56:58', '01K6VQ6TX6542GWPE7FCFWKSWY.jpg', 30, NULL),
(22, 'Milo', 'Bisa Panas/Dingin', 10000.00, 1, '2025-10-06 02:57:38', '2025-10-06 02:57:38', '01K6VQ81CVDVS3V1G7Q5RJ631H.jpg', 30, NULL),
(23, 'Nasi Bakul', 'Nasi Untuk Porsi 4-5 orang', 25000.00, 1, '2025-10-06 02:58:51', '2025-10-06 06:50:21', '01K6VQA904CJD5QJB3KPKRQ1Q6.webp', 1000, NULL),
(24, 'Nasi Porsi', 'Nasi', 5000.00, 1, '2025-10-06 03:03:16', '2025-10-06 03:03:16', '01K6VQJBJY1PMV93MEFBGW3N7E.jpg', 1000, NULL),
(25, 'Sambal Terasi', 'Seporsi Sambal Terasi', 6000.00, 1, '2025-10-06 03:04:03', '2025-10-06 03:04:03', '01K6VQKSKYHPCPX7M276QYV6N0.jpg', 1000, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_27_112717_create_shifts_table', 1),
(6, '2025_06_27_123134_create_menus_table', 1),
(7, '2025_06_27_123147_create_orders_table', 1),
(8, '2025_06_27_123326_create_stoks_table', 1),
(9, '2025_06_27_123344_create_stocks_table', 1),
(10, '2025_06_27_123401_create_outcomes_table', 1),
(11, '2025_06_27_123415_create_incomes_table', 1),
(12, '2025_06_27_123727_create_units_table', 1),
(13, '2025_06_27_123815_add_unit_id_stock', 1),
(14, '2025_06_27_130351_add_image_menu', 1),
(15, '2025_06_27_132234_add_shift_shift', 1),
(16, '2025_06_27_132913_add_user_id_shift', 1),
(17, '2025_06_27_143104_create_stockins_table', 1),
(18, '2025_06_27_150033_update_type_amount_string_stockin', 1),
(19, '2025_06_29_082606_add_quantity_menus', 1),
(20, '2025_06_29_111446_create_breaktimes_table', 1),
(21, '2025_07_11_075104_add_user_id_order', 1),
(22, '2025_07_13_194611_add_user_outcomes', 1),
(23, '2025_07_13_195054_recreate_outcomes', 1),
(24, '2025_07_14_030105_add_pembeli_outcomes_stocks', 1),
(25, '2025_07_14_030306_add_pembeli_stockins', 1),
(26, '2025_07_15_064647_create_permission_tables', 1),
(27, '2025_07_15_074244_add_kode_orders_id_barang_stockins_kategori_menu', 1),
(28, '2025_07_15_074910_update_type_amount_stock', 1),
(29, '2025_07_15_075635_rename_barang_id_to_stock_id_in_stockins_table', 1),
(31, '2025_09_24_044350_create_shiftnight_tables', 2),
(32, '2025_09_28_055944_add_temp_price_orders', 3),
(34, '2025_09_28_152320_add_description_orders', 4),
(35, '2025_09_28_161052_add_user_id_outcomes', 5),
(36, '2025_09_28_161651_add_day_stocks', 6),
(39, '2025_09_30_153738_create_historystocks_table', 7),
(40, '2025_10_02_153922_edit_karyawan_nullable_outcome', 8);

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
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `item` longtext NOT NULL,
  `no_table` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `temp_price` decimal(8,2) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `item`, `no_table`, `status`, `created_at`, `updated_at`, `user_id`, `kode`, `temp_price`, `description`) VALUES
(1, 124000.00, '[{\"name\":\"ikan bakar daun\",\"qty\":1,\"checked\":true},{\"name\":\"ayam\",\"qty\":1,\"checked\":true},{\"name\":\"Air Hangat\",\"qty\":2,\"checked\":true}]', 'A1', 'done', '2026-02-04 15:52:26', '2026-02-04 15:52:56', 1, '410568', 124000.00, 'pedas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outcomes`
--

CREATE TABLE `outcomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outcomes`
--

INSERT INTO `outcomes` (`id`, `deskripsi`, `jumlah`, `harga`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'gas', '5 Tabung', '100000', '2026-02-04 15:02:29', '2026-02-04 15:02:29', 1),
(2, 'Minyak Goreng', '2 Kg', '28000', '2026-02-04 15:12:26', '2026-02-04 15:12:26', 1),
(3, 'Tisu', '2 Box', '280000', '2026-02-04 15:15:24', '2026-02-04 15:15:24', 1),
(4, 'Ayam', '8 Kg', '240000', '2026-02-04 15:24:38', '2026-02-04 15:24:38', 1),
(5, 'iksn Nila', '20 Ekor', '400000', '2026-02-04 15:25:16', '2026-02-04 15:25:16', 1);

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(2, 'view_any_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(3, 'create_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(4, 'update_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(5, 'delete_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(6, 'delete_any_role', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(7, 'view_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(8, 'view_any_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(9, 'create_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(10, 'update_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(11, 'restore_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(12, 'restore_any_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(13, 'replicate_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(14, 'reorder_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(15, 'delete_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(16, 'delete_any_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(17, 'force_delete_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(18, 'force_delete_any_breaktime', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(19, 'view_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(20, 'view_any_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(21, 'create_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(22, 'update_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(23, 'restore_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(24, 'restore_any_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(25, 'replicate_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(26, 'reorder_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(27, 'delete_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(28, 'delete_any_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(29, 'force_delete_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(30, 'force_delete_any_income', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(31, 'view_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(32, 'view_any_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(33, 'create_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(34, 'update_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(35, 'restore_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(36, 'restore_any_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(37, 'replicate_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(38, 'reorder_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(39, 'delete_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(40, 'delete_any_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(41, 'force_delete_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(42, 'force_delete_any_income::order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(43, 'view_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(44, 'view_any_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(45, 'create_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(46, 'update_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(47, 'restore_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(48, 'restore_any_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(49, 'replicate_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(50, 'reorder_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(51, 'delete_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(52, 'delete_any_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(53, 'force_delete_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(54, 'force_delete_any_menu', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(55, 'view_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(56, 'view_any_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(57, 'create_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(58, 'update_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(59, 'restore_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(60, 'restore_any_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(61, 'replicate_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(62, 'reorder_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(63, 'delete_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(64, 'delete_any_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(65, 'force_delete_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(66, 'force_delete_any_order', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(67, 'view_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(68, 'view_any_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(69, 'create_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(70, 'update_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(71, 'restore_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(72, 'restore_any_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(73, 'replicate_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(74, 'reorder_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(75, 'delete_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(76, 'delete_any_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(77, 'force_delete_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(78, 'force_delete_any_outcome', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(79, 'view_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(80, 'view_any_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(81, 'create_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(82, 'update_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(83, 'restore_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(84, 'restore_any_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(85, 'replicate_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(86, 'reorder_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(87, 'delete_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(88, 'delete_any_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(89, 'force_delete_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(90, 'force_delete_any_shift', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(91, 'view_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(92, 'view_any_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(93, 'create_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(94, 'update_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(95, 'restore_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(96, 'restore_any_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(97, 'replicate_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(98, 'reorder_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(99, 'delete_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(100, 'delete_any_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(101, 'force_delete_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(102, 'force_delete_any_shiftnight', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(103, 'view_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(104, 'view_any_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(105, 'create_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(106, 'update_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(107, 'restore_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(108, 'restore_any_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(109, 'replicate_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(110, 'reorder_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(111, 'delete_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(112, 'delete_any_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(113, 'force_delete_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(114, 'force_delete_any_stock', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(115, 'view_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(116, 'view_any_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(117, 'create_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(118, 'update_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(119, 'restore_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(120, 'restore_any_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(121, 'replicate_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(122, 'reorder_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(123, 'delete_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(124, 'delete_any_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(125, 'force_delete_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(126, 'force_delete_any_stockin', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(127, 'view_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(128, 'view_any_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(129, 'create_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(130, 'update_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(131, 'restore_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(132, 'restore_any_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(133, 'replicate_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(134, 'reorder_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(135, 'delete_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(136, 'delete_any_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(137, 'force_delete_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(138, 'force_delete_any_user', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(139, 'page_InfoDashboardPage', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(140, 'page_InfoTables', 'web', '2025-09-23 21:56:24', '2025-09-23 21:56:24'),
(141, 'view_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(142, 'view_any_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(143, 'create_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(144, 'update_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(145, 'restore_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(146, 'restore_any_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(147, 'replicate_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(148, 'reorder_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(149, 'delete_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(150, 'delete_any_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(151, 'force_delete_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10'),
(152, 'force_delete_any_karyawan', 'web', '2025-09-24 07:56:10', '2025-09-24 07:56:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'super_admin', 'web', '2025-09-23 21:47:07', '2025-09-23 21:47:07'),
(2, 'Karyawan', 'web', '2025-09-24 07:52:01', '2025-09-24 07:52:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(69, 2),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(76, 1),
(76, 2),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(80, 2),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
(84, 1),
(84, 2),
(85, 1),
(85, 2),
(86, 1),
(86, 2),
(87, 1),
(87, 2),
(88, 1),
(88, 2),
(89, 1),
(89, 2),
(90, 1),
(90, 2),
(91, 1),
(91, 2),
(92, 1),
(92, 2),
(93, 1),
(93, 2),
(94, 1),
(94, 2),
(95, 1),
(95, 2),
(96, 1),
(96, 2),
(97, 1),
(97, 2),
(98, 1),
(98, 2),
(99, 1),
(99, 2),
(100, 1),
(100, 2),
(101, 1),
(101, 2),
(102, 1),
(102, 2),
(103, 1),
(103, 2),
(104, 1),
(104, 2),
(105, 1),
(106, 1),
(106, 2),
(107, 1),
(107, 2),
(108, 1),
(108, 2),
(109, 1),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(112, 1),
(112, 2),
(113, 1),
(113, 2),
(114, 1),
(114, 2),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(139, 2),
(140, 1),
(140, 2),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shiftnights`
--

CREATE TABLE `shiftnights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` datetime NOT NULL,
  `stiwed` varchar(255) DEFAULT NULL,
  `tray` varchar(255) DEFAULT NULL,
  `tong_sampah` varchar(255) DEFAULT NULL,
  `inventaris` varchar(255) DEFAULT NULL,
  `kain_lap_waiters` varchar(255) DEFAULT NULL,
  `mushola` varchar(255) DEFAULT NULL,
  `clear_up_pondok` varchar(255) DEFAULT NULL,
  `lap_piring_dapur` varchar(255) DEFAULT NULL,
  `tas` varchar(255) DEFAULT NULL,
  `mematikan_lampu` varchar(255) DEFAULT NULL,
  `pondok_a` varchar(255) DEFAULT NULL,
  `pondok_b` varchar(255) DEFAULT NULL,
  `pondok_c` varchar(255) DEFAULT NULL,
  `pondok_d` varchar(255) DEFAULT NULL,
  `bar` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `pulang_sore` varchar(255) DEFAULT NULL,
  `break_1` varchar(255) DEFAULT NULL,
  `break_2` varchar(255) DEFAULT NULL,
  `break_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shiftnights`
--

INSERT INTO `shiftnights` (`id`, `day`, `stiwed`, `tray`, `tong_sampah`, `inventaris`, `kain_lap_waiters`, `mushola`, `clear_up_pondok`, `lap_piring_dapur`, `tas`, `mematikan_lampu`, `pondok_a`, `pondok_b`, `pondok_c`, `pondok_d`, `bar`, `off`, `pulang_sore`, `break_1`, `break_2`, `break_3`, `created_at`, `updated_at`, `shift`, `user_id`) VALUES
(2, '2025-09-01 00:00:00', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'saldi', 'saldi', 'saldi', 'saldi', '2025-09-28 06:50:33', '2025-10-05 18:46:04', NULL, 1),
(3, '2025-09-02 00:00:00', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', '2025-09-28 06:52:27', '2025-10-05 18:16:08', NULL, 1),
(4, '2025-09-03 00:00:00', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', '2025-09-28 10:54:06', '2025-10-05 18:23:35', NULL, 1),
(11, '2025-10-02 00:00:00', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', '2025-09-28 06:52:27', '2025-10-05 18:24:29', NULL, 1),
(12, '2025-10-03 00:00:00', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', '2025-09-28 10:54:06', '2025-10-05 18:42:14', NULL, 1),
(14, '2025-10-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-24 19:49:28', '2025-10-24 19:49:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` datetime NOT NULL,
  `stiwed` varchar(255) DEFAULT NULL,
  `tray` varchar(255) DEFAULT NULL,
  `tong_sampah` varchar(255) DEFAULT NULL,
  `inventaris` varchar(255) DEFAULT NULL,
  `kain_lap_waiters` varchar(255) DEFAULT NULL,
  `mushola` varchar(255) DEFAULT NULL,
  `clear_up_pondok` varchar(255) DEFAULT NULL,
  `lap_piring_dapur` varchar(255) DEFAULT NULL,
  `tas` varchar(255) DEFAULT NULL,
  `mematikan_lampu` varchar(255) DEFAULT NULL,
  `pondok_a` varchar(255) DEFAULT NULL,
  `pondok_b` varchar(255) DEFAULT NULL,
  `pondok_c` varchar(255) DEFAULT NULL,
  `pondok_d` varchar(255) DEFAULT NULL,
  `bar` varchar(255) DEFAULT NULL,
  `off` varchar(255) DEFAULT NULL,
  `pulang_sore` varchar(255) DEFAULT NULL,
  `break_1` varchar(255) DEFAULT NULL,
  `break_2` varchar(255) DEFAULT NULL,
  `break_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `shifts`
--

INSERT INTO `shifts` (`id`, `day`, `stiwed`, `tray`, `tong_sampah`, `inventaris`, `kain_lap_waiters`, `mushola`, `clear_up_pondok`, `lap_piring_dapur`, `tas`, `mematikan_lampu`, `pondok_a`, `pondok_b`, `pondok_c`, `pondok_d`, `bar`, `off`, `pulang_sore`, `break_1`, `break_2`, `break_3`, `created_at`, `updated_at`, `shift`, `user_id`) VALUES
(2, '2025-09-01 00:00:00', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'saldi', 'saldi', 'saldi', 'saldi', '2025-09-28 06:50:33', '2025-10-05 18:46:04', NULL, NULL),
(3, '2025-09-02 00:00:00', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', '2025-09-28 06:52:27', '2025-10-05 18:16:08', NULL, NULL),
(4, '2025-09-03 00:00:00', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', '2025-09-28 10:54:06', '2025-10-05 18:23:35', NULL, NULL),
(10, '2025-10-01 00:00:00', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'Saldi', 'saldi', 'saldi', 'saldi', 'saldi', 'saldi', '2025-09-28 06:50:33', '2025-10-05 18:23:59', NULL, NULL),
(11, '2025-10-02 00:00:00', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', 'karyawan1', '2025-09-28 06:52:27', '2025-10-05 18:24:29', NULL, NULL),
(12, '2025-10-03 00:00:00', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', 'karyawan2', '2025-09-28 10:54:06', '2025-10-05 18:42:14', NULL, NULL),
(17, '2025-10-25 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-24 19:48:39', '2025-10-24 19:48:39', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `description`, `amount`, `created_at`, `updated_at`, `unit_id`, `user_id`, `day`) VALUES
(1, 'Ikan Kakap', 'null', '20', '2025-09-28 06:07:38', '2025-10-24 19:33:56', NULL, 1, '2025-10-06 00:00:00'),
(2, 'Ikan Gurame', 'null', '19', '2025-09-28 09:23:56', '2025-10-06 03:14:10', NULL, NULL, '2025-10-06 00:00:00'),
(4, 'Ikan Kerapu', 'null', '30', '2025-09-28 09:29:11', '2025-10-06 03:14:20', NULL, NULL, '2025-09-28 00:00:00'),
(5, 'Ayam Beras', 'null', '86 ', '2025-10-02 08:08:23', '2025-10-06 03:12:14', NULL, NULL, '2025-10-02 00:00:00'),
(6, 'Ikan Nila', 'null', '10', '2025-10-06 03:09:58', '2025-10-06 03:14:29', NULL, NULL, '2025-10-06 00:00:00'),
(7, 'Ayam Kampung', 'null', '100', '2025-10-06 03:12:33', '2025-10-06 03:12:33', NULL, NULL, '2025-10-06 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$12$4ukeyndKRAWZ69k3B/mXAeVfYIV4.lHo5ehlnIsbsI7SRvND95O5q', NULL, '2025-10-07 08:06:49', '2026-02-04 14:43:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `historystocks`
--
ALTER TABLE `historystocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historystocks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `outcomes`
--
ALTER TABLE `outcomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outcomes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indeks untuk tabel `shiftnights`
--
ALTER TABLE `shiftnights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_unit_id_foreign` (`unit_id`),
  ADD KEY `stocks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `historystocks`
--
ALTER TABLE `historystocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `outcomes`
--
ALTER TABLE `outcomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `shiftnights`
--
ALTER TABLE `shiftnights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `historystocks`
--
ALTER TABLE `historystocks`
  ADD CONSTRAINT `historystocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `outcomes`
--
ALTER TABLE `outcomes`
  ADD CONSTRAINT `outcomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
