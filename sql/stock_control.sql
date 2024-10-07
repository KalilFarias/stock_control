-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/10/2024 às 18:49
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
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_expiracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `usuario_id`, `token`, `data_criacao`, `data_expiracao`) VALUES
(122, 22, 'e2b2e8f96d2d7352b1fb7082ad8e821d4c8d02cafbac28d66b7cb9b5a4f293c2', '2024-10-01 16:04:56', NULL),
(123, 22, '9646f477884ed3be38d2a293e13388f574088a40b0f660ef97700219b3cb843f', '2024-10-02 11:28:13', NULL),
(125, 22, '1a10924e41519508e809d6015cb27b229f0cddc501a8a4d1352c099c8e0451bd', '2024-10-02 11:37:39', NULL),
(126, 22, 'c8f8679d647d50f687487beadd6e765f3d35752e012eeb974ea541b92a8459ee', '2024-10-02 12:05:05', NULL),
(127, 22, 'c7f5fad076e4c249baf66d9711fade29fa7cc1a863d50c41950ece1e6f449f95', '2024-10-02 12:05:13', NULL),
(128, 22, '2bf6070923c2dbeec2c2c67c05750b04d5010e786aec064164088dfe41c1a864', '2024-10-02 12:08:09', NULL),
(129, 22, '59bdaf04173c01cd7273a09525ef5463df771a46d9f917a822a32b09f02a6804', '2024-10-02 12:08:45', NULL),
(130, 22, '48ab2dda9f3817d947770dccd1c852d0d3e45efd5c3ba76a8aa38dfd8971caf1', '2024-10-02 12:09:35', NULL),
(131, 22, 'db3ec726c1774b33516ce108a0c8cad1efd99b9322d2297799dcbb07bd0780e0', '2024-10-02 12:14:13', NULL),
(132, 22, 'cdb0da535c3859ae79e7ab2bb74439f49687edf2a9380ebc4183dd11f50e701a', '2024-10-02 12:14:56', NULL),
(133, 22, '212570856ad7ed103f8c854d58dda3606d704d0129e1a8ef21444e4c7695b0c5', '2024-10-02 12:15:59', NULL),
(137, 22, 'a00d2f337d3c3ebfb9d594dcd8307c5ccc8d669910deb9fe57d5be5283025034', '2024-10-02 12:30:12', NULL),
(141, 25, '4a82898ca325f94f92ea8024c3ffc0496a5839ddd9f4b9ccad1fd4fa7b54805d', '2024-10-02 13:06:20', NULL),
(168, 22, '9671714baa46221ce6bfdedb0303a8652623514438561b942ec23820613db636', '2024-10-02 16:41:21', NULL),
(175, 22, '922fee29763bd5e44af089845eb4904824acbb6990e300dbbfdc321c51c754ef', '2024-10-03 13:03:10', NULL),
(176, 22, '3cb8d27271583e56926f250f9b4f01e8e69eb3cef9b63895ae6520fbcd07822d', '2024-10-03 16:03:59', NULL),
(177, 22, '93efae6f31c6f52987b1152fd901a2ee9962fc8c4d8a9e730b21e90cc8e56e67', '2024-10-03 16:05:27', NULL),
(180, 22, 'eb8c8f02eb1cf9c103575949630be2249ab40c43e74c5d39b6ecc2fc007382c4', '2024-10-03 16:18:24', '2024-10-03 16:18:34'),
(181, 22, '3289c1eed507d5a32f102defabde16798b75c590595d724f10202897ccf5e0fc', '2024-10-03 16:20:03', '2024-10-03 16:20:13'),
(182, 22, 'dd71bd9d0c368a9e31fe53595904fe0ebd97255d3a7180886594414a6a6cc29b', '2024-10-03 16:20:26', '2024-10-03 16:20:36'),
(183, 22, 'a7ed6f60531533122b407bcd56e06f7abe4cb3b6e68374cc8291f024fccb5e9a', '2024-10-03 16:21:31', '2024-10-03 16:21:41'),
(184, 22, '554a1dc0706e61ac4627d51fe61aa1e56561a59864b253fc8e9e1e6b1267e22c', '2024-10-03 16:22:18', '2024-10-03 16:22:28'),
(185, 22, 'b4fa413570621df9d0a31f46fba6f81f9aa5c7dd3fb579c7a31cacad5d1d40e2', '2024-10-03 16:30:15', '2024-10-03 16:30:25'),
(186, 22, '7a70c05984cf1d75abae313fa6758adecfdc8fe9992d1543e666505c7541f517', '2024-10-03 16:32:58', '2024-10-03 16:33:08'),
(187, 22, '9c4e771553e912bdd31088fd01f48474d4f9b7b12dcb76cf9559229e90fced00', '2024-10-03 16:38:38', '2024-10-03 16:38:48'),
(190, 22, '06a606568de38ac4fb361de91975dfb6cc89f3c41b5b2039c66b636f02474ac1', '2024-10-03 16:45:19', '2024-10-03 17:45:19'),
(192, 22, 'c8a569140c8ebcef88b184effaeae9924fefc3f0b355b3f8c79bfd200ca6fcca', '2024-10-03 16:48:29', '2024-10-03 17:48:29');

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
  `apagado` tinyint(1) NOT NULL,
  `patrimonio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `tool`, `observation`, `date_retirada`, `time_retirada`, `date_devolucao`, `time_devolucao`, `devolvido`, `apagado`, `patrimonio`) VALUES
(1, 'Alice', 'Chave de Fenda', 'Retirada para manutenção', '2024-09-10', '08:30:00', '2024-10-03', '10:31:27', 1, 0, NULL),
(2, 'Bruno', 'Alicate', 'Uso em projeto', '2024-09-12', '09:00:00', '2024-09-15', '17:00:00', 1, 0, NULL),
(3, 'Carla', 'Martelo', 'Trabalho de carpintaria', '2024-09-13', '10:00:00', '2024-10-03', '10:33:21', 1, 0, NULL),
(4, 'Daniel', 'Serra', 'Corte de madeira', '2024-09-14', '11:30:00', '2024-09-16', '15:00:00', 1, 0, NULL),
(5, 'Eduardo', 'Furadeira', 'Furações em parede', '2024-09-15', '14:00:00', '2024-10-03', '10:33:59', 1, 0, NULL),
(6, 'Fernanda', 'Chave Allen', 'Montagem de móveis', '2024-09-16', '08:45:00', '2024-09-20', '09:15:00', 1, 0, NULL),
(7, 'Gustavo', 'Esmerilhadeira', 'Polimento de peças', '2024-09-17', '13:00:00', NULL, NULL, 0, 0, NULL),
(8, 'Helena', 'Parafusadeira', 'Instalação de prateleiras', '2024-09-18', '09:30:00', '2024-09-19', '12:00:00', 1, 0, NULL),
(9, 'Igor', 'Lixadeira', 'Acabamento de madeira', '2024-09-19', '10:15:00', NULL, NULL, 0, 0, NULL),
(10, 'Juliana', 'Sierra circular', 'Corte em lâminas', '2024-09-20', '11:00:00', NULL, NULL, 0, 0, NULL),
(11, 'Leonardo', 'Multímetro', 'Teste de circuitos', '2024-09-21', '14:30:00', '2024-09-25', '10:00:00', 1, 0, NULL),
(12, 'Mariana', 'Pistola de cola', 'Colagem de peças', '2024-09-22', '16:00:00', NULL, NULL, 0, 0, NULL),
(13, 'Nuno', 'Bomba de vácuo', 'Experimento de laboratório', '2024-09-23', '09:15:00', '2024-09-24', '13:00:00', 1, 0, NULL),
(14, 'Olga', 'Chave de Grifo', 'Ajustes em tubulações', '2024-09-24', '11:45:00', NULL, NULL, 0, 0, NULL),
(15, 'Paulo', 'Balança', 'Pesagem de materiais', '2024-09-25', '08:00:00', NULL, NULL, 0, 0, NULL),
(16, 'Quiteria', 'Metrônomo', 'Ajuste de instrumentos', '2024-09-26', '10:00:00', '2024-09-27', '16:00:00', 1, 0, NULL),
(17, 'Rafael', 'Ferro de solda', 'Trabalho de eletrônica', '2024-09-27', '12:30:00', NULL, NULL, 0, 0, NULL),
(18, 'Sofia', 'Compasso', 'Desenhos técnicos', '2024-09-28', '09:00:00', '2024-09-29', '14:00:00', 1, 0, NULL),
(19, 'Thiago', 'Trena', 'Medições de área', '2024-09-29', '15:00:00', NULL, NULL, 0, 0, NULL),
(20, 'Ursula', 'Pá', 'Jardinagem', '2024-09-30', '10:00:00', '2024-10-03', '13:47:58', 1, 0, NULL),
(21, 'Teste', 'Testador', 'Observado', '2024-10-03', '13:48:00', '2024-10-03', '13:48:52', 1, 0, 123456);

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
(22, 'Administrador', 'admin@dominio.com', '$2y$10$OwH7OYFVJd.wkEUtfLfd8Ow7SmJSAfvADHPQBOrxxd/Di3eWa9dkm', 1, 0),
(25, 'Usuário', 'usuario@dominio.com', '$2y$10$4U2hls4znkQ7.XHF1k8XFe/X57z4ySixzLcXzlQauQnaTSvT8BpXu', 0, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de tabela `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
