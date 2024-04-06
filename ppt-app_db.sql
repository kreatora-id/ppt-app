-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Apr 2024 pada 12.41
-- Versi server: 8.0.36-0ubuntu0.22.04.1
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppt-app_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(2, NULL, 1, 'Category 2', 'category-2', '2024-03-30 15:51:50', '2024-03-30 15:51:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int UNSIGNED NOT NULL,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 8, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 8, 'description', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{}', 4),
(59, 8, 'faq', 'rich_text_box', 'Faq', 0, 0, 1, 1, 1, 1, '{}', 5),
(60, 8, 'slug', 'text', 'Slug', 1, 0, 1, 0, 0, 0, '{}', 6),
(61, 8, 'embed', 'text_area', 'Embed', 0, 0, 1, 1, 1, 1, '{\"description\":\"Embed dari google drive untuk viewer\"}', 7),
(62, 8, 'regular_price', 'number', 'Regular Price', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"description\":\"Harga reguler sebelum didiskon\"}', 8),
(63, 8, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"description\":\"Harga setelah diskon\"}', 9),
(64, 8, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 11),
(65, 8, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 13),
(66, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 1, 0, 0, 0, '{}', 14),
(67, 8, 'tags', 'select_multiple', 'Tags', 0, 1, 1, 1, 1, 1, '{\"default\":\"\",\"options\":{\"Abstract\":\"Abstract\",\"Business\":\"Business\",\"Computers\":\"Computers\",\"Education\":\"Education\",\"Medical\":\"Medical\",\"Nature\":\"Nature\",\"Finance\":\"Finance\",\"Food\":\"Food\",\"Real Estate\":\"Real Estate\",\"Religion\":\"Religion\",\"Industry\":\"Industry\",\"Sports\":\"Sports\",\"Recreation\":\"Recreation\",\"Military\":\"Military\",\"Travel\":\"Travel\",\"Diagrams\":\"Diagrams\",\"Cycle\":\"Cycle\",\"Relationship\":\"Relationship\",\"Agenda-Org\":\"Agenda-Org\",\"Flow-Pro\":\"Flow-Pro\",\"Stair-Step\":\"Stair-Step\",\"Timeline\":\"Timeline\",\"Charts\":\"Charts\"}}', 10),
(68, 8, 'type', 'select_dropdown', 'Type', 1, 1, 1, 1, 1, 1, '{\"default\":\"Free\",\"options\":{\"Free\":\"Free\",\"Premium\":\"Premium\"}}', 3),
(69, 8, 'file', 'file', 'File', 0, 0, 1, 1, 1, 1, '{}', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_types`
--

CREATE TABLE `data_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(8, 'products', 'products', 'Product', 'Products', 'voyager-file-text', 'App\\Models\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2024-03-30 16:25:37', '2024-04-05 15:25:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-03-30 15:51:49', '2024-03-30 15:51:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2024-03-30 15:51:49', '2024-03-30 15:51:49', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2024-03-30 15:51:49', '2024-03-30 15:51:49', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2024-03-30 15:51:50', '2024-03-30 15:51:50', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2024-03-30 15:51:50', '2024-03-30 15:51:50', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2024-03-30 15:51:50', '2024-03-30 15:51:50', 'voyager.pages.index', NULL),
(14, 1, 'Products', '', '_self', 'voyager-file-text', NULL, NULL, 15, '2024-03-30 16:25:37', '2024-03-30 16:25:37', 'voyager.products.index', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2016_01_01_000000_add_voyager_user_fields', 2),
(6, '2016_01_01_000000_create_data_types_table', 2),
(7, '2016_05_19_173453_create_menu_table', 2),
(8, '2016_10_21_190000_create_roles_table', 2),
(9, '2016_10_21_190000_create_settings_table', 2),
(10, '2016_11_30_135954_create_permission_table', 2),
(11, '2016_11_30_141208_create_permission_role_table', 2),
(12, '2016_12_26_201236_data_types__add__server_side', 2),
(13, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(14, '2017_01_14_005015_create_translations_table', 2),
(15, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(16, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(17, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(18, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(19, '2017_08_05_000000_add_group_to_settings_table', 2),
(20, '2017_11_26_013050_add_user_role_relationship', 2),
(21, '2017_11_26_015000_create_user_roles_table', 2),
(22, '2018_03_11_000000_add_user_settings', 2),
(23, '2018_03_14_000000_add_details_to_data_types_table', 2),
(24, '2018_03_16_000000_make_settings_value_nullable', 2),
(25, '2016_01_01_000000_create_pages_table', 3),
(26, '2016_01_01_000000_create_posts_table', 3),
(27, '2016_02_15_204651_create_categories_table', 3),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 3),
(35, '2024_03_30_231147_create_products_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2024-03-30 15:51:50', '2024-03-30 15:51:50');

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(2, 'browse_bread', NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(3, 'browse_database', NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(4, 'browse_media', NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(5, 'browse_compass', NULL, '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(6, 'browse_menus', 'menus', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(7, 'read_menus', 'menus', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(8, 'edit_menus', 'menus', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(9, 'add_menus', 'menus', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(10, 'delete_menus', 'menus', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(11, 'browse_roles', 'roles', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(12, 'read_roles', 'roles', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(13, 'edit_roles', 'roles', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(14, 'add_roles', 'roles', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(15, 'delete_roles', 'roles', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(16, 'browse_users', 'users', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(17, 'read_users', 'users', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(18, 'edit_users', 'users', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(19, 'add_users', 'users', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(20, 'delete_users', 'users', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(21, 'browse_settings', 'settings', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(22, 'read_settings', 'settings', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(23, 'edit_settings', 'settings', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(24, 'add_settings', 'settings', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(25, 'delete_settings', 'settings', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(26, 'browse_categories', 'categories', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(27, 'read_categories', 'categories', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(28, 'edit_categories', 'categories', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(29, 'add_categories', 'categories', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(30, 'delete_categories', 'categories', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(31, 'browse_posts', 'posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(32, 'read_posts', 'posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(33, 'edit_posts', 'posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(34, 'add_posts', 'posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(35, 'delete_posts', 'posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(36, 'browse_pages', 'pages', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(37, 'read_pages', 'pages', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(38, 'edit_pages', 'pages', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(39, 'add_pages', 'pages', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(40, 'delete_pages', 'pages', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(41, 'browse_products', 'products', '2024-03-30 16:25:37', '2024-03-30 16:25:37'),
(42, 'read_products', 'products', '2024-03-30 16:25:37', '2024-03-30 16:25:37'),
(43, 'edit_products', 'products', '2024-03-30 16:25:37', '2024-03-30 16:25:37'),
(44, 'add_products', 'products', '2024-03-30 16:25:37', '2024-03-30 16:25:37'),
(45, 'delete_products', 'products', '2024-03-30 16:25:37', '2024-03-30 16:25:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
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
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2024-03-30 15:51:50', '2024-03-30 15:51:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Free','Premium') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free',
  `description` text COLLATE utf8mb4_unicode_ci,
  `faq` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `regular_price` double(8,2) NOT NULL DEFAULT '0.00',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `file` json DEFAULT NULL,
  `images` json DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `description`, `faq`, `slug`, `embed`, `regular_price`, `price`, `file`, `images`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'PPT nomor 1', 'Premium', '<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Proin elementum, lectus non consequat accumsan, nisl velit ultricies nibh, sed dictum velit risus quis nisl. Curabitur vitae urna id quam porttitor finibus id quis mi. Donec tristique eleifend neque a tempus. In vel mauris et felis sodales interdum. Mauris mattis tortor non ex luctus rhoncus. Duis sed nunc non tortor aliquet pellentesque. Sed consectetur fringilla iaculis. Duis faucibus pellentesque bibendum. Nulla justo diam, interdum sed egestas ac, consectetur id ligula. In sed diam purus.</p>\r\n<p>Nunc dictum lobortis tellus, eget fringilla neque tincidunt quis. Suspendisse potenti. Aenean id dolor id felis tincidunt interdum ut non dui. Vestibulum scelerisque turpis sit amet urna vulputate eleifend. Proin eu blandit diam, ut aliquam lectus. Duis euismod vehicula sagittis. Vivamus ut risus in sem aliquet venenatis. Cras non dolor ut dolor pretium dignissim vel ac augue. Quisque sit amet lobortis elit. Donec tristique tellus eu massa euismod placerat. Morbi non ligula elit. Nulla vitae congue sem. Donec finibus porttitor faucibus.</p>', '<p><strong>Apa itu template?</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin elementum, lectus non consequat accumsan, nisl velit ultricies nibh, sed dictum velit risus quis nisl. Curabitur vitae urna id quam porttitor finibus id quis mi. Donec tristique eleifend neque a tempus. In vel mauris et felis sodales interdum. Mauris mattis tortor non ex luctus rhoncus. Duis sed nunc non tortor aliquet pellentesque. Sed consectetur fringilla iaculis. Duis faucibus pellentesque bibendum. Nulla justo diam, interdum sed egestas ac, consectetur id ligula. In sed diam purus.</p>\r\n<p><strong>Bolehkah saya mendownloadnya?</strong></p>\r\n<p>Nunc dictum lobortis tellus, eget fringilla neque tincidunt quis. Suspendisse potenti. Aenean id dolor id felis tincidunt interdum ut non dui. Vestibulum scelerisque turpis sit amet urna vulputate eleifend. Proin eu blandit diam, ut aliquam lectus. Duis euismod vehicula sagittis. Vivamus ut risus in sem aliquet venenatis. Cras non dolor ut dolor pretium dignissim vel ac augue. Quisque sit amet lobortis elit. Donec tristique tellus eu massa euismod placerat. Morbi non ligula elit. Nulla vitae congue sem. Donec finibus porttitor faucibus.</p>', 'ppt_nomor_1_761906', '<iframe src=\"https://docs.google.com/presentation/d/e/2PACX-1vRZwuM_YSIqSf7k7Hy-zbzJiHZHK8beeo1CfnnAtOIqJVRLrl-H63cnyapG2Ad5Iw/embed?start=false&loop=false&delayms=3000\" frameborder=\"0\" width=\"640\" height=\"389\" allowfullscreen=\"true\" mozallowfullscreen=\"true\" webkitallowfullscreen=\"true\"></iframe>', 25000.00, 12000.00, '[{\"download_link\": \"products/April2024/fkfFsJqqgo0gRNy6hS2C.pptx\", \"original_name\": \"User Guide.pptx\"}]', '[\"products/April2024/CS26PqqYhfYB8VAAlrho.png\", \"products/April2024/ZsmwXwRvWsl15qmeEtK5.png\", \"products/April2024/britrlzJjpBwcdSlhrvm.png\", \"products/April2024/yo6eXOLWKKEnMmYZu3DF.png\"]', '[\"Business\", \"Education\", \"Nature\", \"Military\", \"Stair-Step\"]', '2024-04-03 16:06:23', '2024-04-05 22:41:01'),
(2, 'PPT Nomor 2', 'Free', NULL, NULL, 'ppt_nomor_2_914874', NULL, 0.00, 0.00, '[{\"download_link\": \"products/April2024/jHFAs8iGei6Eusd9k8Dc.pptx\", \"original_name\": \"User Guide.pptx\"}]', '[\"products/April2024/KkdoIQ5MVzbRVrqZlO7x.jpg\"]', '[]', '2024-04-04 06:59:38', '2024-04-04 07:36:51'),
(3, 'PPT Nomor 3', 'Free', NULL, NULL, 'ppt_nomor_3_781877', NULL, 0.00, 0.00, '[]', '[\"products/April2024/JtQoJa5mJZMcEO2oQdS8.jpg\"]', '[]', '2024-04-04 07:17:41', '2024-04-04 07:34:54'),
(4, 'PPT Nomor 4', 'Free', NULL, NULL, 'ppt_nomor_4_802141', NULL, 0.00, 0.00, '[{\"download_link\": \"products/April2024/RKSrdvM4An3kSSxzrjJZ.pptx\", \"original_name\": \"Black Coffee Beans PowerPoint Templates.pptx\"}]', '[\"products/April2024/dRtkRajHCnsmYrFwbS6T.png\"]', '[]', '2024-04-04 07:37:24', '2024-04-04 08:43:39'),
(5, 'PPT Nomor 5', 'Premium', NULL, NULL, 'ppt_nomor_5_207754', NULL, 0.00, 0.00, '[]', NULL, '[\"Military\", \"Agenda-Org\"]', '2024-04-04 08:46:31', '2024-04-04 09:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2024-03-30 15:51:49', '2024-03-30 15:51:49'),
(2, 'user', 'Normal User', '2024-03-30 15:51:49', '2024-03-30 15:51:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2024-03-30 15:51:50', '2024-03-30 15:51:50'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2024-03-30 15:51:50', '2024-03-30 15:51:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$wLtuyYCpzgXzLYd5HhRoZuOk0dZppeAIQsB/m0WFHK9IoqWW7dUca', 'fzda8FHIbAwURo1O0cAYa9wB3EReIw985zlSiQEtQNNVkdcoKf5HRNYgkHLH', NULL, '2024-03-30 15:51:50', '2024-03-30 15:51:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indeks untuk tabel `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indeks untuk tabel `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
