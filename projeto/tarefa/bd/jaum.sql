-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2024 às 02:51
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jaum`
--
CREATE DATABASE IF NOT EXISTS `jaum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jaum`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `uso` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `marca`, `preco`, `produto`, `uso`) VALUES
(1, '5435', '435345', '435435.00', '435543', 0),
(2, 'wesad', 'asdsad', '34324.00', 's32324', 0),
(3, 'erterter', 'tert', '435435.00', 'ert', 0),
(4, 'erterter', 'tert', '435435.00', 'ert', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(254) NOT NULL,
  `nivel_acesso` tinyint(4) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(254) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(254) DEFAULT NULL,
  `cidade` varchar(254) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `senha` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `telefone` varchar(21) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `nivel_acesso`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`, `senha`, `email`, `telefone`, `data_nascimento`, `cpf`) VALUES
(1, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(2, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(3, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(4, 'ytygfdh', 1, '324324', '23432', '324', '34322', '4234324', '17', 'dsfsdf', '546546', '24324', '2024-05-16', 'gfdhgfdh'),
(5, 'i65756765', 0, '65756', '657657', '567567', '576657', '675657', '17', 'dsfsdf', '546546', '7567567', '2024-05-23', '7657657'),
(6, 'i65756765', 0, '65756', '657657', '567567', '576657', '675657', '17', 'dsfsdf', '546546', '7567567', '2024-05-23', '7657657'),
(7, '5345', 0, '24324', '324324', '324324', '324234', '234324', '14', 'dsfsdf', '546546', '4343', '2024-05-09', '45435435'),
(8, '5345', 0, '24324', '324324', '324324', '324234', '234324', '14', 'dsfsdf', '546546', '4343', '2024-05-09', '45435435'),
(9, 'vazio', 1, NULL, NULL, NULL, NULL, NULL, '17', 'dsfsdf', '546546', NULL, NULL, NULL),
(10, 'vazio', 1, NULL, NULL, NULL, NULL, NULL, '17', 'dsfsdf', '546546', NULL, NULL, NULL),
(11, 'vazio', 1, NULL, NULL, NULL, NULL, NULL, '17', 'dsfsdf', '546546', NULL, NULL, NULL),
(12, 'vazio', 1, NULL, NULL, NULL, NULL, NULL, '17', 'dsfsdf', '546546', NULL, NULL, NULL),
(13, 'vazio', 1, NULL, NULL, NULL, NULL, NULL, '17', 'dsfsdf', '546546', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
