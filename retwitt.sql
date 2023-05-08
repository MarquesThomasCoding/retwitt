-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 08 mai 2023 à 14:58
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
  `tag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `twitts`
--

INSERT INTO `twitts` (`id`, `content`, `tag`, `date`, `userid`) VALUES
(23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate, quam eget convallis gravida, mi nisi auctor dui, ut elementum augue lacus at tellus. Maecenas lacinia porta libero nec viverra. Vivamus non diam rutrum nunc imperdiet accumsan. Etiam ornare consequat sem non ornare. Aenean nisl velit, semper sit amet elementum sed, vehicula id quam. Morbi orci mauris, iaculis ac ante consequat, facilisis egestas nulla. Integer et sem eget lacus dapibus egestas.', 'musique', '2023-05-07 17:59:16', 2),
(25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate, quam eget convallis gravida, mi nisi auctor dui, ut elementum augue lacus at tellus. Maecenas lacinia porta libero nec viverra. Vivamus non diam rutrum nunc imperdiet accumsan. Etiam ornare consequat sem non ornare. Aenean nisl velit, semper sit amet elementum sed, vehicula id quam. Morbi orci mauris, iaculis ac ante consequat, facilisis egestas nulla. Integer et sem eget lacus dapibus egestas.', 'animaux', '2023-05-07 18:12:04', 2),
(26, 'J\'adore cette série', 'television', '2023-05-07 18:12:29', 2),
(27, 'innovant !!!', 'innovation', '2023-05-07 18:13:32', 5),
(29, 'Trop innovant cet objet !!', 'innovation', '2023-05-07 21:26:20', 2),
(30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et porttitor purus, ac consectetur lacus. Maecenas tincidunt nunc a orci faucibus, pellentesque aliquam tortor pellentesque. Nunc id erat suscipit, viverra ex id, sollicitudin tellus. Donec suscipit quam eu semper facilisis. Vestibulum quis aliquam est. Mauris commodo velit id neque suscipit tincidunt. Vivamus posuere vestibulum arcu at imperdiet. Aenean sed eros leo. Nullam tincidunt scelerisque sagittis. Vivamus consequat magna purus, et malesuada orci blandit a.\r\n\r\nVivamus dignissim accumsan sem, ac convallis magna suscipit nec. Vivamus tempor eget enim sed vestibulum. In rutrum, nulla sit amet semper finibus, mi tellus iaculis arcu, et molestie ligula est vitae ipsum. Duis venenatis mi dolor, quis scelerisque nunc scelerisque nec. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse malesuada blandit sagittis. Ut iaculis erat vel pretium tempus.\r\n\r\nPellentesque accumsan suscipit libero, non consectetur mauris fermentum eget. Vivamus sodales scelerisque purus, eu convallis nunc rutrum sed. Nulla pellentesque dolor vitae elit dignissim pharetra. Quisque fermentum justo non erat bibendum, dictum porttitor odio vehicula. Aenean vitae imperdiet leo, lacinia faucibus arcu. Vivamus ut libero eget mi cursus venenatis. Curabitur quis nulla eget massa sagittis lobortis a et velit. Pellentesque varius odio et semper efficitur. Ut rhoncus, mi vel dapibus auctor, dolor enim dapibus dolor, vitae egestas ipsum ex ac neque. Quisque sit amet viverra libero, vehicula vehicula metus. Integer mauris urna, interdum ut maximus quis, tempor quis neque. Vivamus at augue elit. Nullam interdum quam magna. Nunc ornare dapibus ante, sit amet commodo libero elementum quis.', 'voyage', '2023-05-07 21:27:02', 2);

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
(2, 'ThomLuck', 'Thomas', 'thomluck@retwitt.fr', '4567', 'https://picsum.photos/200'),
(5, 'El Medecin', 'Clément', 'clement@gmail.com', 'password', 'https://picsum.photos/200');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
