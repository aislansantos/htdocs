-- Copiando estrutura para tabela controle_soja.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.cliente: ~91 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
REPLACE INTO `cliente` (`id`, `nome`, `cidade`) VALUES
	(2, 'alan fernandes', 'VARGINHA'),
	(3, 'ALECIO PEREIRA ALVARENGA', 'VARGINHA'),
	(4, 'ALEX SANDER MONTEIRO', 'VARGINHA'),
	(5, 'ANTENOR RABELO DE OLIVEIRA', 'VARGINHA'),
	(6, 'ANTONIO DE  ALVARENGA GON', 'VARGINHA'),
	(7, 'ANTONIO MEIRELLES DE BARROS NETO', 'VARGINHA'),
	(8, 'AURIO BENI', 'VARGINHA'),
	(9, 'AYRTON HARUO MURAOKA', 'VARGINHA'),
	(10, 'BRENO JUNQUEIRA PARANAIBA', 'VARGINHA'),
	(11, 'CAIO SONJA', 'VARGINHA'),
	(12, 'CARLOS AUGUSTO DIAS PEREIRA', 'VARGINHA'),
	(13, 'CARLOS FABIO NOGUIRA RIVELLI', 'VARGINHA'),
	(14, 'CARLOS HENRIQUE GRACIANO', 'VARGINHA'),
	(15, 'CARLOS HENRIQUE PEREIRA DIAS', 'VARGINHA'),
	(16, 'CARLOS RENATO MIRANDA MEIRELLES', 'VARGINHA'),
	(17, 'CASSIO GON', 'VARGINHA'),
	(18, 'CECILIA VILELA', 'VARGINHA'),
	(19, 'CHARLES LAMBERTOS VAN HAM', 'VARGINHA'),
	(20, 'CLEUZA JUNQUEIRA M DIAS', 'VARGINHA'),
	(21, 'COPAMA', 'VARGINHA'),
	(22, 'DIEGO MOREIRA REIS VIANA', 'VARGINHA'),
	(23, 'DIMAS HUMBERTO DE ARAUJO CAMPOS', 'VARGINHA'),
	(24, 'EDNALDO ZINI', 'VARGINHA'),
	(25, 'EDUARDO DANZINGER', 'VARGINHA'),
	(26, 'ELCIO DIVINO DO NASCIMENTO', 'VARGINHA'),
	(27, 'ERICO FRANCISCO FERNANDES PEREIRA', 'VARGINHA'),
	(28, 'ERNESTO PEDRO COUTO', 'VARGINHA'),
	(29, 'EVARISTO DONIZETE', 'VARGINHA'),
	(30, 'FABIO DE LIMA CAIXETA', 'VARGINHA'),
	(31, 'FAZENDA PALHETA AVIARIO SANTO ANTONIO', 'VARGINHA'),
	(32, 'FERNANDO JOSE VALERIO', 'VARGINHA'),
	(33, 'FRANCISCO MARINS PALACIO', 'VARGINHA'),
	(34, 'GUILHERME PEREIRA PANISI', 'VARGINHA'),
	(35, 'HALISSON RODRIGO CORREA', 'VARGINHA'),
	(36, 'HAMILTON TADEU TORRES', 'VARGINHA'),
	(37, 'HELDER BOM TEMPO', 'VARGINHA'),
	(38, 'HILDEBRANDO FERREIRA', 'VARGINHA'),
	(43, 'JOAQUIM DIDIER', 'VARGINHA'),
	(44, 'JOAQUIM PEDRO MOREIRA', 'VARGINHA'),
	(45, 'JOSE EMIDIO GON', 'VARGINHA'),
	(46, 'JOSE FRANCISCO ALVARENGA', 'VARGINHA'),
	(47, 'JOSE LUCIO REZENDE', 'VARGINHA'),
	(48, 'JOSE OLINTO VALERIO', 'VARGINHA'),
	(49, 'JUAREZ GON', 'VARGINHA'),
	(50, 'JUATAN MONTEIRO', 'VARGINHA'),
	(51, 'LEANDRO PINTO DA SILVA', 'VARGINHA'),
	(52, 'LEANDRO RAMIRO', 'VARGINHA'),
	(53, 'LUCAS LAULER', 'VARGINHA'),
	(54, 'LUCIANO CESAR PEREIRA BRANQUINHO', 'VARGINHA'),
	(55, 'LUCIANO SILVEIRA MOREIRA', 'VARGINHA'),
	(56, 'LUCILIA CAMPOS PALMEIRA', 'VARGINHA'),
	(57, 'LUIS CARLOS GARCIA', 'VARGINHA'),
	(58, 'LUIZ FERNANDO NEVES', 'VARGINHA'),
	(59, 'LUIZ GONZAGA DE OLIVEIRA', 'VARGINHA'),
	(60, 'LUIZ HENRIQUE PEREIRA DIAS', 'VARGINHA'),
	(61, 'LUIZ NOGUEIRA FILHO', 'VARGINHA'),
	(62, 'MARCELO DE ASSIS PEREIRA', 'VARGINHA'),
	(63, 'MARIA ALICE MONTEIRO', 'VARGINHA'),
	(64, 'MARIA DAS GRA', 'VARGINHA'),
	(65, 'maria gorete perez de carvalho', 'VARGINHA'),
	(66, 'MARIO CESAR LEMES', 'VARGINHA'),
	(67, 'MAURO ROBERTO MELO JUNIOR', 'VARGINHA'),
	(68, 'MURILIO EUSEBIO PEREIRA', 'VARGINHA'),
	(69, 'NEIMAR GERALDO BRAGA', 'VARGINHA'),
	(70, 'NILTON CESAR MOSCHEN', 'VARGINHA'),
	(71, 'NOELLY CAMILA FERNANDES', 'VARGINHA'),
	(72, 'PAULA BONANO PALACIO', 'Lavras'),
	(73, 'PAULO VI', 'VARGINHA'),
	(74, 'PEDRO MILANES', 'VARGINHA'),
	(75, 'PLANTAR AGRONEGOCIOS', 'VARGINHA'),
	(76, 'RAFAEL ALVES VAN HAN', 'VARGINHA'),
	(77, 'REMO ODECIO BERTOLINI', 'VARGINHA'),
	(78, 'RENALDO ADRIANE CAL', 'VARGINHA'),
	(79, 'RICHARD FRANCH', 'VARGINHA'),
	(80, 'ROBERTO FERRAZ', 'VARGINHA'),
	(81, 'RODRIGO GON', 'VARGINHA'),
	(82, 'ROMULO MAIOLINI', 'VARGINHA'),
	(83, 'RONALDO DRUMONT', 'VARGINHA'),
	(84, 'RONI MARCOS RIBEIRO', 'VARGINHA'),
	(85, 'ROSANA DE FATIMA MENDES(IRM', 'VARGINHA'),
	(86, 'SEBASTI', 'VARGINHA'),
	(87, 'SERGIO ALBAREZ ARANTES', 'VARGINHA'),
	(88, 'TEREZINHA PEREIRA DIAS', 'VARGINHA'),
	(89, 'THIAGO CARVALHO SERIO', 'VARGINHA'),
	(90, 'THIAGO CESAR RIBEIRO FERREIRA', 'VARGINHA'),
	(91, 'THIAGO HENRIQUE DA SILVA MELO', 'VARGINHA'),
	(92, 'UBIRATAN R. TEIXEIRA', 'VARGINHA'),
	(93, 'UNISAFRA AGRONECOPS', 'VARGINHA'),
	(94, 'VICENTE ANTONIO MARINS JR', 'VARGINHA'),
	(95, 'VICENTE DE PAULO MELO', 'VARGINHA'),
	(96, 'WILLIAN MASSAHIRO', 'VARGINHA');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(100) DEFAULT NULL,
  `FONE` varchar(15) NOT NULL,
  `CELULAR` varchar(15) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.contato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.embalagem
