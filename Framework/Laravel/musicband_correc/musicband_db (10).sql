-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 30 oct. 2017 à 14:08
-- Version du serveur :  5.7.18
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musicband_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `nom`, `description`) VALUES
(3, '2017-10-25 08:49:03', '2017-10-25 08:49:36', 'dvd', 'super description'),
(4, '2017-10-25 10:32:59', '2017-10-25 10:32:59', 'cd', 'ddf'),
(5, '2017-10-25 10:33:04', '2017-10-25 10:33:04', 'k7', NULL),
(7, '2017-10-25 10:33:16', '2017-10-25 10:33:16', 'vynil', NULL),
(8, '2017-10-25 10:33:26', '2017-10-25 10:33:26', 'disquette', NULL),
(9, '2017-10-25 10:33:37', '2017-10-25 10:33:37', 'minitel', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `civilite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_total_promo_ttc` double(8,2) NOT NULL,
  `prix_total_ttc` double(8,2) NOT NULL,
  `prix_total_promo_ht` double(8,2) NOT NULL,
  `prix_total_ht` double(8,2) NOT NULL,
  `montant_de_la_remise_appliquee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_remise_appliquee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `created_at`, `updated_at`, `civilite`, `nom`, `prenom`, `email`, `adresse`, `adresse2`, `ville`, `code_postal`, `pays`, `telephone`, `prix_total_promo_ttc`, `prix_total_ttc`, `prix_total_promo_ht`, `prix_total_ht`, `montant_de_la_remise_appliquee`, `nom_remise_appliquee`) VALUES
(1, '2017-10-27 07:58:06', '2017-10-27 07:58:06', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', NULL, 'Paris', '75008', 'FR', '0145781498', 0.00, 0.00, 0.00, 0.00, '', ''),
(2, '2017-10-27 07:58:39', '2017-10-27 07:58:39', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', NULL, 'Paris', '75008', 'FR', '0145781498', 0.00, 0.00, 0.00, 0.00, '', ''),
(3, '2017-10-27 08:44:20', '2017-10-27 08:44:20', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', '9 rue de Paris', 'Paris', '75008', 'FR', '0145781498', 0.00, 0.00, 0.00, 0.00, '', ''),
(4, '2017-10-27 12:14:03', '2017-10-27 12:14:03', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', '9 rue de Paris', 'Paris', '75008', 'FR', '0145781498', 61.25, 69.60, 51.04, 58.00, '- 12%', 'reduc12'),
(5, '2017-10-27 12:23:08', '2017-10-27 12:23:08', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', '9 rue de Paris', 'Paris', '75008', 'FR', '0145781498', 61.25, 69.60, 51.04, 58.00, '- 12%', 'reduc12'),
(6, '2017-10-27 14:24:17', '2017-10-27 14:24:17', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', '9 rue de Paris', 'Paris', '75008', 'FR', '0145781498', 61.25, 69.60, 51.04, 58.00, '- 12%', 'reduc12'),
(7, '2017-10-30 10:58:45', '2017-10-30 10:58:45', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', 'complément', 'Paris', '75008', 'FR', '0145781498', 34.80, 34.80, 29.00, 29.00, '0', '0'),
(8, '2017-10-30 11:01:22', '2017-10-30 11:01:22', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', 'complément', 'Paris', '75008', 'FR', '0145781498', 34.80, 34.80, 29.00, 29.00, '0', '0'),
(9, '2017-10-30 11:54:08', '2017-10-30 11:54:08', 'mme', 'de Ubeda', 'Marie', 'm.de.ubeda@gmail.com', '9 rue de Paris', '9 rue de Paris', 'Paris', '75008', 'FR', '0145781498', 144.00, 144.00, 120.00, 120.00, '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `commande_products`
--

CREATE TABLE `commande_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `commande_id` int(10) UNSIGNED NOT NULL,
  `qte` int(11) NOT NULL,
  `prix_unitaire_ttc` double(8,2) NOT NULL,
  `prix_total_ttc` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande_products`
--

INSERT INTO `commande_products` (`id`, `created_at`, `updated_at`, `product_id`, `commande_id`, `qte`, `prix_unitaire_ttc`, `prix_total_ttc`) VALUES
(1, '2017-10-27 07:58:39', '2017-10-27 07:58:39', 4, 2, 2, 34.80, 69.60),
(2, '2017-10-27 08:44:20', '2017-10-27 08:44:20', 5, 3, 1, 16.80, 16.80),
(3, '2017-10-27 08:44:20', '2017-10-27 08:44:20', 4, 3, 1, 34.80, 34.80),
(4, '2017-10-27 12:14:03', '2017-10-27 12:14:03', 4, 4, 2, 34.80, 69.60),
(5, '2017-10-27 12:23:08', '2017-10-27 12:23:08', 4, 5, 2, 34.80, 69.60),
(6, '2017-10-27 14:24:17', '2017-10-27 14:24:17', 4, 6, 2, 34.80, 69.60),
(7, '2017-10-30 10:58:45', '2017-10-30 10:58:45', 4, 7, 1, 34.80, 34.80),
(8, '2017-10-30 11:01:22', '2017-10-30 11:01:22', 4, 8, 1, 34.80, 34.80),
(9, '2017-10-30 11:54:08', '2017-10-30 11:54:08', 12, 9, 10, 14.40, 144.00);

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `created_at`, `updated_at`, `code`, `value`) VALUES
(1, '2017-10-26 11:16:40', '2017-10-26 11:24:45', 'reduc12', '12%'),
(3, '2017-10-26 11:26:36', '2017-10-26 11:26:36', 'test22', '22');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_23_142321_create_products_table', 1),
(4, '2017_10_25_100547_create_categories_table', 2),
(6, '2017_10_25_120749_add_field_category_id_products_table', 3),
(7, '2017_10_26_125821_create_coupons_table', 4),
(8, '2017_10_26_143332_create_commandes_table', 5),
(9, '2017_10_26_144255_create_commande_products_table', 6),
(12, '2017_10_27_104653_add_fields_commandes_table', 7),
(13, '2017_10_30_142132_add_fields_users_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_ht` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `nom`, `prix_ht`, `description`, `photo`, `category_id`) VALUES
(4, '2017-10-24 11:10:43', '2017-10-24 11:10:43', 'T-Shirt Ramones', 29.00, 'csdfsdfds', 'fef7e403710dba0860d085620e016763486b1d78.jpg', NULL),
(5, '2017-10-24 12:12:57', '2017-10-24 12:12:57', 'dfdfd', 14.00, 'fdff', '3cf6186ca02cdc7a59f153f74f70220d5a3f4f8c.jpg', NULL),
(6, '2017-10-24 12:13:20', '2017-10-24 12:13:20', 'dfdfd', 14.00, 'fdff', '6252abf71487e6ea90016abcea4011714527e130.jpg', NULL),
(7, '2017-10-24 12:14:35', '2017-10-24 12:14:35', 'salut', 15.00, 'qdcsf', 'b362e2a1592bb2285d6a697f06062b1b7dd4070a.jpg', NULL),
(8, '2017-10-24 12:15:04', '2017-10-24 12:15:04', 'salut', 15.00, 'qdcsf', 'b641793e840c7cce4229e7c3a90d5c0ca5e41a7c.jpg', NULL),
(9, '2017-10-24 12:17:32', '2017-10-25 11:37:22', 'dqsd', 4.00, 'dcdfd', '30f471434af84f63bcf3300a2a8e5da49cb8937d.jpg', 3),
(10, '2017-10-24 12:18:16', '2017-10-24 12:18:16', 'gh', 4.00, 'dfgfg', 'af40415ef541733fe3f953fba57bbcdc50e4b417.jpg', NULL),
(12, '2017-10-25 11:12:17', '2017-10-25 11:37:27', 'T-Shirt Britney Spears', 12.00, 'dfdf', 'd8b01659ff04041ce114884e594baf1926163c08.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `prenom`) VALUES
(1, 'Marie de Ubeda', 'm.de.ubeda@gmail.com', '$2y$10$s18z7KSmKbi3.1fmzijue.Q4drBqG8qLIcveculXffT8EpYVC77JO', 'kX226MHw8mun1Z8djaIHBGy8O9hx7ZBygdipTMrTgjnRbUzUWDqDS6hoQ21A', '2017-10-30 13:17:07', '2017-10-30 13:17:07', 1, 'marie'),
(2, 'de Ubeda', 'm.de.ubed2a@gmail.com', '$2y$10$DLO/cuw4W81GZdXCeXZxS.NQiFPyOxYw8h8W2huGQWPo.5uBWZr4W', 'Keq4a7LHCTCOcMM8HWhCLSsFT71SUM3WmOw3WY9mt1rzQwBPdK2UZAxT2fkG', '2017-10-30 13:38:28', '2017-10-30 13:38:28', 0, NULL),
(3, 'sdfds', 'fdfsdfsdfsdf@gmail.com', '$2y$10$VQjCYkbf.PtoZUXY1Iw1JeH8UKyPActecOv4pRUO.evLl5y0TS.NO', 'c2IKYRXI9hePmAzGVRPPgyQ7ctzMiQU4IVsHaYmc2Is3VHOiSBLjXagdoyCx', '2017-10-30 13:41:14', '2017-10-30 13:41:14', 0, 'fdf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_products`
--
ALTER TABLE `commande_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_products_product_id_foreign` (`product_id`),
  ADD KEY `commande_products_commande_id_foreign` (`commande_id`);

--
-- Index pour la table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commande_products`
--
ALTER TABLE `commande_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_products`
--
ALTER TABLE `commande_products`
  ADD CONSTRAINT `commande_products_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commande_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
