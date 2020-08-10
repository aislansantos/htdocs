create database if not exists controle_s charset utf8 default collate utf8_general_ci;

use controle_s;
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
)default character set utf8 default collate utf8_general_ci;

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

create table if not exists fornecedor(
id int(10) auto_increment not null,
nome varchar(50) not null,
email varchar(100),
telefone varchar(15),
primary key(id)
)default character set utf8 default collate utf8_general_ci;

create table if not exists historico(
id int(10) auto_increment not null,
usuario varchar(100) not null,
data_acao datetime not null,
acao varchar(100),
primary key(id)
)default character set utf8 default collate utf8_general_ci;

select * from usuario;
select * from filial;
select * from vendedor;
select * from cliente;
select * from fornecedor;
select * from historico;

truncate table usuario;
truncate table historico;

drop table usuario;


INSERT INTO usuario (nome, email, senha, sexo, nivelAcesso, dataCadastro) VALUES ('teste', 'teste@teste.com.br', 'teste', '1', '1', NOW());

SELECT COUNT(*) as c FROM usuario WHERE nome = 'aislan';

SELECT * FROM filial WHERE nome = 'cruzilia';




