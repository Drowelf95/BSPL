-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000871579.hosting-data.io
-- Généré le : ven. 02 oct. 2020 à 13:02
-- Version du serveur :  5.7.30-log
-- Version de PHP : 7.0.33-0+deb9u9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs766481`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `chapter` int(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `chapter`, `title`, `content`, `photo`, `author`, `createdAt`, `deleted`) VALUES
(1, 1, 'Au debut', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia. Mauris aliquam fermentum malesuada. Suspendisse eget lectus et ipsum dictum euismod. Vestibulum quis nibh aliquam magna auctor maximus non sed tellus. Duis ut mattis arcu, in ultrices sem. In vulputate quis nulla et suscipit. Praesent turpis orci, eleifend nec enim id, vehicula tempus diam. Nunc suscipit ligula ut est commodo euismod. Cras id sollicitudin felis, vulputate suscipit nunc. Sed commodo luctus arcu, ut efficitur enim pellentesque eu. Pellentesque mattis placerat felis tincidunt congue. Nullam sit amet euismod ipsum. Mauris sollicitudin feugiat metus nec ornare. Sed et lectus a leo convallis consectetur sit amet sed lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc quis dui sapien. Nulla ac diam erat. Cras nec fringilla tellus, non vulputate lorem. Praesent commodo magna justo, in venenatis elit sagittis ac. Nulla fermentum quam id imperdiet cursus. Vestibulum non tincidunt sem. In accumsan, neque ac laoreet egestas, neque nibh gravida urna, non aliquam justo turpis eget mauris. Pellentesque facilisis consectetur scelerisque. Sed efficitur interdum tortor, et euismod quam fermentum quis. Sed sit amet convallis metus, in tempus mi. Nunc lectus mi, dictum in molestie ac, molestie vel ipsum. Curabitur aliquet odio eu mattis laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas ante sem, imperdiet a quam in, auctor semper ex. Duis viverra id lorem id cursus. Etiam lacus leo, tincidunt varius libero vel, pellentesque venenatis dolor. Ut interdum fermentum neque, sed varius ex aliquam et. Maecenas bibendum porttitor pharetra. Cras non aliquam massa. Aliquam eget diam ultrices, suscipit ante at, bibendum magna. Pellentesque metus est, suscipit id pulvinar consectetur, tincidunt et dolor. Cras dignissim fermentum viverra. Duis vehicula at orci aliquet venenatis. Suspendisse at efficitur tortor.', '', 'Jean Foreteroche', '2019-03-15 08:10:24', 0),
(2, 2, 'Un deuxième article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Karim', '2019-03-16 13:27:38', 1),
(3, 3, 'L\'ascension ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2019-03-16 14:45:57', 0),
(4, 4, 'L\'aventure', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2020-09-07 15:27:18', 0),
(5, 5, 'La chute', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2020-09-07 15:27:50', 0),
(6, 6, 'Espoir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2020-09-07 15:37:53', 0),
(7, 7, 'La tranche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2020-09-07 15:41:22', 0),
(8, 8, 'Puppeteer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', 'landscape.png', 'Jean Foreteroche', '2020-09-07 15:42:41', 0),
(9, 9, 'La fin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.', '', 'Jean Foreteroche', '2020-09-08 18:46:19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `article_id`, `flag`, `deleted`) VALUES
(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2019-03-16 21:02:24', 1, 0, 0),
(2, 'Nina', 'Trop cool ! depuis le temps', '2019-03-17 17:34:35', 1, 0, 0),
(3, 'Rodrigo', 'Great ! ', '2019-03-17 17:42:04', 1, 0, 0),
(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2019-03-18 12:08:37', 2, 0, 0),
(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2019-03-18 03:09:02', 2, 0, 0),
(7, 'Guillaume', 'Je viens ici pour troller !', '2019-03-19 21:08:44', 3, 1, 0),
(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2019-03-19 21:09:27', 3, 0, 0),
(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2019-03-20 10:10:11', 3, 0, 0),
(14, 'Toto32155478986234136135', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla tristique lacinia. Praesent maximus odio id scelerisque varius. Vestibulum facilisis nisi ac quam maximus, sit amet blandit justo elementum. Nam id risus non tellus pretium feugiat. Integer sed lorem leo. In eu tellus eget elit accumsan efficitur. Cras viverra ligula nec augue fringilla, sed lacinia nulla vestibulum. Morbi sed mattis elit. Morbi in tincidunt dui. Proin lobortis ultricies rutrum. Ut augue ex, imperdiet vitae nisi eget, imperdiet convallis nibh. Maecenas vel velit eros.', '2020-09-11 17:04:12', 1, 0, 0),
(17, 'Johan', 'Ca fonctionne enfin ! ', '2020-09-15 22:52:10', 1, 0, 0),
(18, 'Jean', 'Merci !', '2020-09-15 22:53:27', 1, 0, 0),
(20, 'johan', 'Ouais bon ca a l\'air de fonctionner sur le téléphone portable aussi ', '2020-09-21 18:34:57', 1, 0, 1),
(23, 'Jean', 'Super !', '2020-09-28 15:52:20', 5, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `createdAt`, `bio`) VALUES
(1, 'Jean', '$2y$10$zaoui2iLkNf.rC.WYAzaAe.DKZJSLzpM.9r6eCfNZNcdab8HfeupK', '2020-09-07 10:04:05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas accumsan augue vel posuere hendrerit. Vestibulum semper egestas felis eleifend scelerisque. Etiam sit amet cursus nisi. Vestibulum ullamcorper nulla ipsum, eget rhoncus neque volutpat in. Sed at lacinia orci. Proin tristique tincidunt urna, a faucibus lorem viverra in. Cras lectus mi, ultrices eget lorem sit amet, dictum aliquam sem. Maecenas sapien mi, aliquet sit amet mattis sed, accumsan et mi. Quisque eget mi nulla. In ac commodo purus. Etiam tincidunt volutpat odio nec rhoncus. Nulla dolor tortor, facilisis at tellus et, ultricies ullamcorper est. Nullam dignissim leo a nulla placerat, sit amet ultricies lorem lacinia.sqd');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
