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

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `genre`) VALUES
(11, 'Hommes'),
(12, 'Enfants'),
(15, 'Femme'),
(17, 'Sport'),
(18, 'Training');

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`idimage`, `legend`, `URL`, `produits_idproduit`) VALUES
(9, 'Puma en tissu de couleur noir et rose', '67c0ee30c97d57b8aa7ec770c2b81012.jpg', 5),
(10, 'Puma en tissu de couleur noir et rose', '67c0ee30c97d57b8aa7ec770c2b81012.jpg', 5),
(16, 'Puma en tissu de couleur noir et rose', '67c0ee30c97d57b8aa7ec770c2b81012.jpg', 5),
(17, 'Matiére en semi-cuir', '61491ef8e95267ba3b2555617945b584.jpg', 6),
(18, 'Puma en tissu de couleur noir et rose', '67c0ee30c97d57b8aa7ec770c2b81012.jpg', 5),
(19, 'Puma en tissu de couleur noir et rose', '67c0ee30c97d57b8aa7ec770c2b81012.jpg', 5),
(20, 'Matiére en semi-cuir', '61491ef8e95267ba3b2555617945b584.jpg', 6),
(21, 'Matiére en tissu', '5b965f8eb752536635a78cc22b55513f.jpg', 7),
(22, 'Matiére en tissu', '5b965f8eb752536635a78cc22b55513f.jpg', 7),
(23, 'Puma Futur rider Selection couleur Violet , mauve', '7e29c07b9226ea6c798e8a4adf8937e3.jpg', 8),
(24, 'Puma Suede Femme Heart Hyper Rose', '85f0610b36759debf8ef5275d723e64c.jpg', 9),
(25, 'Puma Suede Femme Heart Hyper Rose', '85f0610b36759debf8ef5275d723e64c.jpg', 9),
(26, 'Puma Suede Femme Heart Hyper Rose', '85f0610b36759debf8ef5275d723e64c.jpg', 9),
(27, 'Puma Suede Femme Heart Hyper Rose', '85f0610b36759debf8ef5275d723e64c.jpg', 9),
(28, 'Puma Mario', '4f3a09bb749207c2a6690e3cd5b8efde.jpg', 10),
(29, 'puma RS rose gris', '88840643b25e1e47a7377ac0aaf859d0.jpg', 11),
(30, 'puma RS rose gris', '0e102c3b81a0531bca6ad4ddfb464bb2.jpg', 11),
(31, 'Botte rose cuire', '7103368a04c2f21385d454b2c3756097.jpg', 12),
(32, 'Botte rose', 'f8df4f4ea94d56d2922bd3c6b23b9286.jpg', 12),
(33, 'puma de couleur noir et blanc en din', '7ed607ad9dc8128a421021dc0382ac7e.jpg', 13),
(34, 'puma de couleur noir et blanc en din', 'acabe6b167c4a776e0c5420092a27a3b.jpg', 13),
(35, 'puma de couleur noir et blanc en din', '0559ca09ee8cc1ec700d63f941f12a52.jpg', 13),
(36, 'chaussure enfant couleur mauve', '4aa26da668ec130d087f9cd2c5b5a3f0.jpg', 14),
(37, 'chaussure enfant couleur mauve', 'b174a3bffe389a1034a886bdebb0f5e1.jpg', 14),
(38, 'chaussure enfant couleur mauve', '38fa4c0609a2fdaeaf12d4469152ea26.jpg', 14),
(39, 'puma sneaker femme couleur rose perle', 'a7c893a9fb67d4ecc211341f56bd9bcd.jpg', 15),
(40, 'puma sneaker femme couleur rose perle', '893606edf5fb8d10f7a971c0f3abb196.jpg', 15),
(41, 'basket enfant jaune rouge noir', 'fbc91b4d8ecd092449bdf8246841f7a0.jpg', 16),
(42, 'chaussure de foot', 'c7340641b2b860a6c62fe64a5e2e4721.jpg', 17),
(43, 'basket enfant couleur bleu blanc rouge', '902a196f8f8ea5a84e2abaccaafedd46.jpg', 19),
(44, 'basket enfant couleur bleu blanc rouge', 'd484e68630db79dfe7b7733115d757ca.jpg', 19),
(45, 'pantalon de l&#039;equipe national italie', '614192b14a299d01621c52649e6741d1.jpg', 20),
(47, 'pantalon de l&#039;equipe national italie', 'd066c2c6acac9be74e4ebb112e13f7a6.jpg', 20),
(48, 'veste training', '6d59585fb4a799882c4721037c89b9d7.jpg', 21),
(49, 'Pantalon de training', '07835fb6b834604e08cc5a9464098b9b.jpg', 22),
(50, 'Pantalon de training', '77c3fe0eecd0533377285a7f41479a96.jpg', 22),
(51, 'veste training noir', '4606a28731040db7d5fc87308484d6c6.jpg', 23),
(52, 'veste training divers coloris', '13ef5777dee23ffd168373802d9d96cb.jpg', 24),
(53, 'chaussure enfant Monstre', 'c91e121b67a7923674c98f8c6875d6fa.jpg', 25),
(54, 'Basket Monstre enfant', 'a7c205795c7b58e446af07dce5c0a96c.jpg', 25),
(55, 'Basket Monstre enfant', '4a0553113717926dc2ad6a892bfffa71.jpg', 25);

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`idMagasin`, `nom`, `rue`, `numero`, `codepostal`, `ville`, `longitude`, `latitude`) VALUES
(4, 'PANTHERSNEAKERS', 'rue de l invention', '6', '1080', 'Molenbeek-saint-Jean', '50.85000000', '4.31670000'),
(5, 'PANTHERSNEAKERS', 'place houwaert', '26', '1210', 'Saint-Josse', '50.85000000', '4.36667000'),
(8, 'PANTHERSNEAKERS', 'place daillie', '785', '1030', 'Schaerbeek', '50.86741600', '4.37729800'),
(9, 'PANTHERSNEEAKERS', 'rue du charbon', '255', '100', 'Bruxelles', '50.84660000', '4.35280000');

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`idproduit`, `modele`, `produit_evident`, `marque`, `descriptif`, `prix`) VALUES
(5, 'Run', 0, 'Puma', 'Puma en tissu et solid pour tous les jours confortable et leger', '75.00'),
(6, 'Suède', 0, 'Puma', 'Puma de couleur blanche et écriture doré', '80.00'),
(7, 'RS', 0, 'Puma', 'couleur BLACK/RED/WHITE', '55.00'),
(8, 'Futur Rider Selection', 0, 'Puma', 'Puma fesant sportif et decontracter', '115.00'),
(9, 'Heart Full Flowers Pink', 0, 'Puma', 'CHaussure de tous les jours agreable a porte', '114.99'),
(10, 'Mario Edition', 1, 'Puma', 'Edition limite 3 coloris disponible', '245.00'),
(11, 'Puma RS rose', 0, 'Puma', 'Puma de matiere semi cuirre et tissu', '84.99'),
(12, 'Botte', 0, 'Puma', 'Botte pour femme ', '175.00'),
(13, 'Puma Suede Enfant', 0, 'Puma', 'puma en din', '65.00'),
(14, 'Puma Heart Patent', 0, 'Puma', 'Matiere cuire coloris mauve', '75.00'),
(15, 'Puma sneaker Rose', 0, 'Puma', 'Puma en tissus rose perle', '95.00'),
(16, 'XRAY enfant', 0, 'Puma', 'couleur jaune rouge noir', '55.00'),
(17, 'crampon multi', 0, 'Puma', 'chaussure de foot synthétique', '65.00'),
(19, 'RS enfant Blanc Rouge Bleu', 0, 'Puma', 'basket enfant sportif', '85.00'),
(20, 'Pantalon italie', 0, 'Puma', 'Pantalon de training', '45.00'),
(21, 'Vetse training Italie', 0, 'Pumma', 'Vest de l\'equipe national d\'italie', '65.00'),
(22, 'Pantalon training', 0, 'Puma', 'Pantalon training  divers coloris', '50.00'),
(23, 'Veste training', 0, 'Puma', 'Veste de couleur noir training', '38.00'),
(24, 'Veste training Cup', 0, 'Puma', 'Divers coloris disponible', '78.00'),
(25, 'Basket Monstre enfant', 0, 'Puma', 'Basket pour enfant 24 à32', '29.00');

--
-- Déchargement des données de la table `produits_has_categorie`
--

INSERT INTO `produits_has_categorie` (`produits_id`, `categorie_id`) VALUES
(5, 15),
(6, 12),
(7, 11),
(8, 17),
(9, 15),
(10, 11),
(11, 15),
(12, 15),
(13, 12),
(14, 12),
(15, 15),
(16, 12),
(17, 11),
(19, 12),
(20, 11),
(21, 11),
(22, 11),
(23, 11),
(24, 11),
(25, 12);

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`idpromotion`, `reduction`, `debut`, `fin`, `produits_idproduit`) VALUES
(4, 30, '2020-11-18 23:00:00', '2020-11-26 23:00:00', 7),
(5, 20, '2020-11-28 22:16:30', '0000-00-00 00:00:00', 19),
(6, 30, '2020-11-28 22:18:29', '0000-00-00 00:00:00', 6),
(7, 25, '2020-11-28 22:17:25', '0000-00-00 00:00:00', 14);

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `pseudo`, `pwd`) VALUES
(2, 'formateur', 'formateur', 'adminForma', '7139'),
(3, 'cherifi', 'chihab', 'chichi', '1793'),
(4, 'moi', 'toi', 'Toi', '8527');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
