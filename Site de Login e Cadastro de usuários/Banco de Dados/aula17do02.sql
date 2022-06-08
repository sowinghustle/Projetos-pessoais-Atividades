-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jun-2022 às 20:03
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aula17do02`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cli_cod` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(200) NOT NULL,
  `cli_fone` varchar(15) NOT NULL,
  `cli_cpf` varchar(15) NOT NULL,
  `cli_data` int(15) NOT NULL,
  PRIMARY KEY (`cli_cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cli_cod`, `cli_nome`, `cli_fone`, `cli_cpf`, `cli_data`) VALUES
(10, 'Rivers Cuomo', '', '666666666666', 1970),
(8, 'guilherme', '123456', '123456789', 2005);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
