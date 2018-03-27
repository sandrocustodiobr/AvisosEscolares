-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/03/2018 às 15:33
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `AvisosEscolares`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ResponsavelAssunto`
--

CREATE TABLE `ResponsavelAssunto` (
  `id` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_assunto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ResponsavelAssunto`
--

INSERT INTO `ResponsavelAssunto` (`id`, `id_responsavel`, `id_assunto`) VALUES
(1, 2, 1),
(3, 1, 3),
(4, 1, 1),
(5, 1, 2),
(6, 2, 3),
(7, 2, 6),
(9, 2, 10),
(10, 3, 1),
(11, 3, 2),
(13, 3, 9),
(14, 1, 9),
(15, 11, 6),
(16, 1, 10);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ResponsavelAssunto`
--
ALTER TABLE `ResponsavelAssunto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`id_responsavel`),
  ADD KEY `id_assunto` (`id_assunto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ResponsavelAssunto`
--
ALTER TABLE `ResponsavelAssunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `ResponsavelAssunto`
--
ALTER TABLE `ResponsavelAssunto`
  ADD CONSTRAINT `ResponsavelAssunto_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `Responsavel` (`id`),
  ADD CONSTRAINT `ResponsavelAssunto_ibfk_2` FOREIGN KEY (`id_assunto`) REFERENCES `Assunto` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