CREATE TABLE IF NOT EXISTS `embalagem` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.embalagem: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `embalagem` DISABLE KEYS */;
REPLACE INTO `embalagem` (`id`, `descricao`, `apelido`) VALUES
	(2, 'BIG BAG 1000 QUILOS', 'BAG1000KG'),
	(3, 'SACARIA 25 QUILOS', 'SC25KC'),
	(5, 'SACARIA 40 QUILOS', 'SC40KG');
/*!40000 ALTER TABLE `embalagem` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.filial
CREATE TABLE IF NOT EXISTS `filial` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.filial: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `filial` DISABLE KEYS */;
REPLACE INTO `filial` (`id`, `nome`) VALUES
	(1, 'VARGINHA'),
	(2, 'TRÊS PONTAS'),
	(3, 'CRUZíLIA'),
	(4, 'MADRE DE DEUS DE MINAS');
/*!40000 ALTER TABLE `filial` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `contato` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.fornecedor: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
REPLACE INTO `fornecedor` (`id`, `nome`, `apelido`, `contato`, `email`, `telefone`) VALUES
	(2, 'SYNGENTA SEEDS BRASIL LTDA.', 'NIDERA', 'MARILISA', 'MARILISA.IABRUDI@nideraseeds.com', '3532141837'),
	(3, 'UNIDADE DE BENEFICIAMENTO SEMENTES VALIOSA LTDA', 'VALIOSA', 'RENATO', 'teste@teste.com.br', '3532141837'),
	(4, 'MANUEL ANTONIO FALCAO E HUMBERTO FALCAO', 'SEMENTES FALCAO', '*****', 'teste@teste.com.br', '3532141837'),
	(5, 'COOPERATIVA REGINAL AGROPECUARIA DE CAMPOS', 'COOPERCAMPOS', 'FORTSUL', 'teste@teste.com.br', '3532141837');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `data_acao` datetime NOT NULL,
  `acao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.historico: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
REPLACE INTO `historico` (`id`, `usuario`, `data_acao`, `acao`) VALUES
	(1, 'teste@teste.com.br', '2020-05-14 11:19:32', 'ExclusÃ£o de Usuario: teste'),
	(2, 'teste@teste.com.br', '2020-05-14 11:19:41', 'ExclusÃ£o de Cliente: Jo'),
	(3, 'teste@teste.com.br', '2020-05-14 11:19:45', 'ExclusÃ£o de Cliente: JO'),
	(4, 'teste@teste.com.br', '2020-05-14 11:19:48', 'ExclusÃ£o de Cliente: JO'),
	(5, 'teste@teste.com.br', '2020-05-14 11:19:52', 'ExclusÃ£o de Cliente: JO'),
	(6, 'teste@teste.com.br', '2020-05-14 11:20:14', 'AlreraÃ§Ã£o de Cliente:  PAULA BONANO PALACIO id: 72'),
	(7, 'teste@teste.com.br', '2020-05-14 11:21:54', 'InclusÃ£o de Fornecedor: NIDERA SYNGENTA'),
	(8, 'teste@teste.com.br', '2020-05-14 16:29:43', 'InclusÃ£o de Embalagem: SACA 40 QUILOS'),
	(9, 'teste@teste.com.br', '2020-05-14 22:41:42', 'InclusÃ£o de Embalagem: BIG BAG 1000 KG'),
	(10, 'teste@teste.com.br', '2020-05-15 15:50:59', 'AlteraÃ§Ã£o de FornecedorNS 7709 IPRO PMS 132 CROP300 + FIPRO 100 id:6'),
	(11, 'teste@teste.com.br', '2020-05-15 15:51:10', 'AlteraÃ§Ã£o de FornecedorNS 7709 IPRO PMS 156 CROP300 + FIPRO 100 - 1000KG id:7'),
	(12, 'teste@teste.com.br', '2020-05-15 15:51:15', 'AlteraÃ§Ã£o de FornecedorNS 7709 IPRO PMS 156 CROP300 + FIPRO 100 id:5'),
	(13, 'teste@teste.com.br', '2020-05-15 15:51:18', 'AlteraÃ§Ã£o de FornecedorMS 5917 156 IPRO id:4'),
	(14, 'teste@teste.com.br', '2020-05-15 15:51:47', 'AlteraÃ§Ã£o de FornecedorMS 5917 IPRO PMS 156 CROP 300 + FIPRO 100 + CTS 50 id:'),
	(15, 'teste@teste.com.br', '2020-05-15 16:34:30', 'InclusÃ£o de Embalagem: SACARIA 40 QUILOS'),
	(16, 'teste@teste.com.br', '2020-05-15 16:35:14', 'InclusÃ£o de Filial: VARGINHA'),
	(17, 'teste@teste.com.br', '2020-05-15 16:35:23', 'InclusÃ£o de Filial: TRÃŠS PONTAS'),
	(18, 'teste@teste.com.br', '2020-05-15 16:35:33', 'InclusÃ£o de Filial: CRUZÃLIA'),
	(19, 'teste@teste.com.br', '2020-05-15 16:35:41', 'InclusÃ£o de Filial: MADRE DE DEUS DE MINAS'),
	(20, 'teste@teste.com.br', '2020-05-15 16:37:16', 'AlreraÃ§Ã£o de Vendedor:  BALCAO VARGINHA id: 2'),
	(21, 'teste@teste.com.br', '2020-05-15 16:37:21', 'AlreraÃ§Ã£o de Vendedor:  CRISTOVAO id: 6'),
	(22, 'teste@teste.com.br', '2020-05-15 16:37:28', 'AlreraÃ§Ã£o de Vendedor:  JOAO EDUARDO id: 11'),
	(23, 'teste@teste.com.br', '2020-05-15 16:37:37', 'AlreraÃ§Ã£o de Vendedor:  JOAO EDUARDO id: 11'),
	(24, 'teste@teste.com.br', '2020-05-15 16:50:52', 'AlteraÃ§Ã£o de FornecedorBMX LANCA PMS 146 FORTENZA DUO id:4'),
	(25, 'teste@teste.com.br', '2020-05-15 16:51:00', 'AlteraÃ§Ã£o de FornecedorBMX LANCA PMS 146 id:22'),
	(26, 'teste@teste.com.br', '2020-05-15 17:03:23', 'AlteraÃ§Ã£o de FornecedorMS 5917 IPRO PMS 156 id:5'),
	(27, 'teste@teste.com.br', '2020-05-15 17:03:28', 'AlteraÃ§Ã£o de FornecedorNS 5959 P1 id:15'),
	(28, 'teste@teste.com.br', '2020-05-15 17:03:42', 'AlteraÃ§Ã£o de FornecedorNS 5959 P1 id:15'),
	(29, 'teste@teste.com.br', '2020-05-18 16:52:27', 'AlreraÃ§Ã£o de Usuario:  teste id: 2'),
	(30, 'teste@teste.com.br', '2020-05-18 16:52:32', 'AlreraÃ§Ã£o de Usuario:  teste id: 2'),
	(31, 'teste@teste.com.br', '2020-05-18 16:53:03', 'InclusÃ£o de Usuario: Aislan Santosa'),
	(32, 'teste@teste.com.br', '2020-05-21 10:23:32', 'Inclusão de Filial: NEPOMUCENO'),
	(33, 'teste@teste.com.br', '2020-05-21 10:23:50', 'Exclusão de Filial: NEPOMUCENO'),
	(34, 'teste@teste.com.br', '2020-05-26 13:07:22', 'Exclusão de produto: MS 5838 IPRO PMS 156 CROP 300   FIPRO 100'),
	(35, 'teste@teste.com.br', '2020-05-26 17:09:59', 'Alteração de Fornecedor5917 id:'),
	(36, 'teste@teste.com.br', '2020-05-26 17:10:06', 'Exclusão de produto: 5917'),
	(37, 'teste@teste.com.br', '2020-05-27 16:40:41', 'Alteração de FornecedorMS 5838 IPRO PMS 156 id:21');
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.itempedidocompra
CREATE TABLE IF NOT EXISTS `itempedidocompra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_PedCompra` int(10) NOT NULL,
  `id_ProdCompra` int(10) NOT NULL,
  `qtde_ItemCompra` int(10) NOT NULL,
  `vlr_ItemCompra` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_PedCompra` (`id_PedCompra`),
  KEY `fk_ProdCompra` (`id_ProdCompra`),
  CONSTRAINT `fk_PedCompra` FOREIGN KEY (`id_PedCompra`) REFERENCES `pedidocompra` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_ProdCompra` FOREIGN KEY (`id_ProdCompra`) REFERENCES `produto` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.itempedidocompra: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `itempedidocompra` DISABLE KEYS */;
