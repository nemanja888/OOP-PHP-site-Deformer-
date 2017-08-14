-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 09:43 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deformer_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `autor_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `autor_surname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `autor_name`, `autor_surname`, `email`, `link`) VALUES
(1, 'Dragan', 'Kolubrc', 'kolubrc@gsmail.com', ''),
(2, 'Mirko ', 'Brkoprst', 'Brkoprstov@syahoo.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`, `link`) VALUES
(1, 'Vesti', 'index.php?cid=1'),
(2, 'Sport', 'index.php?cid=2'),
(3, 'Kultura', 'index.php?cid=3'),
(4, 'Razonoda', 'index.php?cid=4');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `comment` varchar(1024) COLLATE utf8_slovenian_ci NOT NULL,
  `vest_id` int(10) UNSIGNED NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `korisnik_id`, `comment`, `vest_id`, `time`) VALUES
(29, 14, 'wdeasdasd', 3, '2017-04-15 11:21:40'),
(32, 16, 'Hahahahahaha vucic je kralj!', 1, '2017-04-16 12:13:24'),
(33, 16, 'Novi komentar', 3, '2017-04-16 13:04:58'),
(34, 16, 'Novi komentar', 3, '2017-04-16 13:06:37'),
(35, 15, 'Neki komentar1', 3, '2017-04-16 16:07:50'),
(36, 15, 'Neki komentar 2', 3, '2017-04-16 16:08:02'),
(37, 15, 'Neki komentar1', 3, '2017-04-16 16:08:37'),
(38, 15, 'Komentar neki', 1, '2017-04-16 16:09:03'),
(39, 14, 'Markov komentar', 2, '2017-04-16 16:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `comentar_id` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `admin` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `name`, `email`, `password`, `comentar_id`, `admin`) VALUES
(14, 'Marko', 'marko@mail.com', '202cb962ac59075b964b07152d234b70', NULL, 'admin'),
(15, 'Nikoja', 'nik@laj.com', '99c5e07b4d5de9d18c350cdf64c5aa3d', NULL, NULL),
(16, 'Nemanja', 'nemanja@mail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`) VALUES
(1, 'HOME', 'index.php'),
(2, 'VESTI', 'index.php?cid=1'),
(3, 'SPORT', 'index.php?cid=2'),
(4, 'KULTURA', 'index.php?cid=3'),
(5, 'RAZONODA', 'index.php?cid=4');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modules` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`, `modules`) VALUES
(1, 'HOME', 'mod_article'),
(2, 'ADMIN', 'mod_article,comments'),
(3, 'CONTACT', 'contact_form');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `link` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `picture_name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `link`, `picture_name`) VALUES
(1, 'resources/img/military.jpg', 'airplane'),
(2, 'resources/img/nije_vucic.jpg', 'gay'),
(3, 'resources/img/lord.jpg', 'lord_'),
(4, 'resources/img/seseljnator.jpg', 'seseljnator'),
(5, 'resources/img/zoran.jpg', 'tabla'),
(14, 'resources/img/silikoni.jpg', 'silikoni.jpg'),
(17, 'resources/img/imagessad.jpg', 'imagessad.jpg'),
(18, 'resources/img/silikoni.jpg', 'silikoni.jpg'),
(19, 'resources/img/imagessad.jpg', 'imagessad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `content` varchar(256) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `content`) VALUES
(1, 'facebook', '<a href="https://sr-rs.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>'),
(2, 'github', '<a href="https://github.com/nemanja888/"><i class="fa fa-github" aria-hidden="true"></i></a>'),
(3, 'linkedin', '<a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>'),
(4, 'pinterest', '<a href="https://www.pinterest.com/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `id` int(11) UNSIGNED NOT NULL,
  `naslov` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `vreme_objave` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor_id` int(10) NOT NULL,
  `categorie_id` int(10) NOT NULL,
  `picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`id`, `naslov`, `tekst`, `vreme_objave`, `autor_id`, `categorie_id`, `picture_id`) VALUES
(1, 'Vučić ponovo naoružava vojsku', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. FuLorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga asperLorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga asperga asper', '2017-04-08 13:47:10', 1, 1, 1),
(2, 'Nije Vučić peder...', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel...<', '2017-04-08 13:49:04', 2, 1, 2),
(3, 'Lord of the Vulin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel...', '2017-04-08 13:54:27', 1, 1, 3),
(4, 'I\'ll be back', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel...', '2017-04-08 13:54:27', 2, 1, 4),
(5, 'Spas fubalske reprezentacije Srbije', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet recusandae nobis inventore, reiciendis accusantium explicabo ratione illo delectus minus optio, dolorum, omnis, obcaecati rerum at doloribus. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel! Placeat repellendus nulla necessitatibus adipisci culpa soluta non facere ipsam deserunt iure amet. Architecto, necessitatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque beatae autem fugit. Fuga aspernatur ab, rem velit vel...', '2017-04-08 13:54:27', 1, 2, 5),
(19, 'Odbacila stare nabacila nove', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '2017-04-16 12:50:31', 1, 4, 18),
(20, 'Beli i Beli', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2017-04-16 12:53:30', 2, 3, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_korisnik_idx` (`korisnik_id`,`vest_id`),
  ADD KEY `fk_vest_idx` (`vest_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autor_idx` (`autor_id`),
  ADD KEY `fk_picture_idx` (`picture_id`),
  ADD KEY `fk_vest_category_idx` (`categorie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `vesti`
--
ALTER TABLE `vesti`
  ADD CONSTRAINT `fk_vest_autor` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vest_category` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vest_pict` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
