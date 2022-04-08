-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2021 pada 10.26
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
-- Database: `suket2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajuans`
--

CREATE TABLE `ajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penindak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nosurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perlengkapan Administrasi',
  `kades` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` int(11) NOT NULL DEFAULT '0',
  `pesan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
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
  `nomor` int(11) NOT NULL DEFAULT '0',
  `perbedaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nomor` int(11) NOT NULL DEFAULT '0',
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
(1, 'Ade Rustiana', '1349810350', 'Bandung, 4 Mei 1970', 'Islam', 'Laki-laki', 'Kp. Kopeng RT 01/01', 'Kepala Desa', '2015-2020', 'ttd1.png', 'default.jpeg', 1, '2021-11-04 02:05:00', '2021-11-04 02:05:00'),
(2, 'Turnawan', '1349810351', 'Garut, 4 April 1953', 'Islam', 'Laki-laki', 'Kp. Kopeng RT 02/02', 'Kepala Desa', '2010-2015', NULL, 'default.jpeg', 0, '2021-11-04 02:05:00', '2021-11-04 02:05:00');

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
(1, 'Mohon SKCK ke Polres Garut', '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(2, 'Perlengkapan Administrasi', '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(3, 'Pengajuan Keringanan Biaya Listrik (Listrik Bersubsidi)', '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(4, 'Laporan Kematian', '2021-11-04 02:04:59', '2021-11-04 02:04:59');

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
(12, '2021_09_02_091356_create_sktms_table', 1),
(13, '2021_09_02_091739_create_skcks_table', 1),
(14, '2021_09_02_091835_create_sds_table', 1),
(15, '2021_09_20_011600_create_desas_table', 1),
(16, '2021_09_21_033249_create_sktbs_table', 1),
(17, '2021_09_23_004158_create_belum_menikahs_table', 1),
(18, '2021_09_23_004609_create_mohon_ktps_table', 1),
(19, '2021_09_23_004627_create_beda_namas_table', 1),
(20, '2021_10_08_015941_create_rws_table', 1),
(21, '2021_10_08_023718_create_rts_table', 1);

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
(5, 'App\\User', 4),
(5, 'App\\User', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mohon_ktps`
--

CREATE TABLE `mohon_ktps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
  `jenis_permohonan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'setingumum', 'web', '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(2, 'lengkap', 'web', '2021-11-04 02:04:59', '2021-11-04 02:04:59');

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
(1, 'Data yang anda masukan belum benar', '2021-11-04 02:05:00', '2021-11-04 02:05:00'),
(2, 'Data pengajuan yang anda masukan tidak tepat', '2021-11-04 02:05:00', '2021-11-04 02:05:00'),
(3, 'Data yang anda masukan tidak sesuai standar aturan desa', '2021-11-04 02:05:00', '2021-11-04 02:05:00');

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
(1, 'superadmin', 'web', '2021-11-04 02:04:56', '2021-11-04 02:04:56'),
(2, 'admin', 'web', '2021-11-04 02:04:56', '2021-11-04 02:04:56'),
(3, 'rw', 'web', '2021-11-04 02:04:57', '2021-11-04 02:04:57'),
(4, 'rt', 'web', '2021-11-04 02:04:57', '2021-11-04 02:04:57'),
(5, 'user', 'web', '2021-11-04 02:04:57', '2021-11-04 02:04:57');

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
-- Struktur dari tabel `rts`
--

CREATE TABLE `rts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rw_id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rts`
--