REPLACE INTO `itempedidocompra` (`id`, `id_PedCompra`, `id_ProdCompra`, `qtde_ItemCompra`, `vlr_ItemCompra`) VALUES
	(3, 2, 4, 400, 288),
	(6, 3, 15, 500, 356.4),
	(7, 4, 6, 700, 450.12),
	(8, 4, 7, 450, 312);
/*!40000 ALTER TABLE `itempedidocompra` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.pedidocompra
CREATE TABLE IF NOT EXISTS `pedidocompra` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numero_Pedido` varchar(50) NOT NULL,
  `tipo_Compra` tinyint(1) NOT NULL,
  `dt_Vencimento` date NOT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `id_Filial` int(10) NOT NULL,
  `id_Fornecedor` int(10) NOT NULL,
  `dt_Pedido` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Filial` (`id_Filial`),
  KEY `fk_FornecedorCompra` (`id_Fornecedor`),
  CONSTRAINT `fk_Filial` FOREIGN KEY (`id_Filial`) REFERENCES `filial` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_FornecedorCompra` FOREIGN KEY (`id_Fornecedor`) REFERENCES `fornecedor` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.pedidocompra: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidocompra` DISABLE KEYS */;
REPLACE INTO `pedidocompra` (`id`, `numero_Pedido`, `tipo_Compra`, `dt_Vencimento`, `observacao`, `id_Filial`, `id_Fornecedor`, `dt_Pedido`) VALUES
	(2, '282/2020', 0, '2020-05-28', 'pagamento 20% 18/05/2020 - 80% 30/08/2020', 1, 5, '2020-05-15'),
	(3, '45444', 0, '2020-04-20', '', 1, 5, '2020-05-19'),
	(4, '1221a', 0, '2020-05-29', '', 4, 5, '2020-05-20');
