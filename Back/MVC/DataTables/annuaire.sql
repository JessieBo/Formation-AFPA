-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 29 jan. 2021 à 08:53
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
-- Base de données :  `annuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `telephone` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=859 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `telephone`, `email`) VALUES
(758, 'Hoche', 'Maxime', '0767643706', 'm.hoche@orange.fr'),
(759, 'Nicaud', 'Cherry', '0935917835', 'c.nicaud@orange.fr'),
(760, 'Delacre', 'Paul', '0699894442', 'p.delacre@hotmail.com'),
(761, 'Lescure', 'Pierre', '0701055388', 'p.lescure@yahoo.com'),
(762, 'Durand', 'Marguerite', '0587949098', 'm.durand@wanadoo.fr'),
(763, 'Restoueix', 'Florian', '0773994491', 'f.restoueix@orange.fr'),
(764, 'Charlemagne', 'Simone', '0957280329', 's.charlemagne@hotmail.com'),
(765, 'Dupont', 'Francis', '0654956762', 'f.dupont@gmail.com'),
(766, 'Chemin', 'Fred', '0535652633', 'f.chemin@hotmail.com'),
(767, 'Delacre', 'Simone', '0832967083', 's.delacre@wanadoo.fr'),
(768, 'Valadas', 'Fred', '0694674498', 'f.valadas@wanadoo.fr'),
(769, 'Magnoux', 'Bernard', '0799398198', 'b.magnoux@gmail.com'),
(770, 'Nicaud', 'Francis', '0533679247', 'f.nicaud@orange.fr'),
(771, 'Comin', 'Pierre', '0849985254', 'p.comin@wanadoo.fr'),
(772, 'Lescure', 'Nathalie', '0782769260', 'n.lescure@wanadoo.fr'),
(773, 'Comin', 'Raoul', '0523136892', 'r.comin@yahoo.com'),
(774, 'Valadas', 'Florian', '0949049028', 'f.valadas@gmail.com'),
(775, 'Restoueix', 'Bernard', '0879460789', 'b.restoueix@yahoo.com'),
(776, 'Duchamp', 'Simone', '0673655693', 's.duchamp@wanadoo.fr'),
(777, 'Charlemagne', 'Fred', '0597430350', 'f.charlemagne@gmail.com'),
(778, 'Chemin', 'Nicolas', '0965860802', 'n.chemin@gmail.com'),
(779, 'Comin', 'Cherry', '0549358830', 'c.comin@wanadoo.fr'),
(780, 'Lescure', 'Fred', '0938834198', 'f.lescure@orange.fr'),
(781, 'Martin', 'Florian', '0896034788', 'f.martin@orange.fr'),
(782, 'Bost', 'Pierre', '0667481757', 'p.bost@gmail.com'),
(783, 'Comin', 'Nicolas', '0724282592', 'n.comin@gmail.com'),
(784, 'Martin', 'Nathalie', '0502505733', 'n.martin@wanadoo.fr'),
(785, 'Durand', 'Mila', '0572028652', 'm.durand@yahoo.com'),
(786, 'Comin', 'Nathalie', '0649509539', 'n.comin@orange.fr'),
(787, 'Nicaud', 'Marguerite', '0931989025', 'm.nicaud@gmail.com'),
(788, 'Nicaud', 'Pierre', '0664361901', 'p.nicaud@yahoo.com'),
(789, 'Duchamp', 'Mila', '0520247099', 'm.duchamp@gmail.com'),
(790, 'Adam', 'Marie', '0566554408', 'm.adam@wanadoo.fr'),
(791, 'Lescure', 'Marie', '0954092207', 'm.lescure@wanadoo.fr'),
(792, 'Dupont', 'Cherry', '0869211578', 'c.dupont@orange.fr'),
(793, 'Durand', 'Pierre', '0901961772', 'p.durand@yahoo.com'),
(794, 'Martin', 'Florian', '0533354017', 'f.martin@gmail.com'),
(795, 'Duchamp', 'Fred', '0801556498', 'f.duchamp@gmail.com'),
(796, 'Martin', 'Florian', '0967829257', 'f.martin@yahoo.com'),
(797, 'Adam', 'Raoul', '0801624600', 'r.adam@hotmail.com'),
(798, 'Lescure', 'Pierre', '0524237848', 'p.lescure@hotmail.com'),
(799, 'Restoueix', 'Marguerite', '0856776583', 'm.restoueix@yahoo.com'),
(800, 'Durand', 'Nathalie', '0822332804', 'n.durand@yahoo.com'),
(801, 'Nicaud', 'Isabelle', '0872716477', 'i.nicaud@orange.fr'),
(802, 'Lescure', 'Marie', '0924102224', 'm.lescure@gmail.com'),
(803, 'Morillon', 'Florian', '0528728915', 'f.morillon@wanadoo.fr'),
(804, 'Dupont', 'Simone', '0904204822', 's.dupont@yahoo.com'),
(805, 'Durand', 'Paul', '0809862191', 'p.durand@yahoo.com'),
(806, 'Charlemagne', 'Marguerite', '0518298745', 'm.charlemagne@wanadoo.fr'),
(807, 'Vanbeck', 'Bernard', '0789903398', 'b.vanbeck@gmail.com'),
(808, 'Charlemagne', 'Raoul', '0858664298', 'r.charlemagne@yahoo.com'),
(809, 'Adam', 'Florian', '0943250435', 'f.adam@wanadoo.fr'),
(810, 'Duchamp', 'Karine', '0790411836', 'k.duchamp@yahoo.com'),
(811, 'Morillon', 'Nicolas', '0569380174', 'n.morillon@orange.fr'),
(812, 'Vanbeck', 'Pierre', '0963275595', 'p.vanbeck@gmail.com'),
(813, 'Delacre', 'Pierre', '0680727328', 'p.delacre@hotmail.com'),
(814, 'Nicaud', 'Fred', '0816213886', 'f.nicaud@orange.fr'),
(815, 'Nicaud', 'Isabelle', '0530460139', 'i.nicaud@orange.fr'),
(816, 'Restoueix', 'Fred', '0744965519', 'f.restoueix@wanadoo.fr'),
(817, 'Charlemagne', 'Florian', '0691361533', 'f.charlemagne@yahoo.com'),
(818, 'Charlemagne', 'Bernard', '0799279430', 'b.charlemagne@wanadoo.fr'),
(819, 'Charlemagne', 'Simone', '0501291833', 's.charlemagne@orange.fr'),
(820, 'Vanbeck', 'Isabelle', '0801508932', 'i.vanbeck@yahoo.com'),
(821, 'Valadas', 'Paul', '0842998089', 'p.valadas@yahoo.com'),
(822, 'Chemin', 'Maxime', '0805950949', 'm.chemin@yahoo.com'),
(823, 'Adam', 'Paul', '0766004963', 'p.adam@hotmail.com'),
(824, 'Adam', 'Paul', '0569912643', 'p.adam@wanadoo.fr'),
(825, 'Dupont', 'Cherry', '0994606449', 'c.dupont@orange.fr'),
(826, 'Magnoux', 'Nicolas', '0927152076', 'n.magnoux@orange.fr'),
(827, 'Lescure', 'Marie', '0522948879', 'm.lescure@gmail.com'),
(828, 'Vanbeck', 'Bernard', '0916961023', 'b.vanbeck@hotmail.com'),
(829, 'Morillon', 'Bernard', '0743232942', 'b.morillon@wanadoo.fr'),
(830, 'Charlemagne', 'Cherry', '0542216891', 'c.charlemagne@gmail.com'),
(831, 'Lescure', 'Marguerite', '0554424457', 'm.lescure@orange.fr'),
(832, 'Chemin', 'Nicolas', '0989484058', 'n.chemin@gmail.com'),
(833, 'Charlemagne', 'Marguerite', '0539963940', 'm.charlemagne@hotmail.com'),
(834, 'Hoche', 'Fred', '0753929149', 'f.hoche@wanadoo.fr'),
(835, 'Hoche', 'Marie', '0980309969', 'm.hoche@hotmail.com'),
(836, 'Valadas', 'Marguerite', '0666143333', 'm.valadas@wanadoo.fr'),
(837, 'Durand', 'Pierre', '0769436773', 'p.durand@gmail.com'),
(838, 'Vanbeck', 'Simone', '0526740200', 's.vanbeck@hotmail.com'),
(839, 'Delacre', 'Nicolas', '0883395291', 'n.delacre@yahoo.com'),
(840, 'Adam', 'Cherry', '0982157723', 'c.adam@yahoo.com'),
(841, 'Vanbeck', 'Isabelle', '0973910804', 'i.vanbeck@yahoo.com'),
(842, 'Lescure', 'Simone', '0854466718', 's.lescure@wanadoo.fr'),
(843, 'Vanbeck', 'Francis', '0672241792', 'f.vanbeck@wanadoo.fr'),
(844, 'Bost', 'Paul', '0827909730', 'p.bost@orange.fr'),
(845, 'Magnoux', 'Nathalie', '0678259352', 'n.magnoux@orange.fr'),
(846, 'Martin', 'Francis', '0503328853', 'f.martin@yahoo.com'),
(847, 'Duchamp', 'Nicolas', '0520577250', 'n.duchamp@hotmail.com'),
(848, 'Magnoux', 'Maxime', '0835709233', 'm.magnoux@wanadoo.fr'),
(849, 'Delacre', 'Francis', '0595433899', 'f.delacre@orange.fr'),
(850, 'Martin', 'Karine', '0797342360', 'k.martin@wanadoo.fr'),
(851, 'Durand', 'Isabelle', '0865342024', 'i.durand@gmail.com'),
(852, 'Magnoux', 'Paul', '0987038913', 'p.magnoux@wanadoo.fr'),
(853, 'Dupont', 'Isabelle', '0949487354', 'i.dupont@yahoo.com'),
(854, 'Dupont', 'Cherry', '0672649429', 'c.dupont@yahoo.com'),
(855, 'Durand', 'Paul', '0651856102', 'p.durand@gmail.com'),
(856, 'Bost', 'Isabelle', '0507007547', 'i.bost@wanadoo.fr'),
(857, 'Adam', 'Marguerite', '0571280500', 'm.adam@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idu`, `login`, `mdp`) VALUES
(1, 'jean', 'valjean'),
(2, 'victor', 'hugo'),
(3, 'sacha', 'moi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
