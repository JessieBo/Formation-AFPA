-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 20 jan. 2021 à 12:20
-- Version du serveur :  8.0.18
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `abicom`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `idSect` int(11) NOT NULL,
  `raisonSociale` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adresseClient` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `codePostalClient` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `villeClient` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CA` int(11) NOT NULL,
  `effectif` int(11) NOT NULL,
  `telephoneClient` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `typeClient` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `natureClient` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `commentaireClient` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `idSect`, `raisonSociale`, `adresseClient`, `codePostalClient`, `villeClient`, `CA`, `effectif`, `telephoneClient`, `typeClient`, `natureClient`, `commentaireClient`) VALUES
(2, 1, 'AgriCorp', '32 Rue des allouettes', '19033', 'Brive', 1500000, 2000, '0555231245', 'Public', 'Secondaire', 'En approche'),
(3, 2, 'AgriMoon', '12 Rue des lampions', '19500', 'Objat', 80000, 12, '0555121415', 'Public', 'Principale', 'En approche'),
(4, 3, 'AgriGel', '10 Rue des lapins', '87000', 'Limoges', 40000, 10, '0555457458', 'Privé', 'Principale', 'En attente'),
(10, 3, 'Silice', '79 Rue des Maturins', '75008', 'Paris', 100000, 150, '0612121212', 'Privé', 'Principale', 'En négociation'),
(11, 1, 'Dastin', '89 Rue des anges', '81000', 'Narbonne', 45000, 60, '2323232323', 'Privé', 'Principale', 'En attente de validation'),
(13, 2, 'Accenture Agro', '99 Rue des granges', '31000', 'Toulouse', 800000, 600, '0145477896', 'Privé', 'Secondaire', 'Client avec un fort potentiel de développement'),
(18, 2, 'Xander', '12 rue Galiénie', '92300', 'Levallois Perret', 180000, 300, '0356895874', 'Public', 'Secondaire', 'Client vraiment très très intéressant !!!'),
(19, 1, 'Brut', '78 rue des fushias', '75002', 'Paris', 1000000, 2000, '0212457889', 'Privé', 'Secondaire', 'On avance\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `secteuractivite`
--

DROP TABLE IF EXISTS `secteuractivite`;
CREATE TABLE IF NOT EXISTS `secteuractivite` (
  `idSect` int(11) NOT NULL AUTO_INCREMENT,
  `activite` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idSect`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteuractivite`
--

INSERT INTO `secteuractivite` (`idSect`, `activite`) VALUES
(1, 'Administration'),
(2, 'Agro'),
(3, 'Industrie'),
(4, 'Service'),
(5, 'Electronique'),
(6, 'Commerce'),
(7, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `loginUser` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passUser` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `loginUser`, `passUser`) VALUES
(1, 'RespCom', 'RespCom'),
(2, 'RespDev', 'RespDev');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
