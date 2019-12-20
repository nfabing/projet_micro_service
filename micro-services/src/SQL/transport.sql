-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 20 déc. 2019 à 09:19
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
VALUES (1, 'C1576772249'),
       (2, 'C1576772595'),
       (3, 'C1576772813'),
       (4, 'ABC'),
       (5, 'C1576829024');

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
VALUES (1, 1, 49.1413, 6.16653, '2019-12-19 17:17:29'),
       (2, 2, 6.1723, 49.117, '2019-12-19 17:23:15'),
       (3, 3, 49.117, 6.1723, '2019-12-19 17:26:53'),
       (4, 3, 49.1135, 6.18223, '2019-12-19 17:27:36'),
       (6, 4, 49.1116, 6.15229, '2019-12-19 22:10:41'),
       (7, 4, 49.1413, 6.16653, '2019-12-19 22:11:45'),
       (8, 4, 49.117, 6.16653, '2019-12-20 09:02:44'),
       (9, 5, 6.1723, 49.117, '2019-12-20 09:03:44'),
       (10, 5, 49.1413, 6.16653, '2019-12-20 09:04:14');

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
    AUTO_INCREMENT = 11;

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
