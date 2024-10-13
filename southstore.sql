-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/10/2024 às 22:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `south`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `breakdown`
--

CREATE TABLE `breakdown` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL,
  `value` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `breakdown`
--

INSERT INTO `breakdown` (`id`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(2, 'Tela Quebrada', 'Tela do Aparelho Quebrada', '700', '2024-10-03 10:17:20', '2024-10-03 10:17:20'),
(4, 'Carcaça Quebrada', 'A carcaça do aparelho está danificada.', '500', '2024-10-03 10:18:26', '2024-10-03 10:26:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `business`
--

CREATE TABLE `business` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corporate_reason` longtext DEFAULT NULL,
  `name` longtext NOT NULL,
  `cnpj` longtext NOT NULL,
  `legal_nature` longtext DEFAULT NULL,
  `opening_date` longtext DEFAULT NULL,
  `CNAE` longtext DEFAULT NULL,
  `social_capital` longtext DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `business`
--

INSERT INTO `business` (`id`, `corporate_reason`, `name`, `cnpj`, `legal_nature`, `opening_date`, `CNAE`, `social_capital`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Comércio Varejista', 'SouthStore', '00.000.000/0000-00', 'Natureza Legal', '2024-10-03 17:48:13', '0000-0/00', '10.000', 'General Osório', '2024-10-03 20:48:13', '2024-10-03 20:59:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(22, 'iPhones Novos', '2024-10-13 22:09:27', '2024-10-13 22:09:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `contact`
--

INSERT INTO `contact` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<p>Textn nvogh</p>', NULL, '2024-10-13 22:53:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `number` longtext NOT NULL,
  `cpf` longtext NOT NULL,
  `address` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `number`, `cpf`, `address`, `created_at`, `updated_at`) VALUES
(7, 'Renan', 'nunescoelhorenan@proton.me', '53 9842333841', '123123', 'endrçeo', '2024-10-13 23:06:30', '2024-10-13 23:06:30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `hero`
--

CREATE TABLE `hero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image_url` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `hero`
--

INSERT INTO `hero` (`id`, `title`, `description`, `image_url`, `created_at`, `updated_at`) VALUES
(5, 'SouthStore', 'A melhor loja de dispositivos apple de Canguçu e região! 🍎', 'https://i.ibb.co/C8w9VyP/Flyer-Leaf-Plugins-Invite-2-Copia.png', '2024-09-26 10:57:40', '2024-10-13 20:48:48'),
(9, NULL, NULL, 'https://i.ibb.co/b5136bP/fundo.png	', '2024-10-13 20:49:41', '2024-10-13 20:49:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_24_221219_add_to_users_2fa', 2),
(6, '2024_09_25_052059_create_categorys_table', 3),
(7, '2024_09_25_052108_create_products_table', 3),
(8, '2024_09_25_052116_create_stock_table', 3),
(9, '2024_09_26_052325_create_sales_table', 4),
(10, '2024_09_26_052450_create_reserves_table', 4),
(11, '2024_09_26_072154_create_hero_table', 5),
(12, '2024_09_26_080406_create_qs_table', 6),
(13, '2024_09_26_080411_create_contact_table', 6),
(14, '2024_09_30_050856_create_relatory_table', 7),
(15, '2024_09_30_063040_add_role_to_users', 7),
(16, '2024_10_01_010553_add_status_to_users', 8),
(17, '2024_10_03_040433_create_customers_table', 9),
(18, '2024_10_03_040456_create_simulations_table', 9),
(19, '2024_10_03_040527_create_breakdown_table', 9),
(20, '2024_10_03_040559_create_business_table', 9),
(21, '2024_10_03_041338_add_to_products_bought_value', 9),
(22, '2024_10_03_042344_add_to_sales_installments', 10),
(23, '2024_10_03_044916_add_to_simulations_rate_name', 10),
(24, '2024_10_03_181048_add_to_products_imei', 11),
(25, '2024_10_03_183918_create_review_table', 12),
(26, '2024_10_04_023906_add_to_review_some_things', 13),
(27, '2024_10_08_031019_add_to_sales_bought_value', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
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
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_url` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bought_value` longtext NOT NULL,
  `imei` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `description`, `image_url`, `created_at`, `updated_at`, `bought_value`, `imei`) VALUES
(20, 'iPhone 15', '22', '50000', '<p>asdfasdfsadf</p>', 'https://meuimportadors.com/wp-content/uploads/2023/10/iPhone-15-Rosa.png', '2024-10-13 22:09:50', '2024-10-13 22:39:02', '2000', '1234123451');

-- --------------------------------------------------------

--
-- Estrutura para tabela `qs`
--

CREATE TABLE `qs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `qs`
--

INSERT INTO `qs` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<p>Texto Examplee</p>', '2024-10-13 22:56:13', '2024-10-13 22:56:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatory`
--

CREATE TABLE `relatory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` longtext NOT NULL,
  `value` longtext NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `relatory`
--

INSERT INTO `relatory` (`id`, `type`, `value`, `description`, `created_at`, `updated_at`) VALUES
(5, '1', '12', 'aluguel', '2024-10-13 23:06:48', '2024-10-13 23:06:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserves`
--

CREATE TABLE `reserves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `number` longtext NOT NULL,
  `cpf` longtext NOT NULL,
  `address` longtext NOT NULL,
  `product_name` longtext NOT NULL,
  `price` longtext NOT NULL,
  `payment_method` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_name` longtext DEFAULT NULL,
  `reviewer_grade` longtext DEFAULT NULL,
  `reviewer_desc` longtext DEFAULT NULL,
  `is_anonymous` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reviewer_id` longtext NOT NULL,
  `review_code` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext NOT NULL,
  `email` longtext NOT NULL,
  `number` longtext NOT NULL,
  `cpf` longtext NOT NULL,
  `address` longtext NOT NULL,
  `product_name` longtext NOT NULL,
  `price` longtext NOT NULL,
  `payment_method` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `installments` longtext DEFAULT NULL,
  `bought_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sales`
--

INSERT INTO `sales` (`id`, `name`, `email`, `number`, `cpf`, `address`, `product_name`, `price`, `payment_method`, `created_at`, `updated_at`, `installments`, `bought_value`) VALUES
(18, 'Renan', 'nunescoelhorenan@proton.me', '53 9842333841', '123123', 'endrçeo', 'iPhone 15', '50000', 'Cartão de Crédito (12x)', '2024-10-13 23:06:30', '2024-10-13 23:06:30', NULL, '2000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `simulations`
--

CREATE TABLE `simulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentagerate` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `simulations`
--

INSERT INTO `simulations` (`id`, `percentagerate`, `created_at`, `updated_at`, `rate_name`) VALUES
(2, '4.99', '2024-10-03 09:28:09', '2024-10-03 09:46:41', 'Visa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_secret` longtext DEFAULT NULL,
  `role` longtext NOT NULL,
  `status` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `two_factor_secret`, `role`, `status`) VALUES
(1, 'Renan Nunes Coelho', 'dev@master.com', NULL, '$2y$12$fZCeO8sXJuniWMw.9paH0uZo92/uR5sELQNWMGlzSlSSpyaA8aOH2', NULL, '2024-09-23 08:00:56', '2024-10-01 04:03:42', NULL, 'Dono', NULL),
(2, 'Teste 2', 'southstore@gmail.com', NULL, '$2y$12$31T8Tp51XK7bFd61Tx6lLeelx2E3kLyaIDdXlXTU8jwK9wlUq3Vge', NULL, '2024-10-01 03:50:30', '2024-10-04 05:34:03', NULL, 'User', 'Blocked');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `qs`
--
ALTER TABLE `qs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `relatory`
--
ALTER TABLE `relatory`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `simulations`
--
ALTER TABLE `simulations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hero`
--
ALTER TABLE `hero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `qs`
--
ALTER TABLE `qs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `relatory`
--
ALTER TABLE `relatory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `simulations`
--
ALTER TABLE `simulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