/*!40000 ALTER TABLE `pedidocompra` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `pms` int(4) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `intacta` tinyint(1) DEFAULT NULL,
  `id_Fornecedor` int(10) NOT NULL,
  `id_Embalagem` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Fornecedor` (`id_Fornecedor`),
  KEY `fk_Embalagem` (`id_Embalagem`),
  CONSTRAINT `fk_Embalagem` FOREIGN KEY (`id_Embalagem`) REFERENCES `embalagem` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_Fornecedor` FOREIGN KEY (`id_Fornecedor`) REFERENCES `fornecedor` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.produto: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
REPLACE INTO `produto` (`id`, `descricao`, `pms`, `codigo`, `intacta`, `id_Fornecedor`, `id_Embalagem`) VALUES
	(1, 'BMX DESAFIO P1 PMS 155 FORTENZA DUO', 155, 'DES/155/FD/V', 0, 3, 5),
	(2, 'BMX DESAFIO P2 PMS185', 185, 'DES/185/V', 0, 3, 5),
	(3, 'BMX FOCO P1 FORTENZA DUO', 1, 'FOCO/P1/FD/V', 0, 3, 5),
	(4, 'BMX LANCA PMS 146 FORTENZA DUO', 146, 'LAN/146/FD/CC', 0, 5, 5),
	(5, 'MS 5917 IPRO PMS 156', 156, '5917/156/F', 0, 4, 5),
	(6, 'MS 5917 IPRO PMS 156 CROP 300 + FIPRO 100', 156, '5917/156/C3F1/F', 0, 4, 5),
	(7, 'MS 5917 IPRO PMS 156 CROP 300 + FIPRO 100 + CTS 50', 156, '5917/156/C3F1C5/F', 0, 4, 5),
	(8, 'MS 5917 IPRO PMS 186 CROP 300 + FIPRO 100', 186, '5917/186/C3F1/F', 0, 4, 5),
	(9, 'MS 5917 IPRO PMS 210', 210, '5917/210/F', 0, 4, 5),
	(10, 'MS 5917 PMS190 AVICTA', 190, '5917/190/AVT/V', 0, 3, 5),
	(11, 'MS 6410 IPRO PMS 132', 132, '6410/132/F', 0, 4, 5),
	(12, 'MS 6410 IPRO PMS 132 CROP 300 + FIPRO 100', 132, '6410/132/C3F1/F', 0, 4, 5),
	(13, 'MS 6410 IPRO PMS 168', 168, '6410/168/F', 0, 4, 5),
	(14, 'MS 6410 IPRO PMS 174 CROP 300 + FIPRO 100', 174, '6410/174/C3F1/F', 0, 4, 5),
	(15, 'NS 5959 P1', 1, '5959/P1/N', 0, 2, 5),
	(16, 'NS 6601 IPRO PMS 198 FORTENZA SOLO', 198, '6601/198/FT/N', 0, 2, 5),
	(17, 'NS 7667 P1 FORTENZA DUO 60', 1, '7667/P1/FD60/N', 0, 2, 5),
	(18, 'NS 7709 IPRO PMS 196 FORTENZA SOLO', 196, '7705/196/FT/N', 0, 2, 5),
	(20, 'MS 6410 IPRO PMS 150', 150, '6410/150/F', 0, 4, 5),
	(21, 'MS 5838 IPRO PMS 156', 156, '5838/156/F', 1, 4, 2),
	(22, 'BMX LANCA PMS 146', 146, 'LAN/146/CC', 0, 5, 5);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `sexo` tinyint(4) DEFAULT NULL,
  `nivelAcesso` tinyint(4) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
REPLACE INTO `usuario` (`id`, `nome`, `email`, `senha`, `sexo`, `nivelAcesso`, `dataCadastro`) VALUES
	(2, 'teste', 'teste@teste.com.br', 'teste', 1, 1, '2020-05-14 11:19:08'),
	(3, 'Aislan Santosa', 'aislan@aaos.tech', 'teste', 1, 1, '2020-05-18 16:53:03');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela controle_soja.vendedor
CREATE TABLE IF NOT EXISTS `vendedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela controle_soja.vendedor: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `vendedor` DISABLE KEYS */;
REPLACE INTO `vendedor` (`id`, `nome`) VALUES
	(1, 'ALEXANDRE'),
	(2, 'BALCAO VARGINHA'),
	(3, 'BRUNO'),
	(4, 'CAIO'),
	(5, 'CASSIO'),
	(6, 'CRISTOVAO'),
	(7, 'ELIEBER'),
	(8, 'ERIC'),
	(9, 'ERICO'),
	(10, 'HIRAN'),
	(11, 'JOAO EDUARDO'),
	(12, 'JOSE MARCELLO'),
	(13, 'LUCAS'),
	(14, 'RONALDO'),
	(15, 'VITOR');
