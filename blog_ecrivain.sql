-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Janvier 2018 à 12:40
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_ecrivain`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `id_chapter` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapter` longtext NOT NULL,
  `create_date` date NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chapter`
--

INSERT INTO `chapter` (`id_chapter`, `title`, `chapter`, `create_date`, `online`) VALUES
(1, 'Chapitre 1 : Des questions sans réponse', '<p>Nous &eacute;tions au mois de Novembre, je ne me souviens pas de l\'ann&eacute;e exacte. La neige avait recouvert l\'asphalte et les sapins sur plusieurs centim&egrave;tres.</p>\r\n<p>J\'&eacute;tais sur la route entre Juneau et Fairbanks, la radio r&eacute;sonnait dans le v&eacute;hicule.</p>\r\n<p>"Vol &agrave; mains arm&eacute;s dans la banque de Juneau", "une femme menace de se jeter du haut de son immeuble apr&egrave;s une dispute un peu muscl&eacute;e avec son mari", "&agrave; toutes les unit&eacute;s ...". Ces phrases martelaient mon cerveau, je n\'avais pas besoin de cela, je devais &ecirc;tre &agrave; mon maximum de concentration sur cette affaire.</p>\r\n<p>Je n\'y comprenais plus rien, comment cela avait-il pu se produire ?</p>\r\n<p>Mon co&eacute;quipier John, essayait de me joindre sur mon cellulaire en boucle, mais j\'avais besoin d\'&ecirc;tre seul, de trouver des r&eacute;ponses &agrave; cette violence.</p>\r\n<p>&nbsp;</p>\r\n<p>Ce matin l&agrave;, je m\'&eacute;tais rendu dans cet appartement de Sitka. A peine le pas de la porte pass&eacute;, l\'odeur du sang coagul&eacute; remplissait mes narines, elle gisait l&agrave; par terre, &eacute;touff&eacute;e dans son propre sang, je ne pouvais oublier ces images.</p>', '2017-11-09', 1),
(2, 'Chapitre 2 : Jessica', '<p>Comment un homme pouvait &ecirc;tre si violent ? Que pouvait-il se passer dans sa t&ecirc;te pour exploser avec tant de haine ?</p>\r\n<p>Jessica, c\'&eacute;tait le nom de cette jeune femme. Elle n\'avait ni mari, ni enfant, elle travaillait dans un petit "dinner" en tant que serveuse. Une vie simple, pas de casier, peu d\'amis, une famille explos&eacute;e aux 4 coins du Canada. Ils ne semblaient pas proches, encore moins soud&eacute;s.</p>\r\n<p>Sa m&egrave;re, une ex Junky, son p&egrave;re d&eacute;c&eacute;d&eacute;, quant &agrave; son fr&egrave;re, un homme d\'affaire brillant et richissime qui parcourait le globe chaque mois pour ses affaires.</p>\r\n<p>Lors de mon appel pour les pr&eacute;venir du meurtre de Jessica, seule la m&egrave;re semblait attrist&eacute;e, pas effondr&eacute;e, non, loin de l&agrave;, juste attrist&eacute;e. Je suis encore choqu&eacute; de leur r&eacute;action.</p>\r\n<p>Cette pauvre jeune femme semblait bien seule dans ce monde de brutes.</p>', '2017-11-28', 1),
(3, 'Chapitre 3 : un manque d\'indice évident', '<p>Nous avions fouill&eacute; l\'appartement de fond en comble sans la moindre tr&acirc;ce d\'indice. Pas une empreinte, pas un cheveu, pas m&ecirc;me un grain de poussi&egrave;re. Le meurtrier avait bien pris le temps pour tout nettoyer apr&egrave;s son acte barbare.</p>\r\n<p>Il &eacute;tait m&eacute;ticuleux, il avait pens&eacute; &agrave; couper les chauffages pour garder le corps dans le froid. Le temps que la d&eacute;composition d&eacute;bute, il serait d&eacute;j&agrave; bien loin du lieu du crime, de la ville, du pays peut-&ecirc;tre.</p>\r\n<p>Je n\'avais aucune piste, pas l\'ombre d\'un indice, je ne savais par o&ugrave; commencer mon enqu&ecirc;te, la famille n\'avait aucune id&eacute;e de ses relations, son patron non plus. Seule sa coll&egrave;gue dans le dinner m\'avait indiqu&eacute; le nom d\'un bar dans lequel elle aimait se distraire le vendredi soir. C\'&eacute;tait par l&agrave; que j\'allais donc commencer.</p>\r\n<p>Le froid qui entrait par ma fen&ecirc;tre me fit reprendre mes esprits, je n\'&eacute;tais plus dans cet appartement mais bien dans mon v&eacute;hicule en direction de Juneau. Je me rendais justement dans ce bar.</p>', '2017-12-07', 1),
(4, 'Chapitre 4 : Une vie différente ', '<p>Je venais d\'arriver devant le bar de "d&eacute;tente" de Jessica. L\'enseigne &eacute;tait suffisament explicite pour savoir o&ugrave; je mettais les pieds.</p>\r\n<p>Un homme &agrave; l\'air bonhomme mais sacr&eacute;ment muscl&eacute; me barrait l\'entr&eacute;e.</p>\r\n<p>- Inspecteur Smith, je souhaite m\'entretenir avec votre patron s\'il vous pla&icirc;t.</p>\r\n<p>Apr&egrave;s avoir inspect&eacute; ma plaque pour s\'assurer de la v&eacute;racit&eacute; de cette derni&egrave;re, il m\'ouvrit la porte en parlant dans son micro raccord&eacute;e &agrave; son oreillette.</p>\r\n<p>- Bonjour Inspecteur, en quoi puis-je vous aider ?</p>\r\n<p>- Bonjour, connaissez vous cette personne ?</p>\r\n<p>Il regarda attentivement la photo de Jessica et ne mit pas longtemps &agrave; me r&eacute;pondre :</p>\r\n<p>- Bien s&ucirc;r que je la connais, c\'est l\'une de mes meilleures "danseuse".</p>\r\n<p>- Danseuse ? Qu\'entendez-vous par l&agrave; ? Sa r&eacute;ponse m\'avait particuli&egrave;rement troubl&eacute;.</p>\r\n<p>- Voyons inspecteur, je n\'ai pas besoin de vous faire de dessin, vous semblez &ecirc;tre un homme intelligent, vous vous doutez bien que mes "danseuses" ne sont pas l&agrave; que pour danser". Disons qu\'elle sont cordiale avec les clients les plus riches et qui cherchent un peu de r&eacute;confort.</p>\r\n<p>- Vous &ecirc;tes en train de me dire que Jessica joue la prostitu&eacute;e chaque vendredis soir dans votre bar ?</p>\r\n<p>- Jessica ? Je ne connaissais pas ce nom, elle se fait appeller Hanna ici. Mais oui c\'est bien cela, et je peux vous dire que c\'est elle qui me rapporte le plus d\'argent dans cet &eacute;tablissement. Les clients sont fid&egrave;les avec elle et je peux vous dire qu\'elle ne refuse rien &agrave; ses habitu&eacute;s.</p>', '2017-12-17', 1),
(5, 'Chapitre 5 : Une première piste', '<p>Apr&egrave;s plus de 2 heures d\'&eacute;change avec le propri&eacute;taire de l\'&eacute;tablissement, je ne comprenais plus rien. Jessica semblait &ecirc;tre la petite fille sage sans bavure, sans amis, tr&egrave;s timide et reserv&eacute;e alors que son second elle, jouait les prostitu&eacute;e dans un bar chaque vendredis soir.</p>\r\n<p>Le propri&eacute;taire m\'avait fourni les noms et adresses de tous les clients de Hanna, du moins ceux qu\'il connaissait.</p>\r\n<p>Me voici arriv&eacute; &agrave; mon bureau, je m\'installais confortablement, John mon coll&egrave;gue m\'apporta une tasse de caf&eacute; noir sans sucre comme d\'habitude et nous &eacute;changions sur ce que je venais d\'apprendre.</p>\r\n<p>Nous nous mettions tous les deux sur nos ordinateurs et commenc&egrave;rent &agrave; creuser sur les habitu&eacute;s d\'Hanna. La plupart d\'entre eux &eacute;taient des hommes riches, puissants, certains noms &eacute;taient m&ecirc;me connus du grand public. Un seul sorti du lot, c&eacute;tait un ouvrier du batiment. Comment pouvait-il se payer les services d\'Hanna ? Le propri&eacute;taire m\'avait indiqu&eacute; les tarifs, et aucun flic d\'ici ne pouvait se les payer alors comment lui arrivait &agrave; financer ses plaisirs ? D\'apr&egrave;s le registre, il venait tous les vendredis, il n\'en avait pas manqu&eacute; un seul hormis le vendredi qui avait pr&eacute;c&eacute;d&eacute; sa mort.</p>', '2017-12-29', 1),
(7, 'Chapitre 6 : Direction Kodiak', '<p>Apr&egrave;s cette d&eacute;couverte, John et moi-m&ecirc;me prenions la voiture en direction de Kodiak. D\'apr&egrave;s l\'employeur de Henry Butterfly, l\'ouvrier du batiment accroc des services d\'Hanna, se trouvait sur un chantier l&agrave;-bas.</p>\r\n<p>Henry avait un casier judiciaire relativement impressionant :</p>\r\n<p>viol, interpellation sur la voie public pour exhibitionnisme, plaintes diverses et vari&eacute;es pour les m&ecirc;mes raisons mais aussi une arrestation pour voie de faits avec sa compagne qui avait port&eacute; plainte car il l\'avait attaqu&eacute; d\'une arme blanche.</p>\r\n<p>Il semblait la piste la plus &eacute;vidente, Jessica, avait &eacute;t&eacute; retrouv&eacute;e avec une entaille derri&egrave;re la t&ecirc;te caus&eacute;e par un couteau de chasse, ce qui &eacute;tait assez courant ici en Alaska.</p>', '2018-01-04', 0),
(9, 'Chapitre 7 : Une piste qui en mène à une autre', '<p>La piste de l\'employ&eacute; du batiment n\'avait rien donn&eacute; hormis qu\'il nous avait donn&eacute; le nom d\'un de ses coll&egrave;gues qui souhait s\'offrir les services de notre victime. Par la m&ecirc;me occasion nous avions enfin compris comment il se payait ses parties de jambes en l\'air.</p>\r\n<p>Nous l\'avions bien entendu arr&ecirc;ter pour cette raison</p>', '2018-01-04', 0),
(45, 'Remerciements', '<p>Je tenais &agrave; remercier XXXXXXXXXXXXXXXXXXX</p>\r\n<p>&nbsp;</p>\r\n<p>pour l\'aide qu\'ils m\'ont apport&eacute;s pour l\'&eacute;criture de ce roman.</p>\r\n<p>&nbsp;</p>', '2018-01-04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `comments` longtext NOT NULL,
  `report` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id_comments`, `comments`, `report`, `user_id`, `chapter_id`) VALUES
