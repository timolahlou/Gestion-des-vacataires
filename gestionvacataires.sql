-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Décembre 2017 à 19:52
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
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `IDCONTRAT` int(11) NOT NULL AUTO_INCREMENT,
  `IDPERSONNEL` int(11) NOT NULL,
  `PRIXTD` int(11) DEFAULT NULL,
  `PRIXCM` int(11) DEFAULT NULL,
  `PRIXTP` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDCONTRAT`),
  KEY `FK_CONTRAT_PERSONNEL` (`IDPERSONNEL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `IDCOURS` int(11) NOT NULL AUTO_INCREMENT,
  `IDPERSONNEL` int(11) NOT NULL,
  `IDFORMATION` int(11) NOT NULL,
  `IDPERSONNEL_VALIDE_COURS` int(11) NOT NULL,
  `LIBELLE` varchar(255) DEFAULT NULL,
  `TYPE` varchar(255) DEFAULT NULL,
  `ETATCOURS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDCOURS`),
  KEY `FK_COURS_PERSONNEL` (`IDPERSONNEL`),
  KEY `FK_COURS_FORMATION` (`IDFORMATION`),
  KEY `FK_COURS_PERSONNEL1` (`IDPERSONNEL_VALIDE_COURS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `IDDOCUMENT` int(11) NOT NULL AUTO_INCREMENT,
  `IDPERSONNEL` int(11) NOT NULL,
  `IDPERSONNEL_AVOIR_DOC` int(11) NOT NULL,
  `LIBELLEDOCUMENT` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `ETATDOCUMENT` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDDOCUMENT`),
  KEY `FK_DOCUMENT_PERSONNEL` (`IDPERSONNEL`),
  KEY `FK_DOCUMENT_PERSONNEL1` (`IDPERSONNEL_AVOIR_DOC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `IDFORMATION` int(11) NOT NULL AUTO_INCREMENT,
  `IDPERSONNEL` int(11) NOT NULL,
  `LIBELLEFORMATION` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDFORMATION`),
  KEY `FK_FORMATION_PERSONNEL` (`IDPERSONNEL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `IDHORAIRE` int(11) NOT NULL AUTO_INCREMENT,
  `IDCOURS` int(11) NOT NULL,
  `DATEHORAIRE` datetime DEFAULT NULL,
  `DUREE` double(255,2) DEFAULT NULL,
  `SALLE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDHORAIRE`),
  KEY `FK_HORAIRE_COURS` (`IDCOURS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE IF NOT EXISTS `personnels` (
  `IDPERSONNEL` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) DEFAULT NULL,
  `PRENOM` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `MDP` varchar(255) DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPERSONNEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `personnels`
--

INSERT INTO `personnels` (`IDPERSONNEL`, `NOM`, `PRENOM`, `EMAIL`, `MDP`, `TEL`, `ROLE`) VALUES
(1, 'elaslaoui', 'nabil', 'nabilelaslaoui@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 663731871, 1);

-- --------------------------------------------------------

--
-- Structure de la table `supervise`
--

CREATE TABLE IF NOT EXISTS `supervise` (
  `IDPERSONNEL` int(11) NOT NULL,
  `IDFORMATION` int(11) NOT NULL,
  PRIMARY KEY (`IDPERSONNEL`,`IDFORMATION`),
  KEY `FK_SUPERVISE_FORMATION` (`IDFORMATION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `virement`
--

CREATE TABLE IF NOT EXISTS `virement` (
  `IDVIREMENT` int(11) NOT NULL,
  `IDPERSONNEL` int(11) NOT NULL,
  `IDPERSONNEL_AVOIR_VIREMENT` int(11) NOT NULL,
  `ETATVIREMENT` tinyint(1) DEFAULT NULL,
  `MONTANT` double(255,2) DEFAULT NULL,
  `DATEVIREMENT` datetime DEFAULT NULL,
  PRIMARY KEY (`IDVIREMENT`),
  KEY `FK_VIREMENT_PERSONNEL` (`IDPERSONNEL`),
  KEY `FK_VIREMENT_PERSONNEL1` (`IDPERSONNEL_AVOIR_VIREMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`IDFORMATION`) REFERENCES `formation` (`IDFORMATION`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`IDPERSONNEL_VALIDE_COURS`) REFERENCES `personnels` (`IDPERSONNEL`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`),
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`IDPERSONNEL_AVOIR_DOC`) REFERENCES `personnels` (`IDPERSONNEL`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`IDCOURS`) REFERENCES `cours` (`IDCOURS`);

--
-- Contraintes pour la table `supervise`
--
ALTER TABLE `supervise`
  ADD CONSTRAINT `supervise_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`),
  ADD CONSTRAINT `supervise_ibfk_2` FOREIGN KEY (`IDFORMATION`) REFERENCES `formation` (`IDFORMATION`);

--
-- Contraintes pour la table `virement`
--
ALTER TABLE `virement`
  ADD CONSTRAINT `virement_ibfk_1` FOREIGN KEY (`IDPERSONNEL`) REFERENCES `personnels` (`IDPERSONNEL`),
  ADD CONSTRAINT `virement_ibfk_2` FOREIGN KEY (`IDPERSONNEL_AVOIR_VIREMENT`) REFERENCES `personnels` (`IDPERSONNEL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
