-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2015 às 00:51
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bancoos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE IF NOT EXISTS `itens` (
  `id_itens` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `qtd_estoque` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_itens`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_os`
--

CREATE TABLE IF NOT EXISTS `itens_os` (
  `id_ios` int(20) NOT NULL,
  `nome_ios` varchar(50) NOT NULL,
  `valor_ios` double NOT NULL,
  `descricao_ios` varchar(100) NOT NULL,
  `qtd_venda` int(20) NOT NULL,
  `n_i` int(11) NOT NULL,
  PRIMARY KEY (`id_ios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomefun` varchar(50) NOT NULL,
  `cpf_fun` varchar(50) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `id_os` int(11) NOT NULL,
  `nomecli` varchar(100) NOT NULL,
  `telefonecli` varchar(100) NOT NULL,
  `cpfcli` varchar(100) NOT NULL,
  `emailcli` varchar(100) NOT NULL,
  `enderecocli` varchar(100) NOT NULL,
  `nomefun` varchar(100) NOT NULL,
  `telefonefun` varchar(100) NOT NULL,
  `datacri` datetime NOT NULL,
  `datafinal` datetime DEFAULT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descricao_os` varchar(900) DEFAULT NULL,
  `valor` double NOT NULL,
  `status` varchar(500) NOT NULL,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `soli`
--

CREATE TABLE IF NOT EXISTS `soli` (
  `idsoli` int(11) NOT NULL AUTO_INCREMENT,
  `nomesoli` varchar(50) DEFAULT NULL,
  `telsoli` varchar(50) NOT NULL,
  `enderecosoli` varchar(50) NOT NULL,
  `emailsoli` varchar(50) NOT NULL,
  `descrisoli` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`idsoli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
