-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 08 déc. 2019 à 22:22
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `salgado`
--
CREATE DATABASE IF NOT EXISTS `salgado` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `salgado`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Peinture'),
(2, 'Sculpture'),
(3, 'Dessin');

-- --------------------------------------------------------

--
-- Structure de la table `exposition`
--

CREATE TABLE `exposition` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `exposition`
--

INSERT INTO `exposition` (`id`, `name`, `description`, `date`) VALUES
(1, 'Expo Paris', 'Vous allez voir des chef d\'oeuvre des artistes connus à Paris ! Buffet à l\'entrée.', '2019-12-13 09:00:00'),
(2, 'Expo Paris Versailles', 'Exposition se trouve à coté du célèbre Louvre.', '2019-12-09 10:00:00'),
(3, 'Paris - Peinture', 'Découvrez tous les peintures de plusieurs artistes, plusieurs genres ...', '2019-12-08 09:00:00'),
(4, 'Paris Romantique', 'L\'exposition pour contempler les oeuvres liés à la romance', '2020-02-14 10:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191207214942', '2019-12-07 21:49:46');

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE `oeuvres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id`, `name`, `description`, `image`, `categories_id`) VALUES
(1, 'Femmes colorées', 'Creation de cette oeuvre pour rendre hommage aux femmes', 'oeuvre1.jpg', 1),
(2, 'Les ombres', 'Une sculpture représentant des personnes en ombre', 'oeuvre5.jpg', 2),
(3, 'Couple', 'Représentation d\'un couple où l\'homme est infidèle à sa femme', 'oeuvre3.jpg', 1),
(4, 'Le regard', 'Un regard qui fait perdre la tête', 'oeuvre2.jpg', 1),
(5, 'Vie en couleur', 'Promenade en amoureux avec un décor coloré', 'oeuvre4.jpg', 1),
(6, 'Jumeaux', 'Ils sont inséparable mais ...', 'oeuvre6.jpg', 2),
(7, 'La sirène de corail', 'Une belle femme endormie mais effrayante au réveil', 'oeuvre7.jpg', 2),
(8, 'Ville 3D', 'Des géants bâtiments ...', 'oeuvre8.jpg', 3),
(9, 'Paris', 'La seule ville au monde où mourir de faim est encore considéré comme un art', 'oeuvre9.jpg', 3),
(10, 'Ma maison', 'La où j\'ai passé mon enfance à rire ...', 'oeuvre10.jpg', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_413EEE3EA21214B7` (`categories_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `oeuvres`
--
ALTER TABLE `oeuvres`
  ADD CONSTRAINT `FK_413EEE3EA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
