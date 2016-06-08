-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2016 às 01:41
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
(4, 'Sao Leopoldo');

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
  `Observ` varchar(100) DEFAULT NULL,
  `Terminal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CodHor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Fazendo dump de dados para tabela `thorario`
--

INSERT INTO `thorario` (`CodHor`, `CodLin`, `CodDia`, `Horario`, `Observ`, `Terminal`) VALUES
(4, 1, 1, '09:30:00', NULL, NULL),
(166, 4, 1, '14:00:00', NULL, NULL),
(162, 4, 1, '08:00:00', NULL, NULL),
(163, 4, 1, '09:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tlinha`
--

CREATE TABLE IF NOT EXISTS `tlinha` (
  `CodLin` int(8) NOT NULL AUTO_INCREMENT,
  `AbrLin` varchar(6) DEFAULT NULL,
  `Nome` varchar(100) NOT NULL,
  PRIMARY KEY (`CodLin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `tlinha`
--

INSERT INTO `tlinha` (`CodLin`, `AbrLin`, `Nome`) VALUES
(1, 'L1', 'Linha 1'),
(2, 'L2', 'Linha 2'),
(4, 'TM3', 'TM 32'),
(8, 'm9', 'metro 9');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `tmotorista`
--

INSERT INTO `tmotorista` (`CodMot`, `Nome`, `CPF`, `CNH`) VALUES
(5, 'uhu dois', 8322, 'agoravai');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `tonibus`
--

INSERT INTO `tonibus` (`CodBus`, `Ano`, `Placa`, `Elevador`, `Ar`) VALUES
(1, 2000, 'kkd3332', 1, 1),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `ttarifa`
--

INSERT INTO `ttarifa` (`CodTar`, `CodEmp`, `Nome`, `Preco`) VALUES
(1, 2, 'Municipal', 3.2),
(2, 2, 'Municipal', 3.2),
(4, 3, 'Municipal', 3.2),
(6, 4, 'interdddd', 3.1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
