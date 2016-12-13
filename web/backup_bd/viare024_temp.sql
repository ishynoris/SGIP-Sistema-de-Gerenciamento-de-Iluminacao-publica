-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2016 às 20:22
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
  `prioridade` varchar(1) NOT NULL,
  `rural` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `numPredialProx`, `complemento`, `bairro`, `cidade`, `uf`, `observacao`, `prioridade`, `rural`) VALUES
(1, 49015330, 'Rua Zaquel Brandão', 23, 'Ao lado do estacionamento da clinica Diagnose', 'Grageru', 'Aracaju', 'SE', 'Registro inserido como teste', '', 0),
(9, 49503429, 'Rua JosÃ© Mesquita da Silveira', 748, 'Inserindo endereÃ§o para teste', 'AnÃ­zio Amancio de Oliveira', 'Itabaiana', 'SE', 'Alguma observaÃ§Ã£o sobre o endereÃ§o', '', 0),
(10, 49503429, 'Rua JosÃ© Mesquita da Silveira', 123456, 'Inserindo endereÃ§o por teste', 'AnÃ­zio Amancio de Oliveira', 'Itabaiana', 'SE', 'rua jose mesquita da silveira', '', 0),
(11, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(12, 49503429, 'Rua Jose', 1000, 'Enderenco teste', 'Centro', 'Itabaiana', 'SE', 'ObservaÃ§Ã£o sobre o endereÃ§o', '', 0),
(13, 49500001, 'Avenida Ivo de Carvalho', 1000, 'Avenida da Micarana', 'Centro', 'Itabaiana', 'SE', 'rua jose mesquita da silveira', '', 0),
(23, 49500001, 'Avenida Ivo de Carvalho', 1000, 'Avenida da Micarana', 'Centro', 'Itabaiana', 'SE', '', '', 0),
(24, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(25, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(26, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(27, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(28, 49503429, '', 0, '', '', '', '', '', '', 0),
(29, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(30, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(31, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(32, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(33, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(34, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(35, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(36, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(37, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(38, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(39, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(40, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(41, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(42, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(43, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(44, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(45, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(46, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(47, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(48, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(49, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(50, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(51, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(52, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(53, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(54, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(55, 49503429, 'Rua Jose', 748, 'Algum complemento', 'Centro', 'Itabaiana', 'SE', 'Observacao sobre o endereÃ§o da ocorrencia', '', 0),
(56, 49503429, 'Rua JosÃ© Mesquita da Silveira', 1000, 'Over 8000', 'AnÃ­zio Amancio de Oliveira', 'Itabaiana', 'SE', 'Oi, eu sou o GOKU', '', 0),
(57, 49503429, 'Rua JosÃ© Mesquita da Silveira', 748, 'novo complemento', 'AnÃ­zio Amancio de Oliveira', 'Itabaiana', 'SE', 'rua jose mesquita da silveira', '', 0);

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
  `protocolo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `data_inicio` int(8) NOT NULL,
  `prazo` int(8) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `manutencao` varchar(100) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `rural` tinyint(1) NOT NULL,
  `prioridade` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id`, `protocolo`, `status`, `data_inicio`, `prazo`, `descricao`, `manutencao`, `id_endereco`, `rural`, `prioridade`, `id_usuario`) VALUES
(22, 201672054, 'ABERTA', 3, 8, 'Alguma descricao generica do problema', 'LÃ‚MPADA PISCANTE', 11, 0, 1, 1),
(23, 201693950, 'Em Manutenção', 22, 27, 'Descricao de uma Lampada queimada', 'Lampada queimada', 1, 0, 0, 1),
(24, 201659715, 'Aberta', 24, 29, 'Descricao de uma Lampada quebrada', 'Lampada quebrada', 11, 0, 2, 3),
(25, 201628828, 'Aberta', 25, 30, 'Descricao de uma Lampada piscante', 'Lampada piscante', 9, 0, 1, 35),
(26, 201628828, 'Aberta', 25, 30, 'Descricao de uma Braço de iluminação publica quebrado', 'Braço de iluminação publica quebrado', 9, 1, 1, 35),
(27, 201660706, 'Em Manutenção', 25, 30, 'Descricao de uma Lampada piscante', 'Lampada piscante', 9, 1, 1, 10),
(28, 201699601, 'Aberta', 25, 30, 'Descricao de um Poste Exclusivo IP', 'Poste Exclusivo IP', 11, 0, 2, 10),
(29, 201638505, 'Aberta', 25, 30, 'Descricao de um Luminária quebrada', 'Luminária quebrada', 1, 0, 1, 9),
(30, 201632059, 'Aberta', 25, 30, 'Descricao de uma Fiação arrebentada', 'Fiação arrebentada', 1, 0, 0, 3),
(31, 201668417, 'Aberta', 25, 30, 'Descricao de uma Lampada piscante', 'Lampada piscante', 1, 1, 0, 36),
(32, 201676330, 'Em Manutenção', 25, 30, 'Descricao de uma Luminária Suja', 'Luminária Suja', 9, 0, 1, 10),
(33, 201623946, 'Aberta', 25, 30, 'Descricao de um Luminária quebrada', 'Luminária quebrada', 10, 0, 1, 10),
(34, 201653956, 'Aberta', 25, 30, 'Descricao de uma Luminaria quebrada', 'Luminaria quebrada', 9, 0, 1, 1),
(35, 201633360, 'Aberta', 25, 30, 'Descricao de uma Poste Exclusivo IP', 'Poste Exclusivo IP', 10, 0, 2, 2),
(36, 201635518, 'Aberta', 25, 30, 'Descricao de uma Fiação arrebentada', 'Fiação arrebentada', 11, 1, 2, 3),
(37, 201667737, 'Em Manutenção', 25, 30, 'Descricao de uma Braço de iluminação publica quebrado', 'Braço de iluminação publica quebrado', 11, 1, 1, 4),
(38, 201651315, 'Aberta', 28, 2, 'Descricao de uma Luminaria quebrada', 'Luminaria quebrada', 11, 0, 0, 5),
(39, 201650798, 'Em Manutenção', 28, 2, 'Descricao de uma Poste exclusivo IP', 'Poste exclusivo IP', 9, 0, 0, 6),
(40, 201622560, 'Aberta', 4, 9, 'Descricao de uma Lampada Apagada', 'Lampada Apagada', 10, 1, 1, 7),
(41, 201622695, 'Aberta', 14, 19, 'Descricao de uma Poste Exclusivo IP', 'Poste Exclusivo IP', 1, 0, 0, 8),
(42, 201698508, 'Aberta', 22, 27, 'Descricao de uma Lampada Apagada', 'Lampada Apagada', 1, 0, 1, 9),
(43, 201688490, 'Aberta', 22, 27, 'Descricao de uma Braço de iluminação publica quebrado', 'Braço de iluminação publica quebrado', 10, 1, 2, 35),
(47, 201636276, 'ABERTA', 4, 9, 'Alguma descricao generica do problema', 'LÃ‚MPADA PISCANTE', 26, 0, 1, 1),
(48, 201691381, 'ABERTA', 4, 9, 'Alguma descricao generica do problema', 'LÃ‚MPADA PISCANTE', 27, 0, 1, 1),
(49, 201653477, 'ABERTA', 6, 11, 'Alguma descricao generica do problem', 'LÂMPADA PISCANTE', 1, 0, 1, 1),
(50, 201665242, 'ABERTA', 6, 11, 'Alguma descricao generica do problema', 'LÃ‚MPADA PISCANTE', 55, 0, 1, 37);

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
  `telefone` varchar(11) NOT NULL,
  `dataNascimento` int(8) DEFAULT NULL,
  `id_endereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `login`, `senha`, `isAdmin`, `sexo`, `email`, `telefone`, `dataNascimento`, `id_endereco`) VALUES
(1, 'Administrador', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 0, 'M', 'comercial@unicoalimentos.com.br', '7931981302', 2016, 0),
(2, 'Victor Alexsander', '75f33e6eebce7012b8c74a889fa8a7ed', '75f33e6eebce7012b8c74a889fa8a7ed', 1, 'M', '', '', NULL, 0),
(3, 'Luciane', 'f8032d5cae3de20fcec887f395ec9a6a', 'f8032d5cae3de20fcec887f395ec9a6a', 2, 'F', '', '', NULL, 0),
(4, 'Sostenes', '0', '21232f297a57a5a7', 0, NULL, '', '', NULL, 0),
(5, 'Iris Karla', '0', 'f75c9af2f9523fca', 0, NULL, '', '', NULL, 0),
(6, 'Campo', '0', '2ed6217e1ea82138', 1, NULL, '', '', NULL, 0),
(7, 'alvaro', '0', 'e10adc3949ba59ab', 2, NULL, '', '', NULL, 0),
(8, 'alvaro', '0', 'e10adc3949ba59ab', 2, NULL, '', '', NULL, 0),
(9, 'Caique', '0', '2248678eda39ec4c', 2, NULL, '', '', NULL, 0),
(10, 'Caique', '0', '2248678eda39ec4c', 2, NULL, '', '', NULL, 0),
(35, 'Anailson Santos Mota', '4db6bd4166970cc25b9a4fd2a199fe6c', '21232f297a57a5a743894a0e4a801fc3', 2, 'F', 'mota.a.santos@gmail.com', '7c5b5761749', 29041990, 0),
(36, 'ademar tavares mota helena maria da mota', '4db6bd4166970cc25b9a4fd2a199fe6c', 'c84258e9c39059a89ab77d846ddab909', 2, 'F', 'cida.santos.mota@hotmail.com', '7c5b5761749', 29041990, 0),
(37, 'Joao da silva', '4db6bd4166970cc25b9a4fd2a199fe6c', 'e8d95a51f3af4a3b134bf6bb680a213a', 2, 'M', 'joao@silva.com', '7c5b5761749', 29041990, 23),
(38, '', '4db6bd4166970cc25b9a4fd2a199fe6c', 'd41d8cd98f00b204', 2, 'F', '', '7c5b5761749', 29041990, 28),
(39, 'Goku da Silva Sauro', '4db6bd4166970cc25b9a4fd2a199fe6c', 'bef27466a245ce3ec692bd25409c2549', 2, 'F', 'mota.a.santos@gmail.com', '7c5b5761749', 29041990, 56);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_endereco` (`id_endereco`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_id_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id`),
  ADD CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