(33, 'On sent que la pression monte ! Bravo Monsieur FORTEROCHE !', 1, 43, 4),
(34, 'L\'un des meilleurs chapitres.\r\n\r\nQuand sort le prochain ???', 0, 46, 4),
(8, 'coucou, vraiment top !!!', 0, 44, 2),
(9, 'ouais vraiment il est au top ce livre !!!! Continuez !', 1, 43, 1),
(7, 'Très sympa ce chapitre, à quand le prochain ???\n\nChaque semaine est l\'événement :)', 0, 40, 2),
(10, 'Nouveau commentaire sur le chapitre 2 : je le trouve super !!!\n\nMerci.', 0, 44, 2),
(38, 'C\'est la première fois que je lis un de vos livre. C\'est génial !', 0, 47, 3),
(32, 'A quand le chapitre 6 ????\r\nJe trouve cela un peu long quand même ... pensez à vos lecteurs !', 0, 46, 5),
(30, 'Très sympa ce livre :).\r\n\r\nMerci.', 0, 46, 3),
(35, 'Vriament trop hate !\r\n\r\nAllez allez !!! courage !', 0, 46, 4),
(31, 'C\'est toujours un plaisir de lire vos romans policiers.\r\nHâte de voir le prochain chapitre !', 1, 46, 2);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id_menus` tinyint(4) NOT NULL,
  `menus` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menus`
