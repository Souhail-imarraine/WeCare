-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2025 at 01:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

CREATE TABLE `appointment_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','cancelled','confirmed','completed') NOT NULL DEFAULT 'pending',
  `reason` text DEFAULT NULL,
  `consult_duration` int(11) NOT NULL DEFAULT 30,
  `date_appointment` date NOT NULL,
  `time_appointment` time NOT NULL,
  `appointment_type` enum('Person_Visit','Online_Consultation') NOT NULL DEFAULT 'Person_Visit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_requests`
--

INSERT INTO `appointment_requests` (`id`, `patient_id`, `doctor_id`, `status`, `reason`, `consult_duration`, `date_appointment`, `time_appointment`, `appointment_type`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 'completed', NULL, 30, '2025-05-08', '15:30:00', 'Person_Visit', '2025-05-04 21:01:41', '2025-05-04 22:21:15'),
(4, 2, 1, 'confirmed', NULL, 30, '2025-05-05', '09:00:00', 'Person_Visit', '2025-05-04 22:22:40', '2025-05-04 22:27:40'),
(6, 8, 1, 'completed', NULL, 30, '2025-05-05', '09:30:00', 'Person_Visit', '2025-05-05 09:16:39', '2025-05-05 17:30:12'),
(7, 10, 1, 'completed', NULL, 30, '2025-05-07', '09:00:00', 'Person_Visit', '2025-05-06 06:56:14', '2025-05-06 07:01:00'),
(8, 2, 1, 'pending', NULL, 30, '2025-05-22', '09:00:00', 'Person_Visit', '2025-05-10 11:21:53', '2025-05-10 11:21:53'),
(9, 12, 1, 'pending', NULL, 30, '2025-09-24', '09:00:00', 'Person_Visit', '2025-09-18 20:09:10', '2025-09-18 20:09:10'),
(10, 12, 1, 'pending', NULL, 30, '2025-09-22', '09:00:00', 'Person_Visit', '2025-09-18 20:10:26', '2025-09-18 20:10:26'),
(11, 16, 8, 'pending', NULL, 30, '2025-09-23', '10:00:00', 'Person_Visit', '2025-09-21 12:10:04', '2025-09-21 12:10:04'),
(12, 16, 8, 'confirmed', NULL, 30, '2025-09-25', '16:00:00', 'Person_Visit', '2025-09-21 12:10:34', '2025-09-21 12:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `consultation_price` decimal(10,2) NOT NULL,
  `years_experience` int(11) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `bio` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `specialty`, `consultation_price`, `years_experience`, `license_number`, `city`, `phone_number`, `status`, `bio`, `profile_image`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cardiology', 500.00, 10, 'SHTY6766', 'Tanger', '0620424911', 'approved', 'one of the best doctors', 'doctor_profile/1746468557.jpg', 'https://www.facebook.com/souhail202/', 'https://www.Instagram.com/souhail202/', 'https://www.LinkedIn.com/souhail202/', '2025-05-04 20:25:22', '2025-05-06 07:01:59'),
(2, 5, 'Pediatrics', 515.00, 16, 'TFRGHHKS8', 'Marrakech', '065547558', 'approved', NULL, NULL, NULL, NULL, NULL, '2025-05-04 22:42:40', '2025-05-10 11:39:53'),
(4, 7, 'Pediatrics', 1000.00, 10, '485HHHSB', 'Tanger', '0650447789', 'pending', NULL, NULL, NULL, NULL, NULL, '2025-05-04 22:44:39', '2025-05-05 17:27:08'),
(5, 9, 'Neurology', 528.00, 15, '484FRGHHH', 'Marrakech', '03665458', 'approved', NULL, NULL, NULL, NULL, NULL, '2025-05-05 18:13:25', '2025-05-06 07:04:06'),
(6, 11, 'Dermatology', 500.00, 10, 'TR666U', 'Marrakech', NULL, 'approved', NULL, NULL, NULL, NULL, NULL, '2025-05-13 14:12:46', '2025-05-13 14:14:48'),
(7, 13, 'Dermatology', 500.00, 10, 'TTY44550', 'MARRAKECH', NULL, 'approved', NULL, NULL, NULL, NULL, NULL, '2025-09-21 11:50:38', '2025-09-21 11:59:22'),
(8, 15, 'Dermatology', 400.00, 10, 'MD668888', 'Marrakech', NULL, 'approved', NULL, NULL, NULL, NULL, NULL, '2025-09-21 12:06:55', '2025-09-21 12:08:05'),
(9, 17, 'Dermatology', 846.00, 10, '847', 'Corrupti doloremque', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, '2025-10-25 10:41:39', '2025-10-25 10:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_04_20_000001_create_users_table', 1),
(4, '2024_04_20_000002_create_doctors_table', 1),
(5, '2024_04_20_000003_create_sessions_table', 1),
(6, '2024_04_20_000004_create_appointment_requests_table', 1),
(7, '2025_04_17_000003_create_patients_table', 1),
(8, '2025_05_05_001807_add_completed_to_column_appointement_request', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-','other','unknown') DEFAULT NULL,
  `status` enum('active','desactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `phone_number`, `gender`, `height`, `weight`, `birthday`, `blood_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '0650221134', 'female', 178, 70, '2002-05-04', 'AB-', 'active', '2025-05-04 20:26:17', '2025-05-04 22:41:36'),
(2, 8, '+1 (713) 967-5152', 'male', NULL, NULL, NULL, 'unknown', 'active', '2025-05-05 09:14:54', '2025-05-05 09:14:54'),
(3, 10, '0620145522', 'male', 170, 70, '2025-05-02', 'B+', 'active', '2025-05-06 06:54:40', '2025-05-06 06:59:10'),
(4, 12, '0620424918', 'female', 158, 36, NULL, 'O+', 'active', '2025-09-18 20:08:44', '2025-09-18 20:08:44'),
(5, 16, '0655448855', 'male', 172, 74, '2000-01-12', 'B-', 'active', '2025-09-21 12:09:21', '2025-09-21 12:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('l8mf7EAozQCS1FV7rrMpcSpRG7MlBFspB4t1P8cm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0tLd09udTJkNWRhMTY1SmVmaWJHNmxOUkdidmFPbmNnc0phNEtlUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1758464521),
('x6LOrvIbhDQPav7bXnPvX0RXYM8QHmmAVoUwihY9', 17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib1UyMFJIRENRc2ZQNEdyVmd5cUpSNmVFR2dnMk9LTXJrUE12VVZoTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE3O30=', 1761392500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('patient','doctor','admin') NOT NULL DEFAULT 'patient',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amine', 'imarrainee', 'souhailimarrainedevo@gmail.com', '$2y$12$E9Dbs5dldDEd.DywGiKwMOSIEYTAT2e2kx9LH7cxrUoU426AHI9bq', 'doctor', NULL, NULL, '2025-05-04 20:25:22', '2025-05-06 07:01:59'),
(2, 'mohamed', 'yasser', 'patient@gmail.com', '$2y$12$QVJuLpNkS/sd0NHVVXoOCuUOnQMQbtQZbMHeURxWpQyxemTJ76ct.', 'patient', NULL, NULL, '2025-05-04 20:26:17', '2025-09-21 12:07:54'),
(3, 'John', 'Doe', 'admin@gmail.com', '$2y$12$E9Dbs5dldDEd.DywGiKwMOSIEYTAT2e2kx9LH7cxrUoU426AHI9bq', 'admin', NULL, NULL, NULL, NULL),
(5, 'Graiden', 'Kline', 'qyhetop@mailinator.com', '$2y$12$sQ6rwou.3bk5RTxQ2dP82epDNt0sCQCSYKe/TGxBZYpM0sTWh1Tfq', 'doctor', NULL, NULL, '2025-05-04 22:42:40', '2025-05-04 22:42:40'),
(7, 'Kristen', 'Carney', 'fafuja@mailinator.com', '$2y$12$1OZ4ajj53.Eva.Kgt73ai.hAsY2NIcAnhbtdFSRPDN7oY03OsSasW', 'doctor', NULL, NULL, '2025-05-04 22:44:39', '2025-05-04 22:44:39'),
(8, 'Buckminster', 'Lloyd', 'fikyqu@mailinator.com', '$2y$12$8IdvAMKSq3UhlVdv3RR/oOmgrhKK/PlTuhKIfyK87QAT1lGOz/MaC', 'patient', NULL, NULL, '2025-05-05 09:14:54', '2025-05-05 09:14:54'),
(9, 'Erin', 'souhail', 'konyxov@mailinator.com', '$2y$12$k8n/2g4.FkslrgouCtEcj.UK7rfXffKTvPm4DFhLuustr5KbiPZL6', 'doctor', NULL, NULL, '2025-05-05 18:13:25', '2025-05-06 05:27:04'),
(10, 'souhail', 'imarraine', 'necof@mailinator.com', '$2y$12$QD5eKk7k8NmvY0bSjjMBluBxnNIukMdawU4wxwwAYfBH3zU7GXYiG', 'patient', NULL, NULL, '2025-05-06 06:54:40', '2025-05-06 06:59:10'),
(11, 'souhail', 'imarraine', 'souhail123@gmail.com', '$2y$12$tmwSSgQOVRp1ZrA3H1Jn0O3cczhs1mF7NhHp43.QVHCz3SWb1tpw.', 'doctor', NULL, NULL, '2025-05-13 14:12:46', '2025-05-13 14:12:46'),
(12, 'Tara', 'Perez', 'pycila@mailinator.com', '$2y$12$TtyP12Inh9s2y1mTEhcFL.FtVtFd5OsSePqUj5la/jA0LMRVMQB9C', 'patient', NULL, NULL, '2025-09-18 20:08:44', '2025-09-18 20:08:44'),
(13, 'Kyla', 'Cote', 'doctor@gmail.com', '$2y$12$YTVcfBZEbBWyF8RfZNu4A.ydMx4KIvQozG3OHeTQEHfCiKVFKa8jW', 'doctor', NULL, NULL, '2025-09-21 11:50:38', '2025-09-21 11:50:38'),
(14, 'Super', 'Admin', 'admin@wecare.test', '$2y$12$/YWRb8elBPiGCf8WgExTvedKRMxLAVPbmlnlPlYZJrxOO3ntRHoS6', 'admin', NULL, NULL, '2025-09-21 11:57:31', '2025-09-21 11:57:31'),
(15, 'hshsh', 'hshshsh', 'souhail44@gmail.com', '$2y$12$i0DNTIWXdNBQmwEU9fYJkeFDGhZzdp3K4YrFXtZf2.05vAd3fxQ4O', 'doctor', NULL, NULL, '2025-09-21 12:06:55', '2025-09-21 12:06:55'),
(16, 'souhail', 'souhail', 'ahmed123@gmail.com', '$2y$12$SKlHLiPUDZpYvqJBdjm8v.N65fxBMpA8zqLYrJeRmWGqq2OEG4OXu', 'patient', NULL, NULL, '2025-09-21 12:09:21', '2025-09-21 12:11:13'),
(17, 'Yoshi', 'Mullins', 'jegoqixohu@mailinator.com', '$2y$12$htIn/P4.7K2i2lz./OiMmOK1e1uxS51Lh.olow1E5RXWvxAApTKIm', 'doctor', NULL, NULL, '2025-10-25 10:41:39', '2025-10-25 10:41:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_requests_patient_id_foreign` (`patient_id`),
  ADD KEY `appointment_requests_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_license_number_unique` (`license_number`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD CONSTRAINT `appointment_requests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_requests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
