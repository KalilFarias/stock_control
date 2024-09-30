-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/09/2024 às 16:05
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

--
-- Despejando dados para a tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `usuario_id`, `token`, `data_criacao`) VALUES
(80, 22, '702f9dc5295f365850c505e98fee5c4f2465648611fcc97853d624aedc16cd7d', '2024-09-30 14:00:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `tool` varchar(20) DEFAULT NULL,
  `observation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `tool`, `observation`) VALUES
(6, 'Teste', 'Chave de Fenda', 'Conservado');

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
(22, 'Luis', 'luis@dominio.com', '$2y$10$1W4FCM4brOdbTmpyYwf3puxN9wBo2RD3UFI/xoWFQ0zS60es.CGya', 1, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
