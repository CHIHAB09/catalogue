-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 oct. 2020 à 12:44
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

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

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nom`) VALUES
(1, 'femme'),
(2, 'homme'),
(3, 'enfant'),
(4, 'home'),
(5, 'sportwear');

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`idimage`, `legend`, `URL`, `produits_idproduit`) VALUES
(1, 'lorem ipsum', 'sneakers', 1),
(2, 'test', 'adidas', 2);

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idproduit`, `modele`, `produit_evident`, `marque`, `descriptif`, `prix`) VALUES
(1, 'X-RAY', 0, 'puma', 'Matière supérieure en mesh, cuir velours et cuir synthétique\r\nSemelle extérieure en caoutchouc\r\nLabel tissé Archive No. 2 sur la languette\r\nBande PUMA sur le côté extérieur de la chaussure', '55.00'),
(2, 'Baskets Wired 366970 01 Black', 0, 'puma', 'Nouvelle Collection Puma 2020\r\nModèle Wired 366970 01\r\n• Basket légère en mesh respirant\r\n• Logo Puma au talon\r\n• Patch Puma sur la languette\r\n• Lacets ronds\r\n• Elastique de maintien imprimé Puma sur la pointe\r\n• Semelle intérieure SoftFoam pour confort optimal\r\n• Semelle imprimée Puma certifiant l\'authenticité\r\nLivrées dans la boîte officielle Puma\r\nTAILLE ET COUPE\r\nCe produit taille normalement\r\nPrenez votre taille habituelle\r\nLa paire photographiée est un modèle taille 40\r\nCOMPOSITION\r\nDessus : Textile et Synthétique\r\nDoublure : Textile\r\nSemelle : Caoutchouc', '70.00'),
(3, 'futur rider play on', 0, 'puma', 'Le nouveau modèle Puma Future Rider Play On de Puma a été inspiré par les Puma Fast Rider 1980. Il associe ici une combinaison de ripstop et de cuir, un coloris coloré, un rembourrage confortable, des blocs stabilisateurs de talon des deux côtés, une semelle intermédiaire amortissante et une semelle extérieure épaisse.\r\nCaractéristiques :\r\ncoupe basse\r\nrembourrage comfortable\r\nmélange de ripstop et de cuir\r\nstabilisateurs de talon\r\nsemelle intermédiaire amortissante\r\nsemelle épaisse\r\ndétails logo Puma\r\nsemelle : caoutchouc\r\nmatériau extérieur : textile, cuir\r\nmatériau intérieur : textile', '60.00'),
(4, 'Heart Bio Hack', 0, 'Puma', 'lorem ipsum', '58.50');

--
-- Déchargement des données de la table `produits_has_categorie`
--

INSERT INTO `produits_has_categorie` (`produits_id`, `categorie_id`) VALUES
(1, 3),
(1, 5);

--
-- Déchargement des données de la table `utlisateurs`
--

INSERT INTO `utlisateurs` (`id`, `nom`, `prenom`, `pseudo`, `pwd`) VALUES
(1, 'cherifi', 'chihab', 'chichi', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
