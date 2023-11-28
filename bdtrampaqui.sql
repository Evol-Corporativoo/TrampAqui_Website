-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2023 às 01:23
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtrampaqui`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcandidatura`
--

CREATE TABLE `tbcandidatura` (
  `idCandidatura` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcurriculo`
--

CREATE TABLE `tbcurriculo` (
  `idCurriculo` int(11) NOT NULL,
  `objetivoCurriculo` varchar(500) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `estadoCivilCurriculo` varchar(40) NOT NULL,
  `habilidadesCurriculo` varchar(1000) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcurriculo`
--

INSERT INTO `tbcurriculo` (`idCurriculo`, `objetivoCurriculo`, `genero`, `estadoCivilCurriculo`, `habilidadesCurriculo`, `idUsuario`) VALUES
(111, 'SAAAAAA', 'masculino', 'solteiro', 'aaaaaaaaaaaaaaaaaaa', 209);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(200) NOT NULL,
  `cnpjEmpresa` varchar(30) NOT NULL,
  `cepEmpresa` varchar(10) NOT NULL,
  `cidadeEmpresa` varchar(200) NOT NULL,
  `ufEmpresa` varchar(5) NOT NULL,
  `bairroEmpresa` varchar(200) NOT NULL,
  `logradouroEmpresa` varchar(200) NOT NULL,
  `numeroEmpresa` int(11) NOT NULL,
  `dataCriacaoEmpresa` date NOT NULL,
  `emailEmpresa` varchar(140) NOT NULL,
  `telefoneEmpresa` varchar(30) NOT NULL,
  `descEmpresa` varchar(500) NOT NULL,
  `complementoEmpresa` varchar(200) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `cnpjEmpresa`, `cepEmpresa`, `cidadeEmpresa`, `ufEmpresa`, `bairroEmpresa`, `logradouroEmpresa`, `numeroEmpresa`, `dataCriacaoEmpresa`, `emailEmpresa`, `telefoneEmpresa`, `descEmpresa`, `complementoEmpresa`, `idUsuario`) VALUES
(40, 'Teste de Insert', '35.480.535/0001-91', '08490-560', 'São Paulo', 'SP', 'Santa Etelvina', 'Rua Santa Adelaide', 11, '0000-00-00', '', '(12) 4567-8901', 'Técnologia', '', 210);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbexperiencia`
--

CREATE TABLE `tbexperiencia` (
  `idExperiencia` int(11) NOT NULL,
  `tituloExperiencia` varchar(100) NOT NULL,
  `nomeEmpresa` varchar(80) NOT NULL,
  `dataInicioExperiencia` date NOT NULL,
  `dataTerminoExperiencia` date NOT NULL,
  `localidadeExperiencia` varchar(200) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbexperiencia`
--

INSERT INTO `tbexperiencia` (`idExperiencia`, `tituloExperiencia`, `nomeEmpresa`, `dataInicioExperiencia`, `dataTerminoExperiencia`, `localidadeExperiencia`, `idCurriculo`) VALUES
(11, 'Est', 'aaa', '2022-02-01', '2022-07-01', 'aaaaaaaaaaaaa', 111),
(12, 'Gestooooo', 'oooooo', '2022-05-01', '2023-03-01', 'oooooo', 111);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbformacao`
--

CREATE TABLE `tbformacao` (
  `idFormacao` int(11) NOT NULL,
  `instituicaoFormacao` varchar(100) NOT NULL,
  `dataInicioFormacao` date NOT NULL,
  `dataTerminoFormacao` date NOT NULL,
  `localFormacao` varchar(80) NOT NULL,
  `diplomaFormacao` varchar(100) NOT NULL,
  `situacaoFormacao` varchar(30) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbformacao`
--

INSERT INTO `tbformacao` (`idFormacao`, `instituicaoFormacao`, `dataInicioFormacao`, `dataTerminoFormacao`, `localFormacao`, `diplomaFormacao`, `situacaoFormacao`, `idCurriculo`) VALUES
(95, 'CT', '2021-02-01', '2023-12-01', 'SP', 'CSAA', 'Trancado', 111);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbidioma`
--

CREATE TABLE `tbidioma` (
  `idIdioma` int(11) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `nivelIdioma` varchar(20) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbidioma`
--

INSERT INTO `tbidioma` (`idIdioma`, `idioma`, `nivelIdioma`, `idCurriculo`) VALUES
(49, 'Inglês', 'Intermediário', 111);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbintercambio`
--

CREATE TABLE `tbintercambio` (
  `idIntercambio` int(11) NOT NULL,
  `objetivoIntercambio` varchar(500) NOT NULL,
  `orgIntercambio` varchar(120) NOT NULL,
  `dataIdaIntercambio` date NOT NULL,
  `dataVoltaIntercambio` date NOT NULL,
  `paisIntercambio` varchar(80) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtrabvoluntario`
