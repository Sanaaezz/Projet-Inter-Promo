-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 août 2024 à 07:39
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pet_watcher`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_game`
--

DROP TABLE IF EXISTS `categorie_game`;
CREATE TABLE IF NOT EXISTS `categorie_game` (
  `id_categorie_game` int NOT NULL AUTO_INCREMENT,
  `str_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id_game` int NOT NULL AUTO_INCREMENT,
  `str_nom` varchar(255) NOT NULL,
  `str_resume` varchar(255) NOT NULL,
  `txt_description` text NOT NULL,
  `id_categorie_game` int NOT NULL,
  `dtm_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dtm_maj` datetime DEFAULT NULL,
  PRIMARY KEY (`id_game`),
  KEY `id_categorie_game_FK` (`id_categorie_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pw_pet`
--

DROP TABLE IF EXISTS `pw_pet`;
CREATE TABLE IF NOT EXISTS `pw_pet` (
  `id_pet` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `max` int NOT NULL,
  PRIMARY KEY (`id_pet`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pw_pet`
--

INSERT INTO `pw_pet` (`id_pet`, `type`, `max`) VALUES
(1, 'dog', 10),
(2, 'cat', 10),
(3, 'rabbit', 10);

-- --------------------------------------------------------

--
-- Structure de la table `pw_reservation`
--

DROP TABLE IF EXISTS `pw_reservation`;
CREATE TABLE IF NOT EXISTS `pw_reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `dtm_start` datetime NOT NULL,
  `dtm_end` datetime NOT NULL,
  `comment` longtext,
  `id_user` int NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `dtm_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reservation`),
  KEY `pw_reservation_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pw_reservation`
--

INSERT INTO `pw_reservation` (`id_reservation`, `dtm_start`, `dtm_end`, `comment`, `id_user`, `validated`, `dtm_created`) VALUES
(1, '2024-08-29 10:53:30', '2024-08-31 10:53:30', NULL, 1, 0, '2024-08-28 10:54:14'),
(2, '2024-09-02 10:53:30', '2024-09-09 10:53:30', NULL, 1, 1, '2024-08-28 10:54:14'),
(3, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:19:07'),
(4, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:22:03'),
(5, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:25:00'),
(6, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:25:05'),
(7, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:26:29'),
(8, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:27:45'),
(9, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:37:08'),
(10, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:39:11'),
(11, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:05:30'),
(12, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:06:28'),
(13, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:07:11'),
(14, '2024-08-25 00:00:00', '2024-09-25 00:00:00', '', 3, 0, '2024-08-28 16:53:24');

-- --------------------------------------------------------

--
-- Structure de la table `pw_reservation_detail`
--

DROP TABLE IF EXISTS `pw_reservation_detail`;
CREATE TABLE IF NOT EXISTS `pw_reservation_detail` (
  `id_reservation_detail` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `id_reservation` int NOT NULL,
  `id_pet` int NOT NULL,
  `dtm_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reservation_detail`),
  KEY `pw_reservation_detail_reservation_FK` (`id_reservation`),
  KEY `pw_reservation_detail_pet_FK` (`id_pet`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pw_reservation_detail`
--

INSERT INTO `pw_reservation_detail` (`id_reservation_detail`, `quantity`, `id_reservation`, `id_pet`, `dtm_created`) VALUES
(1, 3, 1, 1, '2024-08-28 10:56:01'),
(2, 5, 1, 2, '2024-08-28 10:56:01'),
(3, 1, 2, 2, '2024-08-28 10:56:01'),
(4, 2, 2, 1, '2024-08-28 10:56:01'),
(5, 5, 2, 3, '2024-08-28 10:56:01');

-- --------------------------------------------------------

--
-- Structure de la table `pw_role`
--

DROP TABLE IF EXISTS `pw_role`;
CREATE TABLE IF NOT EXISTS `pw_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pw_role`
--

INSERT INTO `pw_role` (`id_role`, `name`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `pw_user`
--

DROP TABLE IF EXISTS `pw_user`;
CREATE TABLE IF NOT EXISTS `pw_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL DEFAULT '1',
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `dtm_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  KEY `pw_user_role_FK` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pw_user`
--

INSERT INTO `pw_user` (`id_user`, `lastname`, `firstname`, `mail`, `password`, `id_role`, `activated`, `dtm_created`) VALUES
(1, 'TEST', 'User', 'user@test.fr', '$2y$10$zLz.eVvidYP4YlfAYt.G7.Sm1W5CpE.hepDO3.GTwCJO01zsCCqBa', 2, 0, '2024-08-28 10:53:21'),
(2, 'bob', 'bob', 'bob@bob.mer', '$2y$10$zLz.eVvidYP4YlfAYt.G7.Sm1W5CpE.hepDO3.GTwCJO01zsCCqBa', 1, 0, '2024-08-28 11:35:02'),
(3, 'Patrik', 'Bob', 'patrik@bob.mer', '$2y$10$cttSMyaIO0fpZJi684XMi./gqLBHCsFYWIwTUzpiQEapCknKo0lcW', 1, 0, '2024-08-28 16:51:18');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `id_categorie_game_FK` FOREIGN KEY (`id_categorie_game`) REFERENCES `categorie_game` (`id_categorie_game`);

--
-- Contraintes pour la table `pw_reservation`
--
ALTER TABLE `pw_reservation`
  ADD CONSTRAINT `pw_reservation_user_FK` FOREIGN KEY (`id_user`) REFERENCES `pw_user` (`id_user`);

--
-- Contraintes pour la table `pw_reservation_detail`
--
ALTER TABLE `pw_reservation_detail`
  ADD CONSTRAINT `pw_reservation_detail_pet_FK` FOREIGN KEY (`id_pet`) REFERENCES `pw_pet` (`id_pet`),
  ADD CONSTRAINT `pw_reservation_detail_reservation_FK` FOREIGN KEY (`id_reservation`) REFERENCES `pw_reservation` (`id_reservation`);

--
-- Contraintes pour la table `pw_user`
--
ALTER TABLE `pw_user`
  ADD CONSTRAINT `pw_user_role_FK` FOREIGN KEY (`id_role`) REFERENCES `pw_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
