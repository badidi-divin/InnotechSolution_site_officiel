-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 12 sep. 2023 à 18:46
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `heavens_entrepreneurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `Pseudo_admin` varchar(25) NOT NULL,
  `Mdp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `Pseudo_admin`, `Mdp_admin`) VALUES
(1, 'divin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Structure de la table `adult`
--

CREATE TABLE `adult` (
  `id_adult` int(11) NOT NULL,
  `Titre_adult` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adult`
--

INSERT INTO `adult` (`id_adult`, `Titre_adult`, `description`, `photo`) VALUES
(1, 'Graphisme', 'Jeune Etudiant', '644569e9dee313.81745994.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

CREATE TABLE `aime` (
  `id` int(11) NOT NULL,
  `id_blog` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id`, `id_blog`, `id_user`) VALUES
(1, 2, 28);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `nom`, `description`, `image`, `categorie`, `dates`) VALUES
(2, 'Excel des Entreprises', 'Notre Pays a beoin du numÃ©rique raison pour laquelle aujourd\'hui nous vous invitons Ã  participer Ã  notre masterClass sur Excel des entreprises', '6471d476edf792.55294346.jpg', 'MasterClass', '2023-05-25 12:53:21'),
(3, 'teet', 'teet', '64f74af9114518.00044691.jpg', 'MasterClass', '2023-09-05 15:36:25');

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_boutique` int(11) NOT NULL,
  `nom_boutique` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image_boutique` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie` varchar(100) NOT NULL,
  `affiche` int(11) NOT NULL,
  `certifie` int(11) NOT NULL,
  `monaie` varchar(25) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `nom_boutique`, `description`, `image_boutique`, `dates`, `categorie`, `affiche`, `certifie`, `monaie`, `id_utilisateurs`) VALUES
(2, 'Mary-jo', 'C\'est une boutique qui permet de vendre des habits en ligne', '648a02aca90410.15965594.jpg', '2023-06-14 17:48:26', 'Vetement', 1, 0, '', 26),
(5, 'test1', 'test3', '64a9db4cb9fe41.26269158.jpg', '2023-07-08 21:55:24', 'test9', 0, 0, 'TEST99', 26);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `designation`) VALUES
(1, 'MasterClass'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categ_video`
--

CREATE TABLE `categ_video` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categ_video`
--

INSERT INTO `categ_video` (`id`, `designation`) VALUES
(1, 'PublicitÃ©s'),
(3, 'Loisirs');

-- --------------------------------------------------------

--
-- Structure de la table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment_blog`
--

INSERT INTO `comment_blog` (`id`, `id_article`, `auteur`, `comment`, `dates`) VALUES
(1, 2, 'divin BADIDI', 'test', '2023-06-13 18:22:22');

-- --------------------------------------------------------

--
-- Structure de la table `comment_emploie`
--

CREATE TABLE `comment_emploie` (
  `id` int(11) NOT NULL,
  `id_emploie` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_entreprise`
--

CREATE TABLE `comment_entreprise` (
  `id` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_event`
--

CREATE TABLE `comment_event` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `comment` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_membres`
--

CREATE TABLE `comment_membres` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_produit`
--

CREATE TABLE `comment_produit` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `reseau` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `montant` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_projet`
--

CREATE TABLE `comment_projet` (
  `id` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment_service`
--

CREATE TABLE `comment_service` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `id` int(11) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `salaire` varchar(25) NOT NULL,
  `duree` varchar(25) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `description_entreprise` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `propri` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `nos_services` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pays` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `propri` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `propri` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galery_blog`
--

CREATE TABLE `galery_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galery_entreprise`
--

CREATE TABLE `galery_entreprise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galery_event`
--

CREATE TABLE `galery_event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `galery_produit`
--

CREATE TABLE `galery_produit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interesse`
--

CREATE TABLE `interesse` (
  `id_projet` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_proj` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interesse`
--

INSERT INTO `interesse` (`id_projet`, `message`, `id_proj`, `dates`) VALUES
(3, 'une personne est nteressÃ©efffff', 2, '2023-06-13 07:42:23'),
(6, 'test2', 2, '2023-06-13 07:54:41'),
(7, 'test2', 2, '2023-06-13 07:55:14');

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

CREATE TABLE `liens` (
  `id` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `liens` varchar(500) NOT NULL,
  `categorie` varchar(500) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liens`
--

INSERT INTO `liens` (`id`, `titre`, `description`, `liens`, `categorie`, `dates`) VALUES
(3, 'Le Tutoriel le prof', 'Test', 'http://localhost/LeProf_site_officiel/view/setting-liens.php', 'Primaire et SÃ©condaire', '2023-06-03 16:29:48');

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `Fond` varchar(255) NOT NULL,
  `type_paiement` varchar(25) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  `continent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`, `continent`) VALUES
