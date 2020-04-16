SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `boardgames`;
CREATE TABLE IF NOT EXISTS `boardgames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `players_min` int(2) NOT NULL,
  `players_max` int(2) NOT NULL,
  `age_min` int(2) NOT NULL,
  `age_max` int(2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boardgames`
--

INSERT INTO `boardgames` (`id`, `name`, `players_min`, `players_max`, `age_min`, `age_max`, `picture`) VALUES
(1, 'Agricola', 1, 5, 14, 99, 'https://cdn3.trictrac.net/documents/formats/thumb_300_300/documents/originals/a3/8c/5a7394b217b5ddb5c4d9027a63985b28bad0.jpeg'),
(2, 'Space Alert', 1, 5, 12, 99, 'https://cdn.trictrac.net/documents/formats/thumb_300_300/documents/originals/6c/d3/bef4a046c9cb88a0a4ada124ac31396cf28d.jpeg'),
(3, 'Red7', 2, 4, 10, 99, 'https://cdn3.trictrac.net/documents/formats/thumb_300_300/documents/originals/91/b5/2f6d3c7f8b607aea735ac12c2ab1b02066d853f15f4f008fec3a8b4bd13d.jpeg'),
(4, '7 Wonders', 2, 7, 10, 99, 'https://cdn.trictrac.net/documents/formats/thumb_300_300/documents/originals/05/32/a7f656db405ecc4bc5d006c5f3e5535be73e.jpeg'),
(5, '1,2,3 Hop là!', 2, 4, 2, 6, 'https://cdn3.trictrac.net/documents/formats/thumb_300_300/documents/originals/78/f0/c7f5db23cbb9d8554d883974f7a8eeb793aa.jpeg'),
(6, 'Pandémie', 2, 4, 10, 99, 'https://cdn1.trictrac.net/documents/formats/thumb_300_300/documents/originals/73/1b/c4ef0bbf436890c8aa070289aaee5475af7d.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
