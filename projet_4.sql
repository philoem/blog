-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 18:35
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_4`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `billet` text NOT NULL,
  `approuved` int(11) NOT NULL,
  `delete_book` int(11) NOT NULL,
  `date_billet` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `billet`, `approuved`, `delete_book`, `date_billet`) VALUES
(2, 'qu\'est-ce que le lorem ?', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 1, 0, '2018-03-16 13:28:13'),
(8, 'essai joint', 'En général, les jointures consistent à associer des lignes de 2 tables en associant l’égalité des valeurs d’une colonne d’une première table par rapport à la valeur d’une colonne d’une seconde table. Imaginons qu’une base de 2 données possède une table « utilisateur » et une autre table « adresse » qui contient les adresses de ces utilisateurs. Avec une jointure, il est possible d’obtenir les données de l’utilisateur et de son adresse en une seule requête.\r\n\r\nOn peut aussi imaginer qu’un site web possède une table pour les articles (titre, contenu, date de publication …) et une autre pour les rédacteurs (nom, date d’inscription, date de naissance …). Avec une jointure il est possible d’effectuer une seule recherche pour afficher un article et le nom du rédacteur. Cela évite d’avoir à afficher le nom du rédacteur dans la table « article ».', 1, 0, '2018-03-19 14:41:40'),
(45, 'Essai titre du billet', 'Alaska signifie « grande Terre » ou « continent » en aléoute3. Cette région, que l\'on appelait au xixe siècle l\'« Amérique russe », tire son nom d\'une longue presqu\'île, au nord-ouest du continent américain, à environ 1 000 km au sud du détroit de Bering, et qui se lie, vers le sud, aux îles Aléoutiennes. Le surnom de l\'Alaska est « la dernière frontière » ou « la terre du soleil de minuit ».', 0, 0, '2018-03-20 10:58:32'),
(96, 'Economie', 'En 2000, le PIB par habitant s\'élevait à 30 064 dollars, plaçant l’Alaska au quinzième rang des 50 États américains. En 1976, un amendement à la Constitution de l\'État met en place l\'Alaska Permanent Fund, qui distribue un dividende citoyen à tous les résidents de l\'État, financée par l\'investissement financier des revenus du pétrole. Cette allocation a fait de l\'Alaska l\'État le moins inégalitaire de l\'Union', 0, 0, '2018-04-12 16:30:42'),
(97, 'Le secteur primaire', 'En 2000, le PIB par habitant s\'élevait à 30 064 dollars, plaçant l’Alaska au quinzième rang des 50 États américains. En 1976, un amendement à la Constitution de l\'État met en place l\'Alaska Permanent Fund, qui distribue un dividende citoyen à tous les résidents de l\'État, financée par l\'investissement financier des revenus du pétrole. Cette allocation a fait de l\'Alaska l\'État le moins inégalitaire de l\'Union62.\r\n\r\nSecteur primaire\r\nLes principales activités du secteur primaire sont la pêche, l’exploitation du bois, des matières premières et des hydrocarbures. La plupart des biens manufacturés est importée, ce qui renchérit le coût de la vie des habitants. En 2003, la flotte de pêche a pêché plus de 5 millions de livres de poissons et coquillages, pour un montant total de plus d’1 milliard de dollars63. Les exportations de produits de la mer (total : 2,5 milliards de dollars en 2006) se font principalement vers le Japon (33 % du total en 2006), vers l’Union européenne (23 %) et la Chine (15 %)64.\r\n\r\nLe milieu naturel ne laisse que peu de terres pour l\'agriculture : la Matanuska Valley (en), au nord d’Anchorage, est cultivée depuis les années 1930 et donne des récoltes de pommes de terre, salades, tomates, choux', 1, 0, '2018-04-12 16:31:12'),
(98, 'Politique locale', 'L\'Alaska est le 49e État des États-Unis depuis 1959. Il est dominé par le Parti républicain où les électeurs sont plus libertariens que conservateurs et ne s\'identifient pas aux résidents des États du Midwest ou de la ceinture religieuse du Sud. Outre le Parti démocrate, un parti indépendantiste proche des idées libertariennes, l\'Alaskan Independence Party, bien que très minoritaire, est assez actif depuis les années 1970 et est présent aux élections locales.', 0, 0, '2018-04-13 18:54:07'),
(100, 'Lacs', 'Le nombre de lacs est estimé à plus de 3 millions. 94 dépassent 26 km2, les plus grands étant le lac Illiamna (3 000 km2), le lac Becharof (1 200 km2), le lac Teshekpuk (800 km2) et le lac Naknek (630 km2). Par comparaison, le lac Léman fait 580 km2. Le nombre de cours d\'eau est estimé à 3 00012. Parmi ces fleuves, le Yukon est le plus célèbre. Il serpente sur 2 000 km, de la frontière canadienne à la mer de Béring, charriant encore les pépites de la ruée vers l\'or : une voie légendaire et historique. Ses principaux affluents font également partie des plus longues rivières, comme la Porcupine (890 km), la Koyukuk (890 km), la Kuskokwin (870 km) ou la Tanana (850 km). La plupart sont navigables. Le nom d\'Alaska vient d\'un mot de la langue aléoute qui veut dire la grande terre ; pourtant, l\'immense réseau fluvial et les 3 millions (?) de lacs en font plutôt un monde aquatique où l\'hydravion est roi.', 0, 0, '2018-04-16 18:02:46'),
(102, 'Cultures amérindiennes', 'Nous savons très peu de choses sur les cultures baleinières anciennes. En fait, il n\'y a qu\'un seul village de cinq maisons qui a été découvert au cap Krusenstern (en), au nord du détroit de Béring. Il y avait des os de phoque dans les maisons et des os de baleine étendus sur les plages environnantes. On peut considérer cette culture comme une tentative éphémère de mixité, des Aléoutes peut-être, des Esquimaux ou des Amérindiens.', 0, 0, '2018-04-19 22:04:04');

-- --------------------------------------------------------

--
-- Structure de la table `commentarys`
--

DROP TABLE IF EXISTS `commentarys`;
CREATE TABLE IF NOT EXISTS `commentarys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) NOT NULL,
  `commentary` text NOT NULL,
  `approuved` int(11) NOT NULL,
  `signaled` int(11) NOT NULL,
  `delete_commentary` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_commentary` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentarys`