(1, 'Algerie', ''),
(2, 'Egypte', ''),
(3, 'Libye', ''),
(4, 'Maroc', ''),
(5, 'Sahara occidental', ''),
(6, 'Soudan', ''),
(7, 'Tunisie', ''),
(8, 'Benin', ''),
(9, 'Burkina Faso', ''),
(10, 'Cap-Vert', ''),
(11, 'Cote d\'Ivoire', ''),
(12, 'Gambie', ''),
(13, 'Ghana', ''),
(14, 'Guinee', ''),
(15, 'Guinee-Bissau', ''),
(16, 'Liberia', ''),
(17, 'Mali', ''),
(18, 'Mauritanie', ''),
(19, 'Niger', ''),
(20, 'Nigeria', ''),
(21, 'Senegal', ''),
(22, 'Sierra Leone', ''),
(23, 'Togo', ''),
(24, 'Burundi', ''),
(25, 'Comores', ''),
(26, 'Djibouti', ''),
(27, 'Erythree', ''),
(28, 'Ethiopie', ''),
(29, 'Kenya', ''),
(30, 'Madagascar', ''),
(31, 'Malawi', ''),
(32, 'Maurice', ''),
(33, 'Mayotte', ''),
(34, 'Mozambique', ''),
(35, 'Ouganda', ''),
(36, 'Reunion', ''),
(37, 'Rwanda', ''),
(38, 'Seychelles', ''),
(39, 'Somalie', ''),
(40, 'Tanzanie', ''),
(41, 'Zambie', ''),
(42, 'Zimbabwe', ''),
(43, 'Angola', ''),
(44, 'Cameroun', ''),
(45, 'Centrafricaine (RCA)', ''),
(46, 'Congo', ''),
(47, 'Congo (RDC)', ''),
(48, 'Gabon', ''),
(49, 'Guinee equatoriale', ''),
(50, 'Sao Tome-et-Principe', '');

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `pdf` varchar(500) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pdf`
--

INSERT INTO `pdf` (`id`, `nom`, `description`, `categorie`, `pdf`, `chemin`, `dates`) VALUES
(2, 'A Nous l\'Ecole', 'Testerer', 'Professionnelle et universitaire', 'attestation de frequentation-RÃ©cupÃ©rÃ©.pdf', '../includes/pdf/attestation de frequentation-RÃ©cupÃ©rÃ©.pdf', '2023-06-04 16:19:00');

-- --------------------------------------------------------

--
-- Structure de la table `post_sujet`
--

CREATE TABLE `post_sujet` (
  `id` int(60) NOT NULL,
  `propri` int(60) NOT NULL,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sujet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `Titre_projet` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `affiche` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `Titre_projet`, `Description`, `affiche`, `user`, `dates`) VALUES
(2, 'M-PESA', 'En croissance d\'une communautÃ© exige une intervention de tous dans le but de pousser plus haut la situation de leurs milieux oÃ¹ ils Ã©voluent.\r\nLes grandes masses d\'informations ne font qu\'apparaitre dans chaque contrÃ©e et cela en fonction de circonstances. La maitrise de ces masses d\'informations est une preuve palpable et parfaite digne de son nom.\r\nDevenue une science pour tous, l\'informatique vient donner un soulagement pour le traitement de grandes masses d\'informations.\r\nEn Ã©gard Ã  tout ce qui prÃ©cÃ¨de, La maison Communale de la Gombe Ã©tant une organisation avec plusieurs activitÃ©s, la gestion s\'avÃ¨re une nÃ©cessitÃ© pour le permettre de faire face et de se maintenir en ordre utile au niveau de son administration. Cette gestion ne doit plus Ãªtre comme dans le temps jadis, elle exige une migration vers une gestion informatisÃ©e.\r\nVu cette situation, nous nous sommes intÃ©ressÃ©s Ã  amener une Ã©tude qui nous a poussÃ©e Ã  dÃ©velopper une solution informatique permettant Ã  la maison communale dâ€™avoir la rapiditÃ© dans la circulation et le traitement de leurs informations. \r\n', 1, 26, '2023-06-11 09:42:36'),
(3, 'Orange Money', 'En effet, comme l\'hypothÃ¨se sert Ã  faire comprendre le raisonnement difficile, en proposant provisoirement certaines de ces dimensions, ainsi donc, voici comment se prÃ©sente la rÃ©ponse Ã  notre questionnaire.\r\n- La mise en place dâ€™une application pour la gestion des informations internes de la maison communale, serait possible avec l\'implication des responsables, s\'ils dÃ©couvrent l\'importance de cette derniÃ¨re par rapport Ã  leur systÃ¨me existant.\r\n- Cette application permettra de bien gÃ©rer les donnÃ©es Ã  partir dâ€™un serveur distant qui stockera toutes les informations de la maison communale et permettra Ã  tous clients de se connectÃ© avec rapiditÃ© et de bien Ã©laborer son rapport dâ€™activitÃ©s mÃªme Ã  distance.\r\n', 1, 26, '2023-06-11 10:03:42');

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

CREATE TABLE `reduction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `prix` int(11) DEFAULT '0',
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(500) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `id_sujet` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tutos`
--

CREATE TABLE `tutos` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tutos`
--

