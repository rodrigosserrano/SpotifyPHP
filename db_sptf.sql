-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2019 às 01:14
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sptf`
--
CREATE DATABASE IF NOT EXISTS `db_sptf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_sptf`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_albuns`
--

CREATE TABLE `tb_albuns` (
  `ID` int(11) NOT NULL,
  `BANDA_ID` int(11) NOT NULL,
  `GENERO_ID` int(11) DEFAULT NULL,
  `NOME_ALBUM` varchar(40) NOT NULL,
  `IMG_ALBUM` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_albuns`
--

INSERT INTO `tb_albuns` (`ID`, `BANDA_ID`, `GENERO_ID`, `NOME_ALBUM`, `IMG_ALBUM`) VALUES
(2, 1, 1, 'VI', 'img/albuns/VI.png'),
(5, 2, 2, 'The Dark Side of The Moon', 'img/albuns/The_Dark_Side_of_the_Moon.png'),
(1, 3, 1, 'Seiva', 'img/albuns/Seiva.jpg'),
(7, 2, 2, 'Wish You Were Here', 'img/albuns/Wish_You_Were_Here.jpg'),
(8, 1, 2, 'Psicodeliamorsexo&distorção', 'img/albuns/Psicodeliamorsexo.jpg'),
(23, 8, 5, 'Hybrid Theory', 'img/albuns/Hybrid_Theory.jpg'),
(20, 5, 5, 'Ghosts Stories', 'img/albuns/Ghost_Stories.jpg'),
(24, 8, 5, 'Minutes to Midnight', 'img/albuns/Minutes_to_Midnight.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bandas`
--

CREATE TABLE `tb_bandas` (
  `ID` int(11) NOT NULL,
  `NOME_BANDA` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_bandas`
--

INSERT INTO `tb_bandas` (`ID`, `NOME_BANDA`) VALUES
(1, 'Detonautas'),
(2, 'Pink Floyd'),
(3, 'Rancore'),
(8, 'Linkin Park'),
(5, 'Coldplay');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fav`
--

CREATE TABLE `tb_fav` (
  `id_usuario` int(11) NOT NULL,
  `id_musica` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_fav`
--

INSERT INTO `tb_fav` (`id_usuario`, `id_musica`) VALUES
(1, 1),
(1, 0),
(2, 1),
(1, 0),
(1, 2),
(3, 2),
(1, 3),
(1, 4),
(3, 5),
(3, 4),
(1, 37),
(1, 46),
(8, 6),
(8, 46),
(8, 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `ID` int(11) NOT NULL,
  `GENERO` varchar(40) NOT NULL,
  `IMG_GENERO` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`ID`, `GENERO`, `IMG_GENERO`) VALUES
(1, 'Rock Nacional', 'rock_n.jpg'),
(2, 'Rock Clássico', 'rock_c.jpg'),
(3, 'Eletrônica', 'eletronica.jpg'),
(4, 'Top Brasil', 'topbrasil.jpg'),
(5, 'Rock', 'rock.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_musicas`
--

CREATE TABLE `tb_musicas` (
  `ID` int(11) NOT NULL,
  `ALBUM_ID` int(11) NOT NULL,
  `GENERO_ID` int(11) DEFAULT NULL,
  `NOME_MUSICA` varchar(40) NOT NULL,
  `PLAYER_MUSICA` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_musicas`
--

INSERT INTO `tb_musicas` (`ID`, `ALBUM_ID`, `GENERO_ID`, `NOME_MUSICA`, `PLAYER_MUSICA`) VALUES
(1, 5, 2, 'Us and Them', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/83380061&color=%2340312d&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(2, 7, 2, 'Wish You Were Here', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/123714278&color=%2340312d&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(3, 7, 2, 'Shine On You Crazy Diamond', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/554129&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(4, 7, 2, 'Welcome to the Machine', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/392051373&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(5, 7, 2, 'Shine On You Crazy Diamond', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/554129&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(6, 7, 2, 'Have A Cigar', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/268071976&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(7, 5, 2, 'Speak to Me', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/34640046&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(30, 23, 5, 'Papercut', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/21023489&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(31, 23, 5, 'One Step Closer', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/7723321&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(32, 23, 5, 'With You', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/110863441&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(33, 23, 5, 'Points of Authority', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/16777848&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(34, 23, 5, 'Crawling', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/219074815&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(35, 23, 5, 'Runaway', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/61453011&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(36, 23, 5, 'By Myself', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51522716&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(37, 23, 5, 'In the End', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/112774699&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(38, 23, 5, 'A Place for My Head', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/4194527&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(39, 23, 5, 'Forgotten', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/92952092&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(40, 23, 5, 'Cure for the Itch', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/172429537&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(41, 23, 5, 'Pushing Me Away', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/7694824&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(43, 24, 5, 'The Little Things Give You Away', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/10637402&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(44, 24, 5, 'Given Up', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/91157607&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(45, 24, 5, 'Leave Out All the Rest', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/122677861&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(46, 24, 5, 'Bleed It Out', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/92797975&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(47, 24, 5, 'Shadow of the Day', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/62662747&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(48, 24, 5, 'What Ive Done', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/435809922&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(49, 24, 5, 'Hands Held High', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/195505605&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(50, 24, 5, 'No More Sorrow', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/228829480&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(51, 24, 5, 'Valentines Day', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/36440311&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(52, 24, 5, 'In Between', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/3500378&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true'),
(53, 24, 5, 'In Pieces', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/87305861&color=%2340312d&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `permissao` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`, `permissao`) VALUES
(1, 'Rodrigo', 'rodrigooh.dl@gmail.com', 'b9dbf59a7c8bca9b3822127d78a2cfdb', 0),
(3, 'Teste', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', 0),
(8, 'Admin', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_albuns_bandas`
--
CREATE TABLE `vw_albuns_bandas` (
`ALBUM_ID` int(11)
,`NOME_ALBUM` varchar(40)
,`IMG_ALBUM` varchar(255)
,`BANDA_ID` int(11)
,`NOME_BANDA` varchar(40)
,`GENERO_ID` int(11)
,`GENERO` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_musicas`
--
CREATE TABLE `vw_musicas` (
`ID` int(11)
,`NOME_ALBUM` varchar(40)
,`NOME_BANDA` varchar(40)
,`NOME_MUSICA` varchar(40)
,`PLAYER_MUSICA` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_albuns_bandas`
--
DROP TABLE IF EXISTS `vw_albuns_bandas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_albuns_bandas`  AS  select `a`.`ID` AS `ALBUM_ID`,`a`.`NOME_ALBUM` AS `NOME_ALBUM`,`a`.`IMG_ALBUM` AS `IMG_ALBUM`,`b`.`ID` AS `BANDA_ID`,`b`.`NOME_BANDA` AS `NOME_BANDA`,`g`.`ID` AS `GENERO_ID`,`g`.`GENERO` AS `GENERO` from ((`tb_bandas` `b` left join `tb_albuns` `a` on((`b`.`ID` = `a`.`BANDA_ID`))) left join `tb_genero` `g` on((`g`.`ID` = `a`.`GENERO_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_musicas`
--
DROP TABLE IF EXISTS `vw_musicas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_musicas`  AS  select `m`.`ID` AS `ID`,`a`.`NOME_ALBUM` AS `NOME_ALBUM`,`b`.`NOME_BANDA` AS `NOME_BANDA`,`m`.`NOME_MUSICA` AS `NOME_MUSICA`,`m`.`PLAYER_MUSICA` AS `PLAYER_MUSICA` from ((`tb_albuns` `a` join `tb_bandas` `b`) join `tb_musicas` `m`) where ((`a`.`ID` = `m`.`ALBUM_ID`) and (`b`.`ID` = `a`.`BANDA_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_albuns`
--
ALTER TABLE `tb_albuns`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BANDA_FK` (`BANDA_ID`),
  ADD KEY `GENERO_FK` (`GENERO_ID`);

--
-- Indexes for table `tb_bandas`
--
ALTER TABLE `tb_bandas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_musicas`
--
ALTER TABLE `tb_musicas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ALBUM_FK` (`ALBUM_ID`),
  ADD KEY `GENERO_FK` (`GENERO_ID`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_albuns`
--
ALTER TABLE `tb_albuns`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_bandas`
--
ALTER TABLE `tb_bandas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_musicas`
--
ALTER TABLE `tb_musicas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Usuário DB

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';


GRANT ALL PRIVILEGES ON `db_sptf` . * TO 'aluno'@'localhost';
