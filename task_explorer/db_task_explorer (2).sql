-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/06/2024 às 21:58
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
-- Banco de dados: `db_task_explorer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(190) DEFAULT NULL,
  `task_description` varchar(250) DEFAULT NULL,
  `task_image` varchar(50) DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_description`, `task_image`, `task_date`, `id_usuario`) VALUES
(20, 'erick', '', 'd1353a7495edd26fca5ed9a2f331a4e1', '0000-00-00', NULL),
(32, 'aaa', '', 'f2daa9cd52836b59e89cc643b2e3c1dd', '0000-00-00', 2),
(33, 'q top', '', '4f84ae502f43618d6c029a76d3d727c1', '0000-00-00', 2),
(40, 'erick', '', 'e64244231584e198dc4fcffaff123f42', '0000-00-00', 7),
(41, 'ASDFASD', '', '81396b36ce62f9d8f5cd007a13250e17', '0000-00-00', 7),
(42, 'erick', '', '7a4386b69bd41a91daf5918c6b356556', '0000-00-00', 8),
(43, 'Bernardo', '', '86548099a398378b964a13d175efe9dd', '0000-00-00', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_list`
--

CREATE TABLE `tbl_list` (
  `id` int(11) NOT NULL,
  `list` varchar(255) NOT NULL,
  `painel` int(11) DEFAULT NULL,
  `id_task` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `prioridade` enum('ALTA','MEDIA','BAIXA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_list`
--

INSERT INTO `tbl_list` (`id`, `list`, `painel`, `id_task`, `descricao`, `prioridade`) VALUES
(68, 'erick', 0, 43, NULL, NULL),
(69, 'tarefa', 0, 43, NULL, NULL),
(70, 'aaaaaa', 0, 43, NULL, NULL),
(71, 'daniel 1', 0, 42, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo_usuario` enum('Usuário','Administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `nome`, `tipo_usuario`) VALUES
(1, 'admin@email.com', '123456', 'Admin', 'Administrador'),
(2, 'user01@email.com', '123456', 'User01', 'Usuário'),
(3, 'user02@email.com', '123456', 'User02', 'Usuário'),
(7, 'erick.oliveira3698@gmail.com', '123', 'Erick', 'Usuário'),
(8, 'daniel@gmail.com', '123', 'Daniel', 'Usuário');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_ibfk_1` (`id_usuario`);

--
-- Índices de tabela `tbl_list`
--
ALTER TABLE `tbl_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_list_ibfk_1` (`id_task`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `tbl_list`
--
ALTER TABLE `tbl_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbl_list`
--
ALTER TABLE `tbl_list`
  ADD CONSTRAINT `tbl_list_ibfk_1` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
