
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2023 às 23:17
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_lab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `laboratorios`
--

CREATE TABLE `laboratorios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `local` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `laboratorios`
--

INSERT INTO `laboratorios` (`id`, `nome`, `local`) VALUES
(3, 'Laboratório de Química', 'Área Principal'),
(4, 'Laboratório de Biologia', 'Área Principal'),
(5, 'Laboratório de Física', 'Área Principal'),
(6, 'Laboratório de Matemática', 'Área Principal'),
(7, 'Laboratório de Informática', 'Área Principal'),
(8, 'Laboratório de Línguas', 'Área Principal'),
(9, 'Laboratório de Redes', 'Área Especial'),
(10, 'Espaço 4.0', 'Área Especial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `laboratorio` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trancas`
--

CREATE TABLE `trancas` (
  `codigo` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`matricula`, `nome`, `email`, `senha`, `status`) VALUES
(1234, 'Erik Nascimento', 'erik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4278887, 'Adjailson Ferreira', 'adj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data` (`data`),
  ADD KEY `laboratorio` (`laboratorio`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices para tabela `trancas`
--
ALTER TABLE `trancas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `laboratorios`
--
ALTER TABLE `laboratorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`laboratorio`) REFERENCES `laboratorios` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`matricula`);

--
-- Limitadores para a tabela `trancas`
--
ALTER TABLE `trancas`
  ADD CONSTRAINT `trancas_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `laboratorios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
