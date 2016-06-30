-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2016 às 01:01
-- Versão do servidor: 5.6.17
-- Versão do PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `horarioreal`
--
CREATE DATABASE IF NOT EXISTS `horarioreal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `horarioreal`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tcidade`
--

CREATE TABLE IF NOT EXISTS `tcidade` (
  `CodCid` int(8) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`CodCid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `tcidade`
--

INSERT INTO `tcidade` (`CodCid`, `Nome`) VALUES
(1, 'Canoas'),
(5, 'Esteio'),
(3, 'Sapucaia'),
(4, 'SÃ£o Leopoldo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tdia`
--

CREATE TABLE IF NOT EXISTS `tdia` (
  `CodDia` int(9) NOT NULL AUTO_INCREMENT,
  `DescDia` varchar(100) NOT NULL,
  PRIMARY KEY (`CodDia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `tdia`
--

INSERT INTO `tdia` (`CodDia`, `DescDia`) VALUES
(1, 'Seg-Sex'),
(2, 'Sabado'),
(3, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tempresa`
--

CREATE TABLE IF NOT EXISTS `tempresa` (
  `CodEmp` int(8) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`CodEmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `tempresa`
--

INSERT INTO `tempresa` (`CodEmp`, `Nome`) VALUES
(5, 'Bem SL'),
(2, 'Real'),
(3, 'Vicasa'),
(4, 'Central');

-- --------------------------------------------------------

--
-- Estrutura para tabela `thorario`
--

CREATE TABLE IF NOT EXISTS `thorario` (
  `CodHor` int(8) NOT NULL AUTO_INCREMENT,
  `CodLin` int(8) NOT NULL,
  `CodDia` int(8) NOT NULL,
  `Horario` time NOT NULL,
  `Elevador` int(11) NOT NULL DEFAULT '0',
  `Observ` varchar(100) DEFAULT NULL,
  `Terminal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodHor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Fazendo dump de dados para tabela `thorario`
--

INSERT INTO `thorario` (`CodHor`, `CodLin`, `CodDia`, `Horario`, `Elevador`, `Observ`, `Terminal`) VALUES
(166, 4, 1, '14:00:00', 0, NULL, NULL),
(172, 4, 3, '10:00:00', 1, NULL, NULL),
(163, 4, 1, '09:00:00', 0, NULL, NULL),
(168, 12, 1, '08:40:00', 1, NULL, NULL),
(169, 12, 1, '10:59:00', 0, NULL, NULL),
(170, 12, 1, '22:22:00', 0, NULL, NULL),
(171, 12, 1, '22:10:00', 1, NULL, NULL),
(173, 4, 1, '12:00:00', 0, NULL, NULL),
(174, 4, 1, '13:00:00', 0, NULL, NULL),
(175, 4, 1, '22:00:00', 1, NULL, NULL),
(176, 12, 1, '15:00:00', 1, NULL, NULL),
(177, 12, 1, '08:00:00', 1, NULL, NULL),
(178, 12, 1, '09:30:00', 1, NULL, NULL),
(179, 12, 1, '10:00:00', 1, NULL, NULL),
(180, 12, 1, '10:30:00', 0, NULL, NULL),
(181, 12, 1, '11:00:00', 0, NULL, NULL),
(182, 12, 1, '11:30:00', 1, NULL, NULL),
(183, 12, 1, '12:00:00', 1, NULL, NULL),
(184, 12, 1, '12:30:00', 0, NULL, NULL),
(185, 12, 1, '13:00:00', 1, NULL, NULL),
(186, 12, 1, '13:30:00', 0, NULL, NULL),
(187, 12, 1, '14:00:00', 1, NULL, NULL),
(188, 12, 1, '14:30:00', 1, NULL, NULL),
(189, 12, 1, '16:00:00', 0, NULL, NULL),
(190, 12, 1, '16:30:00', 0, NULL, NULL),
(191, 12, 1, '17:00:00', 0, NULL, NULL),
(192, 12, 1, '17:30:00', 1, NULL, NULL),
(193, 12, 1, '18:00:00', 1, NULL, NULL),
(194, 12, 1, '18:30:00', 1, NULL, NULL),
(195, 12, 1, '19:00:00', 1, NULL, NULL),
(196, 12, 1, '19:30:00', 0, NULL, NULL),
(197, 12, 1, '20:00:00', 0, NULL, NULL),
(198, 12, 1, '20:30:00', 1, NULL, NULL),
(199, 12, 1, '21:00:00', 0, NULL, NULL),
(200, 12, 1, '21:30:00', 1, NULL, NULL),
(201, 12, 1, '22:00:00', 0, NULL, NULL),
(202, 12, 1, '22:30:00', 1, NULL, NULL),
(203, 12, 2, '08:00:00', 0, NULL, NULL),
(204, 12, 2, '08:30:00', 1, NULL, NULL),
(205, 12, 2, '09:30:00', 1, NULL, NULL),
(206, 12, 2, '10:00:00', 0, NULL, NULL),
(207, 12, 2, '10:30:00', 1, NULL, NULL),
(208, 12, 2, '11:30:00', 1, NULL, NULL),
(209, 12, 2, '12:00:00', 1, NULL, NULL),
(210, 12, 2, '12:30:00', 0, NULL, NULL),
(211, 12, 2, '13:00:00', 1, NULL, NULL),
(212, 12, 2, '13:30:00', 0, NULL, NULL),
(213, 12, 2, '14:00:00', 1, NULL, NULL),
(214, 12, 2, '14:30:00', 0, NULL, NULL),
(215, 12, 2, '15:00:00', 0, NULL, NULL),
(216, 12, 2, '15:30:00', 0, NULL, NULL),
(217, 12, 2, '16:00:00', 1, NULL, NULL),
(218, 12, 2, '16:30:00', 0, NULL, NULL),
(219, 12, 2, '17:30:00', 0, NULL, NULL),
(220, 12, 2, '17:00:00', 1, NULL, NULL),
(221, 12, 2, '18:00:00', 1, NULL, NULL),
(222, 12, 2, '18:30:00', 0, NULL, NULL),
(223, 12, 2, '20:00:00', 0, NULL, NULL),
(224, 12, 2, '20:30:00', 1, NULL, NULL),
(225, 12, 3, '08:00:00', 0, NULL, NULL),
(226, 12, 3, '08:30:00', 1, NULL, NULL),
(227, 12, 3, '09:30:00', 1, NULL, NULL),
(228, 12, 3, '10:00:00', 0, NULL, NULL),
(229, 12, 3, '10:30:00', 1, NULL, NULL),
(230, 12, 3, '11:30:00', 1, NULL, NULL),
(231, 12, 3, '12:00:00', 1, NULL, NULL),
(232, 12, 3, '12:30:00', 0, NULL, NULL),
(233, 12, 3, '13:00:00', 1, NULL, NULL),
(234, 12, 3, '13:30:00', 0, NULL, NULL),
(235, 12, 3, '14:00:00', 1, NULL, NULL),
(236, 12, 3, '14:30:00', 0, NULL, NULL),
(237, 12, 3, '15:00:00', 0, NULL, NULL),
(238, 12, 3, '15:30:00', 0, NULL, NULL),
(239, 12, 3, '16:00:00', 1, NULL, NULL),
(240, 12, 3, '16:30:00', 0, NULL, NULL),
(241, 12, 3, '17:30:00', 0, NULL, NULL),
(242, 12, 3, '17:00:00', 1, NULL, NULL),
(243, 12, 3, '18:00:00', 1, NULL, NULL),
(244, 12, 3, '18:30:00', 0, NULL, NULL),
(245, 12, 3, '20:00:00', 0, NULL, NULL),
(246, 12, 3, '20:30:00', 1, NULL, NULL),
(247, 12, 1, '08:30:00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tlinha`
--

CREATE TABLE IF NOT EXISTS `tlinha` (
  `CodLin` int(8) NOT NULL AUTO_INCREMENT,
  `AbrLin` varchar(6) DEFAULT NULL,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`CodLin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `tlinha`
--

INSERT INTO `tlinha` (`CodLin`, `AbrLin`, `Nome`) VALUES
(2, 'L1', 'Linha 1'),
(12, 'Int', 'IntegraÃ§Ã£o'),
(4, 'Cir', 'Circular'),
(8, 'L2', 'Linha 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tmotorista`
--

CREATE TABLE IF NOT EXISTS `tmotorista` (
  `CodMot` int(8) NOT NULL AUTO_INCREMENT,
  `Nome` text NOT NULL,
  `CPF` int(11) NOT NULL,
  `CNH` varchar(11) NOT NULL,
  PRIMARY KEY (`CodMot`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `tmotorista`
--

INSERT INTO `tmotorista` (`CodMot`, `Nome`, `CPF`, `CNH`) VALUES
(8, 'joselito', 9390, '3090');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tonibus`
--

CREATE TABLE IF NOT EXISTS `tonibus` (
  `CodBus` int(8) NOT NULL AUTO_INCREMENT,
  `Ano` int(4) DEFAULT NULL,
  `Placa` varchar(7) DEFAULT NULL,
  `Elevador` tinyint(1) NOT NULL,
  `Ar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CodBus`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `tonibus`
--

INSERT INTO `tonibus` (`CodBus`, `Ano`, `Placa`, `Elevador`, `Ar`) VALUES
(1, 2000, 'kkd3332', 0, 0),
(3, 2000, 'jgk9848', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ttabela`
--

CREATE TABLE IF NOT EXISTS `ttabela` (
  `CodTab` int(8) NOT NULL AUTO_INCREMENT,
  `CodLin` int(8) NOT NULL,
  `CodBus` int(8) NOT NULL,
  `CodMot` int(8) NOT NULL,
  `CodTar` int(8) NOT NULL,
  `CodEmp` int(8) NOT NULL,
  PRIMARY KEY (`CodTab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ttarifa`
--

CREATE TABLE IF NOT EXISTS `ttarifa` (
  `CodTar` int(8) NOT NULL AUTO_INCREMENT,
  `CodEmp` int(8) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Preco` float NOT NULL,
  PRIMARY KEY (`CodTar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Fazendo dump de dados para tabela `ttarifa`
--

INSERT INTO `ttarifa` (`CodTar`, `CodEmp`, `Nome`, `Preco`) VALUES
(1, 2, 'Municipal', 3.2),
(2, 2, 'Municipal', 3.2),
(4, 3, 'Municipal', 3.2),
(6, 4, 'interdddd', 3.1),
(10, 5, 'geral', 3.9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
