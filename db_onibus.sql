-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13/05/2024 às 03:27
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_onibus`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `SENHA_ADM` varchar(15) NOT NULL,
  `USUARIO_ADM` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`ID`, `SENHA_ADM`, `USUARIO_ADM`) VALUES
(1, '1525', 'davi'),
(2, '$2y$10$oQfnfyCI', 'aaa'),
(3, '$2y$10$vW2wQE1J', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estudantes`
--

DROP TABLE IF EXISTS `estudantes`;
CREATE TABLE IF NOT EXISTS `estudantes` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `MATRICULA` varchar(45) NOT NULL,
  `TELEFONE` varchar(14) NOT NULL,
  `ENDERECO_RUA` varchar(45) NOT NULL,
  `FACULDADE_LOCAL` varchar(45) NOT NULL,
  `ROTAS_EST` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ROTAS_EST` (`ROTAS_EST`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `estudantes`
--

INSERT INTO `estudantes` (`ID`, `nome`, `MATRICULA`, `TELEFONE`, `ENDERECO_RUA`, `FACULDADE_LOCAL`, `ROTAS_EST`) VALUES
(3, 'Davi', '444', '8899', 'adasdsda', 'Fied', 1),
(4, 'Davi', '444', '8899', 'adasdsda', 'Fied', 1),
(5, 'Davi e', '123', '2222', 'ddddddd', 'fied', 3),
(6, 'Davi e', '123', '2222', 'ddddddd', 'fied', 3),
(7, 'Davi e', '123', '2222', 'ddddddd', 'fied', 3),
(8, 'teste', '12234', '888888888888', 'aaaaaaaaaaaae', 'uninta', 4),
(9, 'teste', '12234', '888888888888', 'aaaaaaaaaaaae', 'uninta', 4),
(10, 'Davi', 'sdsd', 'dsdasd', 'sdasda', 'sdasd', 0),
(11, 'Davi', 'sdsd', 'dsdasd', 'sdasda', 'sdasd', 0),
(12, 'Davi', 'sdsd', 'dsdasd', 'sdasda', 'sdasd', 0),
(13, 'testedd', '1233', 'dasdasd', 'dsadsd', 'sdasdas', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `motorista`
--

DROP TABLE IF EXISTS `motorista`;
CREATE TABLE IF NOT EXISTS `motorista` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(45) NOT NULL,
  `TELEFONE` varchar(14) NOT NULL,
  `COD_CARTEIRA` int NOT NULL,
  `ROTAS_MOT` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ROTAS_MOT` (`ROTAS_MOT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `onibus`
--

DROP TABLE IF EXISTS `onibus`;
CREATE TABLE IF NOT EXISTS `onibus` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PLACA` varchar(45) NOT NULL,
  `HORARIO` date NOT NULL,
  `COD_ONIBUS` int NOT NULL,
  `QTD_ESTUDANTES` int NOT NULL,
  `ROTAS_ONI` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ROTAS_ONI` (`ROTAS_ONI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `organizador`
--

DROP TABLE IF EXISTS `organizador`;
CREATE TABLE IF NOT EXISTS `organizador` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `SENHA_ORG` varchar(45) NOT NULL,
  `USUARIO_ORG` varchar(45) NOT NULL,
  `ROTAS_ORG` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ROTAS_ORG` (`ROTAS_ORG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotas`
--

DROP TABLE IF EXISTS `rotas`;
CREATE TABLE IF NOT EXISTS `rotas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `COD_ROTAS` int NOT NULL,
  `ROTAS` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
