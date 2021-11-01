-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2021 pada 04.20
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suketp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahli_waris`
--

CREATE TABLE `ahli_waris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `hubungan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pewaris` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kejadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuans`
--

CREATE TABLE `ajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `batal_menganuts`
--

CREATE TABLE `batal_menganuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `organisasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_baru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar_perubahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_perubahan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beda_namas`
--

CREATE TABLE `beda_namas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `perbedaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_salah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tertulis_salah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_benar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tertulis_benar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `belum_menikahs`
--

CREATE TABLE `belum_menikahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desas`
--

CREATE TABLE `desas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_desa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*atur nama Desa',
  `alamat_kantor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*atur alamat kantor Desa',
  `logo_desa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cibatu',
  `kabupaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Garut',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diluar_kotas`
--

CREATE TABLE `diluar_kotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `domisilis`
--

CREATE TABLE `domisilis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_keramaians`
--

CREATE TABLE `izin_keramaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_ortus`
--

CREATE TABLE `izin_ortus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `hubungan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `janda_dudas`
--

CREATE TABLE `janda_dudas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `janda_duda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepemilikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kades`
--

CREATE TABLE `kades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttdcap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokades` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpeg',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kades`
--

INSERT INTO `kades` (`id`, `nama`, `nik`, `ttl`, `agama`, `jk`, `alamat`, `jabatan`, `periode`, `ttdcap`, `fotokades`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ade Rustiana', '1349810350', 'Bandung, 4 Mei 1970', 'Islam', 'Laki-laki', 'Kp. Kopeng RT 01/01', 'Kepala Desa', '2015-2020', 'ttd1.png', 'kades.jpg', 1, '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(2, 'Turnawan', '1349810351', 'Garut, 4 April 1953', 'Islam', 'Laki-laki', 'Kp. Kopeng RT 02/02', 'Kepala Desa', '2010-2015', NULL, 'kades.jpg', 0, '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(3, 'Asep Sumirat', '1349810352', 'Tasik, 4 Agustus 1945', 'Islam', 'Laki-laki', 'Kp. Kopeng RT 03/03', 'Kepala Desa', '2005-2010', NULL, 'kades.jpg', 0, '2021-09-20 20:17:09', '2021-09-20 20:17:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebakarans`
--

CREATE TABLE `kebakarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehilangans`
--

CREATE TABLE `kehilangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahirans`
--

CREATE TABLE `kelahirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pukul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keperluans`
--

CREATE TABLE `keperluans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keperluan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keperluans`
--

INSERT INTO `keperluans` (`id`, `keperluan`, `created_at`, `updated_at`) VALUES
(1, 'Mohon SKCK ke Polres Garut', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(2, 'Perlengkapan Administrasi', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(3, 'Pengajuan Keringanan Biaya Listrik (Listrik Bersubsidi)', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(4, 'Laporan Kematian', '2021-09-20 20:17:09', '2021-09-20 20:17:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktp_expires`
--

CREATE TABLE `ktp_expires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `noblanko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuasas`
--

CREATE TABLE `kuasas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_24_030822_create_skus_table', 1),
(5, '2020_11_24_030838_create_sks_table', 1),
(6, '2020_11_26_005609_create_permission_tables', 1),
(7, '2020_12_03_042609_create_ajuans_table', 1),
(8, '2020_12_10_074426_create_surats_table', 1),
(9, '2020_12_16_042707_create_keperluans_table', 1),
(10, '2020_12_29_023456_create_kades_table', 1),
(11, '2021_02_15_081034_create_pesan_penolakans_table', 1),
(12, '2021_04_06_021116_create_kehilangans_table', 1),
(13, '2021_04_08_004927_create_ktp_expires_table', 1),
(14, '2021_04_08_013432_create_penghasilans_table', 1),
(15, '2021_04_08_040556_create_skcks_table', 1),
(16, '2021_04_08_041115_create_sktbs_table', 1),
(17, '2021_04_13_025515_create_sktms_table', 1),
(18, '2021_04_17_003715_create_serbagunas_table', 1),
(19, '2021_04_17_013308_create_kebakarans_table', 1),
(20, '2021_04_20_041857_create_belum_menikahs_table', 1),
(21, '2021_04_23_050210_create_janda_dudas_table', 1),
(22, '2021_04_24_001242_create_diluar_kotas_table', 1),
(23, '2021_04_24_003936_create_kuasas_table', 1),
(24, '2021_04_24_012641_create_izin_ortus_table', 1),
(25, '2021_04_24_014842_create_tidak_kerjas_table', 1),
(26, '2021_04_24_021929_create_ahli_waris_table', 1),
(27, '2021_04_24_041707_create_beda_namas_table', 1),
(28, '2021_04_24_045649_create_izin_keramaians_table', 1),
(29, '2021_04_24_050503_create_domisilis_table', 1),
(30, '2021_04_24_085916_create_penganuts_table', 1),
(31, '2021_04_24_085946_create_batal_menganuts_table', 1),
(32, '2021_05_14_020832_create_puskesos_table', 1),
(33, '2021_06_28_033534_create_kelahirans_table', 1),
(34, '2021_09_02_091835_create_sds_table', 1),
(35, '2021_09_21_022204_create_desas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penganuts`
--

CREATE TABLE `penganuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `organisasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saksi_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_sebelumnya` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar_perubahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_perubahan` date NOT NULL,
  `saksi_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghasilans`
--

CREATE TABLE `penghasilans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `besar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'setingumum', 'web', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(2, 'lengkap', 'web', '2021-09-20 20:17:09', '2021-09-20 20:17:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_penolakans`
--

CREATE TABLE `pesan_penolakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan_penolakans`
--

INSERT INTO `pesan_penolakans` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Data yang anda masukan belum benar', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(2, 'Data pengajuan yang anda masukan tidak tepat', '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(3, 'Data yang anda masukan tidak sesuai standar aturan desa', '2021-09-20 20:17:09', '2021-09-20 20:17:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesos`
--

CREATE TABLE `puskesos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2021-09-20 20:17:08', '2021-09-20 20:17:08'),
(2, 'admin', 'web', '2021-09-20 20:17:08', '2021-09-20 20:17:08'),
(3, 'user', 'web', '2021-09-20 20:17:08', '2021-09-20 20:17:08');

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
(1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sds`
--

CREATE TABLE `sds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `serbagunas`
--

CREATE TABLE `serbagunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skcks`
--

CREATE TABLE `skcks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `klarifikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sks`
--

CREATE TABLE `sks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `hubungan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_alm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_alm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_alm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_alm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pukul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktbs`
--

CREATE TABLE `sktbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `keperluan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pemilik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memiliki` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_persegi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_terbilang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga_tanah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_bangunan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terbilang_bangunan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utara` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_akta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_personil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kohir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_shm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_nib` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_surat_ukur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktms`
--

CREATE TABLE `sktms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skus`
--

CREATE TABLE `skus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `nama_usaha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_usaha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surats`
--

CREATE TABLE `surats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidak_kerjas`
--

CREATE TABLE `tidak_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `alasan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_rw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pasfoto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoktp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotokk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_lengkap` tinyint(1) NOT NULL DEFAULT '0',
  `status_user` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `ttl`, `agama`, `jk`, `status`, `pekerjaan`, `rt_rw`, `alamat`, `kewarganegaraan`, `password`, `status_verifikasi`, `telp`, `penghasilan`, `pasfoto`, `fotoktp`, `fotokk`, `status_lengkap`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'Bandung, 8 September 1999', 'Islam', 'Laki-laki', 'Belum Menikah', 'Programmer', '11/15', 'Garut', 'Indonesia', '$2y$10$7M7m8GMiBj90p7J251l8teSKZdFXSOKZVsZUdq66Ynzn.AEwmKUnu', 0, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-09-20 20:17:08', '2021-09-20 20:17:08'),
(2, 'Petugas Desa 1', 'admin1', 'Bandung, 8 September 1998', 'Islam', 'Laki-laki', 'Belum Menikah', 'Pegawai Desa', '11/15', 'Garut', 'Indonesia', '$2y$10$qMVyT1iYUtqf4DlzuT3zEOtj2FkhtQFbHWFQwBKdGuIJ5BfARZCeC', 0, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-09-20 20:17:08', '2021-09-20 20:17:08'),
(3, 'Petugas Desa 2', 'admin2', 'Bandung, 8 September 1997', 'Islam', 'Perempuan', 'Menikah', 'Pegawai Desa', '11/15', 'Garut', 'Indonesia', '$2y$10$Zmfc8LVsh/ik05UUrY7PHuxBpsez2.3i/ZYN6cR195Mka.viJb3qC', 0, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(4, 'Penduduk A', '1187050033', 'Bandung, 8 September 1996', 'Islam', 'Laki-laki', 'Menikah', 'Wirausaha', '11/15', 'Garut', 'Indonesia', '$2y$10$9hLk4LC4BAsVg2TAhLeSNujfe1YzLusDQ15IjYlQgfC938LaZxAxy', 0, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-09-20 20:17:09', '2021-09-20 20:17:09'),
(5, 'Penduduk B', '1187050034', 'Bandung, 8 September 1997', 'Islam', 'Perempuan', 'Belum Menikah', 'Mahasiswa', '11/15', 'Garut', 'Indonesia', '$2y$10$mYke.BB.O.8y9/ecQONLMem.TF2bWUTrcaDvuohZcI.z66b7cLchm', 0, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-09-20 20:17:09', '2021-09-20 20:17:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahli_waris`
--
ALTER TABLE `ahli_waris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ajuans`
--
ALTER TABLE `ajuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `batal_menganuts`
--
ALTER TABLE `batal_menganuts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beda_namas`
--
ALTER TABLE `beda_namas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `belum_menikahs`
--
ALTER TABLE `belum_menikahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diluar_kotas`
--
ALTER TABLE `diluar_kotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `domisilis`
--
ALTER TABLE `domisilis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `izin_keramaians`
--
ALTER TABLE `izin_keramaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `izin_ortus`
--
ALTER TABLE `izin_ortus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `janda_dudas`
--
ALTER TABLE `janda_dudas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kades`
--
ALTER TABLE `kades`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebakarans`
--
ALTER TABLE `kebakarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kehilangans`
--
ALTER TABLE `kehilangans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelahirans`
--
ALTER TABLE `kelahirans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keperluans`
--
ALTER TABLE `keperluans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ktp_expires`
--
ALTER TABLE `ktp_expires`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuasas`
--
ALTER TABLE `kuasas`
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
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penganuts`
--
ALTER TABLE `penganuts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penghasilans`
--
ALTER TABLE `penghasilans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_penolakans`
--
ALTER TABLE `pesan_penolakans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `puskesos`
--
ALTER TABLE `puskesos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sds`
--
ALTER TABLE `sds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `serbagunas`
--
ALTER TABLE `serbagunas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skcks`
--
ALTER TABLE `skcks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sks`
--
ALTER TABLE `sks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sktbs`
--
ALTER TABLE `sktbs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sktms`
--
ALTER TABLE `sktms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tidak_kerjas`
--
ALTER TABLE `tidak_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ahli_waris`
--
ALTER TABLE `ahli_waris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ajuans`
--
ALTER TABLE `ajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `batal_menganuts`
--
ALTER TABLE `batal_menganuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `beda_namas`
--
ALTER TABLE `beda_namas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `belum_menikahs`
--
ALTER TABLE `belum_menikahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desas`
--
ALTER TABLE `desas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diluar_kotas`
--
ALTER TABLE `diluar_kotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `domisilis`
--
ALTER TABLE `domisilis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `izin_keramaians`
--
ALTER TABLE `izin_keramaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `izin_ortus`
--
ALTER TABLE `izin_ortus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `janda_dudas`
--
ALTER TABLE `janda_dudas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kades`
--
ALTER TABLE `kades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kebakarans`
--
ALTER TABLE `kebakarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kehilangans`
--
ALTER TABLE `kehilangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelahirans`
--
ALTER TABLE `kelahirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keperluans`
--
ALTER TABLE `keperluans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ktp_expires`
--
ALTER TABLE `ktp_expires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuasas`
--
ALTER TABLE `kuasas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `penganuts`
--
ALTER TABLE `penganuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penghasilans`
--
ALTER TABLE `penghasilans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesan_penolakans`
--
ALTER TABLE `pesan_penolakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `puskesos`
--
ALTER TABLE `puskesos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sds`
--
ALTER TABLE `sds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `serbagunas`
--
ALTER TABLE `serbagunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skcks`
--
ALTER TABLE `skcks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sks`
--
ALTER TABLE `sks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sktbs`
--
ALTER TABLE `sktbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sktms`
--
ALTER TABLE `sktms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skus`
--
ALTER TABLE `skus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tidak_kerjas`
--
ALTER TABLE `tidak_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
