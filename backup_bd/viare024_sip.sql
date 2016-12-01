-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2016 às 01:00
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viare024_sip`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristicaspontoiluminacao`
--

CREATE TABLE `caracteristicaspontoiluminacao` (
  `id` int(11) NOT NULL,
  `tamanhoDoPoste` int(11) NOT NULL,
  `refrator` varchar(255) NOT NULL,
  `tipoReator` varchar(255) NOT NULL,
  `potenciaDoReator` int(11) NOT NULL,
  `modeloBraco` varchar(255) NOT NULL,
  `modeloLuminaria` varchar(255) NOT NULL,
  `potenciaLuminaria` varchar(255) NOT NULL,
  `tipoLampada` varchar(255) NOT NULL,
  `potenciaLampada` int(11) NOT NULL,
  `tipoPoste` varchar(255) NOT NULL,
  `modeloReator` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `idPontoIluminacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `caracteristicaspontoiluminacao`
--

INSERT INTO `caracteristicaspontoiluminacao` (`id`, `tamanhoDoPoste`, `refrator`, `tipoReator`, `potenciaDoReator`, `modeloBraco`, `modeloLuminaria`, `potenciaLuminaria`, `tipoLampada`, `potenciaLampada`, `tipoPoste`, `modeloReator`, `imagem`, `observacoes`, `idPontoIluminacao`) VALUES
(6, 5, 'GRE-6', 'Misto', 150, '2.5', 'PÃ©tala', 'Bocal E-40', 'Misto', 150, 'Circular', 'Interno', 'data/', '', 6),
(7, 9, 'Fechado', 'Vapor de sÃ³dio', 70, '3', 'Fechada', 'Bocal E-27', 'Vapor de sÃ³dio', 75, 'Poste DT', 'Externo', 'data/14694748434411222464157.jpg', '', 7),
(10, 11, '220v', 'Vapor de sÃ³dio', 150, '1', 'Aberta', 'Bocal E-40', 'Vapor de sÃ³dio', 150, 'Poste DT', 'Externo', 'data/', '', 14),
(13, 120, '1111', 'Vapor metÃ¡lico', 70, '2.5', 'Aberta', 'Bocal E-27', 'Vapor de sÃ³dio', 75, 'Circular', 'Interno', 'data/', 'aaaaaaaaaaaaaaaaaa', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `componentes`
--

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `fabricante` varchar(45) DEFAULT NULL,
  `numeroSerie` varchar(45) DEFAULT NULL,
  `tipoComponente` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `dataFabricante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `componentes`
--

INSERT INTO `componentes` (`id`, `marca`, `fabricante`, `numeroSerie`, `tipoComponente`, `quantidade`, `dataFabricante`) VALUES
(1, 'E27 ', 'Fab', '12345678911', 'Luminaria', 11, '1969-12-31'),
(2, 'Teste1', 'Shell', '1234', 'Lampada', 30, '10/06/2016'),
(3, '40mm', 'ulf', 'aba', 'RelÃ©', 300, '10/06/2016'),
(4, '40mm', 'ulf', 'aba', 'RelÃ©', 300, '10/06/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numPredialProx` int(5) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numPredialProx`, `complemento`, `bairro`, `cidade`, `uf`, `observacao`, `usuario_id`) VALUES
(1, 49015330, 'Rua Zaquel Brandão', 23, 'Ao lado do estacionamento da clinica Diagnose', 'Grageru', 'Aracaju', 'SE', 'Registro inserido como teste', 1),
(9, 49503429, 'Rua JosÃ© Mesquita da Silveira', 748, 'Inserindo endereÃ§o para teste', 'AnÃ­zio Amancio de Oliveira', 'Itabaiana', 'SE', 'Alguma observaÃ§Ã£o sobre o endereÃ§o', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id` int(11) NOT NULL,
  `localdePartida` varchar(255) NOT NULL,
  `nomeSolicitante` varchar(45) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tipoServico` varchar(45) DEFAULT NULL,
  `prioridade` varchar(45) DEFAULT NULL,
  `observacoes` varchar(45) DEFAULT NULL,
  `localdeDestino` varchar(255) DEFAULT NULL,
  `ocorrencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`id`, `localdePartida`, `nomeSolicitante`, `contato`, `email`, `tipoServico`, `prioridade`, `observacoes`, `localdeDestino`, `ocorrencia`) VALUES
(1, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'alan', 'xxxxxx', 'xxxxxx@xxxx.com.br', 'Troca de Lampada', 'Normal', NULL, 'Rua A-13,107 - centro Nossa Senhora do Socorro/SE', 201659715),
(2, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'Iris Karla', '7931981300', 'iriskarla@yahoo.com', 'Troca de Lampada', 'Urgente', NULL, 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 201667737),
(3, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'Victor', '111111111111', 'teste@teste', 'Troca de Base', 'Normal', NULL, 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', 201676330),
(4, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'Victor', '11111111', 'teste@teste', 'Troca de Lampada', 'Urgente', NULL, 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', 201667737),
(5, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'valmir', '79999999', 'a@b.com', 'Troca de Lampada', 'Urgente', NULL, 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 201650798),
(6, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'valmir', '79999999', 'a@b.com', 'Troca de Lampada', 'Urgente', NULL, 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 201650798),
(7, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'Victor', '111111111111', 'teste@teste', 'Troca de Lampada', 'Normal', NULL, 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', 201660706),
(8, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'TESTE APP', '11111111', 'teste@teste.com', 'Troca de Lampada', 'Urgente', NULL, 'Avenida Um,675 - Centro Nossa Senhora do Socorro/SE', 201693950),
(9, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', 'Sostenes ', '', '', 'Troca de Lampada', 'Urgente', '', 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 201688398),
(10, 'Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais', '', '', '', 'Troca de Lampada', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `numeroProtocolo` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `prazo` varchar(255) NOT NULL,
  `nomeMunicipe` varchar(255) NOT NULL,
  `enderecoMunicipe` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id`, `numeroProtocolo`, `status`, `data`, `prazo`, `nomeMunicipe`, `enderecoMunicipe`, `descricao`, `cpf`, `email`) VALUES
(1, 201693950, 'Em ManutenÃ§Ã£o', '22/07/2016', '27/07/2016', 'Alan', 'Avenida 1,675 - Centro Nossa Senhora do Socorro/SE', 'Lampada queimada', '', NULL),
(2, 201688398, 'Em ManutenÃ§Ã£o', '22/07/2016', '27/07/2016', 'Alan', 'Avenida 1,675 - Centro Nossa Senhora do Socorro/SE', 'Lampada queimada', '', NULL),
(3, 201659715, 'Aberta', '24/07/2016', '29/07/2016', 'Renato', 'A,450 - Centro BrasÃ­lia/DF', 'Lampada quebrada', '', NULL),
(4, 201628828, 'Aberta', '25/07/2016', '30/07/2016', 'Luciane ', 'Avenida Um,584 - Centro Nossa Senhora Aparecida/SE', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', NULL),
(5, 201660706, 'Em ManutenÃ§Ã£o', '25/07/2016', '30/07/2016', 'Luciane ', 'Avenida Um ,643 - Centro Nossa Senhora de Lourdes/SE', 'fjiajofsaofjasojfaosjfaos', '', NULL),
(6, 201699601, 'Aberta', '25/07/2016', '30/07/2016', 'Victor Alex', 'teste,12 - teste Ãgua Branca/AL', 'fr', '', NULL),
(7, 201638505, 'Aberta', '25/07/2016', '30/07/2016', 'Luciane ', 'Avenida Um,594 - Centro Nossa Senhora de Lourdes/SE', 'fffffffffffffffffffff', '', NULL),
(8, 201632059, 'Aberta', '25/07/2016', '30/07/2016', 'Leia', 'Rua A,540 - Centro Nossa Senhora do Socorro/SE', 'fiaÃ§Ã£o arrebentada', '', NULL),
(9, 201668417, 'Aberta', '25/07/2016', '30/07/2016', 'Victor', 'Avenida Um,675 - Centro Nossa Senhora do Socorro/SE', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', NULL),
(10, 201676330, 'Em ManutenÃ§Ã£o', '25/07/2016', '30/07/2016', 'Luciane ', 'Avenida Um,594 - Centro Nossa Senhora do Socorro/SE', 'fffffffffffffffffffffffff', '', NULL),
(11, 201623946, 'Aberta', '25/07/2016', '30/07/2016', 'Luciane ', 'Avenida Um,594 - Centro 1 Nossa Senhora do Socorro / SE', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '', NULL),
(12, 201653956, 'Aberta', '25/07/2016', '30/07/2016', 'Lucas', 'Avenida 1,340 - Centro  Nossa Senhora do Socorro / SE', 'lampada queimada', '', NULL),
(13, 201633360, 'Aberta', '25/07/2016', '30/07/2016', 'Victor Alex', 'Avenida Um,675 - Centro Nossa Senhora do Socorro/SE', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAletera', '', NULL),
(14, 201635518, 'Aberta', '25/07/2016', '30/07/2016', 'joao', 'rua jasiel de brito cortes,455 - jabotiana Aracaju/SE', '', '', NULL),
(15, 201667737, 'Em ManutenÃ§Ã£o', '25/07/2016', '30/07/2016', 'sostenes', 'Rua nossa senhora das dores ,258 - Cirurgia Atras do hospitalAracaju/SE', 'Lampada acesa durante o dia', '', NULL),
(16, 201651315, 'Aberta', '28/07/2016', '02/08/2016', 'Luciane', 'Quadra 20,15 - Valparaiso II ValparaÃ­so de GoiÃ¡s/GO', 'luz apagada', '', NULL),
(17, 201650798, 'Em ManutenÃ§Ã£o', '28/07/2016', '02/08/2016', 'Alguem da silva', 'Beco dos cocos,111 - centro atras do posteAracaju/SE', 'lampada apagada', '', NULL),
(18, 201622560, 'Aberta', '04/08/2016', '09/08/2016', 'Teste app 2 ', 'Avenida 1,123 - Centro aptNossa Senhora do Socorro/SE', 'teste aplicativo num. 2', '', NULL),
(19, 201622695, 'Aberta', '14/08/2016', '19/08/2016', 'fran', 'Rua Sete,35 - Centro csNossa Senhora do Socorro/SE', 'lampada apagada', '', NULL),
(20, 201698508, 'Aberta', '22/11/2016', '27/11/2016', 'Sostenes', 'logradouronumerobairro complementocidade/SE', 'descricao', 'cpf', 'email'),
(21, 201688490, 'Aberta', '22/11/2016', '27/11/2016', 'Sostenes', 'novo logradouro, novo numero. novo complemento, novo bairro. nova cidade  - SE', 'nova descricao', 'novo cpf', 'novo email');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontoiluminacao`
--

CREATE TABLE `pontoiluminacao` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(250) DEFAULT NULL,
  `statusConservacao` varchar(250) DEFAULT NULL,
  `numeroDaPlaca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pontoiluminacao`
--

INSERT INTO `pontoiluminacao` (`id`, `logradouro`, `statusConservacao`, `numeroDaPlaca`) VALUES
(6, 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', 'Bom', 0),
(7, 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 'Bom', 0),
(14, 'Av. Alexandre Alcino,1900 - Santa Maria antiga prainha Aracaju/SE', 'Bom', 2016123),
(20, 'Avenida Um,590 - Centro   Nossa Senhora do Socorro/SE', 'Bom', 123456);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontosmapa`
--

CREATE TABLE `pontosmapa` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pontosmapa`
--

INSERT INTO `pontosmapa` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(6, 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', 'Avenida coletora A,568 - Centro Nossa Senhora do Socorro/SE', -10.852473, -37.087860, 'restaurant'),
(7, 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', 'Zaqueu BrandÃ£o ,23 - SÃ£o JosÃ©  Aracaju/SE', -10.918734, -37.056168, 'restaurant'),
(13, 'Eixo estrutural B,1171 - Distrito Industrial de Socorro   No', 'Eixo estrutural B,1171 - Distrito Industrial de Socorro   Nossa Senhora do Socor', -10.853164, -37.126980, 'restaurant'),
(11, 'Eixo estrutural B,1171 - Distrito Industrial de Socorro  Dis', 'Eixo estrutural B,1171 - Distrito Industrial de Socorro  Distrito industrial de ', -10.947247, -37.073082, 'restaurant'),
(14, 'Av. Alexandre Alcino,1900 - Santa Maria antiga prainha Araca', 'Av. Alexandre Alcino,1900 - Santa Maria antiga prainha Aracaju/SE', -10.982064, -37.091991, 'restaurant');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `dataNascimento` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `login`, `senha`, `isAdmin`, `sexo`, `email`, `telefone`, `dataNascimento`) VALUES
(1, 'Administrador', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 0, 'M', 'comercial@unicoalimentos.com.br', '7931981302', 2016),
(2, 'Victor Alexsander', '75f33e6eebce7012b8c74a889fa8a7ed', '75f33e6eebce7012b8c74a889fa8a7ed', 1, 'M', '', '', NULL),
(3, 'Luciane', 'f8032d5cae3de20fcec887f395ec9a6a', 'f8032d5cae3de20fcec887f395ec9a6a', 2, 'F', '', '', NULL),
(4, 'Sostenes', '0', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, '', '', NULL),
(5, 'Iris Karla', '0', 'f75c9af2f9523fcaa0c029651ffe814b', 0, NULL, '', '', NULL),
(6, 'Campo', '0', '2ed6217e1ea82138fc6eb4a1e5050d57', 1, NULL, '', '', NULL),
(7, 'alvaro', '0', 'e10adc3949ba59abbe56e057f20f883e', 2, NULL, '', '', NULL),
(8, 'alvaro', '0', 'e10adc3949ba59abbe56e057f20f883e', 2, NULL, '', '', NULL),
(9, 'Caique', '0', '2248678eda39ec4cb4e12aef7a2859a7', 2, NULL, '', '', NULL),
(10, 'Caique', '0', '2248678eda39ec4cb4e12aef7a2859a7', 2, NULL, '', '', NULL),
(35, 'Anailson Santos Mota', '4db6bd4166970cc25b9a4fd2a199fe6c', '21232f297a57a5a743894a0e4a801fc3', 2, 'F', 'mota.a.santos@gmail.com', '7c5b57617494a77c4be5b166370632f1', 29041990);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caracteristicaspontoiluminacao`
--
ALTER TABLE `caracteristicaspontoiluminacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id_fk` (`usuario_id`);

--
-- Indexes for table `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pontoiluminacao`
--
ALTER TABLE `pontoiluminacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pontosmapa`
--
ALTER TABLE `pontosmapa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caracteristicaspontoiluminacao`
--
ALTER TABLE `caracteristicaspontoiluminacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pontoiluminacao`
--
ALTER TABLE `pontoiluminacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pontosmapa`
--
ALTER TABLE `pontosmapa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `usuario_id_fk` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
