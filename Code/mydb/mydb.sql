-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 juin 2024 à 00:18
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `idbillet` int(11) NOT NULL,
  `price` decimal(2,0) NOT NULL,
  `Film_id_film` int(11) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_cinema` int(11) NOT NULL,
  `idseance` int(11) NOT NULL,
  `nbplaces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`idbillet`, `price`, `Film_id_film`, `user_id_user`, `id_salle`, `id_cinema`, `idseance`, `nbplaces`) VALUES
(3, 8, 14, 12, 6, 1, 11, 1),
(4, 10, 14, 12, 6, 1, 12, 1),
(5, 10, 14, 12, 6, 1, 13, 1),
(6, 10, 12, 12, 7, 1, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `idcapteur` int(11) NOT NULL,
  `niveau_sonore` decimal(10,0) NOT NULL,
  `temperature` int(11) NOT NULL,
  `salle_idsalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `idcinema` int(11) NOT NULL,
  `nom_cinema` varchar(45) DEFAULT NULL,
  `adresse_cinema` varchar(45) DEFAULT NULL,
  `user_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cinema`
--

INSERT INTO `cinema` (`idcinema`, `nom_cinema`, `adresse_cinema`, `user_id_user`) VALUES
(1, 'gui cinema', '123 rue du cine', 2),
(3, 'Hannah\'s club', '1451 Park Rd, NW', 8),
(4, 'Hip\'s Cinema', '11 rue de la cinematographie', 10),
(5, 'E-gle', '13 rue e-gle', 14);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcommentaire` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcommentaire`, `date`, `contenu`, `user_id`, `post_idpost`) VALUES
(1, '2024-06-05 22:26:36', 'tu as bien raison', 9, 1),
(2, '2024-06-05 22:26:36', 'oui, mais non', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `diffuser`
--

CREATE TABLE `diffuser` (
  `idseance` int(11) NOT NULL,
  `Film_id_film` int(11) NOT NULL,
  `salle_idsalle` int(11) NOT NULL,
  `film_date` datetime NOT NULL,
  `nbr_places_rsv` int(255) NOT NULL,
  `nbr_places_disp` int(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `diffuser`
--

INSERT INTO `diffuser` (`idseance`, `Film_id_film`, `salle_idsalle`, `film_date`, `nbr_places_rsv`, `nbr_places_disp`, `price`) VALUES
(3, 12, 6, '2024-05-15 19:00:00', 0, 50, 10),
(4, 13, 6, '2024-05-24 12:00:00', 0, 50, 10),
(8, 14, 6, '2024-06-19 19:00:00', 0, 50, 10),
(9, 12, 7, '2024-05-29 18:30:00', 3, 47, 10),
(11, 14, 6, '2024-06-30 20:00:00', 3, 47, 8),
(12, 14, 6, '2024-06-30 19:00:00', 1, 49, 10),
(13, 14, 6, '2024-06-30 18:00:00', 1, 49, 10),
(15, 14, 7, '2024-06-28 17:30:00', 0, 50, 10),
(16, 12, 7, '2024-06-12 15:30:00', 0, 50, 10);

-- --------------------------------------------------------

--
-- Structure de la table `faq1`
--

CREATE TABLE `faq1` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `faq1`
--

INSERT INTO `faq1` (`id`, `question`, `answer`) VALUES
(1, 'Comment sont fixés les prix ?', 'En fonction de ta gentillesse'),
(2, 'Est-ce qu\'on peut précommander une séance ?', 'Surement'),
(3, 'Comment puis-je réserver des billets de cinéma sur votre site ?', 'OUI C EST LE BUT'),
(4, 'Quels modes de paiement acceptez-vous pour la réservation en ligne ?', 'Cartes'),
(5, 'Puis-je modifier ou annuler ma réservation ?', 'Force à toi'),
(6, 'Est-ce que je peux choisir mes sièges lors de la réservation en ligne ?', 'OF COURSE'),
(7, 'Y a-t-il des réductions disponibles pour les étudiants, les seniors ou d\'autres groupes spécifiques ?', 'Non tu payes comme un brave'),
(8, 'Comment puis-je récupérer mes billets réservés en ligne au cinéma ?', 'Tu les imprimes'),
(9, 'C\'est vrai ?', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `synopsis` varchar(1000) DEFAULT NULL,
  `duree` int(255) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `id_cinema` int(11) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `synopsis`, `duree`, `genre`, `id_cinema`, `image_file`, `date_sortie`) VALUES
(12, 'Dune 2', 'Dune partie 2', 3600, 'aventure', 1, '../public/assets/img/OIP.jpeg', '2024-05-29'),
(13, 'Coco', 'Malgré le fait que sa famille ait banni la musique depuis des générations, Miguel rêve de devenir un musicien accompli comme son idole Ernesto de la Cruz. Désespéré de prouver son talent et suite à une mystérieuse série d\'événements, Miguel se retrouve dans le coloré et éblouissant territoire des morts. Sur son chemin, il rencontre le charmant filou Héctor, et ensemble, ils embarquent dans une aventure extraordinaire afin de découvrir la vraie histoire de la famille de Miguel.', 4080, 'fantasy/Aventure', 1, '../public/assets/img/coco.jpeg', '2024-05-15'),
(14, 'Avatar', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na\'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d\'une femme Na\'vi. Alors qu\'un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 9720, 'SF/Action', 1, '../public/assets/img/avatar.jpeg', '2023-06-29'),
(15, 'Inception', 'Dom Cobb est un voleur expérimenté dans l\'art périlleux de `l\'extraction\' : sa spécialité consiste à s\'approprier les secrets les plus précieux d\'un individu, enfouis au plus profond de son subconscient, pendant qu\'il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l\'univers trouble de l\'espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier. Cependant, une ultime mission pourrait lui permettre de retrouver sa vie d\'avant.', 8880, 'SF/Action', 1, '../public/assets/img/inception.jpeg', '2024-05-12'),
(16, 'Intersellar', 'Dans un proche futur, la Terre est devenue hostile pour l\'homme. Les tempêtes de sable sont fréquentes et il n\'y a plus que le maïs qui peut être cultivé, en raison d\'un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu\'une force qu\'il ne peut expliquer lui indique les coordonnées d\'une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l\'humanité.', 10140, 'SF/Aventure', 1, '../public/assets/img/interstellar.jpg', '2024-06-04'),
(18, 'Avatar', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na\'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d\'une femme Na\'vi. Alors qu\'un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 9720, 'SF/Action', 5, '../public/assets/img/avatar.jpeg', '2023-06-09');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `user_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idpost`, `titre`, `date`, `contenu`, `post_type`, `user_id_user`) VALUES
(1, 'un titre diablement intéréssant', '2024-06-05 22:22:02', 'ceci est un post admiratif', 'discussion', 3),
(2, 'Test', '2024-06-06 00:00:29', 'Ceci est un test', 'Aide', 13);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idsalle` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `nbr_places` int(255) NOT NULL,
  `cinema_idcinema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idsalle`, `numero`, `nbr_places`, `cinema_idcinema`) VALUES
(6, 1, 50, 1),
(7, 2, 60, 1),
(8, 1, 90, 4),
(47, 2, 70, 5),
(48, 1, 90, 5),
(61, 3, 100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(16) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `type` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `username`, `email`, `password_hash`, `type`) VALUES
(2, 'boury', 'guilhem', 'gui', 'bouryguilhem@gmail.com', '$2y$10$xgOd1sPogfVtbvIDXl9UvOQz5.CWIJyPazKS1uGzPTlRvfnbG879y', 'gerant'),
(3, 'BOURY', 'Guilhem ', 'guiboury', 'guilhem@mail.com', '$2y$10$PZ6vawrx4.QkCDVky7y23OoF7Sg4GS3cvi9ZVveQySpso.x7LZdie', 'client'),
(7, 'BOURY', 'Clement ', 'clement', 'bouryclement@gmail.com', '$2y$10$EmJpS5yGOW8GXFGVkjXJkO9hZNqd6kflcx0zM/oWDUgxiSoTAN9Y.', 'client'),
(8, 'DAVIS JACOBS', 'HANNAH', '2h', 'HTD9524@NYU.EDU', '$2y$10$QFYRWXr97PXYTSg2XGUIhuiCwJkCo1.fLuSSPZq9s/ytk2NA/ejma', 'gerant'),
(9, 'Teboul', 'Elisa', 'Elisa', 'emt.0310@gmail.com', '$2y$10$AbLdqOuxvIouISeZffCzZOvSfkOOHekqOgtyhOn1svQtlrZfPAseK', 'client'),
(10, 'Martin', 'hippo', 'hip\'s', 'hippomartin03@gmail.com', '$2y$10$r1QPeDkl7beNFqf72EddLO51KZ7hxx5511Fs8Y5Uu1V5zyXPT5xt.', 'gerant'),
(12, 'Martin', 'hippo', 'hip', 'hippomartin@gmail.com', '$2y$10$Op5dFxNwwctvd/RFuJfvfeQWr4rhLV.uZAp8tGCEMWSQLlQovLJwq', 'admin'),
(13, 'EGLE', 'EGLE', 'APPClient', 'egle@mail.fr', '$2y$10$xK7MwgZnFfZ1su0e8/VYJeZiz8cxhFQ4/S6FwROOrhwRfDNhcX4hq', 'client'),
(14, 'EGLE', 'EGLE', 'APPgerant', 'egle1@mail.fr', '$2y$10$Hvyi/p3KN6svIpLYAVRuV.D.98dgmuZcfy6S8zDg.8t7UxpuJoX.S', 'gerant'),
(15, 'EGLE', 'EGLE', 'APPAdmin', 'egle2@mail.fr', '$2y$10$CL8DCe1PoziJ3Dp../77OOg62jozGr2itftVpZRjMP5EPu1hhq/DW', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`idbillet`),
  ADD KEY `Film_id_film` (`Film_id_film`),
  ADD KEY `idseance` (`idseance`),
  ADD KEY `id_cinema` (`id_cinema`),
  ADD KEY `user_id_user` (`user_id_user`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`idcapteur`),
  ADD KEY `salle_idsalle` (`salle_idsalle`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`idcinema`),
  ADD KEY `user_id_user` (`user_id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcommentaire`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `diffuser`
--
ALTER TABLE `diffuser`
  ADD PRIMARY KEY (`idseance`),
  ADD KEY `Film_id_film` (`Film_id_film`),
  ADD KEY `salle_idsalle` (`salle_idsalle`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_cinema` (`id_cinema`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `user_id_user` (`user_id_user`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`),
  ADD UNIQUE KEY `numero` (`numero`,`cinema_idcinema`) USING BTREE,
  ADD KEY `cinema_idcinema` (`cinema_idcinema`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `idbillet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `idcapteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `idcinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `diffuser`
--
ALTER TABLE `diffuser`
  MODIFY `idseance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idsalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`Film_id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`idseance`) REFERENCES `diffuser` (`idseance`),
  ADD CONSTRAINT `billet_ibfk_3` FOREIGN KEY (`id_cinema`) REFERENCES `cinema` (`idcinema`),
  ADD CONSTRAINT `billet_ibfk_4` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`salle_idsalle`) REFERENCES `salle` (`idsalle`);

--
-- Contraintes pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `diffuser`
--
ALTER TABLE `diffuser`
  ADD CONSTRAINT `diffuser_ibfk_1` FOREIGN KEY (`Film_id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `diffuser_ibfk_2` FOREIGN KEY (`salle_idsalle`) REFERENCES `salle` (`idsalle`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_cinema`) REFERENCES `cinema` (`idcinema`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`cinema_idcinema`) REFERENCES `cinema` (`idcinema`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
