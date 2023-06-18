-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 18 juin 2023 à 11:43
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `retwitt`
--

-- --------------------------------------------------------

--
-- Structure de la table `twitts`
--

CREATE TABLE `twitts` (
  `id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `media` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `twitts`
--

INSERT INTO `twitts` (`id`, `content`, `media`, `tag`, `date`, `userid`) VALUES
(110, 'Vous aimez quel genre de musique ?', '', 'musique', '2023-06-11 19:42:31', 7),
(111, 'Trop beau les renards des neiges !', '', 'animaux', '2023-06-11 19:43:13', 8),
(112, 'On peut poster des images !', '50858665218_87c17948df_o.jpg', 'innovation', '2023-06-18 13:35:21', 7),
(113, 'Que pensez-vous de mon nouveau fond d\'écran ?', '20448382.jpg', 'peinture', '2023-06-18 13:37:07', 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `pseudo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `img` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `pseudo`, `nom`, `mail`, `mdp`, `img`) VALUES
(7, 'Vico', 'Victor', 'vico@mail.com', '$2y$10$SqcaeX.WoHNGDmQHOfRbyevu5pyNFNUN2a8x1aKTjcI8ZiGjQSAE.', 'https://picsum.photos/200'),
(8, 'ThomLuck', 'Thomas', 'thomluck@gmail.com', '$2y$10$N7E56xJEiIHXbzu37oEL6Oxrtw.YuwW12bGHk01gFuaGVcaBxEeAq', 'https://picsum.photos/200');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `twitts`
--
ALTER TABLE `twitts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `twitts`
--
ALTER TABLE `twitts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
