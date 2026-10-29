-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/10/2026 às 08:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_bestiario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `criaturas`
--

CREATE TABLE `criaturas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(100) NOT NULL,
  `habitat` varchar(100) DEFAULT NULL,
  `nivel_ameaca` varchar(50) DEFAULT NULL,
  `imagem_url` text DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `criaturas`
--

INSERT INTO `criaturas` (`id`, `nome`, `especie`, `habitat`, `nivel_ameaca`, `imagem_url`, `descricao`) VALUES
(1, 'Mordecai', 'Gaio-Azul', 'Parque', 'Perigoso', 'img/mordecai.png', 'Gaio-azul de 23 anos, especialista em videojogos e melhor amigo do Rigby.'),
(2, 'Rigby', 'Guaxinim', 'Parque', 'Perigoso', 'img/rigby.png', 'Guaxinim hiperativo e brincalhão, mestre em inventar desculpas para fugir ao trabalho.'),
(3, 'Skips', 'Yeti Imortal', 'Parque', 'Inofensivo', 'img/skips.png', 'Yeti sábio e musculado que resolve todos os problemas sobrenaturais do parque.'),
(4, 'Pairulito', 'Homem-Pirulito', 'Mansão', 'Destruidor de Mundos', 'img/pairulito.png', 'Cavalheiro alegre com cabeça de pirulito dotado de um poder cósmico avassalador.'),
(5, 'Benson', 'Máquina de Goma', 'Parque', 'Perigoso', 'img/benson.png', 'Gerente do parque temperamental que perde a paciência facilmente com o Mordecai e o Rigby.'),
(6, 'Musculoso', 'Humanoide Verde', 'Parque', 'Irritante', 'img/musculoso.png', 'Conhecido pelas suas famosas anedotas sobre a mãe e pela grande força física.'),
(7, 'Fantasminha', 'Fantasma com Mão na Cabeça', 'Parque', 'Inofensivo', 'img/fantasminha.png', 'Melhor amigo do Musculoso, um fantasma leal e divertido.'),
(8, 'Thomas', 'Cabra Humanoide', 'Parque', 'Inofensivo', 'img/thomas.png', 'Estagiário calmo e esforçado do parque que esconde um passado surpreendente.'),
(9, 'Pai do Pairulito', 'Homem-Pirulito Gigante', 'Mansão', 'Destruidor de Mundos', 'img/maellard.png', 'Dono multimilionário do parque e pai severo, mas protetor do Pairulito.'),
(10, 'Margaret', 'Cardeal Vermelho', 'Cafetaria', 'Inofensivo', 'img/margaret.png', 'Trabalha na cafetaria local e foi o interesse amoroso de longa data do Mordecai.'),
(11, 'Eileen', 'Toupeira Humanoide', 'Universidade', 'Inofensivo', 'img/eileen.png', 'Amiga inteligente da Margaret e namorada dedicada do Rigby.'),
(12, 'CJ', 'Nuvem Humanoide', 'Cidade', 'Perigoso', 'img/cj.png', 'Nuvem temperamental que muda de forma conforme as suas emoções.'),
(13, 'Morte', 'Entidade Sobrenatural', 'Submundo', 'Destruidor de Mundos', 'img/morte.png', 'A Morte em pessoa, que usa um impermeável e adora braço de ferro.'),
(14, 'Guardião do Tempo', 'Entidade Temporal', 'Dimensão do Tempo', 'Destruidor de Mundos', 'img/guardiao.png', 'Um bebé gigante que controla a linha temporal e as regras do universo.'),
(15, 'Garrett Bobby Ferguson', 'Cabeça Gigante', 'Arcade', 'Perigoso', 'img/gbf.png', 'O recordista mundial de videojogos com uma cabeça desproporcional.'),
(16, 'Bebé Pato', 'Anatídeo Mutante', 'Lago do Parque', 'Inofensivo', 'img/patos.png', 'Patinhos fofos que se fundem num robô gigante com artes marciais.');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `criaturas`
--
ALTER TABLE `criaturas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `criaturas`
--
ALTER TABLE `criaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
