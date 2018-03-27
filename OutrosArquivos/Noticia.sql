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
  `id_tiponoticia` int(11) NOT NULL,
  `id_assunto` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `anexo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Noticia`
--

INSERT INTO `Noticia` (`id`, `data_publicacao`, `data_evento`, `data_validade`, `id_tiponoticia`, `id_assunto`, `id_responsavel`, `titulo`, `texto`, `imagem`, `anexo`) VALUES
(1, '2017-09-07', '2017-09-12', '2017-12-07', 1, 1, 1, '', 'Prova final', '', ''),
(7, '2017-11-11', '2017-12-01', '2017-12-02', 2, 3, 3, 'Teste de tÃ­tulo', 'xcvbxcvbxcv   cvxcbxvcbxcvb xcvbxcvbx', '', ''),
(16, '2017-11-12', '2017-12-12', '2017-12-12', 1, 2, 2, '', 'Aaaaaaaa aaaaaaaaaaa aaaaaaaaa aaaaaa aaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaa aaaaaaaaaa aaaaaaaa aaaaaaaaaa aaaaaaaaaaaaa\r\nhhhhhhhhhhhh aaaaaa', '', ''),
(18, '2017-11-12', '2017-12-13', '2018-06-11', 2, 3, 6, 'Teste de tÃ­tulo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas elementum semper mauris a molestie. Morbi ipsum est, placerat sollicitudin ante ut, sollicitudin luctus metus. Nulla consectetur nulla a porta ultricies. Sed nulla diam, venenatis eget est sit amet, viverra pretium odio. Donec sit ame', '', '20171112_1345_gparted-abril2017.png'),
(19, '2018-03-23', '2018-04-22', '2018-09-19', 3, 1, 1, 'Troca de horÃ¡rio', 'Aula no segundo perÃ­odo.', '', ''),
(20, '2018-03-24', '2018-04-29', '2018-05-04', 6, 12, 1, 'RematrÃ­cula', 'FaÃ§a sua rematrÃ­cula atÃ© o dia 29!', '', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tiponoticia` (`id_tiponoticia`),
  ADD KEY `id_assunto` (`id_assunto`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

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
  ADD CONSTRAINT `Noticia_ibfk_1` FOREIGN KEY (`id_tiponoticia`) REFERENCES `TipoNoticia` (`id`),
  ADD CONSTRAINT `Noticia_ibfk_2` FOREIGN KEY (`id_assunto`) REFERENCES `Assunto` (`id`),
  ADD CONSTRAINT `Noticia_ibfk_3` FOREIGN KEY (`id_responsavel`) REFERENCES `Responsavel` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
