-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 mai 2024 à 09:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

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
(2, 10, 13, 10, 6, 1, 4, 1);

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
(4, 'hip\'s cinema', '11 rue des chiens', 12);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcommentaire` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1, 0, 3, '2024-05-05 19:30:00', 0, 50, 10),
(2, 0, 3, '2024-05-05 20:00:00', 0, 50, 10),
(3, 12, 6, '2024-05-15 19:00:00', 0, 50, 10),
(4, 13, 6, '2024-05-24 12:00:00', 1, 49, 10),
(8, 14, 6, '2027-10-31 18:30:00', 0, 50, 10);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFAQ` int(11) NOT NULL,
  `FAQcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(12, 'Dune 2', 'Dune partie 2', 3600, 'aventure', 1, '../public/assets/img/OIP.jpeg', NULL),
(13, 'Coco', 'Malgré le fait que sa famille ait banni la musique depuis des générations, Miguel rêve de devenir un musicien accompli comme son idole Ernesto de la Cruz. Désespéré de prouver son talent et suite à une mystérieuse série d\'événements, Miguel se retrouve dans le coloré et éblouissant territoire des morts. Sur son chemin, il rencontre le charmant filou Héctor, et ensemble, ils embarquent dans une aventure extraordinaire afin de découvrir la vraie histoire de la famille de Miguel.', 4080, 'fantasy/Aventure', 1, '../public/assets/img/coco.jpeg', '2024-05-15'),
(14, 'Avatar', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na\'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d\'une femme Na\'vi. Alors qu\'un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 9720, 'SF/Action', 1, '../public/assets/img/avatar.jpeg', '2024-05-06'),
(15, 'Inception', 'Dom Cobb est un voleur expérimenté dans l\'art périlleux de `l\'extraction\' : sa spécialité consiste à s\'approprier les secrets les plus précieux d\'un individu, enfouis au plus profond de son subconscient, pendant qu\'il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l\'univers trouble de l\'espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier. Cependant, une ultime mission pourrait lui permettre de retrouver sa vie d\'avant.', 8880, 'SF/Action', 1, '../public/assets/img/inception.jpeg', '2024-05-12'),
(16, 'Intersellar', 'Dans un proche futur, la Terre est devenue hostile pour l\'homme. Les tempêtes de sable sont fréquentes et il n\'y a plus que le maïs qui peut être cultivé, en raison d\'un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu\'une force qu\'il ne peut expliquer lui indique les coordonnées d\'une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l\'humanité.', 10140, 'SF/Aventure', 1, '../public/assets/img/interstellar.jpg', '2024-06-04');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id_user` int(11) NOT NULL,
  `commentaire_idcommentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(7, 2, 60, 1);

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
(10, 'martin', 'hippolyte', 'hip', 'hippomartin03@gmail.com', '$2y$10$/ecpXLJQXndnoXH5Ei7VNuuONzjR0WBzeqpPsoWxq5/9RpMtPYTW6', 'client'),
(12, 'martin', 'hippolyte', 'hipGerant', 'hippomartin@gmail.com', '$2y$10$L5YMOJyBxXT2LSYYUW6lgOLkwyr0ZPkUB8DggIERdV3bt6Yk5sUV2', 'gerant');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`idbillet`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`idcapteur`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`idcinema`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcommentaire`);

--
-- Index pour la table `diffuser`
--
ALTER TABLE `diffuser`
  ADD PRIMARY KEY (`idseance`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFAQ`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`);

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
  MODIFY `idbillet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `idcapteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `idcinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcommentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `diffuser`
--
ALTER TABLE `diffuser`
  MODIFY `idseance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFAQ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idsalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
