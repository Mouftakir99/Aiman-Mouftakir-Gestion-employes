-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour gestion_employee
CREATE DATABASE IF NOT EXISTS `gestion_employee` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gestion_employee`;

-- Listage de la structure de table gestion_employee. employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `poste` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_employee.employees : ~6 rows (environ)
DELETE FROM `employees`;
INSERT INTO `employees` (`id`, `nom`, `prenom`, `email`, `adresse`, `telephone`, `poste`, `created_at`, `updated_at`) VALUES
	(1, 'Gerant', 'A.D.M', 'gerant@admin.com', 'adresse gerant 1', '+2126********', 'gerant', '2025-01-21 23:23:54', '2025-01-21 23:23:54'),
	(2, 'Gerant 2', 'A.D.M', 'gerant2@admin.com', 'adresse gerant 2', '+2126********', 'gerant', '2025-01-21 23:23:54', '2025-01-21 23:23:54'),
	(4, 'Livreur', 'A.D.M', 'livreur@admin.com', 'adresse livreur 1', '+2126********', 'livreur', '2025-01-21 23:23:54', '2025-01-21 23:23:54'),
	(5, 'Livreur 2', 'A.D.M', 'livreur2@admin.com', 'adresse livreur 2', '+2126********', 'livreur', '2025-01-21 23:23:54', '2025-01-21 23:23:54'),
	(6, 'Cuisiner', 'A.D.M', 'cuisiner@admin.com', 'adresse cuisiner 1', '+2126********', 'cuisiner', '2025-01-21 23:23:54', '2025-01-21 23:23:54'),
	(8, 'test', 'test', 'test@test.test', 'Adresse test', '+2127********', 'livreur', '2025-01-21 02:26:43', '2025-01-21 02:26:43');

-- Listage de la structure de table gestion_employee. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_employee.migrations : ~1 rows (environ)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(2, '2025-01-21-162126', 'App\\Database\\Migrations\\CreateUtilisateurTable', 'default', 'App', 1737408840, 1),
	(3, '2025-01-21-181814', 'App\\Database\\Migrations\\CreateEmployeeTable', 'default', 'App', 1737408840, 1);

-- Listage de la structure de table gestion_employee. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_employee.utilisateurs : ~2 rows (environ)
DELETE FROM `utilisateurs`;
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'LTE', 'admin@admin.com', '$2y$10$jFguYlBgatdC8JtoisfBHOVBf8NhyBVEwvgll9aYpgYdmHWFGgDvi', 'admin', '2025-01-21 21:34:15', '2025-01-21 21:34:15'),
	(2, 'User', 'LTE', 'user@user.com', '$2y$10$HkZM3b7zbVwNuefq8P171.jq40X89gU0owB2unjfYtP/LVJY/7pz2', 'user', '2025-01-21 21:34:15', '2025-01-21 21:34:15');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