--

INSERT INTO `commentarys` (`id`, `name_user`, `commentary`, `approuved`, `signaled`, `delete_commentary`, `book_id`, `date_commentary`) VALUES
(101, 'Vincent', 'test commentaire sur les lacs', 0, 0, 0, 100, '2018-04-17 22:14:07'),
(102, 'Jean', 'test id 98', 0, 0, 0, 98, '2018-04-17 22:23:18'),
(137, 'Gunter', 'y a pas le feu aux lacs !', 0, 1, 0, 100, '2018-04-18 14:10:29'),
(138, 'Philou', 'Petit test du soir !', 0, 0, 0, 100, '2018-04-19 20:50:01'),
(139, 'Philou', 'Petit test sur les commentaires !', 0, 1, 0, 102, '2018-04-20 17:24:11'),
(141, 'Philou', 'C\'est encore moi avec un petit test !!', 0, 1, 0, 102, '2018-04-20 18:17:21'),
(142, 'liliua', 'Excellent ! ', 0, 0, 0, 98, '2018-04-20 21:45:12'),
(152, 'Philou', 'test sur le signalement des commentaires :-)', 0, 1, 0, 102, '2018-04-22 17:50:52'),
(153, 'Philou', 'Test', 0, 0, 0, 98, '2018-04-22 18:25:29'),
(154, 'Philou', 're test', 0, 0, 0, 98, '2018-04-22 18:26:33'),
(156, 'Philippe', 'Jolie culture !', 0, 1, 0, 102, '2018-04-22 19:50:41');

-- --------------------------------------------------------

--
-- Structure de la table `login_admin`
--

DROP TABLE IF EXISTS `login_admin`;
CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `mail_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `key_recup_mail` varchar(60) DEFAULT NULL,
  `date_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login_admin`
--

INSERT INTO `login_admin` (`id`, `prenom`, `nom`, `pseudo`, `mail_admin`, `password_admin`, `key_recup_mail`, `date_login`) VALUES
(1, 'jean', 'forteroche', 'jeannot', 'jean@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-03-24 13:12:40'),
(2, 'philippe', 'chamard', 'philou', 'phil@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-03-29 12:06:40'),
(3, 'jean louis', 'etienne', 'lou', 'lou@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-03-29 16:13:30'),
(4, 'tintin', 'had', 'milou', 'milou@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-03-29 17:36:33'),
(5, 'christelle', 'fonkwa', 'cricri', 'cri@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-03-29 19:17:22'),
(6, 'phil', 'chamar', 'philoem', 'philoem@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-04-03 10:39:45'),
(7, '50', 'michelin', 'mimi', 'mimi@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '', '2018-04-03 10:41:17'),
(11, 'albert', 'einstein', 'beber', 'beber@free.fr', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', NULL, '2018-04-16 20:53:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
