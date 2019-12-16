-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 déc. 2019 à 18:49
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
-- Structure de la table `positions`
--

CREATE TABLE `positions`
(
    `id`           int(11)     NOT NULL,
    `parcelNumber` varchar(50) NOT NULL,
    `latitude`     float       NOT NULL,
    `longitude`    float       NOT NULL,
    `date`         datetime    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Déchargement des données de la table `positions`
--

INSERT INTO `positions` (`id`, `parcelNumber`, `latitude`, `longitude`, `date`)
VALUES (1, 'ABC', 7.03739, 49.118, '2019-12-08 18:12:24'),
       (2, 'ABC', 7.03739, 49.118, '2019-12-08 18:13:17'),
       (3, 'ABC', 7.03739, 49.118, '2019-12-09 15:16:59'),
       (4, 'ABC', 7.03739, 49.118, '2019-12-09 16:04:23'),
       (5, 'Nicolas', 35.005, 20.0514, '2019-12-09 16:09:12'),
       (6, 'Yanis', 5.6581, 11.0601, '2019-12-09 20:57:56'),
       (7, 'Yanis', 5.6581, 11.0601, '2019-12-09 20:58:14'),
       (8, 'Yanis', 5.6581, 11.0601, '2019-12-09 20:59:10'),
       (9, 'Yanis', 5.6581, 11.0601, '2019-12-09 21:01:17'),
       (10, 'Yanis', 5.6581, 11.0601, '2019-12-09 21:06:12'),
       (11, 'Yanis', 5.6581, 11.0601, '2019-12-09 21:06:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
