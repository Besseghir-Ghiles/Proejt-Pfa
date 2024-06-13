-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 26 mai 2024 à 02:05
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site1`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `mail`, `pass`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_uti` int NOT NULL,
  `id_produit` int NOT NULL,
  `nb_l` int NOT NULL,
  `nb_j` int NOT NULL,
  `prix` int NOT NULL,
  `num` int NOT NULL,
  `etat` enum('Louer','Acheter') NOT NULL,
  `dateL` date DEFAULT NULL,
  `livraison` enum('livré','non livré') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_uti`, `id_produit`, `nb_l`, `nb_j`, `prix`, `num`, `etat`, `dateL`, `livraison`, `date`) VALUES
(32, 4, 14, 5, 0, 75000, 696299935, 'Acheter', '2022-10-23', 'livré', '2022-10-19'),
(33, 5, 10, 2, 0, 50000, 1, 'Acheter', '2024-05-22', 'livré', '2024-05-22'),
(34, 5, 10, 3, 0, 75000, 1, 'Acheter', NULL, 'non livré', '2024-05-22'),
(37, 6, 8, 1, 0, 25000, 434, 'Acheter', NULL, 'non livré', '2024-05-23'),
(38, 5, 14, 3, 0, 87, 434, 'Acheter', NULL, 'non livré', '2024-05-23');

-- --------------------------------------------------------

--
-- Structure de la table `day_act`
--

DROP TABLE IF EXISTS `day_act`;
CREATE TABLE IF NOT EXISTS `day_act` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `texte` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `day_act`
--

INSERT INTO `day_act` (`id`, `titre`, `texte`, `image`) VALUES
(6, 'Observation du ciel', 'est une activité au planétarium où les visiteurs, accompagnés d\'un animateur expert, peuvent explorer les merveilles de l\'univers en direct. Cette expérience comprend la visualisation des étoiles, des planètes, et des constellations visibles à l\'œil nu, souvent à travers des télescopes ou des outils astronomiques avancés. C\'est une occasion unique d\'apprendre à reconnaître les différents corps célestes et de comprendre les phénomènes astronomiques tels que les éclipses, les pluies de météores, et les phases de la lune, tout en étant guidé par des explications scientifiques et mythologiques. Cette activité éducative et immersive permet aux participants de se connecter avec l\'univers d\'une manière profonde et inspirante.', 'observation du cieljpg.jpg'),
(8, 'Les animations d\'astronomie spatiale', 'sont des représentations visuelles dynamiques conçues pour illustrer et expliquer les phénomènes astronomiques et spatiaux. Elles utilisent souvent des techniques de modélisation 3D, d\'animation par ordinateur et de simulation pour créer des visualisations immersives et informatives. Ces animations peuvent couvrir une gamme étendue de sujets, allant des mouvements des planètes et des astéroïdes dans le système solaire aux collisions de galaxies lointaines et aux phénomènes cosmiques tels que les supernovae et les trous noirs. Elles jouent un rôle essentiel dans l\'éducation, la vulgarisation scientifique et la recherche, permettant aux spectateurs de mieux comprendre les merveilles de l\'univers et les processus complexes qui s\'y déroulent.', 'interieur-planetarium-nomade-4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `mail`, `pass`, `adress`) VALUES
(6, 'Besseghir', 'Ghiles', 'ghilesbesseghir@gmail.com', 'b0759c276a4ff53a2ca16aa205ecced6af21a2cf', '12 Rue Romain Rolland'),
(5, 'Besseghir', 'Ghiles', 'ghilesbesseghir039@gmail.com', 'b0759c276a4ff53a2ca16aa205ecced6af21a2cf', '15 avenue Jean Jaures');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_u` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `vue` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_u`, `message`, `vue`, `date`) VALUES
(3, 6, 'hello j&#039;espere que vous allez bien', 0, '2024-05-23 07:24:02');

-- --------------------------------------------------------

--
-- Structure de la table `night_act`
--

DROP TABLE IF EXISTS `night_act`;
CREATE TABLE IF NOT EXISTS `night_act` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `texte` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `night_act`
--

INSERT INTO `night_act` (`id`, `titre`, `texte`, `image`) VALUES
(1, 'Celestial Chronicles', 'est un spectacle immersif offert au Planétarium Rio Tinto Alcan à Montréal. Ce spectacle propose une exploration des trésors et des mystères du ciel étoilé, guidée par un animateur scientifique. Il se déroule sous un dôme de 360°, offrant une expérience visuelle et sonore captivante qui transporte les spectateurs à travers le temps et l\'espace pour découvrir les merveilles de l\'univers.\r\n\r\nPendant le spectacle, les visiteurs peuvent en apprendre davantage sur l\'astronomie, les constellations, les étoiles, et les différents phénomènes célestes. C\'est une opportunité d\'approfondir ses connaissances sur l\'univers dans un cadre éducatif et divertissant.\r\n', 'Celestial Chronicles.jpg'),
(2, ' Pécho sous les étoiles: ', 'est un spectacle immersif au Planétarium de la Cité des Sciences et de l\'Industrie à Paris, où les participants peuvent observer le ciel étoilé tout en écoutant des commentaires en direct d\'un animateur expert. Pendant environ 40 minutes, cette expérience propose une exploration des constellations, des planètes visibles et des mythes associés aux étoiles, offrant une soirée romantique et éducative sous le dôme du planétarium. Ce spectacle est conçu pour allier science et poésie, permettant aux visiteurs de mieux comprendre et apprécier les merveilles de l\'univers dans un cadre intime et fascinan.\r\n\r\n', 'Pécho sous les etoiles.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_l` int NOT NULL,
  `id_u` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_l`, `id_u`) VALUES
(29, 1, 3),
(28, 21, 3),
(32, 21, 2),
(33, 19, 1),
(34, 21, 1),
(35, 20, 1),
(36, 26, 4),
(37, 14, 72),
(38, 2, 3),
(46, 5, 4),
(49, 7, 6),
(48, 6, 5),
(50, 5, 6),
(51, 8, 6),
(52, 18, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `p_ach` int NOT NULL,
  `dispo` varchar(11) NOT NULL,
  `stock` int NOT NULL,
  `cat` varchar(255) NOT NULL,
  `nb_v` int NOT NULL,
  `disc` text NOT NULL,
  `promo` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `p_ach`, `dispo`, `stock`, `cat`, `nb_v`, `disc`, `promo`, `image`) VALUES
(10, 'ASTROVISION', 200, 'oui', 19, 'Téléscope', 2, 'le télescope ASTROVISION 114 900 AZ est le choix idéal pour les débutants qui souhaitent un instrument simple. Sa monture de type azimutale permet de pointer simplement votre instrument vers l’objet observé. Avec cet assemblage optique bien étudié, votre observation sera plus belle. Grâce à lui, les cratères sur la Lune, Saturne mais aussi Jupiter et ses satelittes sont accessibles à un débutant.\r\n\r\nCaractéristiques :\r\n• 3 Oculaires Plössl : 6.5mm, 12.5mm et 25mm \r\n• 1 Barlow : 2x\r\n• 1 Redresseur : 1.5x\r\n• Trépied : INCLUS', 0, 'xtelescope-astrovision.jpg'),
(9, 'Dobson', 550, 'oui', 54, 'Téléscope', 0, 'Les télescopes de type Dobson, de conception simple et pourtant géniale, font partie des instruments les plus pratiques utilisés en astronomie. Ils sont constitués, pour l&#039;essentiel, de deux éléments : Premièrement l&#039;optique : en général, il s&#039;agit d&#039;un Newton à tube plein ou à structure tubulaire démontable. Deuxièmement, la monture à fourche posée au sol et dans laquelle on suspend le télescope. Vous pouvez tout de suite commencer vos observations sans avoir à installer et mettre en station une monture, ce qui est toujours un peu compliqué. L&#039;idée de base du Dobson était le souhait de proposer une grande optique de télescope à peu de frais. Pari réussi ! Car en effet, depuis l&#039;invention du télescope Dobson, il s&#039;est créée une véritable communauté d&#039;amateurs qui ne jurent que par cet instrument et sa simplicité fascinante – résumée dans le slogan &quot;Grande performance – petit prix&quot;.\r\n\r\nEnormément de lumière à un prix avantageux !', 0, 'Telescope-Dobson.jpg'),
(11, 'Omegon', 600, 'oui', 32, 'Téléscope', 0, 'Le télescope parfait pour les débutants qui veulent enfin découvrir l&#039;espace.\r\n\r\nVous êtes passionnés de l&#039;espace et souhaitez élargir vos horizons ? Vous voulez enfin voir étoiles, planètes, et nébuleuses et admirer la profondeur de l&#039;univers ? C&#039;est maintenant possible et pas besoin d&#039;être un expert pour cela. Le télescope Omegon Advanced 150/750 EQ-320 est un télescope adapté pour les débutants et très simple d&#039;utilisation. Avec sa grande puissance lumineuse, vous pourrez voir des nébuleuses situées à de nombreuses années lumières. Votre voyage à travers l&#039;univers peut maintenant commencer, depuis votre balcon ou votre jardin !', 0, 'Omegon-Telescope.jpg'),
(12, ' MAGICAL PLANET LIGHT', 25, 'oui', 25, 'lampe_3D', 0, ' MAGICAL PLANET LIGHT: C&#039;est la combinaison parfaite de l&#039;impression traditionnelle par transfert d&#039;eau faite à la main et de la technologie 3D avancée. Lorsque la lumière est allumée, c&#039;est comme être dans le ciel étoilé.', 0, 'lampe3D_.jpg'),
(13, 'Lampe à bille en cristal 3D', 20, 'oui', 59, 'lampe_3D', 0, 'La boule de cristal de ce produit adopte un design tridimensionnel, le rendant plus vif et réaliste, offrant aux gens un plaisir visuel.\r\nn plus d&#039;être décoratif, ce produit a également des fonctions pratiques. Les bandes lumineuses LED fournissent un éclairage doux mais brillant et peuvent être utilisées comme lampes de table ou éclairage ambiant.\r\nMatériau de haute qualité : la boule de cristal est fabriquée en matériau de cristal de haute qualité avec une excellente transparence et brillance. Les bandes lumineuses LED utilisent une technologie d&#039;économie d&#039;énergie et respectueuse de l&#039;environnement pour fournir un éclairage de longue durée et à faible consommation d&#039;énergie.', 0, 'boule.jpg'),
(14, 'Galaxie', 29, 'oui', 42, 'lampe_3D', 2, 'Ce modèle de boule de cristal de la galaxie est fait de cristal K9 de première qualité. Utilisez la technologie avancée de sculpture intérieure 3D et d&#039;extraction de flamme. Cette boule de cristal est belle à regarder et est vraiment cool. La sphère des planètes présente un vaste univers réaliste et solide à l&#039;intérieur de la galaxie de verre.', 0, 'galaxy.jpg'),
(15, 'Joyiever', 43, 'oui', 40, 'lampe de projection', 0, 'Lampe de projection d\'astronaute Joyiever La combinaison du brouillard et de la lumière étoilée peut être jouée seul ou en combinaison et l\'effet de flux de brouillard crée un environnement relaxant. Il peut être utilisé comme lumière de fonte exquise ou comme décoration haut de gamme.\r\nTélécommande et minuterie Le projecteur de ciel étoilé astronaute avec télécommande peut allumer et éteindre le mode brouillard et étoilé. Vous pouvez régler la luminosité et la vitesse, changer le mode d\'éclairage et afficher différents effets de brouillard.', 0, 'lampe de projection.jpg'),
(16, 'Projecteur Galaxy', 36, 'oui', 22, 'lampe de projection', 0, 'Le projecteur astronaute galaxie dispose de 8 modes de nébuleuse (rouge, bleu, vert, rouge-bleu, bleu-vert, rouge-vert, dégradé bicolore, mélange tricolore) et de 2 modes étoiles (respiration, lumière constante), nébuleuse Et les étoiles peuvent être allumées en même temps ou séparément, vous pouvez les combiner comme vous le souhaitez, projetant sur le mur ou le plafond de la chambre, immersive, avec une sensation de rêve !', 0, 'Projecteur_Galaxy.jpg'),
(17, 'Projecteur MERTTURM', 36, 'oui', 9, 'lampe de projection', 0, 'Le projecteur planétarium MERTTURM Home vous permet de vous immerger dans la lumière de l&#039;univers en affichant une image HD vive, lumineuse et nette. Il peut être lentement tourné pour montrer différentes vues de l&#039;ambiance spatiale onirique. Il utilise une projection LED et une bague de mise au point, créant une sensation encore plus réaliste d&#039;être sous le ciel étoilé.', 0, 'ciel_Etoile.jpg'),
(18, 'Nébuleuse', 87, 'oui', 120, 'Collier', 0, 'Ce Collier Nébuleuse est destiné à toutes les personnes aimant l’univers et ces mystères. Avec ce bijou, vous ne passerez pas inaperçu !\r\nMatériaux : Verre (boule) & Argent (détails)\r\nConfection 100 % Artisanale\r\nTaille du collier réglable avec la perle en bois\r\nCorde du pendentif en Cuir', 0, 'Colliers-de-la-pr-sidence.jpg'),
(19, 'la tête dans la Lune', 48, 'oui', 90, 'Collier', 0, 'Ayez constamment la tête dans la Lune avec ce Collier Nuage. Il ajoutera à votre tenue une touche de douceur et de nouveauté.\r\nChaîne : Alliage de Fer\r\nFabrication 100 % Artisanale\r\nBijou : Résine Naturelle\r\nTaille : environ 1.7 x 2.5 cm (longueur totale du collier : 50-55 cm)', 0, 'collier-lune-espace.jpg'),
(20, 'collier-systeme-solaire', 39, 'oui', 132, 'Collier', 0, 'Transportez-vous de planètes en planètes avec ce Collier Système Solaire. Il illuminera votre entourage comme le Soleil illumine notre Système solaire.\r\nPerles 100 % Naturelles\r\nBracelet assemblé à la main\r\nLongueur : 42 + 5.5 cm', 0, 'collier-systeme-solaire.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `pr` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

DROP TABLE IF EXISTS `visites`;
CREATE TABLE IF NOT EXISTS `visites` (
  `IP` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nb_page` int NOT NULL,
  PRIMARY KEY (`IP`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`IP`, `date`, `nb_page`) VALUES
('::1', '2024-05-26', 14),
('::1', '2022-10-23', 188),
('::1', '2022-10-24', 75),
('::1', '2024-05-22', 62),
('::1', '2024-05-23', 181),
('::1', '2024-05-25', 34);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
