-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/10/2024 às 18:01
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stock_control`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessoes`
--

CREATE TABLE `sessoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `tool` varchar(20) NOT NULL,
  `observation` text DEFAULT NULL,
  `date_retirada` date NOT NULL,
  `time_retirada` time NOT NULL,
  `date_devolucao` date DEFAULT NULL,
  `time_devolucao` time DEFAULT NULL,
  `devolvido` tinyint(1) NOT NULL,
  `apagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `tool`, `observation`, `date_retirada`, `time_retirada`, `date_devolucao`, `time_devolucao`, `devolvido`, `apagado`) VALUES
(1, 'Alice', 'Chave de Fenda', 'Retirada para manutenção', '2024-09-10', '08:30:00', NULL, NULL, 0, 0),
(2, 'Bruno', 'Alicate', 'Uso em projeto', '2024-09-12', '09:00:00', '2024-09-15', '17:00:00', 1, 0),
(3, 'Carla', 'Martelo', 'Trabalho de carpintaria', '2024-09-13', '10:00:00', NULL, NULL, 0, 0),
(4, 'Daniel', 'Serra', 'Corte de madeira', '2024-09-14', '11:30:00', '2024-09-16', '15:00:00', 1, 0),
(5, 'Eduardo', 'Furadeira', 'Furações em parede', '2024-09-15', '14:00:00', NULL, NULL, 0, 0),
(6, 'Fernanda', 'Chave Allen', 'Montagem de móveis', '2024-09-16', '08:45:00', '2024-09-20', '09:15:00', 1, 0),
(7, 'Gustavo', 'Esmerilhadeira', 'Polimento de peças', '2024-09-17', '13:00:00', NULL, NULL, 0, 0),
(8, 'Helena', 'Parafusadeira', 'Instalação de prateleiras', '2024-09-18', '09:30:00', '2024-09-19', '12:00:00', 1, 0),
(9, 'Igor', 'Lixadeira', 'Acabamento de madeira', '2024-09-19', '10:15:00', NULL, NULL, 0, 0),
(10, 'Juliana', 'Sierra circular', 'Corte em lâminas', '2024-09-20', '11:00:00', NULL, NULL, 0, 0),
(11, 'Leonardo', 'Multímetro', 'Teste de circuitos', '2024-09-21', '14:30:00', '2024-09-25', '10:00:00', 1, 0),
(12, 'Mariana', 'Pistola de cola', 'Colagem de peças', '2024-09-22', '16:00:00', NULL, NULL, 0, 0),
(13, 'Nuno', 'Bomba de vácuo', 'Experimento de laboratório', '2024-09-23', '09:15:00', '2024-09-24', '13:00:00', 1, 0),
(14, 'Olga', 'Chave de Grifo', 'Ajustes em tubulações', '2024-09-24', '11:45:00', NULL, NULL, 0, 0),
(15, 'Paulo', 'Balança', 'Pesagem de materiais', '2024-09-25', '08:00:00', NULL, NULL, 0, 0),
(16, 'Quiteria', 'Metrônomo', 'Ajuste de instrumentos', '2024-09-26', '10:00:00', '2024-09-27', '16:00:00', 1, 0),
(17, 'Rafael', 'Ferro de solda', 'Trabalho de eletrônica', '2024-09-27', '12:30:00', NULL, NULL, 0, 0),
(18, 'Sofia', 'Compasso', 'Desenhos técnicos', '2024-09-28', '09:00:00', '2024-09-29', '14:00:00', 1, 0),
(19, 'Thiago', 'Trena', 'Medições de área', '2024-09-29', '15:00:00', NULL, NULL, 0, 0),
(20, 'Ursula', 'Pá', 'Jardinagem', '2024-09-30', '10:00:00', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `apagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `is_admin`, `apagado`) VALUES
(22, 'Administrador', 'admin@dominio.com', '$2y$10$1W4FCM4brOdbTmpyYwf3puxN9wBo2RD3UFI/xoWFQ0zS60es.CGya', 1, 0),
(25, 'Usuário', 'usuario@dominio.com', '$2y$10$KsId4oofvGaWmCeDPbbIwOKjVJCuBXERsDPTF5VVBbPt73v.Xdrs6', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `sessoes`
--
ALTER TABLE `sessoes`
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
