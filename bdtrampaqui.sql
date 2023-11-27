-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2023 às 11:52
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `tbcandidatura`
--

CREATE TABLE `tbcandidatura` (
  `idCandidatura` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurriculo`
--

CREATE TABLE `tbcurriculo` (
  `idCurriculo` int(11) NOT NULL,
  `objetivoCurriculo` varchar(500) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `estadoCivil` varchar(40) NOT NULL,
  `cpfUsuario` varchar(15) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(200) NOT NULL,
  `cnpjEmpresa` varchar(30) NOT NULL,
  `cepEmpresa` varchar(10) NOT NULL,
  `cidadeEmpresa` varchar(100) NOT NULL,
  `ufEmpresa` varchar(5) NOT NULL,
  `bairroEmpresa` varchar(100) NOT NULL,
  `logradouroEmpresa` varchar(100) NOT NULL,
  `numeroEmpresa` int(11) NOT NULL,
  `dataCriacaoEmpresa` date NOT NULL,
  `emailEmpresa` varchar(140) NOT NULL,
  `telefoneEmpresa` varchar(30) NOT NULL,
  `descEmpresa` varchar(500) NOT NULL,
  `complementoEmpresa` varchar(200) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `cnpjEmpresa`, `cepEmpresa`, `cidadeEmpresa`, `ufEmpresa`, `bairroEmpresa`, `logradouroEmpresa`, `numeroEmpresa`, `dataCriacaoEmpresa`, `emailEmpresa`, `telefoneEmpresa`, `descEmpresa`, `complementoEmpresa`, `idUsuario`) VALUES
(2, 'JoTec', '50.284.188/0001-15', '08485-290', 'São Paulo', 'SP', 'Conjunto Habitacional Santa Etelvina II', 'Rua Juca', 11, '0000-00-00', '', '(11) 2553-4777', 'Técnologia', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexperiencia`
--

CREATE TABLE `tbexperiencia` (
  `idExperiencia` int(11) NOT NULL,
  `tituloExperiencia` varchar(100) NOT NULL,
  `tipoEmpresa` varchar(50) NOT NULL,
  `nomeEmpresa` varchar(80) NOT NULL,
  `dataInicioExperiencia` date NOT NULL,
  `dataTerminoExperiencia` date NOT NULL,
  `localidadeExperiencia` varchar(200) NOT NULL,
  `tipoEmprego` varchar(100) NOT NULL,
  `descExperiencia` varchar(500) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbformacao`
--

CREATE TABLE `tbformacao` (
  `idFormacao` int(11) NOT NULL,
  `areaFormacao` varchar(50) NOT NULL,
  `dataInicioFormacao` date NOT NULL,
  `dataTerminoFormacao` date NOT NULL,
  `localFormacao` varchar(80) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbidioma`
--

CREATE TABLE `tbidioma` (
  `idIdioma` int(11) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `nivelIdioma` varchar(20) NOT NULL,
  `idCurriculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbintercambio`
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
-- Estrutura da tabela `tbtrabvoluntario`
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
-- Estrutura da tabela `tbusuario`
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
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `nomeUsuario`, `cpfUsuario`, `emailUsuario`, `telefoneUsuario`, `dataNascUsuario`, `tipoUsuario`, `senhaUsuario`) VALUES
(1, 'jojo', '480.592.658-90', 'joia@oficial.com', '', '0000-00-00', b'1', '$2y$10$EvC4h.YAskJrmCemJMinaup3zhZdoVZEN3mr8aGbFf4ElNBk9t2zW');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvaga`
--

CREATE TABLE `tbvaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(100) NOT NULL,
  `descVaga` varchar(300) NOT NULL,
  `cargoVaga` varchar(30) NOT NULL,
  `cargaHorariaVaga` time NOT NULL,
  `salarioVaga` double NOT NULL,
  `sobreVaga` varchar(500) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbvaga`
--

INSERT INTO `tbvaga` (`idVaga`, `nomeVaga`, `descVaga`, `cargoVaga`, `cargaHorariaVaga`, `salarioVaga`, `sobreVaga`, `idEmpresa`) VALUES
(1, 'Estágio em Dor e Depressão', 'Você vai criar caráter na base da dor', 'Estágio', '07:00:00', 3789, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`idCandidatura`);

--
-- Índices para tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD PRIMARY KEY (`idCurriculo`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `cnpjEmpresa` (`cnpjEmpresa`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD PRIMARY KEY (`idExperiencia`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices para tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices para tabela `tbidioma`
--
ALTER TABLE `tbidioma`
  ADD PRIMARY KEY (`idIdioma`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices para tabela `tbintercambio`
--
ALTER TABLE `tbintercambio`
  ADD PRIMARY KEY (`idIntercambio`),
  ADD KEY `idCurriculo` (`idCurriculo`);

--
-- Índices para tabela `tbtrabvoluntario`
--
ALTER TABLE `tbtrabvoluntario`
  ADD PRIMARY KEY (`idTrabVoluntatio`),
  ADD KEY `fk_idCurriculo` (`idCurriculo`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `unique_email` (`emailUsuario`);

--
-- Índices para tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `fk_idEmpresa` (`idEmpresa`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
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
  MODIFY `idCurriculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  MODIFY `idExperiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  MODIFY `idFormacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbidioma`
--
ALTER TABLE `tbidioma`
  MODIFY `idIdioma` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcurriculo`
--
ALTER TABLE `tbcurriculo`
  ADD CONSTRAINT `tbcurriculo_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD CONSTRAINT `tbempresa_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD CONSTRAINT `tbexperiencia_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Limitadores para a tabela `tbformacao`
--
ALTER TABLE `tbformacao`
  ADD CONSTRAINT `tbformacao_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Limitadores para a tabela `tbidioma`
--
ALTER TABLE `tbidioma`
  ADD CONSTRAINT `tbidioma_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Limitadores para a tabela `tbintercambio`
--
ALTER TABLE `tbintercambio`
  ADD CONSTRAINT `tbintercambio_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Limitadores para a tabela `tbtrabvoluntario`
--
ALTER TABLE `tbtrabvoluntario`
  ADD CONSTRAINT `tbtrabvoluntario_ibfk_1` FOREIGN KEY (`idCurriculo`) REFERENCES `tbcurriculo` (`idCurriculo`);

--
-- Limitadores para a tabela `tbvaga`
--
ALTER TABLE `tbvaga`
  ADD CONSTRAINT `tbvaga_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