/*!40000 ALTER TABLE `vendedor` ENABLE KEYS */;

-- Copiando estrutura para view controle_soja.vw_itemcompleto
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_itemcompleto` (
	`id` INT(10) NOT NULL,
	`descProduto` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`pms` INT(4) NOT NULL,
	`codigo` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
	`intacta` TINYINT(1) NULL,
	`id_Fornecedor` INT(10) NOT NULL,
	`descFornecedor` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_Embalagem` INT(10) NOT NULL,
	`descEmbalagem` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`embApelido` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`fornApelido` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Copiando estrutura para view controle_soja.vw_itempedidocompra
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_itempedidocompra` (
	`id` INT(10) NOT NULL,
	`numero_Pedido` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_Embalagem` INT(10) NOT NULL,
	`descEmbalagem` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`idForn` INT(10) NOT NULL,
	`idProd` INT(10) NOT NULL,
	`nome` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`codigo` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
	`descricao` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`qtdeItemcompra` INT(10) NOT NULL,
	`vlr_ItemCompra` DOUBLE(22,0) NOT NULL,
	`totalitens` DOUBLE(23,0) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view controle_soja.vw_pedidocompra
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `vw_pedidocompra` (
	`idPed` INT(10) NOT NULL,
	`numero_Pedido` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nome` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`nomefl` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`id_Forn` INT(10) NOT NULL,
	`id_Filial` INT(10) NOT NULL,
	`apelido_Forn` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`dt_Vencimento` DATE NOT NULL,
	`observacao` VARCHAR(255) NULL COLLATE 'utf8_general_ci',
	`totalpedido` DOUBLE(23,0) NULL
) ENGINE=MyISAM;

-- Copiando estrutura para view controle_soja.vw_itemcompleto
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_itemcompleto`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_itemcompleto` AS SELECT pr.id, pr.descricao as descProduto, pr.pms, pr.codigo, pr.intacta, pr.id_Fornecedor, fn.nome AS descFornecedor,
pr.id_Embalagem, emb.descricao AS descEmbalagem, emb.apelido AS embApelido, fn.apelido AS fornApelido
FROM produto pr
INNER JOIN fornecedor fn
ON pr.id_Fornecedor = fn.id
INNER JOIN embalagem emb
ON pr.id_Embalagem = emb.id ;

-- Copiando estrutura para view controle_soja.vw_itempedidocompra
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_itempedidocompra`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_itempedidocompra` AS SELECT pc.id , pc.numero_Pedido, pr.id_Embalagem,emb.descricao AS descEmbalagem, fn.id AS idForn,pr.id AS idProd ,fn.nome, pr.codigo,
pr.descricao, ic.qtde_ItemCompra AS qtdeItemcompra, ic.vlr_ItemCompra,
SUM(ic.qtde_ItemCompra * ic.vlr_ItemCompra) AS totalitens
FROM pedidocompra pc 
INNER JOIN itempedidocompra ic
ON	pc.id = ic.id_PedCompra
INNER JOIN	produto pr
ON ic.id_ProdCompra = pr.id
INNER JOIN fornecedor fn
ON pc.id_Fornecedor = fn.id
INNER JOIN embalagem emb
ON	pr.id_Embalagem = emb.id
GROUP BY pc.numero_Pedido,pr.descricao, ic.qtde_ItemCompra, ic.vlr_ItemCompra,pr.id_Embalagem ;

-- Copiando estrutura para view controle_soja.vw_pedidocompra
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `vw_pedidocompra`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_pedidocompra` AS SELECT pc.id as idPed, pc.numero_Pedido, fn.nome, fl.nome AS nomefl, fn.id AS id_Forn, fl.id AS id_Filial, fn.apelido AS apelido_Forn,
 pc.dt_Vencimento, pc.observacao,
(SELECT SUM(totalitens) FROM vw_itempedidocompra WHERE numero_Pedido = pc.numero_Pedido ) AS totalpedido
FROM pedidocompra pc
INNER JOIN fornecedor fn
ON pc.id_Fornecedor = fn.id
INNER	JOIN filial fl
ON	pc.id_Filial = fl.id
INNER	JOIN vw_itempedidocompra vwipc
ON	totalitens = vwipc.totalitens
GROUP BY pc.id, pc.numero_Pedido, fn.nome, fl.nome ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