INSERT INTO `tutos` (`id`, `nom`, `description`, `categorie`, `chemin`, `dates`) VALUES
(1, 'Ma vidÃ©o', 'Tester ....................', 'HumanitÃ©', 'video-647cc3db0cc882.40833090.mp4', '2023-06-04 16:53:57');

-- --------------------------------------------------------

--
-- Structure de la table `univ`
--

CREATE TABLE `univ` (
  `id_univ` int(11) NOT NULL,
  `Titre_univ` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `univ`
--

INSERT INTO `univ` (`id_univ`, `Titre_univ`, `description`, `photo`) VALUES
(1, 'FiscalitÃ©', 'DÃ©stinÃ© Au L2 LMD', '6445661c5d4f10.59538536.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pays` varchar(100) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `music` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `sexe`, `numero`, `email`, `password`, `photo`, `pseudo`, `memo`, `dates`, `pays`, `adresse`, `music`) VALUES
(26, 'BADIDI', 'divin', 'Masculin', '243817767357', 'kevinbadidi081@gmail.com', '0b910d288352b1cf3b99653761974a9b', '64849b9c4bc813.94879679.jpg', 'divin BADIDI', 'divin1998', '2023-06-10 15:19:58', 'RDC/Kinshasa', 'Kinshasa', 'bakosala_elokote'),
(27, 'KAKWATA', 'rosette', 'FÃ©minin', '', 'rosettekakwata@gmail.com', '9551ea1bf14aa978c3f9df1eb443b8d0', '', 'rosette KAKWATA', 'rosette', '2023-06-14 18:14:38', 'RDC/Kinshasa', 'Kinshasa/Makambu', 'nzambe_ya_lola'),
(28, 'BADIDI', 'divin', 'Masculin', '0817767357', 'divinbadidi081@gmail.com', '0b910d288352b1cf3b99653761974a9b', '64f225c6d7d7d6.78407916.jpg', 'divin BADIDI', 'divin1998', '2023-08-26 10:49:27', 'Kinshasa', 'kin', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `description_produit` varchar(255) NOT NULL,
  `prix` int(15) NOT NULL,
  `prix_avant` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `chemin` varchar(200) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `video_cours`
--

CREATE TABLE `video_cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

CREATE TABLE `visite` (
  `Nom_page` varchar(255) NOT NULL,
  `Nombre_visite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`Nom_page`, `Nombre_visite`) VALUES
('A-propos.php', 4),
('about.php', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `adult`
--
ALTER TABLE `adult`
  ADD PRIMARY KEY (`id_adult`);

--
-- Index pour la table `aime`
--
ALTER TABLE `aime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blog` (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_boutique`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categ_video`
--
ALTER TABLE `categ_video`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `comment_emploie`
--
ALTER TABLE `comment_emploie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_emploie` (`id_emploie`);

--
-- Index pour la table `comment_entreprise`
--
ALTER TABLE `comment_entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `comment_event`
--
ALTER TABLE `comment_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`);

--
-- Index pour la table `comment_membres`
--
ALTER TABLE `comment_membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `comment_produit`
--
ALTER TABLE `comment_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `comment_projet`
--
ALTER TABLE `comment_projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `comment_service`
--
ALTER TABLE `comment_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `galery_blog`
--
ALTER TABLE `galery_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `galery_entreprise`
--
ALTER TABLE `galery_entreprise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `galery_event`
--
ALTER TABLE `galery_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `galery_produit`
--
ALTER TABLE `galery_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `interesse`
--
ALTER TABLE `interesse`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `id_proj` (`id_proj`);

--
-- Index pour la table `liens`
--
ALTER TABLE `liens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_sujet`
--
ALTER TABLE `post_sujet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id_sujet`);

--
-- Index pour la table `tutos`
--
ALTER TABLE `tutos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `univ`
--
ALTER TABLE `univ`
  ADD PRIMARY KEY (`id_univ`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `video_cours`
--
ALTER TABLE `video_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visite`
--
ALTER TABLE `visite`
  ADD UNIQUE KEY `Nom_page` (`Nom_page`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `adult`
--
ALTER TABLE `adult`
  MODIFY `id_adult` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `aime`
--
ALTER TABLE `aime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_boutique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categ_video`
--
ALTER TABLE `categ_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `comment_emploie`
--
ALTER TABLE `comment_emploie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_entreprise`
--
ALTER TABLE `comment_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_event`
--
ALTER TABLE `comment_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_membres`
--
ALTER TABLE `comment_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_produit`
--
ALTER TABLE `comment_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_projet`
--
ALTER TABLE `comment_projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment_service`
--
ALTER TABLE `comment_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galery_blog`
--
ALTER TABLE `galery_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galery_entreprise`
--
ALTER TABLE `galery_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galery_event`
--
ALTER TABLE `galery_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galery_produit`
--
ALTER TABLE `galery_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `interesse`
--
ALTER TABLE `interesse`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `liens`
--
ALTER TABLE `liens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post_sujet`
--
ALTER TABLE `post_sujet`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reduction`
--
ALTER TABLE `reduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id_sujet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tutos`
--
ALTER TABLE `tutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `univ`
--
ALTER TABLE `univ`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `video_cours`
--
ALTER TABLE `video_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aime`
--
ALTER TABLE `aime`
  ADD CONSTRAINT `aime_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `aime_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `boutique_ibfk_1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD CONSTRAINT `comment_blog_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `blog` (`id`);

--
-- Contraintes pour la table `comment_emploie`
--
ALTER TABLE `comment_emploie`
  ADD CONSTRAINT `comment_emploie_ibfk_1` FOREIGN KEY (`id_emploie`) REFERENCES `emploi` (`id`);

--
-- Contraintes pour la table `comment_entreprise`
--
ALTER TABLE `comment_entreprise`
  ADD CONSTRAINT `comment_entreprise_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `comment_event`
--
ALTER TABLE `comment_event`
  ADD CONSTRAINT `comment_event_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `comment_membres`
--
ALTER TABLE `comment_membres`
  ADD CONSTRAINT `comment_membres_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `comment_produit`
--
ALTER TABLE `comment_produit`
  ADD CONSTRAINT `comment_produit_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `vente` (`id_vente`);

--
-- Contraintes pour la table `comment_projet`
--
ALTER TABLE `comment_projet`
  ADD CONSTRAINT `comment_projet_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `comment_service`
--
ALTER TABLE `comment_service`
  ADD CONSTRAINT `comment_service_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `galery_blog`
--
ALTER TABLE `galery_blog`
  ADD CONSTRAINT `galery_blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `blog` (`id`);

--
-- Contraintes pour la table `galery_entreprise`
--
ALTER TABLE `galery_entreprise`
  ADD CONSTRAINT `galery_entreprise_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `galery_event`
--
ALTER TABLE `galery_event`
  ADD CONSTRAINT `galery_event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `evenement` (`id`);

--
-- Contraintes pour la table `galery_produit`
--
ALTER TABLE `galery_produit`
  ADD CONSTRAINT `galery_produit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `vente` (`id_vente`);

--
-- Contraintes pour la table `interesse`
--
ALTER TABLE `interesse`
  ADD CONSTRAINT `interesse_ibfk_1` FOREIGN KEY (`id_proj`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `reduction`
--
ALTER TABLE `reduction`
  ADD CONSTRAINT `reduction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`user`) REFERENCES `boutique` (`id_boutique`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
