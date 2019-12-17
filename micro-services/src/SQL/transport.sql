-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 17 déc. 2019 à 14:17
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `transport`
--

-- --------------------------------------------------------

--
-- Structure de la table `parcel`
--

CREATE TABLE `parcel`
(
    `id`           int(11)     NOT NULL,
    `parcelNumber` varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `parcel`
--

INSERT INTO `parcel` (`id`, `parcelNumber`)
VALUES (1, 'ABC'),
       (2, 'Nicolas'),
       (3, 'Yanis'),
       (4, 'C1576587029'),
       (5, 'C1576587042');

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions`
(
    `id`             int(11)  NOT NULL,
    `parcelNumberId` int(11)  NOT NULL,
    `latitude`       float    NOT NULL,
    `longitude`      float    NOT NULL,
    `date`           datetime NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `positions`
--

INSERT INTO `positions` (`id`, `parcelNumberId`, `latitude`, `longitude`, `date`)
VALUES (2, 1, 7.03739, 49.118, '2019-12-08 18:13:17'),
       (3, 1, 7.03739, 49.118, '2019-12-09 15:16:59'),
       (4, 1, 7.03739, 49.118, '2019-12-09 16:04:23'),
       (5, 2, 35.005, 20.0514, '2019-12-09 16:09:12'),
       (6, 3, 5.6581, 11.0601, '2019-12-09 20:57:56'),
       (7, 3, 5.6581, 11.0601, '2019-12-09 20:58:14'),
       (8, 3, 5.6581, 11.0601, '2019-12-09 20:59:10'),
       (9, 3, 5.6581, 11.0601, '2019-12-09 21:01:17'),
       (10, 3, 5.6581, 11.0601, '2019-12-09 21:06:12'),
       (11, 3, 5.6581, 11.0601, '2019-12-09 21:06:27'),
       (12, 1, 10, 11, '0000-00-00 00:00:00'),
       (13, 1, 10.114, 12.2525, '2019-12-17 13:57:06'),
       (14, 1, 10.114, 12.2525, '2019-12-17 13:57:17'),
       (15, 1, 10.114, 12.2525, '2019-12-17 14:05:48'),
       (16, 1, 10.114, 12.2525, '2019-12-17 14:06:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `parcel`
--
ALTER TABLE `parcel`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
    ADD PRIMARY KEY (`id`),
    ADD KEY `parcel Number` (`parcelNumberId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `parcel`
--
ALTER TABLE `parcel`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `positions`
--
ALTER TABLE `positions`
    ADD CONSTRAINT `parcel Number` FOREIGN KEY (`parcelNumberId`) REFERENCES `parcel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
