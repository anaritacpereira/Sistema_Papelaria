-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29-Jan-2023 às 14:02
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_ultimo_acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `login`, `senha`, `data_ultimo_acesso`) VALUES
(1, 'Ana Pereira', 'ana', '1234', '12:55:30 - 29/01/2023'),
(2, 'Andre Dias', 'andre', '4321', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`) VALUES
(1, 'Ana Pereira', '111 111 111'),
(2, 'André Dias', '222 222 222'),
(3, 'Bernardo Dias', '333 333 333'),
(4, 'Carlos Pereira', '444 444 444'),
(5, 'Catarina Ferreira', '555 555 555');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `morada` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nome`, `apelido`, `idade`, `morada`) VALUES
(1, 'Ana', 'Pereira', 31, 'tomar'),
(2, 'Andre', 'Dias', 42, 'rua malmequeres'),
(3, 'Carlos', 'Pereira', 27, 'lisboa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motas`
--

CREATE TABLE `motas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `matricula` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `motas`
--

INSERT INTO `motas` (`id`, `id_cliente`, `modelo`, `matricula`) VALUES
(1, 3, 'RX', 'aaa'),
(2, 2, 'Honda', 'bbb'),
(3, 1, 'Cruiser', 'ccc'),
(4, 1, 'Yamaha', 'ddd'),
(5, 4, 'Harley', 'fff'),
(6, 3, 'BMW', 'eee');

-- --------------------------------------------------------

--
-- Estrutura da tabela `papelaria`
--

CREATE TABLE `papelaria` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `papelaria`
--

INSERT INTO `papelaria` (`id`, `nome`, `preco`, `quantidade`) VALUES
(1, 'Caneta Verde', 1.25, 12),
(2, 'Caneta Azul', 1.2, 18),
(25, 'Estojo Preto', 2.25, 0),
(26, 'Lápis', 1.99, 14),
(29, 'Borracha', 0.8, 10),
(30, 'Caixa Canetas Filtro', 3.99, 4),
(31, 'Resma Papel A4', 2.75, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`) VALUES
(1, 'pao', 0.2, 30),
(2, 'Bolo', 0.8, 20),
(3, 'Arroz', 1.2, 11),
(4, 'Massa', 0.85, 15),
(5, 'Ananas', 1.5, 5),
(6, 'Maçã', 0.82, 30),
(8, 'Tomate', 0.89, 30),
(9, 'Queijo', 1.69, 12),
(10, 'Banana', 0.89, 12),
(11, 'Fiambre', 1.59, 10),
(28, '54', 4, 4),
(29, 'teste2', 3, 3),
(30, 'rita', 2, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `motas`
--
ALTER TABLE `motas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `papelaria`
--
ALTER TABLE `papelaria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `motas`
--
ALTER TABLE `motas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `papelaria`
--
ALTER TABLE `papelaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
