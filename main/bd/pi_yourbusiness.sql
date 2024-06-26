SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `pi_yourbusiness`
--
CREATE DATABASE IF NOT EXISTS `pi_yourbusiness` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pi_yourbusiness`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `razaosocial` VARCHAR(200) NOT NULL,
  `ano` YEAR NOT NULL,
  `ramo` VARCHAR(200) NOT NULL,
  `produto` VARCHAR(20) NOT NULL,
  `tributacao` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `razaosocial`, `ano`, `ramo`, `produto`, `tributacao`) VALUES
(1, 'Cliente 1', 'Empresa 1', 2000, 'Exemplo campo2 Social', 'P', 0),
(2, 'Cliente 2', 'Empresa 2', 1501, 'Outra campo2 Social', 'Pau Brasil', 1),
(3, 'Cliente 3', 'Empres a3', 1945, 'Mais uma campo2 Social', '(())', 0),
(4, 'Cliente 4', 'Empresa 4', 1984, 'campo2 Social Ltda', 'Produtos', 1),
(5, 'Cliente 5', 'Empresa 5', 2001, 'campo2 Social Ltda', 'Aviões', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `cliente` varchar(254) NOT NULL,
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
  `cpf` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cliente`, `nivel_acesso`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`, `senha`, `email`, `telefone`, `data_nascimento`, `cpf`) VALUES
(1, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(2, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(3, 'asd', 1, '234324', '23423s', '234', 'asdf', 'sadsad', '9', 'dsfsdf', '546546', '324234', '2024-05-22', 'asd'),
(4, 'ytygfdh', 1, '324324', '23432', '324', '34322', '4234324', '17', 'dsfsdf', '546546', '24324', '2024-05-16', 'gfdhgfdh'),
(5, 'i65756765', 0, '65756', '657657', '567567', '576657', '675657', '17', 'dsfsdf', '546546', '7567567', '2024-05-23', '7657657'),
(6, 'i65756765', 0, '65756', '657657', '567567', '576657', '675657', '17', 'dsfsdf', '546546', '7567567', '2024-05-23', '7657657'),
(7, '5345', 0, '24324', '324324', '324324', '324234', '234324', '14', 'dsfsdf', '546546', '4343', '2024-05-09', '45435435'),
(8, '5345', 0, '24324', '324324', '324324', '324234', '234324', '14', 'dsfsdf', '546546', '4343', '2024-05-09', '45435435'),
(9, 'vazio', 1, '123456', '123456', '123456', '123456', '123456', '17', 'dsfsdf', '546546', '123456', '2024-05-09', '123456'),
(10, 'vazio', 1, '123456', '123456', '123456', '123456', '123456', '17', 'dsfsdf', '546546', '123456', '2024-05-09', '123456'),
(11, 'vazio', 1, '123456', '123456', '123456', '123456', '123456', '17', 'dsfsdf', '546546', '123456', '2024-05-09', '123456'),
(12, 'vazio', 1, '123456', '123456', '123456', '123456', '123456', '17', 'dsfsdf', '546546', '123456', '2024-05-09', '123456'),
(13, 'vazio', 1, '123456', '123456', '123456', '123456', '123456', '17', 'dsfsdf', '546546', '123456', '2024-05-09', '123456');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */; 