-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/10/2025 às 05:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

DROP TABLE IF EXISTS `autores`;
CREATE TABLE IF NOT EXISTS `autores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `pais_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pais_id` (`pais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autores`
--

INSERT INTO `autores` (`id`, `nome`, `pais_id`) VALUES
(1, 'Machado de Assis', 1),
(2, 'José de Alencar', 1),
(3, 'Clarice Lispector', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id`, `nome`) VALUES
(1, 'Romance'),
(2, 'Drama'),
(3, 'Ficção'),
(4, 'Poesia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero_livro`
--

DROP TABLE IF EXISTS `genero_livro`;
CREATE TABLE IF NOT EXISTS `genero_livro` (
  `livro_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  PRIMARY KEY (`livro_id`,`genero_id`),
  KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero_livro`
--

INSERT INTO `genero_livro` (`livro_id`, `genero_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 4),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(6, 1),
(6, 4),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 2),
(10, 2),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `autor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `autor_id` (`autor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor_id`) VALUES
(1, 'Dom Casmurro', 1),
(2, 'Memórias Póstumas de Brás Cubas', 1),
(3, 'Iracema', 2),
(4, 'A Hora da Estrela', 3),
(5, 'Quincas Borba', 1),
(6, 'O Guarani', 2),
(7, 'Lucíola', 2),
(8, 'Senhora', 2),
(9, 'Caminho de Pedras', 3),
(10, 'Laços de Família', 3),
(11, 'Perto do Coração Selvagem', 3),
(12, 'O Primo Basílio', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `gentilico` varchar(30) NOT NULL,
  `sigla` varchar(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `paises`
--

INSERT INTO `paises` (`id`, `nome`, `gentilico`, `sigla`) VALUES
(1, 'Brasil', 'brasileira', 'BRA'),
(2, 'Ucrânia', 'ucraniana', 'UKR'),
(3, 'Estados Unidos da América', 'estudounidense', 'USA'),
(4, 'Argentina', 'argentina', 'ARG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `email`) VALUES
(1, 'joao', '123456', 'joao@example.com'),
(2, 'maria', '123456', 'maria@example.com'),
(3, 'pedro', '123456', 'pedro@example.com'),
(4, 'ana', '123456', 'ana@example.com'),
(5, 'lucas', '123456', 'lucas@example.com'),
(6, 'juliana', '123456', 'juliana@example.com'),
(7, 'carlos', '123456', 'carlos@example.com'),
(8, 'fernanda', '123456', 'fernanda@example.com');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `autores_ibfk_1` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `genero_livro`
--
ALTER TABLE `genero_livro`
  ADD CONSTRAINT `genero_livro_ibfk_1` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genero_livro_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
