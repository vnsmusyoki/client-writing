-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 02:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignments`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_jobs`
--

CREATE TABLE `active_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penalties_awarded` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_format` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `active_jobs`
--

INSERT INTO `active_jobs` (`id`, `order_id`, `client_id`, `client_email`, `writer_id`, `writer_email`, `task_category`, `bid_amount`, `task_amount`, `task_status`, `client_remarks`, `payment_status`, `penalties_awarded`, `solution_format`, `submission_date`, `final_document`, `created_at`, `updated_at`) VALUES
(1, '18829652', '76865', 'bestwriter@gmail.com', '12633806', 'endlesscript@gmail.com', 'Accounting', '50', '90', 'rejected', 'it is presented in the wrong solution format asked. and please can you do some more research on the same because its not working for me. i paid alot and thats not what i expected', 'pending', 'pending', '', '01/01/1970, 02:00:00', 'ann-p-2_1613732628.PNG', '2021-02-18 15:42:00', '2021-02-21 03:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `order_id`, `client_id`, `client_email`, `writer_id`, `writer_email`, `task_category`, `bid_amount`, `created_at`, `updated_at`) VALUES
(9, '18829652', '76865', 'client@gmail.com', '05858829', 'bestwriter@gmail.com', 'Accounting', '900', '2021-02-21 06:32:21', '2021-02-21 06:32:21');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `task_id`, `sender`, `receiver`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '18829652', 'superadministrator@app.com', 'client@gmail.com', 'your task is almost ready complete your payment', 'new', '2021-02-19 23:02:02', '2021-02-20 08:56:13'),
(2, '18829652', 'client@gmail.com', 'support staff', 'yes i have sen my work', 'new', '2021-02-19 23:26:46', '2021-02-19 23:26:46'),
(3, '18829652', 'client@gmail.com', 'support staff', 'yes', 'new', '2021-02-19 23:26:57', '2021-02-19 23:26:57'),
(4, '60397416', 'support staff', 'client@gmail.com', 'I HAVE SEEN YOUR BID BUT PLEASE THAT PRICE IS SO LOW', 'new', '2021-02-19 23:48:36', '2021-02-20 08:56:13'),
(5, '60397416', 'support staff', 'client@gmail.com', 'erlcvome i hav eseen your order', 'new', '2021-02-20 00:03:27', '2021-02-20 08:56:13'),
(6, '60397416', 'client@gmail.com', 'support staff', 'can you help me then?', '', '2021-02-20 00:05:23', '2021-02-20 00:05:23'),
(7, '18829652', 'superadministrator@app.com', 'client@gmail.com', 'message sent', '', '2021-02-20 00:23:18', '2021-02-20 08:56:13'),
(8, '18829652', 'superadministrator@app.com', 'client@gmail.com', 'message is seen now', '', '2021-02-20 00:23:50', '2021-02-20 08:56:13'),
(9, '18829652', 'support staff', 'client@gmail.com', 'yes', '', '2021-02-20 00:25:14', '2021-02-20 08:56:13'),
(10, 'General Quiz', 'bestwriter@gmail.com', 'support staff', 'cheking this', '', '2021-02-21 02:18:55', '2021-02-21 03:43:09'),
(11, 'General Quiz', 'bestwriter@gmail.com', 'support staff', 'waiting for your response', '', '2021-02-21 02:27:03', '2021-02-21 03:43:09');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_02_07_031323_laratrust_setup_tables', 1),
(9, '2021_02_13_155518_create_orders_table', 2),
(10, '2021_02_16_062440_create_notifications_table', 3),
(11, '2021_02_17_172018_create_bids_table', 4),
(12, '2021_02_18_094712_create_active_jobs_table', 5),
(16, '2021_02_19_090037_create_time_extensions_table', 6),
(17, '2021_02_19_222107_create_messages_table', 7),
(20, '2021_02_20_104035_create_revision_tasks_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender`, `receiver`, `task_id`, `topic`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Congratulations', 'Your bid was Successfull for Order Id Number18829652', 'confirmed', '2021-02-19 03:57:17', '2021-02-19 04:17:31'),
(2, 'superadministrator@app.com', 'bestwriter@gmail.com', '18829652', 'Revision Needed', 'it is presented in the wrong solution format asked. and please can you do some more research on the same because its not working for me. i paid alot and thats not what i expected', 'confirmed', '2021-02-19 10:13:08', '2021-02-21 03:43:09'),
(3, 'superadministrator@app.com', 'client@gmail.com', '18829652', 'Congratulations', 'Your bid was Successfull for Order Id Number18829652', 'new', '2021-02-19 11:53:45', '2021-02-20 08:56:13'),
(4, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Revision Needed', 'it is presented in the wrong solution format asked. and please can you do some more research on the same because its not working for me. i paid alot and thats not what i expected', 'new', '2021-02-19 14:24:22', '2021-02-19 14:24:22'),
(5, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes youn will be added', 'new', '2021-02-19 17:08:24', '2021-02-19 17:08:24'),
(6, 'client@gmail.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes i accept', 'new', '2021-02-19 17:12:50', '2021-02-20 08:56:13'),
(7, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes i accept', 'new', '2021-02-19 17:13:58', '2021-02-19 17:13:58'),
(8, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes', 'new', '2021-02-19 17:18:46', '2021-02-19 17:18:46'),
(9, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes', 'new', '2021-02-19 17:20:17', '2021-02-19 17:20:17'),
(10, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes', 'new', '2021-02-19 17:32:32', '2021-02-19 17:32:32'),
(11, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes', 'new', '2021-02-19 17:33:23', '2021-02-19 17:33:23'),
(12, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '18829652', 'Time Extension Request Accepted', 'yes', 'new', '2021-02-19 17:33:48', '2021-02-19 17:33:48'),
(13, 'superadministrator@app.com', 'vnsmusyoki@gmail.com', '60397416', 'Congratulations', 'Your bid was Successfull for Order Id Number60397416', 'new', '2021-02-20 00:32:56', '2021-02-20 00:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submission_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_email`, `client_id`, `task_id`, `category`, `deadline`, `topic`, `solution_format`, `picture`, `education_level`, `amount`, `language`, `description`, `status`, `created_at`, `updated_at`, `submission_date`) VALUES
(3, 'client@gmail.com', '76865', '18829652', 'Accounting', '2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'Answers Only(Multiple choice questions and Online Tasks)', 'bid-2_1613452544.PNG', 'Masters', '90', 'Spanish', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'active', '2021-02-16 02:15:44', '2021-02-20 08:56:13', '01/01/1970, 02:00:00'),
(4, 'client@gmail.com', '876548', '60397416', 'Accounting', '2', 'this is the topic', 'Handwritten fully worked out step by step solutions(Maths Mostly)', 'ann-1_1613788999.png', 'University', '900', 'Spanish', 'lorem ipusm Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'rejected', '2021-02-19 23:43:20', '2021-02-20 08:56:13', '2021-02-20 04:43:35');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2021-02-07 00:24:25', '2021-02-07 00:24:25'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2021-02-07 00:24:25', '2021-02-07 00:24:25'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2021-02-07 00:24:26', '2021-02-07 00:24:26'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2021-02-07 00:24:26', '2021-02-07 00:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revision_tasks`
--

CREATE TABLE `revision_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penalties_awarded` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revision_tasks`
--

INSERT INTO `revision_tasks` (`id`, `order_id`, `client_id`, `client_email`, `writer_id`, `writer_email`, `task_category`, `bid_amount`, `task_amount`, `task_status`, `client_remarks`, `solution_format`, `payment_status`, `penalties_awarded`, `submission_date`, `final_document`, `created_at`, `updated_at`) VALUES
(1, '60397416', '876548', 'client@gmail.com', '12633806', 'bestwriter@gmail.com', 'Accounting', '600', '600', 'rejected', 'i am not pleased', 'Handwritten fully worked out step by step solutions(Maths Mostly)', NULL, NULL, '2021-02-20 16:05:41', NULL, '2021-02-20 08:05:41', '2021-02-21 03:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2021-02-07 00:24:22', '2021-02-07 00:24:22'),
(2, 'administrator', 'Administrator', 'Administrator', '2021-02-07 00:24:24', '2021-02-07 00:24:24'),
(3, 'user', 'User', 'User', '2021-02-07 00:24:25', '2021-02-07 00:24:25'),
(4, 'role_name', 'Role Name', 'Role Name', '2021-02-07 00:24:25', '2021-02-07 00:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`, `team_id`) VALUES
(1, 1, 'App\\Models\\User', NULL),
(2, 2, 'App\\Models\\User', NULL),
(3, 3, 'App\\Models\\User', NULL),
(4, 4, 'App\\Models\\User', NULL),
(2, 16, 'App\\Models\\User', NULL),
(2, 17, 'App\\Models\\User', NULL),
(2, 18, 'App\\Models\\User', NULL),
(2, 19, 'App\\Models\\User', NULL),
(2, 20, 'App\\Models\\User', NULL),
(2, 21, 'App\\Models\\User', NULL),
(2, 22, 'App\\Models\\User', NULL),
(3, 23, 'App\\Models\\User', NULL),
(3, 24, 'App\\Models\\User', NULL),
(3, 26, 'App\\Models\\User', NULL),
(3, 27, 'App\\Models\\User', NULL),
(3, 28, 'App\\Models\\User', NULL),
(3, 29, 'App\\Models\\User', NULL),
(3, 30, 'App\\Models\\User', NULL),
(3, 31, 'App\\Models\\User', NULL),
(3, 32, 'App\\Models\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_extensions`
--

CREATE TABLE `time_extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_requested` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_assigned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_extensions`
--

INSERT INTO `time_extensions` (`id`, `task_id`, `client_id`, `client_email`, `writer_id`, `writer_email`, `current_deadline`, `client_amount`, `writer_amount`, `time_requested`, `date_assigned`, `new_deadline`, `client_comment`, `admin_comment`, `status`, `created_at`, `updated_at`) VALUES
(1, '18829652', '76865', 'administrator@app.com', '12633806', 'vnsmusyoki@gmail.com', '01/01/1970, 02:00:00', '90', '50', '2', '2021-02-18 18:42:00', NULL, 'yes', NULL, 'waiting', '2021-02-19 06:35:08', '2021-02-19 17:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `user_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userid`, `status`, `user_category`, `picture`, `phone_number`, `email_verified_at`, `verification_code`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadministrator', 'superadministrator@app.com', '', 'ACTIVE', '', NULL, '0', NULL, '', '$2y$10$.P4674Fh0ehRFGThE84tmeWpSawkySji8JzpHDd5VH1QrgrJvTHrm', NULL, '2021-02-07 00:24:23', '2021-02-07 00:24:23'),
(2, 'Administrator', 'client@gmail.com', '876548', 'ACTIVE', 'client', 'image-1_1613465508.jpg', '25489790887', NULL, '', '$2y$10$FwEnKYJvdz0BfCk0K1hvVu1lWNL.tu09Z3wgoRoLanEDrN4x9Jwmy', NULL, '2021-02-07 00:24:25', '2021-02-20 08:56:13'),
(3, 'User', 'user@app.com', '', 'ACTIVE', '', NULL, '0', NULL, '', '$2y$10$NDnOmEzqtlTvApZqqA6WFOpiOO8xvKtU0hxELBWIpW9u0ICINSutm', NULL, '2021-02-07 00:24:25', '2021-02-07 00:24:25'),
(4, 'Role Name', 'role_name@app.com', '', 'ACTIVE', '', NULL, '0', NULL, '', '$2y$10$yAdmOxzE5VZeDfIjQLK7CeAyKYQvFxBlk7Cy2nRBpM.wP91CVbZeq', NULL, '2021-02-07 00:24:26', '2021-02-07 00:24:26'),
(26, 'kimeu musyoki', 'vnsmusyoki@gmail.com', '12633806', 'ACTIVE', 'writer', NULL, '0721876543', '2021-02-17 15:20:29', 'd9d6adad7c0578022d469b94497a56e9ec6c15b7', '$2y$10$2MNT2eagLSJww2FVNtuqo.EhvOCLP6jRogzwtvk68uQgLbiWEchwW', NULL, '2021-02-17 14:52:46', '2021-02-17 15:20:29'),
(28, 'eojedoi', 'developerprogrammerenos@gmail.com', '53575166', 'ACTIVE', 'writer', NULL, '0712897654', NULL, '79165762deb594ce15f3d84a7faddd389506ace5', '$2y$10$.X4psZ1D9c/dNRYQnc7PWOaXauOA9KvI8nRAotB8nu/UXU07Fn3H.', NULL, '2021-02-19 05:07:25', '2021-02-19 05:07:25'),
(29, 'ikjhnb nkju', 'selphinemuchenya@gmail.com', '27031020', 'ACTIVE', 'writer', NULL, '0765432178', NULL, 'a44c80be5b6dde7f6d23c47f8133fbc8384354f9', '$2y$10$1eeQaJC82pQD6tMKrzmTEuVTxOn7m4TWmIQLXOEGOqhxHXm4LpufC', NULL, '2021-02-19 05:09:41', '2021-02-19 05:09:41'),
(32, 'endless', 'bestwriter@gmail.com', '05858829', 'ACTIVE', 'writer', 'bid-4_1613888963.PNG', '0721897650', '2021-02-19 11:45:43', 'a66206f428a149f8a17ce938479ea944449a7598', '$2y$10$8TG2n21M9umQjZZfPuY.Pes4hp79uyuCAS6AAsS8NZevPioypePC6', 'MOjw6wTNBL64nfVtq1gP4nu1Jdq03khQFmJlKWP7hrF5bISpeExYjvmPk6Hd', '2021-02-19 11:39:32', '2021-02-21 03:45:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_jobs`
--
ALTER TABLE `active_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD UNIQUE KEY `permission_user_user_id_permission_id_user_type_team_id_unique` (`user_id`,`permission_id`,`user_type`,`team_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `revision_tasks`
--
ALTER TABLE `revision_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD UNIQUE KEY `role_user_user_id_role_id_user_type_team_id_unique` (`user_id`,`role_id`,`user_type`,`team_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`);

--
-- Indexes for table `time_extensions`
--
ALTER TABLE `time_extensions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `active_jobs`
--
ALTER TABLE `active_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `revision_tasks`
--
ALTER TABLE `revision_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_extensions`
--
ALTER TABLE `time_extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
