-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 avr. 2024 à 12:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bijouxshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int NOT NULL AUTO_INCREMENT,
  `rue` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_postal` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `defaut` int DEFAULT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `adresseutilisateur`
--

DROP TABLE IF EXISTS `adresseutilisateur`;
CREATE TABLE IF NOT EXISTS `adresseutilisateur` (
  `id_utilisateur` int DEFAULT NULL,
  `id_adresse` int DEFAULT NULL,
  KEY `fk_adresse_utilisateur` (`id_adresse`),
  KEY `fk_utilisateur_adresse` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bijoux`
--

DROP TABLE IF EXISTS `bijoux`;
CREATE TABLE IF NOT EXISTS `bijoux` (
  `id_bijoux` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `courte_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`id_bijoux`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bijoux`
--

INSERT INTO `bijoux` (`id_bijoux`, `nom`, `prix`, `description`, `courte_description`, `quantite`) VALUES
(1, 'Collier en perle', '195.15', 'Collier court à chaînes multiples avec pendentif en perle\r\nAjoutez une touche féminine à votre tenue avec ce magnifique collier à chaînes multiples doté d\'un joli pendentif en perle.', 'Ajoutez une touche féminine à votre tenue avec ce magnifique collier à chaînes multiples doté d\'un joli pendentif en perle.', 15),
(2, 'Collier à billes à trois chaînes', '59.12', 'Description\r\nAjoutez une touche de couleur à votre tenue avec ce collier audacieux à trois chaînes.\r\n\r\n- Fermoir mousqueton\r\n- Longueur ajustable\r\n\r\nArticle # 37258398\r\nMatériaux\r\n100 % métal\r\nImporté\r\n', 'Ajoutez une touche de couleur à votre tenue avec ce collier audacieux à trois chaînes.\r\n- Fermoir mousqueton\r\n- Longueur ajustable', 20),
(3, 'Bracelets élastiques à billes caoutchoutées - Ens. de 3', '25,67', 'Description\r\nÉlégant et unique, cet ensemble de bracelets à billes caoutchoutées ajoutera assurément une touche de style à votre tenue.\r\n\r\n- Ensemble de trois\r\n- Élastique\r\n\r\nArticle # 37235785\r\nMatériaux\r\n100 % métal\r\nImporté\r\n', 'Élégant et unique, cet ensemble de bracelets à billes caoutchoutées ajoutera assurément une touche de style à votre tenue.', 25),
(4, 'Collier à chaînes doubles avec pendentif bâton', '67.12', 'Description\r\nTout en élégance, ce magnifique collier à doubles chaînes ajoutera une touche de style indéniable à votre tenue.\r\n\r\n- Pendentif bâton\r\n- Fermoir mousqueton\r\n- Longueur ajustable\r\n\r\nArticle # 37233394\r\nMatériaux\r\n100 % métal\r\nImporté\r\n', 'Tout en élégance, ce magnifique collier à doubles chaînes ajoutera une touche de style indéniable à votre tenue.', 98),
(5, 'Bracelets élastiques à billes - Ens. de 4', '34', 'Description\r\nAjoutez une touche d\'élégance à votre tenue avec cet ensemble de bracelets à billes.\r\n\r\n- Ensemble de 4\r\n- Élastique\r\n\r\nArticle # 37133554\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ajoutez une touche d\'élégance à votre tenue avec cet ensemble de bracelets à billes.', 12),
(6, 'Boutons d\'oreilles à pierres vertes et transparentes - 6 paires', '12.92', 'Description\r\nAccessoiriser votre style n\'aura jamais été aussi facile qu\'avec cet ensemble de six paires de boucles d\'oreilles.\r\n\r\n- Fermoirs à poussette\r\n- Pierres vertes et transparentes\r\n- 6 paires\r\n\r\nArticle # 36931167\r\nMatériaux\r\n100 % métal\r\nImporté\r\n', 'Accessoiriser votre style n\'aura jamais été aussi facile qu\'avec cet ensemble de six paires de boucles d\'oreilles.', 45),
(7, 'Collier court à chaînes multiples avec détails émaillés', '28.12', 'Description\r\nAjoutez une touche féminine à votre tenue avec ce magnifique collier à chaînes multiples doté d\'uniques détails émaillés.\r\n\r\n- Fermoir mousqueton\r\n- Longueur ajustable\r\n\r\nArticle # 37006778\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ajoutez une touche féminine à votre tenue avec ce magnifique collier à chaînes multiples doté d\'uniques détails émaillés.', 14),
(8, 'Boutons d\'oreilles et anneaux émaillés - 6 paires', '15.28', 'Description\r\nAccessoiriser votre style n\'aura jamais été aussi facile qu\'avec cet ensemble de six paires de boucles d\'oreilles.\r\n\r\n- Fermoirs à poussette\r\n- 6 paires\r\n\r\nArticle # 37046375\r\nMatériaux\r\n100 % métal\r\nImporté', 'Accessoiriser votre style n\'aura jamais été aussi facile qu\'avec cet ensemble de six paires de boucles d\'oreilles.', 59),
(9, 'Collier court avec pendentif circulaire', '58.14', 'Description\r\nAjoutez du style à votre tenue avec ce collier court doté d\'un magnifique pendentif circulaire.\r\n\r\n- Pendentif circulaire\r\n- Longueur ajustable\r\n- Fermoir mousqueton\r\n\r\nArticle # 37207825\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ajoutez du style à votre tenue avec ce collier court doté d\'un magnifique pendentif circulaire.', 36),
(10, 'Bagues larges - ens. de 3', '24.38', 'Description\r\nEnjolivez votre quotidien avec cet ensemble de magnifiques bagues qui sauront rehausser toutes vos tenues.\r\n\r\n- Ensemble de 3\r\n\r\nArticle # 479222\r\nMatériaux\r\n100 % métal\r\nImporté', 'Enjolivez votre quotidien avec cet ensemble de magnifiques bagues qui sauront rehausser toutes vos tenues.', 84),
(11, 'Anneaux avec pétales', '29.78', 'Description\r\nAjoutez une touche boho à votre tenue avec ces superbes anneaux décorés de jolis pétales de fleurs.\r\n\r\n- Fermoirs cliquet\r\n\r\nArticle # 37134505\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ajoutez une touche boho à votre tenue avec ces superbes anneaux décorés de jolis pétales de fleurs.', 45),
(12, 'Boucles d\'oreilles à pendentifs triples', '18.92', 'Description\r\nRevisitez les années 70 avec ces superbes boucles d\'oreilles à pendentifs à trois étages.\r\n\r\n- Fermoirs à poussette\r\n\r\nArticle # 37258658\r\nMatériaux\r\n100 % métal\r\nImporté', 'Revisitez les années 70 avec ces superbes boucles d\'oreilles à pendentifs à trois étages.', 47),
(13, 'Boutons d\'oreilles avec pendentifs rectangulaires', '16.90', 'Description\r\nCes magnifiques boutons d\'oreilles dotés de pendentifs rectangulaires sont l\'accessoire idéal pour rehausser votre style.\r\n\r\n- Fermoirs à poussette\r\n- Pendentifs rectangulaires\r\n\r\nArticle # 37262719\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ces magnifiques boutons d\'oreilles dotés de pendentifs rectangulaires sont l\'accessoire idéal pour rehausser votre style.', 15),
(14, 'Collier court à billes bleues et perles', '35.14', 'Description\r\nCe magnifique collier court est décoré de jolies billes bleues et de délicates perles.\r\n\r\n- Billes et perles\r\n- Longueur ajustable\r\n- Fermoir mousqueton\r\n\r\nArticle # 37083633\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ce magnifique collier court est décoré de jolies billes bleues et de délicates perles.', 5),
(15, 'Collier long avec pendentif à effet martelé', '16.90', 'Description\r\nAjoutez une touche brillante à votre tenue avec ce délicat collier doté d\'un unique pendentif à effet martelé. Un accessoire qui ne passera pas inaperçu.\r\n\r\n- Fermoir mousqueton\r\n- Longueur ajustable\r\n\r\nArticle # 36985407\r\nMatériaux\r\n100 % métal\r\nImporté', 'Ajoutez une touche brillante à votre tenue avec ce délicat collier doté d\'un unique pendentif à effet martelé. Un accessoire qui ne passera pas inaperçu.', 8);

-- --------------------------------------------------------

--
-- Structure de la table `bijouxcommande`
--

DROP TABLE IF EXISTS `bijouxcommande`;
CREATE TABLE IF NOT EXISTS `bijouxcommande` (
  `id_bijoux` int DEFAULT NULL,
  `id_commande` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  KEY `fk_film_commande` (`id_bijoux`),
  KEY `fk_commande_film` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bijouxcommande`
--

INSERT INTO `bijouxcommande` (`id_bijoux`, `id_commande`, `quantite`) VALUES
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `quantite` int DEFAULT NULL,
  `prix` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  `mode_paiement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `quantite`, `prix`, `statut`, `date_creation`, `id_utilisateur`, `mode_paiement`) VALUES
(7, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(8, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(9, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(10, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(11, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(12, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(13, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(14, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(15, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal'),
(16, 1, '59.12', 'En cours', '2024-04-23', 1, 'Paypal');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int NOT NULL AUTO_INCREMENT,
  `id_bijoux` int DEFAULT NULL,
  `chemin_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_image`),
  KEY `fk_image_film` (`id_bijoux`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `id_bijoux`, `chemin_image`) VALUES
(1, 1, 'assets/images/produit2.jpg'),
(2, 2, 'assets/images/produit3.jpg'),
(3, 3, 'assets/images/produit4.jpg'),
(4, 4, 'assets/images/produit5.jpg'),
(5, 5, 'assets/images/produit6.jpg'),
(6, 6, 'assets/images/produit7.jpg'),
(7, 7, 'assets/images/produit8.jpg'),
(8, 8, 'assets/images/produit9.jpeg'),
(9, 9, 'assets/images/produit9.jpg'),
(10, 10, 'assets/images/produit10.jpg'),
(11, 11, 'assets/images/produit11.jpeg'),
(12, 12, 'assets/images/produit12.jpeg'),
(13, 13, 'assets/images/produit13.jpeg'),
(14, 14, 'assets/images/produit14.jpeg'),
(15, 15, 'assets/images/produit16.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `description`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  `mot_de_passe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_role_utilisateur` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `telephone`, `date_naissance`, `id_role`, `mot_de_passe`) VALUES
(1, 'Mama', 'patricia', 'patriciaAdmin@gmail.com', '1111111111', '1965-02-09', 1, '$2y$10$5BXdLLQCbBsd4cOiR9/4t.T4Fxx5LsqiFrxyMNRs7MgXpuvG5cmbi'),
(2, 'Mama', 'Patricia', 'PatriciaClient@gmail.com', '0000000', '2024-04-06', 2, '$2y$10$5OJL1OyqASflr7v3KMRXKOPRx0j1.WPYPbP17pZSu8T0jefFpD1my');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresseutilisateur`
--
ALTER TABLE `adresseutilisateur`
  ADD CONSTRAINT `fk_adresse_utilisateur` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_utilisateur_adresse` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bijouxcommande`
--
ALTER TABLE `bijouxcommande`
  ADD CONSTRAINT `fk_commande_film` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `fk_film_commande` FOREIGN KEY (`id_bijoux`) REFERENCES `bijoux` (`id_bijoux`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_film` FOREIGN KEY (`id_bijoux`) REFERENCES `bijoux` (`id_bijoux`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_role_utilisateur` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
