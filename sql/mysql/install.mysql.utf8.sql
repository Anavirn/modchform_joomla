-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 13 avr. 2018 à 07:42
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jobs`
--

-- --------------------------------------------------------

--
-- Structure de la table `job1`
--

CREATE TABLE `job1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `job1`
--

INSERT INTO `job1` (`id`, `name`) VALUES
(1, 'Infirmier'),
(2, 'Aide-Soignant'),
(3, 'Médecin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `job1`
--
ALTER TABLE `job1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `job1`
--
ALTER TABLE `job1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;