-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 juin 2023 à 07:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestions_notes`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) NOT NULL,
  `prenom` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `mot_pass` varchar(255) NOT NULL,
  `fonction` varchar(254) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `prenom`, `email`, `mot_pass`, `fonction`) VALUES
(8, 'sawadogo', 'tassere', 'sawadogo@gmail.com', '1234', 'admin'),
(10, 'roo', 'roo', 'zoo@gmail.com', '123456', 'user'),
(9, 'FRee', 'COL', 'sawa@gmail.com', '12345', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `id_annee` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_annee`),
  UNIQUE KEY `ANNEE_PK` (`id_annee`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(254) NOT NULL,
  `effectif` int(11) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) NOT NULL,
  `prenom` varchar(254) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(254) NOT NULL,
  `genre` varchar(254) NOT NULL,
  `nom_tuteur` varchar(255) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `classe` varchar(15) NOT NULL,
  `moyenne` varchar(255) NOT NULL,
  PRIMARY KEY (`id_eleve`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `genre`, `nom_tuteur`, `telephone`, `classe`, `moyenne`) VALUES
(28, 'Sawdogo', 'Farida', '2023-06-14', 'Issia', 'homme', 'Sawadogo', '63128574', '4ex', ''),
(27, 'zabre ', 'Djeneba', '2023-06-15', 'fofo', 'femme', 'ZabrÃ©', '75981402', '5ex', ''),
(26, 'Zabre', 'Mohamed', '2023-06-14', 'fofo', 'homme', 'ZabrÃ©', '75981402', '6ex', '');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `id_annee` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  PRIMARY KEY (`id_annee`,`id_eleve`),
  KEY `INSCRIT_FK` (`id_annee`),
  KEY `INSCRIT_FK2` (`id_eleve`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `moyenne`
--

DROP TABLE IF EXISTS `moyenne`;
CREATE TABLE IF NOT EXISTS `moyenne` (
  `id_moyenne` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `valeur` float DEFAULT NULL,
  `rang` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_moyenne`),
  UNIQUE KEY `MOYENNE_PK` (`id_moyenne`),
  KEY `POSSEDE_FK` (`id_eleve`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id_parent` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) NOT NULL,
  `prenom` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mot_pass` varchar(254) NOT NULL,
  PRIMARY KEY (`id_parent`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id_parent`, `nom`, `prenom`, `email`, `telephone`, `mot_pass`) VALUES
(36, 'KaborÃ©', 'Alex', 'ales1@gmail.com', '54897501', '9193'),
(35, 'Derra', 'Adoulaye', 'derra@gmail.com', '71256348', '22AA'),
(34, 'Derra', 'Latifa', 'latifa@gmail.com', '61254623', '633A'),
(33, 'Dicko', 'Boureima', 'dicko@gmail.com', '56421589', '4412'),
(32, 'KaborÃ©', 'Sadia', 'sadia@gmail.com', '63124589', '6691'),
(29, 'Bary ', 'Ibrahim', 'bary@gmail.com', '75891200', '7691'),
(30, 'Diallo', 'Djeneba', 'diallo@gmail.com', '76853645', 'A003'),
(31, 'Fofana', 'Lassane', 'fofo@gmail.com', '52141610', '33A4'),
(44, 'ZabrÃ©', 'Boureima', 'goog@gmail.com', '75981402', '0801'),
(43, 'ZabrÃ©', 'Boureima', 'boure@gmail.com', '66548923', '5190'),
(42, 'Sawadogo', 'Tassere', 'tassere1@gmail.com', '63128574', '2700'),
(41, 'Sawadogo', 'Tassere', 'tassere@gmail.com', '57259830', '4072'),
(40, 'NikiÃ©ma', 'Marie', 'mari@gmail.com', '64789530', '2350'),
(39, 'Nana', 'Alphonse', 'alpho@gmail.com', '01234568', '9798'),
(38, 'KabrÃ©', 'Donal', 'donal@gmail.com', '55201478', '5643'),
(37, 'KaborÃ©', 'Alex', 'alex2@gmail.com', '78114520', '7A63');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
