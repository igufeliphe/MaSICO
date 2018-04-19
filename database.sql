-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16-Abr-2018 às 17:35
-- Versão do servidor: 5.7.20
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cd_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(50) NOT NULL,
  `cpf_cliente` varchar(11) NOT NULL,
  `cnpj_cliente` varchar(20) NOT NULL,
  `rg_cliente` varchar(20) NOT NULL,
  `ie_cliente` varchar(20) NOT NULL,
  `tel_cliente` varchar(15) NOT NULL,
  `email_cliente` varchar(30) NOT NULL,
  `cep_cliente` int(11) NOT NULL,
  `num_res_cliente` varchar(10) DEFAULT NULL,
  `img_cliente` varchar(255) DEFAULT 'padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`cd_cliente`, `nm_cliente`, `cpf_cliente`, `cnpj_cliente`, `rg_cliente`, `ie_cliente`, `tel_cliente`, `email_cliente`, `cep_cliente`, `num_res_cliente`, `img_cliente`) VALUES
(1, 'Igor Feliphe', '01', '01', '01', '01', '01', 'igor@gmail.com', 11712010, '122', 'padrao.jpg'),
(6, 'Ambev', '0', '85.140.374/0001-65', '0', '0', '0', 'contato@cooperga.com.br', 89611, '525', 'ambev.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE `tb_fornecedor` (
  `cd_fornecedor` int(11) NOT NULL,
  `nm_fornecedor` varchar(100) NOT NULL,
  `cnpj_fornecedor` varchar(14) NOT NULL,
  `ie_fornecedor` varchar(15) NOT NULL,
  `tel_fornecedor` varchar(15) NOT NULL,
  `cep_fornecedor` varchar(9) NOT NULL,
  `email_fornecedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`cd_fornecedor`, `nm_fornecedor`, `cnpj_fornecedor`, `ie_fornecedor`, `tel_fornecedor`, `cep_fornecedor`, `email_fornecedor`) VALUES
(1, 'Intel', '01', '01', '01', '1010101', 'faq@intel.com'),
(2, 'Acer', '02', '02', '02', '0', 'faq@acer.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `cd_funcionario` int(11) NOT NULL,
  `nm_funcionario` varchar(50) NOT NULL,
  `cpf_funcionario` varchar(11) NOT NULL,
  `rg_funcionario` varchar(20) NOT NULL,
  `tel_funcionario` varchar(15) NOT NULL,
  `email_funcionario` varchar(30) NOT NULL,
  `cep_funcionario` int(11) NOT NULL,
  `img_funcionario` varchar(255) DEFAULT 'padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`cd_funcionario`, `nm_funcionario`, `cpf_funcionario`, `rg_funcionario`, `tel_funcionario`, `email_funcionario`, `cep_funcionario`, `img_funcionario`) VALUES
(2, 'Gabriel', '0000000000', '000000000000000', '000000000000', 'gabriel@gmail.com', 11712010, 'padrao.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `cd_produto` int(11) NOT NULL,
  `nm_produto` varchar(500) NOT NULL,
  `tp_produto` varchar(500) NOT NULL,
  `qtd_produto` varchar(500) NOT NULL,
  `vl_produto` varchar(500) NOT NULL,
  `img_produto` varchar(255) DEFAULT 'padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`cd_produto`, `nm_produto`, `tp_produto`, `qtd_produto`, `vl_produto`, `img_produto`) VALUES
(6, 'Notebook Dell', 'Informática', '3', '3400', '132116662G1.png'),
(8, 'Pneu', 'Borracha', '5', '140', 'pneu.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `senha_usuario`) VALUES
(1, 'igor', '123'),
(3, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Indexes for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD PRIMARY KEY (`cd_fornecedor`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`cd_funcionario`);

--
-- Indexes for table `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`cd_produto`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cd_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  MODIFY `cd_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `cd_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `cd_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
