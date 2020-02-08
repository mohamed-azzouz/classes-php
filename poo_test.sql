-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 fév. 2020 à 18:18
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
-- Base de données :  `poo_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `firstname`, `lastname`, `password`) VALUES
(126, 'Serge', 'serge@laplateforme.io', 'serge', 'serge', 'serge'),
(125, 'Serge', 'serge@laplateforme.io', 'serge', 'serge', 'serge'),
(124, 'Serge', 'serge@laplateforme.io', 'serge', 'serge', 'serge'),
(123, 'Serge', 'serge@laplateforme.io', 'serge', 'serge', 'serge');

-- --------------------------------------------------------

--
-- Structure de la table `userpdo`
--

DROP TABLE IF EXISTS `userpdo`;
CREATE TABLE IF NOT EXISTS `userpdo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `userpdo`
--

INSERT INTO `userpdo` (`id`, `login`, `email`, `firstname`, `lastname`, `password`) VALUES
(26, 'momo', 'mohamed.azzouz@laplateforme.io', 'momo', 'momo', 'momo'),
(25, 'momo', 'mohamed.azzouz@laplateforme.io', 'momo', 'momo', 'momo'),
(24, 'momo', 'mohamed.azzouz@laplateforme.io', 'momo', 'momo', 'momo'),
(23, 'momo', 'mohamed.azzouz@laplateforme.io', 'momo', 'momo', 'momo'),
(22, 'momo', 'mohamed.azzouz@laplateforme.io', 'momo', 'momo', 'momo'),
(21, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(20, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(19, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(18, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(17, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(16, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(15, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo'),
(14, 'lolo', 'lolo@laplateforme.io', 'lolo', 'lolo', 'lolo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
