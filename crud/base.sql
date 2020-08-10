create database if not exists controle_soja charset utf8 default collate utf8_general_ci;

use controle_soja;
show tables;

create table if not exists usuario(
id int(10) auto_increment not null,
nome varchar(30) not null,
email varchar(50) not null,
senha varchar(32) not null,
sexo tinyint,
nivelAcesso tinyint not null ,
dataCadastro datetime,
primary key(id)
)ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `fornecedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `contato` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

create table if not exists filial(
id int(10) auto_increment not null,
nome varchar(30) not null,
primary key(id)
)default character set utf8 default collate utf8_general_ci;

create table if not exists vendedor(
id int(10) auto_increment not null,
nome varchar(30) not null,
primary key(id)
)default character set utf8 default collate utf8_general_ci;

create table if not exists cliente(
id int(10) auto_increment not null,
nome varchar(50) not null,
cidade varchar(50),
primary key(id)
)default character set utf8 default collate utf8_general_ci;

create table if not exists historico(
id int(10) auto_increment not null,
usuario varchar(100) not null,
data_acao datetime not null,
acao varchar(100),
primary key(id)
)default character set utf8 default collate utf8_general_ci;

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
)default character set utf8 default collate utf8_general_ci;

CREATE TABLE embalagem (
  id int(10) NOT NULL AUTO_INCREMENT,
  descricao varchar(50) NOT NULL,
  apelido varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

select * from usuario;
select * from filial;
select * from vendedor;
select * from cliente;
select * from fornecedor;
select * from historico;
select * from produto;
select * from embalagem;

truncate table usuario;
truncate table historico;

drop table usuario;
drop table fornecedor;
drop table produto;
drop table embalagem;

show create table fornecedor;
show create table embalagem;


INSERT INTO usuario (nome, email, senha, sexo, nivelAcesso, dataCadastro) VALUES ('teste', 'teste@teste.com.br', 'teste', '1', '1', NOW());

SELECT COUNT(*) as c FROM usuario WHERE nome = 'aislan';

SELECT * FROM filial WHERE nome = 'cruzilia';




