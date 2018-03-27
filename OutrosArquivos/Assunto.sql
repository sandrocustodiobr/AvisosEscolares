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
-- Estrutura para tabela `Assunto`
--

CREATE TABLE `Assunto` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nomecurto` varchar(10) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `ano_semestre` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Assunto`
--

INSERT INTO `Assunto` (`id`, `id_curso`, `nomecurto`, `descricao`, `ano_semestre`, `imagem`) VALUES
(1, 1, 'CEEP I', 'ComunicaÃ§Ã£o e ExpressÃ£o PortuguÃªs Enpanhol', 1, ''),
(2, 2, 'CEEP II', 'ComunicaÃ§Ã£o e ExpressÃ£o PortuguÃªs Enpanhol', 2, 'pppppppppppp'),
(3, 6, 'CPW II', 'ConstruÃ§Ã£o de PÃ¡ginas Web II', 2, 'jjjj'),
(6, 5, 'CEEP I', 'ComunicaÃ§Ã£o e ExpressÃ£o', 1, 'aaaaaaaaaaa'),
(9, 1, 'CPW I', 'ConstruÃ§Ã£o de PÃ¡ginas Web', 2, ''),
(10, 6, 'CPW I', 'ConstruÃ§Ã£o de PÃ¡ginas Web bb', 3, 'nnn'),
(12, 0, 'Registro', 'Registro AcadÃªmico', 0, '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Assunto`
--
ALTER TABLE `Assunto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Assunto`
--
ALTER TABLE `Assunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
