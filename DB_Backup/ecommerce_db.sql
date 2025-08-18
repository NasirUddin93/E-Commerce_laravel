-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2025 at 03:41 AM
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'tempora Category', 'tempora-category', 'Et architecto quis unde laboriosam quia culpa repudiandae aspernatur perferendis pariatur nulla.', 1, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(2, 'voluptatem Category', 'voluptatem-category', 'Saepe aut id possimus exercitationem eos excepturi deserunt consequatur odio ducimus.', 1, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(3, 'accusantium Category', 'accusantium-category', 'Rem et aperiam fugit debitis possimus impedit aut eos voluptatum et molestiae quas.', 1, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(4, 'quam Category', 'quam-category', 'Sit sunt possimus est possimus minus est soluta in quae cumque omnis sapiente incidunt.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(5, 'rerum Category', 'rerum-category', 'Consectetur voluptatem omnis numquam natus aspernatur placeat deleniti minima qui.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(6, 'dolore Category', 'dolore-category', 'Ut molestias dolor qui sunt quaerat occaecati aut aut alias.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(7, 'numquam Category', 'numquam-category', 'Dolorem corrupti voluptatem dolores quod quaerat rerum dolorem doloremque nulla totam.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(8, 'qui Category', 'qui-category', 'Cumque aut exercitationem voluptatem ut dolorem sed.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(9, 'eveniet Category', 'eveniet-category', 'Magnam et blanditiis autem veniam qui sapiente officia sint earum sed non amet et.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10'),
(10, 'explicabo Category', 'explicabo-category', 'Vero architecto dolorem voluptates culpa cupiditate provident sunt quae.', 0, '2025-08-17 08:02:10', '2025-08-17 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_16_141721_create_products_table', 1),
(6, '2025_08_17_091655_add_role_users_table', 1),
(7, '2025_08_17_130832_create_orders_table', 1),
(8, '2025_08_17_132704_add_more_columns_to_orders_table', 1),
(9, '2025_08_17_135024_add_is_featured_to_products_table', 1),
(10, '2025_08_17_140129_create_categories_table', 2),
(11, '2025_08_17_141816_create_collections_table', 3),
(12, '2025_08_17_141816_create_reviews_table', 3),
(13, '2025_08_17_144348_create_cart_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'USD',
  `payment_method` varchar(255) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_cost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery_images`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `rating` double(2,1) NOT NULL DEFAULT 0.0,
  `reviews_count` int(11) NOT NULL DEFAULT 0,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `shipping_info` varchar(255) DEFAULT NULL,
  `return_policy` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `description`, `category`, `price`, `stock`, `brand`, `main_image`, `gallery_images`, `status`, `is_featured`, `discount_price`, `rating`, `reviews_count`, `color`, `size`, `material`, `weight`, `dimensions`, `tags`, `warranty`, `shipping_info`, `return_policy`, `video_url`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 'SKU001', 'Demo Product 1', 'Aut odio praesentium nemo sapiente dicta error impedit sed nobis sunt.', 'Wearables', 460.66, 38, 'Frami and Sons', 'products/main_1.png', '[\"products\\/gallery\\/product_1_1.png\",\"products\\/gallery\\/product_1_2.png\"]', 1, 1, NULL, 0.0, 0, 'silver', 'Large', 'Rubber', 0.58, '10x10x2 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(2, 'SKU002', 'Demo Product 2', 'Labore illo eveniet illum minima velit in dolores et doloribus culpa architecto.', 'Headphones', 455.44, 59, 'Lind LLC', 'products/main_2.png', '[\"products\\/gallery\\/product_2_1.png\",\"products\\/gallery\\/product_2_2.png\"]', 1, 1, NULL, 0.0, 0, 'yellow', 'Small', 'Aluminum', 1.13, '15x7x0.8 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(3, 'SKU003', 'Demo Product 3', 'Enim ipsum unde earum asperiores numquam commodi odio id at natus.', 'Headphones', 559.84, 73, 'Botsford, Haag and Powlowski', 'products/main_3.png', '[\"products\\/gallery\\/product_3_1.png\",\"products\\/gallery\\/product_3_2.png\"]', 1, 1, NULL, 0.0, 0, 'blue', 'Large', 'Rubber', 1.26, '10x10x2 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(4, 'SKU004', 'Demo Product 4', 'Tempore ut rerum esse aliquam harum explicabo alias.', 'Smartphones', 247.69, 74, 'McCullough, Fisher and Boyer', 'products/main_4.png', '[\"products\\/gallery\\/product_4_1.png\",\"products\\/gallery\\/product_4_2.png\"]', 1, 0, NULL, 0.0, 0, 'green', 'Medium', 'Aluminum', 0.47, '15x7x0.8 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(5, 'SKU005', 'Demo Product 5', 'Ab labore repellat et aut odio exercitationem voluptatem.', 'Headphones', 230.58, 48, 'Carroll-Schmitt', 'products/main_5.png', '[\"products\\/gallery\\/product_5_1.png\",\"products\\/gallery\\/product_5_2.png\"]', 1, 0, NULL, 0.0, 0, 'white', 'Large', 'Aluminum', 1.19, '20x18x5 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(6, 'SKU006', 'Demo Product 6', 'Repudiandae ex consequatur aut aut voluptatem voluptates at sed.', 'Headphones', 310.44, 92, 'Doyle, Brekke and Smitham', 'products/main_6.png', '[\"products\\/gallery\\/product_6_1.png\",\"products\\/gallery\\/product_6_2.png\"]', 1, 0, NULL, 0.0, 0, 'fuchsia', 'Small', 'Plastic', 1.49, '20x18x5 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(7, 'SKU007', 'Demo Product 7', 'Magnam quo cumque commodi nostrum aliquid qui blanditiis similique esse corporis voluptatem.', 'Headphones', 181.12, 33, 'Nitzsche-Hackett', 'products/main_7.png', '[\"products\\/gallery\\/product_7_1.png\",\"products\\/gallery\\/product_7_2.png\"]', 1, 0, NULL, 0.0, 0, 'lime', 'Small', 'Aluminum', 0.60, '20x18x5 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(8, 'SKU008', 'Demo Product 8', 'Voluptatum qui laudantium earum sint eum amet qui distinctio iusto ipsum et ad dolorem.', 'Headphones', 597.21, 34, 'Wolf, Toy and Waelchi', 'products/main_8.png', '[\"products\\/gallery\\/product_8_1.png\",\"products\\/gallery\\/product_8_2.png\"]', 1, 0, NULL, 0.0, 0, 'black', 'Small', 'Plastic', 1.32, '20x18x5 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(9, 'SKU009', 'Demo Product 9', 'Eos reprehenderit exercitationem qui explicabo nostrum illum modi quae dolor illum sed et.', 'Headphones', 528.04, 66, 'Wiza, Monahan and Dooley', 'products/main_9.png', '[\"products\\/gallery\\/product_9_1.png\",\"products\\/gallery\\/product_9_2.png\"]', 1, 0, NULL, 0.0, 0, 'white', 'Large', 'Aluminum', 1.90, '15x7x0.8 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11'),
(10, 'SKU010', 'Demo Product 10', 'Est quod voluptatem assumenda non ea distinctio aut ipsum.', 'Wearables', 208.90, 73, 'Pacocha, Ledner and Christiansen', 'products/main_10.png', '[\"products\\/gallery\\/product_10_1.png\",\"products\\/gallery\\/product_10_2.png\"]', 1, 0, NULL, 0.0, 0, 'black', 'Medium', 'Plastic', 1.29, '10x10x2 cm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-17 08:00:11', '2025-08-17 08:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Momin', 'momin@gmail.com', NULL, '$2y$10$nhnWB5ouZTwd3tROnQDfL.qvvfGVDmEPfZmcUe6L5aTK/8U4qG3/6', 'customer', NULL, '2025-08-17 09:00:03', '2025-08-17 09:00:03'),
(2, 'Nasir Uddin', 'nasir93cse@gmail.com', NULL, '$2y$10$NiYrLyeet8uMugIdDfYiCulF//4F9C9ZKqeQXyjrMtxkuOOsrGlI6', 'admin', NULL, '2025-08-17 11:17:42', '2025-08-17 11:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