--

CREATE TABLE `tbtrabvoluntario` (
  `idTrabVoluntatio` int(11) NOT NULL,
  `nomeOrg` varchar(80) NOT NULL,
  `qntdMembros` int(11) NOT NULL,
  `descTrabVoluntario` varchar(500) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataEncerramento` date NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(120) NOT NULL,
  `cpfUsuario` varchar(15) NOT NULL,
  `emailUsuario` varchar(140) NOT NULL,
  `telefoneUsuario` varchar(30) NOT NULL,
  `dataNascUsuario` date NOT NULL,
  `tipoUsuario` bit(1) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `nomeUsuario`, `cpfUsuario`, `emailUsuario`, `telefoneUsuario`, `dataNascUsuario`, `tipoUsuario`, `senhaUsuario`) VALUES
(209, 'Gustavo de Souza Costa Joia', '48059265890', 'joia@oficial.com', '(11) 94813-2408', '2005-05-30', b'0', '$2y$10$02QIvww9620hC.xlxyWZkep/RJntkJy8IQUL04m3Myf7spOj/kgaa'),
(210, 'Adm supremo', '230.252.138-25', 'adm@oficial.com', '', '0000-00-00', b'1', '$2y$10$1XJTV/Ah8sqK52HDP927jODEXBcjoryP7scasPuApJNA03HYSQqOW');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbvaga`
--

CREATE TABLE `tbvaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(100) NOT NULL,
  `descVaga` varchar(2000) NOT NULL,
  `cargoVaga` varchar(30) NOT NULL,
  `cargaHorariaVaga` int(11) NOT NULL,
  `salarioVaga` double NOT NULL,
  `tipoVaga` varchar(30) NOT NULL,
  `modeloVaga` varchar(30) NOT NULL,
  `formacaoVaga` varchar(30) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbvaga`
--

INSERT INTO `tbvaga` (`idVaga`, `nomeVaga`, `descVaga`, `cargoVaga`, `cargaHorariaVaga`, `salarioVaga`, `tipoVaga`, `modeloVaga`, `formacaoVaga`, `idEmpresa`) VALUES
(24, 'Operador de computador', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'Assistência', 40, 3790, 'estagio', 'presencial', 'medio-completo', 40),
(25, 'Operador de computador', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'Assistência', 40, 3790.99, 'estagio', 'presencial', 'medio-completo', 40);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`idCandidatura`);

--
-- Índices de tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD PRIMARY KEY (`idCurriculo`),
  ADD UNIQUE KEY `unique_idUsuario` (`idUsuario`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `cnpjEmpresa` (`cnpjEmpresa`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices de tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices de tabela `tbidioma`
--
ALTER TABLE `tbidioma`
  ADD PRIMARY KEY (`idIdioma`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices de tabela `tbintercambio`
--
ALTER TABLE `tbintercambio`
  ADD PRIMARY KEY (`idIntercambio`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices de tabela `tbtrabvoluntario`
--
ALTER TABLE `tbtrabvoluntario`
  ADD PRIMARY KEY (`idTrabVoluntatio`),
  ADD KEY `fk_idCurriculo` (`idCurriculo`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `unique_email` (`emailUsuario`),
  ADD UNIQUE KEY `unique_cpf` (`cpfUsuario`);

--
-- Índices de tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  MODIFY `idCandidatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  MODIFY `idCurriculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  MODIFY `idExperiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  MODIFY `idFormacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `tbidioma`
--
ALTER TABLE `tbidioma`
  MODIFY `idIdioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tbintercambio`
--
ALTER TABLE `tbintercambio`
  MODIFY `idIntercambio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtrabvoluntario`
--
ALTER TABLE `tbtrabvoluntario`
  MODIFY `idTrabVoluntatio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD CONSTRAINT `tbcurriculo_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD CONSTRAINT `tbempresa_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Restrições para tabelas `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD CONSTRAINT `tbexperiencia_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Restrições para tabelas `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD CONSTRAINT `tbformacao_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Restrições para tabelas `tbidioma`
--
ALTER TABLE `tbidioma`
  ADD CONSTRAINT `tbidioma_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Restrições para tabelas `tbintercambio`
--
ALTER TABLE `tbintercambio`
  ADD CONSTRAINT `tbintercambio_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Restrições para tabelas `tbtrabvoluntario`
--
ALTER TABLE `tbtrabvoluntario`
  ADD CONSTRAINT `tbtrabvoluntario_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Restrições para tabelas `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD CONSTRAINT `tbvaga_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
