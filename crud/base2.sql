CREATE TABLE `usuario` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `nome` varchar(30) NOT NULL,
 `email` varchar(50) NOT NULL,
 `senha` varchar(32) NOT NULL,
 `sexo` tinyint(4) DEFAULT NULL,
 `nivelAcesso` tinyint(4) NOT NULL,
 `dataCadastro` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

CREATE TABLE `cliente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=innoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

CREATE TABLE `embalagem` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

CREATE TABLE `filial` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;


CREATE TABLE `fornecedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `contato` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

CREATE TABLE `historico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `data_acao` datetime NOT NULL,
  `acao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;


create table if not exists produto(
 id int(10) auto_increment not null,
 descricao varchar(50) not null,
 pms int(4) not null,
 codigo varchar(20) not null,
 intacta tinyint(1),
 id_Fornecedor int(10) not null,
 id_Embalagem int(10) not null,
 CONSTRAINT fk_Fornecedor FOREIGN KEY (id_Fornecedor) REFERENCES fornecedor (id)
 On delete restrict on update cascade,
 CONSTRAINT fk_Embalagem FOREIGN KEY (id_Embalagem) REFERENCES embalagem (id)
 On delete restrict on update cascade,
 primary key(id)
 )ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;
 
 CREATE TABLE `vendedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

SELECT * FROM cliente;
SELECT * FROM usuario;