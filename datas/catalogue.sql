-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 28 nov. 2020 à 22:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `idimage` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `legend` varchar(300) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `produits_idproduit` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idimage`),
  UNIQUE KEY `idimage_UNIQUE` (`idimage`),
  KEY `fk_images_produits_idx` (`produits_idproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `idMagasin` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `codepostal` varchar(4) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`idMagasin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `idproduit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modele` varchar(65) NOT NULL,
  `produit_evident` tinyint(4) UNSIGNED NOT NULL,
  `marque` varchar(45) NOT NULL,
  `descriptif` text NOT NULL,
  `prix` decimal(5,2) UNSIGNED NOT NULL,
  PRIMARY KEY (`idproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits_has_categorie`
--

DROP TABLE IF EXISTS `produits_has_categorie`;
CREATE TABLE IF NOT EXISTS `produits_has_categorie` (
  `produits_id` int(10) UNSIGNED NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`produits_id`,`categorie_id`),
  KEY `fk_produits_has_categorie_categorie1_idx` (`categorie_id`),
  KEY `fk_produits_has_categorie_produits1_idx` (`produits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idpromotion` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reduction` tinyint(3) UNSIGNED NOT NULL,
  `debut` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `produits_idproduit` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idpromotion`),
  KEY `fk_promotion_produits1_idx` (`produits_idproduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_produits` FOREIGN KEY (`produits_idproduit`) REFERENCES `produits` (`idproduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits_has_categorie`
--
ALTER TABLE `produits_has_categorie`
  ADD CONSTRAINT `fk_produits_has_categorie_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`idcategorie`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_produits_has_categorie_produits1` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`idproduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `fk_promotion_produits1` FOREIGN KEY (`produits_idproduit`) REFERENCES `produits` (`idproduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
