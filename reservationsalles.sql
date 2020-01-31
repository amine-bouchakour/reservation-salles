-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 jan. 2020 à 00:04
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
-- Base de données :  `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(33, 'jacques', '$2y$10$LhuHi2XeU68D6JlQ1awJ0uvUm2ES8Xx2T6hJf0nMJ9TsZiG57IE3a'),
(31, 'paul', '$2y$10$XYn4UruqCqWQ0IFmyURl/eRNuL8pyl9uAW6mIvyNcAULm2vsH9vFG'),
(34, 'aurÃ©lie', '$2y$10$Qh8HW881SFBdJ6PKD/XNl.x6nEzulvFm3BqFqzJjvxh5/3vPCg4Se');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