INSERT INTO `rts` (`id`, `rw_id`, `no`, `ketua`, `created_at`, `updated_at`) VALUES
(1, 1, '01', NULL, '2021-11-04 02:04:57', '2021-11-04 02:04:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rws`
--

CREATE TABLE `rws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketua` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rws`
--

INSERT INTO `rws` (`id`, `no`, `ketua`, `created_at`, `updated_at`) VALUES
(1, '01', NULL, '2021-11-04 02:04:57', '2021-11-04 02:04:57');

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
-- Struktur dari tabel `skcks`
--

CREATE TABLE `skcks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT '0',
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
  `nomor` int(11) NOT NULL DEFAULT '0',
  `properti` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nomor` int(11) NOT NULL DEFAULT '0',
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rt_id` bigint(20) UNSIGNED DEFAULT '0',
  `rw_id` bigint(20) UNSIGNED DEFAULT '0',
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL DEFAULT '1',
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

INSERT INTO `users` (`id`, `rt_id`, `rw_id`, `nama`, `nik`, `no_kk`, `ttl`, `agama`, `jk`, `status`, `nama_ibu`, `nama_ayah`, `pendidikan`, `pekerjaan`, `alamat`, `kewarganegaraan`, `password`, `status_verifikasi`, `telp`, `penghasilan`, `pasfoto`, `fotoktp`, `fotokk`, `status_lengkap`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Super Admin', 'superadmin', 'superadmin', 'Bandung, 8 September 1999', 'Islam', 'Laki-laki', 'Belum Menikah', 'Pipin', 'Bambang', 'S1/Sederajat', 'Programmer', 'Garut', 'Indonesia', '$2y$10$TbUhYlybnWZV0H5MWYRG4.SpwWSsKUiGb.GvSXfYyKPHjVuyNrQce', 1, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-11-04 02:04:58', '2021-11-04 02:04:58'),
(2, 1, 1, 'Petugas Desa 1', 'admin1', 'admin1', 'Bandung, 8 September 1998', 'Islam', 'Laki-laki', 'Belum Menikah', 'Nina', 'Dadang', 'SMA/Sederajat', 'Pegawai Desa', 'Garut', 'Indonesia', '$2y$10$8jXm8CqLbTElo5gGVthFt.MtiLjIGOg0yaNj1Jme4yW/yWR.Zw9gC', 1, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-11-04 02:04:58', '2021-11-04 02:04:58'),
(3, 1, 1, 'Petugas Desa 2', 'admin2', 'admin2', 'Bandung, 8 September 1997', 'Islam', 'Perempuan', 'Menikah', 'Sarimin', 'Ujang', 'S1/Sederajat', 'Pegawai Desa', 'Garut', 'Indonesia', '$2y$10$RHmDuymhFuL/LC81x6jPjuea31NCm6TazlDukQf.2/AvXQhcYacDe', 1, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(4, 1, 1, 'Penduduk A', '1234567890123456', '1234567890123456', 'Bandung, 8 September 1996', 'Islam', 'Laki-laki', 'Menikah', 'Sarimin', 'Ujang', 'S1/Sederajat', 'Wirausaha', 'Garut', 'Indonesia', '$2y$10$YcpbALVbBurNXUrNMMvhLuKoiNah2Vqml6RZm/WUS0gNScX476lQG', 1, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-11-04 02:04:59', '2021-11-04 02:04:59'),
(5, 1, 1, 'Penduduk B', '1187050034', '1187050034', 'Bandung, 8 September 1997', 'Islam', 'Perempuan', 'Belum Menikah', 'Sarimin', 'Ujang', 'S1/Sederajat', 'Mahasiswa', 'Garut', 'Indonesia', '$2y$10$iOOZ21qUm4vfREc5fTsbOukG3cslvyMYs0hyYqOWZGwH7cDKEtwkq', 1, NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, '2021-11-04 02:04:59', '2021-11-04 02:04:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ajuans`
--
ALTER TABLE `ajuans`
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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kades`
--
ALTER TABLE `kades`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keperluans`
--
ALTER TABLE `keperluans`
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
-- Indeks untuk tabel `mohon_ktps`
--
ALTER TABLE `mohon_ktps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indeks untuk tabel `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rts_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sds`
--
ALTER TABLE `sds`
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ajuans`
--
ALTER TABLE `ajuans`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kades`
--
ALTER TABLE `kades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keperluans`
--
ALTER TABLE `keperluans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `mohon_ktps`
--
ALTER TABLE `mohon_ktps`
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
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rts`
--
ALTER TABLE `rts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rws`
--
ALTER TABLE `rws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sds`
--
ALTER TABLE `sds`
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

--
-- Ketidakleluasaan untuk tabel `rts`
--
ALTER TABLE `rts`
  ADD CONSTRAINT `rts_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
