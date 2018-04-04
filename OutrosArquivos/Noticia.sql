-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/03/2018 às 15:32
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
-- Estrutura para tabela `Noticia`
--

CREATE TABLE `Noticia` (
  `id` int(11) NOT NULL,
  `data_publicacao` date NOT NULL,
  `data_evento` date NOT NULL,
  `data_validade` date NOT NULL,
  `id_assunto` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `anexo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabela `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_assunto` (`id_assunto`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- AUTO_INCREMENT de tabela `Noticia`
--
ALTER TABLE `Noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Noticia`
--
ALTER TABLE `Noticia`
  ADD CONSTRAINT `Noticia_ibfk_2` FOREIGN KEY (`id_assunto`) REFERENCES `Assunto` (`id`),
  ADD CONSTRAINT `Noticia_ibfk_3` FOREIGN KEY (`id_responsavel`) REFERENCES `Responsavel` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
