-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Janvier 2018 à 04:33
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestionvacataires`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE IF NOT EXISTS `contrats` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_SIGNE` int(255) NOT NULL,
  `PRIXTD` int(255) DEFAULT NULL,
  `PRIXCM` int(255) DEFAULT NULL,
  `PRIXTP` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_CONTRAT_PERSONNELS` (`ID_SIGNE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `contrats`
--

INSERT INTO `contrats` (`ID`, `ID_SIGNE`, `PRIXTD`, `PRIXCM`, `PRIXTP`) VALUES
(1, 3, 50, 50, 80),
(2, 2, 50, 50, 40);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_ENSEIGNE` int(255) NOT NULL,
  `ID_APPARTIENT` int(255) NOT NULL,
  `ID_VALIDE_COURS` int(255) NOT NULL,
  `LIBELLE` varchar(255) DEFAULT NULL,
  `TYPE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_COURS_PERSONNELS` (`ID_ENSEIGNE`),
  KEY `I_FK_COURS_FORMATIONS` (`ID_APPARTIENT`),
  KEY `I_FK_COURS_PERSONNELS1` (`ID_VALIDE_COURS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`ID`, `ID_ENSEIGNE`, `ID_APPARTIENT`, `ID_VALIDE_COURS`, `LIBELLE`, `TYPE`) VALUES
(2, 2, 1, 1, 'php', 'TP'),
(7, 2, 1, 1, 'php', 'CM'),
(8, 3, 1, 1, 'java', 'CM');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_VALIDE_DOC` int(255) NOT NULL,
  `ID_DOC_COURS` int(255) DEFAULT NULL,
  `ID_AVOIR_DOC` int(255) DEFAULT NULL,
  `LIBELLEDOCUMENT` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `ETATDOCUMENT` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_DOCUMENTS_PERSONNELS` (`ID_VALIDE_DOC`),
  KEY `I_FK_DOCUMENTS_COURS` (`ID_DOC_COURS`),
  KEY `I_FK_DOCUMENTS_PERSONNELS1` (`ID_AVOIR_DOC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`ID`, `ID_VALIDE_DOC`, `ID_DOC_COURS`, `ID_AVOIR_DOC`, `LIBELLEDOCUMENT`, `URL`, `ETATDOCUMENT`) VALUES
(4, 6, NULL, NULL, 'racine carre', '2018-01/1200px-Nuvola_apps_edu_mathematics_blue-p.svg.png', NULL),
(5, 6, NULL, NULL, 'cercle', '2018-01/images.png', NULL),
(6, 6, NULL, NULL, 'antenne', '2018-01/antenna-with-signal-lines-symbol_icon-icons.com_56573.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_DIRIGE` int(255) NOT NULL,
  `ID_SUPERVISE` int(255) NOT NULL,
  `LIBELLEFORMATION` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `I_FK_FORMATIONS_PERSONNELS` (`ID_DIRIGE`),
  KEY `I_FK_FORMATIONS_PERSONNELS1` (`ID_SUPERVISE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`ID`, `ID_DIRIGE`, `ID_SUPERVISE`, `LIBELLEFORMATION`) VALUES
(1, 3, 3, 'miage'),
(3, 1, 1, 'imr');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE IF NOT EXISTS `horaires` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `ID_PLANIFIE` int(255) NOT NULL,
  `DATEHORAIRE` varchar(255) DEFAULT NULL,
  `DUREE` double(255,2) DEFAULT NULL,
  `SALLE` varchar(255) DEFAULT NULL,
  `ETATHORAIRE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_HORAIRES_COURS` (`ID_PLANIFIE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `horaires`
--

INSERT INTO `horaires` (`ID`, `ID_PLANIFIE`, `DATEHORAIRE`, `DUREE`, `SALLE`, `ETATHORAIRE`) VALUES
(2, 8, '2018-01-16 15:00:00', 5.00, '37', 1),
(12, 2, '2018-01-09 08:21:00', 4.00, '107', 1),
(13, 2, '2018-01-25 14:30', 4.00, '107', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE IF NOT EXISTS `personnels` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `MDP` varchar(255) DEFAULT NULL,
  `TEL` int(50) DEFAULT NULL,
  `ROLE` int(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `personnels`
--

INSERT INTO `personnels` (`ID`, `NOM`, `PRENOM`, `EMAIL`, `MDP`, `TEL`, `ROLE`) VALUES
(1, 'Bonte', 'Patricia', 'patricia.bonte@uha.fr', '04e6f3bca0d940b47b477d89cc9d3e92d03f22dd', 654124785, 1),
(2, 'joel', 'heinis', 'joel.heinis@uha.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 663731871, 2),
(3, 'elaslaoui', 'nabil', 'admin@uha.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 663731871, 2),
(6, 'elaslaoui', 'nabil', 'responsableF@uha.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 12548785, 3);

-- --------------------------------------------------------

--
-- Structure de la table `virements`
--

CREATE TABLE IF NOT EXISTS `virements` (
  `ID` int(2) NOT NULL,
  `ID_VALIDE_VIREMENT` int(255) NOT NULL,
  `ID_AVOIR_VIREMENT` int(255) NOT NULL,
  `ETATVIREMENT` tinyint(1) DEFAULT NULL,
  `MONTANT` double(255,2) DEFAULT NULL,
  `DATEVIREMENT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_VIREMENTS_PERSONNELS` (`ID_VALIDE_VIREMENT`),
  KEY `I_FK_VIREMENTS_PERSONNELS1` (`ID_AVOIR_VIREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `virements`
--

INSERT INTO `virements` (`ID`, `ID_VALIDE_VIREMENT`, `ID_AVOIR_VIREMENT`, `ETATVIREMENT`, `MONTANT`, `DATEVIREMENT`) VALUES
(0, 6, 2, 1, 160.00, '2018-01-12 04:25:18'),
(2, 6, 3, 1, 400.00, '2018-01-12 12:55:17');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`ID_SIGNE`) REFERENCES `personnels` (`ID`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`ID_ENSEIGNE`) REFERENCES `personnels` (`ID`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`ID_APPARTIENT`) REFERENCES `formations` (`ID`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`ID_VALIDE_COURS`) REFERENCES `personnels` (`ID`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`ID_VALIDE_DOC`) REFERENCES `personnels` (`ID`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`ID_DOC_COURS`) REFERENCES `cours` (`ID`),
  ADD CONSTRAINT `documents_ibfk_3` FOREIGN KEY (`ID_AVOIR_DOC`) REFERENCES `personnels` (`ID`);

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`ID_DIRIGE`) REFERENCES `personnels` (`ID`),
  ADD CONSTRAINT `formations_ibfk_2` FOREIGN KEY (`ID_SUPERVISE`) REFERENCES `personnels` (`ID`);

--
-- Contraintes pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `horaires_ibfk_1` FOREIGN KEY (`ID_PLANIFIE`) REFERENCES `cours` (`ID`);

--
-- Contraintes pour la table `virements`
--
ALTER TABLE `virements`
  ADD CONSTRAINT `virements_ibfk_1` FOREIGN KEY (`ID_VALIDE_VIREMENT`) REFERENCES `personnels` (`ID`),
  ADD CONSTRAINT `virements_ibfk_2` FOREIGN KEY (`ID_AVOIR_VIREMENT`) REFERENCES `personnels` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
