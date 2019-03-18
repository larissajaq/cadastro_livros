-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Maio-2018 às 19:00
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `livros`
--
CREATE DATABASE IF NOT EXISTS `livros` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `livros`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `frases`
--

CREATE TABLE IF NOT EXISTS `frases` (
  `id` tinyint(40) NOT NULL AUTO_INCREMENT,
  `frase` varchar(1000) NOT NULL,
  `id_livro` tinyint(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `frases`
--

INSERT INTO `frases` (`id`, `frase`, `id_livro`) VALUES
(4, 'A vida nÃ£o cessa e a morte Ã© um jogo escuro de ilusÃµes. Fechar os olhos do corpo nÃ£o decide os nossos destinos. Ã‰ preciso navegar no prÃ³prio drama ou na prÃ³pria comÃ©dia... Uma existÃªncia Ã© um ato, um corpo, uma veste, um sÃ©culo, um dia. E a morte... A morte Ã© um sopro renovador. Mas nÃ£o vou sofrer com a ideia da eternidade, Ã© sempre tempo de recomeÃ§ar!', 3),
(5, 'O bem serÃ¡ a resposta primeira de todas as aspiraÃ§Ãµes.', 3),
(6, 'â€œDestino,â€ Blue replicou, encarando sua mÃ£e, â€œÃ© uma palavra muito pesada para se dizer no cafÃ© da manhÃ£.â€', 8),
(7, 'â€œHÃ¡ somente duas razÃµes para uma nÃ£o sensitiva ver um espirito na vÃ©spera de SÃ£o Marcos, Blue. Ou ele Ã© seu amor verdadeiro,â€ Neeve diz, â€œou vocÃª o matou.â€', 8),
(8, 'Quer dizer que vocÃª saiu em busca de um mito e encontrou um homem.', 1),
(9, 'Essa Ã© uma excelente pergunta! A resposta Ã© que cada um de nÃ³s tem duas mentes: a desperta e a mente adormecida. Nossa mente desperta Ã© a uqe pensa, faÃ§a e raciocina. Mas a mente adormecida Ã© mais poderosa. Enxerga fundo no cerne das coisas. Ã‰ a parte de nÃ³s que sonha. Ela se lembra de tudo.  DÃ¡-nos a intuiÃ§Ã£o. A mente desperta nÃ£o entende a natureza dos homens. A mente adormecida, sim. JÃ¡ sabe muitas coisas que a mente desperta nÃ£o sabe.', 1),
(11, 'O metal enferruja, pensei; a mÃºsica dura para sempre.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE IF NOT EXISTS `livros` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `editora`, `foto`) VALUES
(1, 'O Nome do Vento', 'Patrick Rothfuss', 'Arqueiro', 'fotos/591a1f718f7f9a074f6730b0a6bedd4b.jpg'),
(2, 'O Temor do Sabio', 'Patrick Rothfuss', 'Arqueiro', 'fotos/cd4231149e1e57fd09d7c7e8a3b03f68.jpg'),
(3, 'Nosso Lar', 'Francisco CÃ¢ndido Xavier', 'FEB', 'fotos/a6e943d6975d3bf47037ce9c9129ba1b.jpg'),
(8, 'Os Garotos Corvos', 'Maggie Stiefvater', 'Arqueiro', 'fotos/3a01b5b03c6da170abe06ee2e1fa23ab.jpg'),
(12, 'A MÃºsica Do SilÃªncio', 'Patrick Rothfuss', 'Arqueiro', 'fotos/ba578548785c6dd463af46ce787308e3.jpg'),
(13, 'O Hobbit', 'J. R. R. Tolkien', 'Wmf Martins Fontes', 'fotos/8869dac89d87947ef6be61b1a9d54870.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(9, 'pete', 'pete', 'pete', '858d41c9e397b8fa34bb046d8055f276');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