--

INSERT INTO `menus` (`id_menus`, `menus`, `lien`) VALUES
(2, 'Gestion des commentaires', '/admin/report'),
(3, 'Poster un billet', '/admin/post'),
(4, 'Gestion utilisateurs', '/admin/users'),
(1, 'Administration', '/admin');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL,
  `role` varchar(100) NOT NULL,
  `ordre` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `role`, `ordre`) VALUES
(1, 'administrateur', 1),
(2, 'utilisateur', 3),
(3, 'moderateur', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role`) VALUES
(3, 'Jean FORTEROCHE', '$2y$10$2nG7xJ4yfTvZN9vMb4YeieBCPbrFulUiPuIL.zyk2gRSAJFLZsBue', 'lekurs@gmail.com', 1),
(47, 'Jeremy', '$2y$10$FE1CCgmCF1lbE2bnKgDk5OMz4.i0jc5F7Fb794sEjYj/iS0MUsqvO', 'jeremy@gmail.com', 2),
(40, 'Soutenance', '$2y$10$w1bpkOyX76dFCCGfFRMpZe51jdouNwlgTTJbX5MP03TNX3e9VZLZa', 'soutenance@soutenance.fr', 3),
(46, 'Amandine', '$2y$10$vHH1q56VGe5AFcbUgKqdjuEL70P85n8EIO.Vg.4aU3zzcP2wPiuGq', 'amandine@gmail.com', 2),
(43, 'Maxime', '$2y$10$4nMKgAEzxTbFG5sFrLqHa.3PRSmqNq9VC8U.9wjmYvFo6rVuBsa1C', 'gindre.maxime@gmail.com', 3),
(44, 'Claire', '$2y$10$VYD/.unaErWwEX3Z6J0aJOAeK/xXQmgwMfszr2nXsIbSfZMAC.QMa', 'claire@claire.com', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id_chapter`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menus`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id_chapter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menus` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
